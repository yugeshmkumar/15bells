<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "my_property".
 *
 * @property integer $id
 * @property integer $client_id
 * @property string $site_name
 * @property string $site_address
 * @property string $super_area
 * @property string $carpet_area
 * @property string $auto_cad_drawing
 * @property string $possession
 * @property string $commercial_approved
 * @property integer $floors
 * @property string $agreement
 * @property integer $tenure
 * @property string $rent
 * @property string $maintenance
 * @property string $last_date_rent
 * @property string $fit_out_period
 * @property string $electricity_load
 * @property string $clarityOn_meter_submeter
 * @property string $power_backup
 * @property string $property_tax
 * @property string $spaceForGenset_ac_watertank
 * @property string $car_parking
 * @property string $motor_waterSupply
 * @property integer $stampDuty_registration
 * @property string $working_hour_restrict
 * @property string $created_date
 * @property string $is_active
 */
class MyProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_name', 'site_address', 'super_area', 'carpet_area', 'possession', 'commercial_approved', 'floors', 'agreement', 'tenure', 'rent', 'maintenance', 'last_date_rent', 'fit_out_period', 'electricity_load', 'clarityOn_meter_submeter', 'power_backup', 'property_tax', 'spaceForGenset_ac_watertank', 'car_parking', 'motor_waterSupply', 'stampDuty_registration', 'working_hour_restrict'], 'required'],
            [['client_id', 'floors', 'tenure', 'stampDuty_registration'], 'integer'],
            [['auto_cad_drawing', 'possession', 'commercial_approved', 'agreement', 'clarityOn_meter_submeter', 'power_backup', 'spaceForGenset_ac_watertank', 'car_parking', 'working_hour_restrict', 'is_active'], 'string'],
            [['last_date_rent', 'created_date'], 'safe'],
            [['site_name', 'super_area', 'carpet_area', 'fit_out_period', 'electricity_load', 'motor_waterSupply'], 'string', 'max' => 100],
            [['site_address'], 'string', 'max' => 200],
            [['rent', 'maintenance'], 'string', 'max' => 150],
            [['property_tax'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'site_name' => 'Site Name',
            'site_address' => 'Site Address',
            'super_area' => 'Super Area',
            'carpet_area' => 'Carpet Area',
            'auto_cad_drawing' => 'Auto Cad Drawing',
            'possession' => 'Possession',
            'commercial_approved' => 'Commercial Approved',
            'floors' => 'Floors',
            'agreement' => 'Agreement',
            'tenure' => 'Tenure',
            'rent' => 'Rent',
            'maintenance' => 'Maintenance',
            'last_date_rent' => 'Last Date Rent',
            'fit_out_period' => 'Fit Out Period',
            'electricity_load' => 'Electricity Load',
            'clarityOn_meter_submeter' => 'Clarity On Meter Submeter',
            'power_backup' => 'Power Backup',
            'property_tax' => 'Property Tax',
            'spaceForGenset_ac_watertank' => 'Space For Genset Ac Watertank',
            'car_parking' => 'Car Parking',
            'motor_waterSupply' => 'Motor Water Supply',
            'stampDuty_registration' => 'Stamp Duty Registration',
            'working_hour_restrict' => 'Working Hour Restrict',
            'created_date' => 'Created Date',
            'is_active' => 'Is Active',
        ];
    }
}
