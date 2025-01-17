<?php

namespace frontend\modules\transaction\controllers;

use Yii;
use frontend\modules\transaction\models\Transaction;
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
    public $layout = 'transactionLayout';
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
                        'actions' => ['logout', 'update', 'index', 'create','saverank','createrev','creates', 'getrank','view', 'delete', 'virtual', 'bid','bidrev', 'insertajax','insertajaxrev', 'grid', 'endbid', 'endbidrev','changestatus', 'time', 'showamount', 'checkstatus','checkstatusrev', 'showamount1','seller','maxbidders', 'maxbiddersrev','minraise', 'minraiserev','starttime','ajaxtime','test','test1','test1rev','chat','chatrev','dynamic','dynamicrev','winnerscreen','notificationtime','notificationtimerev','getactiveuser','customsound','property','leavebrowser'],
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
    public function actionIndex() {
			$checkmyrolemod = \backend\models\BackMode::checkrole(yii::$app->user->identity->id,"moderator");
		$checkmyrolepm = \backend\models\BackMode::checkrole(yii::$app->user->identity->id,"property_manager");
		if($checkmyrolemod){
			$this->layout = "moderator_layout";
		} else if($checkmyrolepm){
			$this->layout = "pmanager_layout";
		}
        $model = new Transaction();

        //   $model->actionAlias('rahul shar');
$vr_setup = \common\models\VrSetup::find()->where(['id'=>$_GET['id']])->one();
		 if($vr_setup){
           $product = $vr_setup->propertyID;
		 } else {
			 $product = 0;
		 }
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

        $id = $_POST['check'];
        $connection = Yii::$app->getDb();
        $status = $_POST['t1'];

        if ($status == 'a') {
			
 	$model = new Transaction();
             $sql = "update transaction set status='Approved' where id='$id'";
	$model->preapproved($id);
        } else {
            $sql = "update transaction set status='Rejected' where id='$id'";
        }

        $command = $connection->createCommand($sql);
        $command->query();
    }


   public function actionCreate() {
        $model = new Transaction();

       
        $model->product_id = "1";
        $model->buyer_id = Yii::$app->user->identity->id;

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



    public function actionCreates() {
        $model = new Transaction();

       
        $model->product_id = "1";
        $model->buyer_id = Yii::$app->user->identity->id;

         //echo $this->$attribute;die;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', "Bid Placed Sucessfully");

            return $this->redirect(['create', 'id' => $model->id]);
        } else {
            return $this->render('creates', [
                        'model' => $model,
            ]);
        }
    }


    public function actionCreaterev() {
        $model = new Transaction();

       
        $model->product_id = "1";
        $model->buyer_id = Yii::$app->user->identity->id;

         //echo $this->$attribute;die;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', "Bid Placed Sucessfully");

            return $this->redirect(['createrev', 'id' => $model->id]);
        } else {
            return $this->render('createrev', [
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


    public function actionLeavebrowser() {
	$connection = Yii::$app->getDb();
	$pid = $_GET['id'];
 	$loggedin=Yii::$app->user->identity->id;
        $date=strtotime(date("Y-m-d H:i:s"));
 	$amt=" update  activeuser_bid set checklastlogin='$date' where userid='$loggedin' and  propertyid=$pid";
        $command_get = $connection->createCommand($amt);
        $result_chk = $command_get->query();   
    }



    public function actionCustomsound() {
       $id = $_GET['id'];
$loggedin=Yii::$app->user->identity->id;
        $model = new Transaction();
  $sql="select count(c.id) as cid,c.message ,u.username as user from chat_history c inner join user u  on  c.send_by=u.id where c.property_id=$id;";
$connection = Yii::$app->getDb();
$command = $connection->createCommand($sql);
$result = $command->queryOne();
return $result['cid'];
    }


    public function actionProperty() {


  $model = new Transaction();
        return $this->render('property', [ 'model' => $model,]);
    }


    public function actionBid() {
         $connection = Yii::$app->getDb();

        $time = date("Y-m-d H:i:s");
     $vr_setup = \common\models\VrSetup::find()->where(['propertyID'=>$_GET['id']])->one();
		 if($vr_setup){
           //$product = $vr_setup->propertyID;
             

		 }
                 $product = $_GET['id'];
		
		 $sql1="select max(bid_amount) as bid_amount from transaction where product_id='$product' and status='Approved'";
		  $command_get = $connection->createCommand($sql1);
        $result_chk = $command_get->queryOne();
         $bid = $result_chk['bid_amount'];
		
		
		 $sql2="select max(expected_price) as expected_price,max(asking_rental_price) as asking_rental_price,property_for from addproperty where id='$product'";		 
        $command_get1 = $connection->createCommand($sql2);
        $result_chk1 = $command_get1->queryOne();

        
        if($result_chk1['property_for'] == 'sale'){

                $r_res1 = $result_chk1['expected_price'];

          }else{

                $r_res1 = $result_chk1['asking_rental_price'];
             }

                $taxRate=20;
                $tax=$r_res1*$taxRate/100;
                $total=$r_res1-$tax;


        // $r_res1 = $result_chk1['bid_amount'];
		
		if($bid>$r_res1)
		{
       // return $r="Current Bid-".$bid;
            $data['text'] =  'Current Bid';
            $data['price'] =  $bid;
            header('Content-Type: application/json');
            return json_encode($data,JSON_PRETTY_PRINT);
		}
		else
		{
            $data['text'] =  'Starting Price';
            $data['price'] =  $r_res1;
            header('Content-Type: application/json');
            return json_encode($data,JSON_PRETTY_PRINT);

			//return $r="Reserved Price-".$r_res1;
		}
    }





    public function actionBidrev() {
        $connection = Yii::$app->getDb();

       $time = date("Y-m-d H:i:s");
    $vr_setup = \common\models\VrSetup::find()->where(['id'=>$_GET['id']])->one();
        if($vr_setup){
          //$product = $vr_setup->propertyID;
            

        }
                $product = $_GET['id'];
                $brandid = $_GET['brandid'];
       
        $sql1="select min(bid_amount) as bid_amount from transaction where product_id='$brandid' and vr_id='$product' and status='Approved'";
         $command_get = $connection->createCommand($sql1);
       $result_chk = $command_get->queryOne();
        $bid = $result_chk['bid_amount'];
       
        
        $sql2="select reserved_price from vr_setup where id='$product'";		 
       $command_get1 = $connection->createCommand($sql2);
       $result_chk1 = $command_get1->queryOne();
      

               $r_res1 = $result_chk1['reserved_price'];
            


       // $r_res1 = $result_chk1['bid_amount'];
       if($bid){
       if($bid<$r_res1)
       {
      // return $r="Current Bid-".$bid;
           $data['text'] =  'Current Bid';
           $data['price'] =  $bid;
           header('Content-Type: application/json');
           return json_encode($data,JSON_PRETTY_PRINT);
       }
       else
       {
           $data['text'] =  'Reserved Price';
           $data['price'] =  $r_res1;
           header('Content-Type: application/json');
           return json_encode($data,JSON_PRETTY_PRINT);

           //return $r="Reserved Price-".$r_res1;
       }
    }else{

        $data['text'] =  'Reserved Price';
        $data['price'] =  $r_res1;
        header('Content-Type: application/json');
        return json_encode($data,JSON_PRETTY_PRINT);
    }

       
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
     
/*$sql="select max(t.bid_amount) as bidder,u.username,t.status from transaction t inner join user u on u.id=t.buyer_id where t.status='Winner' group by buyer_id
union
select max(t.bid_amount) as bidder,u.username,t.status from transaction t inner join user u on u.id=t.buyer_id where t.status='Approved' group by buyer_id";
*/
$sql="select max(bid_amount) as bidder,t.product_id,t.end_rank,t.buyer_id,t.status,t.bid_date,u.username from transaction t inner join user u on u.id=t.buyer_id where (t.status='Approved' or t.status='Winner') and product_id=$pid group by t.buyer_id";   

$dataProvider = new SqlDataProvider([ 'sql' => $sql]);

  return $this->render('endtime', [
            'dataProvider' => $dataProvider,
        ]);
    }




    public function actionEndbidrev() {

        $model = new Transaction();
        $pid = $_GET['id'];
        $brandid = $_GET['brandid'];
    //     $getwinnerid="select id from transaction where bid_amount = (select max(bid_amount) as bid_amount from transaction where status='Approved' and product_id='$pid') ";
    //      $connection = Yii::$app->getDb();
    //       $command = $connection->createCommand($getwinnerid);
    //       $result = $command->queryOne();
    //        $id= $result['id'];
    //   if($id!=""){
    //    $sql = "update transaction set status='Winner' where id =$id";
    //   $command = $connection->createCommand($sql);
    //   $result = $command->query();
    //   }
           
      /*$sql="select max(t.bid_amount) as bidder,u.username,t.status from transaction t inner join user u on u.id=t.buyer_id where t.status='Winner' group by buyer_id
      union
      select max(t.bid_amount) as bidder,u.username,t.status from transaction t inner join user u on u.id=t.buyer_id where t.status='Approved' group by buyer_id";
      */
      $sql="select min(bid_amount) as bidder,t.buyer_id,t.product_id,t.status,t.bid_date,u.username from transaction t inner join user u on u.id=t.buyer_id where t.status='Approved'  and t.product_id=$brandid and t.vr_id=$pid group by t.buyer_id";   
      
      $dataProvider = new SqlDataProvider([ 'sql' => $sql]);
      
        return $this->render('endtimerev', [
                  'dataProvider' => $dataProvider,
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



    public function actionMaxbidders() {
		 $pid = $_GET['id'];
		   $vrroomID = \common\models\VrSetup::find()->where(['propertyID'=>$pid ,'isactive'=>1])->one();
		   $vrID = $vrroomID->id;
        $connection = Yii::$app->getDb();
$loggedin=Yii::$app->user->identity->id;
        $model = new Transaction();
       // $sql = "select t.bid_amount as bidder,u.aliasname,u.partcipantID from transaction t inner join auction_participants u on u.partcipantID=t.buyer_id and u.vr_roomID =$vrID ";
$sql="select t.bid_amount as bidder,u.aliasName as aliasname,u.userid as partcipantID from transaction t inner join activeuser_bid u on u.userid=t.buyer_id and u.propertyid=t.product_id where u.propertyid =$pid";
         $connection = Yii::$app->getDb();
        $command_get = $connection->createCommand($sql);
        $query = $command_get->queryAll();
        $countrow = count($query);
        if ($countrow > 0) {
//             echo "<table style=color:white;width:210px; border='1' >
// <tr>
// <td align=center> <b>User Name</b></td>
// <td align=center><b>Bid Amount</b></td>";
//             for ($i = 0; $i < $countrow; $i++) {
//                 $bidamount = $query[$i]['bidder'];
// 				$alis=$query[$i]['aliasname'];
// 		$partp_id=$query[$i]['partcipantID'];
// if($partp_id==$loggedin){
// $alis='Me';
// }

//                 echo "<tr>";
//                 echo "<td align=center>$alis</td>";
//                 echo "<td align=center>$bidamount</td>";

//                 echo "</tr>";
//             }
//             echo "</table>";die;
        return json_encode($query);
        }else{
            return 'no';
        }
    }



    public function actionMaxbiddersrev() {
        $pid = $_GET['id'];
        $brandid = $_GET['brandid'];
          $vrroomID = \common\models\VrSetup::find()->where(['id'=>$pid ,'isactive'=>1])->one();
          $vrID = $vrroomID->id;
       $connection = Yii::$app->getDb();
$loggedin=Yii::$app->user->identity->id;
       $model = new Transaction();
      // $sql = "select t.bid_amount as bidder,u.aliasname,u.partcipantID from transaction t inner join auction_participants u on u.partcipantID=t.buyer_id and u.vr_roomID =$vrID ";
$sql="select t.bid_amount as bidder,u.aliasName as aliasname,u.userid as partcipantID from transaction t inner join activeuser_bid u on u.userid=t.buyer_id and u.propertyid=t.product_id where u.propertyid =$brandid and  u.vr_id =$pid";
        $connection = Yii::$app->getDb();
       $command_get = $connection->createCommand($sql);
       $query = $command_get->queryAll();
       $countrow = count($query);
       if ($countrow > 0) {

       return json_encode($query);
       }else{
           return 'no';
       }
   }



public function actionGetactiveuser(){
	$connection = Yii::$app->getDb();
       $pid = $_GET['id'];
        $time = date("Y-m-d H:i:s");
      //  $amt = "select count(*) as active_users from transaction where product_id=$pid";
	//   $amt = "select count(userid) active_users from activeuser_bid where propertyid=$pid";
	$amt=" select count( distinct userid) active_users from activeuser_bid where  propertyid=$pid";
        $command_get = $connection->createCommand($amt);
        $result_chk = $command_get->queryOne();
        return $r_res = $result_chk['active_users'];
}


public function actionGetrank(){

	 $connection = Yii::$app->getDb();
       $pid = $_GET['id'];
       $loggedin=Yii::$app->user->identity->id;

      
	$amt="select * from (select (@row_number:=@row_number+1) AS row_number , id,buyer_id,bid_amount,bid_date,product_id from (select * from ( select * from transaction  where product_id=$pid order by bid_amount desc, bid_date asc ) as pub  group by buyer_id order by bid_amount desc, bid_date asc ) as tub, (SELECT @row_number:=0) AS t) as z   where buyer_id=$loggedin and product_id=$pid order by row_number asc";
   
    $command_get = $connection->createCommand($amt);
        $result_chk = $command_get->queryAll();
       if($result_chk){
          
    return $result_chk[0]['row_number'];

       }else {
           
           return 0;
       }
        // where buyer_id= $loggedin and where propertyid=$pid" limit 1
}


public function actionSaverank(){

      $connection = Yii::$app->getDb();
       $pid = $_GET['id'];
       $loggedin=Yii::$app->user->identity->id;

      
       $amt="select * from (select (@row_number:=@row_number+1) AS row_number , id,buyer_id,bid_amount,bid_date,product_id from (select * from ( select * from transaction  where product_id=$pid order by bid_amount desc, bid_date asc ) as pub  group by buyer_id order by bid_amount desc, bid_date asc ) as tub, (SELECT @row_number:=0) AS t) as z   where buyer_id=$loggedin and product_id=$pid order by row_number asc";
   
       $command_get = $connection->createCommand($amt);
           $result_chk = $command_get->queryAll();
          if($result_chk){
          
        $rank = $result_chk[0]['row_number'];

        $amt = "update transaction set end_rank=$rank where buyer_id=$loggedin and product_id=$pid";
        $command_gets = $connection->createCommand($amt);
       if($command_gets->query()){
           return 1;
       }
       }else {
           
           return 0;
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

	
	public function actionChat() {
        $model = new Transaction();
$pid=$_GET['pid'];

$chat=$_POST['chat'];
$id=$_POST['id'];
date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
$send=Yii::$app->user->identity->id;
  $sql="insert into chat_history(send_by,message,sent_to,sent_date,property_id) values ($send,'$chat','$id','$date','$pid')";
 $connection = Yii::$app->getDb();
$command = $connection->createCommand($sql);
$result = $command->query();
     
    }




    public function actionChatrev() {
        $model = new Transaction();
$pid=$_GET['pid'];
$brandid=$_GET['brandid'];

$chat=$_POST['chat'];
$id=$_POST['id'];
date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
$send=Yii::$app->user->identity->id;
  $sql="insert into chat_history(send_by,message,sent_to,sent_date,property_id,vr_id) values ($send,'$chat','$id','$date','$brandid','$pid')";
 $connection = Yii::$app->getDb();
$command = $connection->createCommand($sql);
$result = $command->query();
     
    }







public function actionDynamic() {
$id=$_GET['id'];
$loggedin=Yii::$app->user->identity->id;
        $model = new Transaction();
 // $sql="select c.id,c.message ,u.username as user from chat_history c inner join user u  on  c.send_by=u.id where c.property_id=$id and sent_to='$loggedin' or sent_to='0';";
     $sql="select c.id,c.message ,u.username as user from chat_history c inner join user u  on  c.send_by=u.id where c.property_id=$id and sent_to='$loggedin' or sent_to='0' or send_by='$loggedin'";
$connection = Yii::$app->getDb();
$command = $connection->createCommand($sql);
$result = $command->queryAll();
// foreach($result as $row)
// {

// $user=$row['user'];
// echo $user."-".$row['message'];
// echo "<br/>";

// } exit();

return json_encode($result);
}





public function actionDynamicrev() {
    $id=$_GET['id'];
    $vrid=$_GET['vrid'];
    $loggedin=Yii::$app->user->identity->id;
            $model = new Transaction();
     // $sql="select c.id,c.message ,u.username as user from chat_history c inner join user u  on  c.send_by=u.id where c.property_id=$id and sent_to='$loggedin' or sent_to='0';";
         $sql="select * from (select c.id,c.message ,c.sent_date,u.username as user from chat_history c inner join user u  on  c.send_by=u.id where c.property_id=$vrid and c.vr_id='$id' and  c.send_by='$loggedin'
         
         Union
         select c.id,c.message ,c.sent_date,u.username as user from chat_history c inner join user u  on  c.send_by=u.id where c.property_id=$vrid and c.vr_id='$id' and  c.sent_to='$loggedin' 
         Union
         select c.id,c.message ,c.sent_date,u.username as user from chat_history c inner join user u  on  c.send_by=u.id where c.property_id=$vrid and c.vr_id='$id' and  c.sent_to=0 
         
         )  
         a  order by sent_date asc
         ";
    $connection = Yii::$app->getDb();
    $command = $connection->createCommand($sql);
    $result = $command->queryAll();
    // foreach($result as $row)
    // {
    
    // $user=$row['user'];
    // echo $user."-".$row['message'];
    // echo "<br/>";
    
    // } exit();
    
    return json_encode($result);
    }
	
	

    public function actionMinraise() {
        $model = new Transaction();		
		$id=$_GET['id'];	
       return $minraise= $model->getMinraise($id);	  
   //     $model->buyer_id = Yii::$app->user->identity->id;
    //    $model->product_id = "1";
       
    }


    public function actionMinraiserev() {
        $model = new Transaction();		
		$id=$_GET['id'];	
		$brandid=$_GET['brandid'];	
       return $minraise= $model->getMinraiserev($id,$brandid);	  
   //     $model->buyer_id = Yii::$app->user->identity->id;
    //    $model->product_id = "1";
       
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
     
        $vr_setup = \common\models\VrSetup::find()->where(['propertyID'=>$_GET['id']])->one();
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        if($vr_setup){
        $product = $vr_setup->propertyID;
        } else {
        $product =  1;
        }
        $model = new Transaction();
        //New Added
        $id=$_GET['id'];

        $last_approved_buyer= $model->Checkcontionousbid($product);
        $current=Yii::$app->user->identity->id;

        if($last_approved_buyer == $current){
        
        echo "You are the latest bidder";die;
        return false;
        }
        
        $minimumraise=$model->getMinamountraise($id);     
        
        $model->product_id = $id;
        $model->buyer_id = Yii::$app->user->identity->id;
        $model->bid_amount = $_POST['bid'];
        $model->bid_date = $date;
        $amt = $_POST['bid'];
        
        //262.5>263  --false
        if(($minimumraise>$amt))
        {
        echo "Minumum Raise is 5%";die;
        return false;
        }
        
        
        
        $dbtime = $model->getTime($id);
        $currtime = $model->getCurrenttime();
        if ($currtime > $dbtime) {
        echo "You cannot place bid now";
        die;
        }
        
        $max_db_bid = $model->checkbid($product);
        if ($amt < $max_db_bid) {
        echo "Add Higher Bid";
        die; 
        }
        
        
        $stat = $model->getuserstatus($id);
        
        if($stat==""){

        $model->status = 'Approved';
        $model->bid_date = $date;
        if($model->save())
        {
        return  "Bid Placed Successfully";
        }
        else
        {
        return "Add Higher Bid";
        }
        }
        
        
        if ($stat == "Approved") {
        
            $model->status = 'Approved';
            $model->bid_date = $date;
        if ($model->save()) {

        $stat = $model->getuserstatus($id);

        return "Bid Placed Successfully";
        } else {
        return "Please add Higher Bid";
        }
        } 
        
        
        else if($stat == "Pending")
        {
        return "Your previous Bid is Pending";
        }
        
        
        
        else {
        if ($amt > $max_db_bid) {

            $model->status = 'Approved';
            $model->bid_date = $date;
        $model->save();
        return "Bid Placed";
        }
        return "Please Add Higher Bid than Current";
        }
        
        
        
        }

        

    public function actionInsertajaxrev() {

            $connection = Yii::$app->getDb();
            $vr_setup = \common\models\VrSetup::find()->where(['id'=>$_GET['id']])->one();
            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s');

            if($vr_setup){
            $product = $vr_setup->brandID;
            $reserved_price = $vr_setup->reserved_price;
            } else {
            $product =  1;
            }
            $model = new Transaction();
            //New Added
            $id=$_GET['id'];
            $last_approved_buyer= $model->Checkcontionousbid($product);
            $current=Yii::$app->user->identity->id;
            if($last_approved_buyer==$current){

            echo "You are the latest bidder";die;
            return false;
            }

            $minimumraise=$model->getMinamountraise($id);     

            $model->product_id = $product;
            $model->vr_id = $_GET['id'];
            $model->buyer_id = Yii::$app->user->identity->id;
            $model->bid_amount = $_POST['bid'];
            $model->bid_date = $date;
            $model->status = 'Approved';
            $amt = $_POST['bid'];

            //262.5>263  --false
            if(($minimumraise>$amt))
            {
            echo "Minumum Raise is 5%";die;
            return false;
            }



            $dbtime = $model->getTimerev($id);
            $currtime = $model->getCurrenttime();
            if ($currtime > $dbtime) {
            echo "You cannot place bid now";
            die;
            }

            $max_db_bid = $model->checkbidrev($product,$id);


            if ($max_db_bid && $amt > $max_db_bid) {
            echo "Add Lower Bid";
            die; 
            }

            $max_db_bid = $model->checkbidrev($product,$id);
            if ($max_db_bid && $amt == $max_db_bid) {
            echo "Add Lower Bid";
            die; 
            }


            $stat = $model->getuserstatusrev($product,$id);

            if($stat=="" && $amt < $reserved_price){
            if($model->save())
            {
            return  "Bid Placed Successfully";
            }
            else
            {
            return "Add Lower Bid";
            }
            }


            if ($stat == "Approved") {

            if ($model->save()) {
            $stat = $model->getuserstatusrev($product,$id);
            return "Bid Placed Successfully";
            } else {
            return "Please add Lower Bid";
            }
            } 


            else if($stat == "Pending")
            {
            return "Your previous Bid is Pending";
            }


            else {
            if ($max_db_bid && $amt < $max_db_bid) {
            $model->save();
            return "Bid Placed";
            }
            return "Please Add Smaller Bid than Current";
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
            $model = new Transaction();
            $pid = $_GET['id'];
         $time = $model->gettime($pid);
        $db= date('F j, Y g:i:s A', strtotime($time));
        $r='"';
        
        
        $db=$r.$db.$r;
              
        
         return $db;
    }

    public function actionTest1rev(){
        $model = new Transaction();
         $pid = $_GET['id'];
     $time = $model->gettimerev($pid);
    $db= date('F j, Y g:i:s A', strtotime($time));
    $r='"';
    
    
    $db=$r.$db.$r;
          
    
     return $db;
}




    public function actionShowamount() {
        $model = new Transaction();
		$pid = $_GET['id'];
       $amt = $model->getWordinamount($pid);
        return $amountinwords = $model->getWords($amt);
    }

    public function actionCheckstatus() {
		$vrsetup = \common\models\VrSetup::find()->where(['id'=>$_GET['id']])->one();
		if($vrsetup){
			$pid = $vrsetup->propertyID;
		} else {
			$pid = 1;
		}
        $model = new Transaction();
        $stat = $model->getuserstatus($_GET['id']);
            if($stat!=""){
            if($stat=="Preapproved"){
                return $statu = "Place Bid Higher";
            } else{   
        return $statu = "Your Last Bid has been" . "-" . $stat;
            }
       }
    }


    public function actionCheckstatusrev() {
		$vrsetup = \common\models\VrSetup::find()->where(['id'=>$_GET['id']])->one();
		if($vrsetup){
			$pid = $vrsetup->propertyID;
		} else {
			$pid = 1;
		}
        $model = new Transaction();
        $stat = $model->getuserstatusrev($_GET['brandid'],$_GET['id']);
            if($stat!=""){
            if($stat=="Preapproved"){
                return $statu = "Place Bid Higher";
            } else{   
        return $statu = "Your Last Bid has been" . "-" . $stat;
            }
       }
    }

    public function actionTime() {
		$pid = $_GET['id'];
        $connection = Yii::$app->getDb();
        $model = new Transaction();
        $currtime = $model->getCurrentactivetime(); //It adds minutes from current time

        $time = $_POST['time'];
	$startbid = $_POST['bidtime'];
        $add = $model->getAddminutes($time,$startbid,$pid); //It adds total minutes to the database time
        $schedule_time = $_POST['t1'];
//
        /*
          $t1 = '+' . $time . " minutes";         //It adds total minutes to the current time
          $add = date($currtime, strtotime($t1));
          // */
        $amt = "update vr_setup set fromdatetime='$schedule_time', todatetime='$add',startbidtime='$startbid'";
        $command_get = $connection->createCommand($amt);
        $command_get->query();
    }


  public function actionStarttime() {
	  $pid = $_GET['id'];
        $model = new Transaction();
        $start = $model->startbid($pid);
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

   public function actionNotificationtime() {
        $pid = $_GET['id'];
        $model = new Transaction();
      return   $left = $model->getTimealert($pid);
    }

    public function actionNotificationtimerev() {
        $pid = $_GET['id'];
        $brandid = $_GET['brandid'];
        $model = new Transaction();
      return   $left = $model->getTimealertrev($pid,$brandid);
    }

}
