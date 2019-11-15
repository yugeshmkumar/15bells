<?php

namespace frontend\modules\comm\models;

use Yii;

/**
 * This is the model class for table "message_queue".
 *
 * @property integer $id
 * @property integer $messageID
 * @property integer $templateID
 * @property integer $channelID
 * @property string $status
 * @property string $deliverytime
 * @property integer $senderID
 * @property integer $recipientID
 * @property integer $recipientgroupID
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class MessageQueue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['messageID', 'templateID', 'channelID', 'senderID', 'recipientID', 'recipientgroupID', 'isactive'], 'integer'],
            [['channelID', 'deliverytime', 'senderID'], 'required'],
            [['status'], 'string'],
            [['deliverytime', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'messageID' => Yii::t('app', 'Message ID'),
            'templateID' => Yii::t('app', 'Template ID'),
            'channelID' => Yii::t('app', 'Channel ID'),
            'status' => Yii::t('app', 'Status'),
            'deliverytime' => Yii::t('app', 'Deliverytime'),
            'senderID' => Yii::t('app', 'Sender ID'),
            'recipientID' => Yii::t('app', 'Recipient ID'),
            'recipientgroupID' => Yii::t('app', 'Recipientgroup ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
