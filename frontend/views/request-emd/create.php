<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RequestEmd */

$this->title = 'Create Request Emd';
$this->params['breadcrumbs'][] = ['label' => 'Request Emds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-emd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
