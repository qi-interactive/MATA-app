<?php
return [
    'language' => 'pl-PL',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'matacms\rbac\components\DbManager',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'js/base/jquery.js',
                    ]
                ],
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'matacms\user\Module',
            'modelMap' => [
                'User'             => 'matacms\user\models\User',
                'Account'          => 'matacms\user\models\Account',
                'Profile'          => 'matacms\user\models\Profile',
                'Token'            => 'matacms\user\models\Token',
                'RegistrationForm' => 'matacms\user\models\RegistrationForm',
                'ResendForm'       => 'matacms\user\models\ResendForm',
                'LoginForm'        => 'matacms\user\models\LoginForm',
                'SettingsForm'     => 'matacms\user\models\SettingsForm',
                'RecoveryForm'     => 'matacms\user\models\RecoveryForm',
                'UserSearch'       => 'matacms\user\models\UserSearch',
            ],
            'mailer' => [
                'sender' => 'notifications@matacms.com'
            ]
        ],
        'rbac' => [
            'class' => 'matacms\rbac\Module',
        ],
        'environment' => [
            'class' => 'matacms\environment\Module'
        ],
    ],
];
