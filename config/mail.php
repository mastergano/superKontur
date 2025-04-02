<?php

return [

    'mailer' => env('MAIL_MAILER', 'smtp'),

    'host' => env('MAIL_HOST', 'sandbox.smtp.mailtrap.io'),

    'port' => env('MAIL_PORT', 2525),

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'noreply@example.com'),
        'name' => env('MAIL_FROM_NAME', env('APP_NAME')),
    ],

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),

    'sendmail' => '/usr/sbin/sendmail -bs',
];
