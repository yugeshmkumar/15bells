<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sellor_expectations".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $user_type
 * @property integer $property_id
 * @property string $save_search_as
 * @property string $expected_rate
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
class SellorExpectationsbin extends \yii\db\ActiveRecord
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
            [['user_id', 'user_type', 'save_search_as', 'expected_rate', 'created_date'], 'required'],
            [['user_id', 'property_id', 'expected_rate', 'payment_time'], 'integer'],
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
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'user_type' => Yii::t('app', 'User Type'),
            'property_id' => Yii::t('app', 'Property ID'),
            'save_search_as' => Yii::t('app', 'Save Search As'),
            'expected_rate' => Yii::t('app', 'Expected Rate'),
            'rate_negotiable' => Yii::t('app', 'Rate Negotiable'),
            'payment_time' => Yii::t('app', 'Payment Time'),
            'payment_time_negotiable' => Yii::t('app', 'Payment Time Negotiable'),
            'loan_against_property' => Yii::t('app', 'Loan Against Property'),
            'all_dues_cleared' => Yii::t('app', 'All Dues Cleared'),
            'vastu_facing' => Yii::t('app', 'Vastu Facing'),
            'loan_to_be_applied' => Yii::t('app', 'Loan To Be Applied'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_date' => Yii::t('app', 'Created Date'),
        ];
    }
}
