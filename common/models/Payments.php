<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property integer $id
 * @property integer $item_number
 * @property string $txn_id
 * @property integer $payment_amount
 * @property string $currency_code
 * @property string $payment_status
 * @property string $created_date
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_number', 'txn_id', 'payment_amount', 'currency_code', 'payment_status', 'created_date'], 'required'],
            [['id', 'item_number', 'payment_amount'], 'integer'],
            [['currency_code', 'payment_status'], 'string'],
            [['created_date'], 'safe'],
            [['txn_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_number' => 'Item Number',
            'txn_id' => 'Txn ID',
            'payment_amount' => 'Payment Amount',
            'currency_code' => 'Currency Code',
            'payment_status' => 'Payment Status',
            'created_date' => 'Created Date',
        ];
    }
}
