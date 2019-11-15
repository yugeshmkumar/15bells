<?php

namespace backend\controllers;

use Yii;
use common\models\UserKycdocuments;
use common\models\UserKycdocumentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserKycdocumentsController implements the CRUD actions for UserKycdocuments model.
 */
class UserKycdocumentsController extends Controller
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
     * Lists all UserKycdocuments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserKycdocumentsSearch();
		 $dataProvider = $searchModel->searchnew(Yii::$app->request->queryParams);
		  $request = Yii::$app->request;
        $mdataPost = $request->post();
		
		 $model = new \common\models\UserKycdocuments();
		 
		  if (isset($_POST['hasEditable'])) {
			  
        // use Yii's response format to encode output as JSON
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        // read your posted model attributes
        if ($model->load($_POST)) {
			$request = Yii::$app->request->post();
            $modelreq=$request['UserKycdocuments'];
			$editableIndex = $_POST['editableIndex'];
            $approvestatus=$modelreq[$editableIndex]['approve_reason'];
			$geteditablekey = $_POST['editableKey'];
			$finduser = \common\models\UserKycdocuments::find()->where(['id'=>$geteditablekey])->one();
			if($finduser){
			$arrfindall = \common\models\UserKycdocuments::find()->where(['userid'=>$finduser->userid])->all();
			
			
				foreach($arrfindall as $findall){
					//print($approvestatus);
				$findall->approve_status = 1;
				$findall->approve_reason = $approvestatus;
				$findall->approved_by = yii::$app->user->identity->id;
				$findall->approved_at = date('y-m-d h:i:s');
				$findall->save();
				}
			 //update status
		 $myprofilestatus = new \common\models\MyProfileProgressStatus();
		 $myprofilestatus->process_name="my_KYC_approval";
		 $myprofilestatus->process_status="100";
		 $myprofilestatus->user_id= $finduser->userid;
		 
		 $myprofilestatus->role_id=3;
		 $myprofilestatus->save();
            // read or convert your posted information
           // $value = $model->approve_status;
            // return JSON encoded output in the below format
            return $this->refresh();
            
            // alternatively you can return a validation error
            // return ['output'=>'', 'message'=>'Validation error'];
        }}
        // else if nothing to do always return an empty JSON encoded output
        else {
            return ['output'=>'', 'message'=>''];
        }
    }
     
		 if(isset($mdataPost['filedownloadtwo'])){	
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
$file_path=$root.'/15bells/archive/web/kycdocuments/'.$_REQUEST['filenamemaintwo'];
print($file_path);

//Call the download function with file path,file name and file type
output_file($file_path, ''.$_REQUEST['filenamemaintwo'].'', 'text/plain');
	 }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserKycdocuments model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {    $rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($rbac->item_name == "csr_demand"){
		$this->layout="csr_demand_layout";
	}if($rbac->item_name == "csr_head"){
		$this->layout="csr_head_layout";
	}if($rbac->item_name == "csr_supply"){
		$this->layout="csr_supply_layout";
	}
	    $userid = $_GET['userid'];
            $model = UserKycdocuments::find()->where(['userid'=>$userid])->one();
            //$model = $this->findModeluser($_GET['userid']);
             if(isset($model)){
        return $this->render('view', [
            'model' => $model,
			//'userid'=> $userid,
             ]); } else {
                  return $this->render('view', [
           // 'model' => $model,
			//'userid'=> $userid,
             ]);
             }
    }
 public function actionUpdatestatusaction()
 {   
 if(isset($_GET['writecomment'])){
 $writecomment = $_GET['writecomment']; } else {  $writecomment ="NA"; }
	 $docid = $_GET['id'];
	  $currentact = $_GET['ca'];
	  
		  $finddocumnt = \common\models\UserKycdocuments::find()->where(['id'=>$docid])->one();
		  if($finddocumnt){
			  if($currentact == "approved"){
			  $finddocumnt->approve_status=1;
			  $finddocumnt->approve_reason= $writecomment;
			  $finddocumnt->approved_by=Yii::$app->user->identity->id;
			  $finddocumnt->approved_at = date('y-m-d h:i:s');
			  $finddocumnt->save();
			   
			   
			     $countfinddocumnt = \common\models\UserKycdocuments::find()->where(['userid'=>$finddocumnt->userid])->count();
		  $countfinddocumnt_approved = \common\models\UserKycdocuments::find()->where(['userid'=>$finddocumnt->userid,'approve_status'=>1])->count();
		
		  if($countfinddocumnt == $countfinddocumnt_approved)
		  {
			 $checkcheck = \common\models\MyProfileProgressStatus::find()->where(['user_id'=>$finddocumnt->userid,'process_name'=>"my_KYC_approval",'process_status'=>100,'active'=>1])->one();
			  if(!$checkcheck){
		 $myprofilestatus = new \common\models\MyProfileProgressStatus();
		 $myprofilestatus->process_name="my_KYC_approval";
		 $myprofilestatus->process_status="100";
		 $myprofilestatus->user_id= $finddocumnt->userid;
		 
		 $myprofilestatus->role_id=3;
		 $myprofilestatus->save();
			  }
		  } else {
			  //checkifchanged
			  $checkcheck = \common\models\MyProfileProgressStatus::find()->where(['user_id'=>$finddocumnt->userid,'process_name'=>"my_KYC_approval",'process_status'=>100,'active'=>1])->one();
			  if($checkcheck){
				  $checkcheck->delete();
			  }
		  }
		  return 1 ;
	  } else {
		      $finddocumnt->approve_status=2;
			  $finddocumnt->approve_reason= $writecomment;
			  $finddocumnt->approved_by=Yii::$app->user->identity->id;
			  $finddocumnt->approved_at = date('y-m-d h:i:s');
			  $finddocumnt->save();
			  
			  			  $checkcheck = \common\models\MyProfileProgressStatus::find()->where(['user_id'=>$finddocumnt->userid,'process_name'=>"my_KYC_approval",'process_status'=>100,'active'=>1])->one();
			  if($checkcheck){
				  $checkcheck->delete();
			  }
			  
			   return 2 ;
		  } 
		  
		 
		  
		  }
	 
 }
 public function actionUpdatestatus()
 {
	 return $this->renderPartial('updatestatus');
 }
	
	public function actionBlockuser()
{
	if(isset($_POST['blockuser'])){
		
	}
	return $this->render('blockuser');
}
public function actionWritecomment()
{
	return $this->render('writecomment');
}
    /**
     * Creates a new UserKycdocuments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserKycdocuments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserKycdocuments model.
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
     * Deletes an existing UserKycdocuments model.
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
     * Finds the UserKycdocuments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserKycdocuments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
	  protected function findModeluser($id1)
    {
        if (($model = UserKycdocuments::find()->where(['userid'=>$id1])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModel($id)
    {
        if (($model = UserKycdocuments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
