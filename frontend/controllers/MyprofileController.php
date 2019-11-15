<?php

namespace frontend\controllers;

use Yii;
use common\models\Myprofile;
use common\models\MyprofileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\base\MultiModel;
use frontend\modules\user\models\AccountForm;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;

use yii\filters\AccessControl;



/**
 * MyprofileController implements the CRUD actions for Myprofile model.
 */
class MyprofileController extends Controller
{
	public $layout="common";
	    public function actions()
    {
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
            ]
        ];
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
			 'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all Myprofile models.
     * @return mixed
     */
	 public function actionUser_profile_1(){
		 return $this->render('user_profile_1');
	 }
	 
	  public function actionUser_profile_2(){
		 return $this->render('user_profile_2');
	 }
    public function actionIndex()
    {
        $searchModel = new MyprofileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Myprofile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Myprofile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Myprofile();
		
		 $accountModel = new AccountForm();
        $accountModel->setUser(Yii::$app->user->identity);

        $model2 = new MultiModel([
            'models' => [
                'account' => $accountModel,
                'profile' => Yii::$app->user->identity->userProfile
            ]
        ]);
		 if(isset($_GET['savegeneraldata'])){
	
		  $request = Yii::$app->request->post();
           
           $pan_card_no=$_GET['pan_card_no'];
		   $adhar_card_no=$_GET['adhar_card_no'];
		   $minor =  $_GET['minor'];
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
		 
		if(isset($_GET['minorrelation'])){
         $minor_relatn = $_GET['minorrelation'];
		
		 $userproflile->relationship_with_minor =$minor_relatn;
		 	 $userproflile->save();
		}
			if(isset($_GET['guardianname'])){
        $guardian_name = $_GET['guardianname'];
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
	 }
	  
        
            return $this->render('create', [
                'model' => $model,
				'model2' => $model2,
            ]);
        
    }

    /**
     * Updates an existing Myprofile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Myprofile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Myprofile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Myprofile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Myprofile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
