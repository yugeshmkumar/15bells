<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "save_search".
 *
 * @property integer $id
 * @property string $role_type
 * @property string $search_for
 * @property string $type
 * @property string $geometry
 * @property string $radius
 * @property integer $user_id
 * @property string $location_name
 * @property integer $expectation_id
 * @property string $status
 * @property string $created_date
 */
class SaveSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'save_search';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_type', 'created_date'], 'required'],
            [['role_type', 'search_for', 'geometry', 'status'], 'string'],
            [['user_id', 'expectation_id'], 'integer'],
            [['created_date'], 'safe'],
            [['type'], 'string', 'max' => 50],
            [['radius'], 'string', 'max' => 100],
            [['location_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
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
            'expectation_id' => 'Expectation ID',
            'status' => 'Status',
            'created_date' => 'Created Date',
        ];
    }
}
