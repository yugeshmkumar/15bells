<?php

namespace frontend\controllers;

use Yii;
use common\models\Addproperty;
use common\models\AddpropertySearch;
use common\models\LessorExpectations;
use common\models\SellorExpectations;
use common\models\Property_nearby_places;
use common\models\Property_amenities;

use common\models\Property;
use common\models\MediaFiles;
use common\models\PropertySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\filters\AccessControl;
use mPDF;
use yii\helpers\HtmlPurifier;

use WebPConvert\WebPConvert;



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
                        'actions' => ['sitevisit','index','creategrouplessor','deleteimage','getpropstatus','lessor','sellor','sellorview','lesview','viewsearch','viewmy','views','searchview','getuserids','emdpay',
'getbiduserids','getsiteuserids','getexpectationdata','showpropdetails','create','creates','additional','additionals','fileupload',
'fileuploads','documents','documentss','upload_avatar','update','savelessor','requestaccess','unpublish','updatenew','savepropertydetails','saveseller','sitemapview','updateinsellor','getexpectationdatalessor','setbrandcount','setbrandcountb','transaction','updateinlessor','updateb','showdocuments','showdocumentsl','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['setbrandcountb','view'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['setbrandcount'],
                        'roles' => ['?'],
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
        $this->layout = "newdashboard";
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


    public function actionGetpropstatus(){
          
        $propid = $_POST['propid'];
        $getmodel = Addproperty::find()->where(['id'=>$propid])->one();

      

        $getmodel->status = 'reviewed';

        if($getmodel->save(false)){
             
            echo '1';die;
        }else{
            echo '2';die;
        }
        



    }

    public function actionLessor()
    {
        $this->layout = "dashboard";
        $searchModel = new AddpropertySearch();
        $dataProvider = $searchModel->searchl(Yii::$app->request->queryParams);

        return $this->render('lessor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


     public function actionSellor()
    {
        $this->layout = "dashboard";
        $searchModel = new AddpropertySearch();
        $dataProvider = $searchModel->searchs(Yii::$app->request->queryParams);

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
    public function actionView()
    {
        $id = (int) Yii::$app->request->get('id');
        $city = Yii::$app->request->get('city');
        $proptype = Yii::$app->request->get('proptype');
        $locality = Yii::$app->request->get('locality');
        $this->layout = "roleLayout";
        $db = Yii::$app->db;
        $model = $db->cache(function($db) use ($id){
            return Yii::$app->controller->findModel($id);
        });

        return $this->render('view', [
            'model' => $model,
            //'key'   =>$secretKey,
        ]);
    }
   
    public function actionSellorview()
    {
        $this->layout = "dashboard";
        $searchModel = new AddpropertySearch();
        $dataProvider = $searchModel->searchselview(Yii::$app->request->queryParams);

        return $this->render('sellorview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLesview()
    {
        $this->layout = "dashboard";
        $searchModel = new AddpropertySearch();
        $dataProvider = $searchModel->searchlesview(Yii::$app->request->queryParams);

        return $this->render('lessorview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


     public function actionViewsearch($id)
    {
        $this->layout = "newdashboard";
        return $this->render('searchview', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSitemapview($id)
    {
        $this->layout = "newdashboard";
        return $this->render('sitemapview', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewmy()
    {
        $id = $_POST['expandRowKey'];
        $db = Yii::$app->db;
        $model = $db->cache(function($db) use ($id){
            return Yii::$app->controller->findModel($id);
        });
        return $this->renderPartial('viewsold', [
            'model' => $model,
        ]);
    }

  public function actionViews($id)
    {

        $viewid = base64_decode($id);
        $this->layout = "roleLayout";
        $db = Yii::$app->db;
        $model = $db->cache(function($db) use ($viewid){
            return Yii::$app->controller->findModel($viewid);
        });

        return $this->render('property_view', [
            'model' => $model,
            'viewid'   =>$viewid,
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

public function actionEmdpay($propids, $visitypeid) {

        $user_id = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

            

        $payments = \Yii::$app->db->createCommand("SELECT id from vr_setup where propertyID='$propids'")->queryAll(); 
        //echo '<pre>';print_r($payments);die;
        
        if(!empty($payments)){
        $finduser = \common\models\RequestEmd::find()->where(['id' => $visitypeid])->one();
        if($finduser){
            
            $finduser->payment_status = 'paid';
            $finduser->save(false);
        }      
            
        $vr_id = $payments[0]['id'];
        $trendingadd = \Yii::$app->db->createCommand()->insert('auction_participants', ['vr_roomID' => $vr_id, 'roleID' => '15', 'partcipantID' => $user_id, 'created_at' => $date])->execute();
        if ($trendingadd) {
            return 1;die;
        } else {
            return 2;die;
        }   
        }else{
            return 3;die;
        }
        
        
    }

    public function actionRequestaccess(){

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $property_id = $_POST['id'];
        $user_id = Yii::$app->user->identity->id;

        $querys = new Query;
        $querys->select('COUNT(*) as newcount')
                ->from('request_document_show')
                ->where(['property_id' => $property_id])
                ->andwhere(['user_id' => $user_id]);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();

        if ($paymentsm['newcount'] == 0) {
        $trendingadd = \Yii::$app->db->createCommand()->insert('request_document_show', ['user_id' => $user_id, 'property_id' => $property_id, 'status' => 0, 'created_date' => $date])->execute();

        if(trendingadd){

            return 1;
        }else{

            return 2;
        }
      }else{
          return 3;
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

		    return json_encode($payments);
		 
	    }

public function actionGetexpectationdata($id) {
                

	       
	       $payments = \Yii::$app->db->createCommand("SELECT * from sellor_expectations where user_id='$id' and user_type='buyer' ORDER BY id DESC LIMIT 1")->queryOne();

		    echo json_encode($payments);
		 
        }
        
        public function actionGetexpectationdatalessor($id) {
                

	       
            $payments = \Yii::$app->db->createCommand("SELECT * from lessor_expectations where user_id='$id' and user_type='lessee' ORDER BY id DESC LIMIT 1")->queryOne();
 
             echo json_encode($payments);
          
         }

public function actionShowpropdetails(){
       
           $id = $_POST['id'];  
	       $payments = \Yii::$app->db->createCommand("SELECT a.* ,p.typename as typename from addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) where a.id='$id'")->queryAll();

	         return json_encode($payments);
   } 

    /**
     * Creates a new Addproperty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

     public function actionSaveseller(){

        $this->layout = "roleLayout";
        
        $userid = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
       
        $model = new Addproperty();
        $model1 =  new LessorExpectations();
        $model2 =  new Property_nearby_places();
        $model3 =  new Property_amenities();

       if ($model->load(Yii::$app->request->post()) && $model->validate() ) {           
          
    //   echo '<pre>';print_r(Yii::$app->request->post());die;

          $yiipost = Yii::$app->request->post();
          $available_date = $yiipost['Addproperty']['available_date'];
          $available_date = $yiipost['Addproperty']['available_date'];
          $super_area = $yiipost['Addproperty']['super_area'];
          $super_unit = $yiipost['Addproperty']['super_unit'];
          $interior_details = $yiipost['Addproperty']['interior_details'];
         
  
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
          $model->super_area = $super_area;
          $model->super_unit = $super_unit;
          $model->interior_details = $interior_details;

           if($sector != ''){
            $model->sector_name = $sector;
             }


           if($available_date == ''){
             $model->available_date = '1970-01-01 08:00:00';  
          }else{
             $model->available_date = $available_date;  
          }
          $model->created_date = $date;
          

            if($model->save()){
                  
                $property_id =  $model->id;

                $locking_period = $yiipost['locking_period'];
                $tenures = $yiipost['tenures'];
                $rent_free = $yiipost['rent_free'];

                $model1->user_id = $userid;
                $model1->user_type = 'lessor';                 
                $model1->property_id = $property_id;
                $model1->lock_in_period = $locking_period;
                $model1->lease_tenure = $tenures;
                $model1->rent_free_period = $rent_free;          
                $model1->created_date = $date;
                $model1->save(false);

                $near_by = $yiipost['near_by'];
                $nearbyIdArray = explode(',', $near_by);
                $count = count($nearbyIdArray);

                $amenityies = $yiipost['amenityies'];
                $amenityiesIdArray = explode(',', $amenityies);
                $count1 = count($nearbyIdArray);


               for ($i=0; $i<$count; $i++){

                    $model2->property_id = $property_id;
                    $model2->places_name = $nearbyIdArray[$i];
                    $model2->is_active = '1';
                    $model2->created_date = $date;
                    $model2->save();

               }


                    for ($i=0; $i<$count; $i++){

                        $model3->property_id = $property_id;
                        $model3->amenities_name = $amenityiesIdArray[$i];
                        $model3->is_active = '1';
                        $model3->created_date = $date;
                        $model3->save();
    
                    }

                   
                    return $this->redirect(['addproperty/additional', 's_id' => $property_id]);
    
            }

              else{
                        
                   print_r($model->getErrors());die;
                  }

        }

       
    }





    public function actionSavelessor(){

        $this->layout = "roleLayout";
        
        $userid = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
       
        $model = new Addproperty();
        $model1 =  new LessorExpectations();
        $model2 =  new Property_nearby_places();
        $model3 =  new Property_amenities();

       
       if ($model->load(Yii::$app->request->post()) && $model->validate() ) {           
          
     //  echo '<pre>';print_r(Yii::$app->request->post());die;

          $yiipost = Yii::$app->request->post();
          $available_date = $yiipost['Addproperty']['available_date'];
          $available_date = $yiipost['Addproperty']['available_date'];
          $super_area = $yiipost['Addproperty']['super_area'];
          $super_unit = $yiipost['Addproperty']['super_unit'];
          $interior_details = $yiipost['Addproperty']['interior_details'];
         
  
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
          $model->super_area = $super_area;
          $model->super_unit = $super_unit;
          $model->interior_details = $interior_details;

           if($sector != ''){
            $model->sector_name = $sector;
             }


           if($available_date == ''){
             $model->available_date = '1970-01-01 08:00:00';  
          }else{
             $model->available_date = $available_date;  
          }
          $model->created_date = $date;
          

            if($model->save()){
                  
                $property_id =  $model->id;

                $locking_period = $yiipost['locking_period'];
                $tenures = $yiipost['tenures'];
                $rent_free = $yiipost['rent_free'];

                $model1->user_id = $userid;
                $model1->user_type = 'lessor';                 
                $model1->property_id = $property_id;
                $model1->lock_in_period = $locking_period;
                $model1->lease_tenure = $tenures;
                $model1->rent_free_period = $rent_free;          
                $model1->created_date = $date;
                $model1->save(false);

                $near_by = $yiipost['near_by'];
                $nearbyIdArray = explode(',', $near_by);
                $count = count($nearbyIdArray);

                $amenityies = $yiipost['amenityies'];
                $amenityiesIdArray = explode(',', $amenityies);
                $count1 = count($nearbyIdArray);


               for ($i=0; $i<$count; $i++){

                    $model2->property_id = $property_id;
                    $model2->places_name = $nearbyIdArray[$i];
                    $model2->is_active = '1';
                    $model2->created_date = $date;
                    $model2->save();

               }


                    for ($i=0; $i<$count; $i++){

                        $model3->property_id = $property_id;
                        $model3->amenities_name = $amenityiesIdArray[$i];
                        $model3->is_active = '1';
                        $model3->created_date = $date;
                        $model3->save();
    
                    }

                   
                    return $this->redirect(['addproperty/additional', 's_id' => $property_id]);
    
            }

              else{
                   
                   print_r($model->getErrors());die;

                  }

        } else{
                   
            print_r($model->getErrors());die;

           }

       
    }



    public function actionSavepropertydetails(){


        $model = new Addproperty();
        $model1 =  new LessorExpectations();
        $model2 =  new Property_nearby_places();
        $model3 =  new Property_amenities();
        $userid = Yii::$app->user->identity->id;

        $request_for =  HtmlPurifier::process($_POST['request_for']);
        $ownerships =  HtmlPurifier::process($_POST['ownerships']);
        $totalfloors =  HtmlPurifier::process($_POST['totalfloors']);
        $prop_floors =  HtmlPurifier::process($_POST['prop_floors']);
       $age_of_property =  HtmlPurifier::process($_POST['age_of_property']);
        $facings =  HtmlPurifier::process($_POST['facings']);
        $jurisdiction =  HtmlPurifier::process($_POST['jurisdiction']);
        $annual_dues =  HtmlPurifier::process($_POST['annual_dues']);
        $maintained_by =  HtmlPurifier::process($_POST['maintained_by']);
      $loan_taken =  HtmlPurifier::process($_POST['loan_taken']);
        $far_approveds =  HtmlPurifier::process($_POST['far_approveds']);
        $revenue_layouts =  HtmlPurifier::process($_POST['revenue_layouts']);
        $expected_rentals =  HtmlPurifier::process($_POST['expected_rentals']);
        $availabilits =  HtmlPurifier::process($_POST['availabilits']);
        $furnishings =  HtmlPurifier::process($_POST['furnishings']);
        $possesions =  HtmlPurifier::process($_POST['possesions']);
        $lock_in_periods =  HtmlPurifier::process($_POST['lock_in_periods']);
        $lease_tenures =  HtmlPurifier::process($_POST['lease_tenures']);
        $rent_free_periods =  HtmlPurifier::process($_POST['rent_free_periods']);
        $nearbys =  HtmlPurifier::process($_POST['nearbys']);
        $amenitiesicon =  HtmlPurifier::process($_POST['amenitiesicon']);
        $viewid =  HtmlPurifier::process($_POST['viewid']);

        $getmodel = Addproperty::find()->where(['id'=>$viewid])->andwhere(['user_id'=>$userid])->one();

       
        
        if(!empty($getmodel)){

           
            

            $getmodel->request_for = $request_for;
            $getmodel->ownership = $ownerships;
            $getmodel->total_floors = $totalfloors;
            $getmodel->property_on_floor = $prop_floors;
            $getmodel->age_of_property = $age_of_property;
            $getmodel->facing = $facings;
            $getmodel->jurisdiction_development = $jurisdiction;
            $getmodel->annual_dues_payable = $annual_dues;
            $getmodel->maintenance_by = $maintained_by;
            $getmodel->LOAN_taken = $loan_taken;
            $getmodel->FAR_approval = $far_approveds;
            $getmodel->revenue_lauout = $revenue_layouts;
            $getmodel->expected_rental = $expected_rentals;
            $getmodel->availability = $availabilits;
            $getmodel->furnished_status = $furnishings;
            $getmodel->possesion_by = $possesions;

            if($getmodel->save(false)){

                
        $LessorExpectations = LessorExpectations::find()->where(['property_id'=>$viewid])->andwhere(['user_id'=>$userid])->one();
        if(!empty($LessorExpectations)){
           
                
                 $property_id =  $getmodel->id;           
                //$model1->user_id = $userid;
               // $model1->user_type = 'lessor';                 
                $LessorExpectations->property_id = $property_id;
                $LessorExpectations->lock_in_period = $lock_in_periods;
                $LessorExpectations->lease_tenure = $lease_tenures;
                $LessorExpectations->rent_free_period = $rent_free_periods;          
               // $model1->created_date = $date;
               $LessorExpectations->save(false);
                 

               

    
                $near_by = $nearbys;
                $nearbyIdArray = explode(',', $near_by);
                $count = count($nearbyIdArray);
    
                $amenityies = $amenitiesicon;
               $amenityiesIdArray = explode(',', $amenityies);
                $count1 = count($amenityiesIdArray);
        }
    
               for ($i=0; $i<$count; $i++){

                $Property_nearby_places = Property_nearby_places::find()->where(['property_id'=>$viewid])->andwhere(['places_name'=>$nearbyIdArray[$i]])->one();

                if(!empty($Property_nearby_places)){

                   
    
                    $Property_nearby_places->property_id = $property_id;
                    $Property_nearby_places->places_name = $nearbyIdArray[$i];
                    $Property_nearby_places->is_active = '1';
                    $Property_nearby_places->created_date = $date;
                    $Property_nearby_places->save();
                }
    
               }
    
    
                    for ($i=0; $i<$count1; $i++){
                        
              $Property_amenities = Property_amenities::find()->where(['property_id'=>$viewid])->andwhere(['amenities_name'=>$amenityiesIdArray[$i]])->one();
              
              if(!empty($Property_amenities)){
               // echo 'nearby';die;
    
                        $Property_amenities->property_id = $property_id;
                        $Property_amenities->amenities_name = $amenityiesIdArray[$i];
                        $Property_amenities->is_active = '1';
                        $Property_amenities->created_date = $date;
                        $Property_amenities->save();
                 }
    
                    }

                    return 'done';
    
                   
                    //return $this->redirect(['addproperty/additional', 's_id' => $property_id]);
    
            }
        }else{

           
            return 'not done';
        }
       
        

       




    }




    public function actionCreate()
    {
       
         $model = new Addproperty(['scenario' => 'create']);
         
         $userid = Yii::$app->user->identity->id;
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
               $model->available_date = '1970-01-01 08:00:00';  
            }else{
               $model->available_date = $available_date;  
            }
            $model->created_date = $date;
            
            if($buildup_area !=''){
            
            
            if($model->save()){
               return $this->redirect(['lessor-expectations/create', 'id' => $model->id]);
            }else{
               
                print_r($model->getErrors());die;
            }
          
        }else{
            if($model->save()){
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
        $this->layout = "newdashboard";
         $model = new Addproperty(['scenario' => 'creates']);
         $userid = Yii::$app->user->identity->id;
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
           
            $model->available_date = '1970-01-01 08:00:00';  
            
                      
            $model->created_date = $date; 
            
              if($model->save()){
				 // echo 'hi22';die;
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
    
    


    public function actionCreategrouplessor()
    {
       
         $model = new Addproperty(['scenario' => 'create']);
         
         $userid = Yii::$app->user->identity->id;
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');
        
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
            
           
           // echo '<pre>';print_r(Yii::$app->request->post());die;
           
            $yiipost = Yii::$app->request->post();
             $counter  = $yiipost['totalprop'];
             $no_of_similiar_shops  = $yiipost['Addproperty']['no_of_similiar_shops'];
             $form_data = [];

             if($no_of_similiar_shops == ''){
           

            for($i=0; $i<=$counter; $i++){

                   
                    if( $i == 0 ) {
                        $i = '';
                    } else {
                        $i = $i;
                    }
                    $model->id = NULL;
                    $model->isNewRecord = true;
                    $available_date = $yiipost['Addproperty']['available_date'.$i];
                    $total_plot_area = $yiipost['Addproperty']['total_plot_area'.$i];
                    $plot_unit = $yiipost['Addproperty']['plot_unit'.$i];
                    $buildup_area = $yiipost['Addproperty']['buildup_area'.$i];
                    $build_unit = $yiipost['Addproperty']['build_unit'.$i];
                    $carpet_area = $yiipost['Addproperty']['carpet_area'.$i];
                    $carpet_unit = $yiipost['Addproperty']['carpet_unit'.$i];
                    $maintenance_cost = $yiipost['Addproperty']['maintenance_cost'.$i];
                    $maintenance_cost_unit = $yiipost['Addproperty']['maintenance_cost_unit'.$i];
                    $property_on_floor = $yiipost['Addproperty']['property_on_floor'.$i];
                    $furnished_status = $yiipost['Addproperty']['furnished_status'.$i];
                    $asking_rental_price = $yiipost['Addproperty']['asking_rental_price'.$i];
                    $price_negotiable = $yiipost['Addproperty']['price_negotiable'.$i];
                    $price_sq_ft = $yiipost['Addproperty']['price_sq_ft'.$i];
                    $price_acres = $yiipost['Addproperty']['price_acres'.$i];
                    $revenue_lauout = $yiipost['Addproperty']['revenue_lauout'.$i];
                    $present_status = $yiipost['Addproperty']['present_status'.$i];
                    $jurisdiction_development = $yiipost['Addproperty']['jurisdiction_development'.$i];
                    $shed_RCC = $yiipost['Addproperty']['shed_RCC'.$i];
                    $maintenance_by = $yiipost['Addproperty']['maintenance_by'.$i];
                    $annual_dues_payable = $yiipost['Addproperty']['annual_dues_payable'.$i];
                    $age_of_property = $yiipost['Addproperty']['age_of_property'.$i];
                    $LOAN_taken = $yiipost['Addproperty']['LOAN_taken'.$i];
                    $facing = $yiipost['Addproperty']['facing'.$i];
                    $ownership = $yiipost['Addproperty']['ownership'.$i];
                    $availability = $yiipost['Addproperty']['availability'.$i];
                    $FAR_approval = $yiipost['Addproperty']['FAR_approval'.$i];
                    $available_from = $yiipost['Addproperty']['available_from'.$i];
                    $available_date = $yiipost['Addproperty']['available_date'.$i];

                    if($total_plot_area == ''){
        
                       $model->total_plot_area = $buildup_area;
                       $model->plot_unit = $build_unit;
                       
                     }else{
                        $model->plot_unit = $plot_unit;
                        $model->total_plot_area = $total_plot_area;
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
        
                    
                    $model->buildup_area = $buildup_area;
                    $model->build_unit = $build_unit;
                    $model->carpet_area = $carpet_area;
                    $model->carpet_unit = $carpet_unit;
                    $model->maintenance_cost = $maintenance_cost;
                    $model->maintenance_cost_unit = $maintenance_cost_unit;
                    $model->property_on_floor = $property_on_floor;
                    $model->furnished_status = $furnished_status;
                    $model->asking_rental_price = $asking_rental_price;
                    $model->price_negotiable = $price_negotiable;
                    $model->price_sq_ft = $price_sq_ft;
                    $model->price_acres = $price_acres;
                    $model->revenue_lauout = $revenue_lauout;
                    $model->present_status = $present_status;
                    $model->jurisdiction_development = $jurisdiction_development;
                    $model->shed_RCC = $shed_RCC;
                    $model->maintenance_by = $maintenance_by;
                    $model->annual_dues_payable = $annual_dues_payable;
                    $model->age_of_property = $age_of_property;
                    $model->LOAN_taken = $LOAN_taken;
                    $model->facing = $facing;
                    $model->ownership = $ownership;
                    $model->availability = $availability;
                    $model->FAR_approval = $FAR_approval;
                    $model->available_from = $available_from;
                    if($available_date == ''){
                        $model->available_date = '0000-00-00';  
                     }else{
                        $model->available_date = $available_date;  
                     }
                    $model->created_date = $date;

                     
                    $model->save();
                    $last_row_id = $model->id;
                    $form_data[] = array('category_id' => $last_row_id);


            }

        }else{

            for($i=0; $i<=$no_of_similiar_shops; $i++){

               
                $model->id = NULL;
                $model->isNewRecord = true;
                $available_date = $yiipost['Addproperty']['available_date'];
                $total_plot_area = $yiipost['Addproperty']['total_plot_area'];
                $plot_unit = $yiipost['Addproperty']['plot_unit'];
                $buildup_area = $yiipost['Addproperty']['buildup_area'];
                $build_unit = $yiipost['Addproperty']['build_unit'];
                $carpet_area = $yiipost['Addproperty']['carpet_area'];
                $carpet_unit = $yiipost['Addproperty']['carpet_unit'];
                $maintenance_cost = $yiipost['Addproperty']['maintenance_cost'];
                $maintenance_cost_unit = $yiipost['Addproperty']['maintenance_cost_unit'];
                $property_on_floor = $yiipost['Addproperty']['property_on_floor'];
                $furnished_status = $yiipost['Addproperty']['furnished_status'];
                $asking_rental_price = $yiipost['Addproperty']['asking_rental_price'];
                $price_negotiable = $yiipost['Addproperty']['price_negotiable'];
                $price_sq_ft = $yiipost['Addproperty']['price_sq_ft'];
                $price_acres = $yiipost['Addproperty']['price_acres'];
                $revenue_lauout = $yiipost['Addproperty']['revenue_lauout'];
                $present_status = $yiipost['Addproperty']['present_status'];
                $jurisdiction_development = $yiipost['Addproperty']['jurisdiction_development'];
                $shed_RCC = $yiipost['Addproperty']['shed_RCC'];
                $maintenance_by = $yiipost['Addproperty']['maintenance_by'];
                $annual_dues_payable = $yiipost['Addproperty']['annual_dues_payable'];
                $age_of_property = $yiipost['Addproperty']['age_of_property'];
                $LOAN_taken = $yiipost['Addproperty']['LOAN_taken'];
                $facing = $yiipost['Addproperty']['facing'];
                $ownership = $yiipost['Addproperty']['ownership'];
                $availability = $yiipost['Addproperty']['availability'];
                $FAR_approval = $yiipost['Addproperty']['FAR_approval'];
                $available_from = $yiipost['Addproperty']['available_from'];
                $available_date = $yiipost['Addproperty']['available_date'];

                if($total_plot_area == ''){
    
                   $model->total_plot_area = $buildup_area;
                   $model->plot_unit = $build_unit;
                   
                 }else{
                    $model->plot_unit = $plot_unit;
                    $model->total_plot_area = $total_plot_area;
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
    
                
                $model->buildup_area = $buildup_area;
                $model->build_unit = $build_unit;
                $model->carpet_area = $carpet_area;
                $model->carpet_unit = $carpet_unit;
                $model->maintenance_cost = $maintenance_cost;
                $model->maintenance_cost_unit = $maintenance_cost_unit;
                $model->property_on_floor = $property_on_floor;
                $model->furnished_status = $furnished_status;
                $model->asking_rental_price = $asking_rental_price;
                $model->price_negotiable = $price_negotiable;
                $model->price_sq_ft = $price_sq_ft;
                $model->price_acres = $price_acres;
                $model->revenue_lauout = $revenue_lauout;
                $model->present_status = $present_status;
                $model->jurisdiction_development = $jurisdiction_development;
                $model->shed_RCC = $shed_RCC;
                $model->maintenance_by = $maintenance_by;
                $model->annual_dues_payable = $annual_dues_payable;
                $model->age_of_property = $age_of_property;
                $model->LOAN_taken = $LOAN_taken;
                $model->facing = $facing;
                $model->ownership = $ownership;
                $model->availability = $availability;
                $model->FAR_approval = $FAR_approval;
                $model->available_from = $available_from;
                if($available_date == ''){
                    $model->available_date = '0000-00-00';  
                 }else{
                    $model->available_date = $available_date;  
                 }
                $model->created_date = $date;

                 
                $model->save();
                $last_row_id = $model->id;
                $form_data[] = $last_row_id;
             }
    }


          //  print_r($form_data);die;
                
                $this->actionTest($form_data);

           // return $this->redirect(['lessor-expectations/create', 'id' => $model->id]);
            
            // if($model->save()){
            //    
            // }else{
            //     print_r($model->getErrors());die;
            // }
          
        
            
        } else {
            return $this->render('creategrouplessor', [
                'model' => $model,
            ]);
        }
    }


    public function actionTest($daysPassed=array())
        {
           // echo '<pre>';print_r($daysPassed);die;
      // return  $this->redirect('additionalgroup',array('days'=>$daysPassed));  
     //  return $this->redirect(["addproperty/additionalgroup", 'idm' => $daysPassed]); 
       return $this->redirect(array("addproperty/additionalgroup",'idm'=>$daysPassed));
        }



    public function actionSetbrandcount(){

        $data = array();
        $payment = \Yii::$app->db->createCommand("SELECT * from save_searches where type='rectangle' and role_type='lessee'")->queryAll();
        $payment1 = \Yii::$app->db->createCommand("SELECT * from save_searches where type='circle' and role_type='lessee'")->queryAll();
        $payment2 = \Yii::$app->db->createCommand("SELECT * from save_searches where type='polygon' and role_type='lessee'")->queryAll();
   //echo '<pre>';print_r($payments);die;
   if($payment){

   foreach($payment as $payments){
        $row_array['geometry'] = $payments['geometry'];   
   
        $data['rectangle'][] = $row_array;
       
   }
}

if($payment1){
   foreach($payment1 as $payments1){
   
       $row_array1['geometry'] = $payments1['geometry'];
       $data['circle'][] = $row_array1;
   }

}

if($payment2){
   
   foreach($payment2 as $payments2){
       $row_array2['geometry'] = $payments2['geometry'];
        
        $data['polygon'][] = $row_array2;
   }
}
        
        return json_encode($data);
   }



   public function actionSetbrandcountb(){

    $data = array();
    $payment = \Yii::$app->db->createCommand("SELECT * from save_searches where type='rectangle' and role_type='buyer'")->queryAll();
    $payment1 = \Yii::$app->db->createCommand("SELECT * from save_searches where type='circle' and role_type='buyer'")->queryAll();
    $payment2 = \Yii::$app->db->createCommand("SELECT * from save_searches where type='polygon' and role_type='buyer'")->queryAll();
//echo '<pre>';print_r($payments);die;


if($payment){

foreach($payment as $payments){
    $row_array['geometry'] = $payments['geometry'];   

    $data['rectangle'][] = $row_array;
   
}
}


if($payment1){
foreach($payment1 as $payments1){

   $row_array1['geometry'] = $payments1['geometry'];
   $data['circle'][] = $row_array1;
}
}


if($payment2){

foreach($payment2 as $payments2){
   $row_array2['geometry'] = $payments2['geometry'];
    
    $data['polygon'][] = $row_array2;
}
}
    
    return json_encode($data);
}
   
   
   public function beforeAction($action) {
        if($action->id == "setbrandcount" || $action->id == "setbrandcountb" || $action->id == "view")
           $this->enableCsrfValidation = false;
           return parent::beforeAction($action);
   }


    
    
     public function actionAdditional() {


        $this->layout = "roleLayout";

		 $model = new Addproperty();
		 $model1= new \common\models\MediaFiles();
		 if(isset($_GET['s_id'])){
			 $modelid = $_GET['s_id'];
            }else{
            $modelid ='';

            }   
            
            
		$request = Yii::$app->request->post();          
        
       if($_FILES){
        $fileimage = $_FILES['Addproperty']['name']['featured_image'];
        $filevideos = $_FILES['Addproperty']['name']['featured_video'];
        }
        if (!empty($request)) {                        

            
	       $getmodel = Addproperty::find()->where(['id'=>$modelid])->one();
	
            $imageContentMod = md5(date('Y-m-d H:i:s').rand(1111,9999));
            $modelreq=$request['Addproperty'];
           
            
            $getfilename=$modelreq['featured_image'];
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

           

//image upload start



$totalimages = count($_FILES['Addproperty']['name']['featured_image']);


            
for($i=0;$i < $totalimages;$i++){          

   
$getmodel = Addproperty::find()->where(['id' => $modelid])->one();



$documentroot = $_SERVER['DOCUMENT_ROOT'];
$getarchieveurl = $documentroot . '/archive/web';



$sendingitemContentMod = md5(date('Y-m-d H:i:s') . rand(1111, 9999));
  
if (isset($_FILES['Addproperty']['name']['featured_image'])) {

    $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
    $max_file_size = 2097152; //2 MB
    $path = "uploads/";
    
    if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {



        if ($_FILES['Addproperty']['name']['featured_image'][$i]) {


            if ($_FILES['Addproperty']['error']['featured_image'][$i] == 4) {


                // Skip file if any error found
            }
            if ($_FILES['Addproperty']['error']['featured_image'][$i] == 0) {


                if ($_FILES['Addproperty']['size']['featured_image'][$i] > $max_file_size) {
                    $message[] = "$name is too large!.";
                    die; // Skip large files
                } else { 


// No error found! Move uploaded files 
                $filename = basename($_FILES['Addproperty']['name']['featured_image'][$i]);
              //  echo '<pre>';print_r($_FILES);die;
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                    $new = $filename . $sendingitemContentMod . '.' . $extension;

                    $filenameimage = basename($_FILES['Addproperty']['name']['featured_image'][0]);
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                    $newimage = $filenameimage . $sendingitemContentMod . '.' . $extension;

                    $root = $_SERVER['DOCUMENT_ROOT'];


                    if (move_uploaded_file($_FILES['Addproperty']['tmp_name']['featured_image'][$i], "{$root}/archive/web/propertydefaultimg/{$new}")) {


                        $source ="{$root}/archive/web/propertydefaultimg/". $new;
                        $destination = $source . '.webp';
                        $options = [];
                        WebPConvert::convert($source, $destination, $options);


                        $getmodel->featured_image = $new.'.webp';
                        $getmodel->save(false);

                        //  copy("uploads/{$new}","{$root}/15bells/archive/web/uploadsthumbnails/{$new}");
                        $mediafiles = new \common\models\MediaFiles();
                        $mediafiles->type = 'webp';
                        $mediafiles->link = "{$root}/archive/web/propertydefaultimg/";
                        $mediafiles->file_name = $new.'.webp';
                        $mediafiles->file_descr = $new;
                        $mediafiles->save();
                        


                        $MediaFilesConfig = new \common\models\MediaFilesConfig();
                        $MediaFilesConfig->property_id = $modelid;
                        $MediaFilesConfig->media_id = $mediafiles->id;
                        $MediaFilesConfig->save();
                       
                    }


                    
                }
            }
        }
    }
}


}




//image upload end    
    
        
          Yii::$app->session->setFlash('success', "Image has been Successfully Saved");
         

         }

    }

    
        

         return $this->redirect(['addproperty/additional', 's_id' => $modelid]);
	 
       } else {

      
            return $this->render('image', [
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
       

            $this->layout = "roleLayout";        
        
        if (isset($_GET['id'])) {
            $modelid = $_GET['id'];
        } else {
            $modelid = '';
        }
        
        $request = Yii::$app->request;
        $mdataPost = $request->post();
        
       // print_r($mdataPost);die;
        $model = new Addproperty();


        $request = Yii::$app->request->post();

        if (!empty($request)) {
            
           

            $documentroot = $_SERVER['DOCUMENT_ROOT'];
            $getarchieveurl = $documentroot . 'archive/web';
            $sendingitemContentMod = md5(date('Y-m-d H:i:s') . rand(1111, 9999));
            $allowed =  array('pdf','jpg','jpeg','png','docx');
            // applying condtion that everything is ok nad we ned to submit now. machine will understand that.
            $chkir = $mdataPost['supportchkir'];
           // $model->save(); // save the bus info
            // --------------   upload the files      --------------
            $root = $_SERVER['DOCUMENT_ROOT'];
            $target_dir = $root . '/archive/web/uploadsthumbnails/';
            $target_dir1 = $root . '/pdfdocuments/';

              
            if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
                
             


                foreach ($chkir as $rath) {  //  upload all files
                    $docDescription = $mdataPost['documentDescription' . "$rath"];
                    // $docRemark=$mdataPost['documentRemark'."$rath"];
                     
                    $docFiles = $_FILES["documentfiles" . "$rath"];

                    $filenamed = $_FILES["documentfiles" . "$rath"]["name"];              
                     $extd = pathinfo($filenamed, PATHINFO_EXTENSION);
                    if(in_array($extd,$allowed) ) {

                    if ($docFiles != '') {
                        
                         
                        $finalfilename = basename($sendingitemContentMod . $_FILES["documentfiles" . "$rath"]["name"]);
                        $target_file = $target_dir . $finalfilename;
                        $target_file1 = $target_dir1 . $finalfilename;

                      //  move_uploaded_file($_FILES['documentfiles' . "$rath"]["tmp_name"], "$target_file");
                        move_uploaded_file($_FILES['documentfiles' . "$rath"]["tmp_name"], "$target_file1");


                         //$mpdffile = $target_dir1.'/'.

                         if($extd == 'pdf'){

                        try {
                          
                          $mpdf = new mPDF;           
                          
                         $mpdf->SetImportUse();                         
                        // $mpdf->Thumbnail('sample.pdf', 4);
                         $pagecount = $mpdf->SetSourceFile($target_file1);
                         
                         for ($i=1; $i<=$pagecount; $i++) {
                 
                                 
                                 if($i % 2 != 0){
                 
                                     $import_page = $mpdf->ImportPage($i);
                                     $mpdf->AddPage();
                                 $mpdf->UseTemplate($import_page);
                                 $mpdf->setFooter('{PAGENO}');
                                 //$mpdf->WriteHTML($pagecount);
                                 $mpdf->SetWatermarkText('CANCELLED',0.1);
                                 $mpdf->showWatermarkText = true;
                                 $mpdf->watermark_font = 'DejaVuSansCondensed';
                                 $mpdf->watermark_color = 'black';
                                 $mpdf->watermarkTextAlpha = 0.5;
                                 
                                 $mpdf->SetDisplayMode('fullpage');
                                 $mpdf->SetProtection(array(), 'admin', 'admin');
                                 }else{
                 
                                     $mpdf->AddPage();
                                 }
                            
                         }
                 
                         $mpdf->Output('encrypteddocuments/'.$finalfilename.'');
                        
                     } catch (Exception $e) {
                         throw new MpdfException($e->getMessage()); // Delete this line to return false on fail
                         return false;
                     }

                    }


                        
                        
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
                    } else {
                        return $this->render('property_documents', [
                                    'model' => $model,
                                     'id' =>$modelid,
                        ]);
                    }
                  } else {
                    return $this->render('property_documents', [
                                'model' => $model,
                                 'id' =>$modelid,
                    ]);
                }
                }
            }


         Yii::$app->session->setFlash('success', "Document has  been Successfully Saved");

            return $this->render('property_documents', [
                'model' => $model,
                 'id' =>$modelid,
           ]);

           // return $this->redirect(['views', 'id' => $modelid]);



        } else {
            return $this->render('property_documents', [
                        'model' => $model,
                         'id' =>$modelid,
            ]);
        }

        
    }





public function actionDocumentss() {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);

          
        if ($getstatus == 1) {

            $this->layout = "newdashboard";
        } else {

            $this->layout = "beforeprofilecomplete";  // common
        }
        
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
            $file_path = $root . '/pdfdocuments/' . $_REQUEST['filenamemain'];
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
            $allowed =  array('pdf');
            // applying condtion that everything is ok nad we ned to submit now. machine will understand that.
            $chkir = $mdataPost['supportchkir'];
           // $model->save(); // save the bus info
            // --------------   upload the files      --------------
            $root = $_SERVER['DOCUMENT_ROOT'];
            $target_dir = $root . '/archive/web/uploadsthumbnails/';
           
            $target_dir1 = $root . '/pdfdocuments/';

              
            if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
                
                 
                foreach ($chkir as $rath) {  //  upload all files
                    $docDescription = $mdataPost['documentDescription' . "$rath"];
                    // $docRemark=$mdataPost['documentRemark'."$rath"];

                  $docFiles = $_FILES["documentfiles" . "$rath"];
                  // echo '<pre>';print_r($docFiles);die;
                  $actualfilename = $_FILES["documentfiles" . "$rath"]["name"];
                  $extd = pathinfo($actualfilename, PATHINFO_EXTENSION);
                    if(in_array($extd,$allowed) ) {
                    if ($docFiles != '') {
                        
                         
                        $finalfilename = basename($sendingitemContentMod . $_FILES["documentfiles" . "$rath"]["name"]);
                      
                        $target_file = $target_dir . $finalfilename;
                        $target_file1 = $target_dir1 . $finalfilename;
                        move_uploaded_file($_FILES['documentfiles' . "$rath"]["tmp_name"], "$target_file1");
                        





                        try {
                          
                            $mpdf = new mPDF;           
                           
                           $mpdf->SetImportUse();                         
                          // $mpdf->Thumbnail('sample.pdf', 4);
                           $pagecount = $mpdf->SetSourceFile($target_file1);
                           
                           for ($i=1; $i<=$pagecount; $i++) {
                   
                                   
                                   if($i % 2 != 0){
                   
                                       $import_page = $mpdf->ImportPage($i);
                                       $mpdf->AddPage();
                                   $mpdf->UseTemplate($import_page);
                                   $mpdf->setFooter('{PAGENO}');
                                   //$mpdf->WriteHTML($pagecount);
                                   $mpdf->SetWatermarkText('CANCELLED',0.1);
                                   $mpdf->showWatermarkText = true;
                                   $mpdf->watermark_font = 'DejaVuSansCondensed';
                                   $mpdf->watermark_color = 'black';
                                   $mpdf->watermarkTextAlpha = 0.5;
                                   
                                   $mpdf->SetDisplayMode('fullpage');
                                   $mpdf->SetProtection(array(), 'admin', 'admin');
                                   }else{
                   
                                       $mpdf->AddPage();
                                   }
                              
                           }
                   
                           $mpdf->Output('encrypteddocuments/'.$finalfilename.'');
                          
                       } catch (Exception $e) {
                           throw new MpdfException($e->getMessage()); // Delete this line to return false on fail
                           return false;
                       }
                        

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
                    }else {
                        return $this->render('documentss', [
                                    'model' => $model,
                                     'id' =>$modelid,
                        ]);
                    }
                } else {
                    return $this->render('documentss', [
                                'model' => $model,
                                 'id' =>$modelid,
                    ]);
                }
                }
            }


            //////////////   end uploading files       ////////////////////




            return $this->render('views', [
                        'model' => $model,                       
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

    public function actionDeleteimage(){

        $imageid = $_POST['imageid'];


        $querys = new Query;
        $querys->select('*')
                ->from('media_files')
                ->where(['id' => $imageid]);               

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();


// print_r($paymentsm);die;
        $rootPath= '/var/www/html/15bells.com/public_html/archive/web/propertydefaultimg/';
        unlink($rootPath.$paymentsm['file_name']);
        unlink($rootPath.$paymentsm['file_descr']);

        $insert1 = \Yii::$app->db->createCommand()->delete('media_files_config', ['media_id' => $imageid])->execute();
        $insert2 = \Yii::$app->db->createCommand()->delete('media_files', ['id' => $imageid])->execute();


        if($insert2){

            return 1;
        }else{

            return 2;
        }

        



    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['addproperty/sellor']);
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
            return $this->render('update_new', [
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
            return $this->redirect(['addproperty/lessor']);
           // return $this->redirect(Yii::$app->request->referrer);
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
    
    public function actionUnpublish($id)
    {
        $model =  $this->findModel($id);
        $model->status = 'onhold';
        $model->save(false);

       // return $this->redirect(['index']);
        return $this->redirect(Yii::$app->request->referrer);
    }

    
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
