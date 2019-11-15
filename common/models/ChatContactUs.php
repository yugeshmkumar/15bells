<?php

namespace common\models;

use Yii;
use yii\helpers\HtmlPurifier;

/**
 * This is the model class for table "chat_contact_us".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $role
 * @property string $message
 * @property string $created_date
 */
class ChatContactUs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat_contact_us';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','email','phone'], 'filter', 'filter' => function ($value) {
                return \yii\helpers\HtmlPurifier::process($value);
            }], 
            [['name', 'email','phone',  'created_date'], 'required'],
           // [['role', 'message'], 'string'],
           ['phone', 'filter', 'filter' => 'trim'],
           ['phone', 'string', 'min' => 10, 'max'=>254,'message'=>'Mobile number is invalid.'],
           ['phone','match','pattern'=>"/^[1-9][0-9]{0,254}$/",'message'=>'Mobile number is invalid.'],
            [['created_date'], 'safe'],
           // [['name'], 'string', 'max' => 100],
            
            ['email', 'email'],
            //[['email'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'role' => 'Role',
            'message' => 'Message',
            'created_date' => 'Created Date',
        ];
    }
}
