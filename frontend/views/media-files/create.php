<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MediaFiles */

$this->title = 'Create Media Files';
$this->params['breadcrumbs'][] = ['label' => 'Media Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-files-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
