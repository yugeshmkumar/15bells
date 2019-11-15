<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "property_nearby_places".
 *
 * @property int $id
 * @property int $property_id
 * @property string $places_name
 * @property int $is_active
 * @property string $created_date
 */
class Property_nearby_places extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property_nearby_places';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_id', 'places_name', 'is_active', 'created_date'], 'required'],
            [['property_id', 'is_active'], 'integer'],
            [['created_date'], 'safe'],
            [['places_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'property_id' => 'Property ID',
            'places_name' => 'Places Name',
            'is_active' => 'Is Active',
            'created_date' => 'Created Date',
        ];
    }
}
