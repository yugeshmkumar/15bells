<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "invoice_items".
 *
 * @property int $invoiceitemid
 * @property string $invoiceID
 * @property int $propertyid
 * @property int $payment_id
 * @property int $finyearid
 * @property double $amount
 * @property int $isActive
 * @property string $createdAt
 * @property double $concessionAmount
 * @property string $remarks
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['propertyid', 'payment_id', 'finyearid', 'isActive'], 'integer'],
            [['payment_id', 'amount', 'isActive'], 'required'],
            [['amount', 'concessionAmount'], 'number'],
            [['createdAt'], 'safe'],
            [['invoiceID'], 'string', 'max' => 50],
            [['remarks'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'invoiceitemid' => 'Invoiceitemid',
            'invoiceID' => 'Invoice ID',
            'propertyid' => 'Propertyid',
            'payment_id' => 'Payment ID',
            'finyearid' => 'Finyearid',
            'amount' => 'Amount',
            'isActive' => 'Is Active',
            'createdAt' => 'Created At',
            'concessionAmount' => 'Concession Amount',
            'remarks' => 'Remarks',
        ];
    }
}
