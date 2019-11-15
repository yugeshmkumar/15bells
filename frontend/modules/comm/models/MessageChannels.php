<?php

namespace frontend\modules\comm\models;

use Yii;

/**
 * This is the model class for table "message_channels".
 *
 * @property integer $id
 * @property string $channelname
 * @property string $channeldesc
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class MessageChannels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_channels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channelname', 'channeldesc'], 'string'],
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
            'id' => Yii::t('app', 'ID'),
            'channelname' => Yii::t('app', 'Channelname'),
            'channeldesc' => Yii::t('app', 'Channeldesc'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
