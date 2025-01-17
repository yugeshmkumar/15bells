<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\comm\models\MessageGroups */

$this->title = 'Update Message Groups: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Message Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
