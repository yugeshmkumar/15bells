<?php

namespace frontend\controllers;

use Yii;
use common\models\RequestDocumentShow;
use common\models\Payments;
use common\models\Invoice;
use common\models\RequestDocumentShowSearch;
use yii\web\Controller;
use frontend\models\UserForm;
use frontend\models\search\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\MediaFilesConfig;
use common\models\MediaFiles;
use yii\db\Query;
use yii\filters\AccessControl;

/**
 * DocumentshowController implements the CRUD actions for RequestDocumentShow model.
 */
class DocumentshowController extends Controller {

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
                        'actions' => ['index', 'view', 'create','indexes', 'documentshow', 'movetoemd','documentshowindex','paymentgateway','onlinesitevisit', 'update','sessioncheckout', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all RequestDocumentShow models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new RequestDocumentShowSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexes() {
        $id = $_GET['ids'];
        $searchModel = new RequestDocumentShowSearch();
        $dataProvider = $searchModel->searched(Yii::$app->request->queryParams,$id);

        return $this->render('indexes', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }


    public function actionDocumentshowindex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('documentindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single RequestDocumentShow model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RequestDocumentShow model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new RequestDocumentShow();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }


    public function actionSessioncheckout(){

        $ids = $_POST['id'];
        $amount_payable = $_POST['amount_payable'];

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

            $session = Yii::$app->session;
            $session->set('request_id', $ids);
            $session->set('document_amount', $amount_payable);

        return $this->redirect(['onlinesitevisit']);
    }

    public function actionOnlinesitevisit() {

        return $this->render('documentshow');
    }



    public function actionPaymentgateway(){


         $orderId =  $_POST['orderid'];
         $krequestids =  $_POST['krequestids'];
         $kamount_payable =  $_POST['kamount_payable'];
 
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');
 
         $finduser = \common\models\RequestDocumentShow::find()->where(['request_id' => $krequestids])->one();
         // echo '<pre>';print_r($finduser);die;
        if($finduser){
         if ($orderId != '') { 
                      
            
             $finduser->payment_status = 'paid';
             $finduser->save(false);
 
             $model = new Payments;
             $model->item_name = 'documentshow';
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

    public function actionDocumentshow() {


        $id = $_POST['id'];
        $query = (new Query())->select('*')->from('media_files_config')->where(['property_id' => $id]);
        $command = $query->createCommand();
        $datas = $command->queryAll();

        $ids = [];
        for ($i = 0; $i <= count($datas) - 1; $i++) {
            $ids[] = $datas[$i]['media_id'];
        }
        // print_r($ids);die;
        $pic = [];


        $docnames = MediaFiles::find()->where(['id' => $ids])->andwhere(['<>','type','webp'])->asArray()->all();

        

        return json_encode($docnames);
    }

    public function actionMovetoemd() {

        $propid = $_POST['propid'];
        $docshow = $_POST['docshow'];
        if ($propid != '' && $docshow != '') {
            $user_id = Yii::$app->user->identity->id;
            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s');
            $insert = \Yii::$app->db->createCommand()->insert('request_emd', ['documentshow_id' => $docshow, 'user_id' => $user_id, 'property_id' => $propid, 'created_date' => $date])->execute();
            if ($insert) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Updates an existing RequestDocumentShow model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing RequestDocumentShow model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RequestDocumentShow model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RequestDocumentShow the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = RequestDocumentShow::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

