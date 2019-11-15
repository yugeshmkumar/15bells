<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class SitemapController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "homeLayout";
    }




    public function actionIndex() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');

        return $this->renderPartial('index');
    }
    
   

}
