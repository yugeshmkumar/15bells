<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "15bellsfaqs".
 *
 * @property integer $id
 * @property string $subject
 * @property string $content
 * @property string $content_description
 * @property integer $role
 * @property string $page
 * @property string $publishstatus
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Bellsfaqs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '15bellsfaqs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'content', 'page', 'publishstatus'], 'string'],
           // [['role', 'isactive'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'content' => 'Content',
            'content_description' => 'Content Description',
            'role' => 'Role',
            'page' => 'Page',
            'publishstatus' => 'Publishstatus',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
