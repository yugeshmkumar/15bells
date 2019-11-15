<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyEmp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-emp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'companyid')->textInput() ?>

    <?= $form->field($model, 'userprofile_exID')->textInput() ?>

    <?= $form->field($model, 'userprofileID')->textInput() ?>

    <?= $form->field($model, 'role_id')->textInput() ?>

    <?= $form->field($model, 'employee_typeID')->textInput() ?>

    <?= $form->field($model, 'department_ID')->textInput() ?>

    <?= $form->field($model, 'employee_email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'employee_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'isactive')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
