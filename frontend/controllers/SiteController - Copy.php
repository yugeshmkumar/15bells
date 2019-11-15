<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ContactForm;
use common\models\ContactUs;
use yii\web\Controller;

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
        Yii::$app->view->params['customMenu'] = [
		
            ['label' => Yii::t('frontend', 'HOME'), 'url' => ['/site/index'], 'active' => false],
			 ['label' => Yii::t('frontend', 'ABOUT US'), 'url' => ['/site/abtus'], 'active' => false],
			  ['label' => Yii::t('frontend', 'HOW IT WORKS'), 'url' => ['/site/works'], 'active' => false],
            ['label' => Yii::t('frontend', 'BUYERS'), 'url' => ['/buyer/index', 'active' => false]],
            ['label' => Yii::t('frontend', 'SELLERS'), 'url' => ['/seller/index', 'active' => false]],
            ['label' => Yii::t('frontend', 'TANENT'), 'url' => ['/lessee/index', 'active' => false]],
			  ['label' => Yii::t('frontend', 'LAND LORD'), 'url' => ['/lessee/index', 'active' => false]],
			    ['label' => Yii::t('frontend', 'BROKERS'), 'url' => ['/lessee/index', 'active' => false]],
				'<li class="dropdown">
          <a href="/register" class="dropdown-toggle" data-toggle="dropdown">REGISTER</a>
            <ul id="login-dp" class="dropdown-menu animated flipInX">
                <li>
                <div class="row">
              <div class="col-md-12" style="font-size: 17px; font-family:Roboto, sans-serif;">
                <span class="registerhead">!! WELCOME !!</span>
                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                        <i class="fa fa-user-circle-o first" aria-hidden="true"></i>
                       <input type="email" class="form-control"  name="exampleInputEmail2" id="exampleInputEmail2" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-phone-square second" aria-hidden="true"></i>
                       <input type="number" class="form-control" name="exampleInputPassword2" id="exampleInputPassword2" placeholder="mobile number" required>
                                             
                    </div>
                    <div class="form-group">
                     <br>
                       <button type="submit" class="btn btn-primary btn-block">Register</button>
                       <br>
                    </div>
                 </form>
              </div>
           </div>
        </li>
        </ul>
        </li> ','  <li class="dropdown">
          <a href="/login" class="dropdown-toggle" data-toggle="dropdown">LOGIN</a>
            <ul id="login-dp" class="dropdown-menu animated flipInX">
                <li>
                <div class="row">
              <div class="col-md-12" style="font-size: 17px; font-family:Roboto, sans-serif;">
                Login via
                <div class="social-buttons">
                  <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                  <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                </div>
                                or
                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                        <i class="fa fa-user-circle-o first" aria-hidden="true"></i>
                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-phone-square second" aria-hidden="true"></i>
                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href=""><h6>Forget the password ?</h6></a></div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                    </div>
                    <div class="checkbox">
                       <label>
                       <input type="checkbox"> keep me logged-in
                       </label>
                    </div>
                 </form>
              </div>
           </div>
        </li>
        </ul>
        </li> ',
			    
            ['label' => Yii::t('frontend', 'CONTACT US'),
                'url' => ['/user/sign-in/login'],
                'visible' => Yii::$app->user->isGuest,
                'active' => false, 'options' => ['class' => 'last']],
            [
                'label' => Yii::t('frontend', 'LOGOUT'),
                'url' => ['/user/sign-in/logout'],
                'visible' => !Yii::$app->user->isGuest,
                'linkOptions' => ['data-method' => 'post'],
                'active' => false, 'options' => ['class' => 'last']
            ]
        ];
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
            ]
        ];
    }

    public function actionIndex() {
        $contact = new ContactUs;
        return $this->render('index', ['contact' => $contact]);
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
