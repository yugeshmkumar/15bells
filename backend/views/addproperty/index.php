<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\Select2;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Addproperties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addproperty-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Addproperty', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'role_id',
            'project_name',
            'project_type_id',
            // 'request_for',
            // 'featured_image',
            // 'featured_video',
            // 'city',
            // 'locality:ntext',
            // 'address:ntext',
            // 'longitude',
            // 'latitude',
            // 'total_plot_area',
            // 'plot_unit',
            // 'expected_price',
            // 'price_sq_ft',
            // 'price_acres',
            // 'all_inclusive_price',
            // 'price_negotiable',
            // 'revenue_lauout',
            // 'present_status',
            // 'jurisdiction_development',
            // 'shed_RCC',
            // 'maintenance_cost',
            // 'maintenance_by',
            // 'annual_dues_payable',
            // 'expected_rental',
            // 'availability',
            // 'age_of_property',
            // 'possesion_by',
            // 'transaction_type',
            // 'ownership',
            // 'facing',
            // 'FAR_approval',
            // 'LOAN_taken',
            // 'buildup_area',
            // 'build_unit',
            // 'carpet_area',
            // 'carpet_unit',
            // 'total_floors',
            // 'property_on_floor',
            // 'configuration',
            // 'floors_allowed_construction',
            // 'bedrooms',
            // 'bathrooms',
            // 'balconies',
            // 'pooja_room',
            // 'study_room',
            // 'servant_room',
            // 'other_room',
            // 'furnished_status',
            // 'parking',
            // 'is_active',
            // 'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
