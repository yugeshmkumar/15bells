<?php

namespace frontend\modules\user\controllers;


use frontend\models\ContactForm;
//use backend\models\LoginForm;
use yii\web\Controller;

use common\commands\command\SendEmailCommand;
use common\models\User;
use frontend\modules\user\models\LoginForm;
use frontend\modules\user\models\PasswordResetRequestForm;
use frontend\modules\user\models\ResetPasswordForm;
use frontend\modules\user\models\SignupForm;
use Yii;
use yii\base\Exception;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    private $_menu;

//    public function __construct() {
//        Yii::$app->view->params['customMenu'] = [
//            ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']]
//        ];
//    }
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "homeLayout";
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ],
			
            'oauth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successOAuthCallback']
            ]
        
        ];
    }
 public function actionPostlogin1(){
	 $this->layout="commontest";
	 return $this->render('postlogin1');
 }
	public function whensignup(){
		
		$model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
				
            $user = $model->signup();
            if ($user && Yii::$app->getUser()->login($user)) {
				 return $this->checkrole();
            }
        }
	}
	public function checkrole(){
		
	$checkrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id,'item_name'=>"administrator"])->one();
		if($checkrole){
			
	return Yii::$app->response->redirect(Yii::getAlias('@backendUrl'), 301)->send();
		}else{
			 $this->layout="common";
		return $this->render('postlogin');
		}

	}
	public function whenlogin(){
		
		 if (Yii::$app->request->isAjax) {
            $login->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($login);
		}
	   if ($login->load(Yii::$app->request->post()) && $login->login()) {
		  
		    return $this->checkrole();
		    //return $this->goBack();
            //return $this->render('postlogin', ['loginModel' => $login]);
        }
	}
	
	public function actionPostlogin(){
		$this->layout="common";
		$checkrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id,'item_name'=>"administrator"])->one();
		if($checkrole){
			
	return Yii::$app->response->redirect(Yii::getAlias('@backendUrl'), 301)->send();
		}else{
		return $this->render('postlogin');
		}
	}
    public function actionIndex() {
		
if(isset($_POST['signup-button'])){

	$model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
				
            $user = $model->signup();
            if ($user && Yii::$app->getUser()->login($user)) {
               return $this->checkrole();
			   //return $this->goHome();
            }
        } 
}

        $login = new LoginForm();        
       if(isset($_POST['login-button'])){ 
	  
	    if (Yii::$app->request->isAjax) {
            $login->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($login);
		}
	   if ($login->load(Yii::$app->request->post()) && $login->login()) {
		    return $this->checkrole();
            //return $this->render('postlogin', ['loginModel' => $login]);
        }
		
	   }else{            
            return $this->render('index', ['loginModel' => $login]);
        }
    }

    public function actionAboutUs() {
        return $this->render('about_us');
    }

    public function actionHowItWorks() {
        return $this->render('how_it_works');
    }

    public function actionContact() { //print_r(Yii::$app->request->post());die;
        $model = new ContactUs();
        $model->full_name = Yii::$app->request->post('full_name');
        $model->email = Yii::$app->request->post('email');
        $model->contact_number = Yii::$app->request->post('contact_number');
        $model->message = Yii::$app->request->post('message');


        if ($model->validate()) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => \Yii::t('frontend', 'There was an error sending email.'),
                    'options' => ['class' => 'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
                    'model' => $model,
                    'menu' => $this->_menu
        ]);
    }

}
