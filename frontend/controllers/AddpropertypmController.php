<?php

namespace backend\controllers;

use Yii;
use common\models\Addpropertypm;
use common\models\AddpropertypmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddpropertypmController implements the CRUD actions for Addpropertypm model.
 */
class AddpropertypmController extends Controller
{
	 public $layout = "pmanager_layout";
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
	 public function actionP_sitedocs()
	 {
		 
        $searchModel = new \common\models\ShowdocumentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$_GET['id']);

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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$_GET['id']);

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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$_GET['userid']);
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
    public function actionView()
    {
		$id = $_POST['expandRowKey'];
        return $this->renderPartial('view', [
            'model' => $this->findModel($id),
        ]);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
