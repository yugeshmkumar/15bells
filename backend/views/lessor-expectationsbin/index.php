<?php

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = Yii::t('backend', 'Lessor Expectationsbins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessor-expectationsbin-index">


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
'detailUrl' => yii\helpers\Url::to(['/lessor-expectationsbin/view']),
'detailRowCssClass' => GridView::TYPE_DEFAULT,
'pageSummary' => false,
],
            //'id',
            //'user_id',
            //'user_type',
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
            // 'auto_cad_drawing',
            // 'site_approval',
            // 'wet_points',
            // 'interest_security',
            // 'interest_negotiable',
            // 'agreement',
            // 'agreement_negotiable',
            // 'lease_tenure',
            // 'tenure_negotiable',
            // 'lock_in_period',
            // 'lock_negotiable',
            // 'rent',
            // 'rent_unit',
            // 'rent_negotiable',
            // 'escalation_value',
            // 'escalation_month',
            // 'escalation_negotiable',
            // 'maintenance_value',
            // 'maintenance_unit',
            // 'maintenance_hours',
            // 'maintenance_subject_change',
            // 'last_date_rent',
            // 'last_date_negotiable',
            // 'fit_out_period',
            // 'fit_out_negotiable',
            // 'present_electricity_load',
            // 'canBeIncreased_electricity',
            // 'clarity_on_meter',
            // 'power_backup',
            // 'power_can_be_discussed',
            // 'seperate_space',
            // 'car_parking',
            // 'motor_water_supply',
            // 'water_supply_part_maintenance',
            // 'stamp_duty_lessor',
            // 'stamp_duty_lessee',
            // 'working_restriction',
            // 'washroom_provision',
            // 'usuable_area_length',
            // 'usuable_area_breadth',
            // 'is_active',
            // 'created_date',

          
        ],
    ]); ?>

</div>
