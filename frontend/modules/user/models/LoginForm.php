<?php
namespace frontend\modules\user\models;

use cheatsheet\Time;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $identity;
    public $password;
    public $userOTP;
    public $checkotp;
    public $checkfield;
    public $rememberMe = true;

    private $user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            ['identity', 'required'],


            [['password'] ,'required','when'=>function($model){
                return $model->checkfield == 'password' ;
             }, 'whenClient' => "function (attribute, value) {
              return $('#loginform-checkfield').val() == 'password';
               }" ,'message' => Yii::t('frontend', 'Please enter Your Password')],

              [['userOTP'] ,'required','when'=>function($model){
                return $model->checkfield == 'otp' ;
             }, 'whenClient' => "function (attribute, value) {
              return $('#loginform-checkfield').val() == 'otp';
               }" ,'message' => Yii::t('frontend', 'Please enter OTP')],


               [['password'] ,'required','when'=>function($model){
                return $model->userOTP == '' ;
             }, 'whenClient' => "function (attribute, value) {
              return $('#loginform-userotp').val() == '';
               }" ,'message' => Yii::t('frontend', 'Please enter Your Password')],

               
               [['userOTP'] ,'required','when'=>function($model){
                return $model->password == '' ;
             }, 'whenClient' => "function (attribute, value) {
              return $('#loginform-password').val() == '';
               }" ,'message' => Yii::t('frontend', 'Please enter OTP')],

               ['userOTP', 'is8NumbersOnly'],



            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['identity', 'validateIdentity'],
            ['password', 'validatePassword'],

         //   [['userOTP','checkfield','checkotp'], 'validateOtp'],

            ['checkotp', 'compare', 'compareValue' => 'error', 'operator' => '=', 'when' => function($data,$model) {
                return  $model->checkotp == 'error';
            }, 'whenClient' => "function (attribute, value) {
                return $('#loginform-checkotp').val() == 'error';
            }",'message' => Yii::t('frontend', 'OTP doesnot Match .')
            ],
        ];
    }


    public function is8NumbersOnly($attribute)
{
    if (!preg_match('/^[0-9]{4}$/', $this->$attribute)) {
        $this->addError($attribute, 'OTP must contain  4 digits.');
    }
}

    public function attributeLabels()
    {
        return [
            'identity'=>Yii::t('frontend', 'Username'),
            'password'=>Yii::t('frontend', 'Password'),
            'rememberMe'=>Yii::t('frontend', 'Remember Me'),
        ];
    }


    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */

    public function validateOtp($attribute, $params, $validator)
    {
        if($this->checkfield == 'otp'){
        if ($this->checkotp == 'error') {
            $this->addError('userOTP', 'OTP is incorrect.');
        }
      }
    }


    public function validateIdentity()
    {
        if (!$this->hasErrors()) {
            
            $user = $this->getUser();
            
            if (!$user) {
                $this->addError('identity', Yii::t('frontend', 'Incorrect username or password.'));
            }
        }
    }

    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', Yii::t('frontend', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login($otp)
    {

       // echo $otp;die;
        
        if ($this->validate()) {
            
            if (Yii::$app->user->login($this->getUser(), $this->rememberMe ? Time::SECONDS_IN_A_MONTH : 0)) {
                return true;
            }
        }
        return false;
    }


   
 


      public function authentication($otp){

         $listdata = \common\models\User::find()
		 ->where(['otp'=>$otp ])->one();

         if($listdata){

	     $id =  $listdata->id;

               
		$command = \Yii::$app->db->createCommand("UPDATE user SET status='1',otp='0' WHERE id='$id'");
		$command->execute();
		return true;

            }else{

		return false;
		}

       

          }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->user === false) {
           // echo $this->identity;die;
            $this->user = User::find()->where(['or', ['username'=>$this->identity], ['email'=>$this->identity]])->andwhere(['status'=>1])->one();
           // $this->user = User::find()->where(['email'=>$this->identity])->andwhere(['status'=>1])->one();
             
        }

        return $this->user;
    }
}
