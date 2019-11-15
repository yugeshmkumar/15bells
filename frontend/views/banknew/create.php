<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Banknew */

$this->title = 'Create Banknew';
$this->params['breadcrumbs'][] = ['label' => 'Banknews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

