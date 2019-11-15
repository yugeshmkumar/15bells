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
class AfterloginAsset extends AssetBundle
{
	
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
	 'css2/animate.min',
	 'css2/bootstrap.min',
	 'css2/responsiv',
        'css2/style.css',
		'css2/dash.css',
		 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
        //'assets/global/plugins/bootstrap/css/bootstrap.min.css',
        'assets/global/plugins/uniform/css/uniform.default.css',
        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
       'assets/pages/css/profile.min.css',
	    'assets/global/plugins/cubeportfolio/css/cubeportfolio.css',
      
        'assets/global/css/components.min.css',
        'assets/global/css/plugins.min.css',
         
       'assets/pages/css/portfolio.min.css',

        'assets/layouts/layout/css/layout.min.css',
        'assets/layouts/layout/css/themes/darkblue.min.css',
        'assets/layouts/layout/css/custom.min.css',
    ];
    public $js = [
        'js/app.js',
		  //'assets/global/plugins/jquery.min.js',
      // 'assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'assets/global/plugins/js.cookie.min.js',
        'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'assets/global/plugins/jquery.blockui.min.js',
        'assets/global/plugins/uniform/jquery.uniform.min.js',
        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
       'assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js',
       'http://maps.google.com/maps/api/js?key=AIzaSyCpH25u4plcKxY7lA4nWfq9IVI54kvOBh4&sensor=false',
        'assets/global/plugins/gmaps/gmaps.min.js',
       'assets/global/scripts/app.min.js',
       'assets/pages/scripts/maps-google.min.js',
        'assets/pages/scripts/portfolio-1.min.js',

        'assets/global/scripts/app.min.js',
      
        'assets/layouts/layout/scripts/layout.min.js',
        'assets/layouts/layout/scripts/demo.min.js',
        'assets/layouts/global/scripts/quick-sidebar.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'common\assets\UserLte',
		
       // 'common\assets\Html5shiv'
    ];
}
