<?php

namespace backend\controllers;

use Yii;
use common\models\Myprofile;
use common\models\MyprofilebackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * UsersprofileController implements the CRUD actions for Myprofile model.
 */
class UsersprofileController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Myprofile models.
     * @return mixed
     */
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
    public function actionIndex()
    {
        $searchModel = new MyprofilebackSearch();
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
    public function actionView()
    {
		 $rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($rbac->item_name == "csr_demand"){
		$this->layout="csr_demand_layout";
	}if($rbac->item_name == "csr_head"){
		$this->layout="csr_head_layout";
	}if($rbac->item_name == "csr_supply"){
		$this->layout="csr_supply_layout";
	}
		 $findid = Myprofile::find()->where(['userID'=>$_GET['userID']])->one();
		 if(isset($findid->id)){
			 $model = $this->findModel($findid->id);
		 } else {
			 $model = '';
		 }
        return $this->render('view', [
            'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
public function actionDocuments()
{
	$rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($rbac->item_name == "csr_demand"){
		$this->layout="csr_demand_layout";
	}if($rbac->item_name == "csr_head"){
		$this->layout="csr_head_layout";
	}if($rbac->item_name == "csr_supply"){
		$this->layout="csr_supply_layout";
	}
	$userid = $_GET['id'];
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($userid);


	$request = Yii::$app->request;
    $mdataPost = $request->post();
        $model = new \common\models\CompanyEmp();
        
        
        // get all document type for bus
         $finduserloginas = \common\models\UserLoginAs::find()->where(['user_id'=>$userid])->one();
		if($finduserloginas){
			$checkloginrole = \common\models\LoginAsConfig::find()->where(['id'=>$finduserloginas->loginasID])->one();
			
			if($checkloginrole->login_to == "user"){
				$alldocumentType=\common\models\Documenttype::getalldocumentType(2,$finduserloginas->loginasID);

			}else{
        // get all document type for bus
        $alldocumentType=\common\models\Documenttype::getalldocumentType(1,$finduserloginas->loginasID);

		} } else{
			$alldocumentType=\common\models\Documenttype::getalldocumentTypeuser(2);

		}
    
	 
	
		 if(isset($mdataPost['filedownload'])){	
	//exit();
function output_file($file, $name, $mime_type='')
{
 
 //Check the file premission
 if(!is_readable($file)) die('File not found or inaccessible!');
 
 $size = filesize($file);
 $name = rawurldecode($name);
 
 /* Figure out the MIME type | Check in array */
 $known_mime_types=array(
 	"pdf" => "application/pdf",
 	"txt" => "text/plain",
 	"html" => "text/html",
 	"htm" => "text/html",
	"exe" => "application/octet-stream",
	"zip" => "application/zip",
	"doc" => "application/msword",
	"xls" => "application/vnd.ms-excel",
	"ppt" => "application/vnd.ms-powerpoint",
	"gif" => "image/gif",
	"png" => "image/png",
	"jpeg"=> "image/jpg",
	"jpg" =>  "image/jpg",
	"php" => "text/plain"
 );
 
 if($mime_type==''){
	 $file_extension = strtolower(substr(strrchr($file,"."),1));
	 if(array_key_exists($file_extension, $known_mime_types)){
		$mime_type=$known_mime_types[$file_extension];
	 } else {
		$mime_type="application/force-download";
	 };
 };
 
 //turn off output buffering to decrease cpu usage
 @ob_end_clean(); 
 
 // required for IE, otherwise Content-Disposition may be ignored
 if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');
 
 header('Content-Type: ' . $mime_type);
 header('Content-Disposition: attachment; filename="'.$name.'"');
 header("Content-Transfer-Encoding: binary");
 header('Accept-Ranges: bytes');
 
 /* The three lines below basically make the 
    download non-cacheable */
 header("Cache-control: private");
 header('Pragma: private');
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 
 // multipart-download and download resuming support
 
 
 if(isset($_SERVER['HTTP_RANGE']))
 {
	list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
	list($range) = explode(",",$range,2);
	list($range, $range_end) = explode("-", $range);
	$range=intval($range);
	if(!$range_end) {
		$range_end=$size-1;
	} else {
		$range_end=intval($range_end);
	}
	
	
	$new_length = $range_end-$range+1;
	header("HTTP/1.1 206 Partial Content");
	header("Content-Length: $new_length");
	header("Content-Range: bytes $range-$range_end/$size");
 } else {
	$new_length=$size;
	header("Content-Length: ".$size);
 }
 
 /* Will output the file itself */
 $chunksize = 1*(1024*1024); 
 $bytes_send = 0;
 if ($file = fopen($file, 'r'))
 {
	if(isset($_SERVER['HTTP_RANGE']))
	fseek($file, $range);
 
	while(!feof($file) && 
		(!connection_aborted()) && 
		($bytes_send<$new_length)
	      )
	{
		$buffer = fread($file, $chunksize);
		print($buffer); //echo($buffer); // can also possible
		flush();
		$bytes_send += strlen($buffer);
	}
 fclose($file);
 } else
 //If no permissiion
 die('Error - can not open file.');
 //die
die();
}
//Set the time out
set_time_limit(0);
$root = $_SERVER['DOCUMENT_ROOT'];
//path to the file
$file_path=$root.'/archive/web/kycdocuments/'.$_REQUEST['filenamemain'];
print($file_path);

//Call the download function with file path,file name and file type
output_file($file_path, ''.$_REQUEST['filenamemain'].'', 'text/plain');
return $this->redirect(['documents', 'id' =>$_GET['id']]);
		 }
		  $request = Yii::$app->request->post();
	 
if (!empty($request)) {
		  $fstBlock=$alldocumentType[1];
		$secBlock=$alldocumentType[1];
		$documentroot = $_SERVER['DOCUMENT_ROOT'];
			$getarchieveurl=$documentroot.'archive/web';
	  $sendingitemContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));

		if($fstBlock!='' && $secBlock!='' && $fstBlock==$secBlock){   // applying condtion that everything is ok nad we ned to submit now. machine will understand that.
		$chkir=$mdataPost['supportchkir'];
		$model->save(); // save the bus info
		
		// --------------   upload the files      --------------
		$root = $_SERVER['DOCUMENT_ROOT'];
		 $target_dir = $root.'/archive/web/kycdocuments/';
         
		 if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		 foreach($chkir as $rath){  //  upload all files
		 $docDescription=$mdataPost['documentDescription'."$rath"];
                // $docRemark=$mdataPost['documentRemark'."$rath"];
                 
                 $docFiles=$_FILES["documentfiles"."$rath"];
                 if($docFiles!=''){
                     $finalfilename = basename($sendingitemContentMod.$_FILES["documentfiles"."$rath"]["name"]);
		 $target_file = $target_dir .$finalfilename;
        move_uploaded_file($_FILES['documentfiles'."$rath"]["tmp_name"], "$target_file");
		
				$UserKycdocuments = new \common\models\UserKycdocuments();
				  
				  if(!empty($mdataPost['documentDescription'."$rath"])){
					  $UserKycdocuments->userid=$userid;
				  $UserKycdocuments->document_name=$mdataPost['documentDescription'."$rath"];
				  }
				   if(!empty($_FILES['documentfiles'."$rath"]["tmp_name"])){
				  $UserKycdocuments->file_type=$_FILES['documentfiles'."$rath"]["tmp_name"];
				   }
				   if(!empty($_FILES['documentfiles'."$rath"]["name"])){
				  $UserKycdocuments->document_file_name_extenstn=$finalfilename;
				  $UserKycdocuments->docment_file_name=$_FILES['documentfiles'."$rath"]["name"];
				  $UserKycdocuments->document_file_path=$root.'/archive/web/kycdocuments/';
                  $UserKycdocuments->save(); 
				   }
				   
                 }
                 $checkifallareupload=\common\models\activemode::check_my_docs_upload_completion_status($userid);
				 if($checkifallareupload == 7){
					 //do my docs completiton entry 
					  $myprofilestatus = new \common\models\MyProfileProgressStatus();
		              $myprofilestatus->process_name="my_KYC_upload";
		              $myprofilestatus->process_status="100";
		              $myprofilestatus->user_id= $userid;
		              $myprofilestatus->role_id=3;
		              $myprofilestatus->save();
				 }
     }}
	

                  //////////////   end uploading files       ////////////////////
				
		
				return $this->render('documents', [
		'id'=>$userid,
                'model' => $model,
			//	'totnumberofdocument' => $fstBlock,
                 'busdocument' => $alldocumentType[0],
                 'totnumberofdocument' => $alldocumentType[1],  
            ]);
		
		}
		
		else{
		
		return $this->render('documents', [
		'id'=>$userid,
                'model' => $model,
			//	'totnumberofdocument' => $fstBlock,
                  'busdocument' => '',
                 'totnumberofdocument' => '',
            ]);
		
		}
		
		
            
        } else {
            return $this->render('documents', [
                'model' => $model,
				'totnumberofdocument' => $alldocumentType[1],
                                'busdocument' => $alldocumentType[0],
            ]);
        }
}
public function actionPostlogin(){
	$useridtwo = $_GET['id'];
	$rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($rbac->item_name == "csr_demand"){
		$this->layout="csr_demand_layout";
	}if($rbac->item_name == "csr_head"){
		$this->layout="csr_head_layout";
	}if($rbac->item_name == "csr_supply"){
		$this->layout="csr_supply_layout";
	}
	 // list all the models
		 $model = new Myprofile();
		 $UserProfileExmodel = new \common\models\UserProfileEx();
		
		   
	   //start action for save profile details
	   if(isset($_POST['savedata']) || isset($_POST['savedatadocs'])){
  // if($model->load(Yii::$app->request->post()) && $model->save()) {
		  $model->isMinor = $_POST['isMinor'];
		 
		 $request = Yii::$app->request->post(); if(!empty($request)){ // put all request data  to a variable
			//echo '<pre>';print_r($request);die;
           $modelreq=$request['Myprofile'];
		   $title=$modelreq['title'];
		   $first_name=$modelreq['first_name'];
		   $last_name=$modelreq['last_name'];
		   if(isset($modelreq['middlename'])) { $middlename=$modelreq['middlename']; } else { $middlename=''; }
		   $gender=$modelreq['gender'];
		   $nationality = $modelreq['nationality'];
		   $hide=$modelreq['hide'];  
		   $martial_status=$modelreq['martial_status'];
		   $dob1 = $modelreq['dob']; $datecreate = date_create($dob1);$dob = date_format($datecreate,'y-m-d');
		   $pan_card_no=$modelreq['pan_card_no'];
		   $adhar_card_no=$modelreq['adhar_card_no'];
		   $countryverificatn=$modelreq['countryverificatn'];
		   $passportno=$modelreq['passportno'];
		   $ocinumber=$modelreq['ocinumber'];
		   $pionumber=$modelreq['pionumber'];
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

	\common\models\activemode::insert_phone_numbers($useridtwo,$phonecodetypeprim,$phonenumbersprim,1,$phonetypeprimary);
    if(!empty($phonenumbersecondary)){
		\common\models\activemode::insert_phone_numbers($useridtwo,$phonecodetypecorres,$phonenumbersecondary,0,$phonetypesecondary);
	}
//end for numbers
//for emails
	
	\common\models\activemode::insert_email_addresses($useridtwo,$emailnumbersprim,1,$emailtypeprimary);
	 if(!empty($emailnumbersecondary)){
		\common\models\activemode::insert_email_addresses($useridtwo,$emailnumbersecondary,0,$emailtypesecondary);
	}
//end for emails
//for permanet address
\common\models\activemode::insert_permanet_addresse($useridtwo,$country,$city,$state,$pincode);
//forcorrespondence		
\common\models\activemode::insert_correspondence_addresses($useridtwo,$corr_country,$corr_city,$corr_state,$corr_pincode);
//end for address			
}
	    $getUserPhoneconfig =\common\models\UserPhoneconfig::find()->where(['userid'=>$useridtwo ,'isdefault'=>1])->one();
	    $getUserEmailconfig = \common\models\UserEmailconfig::find()->where(['userid'=>$useridtwo ,'isdefault'=>1])->one();
		$getuseraddress = \common\models\UserAddressconfig::find()->where(['userid'=>$useridtwo ,'isdefault'=>1])->one();
		
       //update status
			 \common\models\activemode::insert_to_my_profile_table($useridtwo,$title,$first_name,$middlename,$last_name,$getUserEmailconfig->emailid,                                                          
			 $getUserPhoneconfig->phoneid,$dob,$gender,$nationality,$hide,$martial_status,$minor,"","",$pan_card_no,$adhar_card_no,$corr_country,$corr_state,$corr_city,$corr_pincode,$country,$state,$city,$pincode,$corressaddress,$permanaddress,$countryverificatn,$passportno,$ocinumber,$pionumber);
			 \common\models\activemode::update_my_profile_progress_status($useridtwo,"my_profile",'100','3');
			  \common\models\Myprofile::addnewleads_sales($first_name,$useridtwo,$emailnumbersprim,$phonecodetypeprim,$phonenumbersprim,$corr_city);
			  Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('frontend', 'Lead profile has been successfully saved')
            ]);
            //return $this->refresh();
			
			   return $this->render('postlogin',[
		 'model' => $model,
				
				'UserProfileExmodel'=>$UserProfileExmodel ,
		]);
		   
			 }
	  
		
		return $this->render('postlogin',[
		 'model' => $model,
				
				'UserProfileExmodel'=>$UserProfileExmodel ,
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
