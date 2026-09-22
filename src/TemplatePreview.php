<?php

require_once __DIR__ . '/TemplateCatalog.php';
require_once __DIR__ . '/WidgetRuntimeConfig.php';

final class TemplatePreview
{
    public static function buildContext(string $templateId): array
    {
        $tpl = TemplateCatalog::find($templateId);

        if (!$tpl || empty($tpl['flow_editor_rive']) || !is_readable($tpl['flow_editor_rive'])) {
            throw new RuntimeException('Template or rive file not found.');
        }

        $slug = (string) ($tpl['slug'] ?? $templateId);
        $riveSrc = (string) $tpl['flow_editor_rive'];
        $meta = is_array($tpl['meta'] ?? null) ? $tpl['meta'] : [];

        $entryToken = '';

        if (!empty($meta['entry_topic']) && is_string($meta['entry_topic'])) {
            $entryToken = trim($meta['entry_topic']);
        }

        if ($entryToken === '') {
            $rawRive = file_get_contents($riveSrc);
            if ($rawRive !== false && preg_match('/\{topic=(\d+)\}/', $rawRive, $m)) {
                $entryToken = $m[1];
            }
        }

        if ($entryToken === '') {
            $entryToken = 'tpl_' . $slug;
        }

        return [
            'flowId' => (string) $entryToken,
            'rivePath' => TemplateCatalog::baseUrl() . '/' . $slug . '/flow-editor.rive',
            'settings' => WidgetRuntimeConfig::build(WidgetRuntimeConfig::PROFILE_TEMPLATE_DEMO),
            'agent_photo_url' => APP_BASE_URL . '/widget/images/default-bot.gif',
            'agent_name' => $meta['agent_name'] ?? 'Maxbot Assistant',
            'agent_occupation' => $meta['agent_occupation'] ?? 'Virtual assistant',
            'agent_desc' => $meta['description'] ?? 'Template preview',
            'uniqid' => uniqid('mb_tpl_', true),
        ];
    }
}