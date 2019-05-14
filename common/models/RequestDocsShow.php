<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request_docs_show".
 *
 * @property integer $request_id
 * @property string $user_id
 * @property integer $property_id
 * @property string $company_id
 * @property string $request_status
 * @property string $reason
 * @property string $scheduled_time
 * @property string $confirm
 * @property string $created_date
 */
class RequestDocsShow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_docs_show';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'property_id', 'scheduled_time', 'created_date'], 'required'],
            [['user_id', 'property_id', 'company_id'], 'integer'],
            [['request_status', 'reason', 'confirm'], 'string'],
            [['scheduled_time', 'created_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'request_id' => Yii::t('app', 'Request ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'property_id' => Yii::t('app', 'Property ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'request_status' => Yii::t('app', 'Request Status'),
            'reason' => Yii::t('app', 'Reason'),
            'scheduled_time' => Yii::t('app', 'Scheduled Time'),
            'confirm' => Yii::t('app', 'Confirm'),
            'created_date' => Yii::t('app', 'Created Date'),
        ];
    }
}
