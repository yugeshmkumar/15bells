<?php

namespace frontend\controllers;

class TransactiontypeController extends \yii\web\Controller
{
    public function actionIndex()

    {
        $this->layout = "homeLayout";
        return $this->render('index');

    }

}