<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * Create user form
 */
class UserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $roles;
    public $fullname;
    public $lastname;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['fullname', 'required'],
            ['lastname', 'required'],
            ['username', 'unique', 'targetClass'=>'\common\models\User', 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass'=> '\common\models\User', 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],

            ['password', 'required', 'on'=>'create'],
            ['password', 'string', 'min' => 6],

            [['status'], 'boolean'],
            [['roles'], 'each',
                'rule' => ['in', 'range' => ArrayHelper::getColumn(
                    Yii::$app->authManager->getRoles(),
                    'name'
                )]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('backend', 'Username'),
            'email' => Yii::t('backend', 'Email'),
            'password' => Yii::t('backend', 'Password'),
            'roles' => Yii::t('backend', 'Roles')
        ];
    }

    public function setModel($model)
    {
        $this->username = $model->username;
        $this->email = $model->email;
        $this->status = $model->status;
        $this->model = $model;
        $this->roles = ArrayHelper::getColumn(
            Yii::$app->authManager->getRolesByUser($model->getId()),
            'name'
        );
        return $this->model;
    }

    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            $model->username = $this->username;
            $model->email = $this->email;
            $model->status = $this->status;
            $model->fullname = $this->fullname;
            $model->lastname = $this->lastname;
            $model->user_login_as = 'lessee';
            if ($this->password) {
                $model->setPassword($this->password);
            }

            // echo '<pre>';print_r($this->roles[0]);die;
            if ($model->save() && $isNewRecord) {
                $model->afterSignup();
            }
            $auth = Yii::$app->authManager;
            $auth->revokeAll($model->getId());
            $comrole = 'Company_user';
            $auth->assign($auth->getRole($comrole), $model->getId());

            // if ($this->roles && is_array($this->roles)) {
            //     foreach ($this->roles as $role) {
            //         $auth->assign($auth->getRole($role), $model->getId());
            //     }
            // }

            $user_id = Yii::$app->user->identity->id;       
            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s'); 
            $Leadcurrentstatus = new \common\models\Company_Subusers_Record();
			$Leadcurrentstatus->master_id =$user_id;
			$Leadcurrentstatus->subuser_id = $model->getId();
			$Leadcurrentstatus->created_date =$date;			
            $Leadcurrentstatus->save();
            

            return !$model->hasErrors();
        }
        return null;
    }
}
