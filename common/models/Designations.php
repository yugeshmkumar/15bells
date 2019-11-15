<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "designations".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $company
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Designations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description', 'company'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['isactive'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'company' => 'Company',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
