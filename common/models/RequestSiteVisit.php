<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request_site_visit".
 *
 * @property integer $request_id
 * @property integer $user_id
 * @property integer $property_id
 * @property integer $company_id
 * @property string $request_status
 * @property string $pickup_location
 * @property string $drop_location
 * @property string $landmark
 * @property integer $terms_conditions_id
 * @property string $terms_conditions_files
 * @property integer $amount_payable
 * @property string $feedback
 * @property string $scheduled_time
 * @property string $visit_status_confirm
 * @property string $created_date
 */
class RequestSiteVisit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_site_visit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'property_id', 'terms_conditions_id', 'terms_conditions_files', 'amount_payable', 'scheduled_time', 'created_date'], 'required'],
            [['user_id', 'property_id', 'company_id', 'terms_conditions_id', 'amount_payable'], 'integer'],
            [['request_status', 'pickup_location', 'drop_location', 'landmark', 'feedback', 'visit_status_confirm'], 'string'],
            [['scheduled_time', 'created_date'], 'safe'],
            [['terms_conditions_files'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'request_id' => 'Request ID',
            'user_id' => 'User ID',
            'property_id' => 'Property ID',
            'company_id' => 'Company ID',
            'request_status' => 'Request Status',
            'pickup_location' => 'Pickup Location',
            'drop_location' => 'Drop Location',
            'landmark' => 'Landmark',
            'terms_conditions_id' => 'Terms Conditions ID',
            'terms_conditions_files' => 'Terms Conditions Files',
            'amount_payable' => 'Amount Payable',
            'feedback' => 'Feedback',
            'scheduled_time' => 'Scheduled Time',
            'visit_status_confirm' => 'Visit Status Confirm',
            'created_date' => 'Created Date',
        ];
    }
}
