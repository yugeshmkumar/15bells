<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lessor_expectations".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $user_type
 * @property integer $property_id
 * @property string $save_search_as
 * @property string $auto_cad_drawing
 * @property string $site_approval
 * @property string $wet_points
 * @property string $interest_security
 * @property string $interest_negotiable
 * @property string $agreement
 * @property string $agreement_negotiable
 * @property string $lease_tenure
 * @property string $tenure_negotiable
 * @property string $lock_in_period
 * @property string $lock_negotiable
 * @property string $rent
 * @property string $rent_unit
 * @property string $rent_negotiable
 * @property string $escalation_value
 * @property string $escalation_month
 * @property string $escalation_negotiable
 * @property string $maintenance_value
 * @property string $maintenance_unit
 * @property string $maintenance_hours
 * @property string $maintenance_subject_change
 * @property integer $last_date_rent
 * @property string $last_date_negotiable
 * @property integer $fit_out_period
 * @property string $fit_out_negotiable
 * @property string $present_electricity_load
 * @property string $canBeIncreased_electricity
 * @property string $clarity_on_meter
 * @property string $power_backup
 * @property string $power_can_be_discussed
 * @property string $seperate_space
 * @property integer $car_parking
 * @property string $motor_water_supply
 * @property string $water_supply_part_maintenance
 * @property integer $stamp_duty_lessor
 * @property integer $stamp_duty_lessee
 * @property string $working_restriction
 * @property string $washroom_provision
 * @property string $usuable_area_length
 * @property string $usuable_area_breadth
 * @property string $is_active
 * @property string $created_date
 */
class LessorExpectationsbin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lessor_expectations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_type', 'save_search_as', 'created_date'], 'required'],
            [['user_id', 'property_id', 'interest_security', 'rent', 'escalation_value', 'escalation_month', 'maintenance_value', 'last_date_rent', 'fit_out_period', 'present_electricity_load', 'car_parking', 'stamp_duty_lessor', 'stamp_duty_lessee', 'usuable_area_length', 'usuable_area_breadth'], 'integer'],
            [['user_type', 'auto_cad_drawing', 'site_approval', 'wet_points', 'interest_negotiable', 'agreement', 'agreement_negotiable', 'tenure_negotiable', 'lock_negotiable', 'rent_unit', 'rent_negotiable', 'escalation_negotiable', 'maintenance_unit', 'maintenance_hours', 'maintenance_subject_change', 'last_date_negotiable', 'fit_out_negotiable', 'canBeIncreased_electricity', 'clarity_on_meter', 'power_backup', 'power_can_be_discussed', 'seperate_space', 'motor_water_supply', 'water_supply_part_maintenance', 'working_restriction', 'washroom_provision', 'is_active'], 'string'],
            [['created_date'], 'safe'],
            [['save_search_as', 'lease_tenure'], 'string', 'max' => 150],
            [['lock_in_period'], 'string', 'max' => 100],
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
            'auto_cad_drawing' => Yii::t('app', 'Auto Cad Drawing'),
            'site_approval' => Yii::t('app', 'Site Approval'),
            'wet_points' => Yii::t('app', 'Wet Points'),
            'interest_security' => Yii::t('app', 'Interest Security'),
            'interest_negotiable' => Yii::t('app', 'Interest Negotiable'),
            'agreement' => Yii::t('app', 'Agreement'),
            'agreement_negotiable' => Yii::t('app', 'Agreement Negotiable'),
            'lease_tenure' => Yii::t('app', 'Lease Tenure'),
            'tenure_negotiable' => Yii::t('app', 'Tenure Negotiable'),
            'lock_in_period' => Yii::t('app', 'Lock In Period'),
            'lock_negotiable' => Yii::t('app', 'Lock Negotiable'),
            'rent' => Yii::t('app', 'Rent'),
            'rent_unit' => Yii::t('app', 'Rent Unit'),
            'rent_negotiable' => Yii::t('app', 'Rent Negotiable'),
            'escalation_value' => Yii::t('app', 'Escalation Value'),
            'escalation_month' => Yii::t('app', 'Escalation Month'),
            'escalation_negotiable' => Yii::t('app', 'Escalation Negotiable'),
            'maintenance_value' => Yii::t('app', 'Maintenance Value'),
            'maintenance_unit' => Yii::t('app', 'Maintenance Unit'),
            'maintenance_hours' => Yii::t('app', 'Maintenance Hours'),
            'maintenance_subject_change' => Yii::t('app', 'Maintenance Subject Change'),
            'last_date_rent' => Yii::t('app', 'Last Date Rent'),
            'last_date_negotiable' => Yii::t('app', 'Last Date Negotiable'),
            'fit_out_period' => Yii::t('app', 'Fit Out Period'),
            'fit_out_negotiable' => Yii::t('app', 'Fit Out Negotiable'),
            'present_electricity_load' => Yii::t('app', 'Present Electricity Load'),
            'canBeIncreased_electricity' => Yii::t('app', 'Can Be Increased Electricity'),
            'clarity_on_meter' => Yii::t('app', 'Clarity On Meter'),
            'power_backup' => Yii::t('app', 'Power Backup'),
            'power_can_be_discussed' => Yii::t('app', 'Power Can Be Discussed'),
            'seperate_space' => Yii::t('app', 'Seperate Space'),
            'car_parking' => Yii::t('app', 'Car Parking'),
            'motor_water_supply' => Yii::t('app', 'Motor Water Supply'),
            'water_supply_part_maintenance' => Yii::t('app', 'Water Supply Part Maintenance'),
            'stamp_duty_lessor' => Yii::t('app', 'Stamp Duty Lessor'),
            'stamp_duty_lessee' => Yii::t('app', 'Stamp Duty Lessee'),
            'working_restriction' => Yii::t('app', 'Working Restriction'),
            'washroom_provision' => Yii::t('app', 'Washroom Provision'),
            'usuable_area_length' => Yii::t('app', 'Usuable Area Length'),
            'usuable_area_breadth' => Yii::t('app', 'Usuable Area Breadth'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_date' => Yii::t('app', 'Created Date'),
        ];
    }
}
