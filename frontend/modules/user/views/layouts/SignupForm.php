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
	['username', 'string', 'min' => 10,'max'=>10],
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
			
           
			
			
			['companytype', 'required',],
                    ['companyname', 'safe'],
['companyname', 'required', 
'message' => Yii::t('frontend', 'Mobile number cannot be blank.')],
			//['companyname', 'required', 'when' => function($model) {
           //     return ($model->companytype != "Individual");
           // }],
			   
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
			if($this->companytype != "Individual"){
				 \common\models\activemode::insertmyfirstcompanydetails($this->companyname,$this->companytype,$user->id);
				 $user->aftercompanySignup();
				 }else {
            $user->afterSignup();}
            return $user;
        }

        return null;
    }
}
