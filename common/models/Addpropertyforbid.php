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
 * @property integer $total_plot_area
 * @property string $plot_unit
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
 * @property integer $is_active
 * @property string $created_date
 * @property string $status
 */
class Addpropertyforbid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['user_id', 'role_id', 'project_name', 'property_for', 'project_type_id', 'request_for', 'city', 'locality', 'address', 'longitude', 'latitude', 'membership_charge', 'availability', 'available_date', 'age_of_property', 'possesion_by', 'FAR_approval', 'furnished_status', 'created_date'], 'required'],
            [['user_id', 'project_type_id', 'city', 'total_plot_area', 'expected_price', 'asking_rental_price', 'price_sq_ft', 'price_acres', 'membership_charge', 'buildup_area', 'carpet_area', 'total_floors', 'property_on_floor', 'floors_allowed_construction', 'bedrooms', 'bathrooms', 'balconies', 'parking', 'is_active'], 'integer'],
            [['role_id', 'property_for', 'request_for', 'locality', 'address', 'plot_unit', 'price_negotiable', 'revenue_lauout', 'present_status', 'shed_RCC', 'maintenance_by', 'availability', 'available_from', 'age_of_property', 'possesion_by', 'rental_type', 'ownership', 'ownership_status', 'facing', 'LOAN_taken', 'build_unit', 'carpet_unit', 'configuration', 'pooja_room', 'study_room', 'servant_room', 'other_room', 'furnished_status', 'status'], 'string'],
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
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'role_id' => Yii::t('app', 'Role ID'),
            'project_name' => Yii::t('app', 'Project Name'),
            'property_for' => Yii::t('app', 'Property For'),
            'project_type_id' => Yii::t('app', 'Project Type ID'),
            'request_for' => Yii::t('app', 'Request For'),
            'featured_image' => Yii::t('app', 'Featured Image'),
            'featured_video' => Yii::t('app', 'Featured Video'),
            'city' => Yii::t('app', 'City'),
            'locality' => Yii::t('app', 'Locality'),
            'address' => Yii::t('app', 'Address'),
            'longitude' => Yii::t('app', 'Longitude'),
            'latitude' => Yii::t('app', 'Latitude'),
            'total_plot_area' => Yii::t('app', 'Total Plot Area'),
            'plot_unit' => Yii::t('app', 'Plot Unit'),
            'expected_price' => Yii::t('app', 'Expected Price'),
            'asking_rental_price' => Yii::t('app', 'Asking Rental Price'),
            'price_sq_ft' => Yii::t('app', 'Price Sq Ft'),
            'price_acres' => Yii::t('app', 'Price Acres'),
            'price_negotiable' => Yii::t('app', 'Price Negotiable'),
            'revenue_lauout' => Yii::t('app', 'Revenue Lauout'),
            'present_status' => Yii::t('app', 'Present Status'),
            'jurisdiction_development' => Yii::t('app', 'Jurisdiction Development'),
            'shed_RCC' => Yii::t('app', 'Shed  Rcc'),
            'maintenance_cost' => Yii::t('app', 'Maintenance Cost'),
            'maintenance_by' => Yii::t('app', 'Maintenance By'),
            'annual_dues_payable' => Yii::t('app', 'Annual Dues Payable'),
            'expected_rental' => Yii::t('app', 'Expected Rental'),
            'membership_charge' => Yii::t('app', 'Membership Charge'),
            'availability' => Yii::t('app', 'Availability'),
            'available_from' => Yii::t('app', 'Available From'),
            'available_date' => Yii::t('app', 'Available Date'),
            'age_of_property' => Yii::t('app', 'Age Of Property'),
            'possesion_by' => Yii::t('app', 'Possesion By'),
            'rental_type' => Yii::t('app', 'Rental Type'),
            'ownership' => Yii::t('app', 'Ownership'),
            'ownership_status' => Yii::t('app', 'Ownership Status'),
            'facing' => Yii::t('app', 'Facing'),
            'FAR_approval' => Yii::t('app', 'Far Approval'),
            'LOAN_taken' => Yii::t('app', 'Loan Taken'),
            'buildup_area' => Yii::t('app', 'Buildup Area'),
            'build_unit' => Yii::t('app', 'Build Unit'),
            'carpet_area' => Yii::t('app', 'Carpet Area'),
            'carpet_unit' => Yii::t('app', 'Carpet Unit'),
            'total_floors' => Yii::t('app', 'Total Floors'),
            'property_on_floor' => Yii::t('app', 'Property On Floor'),
            'configuration' => Yii::t('app', 'Configuration'),
            'floors_allowed_construction' => Yii::t('app', 'Floors Allowed Construction'),
            'bedrooms' => Yii::t('app', 'Bedrooms'),
            'bathrooms' => Yii::t('app', 'Bathrooms'),
            'balconies' => Yii::t('app', 'Balconies'),
            'pooja_room' => Yii::t('app', 'Pooja Room'),
            'study_room' => Yii::t('app', 'Study Room'),
            'servant_room' => Yii::t('app', 'Servant Room'),
            'other_room' => Yii::t('app', 'Other Room'),
            'furnished_status' => Yii::t('app', 'Furnished Status'),
            'parking' => Yii::t('app', 'Parking'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_date' => Yii::t('app', 'Created Date'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
