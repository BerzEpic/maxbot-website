<?php

final class TemplateCatalog
{
    public static function baseDir(): string
    {
        return __DIR__ . '/../template-assets';
    }

    public static function baseUrl(): string
    {
        return APP_BASE_URL . '/template-assets';
    }

    private static function readMeta(string $templateSlug): ?array
    {
        $path = self::baseDir() . '/' . $templateSlug . '/meta.json';

        if (!is_readable($path)) {
            return null;
        }

        $raw = file_get_contents($path);
        if ($raw === false) {
            return null;
        }

        $decoded = json_decode($raw, true);
        return is_array($decoded) ? $decoded : null;
    }

    public static function all(): array
    {
        $dir = self::baseDir();
        if (!is_dir($dir)) {
            return [];
        }

        $items = scandir($dir);
        if (!is_array($items)) {
            return [];
        }

        $out = [];

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $subDir = $dir . '/' . $item;
            if (!is_dir($subDir)) {
                continue;
            }

            $meta = self::readMeta($item);
            if ($meta === null) {
                continue;
            }

            $id = isset($meta['id']) && is_string($meta['id']) ? $meta['id'] : $item;

            $thumbUrl = null;
            if (!empty($meta['thumbnail']) && is_string($meta['thumbnail'])) {
                $thumbUrl = self::baseUrl() . '/' . $item . '/' . ltrim($meta['thumbnail'], '/');
            }

            $out[] = [
                'id' => $id,
                'slug' => $item,
                'meta' => $meta,
                'thumbnail_url' => $thumbUrl,
            ];
        }

        return $out;
    }

    public static function find(string $templateId): ?array
    {
        $dir = self::baseDir();
        if (!is_dir($dir)) {
            return null;
        }

        $items = scandir($dir);
        if (!is_array($items)) {
            return null;
        }

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $subDir = $dir . '/' . $item;
            if (!is_dir($subDir)) {
                continue;
            }

            $meta = self::readMeta($item);
            if ($meta === null) {
                continue;
            }

            $id = isset($meta['id']) && is_string($meta['id']) ? $meta['id'] : $item;

            if ($id !== $templateId) {
                continue;
            }

            $flowTxt = $subDir . '/flow-editor.txt';
            $rive = $subDir . '/flow-editor.rive';

            return [
                'id' => $id,
                'slug' => $item,
                'meta' => $meta,
                'dir' => $subDir,
                'flow_editor_txt' => is_readable($flowTxt) ? $flowTxt : null,
                'flow_editor_rive' => is_readable($rive) ? $rive : null,
            ];
        }

        return null;
    }
}