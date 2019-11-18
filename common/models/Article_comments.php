<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_comments".
 *
 * @property int $id
 * @property int $article_id
 * @property string $comment_name
 * @property string $comment_description
 * @property string $status
 * @property string $created_date
 */
class Article_comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id'], 'integer'],
            [['comment_description', 'comment_name'], 'required'],
            [['comment_description'], 'string'],
            [['created_date'], 'safe'],
            [['comment_name'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'comment_name' => 'Your Name',
            'comment_description' => 'Comment',
            'status' => 'Status',
            'created_date' => 'Created Date',
        ];
    }
}