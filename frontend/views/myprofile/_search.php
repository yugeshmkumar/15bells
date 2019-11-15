<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MyprofileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="myprofile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'emailid') ?>

    <?php // echo $form->field($model, 'mobileid') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'martial_status') ?>

    <?php // echo $form->field($model, 'minor') ?>

    <?php // echo $form->field($model, 'relatnshp_with_minor') ?>

    <?php // echo $form->field($model, 'guardian_name') ?>

    <?php // echo $form->field($model, 'pan_card_no') ?>

    <?php // echo $form->field($model, 'adhar_card_no') ?>

    <?php // echo $form->field($model, 'current_country') ?>

    <?php // echo $form->field($model, 'current_state') ?>

    <?php // echo $form->field($model, 'current_city') ?>

    <?php // echo $form->field($model, 'current_pincode') ?>

    <?php // echo $form->field($model, 'permanent_country') ?>

    <?php // echo $form->field($model, 'permanent_state') ?>

    <?php // echo $form->field($model, 'permanent_city') ?>

    <?php // echo $form->field($model, 'permanent_pincode') ?>

    <?php // echo $form->field($model, 'isactive') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
