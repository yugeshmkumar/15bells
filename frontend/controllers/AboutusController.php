<?php
namespace frontend\controllers;

use yii\web\Controller;
use Yii;




class AboutusController extends \yii\web\Controller
{
    public function actionIndex()

    {

         //    meta tags description starts here  

		$title =  \Yii::$app->view->title = '15Bells Blogs - Revolution in Real Estate Technology ';

		Yii::$app->view->registerMetaTag([
		'name' => 'viewport',			
		'content' => 'width=device-width,  minimum-scale=1,  maximum-scale=1'
		]);
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => 'For the first time 15 Bells, a Commercial Real Estate company trades in real time. We proudly represent our self as the one-stop solution for all the commercial property needs – BUY, SELL or LEASE a commercial property in Delhi NCR Just within 15 Hours!!'
		]);
		Yii::$app->view->registerMetaTag([
		'name' => 'author',			
		'content' => '15Bells'
		]);
        Yii::$app->view->registerMetaTag([
            'name' => 'robots',			
            'content' => 'index, follow'
            ]);



        $this->layout = "homeLayout";
        return $this->render('index');

    }




    public function actionDetails()

    {
        $this->layout = "homeLayout";
        return $this->render('aboutdetails');

    }

    

}
