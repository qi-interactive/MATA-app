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
    'modules' => [
        'user' => [
            'class' => 'matacms\user\Module',
            'controllerMap' => [
                'security' => 'matacms\controllers\user\SecurityController'
            ],
        ],
        'rbac' => [
            'class' => 'matacms\rbac\Module',
        ],
        'moduleMenu' => [
            'class' => 'mata\modulemenu\Module',
            'runBootstrap' => true,
            'moduleFolders' => ["@vendor/matacms", "@matacms/modules"],
        ],
    ],
    'components' => [
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
                    '@matacms/user/views/security' => '@vendor/matacms/matacms-simple-theme/security',
                    '@matacms/views' => '@vendor/matacms/matacms-simple-theme',
                    '@matacms/user/views/security' => '@matacms/views/user/security'
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
      // 'errorHandler' => [
      //     'errorAction' => '/mata/site/error',
      // ],
    ],
    'params' => $params,
];
