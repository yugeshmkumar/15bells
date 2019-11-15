<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "property_messages".
 *
 * @property integer $id
 * @property integer $property_id
 * @property integer $user_id
 * @property integer $assigned_to_id
 * @property integer $lead_id
 * @property string $message
 * @property string $created_date
 */
class PropertyMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['property_id', 'user_id', 'message', 'created_date'], 'required'],
            [['property_id', 'user_id', 'assigned_to_id', 'lead_id'], 'integer'],
            [['message'], 'string'],
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
            'property_id' => 'Property ID',
            'user_id' => 'User ID',
            'assigned_to_id' => 'Assigned To ID',
            'lead_id' => 'Lead ID',
            'message' => 'Message',
            'created_date' => 'Created Date',
        ];
    }
}
