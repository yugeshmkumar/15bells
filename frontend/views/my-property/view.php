<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MyProperty */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'My Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-property-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'client_id',
            'site_name',
            'site_address',
            'super_area',
            'carpet_area',
            'auto_cad_drawing',
            'possession',
            'commercial_approved',
            'floors',
            'agreement',
            'tenure',
            'rent',
            'maintenance',
            'last_date_rent',
            'fit_out_period',
            'electricity_load',
            'clarityOn_meter_submeter',
            'power_backup',
            'property_tax',
            'spaceForGenset_ac_watertank',
            'car_parking',
            'motor_waterSupply',
            'stampDuty_registration',
            'working_hour_restrict',
            'created_date',
            'is_active',
        ],
    ]) ?>

</div>
