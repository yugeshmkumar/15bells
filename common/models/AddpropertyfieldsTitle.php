<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "addpropertyfields_title".
 *
 * @property int $id
 * @property string $field_name
 * @property string $field_title
 * @property string $is_active
 */
class AddpropertyfieldsTitle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addpropertyfields_title';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field_name', 'field_title'], 'required'],
            [['field_title'], 'string'],
            [['field_name'], 'string', 'max' => 50],
            [['is_active'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_name' => 'Field Name',
            'field_title' => 'Field Title',
            'is_active' => 'Is Active',
        ];
    }
}
