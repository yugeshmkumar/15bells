<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "VR_Win".
 *
 * @property int $id
 * @property int $vr_id
 * @property int $prop_id
 * @property int $lesse_buyer_id
 * @property int $lessor_seller_id
 * @property string $auction_type
 * @property int $status
 * @property string $created_date
 */
class VRWin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'VR_Win';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vr_id', 'auction_type', 'created_date'], 'required'],
            [['id', 'vr_id', 'prop_id', 'lesse_buyer_id', 'lessor_seller_id', 'status'], 'integer'],
            [['created_date'], 'safe'],
            [['auction_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vr_id' => 'Vr ID',
            'prop_id' => 'Prop ID',
            'lesse_buyer_id' => 'Lesse Buyer ID',
            'lessor_seller_id' => 'Lessor Seller ID',
            'auction_type' => 'Auction Type',
            'status' => 'Status',
            'created_date' => 'Created Date',
        ];
    }
}
