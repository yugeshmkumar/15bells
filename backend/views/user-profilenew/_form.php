<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfilenew */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-profilenew-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php echo $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'avatar_path')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'avatar_base_url')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'locale')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'gender')->textInput() ?>

    <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'facebook_id')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'linkedin_id')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'minor')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'relationship_with_minor')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'guardian_name')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
