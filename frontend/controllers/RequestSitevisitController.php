<?php

namespace frontend\controllers;

use Yii;
use common\models\RequestSiteVisit;
use common\models\Payments;
use common\models\Invoice;
use common\models\RequestSiteVisitSearch;
use yii\web\Controller;
use frontend\models\UserForm;
use frontend\models\search\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\filters\AccessControl;
use Razorpay\Api\Api;
use common\models\CompanyEmp;
use common\models\User;
use yii\helpers\HtmlPurifier;



/**
 * RequestSitevisitController implements the CRUD actions for RequestSiteVisit model.
 */
class RequestSitevisitController extends Controller {

    /**
     * @inheritdoc
     */
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "dashboard";
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
                        'actions' => ['index','view','create','buyer','lessee','indexes','submitfeedback','makeuseryes','onlinepickdropsave','requestsitevisitindex','paymentgateway','sessioncheckout','getvisittype','setvisittype','addfeedback','showfeedback','removesite','confirmstat','checkuserconfirmstatus','offlinepickdropsave','update','delete','onlinesitevisit'],
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
                 if (\Yii::$app->request->isPost) {

                     $post = Yii::$app->request->post();

                    $sites =  $post['progress'];

                    if($sites == 'Completed'){
                        
                        $filter = 'yes';

                    }else{
                        $filter = 'no';
                    }
                     
                    $dataProvider = $searchModel->searchfilter(Yii::$app->request->queryParams,$filter);


                 }else{
                     
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                 }
		 $request = Yii::$app->request;
                 $mdataPost = $request->post();
		
		 $model = new \common\models\RequestSiteVisit();
	


        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }


    public function actionBuyer() {
       
        $searchModel = new RequestSiteVisitSearch();
        if (\Yii::$app->request->isPost) {

            $post = Yii::$app->request->post();

           $sites =  $post['progress'];

           if($sites == 'Completed'){
               
               $filter = 'yes';

           }else{
               $filter = 'no';
           }
            
           $dataProvider = $searchModel->searchfilter(Yii::$app->request->queryParams,$filter);


        }else{
            
           $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        }
$request = Yii::$app->request;
        $mdataPost = $request->post();

$model = new \common\models\RequestSiteVisit();



return $this->render('buyer', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
]);
}

public function actionLessee() {
       
    $searchModel = new RequestSiteVisitSearch();
    if (\Yii::$app->request->isPost) {

        $post = Yii::$app->request->post();

       $sites =  $post['progress'];

       if($sites == 'Completed'){
           
           $filter = 'yes';

       }else{
           $filter = 'no';
       }
        
       $dataProvider = $searchModel->searchfilter(Yii::$app->request->queryParams,$filter);


    }else{
        
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    }
$request = Yii::$app->request;
    $mdataPost = $request->post();

$model = new \common\models\RequestSiteVisit();



return $this->render('lessee', [
       'searchModel' => $searchModel,
       'dataProvider' => $dataProvider,
]);
}





    public function actionIndexes() {
       
        $searchModel = new RequestSiteVisitSearch();
        $ids = $_GET['ids'];
$dataProvider = $searchModel->searched(Yii::$app->request->queryParams,$ids);
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


return $this->render('indexes', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
]);
}







    public function actionRequestsitevisitindex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('documentindex', [
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

    public function actionOnlinesitevisit() {
        return $this->render('onlinesitevisit');
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


	
	$id = $_POST['id'];
	$ratings = $_POST['ratings'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

        if ($finduser) {
           
            $finduser->property_rating = $ratings;           
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

    public function actionGetvisittype(){

        $visitid = $_POST['visitid'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $visitid])->one();

        if ($finduser) {
            
            $visit_type =  $finduser->visit_type;
            return $visit_type;
          
        }


    }

    public function actionSessioncheckout(){

         $ids = $_POST['id'];
        $amount_payable = $_POST['amount_payable'];

        return 'done';

        // if(!isset($_SESSION)) 
        // { 
        //     session_start(); 
        // } 

        // $session = Yii::$app->session;
        //     $session->set('requestids', $ids);
        //     $session->set('amount_payable', $amount_payable);

        //    session_unset();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               

        //return $this->redirect(['onlinesitevisit']);
    }

    public function actionMakeuseryes(){

        $krequestids =  $_POST['id'];
        $buttonid =  $_POST['buttonid'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $krequestids])->one();
        if($finduser){
            $finduser->visit_status_confirm = 'useryes';
            $finduser->buy_property = $buttonid;
            if($finduser->save(false)){
                return 'done';
            }

        }
    }

    public function actionPaymentgateway(){

     
          $orderId =  $_POST['orderid'];
          $property_id =  $_POST['krequestids'];

       $user_id = Yii::$app->user->identity->id;
        $kamount_payable =  $_POST['kamount_payable'];

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $finduser = \common\models\RequestSiteVisit::find()->where(['property_id' => $property_id])->andwhere(['user_id' => $user_id])->one();
        $krequestids =  $finduser->request_id;
      if($finduser){

              if ($orderId != '') { 
                     
           
            $finduser->request_status = 'paid';
          //  $finduser->visit_status_confirm = 'useryes';
            $finduser->save(false);


            $insert = \Yii::$app->db->createCommand()->insert('request_document_show', ['request_id' => $krequestids, 'user_id' => $finduser->user_id, 'property_id' => $finduser->property_id, 'created_date' => $date])->execute();
    
    

            $model = new Payments;
            $model->item_name = 'sitevisit';
            $model->item_number = $krequestids;
            $model->txn_id = $orderId;
            $model->payment_amount = $kamount_payable;
            $model->currency_code = 'INR';
            $model->payment_status = 'paid';
            $model->created_date = $date;
            if($model->save(false)){


                $Invoice = new Invoice;
              //  $Invoice->invoiceID = 'documentshow';
                $Invoice->propertyid = $finduser->property_id;
                $Invoice->user_id = $finduser->user_id;
                $Invoice->payment_id = $model->id;
                $Invoice->finyearid = 1;
                $Invoice->amount = $kamount_payable;
                $Invoice->isActive = 1;
                $Invoice->createdAt = $date;
                if($Invoice->save(false)){


                    $payments = \Yii::$app->db->createCommand("SELECT LPAD(invoiceitemid,7,'0') as generateid from invoice_items where invoiceitemid='$Invoice->invoiceitemid'")->queryOne();
                    $generateid =  $payments['generateid'];


                    $saveinvoiceid = \common\models\Invoice::find()->where(['invoiceitemid' => $Invoice->invoiceitemid])->one();
                   
                    $saveinvoiceid->invoiceID = $generateid;
                    $saveinvoiceid->save(false);
                    return 1;
                }

                
                 
             }else{
                return 2;
            }

            
        }
    }       


    }

    public function actionSetvisittype(){

        $visittypeid = $_POST['visittypeid'];
        $radioValue = $_POST['radioValue'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $visittypeid])->one();

        if ($finduser) {
            
           
            $finduser->visit_type = $radioValue;
            $finduser->save(false);

            return 1;
            
        } else {
            return 'Internal Error';
        }

    }

    public function actionRemovesite() {


	     $id = $_POST['id'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

        if ($finduser) {
            
            if($finduser->request_status == 'pay_now'){
            $finduser->status = 0;
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
        $payment_status = 'paid';
        $blank = '0000-00-00 00:00:00';

        if ($id == 'ready') {
            $finduser = \common\models\RequestSiteVisit::find()->where('user_id = :user_id', [':user_id' => $user_id])
           // ->leftJoin('request_document_show', 'request_document_show.request_id=request_site_visit.request_id')
            ->andWhere('scheduled_time <> :blank', [':blank' => $blank])
            ->andWhere('scheduled_time < :date', [':date' => $date])
            ->andwhere('visit_status_confirm = :no', [':no' => $no])
            ->andwhere('request_status = :payment_status', [':payment_status' => $payment_status])
            //->orderBy(['request_id' => SORT_DESC])->LIMIT(1)
            ->one();

           // print_r($finduser);die;

            if ($finduser) {
                $propid = $finduser->property_id;
                $reqst_id = $finduser->request_id;
                $scheduled_time   = $finduser->scheduled_time;
                $sales_id   = $finduser->sales_id;

                if($sales_id){
                    
                    $querys = CompanyEmp::find()->where(['id'=>$sales_id])->one();
                     $assigned_id = $querys->userid;
                   $users = User::find()->where(['id'=>$assigned_id])->one();
                   $name = $users->fullname;
                }

                
                $dates = date("d  F ,Y", strtotime($scheduled_time));
                $time = date("g:i A", strtotime($scheduled_time));

                
                $info = array($reqst_id,$scheduled_time,$name,$dates,$time,$propid);
                return   json_encode($info);
               // return $scheduled_time;
            } else {
                return '0';
            }
        }
    }

    public function actionOfflinepickdropsave() {


	    $id = $_POST['id'];
        $ratings = $_POST['ratings'];
        $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

        if ($finduser) {

            $finduser->account_manager_rating = $ratings;
            $finduser->save(false);
            return 1;
        } else {
            return 2;
        }
    }


    public function actionSubmitfeedback(){

         $id = $_POST['id'];
        
         $managerfeedback = HtmlPurifier::process($_POST['managerfeedback']);
          $propertyfeedback = HtmlPurifier::process($_POST['propertyfeedback']);

         $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $id])->one();

        if ($finduser) {

            $finduser->manager_feedback = $managerfeedback;
            $finduser->property_feedback = $propertyfeedback;
            $finduser->visit_status_confirm = 'yes';

            if($finduser->save(false)){
                return 1;
            }else {
                return 2;
            }
            
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
