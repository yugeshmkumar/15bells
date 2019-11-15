<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "login_as_config".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class LoginAsConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_as_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','login_to'], 'required'],
            [['name'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
            'name' => Yii::t('app', 'Name'),
			'login_to'=> Yii::t('app', 'Login As'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
