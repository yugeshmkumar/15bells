<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Leadassignment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leadassignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadassignment-view">

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
            'lead_current_status_ID',
            'assigned_toID',
            'currentstar',
            'isactive',
            'created_at',
            'updated_at',
            'assigned_at',
            'unassigned_at',
            'comments:ntext',
        ],
    ]) ?>

</div>
