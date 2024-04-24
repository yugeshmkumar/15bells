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
 * @property integer $managerID
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class CompanyEmpb extends \yii\db\ActiveRecord
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
            [['name', 'designation','employee_email','employee_number'], 'required'],
            [['userid', 'companyid', 'userprofile_exID', 'userprofileID', 'employee_typeID', 'department_ID', 'managerID', 'isactive'], 'integer'],
            [['designation','location'], 'string'],
			 ['employee_email', 'unique',
                'targetClass'=> '\common\models\User',
                'message' => Yii::t('frontend', 'This email address has already been taken.')
            ],
            [['created_at', 'updated_at','name', 'role_id'], 'safe'],
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
            'companyid' => 'Company',
            'userprofile_exID' => 'Userprofile Ex ID',
            'userprofileID' => 'Userprofile ID',
            'role_id' => 'Role',
			'name'=>'Name',
			'location'=>'location',
            'employee_typeID' => 'Employee Type',
            'department_ID' => 'Department',
            'employee_email' => 'Employee Email',
            'employee_number' => 'Employee Number',
            'designation' => 'Designation',
            'managerID' => 'Manager',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
	
	 public function getDesignations()
     {
         return $this->hasOne(\common\models\Designations::className(), ['id'=>'designation']);
     }

}
