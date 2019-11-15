<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property integer $id
 * @property string $description
 * @property string $landmark
 * @property string $country
 * @property string $city
 * @property string $state
 * @property string $pincode
 * @property integer $isdefault
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 * @property string $addresstype
 */
class Addresses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'country', 'city', 'state', 'pincode'], 'required'],
           // [['description', 'landmark', 'country', 'city', 'state', 'addresstype'], 'string'],
           // [['isdefault', 'isactive'], 'integer'],
           // [['created_at', 'updated_at'], 'safe'],
            [['pincode'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'landmark' => 'Landmark',
            'country' => 'Country',
            'city' => 'City',
            'state' => 'State',
            'pincode' => 'Pincode',
            'isdefault' => 'Isdefault',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
            'addresstype' => 'Addresstype',
        ];
    }
}
