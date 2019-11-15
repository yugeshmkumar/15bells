<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bank"></i>
            <span class="caption-subject bold uppercase"> Company Details</span>

        </div>
        <div class="actions">

            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="company-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'ibforms']]); ?>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+logo" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> Select logo </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="logo" id="logo" > </span>
                            </div>
                        </div>

                    </div> </div><div class="col-md-6"><br/>



                    <?= $form->field($model, 'name')->textInput() ?>
                    <?= $form->field($model, 'company_type')->dropDownList(['LLP' => 'LLP', 'LLt' => 'LLt',], ['prompt' => 'Select..']) ?>
<?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

                </div> </div>

            <div class="row">
                <div class="col-md-5">
<?= $form->field($model, 'PAN_card_no')->textInput(['type' => 'number']) ?>
                </div> <div class="col-md-6">

<?= $form->field($model, 'COI_number')->textInput(['type' => 'number']) ?>
                </div> </div>
            <div class="row">
                <div class="col-md-5">
<?= $form->field($model, 'main_email')->textInput(['type' => 'email']) ?>
                </div> <div class="col-md-6">

<?= $form->field($model, 'main_mobile')->textInput(['type' => 'number']) ?>
                </div> </div><div class="row">
                <div class="col-md-5">
                    <?= $form->field($model, 'country')->textInput() ?>
                </div> <div class="col-md-6">
<?= $form->field($model, 'location')->textInput(['type' => 'number']) ?>
                </div> </div><div class="row">
                <div class="col-md-5">
                    <?= $form->field($model, 'state')->textInput() ?>
                </div> <div class="col-md-6">
<?= $form->field($model, 'city')->textInput() ?>
                </div> </div><div class="row">
                <div class="col-md-11">
<?= $form->field($model, 'main_address')->textarea(['rows' => 2]) ?>
                </div> </div>





        </div> </div>

        <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'savecompanydata']) ?>
        </div>
    <?php } ?>

<?php ActiveForm::end(); ?>

</div>    
</div>    
</div>
