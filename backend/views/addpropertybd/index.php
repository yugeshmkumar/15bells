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
'detailUrl' => yii\helpers\Url::to(['addpropertybd/view']),
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
             [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'id',
		'filter'=>false,
		'label'=>'Assign Manager',
		'format'=>'raw',
		'value'=> function($data){
			$finddata = \common\models\AssignManagerToProperty::find()->where(['propertyID'=>$data->id ,'isactive'=>1])->one();
			if($finddata){
				if(isset(\common\models\CompanyEmpb::findOne($finddata->managerID)->name)){
			return \common\models\CompanyEmpb::findOne($finddata->managerID)->name;
				} else {
					return 'NOT ASSIGNED';
				}
			} else {
				return 'NOT ASSIGNED';
			}
		},
		'width'=>'300px',
        'pageSummary' => 'Assign Manager',
		
        'vAlign'=>'middle',
		
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
        'editableOptions'=>['data'=>$data,'header'=>'Assign Manager', 'size'=>'sm', 'asPopover' => false, 'inputType' => Editable::INPUT_DROPDOWN_LIST,'class'=>'form-control']
    ],
             
			 
           

            
        ],
    ]); ?>

</div>
									 
									 
									 
									 
									 
									 
									 
									 
									 
									 
									 
									 
									 
									 
									 
									 
									 
                                </div> </div> 
								