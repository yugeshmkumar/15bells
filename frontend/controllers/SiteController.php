<?php

namespace frontend\controllers;

use yii\helpers\Html;
use frontend\models\ContactForm;
//use backend\models\LoginForm;
use yii\web\Controller;
use common\models\Myprofile;
use common\models\MyprofileSearch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

use common\base\MultiModel;
use frontend\modules\user\models\AccountForm;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;

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
use yii\helpers\BaseJson;
use yii\helpers\Json;
use yii\helpers\HtmlPurifier;
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
        $this->layout = "dashboard";
    }

     public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['couserdash','changepassword','changecolour','setnotifications','getnotifications','getuserloginas','setuserloginas','userdash','dashboardexpectation','dashboarddocuments','postlogin','index','ajaxuser','update','editajax','deleteajax','whensignup','checkrole','subcatparentcomp','subcatparent','subcattwo','subcat','copostlogin','Copostloginbin','whenlogin','aboutUs','virtualroom','contact','acceptseller','acceptbuyer'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
			],
			'httpCache' => [
				'class' => 'yii\filters\HttpCache',
				'lastModified' => function ($action, $params) {
				return time();
				},
				'sessionCacheLimiter' => 'public',
				//'cacheControlHeader' => 'public, max-age=3600', 
			  ],
           
        ];
    }

    public function actions() {
       
		 return [
            'avatar-upload' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'avatar-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ],
            'avatar-delete' => [
                'class' => DeleteAction::className()
            ],
        
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
 
  public function actionAjaxuser()
    {
  $connection = Yii::$app->getDb();
      	$fname=$_POST['fname'];
	$number=$_POST['number'];
	$email=$_POST['email'];
$pass=$_POST['pass'];
 $ct=time();
 $checkuser = \common\models\User::find()->where(['email'=>$email])->one();
				if(!$checkuser){
					$saveuser = new \common\models\User();
					$saveuser->username = $number;
                    $saveuser->email = $email;
                    $saveuser->setPassword($pass);
                    $saveuser->save();
					
                  $saveuser->afterSubSignup();
                 $userid = Yii::$app->user->identity->id;
                 $subuserid =  $saveuser->id;
                 
                $model1 = \common\models\Company::find()
                ->where(['userid' => $userid, 'isactive' => 1])
                ->one();                    
                $companyid = $model1->id;
            
                 $myprofilestatus = new \common\models\CompanyUsers();
				 $myprofilestatus->admin_user_id=$userid;
				 $myprofilestatus->fname = $fname;
                 $myprofilestatus->company_id=$companyid;
                 $myprofilestatus->subuser_id= $subuserid;

					$myprofilestatus->save(); 
	}
    }
 public function actionUpdate()
    {
$connection = Yii::$app->getDb();
$id=$_POST['id'];

      	$fname=$_POST['fname'];
	$number=$_POST['number'];
	$email=$_POST['email'];
$pass=$_POST['pass'];
 $ct=time();
 $getuser = new \common\models\User();
                   $finalpassword =  $getuser->setPassword($pass);
  $sql="update user set email='$email',email='$email',password_hash='$finalpassword',username='$number' where id='$id'";
$command_get = $connection->createCommand($sql);
$command_get->query();
    
	}
	
public function actionGetuserloginas(){

  $userloginas = $_POST['user'];
  $userid = Yii::$app->user->identity->id;
	$model1 = \common\models\User::find()
	->where(['id' => $userid, 'status' => 1])
	->one();                    
	$model1->user_login_as = $userloginas;
	if($model1->save(false)){
		return 1;
	}else{
		return 2;
	}

	

}

public function actionSetuserloginas(){

	$userid = Yii::$app->user->identity->id;
	$model1 = \common\models\User::find()
	->where(['id' => $userid, 'status' => 1])
	->one();                    
	$userloginas  =  $model1->user_login_as;

	return $userloginas;

}




 public function actionEditajax()
    {



$connection = Yii::$app->getDb();
 $id=$_GET['id'];

 $sql="select * from user where id='$id'";
$command_get = $connection->createCommand($sql);
$result_chk = $command_get->queryAll();
return json_encode($result_chk);

    }



   public function actionDeleteajax()
    {
$connection = Yii::$app->getDb();
 $id=$_POST['id'];
$sql="update  user set status = 0 where id='$id'";
$command_get = $connection->createCommand($sql);
$command_get->query();
$sql2="update  company_users set isactive = 0 where subuser_id='$id'";
$command_get2 = $connection->createCommand($sql2);
$command_get2->query();


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
	public function actionDashboardexpectation() {
		$this->layout = "newdashboard";
        return $this->render('dashboard_expectation');
    }
	public function actionDashboarddocuments() {
		$this->layout = "newdashboard";
        return $this->render('dashboard_documents');
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
	public function actionSubcatparentcomp() {
	$fmodel = new \common\models\Bellscountryconfig();
    $out = [];
   //$out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = $fmodel->getSubCatListtwo($cat_id);
           
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);

}
	public function actionSubcatparent() {
	$fmodel = new \common\models\Bellscountryconfig();
    $out = [];
   //$out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = $fmodel->getSubCatList($cat_id);
           
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);

}
	public function actionSubcattwo() {
	$fmodel = new \common\models\Bellscountryconfig();
    $out = [];
   //$out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = $fmodel->getSubCatList($cat_id);
           
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);

}




public function actionSetnotifications() {
	
	if(isset($_REQUEST['notify'])){
	$getbbcompany = \common\models\Notifications\Notifications::find()->where(['item_id'=>Yii::$app->user->identity->id])->andWhere(['is_seen'=>'0'])->all();
				foreach ($getbbcompany as $getbbcompanys){

					$getbbcompanys->is_seen = '1' ;
				    $getbbcompanys->save();
				}

	
				$userid = Yii::$app->user->identity->id;
				$payments = \Yii::$app->db->createCommand("select * from notifications where item_id=$userid order by date DESC LIMIT 3")->queryAll();

				echo json_encode($payments);die;
				
				
	}


}

public function actionGetnotifications() {

	$getbbcompany = \common\models\Notifications\Notifications::find()->where(['is_seen'=>'0'])->andWhere(['item_id'=>Yii::$app->user->identity->id])->count();	  
	echo json_encode($getbbcompany);die;

}

public function actionChangecolour() {


	$id = $_POST['id'];
	$getbbcompany = \common\models\Notifications\Notifications::find()->where(['id'=>$id])->one();	  
	$getbbcompany->viewed = '1' ;
	$getbbcompany->save();

}





public function actionSubcat() {
	$fmodel = new \common\models\Bellscountryconfig();
    $out = [];
   $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = $fmodel->getSubCatListtwo($cat_id);
           
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);

}


        public function actionAcceptbuyer($accept){
        
        $user_id = Yii::$app->user->identity->id;       
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');       

        $trendingadd = \Yii::$app->db->createCommand()->insert('dashboardroleaggrement', ['aggrement_id'=>'6','role_id' => 'buyer_seller','user_id'=>$user_id, 'accept' => '1', 'created_date' => $date])->execute(); 
        if($trendingadd){
            echo '1';die;            
        }else{
            echo '2';die;
        }
    }
    
    
    public function actionAcceptseller($accept){
        
        $user_id = Yii::$app->user->identity->id;       
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');       

        $trendingadd = \Yii::$app->db->createCommand()->insert('dashboardroleaggrement', ['aggrement_id'=>'7','role_id' => 'lessee_lessor','user_id'=>$user_id, 'accept' => '1', 'created_date' => $date])->execute(); 
        if($trendingadd){
            echo '1';  die;          
        }else{
            echo '2';die;
        }
    }


	public function actionCopostlogin()
	{
		$this->layout="newdashboard";
		$searchModel = new \common\models\SubUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		 $UserProfileExmodel = new \common\models\UserProfileEx();
		
		 $model = new Myprofile();
		 $modelco = new \common\models\Companynew();  
		 $accountModel = new AccountForm();
        $accountModel->setUser(Yii::$app->user->identity);

        $model2 = new MultiModel([
            'models' => [
                'account' => $accountModel,
                'profile' => Yii::$app->user->identity->userProfile
            ]
        ]);
		//start action for change password details
if(isset($_POST['savecreddata'])){
        if ($model2->load(Yii::$app->request->post()) && $model2->save()) {
            Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('frontend', 'Your account has been successfully saved')
            ]);
            return $this->refresh();
        }}
		//end  action for change password details
		////save company data
		if(isset($_POST['savecompanydata'])){
			$request = Yii::$app->request->post();
			
                if(!empty($request)){
					$modelreq=$request['Companynew'];
					
					
                    $person_name=$modelreq['person_name'];
					$PAN_card_no=$modelreq['PAN_card_no'];
					$COI_number=$modelreq['COI_number'];
					$main_email=$modelreq['main_email'];
					$main_mobile=$modelreq['main_mobile'];
					$main_address=$modelreq['main_address'];
					$state=$modelreq['state'];
					$city=$modelreq['city'];
					$location=$modelreq['location'];
					$country="india";
					
            $documentroot = $_SERVER['DOCUMENT_ROOT'];
			$getarchieveurl=$documentroot.'archive/web';
		


$sendingitemContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));

if(isset($_FILES["logo"])){
	
$logo=$_FILES['logo'];
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 102400*100; //100 kb
$path = "uploads/"; 
$count = 0;
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	
	if($_FILES['logo']['name']) {     
	    if ($_FILES['logo']['error'] == 4) {
	       // continue; // Skip file if any error found
	    }	       
	    if ($_FILES['logo']['error'] == 0) {	           
	        if ($_FILES['logo']['size'] > $max_file_size) {
	            $message[] = "$name is too large!.";
	         //   continue; // Skip large files
	        }
			
			
	        else{ // No error found! Move uploaded files 
			
			$filename  = basename($_FILES['logo']['name']);
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$new       = $filename.$sendingitemContentMod.'.'.$extension;

$root = $_SERVER['DOCUMENT_ROOT'];
			

               if (move_uploaded_file($_FILES['logo']['tmp_name'], "{$root}/archive/web/mycompanylogo/{$new}"))
               {
				$Company_Subusers = \common\models\Company_Subusers_Record::find()->where(['subuser_id' => Yii::$app->user->identity->id])->one();
				if($Company_Subusers){

				$getbbcompany = \common\models\Company::find()->where(['userid'=>$Company_Subusers->master_id])->one();
				$getbbcompany->logo = $new ;
				$getbbcompany->save();
				}
        else {
				$getbbcompany = \common\models\Company::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
				$getbbcompany->logo = $new ;
				 $getbbcompany->save();
			}
				  }
				
				  
	            $count++; // Number of successfully uploaded file
	        }
	    }
	}
}}

				$getcompany = \common\models\Companynew::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
				if($getcompany){
					// if(isset($_POST['logo'])){
					// $getcompany->logo =$logo;
					// }
					//$getcompany->description =$description;
					$getcompany->PAN_card_no =$PAN_card_no;
					$getcompany->COI_number=$COI_number;
					$getcompany->person_name =$person_name;
					//$getcompany->COI_number=$COI_number;
					$getcompany->main_email =$main_email;
					$getcompany->main_mobile =$main_mobile;
					$getcompany->main_address =$main_address;
					$getcompany->state =$state;
					$getcompany->city =$city;
					$getcompany->location =$location;
					$getcompany->country =$country;
					$getcompany->save();
					
					$CompanyEmp = new \common\models\CompanyEmp();
					$CompanyEmp->userid=Yii::$app->user->identity->id;
					$CompanyEmp->companyid=$getcompany->id;
					$CompanyEmp->save();
					
		}
	}
		     Yii::$app->session->setFlash('success', "Company Details have been Saved Successfully");
		}
////save myprofile data
 //start action for save profile details

		 if(isset($_POST['savedata']) || isset($_POST['savedatadocs'])){

if(!isset($_FILES["logo"])){

	$Company_Subusers = \common\models\Company_Subusers_Record::find()->where(['subuser_id' => Yii::$app->user->identity->id])->one();
	if($Company_Subusers){

		$getbbcompany = \common\models\Company::find()->where(['userid'=>$Company_Subusers->master_id])->one();
				$new = $getbbcompany->logo;
	}else{
				$getbbcompany = \common\models\Company::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
				$new = $getbbcompany->logo;
	}
	  }
  // if($model->load(Yii::$app->request->post()) && $model->save()) {
		  $model->isMinor = $_POST['isMinor'];
		 
		 $request = Yii::$app->request->post(); if(!empty($request)){ // put all request data  to a variable
           $modelreq=$request['Myprofile'];
		   $title=$modelreq['title'];
		   $first_name=$modelreq['first_name'];
		   $last_name=$modelreq['last_name'];
		   if(isset($modelreq['middlename'])) { $middlename=$modelreq['middlename']; } else { $middlename=''; }
		   if(isset($modelreq['hide'])) { $hide=$modelreq['hide']; } else { $hide=0; }
		   $gender=$modelreq['gender'];
		   $nationality = $modelreq['nationality'];
		  
		   $martial_status=$modelreq['martial_status'];
		   $dob1 = $modelreq['dob']; $datecreate = date_create($dob1);$dob = date_format($datecreate,'y-m-d');

		   if(isset($modelreq['pan_card_no'])) { $pan_card_no=$modelreq['pan_card_no']; } else { $pan_card_no=''; }
		   if(isset($modelreq['adhar_card_no'])) { $adhar_card_no=$modelreq['adhar_card_no']; } else { $adhar_card_no=''; }
		   if(isset($modelreq['countryverificatn'])) { $countryverificatn=$modelreq['countryverificatn']; } else { $countryverificatn=''; }
		   if(isset($modelreq['passportno'])) { $passportno=$modelreq['passportno']; } else { $passportno=''; }
		   if(isset($modelreq['ocinumber'])) { $ocinumber=$modelreq['ocinumber']; } else { $ocinumber=''; }
		   if(isset($modelreq['pionumber'])) { $pionumber=$modelreq['pionumber']; } else { $pionumber=''; }

		//    $pan_card_no=$modelreq['pan_card_no'];
		//    $adhar_card_no=$modelreq['adhar_card_no'];
		//    $countryverificatn=$modelreq['countryverificatn'];
		//    $passportno=$modelreq['passportno'];
		//    $ocinumber=$modelreq['ocinumber'];
		//    $pionumber=$modelreq['pionumber'];
		  //primary phone details
		   $phonetypeprimary = $modelreq['phonetypeprimary'];
		   $phonecodetypeprim =$modelreq['phonecodetypeprim'];
		   $phonenumbersprim = $modelreq['phonenumbersprim'];
		   //secondary phone details
		   if(isset($modelreq['phonenumbersecondary'])){
		   $phonetypesecondary = $modelreq['phonetypesecondary'];
		   $phonecodetypecorres =$modelreq['phonecodetypecorres'];
		   $phonenumbersecondary = $modelreq['phonenumbersecondary']; } else { $phonetypesecondary = 'other'; $phonecodetypecorres = ''; $phonenumbersecondary =''; }
		   //primary email
		   $emailtypeprimary = $modelreq['emailtypeprimary'];
		   $emailnumbersprim = $modelreq['emailnumbersprim'];
		   if(isset($modelreq['emailtypesecondary'])){ $emailtypesecondary = $modelreq['emailtypesecondary']; } else { $emailtypesecondary = '' ; }
		   if(isset($modelreq['emailnumbersecondary'])){  $emailnumbersecondary = $modelreq['emailnumbersecondary']; } else { $emailnumbersecondary =''; }
		  //secondary email 
		  
		   $corr_city      = $modelreq['current_city'];
		   $corr_state     = $modelreq['current_state'];
		   $corr_country   = $modelreq['current_country'];
		   $corr_pincode   = $modelreq['current_pincode'];
		   $corressaddress = $modelreq['current_address'];
		   ///permanent address
		  if(isset($_POST['checkaddr'])){
		  $country = $corr_country;
		  $state   = $corr_state;
		  $city    = $corr_city;
		  $pincode = $corr_pincode;
		  $permanaddress =$corressaddress;
		  
		  } else {

		  $country = $modelreq['permanent_country'];
		  $state   = $modelreq['permanent_state'];
		  $city    = $modelreq['permanent_city'];
		  $pincode = $modelreq['permanent_pincode'];
		  $permanaddress = $modelreq['permanent_address'];
		  }
		   if(isset($_POST['isMinor'])) {
			   $minor =  $_POST['isMinor']; } else {
			   $minor = 0 ; } $sd = 0;
				
//for phone no's

	\common\models\activemode::insert_phone_numbers(Yii::$app->user->identity->id,$phonecodetypeprim,$phonenumbersprim,1,$phonetypeprimary);
    if(!empty($phonenumbersecondary)){
		\common\models\activemode::insert_phone_numbers(Yii::$app->user->identity->id,$phonecodetypecorres,$phonenumbersecondary,0,$phonetypesecondary);
	}
//end for numbers
//for emails
	
	\common\models\activemode::insert_email_addresses(Yii::$app->user->identity->id,$emailnumbersprim,1,$emailtypeprimary);
	 if(!empty($emailnumbersecondary)){
		\common\models\activemode::insert_email_addresses(Yii::$app->user->identity->id,$emailnumbersecondary,0,$emailtypesecondary);
	}
//end for emails
//for permanet address
\common\models\activemode::insert_permanet_addresse(Yii::$app->user->identity->id,$country,$city,$state,$pincode);
//forcorrespondence		
\common\models\activemode::insert_correspondence_addresses(Yii::$app->user->identity->id,$corr_country,$corr_city,$corr_state,$corr_pincode);
//end for address			
}
	    $getUserPhoneconfig =\common\models\UserPhoneconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
	    $getUserEmailconfig = \common\models\UserEmailconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
		$getuseraddress = \common\models\UserAddressconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
		
       //update status
	   \common\models\activemode::insert_to_my_profile_table(Yii::$app->user->identity->id,$new,$title,$first_name,$middlename,$last_name,$getUserEmailconfig->emailid,                                                          
	   $getUserPhoneconfig->phoneid,$dob,$gender,$nationality,$hide,$martial_status,$minor,"","",$pan_card_no,$adhar_card_no,$corr_country,$corr_state,$corr_city,$corr_pincode,$country,$state,$city,$pincode,$corressaddress,$permanaddress,$countryverificatn,$passportno,$ocinumber,$pionumber);
	   \common\models\activemode::update_my_profile_progress_status(Yii::$app->user->identity->id,"my_profile",'100','3');
			///  \common\models\Myprofile::addnewleads_sales($first_name,Yii::$app->user->identity->id,$emailnumbersprim,$phonecodetypeprim,$phonenumbersprim,$corr_city);
			  
			  Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('frontend', 'Your profile has been successfully saved')
            ]);
           // return $this->refresh();
		   if(isset($_POST['savedatadocs'])){
			   return $this->redirect(['/common/documents']);
			   
				
		   } else {
			   return $this->redirect(['couserdash']);
		   }
			 }
	  
		$this->layout="newdashboard";
	  
		return $this->render('copostlogin',[
		'searchModel' => $searchModel,
		'dataProvider' => $dataProvider,
		 'model' => $model,
				'model2' => $model2,
				'modelco'=>$modelco,
		]);
		
	}
	
	public function actionCopostloginbin()
	{
		$this->layout="common";
		
		 $model = new Myprofile();
		 $modelco = new \common\models\Companynew();  
		 $accountModel = new AccountForm();
        $accountModel->setUser(Yii::$app->user->identity);

        $model2 = new MultiModel([
            'models' => [
                'account' => $accountModel,
                'profile' => Yii::$app->user->identity->userProfile
            ]
        ]);
		////save company data
		if(isset($_POST['savecompanydata'])){
            $request = Yii::$app->request->post();
                if(!empty($request)){
					$modelreq=$request['Companynew'];
					
					
                    $description=$modelreq['description'];
					$PAN_card_no=$modelreq['PAN_card_no'];
					$COI_number=$modelreq['COI_number'];
					$main_email=$modelreq['main_email'];
					$main_mobile=$modelreq['main_mobile'];
					$main_address=$modelreq['main_address'];
					$state=$modelreq['state'];
					$city=$modelreq['city'];
					$location=$modelreq['location'];
					$country=$modelreq['country'];
					
            $documentroot = $_SERVER['DOCUMENT_ROOT'];
			$getarchieveurl=$documentroot.'/archive/web';
		


$sendingitemContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));

if(isset($_FILES["logo"])){
$logo=$_FILES['logo'];
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 102400*100; //100 kb
$path = "uploads/"; 
$count = 0;
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	
	if($_FILES['logo']['name']) {     
	    if ($_FILES['logo']['error'] == 4) {
	       // continue; // Skip file if any error found
	    }	       
	    if ($_FILES['logo']['error'] == 0) {	           
	        if ($_FILES['logo']['size'] > $max_file_size) {
	            $message[] = "$name is too large!.";
	         //   continue; // Skip large files
	        }
			
			
	        else{ // No error found! Move uploaded files 
			
			$filename  = basename($_FILES['logo']['name']);
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$new       = $filename.$sendingitemContentMod.'.'.$extension;

$root = $_SERVER['DOCUMENT_ROOT'];
			

               if (move_uploaded_file($_FILES['logo']['tmp_name'], "{$root}/archive/web/mycompanylogo/{$new}"))
               {
				$getbbcompany = \common\models\Company::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
				$getbbcompany->logo = $new ;
				 $getbbcompany->save();
				  }
				
				  
	            $count++; // Number of successfully uploaded file
	        }
	    }
	}
}}

				$getcompany = \common\models\Companynew::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
				if($getcompany){
					if(isset($_POST['logo'])){
					$getcompany->logo =$logo;
					}
					$getcompany->description =$description;
					$getcompany->PAN_card_no =$PAN_card_no;
					$getcompany->COI_number=$COI_number;
					$getcompany->main_email =$main_email;
					$getcompany->main_mobile =$main_mobile;
					$getcompany->main_address =$main_address;
					$getcompany->state =$state;
					$getcompany->city =$city;
					$getcompany->location =$location;
					$getcompany->country =$country;
					$getcompany->save(false);
					
					$CompanyEmp = new \common\models\CompanyEmp();
					$CompanyEmp->userid=Yii::$app->user->identity->id;
					$CompanyEmp->companyid=$getcompany->id;
					$CompanyEmp->save();
		}}}
////save myprofile data
if(isset($_POST['savecreddata'])){
        if ($model2->load(Yii::$app->request->post()) && $model2->save()) {
            Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('frontend', 'Your account has been successfully saved')
            ]);
            return $this->refresh();
        }}
       
     if(isset($_POST['savedata'])){
		 $request = Yii::$app->request->post();
                if(!empty($request)){
            $modelreq=$request['Myprofile'];
           $title=$modelreq['title'];
		   $first_name=$modelreq['first_name'];
		    $last_name=$modelreq['last_name'];
			$gender=$modelreq['gender'];
			
			 $martial_status=$modelreq['martial_status'];
		      $dob = $_POST['dob'];
			  
			    $arrphonetype = $_POST['phonetype'];
				$arrcountrycode = $_POST['countrycode'];
				  $arrphonenumber = $_POST['phonenumber']; 
				  
				 $arremailtype = $_POST['emailtype'];
				  $arremailaddress = $_POST['emailaddress'];
				  $chkir = $_POST['chkir'];
				  
				  $chkir2 = $_POST['chkir2'];
				  $chkir3 = $_POST['chkir3'];
				  $arraddresses = $_POST['addresses'];
				  $arrcity = $_POST['city'];
				  $arrstate = $_POST['state'];
				  $arrcountry = "India";
				  $arrpincode = $_POST['pincode'];
				  	  $pan_card_no=$_POST['pan_card_no'];
		   $adhar_card_no=$_POST['adhar_card_no'];
		   $minor =  $_POST['minor'];
				  $sd = 0;
				
$result = array();
$result2 = array();
$result3 = array();
//for phone no's
foreach ($arrphonetype as $id => $key) {
	if(!isset($chkir[$id])){
		$chkir[$id] = 0;
	}
    $result[$key] = array(
        'country_code'  => $arrcountrycode[$id],
        'phone_no' => $arrphonenumber[$id],
		'isdefault'=>$chkir[$id],
        'phonetype'    => $key,
    );
	
	               $phonemodel = new \common\models\Phonenumbers();
				   $phonemodel->country_code = $arrcountrycode[$id];
				   $phonemodel->phone_no =$arrphonenumber[$id];
				   $phonemodel->isdefault=$chkir[$id];
				   $phonemodel->phonetype = $key;
					 $phonemodel->save();  
//entry in user and phone config
		
		$UserPhoneconfig = new \common\models\UserPhoneconfig();
		$UserPhoneconfig->roleid=3;
		$UserPhoneconfig->userid=Yii::$app->user->identity->id;
		$UserPhoneconfig->phoneid=$phonemodel->id;
		$UserPhoneconfig->isdefault=$phonemodel->isdefault;
		$UserPhoneconfig->save();					 
}
//end for numbers
//for emails
	foreach ($arremailtype as $id => $key2) {
		if(!isset($chkir2[$id])){
		$chkir2[$id] = 0;
	}
    $result2[$key2] = array(
        'emailaddress'  => $arremailaddress[$id],
        'emailtype'    => $key2,
    );
	
	               $Emailaddresses = new \common\models\Emailaddresses();
				   $Emailaddresses->emailaddress = $arremailaddress[$id];
				   $Emailaddresses->emailtype =$key2;
				   $Emailaddresses->isdefault = $chkir2[$id];
					 $Emailaddresses->save();  

		//entry in user and email config
		
		$UserEmailconfig = new \common\models\UserEmailconfig();
		$UserEmailconfig->roleid=3;
		$UserEmailconfig->userid=Yii::$app->user->identity->id;
		$UserEmailconfig->emailid=$Emailaddresses->id;
		$UserEmailconfig->isdefault=$Emailaddresses->isdefault;
		$UserEmailconfig->save();					 
}
//end for emails
//for address
foreach($arraddresses as $id => $key3) {
	if(!isset($chkir3[$id])){
		$chkir3[$id] = 0;
	}
    $result3[$key3] = array(
        'country'  => $arrcountry[$id],
        'city' => $arrcity[$id],
		'state' => $arrstate[$id],
		'pincode' => $arrpincode[$id],
        'description'    => $key3,
    );
	
	               $Addresses = new \common\models\Addresses();
				   $Addresses->country = $arrcountry[$id];
				   $Addresses->description = $key3;
				   $Addresses->city = $arrcity[$id];
				   $Addresses->state = $arrstate[$id];
				   $Addresses->pincode = $arrpincode[$id];
			       $Addresses->isdefault = $chkir3[$id];
				   $Addresses->save();    
//entry in user and address config
		
		$UserAddressconfig = new \common\models\UserAddressconfig();
		$UserAddressconfig->roleid=3;
		$UserAddressconfig->userid=Yii::$app->user->identity->id;
		$UserAddressconfig->addressid=$Addresses->id;
		$UserAddressconfig->isdefault=$Addresses->isdefault;
		$UserAddressconfig->save();
						   
}
//end for address			
			   
	 }
	 $getUserPhoneconfig =\common\models\UserPhoneconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
	    $getUserEmailconfig = \common\models\UserEmailconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
		$getuseraddress = \common\models\UserAddressconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
		//entry in user_profile_ex
		$UserProfileEx = new \common\models\UserProfileEx();
		$UserProfileEx->user_id = Yii::$app->user->identity->id;
		$UserProfileEx->title=$title;
		  
		    
			
		     if($getUserEmailconfig){
		$UserProfileEx->emailid=$getUserEmailconfig->emailid;
			 }
			 if($getUserPhoneconfig){
		$UserProfileEx->mobileid=$getUserPhoneconfig->phoneid;
			 }
		if($getuseraddress){
		$UserProfileEx->cur_addressid1=$getuseraddress->addressid;
		$UserProfileEx->per_addressid1=$getuseraddress->addressid;
		}
		$UserProfileEx->gender=$gender;
		$UserProfileEx->martial_status=$martial_status;
		$UserProfileEx->dob= $dob ;
		$UserProfileEx->save();
		//entry in  user_profile
		
		 $UserProfile = \common\models\UserProfile::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
		 if($UserProfile){
		 $UserProfile->firstname=$first_name ;
		$UserProfile->lastname=$last_name;
		$UserProfile->save();
		
		 }
		 //update status
		 $myprofilestatus = new \common\models\MyProfileProgressStatus();
		 $myprofilestatus->process_name="my_profile";
		 $myprofilestatus->process_status="75";
		 $myprofilestatus->user_id= Yii::$app->user->identity->id;
		 
		 $myprofilestatus->role_id=3;
		 $myprofilestatus->save();
	 ////
	
		  $request = Yii::$app->request->post();
           
         
		   $userproflile = \common\models\UserProfile::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
		   if($userproflile){
			   $UserProfileEx =\common\models\UserProfileEx::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
			 if($UserProfileEx){
		   $userproflile->gender =$UserProfileEx->gender;
		   $userproflile->phone=$UserProfileEx->mobileid;
		   $userproflile->address=$UserProfileEx->cur_addressid1;
		   }
		   $userproflile->minor=$minor ;
		   $userproflile->save();
		 
		if(isset($_POST['minorrelation'])){
         $minor_relatn = $_POST['minorrelation'];
		
		 $userproflile->relationship_with_minor =$minor_relatn;
		 	 $userproflile->save();
		}
			if(isset($_POST['guardianname'])){
        $guardian_name = $_POST['guardianname'];
		$userproflile->guardian_name=$guardian_name;
		 $userproflile->save();
		   }}
			$UserProfileEx =\common\models\UserProfileEx::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
			 if($UserProfileEx){
		 $UserProfileEx->pan_card_number = $pan_card_no;
		$UserProfileEx->adhar_number=$adhar_card_no;
		$UserProfileEx->save();
			 }
			 
			  //update status
			  $myprofilestatus =\common\models\MyProfileProgressStatus::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
			if($myprofilestatus){
		$myprofilestatus->process_status="100";
		$myprofilestatus->save();
			 }}
	  
		$this->layout="common";
		$checkrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id,'item_name'=>"administrator"])->one();
		if($checkrole){
			
	return Yii::$app->response->redirect(Yii::getAlias('@backendUrl'), 301)->send();
		}else{
		return $this->render('copostloginbin',[
		 'model' => $model,
				'model2' => $model2,
				'modelco'=>$modelco,
		]);
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
	
	 public function actionCouserdash()
	 {
		$user_id = Yii::$app->user->identity->id;
		$getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


		if ($getstatus == 1) {

			$this->layout = "dashboard";
		} else {

			$this->layout = "dashboard";  // common
		}


		return $this->render('userdash1');
	 }


	 public function actionUserdash()
	 { 
	 $user_id = Yii::$app->user->identity->id;
		$getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


		if ($getstatus == 1) {

		$this->layout = "dashboard";
		} else {
			$this->layout = "dashboard";
		//$this->layout = "beforeprofilecomplete";  // common
		}


		return $this->render('userdash1');
	 }
	 
/**********FOR NEW CAHNGE PASSWORD PAGE*************/


 public function actionChangepassword(){
	 // list all the models
		 $model = new Myprofile();
		 $UserProfileExmodel = new \common\models\UserProfileEx();
		 $accountModel = new AccountForm();
         $accountModel->setUser(Yii::$app->user->identity);
         $user_id = Yii::$app->user->identity->id;
		$getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


		if ($getstatus == 1) {

		$this->layout = "newdashboard";
		} else {

		$this->layout = "newdashboard";  // common
		}
         $model2 = new MultiModel([
            'models' => [ 'account' => $accountModel,'profile' => Yii::$app->user->identity->userProfile ] ]);
			
              //start action for change password details
            if(isset($_POST['savecreddata'])){
				
        if ($model2->load(Yii::$app->request->post()) && $model2->save(false)) {
			
            Yii::$app->session->setFlash('success', "Your message to display");
            return $this->render('changepassword',[
			'model' => $model,
			'model2' => $model2,
				'UserProfileExmodel'=>$UserProfileExmodel ,
                           ]);
		}
	}
		   //end  action for change password details
		   
		
		
		
		return $this->render('changepassword',[
		 'model' => $model,
				'model2' => $model2,
				'UserProfileExmodel'=>$UserProfileExmodel ,
		]);
		
	}



	public function actionPostlogin(){

	            $model = new Myprofile();
				$UserProfileExmodel = new \common\models\UserProfileEx();
				$accountModel = new AccountForm();
				$modelco = new \common\models\Companynew();  
				$accountModel->setUser(Yii::$app->user->identity);
				$model2 = new MultiModel([
				'models' => [ 'account' => $accountModel,'profile' => Yii::$app->user->identity->userProfile ] ]);
				$getstatus = \common\models\MyProfileProgressStatus::getStatus(Yii::$app->user->identity->id);

				 if ($getstatus == 1) {
	 
					$this->layout = "dashboard";
					} else {
			
					$this->layout = "dashboard";  // common
					}


					if(isset($_POST['savedatadocs'])){

						$request = Yii::$app->request->post();						
						$modelreq=$request['Myprofile'];

						$sendingitemContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));

						global $new;
						if(isset($_FILES["logo"])){
						   
						 //echo '<pre>';print_r($_FILES);die;
						$logo=$_FILES['logo'];
						$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
						$max_file_size = 102400*200; //100 kb
						$path = "uploads/"; 
						$count = 0;
						if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
							
							if($_FILES['logo']['name']) {     
								if ($_FILES['logo']['error'] == 4) {
								 
								   // continue; // Skip file if any error found
								}	       
								if ($_FILES['logo']['error'] == 0) {	   
								   
									if ($_FILES['logo']['size'] > $max_file_size) {
									  
										$message[] = "$name is too large!.";
									 //   continue; // Skip large files
									}									
									
									else{
									 
									 // No error found! Move uploaded files 
									
									$filename  = basename($_FILES['logo']['name']);
						$extension = pathinfo($filename, PATHINFO_EXTENSION);
						$new       = $filename.$sendingitemContentMod.'.'.$extension;
						
						$root = $_SERVER['DOCUMENT_ROOT'];
									
				 move_uploaded_file($_FILES['logo']['tmp_name'], "{$root}/archive/web/mycompanylogo/{$new}");									
										
									}
								}
							}
						}
						
						}


						$first_name=$modelreq['first_name'];
						$phonenumbersprim=$modelreq['phonenumbersprim'];
						$emailnumbersprim=$modelreq['emailnumbersprim'];

		$savephone = 	\common\models\activemode::insert_phone_numbers(Yii::$app->user->identity->id,91,$phonenumbersprim,1,'primary');
	    $getUserPhoneconfig =\common\models\UserPhoneconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();

		$saveemail =    \common\models\activemode::insert_email_addresses(Yii::$app->user->identity->id,$emailnumbersprim,1,'primary');
	    $getUserEmailconfig = \common\models\UserEmailconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();


		\common\models\activemode::insert_to_my_profile_table(Yii::$app->user->identity->id,$new,$first_name,$getUserEmailconfig->emailid,                                                          
		$getUserPhoneconfig->phoneid);
		\common\models\activemode::update_my_profile_progress_status(Yii::$app->user->identity->id,"my_profile",'100','3');
		
		$Userdata = User::find()->where(['id'=>Yii::$app->user->identity->id])->one();
					$Userdata->fullname= $first_name;					
					$Userdata->save();

					}if(isset($_POST['savecompanydata'])){
						$request = Yii::$app->request->post();
						if(!empty($request)){
      
							$modelreq=$request['Companynew'];				
					
							$name=$modelreq['name'];
							$company_website=$modelreq['company_website'];
							$company_type=$modelreq['company_type'];
							$description=$modelreq['description'];

			$getcompany = \common\models\Companynew::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
				if($getcompany){
					
					$getcompany->description =$description;
					$getcompany->company_type =$company_type;
					$getcompany->company_website=$company_website;
					$getcompany->name =$name;				
					$getcompany->save();
					
					$CompanyEmp = new \common\models\CompanyEmp();
					$CompanyEmp->userid=Yii::$app->user->identity->id;
					$CompanyEmp->companyid=$getcompany->id;
					$CompanyEmp->save();
					
		}

	
									  
						}
					}	
					
					if(isset($_POST['savecreddata'])){

					$model2->getModel('account')->load(Yii::$app->request->post()) && $model2->getModel('account')->save(false);
			
					}	
			   
			   return $this->render('postlogin',[
				       'model' => $model,
					   'model2' => $model2,					   
				        'modelco'=>$modelco,
					   'UserProfileExmodel'=>$UserProfileExmodel ,
			   ]);

	}



/**********END NEW CAHNGE PASSWORD PAGE*************/

 public function actionPostloginolds(){
	 // list all the models
		 $model = new Myprofile();
		 $UserProfileExmodel = new \common\models\UserProfileEx();
		 $accountModel = new AccountForm();
         $accountModel->setUser(Yii::$app->user->identity);
         $model2 = new MultiModel([
            'models' => [ 'account' => $accountModel,'profile' => Yii::$app->user->identity->userProfile ] ]);
			
              //start action for change password details
            if(isset($_POST['savecreddata'])){
				echo 'hii';die;
				
        if ($model2->load(Yii::$app->request->post()) && $model2->save()) {
			
            Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('frontend', 'Your account has been successfully saved')
            ]);
            return $this->refresh();
        }}
		   //end  action for change password details
		   
		   
	   //start action for save profile details
	   if(isset($_POST['savedata']) || isset($_POST['savedatadocs'])){
		  
		  
  // if($model->load(Yii::$app->request->post()) && $model->save()) {
		  $model->isMinor = $_POST['isMinor'];
		 
		 $request = Yii::$app->request->post(); if(!empty($request)){ 
			//echo '<pre>';print_r($_FILES["logo"]);die;
			 
			//echo '<pre>';print_r($_FILES);die;
			// put all request data  to a variable
           $modelreq=$request['Myprofile'];
		   $title=$modelreq['title'];
		   $first_name=$modelreq['first_name'];
		   $last_name=$modelreq['last_name'];
		   if(isset($modelreq['middlename'])) { $middlename=$modelreq['middlename']; } else { $middlename=''; }
		   if(isset($modelreq['hide'])) { $hide=$modelreq['hide']; } else { $hide=0; }
		   $gender=$modelreq['gender'];
		   $nationality = $modelreq['nationality'];
		  
		   $martial_status=$modelreq['martial_status'];
		   $dob1 = $modelreq['dob']; $datecreate = date_create($dob1);$dob = date_format($datecreate,'y-m-d');

		   if(isset($modelreq['pan_card_no'])) { $pan_card_no=$modelreq['pan_card_no']; } else { $pan_card_no=''; }
		   if(isset($modelreq['adhar_card_no'])) { $adhar_card_no=$modelreq['adhar_card_no']; } else { $adhar_card_no=''; }
		   if(isset($modelreq['countryverificatn'])) { $countryverificatn=$modelreq['countryverificatn']; } else { $countryverificatn=''; }
		   if(isset($modelreq['passportno'])) { $passportno=$modelreq['passportno']; } else { $passportno=''; }
		   if(isset($modelreq['ocinumber'])) { $ocinumber=$modelreq['ocinumber']; } else { $ocinumber=''; }
		   if(isset($modelreq['pionumber'])) { $pionumber=$modelreq['pionumber']; } else { $pionumber=''; }



		//    $pan_card_no=$modelreq['pan_card_no'];
		//    $adhar_card_no=$modelreq['adhar_card_no'];
		//    $countryverificatn=$modelreq['countryverificatn'];
		//    $passportno=$modelreq['passportno'];
		//    $ocinumber=$modelreq['ocinumber'];
		//    $pionumber=$modelreq['pionumber'];
		  //primary phone details
		   $phonetypeprimary = $modelreq['phonetypeprimary'];
		   $phonecodetypeprim =$modelreq['phonecodetypeprim'];
		   $phonenumbersprim = $modelreq['phonenumbersprim'];
		   //secondary phone details
		   if(isset($modelreq['phonenumbersecondary'])){
		   $phonetypesecondary = $modelreq['phonetypesecondary'];
		   $phonecodetypecorres =$modelreq['phonecodetypecorres'];
		   $phonenumbersecondary = $modelreq['phonenumbersecondary']; } else { $phonetypesecondary = 'other'; $phonecodetypecorres = ''; $phonenumbersecondary =''; }
		   //primary email
		   $emailtypeprimary = $modelreq['emailtypeprimary'];
		   $emailnumbersprim = $modelreq['emailnumbersprim'];
		   if(isset($modelreq['emailtypesecondary'])){ $emailtypesecondary = $modelreq['emailtypesecondary']; } else { $emailtypesecondary = '' ; }
		   if(isset($modelreq['emailnumbersecondary'])){  $emailnumbersecondary = $modelreq['emailnumbersecondary']; } else { $emailnumbersecondary =''; }
		  //secondary email 
		  
		   $corr_city      = $modelreq['current_city'];
		   $corr_state     = $modelreq['current_state'];
		   $corr_country   = $modelreq['current_country'];
		   $corr_pincode   = $modelreq['current_pincode'];
		   $corressaddress = HtmlPurifier::process($modelreq['current_address']);
		   ///permanent address
		  if(isset($_POST['checkaddr'])){
		  $country = $corr_country;
		  $state   = $corr_state;
		  $city    = $corr_city;
		  $pincode = $corr_pincode;
		  $permanaddress =$corressaddress;
		  
		  } else {

		  $country = $modelreq['permanent_country'];
		  $state   = $modelreq['permanent_state'];
		  $city    = $modelreq['permanent_city'];
		  $pincode = $modelreq['permanent_pincode'];
		  $permanaddress = HtmlPurifier::process($modelreq['permanent_address']);
		  }
		   if(isset($_POST['isMinor'])) {
			   $minor =  $_POST['isMinor']; } else {
			   $minor = 0 ; } $sd = 0;

			   //profile picture upload 


			   $sendingitemContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));

			   global $new;
			   if(isset($_FILES["logo"])){
				  
				//echo '<pre>';print_r($_FILES);die;
			   $logo=$_FILES['logo'];
			   $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
			   $max_file_size = 102400*200; //100 kb
			   $path = "uploads/"; 
			   $count = 0;
			   if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
				   
				   if($_FILES['logo']['name']) {     
					   if ($_FILES['logo']['error'] == 4) {
						
						  // continue; // Skip file if any error found
					   }	       
					   if ($_FILES['logo']['error'] == 0) {	   
					      
						   if ($_FILES['logo']['size'] > $max_file_size) {
							 
							   $message[] = "$name is too large!.";
							//   continue; // Skip large files
						   }
						   
						   
						   else{
							
							// No error found! Move uploaded files 
						   
						   $filename  = basename($_FILES['logo']['name']);
			   $extension = pathinfo($filename, PATHINFO_EXTENSION);
			   $new       = $filename.$sendingitemContentMod.'.'.$extension;
			   
			   $root = $_SERVER['DOCUMENT_ROOT'];
						   
		move_uploaded_file($_FILES['logo']['tmp_name'], "{$root}/archive/web/mycompanylogo/{$new}");

							//   if (move_uploaded_file($_FILES['logo']['tmp_name'], "{$root}/archive/web/mycompanylogo/{$new}"))
							//   {
								  
							//    $getbbcompany = \common\models\Myprofile::find()->where(['userID'=>Yii::$app->user->identity->id])->one();
							
							//    $getbbcompany->logo = $new ;
							// 	$getbbcompany->save(false);
							// 	 }
							   
								 
							   
						   }
					   }
				   }
			   }
			   
			   }






              // profile picture upload end

				
//for phone no's

	\common\models\activemode::insert_phone_numbers(Yii::$app->user->identity->id,$phonecodetypeprim,$phonenumbersprim,1,$phonetypeprimary);
    if(!empty($phonenumbersecondary)){
		\common\models\activemode::insert_phone_numbers(Yii::$app->user->identity->id,$phonecodetypecorres,$phonenumbersecondary,0,$phonetypesecondary);
	}
//end for numbers
//for emails
	
	\common\models\activemode::insert_email_addresses(Yii::$app->user->identity->id,$emailnumbersprim,1,$emailtypeprimary);
	 if(!empty($emailnumbersecondary)){
		\common\models\activemode::insert_email_addresses(Yii::$app->user->identity->id,$emailnumbersecondary,0,$emailtypesecondary);
	}
//end for emails
//for permanet address
\common\models\activemode::insert_permanet_addresse(Yii::$app->user->identity->id,$country,$city,$state,$pincode);
//forcorrespondence		
\common\models\activemode::insert_correspondence_addresses(Yii::$app->user->identity->id,$corr_country,$corr_city,$corr_state,$corr_pincode);
//end for address			
}
	    $getUserPhoneconfig =\common\models\UserPhoneconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
	    $getUserEmailconfig = \common\models\UserEmailconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
		$getuseraddress = \common\models\UserAddressconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
		
       //update status
			 \common\models\activemode::insert_to_my_profile_table(Yii::$app->user->identity->id,$new,$title,$first_name,$middlename,$last_name,$getUserEmailconfig->emailid,                                                          
			 $getUserPhoneconfig->phoneid,$dob,$gender,$nationality,$hide,$martial_status,$minor,"","",$pan_card_no,$adhar_card_no,$corr_country,$corr_state,$corr_city,$corr_pincode,$country,$state,$city,$pincode,$corressaddress,$permanaddress,$countryverificatn,$passportno,$ocinumber,$pionumber);
			 \common\models\activemode::update_my_profile_progress_status(Yii::$app->user->identity->id,"my_profile",'100','3');
			 // \common\models\Myprofile::addnewleads_sales($first_name,Yii::$app->user->identity->id,$emailnumbersprim,$phonecodetypeprim,$phonenumbersprim,$corr_city);
			  
			  Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('frontend', 'Your profile has been successfully saved')
            ]);
            //return $this->refresh();
			if(isset($_POST['savedatadocs'])){
			   return $this->redirect(['/common/documents']);
			   
				
		   } else {
			   return $this->redirect(['userdash']);
		   }
			 }
	  
			 $getstatus = \common\models\MyProfileProgressStatus::getStatus(Yii::$app->user->identity->id);


			 if ($getstatus == 1) {
	 
			 $this->layout = "newdashboard";
			 } else {
	 
			 $this->layout = "beforeprofilecomplete";  // common
			 }
		
		return $this->render('postlogin',[
		 'model' => $model,
				'model2' => $model2,
				'UserProfileExmodel'=>$UserProfileExmodel ,
		]);
		
	}







    public function actionIndex() {
		$this->layout="homeindexLayout";
		//    meta tags description starts here  

		$title =  \Yii::$app->view->title = '15Bells - Commercial Property Investment, Sale & Lease in NCR';

		
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => 'With 15Bells.com, set your commercial property requirements once and then the platform will help you achieve the goal without any hassle — leverage Technology to get the best.'
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
		'content' => 'article'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:url',			
		'content' => 'https://www.15bells.com'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:image',			
		'content' => 'https://www.15bells.com/newimg/img/logo1.png'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:description',			
		'content' => 'With 15Bells.com, set your commercial property requirements once and then the platform will help you achieve the goal without any hassle — leverage Technology to get the best.'
		]);
	
		//    meta tags description ends here  
		
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
		$this->layout="homeLayout";
        return $this->render('about_us');
    }

	public function actionPostlogin2()
	{ $this->layout="common";
		 return $this->render('postlogin2');
	}

    public function actionVirtualroom() {
        return $this->render('virtual');
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
