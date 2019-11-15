<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leadcurrentstatus".
 *
 * @property integer $id
 * @property integer $leadid
 * @property integer $productid
 * @property integer $statusid
 * @property integer $leadactionstatus
 * @property integer $isactive
 * @property string $created_at
 * @property string $moved_at
 * @property string $special
 */
class Leadcurrentstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leadcurrentstatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'leadid' => 'Leadid',
            'productid' => 'Productid',
            'statusid' => 'Statusid',
            'leadactionstatus' => 'Leadactionstatus',
            'isactive' => 'Isactive',
            'created_at' => 'Created At',
            'moved_at' => 'Moved At',
            'special' => 'Special',
        ];
    }
}
