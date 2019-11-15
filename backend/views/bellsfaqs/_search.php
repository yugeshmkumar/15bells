<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BellsfaqsSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="bellsfaqs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

     <?php // echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'subject') ?>

    <?php echo $form->field($model, 'content') ?>

    <?php echo $form->field($model, 'content_description') ?>

    <?php echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'page') ?>

    <?php // echo $form->field($model, 'publishstatus') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'isactive') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
