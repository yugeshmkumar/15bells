<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.modal-dialog {
    width:80%;
}
.form-control{
    border-radius:5px !important;
    font-family: inherit;
    font-size: 13px;
}
.modal-content{
    background:#f1f1f1;
}
.modal-header{
    border-bottom:2px solid #ffffff !important;
}
label{
    font-family: inherit;
    font-size: 12px;
}
</style>
<div class="addproperty-onepage-form-form">
        <div class="row">
                <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-3">
                    <?= $form->field($model, 'company_employee_id')->textInput(['class' => 'form-control'])?>
            </div>
            <div class="col-md-3">
                    <?= $form->field($model, 'property_for')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                </div>
                
                <div class="col-md-3">
                 <?= $form->field($model, 'town_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'sector_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'longitude')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'locality')->textInput(['maxlength' => true])?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'latitude')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'builder_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                      <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'property_type_id')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'Owner_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'primary_contact_no')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'secondary_contact_no')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'landline_no')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'property_on_floor')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'unit_block')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                        <?= $form->field($model, 'unit_number')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'buildup_area')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'buildup_unit')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'carpet_area')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'carpet_unit')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'owner_address')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'total_no_of_floors')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'passenger_lift')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'service_lift')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'ceiling_height')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'backup_power')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'building_security')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'maintenance_agency')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'floor_plate_area')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'type_of_space')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'visitor_parking')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'covered_parking')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'asking_lease_rate')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'rate_negotiable')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'maintenance_charge')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'security_deposit')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'security_negotiable')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'lock_in_period')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'lock_in_negotiable')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'lease_period_restriction')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'max_period_lease')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'open_rentfree_period')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'max_rentfree_period')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'Asking_property_price')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'price_negotiable')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'property_with_saledeed')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'property_power_attorney')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'pan_card')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'adhar_card')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'property_tax_id')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'completion_in_percentage')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'property_status')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'property_scomment')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'followup_date_time')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'followup_comment')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'lead_source')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'site_visit')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'remarks')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'isactive')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'created_date')->textInput(['class' => 'form-control'])?>
                </div>

            
                <?php if (!Yii::$app->request->isAjax){ ?>
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                <?php } ?>

                <?php ActiveForm::end(); ?>
                
</div>
