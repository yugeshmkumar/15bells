<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_comments".
 *
 * @property integer $id
 * @property string $comment
 * @property string $added_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class UserComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string'],
            [['added_by', 'created_at', 'updated_at','added_for'], 'safe'],
            [['isactive'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'added_by' => 'Added By',
			'added_for'=>'Added For',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
