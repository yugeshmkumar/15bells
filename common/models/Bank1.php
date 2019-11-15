<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property integer $id
 * @property string $bank_name
 * @property integer $user_id
 * @property string $account_no
 * @property string $isfc_code
 * @property string $zip_code
 * @property string $account_type
 * @property string $branch_name
 * @property string $bank_accnt_name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 * @property string $user_auth
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_name', 'user_id', 'account_type', 'branch_name', 'bank_accnt_name','isfc_code','zip_code','account_no'], 'required'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_name' => 'Bank Name',
            'user_id' => 'User ID',
            'account_no' => 'Account No',
            'isfc_code' => 'Isfc Code',
            'zip_code' => 'Zip Code',
            'account_type' => 'Account Type',
            'branch_name' => 'Branch Name',
            'bank_accnt_name' => 'Bank Accnt Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
            'user_auth' => 'User Auth',
        ];
    }
}
