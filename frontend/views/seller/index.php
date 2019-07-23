<?php

use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$urlsd =   Yii::getAlias('@frontendUrl');
$user_id= Yii::$app->user->identity->id;

?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&libraries=places,geometry"></script>
<style>
    .navbar-me{
        background:#221d36 !important;
    }
    
#map_canvas {
       height: 445px;
   }
   html, body, #map-canvas {
       height: 445px;
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

<div class="container-fluid property_flow" style="margin-top:100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 no_pad">
				<h1 class="trans_head_b">Post a Property for Sale. </h1>
				<p class="brand_txt">Continue with listing your property at 15 Bells, we’ll get you verified buyers to sell your commercial property</p>
			</div><div class="col-md-6"></div>
		</div>
		<div class="row">
			<div class="col-md-12 no_pad">
					<ul class="add_property nav nav-pills hidden-xs hidden-sm">
						<li class="active property_steps no_pad"><a data-toggle="pill" href="#" class="categ_selec">Property Location</a></li>
						<li class="property_steps no_pad"><a data-toggle="pill" href="#" class="categ_selec">Type of Property</a></li>
						<li class="property_steps no_pad"><a data-toggle="pill" href="#" class="categ_selec">Property Availability</a></li>
						<li class="property_steps no_pad"><a data-toggle="pill" href="#" class="categ_selec">Property Details</a></li>
					</ul>
					
					
					 <?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"addproperty/saveseller"]); ?>
				<div class="tab-content">
				
				  <div id="home" class="tab-pane fade in active">	
					<div class="row property_type property_start">
							<div class="col-md-12 property_area">
                            <div class="row text-center property_area">
								<div class="col-md-1"></div>
								<div class="col-md-2 col-xs-6">
									<img id="delhi" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/delhi.svg';  ?>" class="property_image1">
									<p class="property_name">Delhi</p>
								</div>
								<div class="col-md-2 col-xs-6">
									<img id="gurugram" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/gurugram.svg';  ?>" class="property_image1">
									<p class="property_name">Gurgaon</p>
								</div>
								<div class="col-md-2 col-xs-6">
									<img id="faridabad" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/faridabad.svg';  ?>" class="property_image1">
									<p class="property_name">Faridabad</p>
								</div>
								<div class="col-md-2 col-xs-6">
									<img id="noida" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/noida.svg';  ?>" class="property_image1">
									<p class="property_name">Noida</p>
								</div>
								<div class="col-md-2 col-xs-6">
									<img id="ghaziabad" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/ghaziabad.svg';  ?>" class="property_image1">
									<p class="property_name">Ghaziabad</p>
								</div>
								<div class="col-md-1"></div>
							</div>
                            <input type="hidden" id="propcity" name="propcity">
									<div class="row">
										<div class="col-md-6 locality_input">
											<h3 class="flow_heading">Add property locality below</h3>
											<!-- <input type="text" class="form-control input_desgn input_location" placeholder="Enter your locality"> -->
											<?= $form->field($model, 'locality')->textInput(['id' => 'searchTextField', 'onchange' => 'getmap(this.value)', 'placeholder' => "Enter your locality", 'class' => 'form-control input_desgn input_location'])->label(false) ?>

										</div>
									</div>
									<div class="row address_row">
										<div class="col-md-6">
											<h3 class="flow_heading">Add complete address below</h3>
											<!-- <input type="text" class="form-control input_desgn addres_input" placeholder="Enter address"> -->
											<?= $form->field($model, 'address')->textInput(['id' => 'address', 'placeholder' => "Enter address", 'class' => 'form-control input_desgn addres_input'])->label(false) ?>

										</div>
										<div class="col-md-12 seperator_div margin_seperator"></div>
									</div>
								
								
							</div>
							
						<div class="col-md-12 user_property">
							<div class="row">
								<h3 class="flow_heading add_address">Select type of property you want to sell at 15 Bells platform</h3>
								<div class="col-md-3 col-xs-6 commer_office prop_priceshow">
									<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/office.svg';  ?>" class="property_image">
									<p class="property_name">Commercial Office</p>
								</div>
								<div class="col-md-3 col-xs-6 commer_retail prop_priceshow">
									<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/retail.svg';  ?>" class="property_image">
									<p class="property_name">Commercial Retails</p>
								</div>
								<div class="col-md-3 col-xs-6 commer_land prop_priceshow">
									<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/industrial.svg';  ?>" class="property_image">
									<p class="property_name">Industrial Land & <br>Plots</p>
								</div>
								<div class="col-md-3 col-xs-6 ware_house prop_priceshow">
									<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/warehouse.svg';  ?>" class="property_image">
									<p class="property_name">Warehouse</p>
								</div>
							</div>
							<div class="row category_detail commercial_o">
							<h3 class="flow_heading">Choose your category</h3>
							<ul class="sub_categories registerlogin">
								<li class=""><a href="javascript:void(0)" id="11" class="property_subtype proptype">Commercial Office Space</a></li>
								<li class=""><a href="javascript:void(0)" id="12" class="property_subtype proptype">IT / ITES / SEZ Park</a></li>
								<li class=""><a href="javascript:void(0)" id="13" class="property_subtype proptype">Co-working/Business Center</a></li>
								<li class=""><a href="javascript:void(0)" id="14" class="property_subtype proptype">Commercial SEZ</a></li>
							</ul>
							
						</div>
						<div class="row category_detail commercial_r">
							<h3 class="flow_heading">Choose your category</h3>
							<ul class="sub_categories registerlogin">
								<li class="active"><a href="javascript:void(0)" id="15" class="property_subtype proptype">Mall/Retail Shop</a></li>
								<li class=""><a href="javascript:void(0)" id="16" class="property_subtype proptype">Showrooms</a></li>
								<li class=""><a href="javascript:void(0)" id="17" class="property_subtype proptype">High Street/ Society Shops</a></li>
								<li class=""><a href="javascript:void(0)" id="18" class="property_subtype proptype">Food Court</a></li>
							</ul>
							
						</div>
						<div class="row category_detail industrial_land">
							<h3 class="flow_heading">Choose your category</h3>
							<ul class="sub_categories registerlogin">
								<li class=""><a href="javascript:void(0)" id="19" class="property_subtype proptype">Commercial land</a></li>
								<li class=""><a href="javascript:void(0)" id="22" class="property_subtype proptype">Industrial / Factory land</a></li>
								<li class=""><a href="javascript:void(0)" id="23" class="property_subtype proptype">Institutional/Hotel/School land</a></li>
								<li class=""><a href="javascript:void(0)" id="24"class="property_subtype proptype">SEZ/IT/ITES land</a></li>
							</ul>
							
						</div>
						<div class="row category_detail warehouse">
							<h3 class="flow_heading">Choose your category</h3>
							<ul class="sub_categories display_inline registerlogin">
								<li class=""><a href="javascript:void(0)" id="25" class="property_subtype proptype">Shed</a></li>
								<li class=""><a href="javascript:void(0)" id="26" class="property_subtype proptype">Agriculture</a></li>
								
							</ul>
							
						</div>

					 <?= $form->field($model, 'project_type_id')->hiddenInput()->label(false) ?>
                     <input type="hidden" id="urlget" value="<?php echo $urlsd; ?>">
							<div class="col-md-12 seperator_div margin_seperator"></div>
						</div>
						<div class="row add_price">
							<div class="col-md-12 property_area">
									<div class="col-md-8">
										<div class="row">
											<h3 class="flow_heading">Let us know the expected price of your property</h3>

                                        <div class="col-md-8">
                                        <input type="text" class="form-control input_desgn exp_price input_number" placeholder="Enter Amount" id="dummyexpectedprice">

                                        <?= $form->field($model, 'expected_price')->hiddenInput(['maxlength' => true])->label(false) ?>
                                        </div>
                                        <div class="col-md-4">
                                        <select id="expectedprice" class="form-control area_price">
                                        <option value="lacs">Lacs</option>
                                        <option value="crores">Crores</option>
                                        </select>
                                        </div>										</div>
									</div>
							</div>
							<div class="col-md-12 seperator_div"></div>
							<div class="col-md-12 property_area crpet_area">
								<h3 class="flow_heading">Select unit & enter square and carpet area of your property</h3>
								<ul class="sub_categories display_inline">
									<li class=""><a href="javascript:void(0)" id="sq_feets" class="property_subtype price_unit">Sq. Feet</a></li>
									<li class=""><a href="javascript:void(0)" id="sq_yards" class="property_subtype price_unit">Sq. Yard</a></li>
									<li class=""><a href="javascript:void(0)" id="sq_meters" class="property_subtype price_unit">Sq. Meter</a></li>
								</ul>
							</div>
							<div class="col-md-12">
									<div class="col-md-6">
                                    <?= $form->field($model, 'super_area')->textInput([ 'placeholder' => "Enter Super Area",'class' => 'input_number form-control input_desgn'])->label(false) ?>
                                    <?= $form->field($model, 'super_unit')->hiddenInput()->label(false) ?>

											<!-- <input type="text" class="form-control input_desgn" placeholder="Enter Super Area"> -->
									</div>
									<div class="col-md-6">
                                    <?= $form->field($model, 'carpet_area')->textInput([ 'placeholder' => "Enter Carpet Area",'class' => 'input_number form-control input_desgn carpet_area'])->label(false) ?>
                                    <?= $form->field($model, 'carpet_unit')->hiddenInput()->label(false) ?>

											<!-- <input type="text" class="form-control input_desgn carpet_area" placeholder="Enter Carpet Area"> -->
									</div>
							</div>
					</div>
					
				  </div>
				  


				  <input type="hidden" value="" id="lat1" name="lat1">
                    <input type="hidden" value="" id="long1" name="long1">
                    <input type="hidden" value="" id="town" name="town">
                    <input type="hidden" value="" id="sector" name="sector">
                    <input type="hidden" id="getuserid"  value="<?php  if(isset($user_id)){echo $user_id; }  ?>">
			
				<div class="row property_type property_moredetails">
							<h1 class="more_detail">Help us in getting the best price for your property which is 20% more than your expectation </h1>
							
						<div class="col-md-9 no_pad">
							<div class="row no_pad">
								<h3 class="flow_heading">Availability</h3>
								<ul class="sub_categories avail_b">
									<li class=""><a href="javascript:void(0)" id="under_construction"class="property_subtype availability">Under construction</a></li>
									<li class=""><a href="javascript:void(0)" id="ready_to_move" class="property_subtype availability">Ready to move in</a></li>
									<li class=""><a href="javascript:void(0)" id="30_days" class="property_subtype availability">30 Days</a></li>
									<li class=""><a href="javascript:void(0)" id="60_days" class="property_subtype availability">60 Days</a></li>
								</ul>
                                <?= $form->field($model, 'availability')->hiddenInput()->label(false) ?>

								<!--<div class="col-md-6 date_select">
                                <?= $form->field($model, 'available_date')->textInput([ 'placeholder' => "Select a Date",'class' => 'form-control input_desgn'])->label(false) ?> 
                                <!-- <input type="text" class="form-control input_desgn" placeholder="Select a Date"> 
                                </div>-->
							</div>
							<div class="row seperator_div"></div>
							<div class="row f_status">
								<h3 class="flow_heading">Furnishing Status</h3>
								<ul class="sub_categories furnishing_s">
									<li class=""><a href="#" id="warmshell" class="property_subtype furnishing">Warm Shell</a></li>
									<li class=""><a href="javascript:void(0)" id="bareshell" class="property_subtype furnishing">Bare Shell</a></li>
									<li class=""><a href="javascript:void(0)" id="furnished" class="property_subtype furnishing">Furnished</a></li>
									<li class=""><a href="javascript:void(0)" id="semi_furnished" class="property_subtype furnishing">Semi Furnished</a></li>
								</ul>
                                <?= $form->field($model, 'furnished_status')->hiddenInput()->label(false) ?>

							</div>
							<div class="row seperator_div"></div>
							<div class="row possesion_time">
								<h3 class="flow_heading">Mention possession time ( If Applicable )</h3>
								<div class="row possesion_list">
									<ul class="sub_categories display_inline">
										<li class=""><a href="javascript:void(0)" id="1_month" class="property_subtype possesions">1 Month</a></li>
										<li class=""><a href="javascript:void(0)" id="2_month" class="property_subtype possesions">2 Month</a></li>
										<li class=""><a href="javascript:void(0)" id="3_month" class="property_subtype possesions">3 Month</a></li>
										<li class=""><a href="javascript:void(0)" id="4_month" class="property_subtype possesions">4 Month</a></li>
									</ul>
                                    <?= $form->field($model, 'possesion_by')->hiddenInput()->label(false) ?>
								</div>
								<!--<div class="col-md-6 date_select">
                                <input type="text" class="form-control input_desgn" placeholder="Select a Date">
                                    </div>-->
							</div>
							<div class="row seperator_div"></div>
							<h1 class="more_detail">To sell property at earliest, Go ahead and beautify property by sharing property details</h1>
                            <div class="row seperator_div"></div>
                            <h1 class="more_detail basic_det">Add more Basic Details</h1>
							<div class="row furnishing_stat">
								
								<h3 class="flow_heading">How many floors are there in buildings?</h3>
								<div class="row no_pad floor_totl">
									<div class="col-md-4 col-xs-6"><button id="10" class="button_select uptofloor">Upto 10</button></div>
									<div class="col-md-4 col-xs-6"><button id="20"  class="button_select uptofloor">Upto 20</button></div>
									<div class="col-md-4 col-xs-6"><button id="30"  class="button_select uptofloor">Upto 30</button></div>
									<div class="col-md-4 col-xs-6"><button id="other"  class="button_select uptofloor">Others</button></div>
								</div>
								
							</div>
							<div class="row seperator_div"></div>
							<div class="row furnishing_stat floor_no">
								<h3 class="flow_heading">Property on floor</h3>
								<div class="row no_pad" id="floorten">
									<div class="col-md-2"><button id="G" class="button_select prop_floor">G</button></div>
									<div class="col-md-2 col-xs-3"><button id="1" class="button_select prop_floor">1</button></div>
									<div class="col-md-2 col-xs-3"><button id="2" class="button_select prop_floor">2</button></div>
									<div class="col-md-2 col-xs-3"><button id="3" class="button_select prop_floor">3</button></div>
									<div class="col-md-2 col-xs-3"><button id="4" class="button_select prop_floor">4</button></div>
									<div class="col-md-2 col-xs-3"><button id="5" class="button_select prop_floor">5</button></div>
									<div class="col-md-2 col-xs-3"><button id="6" class="button_select prop_floor">6</button></div>
									<div class="col-md-2 col-xs-3"><button id="7" class="button_select prop_floor">7</button></div>
									<div class="col-md-2 col-xs-3"><button id="8" class="button_select prop_floor">8</button></div>
									<div class="col-md-2 col-xs-3"><button id="9" class="button_select prop_floor">9</button></div>
									<div class="col-md-2 col-xs-3"><button id="10" class="button_select prop_floor">10</button></div>
								</div>
                                <div class="row no_pad" id="floortwenty">
									
									<div class="col-md-2 col-xs-3"><button id="11" class="button_select prop_floor">11</button></div>
									<div class="col-md-2 col-xs-3"><button id="12" class="button_select prop_floor">12</button></div>
									<div class="col-md-2 col-xs-3"><button id="13" class="button_select prop_floor">13</button></div>
									<div class="col-md-2 col-xs-3"><button id="14" class="button_select prop_floor">14</button></div>
									<div class="col-md-2 col-xs-3"><button id="15" class="button_select prop_floor">15</button></div>
									<div class="col-md-2 col-xs-3"><button id="16" class="button_select prop_floor">16</button></div>
									<div class="col-md-2 col-xs-3"><button id="17" class="button_select prop_floor">17</button></div>
									<div class="col-md-2 col-xs-3"><button id="18" class="button_select prop_floor">18</button></div>
									<div class="col-md-2 col-xs-3"><button id="19" class="button_select prop_floor">19</button></div>
									<div class="col-md-2 col-xs-3"><button id="20" class="button_select prop_floor">20</button></div>
								</div>
                                <div class="row no_pad" id="floorthirty">
									
									<div class="col-md-2 col-xs-3"><button id="21" class="button_select prop_floor">21</button></div>
									<div class="col-md-2 col-xs-3"><button id="22"class="button_select prop_floor">22</button></div>
									<div class="col-md-2 col-xs-3"><button id="23"class="button_select prop_floor">23</button></div>
									<div class="col-md-2 col-xs-3"><button id="24" class="button_select prop_floor">24</button></div>
									<div class="col-md-2 col-xs-3"><button id="25" class="button_select prop_floor">25</button></div>
									<div class="col-md-2 col-xs-3"><button id="26" class="button_select prop_floor">26</button></div>
									<div class="col-md-2 col-xs-3"><button id="27" class="button_select prop_floor">27</button></div>
									<div class="col-md-2 col-xs-3"><button id="28" class="button_select prop_floor">28</button></div>
									<div class="col-md-2 col-xs-3"><button id="29" class="button_select prop_floor">29</button></div>
									<div class="col-md-2 col-xs-3"><button id="30" class="button_select prop_floor">30</button></div>
								</div>
                                <?= $form->field($model, 'property_on_floor')->hiddenInput()->label(false) ?>

							</div>
							<div class="row seperator_div"></div>
							<div class="row furnishing_stat owner_deed">
								<h3 class="flow_heading">Choose ownership deeds</h3>
								<div class="col-md-12 no_pad">
									<div class="col-md-4 col-xs-6"><button id="freehold" class="button_select ownerships">Free Hold</button></div>
									<div class="col-md-4 col-xs-6"><button id="lease_hold" class="button_select ownerships">Lease Hold</button></div>
									<div class="col-md-4 col-xs-6"><button id="poa" class="button_select ownerships">General POA</button></div>
									<div class="col-md-4 col-xs-6"><button id="spa" class="button_select ownerships">SPA</button></div>
								</div>
                                <?= $form->field($model, 'ownership')->hiddenInput()->label(false) ?>

							</div>
							<div class="row seperator_div"></div>
							<div class="row furnishing_stat loan_prop">
								<h3 class="flow_heading">Is there any loan on property?</h3>
								<div class="col-md-12">
									<div class="col-md-2 col-xs-4 no_pad"><button id="yes" class="button_select loantakens">Yes</button></div>
									<div class="col-md-2 col-xs-4 no_pad"><button id="no" class="button_select loantakens">No</button></div>
								</div>
                                <?= $form->field($model, 'LOAN_taken')->hiddenInput()->label(false) ?>

							</div>
							<div class="row furnishing_stat far_app">
								<h3 class="flow_heading">Is Floor Area Ratio (FAR) approved?</h3>
								<div class="col-md-12">
									<div class="col-md-2 col-xs-4 no_pad"><button id="yes" class="button_select farapprovals">Yes</button></div>
									<div class="col-md-2 col-xs-4 no_pad"><button id="yes" class="button_select farapprovals">No</button></div>
								</div>
                                <?= $form->field($model, 'FAR_approval')->hiddenInput()->label(false) ?>

							</div>
							<div class="row seperator_div"></div>
							<div class="row furnishing_stat prop_age">
								<h3 class="flow_heading">How old is the property? </h3>
								<div class="col-md-12">
									<div class="col-md-3 col-xs-6"><button id="0-1" class="button_select propage">0 - 1 Years</button></div>
									<div class="col-md-3 col-xs-6"><button id="1-5" class="button_select propage">1 - 5 Years</button></div>
									<div class="col-md-3 col-xs-6"><button id="5-10" class="button_select propage">5 - 10 Years</button></div>
									<div class="col-md-3 col-xs-6"><button id="10+" class="button_select propage">10+ Years</button></div>
									<div class="col-md-3 col-xs-6"><button id="others" class="button_select propage">Others</button></div>
								</div>
                                <?= $form->field($model, 'age_of_property')->hiddenInput()->label(false) ?>


							<div class="row seperator_div"></div>
							<div class="row furnishing_stat prop_facing">
								<h3 class="flow_heading">Property Facing? </h3>
								<div class="col-md-12">
									<div class="col-md-3 col-xs-6"><button id="east" class="button_select propfacing">East</button></div>
									<div class="col-md-3 col-xs-6"><button id="west" class="button_select propfacing">West</button></div>
									<div class="col-md-3 col-xs-6"><button id="north" class="button_select propfacing">North</button></div>
									<div class="col-md-3 col-xs-6"><button id="south" class="button_select propfacing">South</button></div>
									<div class="col-md-3 col-xs-6"><button id="north_east" class="button_select propfacing">North-East</button></div>
									<div class="col-md-3 col-xs-6"><button id="north_west" class="button_select propfacing">North-West</button></div>
									<div class="col-md-3 col-xs-6"><button id="south_east" class="button_select propfacing">South-East</button></div>
									<div class="col-md-3 col-xs-6"><button id="south_west" class="button_select propfacing">South-West</button></div>
								</div>
                                <?= $form->field($model, 'facing')->hiddenInput()->label(false) ?>

							</div>
							<div class="row seperator_div"></div>
						</div>
							





                       <!-- <div class="row">
								<h1 class="more_detail">Expectations, Nearby Places and Amenities</h1>
								<p class="brand_txt">Please help us understanding you expectations</p>
								<h3 class="flow_heading">Is there any locking period for lessee? </h3>
								<div class="col-md-12">
									<div class="col-md-2  col-xs-4 no_pad"><button id="yes" class="button_select locking_period">Yes</button></div>
									<div class="col-md-2 col-xs-4 no_pad"><button id="no" class="button_select locking_period">No</button></div>
								</div>
							</div>
							
							<div class="row">
								<h3 class="flow_heading">Is lease tenure applicable? </h3>
								<div class="col-md-12">
									<div class="col-md-2 col-xs-4 no_pad"><button id="yes"class="button_select tenures">Yes</button></div>
									<div class="col-md-2 col-xs-4 no_pad"><button id="no" class="button_select tenures">No</button></div>
								</div>
							</div>


							<div class="col-md-12">
								<h3 class="flow_heading">Is there any rent free period?</h3>
								<div class="col-md-12">
									<div class="col-md-2 col-xs-4 no_pad"><button id="yes" class="button_select rent_free">Yes</button></div>
									<div class="col-md-2 col-xs-4 no_pad"><button id="no" class="button_select rent_free">No</button></div>
								</div>
							</div> -->
                    <input type="hidden" value="" id="locking_period" name="locking_period">
                    <input type="hidden" value="" id="tenures" name="tenures">
                    <input type="hidden" value="" id="rent_free" name="rent_free">

							<div class="col-md-12 interior_det">
								<h3 class="flow_heading">Please share the interior details of property?</h3>
								<div class="col-md-12">
									<div class="col-md-6 date_select">
                                    <!-- <input type="text" class="form-control input_desgn" placeholder="Enter revenue layout"> -->
                                    <?= $form->field($model, 'revenue_lauout')->textInput([ 'placeholder' => "Enter revenue layout",'class' => 'form-control input_desgn revenue_inpt'])->label(false) ?> 

                                    </div>
								</div>
								
							</div>
							<div class="col-md-12 seperator_div"></div>
							<div class="col-md-12 near_by">
								<h1 class="more_detail">Nearby Places</h1>
								<p class="brand_txt no_pad">Please help us understanding the nearby places around property?</p>
								<h3 class="flow_heading">Commuting options around the property?</h3>
								<div class="col-md-12 text-left padd_amen">
									<div class="col-md-3 amenities_icon">
                                        <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/bus.svg';  ?>" class="nearbyclass img_input bus_img" id="bus" width="22" />
                                        <span class="amenity_prop bus">Bus</span>
									</div>
									<div class="col-md-3 amenities_icon">
                                        <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/metro.svg';  ?>" class="nearbyclass img_input  metro_img" id="metro" width="24"  />
                                        <span class="amenity_prop metro">Metro</span>
									</div>
									<div class="col-md-3 amenities_icon">
                                        <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/train.svg';  ?>" class="nearbyclass img_input train_img" id="train" width="18"  />
                                        <span class="amenity_prop train">Train</span>
									</div>
									<div class="col-md-3 amenities_icon">
                                        <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/cab.svg';  ?>" class="nearbyclass img_input cab_img" id="cab" width="20"  />
                                        <span class="amenity_prop cab">Cab</span>
									</div>
								</div>

                                
									<div class="col-md-12 text-left padd_amen">
										<div class="col-md-3 amenities_icon">
                                            <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/market.svg';  ?>" class="nearbyclass img_input market_img" id="market" width="24"  />
                                            <span class="amenity_prop market">Market</span>
										</div>
										<div class="col-md-3 amenities_icon">
                                            <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/atm.svg';  ?>" class="nearbyclass img_input atm_img" id="atm" width="20"  />
                                            <span class="amenity_prop atm">ATM's</span>
										</div>
										<div class="col-md-3 amenities_icon">
                                            <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/hospital.svg';  ?>" class="nearbyclass img_input hospital_img" id="hospital" width="20"  />
                                            <span class="amenity_prop hospital">Hospitals</span>
										</div>
									</div>
								</div>


                       <input type="hidden" name="near_by" id="nearby_array">



							<div class="col-md-12">
								<h1 class="more_detail">Amenities</h1>
								<p class="brand_txt no_pad">Please help us understanding the amenities that buyers/lessee can expect?</p>
                                <p class="amenities">Click on the icons to select Amenities</p>
                                <div class="col-md-12 text-left padd_amen">
									<div class="col-md-3 col-xs-6 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amenitiesclass img_input power_img" id="power" width="22"  /><span class="amenity_prop power">Power Backup</span>
									</div>
									<div class="col-md-3 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amenitiesclass img_input wifi_img" id="wifi" width="24"  /><span class="amenity_prop wifi">Wi-Fi</span>
									</div>
									<div class="col-md-3 col-xs-6 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amenitiesclass img_input lift_img" id="lift" width="18"  /><span class="amenity_prop lift">Service Lift</span>
									</div>
									<div class="col-md-3 col-xs-6 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amenitiesclass img_input camera_img"id="security" width="20"  /><span class="amenity_prop camera">Security Camera</span>
									</div>
								</div>
									<div class="col-md-12 col-xs-6 text-left padd_amen">
										<div class="col-md-3 amenities_icon">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/gaurd.svg';  ?>" class="amenitiesclass img_input gaurd_img" id="gaurd" width="24"  /><span class="amenity_prop gaurd">Security Personnel</span>
										</div>
										<div class="col-md-3 col-xs-6 amenities_icon">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amenitiesclass img_input" id="parking" width="20"  /><span class="amenity_prop">Parking</span>
										</div>
										<div class="col-md-3 col-xs-6 amenities_icon">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/hospital.svg';  ?>" class="amenitiesclass img_input hospital_img" id="hospital" width="20"  /><span class="amenity_prop hospital">Hospitals</span>
										</div>
									</div>
							</div>

				           <input type="hidden" name="amenityies" id="amenities_array">


                    <?= Html::submitButton('Save Property', ['class' => 'btn btn-primary save_buttn active_butn']) ?>


						</div>
						
				  </div>


     

			
			<!--More Details-->
				  
			</div>
		</div>
		 <?php ActiveForm::end(); ?>
		
		
		
	</div>
</div>
</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content draw_map no_pad">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
		<div class="container-fluid no_pad tag_map">
			<div class="col-md-7 no_pad">
			<div id="map-canvas"></div>

			</div>
			
			<div class="col-md-5 mark_instruction">
				<h4 class="mark_map">Mark your area on the map</h4>
				<p class="map_text">Draw a shape on the map to select an area. Please mark your desired location area on the map to get the better results.</p>
				<p class=""><div class="btn-group btn-toggle btn_toggle"> 
											<button class="btn btn-lg map_continue" data-dismiss="modal">Skip</button>
											<button class="btn button_togg btn-lg step_availablity" type="button" onclick="getbrandcount();">Confirm</button>
										  </div></p>
				
			</div>
		</div>
		<div class="container-fluid no_pad tag_result">
			<div class="col-md-12 no_pad result_show text-center">
				<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/map_tagging.svg';  ?>" width="110">
				<p class="search_tag">There are <span id="totalcounts"></span> recent searched happen in this area.</p>
				<p class="text-center process_continue"><a href="javascript:void(0)" class="property_process map_continue">Continue <i class="fa fa-angle-right"></i></a></p>
			</div>
			
		</div>
      </div>
      
    </div>

  </div>
</div>



<div id="signup_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content draw_map no_pad">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
		<div class="container-fluid no_pad">
			<div class="col-md-6 no_pad hidden-xs hidden-sm"> 
				<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/sign-in.jpg';  ?>" class="img-responsive">
			</div>
			
			<div class="col-md-6 seller_lead">
            		<ul class="nav nav-pills signup_tabs">
					  <li class="active"><a class="anchr_sign signin_butn" data-toggle="pill" href="#home">Sign up</a></li>
					  <li><a class="anchr_sign signup_butn" data-toggle="pill" href="#menu1">Already a member</a></li>
					</ul>

<div class="tab-content">

                    <div id="home" class="tab-pane fade in active">
			<div class="col-md-12 no_pad">
            <?php $modeled = new \frontend\modules\user\models\SignupForm(); 
             $model1 = new \frontend\modules\user\models\LoginForm();
            
            ?>

			<?php $form = ActiveForm::begin(['id' => $modeled->formName(),
			'action'=>"user/sign-in/sellersignup"]); ?>

				<div class="col-md-12 no_pad">
					<h2 class="login_head verify_seller">Verify yourself to reach multiple Buyers</h2>
							<div class="form-group">


							  <!-- <input type="text" class="form-control input_desgn" placeholder="Email or Phone no"> -->
							  <?=$form->field($modeled, 'username', [
                                'options' => [
                                    //'tag' => 'div',
                                    //'class' => '',
                                ],
                                //'template' => '<span class="col-md-2 col-lg-2"><label class="control-label">Final item price</label>{input}{error}</span>'
                            ])->textInput([ 'placeholder' => "Enter Mobile Number" , 'class' => 'form-control input_desgn'])->label(false)?>
							</div>
							<div class="form-group" id="otphide">
							  <!-- <input type="text" class="form-control input_desgn" placeholder="Password"> -->
							  <?=$form->field($modeled, 'otp')->textInput(['placeholder' => "Enter OTP" ,'class'=>'form-control input_desgn'])->label(false)?>


							</div>


							<button type="button" id="otpit" class="otp_button">Get one time password (OTP)</button>
                            <button type="button" id="resendotp" class="otp_button">Resend OTP</button>

							<p class="text-center">
							<!-- <button class="btn btn-default btn_signin" data-dismiss="modal">
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/lock.svg';  ?>" width="14" class="lock_img">
							Verify securely</button> -->
							<?=
                                $form->field($modeled, 'checkotp')->hiddenInput()->label(false);
                            
								
								?>
                                <?=
                                
                                $form->field($modeled, 'user_login_as')->hiddenInput(['value' => 'seller'])->label(false);
                                        

                                ?>

                                <?=
                                
                                $form->field($modeled, 'companytype')->hiddenInput(['value' => 'Individual'])->label(false);
                                        

                                ?>

                                <?=                               
                            
								$form->field($modeled, 'mobile')->hiddenInput()->label(false);
								

								?>
							<?php echo Html::submitButton(Yii::t('frontend', '<img src="'.Yii::getAlias('@frontendUrl').'/newimg/img/lock.svg' .'" width="14" class="lock_img">Verify securely'), ['id' => 'mjhehit', 'class' => 'btn btn-default btn_signin', 'name' => 'signup-button']) ?>

							
							
							</p>
							
				</div>

          <?php ActiveForm::end(); ?>
				
			</div>

</div>


<div id="menu1" class="tab-pane fade">

	<div class="col-md-12 no_pad">
					
                    <?php 

                    $form = ActiveForm::begin(['id' => $model1->formName(),
                    'action'=>"user/sign-in/sellerlogin"]); 
                    
                    ?>
                            <?=
                            $form->field($model1, 'checkotp')->hiddenInput(['value'=>'error'])->label(false);

                            ?>
                             <?=
                            $form->field($model1, 'checkfield')->hiddenInput(['value'=>'otp'])->label(false);

                            ?>
                    
                    <div class="col-md-12 no_pad">
                        <div class="form-group">
                        <?php echo $form->field($model1, 'identity')->textInput(['class' => 'form-control input_desgn','placeholder'=>'Email or Phone no'])->label(false) ?>
                          <!-- <input type="text" class="form-control input_desgn" placeholder="Email or Phone no"> -->
                        </div>

                        
                        <button type="button" id="passwordit" class="otp_button">Login via Password</button><span class="login_popup">OR</span>
                        <button type="button" id="otpits" class="otp_button">Login via OTP</button>
                        <button type="button" id="resendotps" class="otp_button">Resend OTP</button>


                        <div class="form-group" id="hideotp">
                          <!-- <input type="text" class="form-control input_desgn" placeholder="Email or Phone no"> -->
                            <?php echo $form->field($model1, 'userOTP')->textInput(['class' => 'form-control input_desgn','placeholder'=>'OTP'])->label(false) ?>
                         
                        </div>

                        <div class="form-group" id="hidepassword">
                          <!-- <input type="text" class="form-control input_desgn" placeholder="Email or Phone no"> -->
                            <?php echo $form->field($model1, 'password')->passwordInput(['class' => 'form-control input_desgn','placeholder'=>'Password'])->label(false) ?>
                         
                        </div>
                        <!--<div class="checkbox">
                        
                        <?//php echo $form->field($model1, 'rememberMe')->checkbox() ?>
                           <label class="rembr_ch"><input type="checkbox" value="">Remember me</label> 
                        </div>-->

                        
                        <p class="text-center">

<?php echo Html::submitButton(Yii::t('frontend', '<img src="'.Yii::getAlias('@frontendUrl').'/newimg/img/lock.svg' .'" width="14" class="lock_img">Sign in securely'), ['class' => 'btn btn-default btn_signin', 'name' => 'login-button']) ?>
                        <!-- <button class="btn btn-default btn_signin">
                        <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/lock.svg';  ?>" width="14" class="lock_img">Sign in securely
                        </button> -->
                        </p>
                        <!-- <p class="text-left tems_lin">By logging in, you agree to our<a href="" class="trms_butn"> Terms &amp; Conditions</a> &amp; <a href="" class="trms_butn">Privacy Policy </a></p> -->
                        <p class="text-left tems_lin">Forgot Password?
                         
                         <?php echo Yii::t('frontend', '<a class="trms_butn" href="{link}">Click here</a>', [
                    'link'=>yii\helpers\Url::to(['sign-in/request-password-reset'])
                ]) ?>
                         </p>
                    </div>
                    <?php ActiveForm::end(); ?>
                
                  </div>
</div>

</div>


</div>




		</div>
		
      </div>
      
    </div>

  </div>
</div>




<div id="modal_skip" class="modal fade" role="dialog">
  <div class="modal-dialog modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content draw_map no_pad">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
		<div class="container-fluid no_pad">
			<div class="col-md-12 text-center skip_details">
				<p class="skip_content">Our intention is to get more information</p>
				<p class="process_continue"><!--<a href="#" data-dismiss="modal" class="property_back">Skip </a>--><a href="#" class="property_process add_stepp">Continue <i class="fa fa-angle-right"></i></a></p>
			</div>
		</div>
		
      </div>
      
    </div>

  </div>
</div>

<div class="container-fluid testimonial_slider">
	<div class="container">
		<div class="row">
			<div class="col-md-6 no_pad">
				<h1 class="trans_head_b">Testimonials</h1>
				<p class="brand_txt">We succeed when our client succeed. </p>
			</div><div class="col-md-6"></div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-md-offset-2">
				
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators testimonial_indicator">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						  </ol>
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner">
						<div class="item active">
						  <div class="row" style="padding: 20px">
							<i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i>
							<p class="testimonial_para">We are very satisfied with 15 Bells. They understood our enterprise product inside out and executed it effectively.</p><br>
							<div class="row">
								<div class="col-sm-10 client_description">
								<h4 class="client_name">Harold Henderson</h4>
								<p class="testimonial_subtitle"><span>Chlinical Chemistry Technologist</span>
								</p>
							</div>
							</div>
						  </div>
						</div>
					   <div class="item">
						    <div class="row" style="padding: 20px">
							<i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i>
							<p class="testimonial_para">We are very satisfied with 15 Bells. They understood our enterprise product inside out and executed it effectively.</p><br>
							<div class="row">
								<div class="col-sm-10 client_description">
								<h4 class="client_name">Harold Henderson</h4>
								<p class="testimonial_subtitle"><span>Chlinical Chemistry Technologist</span>
								</p>
							</div>
							</div>
						  </div>
						</div>
					   <div class="item">
						    <div class="row" style="padding: 20px">
							<i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i>
							<p class="testimonial_para">We are very satisfied with 15 Bells. They understood our enterprise product inside out and executed it effectively.</p><br>
							<div class="row">
								<div class="col-sm-10 client_description">
								<h4 class="client_name">Harold Henderson</h4>
								<p class="testimonial_subtitle"><span>Chlinical Chemistry Technologist</span>
								</p>
							</div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
					
					
				</div>
		</div>
	</div>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>





<?php
$script = <<< JS

//$("#signup_modal").modal('show');



$('#hideotp').hide();
$('#otphide').hide();
$('#hidepassword').hide();
$('#resendotp').hide();
$('#resendotps').hide();


$('#passwordit').click(function(){

$('#loginform-checkfield').val('password');

$('#hideotp').hide();
$('#hidepassword').show();

});


$('form#{$modeled->formName()}').on('beforeSubmit', function(e) {
	
var form = $(this);

var formData = form.serialize();

$.ajax({

    url: form.attr("action"),

    type: form.attr("method"),

    beforeSend: function(){
    
     
   },
   complete: function(){
   
	
   },

    data: formData,

    success: function (data) {

        if( typeof(data["signupform-username"]) != "undefined"){
              
              if (data["signupform-username"] == 'Mobile No. already exist.'){


                  alert('Mobile No. Already exisit please sign in here');
                  $('#loginform-identity').val($('#signupform-username').val());
                $( ".signup_butn" ).trigger( "click" );
              }

        }

 if ( typeof(data["signupform-username"]) != "undefined" && data["signupform-username"] !== null && data["signupform-username"] !== 'exist' ) {
                     
                    }

                     if(data == 'done'){

		                 $("#signup_modal").modal('hide');
	                 }
        

       

    },

    error: function () {

        //alert("Something went wrong");

    }

});

}).on('submit', function(e){

	

e.preventDefault();

});






$('form#{$model1->formName()}').on('beforeSubmit', function(e) {
	
    var form = $(this);

     
     form.attr('autocomplete', 'off');
    var formData = form.serialize();

    
    $.ajax({
    
        url: form.attr("action"),
    
        type: form.attr("method"),
    
        beforeSend: function(){
        
         
       },
       complete: function(){
       
        
       },
    
        data: formData,
    
        success: function (data) {

             if( typeof(data['loginform-password']) != "undefined"){
              
              if (data['loginform-password'] == 'Incorrect username or password.'){


                  alert('Incorrect username or password.');
              }

        }   
                         if(data == 'done'){
    
                             $("#signup_modal").modal('hide');
                         }
            
    
           
    
        },
    
        error: function () {
    
            //alert("Something went wrong");
    
        }
    
    });
    
    }).on('submit', function(e){
    
       
    
    e.preventDefault();
    
    });




      $('#otpits').click(function(e){

$('#loginform-checkfield').val('otp');


e.preventDefault();
e.stopImmediatePropagation(); 
var newotp =  generateOTP();

var identity = $('#loginform-identity').val();

var phoneno = /^\d{10}$/;
if(identity.match(phoneno))
{	 
$('#otphide').show();
$('#hideotp').show();
$('#hidepassword').val('');
$('#hidepassword').hide();
$('#otpits').hide();
$('#resendotps').show();


$.ajax({
                     type: "POST",
                     url: 'user/sign-in/rgetotp',
                     data: {phone : identity,newotp:newotp},
                     success: function (data) {
                         //  alert(data); 						
                         //$('#loginform-checkotp').val(newotp);
                             
                            // $('#otpit').hide();        
                     },
             });
             return;

     }

    else if (isValidEmailAddress(identity)) {
        $('#otphide').show();

     $.ajax({
        type: "POST",
        url: 'sendemail',
        data: {emailid : identity,newotp:newotp},
        success: function (data) {
            
           // toastr.success('OTP has been Send to your Mobile Number','success');
           // $.pjax.reload({container: '#pjax-grid-view', async:false}); 

                            
            // $('#loginform-checkotp').val(newotp);
              
        },
    });

                return;
}		 
     else
     {
         alert('Not a valid Input');
            
     }

    

});


$('#loginform-userotp').keyup(function(){

var identity = $('#loginform-identity').val();
var newotp = $('#loginform-userotp').val();
var checkotp =  $('#loginform-checkotp').val()

 var phoneno = /^\d{10}$/;
       if(identity.match(phoneno))
{
    var type = 'phone';
}else{

    var type = 'email';
}

if(newotp != '' && newotp.length===4){

$.ajax({
                         type: "POST",
                         url: 'user/sign-in/rverifyotp',
                         data: {phone : identity,newotp:newotp,type:type},
                         success: function (data) {

                             if(type == 'email'){

                                if(checkotp == newotp){

                                    $('#loginform-checkotp').val('success');

                                }else{
                                  
                                    $('#loginform-checkotp').val('error');
                                }

                                    
                             }else{

                                $('#loginform-checkotp').val(data);	

                             }

                                                
                                  
                         },
                 });

}


});


$('#resendotps').click(function(e){
        
   
        e.preventDefault();
        e.stopImmediatePropagation(); 
        var newotp =  generateOTP();
     
         var identity = $('#loginform-identity').val();
       
           var phoneno = /^\d{10}$/;
           if(identity.match(phoneno))
     {	 
         
    $('#loginform-checkfield').val('otp');	
	$('#hideotp').show();
	$('#hidepassword').hide();
     
           $.ajax({
                                type: "POST",
                                url: 'user/sign-in/resendotp',
                                data: {phone : identity},
                                success: function (data) {
                                   				
                                   
                                        
                                       // $('#otpit').hide();        
                                },
                        });
                        return;
     
                }
     
     	 
                else
                {
                    alert('Not a valid Input');
                       
                }
     
               
     
     });


JS;
$this->registerJs($script);
?> 



<script>

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}
$(".input_number").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

function generateOTP() { 
							
							// Declare a digits variable 
							// which stores all digits 
							var digits = '0123456789'; 
							let OTP = ''; 
							for (let i = 0; i < 4; i++ ) { 
									OTP += digits[Math.floor(Math.random() * 10)]; 
							} 
							return OTP; 
					} 

   
   $(document).ready(function () {





       $('#expectedprice').change(function(){

       // $('#dummyexpectedprice').removeAttr('readonly'); 
        $('#dummyexpectedprice').val(''); 
        $('#addproperty-expected_price').val('');

var currency  =  $(this).val();
if(currency == 'lacs'){
   var dummyprice =  $('#dummyexpectedprice').val();
    var actualpice = dummyprice * 100000;
   $('#addproperty-expected_price').val(actualpice);
}else{
    var dummyprice =  $('#dummyexpectedprice').val();
     var actualpice = dummyprice * 10000000;
    $('#addproperty-expected_price').val(actualpice);
}

});

 



   $("#dummyexpectedprice").on("input", function(){ 

      // $('#dummyexpectedprice').removeAttr('readonly');      
              var dummyprice =  $(this).val();
              var currency =  $('#expectedprice').val();
               if(currency == 'lacs'){
                  if(dummyprice > 99.9){

                     // $('#dummyexpectedprice').attr('readonly',true);
                      alert('Pease select crores');
                        $('#dummyexpectedprice').val(
                        function(index, value){
                        return value.substr(0, value.length - 1);
                        });
                      

                  }else{
                    var actualpice = dummyprice * 100000;
                    $('#addproperty-expected_price').val(actualpice);
                  }

               }else{
                   
                var actualpice = dummyprice * 10000000;
                    $('#addproperty-expected_price').val(actualpice);
               }
    });


    

       
	
       $('#otpit').click(function(e){
        
   
        e.preventDefault();
        e.stopImmediatePropagation(); 
        var newotp =  generateOTP();
     
         var identity = $('#signupform-username').val();
       
           var phoneno = /^\d{10}$/;
           if(identity.match(phoneno))
     {	 
         $('#resendotp').show();
         $('#otpit').hide();
         $('#otphide').show();
     
           $.ajax({
                                type: "POST",
                                url: 'user/sign-in/rgetotp',
                                data: {phone : identity,newotp:newotp},
                                success: function (data) {
                                    //  alert(data); 
                                    if(data == identity){
     
                                     $('#signupform-checkotp').val(newotp);
                                     $('#signupform-mobile').val(identity);
     
                                    }else{
                                     $('#signupform-checkotp').val('xxxx');
                                    }						
                                   
                                        
                                       // $('#otpit').hide();        
                                },
                        });
                        return;
     
                }
     
     // 		  else if (isValidEmailAddress(identity)) {
           
     //             $('#otphide').show();
     // 		   $.ajax({
     // 			  type: "POST",
     // 			  url: 'sendemail',
     // 			  data: {emailid : identity,newotp:newotp},
     // 			  success: function (data) {
                       
     // 				 // toastr.success('OTP has been Send to your Mobile Number','success');
     // 				 // $.pjax.reload({container: '#pjax-grid-view', async:false}); 
     
                                       
     // 				   $('#signupform-checkotp').val(newotp);
                         
     // 			  },
     // 		  });
     
     // 					  return;
     //   }		 
                else
                {
                    alert('Not a valid Input');
                       
                }
     
               
     
     });
     
     
     
      $('#resendotp').click(function(e){
             
        
             e.preventDefault();
             e.stopImmediatePropagation(); 
             var newotp =  generateOTP();
          
              var identity = $('#signupform-username').val();
            
                var phoneno = /^\d{10}$/;
                if(identity.match(phoneno))
          {	 
              
              $('#otphide').show();
          
                $.ajax({
                                     type: "POST",
                                     url: 'user/sign-in/resendotp',
                                     data: {phone : identity},
                                     success: function (data) {
                                                        
                                        
                                             
                                            // $('#otpit').hide();        
                                     },
                             });
                             return;
          
                     }
          
               
                     else
                     {
                         alert('Not a valid Input');
                            
                     }
          
                    
          
          });

   $('.address_row').hide();   
   $('.tag_result').hide();   
   $('.user_property').hide();   
   $('.user_location').hide();   
   $('.add_price').hide();   
    $('.property_moredetails').hide();   
    
   $(".input_location").focus(function() {
     $('.address_row').show('slow');   
    
   });
   $('.input_location').blur(function(){
    $('html,body').animate({
        scrollTop: $(".addres_input").offset().top - 400},
        'slow'); 
});
$('.exp_price').blur(function(){
    $('html,body').animate({
        scrollTop: $(".crpet_area").offset().top - 100},
        'slow'); 
});
$('.revenue_inpt').blur(function(){
    $('html,body').animate({
        scrollTop: $(".near_by").offset().top - 100},
        'slow'); 
})

$('.prop_floor').click(function(){
    $('html,body').animate({
        scrollTop: $(".owner_deed").offset().top - 100},
        'slow'); 
});

$('.loantakens').click(function(){
    $('html,body').animate({
        scrollTop: $(".far_app").offset().top - 100},
        'slow'); 
});
$('.propfacing').click(function(){
    $('html,body').animate({
        scrollTop: $(".interior_det").offset().top - 100},
        'slow'); 
});

$('.propage').click(function(){
    $('html,body').animate({
        scrollTop: $(".prop_facing").offset().top - 100},
        'slow'); 
});

$('.farapprovals').click(function(){
    $('html,body').animate({
        scrollTop: $(".prop_age").offset().top - 100},
        'slow'); 
});
$('.ownerships').click(function(){
    $('html,body').animate({
        scrollTop: $(".loan_prop").offset().top - 100},
        'slow'); 
});


$(".addres_input").on("blur",function (event) {    
           
          
        $('.tag_map').show(); 
        $('.tag_result').hide(); 
        $('#myModal').modal('show');
            
        });


    $('.addres_input').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
        $('.tag_map').show(); 
        $('.tag_result').hide(); 
        $('#myModal').modal('show');
        }
});   


   $('.carpet_area').blur(function(){
   $('#modal_skip').modal('show'); 
   });
   $('.add_stepp').click(function(){
       $('#modal_skip').modal('hide'); 
       $('.property_moredetails').show(); 
       $('.property_start').hide(); 
       $('.add_property li:nth-child(4)').addClass("active");
       $('html,body').animate({
        scrollTop: $(".property_moredetails").offset().top - 100},
        'slow'); 
   });
   $('.map_continue').click(function(){
   $('.user_property').show('slow'); 
   $('#myModal').modal('hide'); 
   $('.add_property li:nth-child(2)').addClass("active");
   $('html,body').animate({
        scrollTop: $(".user_property").offset().top - 100},
        'slow'); 
   });
    $('.btn_signin').click(function(){
  $('.add_price').show('slow'); 
  $('.add_property li:nth-child(3)').addClass("active");
  });
   $('.step_availablity').click(function(e) {
       $('.tag_map').hide(); 
       $('.tag_result').show(); 
   });
  
   $('.step_details').click(function(e) {
       //$(.add_property)
       $('.add_property li:nth-child(4)').addClass("active");
        $(".add_property li:nth-child(3)").removeClass("active");
   });
   $(".testimonial_indicator li").click(function () {
   $(".testimonial_indicator li").removeClass("active");
   // $(".tab").addClass("active"); // instead of this do the below 
   $(this).addClass("active");   
});
   $('.prop_cat li a').click(function(e) {

       $('.prop_cat li.active').removeClass('active');

       var $parent = $(this).parent();
       $parent.addClass('active');
       e.preventDefault();
   });
   $('.uptofloor').click(function(e) {
       $('.uptofloor.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });
   $('.prop_floor').click(function(e) {
       $('.prop_floor.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });
   $('.ownerships').click(function(e) {
       $('.ownerships.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });
   $('.loantakens').click(function(e) {
       $('.loantakens.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });
   $('.farapprovals').click(function(e) {
       $('.farapprovals.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });
   $('.propage').click(function(e) {
       $('.propage.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });
   $('.propfacing').click(function(e) {
       $('.propfacing.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });
   $('.locking_period').click(function(e) {
       $('.locking_period.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });
   $('.tenures').click(function(e) {
       $('.tenures.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });
   $('.rent_free').click(function(e) {
       $('.rent_free.active_butn').removeClass('active_butn');
       $(this).addClass('active_butn');
       e.preventDefault();
   });


$('.avail_b li a').click(function(){
    $('html,body').animate({
        scrollTop: $(".f_status").offset().top - 100},
        'slow'); 
});

$('.furnishing_s li a').click(function(){
    $('html,body').animate({
        scrollTop: $(".possesion_time").offset().top - 100},
        'slow'); 
});
$('.possesion_list li a').click(function(){
    $('html,body').animate({
        scrollTop: $(".basic_det").offset().top - 100},
        'slow'); 
});
$('.uptofloor').click(function(){
    $('html,body').animate({
        scrollTop: $(".floor_no").offset().top - 100},
        'slow'); 
});
$(".sub_categories li a").click(function() {
   $(this).parent().addClass('active').siblings().removeClass('active');
});
   

    $(".registerlogin li a").click(function() {
   var userids = $('#getuserid').val();

   if(userids == ''){
    $("#signup_modal").modal('show');
       }else{
  $('.add_price').show('slow'); 
  $('.add_property li:nth-child(3)').addClass("active");
       }
   });





   $(".property_image").click(function () {
           $(".property_image").removeClass("border_yellow");
           // $(".tab").addClass("active"); // instead of this do the below 
           $(this).addClass("border_yellow");   
       });

       


		$('.warehouse').hide();
		$('.industrial_land').hide();
		$('.commercial_r').hide();
       $(".commer_retail").click(function () {
               $('.commercial_o').hide();
               $('.commercial_r').show();
               $('.warehouse').hide();
               $('.industrial_land').hide();
               $('html,body').animate({
        scrollTop: $(".commercial_r").offset().top - 100},
        'slow');
       });
       $(".commer_office").click(function () {
               $('.commercial_o').show();
               $('.commercial_r').hide();
               $('.warehouse').hide();
               $('.industrial_land').hide();
               $('html,body').animate({
        scrollTop: $(".commercial_o").offset().top - 100},
        'slow');
       });
       $(".commer_land").click(function () {
               $('.commercial_o').hide();
               $('.warehouse').hide();
               $('.industrial_land').show();
               $('.commercial_r').hide();
               $('html,body').animate({
        scrollTop: $(".industrial_land").offset().top - 100},
        'slow');
       });
       $(".ware_house").click(function () {
               $('.commercial_o').hide();
               $('.commercial_r').hide();
               $('.warehouse').show();
               $('.industrial_land').hide();
               $('html,body').animate({
        scrollTop: $(".warehouse").offset().top - 100},
        'slow');
       });





	   $('.proptype').click(function(){
        var propid = this.id;
        $('#addproperty-project_type_id').val(propid);
    });
   


	   $('.price_unit').click(function(){
        var priceunit = this.id;
        $('#addproperty-super_unit').val(priceunit);
        $('#addproperty-carpet_unit').val(priceunit);
    });

    $('.availability').click(function(){
        var availability = this.id;
        $('#addproperty-availability').val(availability);
    });


    // var dateToday = new Date();
    // var dates = $("#addproperty-available_date").datepicker({
    //     defaultDate: "+1w",
    //     changeMonth: true,
    //     numberOfMonths: 1,
    //     minDate: dateToday,
    //     onSelect: function (selectedDate) {
    //         var option = this.id == "addproperty-available_date" ? "minDate" : "maxDate",
    //                 instance = $(this).data("datepicker"),
    //                 date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
    //         dates.not(this).datepicker("option", option, date);
    //     }
    // });


    $('.furnishing').click(function(){
        var furnishing = this.id;
        $('#addproperty-furnished_status').val(furnishing);
    });


    $('.possesions').click(function(){
        var possesions = this.id;
        $('#addproperty-possesion_by').val(possesions);
    });

    $('#floortwenty').hide();
           $('#floorthirty').hide();


    $('.uptofloor').click(function(){
        var uptofloor = this.id;
       if(uptofloor == '10'){
           $('#floorten').show();
           $('#floortwenty').hide();
           $('#floorthirty').hide();
       }

       if(uptofloor == '20'){
           $('#floorten').hide();
           $('#floortwenty').show();
           $('#floorthirty').hide();
       }

        if(uptofloor == '30'){
           $('#floorten').hide();
           $('#floortwenty').hide();
           $('#floorthirty').show();
       }
    });

     $('.prop_floor').click(function(){
        var prop_floor = this.id;
        $('#addproperty-property_on_floor').val(prop_floor);
    });

    $('.ownerships').click(function(){
        var ownerships = this.id;
        $('#addproperty-ownership').val(ownerships);
    });
   

    $('.loantakens').click(function(){
        
        var loantakens = this.id;
        $('#addproperty-loan_taken').val(loantakens);
    });

    $('.farapprovals').click(function(){
        var farapprovals = this.id;
        $('#addproperty-far_approval').val(farapprovals);
    });


    $('.propage').click(function(){
        var propage = this.id;
        $('#addproperty-age_of_property').val(propage);
    });

    $('.propfacing').click(function(){
        var propfacing = this.id;
        $('#addproperty-facing').val(propfacing);
    });


    $('.locking_period').click(function(){
        var locking_period = this.id;
        $('#locking_period').val(locking_period);
    });


    $('.tenures').click(function(){
        var tenures = this.id;
        $('#tenures').val(tenures);
    });


    $('.rent_free').click(function(){
        var rent_free = this.id;
        $('#rent_free').val(rent_free);
    });


    $('.propfacing').click(function(){
        var propfacing = this.id;
        $('#addproperty-facing').val(propfacing);
    });


      var nearbythings = [];
     $('.nearbyclass').click(function(){
        var nearbyclass = this.id;
        nearbythings.push(nearbyclass);

        $('#nearby_array').val(nearbythings);
    });


    var amenitiesthings = [];
        $('.amenitiesclass').click(function(){
        var amenitiesclass = this.id;
        amenitiesthings.push(amenitiesclass);

        $('#amenities_array').val(amenitiesthings);
    });
   
   
});

</script>
<script>


  $(document).ready(function(){
  
   //$(".transp_contnt").hide();
   
   $(".trans_clck").click(function(){
   //alert();
       $(".trust_contnt").hide();
       
   });
       // $(".transp_contnt").animate({bottom: '250px'});
   
   $(".buy").click(function(){
        $(".buy").addClass("active");
         $(".sell").removeClass("active");
   });
   $(".sell").click(function(){
        $(".sell").addClass("active");
         $(".buy").removeClass("active");
   });
   
   $('#myCarousel').carousel({
       interval: 10000
   })
   $('.fdi-Carousel .item').each(function () {
       var next = $(this).next();
       if (!next.length) {
           next = $(this).siblings(':first');
       }
       next.children(':first-child').clone().appendTo($(this));

       if (next.next().length > 0) {
           next.next().children(':first-child').clone().appendTo($(this));
       }
       else {
           $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
       }
   });
   
 });

//Amenities Icons
var urlget =  $('#urlget').val();
$(".img_input").click(function(){
   //alert(this.id);
			if (this.id == "bus")
			{
				if ($(".bus_img").attr('src') == urlget+"/newimg/img/amenities/bus.svg")
                {
                    this.src = urlget+"/newimg/img/amenities/bus_.svg";
					$(".bus").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/amenities/bus.svg";
					$(".bus").removeClass('change_color');
                }
			}
			if (this.id == "metro")
			{
				if ($(".metro_img").attr('src') == urlget+"/newimg/img/amenities/metro.svg")
                {
                    this.src = urlget+"/newimg/img/amenities/metro_.svg";
					$(".metro").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/amenities/metro.svg";
					$(".metro").removeClass('change_color');
                }
			}
			if (this.id == "train")
			{
				if ($(".train_img").attr('src') == urlget+"/newimg/img/amenities/train.svg")
                {
                    this.src = urlget+"/newimg/img/amenities/train_.svg";
					$(".train").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/amenities/train.svg";
					$(".train").removeClass('change_color');
                }
			}
			if (this.id == "cab")
			{
				if ($(".cab_img").attr('src') == urlget+"/newimg/img/amenities/cab.svg")
                {
                    this.src = urlget+"/newimg/img/amenities/cab_.svg";
					$(".cab").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/amenities/cab.svg";
					$(".cab").removeClass('change_color');
                }
			}
			if (this.id == "market")
			{
				if ($(".market_img").attr('src') == urlget+"/newimg/img/amenities/market.svg")
                {
                    this.src = urlget+"/newimg/img/amenities/market_.svg";
					$(".market").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/amenities/market.svg";
					$(".market").removeClass('change_color');
                }
			}
			if (this.id == "atm")
			{
				if ($(".atm_img").attr('src') == urlget+"/newimg/img/amenities/atm.svg")
                {
                    this.src = urlget+"/newimg/img/amenities/atm_.svg";
					$(".atm").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/amenities/atm.svg";
					$(".atm").removeClass('change_color');
                }
			}
			if (this.id == "hospital")
			{
				if ($(".hospital_img").attr('src') == urlget+"/newimg/img/amenities/hospital.svg")
                {
                    this.src = urlget+"/newimg/img/amenities/hospital_.svg";
					$(".hospital").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/amenities/hospital.svg";
					$(".hospital").removeClass('change_color');
                }
			}
			if (this.id == "power")
			{
				if ($(".power_img").attr('src') == urlget+"/newimg/img/icons/power.svg")
                {
                    this.src = urlget+"/newimg/img/icons/power_.svg";
					$(".power").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/icons/power.svg";
					$(".power").removeClass('change_color');
                }
			}
			if (this.id == "wifi")
			{
				if ($(".wifi_img").attr('src') == urlget+"/newimg/img/icons/wifi.svg")
                {
                    this.src = urlget+"/newimg/img/icons/wifi_.svg";
					$(".wifi").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/icons/wifi.svg";
					$(".wifi").removeClass('change_color');
                }
			}
			if (this.id == "lift")
			{
				if ($(".lift_img").attr('src') == urlget+"/newimg/img/icons/lift.svg")
                {
                    this.src = urlget+"/newimg/img/icons/lift_.svg";
					$(".lift").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/icons/lift.svg";
					$(".lift").removeClass('change_color');
                }
			}
			if (this.id == "gaurd")
			{
				if ($(".gaurd_img").attr('src') == urlget+"/newimg/img/icons/gaurd.svg")
                {
                    this.src = urlget+"/newimg/img/icons/gaurd_.svg";
					$(".gaurd").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/icons/gaurd.svg";
					$(".gaurd").removeClass('change_color');
                }
			}
			if (this.id == "alarm")
			{
				if ($(".alarm_img").attr('src') == urlget+"/newimg/img/icons/alarm.svg")
                {
                    this.src = urlget+"/newimg/img/icons/alarm_.svg";
					$(".alarm").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/icons/alarm.svg";
					$(".alarm").removeClass('change_color');
                }
			}
			if (this.id == "camera")
			{
				if ($(".camera_img").attr('src') == urlget+"/newimg/img/icons/security.svg")
                {
                    this.src = urlget+"/newimg/img/icons/security_.svg";
					$(".camera").addClass('change_color');
                }
                else
                {
                    this.src = urlget+"/newimg/img/icons/security.svg";
					$(".camera").removeClass('change_color');
                }
			}
			
		
			
			
			
		});
		




</script>
 <script>

 $(window).scroll(function() {
   if($(this).scrollTop()>5) {
       $( ".navbar-me" ).addClass("fixed-me");
   } else {
       $( ".navbar-me" ).removeClass("fixed-me");
   }
});
/* Set the width of the side navigation to 250px */
function openNav() {
 document.getElementById("mySidenav").style.width = "100%";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
 document.getElementById("mySidenav").style.width = "0";
}
 </script>



 <script>

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
    zoom: 15,
    center: latlng
}
map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

var searchTextField = $('#searchTextField').val();
if(searchTextField !=''){

 var latu = '28.4595';
 var longu = '77.0266';
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
                url: 'addproperty/setbrandcountb',
                data: {kuli: 'luci'},
                success: function (data) {

 if(data == '' ) {
                  
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

               
              if(totalcount > 10 ){

                $('#totalcounts').html(totalcount);

              }else{
                var num = Math.floor(Math.random() * (30 - 11)) + 11;
                $('#totalcounts').html(num);
              }
				
               // $('#totalcounts1').html(totalcount);

                // swal({
                //                                        title: "Your property lies under "+ totalcount+" search shapes" ,
                //                                        text: "",
                //                                        icon: "success",
                //                                        //confirmButtonColor: "#DD6B55",
                //                                         //buttons: ["Not Visited!", "Visited!"],
                //                                        buttons: {
                //                                        cancel: "Close",
                                                       
                //                                        },
                //                                       // dangerMode: true,
                //                                        })

             }else{
                    var num = Math.floor(Math.random() * (30 - 11)) + 11;
                    $('#totalcounts').html(num);
         }
         
           },
            });
   }



     function getmap(val) {
        var marker = '';
        var position = '';
        geocoder.geocode({'address': val}, function (results, status) {
            if (status == 'OK') {
				//alert(results[0].geometry.location);
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

    



   function initialize() {

geocoder = new google.maps.Geocoder();
var latlng = new google.maps.LatLng(28.4595, 77.0266);
var mapOptions = {
    zoom: 14,
    center: latlng
}
map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

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

        //  console.log(place.geometry.viewport);
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
        map.setZoom(16); 
    }




});

var propcity = 'Gurugram';

$(".property_image1").click(function () {

$('html,body').animate({
scrollTop: $(".locality_input").offset().top - 100},
'slow');   
});

$('.property_image1').click(function(){

propcity = this.id;

$('#searchTextField').val('');
$('#propcity').val(propcity);
});

$(input).on('input', function () {


var str = input.value;
prefix = propcity + ', ';
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



//google.maps.event.addDomListener(window, 'load', init);

google.maps.event.addDomListener(window, 'load', initialize);
	


 </script>