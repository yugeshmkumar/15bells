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
class Companynew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	// public $main_email ;
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
		    // [['main_email', 'main_address','main_mobile', 'state','person_name', 'city', 'location', 'country','PAN_card_no', 'COI_number'], 'required'],
            [['description', 'main_email', 'main_address', 'state', 'city', 'location', 'lat', 'lng', 'country'], 'string'],
            [['userid', 'isactive'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
		    [['person_name'],'match','pattern'=>"/^[a-zA-Z ]*$/"],
		    [['person_name'],'string','max'=>254],
			['PAN_card_no' ,'match' ,'pattern' => "%[A-Z]{5}[0-9]{4}[A-Z]{1}%"],
			[['main_email'],'match','pattern' =>  "/^[a-z0-9A-Z._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/"],
			[['main_email'],'email'],
			[['main_email'],'string','min' =>6,'max'=>30],
			['PAN_card_no','string','max'=>10],
            [['COI_number'], 'string', 'max' => 21,'min'=>21],
			//[['COI_number'],'match','pattern'=>"/^[1-9][0-9]{0,11}$/"],
            [['main_mobile'], 'string', 'max' => 10 ,'min'=>10],
			 [['main_mobile'],'match','pattern'=>"%^[789]\d{9}$%"],
			[['location'],'match','pattern'=>"/^[1-9][0-9]{0,5}$/"],
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
            'person_name' => 'Contact Person Name',
            'PAN_card_no' => 'Pan Card No',
            'COI_number' => 'Certificate Of Incorporation Number',
            'description' => 'About Company',
            'main_email' => 'Contact E-mail',
            'main_mobile' => 'Contact Number',
            'userid' => 'Userid',
            'main_address' => 'Registered Company Address',
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
