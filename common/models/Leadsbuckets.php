<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leadsbuckets".
 *
 * @property integer $id
 * @property string $bucketname
 * @property string $description
 * @property string $bucketfor
 * @property integer $isactive
 * @property string $created_at
 * @property string $updated_at
 */
class Leadsbuckets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leadsbuckets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bucketname', 'description', 'bucketfor'], 'required'],
            [['bucketname', 'description', 'bucketfor'], 'string'],
            [['isactive'], 'integer'],
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
            'bucketname' => 'Bucketname',
            'description' => 'Description',
            'bucketfor' => 'Bucketfor',
            'isactive' => 'Isactive',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
