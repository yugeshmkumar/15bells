<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "property_type".
 *
 * @property integer $id
 * @property string $undercategory
 * @property string $typename
 * @property string $typedescr
 * @property string $temp1
 * @property string $temp2
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class PropertyType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['undercategory', 'typename', 'typedescr', 'temp1', 'temp2'], 'string'],
            [['typename'], 'required'],
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
            'undercategory' => 'Undercategory',
            'typename' => 'Typename',
            'typedescr' => 'Typedescr',
            'temp1' => 'Temp1',
            'temp2' => 'Temp2',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
