<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $avatar_path
 * @property string $avatar_base_url
 * @property string $locale
 * @property integer $gender
 * @property string $phone
 * @property string $address
 * @property string $facebook_id
 * @property string $linkedin_id
 * @property string $minor
 * @property string $relationship_with_minor
 * @property string $guardian_name
 *
 * @property User $user
 */
class UserProfilenew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['locale'], 'required'],
            [['gender'], 'integer'],
            [['address', 'minor', 'relationship_with_minor', 'guardian_name'], 'string'],
            [['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url', 'facebook_id', 'linkedin_id'], 'string', 'max' => 255],
            [['locale'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'lastname' => 'Lastname',
            'avatar_path' => 'Avatar Path',
            'avatar_base_url' => 'Avatar Base Url',
            'locale' => 'Locale',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'address' => 'Address',
            'facebook_id' => 'Facebook ID',
            'linkedin_id' => 'Linkedin ID',
            'minor' => 'Minor',
            'relationship_with_minor' => 'Relationship With Minor',
            'guardian_name' => 'Guardian Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
