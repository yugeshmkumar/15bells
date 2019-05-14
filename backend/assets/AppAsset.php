<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
	 'css/style.css',
        'csstrans/site.css',
	'csstrans/style.css',
'csstrans/jquery.countdownTimer.css',
'csstrans/bootstrap-datetimepicker.min.css',
	
    ];
    public $js = [
	'js/app.js',
	'jstrans/custom.js',
 'jstrans/bootstrap.min.js',
'jstrans/jquery.countdownTimer.js',
'jstrans/jquery-2.0.3.js',
'jstrans/bootstrap-datetimepicker.min.js',



    ];
    public $depends = [
	 'yii\web\YiiAsset',
	 'yii\bootstrap\BootstrapAsset',
       // 'common\assets\AdminLte',
        'common\assets\Html5shiv',
       
       // 'yii\bootstrap\BootstrapAsset',
		
    ];
}
