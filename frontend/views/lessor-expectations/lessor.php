<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\editable\Editable;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Property Management');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>

                    <!-- END PAGE BAR -->
			<div class="col-md-12">
                       <div class="portlet portlet-sortable sellr_proprty">
                                <div class="portlet-title">
                                     <div class="caption font-green-sharp exp_titl">
                                        
                                        <span class="caption-subject bold uppercase exp_name">Lessor Expectations</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>
                               <!--<div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                    </div>-->
                                </div>
                                <div class="portlet-body">
                                     
									<div class="addpropertybackend-index">


    <?php 
     if($this->beginCache('lessor-expectations',['variations'=>$searchModel->id])){
          echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'options' => ['class' => 'table_common'],
		'responsive'=>false,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
[
'class' => 'kartik\grid\ExpandRowColumn',
'expandAllTitle' => 'Expand all',
'collapseTitle' => 'Collapse all',

'expandIcon'=>'<span class="fa fa-caret-right"></span>',
'value' => function ($model, $key, $index, $column) {
return GridView::ROW_COLLAPSED;
},
'detailUrl' => yii\helpers\Url::to(['lessor-expectations/viewmy']),
'detailRowCssClass' => GridView::TYPE_DEFAULT,
'pageSummary' => false,
],
           // 'id',
//            ['attribute'=>'user_id',
//			  'label'=>'Lead Details',
//			  'format'=>'raw',
//			  'width'=>'250px',
//			  'value'=>function($data){
//				  return \common\models\User::findOne($data->user_id)->email;
//			  }
//			
//			],
//			['attribute'=>'user_type',
//			  'label'=>'Lead Role',
//			  'format'=>'raw',
//			  'width'=>'100px',
//			  'value'=>function($data){
//				  return $data->user_type;
//			  }
//			
//			],
			['attribute'=>'save_search_as',
			  'label'=>'Expectation Name',
			  'format'=>'raw',
			  'width'=>'300px',
			  'value'=>function($data){
				  return $data->save_search_as;
			  }
			
			],
			['attribute'=>'property_id',
			  'label'=>'Property ID',
			  'format'=>'raw',
			  'width'=>'300px',
                          'filter'=>false,
			  'value'=>function($data){

                                  $propid = 273*179-$data->property_id;
				  return 'PR'.$propid;
			  }
			
			],
			
			
			['attribute'=>'created_date',
			  'label'=>'Created Date',
			  'format'=>'raw',
			  'width'=>'300px',
                          'filter'=>false,
			  'value'=>function($data){
				  return $data->created_date;
			  }
			
			],
					[
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Actions',
          'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{view}{update}{delete}',
          'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<i class="fa fa-eye update_icn"></i>', $url, [
                            'title' => Yii::t('app', 'lead-view'),'onclick'=>'ga("send", "event", "Lessor Expectations Action View", "Lessor Expectations Action View", "Lessor Expectations Action View","Lessor Expectations Action View")',
                ]);
            },

            'update' => function ($url, $model) {
                return Html::a('<i class="fa fa-pencil update_icn"></i>', $url, [
                            'title' => Yii::t('app', 'lead-update'),'onclick'=>'ga("send", "event", "Lessor Expectations Actions Update", "Lessor Expectations Actions Update", "Lessor Expectations Actions Update","Lessor Expectations Actions Update")',
                ]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<i class="fa fa-trash update_icn"></i>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                            'onclick'=>'ga("send", "event", "Lessor Expectations Actions Delete", "Lessor Expectations Actions Delete", "Lessor Expectations Actions Delete","Lessor Expectations Actions Delete")',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete?'),
                ]);
            }

          ],

          
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url ='view?id='.Html::encode($model->id);
                return $url;
            }

            if ($action === 'update') {
                $url ='updateor?id='.Html::encode($model->id);
                return $url;
            }
            if ($action === 'delete') {
                $url ='delete?id='.Html::encode($model->id);
                return $url;
            }

          }
          ],
       ],
       
    ]);
    Yii::trace('store lessor expecattions table to log');
    $this->endCache();
     } ?>

</div></div> </div> 
				  
</div>
