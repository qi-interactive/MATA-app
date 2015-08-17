<?php
return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'user' => [
            'loginUrl'        => ['/user/security/login'],
            'identityClass' => 'matacms\user\models\User',
        ],
    ],
];
