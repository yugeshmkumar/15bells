<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "media_files".
 *
 * @property integer $id
 * @property string $type
 * @property string $link
 * @property string $file_name
 * @property string $file_descr
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class MediaFiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media_files';
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
            'type' => 'Type',
            'link' => 'Link',
            'file_name' => 'File Name',
            'file_descr' => 'File Descr',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
