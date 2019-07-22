<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Callbuttonaction */

$this->title = 'Create Callbuttonaction';
$this->params['breadcrumbs'][] = ['label' => 'Callbuttonactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callbuttonaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
