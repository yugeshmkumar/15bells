<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MediaFilesConfig */

$this->title = 'Update Media Files Config: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Media Files Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="media-files-config-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
