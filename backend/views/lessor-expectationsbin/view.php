<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectationsbin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Lessor Expectationsbins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessor-expectationsbin-view">

  
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
           // 'user_id',
            'user_type',
            'property_id',
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
            'is_active',
            'created_date',
        ],
    ]) ?>

</div>
