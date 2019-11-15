<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Phonenumbers */

$this->title = 'Create Phonenumbers';
$this->params['breadcrumbs'][] = ['label' => 'Phonenumbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonenumbers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
