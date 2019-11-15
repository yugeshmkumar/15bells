<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\PropertyType;
use kartik\widgets\Typeahead;

/* @var $this yii\web\View */
/* @var $model common\models\Addproperty */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    #map_canvas {
        height: 400px;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;

    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }
    #target {
        width: 345px;
    }
    .short_list{font-size: 15px;
                position: relative;
                bottom: 3px;
                left: 5px;
    }
    .no_serch{
        margin:0px !important;
    }
    .commrcl_tb{

        padding:0 !important;
    }
    .container{
        width:100%;
    }
    .no_pad{
        padding:0px !important;
    }
    html, body, #map-canvas {
        height: 250px;
        margin: 0px;
        padding: 0px;
    }

    #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
    }
    .form-md-radios {
        padding-top: 87px;
        padding-left: 20px;
    }

    .mapi{
        margin-right: -20px !important;
    }
    .no_pad{
        padding:0px !important;
    }
    #radioavailable{
        color:#34495e !important;
    }
    #jurisdiction{
        text-transform:uppercase;
    }
    .sell_add{ 
        padding:0px !important;
        border-radius:10px !important; 
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

    .main_cont{
        background:rgba(255,255,255,0.25);
        padding:20px;
        border-top:5px solid #e9b739 ;
    }
    .control-label{
        color:#ffffff !important;
    }
    label{
        color:#ffffff !important;
    }
    .form-section{
        color:#ffffff !important;
    }
    .add_proprty .form-control{
        border-radius:10px !important;
    }
    .save_buttn{
        padding: 8px 30px !important;
        border-radius: 4px !important;
        border: 1px solid #ffffff !important;
        background: #e5ac31 !important;
        color: #000000 !important;
    }
    .save_frm{
        background: transparent !important;
        text-align: center !important;
        border: none !important;
    }
    input[type="checkbox"] {
        width: 30px!important;
        height: 16px!important;
        position: relative;
        top: 3px;
    }
	.swal-title{
		font-size:20px !important;
	}
	.swal-button--cancel{
		    color: #fff;
    background-color: #F44336;
	}
</style>


<div class="mt-element-step">

    <div class="row step-thin">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/creategrouplessor']) ?>">
            <div class="col-md-3 bg-grey mt-step-col active sell_add">
                <div class="bg-white font-grey add_no">1</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="4dp">BASIC DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a>


        <!--<a href="<? //php echo Yii::$app->urlManager->createUrl(['addproperty/additional'])  ?>">-->
        <a href="#" style="cursor:default !important;">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                <div class="bg-white font-grey add_no">2</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">ADDITIONAL DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
       

    </div>
    <br/>
    <br/>

</div>
<div class="portlet box add_proprty">

    <div class="portlet-title">
        <div class="caption" style="font-size:25px !important">
            Add Property</div>
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

        </div>
    </div>
    <div class="portlet-body form" style="background:transparent !important;">



        <?php $form = ActiveForm::begin(['options'=>['name'=>'agaiya', 'onsubmit'=>'return validateForm()']]); ?>

        <div class="form-body" style="padding:0px !important;">
            <div class="container-fluid main_cont">
                <div class="row locat_hed" style="margin-bottom:10px !important;">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6 for_sal">
                        <div align="right"><font color="red"><i>* Mandatory Fields</i></font></div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-12">

                    </div>
                </div><br>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Select Property Type *</label>

                            <?=
                            $form->field($model, 'project_type_id')->dropDownList(ArrayHelper::map(PropertyType::find()->where(['undercategory' => "Commercial", 'isactive' => 1])->all(), 'id', 'typename'), [
                                'prompt' => 'Select Property  type',
                                'onchange' => 'gettype(value)',
                                'id' => 'project_type',
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
                            <label class="control-label">Request For *</label>

                            <?php
                            if ($model->scenario == 'create') {

                                $model->request_for = 'Instant';
                                ?>

                                <?= $form->field($model, 'request_for')->textInput(['readonly' => true])->label(false) ?>

                            <?php
                            } else {

                                if ($model->request_for == 'bid') {
                                    ?> 
                                    <?= $form->field($model, 'request_for')->textInput(['readonly' => true], ['value' => 'Forward Auction'])->label(false) ?>


    <?php } else { ?>


        <?= $form->field($model, 'request_for')->dropDownList(['bid' => 'Forward Auction', 'Instant' => 'Instant',], ['prompt' => '', 'id' => 'request_for'])->label(false)
        ?>

                                <?php }
                            } ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">City *</label>

                            <?= $form->field($model, 'city')->dropDownList(['Gurgaon' => 'Gurgaon', 'Delhi' => 'Delhi', 'Noida' => 'Noida', 'Greater Noida' => 'Greater Noida', 'Faridabad' => 'Faridabad', 'Ghaziabad' => 'Ghaziabad'], ['prompt' => 'Select City', 'onchange' => 'getcity(this.value)', 'id' => 'citym'])->label(false) ?>


                        </div>
                    </div>
                </div>

                <div class="row">   
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="control-label">Locality *</label>
                            <?= $form->field($model, 'locality')->textInput(['id' => 'searchTextField', 'onchange' => 'getmap(this.value)', 'placeholder' => "Enter Location", 'class' => 'location_set form-control'])->label(false) ?>
                        </div>
                    </div>

                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="control-label">Address *</label>            
                            <?= $form->field($model, 'address')->textInput(['id' => 'address'])->label(false) ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row propr_map">
				<div class="col-md-12">
					<p class="prop_loc"><span><i class="fa fa-map-marker markr_mp"></i></span>Place this marker at your property location.<span class="pull-right"><button type="button" onclick="getbrandcount()" class="btn btn-danger sbmt_butn">Submit</button></span></p>
				</div>
                <div class="col-md-12"> 
                    <div id="map-canvas"></div>
                </div>
            </div>
                    <div class="input_fields_wrap">
                    <input type="button" class="add_field_button" value="Add More Fields"></input>
                    <div>
                    
                    <div class="form-group">
                                <label class="control-label"> No. Of Similiar Properties</label>              
                                <?= $form->field($model, 'no_of_similiar_shops')->textInput()->label(false) ?>
                                </div>
                    </div>
                    </div>

            <h3 class="form-section" style="margin-bottom:0px !important;color:#ffffff;">Property Details</h3>
            <div class="container-fluid" style="background:rgba(255,255,255,0.25);padding:10px;">
                <div class="row">
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 plot_areas" id="plot_areas">
                            <div class="form-group">
                                <label class="control-label">Plot Area *</label>   
                                <?= $form->field($model, 'total_plot_area')->textInput()->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-2 plot_uits" id="plot_uits">
                            <div class="form-group">
                                <label class="control-label"> Unit</label>              
                                <?= $form->field($model, 'plot_unit')->dropDownList(['sq_feets' => 'Sq.Ft', 'sq_yards' => 'Sq.Yards', 'sq_meters' => 'Sq.Meter',], ['prompt' => 'Select Unit', 'id' => 'plot_uit'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-4 Super_builts" id="Super_builts">
                            <div class="form-group">
                                <label class="control-label">Super Built Up Area *</label>
                                <?= $form->field($model, 'buildup_area')->textInput()->label(false) ?>
                            </div>
                        </div>
                        <div class="col-md-2 superbuilt_uits" id="superbuilt_uits">
                            <div class="form-group">
                                <label class="control-label">Unit *</label>
                                <?= $form->field($model, 'build_unit')->dropDownList(['sq_feets' => 'Sq.Ft', 'sq_yards' => 'Sq.Yards', 'sq_meters' => 'Sq.Meter',], ['prompt' => 'Select Unit', 'id' => 'superbuilt_uit'], ['onchange' => 'selectionchange();'])->label(false) ?>

                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 carpet_areas" id="carpet_areas">
                            <div class="form-group">
                                <label class="control-label">Carpet Area</label>
                                <?= $form->field($model, 'carpet_area')->textInput()->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-2 carpet_uits" id="carpet_uits">
                            <div class="form-group">
                                <label class="control-label">Unit</label>
                                <?= $form->field($model, 'carpet_unit')->dropDownList(['sq_feets' => 'Sq.Ft', 'sq_yards' => 'Sq.Yards', 'sq_meters' => 'Sq.Meter',], ['prompt' => 'Select Unit', 'id' => 'carpet_uit'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-6 maintain_row" id="maintain_row">
                        <div class="row">
                            <div class="col-md-8" id="mentanence_costs">
                                <div class="form-group">
                                    <label class="control-label">Monthly Maintenance Cost *</label>
                                    <?= $form->field($model, 'maintenance_cost')->textInput(['maxlength' => true])->input('text', ['placeholder' => "In Rs."])->label(false) ?>
                                    <!--<label class="test" id="lblerror" style="color:red;">value should be less than Built up Area</label>
                                    <label class="abcd" id="lablerror" style="color:red;">value should be less than plot Area</label>-->
                                </div>
                            </div>

                            <div class="col-md-4" id="maintenance_cost_units">
                                <div class="form-group">
                                    <label class="control-label">Unit</label>
                                    <?= $form->field($model, 'maintenance_cost_unit')->dropDownList(['sq_feets' => 'Sq.Ft', 'sq_yards' => 'Sq.Yards', 'sq_meters' => 'Sq.Meter',], ['prompt' => 'Select Unit', 'id' => 'maintenance_uit'])->label(false) ?>
                                </div>
                            </div>  
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 property_floors" id="property_floors">
                            <div class="form-group">
                                <label class="control-label">Property On Floor *</label>
                                <?= $form->field($model, 'property_on_floor')->textInput(['id' => 'property_floor'])->label(false) ?>

                            </div> 
                        </div>

                        <div class="col-md-6 furnisheds" id="furnisheds">
                            <div class="form-group">
                                <label class="control-label">Furnishing Status *</label>
                                <?= $form->field($model, 'furnished_status')->dropDownList(['furnished' => 'Furnished', 'semi_furnished' => 'Semi furnished', 'bareshell' => 'Bareshell',], ['prompt' => 'Select Furnishing', 'id' => 'furnished'])->label(false) ?>
                            </div>
                        </div> 
                        </div>
                    </div>				
                </div>





                <h3 class="form-section">Pricing</h3>
                <div class="row"> 


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Asking Rental Price *</label>
                            <?= $form->field($model, 'asking_rental_price')->textInput(['maxlength' => true])->input('text', ['placeholder' => "In Rs."])->label(false) ?>
                        </div>
                    </div>
                    <div class="col-md-6" id="negotiables">
                        <div class="form-group">


                            <?= $form->field($model, 'price_negotiable')->checkbox(array('label' => ''))->label('Price Negotiable'); ?>
                        </div>
                    </div>
                    <div class="col-md-12 no_pad">
                    <div class="row">
                        <div class="col-md-6 price_sq_fts" id="price_sq_fts">
                            <div class="form-group">
                                <label class="control-label">Price per sq. <span id="changeft">Ft </span>*</label>                
                                <?= $form->field($model, 'price_sq_ft')->textInput(['id' => 'price_sq_ft'])->label(false) ?>
                            </div>
                        </div>
                        <div class="col-md-6 price_acress" id="price_acress">
                            <div class="form-group">
                                <label class="control-label">Price per acre</label>               
                                <?= $form->field($model, 'price_acres')->textInput(['id' => 'price_acres'])->label(false) ?>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>

                <h3 class="form-section">Add more details about Price</h3>

                <div class="row">

                    <div class="col-md-12 no_pad">
                    <div class="row">
                        <div class="col-md-6 revenues" id="revenues">
                            <div class="form-group">
                                <label class="control-label">Revenue Layout</label>
                                <?= $form->field($model, 'revenue_lauout')->dropDownList(['yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select Revenue', 'id' => 'revenue'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-6 present_statuss" id="present_statuss">
                            <div class="form-group">
                                <label class="control-label">Present Status</label>
                                <?= $form->field($model, 'present_status')->dropDownList(['agriculture' => 'Agriculture', 'R_zone' => 'R zone', 'institutional' => 'Institutional', 'warehousing' => 'Warehousing', 'others' => 'Others',], ['prompt' => 'Select Status', 'id' => 'present_status'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-6" id="jurisdictions">
                            <div class="form-group">
                                <label class="control-label">Jurisdiction of Development</label>
                                <?= $form->field($model, 'jurisdiction_development')->textInput(['maxlength' => 10, 'id' => 'jurisdiction'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-6 sheds" id="sheds">
                            <div class="form-group">
                                <label class="control-label">Shed / RCC</label>
                                <?= $form->field($model, 'shed_RCC')->dropDownList(['Shed' => 'Shed', 'RCC' => 'RCC',], ['prompt' => 'Select', 'id' => 'shed'])->label(false) ?>
                            </div>
                        </div>




                        <div class="col-md-6 mentanence_bys" id="mentanence_bys">
                            <div class="form-group">
                                <label class="control-label">Maintenance By</label>
                                <?= $form->field($model, 'maintenance_by')->dropDownList(['monthly' => 'Monthly', 'annually' => 'Annually', 'one_time' => 'One time',], ['prompt' => 'Select', 'id' => 'mentanence_by'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-6" id="annual_duess">
                            <div class="form-group">
                                <label class="control-label">Annual Dues Payable</label>
                                <?= $form->field($model, 'annual_dues_payable')->textInput(['maxlength' => true, 'id' => 'annual_dues'])->label(false) ?>
                            </div>
                        </div>


                        <div class="col-md-6 property_ages" id="property_ages">
                            <div class="form-group">

                                <label class="control-label">Age of Property </label>


                                <?= $form->field($model, 'age_of_property')->dropDownList(['0-1' => '0-1 Year Old Property', '1-5' => '1-5 Year Old Property', '5-10' => '5-10 Year Old Property', '10-15' => '10-15 Year Old Property', '15-20' => '15-20 Year Old Property', '20-25' => '20-25 Year Old Property', '25-30' => '25-30 Year Old Property', '30+' => '30+ Year Old Property',], ['prompt' => 'Select property age', 'id' => 'property_age'])->label(false) ?>


                            </div>
                        </div>

                        <div class="col-md-6" id="loan_takens">
                            <div class="form-group">
                                <label class="control-label">Loan Taken Against Property (LAP) *</label>
                                <?= $form->field($model, 'LOAN_taken')->dropDownList(['yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select', 'id' => 'loan_taken'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-6" id="facings">
                            <div class="form-group">
                                <label class="control-label">Facing</label>
                                <?= $form->field($model, 'facing')->dropDownList(['north' => 'North', 'west' => 'West', 'south' => 'South', 'east' => 'East', 'north_east' => 'North east', 'south_east' => 'South east', 'north_west' => 'North west', 'south_west' => 'South west',], ['prompt' => 'Select Facing', 'id' => 'facing'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-6" id="ownerships">
                            <div class="form-group">
                                <label class="control-label">Ownership *</label>
                                <?= $form->field($model, 'ownership')->dropDownList(['freehold' => 'Freehold', 'lease_hold' => 'Lease hold', 'cooperative_society' => 'Cooperative society', 'power_of_attorney' => 'Power of attorney',], ['prompt' => 'Select ownership', 'id' => 'ownership'])->label(false) ?>
                            </div>
                        </div>
                        <div class="col-md-6 availabilitys" id="availabilitys">
                            <div class="form-group">
                                <label class="control-label">Availability *</label>
                                <?= $form->field($model, 'availability')->dropDownList(['under_construction' => 'Under Construction', 'ready_to_move' => 'Ready to move',], ['prompt' => 'Select Availability', 'id' => 'availability'])->label(false) ?>
                            </div>
                        </div> 
                        <div class="col-md-6" id="far_approvals">
                            <div class="form-group">
                                <label class="control-label">FAR Approved</label>
                                <?= $form->field($model, 'FAR_approval')->textInput(['id' => 'far_approval'])->label(false) ?> 
                            </div>
                        </div> 
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
                    <input type="hidden" value="" id="totalprop" name="totalprop">

                </div>



                
            </div>
            <div class="input_fields_wraps">
            </div>
            <div class="row">


                    <div class="form-actions right save_frm">

                        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn blue save_buttn' : 'btn btn-primary save_buttn']) ?>


                    </div>          
                </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
</div>
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
   // $('#maintenance_uit').attr("disabled", true);
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


    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wraps"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var counter = 0;
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();

        var proptypes = $('#project_type').val();

        if(x < max_fields){ //max input box allowed
             counter += 1;
            //text box increment
            $(wrapper).append('<div class="remove_parent"><a href="#" class="remove_field">Remove</a><h3 class="form-section" style="margin-bottom:0px !important;color:#ffffff;">Property Details</h3>'+
            '<div class="container-fluid" style="background:rgba(255,255,255,0.25);padding:10px;">'+
                '<div class="row">'+
                    '<div class="col-md-12"> <div class="row">'+
                        '<div class="col-md-4 plot_areas" id="plot_areas">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Plot Area *</label>'+   
                                '<div class="form-group field-addproperty-total_plot_area">'+

                                '<input type="text" id="addproperty-total_plot_area'+x+'" class="form-control" name="Addproperty[total_plot_area'+x+']">'+

                                '<div class="help-block"></div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+

                        '<div class="col-md-2 plot_uits" id="plot_uits">'+
                            '<div class="form-group">'+
                                '<label class="control-label"> Unit</label>'+              
                        '<div class="form-group field-plot_uit1">'+

                        '<select id="plot_uit" class="form-control" name="Addproperty[plot_unit'+x+']">'+
                        '<option value="">Select Unit</option>'+
                        '<option value="sq_feets">Sq.Ft</option>'+
                        '<option value="sq_yards">Sq.Yards</option>'+
                        '<option value="sq_meters">Sq.Meter</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+       
                           '</div>'+
                        '</div>'+

                        '<div class="col-md-4 Super_builts" id="Super_builts">'+
                           '<div class="form-group">'+
                                '<label class="control-label">Super Built Up Area *</label>'+
                                '<div class="form-group field-addproperty-buildup_area1">'+

                            '<input type="text" id="addproperty-buildup_area1'+x+'" class="form-control" name="Addproperty[buildup_area'+x+']">'+

                            '<div class="help-block"></div>'+
                            '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-2 superbuilt_uits" id="superbuilt_uits">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Unit *</label>'+
                            '<div class="form-group field-superbuilt_uit1">'+

                            '<select id="superbuilt_uit" class="form-control" name="Addproperty[build_unit'+x+']">'+
                            '<option value="">Select Unit</option>'+
                            '<option value="sq_feets">Sq.Ft</option>'+
                            '<option value="sq_yards">Sq.Yards</option>'+
                            '<option value="sq_meters">Sq.Meter</option>'+
                           '</select>'+

                            '<div class="help-block"></div>'+
                            '</div>'+
                            '</div>'+
                        '</div></div>'+
                    '</div>'+
                    '<div class="col-md-12"> <div class="row">'+
                        '<div class="col-md-4 carpet_areas" id="carpet_areas">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Carpet Area</label>'+
                            '<div class="form-group field-addproperty-carpet_area1">'+

                            '<input type="text" id="addproperty-carpet_area'+x+'" class="form-control" name="Addproperty[carpet_area'+x+']">'+

                            '<div class="help-block"></div>'+
                            '</div>'+                        
                            '</div>'+
                        '</div>'+

                        '<div class="col-md-2 carpet_uits" id="carpet_uits">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Unit</label>'+
                        '<div class="form-group field-carpet_uit1">'+

                        '<select id="carpet_uit" class="form-control" name="Addproperty[carpet_unit'+x+']">'+
                        '<option value="">Select Unit</option>'+
                        '<option value="sq_feets">Sq.Ft</option>'+
                        '<option value="sq_yards">Sq.Yards</option>'+
                        '<option value="sq_meters">Sq.Meter</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+                        
                        '</div>'+
                        '</div>'+

                        '<div class="col-md-6 maintain_row" id="maintain_row">'+
                            '<div class="col-md-8" id="mentanence_costs">'+
                                '<div class="form-group">'+
                                    '<label class="control-label">Monthly Maintenance Cost *</label>'+
                                '<div class="form-group field-addproperty-maintenance_cost1">'+

                                '<input type="text" id="addproperty-maintenance_cost" class="form-control" name="Addproperty[maintenance_cost'+x+']" placeholder="In Rs.">'+

                                '<div class="help-block"></div>'+
                                '</div>'+                                     
                                '</div>'+
                            '</div>'+

                            '<div class="col-md-4" id="maintenance_cost_units">'+
                                '<div class="form-group">'+
                                    '<label class="control-label">Unit</label>'+
                                '<div class="form-group field-maintenance_uit1">'+

                                '<select id="maintenance_uit" class="form-control" name="Addproperty[maintenance_cost_unit'+x+']">'+
                                '<option value="">Select Unit</option>'+
                                '<option value="sq_feets">Sq.Ft</option>'+
                                '<option value="sq_yards">Sq.Yards</option>'+
                                '<option value="sq_meters">Sq.Meter</option>'+
                                '</select>'+

                                '<div class="help-block"></div>'+
                                '</div>'+                         
                                '</div>'+
                            '</div>'+
                        '</div></div>'+
                    '</div>'+
                    '<div class="col-md-12"> <div class="row">'+
                        '<div class="col-md-6 property_floors" id="property_floors">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Property On Floor *</label>'+
                            '<div class="form-group field-property_floor1">'+

                            '<input type="text" id="property_floor" class="form-control" name="Addproperty[property_on_floor'+x+']">'+

                            '<div class="help-block"></div>'+
                            '</div>'+
                            '</div>'+ 
                        '</div>'+

                        '<div class="col-md-6 furnisheds" id="furnisheds">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Furnishing Status *</label>'+
                        '<div class="form-group field-furnished1">'+

                        '<select id="furnished" class="form-control" name="Addproperty[furnished_status'+x+']">'+
                        '<option value="">Select Furnishing</option>'+
                        '<option value="furnished">Furnished</option>'+
                        '<option value="semi_furnished">Semi furnished</option>'+
                        '<option value="bareshell">Bareshell</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+                
                        '</div>'+
                        '</div>'+ 
                    '</div></div>'+				
                '</div>'+





                '<h3 class="form-section">Pricing</h3>'+
                '<div class="row">'+ 


                    '<div class="col-md-6">'+
                        '<div class="form-group">'+
                            '<label class="control-label">Asking Rental Price *</label>'+
                    '<div class="form-group field-addproperty-asking_rental_price required1">'+

                    '<input type="text" id="addproperty-asking_rental_price" class="form-control" name="Addproperty[asking_rental_price'+x+']" placeholder="In Rs." aria-required="true">'+

                    '<div class="help-block"></div>'+
                    '</div>'+                     
                    '</div>'+
                    '</div>'+
                    '<div class="col-md-6" id="negotiables">'+
                        '<div class="form-group">'+


                '<div class="form-group field-addproperty-price_negotiable1">'+
                '<label class="control-label" for="addproperty-price_negotiable">Price Negotiable</label>'+
                '<input type="hidden" name="Addproperty[price_negotiable'+x+']" value="0"><label><input type="checkbox" id="addproperty-price_negotiable" name="Addproperty[price_negotiable'+x+']" value="1"> </label>'+

                '<div class="help-block"></div></div>'+       
                 '</div>'+
                    '</div>'+
                    '<div class="col-md-12 no_pad"> <div class="row">'+
                        '<div class="col-md-6 price_sq_fts" id="price_sq_fts">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Price per sq. <span id="changeft">Ft </span>*</label>'+               
                        '<div class="form-group field-price_sq_ft'+x+' required">'+

                        '<input type="text" id="price_sq_ft'+x+'" class="form-control" name="Addproperty[price_sq_ft'+x+']" aria-required="true">'+

                        '<div class="help-block"></div>'+
                        '</div>'+                         
                        '</div>'+
                        '</div>'+
                        '<div class="col-md-6 price_acress" id="price_acress">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Price per acre</label>'+             
                        '<div class="form-group field-price_acres1">'+

                        '<input type="text" id="price_acres" class="form-control" name="Addproperty[price_acres'+x+']">'+

                        '<div class="help-block"></div>'+
                        '</div>'+                       
                        '</div>'+
                        '</div>'+
                    '</div></div>'+

                '</div>'+

                '<h3 class="form-section">Add more details about Price</h3>'+

                '<div class="row">'+

                    '<div class="col-md-12 no_pad"> <div class="row">'+
                        '<div class="col-md-6 revenues" id="revenues">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Revenue Layout</label>'+
                        '<div class="form-group field-revenue1">'+

                        '<select id="revenue" class="form-control" name="Addproperty[revenue_lauout'+x+']">'+
                        '<option value="">Select Revenue</option>'+
                        '<option value="yes">Yes</option>'+
                        '<option value="no">No</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+             
                        '</div>'+
                        '</div>'+

                        '<div class="col-md-6 present_statuss" id="present_statuss">'+
                           '<div class="form-group">'+
                                '<label class="control-label">Present Status</label>'+
                            '<div class="form-group field-present_status1">'+

                            '<select id="present_status" class="form-control" name="Addproperty[present_status'+x+']">'+
                            '<option value="">Select Status</option>'+
                            '<option value="agriculture">Agriculture</option>'+
                            '<option value="R_zone">R zone</option>'+
                            '<option value="institutional">Institutional</option>'+
                            '<option value="warehousing">Warehousing</option>'+
                            '<option value="others">Others</option>'+
                            '</select>'+

                            '<div class="help-block"></div>'+
                            '</div>'+                       
                            '</div>'+
                        '</div>'+

                        '<div class="col-md-6" id="jurisdictions">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Jurisdiction of Development</label>'+
                        '<div class="form-group field-jurisdiction1">'+

                        '<input type="text" id="jurisdiction" class="form-control" name="Addproperty[jurisdiction_development'+x+']" maxlength="10">'+

                        '<div class="help-block"></div>'+
                        '</div>'+                      
                        '</div>'+
                        '</div>'+

                        '<div class="col-md-6 sheds" id="sheds">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Shed / RCC</label>'+
                        '<div class="form-group field-shed1">'+

                        '<select id="shed" class="form-control" name="Addproperty[shed_RCC'+x+']">'+
                        '<option value="">Select</option>'+
                        '<option value="Shed">Shed</option>'+
                        '<option value="RCC">RCC</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+                     
                        '</div>'+
                        '</div>'+




                        '<div class="col-md-6 mentanence_bys" id="mentanence_bys">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Maintenance By</label>'+
                        '<div class="form-group field-mentanence_by1">'+

                        '<select id="mentanence_by" class="form-control" name="Addproperty[maintenance_by'+x+']">'+
                        '<option value="">Select</option>'+
                        '<option value="monthly">Monthly</option>'+
                        '<option value="annually">Annually</option>'+
                        '<option value="one_time">One time</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+                         
                        '</div>'+
                        '</div>'+

                        '<div class="col-md-6" id="annual_duess">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Annual Dues Payable</label>'+
                        '<div class="form-group field-annual_dues1">'+

                        '<input type="text" id="annual_dues" class="form-control" name="Addproperty[annual_dues_payable'+x+']" maxlength="100">'+

                        '<div class="help-block"></div>'+
                        '</div>'+                 
                        '</div>'+
                        '</div>'+


                        '<div class="col-md-6 property_ages" id="property_ages">'+
                            '<div class="form-group">'+

                                '<label class="control-label">Age of Property </label>'+


                            '<div class="form-group field-property_age1">'+

                            '<select id="property_age" class="form-control" name="Addproperty[age_of_property'+x+']">'+
                            '<option value="">Select property age</option>'+
                            '<option value="0-1">0-1 Year Old Property</option>'+
                            '<option value="1-5">1-5 Year Old Property</option>'+
                            '<option value="5-10">5-10 Year Old Property</option>'+
                            '<option value="10-15">10-15 Year Old Property</option>'+
                            '<option value="15-20">15-20 Year Old Property</option>'+
                            '<option value="20-25">20-25 Year Old Property</option>'+
                            '<option value="25-30">25-30 Year Old Property</option>'+
                            '<option value="30+">30+ Year Old Property</option>'+
                            '</select>'+

                            '<div class="help-block"></div>'+
                            '</div>'+

                            '</div>'+
                        '</div>'+

                        '<div class="col-md-6" id="loan_takens">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Loan Taken Against Property (LAP) *</label>'+
                        '<div class="form-group field-loan_taken'+x+' required">'+

                        '<select id="loan_taken'+x+'" class="form-control" name="Addproperty[LOAN_taken'+x+']" aria-required="true">'+
                        '<option value="">Select</option>'+
                        '<option value="yes">Yes</option>'+
                        '<option value="no">No</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+                        
                        '</div>'+
                        '</div>'+

                        '<div class="col-md-6" id="facings">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Facing</label>'+
                        '<div class="form-group field-facing1">'+

                        '<select id="facing" class="form-control" name="Addproperty[facing'+x+']">'+
                        '<option value="">Select Facing</option>'+
                        '<option value="north">North</option>'+
                        '<option value="west">West</option>'+
                        '<option value="south">South</option>'+
                        '<option value="east">East</option>'+
                        '<option value="north_east">North east</option>'+
                        '<option value="south_east">South east</option>'+
                        '<option value="north_west">North west</option>'+
                        '<option value="south_west">South west</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+                  
                        '</div>'+
                        '</div>'+

                        '<div class="col-md-6" id="ownerships">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Ownership *</label>'+
                        '<div class="form-group field-ownership'+x+' required">'+

                        '<select id="ownership'+x+'" class="form-control" name="Addproperty[ownership'+x+']" aria-required="true">'+
                        '<option value="">Select ownership</option>'+
                        '<option value="freehold">Freehold</option>'+
                        '<option value="lease_hold">Lease hold</option>'+
                        '<option value="cooperative_society">Cooperative society</option>'+
                        '<option value="power_of_attorney">Power of attorney</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+                    
                        '</div>'+
                        '</div>'+
                        '<div class="col-md-6 availabilitys" id="availabilitys">'+
                            '<div class="form-group">'+
                                '<label class="control-label">Availability *</label>'+
                        '<div class="form-group field-availability'+x+' required">'+

                        '<select id="availability'+x+'" class="form-control" name="Addproperty[availability'+x+']" aria-required="true">'+
                        '<option value="">Select Availability</option>'+
                        '<option value="under_construction">Under Construction</option>'+
                        '<option value="ready_to_move">Ready to move</option>'+
                        '</select>'+

                        '<div class="help-block"></div>'+
                        '</div>'+                    
                        '</div>'+
                        '</div>'+ 
                        '<div class="col-md-6" id="far_approvals">'+
                            '<div class="form-group">'+
                                '<label class="control-label">FAR Approved</label>'+
                        '<div class="form-group field-far_approval1">'+

                        '<input type="text" id="far_approval" class="form-control" name="Addproperty[FAR_approval'+x+']">'+

                        '<div class="help-block"></div>'+
                        '</div>'+                         
                        '</div>'+
                        '</div>'+ 
                        '<div class="col-md-6">'+
                            '<div class="col-md-6" id="available_froms">'+
                                '<div class="form-group">'+
                                    '<label class="control-label">Available From *</label>'+
                                '<div class="form-group field-radioavailable'+x+' required">'+

                                '<input type="hidden" name="Addproperty[available_from'+x+']" value=""><div id="radioavailable'+x+'" aria-required="true"><label><input type="radio" name="Addproperty[available_from'+x+']" value="Immediate"> Immediate</label>'+
                                '<label><input type="radio" name="Addproperty[available_from'+x+'" value="Date"> Date</label></div>'+

                                '<div class="help-block"></div>'+
                                '</div>'+

                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6" id="available_date">'+
                                '<div class="form-group">'+
                                   
                            '<div class="form-group field-addproperty-available_date1">'+
                            '<label class="control-label" for="addproperty-available_date">Available Date</label>'+
                            '<input type="text" id="addproperty-available_date" class="form-control" name="Addproperty[available_date'+x+']">'+

                            '<div class="help-block"></div>'+
                            '</div>'+                           
                            '</div>'+
                            '</div>'+
                        '</div> </div>'+

                    '</div>'+




                '</div>'+



               
            '</div></div>'); //add input box

            x++;
        }
        
        makegettype(proptypes);
        $('#totalprop').val(counter);
    });

    
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().remove(); x--;
    })

       





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
            $('.plot_areas').hide();
            $('.plot_uits').hide();

        } else {
            $('.plot_areas').show();
            $('.plot_uits').show();
        }

        if (val == '15' || val == '22' || val == '17' || val == '23' || val == '16') {
            $('.carpet_areas').hide();
            $('.Super_builts').hide();
            $('.carpet_uits').hide();
            $('.superbuilt_uits').hide();
        } else {
            $('.carpet_areas').show();
            $('.Super_builts').show();
            $('.carpet_uits').show();
            $('.superbuilt_uits').show();
        }


        if (val == '24') {
            $('.carpet_areas').hide();
            $('.carpet_uits').hide();

        } else {
            $('.carpet_areas').show();
            $('.carpet_uits').show();

        }

        if (val == '15' || val == '22' || val == '17' || val == '23' || val == '16' || val == '24' || val == '25') {
            $('.property_floors').hide();

        } else {
            $('.property_floors').show();

        }

        if (val == '14') {
            $('.price_sq_fts').hide();

        } else {
            $('.price_sq_fts').show();
        }


        if (val == '14' || val == '12') {
            $('.price_acress').hide();
            $('.revenues').hide();
            $('.present_statuss').hide();

        } else {
            $('.price_acress').show();
            $('.revenues').show();
            $('.present_statuss').show();
        }


        if (val == '14') {
            $('.sheds').hide();

        } else {
            $('.sheds').show();
        }


        if (val == '12' || val == '17' || val == '24' || val == '25') {
            $('.mentanence_bys').hide();

        } else {
            $('.mentanence_bys').show();
        }


        if (val == '15' || val == '22' || val == '17' || val == '23' || val == '16' || val == '24' || val == '25' || val == '26') {
            $('.furnisheds').hide();

        } else {
            $('.furnisheds').show();
        }
        if (val == '24') {

            $('.present_statuss').hide();

        } else {

            $('.present_statuss').show();
        }
        if (val == '24') {
            $('.present_statuss').hide();
            $('.mentanence_bys').hide();

        } else {
            $('.present_statuss').show();
            $('.mentanence_bys').show();
        }
        if (val == '25' || val == '15' || val == '22' || val == '17' || val == '23' || val == '16' || val == '24') {

            $('.mentanence_bys').hide();

        } else {
            $('.mentanence_bys').show();
        }
        if (val == '28' || val == '26' || val == '27' || val == '11' || val == '13' || val == '18' || val == '25' || val == '12' || val == '15' || val == '24') {
            $('.present_statuss').hide();

        } else {
            $('.present_statuss').show();
        }
        if (val == '28' || val == '26' || val == '27' || val == '11' || val == '13' || val == '18' || val == '25' || val == '12') {
            $('.revenues').hide();

        } else {
            $('.revenues').show();
        }
        if (val == '28' || val == '26' || val == '27' || val == '11' || val == '13' || val == '12') {
            $('.price_acress').hide();

        } else {
            $('.price_acress').show();
        }
        if (val == '25' || val == '28' || val == '26' || val == '27' || val == '11' || val == '13' || val == '18' || val == '22' || val == '12' || val == '25' || val == '24') {
            $('.sheds').hide();

        } else {
            $('.sheds').show();
        }
        if (val == '15' || val == '22' || val == '17' || val == '23' || val == '16' || val == '24' || val == '25') {
            $('.maintain_row').hide();

        } else {
            $('.maintain_row').show();
        }
        if (val == '22' || val == '15' || val == '17') {
            //$('#availabilitys').hide();
            $('.property_ages').hide();

        } else {
            $('.availabilitys').show();
            $('.property_ages').show();
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

<script>
function validateForm() {
	var prop_rep = $('#totalprop').val();
	
	if(prop_rep > 0){
		
	
	
	var i;
		for (i = 1; i <= prop_rep; i++) { 
			var x = document.forms["agaiya"]["Addproperty[LOAN_taken"+i+"]"].value;
			var y = document.forms["agaiya"]["Addproperty[ownership"+i+"]"].value;
			var z = document.forms["agaiya"]["Addproperty[availability"+i+"]"].value;
			var a = document.forms["agaiya"]["Addproperty[available_from"+i+"]"].value;
			var b = document.forms["agaiya"]["Addproperty[available_from"+i+"]"].value;

			
			$(".field-loan_taken"+i+" .help-block").html('');
			$(".field-ownership"+i+" .help-block").html('');
			$(".field-availability"+i+" .help-block").html('');
			$(".field-radioavailable"+i+" .help-block").html('');
			$(".field-price_sq_ft"+i+" .help-block").html('');
			
			
			if (x == "") {
				
				
			$("#loan_taken"+i+"").parent().addClass("has-error");
			$(".field-loan_taken"+i+" .help-block").append("Loan taken cannot be blank");
			}	
			 if (y == "") {
				
			$("#ownership"+i+"").parent().addClass("has-error");
			$(".field-ownership"+i+" .help-block").append("Ownership cannot be blank");
			
			}
			
			 if (z == "") { 
			$("#availability"+i+"").parent().addClass("has-error");
			$(".field-availability"+i+" .help-block").append("Availability cannot be blank");
			
			}
			 if (a == "") {
			$("#radioavailable"+i+"").parent().addClass("has-error");
			$(".field-radioavailable"+i+" .help-block").append("Available from cannot be blank");
			
			}
			 if (b == "") {
			$("#price_sq_ft"+i+"").parent().addClass("has-error");
			$(".field-price_sq_ft"+i+" .help-block").append("Price Sq. Ft. cannot be blank");
			
			}
			
}
	} 
    
}
</script>

