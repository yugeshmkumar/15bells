<?php

namespace backend\controllers;

use Yii;
use common\models\Addpropertypm;
use common\models\AddpropertypmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\MediaFilesConfig;
use common\models\MediaFiles;
use yii\db\Query;


/**
 * AddpropertypmController implements the CRUD actions for Addpropertypm model.
 */
class AddpropertypmController extends Controller
{
	// public $layout = "pmanager_layout";
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
 public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);

        $assigndash = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
   // echo $assigndash->item_name;die;
        if($assigndash->item_name == "sales_demand_lessee"){
		
		$this->layout="sales_supply_layout";
		
	}else if($assigndash->item_name == "sales_head"){
		
		$this->layout="sales_layout";
		
	}else if($assigndash->item_name == "sales_demand_buyer"){
		
		$this->layout="sales_supply_layout";		
	}
else if($assigndash->item_name == "sales_supply_seller"){
		
		$this->layout="sales_buying_layout";		
	}
else if($assigndash->item_name == "sales_supply_lessor"){
		
		$this->layout="sales_leasing_layout";		
    }
    else if($assigndash->item_name == "administrator"){
		
		$this->layout="common";		
	}else{

        $this->layout="csr_head_layout";
    }
}
    /**
     * Lists all Addpropertypm models.
     * @return mixed
     */
	 
	 public function actionWritecommentforsitevisit(){
		 return $this->renderPartial('writecommentforsitevisit');
	 }
	 public function actionUpdatestatusaction()
	 {
		 $id = $_GET['id'];
		 $ca = $_GET['ca'];
		 $cm = $_GET['writecomment'];
		 $mediafileconfig = \common\models\MediaFilesConfig::find()->where(['id'=>$id])->one();
		 if($mediafileconfig){
			 $mediafileconfig->status =$ca;
			 $mediafileconfig->comments =$cm;
			 $mediafileconfig->approved_by = Yii::$app->user->identity->id;
			 $mediafileconfig->approved_at = date('y-m-d h:i:s');
			  $mediafileconfig->save();
			  
			  
		 }
		 
		 return true;
		 
	 }
	 public function actionUpdatestatus()
	 {
		return $this->renderPartial('updatestatus'); 
	 }


         public function actionRemovesite() {


	$id = $_POST['id'];
        $finduser = \common\models\RequestSiteVisitbin::find()->where(['request_id' => $id])->one();

        if ($finduser) {
            
            if($finduser->visit_status_confirm == 'yes'){

            $finduser->status = 2;
            $finduser->save(false);

            return 1;
            }else{
                return 2;
            }
        } else {
            return 'Internal Error';
        }
    }


         public function actionShowpropdetails(){
       
              $id = $_POST['id'];
	       $payments = \Yii::$app->db->createCommand("SELECT a.* ,p.typename as typename,u.email as email,u.username as username from addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN user as u ON (u.id = a.user_id) where a.id='$id'")->queryAll();

	         return json_encode($payments);
   }

public function actionShowuserdetails(){
       
               $id = $_POST['id'];
	       $payments = \Yii::$app->db->createCommand("SELECT * from user where id='$id'")->queryAll();

	         return  json_encode($payments);
   }


   public function actionMovetoemd() {

    $propid = $_GET['propid'];
    $docshow = $_GET['docshow'];
    $userid = $_GET['userid'];
    if ($propid != '' && $docshow != '') {
        $user_id = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $assigned_id = Yii::$app->user->identity->id;
        $querys = \common\models\CompanyEmp::find()->where(['userid'=>$assigned_id])->one();
        $assigned_ids = $querys->id;

        $insert = \Yii::$app->db->createCommand()->insert('request_emd', ['documentshow_id' => $docshow, 'user_id' => $userid,'assigned_to_id'=>$assigned_ids, 'property_id' => $propid, 'created_date' => $date])->execute();
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
}


public function actionMovetof2f() {

    $propid = $_GET['propid'];
    $userid = $_GET['userid'];
    $user_id = Yii::$app->user->identity->id;
    $querys = \common\models\CompanyEmpb::find()->where(['userid'=>$user_id])->one();
     $assigned_id = $querys->id;

    $model = $this->findModel($propid);
    $sellor_id = $model->user_id;
    if ($propid != '' && $userid != '') {
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $insert = \Yii::$app->db->createCommand()->insert('sales_f_2_f', ['buyer_id' => $userid, 'sellor_id' => $sellor_id, 'property_id' => $propid,'sales_executive_id'=>$assigned_id, 'created_date' => $date])->execute();
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
}

public function actionDocumentshow() {


    $id = $_GET['id'];
    $query = (new Query())->select('*')->from('media_files_config')->where(['property_id' => $id]);
    $command = $query->createCommand();
    $datas = $command->queryAll();

    $ids = [];
    for ($i = 0; $i <= count($datas) - 1; $i++) {
        $ids[] = $datas[$i]['media_id'];
    }
    // print_r($ids);die;
    $pic = [];


    $docnames = MediaFiles::find()->where(['id' => $ids])->asArray()->all();


    return json_encode($docnames);
}
 

	 public function actionP_sitedocs()
	 {
		 
        $searchModel = new \common\models\RequestDocumentShowSearch();
        $dataProvider = $searchModel->searches(Yii::$app->request->queryParams);

          if (isset($_POST['hasEditable'])) {
           
            // use Yii's response format to encode output as JSON
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            // read your posted model attributes
            if (isset($_POST['editableKey'])) {
                $reqid = $_POST['editableKey'];
                $editableIndex = $_POST['editableIndex'];
                 $tagsdata = $_POST['RequestDocumentShow'][$editableIndex]['payment_status'];

                 $getrq = \common\models\RequestDocumentShow::find()->where(['id' => $reqid])->one();
                if ($getrq) {
                    
                        $getrq->payment_status = $tagsdata;   
                        $getrq->status = 1;                    
                        
                         $getrq->save();
                }

                     $value = $getrq->payment_status;
                
                     return $this->redirect(['p_sitedocs']);

               // return ['output' => $value, 'message' => ''];



                // return JSON encoded output in the below format
                // alternatively you can return a validation error
                // return ['output'=>'', 'message'=>'Validation error'];
            }
            // else if nothing to do always return an empty JSON encoded output
            else {
                return ['output' => '', 'message' => 'not done'];
            }
        }


        return $this->render('p_sitedocs', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
		
	 }
	 
	  public function actionWritecommentfordocshow(){
		 return $this->renderPartial('writecommentfordocshow');
	 }
	  public function actionUpdatesitecommentaction()
	 {
		 $getWritecomment  = $_GET['writecomment'];
		 $r_sid = $_GET['r_sid'];
		 $RequestSiteVisitbin = \common\models\RequestSiteVisitbin::find()->where(['request_id'=>$r_sid])->one();
	   if($RequestSiteVisitbin){
		 $checkstatus = \common\models\MyProfileProgressStatus::find()->where(['user_id'=> $RequestSiteVisitbin->user_id,'process_name'=>"site_visit_completed",'process_status'=>"100",'active'=>1,'property_id'=>$RequestSiteVisitbin->property_id])->one();
	if(!$checkstatus){
		$newcheckstatus = new \common\models\MyProfileProgressStatus();
		$newcheckstatus->process_name="site_visit_completed";
		$newcheckstatus->process_status="100";
		$newcheckstatus->user_id= $RequestSiteVisitbin->user_id;
		$newcheckstatus->property_id=$RequestSiteVisitbin->property_id;
		
		$newcheckstatus->addcomment =$getWritecomment;
		$newcheckstatus->save();
	 } else {
		 $checkstatus->addcomment =$getWritecomment;
		 $checkstatus->save(); 
		 }
	   }
		 return  true;
	 }
	  public function actionUpdatedocscommentaction()
	 {
		 $getWritecomment  = $_GET['writecomment'];
		 $r_sid = $_GET['r_sid'];
		 $RequestSiteVisitbin = \common\models\Showdocuments::find()->where(['id'=>$r_sid])->one();
	   if($RequestSiteVisitbin){
		 $checkstatus = \common\models\MyProfileProgressStatus::find()->where(['user_id'=> $RequestSiteVisitbin->userid,'process_name'=>"doc_show_done",'process_status'=>"100",'active'=>1,'property_id'=>$RequestSiteVisitbin->propertyID])->one();
	if(!$checkstatus){
		$newcheckstatus = new \common\models\MyProfileProgressStatus();
		$newcheckstatus->process_name="doc_show_done";
		$newcheckstatus->process_status="100";
		$newcheckstatus->user_id= $RequestSiteVisitbin->userid;
		$newcheckstatus->property_id=$RequestSiteVisitbin->propertyID;
		
		$newcheckstatus->addcomment =$getWritecomment;
		$newcheckstatus->save();
	 } else {
		 $checkstatus->addcomment =$getWritecomment;
		 $checkstatus->save(); 
		 }
	   }
		 return  true;
	 }
	  public function actionUpdatecommentaction()
	 {
		 $getWritecomment  = $_GET['writecomment'];
		 $userid = $_GET['id'];
		 $checkifalreadyexists = \common\models\UserComments::find()->where(['added_for'=>$userid,'added_by'=>Yii::$app->user->identity->id])->one();
		 if(!$checkifalreadyexists){
		 $usercomments = new \common\models\UserComments();
		 $usercomments->comment =$getWritecomment;
		 $usercomments->added_for = $userid;
		 $usercomments->added_by = Yii::$app->user->identity->id;
		 $usercomments->save();
		 }else {
		 $checkifalreadyexists->comment =$getWritecomment;
		 $checkifalreadyexists->added_for = $userid;
		 $checkifalreadyexists->added_by = Yii::$app->user->identity->id;
		 $checkifalreadyexists->save(); 
		 }
		 return  true;
	 }
	 public function actionWritecommentforuser()
	 {
		 
		 return $this->renderPartial('writecommentforuser');
	 }
         
         
         
	 public function actionP_visits()
	 {

	 $searchModel = new \common\models\RequestSiteVisitbinSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams,$_GET['id']);
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');
 
         if (isset($_POST['hasEditable'])) {
           
            // use Yii's response format to encode output as JSON
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            // read your posted model attributes
            if (isset($_POST['editableKey'])) {
                $reqid = $_POST['editableKey'];
                $editableIndex = $_POST['editableIndex'];
                 $tagsdata = $_POST['RequestSiteVisitbin'][$editableIndex]['request_status'];
                $getrq = \common\models\RequestSiteVisitbin::find()->where(['request_id' => $reqid])->one();
                if ($getrq) {
                    
                        $getrq->request_status = $tagsdata;               
                        
                         $getrq->save(false);
                         $value = $getrq->request_status;
                         $requestid = \common\models\RequestSiteVisitbin::find()->where(['request_id' => $reqid])->one();
                         $user_id =  $requestid->user_id;
                         $assigned_id = Yii::$app->user->identity->id;
                         $querys = \common\models\CompanyEmp::find()->where(['userid'=>$assigned_id])->one();
                         $assigned_ids = $querys->id;


                         $property_id =  $requestid->property_id;
                         $connection = Yii::$app->getDb();
                         $amt="select count(*) as counts from request_document_show where request_id=$reqid and user_id=$user_id";
                    
                        $command_get = $connection->createCommand($amt);
                        $result_chk = $command_get->queryAll();
                        if($result_chk[0]['counts'] <= 0 ){

                         $insert = \Yii::$app->db->createCommand()->insert('request_document_show', ['request_id' => $reqid, 'user_id' => $user_id,'assigned_to_id'=>$assigned_ids, 'property_id' => $property_id, 'created_date' => $date])->execute();
                        }


                }

                
                

                return ['output' => $value, 'message' => ''];



                // return JSON encoded output in the below format
                // alternatively you can return a validation error
                // return ['output'=>'', 'message'=>'Validation error'];
            }
            // else if nothing to do always return an empty JSON encoded output
            else {
                return ['output' => '', 'message' => 'not done'];
            }
        }
 
        return $this->render('p_visits', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

 
     }
     




     public function actionP_shortlists()
	 {

	 $searchModel = new \common\models\ShortlistpropertySearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams,$_GET['id']);
         $dataProvider = $searchModel->searches(Yii::$app->request->queryParams);
   
 
        return $this->render('p_shortlists', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

 
     }



     public function actionP_usershortlists()
	 {

        $propid = $_GET['propids'];

	 $searchModel = new \common\models\ShortlistpropertySearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams,$_GET['id']);
         $dataProvider = $searchModel->searchprop(Yii::$app->request->queryParams,$propid);
   
 
        return $this->render('p_usershortlists', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

 
     }
     



    



         public function actionP_visitsed()
	 {

	 $searchModel = new \common\models\RequestSiteVisitbinSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams,$_GET['id']);
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         if (isset($_POST['hasEditable'])) {
           
            // use Yii's response format to encode output as JSON
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            // read your posted model attributes
            if (isset($_POST['editableKey'])) {
                $reqid = $_POST['editableKey'];
                $editableIndex = $_POST['editableIndex'];
                 $tagsdata = $_POST['RequestSiteVisitbin'][$editableIndex]['visit_type'];
                $getrq = \common\models\RequestSiteVisitbin::find()->where(['request_id' => $reqid])->one();
                if ($getrq) {
                    
                        $getrq->visit_type = $tagsdata;                    
                        
                         $getrq->save(false);
                }

                $value = $getrq->visit_type;
                

                return ['output' => $value, 'message' => ''];



                // return JSON encoded output in the below format
                // alternatively you can return a validation error
                // return ['output'=>'', 'message'=>'Validation error'];
            }
            // else if nothing to do always return an empty JSON encoded output
            else {
                return ['output' => '', 'message' => 'not done'];
            }
        }
 
        return $this->render('p_visits', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

 
	 }









	 public function actionP_expect()
	 {
		 return $this->render('p_expect');
	 }
	 public function actionP_docs()
	 {
		 return $this->render('p_docs');
     }
     

	  public function actionIndex()
    {  
           $model = new \common\models\AddpropertypmSearch();
	  $arrayemployes = \common\models\CompanyEmpb::find()->where(['isactive'=>1,'designation'=>1,'employee_typeID'=>1])->all();
	     $data = yii\helpers\ArrayHelper::map($arrayemployes,'id','name');
        $searchModel = new AddpropertypmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,yii::$app->user->identity->id);
    if (isset($_POST['expandRowKey'])) {
        return $this->renderPartial('view?id=1');
    } 
	 
        return $this->render('index', [
		  'data'=>$data,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionIndex_p()
    {  
         $rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($rbac->item_name == "csr_demand"){
		$this->layout="csr_demand_layout";
	}if($rbac->item_name == "csr_head"){
		$this->layout="csr_head_layout";
	}if($rbac->item_name == "csr_supply"){
		$this->layout="csr_supply_layout";
	}
           $model = new \common\models\AddpropertypmSearch();
	  $arrayemployes = \common\models\CompanyEmpb::find()->where(['isactive'=>1,'designation'=>1,'employee_typeID'=>1])->all();
	     $data = yii\helpers\ArrayHelper::map($arrayemployes,'id','name');
        $searchModel = new AddpropertypmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,yii::$app->user->identity->id);
    if (isset($_POST['expandRowKey'])) {
        return $this->renderPartial('view?id=1');
    } 
	 
        return $this->render('index_p', [
		  'data'=>$data,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

   

    /**
     * Displays a single Addpropertypm model.
     * @param integer $id
     * @return mixed
     */
    public function actionViews()
    {
		$id = $_POST['expandRowKey'];
        return $this->renderPartial('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionSavescheduledtime(){

        $dates = $_POST['newdates'];
        $siteid = $_POST['newsiteid'];
        $rbac = \common\models\RequestSiteVisitbin::find()->where(['request_id'=>$siteid])->one();
        // echo $dates;die;
      //  $mysqltime = date("Y-m-d H:i:s", strtotime($dates));
       
        $rbac->scheduled_time = $dates;
        //$rbac->visit_status_confirm = 'schedule';
        $rbac->save(false);
	if($rbac){
	return 1;die;
	}else{
	return 2;die;
	}
        
     }
    /**
     * Creates a new Addpropertypm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Addpropertypm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Addpropertypm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        


       // echo '<pre>';print_r($formOtherDetails);die;

        if ($model->load(Yii::$app->request->post()) ) {

           // echo '<pre>';print_r(Yii::$app->request->post());die;

            if($model->save()){

                return $this->redirect('index');
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,                
                'ids'=>$id
               
            ]);
        }
    }

    /**
     * Deletes an existing Addpropertypm model.
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
     * Finds the Addpropertypm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Addpropertypm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Addpropertypm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
