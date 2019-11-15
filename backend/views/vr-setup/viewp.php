<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Addpropertybackend */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Addpropertybackends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addpropertybackend-view">
<div class="note note-info">
Property Details
</div>
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'project_name',
            'property_for',
            'project_type_id',
            'request_for',
            'featured_image',
            'featured_video',
            'city',
            'locality:ntext',
            'address:ntext',
            'longitude',
            'latitude',
            'total_plot_area',
            'plot_unit',
            'expected_price',
            'asking_rental_price',
            'price_sq_ft',
            'price_acres',
            'price_negotiable',
            'revenue_lauout',
            'present_status',
            'jurisdiction_development',
            'shed_RCC',
            'maintenance_cost',
            'maintenance_by',
            'annual_dues_payable',
            'expected_rental',
            'membership_charge',
            'availability',
            'available_from',
            'available_date',
            'age_of_property',
            'possesion_by',
            'rental_type',
            'ownership',
            'ownership_status',
            'facing',
            'FAR_approval',
            'LOAN_taken',
            'buildup_area',
            'build_unit',
            'carpet_area',
            'carpet_unit',
            'total_floors',
            'property_on_floor',
            'configuration',
            'floors_allowed_construction',
            'bedrooms',
            'bathrooms',
            'balconies',
            'pooja_room',
            'study_room',
            'servant_room',
            'other_room',
            'furnished_status',
            'parking',
            'is_active',
            'created_date',
            'status',
        ],
    ]) ?>

</div>
