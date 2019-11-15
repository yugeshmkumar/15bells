<?php

use yii\helpers\Html;
use \kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeadrequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leadrequests';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php 

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => 
   [
    ['class' => 'kartik\grid\SerialColumn'],
	 ['class' => 'kartik\grid\CheckboxColumn'],
	  [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => true,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { return '#';
		
		},
       'viewOptions'=>['title'=>"View", 'data-toggle'=>'tooltip'],
        'updateOptions'=>['title'=>"Update", 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['title'=>"Delete", 'data-toggle'=>'tooltip'], 
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'requestName',
        'pageSummary' => 'Page Total',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
        'editableOptions'=>['header'=>'Name', 'size'=>'md']
    ],
	[
       
		
        'attribute'=>'leadRequestID', 
		'label'=>'Product Type',
		'vAlign'=>'middle',
        'format'=>'raw',
        'width'=>'200px',
        'noWrap'=>true,
		  'value'=>function ($data) {
			$getleadstatus = \common\models\Leadcurrentstatus::find()->where(['leadid'=>$data->leadRequestID,'isactive'=>1])->one();
			if($getleadstatus){
            return "<code>" . 
                \common\models\Leadsproduct::findOne($getleadstatus->productid)->producttype . '</code>';
			}else{
				return "<span class='badge' style='background-color: black'> </span>  <code>" . 
                NILL . '</code>';
			}
        },
    ],
	 [
        'attribute'=>'applyDate',
		'label'=>'Apply Date',
		'format'=>'date',
        'value'=>'applyDate'
		],
    [
        'attribute'=>'color',
		'label'=>'Status',
        'value'=>function ($data) {
			$getleadstatus = \common\models\Leadcurrentstatus::find()->where(['leadid'=>$data->leadRequestID,'isactive'=>1])->one();
			if($getleadstatus){
            return "<span class='badge' style='background-color: {$data->color}'> </span>  <code>" . 
                \common\models\Leadsbuckets::findOne($getleadstatus->statusid)->bucketname . '</code>';
			}else{
				return "<span class='badge' style='background-color: black'> </span>  <code>" . 
                NILL . '</code>';
			}
        },
		'filter'=>true,
        'filterType'=>GridView::FILTER_COLOR,
        'vAlign'=>'middle',
        'format'=>'raw',
        'width'=>'150px',
        'noWrap'=>true
    ],
    [
        'class'=>'kartik\grid\BooleanColumn',
		'label'=>'Active',
        'attribute'=>'status', 
		
        'vAlign'=>'middle',
    ],
   
    ['class' => 'kartik\grid\CheckboxColumn']
],
     'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax'=>true, // pjax is set to always true for this demo
    // set your toolbar
    'toolbar'=> [
        ['content'=>
		Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-circle btn-icon-only btn-default toggler tooltips' , 'data-container'=>"body", 'data-placement'=>"left" ,'data-html'=>"true" , 'data-original-title' =>"Add new Lead"]).''.
   
											
                                        '<a class="btn btn-circle btn-icon-only btn-default toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="Send Email">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="Send SMS">
                                            <i class="fa fa-phone"></i>
                                        </a>'
               ],
        '{export}',
        //'{toggleData}',
    ],
    // set export properties
    'export'=>[
        'fontAwesome'=>true
    ],
    // parameters from the demo form
    'bordered'=>true,
    'striped'=>true,
    'condensed'=>true,
    'responsive'=>true,
    'hover'=>true,
    'showPageSummary'=>true,
    'panel'=>[
        'type'=>GridView::TYPE_DEFAULT,
        'heading'=>false,
    ],
    'persistResize'=>true,
    'exportConfig'=>true,

]);
?>
   
 <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      

       