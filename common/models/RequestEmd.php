<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request_emd".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $property_id
 * @property integer $payable_amount
 * @property integer $escrow_account_id
 * @property string $payment_status
 * @property string $created_date
 * @property string $updated_date
 * @property integer $status
 */
class RequestEmd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_emd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'property_id', 'payable_amount', 'escrow_account_id', 'created_date', 'updated_date'], 'required'],
            [['user_id', 'property_id','lessor_id','brandid', 'payable_amount', 'escrow_account_id', 'status'], 'integer'],
            [['payment_status','town_name','sector_name'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'property_id' => 'Property ID',
            'payable_amount' => 'Payable Amount',
            'escrow_account_id' => 'Escrow Account ID',
            'payment_status' => 'Payment Status',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
        ];
    }
}
