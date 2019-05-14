<?php
$config = [
    'homeUrl'=>Yii::getAlias('@frontendUrl'),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'modules' => [
        'user' => [
            'class' => 'frontend\modules\user\Module'
        ],
		
		'comm' => [
            'class' => 'frontend\modules\comm\Module'
        ],
		'transaction' => [
            'class' => 'frontend\modules\transaction\Module'
        ],
        'api' => [
            'class' => 'frontend\modules\api\Module',
            'modules' => [
                'v1' => 'frontend\modules\api\v1\Module'
            ]
        ],
		 'gridview' =>  [
        'class' => '\kartik\grid\Module'
    ]
    ],
    'components' => [
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                 'class' => 'yii\authclient\clients\Google',
                 'clientId' => '143204280306-k9uco4v1hukel4mm83ql4f2batnvr2gt.apps.googleusercontent.com',
                  'clientSecret' => 'xNcJ2Akv6xKnn8zMXLiLL55J',
             ],
              
                'facebook' => [
                     'class' => 'yii\authclient\clients\Facebook',
					'authUrl'=>'http://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '1146628598799680',
                    'clientSecret' => '37abb6ebbfacb9857d7a9762a3c484a5',
                    'scope' => 'email,public_profile',
                  //  'attributeNames' => [
                   //     'name',
                   //     'email',
                   //     'first_name',
                   //     'last_name',
                   // ]
                ]
            ]

        
        ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'request' => [
            'cookieValidationKey' => getenv('FRONTEND_COOKIE_VALIDATION_KEY'),
            'enableCsrfValidation'=>false
            
        ],
        'user' => [
            'class'=>'yii\web\User',
            'identityClass' => 'common\models\User',
            'loginUrl'=>['/user/sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => 'common\behaviors\LoginTimestampBehavior'
        ]
    ]
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class'=>'yii\gii\Module',
        'generators'=>[
            'crud'=>[
                'class'=>'yii\gii\generators\crud\Generator',
                'messageCategory'=>'frontend'
            ]
        ]
    ];
}

if (YII_ENV_PROD) {
    // Maintenance mode
    $config['bootstrap'] = ['maintenance'];
    $config['components']['maintenance'] = [
        'class' => 'common\components\maintenance\Maintenance',
        'enabled' => function ($app) {
            return $app->keyStorage->get('frontend.maintenance') === 'enabled';
        }
    ];

    // Compressed assets
    $config['components']['assetManager'] = [
      'bundles' => require(__DIR__ . '/assets/compress.php')
    ];
}

return $config;
