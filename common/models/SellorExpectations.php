<?php

namespace common\models;

use Yii;
use yii\helpers\HtmlPurifier;

/**
 * This is the model class for table "sellor_expectations".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $user_type
 * @property integer $property_id
 * @property string $save_search_as
 * @property string $rate_negotiable
 * @property integer $payment_time
 * @property string $payment_time_negotiable
 * @property string $loan_against_property
 * @property string $all_dues_cleared
 * @property string $vastu_facing
 * @property string $loan_to_be_applied
 * @property string $is_active
 * @property string $created_date
 */
class SellorExpectations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sellor_expectations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_type', 'save_search_as','rate_negotiable', 'created_date'], 'required'],
            [['user_id', 'property_id', 'payment_time','expected_rate'], 'integer'],
           // ['rate_negotiable', 'required', 'requiredValue' => 1, 'message' => 'my test message'],
            ['save_search_as', 'filter', 'filter' => function ($value) {
                return \yii\helpers\HtmlPurifier::process($value);
            }], 
            [['user_type', 'rate_negotiable', 'payment_time_negotiable', 'loan_against_property', 'all_dues_cleared', 'vastu_facing', 'loan_to_be_applied', 'is_active'], 'string'],
            [['created_date'], 'safe'],
            [['save_search_as'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_type' => 'User Type',
            'property_id' => 'Property ID',
            'save_search_as' => 'Save Search As',
            'rate_negotiable' => 'Rate Negotiable',
            'payment_time' => 'Payment Time',
            'payment_time_negotiable' => 'Payment Time Negotiable',
            'loan_against_property' => 'Loan Against Property',
            'all_dues_cleared' => 'All Dues Cleared',
            'vastu_facing' => 'Vastu Facing',
            'loan_to_be_applied' => 'Loan To Be Applied',
            'is_active' => 'Is Active',
            'created_date' => 'Created Date',
        ];
    }
}
