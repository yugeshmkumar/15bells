<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MyPropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Properties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-property-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create My Property', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'client_id',
            'site_name',
            'site_address',
            'super_area',
            // 'carpet_area',
            // 'auto_cad_drawing',
            // 'possession',
            // 'commercial_approved',
            // 'floors',
            // 'agreement',
            // 'tenure',
            // 'rent',
            // 'maintenance',
            // 'last_date_rent',
            // 'fit_out_period',
            // 'electricity_load',
            // 'clarityOn_meter_submeter',
            // 'power_backup',
            // 'property_tax',
            // 'spaceForGenset_ac_watertank',
            // 'car_parking',
            // 'motor_waterSupply',
            // 'stampDuty_registration',
            // 'working_hour_restrict',
            // 'created_date',
            // 'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
