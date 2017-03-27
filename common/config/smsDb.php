<?php

return [
    'class' => 'yii\db\Connection',
    // 配置主服务器
    'dsn' => 'mysql:host=10.1.11.27;dbname=sms;port=3309',
    'username' => 'hjhdb',
    'password' => '123456',
    // 配置从服务器
    'slaveConfig' => [
        'username' => 'hjhdb',
        'password' => '123456',
        'attributes' => [
            // use a smaller connection timeout
            PDO::ATTR_TIMEOUT => 10,
        ],
    ],
    // 配置从服务器组
    'slaves' => [
        ['dsn' => 'mysql:host=10.1.11.27;dbname=sms;port=3309'],
        ['dsn' => 'mysql:host=10.1.11.27;dbname=sms;port=3309'],
        ['dsn' => 'mysql:host=10.1.11.27;dbname=sms;port=3309']
    ],
];