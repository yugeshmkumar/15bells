<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee_config".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property string $location
 * @property integer $role_id
 * @property string $availability
 * @property integer $isactive
 * @property string $created_date
 * @property string $updated_date
 */
class EmployeeConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'location', 'role_id'], 'required'],
            [['employee_id', 'role_id', 'isactive'], 'integer'],
            [['availability'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['location'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'location' => 'Location',
            'role_id' => 'Role ID',
            'availability' => 'Availability',
            'isactive' => 'Isactive',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
