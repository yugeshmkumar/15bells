<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Phonenumbers */

$this->title = 'Update Phonenumbers: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Phonenumbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phonenumbers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
