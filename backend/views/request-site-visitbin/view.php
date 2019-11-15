<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RequestSiteVisitbin */

$this->title = $model->request_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Request Site Visitbins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-site-visitbin-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->request_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->request_id], [
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
            'request_id',
            'user_id',
            'property_id',
            'company_id',
            'request_status',
            'reason:ntext',
            'scheduled_time',
            'confirm',
            'created_date',
        ],
    ]) ?>

</div>
