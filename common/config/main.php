<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
    'authManager' => [
               'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
           ],
       'as access' => [
           'class' => 'mdm\admin\components\AccessControl',
           'allowActions' => [
               'admin/*', // add or remove allowed actions to this list
           ]
       ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
