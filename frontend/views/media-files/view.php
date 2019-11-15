<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MediaFiles */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Media Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-files-view">

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
            'type',
            'link:ntext',
            'file_name:ntext',
            'file_descr:ntext',
            'created_at',
            'updated_at',
            'isactive',
        ],
    ]) ?>

</div>
