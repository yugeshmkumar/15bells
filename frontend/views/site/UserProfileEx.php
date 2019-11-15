<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_profile_ex".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property integer $emailid
 * @property integer $mobileid
 * @property integer $cur_addressid1
 * @property integer $per_addressid1
 * @property string $gender
 * @property string $pan_card_number
 * @property string $adhar_number
 * @property string $dob
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isActive
 */
class UserProfileEx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile_ex';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		['nationality','safe'],
           ['gender','safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'emailid' => 'Emailid',
            'mobileid' => 'Mobileid',
            'cur_addressid1' => 'Cur Addressid1',
            'per_addressid1' => 'Per Addressid1',
            'gender' => 'Gender',
			'nationality'=>'nationality',
			'martial_status'=>'Martial Status',
            'pan_card_number' => 'Pan Card Number',
            'adhar_number' => 'Adhar Number',
            'dob' => 'Dob',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isActive' => 'Is Active',
        ];
    }
}
