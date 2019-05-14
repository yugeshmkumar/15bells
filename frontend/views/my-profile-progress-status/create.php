<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MyProfileProgressStatus */

$this->title = 'Create My Profile Progress Status';
$this->params['breadcrumbs'][] = ['label' => 'My Profile Progress Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-profile-progress-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
