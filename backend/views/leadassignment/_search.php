<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LeadassignmentSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="leadassignment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'leadid') ?>

    <?php echo $form->field($model, 'lead_current_status_ID') ?>

    <?php echo $form->field($model, 'assigned_toID') ?>

    <?php echo $form->field($model, 'currentstar') ?>

    <?php // echo $form->field($model, 'isactive') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'assigned_at') ?>

    <?php // echo $form->field($model, 'unassigned_at') ?>

    <?php // echo $form->field($model, 'old_assigned_to') ?>

    <?php // echo $form->field($model, 'reassigned_at') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
