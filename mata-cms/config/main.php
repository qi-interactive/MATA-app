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
    'controllerNamespace' => 'matacms\controllers',
    'name' => "MATA CMS",
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
           'class' => 'mata\user\Module',
           'controllerMap' => [
                'security' => 'matacms\controllers\user\SecurityController'
            ],
       ],
        'moduleMenu' => [
           'class' => 'mata\modulemenu\Module',
           'runBootstrap' => true,
           'moduleFolders' => ['@vendor/mata', "@vendor/matacms", "@matacms/modules"]
       ],
        'settings' => [
           'class' => 'matacms\settings\Module'
       ],
        'media' => [
           'class' => 'mata\media\Module'
       ],
        'post' => [
           'class' => 'matacms\post\Module'
       ],
        'news' => [
          'class' => 'matacms\modules\news\Module'
       ],
        'lab' => [
          'class' => 'matacms\modules\lab\Module'
       ],
        'contentBlock' => [
            'class' => 'matacms\contentblock\Module'
        ],
        'form' => [
            'class' => 'mata\form\Module'
        ]
    ],
    'components' => [
        'assetManager' => [
            'linkAssets' => true
        ],
        'cache' => [
                'class' => 'yii\caching\FileCache',
            ],
        'urlManager' => [
          'enablePrettyUrl' => true,
          'showScriptName' => false,
        ],
        'view' => [
              'theme' => [
                  'pathMap' => [
                        '@matacms/views' => '@vendor/matacms/matacms-simple-theme',
                        '@mata/user/views/security' => '@matacms/views/user/security'

                  ],
              ],
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
        // 'errorHandler' => [
        //     'errorAction' => '/mata/site/error',
        // ],
    ],
    'params' => $params,
];
