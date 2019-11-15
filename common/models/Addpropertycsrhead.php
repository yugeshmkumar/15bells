<?php

namespace common\models;

use Yii;
use backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm;


/**
 * This is the model class for table "addproperty".
 *
 * @property int $id
 * @property int $user_id
 * @property int $builder_id
 * @property string $builder_total_area
 * @property string $role_id
 * @property string $project_name
 * @property string $property_for
 * @property int $project_type_id
 * @property string $request_for
 * @property string $featured_image
 * @property string $featured_video
 * @property string $city
 * @property string $locality
 * @property string $town_name
 * @property string $sector_name
 * @property string $address
 * @property double $longitude
 * @property double $latitude
 * @property int $no_of_similiar_shops
 * @property int $buildup_area
 * @property string $build_unit
 * @property int $expected_price
 * @property int $asking_rental_price
 * @property string $price_sq_ft
 * @property string $price_acres
 * @property string $price_negotiable
 * @property string $revenue_lauout
 * @property string $interior_details
 * @property string $present_status
 * @property string $jurisdiction_development
 * @property string $shed_RCC
 * @property string $maintenance_cost
 * @property string $maintenance_cost_unit
 * @property string $maintenance_by
 * @property string $annual_dues_payable
 * @property string $expected_rental
 * @property int $membership_charge
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
 * @property int $min_super_area
 * @property int $super_area
 * @property string $super_unit
 * @property int $carpet_area
 * @property string $carpet_unit
 * @property int $total_floors
 * @property string $property_on_floor
 * @property string $configuration
 * @property int $floors_allowed_construction
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int $balconies
 * @property string $pooja_room
 * @property string $study_room
 * @property string $servant_room
 * @property string $other_room
 * @property string $furnished_status
 * @property int $parking
 * @property string $is_active
 * @property string $created_date
 * @property string $status
 */
class Addpropertycsrhead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
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
    public $minsuper_area;
    public static function tableName()
    {
        return 'addproperty';
    }

    /**
     * {@inheritdoc}
     */
    // public function rules()
    // {
    //     return [
    //         [['user_id', 'role_id', 'property_for', 'project_type_id', 'request_for', 'locality', 'available_date', 'created_date'], 'required'],
    //         [['user_id', 'builder_id', 'project_type_id', 'no_of_similiar_shops', 'buildup_area', 'expected_price', 'asking_rental_price', 'membership_charge', 'min_super_area', 'super_area', 'carpet_area', 'total_floors', 'floors_allowed_construction', 'bedrooms', 'bathrooms', 'balconies', 'parking'], 'integer'],
    //         [['builder_total_area', 'longitude', 'latitude', 'price_sq_ft', 'price_acres', 'maintenance_cost', 'FAR_approval'], 'number'],
    //         [['role_id', 'property_for', 'request_for', 'featured_image', 'featured_video', 'locality', 'address', 'price_negotiable', 'available_from', 'ownership', 'ownership_status', 'LOAN_taken', 'super_unit', 'carpet_unit', 'pooja_room', 'study_room', 'servant_room', 'other_room', 'is_active', 'status'], 'string'],
    //         [['available_date', 'created_date'], 'safe'],
    //         [['project_name', 'jurisdiction_development', 'annual_dues_payable', 'expected_rental'], 'string', 'max' => 100],
    //         [['city'], 'string', 'max' => 11],
    //         [['town_name', 'sector_name'], 'string', 'max' => 200],
    //         [['build_unit', 'revenue_lauout', 'present_status', 'shed_RCC', 'maintenance_by', 'availability', 'possesion_by', 'rental_type', 'facing', 'configuration', 'furnished_status'], 'string', 'max' => 50],
    //         [['interior_details'], 'string', 'max' => 255],
    //         [['maintenance_cost_unit'], 'string', 'max' => 30],
    //         [['age_of_property'], 'string', 'max' => 250],
    //         [['property_on_floor'], 'string', 'max' => 20],
    //     ];
    // }


    public function rules()
    {
        return [
          //  [['user_id', 'role_id', 'project_name', 'property_for', 'project_type_id', 'request_for', 'city', 'locality', 'address', 'longitude', 'latitude', 'membership_charge', 'availability', 'available_date', 'age_of_property', 'possesion_by', 'FAR_approval', 'furnished_status', 'created_date'], 'required'],
            [['user_id', 'project_type_id',  'expected_price', 'asking_rental_price', 'price_sq_ft', 'price_acres', 'membership_charge', 'buildup_area', 'carpet_area', 'floors_allowed_construction', 'bedrooms', 'bathrooms', 'balconies'], 'integer'],
            [['role_id', 'property_for', 'request_for', 'locality', 'address', 'price_negotiable', 'revenue_lauout', 'present_status', 'shed_RCC', 'maintenance_by', 'availability', 'available_from', 'age_of_property', 'possesion_by', 'rental_type', 'ownership', 'ownership_status', 'facing', 'LOAN_taken', 'build_unit', 'carpet_unit', 'configuration', 'pooja_room', 'study_room', 'servant_room', 'other_room', 'furnished_status', 'is_active', 'status'], 'string'],
            [['longitude', 'latitude', 'FAR_approval'], 'number'],
            [['available_date', 'created_date'], 'safe'],
            [['project_name', 'featured_image', 'jurisdiction_development', 'maintenance_cost', 'annual_dues_payable', 'expected_rental'], 'string', 'max' => 100],
            [['featured_video'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'builder_id' => 'Builder ID',
            'builder_total_area' => 'Builder Total Area',
            'role_id' => 'Role ID',
            'project_name' => 'Project Name',
            'property_for' => 'Property For',
            'project_type_id' => 'Project Type ID',
            'request_for' => 'Request For',
            'featured_image' => 'Featured Image',
            'featured_video' => 'Featured Video',
            'city' => 'City',
            'locality' => 'Locality',
            'town_name' => 'Town Name',
            'sector_name' => 'Sector Name',
            'address' => 'Address',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'no_of_similiar_shops' => 'No Of Similiar Shops',
            'buildup_area' => 'Buildup Area',
            'build_unit' => 'Build Unit',
            'expected_price' => 'Expected Price',
            'asking_rental_price' => 'Asking Rental Price',
            'price_sq_ft' => 'Price Sq Ft',
            'price_acres' => 'Price Acres',
            'price_negotiable' => 'Price Negotiable',
            'revenue_lauout' => 'Revenue Lauout',
            'interior_details' => 'Interior Details',
            'present_status' => 'Present Status',
            'jurisdiction_development' => 'Jurisdiction Development',
            'shed_RCC' => 'Shed  Rcc',
            'maintenance_cost' => 'Maintenance Cost',
            'maintenance_cost_unit' => 'Maintenance Cost Unit',
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
            'min_super_area' => 'Min Super Area',
            'super_area' => 'Super Area',
            'super_unit' => 'Super Unit',
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


    public function getUsername()
{
    return $this->hasOne(User::className(), ['id' => 'user_id']);
}


public function getBuildingname()
{
    return $this->hasOne(AddpropertyOnepageForm::className(), ['property_id' => 'id']);
}
}
