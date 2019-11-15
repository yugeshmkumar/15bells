<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "invoice_items".
 *
 * @property integer $invoiceitemid
 * @property string $invoiceID
 * @property string $propertyid
 * @property integer $subdeptitemid
 * @property integer $property_typeid
 * @property integer $finyearid
 * @property double $amount
 * @property integer $isActive
 * @property string $createdAt
 * @property double $concessionAmount
 * @property string $remarks
 */
class InvoiceItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'invoiceitemid' => 'Invoiceitemid',
            'invoiceID' => 'Invoice ID',
            'propertyid' => 'Propertyid',
            'subdeptitemid' => 'Subdeptitemid',
            'property_typeid' => 'Property Typeid',
            'finyearid' => 'Finyearid',
            'amount' => 'Amount',
            'isActive' => 'Is Active',
            'createdAt' => 'Created At',
            'concessionAmount' => 'Concession Amount',
            'remarks' => 'Remarks',
        ];
    }
}
