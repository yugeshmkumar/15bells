<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MyProperty */

$this->title = 'Create My Property';
$this->params['breadcrumbs'][] = ['label' => 'My Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-property-create">

    <h1><?= Html::encode($this->title) ?></h1><br/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
