<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phonenumbers".
 *
 * @property integer $id
 * @property string $country_code
 * @property string $phone_no
 * @property string $phonetype
 * @property integer $isdefault
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isActive
 */
class Phonenumbers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phonenumbers';
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
            'country_code' => 'Country Code',
            'phone_no' => 'Phone No',
            'phonetype' => 'Phonetype',
            'isdefault' => 'Isdefault',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isActive' => 'Is Active',
        ];
    }
}
