<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SellorExpectationsbinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Sellor Expectationsbins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sellor-expectationsbin-index">

    
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
   [
'class' => 'kartik\grid\ExpandRowColumn',
'expandAllTitle' => 'Expand all',
'collapseTitle' => 'Collapse all',
'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
'value' => function ($model, $key, $index, $column) {
return GridView::ROW_COLLAPSED;
},
'detailUrl' => yii\helpers\Url::to(['/sellor-expectationsbin/view']),
'detailRowCssClass' => GridView::TYPE_DEFAULT,
'pageSummary' => false,
],
            //'id',
           // 'user_id',
           
			 ['attribute'=>'property_id',
			  'label'=>'Property',
			  'value'=>function($data)
			  {
				  if(isset(\common\models\Addproperty::findOne($data->property_id)->project_name)){
				  return \common\models\Addproperty::findOne($data->property_id)->project_name; }
				  else { return '' ;}
			  }
			],
           
            'save_search_as',
            // 'expected_rate',
            // 'rate_negotiable',
            // 'payment_time:datetime',
            // 'payment_time_negotiable',
            // 'loan_against_property',
            // 'all_dues_cleared',
            // 'vastu_facing',
            // 'loan_to_be_applied',
            // 'is_active',
            // 'created_date',

            
        ],
    ]); ?>

</div>
