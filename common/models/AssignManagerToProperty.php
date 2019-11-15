<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assign_manager_to_property".
 *
 * @property integer $id
 * @property integer $propertyID
 * @property integer $managerID
 * @property string $assigned_at
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class AssignManagerToProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assign_manager_to_property';
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
            'id' => 'ID',
            'propertyID' => 'Property ID',
            'managerID' => 'Manager ID',
            'assigned_at' => 'Assigned At',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
