<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=qi-db-01.cgaiktlnv4ep.eu-west-1.rds.amazonaws.com;dbname=baza-medialna-dev',
            'username' => 'baza-medialna',
            'password' => 'p&pGC9t#3cW7FdUo',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
