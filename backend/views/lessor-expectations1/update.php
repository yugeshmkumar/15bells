<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectations */

$this->title = 'Update Lessor Expectations: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lessor Expectations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lessor-expectations-update col-md-9">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
