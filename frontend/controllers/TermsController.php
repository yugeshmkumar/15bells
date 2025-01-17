<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class TermsController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "termsLayout";
    }
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionPrivacypolicy() {
        return $this->render('privacy-policy');
    }

    public function actionRefundcancellation() {
        return $this->render('refund');
    }
    

}
