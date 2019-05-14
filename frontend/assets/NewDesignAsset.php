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
class NewDesignAsset extends AssetBundle
{
	
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [ 
        
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',        
        
         'https://fonts.googleapis.com/css?family=Nunito+Sans:400,900',
         'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
		 'https://mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.css',
          'newcss/style.css',
          'newcss/animate.css',
          'toastr/toastr.css',
         'toastr/toastr.min.css',
         //'tour/bootstrap-tour.min.css',
        
       
    ];

    public $js = [    
		//'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
        'https://mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',		
        'newjs/parallax.js',  
        'toastr/toastr.min.js',
        //'tour/bootstrap-tour.min.js',
		
    ];

    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
		 'common\assets\Html5shiv',
		 
		//'common\assets\AdminLte',
    ];
}
