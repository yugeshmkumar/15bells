<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vr_setup".
 *
 * @property integer $id
 * @property string $auction_type
 * @property integer $propertyID
 * @property integer $moderatorID
 * @property string $fromdatetime
 * @property string $todatetime
 * @property string $status
 * @property string $secret_code
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class VrSetup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 const STATUS_FORWARD = "forward_auction";
     const STATUS_REVERSE = "reverse_auction";
	 const STATUS_INSTANT = "instant";
	         
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
            [['auction_type', 'status', 'secret_code','name'], 'string'],
            [['propertyID', 'moderatorID', 'isactive'], 'integer'],
            [['fromdatetime', 'todatetime'], 'required'],
            [['fromdatetime', 'todatetime', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auction_type' => 'Auction Type',
            'propertyID' => 'Property',
            'moderatorID' => 'Moderator',
            'fromdatetime' => 'Start Date Time',
            'todatetime' => 'End Date Time',
            'status' => 'Status',
            'secret_code' => 'Secret Code',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
	public static function getAuctiontype($status = false)
    {
        $statuses = [
            self::STATUS_FORWARD => Yii::t('common', 'forward_auction'),
            self::STATUS_REVERSE => Yii::t('common', 'reverse_auction'),
			 self::STATUS_INSTANT => Yii::t('common', 'instant')
        ];
        return $status !== false ? ArrayHelper::getValue($statuses, $status) : $statuses;
    }
}
