<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "revenue".
 *
 * @property int $id
 * @property int $property_id
 * @property int $sales_executive_id
 * @property int $client_id
 * @property int $client_total_amount
 * @property int $client_pending_amount
 * @property string $client_pending_amount_date
 * @property int $owner_id
 * @property int $owner_total_amount
 * @property int $owner_pending_amount
 * @property string $owner_pending_amount_date
 * @property string $created_date
 */
class Revenue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'revenue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_id', 'sales_executive_id', 'client_id', 'owner_id', 'created_date'], 'required'],
            [['property_id', 'sales_executive_id', 'client_id', 'client_total_amount', 'client_pending_amount', 'owner_id', 'owner_total_amount', 'owner_pending_amount'], 'integer'],
            [['client_pending_amount_date', 'owner_pending_amount_date', 'created_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'property_id' => 'Property ID',
            'sales_executive_id' => 'Sales Executive ID',
            'client_id' => 'Client ID',
            'client_total_amount' => 'Client Total Amount',
            'client_pending_amount' => 'Client Pending Amount',
            'client_pending_amount_date' => 'Client Pending Amount Date',
            'owner_id' => 'Owner ID',
            'owner_total_amount' => 'Owner Total Amount',
            'owner_pending_amount' => 'Owner Pending Amount',
            'owner_pending_amount_date' => 'Owner Pending Amount Date',
            'created_date' => 'Created Date',
        ];
    }
}
