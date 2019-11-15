<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyEmp */
?>
<div class="company-emp-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userid',
            'companyid',
            'userprofile_exID',
            'userprofileID',
            'role_id',
            'employee_typeID',
            'department_ID',
            'employee_email:ntext',
            'employee_number',
            'designation:ntext',
            'created_at',
            'updated_at',
            'isactive',
        ],
    ]) ?>

</div>
