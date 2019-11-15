<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RequestSiteVisit */

$this->title = 'Update Request Site Visit: ' . $model->request_id;
$this->params['breadcrumbs'][] = ['label' => 'Request Site Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->request_id, 'url' => ['view', 'id' => $model->request_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-site-visit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
