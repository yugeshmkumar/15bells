<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "websiteconfig".
 *
 * @property integer $id
 * @property string $page
 * @property string $content
 * @property string $content_descr
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Websiteconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'websiteconfig';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page', 'content'], 'string'],
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
            'id' => 'ID',
            'page' => 'Page',
            'content' => 'Content',
            'content_descr' => 'Content Descr',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
