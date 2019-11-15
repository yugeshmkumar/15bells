<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Emailaddresses */

$this->title = 'Update Emailaddresses: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Emailaddresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emailaddresses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
