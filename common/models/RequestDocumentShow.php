<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request_document_show".
 *
 * @property integer $id
 * @property integer $request_id
 * @property integer $user_id
 * @property integer $property_id
 * @property string $payment_status
 * @property integer $payable_amount
 * @property integer $status
 * @property string $created_date
 */
class RequestDocumentShow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_document_show';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_id', 'user_id', 'property_id', 'created_date'], 'required'],
            [['request_id', 'user_id', 'property_id', 'payable_amount', 'status'], 'integer'],
            [['payment_status'], 'string'],
            [['created_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
            'user_id' => 'User ID',
            'property_id' => 'Property ID',
            'payment_status' => 'Payment Status',
            'payable_amount' => 'Payable Amount',
            'status' => 'Status',
            'created_date' => 'Created Date',
        ];
    }
}
