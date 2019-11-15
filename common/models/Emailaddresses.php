<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emailaddresses".
 *
 * @property integer $id
 * @property string $emailaddress
 * @property string $emailtype
 * @property integer $isdefault
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Emailaddresses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emailaddresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emailaddress', 'emailtype'], 'string'],
            [['isdefault', 'isactive'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emailaddress' => 'Emailaddress',
            'emailtype' => 'Emailtype',
            'isdefault' => 'Isdefault',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
