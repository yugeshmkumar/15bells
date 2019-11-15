<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\MediaFilesConfig;
use common\models\MediaFiles;

/* @var $this yii\web\View */
/* @var $model common\models\Addproperty */

$this->title = $model->locality;
$this->params['breadcrumbs'][] = ['label' => 'Addproperties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



?>
<style>

    .navbar-me{
        background:#221d36 !important;
    }
	.view_property .item img{
		height:245px;
		margin:0 auto;
	}
	.view_property{
		height:245px;
	}
	</style>
<?php
$property = \common\models\Addproperty::find()->where(['id' => $viewid])->one();
$project_type_id = $property->project_type_id;
$property_type = \common\models\PropertyType::find()->where(['id' => $project_type_id])->one();
$userid = Yii::$app->user->identity->id;


$totalvisitors  = "SELECT count(*) as totalvisitor from user_view_properties where property_id= $viewid and active='1'";
$visitors = \Yii::$app->db->createCommand($totalvisitors)->queryAll();
$data=  $visitors[0]['totalvisitor'];

$totalshortlist  = "SELECT count(*) as totalshortlist from shortlistproperty where property_id= $viewid  and active='1'";
$shortlists = \Yii::$app->db->createCommand($totalshortlist)->queryAll();
$data1=  $shortlists[0]['totalshortlist'];

$totalsitevisit  = "SELECT count(*) as totalsitevisit from request_site_visit where property_id= $viewid";
$sitevisits = \Yii::$app->db->createCommand($totalsitevisit)->queryAll();
$data2=  $sitevisits[0]['totalsitevisit'];

$lessor_expectations  = "SELECT *  from lessor_expectations where property_id= $viewid and user_id=$userid and is_active='1'";
$expectations = \Yii::$app->db->createCommand($lessor_expectations)->queryOne();
//  echo '<pre>';print_r($lessor_expectations );die;
if($expectations){

    $lock_in_period = $expectations['lock_in_period'] != '' ? $expectations['lock_in_period'] : "____";
    $lease_tenure = $expectations['lease_tenure'] != '' ? $expectations['lease_tenure'] : "____";
     $rent_free_period = $expectations['rent_free_period'] != '' ? $expectations['rent_free_period'] : "____";
    //$lock_in_period = $expectations['lock_in_period'] != '' ? $expectations['lock_in_period'] : "";
}


$property_for = $property->property_for != '' ? $property->property_for : "____";
$locality = $property->locality != '' ? $property->locality : "____";
$price_acres = $property->price_acres != '' ? $property->price_acres : "____";
$request_for = $property->request_for != '' ? $property->request_for : "____";
$super_area = $property->super_area != '' ? $property->super_area : "____";
$super_unit = $property->super_unit != '' ? $property->super_unit : "____";
$featured_imaged = $property->featured_image != '' ? $property->featured_image : "____";
$expected_price = $property->expected_price != '' ? $property->expected_price : "";
                $annual_dues_payable = $property->annual_dues_payable != '' ? $property->annual_dues_payable : "____";
$city = $property->city != '' ? $property->city : "____";
$price_sq_ft = $property->price_sq_ft != '' ? $property->price_sq_ft : "____";
                $expected_rental = $property->asking_rental_price != '' ? $property->asking_rental_price : "____";
$price_negotiable = $property->price_negotiable != '' ? $property->price_negotiable : "____";
$expected_rental = $property->expected_rental != '' ? $property->expected_rental : "____";
$shed_RCC = $property->shed_RCC != '' ? $property->shed_RCC : "____";
                $possesion_by = $property->possesion_by != '' ? $property->possesion_by : "____";
                $revenue_lauout = $property->revenue_lauout != '' ? $property->revenue_lauout : "____";
                $maintenance_by = $property->maintenance_by != '' ? $property->maintenance_by : "____";
                $ownership = $property->ownership != '' ? $property->ownership : "____";
$present_status = $property->present_status != '' ? $property->present_status : "____";
                 $availability = $property->availability != '' ? $property->availability : "____";
               $facing = $property->facing != '' ? $property->facing : "____";
               $jurisdiction_development = $property->jurisdiction_development != '' ? $property->jurisdiction_development : "____";
              $age_of_property = $property->age_of_property != '' ? $property->age_of_property : "____";
              $FAR_approval = $property->FAR_approval != '' ? $property->FAR_approval : "____";
                 $LOAN_taken = $property->LOAN_taken != '' ? $property->LOAN_taken : "____";
        $property_on_floor = $property->property_on_floor != '' ? $property->property_on_floor : "____";
$parking = $property->parking != '' ? $property->parking : "____";
$buildup_area = $property->buildup_area != '' ? $property->buildup_area : "____";
$configuration = $property->configuration != '' ? $property->configuration : "____";
$carpet_area = $property->carpet_area != '' ? $property->carpet_area : "____";
$floors_allowed_construction = $property->floors_allowed_construction != '' ? $property->floors_allowed_construction : "____";
                $total_floors = $property->total_floors != '' ? $property->total_floors : "____";
                $furnished_status = $property->furnished_status != '' ? $property->furnished_status : "____";
$bedrooms = $property->bedrooms != '' ? $property->bedrooms : "____";
$bathrooms = $property->bathrooms != '' ? $property->bathrooms : "____";
$balconies = $property->balconies != '' ? $property->balconies : "____";
$pooja_room = $property->pooja_room != '' ? $property->pooja_room : "____";
$property_types = $property_type->typename != '' ? $property_type->typename : "____";
$undercategory = $property_type->undercategory;

?>


<div class="container-fluid property_flow" style="margin-top:100px;">
	<div class="container">
						
		<div class="row property_edit">
		<h3 class="flow_heading avail_ability" style="margin-bottom:25px;">Preview your property and confirm</h3>
			<div class="col-md-12 property_detail">
					<p class="property_id">Property ID : #2345DFGEQ
					
					</p>
					<div class="row single_property">
					
						<div class="col-md-4 no_pad">
							<div id="myCarousel" class="carousel slide view_property" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								</ol>

								<!-- Wrapper for slides -->

						<?php 
                        
						$mainimage = \common\models\Addproperty::find()->where(['id'=>$viewid])->one();
						
						if($mainimage->featured_image !=''){
							$featured_image = $mainimage->featured_image;
						   }else{
							 $featured_image = 'gallery9.jpg';  
						   }
						 ?> 
								<div class="carousel-inner">
									<div class="item active">
									<img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/'.$featured_image;  ?>" class="img-responsive">
									</div>
					<?php 
                      
					  $ids = [];
					  $pic = [];
					  $url = [];
					  $pictogramsID = MediaFilesConfig::find()->where(['property_id' => $viewid])->all();
					  foreach ($pictogramsID as $picID) {
					  $ids[] = $picID->media_id;
					  }
					  
					  $pictogramsID = MediaFiles::find()->where(['id' => $ids])->andWhere(['or',['type'=>'png'],['type'=>'jpeg'],['type'=>'jpg']])->all();
					  foreach ($pictogramsID as $picID) {
					  $pic[] = $picID->file_name;
					  }
					  
					  
					  if (empty($pic)) { ?> 

                                    <div class="item">
									<img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/gallery9.jpg';  ?>" class="img-responsive">
									</div>

									<?php } else{ 
                                
								foreach($pic as $pics){ ?>

								<div class="item">
									<img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/'.$pics;  ?>" class="img-responsive">
									</div>

									 <?php  }   }  ?>
									
								</div>

									<!-- Left and right controls -->
									<a class="left carousel-control" href="#myCarousel" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control" href="#myCarousel" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
								<div class="col-md-12 edit_images text-center">
								<a href="<?= Yii::$app->getUrlManager()->getBaseUrl() ."/addproperty/additional?s_id=$viewid";  ?>" class="property_back">Edit Images</a>
								<a href="javascript:void(0)" class="property_process prop_video">Property Video</a>
								</div>
						</div>
						<div class="col-md-8 ">
							<div class="row prop_location">
								<div class="col-md-5 col-xs-6 company_overview property_manage">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/building.svg';  ?>" width="16">Type of property</p>
									<p class="label_name"><?php echo $property_types; ?></p>
								</div>
								<div class="col-md-5 col-xs-6 company_overview property_manage">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/site-visit.svg';  ?>" width="16">Location</p>
									<p class="label_name"><?php echo $locality; ?></p>
								</div>
								<div class="col-md-2">
									<a href="javascript:void(0)" class="draw_map">Edit</a>
								</div>
								<div class="col-md-12 unit_details">
									<ul class="details_unit col-md-12">
										<li class="col-md-4">
										<p class="details_label">Units</p>
										<p class="details_name"><?php echo $super_unit; ?></p>
										</li>
										<li class="col-md-4">
										<p class="details_label">Area</p>
										<p class="details_name"><?php echo $super_area; ?></p>
										</li>
										<li class="col-md-4">
										<p class="details_label">Price</p>
										<p class="details_name"><?php echo $expected_price; ?></p>
										</li>
										
										
									</ul>
									<ul class="visitors_detail col-md-12">
										<li class="visitors col-md-4">
										<p class="details_label">Visitors</p>
										<p class="details_name"><?php echo $data; ?></p>
										</li>
										<li class="site_visit col-md-4">
										<p class="details_label">Site Visit</p>
										<p class="details_name"><?php echo $data2; ?></p>
										</li>
										<li class="short_lists col-md-4">
										<p class="details_label">Shortlisted</p>
										<p class="details_name"><?php echo $data1; ?></p>
										</li>
										
										
									</ul>
								</div>
								<div class="col-md-12 progress_bar">
									<p class="text-left process_continue">
                                    <a href="javascript:void(0)" onclick="requestfor('Instant')" class="<?php echo ($request_for == 'Instant' ? 'property_process' : 'property_back step_locality') ?>">Instant</a>
                                    <a href="javascript:void(0)" onclick="requestfor('bid')" class="<?php echo ($request_for == 'bid' ? 'property_process' : 'property_back step_locality') ?>">Auction </a>
                                    <input type="hidden" id="requestforclick">
                                    </p>
									
								</div>
										
							</div>
						</div>
					</div>
			</div>
			
			<div class="col-md-12">
				<div class="col-md-9 no_pad">
					<div class="row possession_time">
						<h3 class="flow_heading avail_ability">Property Details<a href="javascript:void(0)" class="text-right edit_button draw_map">Edit</a></h3>
						<div class="row">
						<div class="col-md-4 col-xs-6 edit_input">
							<label class="edit_label">Ownership Deeds</label>
							<input type="text" id="ownerships" class="form-control input_desgn myInput" value="<?php echo $ownership; ?>" placeholder="" readonly>
						</div>
						<div class="col-md-4 col-xs-6 edit_input">
							<label class="edit_label">Total floor</label>
							<input type="text" id="totalfloors" class="form-control input_desgn myInput" value="<?php echo $total_floors; ?>"  readonly>
						</div>
						<div class="col-md-4 col-xs-6 edit_input">
							<label class="edit_label">Property on floor</label>
							<input type="text" id="prop_floors" class="form-control input_desgn myInput" value="<?php echo $property_on_floor; ?>" placeholder="" readonly>
						</div>
						</div>
						<div class="row">
						<div class="col-md-4 col-xs-6 edit_input">
							<label class="edit_label">Age of Property</label>
							<input type="text" id="age_of_property" class="form-control input_desgn myInput" value="<?php echo $age_of_property; ?>" placeholder="" readonly>
						</div>
						<div class="col-md-4 col-xs-6 edit_input">
							<label class="edit_label">Facing</label>
							<input type="text" id="facings" class="form-control input_desgn myInput" value="<?php echo $facing; ?>" placeholder="" readonly>
						</div>
						<div class="col-md-4 col-xs-6 edit_input">
							<label class="edit_label">Annual Dues</label>
							<input type="text" id="annual_dues" class="form-control input_desgn myInput" value="<?php echo $annual_dues_payable; ?>" placeholder="" readonly>
						</div>
						</div>
						<div class="row">
						<div class="col-md-4 col-xs-6 edit_input">
							<label class="edit_label">Far Approved</label>
							<input type="text" id="far_approveds" class="form-control input_desgn myInput" value="<?php echo $FAR_approval; ?>" placeholder="" readonly>
						</div>
						<div class="col-md-4 col-xs-6 edit_input">
							<label class="edit_label">Maintained By</label>
							<input type="text" id="maintained_by" class="form-control input_desgn myInput" value="<?php echo $maintenance_by; ?>" placeholder="" readonly>
						</div>
						<div class="col-md-4 col-xs-6 edit_input">
							<label class="edit_label">Loan</label>

							<select class="form-control input_desgn myInput select_loan" id="loan_taken" >
							
							<option <?php if ($LOAN_taken == 'yes' ) echo 'selected' ; ?> value="yes">Yes</option>
							<option <?php if ($LOAN_taken == 'no' ) echo 'selected' ; ?>  value="no">No </option>
							
							</select>
							<!-- <input type="text" id="loan_taken" class="form-control input_desgn myInput" value="<?php echo $LOAN_taken; ?>" placeholder="" readonly> -->
						</div>
						</div>
						<div class="row">
					
						<div class="col-md-6 col-xs-6 edit_input">
							<label class="edit_label">Juridiction of Development</label>
							<input type="text" id="jurisdiction" class="form-control input_desgn myInput" value="<?php echo $jurisdiction_development; ?>" placeholder="" readonly>
						</div>
						</div>
					</div>
					<div class="col-md-12 seperator_div"></div>
					<div class="row possession_time">
						<h3 class="flow_heading avail_ability">Availability<a href="javascript:void(0)" class="text-right available_edit draw_map">Edit</a></h3>
						<div class="row">
							<div class="col-md-4 col-xs-6 edit_input">
								<label class="edit_label">Availability</label>
								<input type="text" id="availabilits" class="form-control input_desgn avail_input" value="<?php echo ucfirst(str_replace('_',' ',$availability)); ?>" placeholder="" readonly>
							</div>
							<div class="col-md-4 col-xs-6 edit_input">
								<label class="edit_label">Furnishing Status</label>
								<input type="text" id="furnishings" class="form-control input_desgn avail_input" value="<?php echo $furnished_status; ?>" placeholder="" readonly>
							</div>
							<div class="col-md-4 col-xs-6 edit_input">
								<label class="edit_label">Possession</label>
								<input type="text" id="possesions" class="form-control input_desgn avail_input" value="<?php echo $possesion_by; ?>" placeholder="" readonly>
							</div>
						</div>
						
					</div>
                    
					<div class="col-md-12 seperator_div"></div>
					<!-- <div class="row possession_time">
						<h3 class="flow_heading avail_ability">Expectations<a href="javascript:void(0)" class="text-right exp_edit draw_map">Edit</a></h3>
						<div class="row">
							<div class="col-md-4 edit_input">
								<label class="edit_label">Lock In Period</label>
								<input type="text" id="lock_in_periods" class="form-control input_desgn exp_input" value="<?php echo $lock_in_period; ?>" placeholder="" readonly>
							</div>
							<div class="col-md-4 edit_input">
								<label class="edit_label">Lease Tenure</label>
								<input type="text" id="lease_tenures" class="form-control input_desgn exp_input" value="<?php echo $lease_tenure; ?>" placeholder="" readonly>
							</div>
							<div class="col-md-4 edit_input">
								<label class="edit_label">Rent Free Period</label>
								<input type="text" id="rent_free_periods" class="form-control input_desgn exp_input" value="<?php echo $rent_free_period; ?>" placeholder="" readonly>
							</div>
							 <div class="col-md-4 edit_input">
								<label class="edit_label">Interior Details</label>
								<input type="text" class="form-control input_desgn exp_input" value="<?php echo $data1; ?>" placeholder="" readonly>
							</div> -->
						<!-- </div>
						
					</div>
					<div class="col-md-12 seperator_div"></div> --> 
					<div class="row possession_time">
						<h3 class="flow_heading avail_ability">Nearby Places<a href="javascript:void(0)" class="text-right exp_edit draw_map"></a></h3>
						<div class="row">
							
							<div class="col-md-12 col-xs-6 text-left padd_amen">
									<div class="col-md-3 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/bus.svg';  ?>" class="img_input bus_img" id="bus" width="22" />
										<span class="amenity_prop bus" id="bus">Bus</span>
									</div>
									<div class="col-md-3 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/metro.svg';  ?>" class="img_input metro_img" id="metro" width="24" />
										<span class="amenity_prop metro" id="metro">Metro</span>
									</div>
									<div class="col-md-3 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/train.svg';  ?>" class="img_input train_img" id="train" width="18" /><span class="amenity_prop train">Train</span>
									</div>
									<div class="col-md-3 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/cab.svg';  ?>" class="img_input cab_img" id="cab" width="20" /><span class="amenity_prop cab">Cab</span>
									</div>
								</div>
									<div class="col-md-12 col-xs-6 text-left padd_amen">
										<div class="col-md-3 amenities_icon">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/market.svg';  ?>" class="img_input market_img" id="market" width="24" /><span class="amenity_prop market">Market</span>
										</div>
										<div class="col-md-3 amenities_icon">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/atm.svg';  ?>" class="img_input atm_img" id="atm" width="20" /><span class="amenity_prop atm">ATM's</span>
										</div>
										<div class="col-md-3 amenities_icon">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/hospital.svg';  ?>" class="img_input hospital_img" id="hospital" width="20" /><span class="amenity_prop hospital">Hospitals</span>
										</div>
									</div>
						</div>
						<input type="hidden" id="nearbys">
						<input type="hidden" id="viewid" value="<?php echo $viewid; ?>">
					</div>
					<div class="col-md-12 seperator_div"></div>
					<div class="row possession_time">
						<h3 class="flow_heading avail_ability">Amenities<a href="javascript:void(0)" class="text-right exp_edit draw_map"></a></h3>
						<div class="row">
							
							<div class="col-md-12 col-xs-6 text-left padd_amen">
									<div class="col-md-4 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" id="power" class="img_input power_img" width="22" /><span class="amenity_prop power">Power Backup</span>
									</div>
									<div class="col-md-4 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" id="wifi" class="img_input wifi_img" width="24"/><span class="amenity_prop wifi">Wi-Fi</span>
									</div>
									<div class="col-md-4 amenities_icon">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" id="lift" class="img_input lift_img" width="18" /><span class="amenity_prop lift">Service Lift</span>
									</div>
									
								</div>
									<div class="col-md-12 col-xs-6 text-left padd_amen">
										<div class="col-md-4 amenities_icon">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/gaurd.svg';  ?>" class="img_input gaurd_img" id="gaurd" width="24" /><span class="amenity_prop gaurd">Security Personnal</span>
										</div>
										<div class="col-md-4 amenities_icon">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/alarm.svg';  ?>" class="img_input alarm_img" id="alarm" width="20" /><span class="amenity_prop alarm">Fire Alarm</span>
										</div>
										<div class="col-md-4 amenities_icon">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" id="camera" class="img_input camera_img" width="20" /><span class="amenity_prop camera">Security Camera</span>
										</div>
									</div>
									<input type="hidden" id="amenitiesicon">
						</div>


						
					</div>
                    <button id="publish" type="button" onclick="publishprop()" class="btn btn-success button_viewadd addi_butn">Save Your Property</button>
					<a href="<?php echo yii::$app->urlManager->createUrl(['site/userdash']) ?>" class="btn btn-success button_viewadd">Go to Dashboard</a>
				</div>
				<div class="col-md-3">

				</div>
			</div>
		</div>
		
	</div>
</div>


<div id="video_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content no_pad"  style="background:transparent;box-shadow:none;border:0;">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
	  
			<div class="container-fluid no_pad">
				<div class="col-md-12 text-center">
				<div class="center-block">
				<span>
				      
				<?php 
                        
					$mainvideo = \common\models\Addproperty::find()->where(['id'=>$viewid])->one();

					if($mainvideo->featured_video !=''){
					$featured_video = $mainvideo->featured_video;
					?>
			   <video style="width:100%;" controls loop  src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/'.$featured_video;  ?>"></video>
					<?php }else { ?>

				<img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/gallery10.jpg';  ?>" class="center-block img-responsive">
					
					<?php } ?>
				</span>
			</div>
					
				</div>
				
			</div> 
		</div>
      </div>      
    </div>
  </div>
  
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
 <script>
	
	$(document).ready(function(){
		$(".edit_button").click(function(){
		$(".myInput").removeAttr('readonly');
		$(".myInput").each(function() {

			if($(this).val() == '____'){
			    $(this).val('');
		}
		});


		});
		$(".available_edit").click(function(){
		$(".avail_input").removeAttr('readonly');
		$(".avail_input").each(function() {

		if($(this).val() == '____'){
		$(this).val('');
		}
		});
		});



		$(".exp_edit").click(function(){
		$(".exp_input").removeAttr('readonly');
		$(".exp_input").each(function() {

		if($(this).val() == '____'){
		$(this).val('');
		}
		    });
		});

		
		$(".prop_video").click(function(){
			$('#video_modal').modal('show');
		});
		
		var nearbythings = [];
		var amenitiesthings = [];

		$(".img_input").click(function(){
			
			if (this.id == "bus")
			{
				var index = nearbythings.indexOf(this.id);
				if (index > -1) {
					nearbythings.splice(index, 1);
				}else{
					nearbythings.push(this.id);
				}


				if ($(".bus_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/bus.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/bus_.svg';  ?>";
					$(".bus").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/bus.svg';  ?>";
					$(".bus").removeClass('change_color');
                }
			}
			if (this.id == "metro")
			{
				var index = nearbythings.indexOf(this.id);
				if (index > -1) {
					nearbythings.splice(index, 1);
				}else{
					nearbythings.push(this.id);
				}


				if ($(".metro_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/metro.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/metro_.svg';  ?>";
					$(".metro").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/metro.svg';  ?>";
					$(".metro").removeClass('change_color');
                }
			}
			if (this.id == "train")
			{
				var index = nearbythings.indexOf(this.id);
				if (index > -1) {
					nearbythings.splice(index, 1);
				}else{
					nearbythings.push(this.id);
				}


				if ($(".train_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/train.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/train_.svg';  ?>";
					$(".train").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/train.svg';  ?>";
					$(".train").removeClass('change_color');
                }
			}
			if (this.id == "cab")
			{
				var index = nearbythings.indexOf(this.id);
				if (index > -1) {
					nearbythings.splice(index, 1);
				}else{
					nearbythings.push(this.id);
				}


				if ($(".cab_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/cab.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/cab_.svg';  ?>";
					$(".cab").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/cab.svg';  ?>";
					$(".cab").removeClass('change_color');
                }
			}
			if (this.id == "market")
			{
				var index = nearbythings.indexOf(this.id);
				if (index > -1) {
					nearbythings.splice(index, 1);
				}else{
					nearbythings.push(this.id);
				}


				if ($(".market_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/market.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/market_.svg';  ?>";
					$(".market").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/market.svg';  ?>";
					$(".market").removeClass('change_color');
                }
			}
			if (this.id == "atm")
			{
				var index = nearbythings.indexOf(this.id);
				if (index > -1) {
					nearbythings.splice(index, 1);
				}else{
					nearbythings.push(this.id);
				}

				if ($(".atm_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/atm.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/atm_.svg';  ?>";
					$(".atm").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/atm.svg';  ?>";
					$(".atm").removeClass('change_color');
                }
			}
			if (this.id == "hospital")
			{
				
				var index = nearbythings.indexOf(this.id);
				if (index > -1) {
					nearbythings.splice(index, 1);
				}else{
					nearbythings.push(this.id);
				}

				if ($(".hospital_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/hospital.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/hospital_.svg';  ?>";
					$(".hospital").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/amenities/hospital.svg';  ?>";
					$(".hospital").removeClass('change_color');
                }
			}
			if (this.id == "power")
			{
				var index = amenitiesthings.indexOf(this.id);
				if (index > -1) {
					amenitiesthings.splice(index, 1);
				}else{
					amenitiesthings.push(this.id);
				}


				if ($(".power_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power_.svg';  ?>";
					$(".power").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>";
					$(".power").removeClass('change_color');
                }
			}
			if (this.id == "wifi")
			{
				var index = amenitiesthings.indexOf(this.id);
				if (index > -1) {
					amenitiesthings.splice(index, 1);
				}else{
					amenitiesthings.push(this.id);
				}


				if ($(".wifi_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi_.svg';  ?>";
					$(".wifi").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>";
					$(".wifi").removeClass('change_color');
                }
			}
			if (this.id == "lift")
			{
				var index = amenitiesthings.indexOf(this.id);
				if (index > -1) {
					amenitiesthings.splice(index, 1);
				}else{
					amenitiesthings.push(this.id);
				}


				if ($(".lift_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift_.svg';  ?>";
					$(".lift").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>";
					$(".lift").removeClass('change_color');
                }
			}
			if (this.id == "gaurd")
			{
				var index = amenitiesthings.indexOf(this.id);
				if (index > -1) {
					amenitiesthings.splice(index, 1);
				}else{
					amenitiesthings.push(this.id);
				}


				if ($(".gaurd_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/gaurd.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/gaurd_.svg';  ?>";
					$(".gaurd").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/gaurd.svg';  ?>";
					$(".gaurd").removeClass('change_color');
                }
			}
			if (this.id == "alarm")
			{
				var index = amenitiesthings.indexOf(this.id);
				if (index > -1) {
					amenitiesthings.splice(index, 1);
				}else{
					amenitiesthings.push(this.id);
				}

				if ($(".alarm_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/alarm.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/alarm_.svg';  ?>";
					$(".alarm").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/alarm.svg';  ?>";
					$(".alarm").removeClass('change_color');
                }
			}
			if (this.id == "camera")
			{
				
				var index = amenitiesthings.indexOf(this.id);
				if (index > -1) {
					amenitiesthings.splice(index, 1);
				}else{
					amenitiesthings.push(this.id);
				}
				
				if ($(".camera_img").attr('src') == "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>")
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security_.svg';  ?>";
					$(".camera").addClass('change_color');
                }
                else
                {
                    this.src = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>";
					$(".camera").removeClass('change_color');
                }
			}
			
		
				$('#nearbys').val(nearbythings);
				$('#amenitiesicon').val(amenitiesthings);
					
			
		});
		
		
		
	});
	

	                function requestfor(request){
		
 
                                          $('#requestforclick').val(request);

                                           }

				   function publishprop(){

					   var request_for =   $('#requestforclick').val();
					   var ownerships =   $('#ownerships').val();
					   var totalfloors =   $('#totalfloors').val();
					   var prop_floors =   $('#prop_floors').val();
					   var age_of_property =   $('#age_of_property').val();
					   var facings =   $('#facings').val();
					   var annual_dues =   $('#annual_dues').val();
					   var jurisdiction =   $('#jurisdiction').val();
					   var maintained_by =   $('#maintained_by').val();
					   var loan_taken =   $('#loan_taken').val();
					   var far_approveds =   $('#far_approveds').val();
					   var revenue_layouts =   $('#revenue_layouts').val();
					   var expected_rentals =   $('#expected_rentals').val();
					   var availabilits =   $('#availabilits').val();
					   var furnishings =   $('#furnishings').val();
					   var possesions =   $('#possesions').val();
					   var lock_in_periods =   $('#lock_in_periods').val();
					   var lease_tenures =   $('#lease_tenures').val();
					   var rent_free_periods =   $('#rent_free_periods').val();
					   var nearbys =   $('#nearbys').val();
					   var amenitiesicon =   $('#amenitiesicon').val();
					   var viewid =   $('#viewid').val();

					   var ndata = {viewid:viewid,request_for:request_for,ownerships:ownerships,totalfloors:totalfloors,prop_floors:prop_floors,age_of_property:age_of_property,
						facings:facings,annual_dues:annual_dues,jurisdiction:jurisdiction,maintained_by:maintained_by,loan_taken:loan_taken,
						far_approveds:far_approveds,revenue_layouts:revenue_layouts,expected_rentals:expected_rentals,availabilits:availabilits,
						furnishings:furnishings,possesions:possesions,lock_in_periods:lock_in_periods,lease_tenures:lease_tenures,rent_free_periods:rent_free_periods,
						nearbys:nearbys,amenitiesicon:amenitiesicon	   
					   };

					   $.ajax({

									type: "POST",
									url:  'savepropertydetails',
									data:ndata,
									success: function(data){
                                    // alert(data);

									// if(data == '1'){
									
									 toastr.success('Your property is going for reviewed', 'success');

									// }else{
									// toastr.error('Internal Error', 'error');
									// }


									},

                          });


				   }
	
	
 </script>