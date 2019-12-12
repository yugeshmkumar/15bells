<?php

namespace backend\controllers;

use Yii;
use common\models\Addproperty;
use common\models\AddpropertySearch;
use common\models\LessorExpectations;
use common\models\SellorExpectations;
use common\models\Property;
use common\models\MediaFiles;
use common\models\PropertySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\filters\AccessControl;

/**
 * AddpropertyController implements the CRUD actions for Addproperty model.
 */
class AddpropertyController extends Controller
{
    /**
     * @inheritdoc
     */
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
                        'actions' => ['sitevisit','index','lessor','sellor','view','sellorview','lesview','viewsearch','viewmy','views','searchview','getuserids','emdpay',
'getbiduserids','getsiteuserids','getexpectationdata','showpropdetails','create','creates','additional','additionals','fileupload',
'fileuploads','documents','documentss','upload_avatar','update','updateinsellor','transaction','updateinlessor','updateb','showdocuments','showdocumentsl','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
           
        ];
    }

    /**
     * Lists all Addproperty models.
     * @return mixed
     */
     public function actionSitevisit() {
        return $this->render('sitevisit');
    }
     public function actionTransaction() {
        return $this->render('transaction');
    }

   public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $assigndash = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	
	if($assigndash->item_name == "csr_demand"){
		
		$this->layout="csr_layout";
		
	}if($assigndash->item_name == "csr_head"){
		
		$this->layout="csr_layout";
		
	}if($assigndash->item_name == "csr_supply"){
		
		$this->layout="csr_layout";
		
	}
       if($assigndash->item_name == "sales_demand_lessee"){
		
		$this->layout="sales_supply_layout";
		
	}if($assigndash->item_name == "sales_head"){
		
		$this->layout="sales_layout";
		
	}if($assigndash->item_name == "sales_demand_buyer"){
		
		$this->layout="sales_demand_layout";		
	}
if($assigndash->item_name == "sales_supply_seller"){
		
		$this->layout="sales_buying_layout";		
	}
if($assigndash->item_name == "sales_supply_lessor"){
		
		$this->layout="sales_leasing_layout";		
	}
	
	
    }
    
    public function actionIndex()
    {
        $searchModel = new AddpropertySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLessor()
    {
        $searchModel = new AddpropertySearch();
        $user_id = $_GET['id'];
        $dataProvider = $searchModel->searchlbac(Yii::$app->request->queryParams,$user_id);

        return $this->render('lessor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


     public function actionSellor()
    {
        $searchModel = new AddpropertySearch();
        $user_id = $_GET['id'];
        $dataProvider = $searchModel->searchsbac(Yii::$app->request->queryParams,$user_id);

        return $this->render('sellor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Addproperty model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
   
    public function actionSellorview()
    {
        $searchModel = new AddpropertySearch();
        $dataProvider = $searchModel->searchselview(Yii::$app->request->queryParams);

        return $this->render('sellorview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLesview()
    {
        $searchModel = new AddpropertySearch();
        $dataProvider = $searchModel->searchlesview(Yii::$app->request->queryParams);

        return $this->render('lessorview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


     public function actionViewsearch($id)
    {
        //$this->layout = "newdashboard";
        return $this->render('searchview', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewmy()
    {
        $id = $_POST['expandRowKey'];
        return $this->renderPartial('viewsold', [
            'model' => $this->findModel($id),
        ]);
    }

  public function actionViews($id)
    {
        return $this->render('views', [
            'model' => $this->findModel($id),
        ]);
    }


  public function actionSearchview()
    {

        $model = new Addproperty();
        return $this->render('searchview', [
            'model' => $model,
        ]);
    }




public function actionGetuserids($id) {
                

		$user_id = Yii::$app->user->identity->id;
	       
	       $payments = \Yii::$app->db->createCommand("SELECT id,user_id from shortlistproperty where property_id='$id'")->queryAll();

		    echo json_encode($payments);
		 
	    }

public function actionEmdpay($propids, $visitypeid,$emd_id) {

        $user_id = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

            

        $payments = \Yii::$app->db->createCommand("SELECT id from vr_setup where propertyID='$propids'")->queryAll(); 
          //echo '<pre>';print_r($payments);die;
        
           if(!empty($payments)){
        $finduser = \common\models\RequestEmd::find()->where(['user_id' => $emd_id])->andwhere(['property_id' => $propids])->one();
        if($finduser){
            
            
            $finduser->payment_status = 'paid';
            $finduser->save(false);
        }   else{
            echo 'nhi aya ';die;
        }   
            
        $vr_id = $payments[0]['id'];
        $trendingadd = \Yii::$app->db->createCommand()->insert('requested_biding_users', ['userid' => $emd_id, 'propertyID' => $propids, 'userroleID' => 'lessee', 'request_for'=>'bid','created_at' => $date])->execute();
        if ($trendingadd) {
            return 1;die;
        } else {
            return 2;die;
        }   
        } else{
            return 3;die;
        }
        
        
    }


         public function actionGetbiduserids($id) {
                

		$user_id = Yii::$app->user->identity->id;
	       
	       $payments = \Yii::$app->db->createCommand("SELECT id,userid from requested_biding_users where propertyID='$id'")->queryAll();

		    echo json_encode($payments);
		 
	    }


         public function actionGetsiteuserids($id) {
                

		$user_id = Yii::$app->user->identity->id;
	       
	       $payments = \Yii::$app->db->createCommand("SELECT request_id,user_id from request_site_visit where property_id='$id'")->queryAll();

		    echo json_encode($payments);
		 
	    }

public function actionGetexpectationdata($id) {
                

	       
	       $payments = \Yii::$app->db->createCommand("SELECT * from sellor_expectations where user_id='$id' and user_type='buyer' ORDER BY id DESC LIMIT 1")->queryOne();

		    echo json_encode($payments);
		 
	    }

public function actionShowpropdetails($id){
       
              
	       $payments = \Yii::$app->db->createCommand("SELECT a.* ,p.typename as typename from addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) where a.id='$id'")->queryAll();

	         echo json_encode($payments);
   } 

    /**
     * Creates a new Addproperty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       
         $model = new Addproperty(['scenario' => 'create']);
         
         $userid = $_GET['id'];
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');
        
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
            
           
           // echo '<pre>';print_r(Yii::$app->request->post());die;
           
            $yiipost = Yii::$app->request->post();
            $available_date = $yiipost['Addproperty']['available_date'];
            $total_plot_area = $yiipost['Addproperty']['total_plot_area'];
            $buildup_area = $yiipost['Addproperty']['buildup_area'];

            if($total_plot_area == ''){

               $model->total_plot_area = $buildup_area;

             }

            $lattitude = $yiipost['lat1'];
            $longitude = $yiipost['long1'];
            $town = $yiipost['town'];
            $sector = $yiipost['sector'];
            
            $model->property_for = 'rent';
            $model->user_id = $userid;
            $model->role_id = 'lessor';
            $model->latitude = $lattitude;
            $model->longitude = $longitude;
             $model->town_name = $town;
             if($sector != ''){
              $model->sector_name = $sector;
               }

  
             if($available_date == ''){
               $model->available_date = '0000-00-00';  
            }else{
               $model->available_date = $available_date;  
            }
            $model->created_date = $date;
            
            if($buildup_area !=''){
            
            
            if($model->save()){
              \common\models\activemode::update_my_profile_progress_status($userid,"add_property",'100','5');
               return $this->redirect(['lessor-expectations/create', 'id' => $model->id]);
            }else{
                print_r($model->getErrors());die;
            }
          
        }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    
    public function actionCreates()
    {
       // $this->layout = "newdashboard";
         $model = new Addproperty(['scenario' => 'creates']);
         $userid = $_GET['id'];
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post())) {
                        
          //  echo '<pre>';print_r(Yii::$app->request->post());die;
//            if($model->choice=='A')
//            $model->scenario='A';
//            else if($model->choice=='B')
//            $model->scenario='B';
               
            $yiipost = Yii::$app->request->post();
            
            $project_type_id = $yiipost['Addproperty']['project_type_id'];
           /*  if ($project_type_id == 1 || $project_type_id == 2 || $project_type_id == 3 || $project_type_id == 4 || $project_type_id == 5 || $project_type_id == 6 || $project_type_id == 7 || $project_type_id == 8 || $project_type_id == 9 || $project_type_id == 10){
               $model->scenario='creates';  
            }else{
               $model->scenario='create';  
            } */
            
            $lattitude = $yiipost['lat1'];
            $longitude = $yiipost['long1'];
            $town = $yiipost['town'];
            $sector = $yiipost['sector'];
            
            $model->property_for = 'sale';
            $model->user_id = $userid;
            $model->role_id = 'seller';
            $model->latitude = $lattitude;
            $model->longitude = $longitude; 
             $model->town_name = $town;
             if($sector != ''){
              $model->sector_name = $sector;
               }
           
            $model->available_date = '0000-00-00';  
            
                      
            $model->created_date = $date; 
            
              if($model->save()){

	  \common\models\activemode::update_my_profile_progress_status($userid,"add_property",'100','6');
              return $this->redirect(['sellor-expectations/create', 'id' => $model->id]);
            }else{
				//echo 'hi33';die;
                print_r($model->getErrors());die;
            }
            
             
        } else {
            return $this->render('creates', [
                'model' => $model,
            ]);
        }
    }
    
    
    
    
    
     public function actionAdditional() {
		 $model = new Addproperty();
		 $model1= new \common\models\MediaFiles();
		 if(isset($_GET['idm'])){
			 $modelid = $_GET['idm'];
		}else{
                    $modelid ='';
                    
                  }
               // $modelid = 2; 
		$request = Yii::$app->request->post();
                
//                echo '<pre>';print_r($request);die;


       if($_FILES){
        $fileimage = $_FILES['Addproperty']['name']['featured_image'];
        $filevideos = $_FILES['Addproperty']['name']['featured_video'];
        }

        if (!empty($request)) {
            
	$getmodel = Addproperty::find()->where(['id'=>$modelid])->one();
	
            $imageContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));
	
            $modelreq=$request['Addproperty'];
           
            
            $getfilename=$modelreq['featured_image'];
//$getarchieveurl = Yii::getAlias('@archiveUrl');  
            $documentroot = $_SERVER['DOCUMENT_ROOT'];
			$getarchieveurl=$documentroot.'/archive/web';
	if($getmodel){


             if($filevideos != ''){
                $getmodel->featured_video = \yii\web\UploadedFile::getInstance($getmodel, 'featured_video'); 
                $video = $getmodel->featured_video;
                
               // echo '<pre>';print_r($video);die;
                $vedioname =  $getmodel->featured_video->name;
                $tempname = $getmodel->featured_video->tempName;
                
                if(isset($tempname) && $tempname != null)
                {

                $getmodel->featured_video = $imageContentMod.$vedioname;
                move_uploaded_file($tempname,$getarchieveurl."/propertydefaultimg/".$getmodel->featured_video);
                $getmodel->save(false);

            Yii::$app->session->setFlash('success', "Video has been Successfully Saved");
                }
                
            }

           else if($fileimage !=''){ 
    
        $getmodel->featured_image = \yii\web\UploadedFile::getInstance($getmodel, 'featured_image');
	$getmodel->featured_image->saveAs(''.$getarchieveurl.'/propertydefaultimg/' . $getmodel->featured_image->baseName.$imageContentMod.'.' . $getmodel->featured_image->extension);
        //echo '<pre>';  print_r($getmodel->featured_image->baseName.$imageContentMod. '.' . $getmodel->featured_image->extension);die;
	$getmodel->featured_image = '' . $getmodel->featured_image->baseName.$imageContentMod. '.' . $getmodel->featured_image->extension;
	$getmodel->save(false);

        // Yii::$app->session->setFlash('success', "Image has been Successfully Saved");

         }

    }
    


           

         return $this->redirect(['addproperty/documents', 'id' =>$modelid]);
	 //return $this->redirect(['addproperty/additional', 'idm' =>$modelid]);
       } else {
            return $this->render('additional', [
                'model' => $model,
				'model1' => $model1,
            ]);
        }

        
    }
    
    
    
     public function actionAdditionals() {
		 $model = new Addproperty();
		 $model1= new \common\models\MediaFiles();
		 if(isset($_GET['idm'])){
			 $modelid = $_GET['idm'];
		}else{
                    $modelid ='';
                    
                  }
               // $modelid = 2; 
		$request = Yii::$app->request->post();
                
//                echo '<pre>';print_r($request);die;

       if($_FILES){
        $fileimage = $_FILES['Addproperty']['name']['featured_image'];
        $filevideos = $_FILES['Addproperty']['name']['featured_video'];
        }


        if (!empty($request)) {
            
	$getmodel = Addproperty::find()->where(['id'=>$modelid])->one();
	
            $imageContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));
	
            $modelreq=$request['Addproperty'];
           
            
            $getfilename=$modelreq['featured_image'];
//$getarchieveurl = Yii::getAlias('@archiveUrl');  
            $documentroot = $_SERVER['DOCUMENT_ROOT'];
			$getarchieveurl=$documentroot.'/archive/web';
	if($getmodel){


           if($filevideos != ''){
                $getmodel->featured_video = \yii\web\UploadedFile::getInstance($getmodel, 'featured_video'); 
                $video = $getmodel->featured_video;
                
               // echo '<pre>';print_r($video);die;
                $vedioname =  $getmodel->featured_video->name;
                $tempname = $getmodel->featured_video->tempName;
                
                if(isset($tempname) && $tempname != null)
                {

                $getmodel->featured_video = $imageContentMod.$vedioname;
                move_uploaded_file($tempname,$getarchieveurl."/propertydefaultimg/".$getmodel->featured_video);
                $getmodel->save(false);

            Yii::$app->session->setFlash('success', "Video has been Successfully Saved");
                }
                
            }
            
    else if($fileimage !=''){ 
        $getmodel->featured_image = \yii\web\UploadedFile::getInstance($getmodel, 'featured_image');
	$getmodel->featured_image->saveAs(''.$getarchieveurl.'/propertydefaultimg/' . $getmodel->featured_image->baseName.$imageContentMod.'.' . $getmodel->featured_image->extension);
        //echo '<pre>';  print_r($getmodel->featured_image->baseName.$imageContentMod. '.' . $getmodel->featured_image->extension);die;
	$getmodel->featured_image = '' . $getmodel->featured_image->baseName.$imageContentMod. '.' . $getmodel->featured_image->extension;
	$getmodel->save(false);


//Yii::$app->session->setFlash('success', "Image has been Successfully Saved");

}

    }
    


            
          //return $this->redirect(['addproperty/views', 'id' => $modelid]);
	  return $this->redirect(['addproperty/documentss', 'id' =>$modelid]);
       } else {
            return $this->render('additionals', [
                'model' => $model,
				'model1' => $model1,
            ]);
        }

        
    }
    
    
    
     public function actionFileupload() {
        
        $model = new Addproperty();
        if (isset($_GET['ids'])) {
            $modelid = $_GET['ids'];
        } else {
            $modelid = '';
        }
        
        //$modelid = 2;
        $request = Yii::$app->request->post();
        if (!empty($request)) {
            
            $totalimages = count($_FILES["featured_thumbnails_id"]);
            
            for($i=0;$i < $totalimages;$i++){          
            
               
            $getmodel = Addproperty::find()->where(['id' => $modelid])->one();

           

            $documentroot = $_SERVER['DOCUMENT_ROOT'];
            $getarchieveurl = $documentroot . '/archive/web';



            $sendingitemContentMod = md5(date('Y-m-d H:i:s') . rand(1111, 9999));
              
            if (isset($_FILES["featured_thumbnails_id"])) {

                $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
                $max_file_size = 102400 * 100; //100 kb
                $path = "uploads/";
                
                if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {



                    if ($_FILES['featured_thumbnails_id']['name'][$i]) {


                        if ($_FILES['featured_thumbnails_id']['error'][$i] == 4) {

echo 'hiiii333';die;
                            // Skip file if any error found
                        }
                        if ($_FILES['featured_thumbnails_id']['error'][$i] == 0) {


                            if ($_FILES['featured_thumbnails_id']['size'][$i] > $max_file_size) {
                                $message[] = "$name is too large!.";
                                die; // Skip large files
                            } else { 


// No error found! Move uploaded files 
                            $filename = basename($_FILES['featured_thumbnails_id']['name'][$i]);
                                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                                $new = $filename . $sendingitemContentMod . '.' . $extension;

                                $root = $_SERVER['DOCUMENT_ROOT'];


                                if (move_uploaded_file($_FILES['featured_thumbnails_id']['tmp_name'][$i], "{$root}/archive/web/propertydefaultimg/{$new}")) {


                                    //  copy("uploads/{$new}","{$root}/15bells/archive/web/uploadsthumbnails/{$new}");
                                    $mediafiles = new \common\models\MediaFiles();
                                    $mediafiles->type = $extension;
                                    $mediafiles->link = "{$root}/archive/web/propertydefaultimg/";
                                    $mediafiles->file_name = $new;
                                    $mediafiles->file_descr = $new;
                                    $mediafiles->save();
                                    


                                    $MediaFilesConfig = new \common\models\MediaFilesConfig();
                                    $MediaFilesConfig->property_id = $modelid;
                                    $MediaFilesConfig->media_id = $mediafiles->id;
                                    $MediaFilesConfig->save();
                                    //echo $MediaFilesConfig->id;die;
//                                    $getmodelpr = Property::find()->where(['id' => $modelid])->one();
//                                    $getmodelpr->featured_thumbnails_id = $MediaFilesConfig->media_id . ',';
//                                    $getmodelpr->save();
                                }


                                
                            }
                        }
                    }
                }
            }


         Yii::$app->session->setFlash('success', "Image has been Successfully Saved");
            return $this->redirect(['view', 'id' => $modelid]);
        } 
     }
        else {
            return $this->render('fileupload');
        }
    }
    
    
    
    

    /**
     * Updates an existing Addproperty model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */


    public function actionFileuploads() {
        
        $model = new Addproperty();
        if (isset($_GET['ids'])) {
            $modelid = $_GET['ids'];
        } else {
            $modelid = '';
        }
        
        //$modelid = 2;
        $request = Yii::$app->request->post();
        if (!empty($request)) {
            
            $totalimages = count($_FILES["featured_thumbnails_id"]);
            
            for($i=0;$i < $totalimages;$i++){ 

               
            
            $getmodel = Addproperty::find()->where(['id' => $modelid])->one();

            // $modelreq=$request['Property'];
            // $arrgetfilename=$modelreq['featured_thumbnails_id'];

            $documentroot = $_SERVER['DOCUMENT_ROOT'];
            $getarchieveurl = $documentroot . '/archive/web';



            $sendingitemContentMod = md5(date('Y-m-d H:i:s') . rand(1111, 9999));
              
            if (isset($_FILES["featured_thumbnails_id"])) {

                $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
                $max_file_size = 102400 * 100; //100 kb
                $path = "uploads/";
               
                if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {



                    if ($_FILES['featured_thumbnails_id']['name'][$i]) {


                        if ($_FILES['featured_thumbnails_id']['error'][$i] == 4) {

echo 'hiiii333';die;
                             // Skip file if any error found
                        }
                        if ($_FILES['featured_thumbnails_id']['error'][$i] == 0) {


                            if ($_FILES['featured_thumbnails_id']['size'][$i] > $max_file_size) {
                                $message[] = "$name is too large!.";
                                die; // Skip large files
                            } else { 


// No error found! Move uploaded files 
                                $filename = basename($_FILES['featured_thumbnails_id']['name'][$i]);
                                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                                $new = $filename . $sendingitemContentMod . '.' . $extension;

                                $root = $_SERVER['DOCUMENT_ROOT'];


                                if (move_uploaded_file($_FILES['featured_thumbnails_id']['tmp_name'][$i], "{$root}/archive/web/propertydefaultimg/{$new}")) {

                                    //print_r($_FILES['featured_thumbnails_id']['tmp_name'][$i]);die;
                                    //  copy("uploads/{$new}","{$root}/15bells/archive/web/uploadsthumbnails/{$new}");
                                    $mediafiles = new \common\models\MediaFiles();
                                    $mediafiles->type = $extension;
                                    $mediafiles->link = "{$root}/archive/web/propertydefaultimg/";
                                    $mediafiles->file_name = $new;
                                    $mediafiles->file_descr = $new;
                                    $mediafiles->save();
                                    //echo $mediafiles->id;die;



                                    $MediaFilesConfig = new \common\models\MediaFilesConfig();
                                    $MediaFilesConfig->property_id = $modelid;
                                    $MediaFilesConfig->media_id = $mediafiles->id;
                                    $MediaFilesConfig->save();
                                    
//                                    $getmodelpr = Property::find()->where(['id' => $modelid])->one();
//                                    $getmodelpr->featured_thumbnails_id = $MediaFilesConfig->media_id . ',';
//                                    $getmodelpr->save();
                                }


                               
                            }
                        }
                    }
                }
            }


         Yii::$app->session->setFlash('success', "Image has been Successfully Saved");
            return $this->redirect(['views', 'id' => $modelid]);
        }
        
    }  else {
            return $this->render('fileupload');
        }
    }
    
    



     public function actionDocuments() {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);

          
        
        
        if (isset($_GET['id'])) {
            $modelid = $_GET['id'];
        } else {
            $modelid = '';
        }
        
        $request = Yii::$app->request;
        $mdataPost = $request->post();
        
       // print_r($mdataPost);die;
        $model = new Addproperty();




        if (isset($mdataPost['filedownload'])) {

            //exit();
            function output_file($file, $name, $mime_type = '') {

                //Check the file premission
                if (!is_readable($file))
                    die('File not found or inaccessible!');

                $size = filesize($file);
                $name = rawurldecode($name);

                /* Figure out the MIME type | Check in array */
                $known_mime_types = array(
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
                    "jpeg" => "image/jpg",
                    "jpg" => "image/jpg",
                    "php" => "text/plain"
                );

                if ($mime_type == '') {
                    $file_extension = strtolower(substr(strrchr($file, "."), 1));
                    if (array_key_exists($file_extension, $known_mime_types)) {
                        $mime_type = $known_mime_types[$file_extension];
                    } else {
                        $mime_type = "application/force-download";
                    };
                };

                //turn off output buffering to decrease cpu usage
                @ob_end_clean();

                // required for IE, otherwise Content-Disposition may be ignored
                if (ini_get('zlib.output_compression'))
                    ini_set('zlib.output_compression', 'Off');

                header('Content-Type: ' . $mime_type);
                header('Content-Disposition: attachment; filename="' . $name . '"');
                header("Content-Transfer-Encoding: binary");
                header('Accept-Ranges: bytes');

                /* The three lines below basically make the 
                  download non-cacheable */
                header("Cache-control: private");
                header('Pragma: private');
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

                // multipart-download and download resuming support


                if (isset($_SERVER['HTTP_RANGE'])) {
                    list($a, $range) = explode("=", $_SERVER['HTTP_RANGE'], 2);
                    list($range) = explode(",", $range, 2);
                    list($range, $range_end) = explode("-", $range);
                    $range = intval($range);
                    if (!$range_end) {
                        $range_end = $size - 1;
                    } else {
                        $range_end = intval($range_end);
                    }


                    $new_length = $range_end - $range + 1;
                    header("HTTP/1.1 206 Partial Content");
                    header("Content-Length: $new_length");
                    header("Content-Range: bytes $range-$range_end/$size");
                } else {
                    $new_length = $size;
                    header("Content-Length: " . $size);
                }

                /* Will output the file itself */
                $chunksize = 1 * (1024 * 1024);
                $bytes_send = 0;
                if ($file = fopen($file, 'r')) {
                    if (isset($_SERVER['HTTP_RANGE']))
                        fseek($file, $range);

                    while (!feof($file) &&
                    (!connection_aborted()) &&
                    ($bytes_send < $new_length)
                    ) {
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
            $file_path = $root . '/archive/web/uploadsthumbnails/' . $_REQUEST['filenamemain'];
            print($file_path);

//Call the download function with file path,file name and file type
            output_file($file_path, '' . $_REQUEST['filenamemain'] . '', 'text/plain');
            return $this->redirect(['documents', 'id' => $_GET['id']]);
        }
        
        
       
        $request = Yii::$app->request->post();

        if (!empty($request)) {
            
           

            $documentroot = $_SERVER['DOCUMENT_ROOT'];
            $getarchieveurl = $documentroot . 'archive/web';
            $sendingitemContentMod = md5(date('Y-m-d H:i:s') . rand(1111, 9999));

            // applying condtion that everything is ok nad we ned to submit now. machine will understand that.
            $chkir = $mdataPost['supportchkir'];
           // $model->save(); // save the bus info
            // --------------   upload the files      --------------
            $root = $_SERVER['DOCUMENT_ROOT'];
            $target_dir = $root . '/archive/web/uploadsthumbnails/';

              
            if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
                
                 
                foreach ($chkir as $rath) {  //  upload all files
                    $docDescription = $mdataPost['documentDescription' . "$rath"];
                    // $docRemark=$mdataPost['documentRemark'."$rath"];

                    $docFiles = $_FILES["documentfiles" . "$rath"];
                    if ($docFiles != '') {
                        
                         
                        $finalfilename = basename($sendingitemContentMod . $_FILES["documentfiles" . "$rath"]["name"]);
                        $target_file = $target_dir . $finalfilename;
                        move_uploaded_file($_FILES['documentfiles' . "$rath"]["tmp_name"], "$target_file");
                        
                        
                        $mediafiles = new \common\models\MediaFiles();
                        $mediafiles->type = $_FILES['documentfiles' . "$rath"]["tmp_name"];
                        $mediafiles->link = "{$root}/archive/web/uploadsthumbnails/";
                        $mediafiles->file_name = $finalfilename;
                        $mediafiles->file_descr = $mdataPost['documentDescription' . "$rath"];
                        //$mediafiles->file_name_original = $_FILES['documentfiles' . "$rath"]["name"];
                        $mediafiles->save();

                        $MediaFilesConfig = new \common\models\MediaFilesConfig();
                        $MediaFilesConfig->property_id = $modelid;
                        $MediaFilesConfig->media_id = $mediafiles->id;
                        $MediaFilesConfig->save();
//                        $getmodelpr = \common\models\Addproperty::find()->where(['id' => 1])->one();
//                        $getmodelpr->featured_image = $MediaFilesConfig->media_id . ',';
//                        $getmodelpr->save();
                    }
                }
            }


            //////////////   end uploading files       ////////////////////




            return $this->render('view', [
                        'model' => $model,
                        //	'totnumberofdocument' => $fstBlock,
                        // 'totnumberofdocument' => $fstBlock, 
                        'id' => $modelid,
            ]);
        } else {
            return $this->render('documents', [
                        'model' => $model,
                         'id' =>$modelid,
            ]);
        }
    }





public function actionDocumentss() {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);

          
       
        if (isset($_GET['id'])) {
            $modelid = $_GET['id'];
        } else {
            $modelid = '';
        }
        
        $request = Yii::$app->request;
        $mdataPost = $request->post();
        
       // print_r($mdataPost);die;
        $model = new Addproperty();
        


        if (isset($mdataPost['filedownload'])) {

            //exit();
            function output_file($file, $name, $mime_type = '') {

                //Check the file premission
                if (!is_readable($file))
                    die('File not found or inaccessible!');

                $size = filesize($file);
                $name = rawurldecode($name);

                /* Figure out the MIME type | Check in array */
                $known_mime_types = array(
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
                    "jpeg" => "image/jpg",
                    "jpg" => "image/jpg",
                    "php" => "text/plain"
                );

                if ($mime_type == '') {
                    $file_extension = strtolower(substr(strrchr($file, "."), 1));
                    if (array_key_exists($file_extension, $known_mime_types)) {
                        $mime_type = $known_mime_types[$file_extension];
                    } else {
                        $mime_type = "application/force-download";
                    };
                };

                //turn off output buffering to decrease cpu usage
                @ob_end_clean();

                // required for IE, otherwise Content-Disposition may be ignored
                if (ini_get('zlib.output_compression'))
                    ini_set('zlib.output_compression', 'Off');

                header('Content-Type: ' . $mime_type);
                header('Content-Disposition: attachment; filename="' . $name . '"');
                header("Content-Transfer-Encoding: binary");
                header('Accept-Ranges: bytes');

                /* The three lines below basically make the 
                  download non-cacheable */
                header("Cache-control: private");
                header('Pragma: private');
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

                // multipart-download and download resuming support


                if (isset($_SERVER['HTTP_RANGE'])) {
                    list($a, $range) = explode("=", $_SERVER['HTTP_RANGE'], 2);
                    list($range) = explode(",", $range, 2);
                    list($range, $range_end) = explode("-", $range);
                    $range = intval($range);
                    if (!$range_end) {
                        $range_end = $size - 1;
                    } else {
                        $range_end = intval($range_end);
                    }


                    $new_length = $range_end - $range + 1;
                    header("HTTP/1.1 206 Partial Content");
                    header("Content-Length: $new_length");
                    header("Content-Range: bytes $range-$range_end/$size");
                } else {
                    $new_length = $size;
                    header("Content-Length: " . $size);
                }

                /* Will output the file itself */
                $chunksize = 1 * (1024 * 1024);
                $bytes_send = 0;
                if ($file = fopen($file, 'r')) {
                    if (isset($_SERVER['HTTP_RANGE']))
                        fseek($file, $range);

                    while (!feof($file) &&
                    (!connection_aborted()) &&
                    ($bytes_send < $new_length)
                    ) {
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
            $file_path = $root . '/archive/web/uploadsthumbnails/' . $_REQUEST['filenamemain'];
            print($file_path);

//Call the download function with file path,file name and file type
            output_file($file_path, '' . $_REQUEST['filenamemain'] . '', 'text/plain');
            return $this->redirect(['documents', 'id' => $_GET['id']]);
        }
        
        
       
        //$request = Yii::$app->request->post();
        
         // echo '<pre>';print_r(Yii::$app->request->post());die;
        
        if (!empty($mdataPost)) {
            
           

            $documentroot = $_SERVER['DOCUMENT_ROOT'];
            $getarchieveurl = $documentroot . 'archive/web';
            $sendingitemContentMod = md5(date('Y-m-d H:i:s') . rand(1111, 9999));

            // applying condtion that everything is ok nad we ned to submit now. machine will understand that.
            $chkir = $mdataPost['supportchkir'];
           // $model->save(); // save the bus info
            // --------------   upload the files      --------------
            $root = $_SERVER['DOCUMENT_ROOT'];
            $target_dir = $root . '/archive/web/uploadsthumbnails/';

              
            if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
                
                 
                foreach ($chkir as $rath) {  //  upload all files
                    $docDescription = $mdataPost['documentDescription' . "$rath"];
                    // $docRemark=$mdataPost['documentRemark'."$rath"];

                  $docFiles = $_FILES["documentfiles" . "$rath"];
                  // echo '<pre>';print_r($docFiles);die;
                    if ($docFiles != '') {
                        
                         
                        $finalfilename = basename($sendingitemContentMod . $_FILES["documentfiles" . "$rath"]["name"]);
                      $actualfilename = $_FILES["documentfiles" . "$rath"]["name"];
                        $target_file = $target_dir . $finalfilename;
                        move_uploaded_file($_FILES['documentfiles' . "$rath"]["tmp_name"], "$target_file");
                        
                        
                        $mediafiles = new \common\models\MediaFiles();
                        $mediafiles->type = $_FILES['documentfiles' . "$rath"]["tmp_name"];
                        $mediafiles->link = "{$root}/archive/web/uploadsthumbnails/";
                        $mediafiles->file_name = $finalfilename;
                        $mediafiles->file_actual_name = $actualfilename;
                        $mediafiles->file_descr = $mdataPost['documentDescription' . "$rath"];
                        //$mediafiles->file_name_original = $_FILES['documentfiles' . "$rath"]["name"];
                        $mediafiles->save();

                        $getmodelpr = \common\models\Addproperty::find()->where(['id' => $modelid])->one();
                        $userRole   = $getmodelpr->role_id;

                        $MediaFilesConfig = new \common\models\MediaFilesConfig();
                        $MediaFilesConfig->property_id = $modelid;
                        $MediaFilesConfig->media_id = $mediafiles->id;
                        $MediaFilesConfig->user_id = $user_id;
                        $MediaFilesConfig->user_role = $userRole;
                        $MediaFilesConfig->save();
//                        $getmodelpr = \common\models\Addproperty::find()->where(['id' => 1])->one();
//                        $getmodelpr->featured_image = $MediaFilesConfig->media_id . ',';
//                        $getmodelpr->save();
                    }
                }
            }


            //////////////   end uploading files       ////////////////////




            return $this->render('views', [
                        'model' => $model,
                        //	'totnumberofdocument' => $fstBlock,
                        // 'totnumberofdocument' => $fstBlock, 
                        'id' => $modelid,
            ]);
        } else {
            return $this->render('documentss', [
                        'model' => $model,
                         'id' =>$modelid,
            ]);
        }
    }


          public function actionUpload_avatar()
    {

       //print_r($_FILES);die;
        if(isset($_POST['media_id'])){
        $media_id = $_POST['media_id'];
        }
        $root = $_SERVER['DOCUMENT_ROOT'];
        $target_dir = $root . '/archive/web/uploadsthumbnails/';
        $sendingitemContentMod = md5(date('Y-m-d H:i:s') . rand(1111, 9999));
        $finalfilename = basename($sendingitemContentMod . $_FILES["file"]["name"]);
        $actualname = $_FILES["file"]["name"];
        $target_file = $target_dir . $finalfilename;

        if($finalfilename !=''){
        move_uploaded_file($_FILES["file"]["tmp_name"], "$target_file");

       $model3 = Yii::$app->db->createCommand()->update('media_files', ['type' => $_FILES["file"]["tmp_name"],'file_actual_name'=>$actualname,'file_name'=> $finalfilename],'id = "'.$media_id.'"')->execute();


         }


    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $userid = $model->user_id;

           return $this->redirect(['addproperty/sellor','id'=>$userid]);
           // return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateinsellor($id)
    {
        $model = $this->findModel($id);
        $getmodel = SellorExpectations::find()->where(['property_id'=>$id])->andwhere(['user_type'=>'sellor'])->one();
        
        if(!empty($getmodel)){
            $expecid = $getmodel->id;
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['sellor-expectations/updateinsellor','id'=>$expecid]);
          }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        }else{

           if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['sellor-expectations/create','id'=>$id]);
           // return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

          }
    }

    public function actionUpdateinlessor($id)
    {
        $model = $this->findModel($id);
        $getmodel = LessorExpectations::find()->where(['property_id'=>$id])->andwhere(['user_type'=>'lessor'])->one();
        if(!empty($getmodel)){
           
            $expecid = $getmodel->id;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
             
           return $this->redirect(['lessor-expectations/updateinlessor','id'=>$expecid]);
          }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        }else{
           
                
           if ($model->load(Yii::$app->request->post()) && $model->save()) {
               
           return $this->redirect(['lessor-expectations/create','id'=>$id]);
           // return $this->redirect(Yii::$app->request->referrer);
            } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

         
        }
        
       
        

        
    }



    public function actionUpdateb($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $userid = $model->user_id;
            return $this->redirect(['addproperty/lessor','id'=>$userid]);
             
            //return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->render('updateb', [
                'model' => $model,
            ]);
        }
    }



     public function actionShowdocuments($id)
    {
        
         $user_id = Yii::$app->user->identity->id;
         date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
         
        $querys = new Query;
        $querys->select('COUNT(*) as newcount')
                ->from('my_profile_progress_status')
                ->where(['property_id' => $id])
                ->andwhere(['user_id' => $user_id])
                ->andwhere(['process_name' => 'doc_show_requested']);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();

        if ($paymentsm['newcount'] == 0) {
         
         $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $id;
                        $my_profile_progress_status->user_id = $user_id;
                        $my_profile_progress_status->process_name = 'doc_show_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '6';
                        $my_profile_progress_status->save();
                        $trendingadd = \Yii::$app->db->createCommand()->insert('showdocuments', ['userid' => $user_id, 'propertyID' => $id, 'userroleID' => 'seller','created_at' => $date])->execute();
                        
                        Yii::$app->session->setFlash('success', "Show Documents Request has been Successfully placed");
                        return $this->redirect(['addproperty/sellor']);
                        
                        
             }else{
                 
                 Yii::$app->session->setFlash('success', "Already send Request for Document Show");
                        return $this->redirect(['addproperty/sellor']); 
                 
             }
    }
    
    
    
    public function actionShowdocumentsl($id)
    {
        
         $user_id = Yii::$app->user->identity->id;
         date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
         
        $querys = new Query;
        $querys->select('COUNT(*) as newcount')
                ->from('my_profile_progress_status')
                ->where(['property_id' => $id])
                ->andwhere(['user_id' => $user_id])
                ->andwhere(['process_name' => 'doc_show_requested']);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();

        if ($paymentsm['newcount'] == 0) {
         
         $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $id;
                        $my_profile_progress_status->user_id = $user_id;
                        $my_profile_progress_status->process_name = 'doc_show_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '5';
                        $my_profile_progress_status->save();
                        $trendingadd = \Yii::$app->db->createCommand()->insert('showdocuments', ['userid' => $user_id, 'propertyID' => $id, 'userroleID' => 'lessor','created_at' => $date])->execute();
                        
                        Yii::$app->session->setFlash('success', "Show Documents Request has been Successfully placed");
                        return $this->redirect(['addproperty/lessor']);
                        
                        
             }else{
                 
                 Yii::$app->session->setFlash('success', "Already send Request for Document Show");
                        return $this->redirect(['addproperty/lessor']); 
                 
             }
    }

    /**
     * Deletes an existing Addproperty model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

       // return $this->redirect(['index']);
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Addproperty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Addproperty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Addproperty::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
