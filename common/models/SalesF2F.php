<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sales_f_2_f".
 *
 * @property integer $id
 * @property integer $buyer_id
 * @property integer $sellor_id
 * @property integer $property_id
 * @property integer $sales_executive_id
 * @property string $meeting_date_time
 * @property string $status
 * @property string $comment
 * @property string $created_date
 */
class SalesF2F extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_f_2_f';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['buyer_id', 'sellor_id', 'property_id', 'sales_executive_id', 'meeting_date_time', 'comment', 'created_date'], 'required'],
            [['buyer_id', 'sellor_id', 'property_id', 'sales_executive_id'], 'integer'],
            [['meeting_date_time', 'created_date'], 'safe'],
            [['status', 'comment'], 'string'],
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
            'sellor_id' => 'Sellor ID',
            'property_id' => 'Property ID',
            'sales_executive_id' => 'Sales Executive ID',
            'meeting_date_time' => 'Meeting Date Time',
            'status' => 'Status',
            'comment' => 'Comment',
            'created_date' => 'Created Date',
        ];
    }
}
