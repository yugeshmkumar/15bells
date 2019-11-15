<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Designations */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="designations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name')->textInput([]) ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 3]) ?>
     <div style="display:none;"> <?php $model->company = "15bells"; ?>
    <?php echo $form->field($model, 'company')->textarea(['rows' => 6]) ?></div>

    

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Submit') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
     <?php echo Html::a(Yii::t('backend', '<i class="fa fa-mail-reply"></i> Back to Add Employees', [
    'modelClass' => 'Designations',
]), ['/company-empb/index'], ['class' => 'btn btn-primary']) ?>
	</div>

    <?php ActiveForm::end(); ?>

</div>
