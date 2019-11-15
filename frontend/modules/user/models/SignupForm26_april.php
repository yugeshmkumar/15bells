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
    public $signup;
    public $companyname;
    public $companytype;
    public $username;
    public $email;
    public $password;
    public $password_confirm;
    public $iagree;
	
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required',
               // 'targetClass'=>'\common\models\User',
                'message' => Yii::t('frontend', 'Mobile number cannot be blank.')
            ],
            ['username', 'unique',
                'targetClass'=>'\common\models\User',
                'message' => Yii::t('frontend', 'This mobile has already been taken.')
            ],
         //   ['username', 'integer',
               // 'targetClass'=>'\common\models\User',
              //  'message' => Yii::t('frontend', 'Please enter a valid number'),
         //   ],

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

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			['password_confirm', 'required', 'when' => function($model) {
                return !empty($model->password);
            }],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false],
            ['signup','safe'],
			['companyname', 'required', 'when' => function($model) {
                return ($model->signup == 1);
            }],
			['companytype', 'required', 'when' => function($model) {
                return ($model->signup == 1);
            }],
			   
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
    public function signup()
    {
        if ($this->validate()) {
           
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->save();
			if($this->signup == 1){
				 \common\models\activemode::insertmyfirstcompanydetails($this->companyname,$this->companytype,$user->id);
				 $user->aftercompanySignup();
				 }else {
            $user->afterSignup();}
            return $user;
        }

        return null;
    }
}
