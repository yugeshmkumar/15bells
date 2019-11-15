<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_emailconfig".
 *
 * @property integer $id
 * @property integer $roleid
 * @property integer $userid
 * @property integer $emailid
 * @property integer $isdefault
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class UserEmailconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_emailconfig';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleid', 'userid', 'emailid'], 'required'],
            [['roleid', 'userid', 'emailid', 'isdefault', 'isactive'], 'integer'],
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
            'emailid' => 'Emailid',
            'isdefault' => 'Isdefault',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
