<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "my_expectations".
 *
 * @property integer $id
 * @property integer $property_id
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
class MyExpectations extends \yii\db\ActiveRecord
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
            [['possession', 'deposit', 'agreement','save_search_as','location', 'tenure', 'lock_in_period', 'rent', 'escalation', 'maintenance', 'working_hour_restrict', 'created_date'], 'required'],
            [['property_id', 'tenure'], 'integer'],
            [['possession', 'agreement', 'working_hour_restrict', 'is_active'], 'string'],
            [['created_date'], 'safe'],
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
            'save_search_as' => 'Name',
            'location' => 'Location',
            'lat' => 'Lattitude',
            'long' => 'Longitude',
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
}
