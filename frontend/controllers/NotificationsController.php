<?php

namespace frontend\controllers;

class NotificationsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout="dashboard";
        return $this->render('index');
    }

}
