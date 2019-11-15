<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shortlistproperty".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $property_id
 * @property string $created_date
 * @property integer $active
 */
class Shortlistproperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shortlistproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'property_id', 'created_date'], 'required'],
            [['user_id', 'property_id', 'active'], 'integer'],
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
            'user_id' => 'User ID',
            'property_id' => 'Property ID',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }
}
