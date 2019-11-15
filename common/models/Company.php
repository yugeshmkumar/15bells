<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $logo
 * @property string $name
 * @property string $PAN_card_no
 * @property string $COI_number
 * @property string $description
 * @property string $main_email
 * @property string $main_mobile
 * @property integer $userid
 * @property string $main_address
 * @property string $company_type
 * @property string $state
 * @property string $city
 * @property string $location
 * @property string $lat
 * @property string $lng
 * @property string $country
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
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
            'logo' => 'Logo',
            'name' => 'Company Name',
            'PAN_card_no' => 'Pan Card No',
            'COI_number' => 'Certificate Of Incorporation Number',
            'description' => 'About Company',
            'main_email' => 'Contact E-mail',
            'main_mobile' => 'Contact Number',
            'userid' => 'Userid',
            'main_address' => 'Address',
            'company_type' => 'Company Type',
            'state' => 'State',
            'city' => 'City',
            'location' => 'Pin Code',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'country' => 'Country',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
