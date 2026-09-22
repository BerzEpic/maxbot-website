<?php

final class WidgetRuntimeConfig
{
    public const PROFILE_DYNAMIC = 'dynamic';
    public const PROFILE_TEMPLATE_DEMO = 'template_demo';

    public static function build(string $profile = self::PROFILE_DYNAMIC): array
    {
        if ($profile === self::PROFILE_TEMPLATE_DEMO) {
            return [
                'timeoutChatbotResponse' => '1',
                'timeoutChatbotTyping' => '1',
                'messageSound' => 'when.mp3',
            ];
        }

        return [
            'timeoutChatbotResponse' => '1',
            'timeoutChatbotTyping' => '1',
            'messageSound' => 'when.mp3',
        ];
    }
}