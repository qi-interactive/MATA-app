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
    'controllerNamespace' => 'mata\controllers',
    'bootstrap' => ['log'],
    'modules' => [
    'user' => [
           'class' => 'mata\user\Module',
       ],
    'moduleMenu' => [
           'class' => 'mata\modulemenu\Module',
           'runBootstrap' => false
       ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'assetManager' => [
            'linkAssets' => true
        ],
        'urlManager' => [
          'enablePrettyUrl' => true,
          'showScriptName' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
