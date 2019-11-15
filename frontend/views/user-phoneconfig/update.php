<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserPhoneconfig */

$this->title = 'Update User Phoneconfig: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Phoneconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-phoneconfig-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
