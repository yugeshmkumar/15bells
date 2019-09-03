<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "addproperty".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $role_id
 * @property string $project_name
 * @property string $property_for
 * @property integer $project_type_id
 * @property string $request_for
 * @property string $featured_image
 * @property string $featured_video
 * @property integer $city
 * @property string $locality
 * @property string $address
 * @property double $longitude
 * @property double $latitude
 

 * @property string $expected_price
 * @property string $asking_rental_price
 * @property integer $price_sq_ft
 * @property integer $price_acres
 * @property string $price_negotiable
 * @property string $revenue_lauout
 * @property string $present_status
 * @property string $jurisdiction_development
 * @property string $shed_RCC
 * @property string $maintenance_cost
 * @property string $maintenance_by
 * @property string $annual_dues_payable
 * @property string $expected_rental
 * @property string $membership_charge
 * @property string $availability
 * @property string $available_from
 * @property string $available_date
 * @property string $age_of_property
 * @property string $possesion_by
 * @property string $rental_type
 * @property string $ownership
 * @property string $ownership_status
 * @property string $facing
 * @property string $FAR_approval
 * @property string $LOAN_taken
 * @property integer $buildup_area
 * @property string $build_unit
 * @property integer $carpet_area
 * @property string $carpet_unit
 * @property integer $total_floors
 * @property integer $property_on_floor
 * @property string $configuration
 * @property integer $floors_allowed_construction
 * @property integer $bedrooms
 * @property integer $bathrooms
 * @property integer $balconies
 * @property string $pooja_room
 * @property string $study_room
 * @property string $servant_room
 * @property string $other_room
 * @property string $furnished_status
 * @property integer $parking
 * @property string $is_active
 * @property string $created_date
 * @property string $status
 */
class Addpropertypm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $efficiency;
    public $total_lease_rate;
    public $passenger_lift;
    public $covered_parking;
    public $type_of_space;
    public $floor_plate_area;
    public $security_deposit;
    public $backup_power;
    public $building_name;


    public static function tableName()
    {
        return 'addproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['user_id', 'role_id', 'project_name', 'property_for', 'project_type_id', 'request_for', 'city', 'locality', 'address', 'longitude', 'latitude', 'membership_charge', 'availability', 'available_date', 'age_of_property', 'possesion_by', 'FAR_approval', 'furnished_status', 'created_date'], 'required'],
            [['user_id', 'project_type_id',  'expected_price', 'asking_rental_price', 'price_sq_ft', 'price_acres', 'membership_charge', 'buildup_area', 'carpet_area', 'floors_allowed_construction', 'bedrooms', 'bathrooms', 'balconies', 'parking'], 'integer'],
            [['role_id', 'property_for', 'request_for', 'locality', 'address', 'price_negotiable', 'revenue_lauout', 'present_status', 'shed_RCC', 'maintenance_by', 'availability', 'available_from', 'age_of_property', 'possesion_by', 'rental_type', 'ownership', 'ownership_status', 'facing', 'LOAN_taken', 'build_unit', 'carpet_unit', 'configuration', 'pooja_room', 'study_room', 'servant_room', 'other_room', 'furnished_status', 'is_active', 'status'], 'string'],
            [['longitude', 'latitude', 'FAR_approval'], 'number'],
            [['available_date', 'created_date'], 'safe'],
            [['project_name', 'featured_image', 'jurisdiction_development', 'maintenance_cost', 'annual_dues_payable', 'expected_rental'], 'string', 'max' => 100],
            [['featured_video'], 'string', 'max' => 200],
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
            'role_id' => 'Role ID',
            'project_name' => 'Project Name',
            'property_for' => 'Property For',
            'project_type_id' => 'Project Type ID',
            'request_for' => 'Request For',
            'featured_image' => 'Featured Image',
            'featured_video' => 'Featured Video',
            'city' => 'City',
            'locality' => 'Locality',
            'address' => 'Address',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            
          
            'expected_price' => 'Expected Price',
            'asking_rental_price' => 'Asking Rental Price',
            'price_sq_ft' => 'Price Sq Ft',
            'price_acres' => 'Price Acres',
            'price_negotiable' => 'Price Negotiable',
            'revenue_lauout' => 'Revenue Lauout',
            'present_status' => 'Present Status',
            'jurisdiction_development' => 'Jurisdiction Development',
            'shed_RCC' => 'Shed  Rcc',
            'maintenance_cost' => 'Maintenance Cost',
            'maintenance_by' => 'Maintenance By',
            'annual_dues_payable' => 'Annual Dues Payable',
            'expected_rental' => 'Expected Rental',
            'membership_charge' => 'Membership Charge',
            'availability' => 'Availability',
            'available_from' => 'Available From',
            'available_date' => 'Available Date',
            'age_of_property' => 'Age Of Property',
            'possesion_by' => 'Possesion By',
            'rental_type' => 'Rental Type',
            'ownership' => 'Ownership',
            'ownership_status' => 'Ownership Status',
            'facing' => 'Facing',
            'FAR_approval' => 'Far Approval',
            'LOAN_taken' => 'Loan Taken',
            'buildup_area' => 'Buildup Area',
            'build_unit' => 'Build Unit',
            'carpet_area' => 'Carpet Area',
            'carpet_unit' => 'Carpet Unit',
            'total_floors' => 'Total Floors',
            'property_on_floor' => 'Property On Floor',
            'configuration' => 'Configuration',
            'floors_allowed_construction' => 'Floors Allowed Construction',
            'bedrooms' => 'Bedrooms',
            'bathrooms' => 'Bathrooms',
            'balconies' => 'Balconies',
            'pooja_room' => 'Pooja Room',
            'study_room' => 'Study Room',
            'servant_room' => 'Servant Room',
            'other_room' => 'Other Room',
            'furnished_status' => 'Furnished Status',
            'parking' => 'Parking',
            'is_active' => 'Is Active',
            'created_date' => 'Created Date',
            'status' => 'Status',
        ];
    }
}
