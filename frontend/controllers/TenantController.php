<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class TenantController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "tenantLayout";
    }
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionListProperty() {
        return $this->render('list_property');
    }

}
