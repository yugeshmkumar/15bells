<?php

namespace frontend\modules\user\controllers;

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


class SignInController extends \yii\web\Controller
{
	public $layout ="homeLayout";
       
    public function actions()
    {
        return [
            'oauth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successOAuthCallback']
            ]
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['signup', 'login', 'request-password-reset','otp','fitelogins','sendemail','rgetotp','rverifyotp', 'reset-password', 'oauth','confirmation','search'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => ['signup', 'login', 'request-password-reset','otp','reset-password', 'oauth','confirmation','search'],
                        'allow' => false,
                        'roles' => ['@'],
                        'denyCallback' => function () {
                            return Yii::$app->controller->redirect(['/site/postlogin']);
                        }
                    ],
                    [
                        'actions' => ['logout','fitelogins'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post']
                ]
            ]
        ];
    }

    public function actionLogin() {
        //    meta tags description starts here  

		$title =  \Yii::$app->view->title = 'Login';

		Yii::$app->view->registerMetaTag([
		'name' => 'viewport',			
		'content' => 'width=device-width,  minimum-scale=1,  maximum-scale=1'
		]);
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => 'Redefining Transparency'
		]);
		Yii::$app->view->registerMetaTag([
		'name' => 'author',			
		'content' => '15Bells'
		]);

		//  og tags 

		Yii::$app->view->registerMetaTag([
		'property' => 'og:title',			
		'content' => $title
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:type',			
		'content' => 'website'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:url',			
		'content' => 'https://www.15bells.com'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:image',			
		'content' => 'https://staging.15bells.com/newimg/logo.png'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:description',			
		'content' => 'Strive to create a transparent and safe place for swift real estate transactions with disruptive technology.'
		]);
	
		//    meta tags description ends here  
        $model = new LoginForm();

    //        if(!($model->load(Yii::$app->request->post()))){
               
    //     // if (isset($_GET["code"]) && !empty($_GET["code"])) {

    //     //     echo 'hii';die;
    //     //     $otp = $_GET["code"];


    //     //     if ($model->authentication($otp) == true) {
                   
                
    //     //             Yii::$app->session->setFlash('success', "Your Email-id has been Activated.. Enjoy Our Portal");  
    //     //             return $this->render('login', [
    //     //                         'model' => $model
    //     //             ]);
                
    //     //     } else {
                 
    //     //        return $this->render('wrongtoken');
    //     //     }
    //     // }
        
    // }

        if (Yii::$app->request->isAjax) {
            $model->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
       
        if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
        //if ($session->has('getproptype')){
        if(isset($_SESSION['getproptype'])){
           
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
                return $this->redirect(['/addproperty/creates']);
            } else {
               // echo 'yaha b aya';die;
                return $this->render('login', [
                            'model' => $model
                ]);
            }

        }
        
        if(isset($_SESSION['lesproptype'])){
           
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
                return $this->redirect(['/addproperty/create']);
            } else {
               // echo 'yaha b aya';die;
                return $this->render('login', [
                            'model' => $model
                ]);
            }

        }
        if(isset($_SESSION['locations'])){
            
             $locations = $_SESSION['locations'];
             $shaped = $_SESSION['shaped'];
           
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
                return $this->redirect(['/buyeractiod/search']);
            } else {
               // echo 'yaha b aya';die;
                return $this->render('login', [
                            'model' => $model
                ]);
            }
         }

         if(isset($_SESSION['locationss'])){
           
            $locations = $_SESSION['locationss'];
            $shaped = $_SESSION['shaped'];
            
           if ($model->load(Yii::$app->request->post()) && $model->login()) {
           
               return $this->redirect(['/lesseeaction/search']);
           } else {
              // echo 'yaha b aya';die;
               return $this->render('login', [
                           'model' => $model
               ]);
           }
        }
        
        else{

            
        if ($model->load(Yii::$app->request->post()) && $model->login('1234')) {

            
            return $this->checkrolel();
        } else {
           // echo 'yaha b aya';die;
            return $this->render('login', [
                        'model' => $model
            ]);
        }
    }
    }

    private function setHeader($status)
    {
        
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        $content_type="application/json; charset=utf-8";
      
        header($status_header);
        header('Content-type: ' . $content_type);
        header('X-Powered-By: ' . "Nintriva <nintriva.com>");
    }


    private function _getStatusCodeMessage($status)
    {
        $codes = Array(
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    public function actionFitelogins($identity,$password){
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $this->setHeader(200);
         $model = new LoginForm();

       

            //$array4 = array();
            $array4['LoginForm']['identity'] = $identity;
            $array4['LoginForm']['password'] = $password;

            if ($model->load($array4) && $model->login()) {


                $arrcheckrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
                $role_name = $arrcheckrole->item_name;
        

                $array2['id'] = Yii::$app->user->identity->id;
                $array2['email'] = Yii::$app->user->identity->email;
                $array2['role_name'] = $role_name;               
        
                $array3[] = $array2;
        


                echo  json_encode(array('status'=>1,'User_details'=>$array3),JSON_PRETTY_PRINT);
                
                
            }else{
                echo  json_encode(array('status'=>0,'Online_Site_Visit'=>'Username password Doesnt Match'),JSON_PRETTY_PRINT);
            }

        
    }



    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

     public function actionConfirmation() {

       
        return $this->render('confirmation');
    }


    public function actionOtp() {

       

        $model = new SignupForm();
        $post = Yii::$app->request->post();
         
        echo '<pre>';print_r($post['SignupForm']['otp']);die;


        return $this->render('otp', [
                'model' => $model
            ]);
    }


    

    public function actionRgetotp(){

         $phonenum =  $_POST['phone'];
         $activation =  $_POST['newotp'];
       //$activation= mt_rand(1000, 9999);

          //Your authentication key
          $authKey = "222784ARHZNXuXI5b334809";

          //Multiple mobiles numbers separated by comma
          $mobileNumber = $phonenum;

          //Sender ID,While using route4 sender id should be 6 characters long.
          $senderId = "XVBELL";

          //Your message to send, Add URL encoding here.
         // $message = urlencode("Your Verification Code is ".$activation."");

          //Define route 
          $route = 4;
          

          $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?otp_length=4&authkey=$authKey&sender=$senderId&mobile=$mobileNumber&otp=$activation",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
// echo $response;
  $jsonObj =  json_decode($response);
  $firstName = $jsonObj->type;  
  
//   if($firstName == 'success'){

//     $_SESSION['otp']= $activation;

//   }
 // return $activation;
  
}
           


    }



    public function actionSendemail()
            
    { 

            $emailid =  $_POST['emailid'];
            $activation =  $_POST['newotp'];
         
            $html = '<html>
            <body>
        
            <p>Hello! Thank you for creating an account with 15 Bells.
             We have emailed a OTP to your registered address. 
             This is your One time OTP  '.$activation.' .
             
            </p><br>

            <p>Regards,<br/>
            Team 15bells.</p>
            </body>
            </html>';

            $email = \Yii::$app->mailer->compose()
            ->setTo($emailid)

            ->setFrom(['info@15bells.com' => '15bells'])
            ->setSubject('15bells Register mail ')
            ->setHtmlBody($html)
            ->send();   
            
            
       

    }


    public function actionRverifyotp(){

        $phonenum =  $_POST['phone'];
        $activation= $_SESSION['otp'];

          //Your authentication key
          $authKey = "222784ARHZNXuXI5b334809";

          //Multiple mobiles numbers separated by comma
          $mobileNumber = $phonenum;

          //Sender ID,While using route4 sender id should be 6 characters long.
          $senderId = "XVBELL";

          //Your message to send, Add URL encoding here.
         // $message = urlencode("Your Verification Code is ".$activation."");

          //Define route 
          $route = 4;
          

          $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://control.msg91.com/api/retryotp.php?authkey=$authKey&mobile=$mobileNumber&retrytype=text",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 //echo $response;
 
  $jsonObj =  json_decode($response);
  $firstName = $jsonObj->type;  
  
  if($firstName == 'success'){

    $_SESSION['otp']= $activation;

  }
  echo $activation;
  
}
           


    }







     public function actionSearch($searchTerm) {

       $payments = \Yii::$app->db->createCommand("SELECT name FROM countries WHERE name LIKE '%".$searchTerm."%' ORDER BY skill ASC")->queryAll();

            echo json_encode($payments);
         
    }
   

    public function actionSignup()
    {
      

            //    meta tags description starts here  

		$title =  \Yii::$app->view->title = 'Signup';

		Yii::$app->view->registerMetaTag([
		'name' => 'viewport',			
		'content' => 'width=device-width,  minimum-scale=1,  maximum-scale=1'
		]);
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => 'Redefining Transparency'
		]);
		Yii::$app->view->registerMetaTag([
		'name' => 'author',			
		'content' => '15Bells'
		]);

		//  og tags 

		Yii::$app->view->registerMetaTag([
		'property' => 'og:title',			
		'content' => $title
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:type',			
		'content' => 'website'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:url',			
		'content' => 'https://www.15bells.com'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:image',			
		'content' => 'https://staging.15bells.com/newimg/logo.png'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:description',			
		'content' => 'Strive to create a transparent and safe place for swift real estate transactions with disruptive technology.'
		]);
	
		//    meta tags description ends here  


        $model = new SignupForm();

        $model1 = new LoginForm();


       if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) 
        {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
        }

        if(isset($_SESSION['locationspost'])){
            
            $locations = $_SESSION['locationspost'];
            $shaped = $_SESSION['shapedpost'];
           
          
           if ($model1->load(Yii::$app->request->post()) && $model1->login('1234')) {
           
               return $this->redirect(['/buyeraction/searches']);
           } 
        }

        if(isset($_SESSION['locationspostl'])){
            
            $locations = $_SESSION['locationspostl'];
            $shaped = $_SESSION['shapedpostl'];
           
          
           if ($model1->load(Yii::$app->request->post()) && $model1->login('1234')) {
           
               return $this->redirect(['/lesseeaction/searches']);
           } 
        }



        if ($model1->load(Yii::$app->request->post()) && $model1->login('1234')) {

               
            
            return $this->checkrolel();
        } 

       else if ($model->load(Yii::$app->request->post())) {

      // echo '<pre>';print_r(Yii::$app->request->post());die;
           // $post = Yii::$app->request->post();
           
            
            $user = $model->signup();
			// if(isset($user->id)){
			//       $Aggrementmgmt = \common\models\Aggrementmgmt::find()->where(['eventname'=>"Signup" ,'ispublish'=>1])->one();
			// 	  if($Aggrementmgmt){
			// 		  $checkifalready = \common\models\AgreementLog::find()->where(['agreement_id'=>$Aggrementmgmt->id ,'user_id'=>$user->id,'curr_validity'=>1])->one();
			// 		  if(!$checkifalready){
            //      $AgreementLog = new \common\models\AgreementLog();
			// 	 $AgreementLog->agreement_id=$Aggrementmgmt->id;
			// 	 $AgreementLog->user_id =$user->id;
			// 	 $AgreementLog->accept_date = date('y-m-d h:i:s');
			// 	 $AgreementLog->role_id =3;
			// 	 $AgreementLog->save();
			// }  } }
             if($user){
 
                   $user_id = $user->id;
              
            // if($location !=''){
			// 	  $model->addnewlead($user->fullname,$user->id,$user->email,$user->countrycode,$user->username,$location);
            //       // $model->assignCSR($user_id,$location);

            //   } else {
			// 	  $location ="Gurgaon";
			// 	  $model->addnewlead($user->fullname,$user->id,$user->email,$user->countrycode,$user->username,$location);
			//   }
                 
            //        $model->sendmail($user_id);
                  // Yii::$app->session->setFlash('success', "Confirmation Email has been sent on your Email");

                //    return $this->render('otp', [
                //     'model' => $model
                // ]);

                //$identity = User::findOne(['username' => $model->$username]);
             if (Yii::$app->user->login($user)) {

                return $this->checkrole($user_id);
            }
                

                }

             // $user_id = $user->id;


             // $model->    ($user_id);
           //if ($user && Yii::$app->getUser()->login($user)) {
                 
             //return $this->checkrole();
         //  }

            
        }

        return $this->render('signup', [
            'model' => $model,
            'model1' => $model1
            
        ]);
    }
	
	public function checkrole($user_id=null){
		
	$arrcheckrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>$user_id])->all();
	
	foreach($arrcheckrole as $checkrole){
		
			$findallrouting = \common\models\Bellsroutings::find()->where(['isactive'=>1,'rolename'=>$checkrole->item_name])->one();
			if($findallrouting){
				
		    return Yii::$app->response->redirect(Yii::getAlias('@'.$findallrouting->login_to.'Url').$findallrouting->login_url, 301)->send();
			}
        }
    }

    public function checkrolel(){
		
        $arrcheckrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();
        
        foreach($arrcheckrole as $checkrole){
            
                $findallrouting = \common\models\Bellsroutings::find()->where(['isactive'=>1,'rolename'=>$checkrole->item_name])->one();
                if($findallrouting){
                    
                return Yii::$app->response->redirect(Yii::getAlias('@'.$findallrouting->login_to.'Url').$findallrouting->login_url, 301)->send();
                }
            }}

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>Yii::t('frontend', 'Please check your email and set password from reset password link.'),
                    'options'=>['class'=>'alert-success']
                ]);
                  $sd =1;
                return $this->render('requestPasswordResetToken', [
            'model' => $model,
			'sd'=>$sd,
        ]);
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>Yii::t('frontend', 'Sorry, we are unable to reset password for email provided.'),
                    'options'=>['class'=>'alert-danger']
                ]);
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        $modellog = new LoginForm();
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            return $this->render('wrongtoken');
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
           Yii::$app->session->setFlash('success', "Password Change Successfully");
           // return $this->goHome();
            return $this->render('login', [
                'model' => $modellog
            ]);
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * @param $client \yii\authclient\BaseClient
     * @return bool
     * @throws Exception
     */
    public function successOAuthCallback($client)
    {
        // use BaseClient::normalizeUserAttributeMap to provide consistency for user attribute`s names
        $attributes = $client->getUserAttributes();
        $user = User::find()->where([
                'oauth_client'=>$client->getName(),
                'oauth_client_user_id'=>ArrayHelper::getValue($attributes, 'id')
            ])
            ->one();
        if (!$user) {
            $user = new User();
            $user->scenario = 'oauth_create';
            $user->username = ArrayHelper::getValue($attributes, 'login');
            $user->email = ArrayHelper::getValue($attributes, 'email');
            $user->oauth_client = $client->getName();
            $user->oauth_client_user_id = ArrayHelper::getValue($attributes, 'id');
            $password = Yii::$app->security->generateRandomString(8);
            $user->setPassword($password);
            if ($user->save()) {
                $profileData = [];
                if ($client->getName() === 'facebook') {
                    $profileData['firstname'] = ArrayHelper::getValue($attributes, 'first_name');
                    $profileData['lastname'] = ArrayHelper::getValue($attributes, 'last_name');
                }
				 if ($client->getName() === 'google') {
                    $profileData['firstname'] = ArrayHelper::getValue($attributes, 'first_name');
                    $profileData['lastname'] = ArrayHelper::getValue($attributes, 'last_name');
                }
                $user->afterSignup($profileData);
                $sentSuccess = Yii::$app->commandBus->handle(new SendEmailCommand([
                    'view' => 'oauth_welcome',
                    'params' => ['user'=>$user, 'password'=>$password],
                    'subject' => Yii::t('frontend', '{app-name} | Your login information', ['app-name'=>Yii::$app->name]),
                    'to' => $user->email
                ]));
                if ($sentSuccess) {
                    Yii::$app->session->setFlash(
                        'alert',
                        [
                            'options'=>['class'=>'alert-success'],
                            'body'=>Yii::t('frontend', 'Welcome to {app-name}. Email with your login information was sent to your email.', [
                                'app-name'=>Yii::$app->name
                            ])
                        ]
                    );
                }

            } else {
                // We already have a user with this email. Do what you want in such case
                if ($user->email && User::find()->where(['email'=>$user->email])->count()) {
                    Yii::$app->session->setFlash(
                        'alert',
                        [
                            'options'=>['class'=>'alert-danger'],
                            'body'=>Yii::t('frontend', 'We already have a user with email {email}', [
                                'email'=>$user->email
                            ])
                        ]
                    );
                } else {
                    Yii::$app->session->setFlash(
                        'alert',
                        [
                            'options'=>['class'=>'alert-danger'],
                            'body'=>Yii::t('frontend', 'Error while oauth process.')
                        ]
                    );
                }

            };
        }
        if (Yii::$app->user->login($user, 3600 * 24 * 30)) {
            return true;
        } else {
            throw new Exception('OAuth error');
        }
    }
}
