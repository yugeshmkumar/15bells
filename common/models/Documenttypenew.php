<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "documenttype".
 *
 * @property integer $documenttypeID
 * @property integer $documentConfigID
 * @property string $documentTypeName
 * @property integer $user_login_as
 */
class Documenttypenew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documenttype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documentConfigID', 'user_login_as'], 'integer'],
            [['documentTypeName'], 'required'],
            [['documentTypeName'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'documenttypeID' => Yii::t('app', 'Document ID'),
            'documentConfigID' => Yii::t('app', 'Document Type '),
            'documentTypeName' => Yii::t('app', 'Document Name'),
            'user_login_as' => Yii::t('app', 'If Login As'),
        ];
    }
	 public function getDocumentsconfig()
    {
        return $this->hasOne(Documentsconfig::className(), ['documentsconfigID' => 'documentConfigID']);
    }
	public function getLoginAsConfig()
    {
        return $this->hasOne(LoginAsConfig::className(), ['id' => 'user_login_as']);
    }
}
