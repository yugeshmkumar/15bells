<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectations */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lessor Expectations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.table-striped > tbody > tr:nth-of-type(odd){
	background:rgba(255,255,255,0.25) !important;
}
.table-striped > tbody{
	background:rgba(255,255,255,0.25) !important;
	color:#fff !important;
}
.expt_hed{color:#fff;border-bottom:3px solid #e5ac31 !important;margin:0;padding:0px 0 6px 0;}
</style>
<div class="lessor-expectations-view col-md-9">
<?php if($model->user_type =='lessor'){?>
	<h3 class="expt_hed">View Lessor Expectations</h3>
<?php } else{?>
<h3 class="expt_hed">View Lessee Expectations</h3>
<?php }?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
           // 'user_id',
           // 'user_type',
           // 'property_id',
            'save_search_as',
            'auto_cad_drawing',
            'site_approval',
            'wet_points',
            'interest_security',
            'interest_negotiable',
            'agreement',
            'agreement_negotiable',
            'lease_tenure',
            'tenure_negotiable',
            'lock_in_period',
            'lock_negotiable',
            'rent',
            'rent_unit',
            'rent_negotiable',
            'escalation_value',
            'escalation_month',
            'escalation_negotiable',
            'maintenance_value',
            'maintenance_unit',
            'maintenance_hours',
            'maintenance_subject_change',
            'last_date_rent',
            'last_date_negotiable',
            'fit_out_period',
            'fit_out_negotiable',
            'present_electricity_load',
            'canBeIncreased_electricity',
            'clarity_on_meter',
            'power_backup',
            'power_can_be_discussed',
            'seperate_space',
            'car_parking',
            'motor_water_supply',
            'water_supply_part_maintenance',
            'stamp_duty_lessor',
            'stamp_duty_lessee',
            'working_restriction',
            'washroom_provision',
            'usuable_area_length',
            'usuable_area_breadth',
            //'is_active',
           // 'created_date',
        ],
    ]) ?>

</div>
