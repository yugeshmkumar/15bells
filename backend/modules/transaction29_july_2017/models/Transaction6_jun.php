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
            [['buyer_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['buyer_id' => 'id']],
        ];
    }

	
	
public function checkmaxandminvalues($attribute, $params)
{
	$connection = Yii::$app->getDb();
 $amt="select max(bid_amount) as bid_amount
from 
(
select max(bid_amount) as bid_amount from transaction where product_id='1' and status='Approved'
union all
select max(reserved_price) as bid_amount from product_details where product_id='1'
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


	public function getMaxprice()
	{
		$connection = Yii::$app->getDb();
		 $amt="select max(bid_amount) as bid_amount
from 
(

select max(bid_amount) as bid_amount from transaction where product_id='1' and status='Approved'
union all
select max(reserved_price) as bid_amount from product_details where product_id='1'
) as p";
$command_get = $connection->createCommand($amt);
$result_chk = $command_get->queryOne();
return $r_res=$result_chk['bid_amount'];
		
	}
	
		public function getGetcount()
	{
		$connection = Yii::$app->getDb();
		 $count="select count(buyer_id) as total from transaction where product_id='1'";
 $command1 = $connection->createCommand($count);
$count = $command1->queryOne();
 return $getcount=$count['total'];
	}
	
	
	

	public function getTime()
	{
	$sql="select timer from timer";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$result = $command->queryOne();
	 $time= $result['timer'];
	 return $time= str_replace("-","/",$time);
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
}
