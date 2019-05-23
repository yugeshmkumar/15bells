<?php
namespace frontend\modules\user\models;

use common\models\User;
use yii\base\Model;
use Yii;
use yii\db\Query;
use yii\helpers\HtmlPurifier;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
	public $fname;
    public $lname;
    public $email;
    public $password;
    public $iagree;
	public $companyname;
	public $companytype;
	public $countrycode;
    public $checkfor;
    public $otp;
    public $user_login_as;
    public $checkotp;
    public $mobile;
    public $designation;

   
	
       // const REGEX_SPECIAL_CHARS = '';
    const REGEX_SPECIAL_CHARS = "!@#";

    

   // public $regularExpressionPattern = '/.*(?=.*\d)(?=.*[a-zA-Z])(?=.*['.(self::REGEX_SPECIAL_CHARS).']).*/';
    /**
     * @inheritdoc
     */
    public function rules()
    {

        // if(isset($_SESSION['otp'])){
        //     $checkotp = $_SESSION['otp'];
        // }else{
        //     $checkotp = 'zebdsr';  
        // }
       
        return [
		// ['fname','required',
		// 'message' => Yii::t('frontend', 'First Name cannot be blank.')],
            
        //        ['lname','required',
        // 'message' => Yii::t('frontend', 'Last Name cannot be blank.')],

        // ['user_login_as','required',
		// 'message' => Yii::t('frontend', 'User Login as cannot be blank.')],
		
		
           ['username', 'filter', 'filter' => 'trim'],
            // ['username', 'required',
            //    // 'targetClass'=>'\common\models\User',
            //     'message' => Yii::t('frontend', 'Mobile number cannot be blank.')
            // ],
            ['otp','required', 'except' => 'ajaxsignup',
            'message' => Yii::t('frontend', 'OTP cannot be blank.')],
			//['fname', 'match', 'pattern' => '/[^a-zA-Z_-]/',
		// 'message' => Yii::t('frontend', 'Name is Invalid.')
		// ],
		['fname', 'string', 'length' => [0, 254],
		'message' => Yii::t('frontend', 'Full Name should contain at most 254 characters.')],
            
        //         ['lname', 'string', 'length' => [0, 254], 
		// 'message' => Yii::t('frontend', 'Last Name should contain at most 254 characters.')],
	['username', 'string', 'min' => 10, 'max'=>254,'message'=>'Mobile number is invalid.'],
	// ['countrycode', 'string', 'min' => 0, 'max'=>254],
	['username','match','pattern'=>"/^[1-9][0-9]{0,254}$/",'message'=>'Mobile number is invalid.'],
          
    ['username', 'unique',
               'targetClass'=>'\common\models\User',
               'message' => Yii::t('frontend', 'Mobile No. already exist.')
           ],
//['username', 'number', 'min' => 1000000000 ],
         //   ['username', 'integer',
               // 'targetClass'=>'\common\models\User',
              //  'message' => Yii::t('frontend', 'Please enter a valid number'),
         //   ],

	//['companyname', 'required', 
	//'message' => Yii::t('frontend', 'Company name cannot be blank.')],
	
	// [['companyname','email'], 'string', 'max' => 254],

            ['email', 'filter', 'filter' => 'trim'],
           // ['email', 'either', 'params' => ['other' => 'username']],
           // ['email', 'required'],
            ['email', 'email',
			 'message' => Yii::t('frontend', 'Please enter valid email address.')
			],
			
			// ['iagree', 'required', 'when' => function($model) {
            //      return !empty($model->iagree);
            // }],
            ['email', 'unique',
                'targetClass'=> '\common\models\User',
                'message' => Yii::t('frontend', 'This email address already exist.')
            ],
          // ['countrycode','required'],
           // ['password', 'required'],
            // ['password', 'string', 'min' => 6],
                    //['password_new_one', 'match', 'pattern'=>'/.*(?=.*\d)(?=.*[a-zA-Z])(?=.*['.(self::REGEX_SPECIAL_CHARS).']).*/', 'skipOnError'=>true, 'message'=>'Must have at least one letter, number and one special character out of set ['.self::REGEX_SPECIAL_CHARS.']!'],
		//	['companytype', 'required','message' => 'Owner ship cannot be blank.'],
           


         ['otp', 'compare', 'compareAttribute' => 'checkotp', 'operator' => '<>','type' => 'number', 'when' => function($data,$model) {
            return $model->checkotp != $model->otp;
		}, 'whenClient' => "function (attribute, value) {
            return $('#signupform-checkotp').val() != $('#signupform-otp').val();
        }",'message' => Yii::t('frontend', 'OTP doesnot Match .')
        ],
        


            //			['companyname', 'required', 'when' => function($model) {
//                return ($model->companytype != "Individual");
//            }],
// [['companyname'] ,'required','when'=>function($model){
// 				 return $model->checkfor == '2' ;
// 			  }, 'whenClient' => "function (attribute, value) {
//                return $('#checkfor').val() == '2';
//                 }" ,'message' => Yii::t('frontend', 'Company Name cannot be blank.')],

                [['username'] ,'required','when'=>function($model){
                    return $model->email == '' ;
                 }, 'whenClient' => "function (attribute, value) {
                  return $('#signupform-email').val() == '';
                   }" ,'message' => Yii::t('frontend', '')],
                // }" ,'message' => Yii::t('frontend', 'At least 1 of the field must be filled up properl')],



                   [['email'] ,'required','when'=>function($model){
                    return $model->username == '' ;
                 }, 'whenClient' => "function (attribute, value) {
                  return $('#signupform-username').val() == '';
                   }" ,'message' => Yii::t('frontend', '')],


                   
//             //['password', 'match', 'pattern'=>'/\d/', 'message'=>'Password must contain at least one numeric digit.'],
//             //['password', 'match', 'pattern'=>'/\W/', 'message'=>'Password must contain at least one special character.'],
			   
        ];
        //unset($_SESSION['otp']);
    }

    public function either($attribute_name, $params)
    {
        if (empty($this->username) && empty($this->email)) {

            $this->addError($attribute_name, Yii::t('user', 'At least 1 of the field must be filled up properly'));

            return false;
     }

return true;
}

    public function attributeLabels()
    {
        return [
            'username'=>Yii::t('frontend', 'Mobile'),
            'email'=>Yii::t('frontend', 'E-mail'),
            'password'=>Yii::t('frontend', 'Password'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
	 public  function checkloginas($company_type)
	 {
		 $listdata = \common\models\LoginAsConfig::find()
		 ->where(['name'=>$company_type ,'isactive'=>1])->one();
		 return  $listdata;
	 }
    public function signup()
    {


     // echo 'aya';die;
     //echo '<pre>';print_r(Yii::$app->request->post());die;

     $companytype = Yii::$app->request->post()['SignupForm']['companytype'];
     $user_login_as = Yii::$app->request->post()['SignupForm']['user_login_as'];

     
        if ($this->validate()) {
           
            // echo $this->username;die;
            $user = new User();
            if($this->username != ''){
                $user->username = HtmlPurifier::process($this->username);
            }else{
                $user->username = HtmlPurifier::process($this->email);
            }
			
			$user->fullname = HtmlPurifier::process($this->fname);
           // $user->lastname = HtmlPurifier::process($this->lname);
            $user->email = HtmlPurifier::process($this->email);
			//$user->countrycode = $this->countrycode;
            //$user->setPassword($this->password);
            $user->status = 1;
            $user->user_login_as = $user_login_as;
            $user->save();
            $checkLoginAsConfig = $this->checkloginas($companytype);
           
			
			// if($checkLoginAsConfig->login_to == "company"){
			// 	 \common\models\activemode::insertmyfirstcompanydetails($this->companyname,$this->companytype,$user->id);
			// 	 $user->aftercompanySignup();
			// 	 }else {
        $getloginasid = \common\models\activemode::get_my_login_as_id($companytype);
	$UserLoginAs = new \common\models\UserLoginAs();
	$UserLoginAs->user_id = $user->id;
	$UserLoginAs->login_as = $companytype;
	$UserLoginAs->loginasID=$getloginasid;
	$UserLoginAs->save();
            $user->afterSignup();
        // }
            return $user;
        }
        $errors = $this->errors;

      //  echo '<pre>';print_r($errors);die;

        return null;
    }


  public function signup1()
            
    { 
            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->username);
            $user->save(false);
            
           
            $user->afterSubSignup();
            
         
            return $user;
       

    }

    public function addnewlead($name,$userid,$email,$countrycode,$number,$location)

    {            
     $checkifalready = \common\models\Leads::find()->where(['user_id'=>$userid,'email'=>$email,'number'=>$number,'countrycode'=>$countrycode,'role_id'=>"3",'name'=>$name,'location'=>$location])->one();
                if(!$checkifalready){
                $addnewlead = new \common\models\Leads();
            $addnewlead->user_id = $userid;
                $addnewlead->email =$email;
                $addnewlead->location =$location;
                $addnewlead->role_id ="3";
                $addnewlead->name =$name;
                $addnewlead->countrycode =$countrycode;
                $addnewlead->number =$number;
                $addnewlead->save();
                
                $Leadcurrentstatus = new \common\models\Leadcurrentstatus();
                $Leadcurrentstatus->leadid =$addnewlead->id;
                $Leadcurrentstatus->role_id = "3";
                $Leadcurrentstatus->statusid =1;
                $Leadcurrentstatus->leadactionstatus =8;
                $Leadcurrentstatus->special ="yes";
                $Leadcurrentstatus->save();
                //assign CSR
    
                $newleadid = $addnewlead->id;
               $newleadstatus = $Leadcurrentstatus->id;
                $date = date('Y-m-d h:i:s');
    
                 $employecount = \Yii::$app->db->createCommand("SELECT count(*) from company_emp where csr_name='CSR'")->queryAll();
                $findcsr = \Yii::$app->db->createCommand("SELECT * from company_emp where csr_name='CSR' order by alloted asc limit 1")->queryOne();
    $findcsrst = \Yii::$app->db->createCommand("SELECT * from company_emp where csr_name='CSR' order by alloted desc limit 1")->queryOne(); 
               $count = $employecount['0']['count(*)'];
    
                $getallot = $findcsrst['alloted'];
                
                
                
               
                if($getallot == $count){
                
                
    $givezero = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => '0'],'csr_name = "CSR"')->execute();            
                
                $findcsrs = \Yii::$app->db->createCommand("SELECT * from company_emp where csr_name='CSR' order by alloted asc limit 1")->queryOne();  
    $findcsrsd = \Yii::$app->db->createCommand("SELECT * from company_emp where csr_name='CSR' order by alloted desc limit 1")->queryOne();            
                $getallots = $findcsrsd['alloted'];
                $newids = $findcsrs['id'];
                $counters = $getallots + 1;
                
               
    $update = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => $counters],'id = "'.$newids.'"')->execute();
                
            $trendingadd = \Yii::$app->db->createCommand()->insert('leadassignment', ['leadid' => $newleadid, 'lead_current_status_ID' => $newleadstatus, 'assigned_toID' => $newids, 'assigned_at' => $date])->execute();
    
    if($trendingadd){return true;}
    
    
                }else{
                
                $counter = $getallot + 1;
                $newid = $findcsr['id']; 
    
           $updates = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => $counter],'id = "'.$newid.'"')->execute();
    
    
    
                
               $trendingadd = \Yii::$app->db->createCommand()->insert('leadassignment', ['leadid' => $newleadid, 'lead_current_status_ID' => $newleadstatus, 'assigned_toID' => $newid, 'assigned_at' => $date])->execute();
    
    if($trendingadd){return true;}
    
                }
                
                }
    }

    
    public function assignCSR($user_id,$location){       


                $listdata2 = \common\models\EmployeeConfig::find()
		 ->where(['role_id'=> 12])->andwhere(['availability'=>'yes'])->one();
                 $cityname = $listdata2->location;
                 $employee_id = $listdata2->employee_id;

                $listdata21 = \common\models\CompanyEmpb::find()
		 ->where(['id'=> $employee_id])->andwhere(['isactive'=>1])->one();                 
                 $csrid = $listdata21->userid;

              if($cityname == $location){             

                 $listdata3 = \common\models\Leadcurrentstatus::find()
		 ->where(['leadid'=> $user_id])->andwhere(['leadactionstatus'=>'8'])->one();         
               
                if($listdata3){

                $leadcurid = $listdata3->id;
                if($leadcurid != ''){

                     
                       }

                   }

                    
                }
            
                     return true;

	 }
 



public function sendmail($user_id)
            
    { 

               $activation= mt_rand(100000, 999999);
                //Your authentication key
                $authKey = "222784ARHZNXuXI5b334809";

                //Multiple mobiles numbers separated by comma
                $mobileNumber = "9555322244";

                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "102234";

                //Your message to send, Add URL encoding here.
                $message = urlencode("Test message");

                //Define route 
                $route = "default";
                //Prepare you post parameters
                $postData = array(
                'authkey' => $authKey,
                'mobiles' => $mobileNumber,
                'message' => $message,
                'sender' => $senderId,
                'route' => $route
                );

                //API URL
                $url="http://api.msg91.com/api/sendhttp.php";

                // init the resource
                $ch = curl_init();
                curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
                ));


                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


                //get response
                $output = curl_exec($ch);

                //Print error if any
                if(curl_errno($ch))
                {
                echo 'error:' . curl_error($ch);
                }

                curl_close($ch);

               // echo $output;
                  
       

    }
    

}
