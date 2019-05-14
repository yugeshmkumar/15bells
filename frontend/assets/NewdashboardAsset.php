<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class NewdashboardAsset extends AssetBundle
{
	
     public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
	
     'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
     'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',     
     'https://fonts.googleapis.com/css?family=Nunito+Sans:400,700,900',
    
     'newdashcss/dashboard.css',
     'toastr/toastr.css',
     'toastr/toastr.min.css',
        
         
    ];
    public $js = [
       // 'js/main.js',
        'toastr/toastr.min.js',
       // 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
       'https://mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.js',


	   'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
     
      
    ];
   // public $jsOptions = ['position' => \yii\web\View::POS_LOAD];

    public $depends = [
       'yii\web\YiiAsset',
       // 'common\assets\UserLte',
		
        'common\assets\Html5shiv'
    ];
    
}
