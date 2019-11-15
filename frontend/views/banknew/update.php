<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Banknew */

$this->title = 'Update Banknew: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Banknews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


