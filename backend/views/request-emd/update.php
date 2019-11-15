<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RequestEmd */

$this->title = 'Update Request Emd: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Request Emds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-emd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
