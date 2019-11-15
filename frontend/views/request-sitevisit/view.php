<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RequestSiteVisit */

$this->title = $model->request_id;
$this->params['breadcrumbs'][] = ['label' => 'Request Site Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-site-visit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->request_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->request_id], [
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
            'request_id',
            'user_id',
            'property_id',
            'company_id',
            'request_status',
            'pickup_location:ntext',
            'drop_location:ntext',
            'landmark:ntext',
            'terms_conditions_id',
            'terms_conditions_files',
            'amount_payable',
            'feedback:ntext',
            'scheduled_time',
            'visit_status_confirm',
            'created_date',
        ],
    ]) ?>

</div>
