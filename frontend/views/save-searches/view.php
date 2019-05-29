<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SaveSearches */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Save Searches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="save-searches-view">

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
            'role_type',
            'search_for',
            'type',
            'geometry:ntext',
            'radius',
            'user_id',
            'location_name',
            'town',
            'sector',
            'country',
            'lat',
            'lng',
            'property_type',
            'area',
            'area_unit',
            'min_prices',
            'max_prices',
            'property_auction_type',
            'status',
            'created_date',
            'updated_date',
        ],
    ]) ?>

</div>
