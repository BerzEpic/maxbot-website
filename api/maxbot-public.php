<?php

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'maxbot_macros':
        $file = __DIR__ . '/../widget/js/chatbotui/rives/tasks.rive';

        if (!is_readable($file)) {
            http_response_code(404);
            echo 'Macros file not found.';
            exit;
        }

        header('Content-Type: text/plain; charset=utf-8');
        readfile($file);
        exit;

    case 'maxbot_add_value_user_data':
    case 'maxbot_add_faq_choice':
    case 'maxbot_add_unsetted_triggers_db':
    case 'maxbot_remove_unsetted_triggers_db':
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => true,
            'demo' => true,
        ]);
        exit;

    default:
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Unknown action',
        ]);
        exit;
}