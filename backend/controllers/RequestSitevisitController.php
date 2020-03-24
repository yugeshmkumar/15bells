<?php

namespace backend\controllers;

use Yii;
use common\models\RequestSiteVisit;
use common\models\RequestSiteVisitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\filters\AccessControl;

/**
 * RequestSitevisitController implements the CRUD actions for RequestSiteVisit model.
 */
class RequestSitevisitController extends Controller {

    /**
     * @inheritdoc
     */
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $assigndash = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
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
    if($assigndash->item_name == "csr_head"){
		
		$this->layout="csr_head_layout";		
	}
	
    }

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

             'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','view','create','onlinepickdropsave','addfeedback','showfeedback','showpropdetails','removesite','confirmstat','checkuserconfirmstatus','offlinepickdropsave','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
           
        ];
    }

    /**
     * Lists all RequestSiteVisit models.
     * @return mixed
     */
    public function actionIndex() {
       
                 $searchModel = new RequestSiteVisitSearch();
		 $dataProvider = $searchModel->searches(Yii::$app->request->queryParams);
		 $request = Yii::$app->request;
                 $mdataPost = $request->post();
		
		 $model = new \common\models\RequestSiteVisit();
		 
		  if (isset($_POST['hasEditable'])) {
			  
        // use Yii's response format to encode output as JSON
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        // read your posted model attributes
        if ($model->load($_POST)) {
			$request = Yii::$app->request->post();
                        $modelreq=$request['RequestSiteVisit'];
			$editableIndex = $_POST['editableIndex'];
                        $approvestatus=$modelreq[$editableIndex]['visit_type'];
			$geteditablekey = $_POST['editableKey'];
			$finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $geteditablekey])->one();
			if($finduser){
			
		    $finduser->visit_type = $approvestatus;
                    $finduser->save(false);

            // read or convert your posted information
           // $value = $model->approve_status;
            // return JSON encoded output in the below format
            return $this->refresh();
            
            // alternatively you can return a validation error
            // return ['output'=>'', 'message'=>'Validation error'];
        }
        
                                }
        // else if nothing to do always return an empty JSON encoded output
        else {
            return ['output'=>'', 'message'=>''];
        }
    }


        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RequestSiteVisit model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

   public function actionShowpropdetails(){
       
              $id = $_POST['id'];
	       $payments = \Yii::$app->db->createCommand("SELECT a.* ,p.typename as typename,u.email as email,u.username as username from addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN user as u ON (u.id = a.user_id) where a.id='$id'")->queryAll();

	         echo json_encode($payments);
   }


    /**
     * Creates a new RequestSiteVisit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new RequestSiteVisit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->request_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionOnlinepickdropsave() {


	$pickup = $_POST['pickup'];
	$drop = $_POST['drop'];
	$id = $_POST['id'];
	$amount_payable = $_POST['amount_payable'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

        if ($finduser) {

            $finduser->pickup_location = $pickup;
            $finduser->drop_location = $drop;
            $finduser->amount_payable = $amount_payable;
            $finduser->request_status = 'pending';
            $finduser->save(false);
            return 1;
        } else {
            return 2;
        }
    }

    public function actionAddfeedback() {

	$comment = $_POST['comment'];
	$id = $_POST['id'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

        if ($finduser) {

            $finduser->feedback = $comment;
            $finduser->save(false);

            return 1;
        } else {
            return 2;
        }
    }

    public function actionShowfeedback() {

         $id = $_POST['id'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

        if ($finduser) {

            $comment = $finduser->feedback;

            return $comment;
        } else {
            return 'No Feedback Added Yet';
        }
    }

    public function actionRemovesite() {


	$id = $_POST['id'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

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

    

    public function actionConfirmstat() {

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $id = $_POST['id'];
        $status = $_POST['status'];

        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

        if ($finduser) {

            $finduser->visit_status_confirm = $status;
            $finduser->save(false);
            $insert = \Yii::$app->db->createCommand()->insert('request_document_show', ['request_id' => $id, 'user_id' => $finduser->user_id, 'property_id' => $finduser->property_id, 'created_date' => $date])->execute();


            return 1;
        } else {
            return 'Internal Error';
        }
    }

    public function actionCheckuserconfirmstatus() {
        $id = $_POST['id'];
        $user_id = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $no = 'no';
        $blank = '0000-00-00 00:00:00';

        if ($id == 'ready') {
            $finduser = \common\models\RequestSiteVisit::find()->where('user_id = :user_id', [':user_id' => $user_id])->andWhere('scheduled_time <> :blank', [':blank' => $blank])->andWhere('scheduled_time < :date', [':date' => $date])->andwhere('visit_status_confirm = :no', [':no' => $no])->orderBy(['request_id' => SORT_DESC])->LIMIT(1)->one();

            if ($finduser) {
                $reqst_id = $finduser->request_id;


                return $reqst_id;
            } else {
                return '0';
            }
        }
    }

    public function actionOfflinepickdropsave() {


	$id = $_POST['id'];
        $amount_payable = $_POST['amount_payable'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

        if ($finduser) {

            $finduser->request_status = 'pending';
            $finduser->amount_payable = $amount_payable;
            $finduser->save(false);
            return 1;
        } else {
            return 2;
        }
    }

    /**
     * Updates an existing RequestSiteVisit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->request_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RequestSiteVisit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RequestSiteVisit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RequestSiteVisit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = RequestSiteVisit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
