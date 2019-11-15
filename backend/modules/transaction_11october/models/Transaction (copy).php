<?php

namespace backend\modules\transaction\models;
use backend\models\User;
use Yii;

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
 * @property User $user
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
            [['buyer_id', 'product_id', 'bid_amount'], 'integer'],
            [['bid_date'], 'safe'],
            [['status'], 'string'],
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
