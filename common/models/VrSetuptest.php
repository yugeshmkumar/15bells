<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vr_setup".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $auction_type
 * @property integer $propertyID
 * @property integer $moderatorID
 * @property string $fromdatetime
 * @property string $todatetime
 * @property string $status
 * @property integer $approverID
 * @property string $secret_code
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class VrSetuptest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vr_setup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['name', 'description', 'auction_type', 'status', 'secret_code'], 'string'],
            // [['propertyID', 'moderatorID', 'approverID', 'isactive'], 'integer'],
           // [['fromdatetime', 'todatetime', 'approverID'], 'required'],
            // [['fromdatetime', 'todatetime', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'auction_type' => Yii::t('app', 'Auction Type'),
            'propertyID' => Yii::t('app', 'Property ID'),
            'moderatorID' => Yii::t('app', 'Moderator ID'),
            'fromdatetime' => Yii::t('app', 'Fromdatetime'),
            'todatetime' => Yii::t('app', 'Todatetime'),
            'status' => Yii::t('app', 'Status'),
            'approverID' => Yii::t('app', 'Approver ID'),
            'secret_code' => Yii::t('app', 'Secret Code'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
