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
 <style>.slotsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .slotsambqwkstalkbubble:before {  }</style> <style>.slotsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.slotsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:22%;  left:32%; top:17%; bottom:7%; z-index:1015; overflow:hidden; overflow-x:hidden}</style>
 
  <style>.createslotsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .cretaeslotsambqwkstalkbubble:before {  }</style> <style>.createslotsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.createslotsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:30%; top:26%; bottom:26%; z-index:1015; overflow:hidden; overflow-x:hidden}</style>
  
 
<div id="slotsambqwksukvveekmuzqtsimaccffxx" class="slotsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="slotsambqwksukvveekmuzqtsimabbffxx" class="slotsambqwksukvveekmuzqtswhevbbff"  > <div id="sch2" class="slotsambqwkstalkbubble">
 
 </div> </div>
 <div id="slotsambq" class="slotsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="slotsamb" class="slotsambqwksukvveekmuzqtswhevbbff"  > <div id="vie1" class="slotsambqwkstalkbubble">
 
 </div> </div>
 
 <div id="createslotsambqwksukvveekmuzqtsimaccffxx" class="createslotsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="createslotsambqwksukvveekmuzqtsimabbffxx" class="createslotsambqwksukvveekmuzqtswhevbbff"  > <div id="csolo2" class="createslotsambqwkstalkbubble">
 </div> </div>

                            <div class="portlet portlet-sortable light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-green-sharp">
                                        <i class="fa fa-building font-green-sharp"></i>
                                        <span class="caption-subject bold uppercase"> Property Management</span>
                                        <span class="caption-helper">details...</span>
                                    </div>
                               <div class="actions">
							  
                                        
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                     
									<div class="addpropertybackend-index">


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'responsive'=>false,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
			 ['class' => 'kartik\grid\CheckboxColumn','name'=>'chkd'],
			
[
'class' => 'kartik\grid\ExpandRowColumn',
'expandAllTitle' => 'Expand all',
'collapseTitle' => 'Collapse all',
'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
'value' => function ($model, $key, $index, $column) {
return GridView::ROW_COLLAPSED;
},
'detailUrl' => yii\helpers\Url::to(['addpropertypm/view']),
'detailRowCssClass' => GridView::TYPE_DEFAULT,
'pageSummary' => false,
],


           // 'id',
            ['attribute'=>'user_id',
			  'label'=>'Lead Details',
			  'format'=>'raw',
			  'width'=>'250px',
			  'value'=>function($data){
				  return \common\models\User::findOne($data->user_id)->email;
			  }
			
			],
			['attribute'=>'role_id',
			  'label'=>'Lead Role',
			  'format'=>'raw',
			  'width'=>'100px',
			  'value'=>function($data){
				  return $data->role_id;
			  }
			
			],
			['attribute'=>'project_name',
			  'label'=>'Project Name',
			  'format'=>'raw',
			  'width'=>'250px',
			  'value'=>function($data){
				  return $data->project_name;
			  }
			
			],
			['attribute'=> 'property_for',
			  'label'=>'Request Type',
			  'format'=>'raw',
			  'width'=>'90px',
			  'value'=>function($data){
				  return $data->property_for;
			  }
			
			],
			
			['attribute'=>'project_type_id',
			  'label'=>'Property Type',
			   'filter' => Html::activeDropDownList($searchModel, 'project_type_id', \yii\Helpers\ArrayHelper::map(\common\models\PropertyType::find()->asArray()->all(), 'id', 'typename'),['class'=>'form-control','prompt' => 'Select..']),
                
			   	   
			  'format'=>'raw',
			  'width'=>'250px',
			  'value'=>function($data){
				  return \common\models\PropertyType::findOne($data->project_type_id)->typename;
			  }
			
			],
			
			['attribute'=>'request_for',
			  'label'=>'Request For',
			  'format'=>'raw',
			  'width'=>'100px',
			  'value'=>function($data){
				  return $data->request_for;
			  }
			
			],
			
       ],
    ]); ?>

</div></div> </div> 
