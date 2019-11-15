<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leadstatusconfig".
 *
 * @property integer $id
 * @property integer $statusid
 * @property string $action
 * @property string $name
 * @property integer $percent
 * @property string $percentsum
 * @property integer $isactive
 * @property string $created_at
 * @property string $updated_at
 */
class Leadstatusconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leadstatusconfig';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statusid', 'percent', 'isactive'], 'integer'],
            [['action', 'name', 'percentsum'], 'string'],
            [['created_at', 'updated_at','icon','onClick'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'statusid' => 'Statusid',
            'action' => 'Action',
            'name' => 'Name',
            'percent' => 'Percent',
            'percentsum' => 'Percentsum',
            'isactive' => 'Isactive',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
