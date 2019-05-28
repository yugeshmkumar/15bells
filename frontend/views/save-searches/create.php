<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SaveSearches */

$this->title = 'Create Save Searches';
$this->params['breadcrumbs'][] = ['label' => 'Save Searches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="save-searches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
