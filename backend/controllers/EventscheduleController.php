<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use common\models\ContactForm;
use common\models\UserForm;
use common\models\IndexForm;
use common\models\ParentForm;
use common\models\MainForm;
use common\models\users;
use common\models\applicationform;
use common\models\customers;
use common\models\auth_assignment;





class EventscheduleController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }




	
	public function actionCreateeventtwo()
    {
	return $this->renderPartial('createeventtwo',['sd'=>0]);
	}
	
	public function actionAddconttwo()
    {
	return $this->renderPartial('addconttwo',['sd'=>0]);
	}
	
public function actionCreateevent()
    {
	return $this->renderPartial('createevent',['sd'=>0]);
	}
	
	public function actionAddcont()
    {
	return $this->renderPartial('addcont',['sd'=>0]);
	}
	
	
	
	
	
	
	
	
	
	
    
    
    
}
