<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leadcurrentstatus_sales".
 *
 * @property integer $id
 * @property integer $leadid
 * @property integer $role_id
 * @property integer $productid
 * @property integer $statusid
 * @property integer $leadactionstatus
 * @property integer $isactive
 * @property string $created_at
 * @property string $moved_at
 * @property string $special
 */
class LeadcurrentstatusSales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leadcurrentstatus_sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['leadid', 'role_id', 'productid', 'statusid', 'leadactionstatus', 'isactive'], 'integer'],
            [['created_at', 'moved_at'], 'safe'],
            [['special'], 'string'],
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
            'role_id' => Yii::t('app', 'Role ID'),
            'productid' => Yii::t('app', 'Productid'),
            'statusid' => Yii::t('app', 'Statusid'),
            'leadactionstatus' => Yii::t('app', 'Leadactionstatus'),
            'isactive' => Yii::t('app', 'Isactive'),
            'created_at' => Yii::t('app', 'Created At'),
            'moved_at' => Yii::t('app', 'Moved At'),
            'special' => Yii::t('app', 'Special'),
        ];
    }
}
