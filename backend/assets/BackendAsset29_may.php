<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 3:14 PM
 */

namespace backend\assets;

use yii\web\AssetBundle;

class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/style.css',
		 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'assets/global/plugins/bootstrap/css/bootstrap.min.css',
        'assets/global/plugins/uniform/css/uniform.default.css',
        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
       'assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css',
        'assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css',
        'assets/global/plugins/bootstrap-summernote/summernote.css',
        'assets/global/css/components.min.css',
        'assets/global/css/plugins.min.css',
        'assets/layouts/layout2/css/layout.min.css',
        'assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet',
        'assets/layouts/layout2/css/custom.min.css',
    ];
    public $js = [
        'js/app.js',
		//'assets/global/plugins/jquery.min.js',
       // 'assets/global/plugins/bootstrap/js/bootstrap.min.js',
       // 'assets/global/plugins/js.cookie.min.js',
        'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'assets/global/plugins/jquery.blockui.min.js',
        'assets/global/plugins/uniform/jquery.uniform.min.js',
        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
       
        'assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js',
        'assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js',
        'assets/global/plugins/bootstrap-markdown/lib/markdown.js',
        'assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js',
        'assets/global/plugins/bootstrap-summernote/summernote.min.js',
       
        'assets/global/scripts/app.min.js',
      
        'assets/pages/scripts/components-editors.min.js',
       
        'assets/layouts/layout2/scripts/layout.min.js',
        'assets/layouts/layout2/scripts/demo.min.js',
        'assets/layouts/global/scripts/quick-sidebar.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'common\assets\AdminLte',
        'common\assets\Html5shiv',
		
    ];
}
