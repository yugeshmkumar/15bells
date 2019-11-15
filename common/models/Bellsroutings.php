<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bellsroutings".
 *
 * @property integer $id
 * @property integer $user_role
 * @property string $login_to
 * @property string $login_url
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 *
 * @property UserRoles $userRole
 */
class Bellsroutings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bellsroutings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_role', 'isactive'], 'integer'],
            [['login_to', 'login_url','rolename'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_role'], 'exist', 'skipOnError' => true, 'targetClass' => UserRoles::className(), 'targetAttribute' => ['user_role' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_role' => 'User Role',
			'rolename'=>'rolename',
            'login_to' => 'Login To',
            'login_url' => 'Login Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRole()
    {
        return $this->hasOne(UserRoles::className(), ['id' => 'user_role']);
    }
}
