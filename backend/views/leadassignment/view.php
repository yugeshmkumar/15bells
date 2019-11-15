<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Leadassignment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Leadassignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadassignment-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'leadid',
            'lead_current_status_ID',
            'assigned_toID',
            'currentstar',
            'isactive',
            'created_at',
            'updated_at',
            'assigned_at',
            'unassigned_at',
            'old_assigned_to',
            'reassigned_at',
            'comments:ntext',
        ],
    ]) ?>

</div>
