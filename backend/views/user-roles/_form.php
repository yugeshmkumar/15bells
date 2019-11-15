<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserRoles */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-roles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'rolename')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'roledesc')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'roletype')->dropDownList([ 'special' => 'Special', 'normal' => 'Normal', 'newuser' => 'Newuser', 'high' => 'High', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'isactive')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
