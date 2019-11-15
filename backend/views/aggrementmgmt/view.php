<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Aggrementmgmt */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aggrementmgmts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aggrementmgmt-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'subject:ntext',
            'content:ntext',
            'decription:ntext',
            'roleid',
            'fromdatetime',
            'todatetime',
            'aggrement_status',
            'eventname',
            'ispublish',
            'created_at',
            'updated_at',
            'isactive',
        ],
    ]) ?>

</div>
