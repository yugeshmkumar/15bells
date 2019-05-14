<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RequestDocumentShow */

$this->title = 'Update Request Document Show: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Request Document Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-document-show-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
