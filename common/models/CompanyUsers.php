<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_users".
 *
 * @property integer $id
 * @property integer $admin_user_id
 * @property integer $company_id
 * @property integer $subuser_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class CompanyUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_user_id', 'company_id', 'subuser_id'], 'required'],
            [['admin_user_id', 'company_id', 'subuser_id', 'isactive'], 'integer'],
            [['created_at', 'updated_at','fname'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_user_id' => 'Admin User ID',
            'company_id' => 'Company ID',
            'subuser_id' => 'Subuser ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
