<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "documentsconfig".
 *
 * @property integer $documentsconfigID
 * @property string $documentType
 */
class Documentsconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documentsconfig';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documentType'], 'required'],
            [['documentType'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'documentsconfigID' => Yii::t('app', 'Documentsconfig ID'),
            'documentType' => Yii::t('app', 'Document Type'),
        ];
    }
}
