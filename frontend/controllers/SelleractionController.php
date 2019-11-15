<?php

namespace frontend\controllers;

use Yii;
use common\models\Property;
use common\models\PropertySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class SelleractionController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "common";
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
       
		$model = new Property();

        
 if (isset($_POST['submitform'])) {
                   //basic details
                      $propertyfor="Sale";
                      $propertytype=$_POST['propertytye'];
                      //address deatils
                     $city=$_POST['City'];
                     $state=$_POST['state'];
                     $country="India";
                     $location=$_POST['location'];
                     $locality=$_POST['Locality'];
                     $address=$_POST['Address'];
                    
                     //area
                        $totalarea=$_POST['Total_Area'];
                        $builtuparea=$_POST['builtup_area'];
                        $carpetarea=$_POST['carpet_area'];
                     //price
                          $expectedprice=$_POST['expected_price'];
                          $pricepersqft=$_POST['price_per_sq_ft'];
                          $maintaincecost=$_POST['maintaince_cost'];
                          $maintainceper=$_POST['maintaincecostper'];
if(isset($_POST['checkbox1_1'])){
                          $includestampcharges=$_POST['checkbox1_1'];}else{
$includestampcharges="No";
}
                        
if(isset($_POST['checkbox2_1'])){
                          $notwantbroker=$_POST['checkbox2_1'];}else{
$notwantbroker="No";
}

                     //transaction
                        $transactiontype=$_POST['radio24'];
                        $possessionstatus=$_POST['radio25'];

                     ///availability
                        $availablity_month=$_POST['availablefrom'];
                        $availablity_year=$_POST['availableyear'];
if(($propertytype == 1) ||($propertytype == 2)||($propertytype == 3)||($propertytype == 4)||($propertytype == 5)||($propertytype == 6)||($propertytype == 7 )||($propertytype == 8)||($propertytype == 9)||($propertytype == 10)){
 //property Details
                           $building_name1=$_POST['building_name'];
                           $building_no2 =$_POST['building_no']; 
                           $totalrooms3 =$_POST['total_rooms'];
                           $totalbalconies4 =$_POST['total_balconies']; 
                           $furnishedstatus5=$_POST['furnished_status'];
                           $totalfloors6=$_POST['totalfloors'];
                            $floorno7 =$_POST['FloorNumber'];

                        $modelid =  $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,$building_name1,$building_no2 ,$totalrooms3,$totalbalconies4 ,$furnishedstatus5 ,$totalfloors6,$floorno7,"","","","","","");

                     }if(($propertytype == 11)||($propertytype == 12)){
                          $building_name1=$_POST['building_name'];
                          $building_no2 =$_POST['building_no']; 
                          $furnishedstatus5=$_POST['furnished_status'];
                          $totalfloors6=$_POST['totalfloors'];
                          $floorno7 =$_POST['FloorNumber'];
                          $officespaceshared8 =$_POST['officespaceshared'];
                          $personalwashrooms9=$_POST['personalwashrooms'];
                          $pantryavail10=$_POST['pantryavail'];
               $modelid =  $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,$building_name1,$building_no2 ,"","",$furnishedstatus5 ,$totalfloors6,$floorno7,$officespaceshared8,$personalwashrooms9,$pantryavail10,"","","");

}if(($propertytype == 13)||($propertytype == 14)){
                         $building_name1=$_POST['building_name'];
                         $furnishedstatus5=$_POST['furnished_status'];
                         $totalfloors6=$_POST['totalfloors'];
                         $floorno7 =$_POST['FloorNumber'];
                         $personalwashrooms9=$_POST['personalwashrooms'];
                         $pantryavail10=$_POST['pantryavail'];
                         $cornershop11 =$_POST['cornershop'];
                         $onmainroad12 = $_POST['onmainroad'];
               $modelid =      $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,$building_name1,"","","",$furnishedstatus5 ,$totalfloors6,$floorno7,"",$personalwashrooms9,$pantryavail10,$cornershop11,$onmainroad12 ,"");
}
if($propertytype == 15){

                     $onmainroad12 = $_POST['onmainroad'];
                     $bundrywallmade13 =$_POST['bundrywallmade'];
            $modelid =  $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,"","","","","","","","","","","",$onmainroad12 ,$bundrywallmade13);
}if($propertytype == 16){

                           $furnishedstatus5=$_POST['furnished_status'];
                           $totalfloors6=$_POST['totalfloors'];
                           $floorno7 =$_POST['FloorNumber'];
                            $onmainroad12 = $_POST['onmainroad'];
            $modelid =     $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,"","","","",$furnishedstatus5 ,$totalfloors6,$floorno7,"","","","",$onmainroad12 ,"");

}if($propertytype == 17){

                     $onmainroad12 = $_POST['onmainroad'];
                     $bundrywallmade13 =$_POST['bundrywallmade'];
             $modelid =  $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,"","","","","","","","","","","",$onmainroad12 ,$bundrywallmade13);
}if($propertytype == 18){

                           $totalfloors6=$_POST['totalfloors'];
                        $modelid =  $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,"","","","","",$totalfloors6,"","","","","","");

}if($propertytype == 19){

                    $onmainroad12 = $_POST['onmainroad'];
$modelid = $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,"","","","","","","","","","","",$onmainroad12 ,"");
                    
}
if($propertytype == 20){

                    $onmainroad12 = $_POST['onmainroad'];
                    $bundrywallmade13 =$_POST['bundrywallmade'];
                $modelid =  $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,"","","","","","","","","","","",$onmainroad12 ,$bundrywallmade13);
}if($propertytype == 21){
 
                           $totalrooms3 =$_POST['total_rooms'];
                          $furnishedstatus5=$_POST['furnished_status'];
                           $totalfloors6=$_POST['totalfloors'];
                           $onmainroad12 = $_POST['onmainroad'];
$modelid = $this->insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,"","" ,$totalrooms3,"" ,$furnishedstatus5 ,$totalfloors6,"","","","","",$onmainroad12 ,"");
}

            return $this->redirect(['additional', 'id' =>$modelid]);
        } else {
            return $this->render('schedulevisit', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionAdditional() {
		 $model = new Property();
		 $model1=new \common\models\MediaFiles();
		 if(isset($_GET['id'])){
			 $modelid = $_GET['id'];
		}else{$modelid ='';}
		$request = Yii::$app->request->post();
if (!empty($request)) {
	$getmodel = Property::find()->where(['id'=>$modelid])->one();
	
            $imageContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));
	
            $modelreq=$request['Property'];
           
            
            $getfilename=$modelreq['featured_image'];
//$getarchieveurl = Yii::getAlias('@archiveUrl');  
            $documentroot = $_SERVER['DOCUMENT_ROOT'];
           
           
			$getarchieveurl=$documentroot.'/archive/web';
		if($getmodel){
      $getmodel->featured_image = \yii\web\UploadedFile::getInstance($getmodel, 'featured_image');
	$getmodel->featured_image->saveAs(''.$getarchieveurl.'/propertydefaultimg/' . $getmodel->featured_image->baseName.$imageContentMod.'.' . $getmodel->featured_image->extension);
	$getmodel->featured_image = '' . $getmodel->featured_image->baseName.$imageContentMod. '.' . $getmodel->featured_image->extension;
	 $getmodel->save();

		}
    



	 return $this->redirect(['view', 'id' =>$modelid]);
       } else {
            return $this->render('additional', [
                'model' => $model,
				'model1' => $model1,
            ]);
        }

        
    }

	public function actionFileupload(){
		 $model = new Property();
		 if(isset($_GET['id'])){
			 $modelid = $_GET['id'];
		}else{$modelid ='';}
		$request = Yii::$app->request->post();
if (!empty($request)) {
	$getmodel = Property::find()->where(['id'=>$modelid])->one();
	
           // $modelreq=$request['Property'];
           // $arrgetfilename=$modelreq['featured_thumbnails_id'];
			 
            $documentroot = $_SERVER['DOCUMENT_ROOT'];
			$getarchieveurl=$documentroot.'/archive/web';
		


$sendingitemContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));

if(isset($_FILES["featured_thumbnails_id"])){

$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 102400*100; //100 kb
$path = "uploads/"; 
$count = 0;
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	
	if($_FILES['featured_thumbnails_id']['name']) {     
	    if ($_FILES['featured_thumbnails_id']['error'] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['featured_thumbnails_id']['error'] == 0) {	           
	        if ($_FILES['featured_thumbnails_id']['size'] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			
			
	        else{ // No error found! Move uploaded files 
			
			$filename  = basename($_FILES['featured_thumbnails_id']['name']);
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$new       = $filename.$sendingitemContentMod.'.'.$extension;

$root = $_SERVER['DOCUMENT_ROOT'];
			

               if (move_uploaded_file($_FILES['featured_thumbnails_id']['tmp_name'], "{$root}/archive/web/uploadsthumbnails/{$new}"))
               {
					//  copy("uploads/{$new}","{$root}/15bells/archive/web/uploadsthumbnails/{$new}");
					$mediafiles = new \common\models\MediaFiles();
				  $mediafiles->type = $extension;
				  $mediafiles->link = "{$root}/archive/web/uploadsthumbnails/";
				  $mediafiles->file_name = $new;
				  $mediafiles->file_descr = $new;
				  $mediafiles->save();
				  
				  $MediaFilesConfig = new \common\models\MediaFilesConfig();
				  $MediaFilesConfig->property_id =$modelid;
				  $MediaFilesConfig->media_id = $mediafiles->id;
				  $MediaFilesConfig->save();
				  $getmodelpr = Property::find()->where(['id'=>$modelid])->one();
	              $getmodelpr->featured_thumbnails_id=$MediaFilesConfig->media_id.',';
				 $getmodelpr->save(); 
				  }
				  
				  
	            $count++; // Number of successfully uploaded file
	        }
	    }
	}
}
}



	 return $this->redirect(['view', 'id' =>$modelid]);
       } else {
		return $this->render('fileupload');
	}}
 public function actionIndex()
    {
        $searchModel = new PropertySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Property model.
     * @param integer $id
     * @return mixed
     */
public function insertintoprperty($propertyfor,$propertytype,$city,$state,$country,$location,$locality,$address,$totalarea,$builtuparea,$carpetarea,$expectedprice,$pricepersqft,$maintaincecost,$maintainceper,$includestampcharges,$notwantbroker,$transactiontype,$possessionstatus,$availablity_month,$availablity_year ,$building_name1,$building_no2 ,$totalrooms3,$totalbalconies4 ,$furnishedstatus5 ,$totalfloors6,$floorno7,$officespaceshared8,$personalwashrooms9,$pantryavail10,$cornershop11,$onmainroad12 ,$bundrywallmade13)
{
            $model = new \common\models\Property();
            $model->userid=Yii::$app->user->identity->id; 
            $model->roleid=6;  
            $model->projectypeid  =$propertytype;                
            $model->propertydescr="Sale"; 
            $model->property_for="Sale";           
            $model->location =$location;                
            $model->locality =$locality;                 
             $model->city  =$city;                 
            $model->state  =$state;               
            $model->address  =$address;                 
            $model->country  =$country;               
                           
            $model->building_no    =$building_no2;              
            $model->building_name  =$building_name1;               
            $model->totalrooms     =$totalrooms3;           
            $model->totalfloors    =$totalfloors6;            
            $model->floorno        =$floorno7 ;         
            $model->totalbalconies  =$totalbalconies4;               
            $model->furnishedstatus =$furnishedstatus5;                
            $model->on_road  =$onmainroad12;            
            $model->walls_made =$bundrywallmade13 ;                 
            $model->office_space_shared  =$officespaceshared8;               
            $model->personal_washrooms    =$personalwashrooms9   ;         
            $model->pantry_available     =$pantryavail10;            
            $model->total_area  =$totalarea;               
            $model->built_up_area =$builtuparea;        
            $model->carpet_area =$carpetarea;                 
            $model->expected_price=$expectedprice;                 
            $model->price_per_sqft =$pricepersqft;                
            $model->maintaince_cost=$maintaincecost;
            $model->maintaince_by =$maintainceper;
            $model->include_stamp_reg_charges =$includestampcharges;
            $model->brokers_response =$notwantbroker;                 
            $model->available_from_month =$availablity_month;                 
            $model->available_from_year  =$availablity_year ;               
            $model->save();
return $model->id;
}
    public function actionView($id)
    {
		$request = Yii::$app->request;
		$mdataPost = $request->post();
		 //$model = new \common\models\UserKycdocuments();
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
$file_path=$root.'/archive/web/uploadsthumbnails/'.$_REQUEST['filenamemain'];
print($file_path);

//Call the download function with file path,file name and file type
output_file($file_path, ''.$_REQUEST['filenamemain'].'', 'text/plain');
return $this->redirect(['view', 'id' =>$_GET['id']]);
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
$file_path=$root.'/archive/web/propertydefaultimg/'.$_REQUEST['filenamemaintwo'];
print($file_path);

//Call the download function with file path,file name and file type
output_file($file_path, ''.$_REQUEST['filenamemaintwo'].'', 'text/plain');
return $this->redirect(['view', 'id' =>$_GET['id']]);
		 }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Property model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Property();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Property model.
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
     * Deletes an existing Property model.
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
     * Finds the Property model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Property the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Property::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	

}
