<?php

namespace frontend\controllers;

class AboutusController extends \yii\web\Controller
{
    public function actionIndex()

    {
        $this->layout = "homeLayout";
        return $this->render('index');

    }




    public function actionDetails()

    {
        $this->layout = "homeLayout";
        return $this->render('aboutdetails');

    }

    

}
