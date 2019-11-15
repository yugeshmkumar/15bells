<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leadassignment".
 *
 * @property integer $id
 * @property integer $leadid
 * @property integer $lead_current_status_ID
 * @property integer $assigned_toID
 * @property string $currentstar
 * @property integer $isactive
 * @property string $created_at
 * @property string $updated_at
 * @property string $assigned_at
 * @property string $unassigned_at
 * @property integer $old_assigned_to
 * @property string $reassigned_at
 * @property string $comments
 */
class Leadassignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leadassignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['leadid', 'lead_current_status_ID', 'assigned_toID', 'isactive', 'old_assigned_to'], 'integer'],
            [['lead_current_status_ID', 'assigned_toID', 'assigned_at'], 'required'],
            [['currentstar', 'comments'], 'string'],
            [['created_at', 'updated_at', 'assigned_at', 'unassigned_at', 'reassigned_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'leadid' => Yii::t('app', 'Leadid'),
            'lead_current_status_ID' => Yii::t('app', 'Lead Current Status  ID'),
            'assigned_toID' => Yii::t('app', 'Assigned To ID'),
            'currentstar' => Yii::t('app', 'Currentstar'),
            'isactive' => Yii::t('app', 'Isactive'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'assigned_at' => Yii::t('app', 'Assigned At'),
            'unassigned_at' => Yii::t('app', 'Unassigned At'),
            'old_assigned_to' => Yii::t('app', 'Old Assigned To'),
            'reassigned_at' => Yii::t('app', 'Reassigned At'),
            'comments' => Yii::t('app', 'Comments'),
        ];
    }
}
