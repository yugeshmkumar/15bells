<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\PropertyType;
use kartik\widgets\Typeahead;

/* @var $this yii\web\View */
/* @var $model common\models\Addproperty */
/* @var $form yii\widgets\ActiveForm */

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(isset($_SESSION['lesproptype'])){   
       
        // get a session variable. The following usages are equivalent:
         $getproptype = $_SESSION['lesproptype'];
       
        $getcity = $_SESSION['lesgetcity'];
        $getlocation = $_SESSION['leslocation'];

        session_unset();  
    }
?>
<style>
#map_canvas {
       height: 400px;
   }
   html, body, #map-canvas {
       height: 250px;
       margin: 0px;
       padding: 0px;
   }
   #ui-datepicker-div{
       width:260px !important;
       background:#ffffff !important;
       padding:0 10px !important;
   }
   .ui-datepicker-calendar{
       width:260px !important;
   }
   .ui-datepicker-next{
       float:right;
   }
   .ui-datepicker-header{
       padding:0 10px;
   }
</style>
<div class="mt-element-step">

    <div class="row step-thin m-0">
        <a class="col-md-3 active_tab bordr_rds" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/create']) ?>">
            <div class="bg-grey mt-step-col active sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>BASIC DETAILS</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a>

<!--<a href="<? //php echo Yii::$app->urlManager->createUrl(['lessor-expectations/create'])  ?>">-->
        <a class="col-md-3 othr_tab" href="#" style="cursor:default !important;">
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
        <a class="col-md-3 othr_tab no_bordr bordr_rds_rt" href="#" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>DOCUMENTS UPLOAD</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>


    </div>
    <br/>
    <br/>

</div>
<div class="portlet box add_proprty">

   
    <div class="portlet-body form">



        <?php $form = ActiveForm::begin(); ?>

        <div class="form-body">
            <div class="container-fluid main_cont">
				 <div class="portlet-title">
					<div class="caption add_prprt"><span>Add Property</span></div>
					<div class="tools">
						<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

					</div>
				</div>
                <?php 
             $arrfindmykyc = \common\models\AddpropertyfieldsTitle::find()->where(['is_active' => '1'])->all();


             $userdata = ArrayHelper::map($arrfindmykyc, 'field_name', 'field_title');

            
             ?>




                <div class="row"> 
                    <div class="col-md-12">

                    </div>
                </div><br>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                        <?php if(isset($getproptype)){
                                $model->project_type_id = $getproptype;
                            } ?>
                            <?=
                            $form->field($model, 'project_type_id')->dropDownList(ArrayHelper::map(PropertyType::find()->where(['undercategory' => "Commercial", 'isactive' => 1])->all(), 'id', 'typename'), [
                                'prompt' => 'Select Property  type',
                                'onchange' => 'gettype(value)',
                                'id' => 'project_type','class' => 'one_inpt form-control'
                                    /* 'onchange'=>'$.post("index.php?r=citylist/lists&id='.'"+$(this).val(),function(data){
                                      $("#veterinarian-state_id").html(data);
                                      });' */
                            ])->label(false);
                            ?>                   


                        </div>                                
                    </div>   
                </div>


                <div class="row">    
                    <div class="col-md-6">
                        <div class="form-group">

                            <?php
                            if ($model->scenario == 'create') {

                                $model->request_for = 'Instant';
                                ?>

                                <?= $form->field($model, 'request_for')->textInput(['readonly' => true, 'placeholder' => "Instant", 'class' => 'one_inpt form-control'])->label(false) ?>

                            <?php
                            } else {

                                if ($model->request_for == 'bid') {
                                    ?> 
                                    <?= $form->field($model, 'request_for')->textInput(['readonly' => true, 'placeholder' => "Bid", 'class' => 'one_inpt form-control'], ['value' => 'Forward Auction'])->label(false) ?>


    <?php } else { ?>


        <?= $form->field($model, 'request_for')->dropDownList(['bid' => 'Forward Auction', 'Instant' => 'Instant',], ['prompt' => '', 'id' => 'request_for'])->label(false)
        ?>

                                <?php }
                            } ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <?php 
                        if(isset($getcity)){
                                $model->city = $getcity;
                            }
                            ?>
                            <?= $form->field($model, 'city')->dropDownList(['Gurgaon' => 'Gurgaon', 'Delhi' => 'Delhi', 'Noida' => 'Noida', 'Greater Noida' => 'Greater Noida', 'Faridabad' => 'Faridabad', 'Ghaziabad' => 'Ghaziabad'], ['prompt' => 'Select City', 'onchange' => 'getcity(this.value)', 'id' => 'citym', 'class' => 'one_inpt form-control', 'title'=>$userdata['city']])->label(false) ?>


                        </div>
                    </div>
                </div>

                <div class="row">   
                    <div class="col-md-6">

                        <div class="form-group">
                        <?php 
                           if(isset($getlocation)){
                            $model->locality = $getlocation;
                        }
                        ?>
                            <?= $form->field($model, 'locality')->textInput(['id' => 'searchTextField', 'onchange' => 'getmap(this.value)', 'placeholder' => "Locality", 'class' => 'one_inpt location_set form-control', 'title'=>$userdata['locality']])->label(false) ?>
                        </div>
                    </div>

                    <div class="col-md-6" >
                        <div class="form-group">          
                            <?= $form->field($model, 'address')->textInput(['id' => 'address', 'placeholder' => "Address", 'class' => 'one_inpt form-control', 'title'=>$userdata['address']])->label(false) ?>
                        </div>
                    </div>
                </div>
				 <div class="row propr_map">
				<div class="col-md-12">
					<p class="prop_loc"><span><i class="fa fa-map-marker markr_mp"></i></span>Place this marker at your property location.<span class="pull-right"><button type="button" onclick="getbrandcount(),ga('send', 'event', 'Addproperty create getcount submit', 'Addproperty create getcount submit', 'Addproperty create getcount submit','Addproperty create getcount submit');" class="btn btn-danger sbmt_butn location_sb">Submit</button></span></p>
				</div>
                <div class="col-md-12"> 
                    <div id="map-canvas"></div>
                </div>
            </div>

            </div>
           

            
            <div class="container-fluid main_cont">
				<h4 class="form-section">Property Details</h4>
                <div class="row">
                    <div class="col-md-12">
						  <div class="row">
								<div class="col-md-4" id="plot_areas">
									<div class="form-group">   
										<?= $form->field($model, 'total_plot_area')->textInput(['class' => 'one_inpt form-control',  'placeholder' => "Address", 'placeholder' => "Plot Area"])->label(false) ?>
									</div>
								</div>

								<div class="col-md-2" id="plot_uits">
									<div class="form-group">             
										<?= $form->field($model, 'plot_unit')->dropDownList(['sq_feets' => 'Sq.Ft', 'sq_yards' => 'Sq.Yards', 'sq_meters' => 'Sq.Meter',], ['prompt' => 'Select Unit', 'id' => 'plot_uit','class' => 'one_inpt form-control'])->label(false) ?>
									</div>
								</div>

								<div class="col-md-4" id="Super_builts">
									<div class="form-group">
										<?= $form->field($model, 'buildup_area')->textInput(['class' => 'one_inpt form-control',  'placeholder' => "Super Built Up Area", 'title'=>$userdata['buildup_area']])->label(false) ?>
									</div>
								</div>
								<div class="col-md-2" id="superbuilt_uits">
									<div class="form-group">
										<?= $form->field($model, 'build_unit')->dropDownList(['sq_feets' => 'Sq.Ft', 'sq_yards' => 'Sq.Yards', 'sq_meters' => 'Sq.Meter',], ['prompt' => 'Select Unit', 'id' => 'superbuilt_uit','class' => 'one_inpt form-control'], ['onchange' => 'selectionchange();'])->label(false) ?>

									</div>
								</div>
                        </div>
                    </div>
                    <div class="col-md-12">
						<div class="row">
                        <div class="col-md-4" id="carpet_areas">
                            <div class="form-group">
                                <?= $form->field($model, 'carpet_area')->textInput([ 'placeholder' => "Carpet Area",'class' => 'one_inpt form-control', 'title'=>$userdata['carpet_area']])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-2" id="carpet_uits">
                            <div class="form-group">
                                <?= $form->field($model, 'carpet_unit')->dropDownList(['sq_feets' => 'Sq.Ft', 'sq_yards' => 'Sq.Yards', 'sq_meters' => 'Sq.Meter',], ['prompt' => 'Select Unit', 'id' => 'carpet_uit', 'class' => 'one_inpt form-control'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-6" id="maintain_row">
							<div class="row">
								<div class="col-md-8" id="mentanence_costs">
									<div class="form-group">
										<?= $form->field($model, 'maintenance_cost')->textInput(['maxlength' => true, 'class' => 'one_inpt form-control'])->input('text', ['placeholder' => "Monthly Maintenance Cost", 'title'=>$userdata['maintenance_cost']])->label(false) ?>
										<!--<label class="test" id="lblerror" style="color:red;">value should be less than Built up Area</label>
										<label class="abcd" id="lablerror" style="color:red;">value should be less than plot Area</label>-->
									</div>
								</div>

								<div class="col-md-4" id="maintenance_cost_units">
									<div class="form-group">
										<?= $form->field($model, 'maintenance_cost_unit')->dropDownList(['sq_feets' => 'Sq.Ft', 'sq_yards' => 'Sq.Yards', 'sq_meters' => 'Sq.Meter',], ['prompt' => 'Select Unit', 'id' => 'maintenance_uit', 'class' => 'one_inpt form-control', 'title'=>$userdata['maintenance_cost_unit']])->label(false) ?>
									</div>
								</div>
							</div>
                        </div>
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="row">
							<div class="col-md-6" id="property_floors">
								<div class="form-group">
									<?= $form->field($model, 'property_on_floor')->textInput(['id' => 'property_floor', 'class' => 'one_inpt form-control', 'placeholder' =>"Property on Floor", 'title'=>$userdata['property_on_floor']])->label(false) ?>

								</div> 
							</div>

							<div class="col-md-6" id="furnisheds">
								<div class="form-group">
									<?= $form->field($model, 'furnished_status')->dropDownList(['furnished' => 'Furnished', 'semi_furnished' => 'Semi furnished', 'bareshell' => 'Bareshell',], ['prompt' => 'Select Furnishing', 'id' => 'furnished', 'class' => 'one_inpt form-control', 'title'=>$userdata['furnished_status']])->label(false) ?>
								</div>
							</div> 
						</div>
					</div>
                </div>





                <h4 class="form-section">Pricing</h4>
                <div class="row"> 

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?= $form->field($model, 'asking_rental_price')->textInput(['maxlength' => true])->input('text', ['placeholder' => "Askin Rental in Rs.", 'class' => 'one_inpt form-control', 'title'=>$userdata['expected_price']])->label(false) ?>
								</div>
							</div>
							<div class="col-md-6" id="negotiables">
								<div class="form-group">
                                <?= $form->field($model, 'price_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Price Negotiable', 'class' => 'one_inpt form-control', 'title'=>$userdata['price_negotiable']])->label(false) ?>

									
								</div>
							</div>
						</div>
					</div>
                    <div class="col-md-12 no_pad">
						<div class="row">
							<div class="col-md-6" id="price_sq_fts">
								<div class="form-group">                
									<?= $form->field($model, 'price_sq_ft')->textInput(['id' => 'price_sq_ft', 'class' => 'one_inpt form-control', 'placeholder' => "Price per sq.", 'title'=>$userdata['price_sq_ft']])->label(false) ?>
								</div>
							</div>
							<div class="col-md-6" id="price_acress">
								<div class="form-group">              
									<?= $form->field($model, 'price_acres')->textInput(['id' => 'price_acres', 'class' => 'one_inpt form-control', 'placeholder' => "Price per acre"])->label(false) ?>
								</div>
							</div>
						</div>
                    </div>

                </div>

                <h4 class="form-section">Add more details about Price</h4>

                <div class="row">

                    <div class="col-md-12 no_pad">
						<div class="row">

                 <?php if(!$model->isNewRecord){ 
                             
                             if($model->revenue_lauout !=''){  ?>

                             <div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'revenue_lauout')->dropDownList(['yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select Revenue', 'id' => 'revenue', 'class' => 'one_inpt form-control'])->label(false) ?>
								</div>
							</div>

                             <?php } else{ ?>

                             <div class="col-md-6" style="display:none;">
								<div class="form-group">
									<?= $form->field($model, 'revenue_lauout')->dropDownList(['yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select Revenue', 'id' => 'revenue', 'class' => 'one_inpt form-control'])->label(false) ?>
								</div>
							</div>
                             <?php }  }else{  ?>
							<div class="col-md-6" id="revenues">
								<div class="form-group">
									<?= $form->field($model, 'revenue_lauout')->dropDownList(['yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select Revenue', 'id' => 'revenue', 'class' => 'one_inpt form-control'])->label(false) ?>
								</div>
							</div>
                             <?php }   ?>


                 <?php if(!$model->isNewRecord){ 
                             
                             if($model->present_status !=''){  ?>

                            
							<div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'present_status')->dropDownList(['agriculture' => 'Agriculture', 'R_zone' => 'R zone', 'institutional' => 'Institutional', 'warehousing' => 'Warehousing', 'others' => 'Others',], ['prompt' => 'Select Status', 'id' => 'present_status', 'class' => 'one_inpt form-control'])->label(false) ?>
								</div>
							</div>
                             <?php } else{ ?>

                             <div class="col-md-6" style="display:none;" >
								<div class="form-group">
									<?= $form->field($model, 'present_status')->dropDownList(['agriculture' => 'Agriculture', 'R_zone' => 'R zone', 'institutional' => 'Institutional', 'warehousing' => 'Warehousing', 'others' => 'Others',], ['prompt' => 'Select Status', 'id' => 'present_status', 'class' => 'one_inpt form-control'])->label(false) ?>
								</div>
							</div>

                             <?php } } else { ?>

                             <div class="col-md-6" id="present_statuss">
								<div class="form-group">
									<?= $form->field($model, 'present_status')->dropDownList(['agriculture' => 'Agriculture', 'R_zone' => 'R zone', 'institutional' => 'Institutional', 'warehousing' => 'Warehousing', 'others' => 'Others',], ['prompt' => 'Select Status', 'id' => 'present_status', 'class' => 'one_inpt form-control'])->label(false) ?>
								</div>
							</div>

                             <?php } ?>




             <?php if(!$model->isNewRecord){ 
                             
                             if($model->jurisdiction_development !=''){  ?>

							<div class="col-md-6">
								<div class="form-group">
									<?= $form->field($model, 'jurisdiction_development')->textInput(['maxlength' => 10, 'id' => 'jurisdiction', 'class' => 'one_inpt form-control', 'placeholder' => "Jurisdiction of development", 'title'=>$userdata['jurisdiction_development']])->label(false) ?>
								</div>
							</div>

                             <?php } else{ ?>

                             <div class="col-md-6" style="display:none;">
								<div class="form-group">
									<?= $form->field($model, 'jurisdiction_development')->textInput(['maxlength' => 10, 'id' => 'jurisdiction', 'class' => 'one_inpt form-control', 'placeholder' => "Jurisdiction of development", 'title'=>$userdata['jurisdiction_development']])->label(false) ?>
								</div>
							</div>

                             <?php }  } else { ?>

                             <div class="col-md-6" id="jurisdictions">
								<div class="form-group">
									<?= $form->field($model, 'jurisdiction_development')->textInput(['maxlength' => 10, 'id' => 'jurisdiction', 'class' => 'one_inpt form-control', 'placeholder' => "Jurisdiction of development", 'title'=>$userdata['jurisdiction_development']])->label(false) ?>
								</div>
							</div>

                             <?php } ?>




                      <?php if(!$model->isNewRecord){ 
                             
                             if($model->shed_RCC !=''){  ?>

							<div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'shed_RCC')->dropDownList(['Shed' => 'Shed', 'RCC' => 'RCC',], ['prompt' => 'Shed / RCC', 'id' => 'shed', 'class' => 'one_inpt form-control'])->label(false) ?>
								</div>
							</div>
                             <?php } else{ ?>
                                <div class="col-md-6" style="display:none;">
								<div class="form-group">
									<?= $form->field($model, 'shed_RCC')->dropDownList(['Shed' => 'Shed', 'RCC' => 'RCC',], ['prompt' => 'Shed / RCC', 'id' => 'shed', 'class' => 'one_inpt form-control'])->label(false) ?>
								</div>
							</div>

                             <?php } } else{ ?>

                             <div class="col-md-6" id="sheds">
								<div class="form-group">
									<?= $form->field($model, 'shed_RCC')->dropDownList(['Shed' => 'Shed', 'RCC' => 'RCC',], ['prompt' => 'Shed / RCC', 'id' => 'shed', 'class' => 'one_inpt form-control'])->label(false) ?>
								</div>
							</div>

                             <?php } ?>




                   <?php if(!$model->isNewRecord){ 
                             
                             if($model->maintenance_by !=''){  ?>

							<div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'maintenance_by')->dropDownList(['monthly' => 'Monthly', 'annually' => 'Annually', 'one_time' => 'One time',], ['prompt' => 'Maintenance By', 'id' => 'mentanence_by', 'class' => 'one_inpt form-control', 'title'=>$userdata['maintenance_by']])->label(false) ?>
								</div>
							</div>
                             <?php } else { ?>

                             <div class="col-md-6" style="display:none;">
								<div class="form-group">
									<?= $form->field($model, 'maintenance_by')->dropDownList(['monthly' => 'Monthly', 'annually' => 'Annually', 'one_time' => 'One time',], ['prompt' => 'Maintenance By', 'id' => 'mentanence_by', 'class' => 'one_inpt form-control', 'title'=>$userdata['maintenance_by']])->label(false) ?>
								</div>
							</div>
                             <?php } }else { ?>

                             <div class="col-md-6" id="mentanence_bys">
								<div class="form-group">
									<?= $form->field($model, 'maintenance_by')->dropDownList(['monthly' => 'Monthly', 'annually' => 'Annually', 'one_time' => 'One time',], ['prompt' => 'Maintenance By', 'id' => 'mentanence_by', 'class' => 'one_inpt form-control', 'title'=>$userdata['maintenance_by']])->label(false) ?>
								</div>
							</div>
                             <?php } ?>




                             <?php if(!$model->isNewRecord){ 
                             
                             if($model->annual_dues_payable !=''){  ?>

							<div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'annual_dues_payable')->textInput(['maxlength' => true, 'id' => 'annual_dues', 'class' => 'one_inpt form-control', 'placeholder' => "Annual dues payable", 'title'=>$userdata['annual_dues_payable']])->label(false) ?>
								</div>
							</div>

                             <?php  }else {  ?>

                            <div class="col-md-6" style="display:none;">
								<div class="form-group">
									<?= $form->field($model, 'annual_dues_payable')->textInput(['maxlength' => true, 'id' => 'annual_dues', 'class' => 'one_inpt form-control', 'placeholder' => "Annual dues payable", 'title'=>$userdata['annual_dues_payable']])->label(false) ?>
								</div>
							</div>

                             <?php } } else { ?>

                             <div class="col-md-6" id="annual_duess">
								<div class="form-group">
									<?= $form->field($model, 'annual_dues_payable')->textInput(['maxlength' => true, 'id' => 'annual_dues', 'class' => 'one_inpt form-control', 'placeholder' => "Annual dues payable", 'title'=>$userdata['annual_dues_payable']])->label(false) ?>
								</div>
							</div>


                             <?php } ?>


           
                                    <!-- start   age_of_property -->
                                    

                         <?php if(!$model->isNewRecord){ 
                             
                             if($model->age_of_property !=''){  ?>
                             
                             <div class="col-md-6">
								<div class="form-group">


									<?= $form->field($model, 'age_of_property')->dropDownList(['0-1' => '0-1 Year Old Property', '1-5' => '1-5 Year Old Property', '5-10' => '5-10 Year Old Property', '10-15' => '10-15 Year Old Property', '15-20' => '15-20 Year Old Property', '20-25' => '20-25 Year Old Property', '25-30' => '25-30 Year Old Property', '30+' => '30+ Year Old Property',], ['prompt' => 'Select property age', 'id' => 'property_age', 'class' => 'one_inpt form-control', 'title'=>$userdata['age_of_property']])->label(false) ?>


								</div>
							</div>
                             <?php  } else{  ?>

                             <div class="col-md-6" style="display:none;">
								<div class="form-group">


									<?= $form->field($model, 'age_of_property')->dropDownList(['0-1' => '0-1 Year Old Property', '1-5' => '1-5 Year Old Property', '5-10' => '5-10 Year Old Property', '10-15' => '10-15 Year Old Property', '15-20' => '15-20 Year Old Property', '20-25' => '20-25 Year Old Property', '25-30' => '25-30 Year Old Property', '30+' => '30+ Year Old Property',], ['prompt' => 'Select property age', 'id' => 'property_age', 'class' => 'one_inpt form-control', 'title'=>$userdata['age_of_property']])->label(false) ?>


								</div>
							</div>
                             <?php  } }else{?>
							<div class="col-md-6" id="property_ages">
								<div class="form-group">


									<?= $form->field($model, 'age_of_property')->dropDownList(['0-1' => '0-1 Year Old Property', '1-5' => '1-5 Year Old Property', '5-10' => '5-10 Year Old Property', '10-15' => '10-15 Year Old Property', '15-20' => '15-20 Year Old Property', '20-25' => '20-25 Year Old Property', '25-30' => '25-30 Year Old Property', '30+' => '30+ Year Old Property',], ['prompt' => 'Select property age', 'id' => 'property_age', 'class' => 'one_inpt form-control', 'title'=>$userdata['age_of_property']])->label(false) ?>


								</div>
							</div>
                             <?php } ?>

                           <!-- end age_of_property -->

                   <?php if(!$model->isNewRecord){ 
                             
                             if($model->possesion_by !=''){  ?>

                            <div class="col-md-6" >
							<?= $form->field($model, 'possesion_by')->dropDownList([ 'Immediate' => 'Immediate', '30 Days' => '30 Days', '45 Days' => '45 Days', '60 Days' => '60 Days', '90 Days' => '90 Days', '6 Months' => '6 Months',], ['prompt' => 'Select Possession', 'id' => 'possesion', 'class' => 'one_inpt form-control', 'title'=>$userdata['possesion_by']])->label(false) ?>
							
					</div>
                             <?php } else { ?>
                                <div class="col-md-6" style="display:none;">
							<?= $form->field($model, 'possesion_by')->dropDownList([ 'Immediate' => 'Immediate', '30 Days' => '30 Days', '45 Days' => '45 Days', '60 Days' => '60 Days', '90 Days' => '90 Days', '6 Months' => '6 Months',], ['prompt' => 'Select Possession', 'id' => 'possesion', 'class' => 'one_inpt form-control', 'title'=>$userdata['possesion_by']])->label(false) ?>
							
					</div>
                             <?php } }else { ?>
                                <div class="col-md-6" id="possesions">
							<?= $form->field($model, 'possesion_by')->dropDownList([ 'Immediate' => 'Immediate', '30 Days' => '30 Days', '45 Days' => '45 Days', '60 Days' => '60 Days', '90 Days' => '90 Days', '6 Months' => '6 Months',], ['prompt' => 'Select Possession', 'id' => 'possesion', 'class' => 'one_inpt form-control', 'title'=>$userdata['possesion_by']])->label(false) ?>
							
					</div>
                             <?php } ?>





                 <?php if(!$model->isNewRecord){ 
                             
                             if($model->LOAN_taken !=''){  ?>

							<div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'LOAN_taken')->dropDownList(['yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Loan Against Property', 'id' => 'loan_taken', 'class' => 'one_inpt form-control', 'title'=>$userdata['city']])->label(false) ?>
								</div>
							</div>

                             <?php } else { ?>

                             <div class="col-md-6" style="display:none;>
								<div class="form-group">
									<?= $form->field($model, 'LOAN_taken')->dropDownList(['yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Loan Against Property', 'id' => 'loan_taken', 'class' => 'one_inpt form-control', 'title'=>$userdata['city']])->label(false) ?>
								</div>
							</div>

                             <?php } }else { ?>

                             <div class="col-md-6" id="loan_takens">
								<div class="form-group">
									<?= $form->field($model, 'LOAN_taken')->dropDownList(['yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Loan Against Property', 'id' => 'loan_taken', 'class' => 'one_inpt form-control', 'title'=>$userdata['city']])->label(false) ?>
								</div>
							</div>

                             <?php } ?>

                             
                             <?php if(!$model->isNewRecord){ 
                             
                             if($model->facing !=''){  ?>

							<div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'facing')->dropDownList(['north' => 'North', 'west' => 'West', 'south' => 'South', 'east' => 'East', 'north_east' => 'North east', 'south_east' => 'South east', 'north_west' => 'North west', 'south_west' => 'South west',], ['prompt' => 'Select Facing', 'id' => 'facing', 'class' => 'one_inpt form-control', 'title'=>$userdata['facing']])->label(false) ?>
								</div>
							</div>

                             <?php }else { ?>
                                <div class="col-md-6" style="display:none;">
								<div class="form-group">
									<?= $form->field($model, 'facing')->dropDownList(['north' => 'North', 'west' => 'West', 'south' => 'South', 'east' => 'East', 'north_east' => 'North east', 'south_east' => 'South east', 'north_west' => 'North west', 'south_west' => 'South west',], ['prompt' => 'Select Facing', 'id' => 'facing', 'class' => 'one_inpt form-control', 'title'=>$userdata['facing']])->label(false) ?>
								</div>
							</div>
                             <?php }  } else { ?>

                             <div class="col-md-6" id="facings">
								<div class="form-group">
									<?= $form->field($model, 'facing')->dropDownList(['north' => 'North', 'west' => 'West', 'south' => 'South', 'east' => 'East', 'north_east' => 'North east', 'south_east' => 'South east', 'north_west' => 'North west', 'south_west' => 'South west',], ['prompt' => 'Select Facing', 'id' => 'facing', 'class' => 'one_inpt form-control', 'title'=>$userdata['facing']])->label(false) ?>
								</div>
							</div>

                             <?php } ?>



                             <?php if(!$model->isNewRecord){ 
                             
                             if($model->ownership !=''){  ?>

							<div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'ownership')->dropDownList(['freehold' => 'Freehold', 'lease_hold' => 'Lease hold', 'cooperative_society' => 'Cooperative society', 'power_of_attorney' => 'Power of attorney',], ['prompt' => 'Select ownership', 'id' => 'ownership', 'class' => 'one_inpt form-control', 'title'=>$userdata['ownership']])->label(false) ?>
								</div>
							</div>

                             <?php } else {  ?>

                             <div class="col-md-6" style="display:none;">
								<div class="form-group">
									<?= $form->field($model, 'ownership')->dropDownList(['freehold' => 'Freehold', 'lease_hold' => 'Lease hold', 'cooperative_society' => 'Cooperative society', 'power_of_attorney' => 'Power of attorney',], ['prompt' => 'Select ownership', 'id' => 'ownership', 'class' => 'one_inpt form-control', 'title'=>$userdata['ownership']])->label(false) ?>
								</div>
							</div>
                             <?php } } else { ?>

                             <div class="col-md-6" id="ownerships">
								<div class="form-group">
									<?= $form->field($model, 'ownership')->dropDownList(['freehold' => 'Freehold', 'lease_hold' => 'Lease hold', 'cooperative_society' => 'Cooperative society', 'power_of_attorney' => 'Power of attorney',], ['prompt' => 'Select ownership', 'id' => 'ownership', 'class' => 'one_inpt form-control', 'title'=>$userdata['ownership']])->label(false) ?>
								</div>
							</div>
                             <?php } ?>



                             
                             <?php if(!$model->isNewRecord){ 
                             
                             if($model->availability !=''){  ?>

							<div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'availability')->dropDownList(['under_construction' => 'Under Construction', 'ready_to_move' => 'Ready to move',], ['prompt' => 'Select Availability', 'id' => 'availability', 'class' => 'one_inpt form-control', 'title'=>$userdata['availability']])->label(false) ?>
								</div>
							</div>
                             <?php } else { ?>
                                <div class="col-md-6" style="display:none;">
								<div class="form-group">
									<?= $form->field($model, 'availability')->dropDownList(['under_construction' => 'Under Construction', 'ready_to_move' => 'Ready to move',], ['prompt' => 'Select Availability', 'id' => 'availability', 'class' => 'one_inpt form-control', 'title'=>$userdata['availability']])->label(false) ?>
								</div>
							</div> 
                             <?php } } else { ?>
                                <div class="col-md-6" id="availabilitys">
								<div class="form-group">
									<?= $form->field($model, 'availability')->dropDownList(['under_construction' => 'Under Construction', 'ready_to_move' => 'Ready to move',], ['prompt' => 'Select Availability', 'id' => 'availability', 'class' => 'one_inpt form-control', 'title'=>$userdata['availability']])->label(false) ?>
								</div>
							</div> 
                             <?php } ?>



                      <?php if(!$model->isNewRecord){ 
                             
                             if($model->FAR_approval !=''){  ?>

							<div class="col-md-6" >
								<div class="form-group">
									<?= $form->field($model, 'FAR_approval')->textInput(['id' => 'far_approval', 'class' => 'one_inpt form-control', 'placeholder' => "FAR Aprroved"])->label(false) ?> 
								</div>
							</div> 
                             <?php }else { ?>
                                <div class="col-md-6" style="display:none;" >
								<div class="form-group">
									<?= $form->field($model, 'FAR_approval')->textInput(['id' => 'far_approval', 'class' => 'one_inpt form-control', 'placeholder' => "FAR Aprroved"])->label(false) ?> 
								</div>
							</div> 
                             <?php } } else { ?>

                             <div class="col-md-6" id="far_approvals">
								<div class="form-group">
									<?= $form->field($model, 'FAR_approval')->textInput(['id' => 'far_approval', 'class' => 'one_inpt form-control', 'placeholder' => "FAR Aprroved"])->label(false) ?> 
								</div>
							</div> 

                             <?php } ?>




                            

							<div class="col-md-6">
								<div class="col-md-6" id="available_froms">
									<div class="form-group">
										<label class="control-label">Available From *</label>
										<?= $form->field($model, 'available_from')->radioList(array('Immediate' => 'Immediate', 'Date' => 'Date'), array('id' => 'radioavailable'))->label(false) ?>


									</div>
								</div>
								<div class="col-md-6" id="available_date">
									<div class="form-group">
										<!--<label class="control-label">Select Date *</label>-->
										<?= $form->field($model, 'available_date')->textInput() ?> 
									</div>
								</div>
							</div>
						</div>
                    </div>




                    <input type="hidden" value="" id="lat1" name="lat1">
                    <input type="hidden" value="" id="long1" name="long1">
                    <input type="hidden" value="" id="town" name="town">
                    <input type="hidden" value="" id="sector" name="sector">
                    <?php if(!$model->isNewRecord){ 
    
    
    
    ?>
                              
                              <input type="hidden"  id="latu" value="<?php echo $model->latitude; ?>">
                              <input type="hidden" id="longu" value="<?php echo $model->longitude; ?>">

<?php } ?>

                </div>



                <div class="col-md-12 text-center">


                    <div class="form-actions right save_frm">

                        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn blue save_buttn' : 'btn btn-primary save_buttn','onClick'=>'ga("send", "event", "add property create submit button", "add property create submit button", "add property create submit button","add property create submit button")']) ?>


                    </div>          
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
</div>
<script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&sensor=false&libraries=geometry,drawing,places"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>



<script>
    $(document).ready(function () {

        var select_ID = $("#project_type").val();
        // alert(select_ID);
        makegettype(select_ID);


        $("#jurisdiction").keypress(function (event) {
            var inputValue = event.which;
            // allow letters and whitespaces only.
            if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
                event.preventDefault();
            }
        });
    });

</script>
<script>

    $("#superbuilt_uit").change(function () {
        var id = $(this).val();
        $("#carpet_uit").val(id);
        $("#maintenance_uit").val(id);
    });
    $("#plot_uit").change(function () {
        var id = $(this).val();
        $("#superbuilt_uit").val(id);
        $("#carpet_uit").val(id);
        $("#maintenance_uit").val(id);
    });

   // $('#carpet_uit').attr("disabled", true);
  //  $('#maintenance_uit').attr("disabled", true);
</script>

<script>

    var dateToday = new Date();
    var dates = $("#addproperty-available_date").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: dateToday,
        onSelect: function (selectedDate) {
            var option = this.id == "addproperty-available_date" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            dates.not(this).datepicker("option", option, date);
        }
    });


</script>


<script>


    $(document).ready(function () {

        //$('#present_statuss').hide(); 
        $('#available_date').hide();

        $('input:radio[name="Addproperty[available_from]"]').change(function () {

            if ($(this).is(':checked') && $(this).val() == 'Immediate') {
                $('#available_date').hide();
            }
            if ($(this).is(':checked') && $(this).val() == 'Date') {
                $('#available_date').show();
            }
        });



        var t2 = $('#addproperty-buildup_area').val();




        $('#plot_uit').change(function () {



            var plotunit = $('#plot_uit').val();

            if (plotunit != '') {


                if (plotunit == 'sq_feets') {
                    $('#changeft').html('Ft');
                } else if (plotunit == 'sq_yards') {

                    $('#changeft').html('Yards');
                } else if (plotunit == 'sq_meters') {
                    $('#changeft').html('Meters');
                } else {
                    $('#changeft').html('fts');
                }

            }

        });



        $('#superbuilt_uit').change(function () {

            var t1 = $('#addproperty-total_plot_area').val();

            var superbuilt_uit = $('#superbuilt_uit').val();

            if (t1 == '') {
                //alert(t1);
                if (t1 == '' && superbuilt_uit == 'sq_feets') {
                    $('#changeft').html('Ft');
                } else if (t1 == '' && superbuilt_uit == 'sq_yards') {

                    $('#changeft').html('Yards');
                } else if (t1 == '' && superbuilt_uit == 'sq_meters') {
                    $('#changeft').html('Meters');
                } else {
                    $('#changeft').html('fts');
                }

            }

        });

        $('#addproperty-asking_rental_price,#addproperty-buildup_area,#addproperty-total_plot_area').on('change keyup click', function () {

            var plot = $('#addproperty-total_plot_area').val();
            var superb = $('#addproperty-buildup_area').val();
            var rental = $('#addproperty-asking_rental_price').val();
            var price = '';
            var priceacre = '';

            if (plot != '') {

                price = rental / plot;
                priceacre = price * 43560;

            } else {

                price = rental / superb;
                priceacre = price * 43560;
            }

            if (!isNaN(price) && priceacre != 'Infinity') {
                $('#price_sq_ft').val(price);
            }
            //$('#price_acres').val(priceacre);
            if (!isNaN(priceacre) && priceacre != 'Infinity') {
                $('#price_acres').val(priceacre);
            }

        });


    });
//var cityname = document.getElementById('selcity');
    var globalvar = '';

    function getcity(val) {
        $('#searchTextField').val('');
        globalvar = val;

    }




    function gettype(val) {

        // alert(val);
        makegettype(val);

    }

    function makegettype(val) {

        if (val == '11' || val == '12' || val == '13' || val == '26' || val == '27' || val == '28') {
            $('#plot_areas').hide();
            $('#plot_uits').hide();

        } else {
            $('#plot_areas').show();
            $('#plot_uits').show();
        }

        if (val == '15' || val == '22' || val == '17' || val == '23' || val == '16') {
            $('#carpet_areas').hide();
            $('#Super_builts').hide();
            $('#carpet_uits').hide();
            $('#superbuilt_uits').hide();
        } else {
            $('#carpet_areas').show();
            $('#Super_builts').show();
            $('#carpet_uits').show();
            $('#superbuilt_uits').show();
        }


        if (val == '24') {
            $('#carpet_areas').hide();
            $('#carpet_uits').hide();

        } else {
            $('#carpet_areas').show();
            $('#carpet_uits').show();

        }

        if (val == '15' || val == '22' || val == '17' || val == '23' || val == '16' || val == '24' || val == '25') {
            $('#property_floors').hide();

        } else {
            $('#property_floors').show();

        }

        if (val == '14') {
            $('#price_sq_fts').hide();

        } else {
            $('#price_sq_fts').show();
        }


        if (val == '14' || val == '12') {
            $('#price_acress').hide();
            $('#revenues').hide();
            $('#present_statuss').hide();

        } else {
            $('#price_acress').show();
            $('#revenues').show();
            $('#present_statuss').show();
        }


        if (val == '14') {
            $('#sheds').hide();

        } else {
            $('#sheds').show();
        }


        if (val == '12' || val == '17' || val == '24' || val == '25') {
            $('#mentanence_bys').hide();

        } else {
            $('#mentanence_bys').show();
        }


        if (val == '15' || val == '22' || val == '17' || val == '23' || val == '16' || val == '24' || val == '25' || val == '26') {
            $('#furnisheds').hide();

        } else {
            $('#furnisheds').show();
        }
        if (val == '24') {

            $('#present_statuss').hide();

        } else {

            $('#present_statuss').show();
        }
        if (val == '24') {
            $('#present_statuss').hide();
            $('#mentanence_bys').hide();

        } else {
            $('#present_statuss').show();
            $('#mentanence_bys').show();
        }
        if (val == '25' || val == '15' || val == '22' || val == '17' || val == '23' || val == '16' || val == '24') {

            $('#mentanence_bys').hide();

        } else {
            $('#mentanence_bys').show();
        }
        if (val == '28' || val == '26' || val == '27' || val == '11' || val == '13' || val == '18' || val == '25' || val == '12' || val == '15' || val == '24') {
            $('#present_statuss').hide();

        } else {
            $('#present_statuss').show();
        }
        if (val == '28' || val == '26' || val == '27' || val == '11' || val == '13' || val == '18' || val == '25' || val == '12') {
            $('#revenues').hide();

        } else {
            $('#revenues').show();
        }
        if (val == '28' || val == '26' || val == '27' || val == '11' || val == '13' || val == '12') {
            $('#price_acress').hide();

        } else {
            $('#price_acress').show();
        }
        if (val == '25' || val == '28' || val == '26' || val == '27' || val == '11' || val == '13' || val == '18' || val == '22' || val == '12' || val == '25' || val == '24') {
            $('#sheds').hide();

        } else {
            $('#sheds').show();
        }
        if (val == '15' || val == '22' || val == '17' || val == '23' || val == '16' || val == '24' || val == '25') {
            $('#maintain_row').hide();

        } else {
            $('#maintain_row').show();
        }
        if (val == '22' || val == '15' || val == '17') {
            //$('#availabilitys').hide();
            $('#property_ages').hide();

        } else {
            $('#availabilitys').show();
            $('#property_ages').show();
        }
      
        if (val == '11' || val == '12' || val == '13' || val == '15' || val == '16' || val == '17' || val == '22' || val == '23' || val == '24' || val == '25' || val == '27' || val == '28' || val == '29') {
            $('#jurisdictions').hide();
            $('#mentanence_bys').hide();
            $('#property_ages').hide();
            $('#annual_duess').hide();
            $('#far_approvals').hide();
            $('#facings').hide();
        } else {
            $('#jurisdictions').show();
            $('#mentanence_bys').show();
            $('#property_ages').show();
            $('#annual_duess').show();
            $('#far_approvals').show();
            $('#facings').show();
        }

		if (val == '12' || val == '17' ) {
                $('#possesions').hide();
               // $('#property_ages').hide();

            } else {
              $('#possesions').show();
             // $('#property_ages').show();
            }  
		if (val == '18') {
          //  $('#jurisdictions').hide();
            $('#mentanence_bys').hide();
            $('#property_ages').hide();
            $('#annual_duess').hide();
            $('#facings').hide();
            
        } 
        
		if (val == '26') {
          //  $('#jurisdictions').hide();
            $('#property_ages').hide();
            $('#annual_duess').hide();
            $('#facings').hide();
            $('#far_approvals').hide();
        } 
        
		if (val == '15') {
            $('#revenues').hide();
            $('#possesions').hide();
            $('#shed').hide();
        }
		if (val == '16') {
            $('#revenues').hide();
            $('#possesions').hide();
        }
        
		if (val == '17') {
            $('#revenues').hide();
            $('#present_statuss').hide();
            $('#shed').hide();
        }
		if (val == '18') {
            $('#possesions').hide();
        }
		if (val == '22') {
            $('#possesions').hide();
            $('#revenues').hide();
            $('#present_statuss').hide();
        }
		if (val == '23') {
            $('#possesions').hide();
            $('#revenues').hide();
            $('#present_statuss').hide();
            $('#shed').hide();
        }
		if (val == '24') {
            $('#shed').hide();
            $('#revenues').hide();
            $('#present_statuss').hide();
        }
    }





    var rectangle;
    var bermudaTriangle;
    var circle;
    var cityname = $('#selcity').val();
    var geocoder;
    var map;
    var markers = [];

    
    function init() {

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(28.4595, 77.0266);
        var mapOptions = {
            zoom: 8,
            center: latlng
        }
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var searchTextField = $('#searchTextField').val();
       if(searchTextField !=''){
       
         var latu = $('#latu').val();
         var longu = $('#longu').val();
         var latlngs = new google.maps.LatLng(latu, longu);
       
        var marker = new google.maps.Marker({
            position: latlngs,
            map: map,
            draggable: true
        });
    }
    google.maps.event.addListener(marker, 'dragend', function (event) {
            //$('#position').val('* '+this.getPosition().lat()+','+this.getPosition().lng());
            saveData(map, event);
        });

        markers.push(marker);
    }


    function getbrandcount(){
        var lati = $('#lat1').val();
        var long = $('#long1').val();

       var latlong =  lati +','+long;
      // var newlatlong  = JSON.parse(latlong);
      
       $.ajax({
                type: "POST",
                url: 'setbrandcount',
                data: {kuli: 'luci'},
                success: function (data) {
                var obj = $.parseJSON(data);
              
                var curPosition = new google.maps.LatLng(lati,long);
               // alert(curPosition);
                var count = 0;
                var count1 = 0;
                var count2 = 0;
              
                
                $.each(obj.rectangle, function (index) {
                     var bounds = this.geometry;
                   
                   
                    rectangle = new google.maps.Rectangle({
                                strokeColor: '#FF0000',
                                strokeOpacity: 0.8,
                                strokeWeight: 2,
                                fillColor: '#FF0000',
                                fillOpacity: 0.35,
                                editable: true,
                                draggable: true,
                               // map: map,
                                bounds: JSON.parse(bounds)
                                });
                               // rectangle.setMap(map);   

         if(rectangle.getBounds().contains(curPosition)){
              // alert('hai');
               count += 1;  
                }else{
                  //  alert('nahi hai');
                }      
                        
                });


                $.each(obj.polygon, function (index) {
                   
                    var triangleCoords = JSON.parse(this.geometry);
    
                    bermudaTriangle = new google.maps.Polygon({
                    paths: triangleCoords,
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    editable: true,
                    draggable: true,
                    });                           

                if(google.maps.geometry.poly.containsLocation(curPosition, bermudaTriangle)){
                count1 += 1;
                }else{
                  //  alert('nahi hai');
                }      
                        
                });
                
             $.each(JSON.parse(JSON.stringify(obj.circle)), function (index) {
               //alert(JSON.parse(JSON.stringify(obj.circle)));
               // var countprop = Object.keys(newcircleobj).length;  
               

                var circleCoords = JSON.parse(this.geometry); 
              
                var newcircleCoord = circleCoords.split(","); 
               
               var townCenter = new google.maps.LatLng(newcircleCoord[0],newcircleCoord[1]);
    var circleOptions = {
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.25,
      //map: map,
      center: townCenter,
      editable: true,
      draggable: true,
      radius: 420
    };

     circle = new google.maps.Circle(circleOptions);                  

                if(circle.getBounds().contains(curPosition)){
                count2 += 1;
                //alert('hai');
                }else{
                 // alert('nahi hai');
               }  
                
                       
               });

                var totalcount = count + count1 + count2;
                swal({
                                                       title: "Your property lies under "+ totalcount+" search shapes" ,
                                                       text: "",
                                                       icon: "success",
                                                       //confirmButtonColor: "#DD6B55",
                                                        //buttons: ["Not Visited!", "Visited!"],
                                                       buttons: {
                                                       cancel: "Close",
                                                       
                                                       },
                                                      // dangerMode: true,
                                                       })

                },
            });
   }



    function getmap(val) {
        var marker = '';
        var position = '';
        geocoder.geocode({'address': val}, function (results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
                markers.push(marker);
                setAllMap(null);
                addMarker(results[0].geometry.location);

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    function addMarker(location) {
        //clearMarkers();

        var pos = (location).toString();

        pos = pos.replace('(', '');
        pos = pos.replace(')', '');
        pos = pos.replace(' ', '');

        var pos1 = pos.slice(0, pos.indexOf(","));
        var pos2 = pos.substr(pos.indexOf(",") + 1);

        $('#lat1').val(pos1);
        $('#long1').val(pos2);

        var marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true
        });



        google.maps.event.addListener(marker, 'dragend', function (event) {
            //$('#position').val('* '+this.getPosition().lat()+','+this.getPosition().lng());
            saveData(map, event);
        });

        markers.push(marker);
    }


    function saveData(map, event)
    {
        var zoomLevel = map.getZoom();
        var pos = (event.latLng).toString();

        pos = pos.replace('(', '');
        pos = pos.replace(')', '');
        pos = pos.replace(' ', '');

        var pos1 = pos.slice(0, pos.indexOf(","));
        var pos2 = pos.substr(pos.indexOf(",") + 1);
        $('#lat1').val(pos1);
        $('#long1').val(pos2);


        //$('#position').val('(zoom,lat,lng) = '+zoomLevel+','+pos);
    }



    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    google.maps.event.addDomListener(window, 'load', init);



    function initialize() {

        var defaultBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(-33.8902, 151.1759),
                new google.maps.LatLng(-33.8474, 151.2631));
        var input = document.getElementById('searchTextField');



        var options = {
            bounds: defaultBounds,
            //types: ['(cities)'],
            componentRestrictions: {country: 'IN'}
        };

        autocomplete = new google.maps.places.Autocomplete(input, options);

        autocomplete.addListener('place_changed', function () {


            var place = autocomplete.getPlace();

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                //  console.log(place.address_components);
                var arrAddress = place.address_components;
                $.each(arrAddress, function (i, address_component) {
                    // console.log('address_component:'+i);

                    if (address_component.types[0] == "route") {
                        // console.log(i+": route:"+address_component.long_name);
                        itemRoute = address_component.long_name;
                    }

                    if (address_component.types[0] == "locality") {
                        //console.log("town:"+address_component.long_name);

                        itemLocality = address_component.long_name;
                        $('#town').val(itemLocality);
                    }

                    if (address_component.types[0] == "sublocality_level_1") {
                        // console.log("province:"+address_component.long_name);
                        itemSectorf = address_component.long_name;
                        $('#sector').val(itemSectorf);

                    }

                    if (address_component.types[0] == "country") {
                        //console.log("country:"+address_component.long_name); 
                        itemCountry = address_component.long_name;
                    }

                    if (address_component.types[0] == "postal_code_prefix") {
                        // console.log("pc:"+address_component.long_name);  
                        itemPc = address_component.long_name;
                    }

                    if (address_component.types[0] == "street_number") {
                        // console.log("street_number:"+address_component.long_name);  
                        itemSnumber = address_component.long_name;
                    }
                    //return false; // break the loop   
                });

                map.fitBounds(place.geometry.viewport);
            }



        });

        $(input).on('input', function () {


            var str = input.value;
            prefix = globalvar + ', ';
            if (str.indexOf(prefix) == 0) {
                //console.log(input.value);
            } else {
                if (prefix.indexOf(str) >= 0) {
                    input.value = prefix;
                } else {
                    input.value = prefix + str;
                }
            }

        });


    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>

