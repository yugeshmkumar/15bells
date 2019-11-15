<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_roles".
 *
 * @property integer $id
 * @property string $rolename
 * @property string $roledesc
 * @property string $roletype
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class UserRoles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rolename', 'roledesc'], 'required'],
            [['rolename', 'roledesc', 'roletype'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['isactive'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rolename' => 'Rolename',
            'roledesc' => 'Roledesc',
            'roletype' => 'Roletype',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
