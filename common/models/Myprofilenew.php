<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "myprofile".
 *
 * @property integer $id
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property integer $emailid
 * @property integer $mobileid
 * @property string $dob
 * @property string $gender
 * @property string $martial_status
 * @property string $minor
 * @property string $relatnshp_with_minor
 * @property string $guardian_name
 * @property string $pan_card_no
 * @property string $adhar_card_no
 * @property string $current_country
 * @property string $current_state
 * @property string $current_city
 * @property string $current_pincode
 * @property string $permanent_country
 * @property string $permanent_state
 * @property string $permanent_city
 * @property string $permanent_pincode
 * @property integer $isactive
 * @property string $created_at
 * @property string $updated_at
 
 */
 
class Myprofilenew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	
    public static function tableName()
    {
        return 'myprofile';
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
            'title' => 'Title',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'emailid' => 'Emailid',
            'mobileid' => 'Mobileid',
            'dob' => 'Dob',
            'gender' => 'Gender',
			'nationality'=>'nationality',
            'martial_status' => 'Martial Status',
            'isMinor' => 'Minor',
            'relatnshp_with_minor' => 'Relatnshp With Minor',
            'guardian_name' => 'Guardian Name',
            'pan_card_no' => 'Pan Card No',
            'adhar_card_no' => 'Adhar Card No',
            'current_country' => 'Current Country',
            'current_state' => 'Current State',
            'current_city' => 'Current City',
            'current_pincode' => 'Current Pincode',
            'permanent_country' => 'Permanent Country',
            'permanent_state' => 'Permanent State',
            'permanent_city' => 'Permanent City',
            'permanent_pincode' => 'Permanent Pincode',
            'isactive' => 'Isactive',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
