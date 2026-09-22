<?php
/**
 * Video tutorials, grouped by product.
 */

return [
    'core' => [
        'label'       => 'Maxbot Core',
        'description' => 'Building, testing and publishing the conversation itself.',
        'items'       => [
            [
                'title'       => 'How to create and launch a simple quick reply chatbot',
                'description' => 'Create an agent, build a quick reply flow, test the conversation, and connect it to a chatbot project.',
                'level'       => 'Beginner',
                'duration'    => '4 min',
                'icon'        => 'messages',
                'url'         => 'https://www.youtube.com/watch?v=KPW02IaFLAo',
            ],
            [
                'title'       => 'How to collect and use user data',
                'description' => 'Work with built-in and custom entities, validate input, reuse captured values in bot messages, and review saved entries.',
                'level'       => 'Beginner',
                'duration'    => '5 min',
                'icon'        => 'database',
                'url'         => 'https://www.youtube.com/watch?v=RIAog7f95GI',
            ],
            [
                'title'       => 'How to use templates',
                'description' => 'Browse the template library, preview a template, apply it as a starting point, and connect the imported flow to a project.',
                'level'       => 'Beginner',
                'duration'    => '3 min',
                'icon'        => 'grid',
                'url'         => 'https://www.youtube.com/watch?v=k1vgbI-hr5c',
            ],
            [
                'title'       => 'How to customize the chat widget',
                'description' => 'Personalize the widget text, adjust colours, change its position, and preview the result on the live page.',
                'level'       => 'Beginner',
                'duration'    => '3 min',
                'icon'        => 'sliders',
                'url'         => 'https://www.youtube.com/watch?v=3W5305UBiNw',
            ],
            [
                'title'       => 'Build Smarter Maxbot Flows with Keywords, Variables, Join & User Data',
                'description' => 'Build a more advanced Maxbot flow with saved responses, keyword-based routing, fallback logic, reusable variables, Join routing, and captured user data.',
                'level'       => 'Advanced flow',
                'duration'    => 'Advanced guide',
                'icon'        => 'flow',
                'url'         => 'https://www.youtube.com/watch?v=nq0Iv3PaLHc',
            ],
        ],
    ],

    'whatsapp' => [
        'label'       => 'WhatsApp Integration',
        'description' => 'Connect Maxbot to Meta’s WhatsApp Cloud API, prepare it for production, and use WhatsApp carousel templates.',
        'items'       => [
            [
                'title'       => 'Maxbot WhatsApp Integration for WordPress | Complete Setup & Production Guide',
                'description' => 'Follow the complete WhatsApp Integration setup from Meta and WordPress configuration through webhook verification, project setup, testing, and production readiness.',
                'level'       => 'Setup & production',
                'duration'    => 'Complete guide',
                'icon'        => 'whatsapp',
                'url'         => 'https://www.youtube.com/watch?v=vrLrL-AoL0E',
            ],
            [
                'title'       => 'Configure and Use WhatsApp Carousel Templates in Maxbot',
                'description' => 'Create and configure WhatsApp carousel templates in Maxbot, build the cards and buttons, and use the approved template in your WhatsApp conversations.',
                'level'       => 'Templates',
                'duration'    => 'Focused guide',
                'icon'        => 'grid',
                'url'         => 'https://www.youtube.com/watch?v=IzvRbJcr33M',
            ],
        ],
    ],
];
