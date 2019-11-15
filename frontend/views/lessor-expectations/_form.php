<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectations */
/* @var $form yii\widgets\ActiveForm */
if(isset($_GET['id'])){
    
    $propid = $_GET['id'];
}
?>
<style>
.field-lessorexpectations-interest_security{
    width:100%;
}
.field-lessorexpectations-lease_tenure{
    width:100%;
}
</style>
<?php if($model->isNewRecord){ ?>
<div class="mt-element-step">

    <div class="row step-thin m-0">
        <a class="col-md-3 othr_tab bordr_rds" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinlessor','id'=>$propid]) ?>">
            <div class="bg-grey mt-step-col active sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>BASIC DETAILS</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a>

<!--<a href="<? //php echo Yii::$app->urlManager->createUrl(['lessor-expectations/create'])  ?>">-->
        <a class="col-md-3 active_tab" href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/create']) ?>" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>Expectations</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
        <!--<a href="<? //php echo Yii::$app->urlManager->createUrl(['addproperty/additional'])  ?>">-->
        <a class="col-md-3 othr_tab" href="#" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>ADDITIONAL DETAILS</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
        <a class="col-md-3 othr_tab no_bordr" href="#" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>DOCUMENTS UPLOAD</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>


    </div>
    <br/>
    <br/>

</div>
 <?php }  else{
	 
	 $primarynotype = \common\models\LessorExpectations::find()->where(['id' => $propid])->one();
                  $nikalihuipropid =     $primarynotype->property_id;
                $user_type   =            $primarynotype->user_type;
                if($user_type == 'lessor'){
	 ?>
 
 
 
 <div class="mt-element-step">

    <div class="row step-thin">
        <a class="col-md-3 othr_tab bordr_rds" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinlessor','id'=>$nikalihuipropid]) ?>">

            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="4dp">BASIC DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a> 
        
        <a class="col-md-3 active_tab" href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/create']) ?>">
            <div class="bg-grey mt-step-col active sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">Expectations</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
       <!-- <a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/additional']) ?>">-->
 <a class="col-md-3 othr_tab" href="#">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">ADDITIONAL DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
<a class="col-md-3 othr_tab" href="#">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">DOCUMENTS UPLOAD</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
        

    </div>
    <br/>
    <br/>

</div>
 
 <?php } } ?>
<div class="portlet box">
    <div class="portlet-title">
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

        </div>
    </div>
    <div class="portlet-body form expect_form">
	
        <div class="caption add_prprt">
           <span class="exp_name"> Property Detail</span></div>
        <div class="form-body">

            <?php $form = ActiveForm::begin(); ?>


            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
                    <div class="form-group">
                        <?= $form->field($model, 'save_search_as')->textInput(['maxlength' => true])->input('text', ['placeholder' => "Save Expectation As *",'class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-6 small_frm" style="display:none;">
                    <div class="form-group">
                        <?= $form->field($model, 'auto_cad_drawing')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select Auto Cad drawing','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-6 small_frm">
                    <div class="form-group">

                        <?= $form->field($model, 'site_approval')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Is the Site Approved for Commercial','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
            </div> 


            <div class="row margin_expct" style="display:none;">
               
                <div class="col-md-6 small_frm">
                    <div class="form-group">
                        <?= $form->field($model, 'wet_points')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Wet point inside the premises','class' => 'one_inpt form-control'])->label(false) ?>

                    </div>                                
                </div> 
            </div> 


            <div class="row margin_expct">
                <div class="col-md-6 small_frm">
						<div class="row m-0">
						
							 <div class="input-container">
   
								<?= $form->field($model, 'interest_security')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Interest free security deposit"])->label(false) ?>
								 <span class="icon_txt">Months</span>
							  </div>
							
						
						<!--<div class="col-md-2 pad_fild month_lbl text-center">Months</div>-->
						</div>
                                                   
                </div> 
               <div class="col-md-6 small_frm">
                    <div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<?= $form->field($model, 'agreement')->dropDownList([ 'Notorised' => 'Notorised', 'Registered' => 'Registered',], ['prompt' => 'Select Agreement','class' => 'one_inpt form-control'])->label(false) ?>
								</div>
								<div class="col-md-6 pad_fild text-center">
								<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
							
								<?= $form->field($model, 'agreement_negotiable')->dropDownList([ '1' => 'Yes', '0' => 'No',], ['prompt' => 'Agreement Negotiable','class' => 'one_inpt form-control'])->label(false) ?>
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

            <div class="row margin_expct" >
                <div class="col-md-12 small_frm">
                    <div class="form-group">
					<div class="row">
						<div class="col-md-6">
								<div class="input-container">
   
								<?= $form->field($model, 'lease_tenure')->textInput(['class' => 'one_inpt form-control input-field','placeholder' => "Lease Tenure",'maxlength' => true])->label(false) ?>
								 <span class="icon_txt">Years</span>
							  </div>
							
						</div>
						
						<!--<div class="col-md-2 pad_fild month_lbl text-center">Years</div>-->
						<div class="col-md-6 pad_fild text-center">
						<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
						
						<?= $form->field($model, 'tenure_negotiable')->dropDownList([ '1' => 'Yes', '0' => 'No',], ['prompt' => 'Tenure Negotiable','class' => 'one_inpt form-control'])->label(false) ?>
						</div></div>
                    </div>                                
                </div>  
               <div class="col-md-6 small_frm"  style="display:none;">
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




            <div class="row margin_expct" style="display:none;">
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



            <div class="row margin_expct" style="display:none;">
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
			
			
			<div class="row margin_expct" style="display:none;">
			
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


            <div class="row margin_expct" style="display:none;">
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

            <div class="row margin_expct" style="display:none;">
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
            
            <div class="row margin_expct" style="display:none;">
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
			
			

            <div class="row margin_expct" style="display:none;">
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


			
            <div class="row margin_expct" style="display:none;">
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
			
			
            <div class="row margin_expct" style="display:none;">
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

            <div class="row margin_expct" style="display:none;">
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
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success create_butn' : 'btn btn-primary create_butn','onClick'=>'ga("send", "event", "Add property lessor expectations create", "Add property lessor expectations create", "Add property lessor expectations create","Add property lessor expectations create")']) ?> 
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

