<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Leadassignment */

$this->title = 'Create Leadassignment';
$this->params['breadcrumbs'][] = ['label' => 'Leadassignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadassignment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
