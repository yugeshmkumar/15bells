<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_emp".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $companyid
 * @property integer $userprofile_exID
 * @property integer $userprofileID
 * @property integer $role_id
 * @property integer $employee_typeID
 * @property integer $department_ID
 * @property string $email
 * @property string $employee_number
 * @property string $designation
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class CompanyEmpuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_emp';
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
            'companyid' => 'Companyid',
            'userprofile_exID' => 'Userprofile Ex ID',
            'userprofileID' => 'Userprofile ID',
            'role_id' => 'Role ID',
            'employee_typeID' => 'Employee Type ID',
            'department_ID' => 'Department  ID',
            'email' => 'Employee Email',
            'employee_number' => 'Employee Number',
            'designation' => 'Designation',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
