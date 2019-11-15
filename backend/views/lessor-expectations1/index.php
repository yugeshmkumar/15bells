<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LessorExpectationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lessor Expectations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessor-expectations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lessor Expectations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'user_type',
            'property_id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
