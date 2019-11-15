<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "15bells_config".
 *
 * @property integer $id
 * @property string $table_name
 * @property string $column_name
 * @property integer $status_value
 * @property string $status_name
 * @property integer $isactive
 * @property string $created_at
 * @property string $updated_at
 */
class 15bellsConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '15bells_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table_name', 'column_name', 'status_name'], 'required'],
            [['table_name', 'column_name', 'status_name'], 'string'],
            [['status_value', 'isactive'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table_name' => 'Table Name',
            'column_name' => 'Column Name',
            'status_value' => 'Status Value',
            'status_name' => 'Status Name',
            'isactive' => 'Isactive',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
