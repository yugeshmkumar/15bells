<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>
<style>
#userform-status{
    position: relative;
    left: 0px;
    top: 2px;
}
</style>
<div class="portlet portlet-sortable sellr_proprty">
     
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 pt-2 date_select">
                    <?php echo $form->field($model, 'fullname')->textInput(['class' => 'input_desgn form-control', 'placeholder' => "First Name"]) ->label(false)?>
                </div>
                <div class="col-md-6 pt-2 date_select">
                    <?php echo $form->field($model, 'lastname')->textInput(['class' => 'input_desgn form-control', 'placeholder' => "Last Name"]) ->label(false) ?>
                </div>
                <div class="col-md-6 pt-2 date_select">
                    <?php echo $form->field($model, 'username')->textInput(['class' => 'input_desgn form-control', 'placeholder' => "Phone Number"]) ->label(false) ?>
                </div>
                <div class="col-md-6 pt-2 date_select">
                    <?php echo $form->field($model, 'email')->textInput(['class' => 'input_desgn form-control', 'placeholder' => "Email"]) ->label(false) ?>
                </div>
                <div class="col-md-6 pt-2 date_select">
                    <?php echo $form->field($model, 'password')->passwordInput()->textInput(['class' => 'input_desgn form-control', 'placeholder' => "Password"]) ->label(false) ?>
                </div>
                <div class="col-md-6 pt-3 date_select">
                    <?php echo $form->field($model, 'status')->label(Yii::t('backend', 'Active'))->checkbox() ?>
                 </div>   
                    <div class="form-group col-md-12 text-center pt-4">
                        <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary save_button', 'name' => 'signup-button']) ?>
                    </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
</div>
