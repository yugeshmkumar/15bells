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
class TransactionAsset extends AssetBundle
{
	
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [ 
        
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',        
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
         'https://fonts.googleapis.com/css?family=Nunito+Sans:400,900',
         'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
         
          
         'newcss/flipclock.css',
        
       
    ];

    public $js = [    
		//'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
        
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
		
         
        'newcss/flipclock.js',
		
    ];

    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
		 'common\assets\Html5shiv',
		 
		//'common\assets\AdminLte',
    ];
}