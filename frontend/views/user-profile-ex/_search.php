<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfileExSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-ex-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'emailid') ?>

    <?= $form->field($model, 'mobileid') ?>

    <?php // echo $form->field($model, 'cur_addressid1') ?>

    <?php // echo $form->field($model, 'per_addressid1') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'pan_card_number') ?>

    <?php // echo $form->field($model, 'adhar_number') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'isActive') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
