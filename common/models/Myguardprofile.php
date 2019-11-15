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
 
class Myguardprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 public $phonetypeprimary;
	 public $phonenumbersprim;
	  public $phonetypesecondary;
	 public $phonenumbersecondary;
	 public $emailtypeprimary;
	 public $emailnumbersprim;
	  public $emailtypesecondary;
	 public $emailnumbersecondary;
	 
	 public $countrynewId;
	 public $selectcatcorr;
	 public $selectprodcorr;
	 public $pincodecorr;
	 public $corressaddress;
	 
	 public $countrynewIdperman;
	 public $selectcatperman;
	 public $selectprodperman;
	 public $pincodeperman ;
	 public $permanaddress;
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
            [['title', 'gender', 'martial_status', 'relatnshp_with_minor', 'guardian_name', 'current_country', 'current_state', 'current_city', 'permanent_country', 'permanent_state', 'permanent_city'], 'string'],
            [['emailid', 'mobileid', 'isactive'], 'integer'],
            [['title','dob', 'gender','phonetypeprimary','relatnshp_with_minor','phonenumbersprim','permanaddress','pincodeperman','selectcatperman','selectprodperman','countrynewIdperman','emailtypeprimary','emailnumbersprim','countrynewId','selectcatcorr','selectprodcorr','corressaddress','pincodecorr', 'martial_status','first_name','nationality', 'last_name','dob', 'pan_card_no', 'adhar_card_no', 'current_country','nationality','current_state', 'current_city', 'current_pincode', 'permanent_country', 'permanent_state', 'permanent_city', 'permanent_pincode'], 'required'],
            [['dob', 'created_at', 'updated_at','middlename','nationality','userID','guardianprofileid','phonetypesecondary','phonenumbersecondary','emailtypesecondary','emailnumbersecondary'], 'safe'],
            [['first_name', 'last_name', 'pan_card_no', 'adhar_card_no', 'current_pincode', 'permanent_pincode'], 'string', 'max' => 100],
            [['isMinor'], 'string', 'max' => 200],
			[['phonenumbersprim','phonenumbersecondary'], 'string','min'=>10 ,'max' => 10],
			[['emailnumbersprim','emailnumbersecondary'], 'email']
			
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
