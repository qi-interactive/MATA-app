<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-mata',
    'basePath' => dirname(__DIR__),
    'name' => 'MATA CMS',
    'controllerNamespace' => 'matacms\controllers',
    'bootstrap' => ['log'],
    'disabledModulesBootstraps' => ['mata\\user\\Bootstrap'],
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
        'moduleMenu' => [
            'class' => 'mata\modulemenu\Module',
            'runBootstrap' => true,
            'moduleFolders' => ["@vendor/matacms", "@matacms/modules"],
        ],
        'media' => [
            'class' => 'mata\media\Module',
        ],
    ],
    'components' => [
        'moduleMenuManager' => [
            'class' => 'mata\modulemenu\components\ModuleMenuManager',
        ],
        'moduleAccessibilityManager' => [
            'class' => 'matacms\user\components\ModuleAccessibilityManager'
        ],
        'assetManager' => [
            'linkAssets' => true
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'csrfParam' => '_matacmscsrf',
            'enableCsrfCookie' => false
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'view' => [
            'class' => 'matacms\web\View',
            'theme' => [
                'pathMap' => [
                    '@matacms/user/views' => '@vendor/matacms/matacms-simple-theme',
                    '@matacms/views' => '@vendor/matacms/matacms-simple-theme',
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
    ],
    'params' => $params,
];
