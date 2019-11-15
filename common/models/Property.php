<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $roleid
 * @property integer $projectypeid
 * @property string $propertydescr
 * @property string $property_for
 * @property string $location
 * @property string $locality
 * @property double $longitude
 * @property double $latitude
 * @property string $city
 * @property string $state
 * @property string $address
 * @property string $country
 * @property string $property_features
 * @property string $building_no
 * @property string $building_name
 * @property string $totalrooms
 * @property string $totalfloors
 * @property string $floorno
 * @property string $totalbalconies
 * @property string $furnishedstatus
 * @property string $on_road
 * @property string $walls_made
 * @property string $office_space_shared
 * @property string $personal_washrooms
 * @property string $pantry_available
 * @property string $total_area
 * @property string $built-up_area
 * @property string $carpet_area
 * @property string $expected_price
 * @property string $price_per_sqft
 * @property string $maintaince_cost
 * @property string $maintaince_by
 * @property string $include_stamp_reg_charges
 * @property string $brokers_response
 * @property string $available_from_month
 * @property string $available_from_year
 * @property string $last_updated
 * @property integer $visibility_flags
 * @property integer $marketing_flags
 * @property string $ratings
 * @property string $count_views
 * @property integer $property_status_flags
 * @property string $featured_image
 * @property string $featured_thumbnails_id
 * @property string $marketing_cost
 * @property string $registry_cost
 * @property string $electricity_charges
 * @property string $maintainces_charges
 * @property string $deposite_amount
 * @property string $rules_regulations
 * @property string $notice_period
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           /* [['userid', 'roleid', 'projectypeid'], 'required'],
            [['userid', 'roleid', 'projectypeid', 'visibility_flags', 'marketing_flags', 'property_status_flags', 'isactive'], 'integer'],
            [['propertydescr', 'property_for', 'location', 'locality', 'city', 'state', 'address', 'country', 'property_features', 'building_name', 'furnishedstatus', 'on_road', 'walls_made', 'office_space_shared', 'personal_washrooms', 'pantry_available', 'total_area', 'built-up_area', 'carpet_area', 'maintaince_by', 'include_stamp_reg_charges', 'brokers_response', 'available_from_month', 'ratings', 'count_views', 'featured_image', 'featured_thumbnails_id', 'marketing_cost', 'registry_cost', 'electricity_charges', 'maintainces_charges', 'deposite_amount', 'rules_regulations'], 'string'],
            [['longitude', 'latitude'], 'number'],
            [['last_updated', 'created_at', 'updated_at'], 'safe'],
            [['building_no', 'totalrooms', 'totalfloors', 'floorno', 'totalbalconies', 'expected_price', 'price_per_sqft', 'maintaince_cost'], 'string', 'max' => 200],
            [['available_from_year'], 'string', 'max' => 50],
            [['notice_period'], 'string', 'max' => 100],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'roleid' => 'Roleid',
            'projectypeid' => 'Projectypeid',
            'propertydescr' => 'Propertydescr',
            'property_for' => 'Property For',
            'location' => 'Location',
            'locality' => 'Locality',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'city' => 'City',
            'state' => 'State',
            'address' => 'Address',
            'country' => 'Country',
            'property_features' => 'Property Features',
            'building_no' => 'Building No',
            'building_name' => 'Building Name',
            'totalrooms' => 'Totalrooms',
            'totalfloors' => 'Totalfloors',
            'floorno' => 'Floorno',
            'totalbalconies' => 'Totalbalconies',
            'furnishedstatus' => 'Furnishedstatus',
            'on_road' => 'On Road',
            'walls_made' => 'Walls Made',
            'office_space_shared' => 'Office Space Shared',
            'personal_washrooms' => 'Personal Washrooms',
            'pantry_available' => 'Pantry Available',
            'total_area' => 'Total Area',
            'built_up_area' => 'Built Up Area',
            'carpet_area' => 'Carpet Area',
            'expected_price' => 'Expected Price',
            'price_per_sqft' => 'Price Per Sqft',
            'maintaince_cost' => 'Maintaince Cost',
            'maintaince_by' => 'Maintaince By',
            'include_stamp_reg_charges' => 'Include Stamp Reg Charges',
            'brokers_response' => 'Brokers Response',
            'available_from_month' => 'Available From Month',
            'available_from_year' => 'Available From Year',
            'last_updated' => 'Last Updated',
            'visibility_flags' => 'Visibility Flags',
            'marketing_flags' => 'Marketing Flags',
            'ratings' => 'Ratings',
            'count_views' => 'Count Views',
            'property_status_flags' => 'Property Status Flags',
            'featured_image' => 'Featured Image',
            'featured_thumbnails_id' => 'Featured Thumbnails ID',
            'marketing_cost' => 'Marketing Cost',
            'registry_cost' => 'Registry Cost',
            'electricity_charges' => 'Electricity Charges',
            'maintainces_charges' => 'Maintainces Charges',
            'deposite_amount' => 'Deposite Amount',
            'rules_regulations' => 'Rules Regulations',
            'notice_period' => 'Notice Period',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
public function getlatlang($newlocation) {
		
        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . urlencode($newlocation) . '&sensor=false');
        $output = json_decode($geocode);
        return $output->results[0]->geometry->location;
    }
}
