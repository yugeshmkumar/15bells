<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'userid',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'companyid',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'userprofile_exID',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'userprofileID',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'role_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'employee_typeID',
    // ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'name',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
		 'width'=>'250px',
         'attribute'=>'employee_email',
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'employee_number',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'designation',
		'value'=>function($data){
			if(isset($data->designation)){
			return \common\models\Designations::findOne($data->designation)->name;
		}}
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'managerID',
		'format'=>'raw',
		'value'=>function($data){
		if(isset($data->managerID)){
			return \common\models\CompanyEmpb::findOne($data->managerID)->name;
		} else {
			return '<i><b>None</b></i>';
		}
		}
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'isactive',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to disable this item'], 
    ],

];   