<?php

use yii\helpers\Html;
use \kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AggrementmgmtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aggrementmgmts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aggrementmgmt-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('<i class="fa fa-plus"></i> Add', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => '\kartik\grid\SerialColumn'],

          //  'id',
            'subject:ntext',
            'content:ntext',
           // 'decription:ntext',
            ['attribute'=>'roleid',
			 'value' =>function($data){
				 return \common\models\UserRoles::findOne($data->roleid)->rolename;
			 }
			],
			['attribute'=>'fromdatetime',
			'format'=>'date',
			 'value' =>function($data){
				 return $data->fromdatetime;
			 }
			],
			
            
           [
        'class' => '\kartik\grid\BooleanColumn',
		'width'=>'150px',
		'attribute'=>'aggrement_status',
        'trueLabel' => 'Yes', 
        'falseLabel' => 'No'
    ],
             
             'eventname',
            // 'ispublish',
            // 'created_at',
            // 'updated_at',
            // 'isactive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
