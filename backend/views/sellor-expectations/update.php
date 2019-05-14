<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectations */

$this->title = 'Update Sellor Expectations: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sellor Expectations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sellor-expectations-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
