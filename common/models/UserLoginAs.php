<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_login_as".
 *
 * @property integer $id
 * @property string $login_as
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class UserLoginAs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_login_as';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login_as'], 'string'],
            [['created_at', 'updated_at','user_id','loginasID'], 'safe'],
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
			   'user_id' => Yii::t('app', 'user'),
            'login_as' => Yii::t('app', 'Login As'),
			'loginasID' => Yii::t('app', 'loginasID'),
			
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
    public function searchbystatus($statusid){

        $emp = \common\models\UserLoginAs::find()->where(['user_id'=>$statusid])->one();
        return $emp->login_as;
              }
}
