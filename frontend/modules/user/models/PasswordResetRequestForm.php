<?php
namespace frontend\modules\user\models;

use common\commands\command\SendEmailCommand;
use Yii;
use common\models\User;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    public $otp;    
    public $checkotp;
    public $username;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['email', 'email'],
            ['otp','required',
            'message' => Yii::t('frontend', 'OTP cannot be blank.')],
            ['username', 'string', 'min' => 10, 'max'=>254,'message'=>'Mobile number is invalid.'],
	// ['countrycode', 'string', 'min' => 0, 'max'=>254],
	        ['username','match','pattern'=>"/^[1-9][0-9]{0,254}$/",'message'=>'Mobile number is invalid.'],
            ['username', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'Mobile no. does not exist.'
            ],
            ['otp', 'compare', 'compareAttribute' => 'checkotp', 'operator' => '<>','type' => 'number', 'when' => function($data,$model) {
                return $model->checkotp != $model->otp;
            }, 'whenClient' => "function (attribute, value) {
                return $('#passwordresetrequestform-checkotp').val() != $('#passwordresetrequestform-otp').val();
            }",'message' => Yii::t('frontend', 'OTP doesnot Match .')
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
           // echo 'user aya';die;
          
            $user->generatePasswordResetToken();
            if ($user->save(false)) {
               // echo 'save hua';die;
               $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/user/sign-in/reset-password', 'token' => $user->password_reset_token]);

               $tokens = $user->password_reset_token;

               return $tokens;
                // return Yii::$app->commandBus->handle(new SendEmailCommand([
                //     'from' => [Yii::$app->params['adminEmail'] => Yii::$app->name],
                //     'to' => $this->email,
                //     'subject' => Yii::t('frontend', 'Password reset for {name}', ['name'=>Yii::$app->name]),
                //     'view' => 'passwordResetToken',
                //     'params' => ['user' => $user]
                // ]));
            }
        }

        return false;
    }

    public function attributeLabels()
    {
        return [
            'email'=>Yii::t('frontend', 'E-mail')
        ];
    }
}
