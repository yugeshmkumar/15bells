<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RequestEmd */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Request Emds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-emd-view">

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
            'user_id',
            'property_id',
            'payable_amount',
            'escrow_account_id',
            'payment_status',
            'created_date',
            'updated_date',
            'status',
        ],
    ]) ?>

</div>
