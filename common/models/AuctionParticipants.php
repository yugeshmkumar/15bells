<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "auction_participants".
 *
 * @property integer $id
 * @property integer $vr_roomID
 * @property integer $roleID
 * @property integer $partcipantID
 * @property string $assigned_time
 * @property string $unassigned_time
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class AuctionParticipants extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auction_participants';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['vr_roomID', 'roleID', 'partcipantID'], 'required'],
           // [['vr_roomID', 'roleID', 'partcipantID', 'isactive'], 'integer'],
           // [['assigned_time', 'unassigned_time', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vr_roomID' => 'Vr Room ID',
            'roleID' => 'Role ID',
            'partcipantID' => 'Partcipant ID',
            'assigned_time' => 'Assigned Time',
            'unassigned_time' => 'Unassigned Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
