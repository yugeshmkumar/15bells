<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "receivables".
 *
 * @property string $invoiceID
 * @property string $invoiceNumber
 * @property integer $userId
 * @property string $paymentStatus
 * @property string $invoiceDate
 * @property string $nextReminder
 * @property string $lastReminder
 * @property string $propertyid
 * @property string $parentInvoiceID
 * @property double $invoiceAmount
 * @property string $description
 * @property string $udf1
 * @property integer $isActive
 * @property string $createdAt
 * @property string $updatedAt
 * @property integer $AYID
 */
class Receivables extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receivables';
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
            'invoiceID' => 'Invoice ID',
            'invoiceNumber' => 'Invoice Number',
            'userId' => 'User ID',
            'paymentStatus' => 'Payment Status',
            'invoiceDate' => 'Invoice Date',
            'nextReminder' => 'Next Reminder',
            'lastReminder' => 'Last Reminder',
            'propertyid' => 'Propertyid',
            'parentInvoiceID' => 'Parent Invoice ID',
            'invoiceAmount' => 'Invoice Amount',
            'description' => 'Description',
            'udf1' => 'Udf1',
            'isActive' => 'Is Active',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'AYID' => 'Ayid',
        ];
    }
}
