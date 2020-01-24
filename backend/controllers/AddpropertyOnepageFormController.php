<?php

namespace backend\controllers;

use Yii;
use backend\models\AddpropertyOnepageForm\CsvForm;
use backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm;
use backend\models\AddpropertyOnepageForm\AddpropertyOnepageFormSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;
use common\models\User;
use common\models\Addproperty;
use frontend\modules\user\models\LoginForm;
use frontend\modules\user\models\PasswordResetRequestForm;
use frontend\modules\user\models\ResetPasswordForm;
use frontend\modules\user\models\SignupForm;


/**
 * AddpropertyOnepageFormController implements the CRUD actions for AddpropertyOnepageForm model.
 */
class AddpropertyOnepageFormController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = "csr_supply_layout";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AddpropertyOnepageForm models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $model = new CsvForm;
        $searchModel = new AddpropertyOnepageFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
             'blog' => $model,
        ]);
    }

    public function actionCsrindex()
    {    
        $searchModel = new AddpropertyOnepageFormSearch();
        $dataProviders = $searchModel->searchcsr(Yii::$app->request->queryParams);

        return $this->render('csrindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProviders,
        ]);
    }

    public function actionCsrphoneindex()
    { 

        $phones =  $_GET['phone'];
        $searchModel = new AddpropertyOnepageFormSearch();
        $dataProviders = $searchModel->searchcsrphone(Yii::$app->request->queryParams,$phones);

        return $this->render('csrphoneindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProviders,
        ]);

    }


    public function actionCsrphonereassign()
    { 

        
        $searchModel = new AddpropertyOnepageFormSearch();
        $dataProviders = $searchModel->searchcsrphoneassign(Yii::$app->request->queryParams);

        return $this->render('csrphoneindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProviders,
        ]);

    }

    public function actionCsrallfollowups()
    { 

        
        $searchModel = new AddpropertyOnepageFormSearch();
        $dataProviders = $searchModel->searchcsrallfollowups(Yii::$app->request->queryParams);

        return $this->render('csrphoneindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProviders,
        ]);

    }

    public function actionCsrhead()
    { 

        $this->layout = "csr_head_layout";
        $searchModel = new AddpropertyOnepageFormSearch();
        $dataProviders = $searchModel->searchcsrhead(Yii::$app->request->queryParams);

        return $this->render('csrhead', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProviders,
        ]);
        
    }


    public function actionSavescheduledtime(){

        $dates = $_POST['newdates'];
        $siteid = $_POST['newsiteid'];
        $newsitecomment = $_POST['newsitecomment'];
        $rbac =  AddpropertyOnepageForm::find()->where(['id'=>$siteid])->one();
        // echo $dates;die;
      //  $mysqltime = date("Y-m-d H:i:s", strtotime($dates));
       
        $rbac->followup_date_time = $dates;
        $rbac->followup_comment = $newsitecomment;
        $rbac->save(false);
	if($rbac){
	return 1;die;
	}else{
	return 2;die;
	}
        
     }


     public function actionReassigncsr(){

        $crmid = $_POST['crmid'];
        $rbac =  AddpropertyOnepageForm::find()->where(['id'=>$crmid])->one();
      
        $rbac->isactive = 4;        
        $rbac->save(false);
	if($rbac){
	return 1;die;
	}else{
	return 2;die;
	}

     }


     public function actionAssigncsrhead(){

        $crmid = $_POST['crmid'];
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $rbac =  AddpropertyOnepageForm::find()->where(['id'=>$crmid])->one();
      
        $rbac->isactive = 2;  
        $rbac->reassign_date = $date;        
        $rbac->save(false);
	if($rbac){
	return 1;die;
	}else{
	return 2;die;
	}

     }


     public function actionGetvisittype(){

        $visitid = $_POST['visitid'];
        $finduser = AddpropertyOnepageForm::find()->where(['id' => $visitid])->one();

        if ($finduser) {
            
            $visit_type =  $finduser->site_visit;
            return $visit_type;
          
        }


    }

    public function actionGetremarks(){

        $visitid = $_POST['visitid'];
        $finduser = AddpropertyOnepageForm::find()->where(['id' => $visitid])->one();

        if ($finduser) {
            
            $visit_type =  $finduser->remarks;
            return $visit_type;
          
        }


    }


    public function actionWrongsave(){

        $wrongid = $_POST['wrongid'];
        $wrongcomment = $_POST['wrongcomment'];
        $finduser = AddpropertyOnepageForm::find()->where(['id' => $wrongid])->one();

        if ($finduser) {
            
           
            $finduser->wrongcomment = $wrongcomment;
            $finduser->isactive = 3;
            $finduser->save(false);

            return 1;
            
        } else {
            return 'Internal Error';
        }

    }

    public function actionChangecolour() {


        $id = $_POST['id'];
        $getbbcompany = AddpropertyOnepageForm::find()->where(['id'=>$id])->one();	  
        $getbbcompany->is_seen = 1 ;
        $getbbcompany->save();
    
    }




     public function actionSetvisittype(){

        $visittypeid = $_POST['visittypeid'];
        $radioValue = $_POST['radioValue'];
        $finduser = AddpropertyOnepageForm::find()->where(['id' => $visittypeid])->one();

        if ($finduser) {
            
           
            $finduser->site_visit = $radioValue;
            $finduser->save(false);

            return 1;
            
        } else {
            return 'Internal Error';
        }

    }


    public function actionSetremarks(){

        $visittypeid = $_POST['visittypeid'];
        $remarks_comment = $_POST['remarks_comment'];
        $finduser = AddpropertyOnepageForm::find()->where(['id' => $visittypeid])->one();

        if ($finduser) {
            
           
            $finduser->remarks = $remarks_comment;
            $finduser->save(false);

            return 1;
            
        } else {
            return 'Internal Error';
        }

    }


    /**
     * Displays a single AddpropertyOnepageForm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "AddpropertyOnepageForm #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }






    public function actionImport(){
        $this->layout = "common";
      
        $model = new CsvForm;

        $model1 = new AddpropertyOnepageForm;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        if($model->load(Yii::$app->request->post())){

        
            
            $model->file = UploadedFile::getInstance($model, 'file');

            if ( $model->file ) {
            
            $time = time();
            $model->file->saveAs('uploads/' .$time. '.' . $model->file->extension);
            $model->file = 'uploads/' .$time. '.' . $model->file->extension;
            $handle = fopen($model->file, "r");           
                
            $counter = 0;
                while (($hasil = fgetcsv($handle, 1000, ",")) !== false) 
               {

             // echo '<pre>';  print_r($hasil);die;
                    $counter++;              
                    $modelnew = new AddpropertyOnepageForm;
                    if($counter > 2) {
                    $foto0 = $hasil[0];
                    $foto1 = $hasil[1];
                    $foto2 = $hasil[2];
                    $foto3 = $hasil[3];
                    $foto4 = $hasil[4];
                    $foto5 = $hasil[5];
                    $foto6 = $hasil[6];
                    $foto7 = $hasil[7];
                    $foto8 = $hasil[8];
                    $foto9 = $hasil[9];
                    $foto10 = $hasil[10];
                    $foto11 = $hasil[11];
                    $foto12 = $hasil[12];
                    $foto13 = $hasil[13];
                    $foto14 = $hasil[14];
                    $foto15 = $hasil[15];
                    $foto16 = $hasil[16];
                    $foto17 = $hasil[17];
                    $foto18 = $hasil[18];
                    $foto19 = $hasil[19];
                    $foto20 = $hasil[20];
                    $foto21 = $hasil[21];
                    $foto22 = $hasil[22];
                    $foto23 = $hasil[23];
                    $foto24 = $hasil[24];
                    $foto25 = $hasil[25];
                    $foto26 = $hasil[26];
                    $foto27 = $hasil[27];
                    $foto28 = $hasil[28];
                    $foto29 = $hasil[29];
                    $foto30 = $hasil[30];
                    $foto31 = $hasil[31];
                    $foto32 = $hasil[32];
                    $foto33 = $hasil[33];
                    $foto34 = $hasil[34];
                    $foto35 = $hasil[35];
                    $foto36 = $hasil[36];
                    $foto37 = $hasil[37];
                    $foto38 = $hasil[38];
                    $foto39 = $hasil[39];
                    $foto40 = $hasil[40];
                    $foto41 = $hasil[41];
                    $foto42 = $hasil[42];
                    $foto43 = $hasil[43];
                    $foto44 = $hasil[44];
                    $foto45 = $hasil[45];
                    $foto46 = $hasil[46];
                    $foto47 = $hasil[47];
                    $foto48 = $hasil[48];
                    $foto49 = $hasil[49];
                    $foto50 = $hasil[50];
                    $foto51 = $hasil[51];
                    $foto52 = $hasil[52];
                    $foto53 = $hasil[53];
                    $foto54 = $hasil[54];
                    $foto55 = $hasil[55];
                    $foto56 = $hasil[56];
                    $foto57 = $hasil[57];
                    $foto58 = $hasil[58];
                    $foto59 = $hasil[59];
                    $foto60 = $hasil[60];
                    $foto61 = $hasil[61];
                    $foto62 = $hasil[62];
                    $foto63 = $hasil[63];
                    $foto64 = $hasil[64];
                    $foto65 = $hasil[65];
                    $foto66 = $hasil[66];
                    
                    $modelnew->company_employee_id = $foto1;
                    $modelnew->property_for = $foto2;
                    $modelnew->city = $foto3;
                    $modelnew->locality = $foto4;
                    $modelnew->town_name = $foto5;
                    $modelnew->sector_name = $foto6;
                    $modelnew->address = $foto7;
                    $modelnew->longitude = $foto8;
                    $modelnew->latitude = $foto9;
                    $modelnew->builder_name = $foto10;
                    $modelnew->project_name = $foto11;
                    $modelnew->property_type_id = $foto12;
                    $modelnew->Owner_name = $foto13;
                    $modelnew->primary_contact_no = $foto14;
                    $modelnew->secondary_contact_no = $foto15;
                    $modelnew->landline_no = $foto16;
                    $modelnew->email_id = $foto17;
                    $modelnew->property_on_floor = $foto18;
                    $modelnew->unit_block = $foto19;
                    $modelnew->unit_number = $foto20;
                    $modelnew->super_area = $foto21;
                    $modelnew->super_unit = $foto22;
                    $modelnew->carpet_area = $foto23;
                    $modelnew->carpet_unit = $foto24;
                    $modelnew->owner_address = $foto25;
                    $modelnew->total_no_of_floors = $foto26;
                    $modelnew->passenger_lift = $foto27;
                    $modelnew->service_lift = $foto28;
                    $modelnew->ceiling_height = $foto29;
                    $modelnew->backup_power = $foto30;
                    $modelnew->building_security = $foto31;
                    $modelnew->maintenance_agency = $foto32;
                    $modelnew->floor_plate_area = $foto33;
                    $modelnew->type_of_space = $foto34;
                    $modelnew->visitor_parking = $foto35;
                    $modelnew->covered_parking = $foto36;
                    $modelnew->asking_lease_rate = $foto37;
                    $modelnew->rate_negotiable = $foto38;
                    $modelnew->maintenance_charge = $foto39;
                    $modelnew->security_deposit = $foto40;
                    $modelnew->security_negotiable = $foto41;
                    $modelnew->lock_in_period = $foto42;
                    $modelnew->lock_in_negotiable = $foto43;
                    $modelnew->lease_period_restriction = $foto44;
                    $modelnew->max_period_lease = $foto45;
                    $modelnew->open_rentfree_period = $foto46;
                    $modelnew->max_rentfree_period = $foto47;
                    $modelnew->Asking_property_price = $foto48;
                    $modelnew->price_negotiable = $foto49;
                    $modelnew->property_with_saledeed = $foto50;
                    $modelnew->property_power_attorney = $foto51;
                    $modelnew->pan_card = $foto52;
                    $modelnew->adhar_card = $foto53;
                    $modelnew->property_tax_id = $foto54;
                    $modelnew->completion_in_percentage = $foto55;
                    $modelnew->property_status = $foto56;
                    $modelnew->property_scomment = $foto57;
                    $modelnew->followup_date_time = $foto58;
                    $modelnew->followup_comment = $foto59;                    
                    $modelnew->lead_source = $foto60;
                    $modelnew->site_visit = $foto61;
                    $modelnew->site_visit_time = $foto62;
                    $modelnew->site_visit_comment = $foto63;
                    $modelnew->remarks = $foto64;                    
                    $modelnew->isactive = $foto65;                    
                    $modelnew->created_date = $date;
                    $modelnew->save(false);

                }

                
            }

            
                Yii::$app->session->setFlash('success', "Excel Uploaded successfully."); 
           
            
                
                return $this->redirect(['addproperty-onepage-form/import']);
            }  
            
        }else{
            return $this->render('import',['model'=>$model,'model1'=>$model1]);
        }

       
    }



    public function actionAssigncsr(){

       $getcounts  =  $_POST['getcounts'];
       $employee = $_POST['employee'];
       $lead = $_POST['lead'];

       // $count = 4;
        $model = new AddpropertyOnepageForm();
        $getuniquelist = AddpropertyOnepageForm::find()->where(['and',['company_employee_id' => NUll],['<>','primary_contact_no', ''],['lead_source' => $lead]])->groupBy('primary_contact_no')->limit($getcounts)->asArray()->all();
       // echo '<pre>';print_r($getuniquelist);die;
       
        if($getuniquelist){

            foreach($getuniquelist as $getuniquelists){
            $model->addnewlead($getuniquelists['id'],$getuniquelists['Owner_name'],$getuniquelists['primary_contact_no'],$employee);

         }
            

        } 

        return 'done';


    }

    /**
     * Creates a new AddpropertyOnepageForm model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new AddpropertyOnepageForm();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){

              //  echo 'hi11';die;
                return [
                    'title'=> "Create new AddpropertyOnepageForm",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())){

                date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d H:i:s');
                $model->created_date = $date;
                  if($model->save()){
               // echo 'hi22';die;
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new AddpropertyOnepageForm",
                    'content'=>'<span class="text-success">Create AddpropertyOnepageForm success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            } }else{    
                
               //echo 'hi33';die;
                return [
                    'title'=> "Create new AddpropertyOnepageForm",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }


    /**
     * Updates an existing AddpropertyOnepageForm model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

     public function actionComplete($id){


        $this->layout = "csr_head_layout";
        $request = Yii::$app->request;
        $model = $this->findModel($id); 
        $modelajax = new SignupForm(); 
        $modeladd = new Addproperty(); 
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

 if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update AddpropertyOnepageForm #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "AddpropertyOnepageForm #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update AddpropertyOnepageForm #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post())){ 
         //   echo '<pre>';print_r(Yii::$app->request->post());
            $post = Yii::$app->request->post();
                   if($model->save()) {

                    $Owner_name  =         $post['AddpropertyOnepageForm']['Owner_name'];
                    $primary_contact_no =  $post['AddpropertyOnepageForm']['primary_contact_no'];
                    $emailid =   $post['AddpropertyOnepageForm']['email_id'];

                    $model2 = User::find('id')->where(['username' => $primary_contact_no])->andwhere(['status' => '1'])->one();
                   
                    if($model2){
                        $userid = $model2->id;

                    }else{

                        $user = $modelajax->signup1($Owner_name,$primary_contact_no,$emailid);
                        $userid =  $user->id;
                    }
                    

                    $modeladd->user_id = $userid;
                    if($post['AddpropertyOnepageForm']['property_for'] == 'rent'){
                        $modeladd->role_id = 'lessor';
                    }else{
                        $modeladd->role_id = 'seller';
                    }
                    
                    
                    $modeladd->project_name = $post['AddpropertyOnepageForm']['project_name'];
                    $modeladd->property_for = $post['AddpropertyOnepageForm']['property_for'];
                    $modeladd->project_type_id = $post['AddpropertyOnepageForm']['property_type_id'];
                    $modeladd->request_for = 'Instant';
                    $modeladd->city = $post['AddpropertyOnepageForm']['city'];
                    $modeladd->locality = $post['AddpropertyOnepageForm']['locality'];
                    $modeladd->town_name = $post['AddpropertyOnepageForm']['town_name'];
                    $modeladd->sector_name = $post['AddpropertyOnepageForm']['sector_name'];
                    $modeladd->address = $post['AddpropertyOnepageForm']['address'];
                    $modeladd->longitude = $post['AddpropertyOnepageForm']['longitude'];
                    $modeladd->latitude = $post['AddpropertyOnepageForm']['latitude'];
                    $modeladd->expected_price = $post['AddpropertyOnepageForm']['Asking_property_price'];
                    $modeladd->asking_rental_price = $post['AddpropertyOnepageForm']['asking_lease_rate'];
                    $modeladd->price_negotiable = 'yes';
                    $modeladd->maintenance_cost = $post['AddpropertyOnepageForm']['maintenance_charge'];
                    $modeladd->maintenance_cost_unit = 'sq_feets';
                    $modeladd->availability = 'ready_to_move';
                    $modeladd->available_from = 'Immediate';
                    $modeladd->possesion_by = 'Immediate';
                   // $modeladd->facing = $post['AddpropertyOnepageForm']['email_id'];
                    $modeladd->super_area = $post['AddpropertyOnepageForm']['super_area'];
                    $modeladd->super_unit = 'sq_feets';
                    $modeladd->carpet_area = $post['AddpropertyOnepageForm']['carpet_area'];
                    $modeladd->carpet_unit = 'sq_feets';
                    $modeladd->property_on_floor = $post['AddpropertyOnepageForm']['property_on_floor'];
                    $modeladd->total_floors = $post['AddpropertyOnepageForm']['total_no_of_floors'];
                    $modeladd->furnished_status = $post['AddpropertyOnepageForm']['type_of_space'];
                    $modeladd->is_active = 1;
                    $modeladd->created_date = $date;
                    $modeladd->status = 'approved';


                   if($modeladd->save(false)){
                    $model->property_id = $modeladd->id;
                    $model->isactive = 0;
                    $model->save();
                    
                    
                       }


                     $assigndash = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
    
                        if($assigndash->item_name == "csr_supply"){
                        
                            return $this->redirect(['csrindex']);                        
                       }else{
                           
                        return $this->redirect(['csrhead']);                        

                       }

                       

                   }

               // 
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

     }


    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update AddpropertyOnepageForm #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "AddpropertyOnepageForm #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{

               // print_r($model->getErrors());die;
                 return [
                    'title'=> "Update AddpropertyOnepageForm #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {


                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing AddpropertyOnepageForm model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing AddpropertyOnepageForm model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
//echo $request->post( 'pks' );die;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $clone = new AddpropertyOnepageForm;
            $clone->attributes = $model->attributes;
            $clone->save();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the AddpropertyOnepageForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AddpropertyOnepageForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AddpropertyOnepageForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
