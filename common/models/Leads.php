<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leads".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property string $email
 * @property string $location
 * @property integer $role_id
 * @property string $name
 * @property string $countrycode
 * @property string $number
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Leads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leads';
    }

    /**
     * @inheritdoc
     */

    public $sales_id;

    public function rules()
    {
        return [
            [['user_id', 'product_id', 'role_id','sales_id', 'isactive'], 'integer'],
            [['email', 'location', 'name', 'countrycode', 'number','linkedin_id','facebook_id'], 'string'],
            [['created_at', 'updated_at','tags'], 'safe'],
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
            'product_id' => Yii::t('app', 'Product ID'),
            'email' => Yii::t('app', 'Email'),
            'location' => Yii::t('app', 'Location'),
            'role_id' => Yii::t('app', 'Role ID'),
            'name' => Yii::t('app', 'Name'),
            'countrycode' => Yii::t('app', 'Countrycode'),
            'number' => Yii::t('app', 'Number'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
