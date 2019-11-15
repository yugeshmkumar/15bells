<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserKycdocuments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Kycdocuments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-kycdocuments-view">

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
            'userid',
            'document_name:ntext',
            'file_type:ntext',
            'docment_file_name:ntext',
            'document_file_path:ntext',
            'document_file_name_extenstn:ntext',
            'approve_status',
            'approve_reason:ntext',
            'approved_by',
            'approved_at',
            'created_at',
            'updated_at',
            'isactive',
        ],
    ]) ?>

</div>
