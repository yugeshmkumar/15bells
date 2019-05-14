<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectations */
/* @var $form yii\widgets\ActiveForm */
?>
<style>

#modal .modal-content{
		border-radius:10px !important;
		background:#ffffff;
	
	}
#modal .modal-dialog{
			width:95% !important;
			top:60%;
	}
	#modal .close{
			   text-indent: 0px!important;
    font-size: 28px!important;
    opacity: .8!important;
    margin-top: 10px !important;
	}
	#modal .modal-header{
		border-bottom:3px solid #0fd8da;
		padding:0 20px !important;
	}
	#modal h3{
		padding:10px;
	}
	#modal .close{
		position:absolute;
		right:20px;
	}
	.modal-body{
		padding:0;
	}
	.expect_frms .form-control{
		border-radius:10px !important;
		border:1px solid #dedede !important;
		color:#000000 !important;
		box-shadow: inset 0 1px 1px rgba(0,0,0,.075) !important;
	}
	#modal .btn_cret{
		color: #ffffff !important;
    background-color: #003663!important;
    padding: 8px 30px;
    border-radius: 4px !important;
    font-size: 15px;
	border:none !important;
	}
	

</style>


           
<div class="portlet box">
    <div class="portlet-title">
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">

             <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>


            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
                    <div class="form-group">
                        <?= $form->field($model, 'save_search_as')->textInput(['maxlength' => true])->input('text', ['placeholder' => "Save Expectation As *",'class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-6 small_frm">
                    <div class="form-group">
                        <?= $form->field($model, 'auto_cad_drawing')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select Auto Cad drawing','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
            </div> 


            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
                    <div class="form-group">

                        <?= $form->field($model, 'site_approval')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Is the Site Approved for Commercial','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-6 small_frm">
                    <div class="form-group">
                        <?= $form->field($model, 'wet_points')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Wet point inside the premises','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
            </div> 


            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
						<div class="row">
						<div class="col-md-8">
							 <div class="input-container">
   
								<?= $form->field($model, 'interest_security')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Interest free security deposit"])->label(false) ?>
								 <span class="icon_txt">Months</span>
							  </div>
							
						</div>
						<!--<div class="col-md-2 pad_fild month_lbl text-center">Months</div>-->
						<div class="col-md-4 pad_fild text-center">
						<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
						<?= $form->field($model, 'interest_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
						
						</div></div>
                                                   
                </div> 
               <div class="col-md-6 small_frm">
                    <div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<?= $form->field($model, 'agreement')->dropDownList([ 'Notorised' => 'Notorised', 'Registered' => 'Registered',], ['prompt' => 'Select Agreement','class' => 'one_inpt form-control'])->label(false) ?>
								</div>
								<div class="col-md-4 pad_fild text-center">
								<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
								<?= $form->field($model, 'agreement_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
								</div>
							</div>
                    </div>                                
                </div> 
            </div>


           <!-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Agreement</label>

                        <?//= $form->field($model, 'agreement')->dropDownList([ 'Notorised' => 'Notorised', 'Registered' => 'Registered',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Agreement Negotiable</label>

                        <?//= $form->field($model, 'agreement_negotiable')->dropDownList([ '0', '1',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 
            </div>-->

            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
                    <div class="form-group">
					<div class="row">
						<div class="col-md-8">
								<div class="input-container">
   
								<?= $form->field($model, 'lease_tenure')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Lease Tenure",'maxlength' => true])->label(false) ?>
								 <span class="icon_txt">Years</span>
							  </div>
							
						</div>
						
						<!--<div class="col-md-2 pad_fild month_lbl text-center">Years</div>-->
						<div class="col-md-4 pad_fild text-center">
						<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
						<?= $form->field($model, 'tenure_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
						
						</div></div>
                    </div>                                
                </div>  
               <div class="col-md-6 small_frm">
                    <div class="form-group">
						<div class="row">
						<div class="col-md-8">
							<div class="input-container">
   
								<?= $form->field($model, 'lock_in_period')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Lock in Period",'maxlength' => true])->label(false) ?>
								 <span class="icon_txt">Months</span>
							  </div>
						</div>
						
						<!--<div class="col-md-2 pad_fild month_lbl text-center">Months</div>-->
						<div class="col-md-4 pad_fild text-center">
						<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
						<?= $form->field($model, 'lock_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
						
						</div></div>
						
                    </div>                                
                </div>  
            </div>

            <!--<div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lock in period</label>

                        <?//= $form->field($model, 'lock_in_period')->textInput(['maxlength' => true])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lock in period Negotiable</label>

                        <?//= $form->field($model, 'lock_negotiable')->dropDownList([ '0', '1',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 
            </div>-->




            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
                    <div class="form-group">
                       <div class="row">
						<div class="col-md-8">
							
							<div class="input-container">
   
								<?= $form->field($model, 'escalation_value')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Escalation",'maxlength' => true])->label(false) ?>
								 <span class="icon_txt">%</span>
							  </div>
							
						</div>
						<!--<div class="col-md-2 pad_fild month_lbl text-center">%</div>-->
						<div class="col-md-4 text-center">
							<p style="padding: 7px 2px 7px 2px;background: #f9f9f9;">After</p>
						</div>
			</div>

                    </div>                                
                </div>
                <div class="col-md-6 small_frm">
                    <div class="form-group">
                       <div class="row">
						<div class="col-md-8">
                         <div class="input-container">
   
								<?= $form->field($model, 'escalation_month')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Escalation Month",'maxlength' => true])->label(false) ?>
								 <span class="icon_txt">Months</span>
							  </div>
						 
						</div>
						<!--<div class="col-md-2 pad_fild month_lbl text-center">Months</div>-->
						<div class="col-md-4 text-center">
							
						<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
						<?= $form->field($model, 'escalation_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
						</div>
						</div>

                    </div>                                
                </div>
            </div>



            <div class="row margin_expct">
                <div class="col-md-4">
                    <div class="form-group">
						<div class="row">
						<div class="col-md-12">
							 <div class="input-container">
   
								<?= $form->field($model, 'present_electricity_load')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Present electricity load",'maxlength' => true])->label(false) ?>
								 <span class="icon_txt">KW</span>
							  </div>
						 
						</div>
						<!--<div class="col-md-4 pad_fild month_lbl text-center" style="font-size:12px;">KW</div>-->
						</div>

                    </div>                                
                </div> 
                <div class="col-md-2" style="padding:0;">
					<div class="form-group pad_top">
					<?= $form->field($model, 'canBeIncreased_electricity')->checkbox(array('label'=>''))->label('Can be increased'); ?>

                    </div> 					
                </div> 


                <div class="col-md-3">
                    <div class="form-group">
                        <?= $form->field($model, 'power_backup')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Power Backup','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-3">
					<div class="form-group pad_top">
					<?= $form->field($model, 'power_can_be_discussed')->checkbox(array('label'=>''))->label('Can be discussed'); ?>

                    </div> 					
                </div> 
            </div>
			
			
			<div class="row margin_expct">
			
				<div class="col-md-6 small_frm">
					 <div class="form-group">
                        <?= $form->field($model, 'power_backup')->dropDownList([ 'Lessor will pay' => 'Lessor will pay', 'Lessee will pay' => 'Lessee will pay',], ['prompt' => 'Property tax','class' => 'one_inpt form-control','id' => 'sell'])->label(false) ?>

                    </div> 
					
				</div>
				<div class="col-md-6 small_frm">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<div class="row">
								<div class="col-md-12">
								  <div class="input-container">
   
										<?= $form->field($model, 'fit_out_period')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Fit Out Period",'maxlength' => true])->label(false) ?>
									 <span class="icon_txt">Days</span>
								  </div>			
									
								</div>
								<!--<div class="col-md-4 pad_fild month_lbl text-center">Days</div>-->
								</div>
							</div>                                
						</div> 
						<div class="col-md-4">
							<div class="form-group pad_top">
							<?= $form->field($model, 'fit_out_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>

							</div>                                
						</div>
					</div>
				</div>
				
			
			</div>


            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
                    <div class="form-group">
                        <?= $form->field($model, 'clarity_on_meter')->dropDownList([ 'Submeter_already_in_place' => 'Submeter already in place', 'Submeter_can_be_provided' => 'Submeter can be provided', 'Common_Meter' => 'Common Meter',], ['prompt' => 'Clarity on Meter/Submeter','class' => 'one_inpt form-control'])->label(false) ?>
						
                    </div>                                
                </div> 

                <div class="col-md-6 small_frm">
                    <div class="form-group">
                        <?= $form->field($model, 'seperate_space')->dropDownList([ 'Chargeable' => 'Chargeable', 'Not Chargeable' => 'Not Chargeable',], ['prompt' => 'Seperate Space for genset/ac','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
            </div> 

            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
                    <div class="form-group">

                        <?= $form->field($model, 'car_parking')->textInput(['class' => 'one_inpt form-control','placeholder' => "Dedicated car parking"])->label(false) ?>

                    </div>                                
                </div> 

                <div class="col-md-3">
                    <div class="form-group">
                        <?= $form->field($model, 'motor_water_supply')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Motor for water supply','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-3"> 
					<div class="form-group pad_top">
					<?= $form->field($model, 'water_supply_part_maintenance')->checkbox(array('label'=>''))->label('Part of Maintenance'); ?>

                    </div> 					
                </div> 
            </div>
            
            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
                    <div class="form-group">

                        <?= $form->field($model, 'rent')->textInput()->input('text', ['placeholder' => "Rent in Rs.",'class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group">

                        <?= $form->field($model, 'rent_unit')->dropDownList([ 'per_sq_ft' => 'Per sq ft', 'per_sq_mtr' => 'Per sq mtr', 'per_sq_yards' => 'Per sq yards',], ['prompt' => 'Select Rent Unit','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
				<div class="col-md-3 pad_fild">
						<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
						<?= $form->field($model, 'rent_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
						
				</div>
            </div>
			
			

            <div class="row margin_expct">
                <div class="col-md-3">
                    <div class="form-group">
						<div class="row">
						<div class="col-md-12">
                          <?= $form->field($model, 'maintenance_value')->textInput()->input('text', ['placeholder' => "Maintenance in Rs.",'class' => 'one_inpt form-control'])->label(false) ?>
						</div>
						
						</div>
                    </div>                                
                </div> 
                <div class="col-md-2">
                    <div class="form-group">

                        <?= $form->field($model, 'maintenance_unit')->dropDownList([ 'per_sq_ft' => 'Per sq ft', 'per_sq_mtr' => 'Per sq mtr', 'per_sq_yards' => 'Per sq yards',], ['prompt' => 'Select Maintenance Unit','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 

                <div class="col-md-2">
                    <div class="form-group">
                        <?= $form->field($model, 'maintenance_hours')->dropDownList([ '12 Hours' => '12 Hours', '24 Hours' => '24 Hours',], ['prompt' => 'Maintenance Hours','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div>
				<div class="col-md-2 pad_fild month_lbl text-center">
						<div class="row">
						 <span class="icon_txt">Per Month</span>
						</div>
					
				</div>
                <div class="col-md-3">
                    <div class="form-group">
						<?= $form->field($model, 'maintenance_subject_change')->checkbox(array('label'=>''))->label('Subject to change'); ?>

                    </div>                                
                </div> 
            </div>


			
            <div class="row margin_expct">
                <div class="col-md-8">
                    <div class="form-group">
					<div class="row">
						<div class="col-md-12">
                           <div class="input-container">
   
										<?= $form->field($model, 'last_date_rent')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Last date for paying rent",'maxlength' => true])->label(false) ?>
									 <span class="icon_txt">for every English Calender Month</span>
								  </div>
						 
						</div>
						<!--<div class="col-md-5 pad_fild month_lbl text-center" style="font-size:14px;">for every English Calender Month</div>-->
						</div>
					
                    </div>                                
                </div> 
                <div class="col-md-4">
                    <div class="form-group pad_top">
					<?= $form->field($model, 'last_date_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
                    </div>                                
                </div> 

            </div>
			
			<div class="row">
				
			</div>
			
			
            <div class="row margin_expct">
				<div class="col-md-4">
					<p>Stamp duty/ Registration</p>
				</div>
                <div class="col-md-4">
				
					<div class="row">
						<div class="col-md-10 pad_fild month_lbl text-center pad_top">
						  <?= $form->field($model, 'stamp_duty_lessor')->textInput()->input('text', ['placeholder' => "lessor",'class' => 'one_inpt form-control input-field'])->label(false) ?>
						</div>
						<div class="col-md-2 pad_top text-center"><strong>:</strong></div>
					</div>                             
                </div> 

                <div class="col-md-4">

					<div class="row">
						<div class="col-md-10 pad_fild month_lbl text-center pad_top">
						  <?= $form->field($model, 'stamp_duty_lessee')->textInput()->input('text', ['placeholder' => "Lessee",'class' => 'one_inpt form-control input-field'])->label(false) ?>
							</div>					
					</div> 
				</div>
			</div>

            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
                    <div class="form-group">

                        <?= $form->field($model, 'working_restriction')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Working hours restriction if any','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 

                <div class="col-md-6 small_frm">
                    <div class="form-group">

                        <?= $form->field($model, 'washroom_provision')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Washroom provision inside the premises','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
            </div>


            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success create_butn' : 'btn btn-primary create_butn']) ?> 
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<?php
$script = <<< JS
        
 $('form#{$model->formName()}').on('beforeSubmit',function(e){
 
 $(document).find('#expectid').val('');
   var form = $(this);
   $.post(
    form.attr("action"),
     form.serialize()
   
   )
      .done(function(result){


 if(result != 0 ){
 
        jQuery('#modal').modal('hide');
        $(document).find('#expectid').val(result);
        $(form).trigger("reset");
 toastr.success('Expectation Saved Successfully','success');
       
        

   }else{
 
        $('#message').html('Something Wrong');  
     }
          
   }).fail(function(){
      console.log("server Error"); 
   
   });
   return false;
   
 }); 
        
        
        
JS;
$this->registerJs($script);
?>      


