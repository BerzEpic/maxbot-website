<?php
/**
 * Bridge the demo website to the real Maxbot projects hosted by WordPress.
 *
 * Nothing is duplicated here: the iframe is rendered by Maxbot Core inside
 * /portfo/, so the live flow, entities, widget customisation, WhatsApp action,
 * and user-data persistence all continue to come from the WordPress install.
 */
$maxbotLiveWidgetUrl = rtrim(MAXBOT_LIVE_WIDGET_WORDPRESS_URL, '/') . '/'
    . '?maxbot_inline_widget=1'
    . '&project=' . rawurlencode((string) MAXBOT_LIVE_WIDGET_WEB_PROJECT_ID)
    . '&source_page=' . rawurlencode((string) MAXBOT_LIVE_WIDGET_SOURCE_PAGE_ID);
?>

<div id="maxbot-live-widget-root" aria-label="Maxbot live demo widget"></div>

<style id="maxbot-live-widget-shell-css">
#maxbot-live-widget-shell{
    position:fixed;
    right:20px;
    bottom:20px;
    width:380px;
    height:520px;
    max-width:95vw;
    max-height:80vh;
    z-index:99998;
    pointer-events:auto;
}
#maxbot-live-widget-shell.position-left{
    right:auto;
    left:20px;
}
#maxbot-live-widget-shell.mbw-channels-open{
    width:260px;
    height:520px;
}
#maxbot-live-widget-shell.mbw-single-direct-channel{
    width:96px;
    height:96px;
    max-width:96px;
    max-height:96px;
}
#maxbot-live-widget-shell iframe{
    border:0;
    width:100%;
    height:100%;
    background:transparent;
    display:block;
}
@media (max-width:480px){
    #maxbot-live-widget-shell{
        right:12px;
        bottom:12px;
        width:92vw;
        height:70vh;
    }
    #maxbot-live-widget-shell.position-left{
        left:12px;
        right:auto;
    }
    #maxbot-live-widget-shell.mbw-single-direct-channel{
        width:82px;
        height:82px;
        max-width:82px;
        max-height:82px;
    }
}
</style>

<script>
(function () {
    'use strict';

    var root = document.getElementById('maxbot-live-widget-root');
    if (!root || document.getElementById('maxbot-live-widget-shell')) return;

    var shell = document.createElement('div');
    shell.id = 'maxbot-live-widget-shell';

    var frame = document.createElement('iframe');
    frame.id = 'maxbot-live-widget-frame';
    frame.title = 'Maxbot live chatbot';
    frame.src = <?php echo json_encode($maxbotLiveWidgetUrl, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;
    frame.allow = 'clipboard-write *; clipboard-read *';
    frame.setAttribute('scrolling', 'no');

    shell.appendChild(frame);
    root.appendChild(shell);

    function applyWordPressWidgetPosition() {
        try {
            var cfg = frame.contentWindow && frame.contentWindow.configCommon;
            var appearance = cfg && cfg.widgetAppearance ? cfg.widgetAppearance : {};
            var position = appearance && appearance.position ? appearance.position : 'bottom-right';
            shell.classList.toggle('position-left', position === 'bottom-left');
        } catch (e) {
            // Same-origin today; keep bottom-right if browser policy ever changes.
        }
    }

    function sendParentFont() {
        try {
            var font = window.getComputedStyle(document.body).fontFamily || '';
            if (!font || !frame.contentWindow) return;
            frame.contentWindow.postMessage({ type: 'mbw-font', font: font }, window.location.origin);
        } catch (e) {}
    }

    frame.addEventListener('load', function () {
        applyWordPressWidgetPosition();
        sendParentFont();
    });

    window.addEventListener('message', function (event) {
        if (!event || event.source !== frame.contentWindow || event.origin !== window.location.origin) return;

        var data = event.data;
        var type = typeof data === 'string' ? data : (data && data.type ? data.type : '');

        if (type === 'mbw-channels') {
            shell.classList.remove('mbw-single-direct-channel');
            shell.classList.toggle('mbw-channels-open', !!(data && data.open));
            return;
        }

        if (type === 'mbw-direct-channel') {
            shell.classList.add('mbw-single-direct-channel');
            shell.classList.remove('mbw-channels-open');
            return;
        }

        if (type === 'mbw-ready') {
            applyWordPressWidgetPosition();
            sendParentFont();
        }
    });
})();
</script>
