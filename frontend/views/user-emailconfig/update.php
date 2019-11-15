<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserEmailconfig */

$this->title = 'Update User Emailconfig: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Emailconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-emailconfig-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
