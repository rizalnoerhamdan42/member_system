<?php
// config.php
return [
    'db' => [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'name' => 'member_system'
    ],
    
    'callback' => 'http://localhost/member_system/oauth_callback.php',
    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys' => [
                'id'     => '60217384199-dv56c95gpfa2uhv78tbglip1reqq9rsg.apps.googleusercontent.com',
                'secret' => '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',
            ],
        ],
        'Facebook' => [
            'enabled' => true,
            'keys' => [
                'id'     => '4490021534550752',
                'secret' => 'ef2f510223287c23351af8232841d424',
            ],
        ],
    ],
];