<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "property_amenities".
 *
 * @property int $id
 * @property int $property_id
 * @property string $amenities_name
 * @property int $is_active
 * @property string $created_date
 */
class Property_amenities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property_amenities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_id', 'amenities_name', 'is_active', 'created_date'], 'required'],
            [['property_id', 'is_active'], 'integer'],
            [['created_date'], 'safe'],
            [['amenities_name'], 'string', 'max' => 200],
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
            'amenities_name' => 'Amenities Name',
            'is_active' => 'Is Active',
            'created_date' => 'Created Date',
        ];
    }
}
