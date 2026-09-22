<?php
function e($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta
    name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Chatbot Preview</title>
  <style>
    :root {
      --mbw-primary: #143258;
      --mbw-secondary: #f4b41a;
      --mbw-surface: transparent;
      --mbw-text-primary: #0B1220;
      --mbw-text-secondary: #FFFFFF;
      --mbw-text-surface: #000000;
      --mbw-font: 'Nunito Sans', sans-serif;
    }
  </style>

  <link rel="stylesheet" href="<?php echo e($ctx['rootURL'] . 'css/chatbot-ui.css'); ?>">
  <link rel="stylesheet" href="<?php echo e($ctx['rootURL'] . 'css/all.min.css'); ?>">

  <style>
  html, body {
    height: 100%;
    margin: 0;
  }

  body.mb-preview-body {
    height: 100%;
    overflow: hidden;
  }

  .inline-widget-content,
  .inline-widget-chat,
  .inline-widget-chatbot {
    height: 100%;
  }

  .inline-widget-chatbot {
    display: block;
  }

  .inline-chat-layout {
    height: 100%;
  }
  </style>
  </head>
  <body class="mb-preview-body">

    <div class="inline-widget-content">
      <div class="inline-widget-chat">

        <input type="hidden" value="<?php echo e($ctx['flowId']); ?>" id="topic-id-input">
        <input type="hidden" id="agent-photo" value="<?php echo e($ctx['agent_photo_url'] ?? ''); ?>">

        <div
          id="chatbot-identifier"
          class="inline-widget-chatbot"
          uniqueID="<?php echo e($ctx['uniqid']); ?>"
        >
          <div class="inline-chat-layout">
            <div
              id="chat-layout-screen"
              class="inline-chat-conversation-msgs inline-chat-conversation-flow">
            </div>

            <div class="chat-input-field chat-input-field-alt">
            <a id="input-send-action" class="widget-chat-convers">
              <i class="zmdi zmdi-mail-send"></i>
            </a>
            <textarea
              id="send-message-chat"
              placeholder="Send a message"
              class="chat-input-textarea"></textarea>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
    window.configCommon = {
      rootURL: <?php echo json_encode($ctx['rootURL'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
      audioPath: <?php echo json_encode($ctx['rootURL'] . 'audio/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
      imagePath: <?php echo json_encode($ctx['rootURL'] . 'images/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
      ajaxUrl: <?php echo json_encode($ctx['ajaxUrl'] ?? '', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
      ajaxNonce: <?php echo json_encode($ctx['ajaxNonce'] ?? '', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
      dataEntities: <?php echo json_encode($ctx['dataEntities'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
      settings: <?php echo json_encode($ctx['settings'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
      rivePath: <?php echo json_encode($ctx['rivePath'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
      inlineTestingChat: <?php echo !empty($ctx['inlineTestingChat']) ? 'true' : 'false'; ?>,
      inlineTemplatePreview: <?php echo !empty($ctx['inlineTemplatePreview']) ? 'true' : 'false'; ?>,
      flowId: <?php echo json_encode($ctx['flowId'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    };
  </script>

  <script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>

  <script src="<?php echo e($ctx['rootURL'] . 'js/main.js'); ?>"></script>
</body>
</html>