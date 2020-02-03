<?php
$config = [
    'components' => [
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'linkAssets' => false,
            'appendTimestamp' => true,

        
		

        'bundles' => [
            'yii\bootstrap\BootstrapAsset' => [
                'css' => [],
            ],
            
            'dosamigos\google\maps\MapAsset' => [
                'options' => [
                    'key' => 'AIzaSyCpH25u4plcKxY7lA4nWfq9IVI54kvOBh4',
                    'language' => 'id',
                    'version' => '3.1.18'
                ]
            ]
        ],],
    

'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '1494546793951257',
                    'clientSecret' => '24dfa79c237ed4f0def56ad5c1db7439',
                    'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
           // 'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
           'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'info@15bells.com',
            'password' => 'tjyfenrddebwvqgy',
            'port' => '465',
            'encryption' => 'ssl',
            'streamOptions' => [ 'ssl' =>
                [ 'allow_self_signed' => true,
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ]
        ],
    ]
        ],
    'as locale' => [
        'class' => 'common\behaviors\LocaleBehavior',
        'enablePreferredLanguage' => true
    ]
];

/*if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1', '172.17.42.1'],
    ];
}*/

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1', '172.17.42.1'],
    ];
}


return $config;
