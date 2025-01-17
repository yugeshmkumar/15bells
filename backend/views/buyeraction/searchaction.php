<?php


use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\web\View;
use common\models\MyExpectationsajaxSearch;

// $this->title = 'Lessee Search';


$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
 $expectID = $_GET['e_id'];
$getSaveID = \common\models\SaveSearches::find()->where(['id' => $expectID])->orderBy([
    'id' => SORT_DESC,
])->limit(1)->one();


 
if($getSaveID->type == 'blank'){

    $getlocality = $getSaveID->location_name;
    $town = $getSaveID->town;
    $sector = $getSaveID->sector;
    $country = $getSaveID->country;
    $proptype = $getSaveID->property_type;
    $propbid = $getSaveID->property_auction_type;
    $type = $getSaveID->type;

    $propareaminimum = '';
    $propareamaximum = $getSaveID->area;
    $proppriceminimum = $getSaveID->min_prices;
    $proppricemaximum = $getSaveID->max_prices;
    $geometry = "0";
    
    
}else{

    $getlocality = $getSaveID->location_name;
    $town = $getSaveID->town;
    $sector = $getSaveID->sector;
    $country = $getSaveID->country;
    $proptype = $getSaveID->property_type;
    $propbid = $getSaveID->property_auction_type;
    $type = $getSaveID->type;

    $propareaminimum = 0;
    $propareamaximum = $getSaveID->area;
    $proppriceminimum = $getSaveID->min_prices;
    $proppricemaximum = $getSaveID->max_prices;

    if($type == 'polygon'){

        $geometry = $getSaveID->geometry;

    }else if($type == 'circle'){
        $geometry =$getSaveID->geometry;
        $radius =$getSaveID->radius;
        
    }
    else if($type == 'rectangle'){

        $geometry =$getSaveID->geometry;
       
       
    }
     
    $radius = $getSaveID->radius ? $getSaveID->radius : '';
}
          


?>

                                       
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&libraries=geometry,drawing,places"></script>
<style type="text/css" media="print">
    .gmnoprint { display:inline;left:270px !important;}
</style>

<style>

#map_canvas {
   height: 430px;
}
#map_canvasd {
    height: 600px;
}
.navbar-me{
    background:#221d36;

}


.pac-container { z-index: 100000; }
   
   </style>

   <input type="hidden" id="type" value="<?php if(isset($type)){echo $type;} ?>">
   <input type="hidden" id="proptypes" value="<?php  echo ($proptype != '' ? $proptype : ''); ?>">
   <input type="hidden" id="propbid" value="<?php  echo ($propbid != '' ? $propbid : 'Instant'); ?>">
   <input type="hidden" id="availabilitym" value="<?php  echo ($availabilitym != '' ? $availabilitym : ''); ?>">
   <input type="hidden" id="propcitys" value="<?php  echo ($propcity != '' ? $propcity : ''); ?>">
   <input type="hidden" id="serachlocalitys" value="<?php  echo ($serachlocality != '' ? $serachlocality : ''); ?>">
   <input type="hidden" id="propnearbys" value="<?php  echo ($propnearby != '' ? $propnearby : ''); ?>">
   <input type="hidden" id="propsquares" value="<?php  echo ($propsquare != '' ? $propsquare : ''); ?>">
   <input type="hidden" id="propareaminimums" value="<?php  echo ($propareaminimum != '' ? $propareaminimum : ''); ?>">
   <input type="hidden" id="propareamaximums" value="<?php  echo ($propareamaximum != '' ? $propareamaximum : ''); ?>">
   <input type="hidden" id="proppriceminimums" value="<?php  echo ($proppriceminimum != '' ? $proppriceminimum : ''); ?>">
   <input type="hidden" id="proppricemaximums" value="<?php  echo ($proppricemaximum != '' ? $proppricemaximum : ''); ?>">
   <input type="hidden" id="towns" value="<?php  echo ($town != '' ? $town : ''); ?>">
   <input type="hidden" id="sectors" value="<?php  echo ($sector != '' ? $sector : ''); ?>">
   <input type="hidden" id="countrys" value="<?php  echo ($country != '' ? $country : ''); ?>">
   <input type="hidden" id="searchlats" value="<?php  echo ($searchlat != '' ? $searchlat : ''); ?>">
   <input type="hidden" id="searchlngs" value="<?php  echo ($searchlng != '' ? $searchlng : ''); ?>">
   <input type="hidden" id="radius" value="<?php  echo ($radius != '' ? $radius : ''); ?>">

<div class="container-fluid no_pad">

<label class="col-md-6 check_box">Client Search
							  <input type="radio"  id="client_search" value="client"  name="example">
							  <span class="checkmark"></span>
							</label>
							<label class="col-md-6 check_box">Universal Search
							  <input type="radio" id="universal_search" value="universal" checked="checked" name="example">
							  <span class="checkmark"></span>
							</label>
</label>

</div>
   <div class="container-fluid no_pad buyer_result">
	<div class="row property_requirment text-center">
        
    <h2 class="result_text">We have found <span id="countprop"></span> results happen on your search criteria</h2>
                
    <?php
                                    $query = new Query;
                                    $query->select(['typename','id'])
                                            ->from('property_type')
                                            ->where(['id' => $proptype]);
                                    $command = $query->createCommand();
                                    $data = $command->queryOne();
                                  
                                    ?>  
		<ul class="users_search">
			<li class="user_filt locality_area"><span class="locality_areas"><?php echo ($town != '' ? $town.' '.$sector : 'Location'); ?></span><span><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/down.svg';  ?>" width="17"></li>
			<li class="user_filt prop_type"><span class="prop_types"><?php  echo ($data['typename'] != '' ? $data['typename'] : 'Property Type'); ?></span><span><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/down.svg';  ?>" width="17"></li>
			<li class="user_filt prop_area"><span class="prop_areas"><?php echo ($propareaminimum != '' ? $propareaminimum : 'Min Area'); ?> - <?php echo ($propareamaximum != '' ? $propareamaximum : 'Max Area'); ?> </span> Sq. ft.<span><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/down.svg';  ?>" width="17"></li>
			<li class="user_filt prop_price"><span class="prop_prices"><?php echo  ($proppriceminimum != '' ? $proppriceminimum : 'Min Price'); ?> - <?php echo ($proppricemaximum != '' ? $proppricemaximum : 'Max Price'); ?> </span> <i class="fa fa-inr"></i><span><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/down.svg';  ?>" width="17"></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-2 no_pad">
			
        <div class="col-md-12 filt_ers no_pad">
			
			<div class="row">
				
				<div class="accordion_container">
				  <div class="accordion_head buyer_drop">Sort By<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
					<div class="col-md-12 no_pad text-center">
                        <p class="sort_value">Price</p>
									<div class="active col-md-12 no_pad"><button id="low" class="filter_butn sortby">Low to High</button></div>
									<div class="col-md-12 no_pad"><button id="high" class="filter_butn sortby">High to Low</button></div>
                    </div>
                    <div class="col-md-12 no_pad text-center">
                    <p class="sort_value">Selling Status</p>
									<div class="active col-md-12 no_pad"><button id="Instant" class="filter_butn propsbid">Instant</button></div>
									<div class="col-md-12 no_pad"><button id="bid" class="filter_butn propsbid">Auction</button></div>
                                </div>
                                <div class="col-md-12 no_pad text-center">
                                <p class="sort_value">Availability</p>
									<div class="active col-md-12 no_pad"><button id="ready_to_move" class="filter_butn availabiltys">Ready to move in</button></div>
									<div class="col-md-12 no_pad"><button id="after_1_month" class="filter_butn availabiltys">After 1 month</button></div>
									<div class="col-md-12 no_pad"><button id="after_2_month" class="filter_butn availabiltys">After 2 month</button></div>
									<div class="col-md-12 no_pad"><button id="under_construction" class="filter_butn availabiltys">Under Const.</button></div>
								</div>
				  </div>
				  
				</div>
				

				
			</div>
		</div>
		</div>
		<div class="col-md-10 buyer_listing no_pad">
			<div class="row property_list">
                <div id="getprop">
				<!-- <div class="col-md-12 property_detail">
					<p class="property_id">Property ID : #2345DFGEQ</p>
					<div class="row single_property">
						<div class="col-md-3 no_pad relative">
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blurr.jpg';  ?>" class="img-responsive">
							<div class="overlay_sign">
								<p class="sign_click"><span class="color_orange">Login</span> or <span class="color_orange">Sign</span> up to view this property</p>
							</div>
						</div>
						<div class="col-md-9">
							<div class="row prop_detail">
								<div class="col-md-6 company_overview property_manage">
									<p class="label_name">Location</p>
									<p class="details_label">JMD Megapolis, Sector 48, Gurgaon 122018</p>
								</div>
								<div class="col-md-6 company_overview property_manage">
									<p class="label_name">Facing</p>
									<p class="details_label">East-West</p>
								</div>
							</div>	
							<div class="row prop_detail">	
								<div class="col-md-6 company_overview property_manage">
									<p class="label_name">Price</p>
									<p class="details_label">60 lac</p>
								</div>
								<div class="col-md-6 company_overview property_manage">
									<p class="label_name">Area</p>
									<p class="details_label">120000 Sq. ft.</p>
								</div>
							</div>
							<div class="row prop_detail">
								<div class="col-md-6 company_overview property_manage">
									<p class="label_name">Verified</p>
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/verified.svg';  ?>" width="16"> 15 Bells</p>
								</div>
								<div class="col-md-6 company_overview property_manage">
									<p class="label_name">Availability</p>
									<p class="details_label">Ready to move in</p>
								</div>
							</div>	
							</div>
						</div>
						<div class="row ameneties_section">
							<div class="col-md-6 amenities_offered">
								<p class="label_name amenities">Amenities</p>
								<ul class="amenities_list">
									<li class=""><img width="18" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amen_icon"></li>
									<li class=""><img width="17" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/fire.svg';  ?>" class="amen_icon"></li>
									<li class=""><img width="11" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amen_icon"></li>
									<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amen_icon"></li>
									<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amen_icon"></li>
									<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amen_icon"></li>
								</ul>
							</div>
							<div class="col-md-6 shortlist_call">
								<button class="btn btn-default call_butn back_call">Call</button><button class="btn btn-default short_butn">Shortlist</button>
							</div>
						</div>
				</div> -->
				
			
				</div>

                <div class="col-md-12 text-center">
                    <button class="btn btn-default load_mor" id="loadMore">Load More</button>
                    <input type="hidden" id="startlib" value="0">
                    <input type="hidden" id="lengthlib" value="20">
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
        <div class="accordion_container">
				  <div class="accordion_head buyer_drop location_hed">Location<span class="plusminus">+</span></div>
				  <div class="accordion_body location_body" style="display: none;">
					<div class="panel-body panel_body">
								<div class="col-md-12 no_pad text-center">
									<div class="col-md-6">
										<input type="text" id="pac-input" class="form-control input_desgn" placeholder="Search">
									</div>
									<div class="col-md-6 margin_draw text-left">
                                    <button class="map_butn edit_map">Draw shape on map</button>
										
									</div>
								</div>
							</div>
				  </div>
				  <div class="row seperator_div popup_seprator"></div>
				  <div class="accordion_head buyer_drop property_hed">Type of Property<span class="plusminus">+</span></div>
				  <div class="accordion_body property_body" style="display: none;">
					<div class="panel-body panel_body">
                            <div class="col-md-12">
                             
                            <ul class="sub_categories">
                                    <li class="<?php echo (($proptype =='11' || $proptype == '12'|| $proptype == '13'|| $proptype == '14') ? 'active' : ''); ?>commer_office"><a href="javascript:void(0)" class="property_subtype">Commercial Office</a></li>
                                    <li class="<?php echo (($proptype =='15' || $proptype == '16'|| $proptype == '17'|| $proptype == '18') ? 'active' : ''); ?> commer_retail"><a href="javascript:void(0)" class="property_subtype ">Commercial Retails</a></li>
                                    <li class="<?php echo (($proptype =='19' || $proptype == '22'|| $proptype == '23'|| $proptype == '24') ? 'active' : ''); ?> commer_land"><a href="javascript:void(0)" class="property_subtype ">Industrial Land & Plots</a></li>
                                    <li class="<?php echo (($proptype =='25' || $proptype == '26') ? 'active' : ''); ?> ware_house"><a href="javascript:void(0)" class="property_subtype ">Warehouse</a></li>
                                </ul>
                            </div>
                            
                            <div class="col-md-12 category_detail commercial_o">
                                <h3 class="flow_heading">Choose your category</h3>
                                <ul class="sub_categories">
                                    <li class="<?php echo ($proptype =='11' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="11" class="property_subtype proptype">Commercial Office Space</a></li>
                                    <li class="<?php echo ($proptype =='12' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="12" class="property_subtype proptype">IT / ITES / SEZ Park</a></li>
                                    <li class="<?php echo ($proptype =='13' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="13" class="property_subtype proptype">Co-working/Business Center</a></li>
                                    <li class="<?php echo ($proptype =='14' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="14" class="property_subtype proptype">Commercial SEZ</a></li>
                                </ul>
                                
                            </div>
                            <div class="col-md-12 category_detail commercial_r">
                                <h3 class="flow_heading">Choose your category</h3>
                                <ul class="sub_categories">
                                    <li class="<?php echo ($proptype =='15' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="15" class="property_subtype proptype">Mall/Retail Shop</a></li>
                                    <li class="<?php echo ($proptype =='16' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="16" class="property_subtype proptype">Showrooms</a></li>
                                    <li class="<?php echo ($proptype =='17' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="17" class="property_subtype proptype">High Street/ Society Shops</a></li>
                                    <li class="<?php echo ($proptype =='18' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="18" class="property_subtype proptype">Food Court</a></li>
                                </ul>
                                
                            </div>
                            <div class="col-md-12 category_detail industrial_land">
                                <h3 class="flow_heading">Choose your category</h3>
                                <ul class="sub_categories">
                                    <li class="<?php echo ($proptype =='19' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="19" class="property_subtype proptype">Commercial land</a></li>
                                    <li class="<?php echo ($proptype =='22' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="22" class="property_subtype proptype">Industrial / Factory land</a></li>
                                    <li class="<?php echo ($proptype =='23' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="23" class="property_subtype proptype">Institutional/Hotel/School land</a></li>
                                    <li class="<?php echo ($proptype =='24' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="24"class="property_subtype proptype">SEZ/IT/ITES land</a></li>
                                </ul>
                                
                            </div>
                            <div class="col-md-12 category_detail warehouse">
                                <h3 class="flow_heading">Choose your category</h3>
                                <ul class="sub_categories">
                                    <li class="<?php echo ($proptype =='25' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="25" class="property_subtype proptype">Shed</a></li>
                                    <li class="<?php echo ($proptype =='26' ? 'active' : ''); ?>"><a href="javascript:void(0)" id="26" class="property_subtype proptype">Agriculture</a></li>
                                    
                                </ul>
                                
                            </div>
                            <input type="hidden" id="proptype" name="proptype">
							</div>
				  </div>
				  <div class="row seperator_div popup_seprator"></div>
				  <div class="accordion_head buyer_drop area_hed">Choose a Area / Unit<span class="plusminus">+</span></div>
				  <div class="accordion_body area_body" style="display: none;">
						<div class="panel-body panel_body">
							<div class="row">
								
						 <div class="col-md-12 locality_input">
									<div class="row">
                      <div class="col-md-2">
                      <select id="propsquare" name="propsquare" class="form-control area_price">
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

										
									</div>
							</div>
				  </div>
				<div class="row seperator_div popup_seprator"></div>
				<div class="accordion_head price_hed buyer_drop">Choose a Price Range<span class="plusminus">+</span></div>
				  <div class="accordion_body price_bdy" style="display: none;">
					<div class="panel-body panel_body">
								<div class="row">
									<div class="col-md-12 no_pad">
							
                <div class="col-md-6">
                  <input type="text" class="form-control input_desgn" placeholder="Minimum" id="proppriceminimum" name="proppriceminimum">
                 </div>
                <!-- <div class="col-md-2">
                    <select id="propminrupees" class="form-control area_price">
                       <option value="lacs">Lacs</option>
                       <option value="crores">Crores</option>
                    </select>
                 </div> -->
                 <!-- <input type="hidden" id="proppriceminimum" name="proppriceminimum"> -->

                 <div class="col-md-4">
                    <input type="text" class="form-control input_desgn" placeholder="Maximum" id="proppricemaximum" name="proppricemaximum">
                 </div>
                 <!-- <div class="col-md-2">
                    <select id="propmaxrupees" class="form-control area_price">
                      <option value="lacs">Lacs</option>
                     <option value="crores">Crores</option>
                     </select>
                   </div>
                   <input type="hidden" id="proppricemaximum" name="proppricemaximum"> -->
							</div>
								</div>
							</div>
				  </div>
                </div>
                <div class="col-md-12 text-right" style="padding:20px 0;">
                    <button class="btn btn-default call_butn" onclick="applyfilters()">Apply</button>
					</div>
		</div>
		</div>
      </div>
      
    </div>

  </div>
</div>














<div id="map_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">
  <div id="color-palette" style="display:none;"></div>                                    
                        <div id="curpos" style="display:none;"></div>
                        <div id="cursel" style="display:none;"></div>
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
											<button class="btn btn-lg" data-dismiss="modal">Go Back</button>
											<button class="btn button_togg btn-lg active step_availablity" onclick="getpolymy();" data-toggle="pill" href="#area_range" data-dismiss="modal">Confirm</button>
										  </div></p>
				
			</div>
		</div>
      </div>
      
    </div>

  </div>
</div>





<div id="myModalnew" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content draw_map no_pad">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
			<div class="container-fluid">
				<div class="row site_contain">
					<h1 class="visit_prop text-center">Scheduling visit for property ID :<span id="propsidpopup" class="prop_ids"> ASAD876</span></h1>
					
					
					<!-- <div id="appendid2">
					</div> -->
                    <div class="col-md-12">

                    <div class="col-md-12">
                    <p class="label_name no_pad">Location:</p>
                    <p class="details_label" id="sitevisitlocation">    </p>
                    </div>
                    <!-- <div class="col-md-4">₹ <span id="sitevisitarea">Area</span></div>
                    <div class="col-md-4"><span id="sitevisitprice">Price</span> Sq. ft.</div> -->
                    </div>
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="row">
								<input type="text" id="rantime" class="form-control input_desgn" placeholder="Select a Date">
							</div>
							
						</div>
                        <div class="col-md-6">
                        <div class="row">
						<div class="col-md-4 no_pad">
							
                         <button type="button" class="scheduletime time_sv button_select" id="morning">Morning</button>
							
							
						</div>
                        <div class="col-md-4 no_pad">
							
                            <button type="button" class="scheduletime time_sv button_select" id="afternoon">Afternoon</button>
							
							
						</div>
                        <div class="col-md-4 no_pad">
							
                            <button type="button" class="scheduletime time_sv button_select" id="evening">Evening</button>
							
							
						</div>
                        </div>
                        </div>
					</div>
                    <input type="hidden" id="scheduletime">
					<div class="col-md-12 visit_save">
						<div class="col-md-6">
							<div class="row">
								<p class="visit_mode">To schedule property visit, choose the mode of visit</p>
								<ul class="sub_categories">
									<li class="active"><a href="javascript:void(0)" id="online" class="property_subtype visitmode">Online</a></li>
									<li class=""><a href="javascript:void(0)" id="offline" class="property_subtype visitmode">Offline</a></li>
								</ul>
                            </div>
                            
                            <input type="hidden" id="sitevisitprop">
                           
                            <input type="hidden" id="visitmode">
							
						</div>
						<div class="col-md-6 text-right save_site">
							<div class="row">
								<button class="btn btn-default call_butn" onclick="getfreevisit();">Schedule</button>
							</div>
							
						</div>
					</div>
					
					
				
					
					
					
				</div>
			</div>
		</div>
      
    </div>

  </div>
</div>





<div id="proceedtopay" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content draw_map no_pad">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
			<div class="container-fluid">
            <input type="hidden" id="acceptidnew">

				<div class="row site_contain" id="firstshow">
					<h1 class="visit_prop text-center">You Already has used your complimentry sitevisits . For Site Visit of this property Amount to Pay is 500 /-</h1>
                    <?php 


$user_ids = Yii::$app->user->identity->id;
$arrcheckrole1 = \common\models\User::find()->where(['id'=>$user_ids])->one();


$name = $arrcheckrole1->fullname.''.$arrcheckrole1->lastname;
$email = $arrcheckrole1->email;
$phonenumber = $arrcheckrole1->username;


?>
<input type="hidden" id="kname" value="<?php echo $name; ?>">
                       <input type="hidden" id="kemail" value="<?php echo $email; ?>">
                       <input type="hidden" id="kphonenumber" value="<?php echo $phonenumber; ?>">
                       <input type="hidden" id="kamount_payable" value="500">
                       <input type="hidden" id="krequestids">
					
					<!-- <div id="appendid2">
					</div> -->
                    <div class="col-md-12">

                    
                    <div class="col-md-6 text-right save_site">
							<div class="row">
								<button type="button" class="btn btn-default call_butn"  id="rzp-button1">Proceed to Buy</button>
							</div>
							
						</div>
				
					
				</div>

			</div>


            <div class="row site_contain" id="secondshow">
					<h1 class="visit_prop text-center">Property details</h1>
					
					
					<!-- <div id="appendid2">
					</div> -->
                    <div class="col-md-12">

                    
                    
                    <div class="col-md-6 text-right save_site">
							<div class="row">
								<button class="btn btn-default call_butn" >Pay</button>
							</div>
							
						</div>
				
					
				</div>

			</div>




		</div>
      
    </div>

  </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>




    <script>
   
   $(document).ready(function(){

var kname = $('#kname').val();

var kemail = $('#kemail').val();
var kphonenumber = $('#kphonenumber').val();
var kamount_payable = $('#kamount_payable').val();

var  descriptions =  "Online Sitevisit";
var amounts = kamount_payable * 100;


var options = {

"key": "rzp_test_9ckspVvYJ0k6GZ",
"amount": amounts, // 2000 paise = INR 20
"name": "Stoneray Technologies Private Limited",
"description": descriptions,
"image": "/newimg/img/logo_y.png",
"handler": function (response){


//alert(response.razorpay_order_id);
paymentgateway(response.razorpay_payment_id);

},
"prefill": {
"name": kname,
"email": kemail

},
"notes": {
"address": descriptions
},
"theme": {
"color": "#F37254"
}

}; 

document.getElementById('rzp-button1').onclick = function(e){
   
  

var rzp1 = new Razorpay(options);
$('#proceedtopay').modal('hide');
rzp1.open();

e.preventDefault();

}


  });






</script> 
 

<script type="text/javascript">
<?php if(isset($getlocality)){  ?>

var geocoder = new google.maps.Geocoder();
var a = "<?php echo $getlocality; ?>";

var latitude;
var longitude;

geocoder.geocode({ 'address' : a}, function(results, status) {
  var c = results[0].geometry.location;
   latitude = c.lat();
   longitude = c.lng(); 
   
	
});
<?php 
} ?>


 $(".accordion_head").click(function() {
    if ($('.accordion_body').is(':visible')) {
      $(".accordion_body").slideUp(300);
      $(".plusminus").text('+');
    }
    if ($(this).next(".accordion_body").is(':visible')) {
      $(this).next(".accordion_body").slideUp(300);
      $(this).children(".plusminus").text('+');
    } else {
      $(this).next(".accordion_body").slideDown(300);
      $(this).children(".plusminus").text('-');
    }
  });
 $(".locality_area").click(function() {
	 $(".accordion_body").slideUp(300);
	 $(".plusminus").text('+');
    if ($('.accordion_body').is(':visible')) {
	
    } else {
      $(".location_body").slideDown(300);
      $('.location_hed').children(".plusminus").text('-');
    }
  });
 $(".prop_type").click(function() {


      if(proptype=='15' || proptype=='16' || proptype=='17' || proptype=='18'){
                $('.commercial_o').hide();
				$('.commercial_r').show();
				$('.warehouse').hide();
				$('.industrial_land').hide();
      }else if(proptype=='11' || proptype=='12' || proptype=='13' || proptype=='14'){
                $('.commercial_o').show();
				$('.commercial_r').hide();
				$('.warehouse').hide();
				$('.industrial_land').hide();
      }else if(proptype=='19' || proptype=='22' || proptype=='23' || proptype=='24'){
                $('.commercial_o').hide();
				$('.commercial_r').hide();
				$('.warehouse').hide();
				$('.industrial_land').show();
      }else{
                $('.commercial_o').hide();
				$('.commercial_r').hide();
				$('.warehouse').show();
				$('.industrial_land').hide();
           }


	$(".accordion_body").slideUp(300);
	$(".plusminus").text('+');
    if ($('.accordion_body').is(':visible')) {
      
    } else {
      $(".property_body").slideDown(300);
      $('.property_hed').children(".plusminus").text('-');
    }
  });
  $(".sub_categories li a").click(function() {
    $(this).parent().addClass('active').siblings().removeClass('active');

    });

 $(".prop_area").click(function() {
	$(".accordion_body").slideUp(300);
	$(".plusminus").text('+');
    if ($('.accordion_body').is(':visible')) {
      
    } else {
      $(".area_body").slideDown(300);
      $('.area_hed').children(".plusminus").text('-');
    }
  });
 $(".prop_price").click(function() {
	$(".accordion_body").slideUp(300);
	$(".plusminus").text('+');
    if ($('.accordion_body').is(':visible')) {
      
    } else {
      $(".price_bdy").slideDown(300);
      $('.price_hed').children(".plusminus").text('-');
    }
  });
 $(".map_butn").click(function(){
    $("#map_modal").modal('show');
  $("#myModal").modal('hide');
  });
 $(".user_filt").click(function(){
  $("#myModal").modal('show');
  });
  function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
      
}

$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);

	 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('blue');
  });
	$('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('blue');
  })


      var counter = '';                                
      var drawingManager;
      var selectedShape;
      var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
      var selectedColor;
      var colorButtons = {};
      const arrayColumn = (arr, n) => arr.map(x => x[n]);
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

       
       var town='';
        var sector='';
        var country=''; 
        var areaft='';                                           
        var areamin='';
        var areamax='';
        var pricemin='';
        var pricemax='';
        var proptype='';
        var propbid='';
        var availabilitym='';
        var sortby=''; 
        var  pacinput=''; 

       
         town  = $("#towns").val(); 
         sector  = $("#sectors").val();
         country  = $("#countrys").val();
         areaft = $("#propsquares").val();                                            
         areamin = $("#propareaminimums").val();
         areamax = $("#propareamaximums").val();
         pricemin = $("#proppriceminimums").val();
         pricemax = $("#proppricemaximums").val();
         proptype =  $('#proptypes').val();  
         propbid =  $('#propbid').val();
         availabilitym =  $('#availabilitym').val(); 
         sortby; 

         $('.propsbid').click(function(){

               propbid = this.id;
               $('#propbid').val(propbid);
              
               withoutshape();
         });

         $('.availabiltys').click(function(){

                availabilitym = this.id;
                $('#availabilitym').val(availabilitym);

                withoutshape();
        });

         $('.visitmode').click(function(){

var  dvisitmode = this.id;

  $('#visitmode').val(dvisitmode);
});

       $('.warehouse').hide();
    $('.industrial_land').hide();
    $('.commercial_r').hide();

	$(".commer_retail").click(function () {
				$('.commercial_o').hide();
				$('.commercial_r').show();
				$('.warehouse').hide();
				$('.industrial_land').hide();
		});
		$(".commer_office").click(function () {
				$('.commercial_o').show();
				$('.commercial_r').hide();
				$('.warehouse').hide();
				$('.industrial_land').hide();
				
		});
		$(".commer_land").click(function () {
				$('.commercial_o').hide();
				$('.warehouse').hide();
				$('.industrial_land').show();
				$('.commercial_r').hide();
		});
		$(".ware_house").click(function () {
				$('.commercial_o').hide();
				$('.commercial_r').hide();
				$('.warehouse').show();
				$('.industrial_land').hide();
		});


        $('.proptype').click(function(){
      var propid = this.id;
      $('#proptypes').val(propid);
    });


    $('.square').click(function(){
        var squareclick = this.id;
        $('#propsquares').val(squareclick);
    });


$('.area_minimum li').on('click', function() {
   var getValue = $(this).text();
  
   $('.selectminarea').text(getValue); 
   $('#propareaminimums').val(getValue);
});

$('.area_maximum li').on('click', function() {
 var getValue = $(this).text();
 $('.selectmaxarea').text(getValue);
 $('#propareamaximums').val(getValue);
});

$('.price_minimum li').on('click', function() {
 var getValue = $(this).text();
 $('.selectminprice').text(getValue);
 $('#proppriceminimums').val(getValue);
});

$('.price_maximum li').on('click', function() {
 var getValue = $(this).text();
 $('.selectmaxprice').text(getValue);
 $('#proppricemaximums').val(getValue);
});





 $('#propminrupees').change(function(){

$('#dummypriceminimum').val('');
    $('#proppriceminimum').val('');
var currency  =  $(this).val();
if(currency == 'lacs'){
 var dummyprice =  $('#dummypriceminimum').val();
 var actualpice = dummyprice * 100000;
 $('#proppriceminimum').val(actualpice);
 $('#proppriceminimums').val(actualpice);
}else{
  var dummyprice =  $('#dummypriceminimum').val();
  var actualpice = dummyprice * 10000000;
  $('#proppriceminimum').val(actualpice);
  $('#proppriceminimums').val(actualpice);
}

});

  $("#dummypriceminimum").on("input", function(){       
            var dummyprice =  $(this).val();
            var currency =  $('#propminrupees').val();
             if(currency == 'lacs'){

                        if(dummyprice > 99.9){

                          
                        alert('Pease select crores');
                        $('#dummypriceminimum').val(
                        function(index, value){
                        return value.substr(0, value.length - 1);
                        });


                        }else{
                        var actualpice = dummyprice * 100000;
                        $('#proppriceminimum').val(actualpice);
                        $('#proppriceminimums').val(actualpice);
                        }


             }else{
                 
                  var actualpice = dummyprice * 10000000;
                  $('#proppriceminimum').val(actualpice);
                  $('#proppriceminimums').val(actualpice);
             }
  });



$('#propmaxrupees').change(function(){

$('#dummypricemaximum').val('');
$('#proppricemaximum').val('');
var currency  =  $(this).val();
if(currency == 'lacs'){
var dummyprice =  $('#dummypricemaximum').val();
var actualpice = dummyprice * 100000;
$('#proppricemaximums').val(actualpice);
$('#proppricemaximum').val(actualpice);
}else{
var dummyprice =  $('#dummypricemaximum').val();
var actualpice = dummyprice * 10000000;
$('#proppricemaximums').val(actualpice);
$('#proppricemaximum').val(actualpice);
}

});

$("#dummypricemaximum").on("input", function(){       
        var dummyprice =  $(this).val();
        var currency =  $('#propmaxrupees').val();
         if(currency == 'lacs'){

            if(dummyprice > 99.9){


            alert('Pease select crores');
            $('#dummypricemaximum').val(
            function(index, value){
            return value.substr(0, value.length - 1);
            });


            }else{
            var actualpice = dummyprice * 100000;
            $('#proppricemaximums').val(actualpice);
            $('#proppricemaximum').val(actualpice);
            }




         }else{
             
              var actualpice = dummyprice * 10000000;
              $('#proppricemaximums').val(actualpice);
              $('#proppricemaximum').val(actualpice);
         }
});


    $("#propareaminimum").on("input", function(){       
              var actualarea =  $(this).val();             
                    
              $('#propareaminimums').val(actualarea);
               
    });
    $("#propareamaximum").on("input", function(){       
              var actualarea =  $(this).val();             
                    
              $('#propareamaximums').val(actualarea);
               
    });

    $("#proppriceminimum").on("input", function(){       
              var actualarea =  $(this).val();             
                    
              $('#proppriceminimums').val(actualarea);
               
    });
    $("#proppricemaximum").on("input", function(){       
              var actualarea =  $(this).val();             
                    
              $('#proppricemaximums').val(actualarea);
               
    });

    $('#loadMore').click(function () {
                        withoutshape();
                        $('html,body').animate({
        scrollTop: $(".property_requirment").offset().top - 100},
        'slow'); 
                    }); 




$('.scheduletime').on('click', function() {
    
    var getValue = this.id;
    if(getValue == 'morning'){
    $('#scheduletime').val('10:00:00');
    }else if(getValue == 'afternoon'){
        $('#scheduletime').val('15:00:00');
    }
    else if(getValue == 'evening'){
        $('#scheduletime').val('18:00:00');
    }else{
        $('#scheduletime').val('00:00:00');
    }
    
    });


    $('input[type=radio][name=example]').change(function() {

if (this.value == 'client') {
    var result = confirm("Are you Sure You Want to Change Client Expectations ?");
    if (result) {
        whichserch = this.value;
    }else{
       // alert(this.value);
  var uni_serch =   $('#universal_search').parent().addClass('checked');
  var cli_serch =   $('#client_search').parent().removeClass('checked');
    //  alert(uni_serch);  
    
}
}
else if (this.value == 'universal') {
    whichserch = this.value;
    
}

  });
    
    
    $("#setsessions").on("click", function(e){
         e.preventDefault();
         $('#firstshow').hide();
                                     $('#secondshow').show();
                                        
                                        var ids = $('#acceptidnew').val();
                                        var amount_payable = 500;
                                       
    
                                            $.ajax({
                                                   type: "POST",
                                                    url: '/request-sitevisit/sessioncheckout',
                                                    data: {id: ids,amount_payable:amount_payable},
                                                    success: function (data) {
                                                     
                                                     if(data == 'done'){
                                                      
                                                     }
                                                      
                                                       
    
                                                    },
                                                }); 
    
    });




        <?php if(isset($getlocality)){  ?>

            var getsearchlocation = "<?php echo $getlocality; ?>";

                 <?php } ?>

function applyfilters(){

        
town  = $("#towns").val(); 
sector  = $("#sectors").val();
country  = $("#countrys").val();
areaft = $("#propsquares").val();                                            
areamin = $("#propareaminimums").val();
areamax = $("#propareamaximums").val();
pricemin = $("#proppriceminimums").val();
pricemax = $("#proppricemaximums").val();
proptype =  $('#proptypes').val();

 pacinput =  $('#pac-input').val();


 $('.locality_areas').text(town+' '+sector);
 if(areamin != ''){

    $('.prop_areas').text(areamin+' - '+areamax);
 }
 if(pricemin != ''){

    $('.prop_prices').text(pricemin+' - '+pricemax); 
 }
 
 var commercial_text = $('#'+proptype).text();
 $('.prop_types').text(commercial_text);

 if(pacinput != ''){
    getsearchlocation = pacinput;
 }
 $('#type').val('blank')

 withoutshape();

 $("#myModal").modal('hide');


}
      
      
                              function getpolymy(){


                                $('#loadMore').hide();
                                    town  = $("#towns").val(); 
                                    sectore  = '';
                                    country  = $("#countrys").val();
                                    areaft = $("#propsquares").val();                                            
                                    areamin = $("#propareaminimums").val();
                                    areamax = $("#propareamaximums").val();
                                    pricemin = $("#proppriceminimums").val();
                                    pricemax = $("#proppricemaximums").val();
                                    proptype =  $('#proptypes').val();

                                    pacinput =  $('#pac-input').val();


                                    $('.locality_areas').text(town+' '+sector);
                                     if(areamin != ''){

                                        $('.prop_areas').text(areamin+' - '+areamax);
                                    }
                                    if(pricemin != ''){
                                        
                                        $('.prop_prices').text(pricemin+' - '+pricemax); 
                                    }
                                    $('.prop_types').text($('#'+proptype).text());

                                    if(pacinput != ''){
                                     getsearchlocation = pacinput;
                                    }

                                  

                                          count1 =0;
                                          count2 =0;
                                          count3 =0;
                                           
                                           var newpath = pathstr; 
                                          
                                       
                                        
                                        pageSize = 6;
                                        page = 1;
                                        
                                        // showPage = function(page) {
                                        // $(".chirag").hide();
                                        // $(".chirag").each(function(n) {
                                        // if (n >= pageSize * (page - 1) && n < pageSize * page)
                                        // $(this).show();
                                        // });        
                                        // }
                                          // alert(type);
                                          // alert(getpolyshapes);

                                           var shapes = getpolyshapes;   
                                            
                                           var ndata = '';
                                           
                                             
                                                                                      
                                               
                                               if(getsearchlocation != '' || shapes != ''){ 
                                                  
                                             
                                             $('#getprop').html('');
                                           
                                            if(shapes == ''){

                                 
                                               
                                          ndata = {location:getsearchlocation,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid}; 
                                          
                                           $.ajax({
                                                    type: "POST",
                                                    url: 'withoutshapebackend',
                                                    data: ndata,
                                                    success: function (data) {
                                                      
                                                   if(data != '1'){
                                                       //toastr.success('Your Search Criteria has Successfully Saved', 'success');
                                                        $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html(countprop);
                                                        
                                                        bindButtonClick(obj);

                                                        $.each(obj, function (index) {
                                                         
                                                       
                                                           
                                                            var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.town_name + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';

                                                             var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;


                                                            
                                        $('#getprop').append('<div class="col-md-6 chirag">'+
				'<div class="row prop_list">'+
					'<p><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img"></p>'+
					'<div class="col-md-12">'+
					
					'<h5 class="prpr_hed mb-3">' +  this.typename +' availabale for sale in '+ this.town_name  + '</h5>'+
					'<p class="pror_detl"><span class="lite_clr">Locality :</span> '+ this.locality +'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Highlight :</span> On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Description: </span>'+ html +'</p>'+
					'<p class="mt-3 mb-4">'+
					'<a onclick="viewproperty(' + this.id + '),ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'&expecidl='+getexpectationID+'" target="_blank" class="more_detail">More Details</a>'+
					'</p>'+
					'</div>'+
					'<div class="col-md-12 text-center pt-1 pb-3">'+
						'<div class="row">'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-inr"></i> ' + this.expected_price + '</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-users"></i> '+ ((this.total_plot_area == '0') ? this.buildup_area : this.total_plot_area) +' sqft</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-building"></i> '+ this.county1 +'</span>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-12 text-center bordr_lw">'+
						'<div class="row">'+
						((this.request_for == 'Instant') ?
							'<a class="col-md-4 col-xs-4 app_rch appr_cursrb" href="javascript:void(0)" onclick="directitnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Instant Approach</span>'+
							'</div></a>'
							:
                     ((this.request_for == 'bid') ?
                     '<a class="col-md-4 col-xs-4 app_rch buysitevisit" href="javascript:void(0)" onclick="bititnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Bit it Now</span>'+
							'</div></a>'
							: ''
                   )) +						
							
							'<a class="col-md-4 col-xs-4 brdr_b app_rch buysitevisit" href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id);"><div>'+
								'<span class="app_rch">'+
								(this.county > 0 ? 'Site Visited': 'Book Site Visit') +
								'</span>'+
							'</div>'+
							'</a>'+
							'<a class="col-md-4 col-xs-4 app_rch buyshortlist" href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id);"><div>'+
								'<span class="app_rch">Shortlist</span>'+
							'</div></a>'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>');
                                                            

                                                        });
                                                        
                                          showPage(1);    
                                          var i;
                                          var totals = Math.ceil(countprop/6);
                                          
                                           var dynamic = "";   
                                           for(i=1;i<=totals;i++){
                                             
                                            dynamic += '<li><a href="javascript:void(0)">'+i+'</a></li>';                                           
                                            
                                           }
     
                                            
                                           
                                           $('#paginater').html(''); 
                                           $('#paginater').html('<ol id="pagin" class="paginclass">'+ dynamic+  '</ol>'); 
                                            $("#pagin li a").first().addClass("current"); 
                                              $("#pagin li a").click(function() {
                                              
                                            $("#pagin li a").removeClass("current");
                                            $(this).addClass("current");
                                           
                                            showPage(parseInt($(this).text())) 
                                        });

                                                     }else{
                                                     toastr.warning('Please Enter Specific Locality', 'warning');
                                                     }  },
                                                });
                                                  
                                                  
                                              }
                                            
                                            
                                            
                                            if(shapes == 'polygon'){

                                             if(pathstr){ 
                                                 
                                                
                                          // toastr.success('Your Search Criteria has Successfully Saved', 'success');
                                          
                                                  
                                          ndata = {location:getsearchlocation,town:town,sector:sectore,newpath:newpath,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym,whichserch:whichserch,foodexpectid:foodexpectid,food:food}; 
                                          
                                           $.ajax({
                                                    type: "POST",
                                                    url: 'getpolymy',
                                                    data: ndata,
                                                    success: function (data) {
                                                      
                                                    
                                               // $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html('');
                                                        
                                                        bindButtonClick(obj);

                                                        $.each(obj, function (index) {
                                                         
                                                        var lati = this.latitude;
                                                        var long = this.longitude;
                                                        var curPosition = new google.maps.LatLng(lati,long);
                                                        var triangleCoords = JSON.parse(pathstr);
                               
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
                        
                        
                            var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.town_name + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                        
                        var imageds = $.trim(this.featured_image);
                        var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);
                        var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
    var haritid = 273*179-this.id;
                        var propsid = 'PR'+ haritid;
                        var imaged;
           (this.county1 == '1' ? imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>":imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");
          

                                                            
                  var commaNum = this.expected_price;
                
                  $('#getprop').append('<div class="col-md-12 property_detail">'+
                  '<p class="property_id">Property ID : '+propsid+' <span class="building_name">'+this.locality.substr(0,this.locality.indexOf(','))+'</span></p>'+
                       '<div class="row single_property">'+
                           '<div class="col-md-2 no_pad relative">'+
                           '<a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '&user_id='+food+'&l_id='+foodlead+'&e_id='+foodexpectid+'" target="_blank"> <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imageds)+'" class="img-responsive image_property"></a>'+
                            //    '<div class="overlay_sign">'+
                            //        '<p class="sign_click"><span class="color_orange">Login</span> or <span class="color_orange">Sign</span> up to view this property</p>'+
                            //    '</div>'+
                           '</div>'+
                           '<div class="col-md-10">'+
                               '<div class="row prop_detail">'+
                                   '<div class="col-md-6 company_overview property_manage">'+
                                       '<p class="label_name">Location</p>'+
                                       '<p class="details_label">'+this.sector_name+' , '+this.town_name+'</p>'+
                                   '</div>'+
                                   '<div class="col-md-6 company_overview property_manage">'+
                                       '<p class="label_name">Property for</p>'+
                                       '<p class="details_label">'+this.request_for+'</p>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row prop_detail">'+	
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Price</p>'+
                                       '<p class="details_label">₹ '+commaNum+' </p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Area</p>'+
                                       '<p class="details_label">'+this.super_area+' Sq. ft.</p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Verified</p>'+
                                       '<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/verified.svg';  ?>" width="16"> 15 Bells</p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Availability</p>'+
                                       '<p class="details_label">'+this.availability.replace(/_/g,' ').charAt(0).toUpperCase() + this.availability.replace(/_/g,' ').slice(1)+'</p>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row prop_detail">'+
                               '<div class="col-md-6 amenities_offered">'+
                                   '<p class="label_name amenities">Amenities</p>'+
                                   '<ul class="amenities_list">'+
                                       '<li class=""><img width="18" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="17" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/fire.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="11" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amen_icon"></li>'+
                                   '</ul>'+
                               '</div>'+
                               '<div class="col-md-6 shortlist_call">'+
                               '<img src="'+imaged+'" id="test_'+this.id+'" class="test" onclick="changes('+this.id+');" />'+
                               ((this.county > 0) ?
                               '<button  class="btn btn-default short_butn">Already Scheduled</button>'
                                  :
                               '<button id="sitevisitremove_'+this.id+'" onclick="sitevisitproperties('+this.id+');" class="btn btn-default short_butn">Schedule Visit</button>'
                               )+                               '</div>'+
                               '</div>'+
                               '</div>'+
                           '</div>'+
                           
                   '</div>'); 
                                                        }
                                                       
                                                        
                                                              

                                                        });

                                                        if(count1 ==0){
                                                            $('#countprop').html(0);
                                                        }else{
                                                        $('#countprop').html(count1);
                                                        }
                                                        
                                       

                                                    },
                                                });
                                            }else{
        toastr.warning('You have not changed any coordinates in your shape', 'warning');
                                            }
 

                                                }


                                           if(shapes == 'circle'){
                                           
                                        // toastr.success('Your Search Criteria has Successfully Saved', 'success');

                                             $.ajax({
                                                    type: "POST",
                                                    url: 'mapproperty1',
                                                    data: {location:getsearchlocation,center:centercoordinates,totalradius:totalradius,shapes:shapes,town:town,sector:sectore,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym,whichserch:whichserch,foodexpectid:foodexpectid,food:food},
                                                    success: function (data) {
                                                    
                                                $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                       // $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                       // $('#countprop').html(countprop);
                                                        
                                                        bindButtonClick(obj);

                                                        $.each(obj, function (index) {
                                                            
                                                            var lati = this.latitude;
                                                            var long = this.longitude;
                                                            
                                                            var curPosition = new google.maps.LatLng(lati,long);
                                                           

                
                                                            var radius =  parseInt(totalradius);              
                                                            var townCenter = new google.maps.LatLng(latt,longg);

                                                     var circleOptions = {
                                                            strokeColor: '#FF0000',
                                                            strokeOpacity: 0.8,
                                                            strokeWeight: 2,
                                                            fillColor: '#FF0000',
                                                            fillOpacity: 0.25,
                                                            map: map,
                                                            center: townCenter,
                                                            editable: true,
                                                            // draggable: true,
                                                            radius: radius
                                                            };
                                                            
                                                            circle = new google.maps.Circle(circleOptions);
                                                            circle.setMap(null);
                                                             if(circle.getBounds().contains(curPosition)){
                                                               // circle.setMap(null);

                                                             count2 += 1; 
                                                             var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.town_name + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                                           
                                                            var imageds = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
								                            var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;
                                                            var imaged;
           (this.county1 == '1' ? imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>":imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");
          

                                         

                                             var commaNum = this.expected_price;
                
                                             $('#getprop').append('<div class="col-md-12 property_detail">'+
                                             '<p class="property_id">Property ID : '+propsid+' <span class="building_name">'+this.locality.substr(0,this.locality.indexOf(','))+'</span></p>'+
                       '<div class="row single_property">'+
                           '<div class="col-md-2 no_pad relative">'+
                           '<a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '&user_id='+food+'&l_id='+foodlead+'&e_id='+foodexpectid+'" target="_blank"> <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imageds)+'" class="img-responsive image_property"></a>'+
                            //    '<div class="overlay_sign">'+
                            //        '<p class="sign_click"><span class="color_orange">Login</span> or <span class="color_orange">Sign</span> up to view this property</p>'+
                            //    '</div>'+
                           '</div>'+
                           '<div class="col-md-10">'+
                               '<div class="row prop_detail">'+
                                   '<div class="col-md-6 company_overview property_manage">'+
                                       '<p class="label_name">Location</p>'+
                                       '<p class="details_label">'+this.sector_name+' , '+this.town_name+'</p>'+
                                   '</div>'+
                                   '<div class="col-md-6 company_overview property_manage">'+
                                       '<p class="label_name">Property for</p>'+
                                       '<p class="details_label">'+this.request_for+'</p>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row prop_detail">'+	
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Price</p>'+
                                       '<p class="details_label">₹ '+commaNum+' </p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Area</p>'+
                                       '<p class="details_label">'+this.super_area+' Sq. ft.</p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Verified</p>'+
                                       '<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/verified.svg';  ?>" width="16"> 15 Bells</p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Availability</p>'+
                                       '<p class="details_label">'+this.availability.replace(/_/g,' ').charAt(0).toUpperCase() + this.availability.replace(/_/g,' ').slice(1)+'</p>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row prop_detail">'+
                               '<div class="col-md-6 amenities_offered">'+
                                   '<p class="label_name amenities">Amenities</p>'+
                                   '<ul class="amenities_list">'+
                                       '<li class=""><img width="18" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="17" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/fire.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="11" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amen_icon"></li>'+
                                   '</ul>'+
                               '</div>'+
                               '<div class="col-md-6 shortlist_call">'+
                               '<img src="'+imaged+'" id="test_'+this.id+'" class="test" onclick="changes('+this.id+');" />'+
                               ((this.county > 0) ?
                               '<button  class="btn btn-default short_butn">Already Scheduled</button>'
                                  :
                               '<button id="sitevisitremove_'+this.id+'" onclick="sitevisitproperties('+this.id+');" class="btn btn-default short_butn">Schedule Visit</button>'
                               )+                               '</div>'+
                               '</div>'+
                               '</div>'+
                           '</div>'+
                           
                   '</div>'); 
                                                        }
                                                            
                                                      
                                                        });
                                                        if(count2 ==0){
                                                            $('#countprop').html(0);
                                                        }else{
                                                        $('#countprop').html(count2);
                                                        }
                                                        
                                        

                                                    },
                                                });
                                          }
                                                
                                                
                                  if(shapes == 'rectangle'){

                                       if(northlat){
                                  
                                           
                                 // toastr.success('Your Search Criteria has Successfully Saved', 'success');  

 
                                             $.ajax({
                                                    type: "POST",
                                                    url: 'mapproperty2',
                                                    data: {northlat:northlat,southlat:southlat,northlng:northlng,southlng:southlng,location:getsearchlocation,center:centercord,shapes:shapes,town:town,sector:sectore,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym,whichserch:whichserch,foodexpectid:foodexpectid,food:food},
                                                    success: function (data) {
                                                 
                                                      // $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                        //$(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        //$('#countprop').html(countprop);
                                                        
                                                        bindButtonClick(obj);
                                                           
                                                        $.each(obj, function (index) {
                                                            
                                        var lati = this.latitude;
                                        var long = this.longitude;
                                        var curPosition = new google.maps.LatLng(lati,long);  

                 var rectanglecoordinates = '{"north": '+northlat+',"south":'+ southlat+',"east": '+northlng+',"west": '+southlng+' }';
               

                                  var newkuma = JSON.parse(rectanglecoordinates);
                                  
                                  var   rectangle = new google.maps.Rectangle({
                                    strokeColor: '#FF0000',
                                    strokeOpacity: 0.8,
                                    strokeWeight: 2,
                                    fillColor: '#FF0000',
                                    fillOpacity: 0.35,
                                    editable: true,
                                    //draggable: true,
                                    map: map,
                                    bounds: newkuma
                                    });

                                                             
                                var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.town_name + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';

                                var imageds = $.trim(this.featured_image);
                                var c = content.substr(0, showChar);
                                var h = content.substr(showChar-1, content.length - showChar);
                                var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
                                var haritid = 273*179-this.id;
                                var propsid = 'PR'+ haritid;
                                var imaged;
           (this.county1 == '1' ? imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>":imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");
          

                                      rectangle.setMap(null);
                                       if(rectangle.getBounds().contains(curPosition)){
               
                                       
                                      count3 += 1;                      
                                      var commaNum = this.expected_price;
                
                                      $('#getprop').append('<div class="col-md-12 property_detail">'+
                                      '<p class="property_id">Property ID : '+propsid+' <span class="building_name">'+this.locality.substr(0,this.locality.indexOf(','))+'</span></p>'+
                       '<div class="row single_property">'+
                           '<div class="col-md-2 no_pad relative">'+
                           '<a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '&user_id='+food+'&l_id='+foodlead+'&e_id='+foodexpectid+'" target="_blank"> <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imageds)+'" class="img-responsive image_property"></a>'+
                            //    '<div class="overlay_sign">'+
                            //        '<p class="sign_click"><span class="color_orange">Login</span> or <span class="color_orange">Sign</span> up to view this property</p>'+
                            //    '</div>'+
                           '</div>'+
                           '<div class="col-md-10">'+
                               '<div class="row prop_detail">'+
                                   '<div class="col-md-6 company_overview property_manage">'+
                                       '<p class="label_name">Location</p>'+
                                       '<p class="details_label">'+this.sector_name+' , '+this.town_name+'</p>'+
                                   '</div>'+
                                   '<div class="col-md-6 company_overview property_manage">'+
                                       '<p class="label_name">Property for</p>'+
                                       '<p class="details_label">'+this.request_for+'</p>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row prop_detail">'+	
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Price</p>'+
                                       '<p class="details_label">₹ '+commaNum+' </p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Area</p>'+
                                       '<p class="details_label">'+this.super_area+' Sq. ft.</p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Verified</p>'+
                                       '<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/verified.svg';  ?>" width="16"> 15 Bells</p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Availability</p>'+
                                       '<p class="details_label">'+this.availability.replace(/_/g,' ').charAt(0).toUpperCase() + this.availability.replace(/_/g,' ').slice(1)+'</p>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row prop_detail">'+
                               '<div class="col-md-6 amenities_offered">'+
                                   '<p class="label_name amenities">Amenities</p>'+
                                   '<ul class="amenities_list">'+
                                       '<li class=""><img width="18" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="17" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/fire.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="11" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amen_icon"></li>'+
                                   '</ul>'+
                               '</div>'+
                               '<div class="col-md-6 shortlist_call">'+
                               '<img src="'+imaged+'" id="test_'+this.id+'" class="test" onclick="changes('+this.id+');" />'+
                               ((this.county > 0) ?
                               '<button  class="btn btn-default short_butn">Already Scheduled</button>'
                                  :
                               '<button id="sitevisitremove_'+this.id+'" onclick="sitevisitproperties('+this.id+');" class="btn btn-default short_butn">Schedule Visit</button>'
                               )+                               '</div>'+
                               '</div>'+
                               '</div>'+
                           '</div>'+
                           
                   '</div>'); 
        }
                                                            
                                                              
                                                            

                                                        });
                                                        
                                                        if(count3 ==0){
                                                            $('#countprop').html(0);
                                                        }else{
                                                        $('#countprop').html(count3);
                                                        }
                                       
//
                                                    },
                                                });
                                               } else{
        toastr.warning('You have not changed any coordinates in your shape', 'warning');
                                               
                                                }
                                  } 
                                                
                                  
                                             
                                                
                                                }else{
                                                
                                                toastr.warning('Please Enter Locality or Draw Precise Shape on Map', 'warning');
                                                
                                                } 
                                                
                                                
                                                
                                                 
                                            
                                            
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
           // alert(pathstr);
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

      

        
        $('#shapedel').text('');
         //$('#shapedel').text(shape.type);
         if(shape.type == 'circle'){
            
          $('#shapedel').text('Circle');  
        }else if(shape.type == 'polygon'){
            
          $('#shapedel').text('Polygon');  
        }else if(shape.type == 'polyline'){
            
          $('#shapedel').text('Polyline');  
        }else{
            
          $('#shapedel').text('Rectangle');  
        }
         $('#delete-button').removeClass("inactiveLink");
         
       
        clearSelection();
        selectedShape = shape;
        if (isNotMarker)
          shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
        updateCurSelText(shape);
         
       
      }

      function deleteSelectedShape() {
           $('#delete-button').addClass("inactiveLink");
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

      function deletePlacesSearchResults() {
        for (var i = 0, marker; marker = placeMarkers[i]; i++) {
          marker.setMap(null);
        }
        placeMarkers = [];
        input.value = ''; // clear the box too
      }
      

      function newLocation(latitudes,longitudes)
         {
                
                map.setCenter({
                lat : latitudes,
                lng : longitudes
                });
         }


      
      var type;
      /////////////////////////////////////
      function initialize() {
          
        //$('#delete-button').removeClass("inactiveLink");
       //$('#delete-button').addClass("activeLink");
       //$('.gmnoprint').children().eq(0).addClass("hideme");
        map = new google.maps.Map(document.getElementById('map_canvas'), { //var
          zoom: 16,//10,
          center: new google.maps.LatLng(28.4595,77.0266),//(22.344, 114.048),
          mapTypeId: google.maps.MapTypeId.ROADMAP
         
        });
        curposdiv = document.getElementById('curpos');
        curseldiv = document.getElementById('cursel');
         type  = $('#type').val();
        
         map.setOptions({ draggableCursor: 'url("https://www.tutorialrepublic.com/examples/images/custom.gif"), default' }),

       




	   


<?php 
  if(isset($getlocality)){
      ?>  
      
     newLocation(latitude , longitude);  
     
 var geometry  = <?php echo $geometry; ?>;

if(type == 'polygon'){
    getpolyshapes = type;
    $('#shapedel').text('Polygon');
   
        var triangleCoords = geometry;


          bermudaTriangle = new google.maps.Polygon({
      paths: triangleCoords,
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      editable: true
     // draggable: true,
          });

      bermudaTriangle.setMap(map);
      google.maps.event.addListener(bermudaTriangle.getPath(), "set_at", getPolygonCoords);
     
     

} if(type == 'circle'){


    getpolyshapes = type;
  //  $('#shapedel').text('Circle');
    var radiuss  = $('#radius').val();
    var radius =  parseInt(radiuss);
    var newcircleCoord = geometry.split(","); 
    var townCenter = new google.maps.LatLng(newcircleCoord[0],newcircleCoord[1]);

    var circleOptions = {
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.25,
      map: map,
      center: townCenter,
      editable: true,
     // draggable: true,
      radius: radius
    };

     circle = new google.maps.Circle(circleOptions);
     if (typeof circle.getCenter == 'function') {
         
          centercoordinates = circle.getCenter().toUrlValue();
           latt = circle.getCenter().lat();
           longg = circle.getCenter().lng();
        }
        if (typeof circle.getRadius == 'function') {
            totalradius = circle.getRadius();
        }

        google.maps.event.addListener(circle, 'radius_changed', function () {    
     // circle.setMap(null);
                 totalradius = circle.getRadius();
                 latt = circle.getCenter().lat();
                 longg = circle.getCenter().lng();
    });
}

if(type == 'rectangle'){

    getpolyshapes = type;
    $('#shapedel').text('Rectangle');
       rectangle = new google.maps.Rectangle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      editable: true,
      //draggable: true,
      map: map,
      bounds: geometry
    });

    rectangle.setMap(map);
    rectangle.addListener('bounds_changed', showNewRect);

    function showNewRect(event) {
       
      var ne = rectangle.getBounds().getNorthEast();
      var sw = rectangle.getBounds().getSouthWest();

          northlat = ne.lat();
         
          northlng = ne.lng();
          southlat = sw.lat();
          southlng = sw.lng();
    }

}



<?php 

}  ?>

function getPolygonCoords() {

   
    
      var len = bermudaTriangle.getPath().getLength();
      var htmlStr = "";
      
       // htmlStr += "new google.maps.LatLng(" + bermudaTriangle.getPath().getAt(i).toUrlValue(5) + "), ";
        //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
        //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
        if (typeof bermudaTriangle.getPath == 'function') {
          pathstr = "[ ";
          for (var i = 0; i < bermudaTriangle.getPath().getLength(); i++) {
              
              var newstring = bermudaTriangle.getPath().getAt(i).toUrlValue(6);
             
              // console.log(newstring);
              var newarray = newstring.split(',');
              polyArray.push(bermudaTriangle.getPath());
               
               // .toUrlValue(5) limits number of decimals, default is 6 but can do more
               pathstr += '{ "lat" : '+bermudaTriangle.getPath().getAt(i).lat() + ', "lng" : '+ bermudaTriangle.getPath().getAt(i).lng() + "}"+" , ";
          }
          pathstr += "]";
          pathstr.trim();           
            var commanum = pathstr.lastIndexOf(",");
           var  part1 = pathstr.substring(0, commanum);
            var part2 = pathstr.substring(commanum + 1, pathstr.length);
            
            pathstr = part1 + part2;
        }

      
      //document.getElementById('info').innerHTML = htmlStr;
    }


        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
        drawingManager = new google.maps.drawing.DrawingManager({
          //drawingMode: google.maps.drawing.OverlayType.POLYGON,
          

          drawingControlOptions: {
              
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['circle', 'polygon', 'rectangle']
          },
          // map.setOptions({ draggableCursor: 'url("https://www.tutorialrepublic.com/examples/images/custom.gif"), default' }),

          markerOptions: {
            draggable: true,
            editable: true,
            //draggableCursor: 'url("https://www.tutorialrepublic.com/examples/images/custom.gif"), default' ,
          },
          polylineOptions: {
            editable: true
          },
          rectangleOptions: polyOptions,
          circleOptions: polyOptions,
          polygonOptions: polyOptions,
          map: map
        });
        drawingManager.setDrawingMode(null);

       $("#polyshape").click( function(){
      
      drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON);
       });

       $("#rectangles").click( function(){
      
      drawingManager.setDrawingMode(google.maps.drawing.OverlayType.RECTANGLE);
       });

       $("#circles").click( function(){
      
      drawingManager.setDrawingMode(google.maps.drawing.OverlayType.CIRCLE);
       });
        
       drawingManager.setMap(map);

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
       // controlWrapper.setAttribute("id", "nyadiv");
        //controlWrapper.innerHTML = "Select Shape";
        //~ DelPlcButDiv.style.color = 'rgb(25,25,25)'; // no effect?
        DelPlcButDiv.style.backgroundColor = '#fff';
        DelPlcButDiv.style.cursor = 'pointer';
       // DelPlcButDiv.innerHTML = 'DEL';
       // controlWrapper.index = 1;   
      // map.controls[google.maps.ControlPosition.TOP_CENTER].push(controlWrapper);
        
  
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(DelPlcButDiv);
        google.maps.event.addDomListener(DelPlcButDiv, 'click', deletePlacesSearchResults);

          searchBox = new google.maps.places.SearchBox( (input));

        // Listen for the event fired when the user selects an item from the
        // pick list. Retrieve the matching places for that item.
        var searchlat = ""; var searchlng = "";
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            
          $('#towns').val('');   
          $('#sectors').val('');  
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
            $('#towns').val(itemLocality);
            }
            if (address_component.types[0] == "sublocality_level_1"){
            // console.log("province:"+address_component.long_name);
            itemSectorf = address_component.long_name;
            $('#sectors').val(itemSectorf);

            }

            if (address_component.types[0] == "country"){ 
             //console.log("country:"+address_component.long_name); 
            itemCountry = address_component.long_name;
            $('#countrys').val(itemCountry);
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
        
      
        
      }
      
                         function init() {

                                 var minZoomLevel = 12;
                                 var mapf = new google.maps.Map(document.getElementById('map-canvasd'), {
                                     center: {
                                         lat: 28.4595,
                                         lng: 77.0266
                                     },
                                              zoom: 10,
                                              mapTypeId: 'satellite'
                                 });
                                 google.maps.event.addListener(mapf, 'zoom_changed', function () {
                                     if (mapf.getZoom() > minZoomLevel)
                                         mapf.setZoom(minZoomLevel);
                                 });
                             }

            //                   function ChangeDragabbleCursor()
            //   {
            //     map.setOptions({ draggableCursor: null });   
            //               }   



       //google.maps.event.addDomListener(window, 'load', init);
      
      
      google.maps.event.addDomListener(window, 'load', initialize);
      





                                         
                                           
                                                        var showChar = 100;
                                                        var ellipsestext = "...";
                                                        var moretext = "Show more";
                                                        var lesstext = "Show less"; 

                                        pageSize = 6;
                                        page = 1;
                                        
                                        showPage = function(page) {
                                        $(".chirag").hide();
                                        $(".chirag").each(function(n) {
                                        if (n >= pageSize * (page - 1) && n < pageSize * page)
                                        $(this).show();
                                        });        
                                        }



                                        function numberWithCommas(number) {
                                                    var parts = number.toString().split(".");
                                                    parts[0] = parts[0].replace(/\B(?=(\d{2})+(?!\d))/g, ",");
                                                    return parts.join(".");
                                                }



                            function  withoutshape(){


                                        
                                        var count1 =0;
                                          var count2 =0;
                                          var count3 =0;

                                          var types  = $('#type').val();
                                   var start  = $('#startlib').val();
                                   var length  = $('#lengthlib').val();
                                         

                               var types  = $('#type').val();

                                    town  = $("#towns").val(); 
                                    sectore  = '';
                                    country  = $("#countrys").val();
                                    areaft = $("#propsquares").val();                                            
                                    areamin = $("#propareaminimums").val();
                                    areamax = $("#propareamaximums").val();
                                    pricemin = $("#proppriceminimums").val();
                                    pricemax = $("#proppricemaximums").val();
                                    proptype =  $('#proptypes').val();
                                    propbid =  $('#propbid').val();
                                    var totalradiuss =  $('#radius').val();
                                    var geometry  = <?php echo $geometry; ?>;
                                  //  alert(types);alert(totalradiuss);
                                  $('#getprop').html('');
                                  
                                 if(types == 'blank'){
                                       
                                       ndata = {location:getsearchlocation,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym,start:start,length:length,whichserch:whichserch,foodexpectid:foodexpectid,food:food}; 
                                      
                                       $.ajax({
                                               type: "POST",
                                               url: 'withoutshapebackend',
                                               data: ndata,
                                               success: function (data) {
                                                   
                                               if(data != '1'){
                                                   //toastr.success('Your Search Criteria has Successfully Saved', 'success');
                                                  // $('#search-pro').css("display","block");
                                                   var obj = $.parseJSON(data);
                                                  // $(".serch_rslt").show();
                                                  $('#countprop').html(obj.counts);

                                                   var totalprops = obj.lengths;
                                                   $('#startlib').val(parseInt(totalprops));
                                                   $('#lengthlib').val(parseInt(totalprops) + 20);
                                                  
                                                  
                                                  // $('#getsearchlocation').html(sector);
                                                   
                                                   bindButtonClick(obj.datas);
   
                                                   $.each(obj.datas, function (index) {
                                                  
          
           var haritid = 273*179-this.id;
           var propsid = 'PR'+ haritid;
           var commaNum = this.expected_price;
           var imageds = $.trim(this.featured_image);
           var imaged;
           (this.county1 == '1' ? imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>":imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");
          
                       
           $('#getprop').append('<div class="col-md-12 property_detail">'+
           '<p class="property_id">Property ID : '+propsid+' <span class="building_name">'+this.locality.substr(0,this.locality.indexOf(','))+'</span></p>'+
                       '<div class="row single_property">'+
                           '<div class="col-md-2 no_pad relative">'+
                           '<a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '&user_id='+food+'&l_id='+foodlead+'&e_id='+foodexpectid+'" target="_blank"> <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imageds)+'" class="img-responsive image_property"></a>'+
                            //    '<div class="overlay_sign">'+
                            //        '<p class="sign_click"><span class="color_orange">Login</span> or <span class="color_orange">Sign</span> up to view this property</p>'+
                            //    '</div>'+
                           '</div>'+
                           '<div class="col-md-10">'+
                               '<div class="row prop_detail">'+
                                   '<div class="col-md-6 company_overview property_manage">'+
                                       '<p class="label_name">Location</p>'+
                                       '<p class="details_label">'+this.sector_name+' , '+this.town_name+'</p>'+
                                   '</div>'+
                                   '<div class="col-md-6 company_overview property_manage">'+
                                       '<p class="label_name">Property for</p>'+
                                       '<p class="details_label">'+this.request_for+'</p>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row prop_detail">'+	
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Price</p>'+
                                       '<p class="details_label">₹ '+commaNum+' </p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Area</p>'+
                                       '<p class="details_label">'+this.super_area+' Sq. ft.</p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Verified</p>'+
                                       '<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/verified.svg';  ?>" width="16"> 15 Bells</p>'+
                                   '</div>'+
                                   '<div class="col-md-3 company_overview property_manage">'+
                                       '<p class="label_name">Availability</p>'+
                                       '<p class="details_label">'+this.availability.replace(/_/g,' ').charAt(0).toUpperCase() + this.availability.replace(/_/g,' ').slice(1)+'</p>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row prop_detail">'+
                               '<div class="col-md-6 amenities_offered">'+
                                   '<p class="label_name amenities">Amenities</p>'+
                                   '<ul class="amenities_list">'+
                                       '<li class=""><img width="18" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="17" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/fire.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="11" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amen_icon"></li>'+
                                       '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amen_icon"></li>'+
                                   '</ul>'+
                               '</div>'+
                               '<div class="col-md-6 shortlist_call">'+
                               '<img src="'+imaged+'" id="test_'+this.id+'" class="test" onclick="changes('+this.id+');" />'+
                               ((this.county > 0) ?
                               '<button  class="btn btn-default short_butn">Already Scheduled</button>'
                                  :
                               '<button id="sitevisitremove_'+this.id+'" onclick="sitevisitproperties('+this.id+');" class="btn btn-default short_butn">Schedule Visit</button>'
                               )+                               '</div>'+
                               '</div>'+
                               '</div>'+
                           '</div>'+
                           
                   '</div>'); 
                    //  var x=3;
                    //  $('.property_detail').hide();
                    //  $('#getprop .property_detail:lt('+x+')').show();  

                    // $('#loadMore').click(function () {
                    // x= (x+5 <= countprop) ? x+5 : countprop;
                    // $('#getprop .property_detail:lt('+x+')').show();
                    // }); 

                     
          
                                                       
   
                                                   });
                                                   
                                     
   
                                               }else{
                                               toastr.warning('Please Enter Specific Locality', 'warning');
                                               } 
                                               
                                               },
   
   
   
                                                   });

                              }  if(types == 'polygon'){

                                ndata = {location:getsearchlocation,town:town,sector:sectore,newpath:geometry,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym,whichserch:whichserch,foodexpectid:foodexpectid,food:food}; 
                                          
                                          $.ajax({
                                                   type: "POST",
                                                   url: 'getpolymy',
                                                   data: ndata,
                                                   success: function (data) {
                                                     
                                                   
                                              // $('#search-pro').css("display","block");
                                                       var obj = $.parseJSON(data);
                                                       $(".serch_rslt").show();
                                                       var countprop = Object.keys(obj).length;                                                        
                                                       $('#countprop').html('');
                                                       
                                                       bindButtonClick(obj);

                                                       $.each(obj, function (index) {
                                                        
                                                       var lati = this.latitude;
                                                       var long = this.longitude;
                                                       var curPosition = new google.maps.LatLng(lati,long);
                                                       var triangleCoords = geometry;
                              
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
                       
                       
            var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.town_name + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                       
           var haritid = 273*179-this.id;
           var propsid = 'PR'+ haritid;
           var commaNum = this.expected_price;
           var imageds = $.trim(this.featured_image);
           var imaged;
           (this.county1 == '1' ? imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>":imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");
          
               $('#getprop').append('<div class="col-md-12">'+
               '<p class="property_id">Property ID : '+propsid+' <span class="building_name">'+this.locality.substr(0,this.locality.indexOf(','))+'</span></p>'+
                           '<div class="row single_property">'+
                               '<div class="col-md-2 no_pad relative">'+
                               '<a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '&user_id='+food+'&l_id='+foodlead+'&e_id='+foodexpectid+'" target="_blank"> <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imageds)+'" class="img-responsive image_property"></a>'+
                                //    '<div class="overlay_sign">'+
                                //        '<p class="sign_click"><span class="color_orange">Login</span> or <span class="color_orange">Sign</span> up to view this property</p>'+
                                //    '</div>'+
                               '</div>'+
                               '<div class="col-md-10">'+
                                   '<div class="row prop_detail">'+
                                       '<div class="col-md-6 company_overview property_manage">'+
                                           '<p class="label_name">Location</p>'+
                                           '<p class="details_label">'+this.sector_name+' , '+this.town_name+'</p>'+
                                       '</div>'+
                                       '<div class="col-md-6 company_overview property_manage">'+
                                           '<p class="label_name">Property for</p>'+
                                           '<p class="details_label">'+this.request_for+'</p>'+
                                       '</div>'+
                                   '</div>'+
                                   '<div class="row prop_detail">'+	
                                       '<div class="col-md-3 company_overview property_manage">'+
                                           '<p class="label_name">Price</p>'+
                                           '<p class="details_label">₹ '+commaNum+' </p>'+
                                       '</div>'+
                                       '<div class="col-md-3 company_overview property_manage">'+
                                           '<p class="label_name">Area</p>'+
                                           '<p class="details_label">'+this.super_area+' Sq. ft.</p>'+
                                       '</div>'+
                                       '<div class="col-md-3 company_overview property_manage">'+
                                           '<p class="label_name">Availability</p>'+
                                           '<p class="details_label">'+this.availability.replace(/_/g,' ').charAt(0).toUpperCase() + this.availability.replace(/_/g,' ').slice(1)+'</p>'+
                                       '</div>'+
                                       '<div class="col-md-3 company_overview property_manage">'+
                                           '<p class="label_name">Verified</p>'+
                                           '<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/verified.svg';  ?>" width="16"> 15 Bells</p>'+
                                       '</div>'+
                                   '</div>'+
                                   '<div class="row prop_detail">'+
                                   '<div class="col-md-6 amenities_offered">'+
                                       '<p class="label_name amenities">Amenities</p>'+
                                       '<ul class="amenities_list">'+
                                           '<li class=""><img width="18" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amen_icon"></li>'+
                                           '<li class=""><img width="17" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/fire.svg';  ?>" class="amen_icon"></li>'+
                                           '<li class=""><img width="11" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amen_icon"></li>'+
                                           '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amen_icon"></li>'+
                                           '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amen_icon"></li>'+
                                           '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amen_icon"></li>'+
                                       '</ul>'+
                                   '</div>'+
                                   '<div class="col-md-6 shortlist_call">'+
                                   '<img src="'+imaged+'" id="test_'+this.id+'" class="test" onclick="changes('+this.id+');" />'+
                               ((this.county > 0) ?
                               '<button  class="btn btn-default short_butn">Already Scheduled</button>'
                                  :
                               '<button id="sitevisitremove_'+this.id+'" onclick="sitevisitproperties('+this.id+');" class="btn btn-default short_butn">Schedule Visit</button>'
                               )+                                   '</div>'+
                                   '</div>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row">'+
                                   
                               '</div>'+
                       '</div>'); 
                                                       }
                                                      
                                                       
                                                             

                                                       });

                                                       if(count1 ==0){
                                                           $('#countprop').html(0);
                                                       }else{
                                                       $('#countprop').html(count1);
                                                       }
                                                       
                                       

                                                   },
                                               });
                              }


                               if(types == 'circle'){

                                var pieces =  geometry.split(/[\s,]+/);
                                
                                var latt  =  pieces[pieces.length-2]; 
                              
                                var longg  =  pieces[pieces.length-1]; 
                                           
                                           // toastr.success('Your Search Criteria has Successfully Saved', 'success');
   
                                                $.ajax({
                                                       type: "POST",
                                                       url: 'mapproperty1',
                                                       data: {location:getsearchlocation,center:geometry,totalradius:totalradiuss,shapes:types,town:town,sector:sectore,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym,whichserch:whichserch,foodexpectid:foodexpectid,food:food},
                                                       success: function (data) {
                                                       
                                                   
                                                           var obj = $.parseJSON(data);
                                                          // $(".serch_rslt").show();
                                                           var countprop = Object.keys(obj).length;
                                                                                                               
                                                          // $('#countprop').html(countprop);
                                                           
                                                           bindButtonClick(obj);
   
                                                           $.each(obj, function (index) {
                                                               
                                                               var lati = this.latitude;
                                                               var long = this.longitude;
                                                               
                                                               
                                                               var curPosition = new google.maps.LatLng(lati,long);
                                                              
   
                   
                                                               var radius =  parseInt(totalradiuss);              
                                                               var townCenter = new google.maps.LatLng(latt,longg);
                                                              // alert(townCenter);
                                                        var circleOptions = {
                                                               strokeColor: '#FF0000',
                                                               strokeOpacity: 0.8,
                                                               strokeWeight: 2,
                                                               fillColor: '#FF0000',
                                                               fillOpacity: 0.25,
                                                               map: map,
                                                               center: townCenter,
                                                               editable: true,
                                                               // draggable: true,
                                                               radius: radius
                                                               };
                                                              // circle.setMap(null);
                                                              var  circle = new google.maps.Circle(circleOptions);
                                                                if(circle.getBounds().contains(curPosition)){
                                                                   //circle.setMap(null);
   
                                                                count2 += 1; 
                                                                var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.town_name + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                                              
                                                                var haritid = 273*179-this.id;
           var propsid = 'PR'+ haritid;
           var commaNum = this.expected_price;
           var imageds = $.trim(this.featured_image);
           var imaged;
           (this.county1 == '1' ? imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>":imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");
          
                   
                                                $('#getprop').append('<div class="col-md-12 property_detail">'+
                                                '<p class="property_id">Property ID : '+propsid+' <span class="building_name">'+this.locality.substr(0,this.locality.indexOf(','))+'</span></p>'+
                          '<div class="row single_property">'+
                              '<div class="col-md-2 no_pad relative">'+
                              '<a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '&user_id='+food+'&l_id='+foodlead+'&e_id='+foodexpectid+'" target="_blank"> <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imageds)+'" class="img-responsive image_property"></a>'+
                                //   '<div class="overlay_sign">'+
                                //       '<p class="sign_click"><span class="color_orange">Login</span> or <span class="color_orange">Sign</span> up to view this property</p>'+
                                //   '</div>'+
                              '</div>'+
                              '<div class="col-md-10">'+
                                  '<div class="row prop_detail">'+
                                      '<div class="col-md-6 company_overview property_manage">'+
                                          '<p class="label_name">Location</p>'+
                                          '<p class="details_label">'+this.sector_name+' , '+this.town_name+'</p>'+
                                      '</div>'+
                                      '<div class="col-md-6 company_overview property_manage">'+
                                          '<p class="label_name">Property for</p>'+
                                          '<p class="details_label">'+this.request_for+'</p>'+
                                      '</div>'+
                                  '</div>'+
                                  '<div class="row prop_detail">'+	
                                      '<div class="col-md-3 company_overview property_manage">'+
                                          '<p class="label_name">Price</p>'+
                                          '<p class="details_label">₹ '+commaNum+' </p>'+
                                      '</div>'+
                                      '<div class="col-md-3 company_overview property_manage">'+
                                          '<p class="label_name">Area</p>'+
                                          '<p class="details_label">'+this.super_area+' Sq. ft.</p>'+
                                      '</div>'+
                                      '<div class="col-md-3 company_overview property_manage">'+
                                          '<p class="label_name">Verified</p>'+
                                          '<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/verified.svg';  ?>" width="16"> 15 Bells</p>'+
                                      '</div>'+
                                      '<div class="col-md-3 company_overview property_manage">'+
                                          '<p class="label_name">Availability</p>'+
                                          '<p class="details_label">'+this.availability.replace(/_/g,' ').charAt(0).toUpperCase() + this.availability.replace(/_/g,' ').slice(1)+'</p>'+
                                      '</div>'+
                                  '</div>'+
                                  '<div class="row prop_detail">'+
                                  '<div class="col-md-6 amenities_offered">'+
                                      '<p class="label_name amenities">Amenities</p>'+
                                      '<ul class="amenities_list">'+
                                          '<li class=""><img width="18" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="17" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/fire.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="11" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amen_icon"></li>'+
                                      '</ul>'+
                                  '</div>'+
                                  '<div class="col-md-6 shortlist_call">'+
                                  '<img src="'+imaged+'" id="test_'+this.id+'" class="test" onclick="changes('+this.id+');" />'+
                               ((this.county > 0) ?
                               '<button  class="btn btn-default short_butn">Already Scheduled</button>'
                                  :
                               '<button id="sitevisitremove_'+this.id+'" onclick="sitevisitproperties('+this.id+');" class="btn btn-default short_butn">Schedule Visit</button>'
                               )+                                  '</div>'+
                                  '</div>'+
                                  '</div>'+
                              '</div>'+
                              
                      '</div>'); 
                                                           }
                                                               
                                                         
                                                           });
                                                           if(count2 ==0){
                                                               $('#countprop').html(0);
                                                           }else{
                                                           $('#countprop').html(count2);
                                                           }
                                                           
                                           
   
                                                       },
                                                   });
                                             }
                                                   
                                                   
                                     if(types == 'rectangle'){
   

                                                $.ajax({
                                                       type: "POST",
                                                       url: 'mapproperty2',
                                                       data: {northlat:northlat,southlat:southlat,northlng:northlng,southlng:southlng,location:getsearchlocation,shapes:types,town:town,sector:sectore,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym,whichserch:whichserch,foodexpectid:foodexpectid,food:food},
                                                       success: function (data) {
                                                    
                                                         // $('#search-pro').css("display","block");
                                                           var obj = $.parseJSON(data);
                                                           //$(".serch_rslt").show();
                                                           var countprop = Object.keys(obj).length;                                                        
                                                           //$('#countprop').html(countprop);
                                                           
                                                           bindButtonClick(obj);
                                                              
                                                           $.each(obj, function (index) {
                                                               
                                           var lati = this.latitude;
                                           var long = this.longitude;
                                           var curPosition = new google.maps.LatLng(lati,long);  
   
                    //var rectanglecoordinates = '{"north": '+northlat+',"south":'+ southlat+',"east": '+northlng+',"west": '+southlng+' }';
                  
   
                                     var newkuma = geometry;
                                     
                                     var   rectangle = new google.maps.Rectangle({
                                       strokeColor: '#FF0000',
                                       strokeOpacity: 0.8,
                                       strokeWeight: 2,
                                       fillColor: '#FF0000',
                                       fillOpacity: 0.35,
                                       editable: true,
                                       //draggable: true,
                                       map: map,
                                       bounds: newkuma
                                       });
   
                                                                
                                       var haritid = 273*179-this.id;
           var propsid = 'PR'+ haritid;
           var commaNum = this.expected_price;
           var imageds = $.trim(this.featured_image);
           var imaged; 
           (this.county1 == '1' ? imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>":imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");
          
   
                                         rectangle.setMap(null);
                                          if(rectangle.getBounds().contains(curPosition)){
                  
                                          
                                         count3 += 1;                      
                   
                                         $('#getprop').append('<div class="col-md-12 property_detail">'+
                                         '<p class="property_id">Property ID : '+propsid+' <span class="building_name">'+this.locality.substr(0,this.locality.indexOf(','))+'</span></p>'+
                          '<div class="row single_property">'+
                              '<div class="col-md-2 no_pad relative">'+
                              '<a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '&user_id='+food+'&l_id='+foodlead+'&e_id='+foodexpectid+'" target="_blank"> <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imageds)+'" class="img-responsive image_property"></a>'+
                                //   '<div class="overlay_sign">'+
                                //       '<p class="sign_click"><span class="color_orange">Login</span> or <span class="color_orange">Sign</span> up to view this property</p>'+
                                //   '</div>'+
                              '</div>'+
                              '<div class="col-md-10">'+
                                  '<div class="row prop_detail">'+
                                      '<div class="col-md-6 company_overview property_manage">'+
                                          '<p class="label_name">Location</p>'+
                                          '<p class="details_label">'+this.sector_name+' , '+this.town_name+'</p>'+
                                      '</div>'+
                                      '<div class="col-md-6 company_overview property_manage">'+
                                          '<p class="label_name">Property for</p>'+
                                          '<p class="details_label">'+this.request_for+'</p>'+
                                      '</div>'+
                                  '</div>'+
                                  '<div class="row prop_detail">'+	
                                      '<div class="col-md-3 company_overview property_manage">'+
                                          '<p class="label_name">Price</p>'+
                                          '<p class="details_label">₹ '+commaNum+' </p>'+
                                      '</div>'+
                                      '<div class="col-md-3 company_overview property_manage">'+
                                          '<p class="label_name">Area</p>'+
                                          '<p class="details_label">'+this.super_area+' Sq. ft.</p>'+
                                      '</div>'+
                                      '<div class="col-md-3 company_overview property_manage">'+
                                          '<p class="label_name">Verified</p>'+
                                          '<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/verified.svg';  ?>" width="16"> 15 Bells</p>'+
                                      '</div>'+
                                      '<div class="col-md-3 company_overview property_manage">'+
                                          '<p class="label_name">Availability</p>'+
                                          '<p class="details_label">'+this.availability.replace(/_/g,' ').charAt(0).toUpperCase() + this.availability.replace(/_/g,' ').slice(1)+'</p>'+
                                      '</div>'+
                                  '</div>'+
                                  '<div class="row prop_detail">'+
                                  '<div class="col-md-6 amenities_offered">'+
                                      '<p class="label_name amenities">Amenities</p>'+
                                      '<ul class="amenities_list">'+
                                          '<li class=""><img width="18" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="17" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/fire.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="11" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amen_icon"></li>'+
                                          '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amen_icon"></li>'+
                                      '</ul>'+
                                  '</div>'+
                                  '<div class="col-md-6 shortlist_call">'+
                                  '<img src="'+imaged+'" id="test_'+this.id+'" class="test" onclick="changes('+this.id+');" />'+
                               ((this.county > 0) ?
                               '<button  class="btn btn-default short_butn">Already Scheduled</button>'
                                  :
                               '<button id="sitevisitremove_'+this.id+'" onclick="sitevisitproperties('+this.id+');" class="btn btn-default short_butn">Schedule Visit</button>'
                               )+                                                '</div>'+
                                  '</div>'+
                                  '</div>'+
                              '</div>'+
                              
                      '</div>'); 
           }
                                                               
                                                                 
                                                               
   
                                                           });
                                                           
                                                           if(count3 ==0){
                                                               $('#countprop').html(0);
                                                           }else{
                                                           $('#countprop').html(count3);
                                                           }
                                          
   //
                                                       },
                                                   });
                                                 
                                     } 
   
   
                                           } 




     function shortlistproperties(id){

  
    
    var shaped =  getpolyshapes;
    var newspaths = pathstr;
    var locations = getsearchlocation;

    
    
    if(shaped == 'polygon'){
    ndata = {shaped:shaped,newspaths : newspaths,locations: locations,propid:id,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym}; 
    }
    if(shaped == 'circle'){
    ndata = {shaped:shaped,centercoordinates : centercoordinates,totalradius: totalradius,locations: locations,propid:id,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym}; 
    }
    if(shaped == 'rectangle'){
    ndata = {shaped:shaped,northlat: northlat,southlat: southlat,northlng: northlng,southlng : southlng,locations: locations,propid:id,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym}; 
    }
    if(pathstr == '' && centercoordinates == '' && northlat == ''){
         shaped = 'blank';
    ndata = {shaped:shaped,locations: locations,propid:id,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym}; 
    }

        $.ajax({
                type: "POST",
                url:  'shortlistproperties',
                data: ndata,
                success: function (data) {


                    if(data == 'existuser'){

                    window.location.replace("searches");

                    }else if(data == 'nouser'){
                            
                       $('#signup_modal').modal('show');
                   // window.location.replace("<?= Yii::getAlias('@frontendUrl').'/user/sign-in/signup';  ?>");

                    }else{
                    toastr.error('Some Internal Error', 'warning');
                    }
                    
                    
                },
            });

                

 }  




 function shortlistpropertiesready(id){



    var types  = $('#type').val();                               
    var town  = $("#towns").val(); 
    var sector  = $("#sectors").val(); 
    var  country  = $("#countrys").val();
    var areaft = $("#propsquares").val();                                            
    var areamin = $("#propareaminimums").val();
    var areamax = $("#propareamaximums").val();
    var pricemin = $("#proppriceminimums").val();
    var pricemax = $("#proppricemaximums").val();
    var proptype =  $('#proptypes').val();
    var propbid =  $('#propbid').val();
    var availabilitym =  $('#availabilitym').val();
    var totalradiuss =  $('#radius').val();
    var geometry  = <?php echo $geometry; ?>;
    var locations = "<?php echo $getlocality; ?>";

                       
    
    if(types == 'polygon'){

        var newgeometry = JSON.stringify(geometry);
    ndata = {shaped:types,newspaths : newgeometry,locations: locations,propid:id,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym}; 
    }
    if(types == 'circle'){
    ndata = {shaped:types,centercoordinates : geometry,totalradius: totalradiuss,locations: locations,propid:id,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym}; 
    }
    if(types == 'rectangle'){
    ndata = {shaped:types,rectanglecoordinates:geometry,locations: locations,propid:id,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym}; 
    }
    if(types == ''){
        types = 'blank';
    ndata = {shaped:types,locations: locations,propid:id,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid,availabilitym:availabilitym}; 
    }

        $.ajax({
                type: "POST",
                url:  'shortlistpropertiesready',
                data: ndata,
                success: function (data) {


                    if(data == 'existuser'){

                    window.location.replace("searches");

                    }else if(data == 'nouser'){
                            
                       $('#signup_modal').modal('show');
                   // window.location.replace("<?= Yii::getAlias('@frontendUrl').'/user/sign-in/signup';  ?>");

                    }else{
                    toastr.error('Some Internal Error', 'warning');
                    }
                    
                    
                },
            });

                

 }      




function paymentgateway(orderid){


var placementid = orderid;
var kamount_payable = $('#kamount_payable').val();
var krequestids = $('#krequestids').val();  


if(krequestids != ''){

$.ajax({
                           type: "POST",
                           url: '/request-sitevisit/paymentgateway',
                           
                           
                           data: {orderid: placementid,krequestids:krequestids,kamount_payable:kamount_payable},
                          
                           success: function (data) { 

                             if(data == '1'){

                                 alert('Payment Successully done');

                              // window.location.href = urlsd +'/request-sitevisit';  
                               //location.href = "https://15bells.com/frontend/web/request-sitevisit";
                             }else{
                               toastr.error('Some Internal Error', 'error'); 
                             }
                           }
               });

 }
}


  function changes(id) {
 
 var    img1    =    "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>";
 var    img2 = "<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>";
var imgElement = $('#test').attr('src');


//    if(imgElement == img1){


//            $('#test').attr('src',"<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");

//    }else{

//           $('#test').attr('src',"<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>");
//    }


            $.ajax({
                                               type: "POST",
                                             url: 'saveprop',
                                             data: {hardam: id,food:food},
                                             success: function (data) {
                                           
                                             if(data == '1'){
                                                 $('#test_'+id).attr('src',"<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");
                                                 
                                             toastr.error('This Property removed from shortlist','error');    
                                             }else{

                                                 $('#test_'+id).attr('src',"<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>");

                                                 toastr.success('Property Shortlisted Successfully','success');   
                                             }
                                             },
                  });

} 



function sitevisitproperties(id){

   

var haritid = 273*179-id;
var propsid = 'PR'+ haritid;

$('#propsidpopup').html(propsid);
$("#myModalnew").modal('show');

$('#sitevisitprop').val(id);
//var newhtml = $('#appendid_'+id).html();

       $.ajax({
        type: "POST",
        url: 'getsitevisitlocation',
        data: {hardam: id},
        success: function (data) {

           // alert(data);
            var obj = $.parseJSON(data);
            
            $('#sitevisitlocation').html(obj.locality);
           // $('#sitevisitarea').html(obj.super_area);
            //$('#sitevisitprice').html(obj.expected_price);
    
        },
                  });

var today = new Date();

$("#rantime").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd',
     minDate: 1 // set the minDate to the today's date
    // you can add other options here
});


}


var food;
 var foodexpectid;
 var foodlead;
 var whichserch ='';

$(document).ready(function () { 


var first = getUrlVars()["type"];

if(first == 'office-space'){                                        

$('#proptypes').val('11,12,13,14');

}

if(first == 'retail-space'){                                        

$('#proptypes').val('15,16,17,18');

}

if(first == 'industrial-plots'){                                        

$('#proptypes').val('19,22,23,24');

}

if(first == 'warehouse'){                                        

$('#proptypes').val('25,26');

}                                      

 food = getUrlVars()["id"];
 foodexpectid = getUrlVars()["e_id"];
 foodlead = getUrlVars()["l_id"];




withoutshape();
$('#secondshow').hide();


         });



         function getUrlVars()
{
var vars = [], hash;
var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
for(var i = 0; i < hashes.length; i++)
{
hash = hashes[i].split('=');
vars.push(hash[0]);
vars[hash[0]] = hash[1];
}
return vars;
}

                                      





                                        
                                 function calculateDistance(lat1, lon1, lat2, lon2) {
                                  
                                            var radlat1 = Math.PI * lat1/180
                                            var radlat2 = Math.PI * lat2/180
                                            var radlon1 = Math.PI * lon1/180
                                            var radlon2 = Math.PI * lon2/180
                                            var theta = lon1-lon2
                                            var radtheta = Math.PI * theta/180
                                            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                                            dist = Math.acos(dist)
                                            dist = dist * 180/Math.PI
                                            dist = dist * 60 * 1.1515
                                           
                                            return dist
                                            }        
                                        
                                        
                               function bindButtonClick(obj){
                           
                                      $('.sortby').click(function(){

                                        
                                        
                                       var ferit = 0;  
                                       var sortvar =  this.id; 
                                       var searchlat = $('#searchlats').val();
                                       var searchlng = $('#searchlngs').val();
                                     
                                       
                                       if(sortvar != ''){
                                           
                                          if(sortvar == 'low'){
                                              
                                              obj.sort(function(a, b){
                                        return a.expected_price - b.expected_price;
                                        });
                                              
                                          }else if(sortvar == 'high'){
                                              
                                              obj.sort(function(a, b){
                                        return b.expected_price - a.expected_price;
                                        });
                                        
                                          } 
                                          else if(sortvar == 'nearest'){
                                           
                                            ferit = 1;  
                                             for ( i = 0; i < obj.length; i++) {
        obj[i]["distance"] = calculateDistance(searchlat,searchlng,obj[i]["latitude"],obj[i]["longitude"]);
                }

                                        obj.sort(function(a, b) { 
                                            return a.distance - b.distance;
                                            });
                                        
                                          } 
                                          
                                        var countprop = Object.keys(obj).length; 
                                       
                                        $('#getprop').html('');  
                                        
                                        $.each(obj, function (index) {
                                                   
                                                   
                                                       
                                                   // var content =  'A very good '+ this.typename +' availabale for sale in '+ this.town_name + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ';
                                                    
                                                   var imaged = $.trim(this.featured_image);
                                                 //   var c = content.substr(0, showChar);
                                                   // var h = content.substr(showChar-1, content.length - showChar);
                                                   // var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
                                            
                                                    var haritid = 273*179-this.id;
                                                    var propsid = 'PR'+ haritid;
                                                    var commaNum = this.expected_price;
                                                    var imaged;
           (this.county1 == '1' ? imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart.svg';  ?>":imaged="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/heart_e.svg';  ?>");
          
                                                         
                                                    $('#getprop').append('<div class="col-md-12 property_detail">'+
                                                    '<p class="property_id">Property ID : '+propsid+' <span class="building_name">'+this.locality.substr(0,this.locality.indexOf(','))+'</span></p>'+
                                                                '<div class="row single_property">'+
                                                                    '<div class="col-md-2 no_pad relative">'+
                                                                    '<a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '&user_id='+food+'&l_id='+foodlead+'&e_id='+foodexpectid+'" target="_blank"> <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imageds)+'" class="img-responsive image_property"></a>'+
                                                                        // '<div class="overlay_sign">'+
                                                                        //     '<p class="sign_click"><span class="color_orange">Login</span> or <span class="color_orange">Sign</span> up to view this property</p>'+
                                                                        // '</div>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-10">'+
                                                                        '<div class="row prop_detail">'+
                                                                            '<div class="col-md-6 company_overview property_manage">'+
                                                                                '<p class="label_name">Location</p>'+
                                                                                '<p class="details_label">'+this.sector_name+' , '+this.town_name+'</p>'+
                                                                            '</div>'+
                                                                            '<div class="col-md-6 company_overview property_manage">'+
                                                                                '<p class="label_name">Property for</p>'+
                                                                                '<p class="details_label">'+this.request_for+'</p>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                        '<div class="row prop_detail">'+	
                                                                            '<div class="col-md-3 company_overview property_manage">'+
                                                                                '<p class="label_name">Price</p>'+
                                                                                '<p class="details_label">₹ '+commaNum+' </p>'+
                                                                            '</div>'+
                                                                            '<div class="col-md-3 company_overview property_manage">'+
                                                                                '<p class="label_name">Area</p>'+
                                                                                '<p class="details_label">'+this.super_area+' Sq. ft.</p>'+
                                                                            '</div>'+
                                                                            '<div class="col-md-3 company_overview property_manage">'+
                                                                                '<p class="label_name">Verified</p>'+
                                                                                '<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/verified.svg';  ?>" width="16"> 15 Bells</p>'+
                                                                            '</div>'+
                                                                            '<div class="col-md-3 company_overview property_manage">'+
                                                                                '<p class="label_name">Availability</p>'+
                                                                                '<p class="details_label">'+this.availability.replace(/_/g,' ').charAt(0).toUpperCase() + this.availability.replace(/_/g,' ').slice(1)+'</p>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                        '<div class="row prop_detail">'+
                                                                        '<div class="col-md-6 amenities_offered">'+
                                                                            '<p class="label_name amenities">Amenities</p>'+
                                                                            '<ul class="amenities_list">'+
                                                                                '<li class=""><img width="18" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/power.svg';  ?>" class="amen_icon"></li>'+
                                                                                '<li class=""><img width="17" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/fire.svg';  ?>" class="amen_icon"></li>'+
                                                                                '<li class=""><img width="11" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/parking.svg';  ?>" class="amen_icon"></li>'+
                                                                                '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/security.svg';  ?>" class="amen_icon"></li>'+
                                                                                '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/wifi.svg';  ?>" class="amen_icon"></li>'+
                                                                                '<li class=""><img width="20" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lift.svg';  ?>" class="amen_icon"></li>'+
                                                                            '</ul>'+
                                                                        '</div>'+
                                                                        '<div class="col-md-6 shortlist_call">'+
                                                                        '<img src="'+imaged+'" id="test" onclick="changes('+this.id+');" />'+
                               ((this.county > 0) ?
                               '<button  class="btn btn-default short_butn">Already Scheduled</button>'
                                  :
                               '<button id="sitevisitremove_'+this.id+'" onclick="sitevisitproperties('+this.id+');" class="btn btn-default short_butn">Schedule Visit</button>'
                               )+                                                                        '</div>'+
                                                                        '</div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '<div class="row">'+
                                                              
                                                                    '</div>'+
                                                            '</div>'); 
                    //                                         var x=5;
                    //  $('.property_detail').hide();
                    //  $('#getprop .property_detail:lt('+x+')').show();  

                    // $('#loadMore').click(function () {
                    // x= (x+5 <= countprop) ? x+5 : countprop;
                    // $('#getprop .property_detail:lt('+x+')').show();
                    // });  
                                                   
                                                                                                
                                            
                                                                                            });
                                                        
                                        //   showPage(1);    
                                        //   var i;
                                        //   var totals = Math.ceil(countprop/6);
                                          
                                        //    var dynamic = "";   
                                        //    for(i=1;i<=totals;i++){
                                             
                                        //     dynamic += '<li><a href="javascript:void(0)">'+i+'</a></li>';                                           
                                            
                                        //    }
     
                                            
                                        //    $('#paginater').html('');
                                        //    $('#paginater').html('<ol id="pagin" class="paginclass">'+ dynamic+  '</ol>'); 
                                        //     $("#pagin li a").first().addClass("current"); 
                                        //       $("#pagin li a").click(function() {
                                              
                                        //     $("#pagin li a").removeClass("current");
                                        //     $(this).addClass("current");
                                           
                                        //     showPage(parseInt($(this).text())) 
                                        // });
                                                        
                                                        }



                                    
                                              });
                                    }      
                                    
                                    
                                 function filterButtonClick(obj){
                           
                                      $('#filterme').click(function(){
                                       
                                        var areaft = $("#areaft").val();                                            
                                        var areamin = $("#areamin").val();
                                        var areamax = $("#areamax").val();

                                        var pricemin = $("#pricemin").val();
                                        var pricemax = $("#pricemax").val();
                                        var proptype =  $('#proptype').val();  
                                        var propbid =  $('#propbid').val(); 
                                       
                                       // alert(JSON.stringify(obj));
                                           
                                         var narcos = obj.filter(function (a) {                                          
                                          
                                          result = true;  
                                          
                                        if (proptype && (proptype != 'Commercial')) {
                                        result = result && a.project_type_id == proptype;
                                           }
                                           
                                        if (propbid && (propbid != 'Select')) {
                                        result = result && a.request_for == propbid;
                                           }
                                           
                                       if (areamin && (areamin != '')) {
                                        result = result && a.total_plot_area > areamin && a.total_plot_area < areamax ;
                                           }  
                                           
                                       if (pricemin && (pricemin != '')) {
                                        result = result && a.expected_price > pricemin && a.expected_price < pricemax ;
                                           }    

                                        return result;
                                        });  
//                                          
                                        //console.log(find_in_object(obj, query)); //returns none
                                       $(".serch_rslt").show();
                                                        var countprop = Object.keys(narcos).length;                                                        
                                                        $('#countprop').html(countprop);
                                       
                                        $('#getprop').html('');  
                                        
                                         $.each(narcos, function () {
                                                            
                                                            ((this.undercategory == 'Residential') ? 
                                                            content = this.furnished_status +' '+ this.typename +' on '+ this.property_for +' in '+ this.locality + ((this.buildup_area == null) ? ' - plot area : '+ this.total_plot_area +' sqft' : ' - super area : '+ this.buildup_area +' sqft ') + ' - furnishing specification :* bedrooms : '+ this.bedrooms+' * bathrooms : '+ this.bathrooms+' * balconies : '+ this.balconies+' * pooja room : '+ this.pooja_room +' * study_room * servant_room , For more details or Site Visit , please Contact Us..;'
                                                           :
                                                            content =  'A very good '+ this.typename +' availabale for rent/lease in '+ this.town_name + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ' )
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = c + '<span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';

                                                            
                                        $('#getprop').append('<div class="col-md-6 serch_row">'+
                                        '<div class="col-md-12 property_main_div">'+
                                        '<div class="col-md-12 property_main_div_1" style="height:60px">'+
                                        '<div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.town_name  + '</p></div>'+

                                        '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+' / ' + this. property_on_floor + 'th Floor '+ (( this.total_floors == null) ? '' : '(out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/view?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                        '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                        '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-5 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr">'+ 
                                          'Instant Approach</a>'
                                          :
                                        ((this.request_for == 'bid') ?
                                        '<a href="javascript:void(0)" onclick="bititnow(' + this.id + ')">'+ 
                                          'Bid it Now</a>'
                                          : ''
                                         )) +
                                        '</div>'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id)">'+
                                         (this.county > 0 ? 'Site Visited': 'Book Site Visit') +
                                         '</a>'+
                                        '</div>'+
                                        
                                        '<div class="col-md-3 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>');
                                                            

                                                        });
                                                        
                                                        
                                    
                                              });
                                    } 
                                        
                                        
                                        
                               function getsorting(val){
                                               
                                             if(val != 'nosort'){ 
                                              $('#getprop').html('');     
                                                 
                                             $.ajax({
                                                    url: 'getsorting',
                                                    data: {val: val},
                                                    success: function (data) {

                                                    
                                                        var obj = $.parseJSON(data);

                                                        $.each(obj, function () {

                                                          var imaged = $.trim(this.featured_image);
                                                           
                                                            $('#getprop').append('<div class="row">' +
                                                                    ' <div class="col-md-12 borderproperty">' +
                                                                    ' <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/view?id=']) ?>'+this.id+'" target="_blank" ><div class="col-md-3">' +
                                                                    ' <div class="proimage">' +
                                                                    ' <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+imaged+'" alt="..."  title="....">' +
//                                                                    ' <img src="<?= $_SERVER['DOCUMENT_ROOT'].'/newbells/archive/web/propertydefaultimg/'  ?>'+imaged+'" alt="..."  title="....">' +
                                                                    ' </div>' +
                                                                    '</div></a>' +
                                                                    ' <div class="col-md-7">' +
                                                                    '<div class="deatil">' +
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
                                                                    ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Locality : '+ this.locality +'</p>' +
                                                                    ' <p class="highlight">Highlights: On Rent / ' + this.age_of_property + ' Years Old / '+ this.furnished_status +' / ' + this. property_on_floor + ' Floor (out of '+ this.total_floors +')</p>' +
                                                                    '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                    '<p class="aminities">' +
                                                                    '<ul class="list_li">' +
                                                                    '<li><i class="fa fa-building" aria-hidden="true"></i> '+ this.total_plot_area +' sqft</li>' +
                                                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>' +
                                                                    ' <li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>' +
                                                                    ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>' +
                                                                    ' </ul>' +
                                                                    ' </p>' +
                                                                    ' </div>' +
                                                                    ' </div>' +
                                                                    ' <div class="col-md-2">' +
                                                                    '<div class="secure">' +
                                                                    ' <img src="<?= Yii::$app->request->baseUrl . '/img/Sheild.jpg' ?>" >' +
                                                                    ' </div>' +
                                                                    '</div>' +
                                                                    '<div class="col-md-7" style="padding:10px 0;">' +
                                                                    '<div class="btncart text-center">' +
                                                                     ((this.request_for == 'Instant') ?
                                                                            '<button class="btn btn-default col-md- btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true" style="padding-right: 3px;"></i>Instant Approach</button>'
                                                                            :
                                                                            ((this.request_for == 'bid') ?
                                                                                    '<button class="btn btn-default  btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
                                                                                    
                                                                 '<button class="btn btn-success btnsecond" id="' + this.id + '" onclick="getfreevisit(this.id)" type="button">Book Site Visit</button>'+
                                                                '<label style="padding-left:15px;padding-right:15px;position: relative;top: 8px;"><button class="btn btnfirst" id="' + this.id + '" onclick="getchecki(this.id)" type="button" alt="Shortlist property"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button></label>' +

               
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>');

                                                        });

                                                    }
                                                });
                                                }
                                              
                                               
                                               
                                           }

                                        function getParameterByName(name, url) {
                                            if (!url) {
                                                url = window.location.href;
                                            }
                                            name = name.replace(/[\[\]]/g, "\\$&");
                                            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                                                    results = regex.exec(url);
                                            if (!results)
                                                return null;
                                            if (!results[2])
                                                return '';
                                            return decodeURIComponent(results[2].replace(/\+/g, " "));
                                        }


                                       
                                        var user_id = $("#username").val();
                                        

                                        // function getfreevisit(id) {



                                        //     ga("send", "event", "Buyeraction Search Book Site Visit", "Buyeraction Search Book Site Visit", "Buyeraction Search Book Site Visit","Buyeraction Search Book Site Visit");
                                        //     var getexpectationID = $('#expectid').val();
                                            
                                        //     $.ajax({
                                        //         type: "POST",
                                        //         url: 'getfreevisit',
                                        //         data: {hardam: id,getexpectationID:getexpectationID},
                                        //         success: function (data) {
                                              
                                                
                                        //         if(data == '1'){
                                                    
                                                    
                                        //         toastr.success('Request for Site Visit has Successfully placed','success');    
                                        //         }else if(data == '2'){
                                                    
                                        //            toastr.success('Request for Site Visit has Successfully placed','success'); 
                                        //            toastr.warning('Your Free Site Visit Has Already Finished, Please Carry 100 Rs Along with you','warning');    
                                                   
                                        //         }else if(data == '5'){
                                                    
                                        //            toastr.warning('Already Visited For this Site','warning');    
                                                   
                                        //         }else{
                                        //            toastr.error('Internal Error','error');    
                                        //                 }
                                        //         },
                                        //     });

                                        // }
                                        
                                        
                                        
function getfreevisit() {



var id = $('#sitevisitprop').val();

var datetime = $('#rantime').val();
var scheduletime = $('#scheduletime').val();
var visitmode = $('#visitmode').val();
var rantime = datetime +' '+scheduletime;
var amount_payable = 500;


$.ajax({

    type: "POST",
    url: 'getfreevisit',
    data: {hardam: id,rantime:rantime,visitmode:visitmode,food:food},
    success: function (data) {
  
    $('#sitevisitremove_'+id).html('Already Scheduled');
    $('#sitevisitremove_'+id).removeAttr('onclick');
    
    if(data == '1'){
        
        $('#kamount_payable').val(amount_payable);
        $('#krequestids').val(id);

    toastr.success('Request for Site Visit has Successfully placed','success');    
    }else if(data == '2'){

        $('#kamount_payable').val(amount_payable);
        $('#krequestids').val(id);
        
       toastr.success('Request for Site Visit has Successfully placed','success'); 
       toastr.warning('Your Free Site Visit Has Already Finished, Please Carry 500 Rs Along with you','warning');  
       if(visitmode == 'online'){
    $('#acceptidnew').val(id);       
    $("#proceedtopay").modal('show');

 }
     
       
    }else if(data == '5'){
        
       toastr.warning('Already Visited For this Site','warning');    
       
    }else{
       toastr.error('Internal Error','error');    
            }

             

 
    },

    
});


 $("#myModalnew").modal('hide');

 

}



                                        
                                        
                                        function getchecki(id) {
                                            

                                     ga("send", "event", "Buyeraction Search property Shortlist", "Buyeraction Search property Shortlist", "Buyeraction Search property Shortlist","Buyeraction Search property Shortlist");
                                          var expectation_id = $('#expectid').val();
                                            $.ajax({
         				                     	type: "POST",
                                                url: 'saveprop',
                                                data: {hardam: id,expectation_id: expectation_id},
                                                success: function (data) {
                                              
                                                if(data == '1'){
                                                    
                                                toastr.error('This Property is Already Shortlisted','error');    
                                                }else{
                                                    toastr.success('Property Shortlisted Successfully','success');   
                                                }
                                                },
                                            });

                                        }

                                     
                                      function viewproperty(id){
                          
                                        ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");
                               if(id != ''){  
                                   
                                    $.ajax({
                                            type: "POST",
                                            url: 'viewproperty',
                                            data: {id:id},
                                            success: function (data) {
                                          
                                              
                                            },
                                        });

                                        } 

                          }
                          
                          
                          
                          function viewproperty1(id){
                          
                               if(id != ''){  
                                   
                                    $.ajax({
                                            type: "POST",
                                            url: 'viewproperty',
                                            data: {id:id},
                                            success: function (data) {
                                           
                                              
                                            },
                                        });

                                        } 

                          }
                          
                                 

                                       
                                        function residfilter1() {

                                            $('#getprop').html('');
                                            var commlocation = $("#commlocation").val();
                                            var commtype = $("#commtype").val();
                                            var commprice = $("#commprice").val();
                                            var commtypename = $("#commtypename").val();



                                            $.ajax({
                                                url: 'residfilter1',
                                                data: {commlocation: commlocation, commtype: commtype, commprice: commprice, commtypename: commtypename},
                                                success: function (data) {
                                                   
                                                    var obj = $.parseJSON(data);

                                                    $.each(obj, function () {

                                                        $('#getprop').append('<div class="row">' +
                                                                ' <div class="col-md-12 borderproperty">' +
                                                                ' <div class="col-md-3">' +
                                                                ' <div class="proimage">' +
                                                                ' <img src="<?= Yii::$app->request->baseUrl . '/img/property1.jpg' ?>" alt="..."  title="....">' +
                                                                ' </div>' +
                                                                '</div>' +
                                                                ' <div class="col-md-7">' +
                                                                '<div class="deatil">' +
                                                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
                                                                ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                '<p class="aminities">' +
                                                                '<ul>' +
                                                                '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>' +
                                                                '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>' +
                                                                ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>' +
                                                                ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>' +
                                                                ' </ul>' +
                                                                ' </p>' +
                                                                ' </div>' +
                                                                ' </div>' +
                                                                ' <div class="col-md-2">' +
                                                                '<div class="secure">' +
                                                                ' <img src="<?= Yii::$app->request->baseUrl . '/img/Sheild.jpg' ?>" >' +
                                                                ' </div>' +
                                                                '</div>' +
                                                                '<div class="col-md-7" style="padding:10px 0;">' +
                                                                '<div class="btncart">' +
                                                                ((this.requestfor == 'Instant') ?
                                                                        '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                        '<i class="fa fa-shopping-cart" aria-hidden="true" style="padding-right: 3px;"></i>Instant Approach</button>'
                                                                        :
                                                                        ((this.requestfor == 'bid') ?
                                                                                '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow1(' + this.id + ')">' +
                                                                                '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                : ''
                                                                                )) +
//                                                                '<label style="padding-left:115px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki5(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                    '<label style="padding-left:80px;"><button class="btn pull-right btnfirst" id="' + this.id + '" onclick="getchecki5(this.id)" type="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button><span class="short_list">Shortlist</span></label>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>');

                                                    });

                                                },
                                            });
                                        }


                                        function bititnow(id) {

                                            $.ajax({
                                                type: "POST",
                                                url: 'bititnow',
                                                data: {propertyid: id},
                                                success: function (data) {
                                                 

                                                    if (data == '1') {
                                                        toastr.warning('Profile status is Pending', 'warning');
                                                    }
                                                    else if (data == '2') {
                                                       toastr.warning('Please upload your KYC documents', 'warning');
                                                    }
                                                    else if (data == '3') {
                                                        toastr.warning('Your KYC documents not approved yet', 'warning');
                                                    }
                                                    else if (data == '4') {
                                                         toastr.success('Your Request for this Bid has Successfully send', 'success');
                                                    }
                                                    else if (data == '5') {
                                                        toastr.error('Already Send Request For Bid', 'error');
                                                    }
                                                   
                                                    else {
                                                        toastr.error('Internal Error', 'error');
                                                    }

                                                },
                                            });

                                        }

                                        function directitnow(id) {


                                        ga("send", "event", "Buyeraction Search Property InstantApproach", "Buyeraction Search Property InstantApproach", "Buyeraction Search Property InstantApproach","Buyeraction Search Property InstantApproach");


                                           $.ajax({
                                               
                                                type: "POST",
                                                url: 'directitnow',
                                                data: {propertyid: id},
                                                success: function (data) {
                                                 

                                                    if (data == '1') {
                                                        toastr.warning('Profile status is Pending', 'warning');
                                                    }
                                                    else if (data == '2') {
                                                        toastr.warning('Please upload your KYC documents', 'warning');
                                                    }
                                                    else if (data == '3') {
                                                        toastr.warning('Your KYC documents not approved yet', 'warning');
                                                    }
                                                    else if (data == '4') {
                                                         toastr.success('Your Request for this Direct Approach has Successfully send', 'success');
                                                    }
                                                    else if (data == '5') {
                                                        toastr.error('Already Send Request For Direct Approach', 'error');
                                                    }
                                                   
                                                    else {
                                                        toastr.error('Internal Error', 'error');
                                                    }

                                                },
                                            });

                                        }



                    function getexpecprop(id){
                                         $('#getprop').html('');
                                           
                                            $.ajax({
                                                url: 'myexpectations',
                                                data: {id:id},
                                                success: function (data) {
//                                                    alert(data);
                                                    var obj = $.parseJSON(data);

                                                    $.each(obj, function () {

                                                        $('#getprop').append('<div class="row">' +
                                                                ' <div class="col-md-12 borderproperty">' +
                                                                ' <div class="col-md-3">' +
                                                                ' <div class="proimage">' +
                                                                ' <img src="<?= Yii::$app->request->baseUrl . '/img/property1.jpg' ?>" alt="..."  title="....">' +
                                                                ' </div>' +
                                                                '</div>' +
                                                                ' <div class="col-md-7">' +
                                                                '<div class="deatil">' +
                                                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
                                                                ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                '<p class="aminities">' +
                                                                '<ul>' +
                                                                '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>' +
                                                                '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>' +
                                                                ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>' +
                                                                ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>' +
                                                                ' </ul>' +
                                                                ' </p>' +
                                                                ' </div>' +
                                                                ' </div>' +
                                                                ' <div class="col-md-2">' +
                                                                '<div class="secure">' +
                                                                ' <img src="<?= Yii::$app->request->baseUrl . '/img/Sheild.jpg' ?>" >' +
                                                                ' </div>' +
                                                                '</div>' +
                                                                '<div class="col-md-7" style="padding:10px 0;">' +
                                                                '<div class="btncart">' +
                                                                ((this.requestfor == 'Instant') ?
                                                                        '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                        '<i class="fa fa-shopping-cart" aria-hidden="true" style="padding-right: 3px;"></i>Instant Approach</button>'
                                                                        :
                                                                        ((this.requestfor == 'bid') ?
                                                                                '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow1(' + this.id + ')">' +
                                                                                '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                : ''
                                                                                )) +
                                                                '<label style="padding-left:115px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki5(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>');

                                                    });

                                                },
                                            });
                                        
       
    }
    
    
    function getmoredata(id){
   
  
   if($('#' + id).hasClass( "less" )){
       
			$('#' + id).removeClass("less");
			$('#' + id).html(moretext);
		} else {
                    
                    
			$('#' + id).addClass("less");
			$('#' + id).html(lesstext);
		}
                
                $('#' + id).parent().prev().toggle();
		$('#' + id).prev().toggle();
		return false;
		
   
   }

    function propdetails(id){
           
       window.open('https://www.15bells.com/frontend/web/addproperty/viewsearch?id='+id,'_blank');

         }
 
    function contactus(id){ 
    
        $('#property_gy1').val('');
        $('#property_gy').val(id);
        $('#draggable2').modal('show');
       
    
    }
    
    function savemessage(){
        
           var propid = $('#property_gy').val();
           var textarew = $.trim($('#property_gy1').val());
           if(textarew != ''){  
           $('#draggable2').modal('hide');
           $.ajax({                             
                                                type: "POST",
                                                url: 'savemessages',
                                                data: {propid:propid,textarew:textarew},
                                                success: function (data) {
                                                 //alert(data);   
                                                  if(data == '1'){
                                                   toastr.success('Your Message has Successfully sent', 'success');   
                                                  }else{
                                                   toastr.error('Server Error', 'error');   
                                                  }  
                                                },
                                            });
                  
        }else{
            toastr.error('Please Enter Something', 'error');
            
        }
     
    }


</script>

<script>
    
    $(document).ready(function(){
        $("#modalButton").click(function(){
			$("#modal").modal('show');
			$("#modal").css({"opacity": "1","background": "rgba(0, 0, 0, 0.57)"});
		});
      
      
    });
    
    
    
    function changeAccept() {
       
		
		$('#draggable2').modal('show');
}	
    
</script>