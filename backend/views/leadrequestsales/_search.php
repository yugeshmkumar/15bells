<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LeadrequestSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="leadrequest-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'leadRequestID') ?>

    <?php echo $form->field($model, 'UserID') ?>

    <?php echo $form->field($model, 'tagsData') ?>

    <?php echo $form->field($model, 'requestName') ?>

    <?php echo $form->field($model, 'requestEmail') ?>

    <?php // echo $form->field($model, 'requestAmount') ?>

    <?php // echo $form->field($model, 'requestBank') ?>

    <?php // echo $form->field($model, 'teleNo') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'Type') ?>

    <?php // echo $form->field($model, 'OtherFields') ?>

    <?php // echo $form->field($model, 'sourceName') ?>

    <?php // echo $form->field($model, 'sourceID') ?>

    <?php // echo $form->field($model, 'currentStatus') ?>

    <?php // echo $form->field($model, 'currentCsrID') ?>

    <?php // echo $form->field($model, 'lastTouch') ?>

    <?php // echo $form->field($model, 'currentLeadScore') ?>

    <?php // echo $form->field($model, 'leadQuality') ?>

    <?php // echo $form->field($model, 'loanleadSourceDetailsID') ?>

    <?php // echo $form->field($model, 'appliedProductid') ?>

    <?php // echo $form->field($model, 'speciallead') ?>

    <?php // echo $form->field($model, 'currentloandatastatusid') ?>

    <?php // echo $form->field($model, 'rquestMessage') ?>

    <?php // echo $form->field($model, 'applyDate') ?>

    <?php // echo $form->field($model, 'CreateDate') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'is_duplicate') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
