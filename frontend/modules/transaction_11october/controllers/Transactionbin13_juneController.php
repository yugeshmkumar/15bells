<?php

namespace frontend\modules\transaction\controllers;

use Yii;
use backend\modules\transaction\models\Transaction;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\filters\AccessControl;

/**
 * TransactionController implements the CRUD actions for Transaction model.
 */
class TransactionController extends Controller {

    /**
     * @inheritdoc
     */
	  public $layout = 'commontrans';
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
                        'actions' => ['logout', 'update', 'index', 'create', 'view', 'delete', 'virtual', 'bid', 'insertajax', 'grid', 'endbid', 'changestatus', 'time', 'showamount', 'checkstatus', 'showamount1','seller'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Transaction models.
     * @return mixed
     */
   

    /**
     * Displays a single Transaction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionChangestatus() {

        $id = $_POST['check'];
        $connection = Yii::$app->getDb();
        $status = $_POST['t1'];

        if ($status == 'a') {

            echo $sql = "update transaction set status='Approved' where id='$id'";
        } else {
            $sql = "update transaction set status='Rejected' where id='$id'";
        }

        $command = $connection->createCommand($sql);
        $command->query();
    }

    /**
     * Creates a new Transaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
		
		 $vr_setup = \common\models\VrSetup::find()->where(['secret_code'=>$_GET['id']])->one();
		 
        $model = new Transaction();
		if($vr_setup){
        $model->product_id = $vr_setup->propertyID;
        $model->buyer_id = Yii::$app->user->identity->id;
		 }
//echo $this->$attribute;die;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', "Bid Placed Sucessfully");

            return $this->redirect(['create', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Transaction model.
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

    public function actionBid() {
        $connection = Yii::$app->getDb();

        $time = date("Y-m-d H:i:s");
     $vr_setup = \common\models\VrSetup::find()->where(['secret_code'=>$_GET['id']])->one();
		 if($vr_setup){
           $product = $vr_setup->propertyID;

        $amt = "select max(bid_amount) as bid_amount
        from (
        select max(bid_amount) as bid_amount from transaction where product_id='$product' and status='Approved'
        union all
        select max(reserved_price) as bid_amount from product_details where product_id='$product'
        ) as p";
		 } else {
			 $amt = "select max(bid_amount) as bid_amount
        from (
        select max(bid_amount) as bid_amount from transaction where product_id='1' and status='Approved'
        union all
        select max(reserved_price) as bid_amount from product_details where product_id='1'
        ) as p"; 
		 }
        $command_get = $connection->createCommand($amt);
        $result_chk = $command_get->queryOne();
        return $r_res = $result_chk['bid_amount'];
    }

    public function actionEndbid() {
        $model = new Transaction();

        return $this->render('endtime', [
                    'model' => $model,
        ]);
    }

    public function actionGrid() {

        $model = new Transaction();
        $rows = Transaction::find()->all();
        echo "<table border='1' >
<tr>
<td align=center> <b>Id</b></td>
<td align=center><b>Buyer Name</b></td>
<td align=center><b>Product Name</b></td>
<td align=center><b>Bid Amount</b></td></td>
<td align=center><b>Bid Date</b></td>
 <td align=center><b>Status</b></td>";

        foreach ($rows as $row) {

            echo "<tr>";
            echo "<td align=center>$row->id</td>";
            echo "<td align=center>xyx</td>";
            echo "<td align=center>$row->product_id</td>";
            echo "<td align=center>$row->bid_amount</td>";
            echo "<td align=center>$row->bid_date</td>";
            echo "<td align=center>$row->status</td>";
            echo "<td align=center><button onclick=me($row->id,'a')>Approve</button></div></td>";
            echo "<td align=center><button onclick=me($row->id,'r')>Reject</button></div></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function actionVirtual() {
        $model = new Transaction();
        $currenttime = $model->getCurrenttime();

        $bid = $model->getBidtime();
        $type = $model->getUsertype();
        $time = $model->getTime();
        $mod_time = $model->getMinusminutes('15');

        if ($type == 19) {//3->19

            $bid = $mod_time;
        }

        if ($currenttime > $bid && $currenttime < $time) {

            if ($type == 15) {//1->15
                echo Html::a('Enter Virtual Lobby', ['transaction/create'], ['class' => 'btn btn-success']);
            } else {
                $id = "na";
                echo Html::a('Enter Virtual Lobby', ['transaction/', 't_id' => $id], ['class' => 'btn btn-success']);
            }
        } else {

            echo" <h1>Waiting for bid to start</h1>";
        }
    }

    public function actionInsertajax() {
        $connection = Yii::$app->getDb();
		$vr_setup = \common\models\VrSetup::find()->where(['secret_code'=>$_GET['id']])->one();
		 if($vr_setup){
           $product = $vr_setup->propertyID;
		 } else {
			 $product =  1;
		 }
        $model = new Transaction();
        $model->product_id = $product;
        $model->buyer_id = Yii::$app->user->identity->id;
        $model->bid_amount = $_POST['bid'];
        $amt = $_POST['bid'];

        //   $amountinwords = $model->getWords($amt);

        $dbtime = $model->getTime();
        $currtime = $model->getCurrenttime();


        if ($currtime > $dbtime) {
            echo "You cannot place bid now";
            die;
        }

        $stat = $model->getuserstatus();
		if($stat==""){
             $model->save();
             echo "Bid Placed Successfully";
             die;
         }

        if ($stat == "Approved") {

            if ($model->save()) {

                $stat = $model->getuserstatus();



                echo "Bid Placed Successfully";
            } else {
                echo "Please add Higher Bid";
            }
        } else {
            echo "Your Previos Bid is Pending";
        }
    }

    /**
     * Deletes an existing Transaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
      public function actionSeller() {
       
        $model = new Transaction();
 
        return $this->render('seller', [       'model' => $model, ]);
    }

    public function actionShowamount() {
        $model = new Transaction();
        $amt = $model->getMaxprice();
        return $amountinwords = $model->getWords($amt);
    }

    public function actionCheckstatus() {
        $model = new Transaction();
        $stat = $model->getuserstatus();
        return $statu = "Your Last Bid was" . "-" . $stat;
    }

    public function actionTime() {
        $connection = Yii::$app->getDb();
        $model = new Transaction();
        $currtime = $model->getCurrentactivetime(); //It adds minutes from current time

        $time = $_POST['time'];

        $add = $model->getAddminutes($time); //It adds total minutes to the database time
        $schedule_time = $_POST['t1'];
//
        /*
          $t1 = '+' . $time . " minutes";         //It adds total minutes to the current time
          $add = date($currtime, strtotime($t1));
          // */
        $amt = "update vr_setup set fromdatetime='$schedule_time', todatetime='$add'";
        $command_get = $connection->createCommand($amt);
        $command_get->query();
    }

    /**
     * Finds the Transaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Transaction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
