<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyEmpb */
?>
<div class="company-empb-view">
<p>
 <?php echo Html::a(Yii::t('backend', '<i class="fa fa-mail-reply"></i> Back to Add Employees', [
    'modelClass' => 'Designations',
]), ['/company-empb/index'], ['class' => 'btn btn-primary']) ?> </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
           // 'userid',
           // 'companyid',
           // 'userprofile_exID',
           // 'userprofileID',
            //'role_id',
            //'employee_typeID',
           // 'department_ID',
		   'name',
            'email:ntext',
            'employee_number',
			[                      // the owner name of the model
            'label' => 'Designation',
            'value' => function($data){
				return \common\models\Designations::findOne($data->designation)->name;
			},
        ],
		[                      // the owner name of the model
            'label' => 'Manager',
            'value' => function($data){
				if(isset($data->managerID)){
				return \common\models\CompanyEmpb::findOne($data->managerID)->name;
				} else {
			return 'None';
		}
			},
        ],
            
            //'companyEmpb.name',
           // 'created_at',
           // 'updated_at',
           // 'isactive',
        ],
    ]) ?>

</div>
