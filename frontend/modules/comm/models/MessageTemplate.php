<?php

namespace frontend\modules\comm\models;

use Yii;

/**
 * This is the model class for table "message_template".
 *
 * @property integer $id
 * @property string $subject
 * @property string $body
 * @property integer $channelID
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class MessageTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'body', 'channelID'], 'required'],
            [['subject', 'body'], 'string'],
            [['channelID', 'isactive'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject' => Yii::t('app', 'Subject'),
            'body' => Yii::t('app', 'Body'),
            'channelID' => Yii::t('app', 'Channel ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
