<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_kycdocuments".
 *
 * @property integer $id
 * @property integer $userid
 * @property string $document_name
 * @property string $file_type
 * @property string $docment_file_name
 * @property string $document_file_path
 * @property string $document_file_name_extenstn
 * @property integer $approve_status
 * @property string $approve_reason
 * @property integer $approved_by
 * @property string $approved_at
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class UserKycdocuments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_kycdocuments';
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
            'userid' => 'Userid',
            'document_name' => 'Document Name',
            'file_type' => 'File Type',
            'docment_file_name' => 'Docment File Name',
            'document_file_path' => 'Document File Path',
            'document_file_name_extenstn' => 'Document File Name Extenstn',
            'approve_status' => 'Approve Status',
            'approve_reason' => 'Approve Reason',
            'approved_by' => 'Approved By',
            'approved_at' => 'Approved At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
