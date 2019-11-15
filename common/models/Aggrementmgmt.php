<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aggrementmgmt".
 *
 * @property integer $id
 * @property string $subject
 * @property string $content
 * @property string $decription
 * @property integer $roleid
 * @property integer $ispublish
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Aggrementmgmt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aggrementmgmt';
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
            'subject' => 'Subject',
            'content' => 'Content',
            'decription' => 'Decription',
            'roleid' => 'Role',
            'ispublish' => 'Publish',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Active',
        ];
    }
}
