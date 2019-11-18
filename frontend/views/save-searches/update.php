<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SaveSearches */

$this->title = 'Update Save Searches: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Save Searches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="save-searches-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
