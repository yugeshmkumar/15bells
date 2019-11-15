<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "agreement_log".
 *
 * @property integer $id
 * @property integer $agreement_id
 * @property integer $user_id
 * @property string $accept_date
 * @property integer $curr_validity
 * @property integer $role_id
 * @property integer $isactive
 * @property string $created_at
 * @property string $updated_at
 */
class AgreementLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agreement_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_id', 'user_id', 'accept_date', 'role_id'], 'required'],
            [['agreement_id', 'user_id', 'curr_validity', 'role_id', 'isactive'], 'integer'],
            [['accept_date', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agreement_id' => 'Agreement',
            'user_id' => 'User',
            'accept_date' => 'Accept Date',
            'curr_validity' => 'Currrent Validity',
            'role_id' => 'Role',
            'isactive' => 'Isactive',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
