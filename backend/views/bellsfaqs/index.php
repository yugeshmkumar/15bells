<?php

use yii\helpers\Html;
use  \kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BellsfaqsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bellsfaqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bellsfaqs-index">

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => '\kartik\grid\SerialColumn'],
          ['attribute'=> 'subject:ntext',
		    'value'=>function($data){
				return $data->subject;
			},
			  'vAlign'=>'middle',
        'format'=>'raw',
        'width'=>'150px',
		  
		  ],
            'content:ntext',
           'content_description:ntext',
	['attribute'=> 'page',
		    'value'=>function($data){
				return $data->page;
			},
			  'vAlign'=>'middle',
        'format'=>'raw',
        'width'=>'100px',
		  
		  ],
		  	   ['attribute'=> 'publishstatus',
		    'value'=>function($data){
				return $data->publishstatus;
			},
			  'vAlign'=>'middle',
        'format'=>'raw',
        'width'=>'100px',
		  
		  ],
            
          

            ['class' =>  '\kartik\grid\ActionColumn'],
        ],
		 'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    'beforeHeader'=>[
        [
           
            'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],
    'toolbar' =>  [
         ['content'=>
            Html::a('<i class="fa fa-plus"></i> ADD FAQ', ['create'], ['data-pjax'=>0,'format'=>'raw', 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'ADD FAQ')])
        ],
        '{export}',
        '{toggleData}'
    ],
    'pjax' => true,
    'bordered' => true,
    'striped' => false,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'floatHeaderOptions' => ['scrollingTop' =>false],
    'showPageSummary' => true,
    'panel' => [
        'type' => GridView::TYPE_INFO
    ],
    ]); ?>

</div>
