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
class FrontendAsset extends AssetBundle
{
	
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [      
        'css/animate.min.css',
        'css/responsiv.css',        
        'font-awesome/css/font-awesome.min.css',
         'css/style.css',
		  'css/stylenew.css',
		
        
    ];

    public $js = [
        'js/bootstrap.min.js',
        'js/circle-progress.js',
		'js/viewportchecker.js',
		'js/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
		 'common\assets\Html5shiv',
		//'common\assets\AdminLte',
    ];
}
