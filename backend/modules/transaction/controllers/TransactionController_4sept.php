<?php

namespace backend\modules\transaction\controllers;

use Yii;
use backend\modules\transaction\models\Transaction;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;
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
                        'actions' => ['logout', 'update', 'index', 'create', 'view', 'delete', 'virtual', 
                            'bid', 'insertajax', 'grid', 'endbid', 'changestatus', 'time', 'showamount', 
                            'checkstatus', 'showamount1', 'seller', 'maxbidders', 'minraise', 'starttime','ajaxtime','test','test1','getactiveuser','chat','dynamic','winnerscreen','notificationtime','deltrans','customsoundgrid'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
	
	
public function actionChat() {
        $model = new Transaction();
$pid=$_GET['pid'];

$chat=$_POST['chat'];
$id=$_POST['id'];
$send=Yii::$app->user->identity->id;
  $sql="insert into chat_history(send_by,message,sent_to,property_id) values ($send,'$chat','$id','$pid')";
 $connection = Yii::$app->getDb();
$command = $connection->createCommand($sql);
$result = $command->query();
     
    }

public function actionDeltrans() {
        $model = new Transaction();

  $sql="delete from transaction";
 $connection = Yii::$app->getDb();
$command = $connection->createCommand($sql);
$result = $command->query();

 $sql1="delete from chat_history";
 $connection1 = Yii::$app->getDb();
$command1 = $connection1->createCommand($sql1);
$result = $command1->query();
     
    }

public function actionDynamic() {
	$id=$_GET['pid'];
        $model = new Transaction();
 $sql="select c.message ,u.username as user from chat_history c inner join user u  on  c.sent_to=u.id where c.property_id=$id";
$connection = Yii::$app->getDb();
$command = $connection->createCommand($sql);
$result = $command->queryAll();
?>

<?php
foreach($result as $row)
{

$user=$row['user'];
echo $user."-".$row['message'];
echo "<br/>";

}
}

    /**
     * Lists all Transaction models.
     * @return mixed
     */
    public function actionIndex() {
			$checkmyrolemod = \backend\models\BackMode::checkrole(yii::$app->user->identity->id,"moderator");
		$checkmyrolepm = \backend\models\BackMode::checkrole(yii::$app->user->identity->id,"property_manager");
		if($checkmyrolemod){
			$this->layout = "moderator_layout";
		} else if($checkmyrolepm){
			$this->layout = "pmanager_layout";
		}
		$vr_setup = \common\models\VrSetup::find()->where(['id'=>$_GET['id']])->one();
		 if($vr_setup){
           $product = $vr_setup->propertyID;
		 } else {
			 $product = 0;
		 }
        $model = new Transaction();
        $dataProvider = new ActiveDataProvider([
            'query' => Transaction::find()->where(['product_id'=>$product]),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'model' => '$model'
        ]);
    }

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

        $id = $_GET['check'];
        $connection = Yii::$app->getDb();
        $status = $_GET['t1'];
	 $pid= $_GET['pid'];
        if ($status == 'a') {
            $model = new Transaction();
            $sql = "update transaction set status='Approved' where id='$id' and product_id = $pid ";
           $model->preapproved($id,$pid);
		 
        } else {
            $sql = "update transaction set status='Rejected' where id='$id' and product_id = $pid ";
        }

        $command = $connection->createCommand($sql);
        $command->query();
    }

    /**
     * Creates a new Transaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate() {
        // $model = new Transaction();


        // $model->product_id = "1";
        // $model->buyer_id = Yii::$app->user->identity->id;

//echo $this->$attribute;die;

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {

            // Yii::$app->session->setFlash('success', "Bid Placed Sucessfully");

            // return $this->redirect(['create', 'id' => $model->id]);
        // } else {
            // return $this->render('create', [
                        // 'model' => $model,
            // ]);
        // }
    // }

    /**
     * Updates an existing Transaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    

public function actionGetactiveuser(){
	$connection = Yii::$app->getDb();
       $pid = $_GET['id'];
        $time = date("Y-m-d H:i:s");
     //   $amt = "select count(*) as active_users from transaction where product_id=$pid";
	  $amt = "select count(userid) active_users from activeuser_bid where propertyid=$pid";
        $command_get = $connection->createCommand($amt);
        $result_chk = $command_get->queryOne();
        return $r_res = $result_chk['active_users'];
}
    public function actionBid() {
        $connection = Yii::$app->getDb();
       $pid = $_GET['id'];
        $time = date("Y-m-d H:i:s");
        $amt = "select max(bid_amount) as bid_amount
        from (
        select max(bid_amount) as bid_amount from transaction where product_id=$pid  and status='Approved'
        union all
        select max(reserved_price) as bid_amount from product_details where product_id=$pid 
        ) as p";
        $command_get = $connection->createCommand($amt);
        $result_chk = $command_get->queryOne();
        return $r_res = $result_chk['bid_amount'];
    }

 
    public function actionEndbid() {
        $model = new Transaction();
$pid = $_GET['id'];
 $getwinnerid="select id from transaction where bid_amount = (select max(bid_amount) as bid_amount from transaction where status='Approved' and product_id='$pid') ";
   $connection = Yii::$app->getDb();
	$command = $connection->createCommand($getwinnerid);
	$result = $command->queryOne();
	 $id= $result['id'];
if($id!=""){
 $sql = "update transaction set status='Winner' where id =$id";
$command = $connection->createCommand($sql);
$result = $command->query();
}
$sql="select max(bid_amount) as bidder ,t.status,t.bid_date,u.username from transaction t inner join user u on u.id=t.buyer_id where t.status='Approved' or t.status='Winner' group by buyer_id";     
//$sql="select max(t.bid_amount) as bidder,u.username,t.status from transaction t inner join user u on u.id=t.buyer_id where t.status='Winner' group by buyer_id
//union
//select max(t.bid_amount) as bidder,u.username,t.status from transaction t inner join user u on u.id=t.buyer_id where t.status='Approved' group by buyer_id";


$dataProvider = new SqlDataProvider([ 'sql' => $sql]);

  return $this->render('endtime', [
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionCustomsoundgrid() {
       $id = $_GET['id'];
$loggedin=Yii::$app->user->identity->id;
        $model = new Transaction();
$sql="select count(id) as cid from transaction where product_id=$id";
$connection = Yii::$app->getDb();
$command = $connection->createCommand($sql);
$result = $command->queryOne();
return $result['cid'];
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

       public function actionMaxbidders() {
		   $pid = $_GET['id'];
		   $vrroomID = \common\models\VrSetup::find()->where(['propertyID'=>$pid ,'isactive'=>1])->one();
		   $vrID = $vrroomID->id;
        $connection = Yii::$app->getDb();
        $model = new Transaction();
       // $sql = "select max(t.bid_amount) as bidder,u.aliasname  from transaction t inner join auction_participants u on u.partcipantID=t.buyer_id where t.status ='Approved' and u.vr_roomID = $vrID group by buyer_id";
              $sql = "select t.bid_amount as bidder,u.aliasname,u.partcipantID from transaction t inner join auction_participants u on u.partcipantID=t.buyer_id and u.vr_roomID =$vrID ";
	  $connection = Yii::$app->getDb();
        $command_get = $connection->createCommand($sql);
        $query = $command_get->queryAll();
        $countrow = count($query);
        if ($countrow > 0) {
            echo "<table style=color:white;width:210px; border='1' >
<tr>
<td align=center> <b>User Name</b></td>
<td align=center><b>Bid Amount</b></td>";
            for ($i = 0; $i < $countrow; $i++) {
                $bidamount = $query[$i]['bidder'];
				$alis=$query[$i]['aliasname'];

                echo "<tr>";
                echo "<td align=center>$alis</td>";
                echo "<td align=center>$bidamount</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    public function actionWinnerscreen() {
        $connection = Yii::$app->getDb();
        $model = new Transaction();
        $sql = "select max(t.bid_amount) as bidder,u.aliasname,t.status from transaction t inner join user u on u.id=t.buyer_id where t.status='Winner' group by buyer_id
union
select max(t.bid_amount) as bidder,u.aliasname,t.status from transaction t inner join user u on u.id=t.buyer_id where t.status='Approved' group by buyer_id";
        $connection = Yii::$app->getDb();
        $command_get = $connection->createCommand($sql);
        $query = $command_get->queryAll();
        $countrow = count($query);
        if ($countrow > 0) {
            echo "<table style=color:green;width:510px; border='1' >
<tr>
<td align=center> <b>User Name</b></td>
<td align=center><b>Bid Amount</b></td><td align=center><b>Status</b></td>";
            for ($i = 0; $i < $countrow; $i++) {
                $bidamount = $query[$i]['bidder'];
				$alis=$query[$i]['aliasname'];
$status=$query[$i]['status'];
                echo "<tr>";
                echo "<td align=center>$alis</td>";
                echo "<td align=center>$bidamount</td>";
		echo "<td align=center>$status</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
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

    // public function actionInsertajax() {
        // $connection = Yii::$app->getDb();
        // $model = new Transaction();
        // $model->product_id = "1";
        // $model->buyer_id = Yii::$app->user->identity->id;
        // $model->bid_amount = $_POST['bid'];
        // $amt = $_POST['bid'];

          //$amountinwords = $model->getWords($amt);

        // $dbtime = $model->getTime();
        // $currtime = $model->getCurrenttime();

        // if ($currtime > $dbtime) {
            // echo "You cannot place bid now";
            // die;
        // }
        // $max_db_bid = $model->checkbid();

        // $stat = $model->getuserstatus();

        // if ($stat == "Approved") {

            // if ($model->save()) {
                // $stat = $model->getuserstatus();

                // echo "Bid Placed Successfully";
            // } else {
                // echo "Please add Higher Bid";
            // }
        // } else {


            // if ($amt > $max_db_bid) {
                // $model->save();
                // echo "Bid Placed";
                // die;
            // }

            // echo "Your Previous Bid is Pending";
        // }
    // }

    /**
     * Deletes an existing Transaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    
    
    public function actionAjaxtime() {
        $model = new Transaction();
        return $time = $model->gettime();
    }

    public function actionSeller() {
        $model = new Transaction();
        return $this->render('seller', [ 'model' => $model,]);
    }
    
    
       public function actionTest() {
        $model = new Transaction();
     
 $r= "<script>
       
 
	 $(function(){
	    $('#gh1').countdowntimer({
	 dateAndTime : '2017/06/22 21:15:09',
        
	    });
    
     

	  });

	</script>"  ;
return $r;
    }
    
    public function actionTest1(){
		$pid = $_GET['id'];
            $model = new Transaction();
         $time = $model->gettime($pid);
        $db= date('F j, Y g:i:s A', strtotime($time));
        $r='"';
        
        
        $db=$r.$db.$r;
              
         $r= "<script>
        
        var countDownDate = new Date($db).getTime();
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000); 
    document.getElementById('future_date').innerHTML =  hours + 'h ' + minutes + 'm ' + seconds + 's';
    if (distance < 0) {
    
        clearInterval(x);
  
        document.getElementById('future_date').innerHTML = 'EXPIRED';
     //   setTimeout(function() {  window.location = 'homepage.html';  }, 10000);
     
		}

}, 1000);
</script>"  ;
      return $r;
    }
	
	  public function actionNotificationtime() {
        $pid = $_GET['id'];
        $model = new Transaction();
		
		
      return   $left = $model->getTimealert($pid);
    }

    public function actionShowamount() {
        $model = new Transaction();
        $amt = $model->getWordinamount();
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
        $startbid = $_POST['bidtime'];
		$pid = $_GET['id'];
        $add = $model->getAddminutes($time,$startbid,$pid); //It adds total minutes to the database time
        $schedule_time = $_POST['t1'];
//
        
      /*    $t1 = '+' . $time . " minutes";         //It adds total minutes to the current time
          $add = date($currtime, strtotime($t1));
       */
      $amt = "update vr_setup set fromdatetime='$schedule_time', todatetime='$add',startbidtime='$startbid' where propertyID=$pid";
        $command_get = $connection->createCommand($amt);
        $command_get->query();
    }

    public function actionStarttime() {
        $model = new Transaction();
        $start = $model->startbid();
if($start=="")
{
return "false";
die;
}
        $currenttime = $model->getCurrenttime();
        if ($currenttime >= $start) {
            echo "true";
        } else {
            echo "false";
        }
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
