<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectationsbinSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="sellor-expectationsbin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'user_id') ?>

    <?php echo $form->field($model, 'user_type') ?>

    <?php echo $form->field($model, 'property_id') ?>

    <?php echo $form->field($model, 'save_search_as') ?>

    <?php // echo $form->field($model, 'expected_rate') ?>

    <?php // echo $form->field($model, 'rate_negotiable') ?>

    <?php // echo $form->field($model, 'payment_time') ?>

    <?php // echo $form->field($model, 'payment_time_negotiable') ?>

    <?php // echo $form->field($model, 'loan_against_property') ?>

    <?php // echo $form->field($model, 'all_dues_cleared') ?>

    <?php // echo $form->field($model, 'vastu_facing') ?>

    <?php // echo $form->field($model, 'loan_to_be_applied') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
