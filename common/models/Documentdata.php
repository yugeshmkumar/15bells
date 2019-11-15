<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "documentdata".
 *
 * @property integer $documentDataID
 * @property string $documentFileName
 * @property integer $documentConfigID
 * @property integer $BusID
 */
class Documentdata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documentdata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documentFileName'], 'required'],
            [['documentFileName'], 'string'],
            [['documentConfigID', 'BusID','employeeID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'documentDataID' => Yii::t('app', 'Document Data ID'),
            'documentFileName' => Yii::t('app', 'Document File Name'),
            'documentConfigID' => Yii::t('app', 'Document Config ID'),
            'BusID' => Yii::t('app', 'Bus Number'),
            'employeeID' => Yii::t('app','Employee Name')
        ];
    }
}
