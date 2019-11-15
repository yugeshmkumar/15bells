<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MediaFilesConfig */

$this->title = 'Create Media Files Config';
$this->params['breadcrumbs'][] = ['label' => 'Media Files Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-files-config-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
