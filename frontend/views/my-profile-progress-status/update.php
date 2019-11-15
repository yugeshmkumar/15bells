<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MyProfileProgressStatus */

$this->title = 'Update My Profile Progress Status: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'My Profile Progress Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="my-profile-progress-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
