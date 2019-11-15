<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FifteenbellsConfig */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fifteenbells Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fifteenbells-config-view">

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
            'table_name:ntext',
            'column_name:ntext',
            'status_value',
            'status_name:ntext',
            'isactive',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
