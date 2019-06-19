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
                    <?= $form->field($model, 'property_for')->textInput(['class' => 'form-control'])?>
                </div>
                
                <?= $form->field($model, 'completion_in_percentage')->hiddenInput()->label(false) ?>
                
                <div class="col-md-3">
                    <?= $form->field($model, 'city')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                
                <div class="col-md-3">
                 <?= $form->field($model, 'town_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'sector_name')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'longitude')->textInput(['class' => 'form-control count','class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'locality')->textInput(['class' => 'form-control count','maxlength' => true])?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'address')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'latitude')->textInput(['class' => 'form-control count','class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'builder_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                      <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'property_type_id')->textInput(['class' => 'form-control count','class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'Owner_name')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'primary_contact_no')->textInput(['class' => 'form-control count','class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'secondary_contact_no')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'landline_no')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'email_id')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'property_on_floor')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'unit_block')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                        <?= $form->field($model, 'unit_number')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'super_area')->textInput(['class' => 'form-control count','class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'super_unit')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'carpet_area')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'carpet_unit')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'owner_address')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'total_no_of_floors')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'passenger_lift')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'service_lift')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'ceiling_height')->textInput(['class' => 'form-control count'])?>
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
                <?= $form->field($model, 'type_of_space')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'visitor_parking')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'covered_parking')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'asking_lease_rate')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'rate_negotiable')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'maintenance_charge')->textInput(['class' => 'form-control count'])?>
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
                <?= $form->field($model, 'max_period_lease')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'open_rentfree_period')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'max_rentfree_period')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'Asking_property_price')->textInput(['class' => 'form-control count'])?>
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
               

            
                <?php if (!Yii::$app->request->isAjax){ ?>
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                <?php } ?>

                <?php ActiveForm::end(); ?>
                
</div>

<script>

$(document).ready(function(){


    $('input').on('change', function(){
        
        var cntreq = 0;
        var cntvals = 0;

        $('input').each(function(i, val) {
            if($(this).attr('class') == 'form-control count') {
                cntreq++;
                if($(this).val() != '') {
                    cntvals++;
                }
            }
        });

        var count = (cntvals/cntreq)*100;
        
        $('#addpropertyonepageform-completion_in_percentage').empty();
        $('#addpropertyonepageform-completion_in_percentage').val(Math.round(count));
    });



});

</script>
