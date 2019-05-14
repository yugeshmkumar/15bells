<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RequestedBidingUsers */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="requested-biding-users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'userid')->textInput() ?>

    <?php echo $form->field($model, 'propertyID')->textInput() ?>

    <?php echo $form->field($model, 'userroleID')->textInput() ?>

    <?php echo $form->field($model, 'request_for')->dropDownList([ 'bid' => 'Bid', 'direct' => 'Direct', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'isactive')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
