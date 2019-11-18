<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_author".
 *
 * @property int $id
 * @property string $author_name
 * @property string $author_email_id
 * @property string $author_description
 * @property string $created_date
 */
class Article_author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_description'], 'string'],
            [['created_date'], 'required'],
            [['created_date'], 'safe'],
            [['author_name'], 'string', 'max' => 200],
            [['author_email_id'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_name' => 'Author Name',
            'author_email_id' => 'Author Email ID',
            'author_description' => 'Author Description',
            'created_date' => 'Created Date',
        ];
    }
}
