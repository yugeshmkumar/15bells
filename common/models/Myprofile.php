<?php

namespace common\models;

use Yii;
use yii\helpers\HtmlPurifier;

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
 
class Myprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	// public $nationality;
	// public $adhar_card_no;
	// public $pan_card_no;
	 public $phonetypeprimary;
	 public $phonenumbersprim;
	  public $phonetypesecondary;
	 public $phonenumbersecondary;
	 public $emailtypeprimary;
	 public $emailnumbersprim;
	  public $emailtypesecondary;
	 public $emailnumbersecondary;
	 
	 public $countrynewId;
	// public $selectcatcorr;
	// public $selectprodcorr;
	// public $pincodecorr;
	// public $corressaddress;
	 
	 public $countrynewIdperman;
	// public $selectcatperman;
	// public $selectprodperman;
	// public $pincodeperman ;
	// public $permanaddress;
	 public $dobg;
	 public $selectcatcorresp;
	 public $selectprodcorresp;
	// public $passportno;
	 public $phonecodetypeprim;
	 public $phonecodetypecorres;
	// public $countryverificatn;
	// public $pionumber;
	// public $ocinumber;
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
			['current_address', 'filter', 'filter' => function ($value) {
                return \yii\helpers\HtmlPurifier::process($value);
            }],
            [['title', 'gender', 'martial_status', 'relatnshp_with_minor', 'guardian_name', 'current_country', 'current_state', 'current_city', 'permanent_country', 'permanent_state', 'permanent_city'], 'string'],
			[['emailid', 'mobileid', 'isactive'], 'integer'],

			
			// [['title','dob','phonetypeprimary','phonecodetypeprim','phonenumbersprim',
			// 'countrynewIdperman','emailtypeprimary','permanent_address','emailnumbersprim',
			// 'current_address','current_country','first_name', 'last_name',
			// 'nationality','current_state', 'current_city', 'current_pincode',], 'required'],
            
		   
			
			[['dob','current_address', 'created_at', 'updated_at','middlename','countryverificatn','phonecodetypecorres','userID','phonetypesecondary','phonenumbersecondary','emailtypesecondary','emailnumbersecondary'], 'safe'],
			
			
			// [['adhar_card_no','pan_card_no'] ,'required','when'=>function($model){
			// 	 return $model->nationality == 'indiancitizen' ;
		    //      	 }, 'whenClient' => "function (attribute, value) {
            //             return $('#nationality').val() == 'indiancitizen';
            //              }"],
            //   [['ocinumber','passportno'] ,'required','when'=>function($model){
			// 	 return $model->nationality == 'OCI' ;
			//   }, 'whenClient' => "function (attribute, value) {
            //    return $('#nationality').val() == 'OCI';
            //     }"],
			// 	[['pionumber','passportno'] ,'required','when'=>function($model){
			// 	 return $model->nationality == 'PIO' ;
			//   }, 'whenClient' => "function (attribute, value) {
            //    return $('#nationality').val() == 'PIO';
            //     }"],
			// 	[['countryverificatn','passportno'] ,'required','when'=>function($model){
			// 	 return $model->nationality == 'NRI' ;
			//   }, 'whenClient' => "function (attribute, value) {
            //    return $('#nationality').val() == 'NRI';
            //     }"],
			//['dob','validateCheck'],

			
			[['adhar_card_no'],'string', 'min'=>12,'max'=>12],
			[['adhar_card_no'],'match','pattern'=>"/^[1-9][0-9]{0,11}$/"],
			[['ocinumber'],'string','min'=>7,'max'=>7],
			[['ocinumber'],'match','pattern'=> "%^[A-Z]{1}\d{6}$%"],
			[['pionumber'],'string','min'=>8,'max'=>8],
			[['pionumber'],'match','pattern'=> "%^[P]{1}\d{7}$%"],
			//[['current_pincode','permanent_pincode'],'match','pattern'=>"/^[1-9][0-9]{0,5}$/"],
		   // [['first_name', 'last_name', 'pan_card_no', 'adhar_card_no', 'current_pincode', 'permanent_pincode'], 'string', 'max' => 100],
            [['isMinor'], 'string', 'max' => 200],
			//[['isMinor'], 'validatorCompareDateTime'],
			[['phonenumbersprim','phonenumbersecondary'], 'string','min'=>6 ,'max' => 254],
			[['first_name','middlename','last_name'],'match','pattern'=>"/^[a-zA-Z'-]+$/"],
			[['first_name','middlename','last_name'],'string','max'=>254],
			[['phonenumbersprim','phonenumbersecondary'] ,'match' ,'pattern' => "/^[1-9][0-9]{0,254}$/"],
            ['pan_card_no' ,'match' ,'pattern' => "%[A-Z]{5}[0-9]{4}[A-Z]{1}%"],
			['pan_card_no','string','max'=>10],
			[['emailnumbersprim','emailnumbersecondary'],'match','pattern' => "/^[a-z0-9A-Z._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/"],
			[['emailnumbersprim','emailnumbersecondary'],'string','min' =>6,'max'=>30],
			
			 // [['passportno'], 'required', 'when' => function($model) {
                  // if($this->nationality != "indiancitizen"){
					  // return 'Required';
				  // } 
             // }],
			
			[['passportno'],'string','max'=>254],
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
			'middlename'=>'Middle Name',
			'phonetypeprimary'=>'Phone Number Type',
			'phonenumbersprim'=>'Primary Number',
			'phonenumbersecondary'=>'Secondary Number',
			'emailtypeprimary'=>'Primary E-mail Type',
			'emailnumbersprim'=>'Primary E-mail',
			'emailnumbersecondary'=>'Secondary E-mail',
			//'corressaddress'=>'Current Address',
			//'selectcatcorr'=>'Current State',
			//'selectprodcorr'=>'Current City',
			//'pincodecorr'=>'Current Pincode',
			//'permanaddress'=>'Permanent Address',
			//'selectcatperman'=>'Permanent State',
			//'selectprodperman'=>'Permanent City',
			//'pincodeperman'=>'Permanent Pincode',
            'emailid' => 'E-mail',
            'mobileid' => 'Mobile',
            'dob' => 'Date Of Birth',
            'gender' => 'Gender',
			'nationality'=>'Nationality',
            'martial_status' => 'Marital Status',
            'isMinor' => 'Minor',
            'relatnshp_with_minor' => 'Relationship With Minor',
            'guardian_name' => 'Guardian Name',
            'pan_card_no' => 'Pan Card No',
			'ocinumber'=>'OCI Number',
			'pionumber'=>'PIO Number',
			'countryverificatn'=> 'Country Identification Number',
			'passportno'=> 'Passport Number',
            'adhar_card_no' => 'Aadhar Card No',
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
	public function validateCheck()
    {
   

$userage =  date_diff(date_create('1970-02-01'), date_create($this->dob))->y;

if($userage < 18){

	$this->addError('dob', Yii::t('frontend', 'Age should be greater than 18.'));
}
     
    }
	
    
    
     public function getEmailaddresses()
    {
        return $this->hasOne(\common\models\Emailaddresses::className(), ['id'=>'emailid']);
    }
	 public function getPhonenumbers()
    {
        return $this->hasOne(\common\models\Phonenumbers::className(), ['id'=>'mobileid']);
    }
	public static function addnewleads_sales($name,$userid,$email,$countrycode,$number,$location)
{             $checkifalready = \common\models\LeadsSales::find()->where(['user_id'=>$userid,'email'=>$email,'number'=>$number,'countrycode'=>$countrycode,'role_id'=>"3",'name'=>$name,'location'=>$location])->one();
	        if(!$checkifalready){
		   $addnewlead = new \common\models\LeadsSales();
	        $addnewlead->user_id = $userid;
            $addnewlead->email =$email;
            $addnewlead->location =$location;
            $addnewlead->role_id ="3";
            $addnewlead->name =$name;
            $addnewlead->countrycode =$countrycode;
            $addnewlead->number =$number;
			$addnewlead->save();
			
			$Leadcurrentstatus = new \common\models\LeadcurrentstatusSales();
			$Leadcurrentstatus->leadid =$addnewlead->id;
			$Leadcurrentstatus->role_id = "3";
			$Leadcurrentstatus->statusid =1;
			$Leadcurrentstatus->leadactionstatus =8;
			$Leadcurrentstatus->special ="yes";
			$Leadcurrentstatus->save();
			//assign CSR
			$listdata_by_location_count = \common\models\EmployeeConfig::find()
		    ->where('(role_id =:roleid OR role_id =:roleid2) and availability =:avail and location =:locate and config =:config',
		    array('roleid'=> 25 ,':roleid2'=>27 ,':avail'=>"yes",':locate'=>$location,':config'=>"sales"))->orderBy('count_leads')->one();
			//if count listdata_by_location_count null means no csr in that location
			if(!$listdata_by_location_count){
				$listdata_by_count = \common\models\EmployeeConfig::find()
		    ->where('(role_id =:roleid OR role_id =:roleid2) and availability =:avail and config =:config',
		    array('roleid'=> 25 ,':roleid2'=>27 ,':avail'=>"yes",':config'=>"sales"))->orderBy('count_leads')->one();
			
			$csr = $listdata_by_count->employee_id;
			
			} else {
				$csr = $listdata_by_location_count->employee_id;
			}
			//assign CSR
			 $trendingadd = \Yii::$app->db->createCommand()->insert('leadassignment_sales', ['leadid'=>$addnewlead->id,'lead_current_status_ID'=>$Leadcurrentstatus->id,'assigned_toID' => $csr ,'assigned_at'=>date('Y-m-d h:i:s')])->execute(); 

			
			}
}
}
