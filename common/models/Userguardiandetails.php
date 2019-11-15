<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "userguardiandetails".
 *
 * @property integer $id
 * @property integer $userID
 * @property string $title
 * @property string $first_name
 * @property string $middlename
 * @property string $last_name
 * @property string $nationality
 * @property integer $emailid
 * @property integer $mobileid
 * @property string $dob
 * @property string $gender
 * @property string $martial_status
 * @property string $isMinor
 * @property string $relatnshp_with_minor
 * @property string $guardian_name
 * @property string $pan_card_no
 * @property string $adhar_card_no
 * @property string $current_country
 * @property string $current_state
 * @property string $current_city
 * @property string $current_pincode
 * @property string $current_address
 * @property string $permanent_country
 * @property string $permanent_state
 * @property string $permanent_city
 * @property string $permanent_pincode
 * @property string $permanent_address
 * @property integer $isactive
 * @property string $created_at
 * @property string $updated_at
 */
class Userguardiandetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 public $countryverificatn;
	 public $passportno;
	 public $phonetypeprimary;
	 public $phonecodetypeprim;
	 public $phonenumbersprim;
	 public $phonetypesecondary;
	 public $phonecodetypecorres;
	 public $phonenumbersecondary;
	 public $emailtypeprimary;
	 public $emailnumbersprim;
	 public $emailtypesecondary;
	 public $emailnumbersecondary;
	 
	 // public $current_state;
	 // public $current_address;
	 // public $current_city;
	 // public $current_pincode;
	 
	 // public $permanent_address;
	 // public $permanent_state;
	 // public $permanent_city;
	 // public $permanent_pincode;
	 
	 
    public static function tableName()
    {
        return 'userguardiandetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		 [['title', 'gender', 'martial_status', 'relatnshp_with_minor', 'guardian_name', 'current_country', 'current_state', 'current_city', 'permanent_country', 'permanent_state', 'permanent_city'], 'string'],
            [['emailid', 'mobileid', 'isactive'], 'integer'],
            [['title','dob','dob', 'gender','phonetypeprimary','phonenumbersprim','relatnshp_with_minor','phonecodetypeprim','current_address','emailtypeprimary','emailnumbersprim', 'martial_status','first_name','nationality', 'last_name','dob','nationality','current_state', 'current_city', 'current_pincode', 'permanent_country', 'permanent_state', 'permanent_city', 'permanent_pincode','permanent_address'], 'required'],
            [['dob', 'created_at', 'updated_at','middlename','nationality','phonecodetypecorres','userID','phonetypesecondary','phonenumbersecondary','emailtypesecondary','emailnumbersecondary'], 'safe'],
            [['adhar_card_no'],'string', 'min'=>12,'max'=>12],
			[['adhar_card_no'],'match','pattern'=>"/^[1-9][0-9]{0,11}$/"],
			[['current_pincode','permanent_pincode'],'match','pattern'=>"/^[1-9][0-9]{0,5}$/"],
		   // [['first_name', 'last_name', 'pan_card_no', 'adhar_card_no', 'current_pincode', 'permanent_pincode'], 'string', 'max' => 100],
            [['isMinor'], 'string', 'max' => 200],
			[['phonenumbersprim','phonenumbersecondary'], 'string','min'=>10 ,'max' => 10],
			[['first_name','middlename','last_name'],'match','pattern'=>"/^[a-zA-Z'-]+$/"],
			[['first_name','middlename','last_name'],'string','max'=>254],
			[['phonenumbersprim','phonenumbersecondary'] ,'match' ,'pattern' => "%^[789]\d{9}$%"],
            ['pan_card_no' ,'match' ,'pattern' => "%[A-Z]{5}[0-9]{4}[A-Z]{1}%"],
			['pan_card_no','string','max'=>10],
			[['emailnumbersprim','emailnumbersecondary'],'match','pattern' => "/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/"],
			[['emailnumbersprim','emailnumbersecondary'],'string','min' =>6,'max'=>30],
			
			 // [['passportno'], 'required', 'when' => function($model) {
                  // if($this->nationality != "indiancitizen"){
					  // return 'Required';
				  // }
             // }],
			
			[['passportno'],'string','min'=>12,'max'=>12],
			[['emailnumbersprim','emailnumbersecondary'], 'email']
			
        ];
            
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userID' => Yii::t('app', 'User ID'),
            'title' => Yii::t('app', 'Title'),
            'first_name' => Yii::t('app', 'First Name'),
            'middlename' => Yii::t('app', 'Middlename'),
            'last_name' => Yii::t('app', 'Last Name'),
            'nationality' => Yii::t('app', 'Nationality'),
            'emailid' => Yii::t('app', 'Emailid'),
            'mobileid' => Yii::t('app', 'Mobileid'),
            'dob' => Yii::t('app', 'Dob'),
            'gender' => Yii::t('app', 'Gender'),
            'martial_status' => Yii::t('app', 'Martial Status'),
            'isMinor' => Yii::t('app', 'Is Minor'),
            'relatnshp_with_minor' => Yii::t('app', 'Relatnshp With Minor'),
            'guardian_name' => Yii::t('app', 'Guardian Name'),
            'pan_card_no' => Yii::t('app', 'Pan Card No'),
            'adhar_card_no' => Yii::t('app', 'Adhar Card No'),
            'current_country' => Yii::t('app', 'Current Country'),
            'current_state' => Yii::t('app', 'Current State'),
            'current_city' => Yii::t('app', 'Current City'),
            'current_pincode' => Yii::t('app', 'Current Pincode'),
            'current_address' => Yii::t('app', 'Current Address'),
            'permanent_country' => Yii::t('app', 'Permanent Country'),
            'permanent_state' => Yii::t('app', 'Permanent State'),
            'permanent_city' => Yii::t('app', 'Permanent City'),
            'permanent_pincode' => Yii::t('app', 'Permanent Pincode'),
            'permanent_address' => Yii::t('app', 'Permanent Address'),
            'isactive' => Yii::t('app', 'Isactive'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
