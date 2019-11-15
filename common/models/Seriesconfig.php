<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seriesconfig".
 *
 * @property integer $idseriesconfig
 * @property string $seriesname
 * @property integer $startpoint
 * @property integer $endpoint
 * @property integer $currentpoint
 * @property string $module
 * @property string $schoolyear
 * @property string $financialyear
 */
class Seriesconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seriesconfig';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seriesname', 'startpoint', 'endpoint', 'module', 'schoolyear', 'financialyear'], 'required'],
            [['startpoint', 'endpoint', 'currentpoint'], 'integer'],
            [['module'], 'string'],
            [['seriesname', 'financialyear'], 'string', 'max' => 150],
            [['schoolyear'], 'string', 'max' => 160],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idseriesconfig' => 'Idseriesconfig',
            'seriesname' => 'Seriesname',
            'startpoint' => 'Startpoint',
            'endpoint' => 'Endpoint',
            'currentpoint' => 'Currentpoint',
            'module' => 'Module',
            'schoolyear' => 'Schoolyear',
            'financialyear' => 'Financialyear',
        ];
    }
}
