<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "useragrrementstatus".
 *
 * @property integer $id
 * @property integer $agreementid
 * @property integer $status
 * @property string $agreed_at
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Useragrrementstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'useragrrementstatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreementid', 'status', 'isactive'], 'integer'],
            [['agreed_at', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agreementid' => 'Agreementid',
            'status' => 'Status',
            'agreed_at' => 'Agreed At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
