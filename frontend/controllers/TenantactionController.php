<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class TenantactionController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "common";
    }
     public function actionIndex() {
        return $this->render('index');
    }

    public function actionSearch() {
        return $this->render('search');
    }

	 public function actionMyescrow() {
        return $this->render('myescrow');
    }
	public function actionMykyc() {
        return $this->render('mykyc');
    }
 public function actionBidpdetails() {
        return $this->render('bidpdetails');
    }

	 public function actionSchedulevisit() {
        return $this->render('schedulevisit');
    }


}
