<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "media_files_config".
 *
 * @property integer $id
 * @property integer $property_id
 * @property integer $media_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class MediaFilesConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media_files_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'property_id' => 'Property ID',
            'media_id' => 'Media ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
