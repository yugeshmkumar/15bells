<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "save_searches".
 *
 * @property int $id
 * @property string $role_type
 * @property string $search_for
 * @property string $type
 * @property string $geometry
 * @property string $radius
 * @property int $user_id
 * @property string $location_name
 * @property string $town
 * @property string $sector
 * @property string $country
 * @property double $lat
 * @property double $lng
 * @property int $property_type
 * @property int $area
 * @property string $area_unit
 * @property int $min_prices
 * @property int $max_prices
 * @property string $property_auction_type
 * @property string $status
 * @property string $created_date
 * @property string $updated_date
 */
class SaveSearches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'save_searches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_type', 'created_date'], 'required'],
            [['role_type', 'geometry', 'status'], 'string'],
            [['user_id', 'property_type', 'area', 'min_prices', 'max_prices'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['created_date', 'updated_date'], 'safe'],
            [['search_for'], 'string', 'max' => 15],
            [['type', 'property_auction_type'], 'string', 'max' => 50],
            [['radius'], 'string', 'max' => 100],
            [['location_name', 'country'], 'string', 'max' => 200],
            [['town', 'sector'], 'string', 'max' => 250],
            [['area_unit'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_type' => 'Role Type',
            'search_for' => 'Search For',
            'type' => 'Type',
            'geometry' => 'Geometry',
            'radius' => 'Radius',
            'user_id' => 'User ID',
            'location_name' => 'Location Name',
            'town' => 'Town',
            'sector' => 'Sector',
            'country' => 'Country',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'property_type' => 'Property Type',
            'area' => 'Area',
            'area_unit' => 'Area Unit',
            'min_prices' => 'Min Prices',
            'max_prices' => 'Max Prices',
            'property_auction_type' => 'Property Auction Type',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
