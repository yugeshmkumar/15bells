<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "requested_biding_users".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $propertyID
 * @property integer $userroleID
 * @property string $request_for
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class RequestedBidingUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requested_biding_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'propertyID', 'userroleID', 'isactive'], 'integer'],
            [['request_for'], 'required'],
            [['request_for'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userid' => Yii::t('app', 'Userid'),
            'propertyID' => Yii::t('app', 'Property ID'),
            'userroleID' => Yii::t('app', 'Userrole ID'),
            'request_for' => Yii::t('app', 'Request For'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
