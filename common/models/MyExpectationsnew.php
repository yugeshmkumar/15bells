<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "my_expectations".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $user_type
 * @property integer $property_id
 * @property integer $property_type
 * @property string $save_search_as
 * @property string $location
 * @property string $lat
 * @property string $long
 * @property string $possession
 * @property string $deposit
 * @property string $agreement
 * @property integer $tenure
 * @property string $lock_in_period
 * @property string $rent
 * @property string $escalation
 * @property string $maintenance
 * @property string $working_hour_restrict
 * @property string $created_date
 * @property string $is_active
 */
class MyExpectationsnew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_expectations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'property_id', 'property_type', 'tenure'], 'integer'],
            //[['user_type', 'property_type', 'save_search_as', 'location', 'lat', 'long', 'possession', 'deposit', 'agreement', 'tenure', 'lock_in_period', 'rent', 'escalation', 'maintenance', 'working_hour_restrict', 'created_date'], 'required'],
            [[ 'save_search_as'], 'required'],
            [['user_type', 'lat', 'long', 'possession', 'agreement', 'working_hour_restrict', 'is_active'], 'string'],
            [['created_date'], 'safe'],
            [['save_search_as'], 'string', 'max' => 50],
            [['location'], 'string', 'max' => 200],
            [['deposit', 'rent', 'escalation', 'maintenance'], 'string', 'max' => 150],
            [['lock_in_period'], 'string', 'max' => 100],
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
            'property_type' => 'Property Type',
            'save_search_as' => 'Save Search As',
            'location' => 'Location',
            'lat' => 'Lat',
            'long' => 'Long',
            'possession' => 'Possession',
            'deposit' => 'Deposit',
            'agreement' => 'Agreement',
            'tenure' => 'Tenure',
            'lock_in_period' => 'Lock In Period',
            'rent' => 'Rent',
            'escalation' => 'Escalation',
            'maintenance' => 'Maintenance',
            'working_hour_restrict' => 'Working Hour Restrict',
            'created_date' => 'Created Date',
            'is_active' => 'Is Active',
        ];
    }
    public function getPropertytypes()
	{
		return $this->hasOne(PropertyType::className(), ['id' => 'property_type']);
	}
}
