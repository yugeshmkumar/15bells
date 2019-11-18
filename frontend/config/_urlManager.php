<?php
return [
    'class'=>'yii\web\UrlManager',
    'enablePrettyUrl'=>true,
    'showScriptName'=>false ,//true
    'enableStrictParsing' => false,
    'rules'=> [

       // '<controller:\w+>/<action:\w+>/<con:\w+>' => '<controller>/<action>',
      // '<controller:\w+>/<action:\w+>/<con:\w+>' => '<controller>/<action>',
  

         
       // 'register'=>'user/sign-in/signup',
        '<controller>/<id:\d+>'=>'<controller>/view',
       // '<controller:\w+>/<action:\w+>/<con:\w+>' => '<controller>/<action>',
       // '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

        ['pattern' => 'sitemap', 'route' => 'sitemap/index', 'suffix' => '.xml'],
        
        // Pages
        //'addproperty/<id:\d+>' => 'addproperty/view',

        '<city:[A-Za-z0-9 -_.]+>/<proptype:[A-Za-z0-9 -_.]+>/<locality:[A-Za-z0-9 -_.]+>/<id:\d+>' => 'addproperty/view',
        
        ['pattern'=>'page/<slug>', 'route'=>'page/view'],

        // Articles
        ['pattern'=>'article/index', 'route'=>'article/index'],
        ['pattern'=>'blogs', 'route'=>'blogs/index'],
        ['pattern'=>'article/attachment-download', 'route'=>'article/attachment-download'],
        ['pattern'=>'blogs/<slug>', 'route'=>'article/view'],

        // Api
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/article', 'only' => ['index', 'view', 'options']],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/user', 'only' => ['index', 'view', 'options']]
    ]
];
