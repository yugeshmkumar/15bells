<?php

namespace backend\modules\transaction\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "transaction".
 *
 * @property integer $id
 * @property integer $buyer_id
 * @property integer $product_id
 * @property integer $bid_amount
 * @property string $bid_date
 * @property string $status
 *
 * @property User $buyer
 */
 
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['buyer_id', 'product_id', 'bid_amount'], 'required'],
			['bid_amount','checkmaxandminvalues'],
            [['buyer_id', 'product_id', 'bid_amount'], 'integer'],
            [['bid_date'], 'safe'],
            [['status'], 'string'],
           // [['buyer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['buyer_id' => 'id']],
        ];
    }

	
	
public function checkmaxandminvalues($attribute, $params)
{
	
	$id = $_GET['id'];
	
	$connection = Yii::$app->getDb();
 $amt="select max(bid_amount) as bid_amount
from 
(
select max(bid_amount) as bid_amount from transaction where product_id=$id and status='Approved'
union all
select max(reserved_price) as bid_amount from product_details where product_id=$id
) as p";
$command_get = $connection->createCommand($amt);
$result_chk = $command_get->queryOne();
 $r_res=$result_chk['bid_amount'];
	
if( $this->$attribute<$r_res)
    //Here you do your validation logic
    {
        $this->addError('bid_amount', 'Bid  should not be greater than Current Bid');
    }
   
}
		
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buyer_id' => 'Buyer ID',
            'product_id' => 'Product ID',
            'bid_amount' => 'Bid Amount',
            'bid_date' => 'Bid Date',
            'status' => 'Status',
        ];
    }


	public function getMaxprice($str)
	{
		$connection = Yii::$app->getDb();
		 $amt="select max(bid_amount) as bid_amount
from 
(

select max(bid_amount) as bid_amount from transaction where product_id=$str and status='Approved'
union all
select max(reserved_price) as bid_amount from product_details where product_id=$str
) as p";
$command_get = $connection->createCommand($amt);
$result_chk = $command_get->queryOne();
return $r_res=$result_chk['bid_amount'];
		
    }
    

    public function getMaxpricerev($str)
	{
		$connection = Yii::$app->getDb();
		 $amt="select reserved_price from vr_setup where id=$str";
$command_get = $connection->createCommand($amt);
$result_chk = $command_get->queryOne();

return $result_chk['reserved_price'];
		
	}



        	public function getWordinamount()
	{
		$connection = Yii::$app->getDb();
		 $amt="select max(bid_amount) as bid_amount
from 
(

select max(bid_amount) as bid_amount from transaction where product_id='1' 
union all
select max(reserved_price) as bid_amount from product_details where product_id='1'
) as p";
$command_get = $connection->createCommand($amt);
$result_chk = $command_get->queryOne();
return $r_res=$result_chk['bid_amount'];
		
	}


	
		public function getGetcount($str)
	{
		$connection = Yii::$app->getDb();
		 $count="SELECT count( DISTINCT(buyer_id) ) as total FROM transaction where product_id=$str ";
 $command1 = $connection->createCommand($count);
 $count = $command1->queryOne();



 return  $getcount=$count['total'];

	}
	
	
	

	public function getTime($str)
	{
	$sql="select todatetime from vr_setup where propertyID=$str";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $time= $result['todatetime'];
	 return $time= str_replace("-","/",$time);
    }
    

    public function getTimerev($str)
	{
	$sql="select todatetime from vr_setup where id=$str";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $time= $result['todatetime'];
	 return $time= str_replace("-","/",$time);
	}
        
        
        
        public function getBidtime($str)
	{
	$sql="select fromdatetime from vr_setup where propertyID=$str";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $time= $result['fromdatetime'];
	 return $time= str_replace("-","/",$time);
    }
    

    public function getBidtimerev($str)
	{
	$sql="select fromdatetime from vr_setup where brandID=$str";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $time= $result['fromdatetime'];
	 return $time= str_replace("-","/",$time);
	}
        
        

public function startbid()
	{
	$sql="select startbidtime from vr_setup";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $time= $result['startbidtime'];
	 return $time= str_replace("-","/",$time);
	}
        


        
          public function getUsertype()
	{
     $chk_user=Yii::$app->user->identity->id; 
    // $sql="select user_type_id as type from user where id='$chk_user'";
   // $connection = Yii::$app->getDb();
   // $command = $connection->createCommand($sql);
   // $result = $command->queryOne();
  return   $type= 19;//$result['type'];
	}

	public function getCurrenttime()
	{
	  $time=date("Y-m-d H:i:s");
        return $time= str_replace("-","/",$time);
	}



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyer()
    {
        return $this->hasOne(User::className(), ['id' => 'buyer_id']);
    }
    
  
       public function getUserstatus($pid)
	{
     $chk_user=Yii::$app->user->identity->id; 
   $sql="select status from transaction where buyer_id=$chk_user and product_id = $pid order by id desc limit 0,1";
   $connection = Yii::$app->getDb();
   $command = $connection->createCommand($sql);
   $result = $command->queryOne();
    return $type= $result['status'];

	}



 public function checkbid()
	{
     $chk_user=Yii::$app->user->identity->id; 
   $sql="select max(bid_amount) as maxbid from transaction where status='Approved' and buyer_id!=$chk_user";
  $connection = Yii::$app->getDb();
   $command = $connection->createCommand($sql);
   $result = $command->queryOne();
    return $type= $result['maxbid'];

	}

 public function preapproved($id,$pid)
	{
    
   $sql="select buyer_id,bid_amount from transaction where id=$id and product_id = $pid";
  $connection = Yii::$app->getDb();
   $command = $connection->createCommand($sql);
   $result = $command->queryOne();
     $buyer_id= $result['buyer_id'];
 $bidamount=$result['bid_amount'];
 $sql1="update transaction set status='Preapproved' where bid_amount<=$bidamount and status='Pending' and product_id = $pid";
  $command = $connection->createCommand($sql1);
  $command->query();

	}


public function getWords($number) {
$model= new Transaction();
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'getWords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . getWords(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . $model->getWords($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = $model->getWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= $model->getWords($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

public function getCurrentactivetime()
	{
	 return "Y-m-d H:i:s";
  
	}
        
        public function getAddminutes($min,$startbid,$pid)
	{
	$sql="select startbidtime from vr_setup where propertyID=$pid";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $time= $result['startbidtime'];
         $sel="select '$startbid' + INTERVAL $min MINUTE as t1";      
         $command = $connection->createCommand($sel);
         $sel= $command->queryOne();
       return  $add= $sel['t1'];
     //   $updatetime="update vr_setup set todatetime='$add'";
      //  $command_get = $connection->createCommand($updatetime);
     //    $command_get->query();
	
	}
          public function getMinusminutes($min,$pid)
	{
	$sql="select fromdatetime from vr_setup where propertyID = $pid";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $time= $result['fromdatetime'];
         $sel="select '$time' - INTERVAL $min MINUTE as t1";      
         $command = $connection->createCommand($sel);
         $sel= $command->queryOne();
       return  $min= $sel['t1'];
     //   $updatetime="update vr_setup set todatetime='$add'";
      //  $command_get = $connection->createCommand($updatetime);
     //    $command_get->query();
	
    }
    

    public function getMinusminutesrev($min,$pid)
	{
	$sql="select fromdatetime from vr_setup where id = $pid";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $time= $result['fromdatetime'];
         $sel="select '$time' - INTERVAL $min MINUTE as t1";      
         $command = $connection->createCommand($sel);
         $sel= $command->queryOne();
       return  $min= $sel['t1'];
     //   $updatetime="update vr_setup set todatetime='$add'";
      //  $command_get = $connection->createCommand($updatetime);
     //    $command_get->query();
	
	}
        
        public function getWinner($pid) {
            $sql="select username from user where id=(Select buyer_id from transaction where bid_amount = (select max(bid_amount) from transaction where status='Approved' and product_id =$pid)) ";
            $connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 return $result['username'];
        }
        
        public function getWinnerid($pid) {
            $sql="select id from user where id=(Select buyer_id from transaction where bid_amount = (select max(bid_amount) from transaction where status='Approved' and product_id =$pid)) ";
            $connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 return $result['id'];
        }

		public function getMinraise(){
$mod=new Transaction();
$sql="select min_raise from vr_setup limit 0,1";
$price= $mod->getMaxprice($str);
$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $min= $result['min_raise'];
	 $min_price=($min*$price)/100;
	return $final=$price+$min_price;

}

public function getTimealert($id)
{
$sql="select todatetime from vr_setup where propertyID=$id";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	  $time= strtotime($result['todatetime']);
  $current=strtotime(date("Y-m-d H:i:s"));
return $lefttime=($time-$current);
}



public function getTimealertrev($id,$brandid)
{
$sql="select todatetime from vr_setup where id=$id";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	  $time= strtotime($result['todatetime']);
  $current=strtotime(date("Y-m-d H:i:s"));
return $lefttime=($time-$current);
}



  public function getAliasname($id,$pid) {
	  $vrroom = \common\models\VrSetup::find()->where(['propertyID'=>$pid,'isactive'=>1])->one();
	  $vid = $vrroom->id;
         //   $sql="select aliasname from auction_participants where partcipantID=$id and vr_roomID =$vid";
$sql="select aliasName as aliasname from activeuser_bid where userid=$id and propertyid=$pid";
            $connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 return $result['aliasname'];
        }

}
