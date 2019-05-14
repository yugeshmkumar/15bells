<?php

namespace frontend\modules\comm\models;

use Yii;

/**
 * This is the model class for table "message_groups".
 *
 * @property integer $id
 * @property string $listname
 * @property integer $userID
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class MessageGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['listname', 'userID'], 'required'],
            [['listname'], 'string'],
            //[['userID', 'isactive'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'listname' => Yii::t('app', 'Group Name'),
            'userID' => Yii::t('app', 'Users'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'isactive' => Yii::t('app', 'Isactive'),
        ];
    }
}
