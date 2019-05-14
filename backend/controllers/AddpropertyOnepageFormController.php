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
                    if($counter != 1) {
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
                    $modelnew->buildup_area = $foto21;
                    $modelnew->buildup_unit = $foto22;
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
                    $modelnew->created_date = $foto66;
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
                return [
                    'title'=> "Create new AddpropertyOnepageForm",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new AddpropertyOnepageForm",
                    'content'=>'<span class="text-success">Create AddpropertyOnepageForm success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
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
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
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
