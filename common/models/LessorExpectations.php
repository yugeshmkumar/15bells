<?php

namespace common\models;

use Yii;
use yii\helpers\HtmlPurifier;

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
 * @property integer $interest_security
 * @property string $interest_negotiable
 * @property string $agreement
 * @property string $agreement_negotiable
 * @property string $lease_tenure
 * @property string $tenure_negotiable
 * @property string $lock_in_period
 * @property string $lock_negotiable
 * @property integer $rent
 * @property string $rent_unit
 * @property string $rent_negotiable
 * @property integer $escalation_value
 * @property integer $escalation_month
 * @property string $escalation_negotiable
 * @property integer $maintenance_value
 * @property string $maintenance_unit
 * @property string $maintenance_hours
 * @property string $maintenance_subject_change
 * @property integer $last_date_rent
 * @property string $last_date_negotiable
 * @property integer $fit_out_period
 * @property string $fit_out_negotiable
 * @property integer $present_electricity_load
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
 * @property integer $usuable_area_length
 * @property integer $usuable_area_breadth
 * @property string $is_active
 * @property string $created_date
 */
class LessorExpectations extends \yii\db\ActiveRecord
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
            [['user_id', 'user_type', 'save_search_as','interest_security','interest_negotiable','agreement','agreement_negotiable','lease_tenure','tenure_negotiable', 'created_date'], 'required'],
            //['interest_negotiable', 'required', 'requiredValue' => '', 'message' => 'my test message'],
           
            [['user_id', 'user_type', 'save_search_as', 'created_date'], 'required', 'on' => 'creates'],
            [['user_id', 'property_id', 'interest_security', 'rent', 'escalation_value', 'escalation_month', 'maintenance_value', 'last_date_rent', 'fit_out_period', 'present_electricity_load', 'car_parking', 'stamp_duty_lessor', 'stamp_duty_lessee', 'usuable_area_length', 'usuable_area_breadth','lease_tenure','lock_in_period','usuable_area'], 'integer','message' => '{attribute} is invalid.'],
            [['user_type', 'auto_cad_drawing', 'site_approval', 'wet_points', 'interest_negotiable', 'agreement', 'agreement_negotiable', 'tenure_negotiable', 'lock_negotiable', 'rent_unit', 'rent_negotiable', 'escalation_negotiable', 'maintenance_unit', 'maintenance_hours', 'maintenance_subject_change', 'last_date_negotiable', 'fit_out_negotiable', 'canBeIncreased_electricity', 'clarity_on_meter', 'power_backup', 'power_can_be_discussed', 'seperate_space', 'motor_water_supply', 'water_supply_part_maintenance', 'working_restriction', 'washroom_provision', 'is_active'], 'string'],
            [['created_date'], 'safe'],
            ['save_search_as', 'filter', 'filter' => function ($value) {
                return \yii\helpers\HtmlPurifier::process($value);
            }], 
            //[['save_search_as', 'lease_tenure'], 'string', 'max' => 150],
            [['save_search_as'], 'string', 'max' => 150],
            [['last_date_rent'], 'compare', 'compareValue' => 31, 'operator' => '<='],
           // [['lock_in_period'], 'string', 'max' => 100],
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
            'auto_cad_drawing' => 'Auto Cad Drawing',
            'site_approval' => 'Site Approval',
            'wet_points' => 'Wet Points',
            'interest_security' => 'Interest Security',
            'interest_negotiable' => 'Interest Negotiable',
            'agreement' => 'Agreement',
            'agreement_negotiable' => 'Agreement Negotiable',
            'lease_tenure' => 'Lease Tenure',
            'tenure_negotiable' => 'Tenure Negotiable',
            'lock_in_period' => 'Lock In Period',
            'lock_negotiable' => 'Lock Negotiable',
            // 'rent' => 'Rent',
            // 'rent_unit' => 'Rent Unit',
            'rent_negotiable' => 'Rent Negotiable',
            'escalation_value' => 'Escalation Value',
            'escalation_month' => 'Escalation Month',
            'escalation_negotiable' => 'Escalation Negotiable',
            'maintenance_value' => 'Maintenance Value',
            'maintenance_unit' => 'Maintenance Unit',
            'maintenance_hours' => 'Maintenance Hours',
            'maintenance_subject_change' => 'Maintenance Subject Change',
            'last_date_rent' => 'Last Date Rent',
            'last_date_negotiable' => 'Last Date Negotiable',
            'fit_out_period' => 'Fit Out Period',
            'fit_out_negotiable' => 'Fit Out Negotiable',
            'present_electricity_load' => 'Present Electricity Load',
            'canBeIncreased_electricity' => 'Can Be Increased Electricity',
            'clarity_on_meter' => 'Clarity On Meter',
            'power_backup' => 'Power Backup',
            'power_can_be_discussed' => 'Power Can Be Discussed',
            'seperate_space' => 'Seperate Space',
            'car_parking' => 'Car Parking',
            'motor_water_supply' => 'Motor Water Supply',
            'water_supply_part_maintenance' => 'Water Supply Part Maintenance',
            'stamp_duty_lessor' => 'Stamp Duty Lessor',
            'stamp_duty_lessee' => 'Stamp Duty Lessee',
            'working_restriction' => 'Working Restriction',
            'washroom_provision' => 'Washroom Provision',
            'usuable_area_length' => 'Usuable Area Length',
            'usuable_area_breadth' => 'Usuable Area Breadth',
            'is_active' => 'Is Active',
            'created_date' => 'Created Date',
        ];
    }
}
