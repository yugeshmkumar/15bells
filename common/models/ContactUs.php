<?php

namespace common\models;

use common\commands\command\SendEmailCommand;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\HtmlPurifier;


/**
 * This is the model class for table "contact_us".
 *
 * @property integer $mail_id
 * @property string $full_name
 * @property string $email
 * @property string $contact_number
 * @property string $message
 * @property integer $is_active
 * @property string $created_at
 */
class ContactUs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_us';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message','full_name','email','role_name','contact_number'], 'filter', 'filter' => function ($value) {
                return \yii\helpers\HtmlPurifier::process($value);
            }], 
            [['message','day_noon', 'full_name','email','message','contact_number'], 'required'],
            [['message'], 'string'],
            //[['is_active'], 'integer'],
            //[['created_at','is_active'], 'safe'],
           // [['full_name', 'email'], 'string', 'max' => 250],
            [['email'], 'email'],
           // [['contact_number'], 'string', 'max' => 14]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mail_id' => 'Mail ID',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'contact_number' => 'Contact Number',
            'message' => 'Message',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
        ];
    }
    public function contact(){
        if ($this->validate()) {
            $this->save();
            Yii::$app->mailer->compose()
                    ->setFrom(Yii::$app->params['adminEmail'])
                    ->setTo(Yii::$app->params['adminEmail'])
                    ->setSubject($this->full_name)
                    ->setTextBody($this->message)
                    
                    //->setHtmlBody('<b>HTML content</b>')
                    ->send();
        }else {
            return false;
        }
    }
	
	public static function send_email_to_contact($role_name,$day_noon,$fullname,$email,$number,$message){
     
		$savehere = new ContactUs();
        $savehere->role_name = $role_name;
        $savehere->day_noon = $day_noon;
        $savehere->full_name = $fullname;
        $savehere->email = $email;  
        $savehere->contact_number = $number;     
        $savehere->message= $message;
        $savehere->save();

       


          $html = '<html>
			<body>
		
			<p>Hi, <br/> <br/> Thanks for Contacting Us, Our Experts will reach you Soon.
			</p><br>

			<p>Regards,<br/>
			Team 15bells.</p>
			</body>
			</html>';
         
         $htmladmin = '<html>
			<body>		
			<p><br/> New Enquiry Details :-</p><br>
                        <p>Name : "'.$full_name.'"</p>
                        <p>Email : "'.$email.'"</p>                       
                        <p>Message : "'.$message.'"</p>

			<p>Regards,<br/>
			Team 15bells.</p>
			</body>
			</html>';
        
        Yii::$app->mailer->compose()
                   ->setFrom(['info@15bells.com' => '15bells'])
                   ->setSubject('15bells Contact Us')
                    ->setTo($email)
                    ->setHtmlBody($html)                    
                    ->send();
        
        Yii::$app->mailer->compose()
                   ->setFrom(['info@15bells.com' => '15bells'])
                   ->setSubject('Contact Us Enquiry')
                    ->setTo('info@15bells.com')
                    ->setHtmlBody($htmladmin)                    
                    ->send();
               
           return   true;
		
	}
}
