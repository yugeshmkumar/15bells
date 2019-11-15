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
 * @property string $employee_email
 * @property string $employee_number
 * @property string $designation
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class CompanyEmp extends \yii\db\ActiveRecord
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
            [['userid', 'companyid'], 'required'],
            [['userid', 'companyid', 'userprofile_exID', 'userprofileID', 'role_id', 'employee_typeID', 'department_ID', 'isactive'], 'integer'],
            [['employee_email', 'designation'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['employee_number'], 'string', 'max' => 50],
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
            'employee_email' => 'Employee Email',
            'employee_number' => 'Employee Number',
            'designation' => 'Designation',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
}
