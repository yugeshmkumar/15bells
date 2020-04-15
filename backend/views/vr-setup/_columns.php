
<?php
use yii\helpers\Url;
use kartik\grid\GridView;
$arrlist = ['forward_auction','reverse_auction','instant']; 
return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
	[
'class' => 'kartik\grid\ExpandRowColumn',
'expandAllTitle' => 'Expand all',
'collapseTitle' => 'Collapse all',
'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
'value' => function ($model, $key, $index, $column) {
return GridView::ROW_COLLAPSED;
},
'detailUrl' => yii\helpers\Url::to(['/vr-setup/viewp']),
'detailRowCssClass' => GridView::TYPE_DEFAULT,
'pageSummary' => false,
],
        [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id',
		'format'=>'raw',
		'filter'=>false,
		'label'=>'Actions',
		'value'=>function($data,$model){
			if($data->isactive == 1){
			return '<a id="pulsate-regular" onclick=mybidfunct('.$data->id.');> <button class="btn btn-info">Enter VR Room</button></a>';
			}else {
				return '<button class="btn btn-default">Run Report</button>';
			}
		}
    ],
    [
         'class' => \common\grid\EnumColumn::className(),
        'attribute'=>'auction_type',
		 'enum' =>\common\models\VrSetup::getAuctiontype(),
		'filter'=>\common\models\VrSetup::getAuctiontype(),
		
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'propertyID',
		'value'=>function($data){
			return \common\models\Addpropertybackend::findOne($data->propertyID)->id;
		}
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'moderatorID',
		 'value'=>function($data){
			 $name = \common\models\CompanyEmpb::find()->where(['id'=>$data->moderatorID])->one();
                        if($name){
                             return $name->name;
                          }else{return 'No Name';}
                        

		}
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fromdatetime',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'todatetime',
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id',
		'format'=>'raw',
		'filter'=>false,
		'label'=>'Result',
		'value'=>function($data,$model){
            
			if($data->auction_type == 'forward_auction'){

			return '<button onclick="seeresultforward('.$data->id.')"   class="btn btn-success">Result VR Room</button>';
			}else {
                return '<button onclick="seeresultreverse('.$data->id.','.$data->brandID.')"  class="btn btn-success">Result VR Room</button>';
			}
		}
    ],

    // [
    //     'class' => 'kartik\grid\ActionColumn',
    //     'dropdown' => false,
    //     'vAlign'=>'middle',
    //     'urlCreator' => function($action, $model, $key, $index) { 
    //             return Url::to([$action,'id'=>$key]);
    //     },
    //     'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
    //     'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
    //     'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
    //                       'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
    //                       'data-request-method'=>'post',
    //                       'data-toggle'=>'tooltip',
    //                       'data-confirm-title'=>'Are you sure?',
    //                       'data-confirm-message'=>'Are you sure want to delete this item'], 
    // ],

    ['class' => 'yii\grid\ActionColumn'],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'status',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'secret_code',
    // ],
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
    

];   

