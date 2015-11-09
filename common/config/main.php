<?php
return [
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
        'language' => [
            'class' => 'matacms\language\Module'
        ],
    ],
];
