<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "call_button_action".
 *
 * @property int $id
 * @property int $user_phone
 * @property int $property_id
 * @property string $created_date
 */
class Callbuttonaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $userOTP;
    public $checkotp;


    public static function tableName()
    {
        return 'call_button_action';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_phone', 'userOTP','created_date'], 'required'],
            [['user_phone', 'property_id'], 'integer'],
            [['created_date'], 'safe'],
            [['userOTP'], 'is8NumbersOnly'],

             ['checkotp', 'compare', 'compareValue' => 'error', 'operator' => '=', 'when' => function($data,$model) {
                return  $model->checkotp == 'error';
            }, 'whenClient' => "function (attribute, value) {
                return $('#loginform-checkotp').val() == 'error';
            }",'message' => Yii::t('frontend', 'OTP doesnot Match .')
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */

    public function is8NumbersOnly($attribute)
    {
        if (!preg_match('/^[0-9]{4}$/', $this->$attribute)) {
            $this->addError($attribute, 'OTP must contain  4 digits.');
        }
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_phone' => 'User Phone',
            'property_id' => 'Property ID',
            'created_date' => 'Created Date',
        ];
    }
}
