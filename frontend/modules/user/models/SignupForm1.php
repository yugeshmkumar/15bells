<?php
namespace frontend\modules\user\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
	public $fname;
    public $email;
    public $password;
    public $iagree;
	public $companyname;
	public $companytype;
	public $countrycode;
	public $checkfor;
       // const REGEX_SPECIAL_CHARS = '';
    const REGEX_SPECIAL_CHARS = "!@#";

   // public $regularExpressionPattern = '/.*(?=.*\d)(?=.*[a-zA-Z])(?=.*['.(self::REGEX_SPECIAL_CHARS).']).*/';
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		['fname','required',
		'message' => Yii::t('frontend', 'Name cannot be blank.')],
		
		
           ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required',
               // 'targetClass'=>'\common\models\User',
                'message' => Yii::t('frontend', 'Mobile number cannot be blank.')
            ],
			['fname', 'match', 'pattern' => '/^[a-z]\w*$/i',
		 'message' => Yii::t('frontend', 'Name is Invalid.')
		 ],
		['fname', 'string', 'length' => [0, 254],
		'message' => Yii::t('frontend', 'Name should contain at most 254 characters.')],
	['username', 'string', 'min' => 6, 'max'=>254],
	['countrycode', 'string', 'min' => 0, 'max'=>254],
	['username','match','pattern'=>"/^[1-9][0-9]{0,254}$/"],
            ['username', 'unique',
                'targetClass'=>'\common\models\User',
                'message' => Yii::t('frontend', 'This mobile has already been taken.')
            ],
//['username', 'number', 'min' => 1000000000 ],
         //   ['username', 'integer',
               // 'targetClass'=>'\common\models\User',
              //  'message' => Yii::t('frontend', 'Please enter a valid number'),
         //   ],

	//['companyname', 'required', 
	//'message' => Yii::t('frontend', 'Company name cannot be blank.')],
	
	[['companyname','email'], 'string', 'max' => 254],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
			
			['iagree', 'required', 'when' => function($model) {
                 return !empty($model->iagree);
            }],
            ['email', 'unique',
                'targetClass'=> '\common\models\User',
                'message' => Yii::t('frontend', 'This email address has already been taken.')
            ],
           ['countrycode','required'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
                    //['password_new_one', 'match', 'pattern'=>'/.*(?=.*\d)(?=.*[a-zA-Z])(?=.*['.(self::REGEX_SPECIAL_CHARS).']).*/', 'skipOnError'=>true, 'message'=>'Must have at least one letter, number and one special character out of set ['.self::REGEX_SPECIAL_CHARS.']!'],
			['companytype', 'required',],
                    
//			['companyname', 'required', 'when' => function($model) {
//                return ($model->companytype != "Individual");
//            }],
[['companyname'] ,'required','when'=>function($model){
				 return $model->checkfor == '2' ;
			  }, 'whenClient' => "function (attribute, value) {
               return $('#checkfor').val() == '2';
                }" ,'message' => Yii::t('frontend', 'Company Name cannot be blank.')],
            //['password', 'match', 'pattern'=>'/\d/', 'message'=>'Password must contain at least one numeric digit.'],
            //['password', 'match', 'pattern'=>'/\W/', 'message'=>'Password must contain at least one special character.'],
			   
        ];
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
         $otp = rand(1000,9999);

        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
			$user->countrycode = $this->countrycode;
            $user->setPassword($this->password);
            
            $user->save();
            $getuser = $user->id * 9 * 3 + 31;
            $otp1 = $otp."-".$getuser;   
            $phonenum = $user->username;           

            $user->otp = $otp1;
            $user->save();
            
             $url = "http://103.250.30.5/SendSMS/sendmsg.php?uname=metaitapi&pass=metait&send=METAIT&dest=$phonenum&msg='$otp1'";
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $curl_scraped_page = curl_exec($ch);

            curl_close($ch);

			$checkLoginAsConfig = $this->checkloginas($this->companytype);
			
			if($checkLoginAsConfig->login_to == "company"){
				 \common\models\activemode::insertmyfirstcompanydetails($this->companyname,$this->companytype,$user->id);
				 $user->aftercompanySignup();
				 }else {
        $getloginasid = \common\models\activemode::get_my_login_as_id($this->companytype);
	$UserLoginAs = new \common\models\UserLoginAs();
	$UserLoginAs->user_id = $user->id;
	$UserLoginAs->login_as = $this->companytype;
	$UserLoginAs->loginasID=$getloginasid;
	$UserLoginAs->save();
            $user->afterSignup();}
            return $user;
        }

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
    

}
