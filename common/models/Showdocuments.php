<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "showdocuments".
 *
 * @property string $id
 * @property string $userid
 * @property string $propertyID
 * @property string $userroleID
 * @property string $created_at
 * @property integer $isactive
 */
class Showdocuments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'showdocuments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'propertyID', 'userroleID', 'created_at'], 'required'],
            [['userid', 'propertyID', 'isactive'], 'integer'],
            [['userroleID'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userid' => Yii::t('app', 'Userid'),
            'propertyID' => Yii::t('app', 'Property ID'),
            'userroleID' => Yii::t('app', 'Userrole ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
