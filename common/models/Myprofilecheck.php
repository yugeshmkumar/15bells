<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "myprofile".
 *
 * @property integer $id
 * @property integer $guardianprofileid
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
 * @property string $countryverificatn
 * @property string $pionumber
 * @property string $ocinumber
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
class Myprofilecheck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 public $countrynewId;
	 public $countrynewIdperman;
	 public $adhar_card_no;
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
            [['guardianprofileid', 'userID', 'emailid', 'mobileid', 'isactive'], 'integer'],
            [['title', 'middlename', 'nationality', 'gender', 'martial_status', 'isMinor', 'relatnshp_with_minor', 'guardian_name', 'countryverificatn', 'pionumber', 'ocinumber', 'current_country', 'current_state', 'current_city', 'current_address', 'permanent_country', 'permanent_state', 'permanent_city', 'permanent_address'], 'string'],
            ['nationality','validateCheck'],
			
            [['dob', 'created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'current_pincode', 'permanent_pincode'], 'string', 'max' => 100],
            [['pan_card_no', 'adhar_card_no'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'guardianprofileid' => Yii::t('app', 'Guardianprofileid'),
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
            'countryverificatn' => Yii::t('app', 'Countryverificatn'),
            'pionumber' => Yii::t('app', 'Pionumber'),
            'ocinumber' => Yii::t('app', 'Ocinumber'),
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
	public function validateCheck()
    {
            if ($this->nationality == "indiancitizen") {
                $this->addError('pan_card_no', Yii::t('frontend', 'PAN Card cannot be blank.'));
				$this->addError('adhar_card_no', Yii::t('frontend', 'Aadhar Card cannot be blank.'));
            }
			if ($this->nationality == "NRI") {
                $this->addError('countryverificatn', Yii::t('frontend', 'Country Identification Number cannot be blank.'));
				$this->addError('passportno', Yii::t('frontend', 'Passport Number cannot be blank.'));
            }
			if ($this->nationality == "OCI") {
                $this->addError('ocinumber', Yii::t('frontend', 'OCI Number cannot be blank.'));
				$this->addError('passportno', Yii::t('frontend', 'Passport Number cannot be blank.'));
            }
			if ($this->nationality == "PIO") {
                $this->addError('pionumber', Yii::t('frontend', 'PIO Number cannot be blank.'));
				$this->addError('passportno', Yii::t('frontend', 'Passport Number cannot be blank.'));
            }
        
    }
}
