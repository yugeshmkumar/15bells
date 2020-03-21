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
.pad_top{
	padding-top:10px;
}
.appnd_txt{
	    cursor: default !important;
    margin-top: 1px !important;
}
.span_fx{
	    float: left;
    width: 80px;
    display: block;
}
.icon-addon .form-group{
	float:left;
}
.sell_add{ 
		padding:0px !important;
		border-radius:10px !important; 
	}
	.sell_add .add_no{
		    font-size: 26px;
    border-radius: 10px 0 0 10px!important;
    float: left;
    margin: auto;
    padding: 3px 14px;
	border:1px solid !important;
	}
	.add_det{
		padding-top:5px !important;
	}
	.add_proprt{
		font-size:30px !important;
	}
	.locat_hed{
		background:#ffffff !important;
		margin:0 !important;
		padding:3px;
	}
	.locat_hed h3{
		margin-top:5px !important;
		color:#000000 !important;
	}
	.for_sal{
		padding-top:10px !important;
	}
	.expect_form .form-control{
		border-radius:10px !important;
	}
	.expect_form .btn-default{
		border-radius:10px !important;
	}
	.bordr_bottm{
		border-bottom:1px solid #f5efef;
	}
	.bordr_right{
		border-right:1px solid #f5efef;
	}
	.brdr_top{
		border-top:1px solid #f5efef;
	}
	.control-label{
		padding:8px 0 4px 0;
	}
</style>
<!--<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Lessor</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Expectations</span>
        </li>
    </ul>

</div>-->
 <?php 
    if($model->isNewRecord){  ?>
<div class="mt-element-step">

    <div class="row step-thin">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinlessor','id'=>$propid]) ?>">

            <div class="col-md-3 bg-grey mt-step-col sell_add">
                <div class="bg-white font-grey add_no">1</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="4dp">BASIC DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a> 
        
        <a href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/create']) ?>">
            <div class="col-md-3 bg-grey mt-step-col active sell_add">
                <div class="bg-white font-grey add_no">2</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">Expectations</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
       <!-- <a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/additional']) ?>">-->
 <a href="#">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                 <div class="bg-white font-grey add_no">3</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">ADDITIONAL DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
<a href="#">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                 <div class="bg-white font-grey add_no">4</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">DOCUMENTS UPLOAD</font></div>
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
	 
	 ?>
 
 
 
 <div class="mt-element-step">

    <div class="row step-thin">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinlessor','id'=>$nikalihuipropid]) ?>">

            <div class="col-md-3 bg-grey mt-step-col sell_add">
                <div class="bg-white font-grey add_no">1</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="4dp">BASIC DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a> 
        
        <a href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/create']) ?>">
            <div class="col-md-3 bg-grey mt-step-col active sell_add">
                <div class="bg-white font-grey add_no">2</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">Expectations</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
       <!-- <a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/additional']) ?>">-->
 <a href="#">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                 <div class="bg-white font-grey add_no">3</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">ADDITIONAL DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
<a href="#">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                 <div class="bg-white font-grey add_no">4</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">DOCUMENTS UPLOAD</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
        

    </div>
    <br/>
    <br/>

</div>
 
 <?php } ?>
<div class="portlet box">
    <div class="portlet-title">
        <div class="caption" style="color:#344f5e !important">
            Create Expectations For Your Property</div>
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

        </div>
    </div>
    <div class="portlet-body form expect_form" style="background:rgba(255,255,255,0.25);border-top:3px solid #e5ac31;">
        <div class="form-body">
			<div class="">
            <?php $form = ActiveForm::begin(); ?>


            <div class="row bordr_bottm">
                <div class="col-md-6 bordr_right brdr_top">
                    <div class="form-group">
                        <label class="control-label">Save Expectation As *</label>

                        <?= $form->field($model, 'save_search_as')->textInput(['maxlength' => true])->input('text', ['placeholder' => "Give your own name"])->label(false) ?>

                    </div>                                
                </div>
				<div class="col-md-6 brdr_top">
                    <div class="form-group">
                        <label class="control-label">Dedicated car parkings</label>

                        <?= $form->field($model, 'car_parking')->textInput()->label(false) ?>

                    </div>                                
                </div> 				
                <!--<div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Select Auto Cad drawing</label>

                        <?= $form->field($model, 'auto_cad_drawing')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div>--> 
            </div> 


          <!--  <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Is the Site Approved for Commercial </label>

                        <?= $form->field($model, 'site_approval')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Wet point inside the premises</label>

                        <?= $form->field($model, 'wet_points')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 
            </div> -->


            <div class="row bordr_bottm">
                <div class="col-md-6 bordr_right">
                    <div class="form-group">
                        <label class="control-label col-md-12 labl_col">Interest free security deposit </label>
						<div class="row">
						<div class="col-md-8">
							
							<div class="input-group">
							<div class="icon-addon addon-lg">
								<?= $form->field($model, 'interest_security')->textInput()->label(false) ?>
							<span class="input-group-btn span_fx">
								<button class="btn btn-default appnd_text" type="button">Months</button>
							</span>
							</div>
							</div>
						</div>
						<!--<div class="col-md-2 pad_fild month_lbl text-center">Months</div>-->
						<div class="col-md-4 pad_fild text-center">
						<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
						<?= $form->field($model, 'interest_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
						
						</div></div>
                    </div>                                
                </div> 
               <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-12 labl_col">Agreement</label>
							<div class="row">
								<div class="col-md-6">
									<?= $form->field($model, 'agreement')->dropDownList([ 'Notorised' => 'Notorised', 'Registered' => 'Registered',], ['prompt' => 'Select'])->label(false) ?>
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

            <div class="row bordr_bottm">
                <div class="col-md-6 bordr_right">
                    <div class="form-group">
                        <label class="control-label col-md-12 labl_col">Lease Tenure</label>
					<div class="row">
						<div class="col-md-8">
							
							 <div class="input-group">
							<div class="icon-addon addon-lg">
								 <?= $form->field($model, 'lease_tenure')->textInput(['maxlength' => true])->label(false) ?>
								 <span class="input-group-btn span_fx">
								<button class="btn btn-default appnd_text" type="button">Years</button>
							</span>
							</div>
							</div>
						</div>
						
						<!--<div class="col-md-2 pad_fild month_lbl text-center">Years</div>-->
						<div class="col-md-4 pad_fild text-center">
						<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
						<?= $form->field($model, 'tenure_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
						
						</div></div>
                    </div>                                
                </div> 
               <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-12 labl_col">Lock in period</label>
						<div class="row">
						<div class="col-md-8">
							<div class="input-group">
							<div class="icon-addon addon-lg">
								<?= $form->field($model, 'lock_in_period')->textInput(['maxlength' => true])->label(false) ?>
								<span class="input-group-btn span_fx">
								<button class="btn btn-default appnd_text" type="button">Months</button>
								</span>
							</div>
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




            <div class="row bordr_bottm">
                <div class="col-md-6 bordr_right">
                    <div class="form-group">
                        <label class="control-label">Escalation</label>

                       <div class="row">
						<div class="col-md-8">
							<div class="input-group">
							<div class="icon-addon addon-lg">
								<?= $form->field($model, 'escalation_value')->textInput()->label(false) ?>
								<span class="input-group-btn span_fx">
								<button class="btn btn-default appnd_text" type="button">%</button>
							</span>
							</div>
							</div>
						</div>
						<!--<div class="col-md-2 pad_fild month_lbl text-center">%</div>-->
						<div class="col-md-4 text-center">
							<p style="padding: 7px 2px 7px 2px;background: #f9f9f9;">After</p>
						</div>
			</div>

                    </div>                                
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label">Escalation Month</label>

                       <div class="row">
						<div class="col-md-8">
                         
						 <div class="input-group">
							<div class="icon-addon addon-lg">
								<?= $form->field($model, 'escalation_month')->textInput()->label(false) ?>
								<span class="input-group-btn span_fx">
								<button class="btn btn-default appnd_text" type="button">Months</button>
							</span>
							</div>
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



            <div class="row bordr_bottm">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Present electricity load</label>
						<div class="row">
						<div class="col-md-12">
                        
						 <div class="input-group">
							<div class="icon-addon addon-lg">
								 <?= $form->field($model, 'present_electricity_load')->textInput()->label(false) ?>
								 <span class="input-group-btn span_fx">
								<button class="btn btn-default appnd_text" type="button">KW</button>
							</span>
							</div>
							</div>
						</div>
						<!--<div class="col-md-4 pad_fild month_lbl text-center" style="font-size:12px;">KW</div>-->
						</div>

                    </div>                                
                </div> 
                <div class="col-md-2 bordr_right" style="padding:0;">
					<div class="form-group pad_top">
						<label class="control-label"> </label>
					<?= $form->field($model, 'canBeIncreased_electricity')->checkbox(array('label'=>''))->label('Can be increased'); ?>

                    </div> 					
                </div> 

				<div class="col-md-6">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label">Fit out period</label>
								<div class="row">
								<div class="col-md-12">
								  
								   <div class="input-group">
									<div class="icon-addon addon-lg">
										<?= $form->field($model, 'fit_out_period')->textInput()->label(false) ?>
										<span class="input-group-btn span_fx">
											<button class="btn btn-default appnd_text" type="button">Days</button>
										</span>
									</div>
									</div>
								</div>
								<!--<div class="col-md-4 pad_fild month_lbl text-center">Days</div>-->
								</div>
							</div>                                
						</div> 
						<div class="col-md-4">
							<div class="form-group pad_top">
								<label class="control-label"> </label>
							<?= $form->field($model, 'fit_out_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>

							</div>                                
						</div>
					</div>
				</div>
              <!--  <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Power backup</label>

                        <?= $form->field($model, 'power_backup')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-3">
					<div class="form-group pad_top">
						<label class="control-label"> </label>
					<?= $form->field($model, 'power_can_be_discussed')->checkbox(array('label'=>''))->label('Can be discussed'); ?>

                    </div> 					
                </div>--> 
            </div>
			
			
			<div class="row">
			
				<!--<div class="col-md-6">
					<div class="form-group">
					  <label for="sel1" style="margin-bottom:10px;color:#ffffff;">Property Tax </label>
					  <select class="form-control" id="sel1">
						<option>Select</option>
						<option>Lessor will pay</option>
						<option>Lessee will pay</option>
					  </select>
					</div>	
				</div>-->
				
				
			
			</div>


            <!--<div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Clarity on meter/submeter</label>

                        <?= $form->field($model, 'clarity_on_meter')->dropDownList([ 'Submeter_already_in_place' => 'Submeter already in place', 'Submeter_can_be_provided' => 'Submeter can be provided', 'Common_Meter' => 'Common Meter',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Separate space for genset/ac outdoor/water tank</label>

                        <?= $form->field($model, 'seperate_space')->dropDownList([ 'Chargeable' => 'Chargeable', 'Not Chargeable' => 'Not Chargeable',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 
            </div> -->

           <!--  <div class="row">
                

               <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Motor for water supply</label>

                        <?= $form->field($model, 'motor_water_supply')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-3"> 
					<div class="form-group pad_top">
						<label class="control-label"> </label>
					<?= $form->field($model, 'water_supply_part_maintenance')->checkbox(array('label'=>''))->label('Part of Maintenance'); ?>

                    </div> 					
                </div>
            </div> -->
            
            <!-- <div class="row bordr_bottm">
                <div class="col-md-6 bordr_right">
                    <div class="form-group">
                        <label class="control-label">Rent</label>

                        <?//= //$form->field($model, 'rent')->textInput()->input('text', ['placeholder' => "In Rs."])->label(false) ?>

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Rent Unit</label>

                        <?//= //$form->field($model, 'rent_unit')->dropDownList([ 'per_sq_ft' => 'Per sq ft', 'per_sq_mtr' => 'Per sq mtr', 'per_sq_yards' => 'Per sq yards',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div>  -->
				<div class="col-md-3 pad_fild">
					<label class="control-label"> </label>
						<!--<label class="checkbox-inline"><input type="checkbox" value="">Negotiable</label>-->
						<?= $form->field($model, 'rent_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
						
				</div>
            </div>
			
			

            <div class="row bordr_bottm">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Maintenance</label>
						<div class="row">
						<div class="col-md-12">
                          <?= $form->field($model, 'maintenance_value')->textInput()->input('text', ['placeholder' => "In Rs."])->label(false) ?>
						</div>
						
						</div>
                    </div>                                
                </div> 
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Maintenance Unit</label>

                        <?= $form->field($model, 'maintenance_unit')->dropDownList([ 'per_sq_ft' => 'Per sq ft', 'per_sq_mtr' => 'Per sq mtr', 'per_sq_yards' => 'Per sq yards',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Maintenance Hours</label>

                        <?= $form->field($model, 'maintenance_hours')->dropDownList([ '12 Hours' => '12 Hours', '24 Hours' => '24 Hours',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div>
				<div class="col-md-2 pad_fild month_lbl text-center">
					  <label class="control-label"> </label>
						<div class="row" style="padding-top:6px;color:#fff;">
						Per Month
						</div>
					
				</div>
                <div class="col-md-3" style="padding-top:10px;">
                    <div class="form-group">
                        <label class="control-label"> </label>
						<?= $form->field($model, 'maintenance_subject_change')->checkbox(array('label'=>''))->label('Subject to change'); ?>

                    </div>                                
                </div> 
            </div>


			
            <!--<div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Last date for paying rent</label>
					<div class="row">
						<div class="col-md-12">
                         
						  <div class="input-group">
							<div class="icon-addon addon-lg">
								 <?= $form->field($model, 'last_date_rent')->textInput()->input('text', ['placeholder' => "Enter between 1-31"])->label(false) ?>
								 <span class="input-group-btn span_fx">
											<button class="btn btn-default appnd_text" type="button">for every English Calender Month</button>
										</span>
							</div>
							</div>
						</div>
						<!--<div class="col-md-5 pad_fild month_lbl text-center" style="font-size:14px;">for every English Calender Month</div
						</div>
					
                    </div>                                
                </div> 
                <div class="col-md-2">
                    <div class="form-group pad_top">
                        <label class="control-label"> </label>
					<?= $form->field($model, 'last_date_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
                    </div>                                
                </div> 

            </div>-->
			
			
			
			
            <div class="row" style="padding:30px 0px;">
				<div class="col-md-3">
					<p style="font-size: 15px;padding-top: 14px;">Stamp duty/ Registration</p>
				</div>
                <div class="col-md-5">
				
					<div class="row">
						<div class="col-md-4 pad_top text-center">
							 <label class="control-label" style="padding-top:5px;"> Lessor</label>
						</div>
						<div class="col-md-7 pad_fild month_lbl text-center pad_top" style="font-size:12px;">
						  <?= $form->field($model, 'stamp_duty_lessor')->textInput()->input('text', ['placeholder' => "50"])->label(false) ?>
						</div>
						<div class="col-md-1 pad_top text-center" style="font-size:20px;"><strong>:</strong></div>
					</div>                             
                </div> 

                <div class="col-md-4">

					<div class="row">
						<div class="col-md-4 pad_top text-center">
							 <label class="control-label" style="padding-top:5px;"> Lessee</label>
						</div>
						<div class="col-md-7 pad_fild month_lbl text-center pad_top" style="font-size:12px;">
						  <?= $form->field($model, 'stamp_duty_lessee')->textInput()->input('text', ['placeholder' => "50"])->label(false) ?>
							</div>					
					</div> 
				</div>
			</div>

           <!-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Working hours restriction if any</label>

                        <?= $form->field($model, 'working_restriction')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Washroom provision inside the premises</label>

                        <?= $form->field($model, 'washroom_provision')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 
            </div>-->


            <div class="form-group text-center">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
			</div>
        </div>
    </div>
</div>

