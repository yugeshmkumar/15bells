<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_phoneconfig".
 *
 * @property integer $id
 * @property integer $roleid
 * @property integer $userid
 * @property integer $phoneid
 * @property integer $isdefault
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class UserPhoneconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_phoneconfig';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleid', 'userid', 'phoneid'], 'required'],
            [['roleid', 'userid', 'phoneid', 'isdefault', 'isactive'], 'integer'],
            [['created_at', 'updated_at','guardianprofileid'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'roleid' => 'Roleid',
            'userid' => 'Userid',
            'phoneid' => 'Phoneid',
            'isdefault' => 'Isdefault',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
