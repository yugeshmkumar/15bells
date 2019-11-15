<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bells_notifications".
 *
 * @property integer $id
 * @property string $descr
 * @property string $when
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class BellsNotifications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bells_notifications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descr', 'when'], 'string'],
            [['created_at', 'updated_at','process_name'], 'safe'],
            [['isactive'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descr' => Yii::t('app', 'Descr'),
            'when' => Yii::t('app', 'When'),
			'process_name'=> Yii::t('app', 'process_name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
