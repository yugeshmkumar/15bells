<?php

use yii\bootstrap\ActiveForm;
use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;


?>
<style>
    #map_canvas {
        height: 430px;
    }
</style>    

<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/about.jpg';  ?>">
			
		<div class="container-fluid no_pad div_header">
		
			
			<div class="container" id="banner_cont">
				<div class="col-md-10 col-md-offset-1 text-left single_blogpage about_bannr">
				<p class="about_det animated slideInDown col-md-7">Continue with listing your property at 15 Bells, we’ll get you verified buyers to sell your commercial property</p>
								<h1 class="single_hed col-md-12">Discover a commercial property you would love to buy. </h1>
								
				</div>
				
				
			</div>
			
			
<!-- end of navbar-->
		</div>
		<div class="container-fluid dot_div">
				<div class="absolute lines_main_container">
						<div class="lines_container">
							<div class="lines"></div>
							<div class="slide_lines"></div>
						</div>
						<div class="lines_container">
							<div class="lines"></div>
							<div class="slide_lines"></div>
						</div>
						<div class="lines_container">
							<div class="lines small_border"></div>
							<div class="slide_lines"></div>
						</div>
						<div class="lines_container small_hide">
							<span class="internal_line">&nbsp;</span>
							<div class="slide_lines"></div>
							<div class="lines"></div>
						</div>
						<div class="lines_container small_hide">
							<div class="lines"></div>
							<div class="slide_lines"></div>
						</div>
						<div class="lines_container small_hide">
							<div class="lines"></div>
							<div class="slide_lines"></div>
						</div>
				</div>
            </div>
		

			<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
			
	</section>

	<?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"/lesseeaction/viewpropertys"]); ?>

    <div class="container-fluid property_flow">
	<div class="container">
		<div class="row">
			<div class="col-md-6 no_pad">
				<h1 class="trans_head_b">Browse Property</h1>
				<p class="brand_txt">At 15-Bells we are providing you the genuine clients with real-time assistance from our customes service representatives </p>
			</div><div class="col-md-6"></div>
		</div>
		<div class="row">
			<div class="col-md-12 no_pad">
					<ul class="add_property nav nav-pills">
						<li class="active property_steps no_pad"><a data-toggle="pill" href="#home" class="categ_selec">Type of Property</a></li>
						<li class="property_steps no_pad"><a data-toggle="pill" href="#menu1" class="categ_selec">Property Location</a></li>
						<li class="property_steps no_pad"><a data-toggle="pill" href="#area_range" class="categ_selec">Area</a></li>
						<!-- <li class="property_steps no_pad"><a data-toggle="pill" href="#price_range" class="categ_selec">Price Range</a></li> -->
					</ul>
				<div class="tab-content">
				
				  <div id="home" class="tab-pane fade in active">	
					<div class="row property_type">
						<div class="col-md-12">
							<div class="col-md-3 col-xs-6 commer_office">
								<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/office.svg';  ?>" class="border_yellow property_image">
								<p class="property_name">Commercial Office</p>
							</div>
							<div class="col-md-3 col-xs-6 commer_retail">
								<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/retail.svg';  ?>" class="property_image">
								<p class="property_name">Commercial Retails</p>
							</div>
							<div class="col-md-3 col-xs-6 commer_land">
								<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/industrial.svg';  ?>" class="property_image">
								<p class="property_name">Industrial Land & <br>Plots</p>
							</div>
							<div class="col-md-3 col-xs-6 ware_house">
								<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/warehouse.svg';  ?>" class="property_image">
								<p class="property_name">Warehouse</p>
							</div>
						</div>
						
					
						<div class="row category_detail commercial_o">
							<h3 class="flow_heading">Choose your category</h3>
							<ul class="sub_categories">
								<li class="active"><a onclick="$('#click_t').trigger('click')" id="11" class="property_subtype proptype step_type">Commercial Office Space</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="12" class="property_subtype proptype step_type">IT / ITES / SEZ Park</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="13" class="property_subtype proptype step_type">Co-working/Business Center</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="14" class="property_subtype proptype step_type">Commercial SEZ</a></li>
							</ul>
							
						</div>
            <div class="row category_detail commercial_r">
							<h3 class="flow_heading">Choose your category</h3>
							<ul class="sub_categories">
								<li class="active"><a onclick="$('#click_t').trigger('click')" id="15" class="property_subtype proptype step_type">Mall/Retail Shop</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="16" class="property_subtype proptype step_type">Showrooms</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="17" class="property_subtype proptype step_type">High Street/ Society Shops</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="18" class="property_subtype proptype step_type">Food Court</a></li>
							</ul>
							
						</div>
						<div class="row category_detail industrial_land">
							<h3 class="flow_heading">Choose your category</h3>
							<ul class="sub_categories">
								<li class="active"><a onclick="$('#click_t').trigger('click')" id="19" class="property_subtype proptype step_type">Commercial land</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="22" class="property_subtype proptype step_type">Industrial / Factory land</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="23" class="property_subtype proptype step_type">Institutional/Hotel/School land</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="24" class="property_subtype proptype step_type">SEZ/IT/ITES land</a></li>
							</ul>
							
						</div>
						<div class="row category_detail warehouse">
							<h3 class="flow_heading">Choose your category</h3>
							<ul class="sub_categories">
								<li class="active"><a onclick="$('#click_t').trigger('click')" id="25" class="property_subtype proptype step_type">Shed</a></li>
								<li class=""><a onclick="$('#click_t').trigger('click')" id="26" class="property_subtype proptype step_type">Agriculture</a></li>
								
							</ul>
						</div>
            <input type="hidden" id="proptype" name="proptype">
						<div class="col-md-12 seperator_div">
						</div>
					</div>
          <p class="text-right process_continue"><a data-toggle="pill" href="#menu1" id="click_t" class="step_type step1"></a></p>
				  </div>
				  <div id="menu1" class="tab-pane fade">
						<div class="row property_type">
            <div class="col-md-12 text-center property_area">
								<div class="col-md-1"></div>
								<div class="col-md-2 col-xs-6">
									<img id="delhi" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/delhi.svg';  ?>" class="border_yellow1 property_image1">
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
									<p class="property_name">Gaziabad</p>
								</div>
								<div class="col-md-1"></div>
							</div>
              <input type="hidden" id="propcity" name="propcity">
							<div class="col-md-12 seperator_div">
						</div>
							<div class="col-md-12 property_locality">
								<div class="col-md-6 locality_input">
									<div class="row">
										<h3 class="flow_heading">Choose Locality</h3>
										<input  name="serachlocality" type="text" id="pac-input" class="form-control input_desgn" placeholder="Enter your locality">
									</div>
									
								</div>
								<div class="col-md-6 locality_input">
									<div class="row">
										<h3 class="flow_heading">Do you want to include nearby areas?</h3>
										<div class="btn-group btn-toggle btn_toggle"> 
											<button  type="button" class="btn button_togg btn-lg confirmbutton  active" value="yes">Yes</button>
											<button type="button" class="btn button_togg btn-lg confirmbutton" value="no">No</button>
										  </div>
									</div>
								</div>
							</div>
              <input type="hidden" id="propnearby" name="propnearby">
                        </div>
                        <div id="color-palette" style="display:none;"></div>                                    
                        <div id="curpos" style="display:none;"></div>
                        <div id="cursel" style="display:none;"></div>
                        
                      <button style="display:none;" id="search_map" class="btn btn-info out_srch" onclick="getpolymymap(),ga('send', 'event', 'Buyer Map Search Button', 'Buyer Map Search Button', 'Buyer Map Search Button','Buyer Map Search Button')" type="button">Search</button>
                       
						<p class="text-right process_continue"><a data-toggle="pill" href="#home" class="property_back step_locality"><i class="fa fa-angle-left"></i> Back </a>
            <!-- <a class="property_process" data-toggle="modal" data-target="#myModal">Continue 
            <i class="fa fa-angle-right"></i></a> -->
            
            </p>
				  </div>
				  <div id="area_range" class="tab-pane fade">
						<div class="row property_type">
							<div class="col-md-12 no_pad">
								<h3 class="flow_heading avail_ability">Choose an Area / Unit</h3>
								<!-- <ul class="sub_categories">
									<li class="active"><a href="javascript:void(0)" class="property_subtype square" id="sq_ft">Sq. Feet</a></li>
									<li class=""><a href="javascript:void(0)" class="property_subtype square" id="sq_yards">Sq. Yard</a></li>
									<li class=""><a href="javascript:void(0)" class="property_subtype square" id="sq_meter">Sq. Meter</a></li>
								</ul> -->
							</div>
             
							
							<!-- <div class="col-md-12 furnishing_stat">
								<div class="col-md-4 pad_left">
									<h3 class="flow_heading avail_ability">Minimum</h3>
									<div class="dropdown">
											<button name="propareamin" id="dLabel" class="dropdown-select selectminarea" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Select
											<span class="caret"></span>
											</button>
										  <ul class="dropdown-menu User_role area_minimum" aria-labelledby="dLabel">
											<li>100</li>
											<li>200</li>
											<li>300</li>
											<li>400</li>
										
										  </ul>
									</div>
								</div>
                
								<div class="col-md-4 pad_right">
									<h3 class="flow_heading avail_ability">Maximum</h3>
									<div class="dropdown">
									  <button name="propareamax" id="dLabel1" class="dropdown-select1 selectmaxarea" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Select
										<span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu individual_drop area_maximum" aria-labelledby="dLabel1">
										<li>100</li>
										<li>200</li>
										<li>300</li>
										<li>400</li>
									
									  </ul>
									</div>
								</div> -->
							<!-- </div> -->
              <div class="col-md-12 locality_input">
									<div class="row">
                      <div class="col-md-2">
                      <select id="propsquare" class="form-control area_price">
                      <option value="sq_ft">Sq. Feet</option>
                      <option value="sq_yards">Sq. Yard</option>
                      <option value="sq_meter">Sq. Meter</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <input type="text" id="propareaminimum" class="form-control input_desgn" placeholder="Minimum" name="propareaminimum">
                    </div>
                    <div class="col-md-4">
                      <input type="text" id="propareamaximum" class="form-control input_desgn" placeholder="Maximum" name="propareamaximum">

                    </div>
                  </div>
               </div>

<div class="col-md-12 no_pad">
								<h3 class="flow_heading avail_ability">Choose a Price Range</h3>
							
                <div class="col-md-4">
                  <input type="text" class="form-control input_desgn" placeholder="Minimum" id="proppriceminimum" name="proppriceminimum">
                 </div>
                <div class="col-md-2">
                    <select id="propminrupees" class="form-control area_price">
                       <option value="lacs">Lacs</option>
                       <option value="crores">Crores</option>
                    </select>
                 </div>
                 <div class="col-md-4">
                    <input type="text" class="form-control input_desgn" placeholder="Maximum" id="proppricemaximum" name="proppricemaximum">
                 </div>
                 <div class="col-md-2">
                    <select id="propmaxrupees" class="form-control area_price">
                      <option value="lacs">Lacs</option>
                     <option value="crores">Crores</option>
                     </select>
                   </div>
								
							</div>






							
						</div>
						<p class="text-right process_continue">
            <a data-toggle="pill" href="#menu1" class="property_back step_area">
            <i class="fa fa-angle-left"></i> Back </a>
            
            <!-- <a data-toggle="pill" href="#price_range" class="property_process step_details">Continue 
            <i class="fa fa-angle-right"></i></a> -->

       <?= Html::submitButton('Continue <i class="fa fa-angle-right"></i>', ['id'=>'nextBtnrep','class' => 'property_process step_details']) ?>

            
            </p>
				   </div>
				   <div id="price_range" class="tab-pane fade">
						<div class="row property_type">
							<div class="col-md-12 no_pad pad_left">
								<h3 class="flow_heading avail_ability">Choose a Price Range</h3>
								<div class="col-md-4 pad_left">
									<h3 class="flow_heading avail_ability">Minimum</h3>
									<div class="dropdown">
											<button name="proppricemin" id="dLabel" class="dropdown-select selectminprice" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Select
											<span class="caret"></span>
											</button>
										  <ul class="dropdown-menu User_role price_minimum" aria-labelledby="dLabel">
                                          <li>50</li>
										<li>100</li>
										<li>150</li>
										<li>200</li>
                                        <li>250</li>
                                        <li>300</li>
										
										  </ul>
									</div>
								</div>
                <input type="hidden" id="proppriceminimum" name="proppriceminimum">
								<div class="col-md-4 pad_right">
									<h3 class="flow_heading avail_ability">Maximum</h3>
									<div class="dropdown">
									  <button name="proppricemax" id="dLabel1" class="dropdown-select1 selectmaxprice" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Select
										<span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu individual_drop price_maximum" aria-labelledby="dLabel1">
                                            <li>100</li>
                                            <li>150</li>
                                            <li>200</li>
                                            <li>250</li>
                                            <li>300</li>
                                            <li>350</li>
									
									  </ul>
									</div>
								</div>
							</div>
              <input type="hidden" id="proppricemaximum" name="proppricemaximum">
             
              <input type="hidden" id="newspaths" name="newspaths">
              <input type="hidden" id="shaped" name="shaped">
              <input type="hidden" id="centercoordinates" name="centercoordinates">
              <input type="hidden" id="totalradius" name="totalradius">
              <input type="hidden" id="northlat" name="northlat">
              <input type="hidden" id="southlat" name="southlat">
              <input type="hidden" id="northlng" name="northlng">
              <input type="hidden" id="southlng" name="southlng">
              <input type="hidden" id="locations" name="locations">
						</div>
						<p class="text-right process_continue"><a data-toggle="pill" href="#area_range" class="property_back step_area"><i class="fa fa-angle-left"></i> Back </a>
            <!-- <a data-toggle="pill" href="#property_details" class="property_process step_details">Continue <i class="fa fa-angle-right"></i></a> -->
            <?= Html::submitButton('Continue <i class="fa fa-angle-right"></i>', ['id'=>'nextBtnrep','class' => 'property_process step_details']) ?>

            </p>
				   </div>
				  
				</div>
			</div>
		</div>
	</div>
</div>

          <input type="hidden" id="town" name="town">
          <input type="hidden" id="sector" name="sector">
          <input type="hidden" id="country" name="country">
          <input type="hidden" id="searchlat" name="searchlat">
          <input type="hidden" id="searchlng" name="searchlng">

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


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content draw_map no_pad">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
		<div class="container-fluid no_pad">
			<div class="col-md-6 no_pad">
            <div id="map_canvas" ></div>
			</div>
			<div class="col-md-1 no_pad">
				<ul class="map_icons">
					<li class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/search.svg';  ?>" width="18"></li>
					<li class=""><img id="polyshape" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/edit.svg';  ?>" width="18"></li>
					<li class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/hand-cursor.svg';  ?>" width="18"></li>
					<li class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/rect.svg';  ?>" id="rectangles" width="18"></li>
					<li class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/oval.svg';  ?>" id="circles" width="18"></li>
					<li class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/delete.svg';  ?>" id="delete-button" width="18"></li>
          <!-- <button  class="inactiveLink" id="delete-button">Delete <span id="shapedel">Shape </span></button> -->
        </ul>
			</div>
			<div class="col-md-5 mark_instruction">
				<h4 class="mark_map">Mark your area on the map</h4>
				<p class="map_text">Draw a shape on the map to select an area. Please mark your desired location area on the map to get the better results.</p>
				<p class=""><div class="btn-group btn-toggle btn_toggle"> 
											<button class="btn btn-lg" data-toggle="pill" href="#area_range" data-dismiss="modal">Skip</button>
											<button class="btn button_togg btn-lg active step_availablity" data-toggle="pill" href="#area_range" data-dismiss="modal">Confirm</button>
										  </div></p>
				
			</div>
		</div>
      </div>
      
    </div>

  </div>
</div>

				 <?php ActiveForm::end(); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&libraries=geometry,drawing,places"></script>


<?php 
$script = <<< JS

var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
var colorButtons = {};
var propcity = 'delhi';
var selectedShape;
var polyArray = [];
      var getpolyshapes ='';
      var northeast ='';
      var southwest ='';
      var centercoordinates ='';
      var totalradius ='';
      var pathstr ='';
      var northlat ='';
      var northlng;
      var southlat;
      var southlng;
      var centercord ='';
      var getsearchlocation;
      var infoWindow;
      var latt;
      var longg;
      var rectangle;
      var count1='';
      var count2='';
      var count3='';
      var newShape;

   $(document).ready(function () {

        $('.warehouse').hide();
    $('.industrial_land').hide();
    $('.commercial_r').hide();
    
		$(".property_image").click(function () {
			$(".property_image").removeClass("border_yellow");
			// $(".tab").addClass("active"); // instead of this do the below 
			$(this).addClass("border_yellow");   
		});

        $(".property_image1").click(function () {
			$(".property_image1").removeClass("border_yellow1");
			// $(".tab").addClass("active"); // instead of this do the below 
			$(this).addClass("border_yellow1");   
      $('html,body').animate({
        scrollTop: $(".property_locality").offset().top - 100},
        'slow');   
		});

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
      $('#proptype').val(propid);
    });

     $('.property_image1').click(function(){
       propcity = this.id;
       $('#pac-input').val('');
      $('#propcity').val(propcity);
    });

    $('.confirmbutton').click(function(){ 

       var locals =  $('#town').val();

if(locals !=''){
  $('#myModal').modal('show');

} else{
  alert('Please select any locality');
}
      
          var confirmvalue = $(this).val();          
          $('#propnearby').val(confirmvalue);
    });

    $('.square').click(function(){
        var squareclick = this.id;
        $('#propsquare').val(squareclick);
    })

   $('.step_type').click(function(e) {
       //$(.add_property)
       $('.add_property li:nth-child(2)').addClass("active");
       //$(".add_property li:nth-child(1)").removeClass("active");
       $('html,body').animate({
        scrollTop: $(".property_area").offset().top + 600},
        'slow');
   });
   $('.step_availablity').click(function(e) {
       //$(.add_property)
       $('.add_property li:nth-child(3)').addClass("active");
       //$(".add_property li:nth-child(2)").removeClass("active");
       $('html,body').animate({
        scrollTop: $("#home").offset().top + 750},
        'slow');
   });
   $('.step_locality').click(function(e) {
       //$(.add_property)
       $('.add_property li:nth-child(1)').addClass("active");
        $(".add_property li:nth-child(2)").removeClass("active");
   });
   $('.step_area').click(function(e) {
       //$(.add_property)
       $('.add_property li:nth-child(2)').addClass("active");
        $(".add_property li:nth-child(3)").removeClass("active");
   });
   $('.step_details').click(function(e) {
       //$(.add_property)
       $('.add_property li:nth-child(4)').addClass("active");
       //$(".add_property li:nth-child(3)").removeClass("active");
   });
   $(".testimonial_indicator li").click(function () {
   $(".testimonial_indicator li").removeClass("active");
   // $(".tab").addClass("active"); // instead of this do the below 
   $(this).addClass("active");   
});
   $('.prop_cat li a').click(function(e) {

       $('.prop_cat li.active').removeClass('active');

       var parent = $(this).parent();
       parent.addClass('active');
       e.preventDefault();
   });


   $('.area_minimum li').on('click', function() {
   var getValue = $(this).text();
  
   $('.selectminarea').text(getValue); 
   $('#propareaminimum').val(getValue);
});

$('.area_maximum li').on('click', function() {
 var getValue = $(this).text();
 $('.selectmaxarea').text(getValue);
 $('#propareamaximum').val(getValue);
});

$('.price_minimum li').on('click', function() {
 var getValue = $(this).text();
 $('.selectminprice').text(getValue);
 $('#proppriceminimum').val(getValue);
});

$('.price_maximum li').on('click', function() {
 var getValue = $(this).text();
 $('.selectmaxprice').text(getValue);
 $('#proppricemaximum').val(getValue);
});

      $('.step_availablity').click(function(){

                  var shaped =  getpolyshapes;
                  var newspaths = pathstr;                  
                  var locations  = $("#pac-input").val(); 

                  if(shaped == 'polygon'){
                               // ndata = {shaped:shaped,newspaths : newspaths,locations: locations}; 
                              // ndata = shaped +','+ newspaths +','+ locations;
                               $('#shaped').val(shaped);
                               $('#newspaths').val(newspaths);
                               $('#locations').val(locations);
                              }
                              if(shaped == 'circle'){
                                //ndata = shaped +','+centercoordinates+','+totalradius+','+locations; 
                                $('#shaped').val(shaped);
                               $('#centercoordinates').val(centercoordinates);
                               $('#totalradius').val(totalradius);
                               $('#locations').val(locations);
                              }

                              if(shaped == 'rectangle'){
                               // ndata = shaped +','+ northlat +','+ southlat +','+ northlng +','+ southlng +','+ locations;
                               $('#shaped').val(shaped);
                               $('#northlat').val(northlat);
                               $('#southlat').val(southlat);
                               $('#northlng').val(northlng);
                               $('#southlng').val(southlng);
                               $('#locations').val(locations);
                               
                              }
                              if(shaped == ''){
                               // ndata = shaped +','+ locations; 
                                $('#shaped').val(shaped);                              
                               $('#locations').val(locations);
                              }

                              


                             
      });



});



  $(document).ready(function(){
  $('.btn-toggle').click(function() {
   //alert();
   $(this).find('.btn').toggleClass('active');  
 
});
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




 var circle;
      var bermudaTriangle;

      function clearSelection() {
        if (selectedShape) {
          if (typeof selectedShape.setEditable == 'function') {
            selectedShape.setEditable(false);
          }
          selectedShape = null;
        }
        curseldiv.innerHTML = "<b>cursel</b>:";
      }

      function updateCurSelText(shape) {
          
           drawingManager.setMap(null);
          
        posstr = "" + selectedShape.position;
        if (typeof selectedShape.position == 'object') {
          
          posstr = selectedShape.position.toUrlValue();
        }
       
        pathstr = "" + selectedShape.getPath;
        if (typeof selectedShape.getPath == 'function') {
          pathstr = "[ ";
          for (var i = 0; i < selectedShape.getPath().getLength(); i++) {
              
              var newstring = selectedShape.getPath().getAt(i).toUrlValue(6);
             
              // console.log(newstring);
              var newarray = newstring.split(',');
              polyArray.push(selectedShape.getPath());
               
               // .toUrlValue(5) limits number of decimals, default is 6 but can do more
               pathstr += '{ "lat" : '+selectedShape.getPath().getAt(i).lat() + ', "lng" : '+ selectedShape.getPath().getAt(i).lng() + "}"+" , ";
          }
          pathstr += "]";
          pathstr.trim();           
            var commanum = pathstr.lastIndexOf(",");
           var  part1 = pathstr.substring(0, commanum);
            var part2 = pathstr.substring(commanum + 1, pathstr.length);
            
            pathstr = part1 + part2;
        }
        
        getpolyshapes  =  selectedShape.type;
        bndstr = "" + selectedShape.getBounds;
        cntstr = "" + selectedShape.getBounds;
        if (typeof selectedShape.getBounds == 'function') {
          var tmpbounds = selectedShape.getBounds();
          cntstr = "" + tmpbounds.getCenter().toUrlValue();
          
          centercord = tmpbounds.getCenter().toUrlValue();
          northeast = tmpbounds.getNorthEast().toUrlValue();
          southwest = tmpbounds.getSouthWest().toUrlValue();
          northlat = tmpbounds.getNorthEast().lat();
          northlng = tmpbounds.getNorthEast().lng();
          southlat = tmpbounds.getSouthWest().lat();
          southlng = tmpbounds.getSouthWest().lng();
         
          bndstr = "[NE: " + tmpbounds.getNorthEast().toUrlValue() + " SW: " + tmpbounds.getSouthWest().toUrlValue() + "]";
        }
         
        cntrstr = "" + selectedShape.getCenter;
        if (typeof selectedShape.getCenter == 'function') {
          cntrstr = "" + selectedShape.getCenter().toUrlValue();
          centercoordinates = selectedShape.getCenter().toUrlValue();
                latt = selectedShape.getCenter().lat();
                 longg = selectedShape.getCenter().lng();
        }
        
//        
       
        
        radstr = "" + selectedShape.getRadius;
        if (typeof selectedShape.getRadius == 'function') {
          radstr = "" + selectedShape.getRadius();
        }
        
        
       totalradius = selectedShape.getRadius();
        curseldiv.innerHTML = "<b>cursel</b>: " + selectedShape.type + " " + selectedShape + "; <i>pos</i>: " + posstr + " ; <i>path</i>: " + pathstr + " ; <i>bounds</i>: " + bndstr + " ; <i>Cb</i>: " + cntstr + " ; <i>radius</i>: " + radstr + " ; <i>Cr</i>: " + cntrstr ;
      
         
      }


      function setSelection(shape, isNotMarker) {
        
      //  $('#shapedel').text('');
         //$('#shapedel').text(shape.type);
        //  if(shape.type == 'circle'){
            
        //   $('#shapedel').text('Circle');  
        // }else if(shape.type == 'polygon'){
            
        //   $('#shapedel').text('Polygon');  
        // }else if(shape.type == 'polyline'){
            
        //   $('#shapedel').text('Polyline');  
        // }else{
            
        //   $('#shapedel').text('Rectangle');  
        // }
        //  $('#delete-button').removeClass("inactiveLink");
         
       alert(shape);
        clearSelection();
        selectedShape = shape;
        if (isNotMarker)
          shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
        updateCurSelText(shape);
         
       
      }

      function deleteSelectedShape() {
          // $('#delete-button').addClass("inactiveLink");
          $('#shapedel').text('Shape');
          getpolyshapes = '';
          if (selectedShape) {
           
           
      drawingManager.setMap(map);
      selectedShape.setMap(null); 
         
    }else{
     
       $('#newsearches').css("display", "none");
       $('#searches').css("display", "block");
        if(circle){
          
            circle.setMap(null);
        }else if(bermudaTriangle){
            bermudaTriangle.setMap(null);
        }else if(rectangle){
            rectangle.setMap(null);
        }
   
    
    
    drawingManager.setMap(map);
    }
      }

      function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
          var currColor = colors[i];
          colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.
        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);

        var rectangleOptions = drawingManager.get('rectangleOptions');
        rectangleOptions.fillColor = color;
        drawingManager.set('rectangleOptions', rectangleOptions);

        var circleOptions = drawingManager.get('circleOptions');
        circleOptions.fillColor = color;
        drawingManager.set('circleOptions', circleOptions);

        var polygonOptions = drawingManager.get('polygonOptions');
        polygonOptions.fillColor = color;
        drawingManager.set('polygonOptions', polygonOptions);
      }

      function setSelectedShapeColor(color) {
        if (selectedShape) {
          if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
            selectedShape.set('strokeColor', color);
          } else {
            selectedShape.set('fillColor', color);
          }
        }
      }

      function makeColorButton(color) {
        var button = document.createElement('span');
        button.className = 'color-button abcd';
        button.style.backgroundColor = color;
        google.maps.event.addDomListener(button, 'click', function() {
          selectColor(color);
          setSelectedShapeColor(color);
        });

        return button;
      }

       function buildColorPalette() {
         counter=0;
         
         var colorPalette = document.getElementById('color-palette');
         $("#color-palette").html('');
         if(counter<=0){
         for (var i = 0; i < colors.length; ++i) {
           var currColor = colors[i];
           var colorButton = makeColorButton(currColor);
           colorPalette.appendChild(colorButton);
           colorButtons[currColor] = colorButton;
         }
 }
         selectColor(colors[0]);
       }

      /////////////////////////////////////
      var map; //= new google.maps.Map(document.getElementById('map'), {
      var mapf; //= new google.maps.Map(document.getElementById('map'), {
      // these must have global refs too!:
      var placeMarkers = [];
      var input;
      var searchBox;
      var curposdiv;
      var curseldiv;

		var globalvar = '';

		function getcity(val) {
			
		$('#pac-input').val('');
		globalvar = val;

		}

		

      function deletePlacesSearchResults() {
        for (var i = 0, marker; marker = placeMarkers[i]; i++) {
          marker.setMap(null);
        }
        placeMarkers = [];
        input.value = ''; // clear the box too
      }
      
      

      /////////////////////////////////////
      function initialize() {
		
        $('#delete-button').removeClass("inactiveLink");
       $('#delete-button').addClass("activeLink");
       //$('.gmnoprint').children().eq(0).addClass("hideme");
        map = new google.maps.Map(document.getElementById('map_canvas'), { //var
          zoom: 15,//10,
          center: new google.maps.LatLng(28.4595,77.0266),//(22.344, 114.048),
          mapTypeId: google.maps.MapTypeId.ROADMAP
         
        });
        curposdiv = document.getElementById('curpos');
        curseldiv = document.getElementById('cursel');





        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
        drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.POLYGON,
          
          drawingControlOptions: {
              
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['circle', 'polygon', 'rectangle']
          },
          markerOptions: {
            draggable: true,
            editable: true,
          },
          polylineOptions: {
            editable: true
          },
          rectangleOptions: polyOptions,
          circleOptions: polyOptions,
          polygonOptions: polyOptions,
          map: map
        });

       $("#polyshape").click( function(){
      
      drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON);
       });

       $("#rectangles").click( function(){
      
      drawingManager.setDrawingMode(google.maps.drawing.OverlayType.RECTANGLE);
       });

       $("#circles").click( function(){
      
      drawingManager.setDrawingMode(google.maps.drawing.OverlayType.CIRCLE);
       });
        
        

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
         
			
          //~ if (e.type != google.maps.drawing.OverlayType.MARKER) {
            var isNotMarker = (e.type != google.maps.drawing.OverlayType.MARKER);
            // Switch back to non-drawing mode after drawing a shape.
            drawingManager.setDrawingMode(null);

            // Add an event listener that selects the newly-drawn shape when the user
            // mouses down on it.
             newShape = e.overlay;
            newShape.type = e.type;
            google.maps.event.addListener(newShape, 'click', function() {
              setSelection(newShape, isNotMarker);
            });
            google.maps.event.addListener(newShape, 'drag', function() {
              updateCurSelText(newShape);
            });
            google.maps.event.addListener(newShape, 'dragend', function() {
              updateCurSelText(newShape);
            });
            setSelection(newShape, isNotMarker);
          //~ }// end if
        });
		

        // Clear the current selection when the drawing mode is changed, or when the
        // map is clicked.
        google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
        google.maps.event.addListener(map, 'click', clearSelection);
        google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

        buildColorPalette();
		
        //~ initSearch();
        // Create the search box and link it to the UI element.
        
		 input = /** @type {HTMLInputElement} */( //var
             document.getElementById('pac-input'));
		
       // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        //
        var DelPlcButDiv = document.createElement('div');
        //var controlWrapper = document.createElement('div'); 
        //controlWrapper.setAttribute("id", "nyadiv");
        //controlWrapper.innerHTML = "Select Shape";
        //~ DelPlcButDiv.style.color = 'rgb(25,25,25)'; // no effect?
       // DelPlcButDiv.style.backgroundColor = '#fff';
       // DelPlcButDiv.style.cursor = 'pointer';
       // DelPlcButDiv.innerHTML = 'DEL';
       // controlWrapper.index = 1;   
      // map.controls[google.maps.ControlPosition.TOP_CENTER].push(controlWrapper);
        
      //  controlWrapper.style.backgroundColor = 'white';
      //  controlWrapper.style.margin = '50px';
       // controlWrapper.style.cursor = 'pointer';
       // controlWrapper.style.textAlign = 'center';
       // controlWrapper.style.width = '120px'; 
      //  controlWrapper.style.height = 'auto'; 
      //  controlWrapper.style.left = '266px'; 
       // controlWrapper.style.top = '-44px'; 
       // controlWrapper.style.padding = '5px 6px 5px 3px'; 
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(DelPlcButDiv);
        google.maps.event.addDomListener(DelPlcButDiv, 'click', deletePlacesSearchResults);

          searchBox = new google.maps.places.SearchBox( (input));
		  

        // Listen for the event fired when the user selects an item from the
        // pick list. Retrieve the matching places for that item.
        var searchlat = ""; var searchlng = "";
        google.maps.event.addListener(searchBox, 'places_changed', function() {

          
            
          $('#town').val('');   
          $('#sector').val('');  
          var places = searchBox.getPlaces();
          
          searchlat = places[0].geometry.location.lat();
          searchlng = places[0].geometry.location.lng();
          $('#searchlat').val(searchlat);
          $('#searchlng').val(searchlng);
          
          var arrAddress = places[0].address_components;
                                      // console.log(places[0].address_components);

            $.each(arrAddress, function (i, address_component) {
           // console.log('address_component:'+i);

            if (address_component.types[0] == "route"){
             //console.log(i+": route:"+address_component.long_name);
            itemRoute = address_component.long_name;
            }

            if (address_component.types[0] == "locality"){
            // console.log("town:"+address_component.long_name);       
            itemLocality = address_component.long_name;       
            $('#town').val(itemLocality);
            }
            if (address_component.types[0] == "sublocality_level_1"){
            // console.log("province:"+address_component.long_name);
            itemSectorf = address_component.long_name;
            $('#sector').val(itemSectorf);

            }

            if (address_component.types[0] == "country"){ 
             //console.log("country:"+address_component.long_name); 
            itemCountry = address_component.long_name;
            $('#country').val(itemCountry);
            }

            if (address_component.types[0] == "postal_code_prefix"){ 
           //  console.log("pc:"+address_component.long_name);  
            itemPc = address_component.long_name;
            }

            if (address_component.types[0] == "street_number"){ 
            // console.log("street_number:"+address_component.long_name);  
            itemSnumber = address_component.long_name;
            }
            //return false; // break the loop   
            });

          if (places.length == 0) {
            return;
          }
          for (var i = 0, marker; marker = placeMarkers[i]; i++) {
            marker.setMap(null);
          }

          // For each place, get the icon, place name, and location.
          placeMarkers = [];
          var bounds = new google.maps.LatLngBounds();
          for (var i = 0, place; place = places[i]; i++) {
            var image = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
              
            };

            // Create a marker for each place.
            var marker = new google.maps.Marker({
              map: map,
              icon: image,
              title: place.name,
              position: place.geometry.location
            });

            placeMarkers.push(marker);

            bounds.extend(place.geometry.location);
          }

          map.fitBounds(bounds);
          map.setZoom(16); 
          map.setOptions({ minZoom: 5, maxZoom: 22 });
        });

        // Bias the SearchBox results towards places that are within the bounds of the
        // current map's viewport.
        google.maps.event.addListener(map, 'bounds_changed', function() {
          var bounds = map.getBounds();
          searchBox.setBounds(bounds);
          curposdiv.innerHTML = "<b>curpos</b> Z: " + map.getZoom() + " C: " + map.getCenter().toUrlValue();
        }); //////////////////////
        
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
      
      
      google.maps.event.addDomListener(window, 'load', initialize);

JS;
$this->registerJs($script);
?>  