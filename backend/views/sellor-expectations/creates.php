<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectations */

$this->title = 'Create Sellor Expectations';
$this->params['breadcrumbs'][] = ['label' => 'Sellor Expectations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sellor-expectations-create">

    

    <?= $this->render('_formes', [
        'model' => $model,
    ]) ?>

</div>
