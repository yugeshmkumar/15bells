<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_addressconfig".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $roleid
 * @property integer $addressid
 * @property integer $isdefault
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class UserAddressconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_addressconfig';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'roleid', 'addressid'], 'required'],
            [['userid', 'roleid', 'addressid', 'isdefault', 'isactive'], 'integer'],
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
            'userid' => 'Userid',
            'roleid' => 'Roleid',
            'addressid' => 'Addressid',
            'isdefault' => 'Isdefault',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
