<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\transaction\models\Transaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-form">

   <?php $form = ActiveForm::begin(['id' => 'f1', 'enableClientValidation' => true, 'enableAjaxValidation' => false,
    'action' => [''],
    'options' => ['enctype' => 'multipart/form-data']]); ?>


    <?php ActiveForm::end(); ?>

</div>
