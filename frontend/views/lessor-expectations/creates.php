<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectations */

$this->title = 'Create Lessor Expectations';
$this->params['breadcrumbs'][] = ['label' => 'Lessor Expectations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessor-expectations-create">

  

    <?= $this->render('_formes', [
        'model' => $model,
    ]) ?>

</div>
