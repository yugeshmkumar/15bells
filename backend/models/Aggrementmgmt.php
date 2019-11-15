<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aggrementmgmt".
 *
 * @property integer $id
 * @property string $subject
 * @property string $content
 * @property string $decription
 * @property integer $roleid
 * @property integer $ispublish
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Aggrementmgmt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aggrementmgmt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'content', 'roleid'], 'required'],
            [['subject', 'content', 'decription'], 'string'],
            [['roleid', 'ispublish', 'isactive'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'content' => 'Content',
            'decription' => 'Decription',
            'roleid' => 'Roleid',
            'ispublish' => 'Ispublish',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
