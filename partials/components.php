<?php
/**
 * Product-inspired components.
 *
 * The conversation is what Maxbot makes, so the conversation is also the
 * artwork on this site. Everything here is drawn with CSS and inline SVG,
 * no screenshots, no illustrations.
 */

require_once __DIR__ . '/icons.php';

if (!function_exists('mb_thread')) {
    /**
     * The customer's view: a chat transcript with quick replies.
     *
     * $messages accepts:
     *   ['bot' => 'text']            a bot bubble (HTML allowed)
     *   ['user' => 'text']           a visitor bubble
     *   ['replies' => ['A', 'B']]    quick reply buttons
     *   ['replies' => [...], 'picked' => 'A']
     *   ['typing' => true]           typing indicator
     */
    function mb_thread(array $messages, array $options = []): string
    {
        $name  = $options['name'] ?? 'Maxbot Assistant';
        $role  = $options['role'] ?? 'Support assistant';
        $head  = $options['head'] ?? true;
        $input = $options['input'] ?? true;
        $class = $options['class'] ?? '';
        $status = $options['status'] ?? 'Online';

        $html = '<div class="thread ' . mb_e($class) . '">';

        if ($head) {
            $html .= '<div class="thread-head">'
                . '<span class="thread-avatar">' . mb_icon('message') . '</span>'
                . '<span><span class="name">' . mb_e($name) . '</span>'
                . '<span class="role">' . mb_e($role) . '</span></span>'
                . '<span class="status"><i></i>' . mb_e($status) . '</span>'
                . '</div>';
        }

        foreach ($messages as $message) {
            if (!empty($message['typing'])) {
                $html .= '<div class="bubble typing" aria-label="Assistant is typing"><i></i><i></i><i></i></div>';
                continue;
            }

            if (isset($message['bot'])) {
                $html .= '<div class="bubble">' . $message['bot'] . '</div>';
                continue;
            }

            if (isset($message['user'])) {
                $html .= '<div class="bubble bubble--user">' . $message['user'] . '</div>';
                continue;
            }

            if (isset($message['replies'])) {
                $picked = $message['picked'] ?? null;
                $html .= '<div class="replies">';
                foreach ($message['replies'] as $reply) {
                    $isPicked = $picked !== null && $reply === $picked;
                    $html .= '<span class="reply' . ($isPicked ? ' reply--picked' : '') . '">' . mb_e($reply) . '</span>';
                }
                $html .= '</div>';
            }
        }

        if ($input) {
            $html .= '<div class="thread-input"><span>Write a message…</span>'
                . '<span class="send">' . mb_icon('send') . '</span></div>';
        }

        return $html . '</div>';
    }
}

if (!function_exists('mb_flowmap')) {
    /**
     * The builder's view: a parent block and the child blocks its quick
     * replies lead to.
     */
    function mb_flowmap(array $options = []): string
    {
        $kind     = $options['kind'] ?? 'Bot response';
        $text     = $options['text'] ?? 'Hi 👋 What can I help you with today?';
        $children = $options['children'] ?? [
            ['label' => 'Pricing', 'note' => 'Quick reply'],
            ['label' => 'Support', 'note' => 'Quick reply'],
            ['label' => 'Book a demo', 'note' => 'Quick reply'],
        ];

        $html = '<div class="flowmap">'
            . '<div class="node node--root node--active">'
            . '<div class="node-kind">' . mb_e($kind) . '</div>'
            . '<div class="node-text">' . $text . '</div>'
            . '</div>'
            . '<div class="node-children">';

        foreach ($children as $child) {
            $highlight = !empty($child['highlight']) ? ' node-child--signal' : '';
            $html .= '<div class="node-child' . $highlight . '">' . mb_e($child['label'])
                . '<span>' . mb_e($child['note'] ?? 'Quick reply') . '</span></div>';
        }

        return $html . '</div></div>';
    }
}

if (!function_exists('mb_phone')) {
    /**
     * A WhatsApp thread on a device.
     *
     * $messages accepts:
     *   ['in'  => 'text', 'time' => '21:42']              customer message
     *   ['out' => 'text', 'time' => '21:42', 'buttons' => ['A','B']]  bot reply
     */
    function mb_phone(array $messages, array $options = []): string
    {
        $name   = $options['name'] ?? 'Atlas Clinic';
        $status = $options['status'] ?? 'Business account';

        $html = '<div class="phone">'
            . '<div class="phone-bar">'
            . '<span class="av">' . mb_icon('whatsapp') . '</span>'
            . '<span><span class="nm">' . mb_e($name) . '</span><span class="st">' . mb_e($status) . '</span></span>'
            . '</div><div class="phone-body">';

        foreach ($messages as $message) {
            $isOut = isset($message['out']);
            $text  = $isOut ? $message['out'] : ($message['in'] ?? '');
            $time  = $message['time'] ?? '';

            $html .= '<div class="wa' . ($isOut ? ' wa--out' : '') . '">' . $text;

            if (!empty($message['buttons'])) {
                $html .= '<div class="wa-btns">';
                foreach ($message['buttons'] as $button) {
                    $html .= '<span class="wa-btn">' . mb_e($button) . '</span>';
                }
                $html .= '</div>';
            }

            if ($time !== '') {
                $html .= '<time>' . mb_e($time) . '</time>';
            }

            $html .= '</div>';
        }

        $html .= '</div><div class="phone-input"><span>Message</span>'
            . '<span class="snd">' . mb_icon('send') . '</span></div></div>';

        return $html;
    }
}

if (!function_exists('mb_datarows')) {
    /**
     * Captured entity values as they land in Users Data.
     */
    function mb_datarows(array $rows, string $title = 'Users Data'): string
    {
        $html = '<div class="datarows">'
            . '<div class="datarow datarow--head"><span>' . mb_e($title) . '</span></div>';

        foreach ($rows as $key => $value) {
            $html .= '<div class="datarow">'
                . '<span class="key">@' . mb_e($key) . '</span>'
                . '<span class="val">' . mb_e($value) . '</span>'
                . '<span class="ok">' . mb_icon('check-circle') . '</span>'
                . '</div>';
        }

        return $html . '</div>';
    }
}

if (!function_exists('mb_path')) {
    /**
     * A left-to-right pipeline, used for the WhatsApp message path.
     * Each step: ['n' => 'Step 1', 't' => 'Title', 'd' => 'detail', 'style' => 'green'|'signal']
     */
    function mb_path(array $steps): string
    {
        $html = '<div class="path">';
        $last = count($steps) - 1;

        foreach ($steps as $index => $step) {
            $style = isset($step['style']) ? ' path-step--' . mb_e($step['style']) : '';
            $html .= '<div class="path-step' . $style . '">';
            if (!empty($step['n'])) {
                $html .= '<div class="n">' . mb_e($step['n']) . '</div>';
            }
            $html .= '<div class="t">' . mb_e($step['t']) . '</div>';
            if (!empty($step['d'])) {
                $html .= '<div class="d">' . mb_e($step['d']) . '</div>';
            }
            $html .= '</div>';

            if ($index !== $last) {
                $html .= '<span class="path-arrow">' . mb_icon('chevron-right') . '</span>';
            }
        }

        return $html . '</div>';
    }
}

if (!function_exists('mb_window')) {
    /**
     * A browser frame used to place the website widget in context.
     */
    function mb_window(string $address, string $body): string
    {
        return '<div class="window">'
            . '<div class="window-bar"><i></i><i></i><i></i>'
            . '<span class="addr">' . mb_e($address) . '</span></div>'
            . '<div class="window-body">' . $body . '</div></div>';
    }
}
