<?php

return [
    'CAPTIONS' => [
        'CODE'        => 'code',
        'SERVER_TIME' => 'server_time',
        'MESSAGE'     => 'message',
        'DATA'        => 'data',
        'ERRORS'      => 'errors',
    ],

    'MESSAGE_CODE' => [
        'SUCCESS'             => 200,
        'BAD_REQUEST'         => 400,
        'UNAUTHORIZED'        => 401,
        'FORBIDDEN'           => 403,
        'NOT_FOUND'           => 404,
        'FORCE_LOGOUT'        => 406,
        'VALIDATE_CODE'       => 422,
        'SERVER_ERROR'        => 500,
        'SERVICE_UNAVAILABLE' => 503,
    ],

    'DATETIME' => [
        'DEFAULT' => 'Y-m-d H:i:s'
    ],

    'SETTING' => [
        'CONTENT_TYPE' => [
            'Content-type' => 'application/json; charset=utf-8'
        ]
    ]
];
