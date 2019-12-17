<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\editable\EditableAsset;
use yii\db\Query;
use common\models\CompanyEmp;
use common\models\User;
use common\models\Emd_details;



EditableAsset::register($this);

use kartik\editable\EditablePjaxAsset;

EditablePjaxAsset::register($this);

use kartik\popover\PopoverXAsset;

PopoverXAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Emds';
$this->params['breadcrumbs'][] = $this->title;
$datas =  $dataProvider->query->all();

?>



<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>


<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Auction EMD</h2>
					</div>
					
			

				<!-- <div class="col-md-6 text-right addprop_button">
						<div class="dropdown filter_drop">
											<button id="dLabel" class="dropdown-select" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Filter
											<span class="caret_filter"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/down.svg';  ?>" width="18" class="svg_drop"></span>
											</button>
                                            
    

										  <ul class="dropdown-menu User_role" aria-labelledby="dLabel">
                                          <form method="post">
																						<input name="progress" class="sort_list" type="submit" value="In Progress">
                                            <input name="progress" class="sort_list" type="submit" value="Completed">
                                          </form>
											<!-- <li></li> -->
										  <!-- </ul> -->
                                         
									<!-- </div> -->
					<!-- </div> -->
					</div>
                <?php foreach ($datas as $data){ 

								$viewid  =  $data->property_id; 
								$payment_status  =  $data->payment_status;  
								$emdid  =  $data->id;                
								
                $haritid = 273*179-$viewid;
                $propsid = 'PR'. $haritid;

                $addproperty = \common\models\Addproperty::find()->where(['id' => $viewid])->one();
                $project_type_id = $addproperty->project_type_id;
                $property_for = $addproperty->property_for;
                $expected_price = $addproperty->expected_price;
                $asking_rental_price = $addproperty->asking_rental_price;

                $reserve_price  =  ($property_for == 'rent' ? $asking_rental_price : $expected_price);

                

                $property_type = \common\models\PropertyType::find()->where(['id' => $project_type_id])->one();
                $querys = CompanyEmp::find()->where(['id'=>$data->assigned_to_id])->one();
                 $assigned_id = $querys->userid;

                $users = User::find()->where(['id'=>$assigned_id])->one();
                                    
                    ?>
				<div class="col-md-12 property_detail">
					<p class="property_id">Property ID : <?php echo $propsid; ?>


										<?php 

										if($payment_status=='pay_now' || $payment_status=='pending'){
					$model = new Emd_details();      
									

					$model = Emd_details::find()->where(['emd_id'=>$emdid])->one();
								if($model){

										?>
				  <a href="javascript:void(0)" onclick="emd_process(<?php echo $emdid; ?>)" ><span class="building_name">Emd-Processing</span></a>

								<?php }else{ ?>
								
									<a href="javascript:void(0)" onclick="emd_pay(<?php echo $emdid; ?>)" ><span class="building_name">Emd-details</span></a>
								
								<?php }  } else if($payment_status == 'paid') { ?>

										<a href="javascript:void(0)" ><span class="building_name">Emd-paid</span></a>
								<?php }else { ?>

							<a href="javascript:void(0)" onclick="emd_pay(<?php echo $emdid; ?>)" ><span class="building_name">Emd-details</span></a>
								<?php } ?>
          </p>
					
							<div class="col-md-12 visit_buyer">
								<div class="row">
									<div class="col-md-4 agent_det">
											<div class="row">
												<div class="col-md-5">
													<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/team/t2.jpg';  ?>" width="60">
												</div>
												
												<div class="col-md-7 no_pad">
												<h3 class="user_name"><?php echo $users->fullname; ?></h3>
												<p class="user_id" style="margin:0;">UID<?php echo $assigned_id * 23 * 391; ?></p>
												</div>
											</div>
										<div class="row" style="margin-top:30px;">
											<p class="user_detail"><i class="fa fa-phone"></i> +91-<?php echo $users->mobile; ?></p>
											<p class="user_detail"><i class="fa fa-envelope"></i> <?php echo $users->email; ?></p>

                      <div class="col-md-5">
                                            <p class="site_txt"><?php echo  date("g:i A", strtotime($created_date)); ?></p>
                                            
											</div>
											<div class="col-md-7 no_pad">
                                            <p class="site_txt"><?php echo  date("F d,Y", strtotime($created_date)); ?></p>
												</div>	
										
										</div>
										
									</div>
                                   
									<div class="col-md-8">
										
										<div class="row">
											<div class="col-md-6 company_overview property_manage">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/building.svg';  ?>" width="16">Type of property</p>
											<p class="label_name"><?php echo $property_type->typename ?></p>
										</div>
										<div class="col-md-6 company_overview property_manage">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/site-visit.svg';  ?>" width="16">Location</p>
											<p class="label_name"><?php echo $addproperty->locality ?></p>
										</div>
										<div class="col-md-6">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/watch.svg';  ?>" width="20">Reserve Price</p>
											<div class="col-md-12">
												<div class="col-md-5 no_pad"><button class="button_select active_butn"><?php echo $reserve_price; ?></button></div>
											</div>
										</div>
										<div class="col-md-6">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/watch.svg';  ?>" width="20">Payment Amount</p>
											<div class="col-md-12">
												<div class="col-md-4 no_pad"><button class="cash_butn active_butn"><?php echo $data->payable_amount; ?></button></div>
											
											</div>
										</div>
										</div>
									</div>
								</div>
								
							</div>

						
				</div>
                <?php } ?>
			</div>
  		</div>
<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog seller_exp modal-lg">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Property Details</h4>
					  </div>
					  <div class="modal-body">
							<div class="container-fluid">
                                               
                                                            
                                                            <div class="row">
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Property for</b><br>
											   <span id="property_for"><?php // echo $getlessorexpec->rent;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Property type</b><br>
											   <span id="typename"><?php // echo $getlessorexpec->rent_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Locality</b><br>
											   <span id="locality"><?php // echo $getlessorexpec->auto_cad_drawing;  ?></span>
											 </div>
										   </div>
										 </div>
									</div>
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Total plot area</b><br>
											   <span id="total_plot_area"><?php // echo $getlessorexpec->site_approval;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Asking rental price</b><br>
											   <span id="asking_rental_price">Rs. <?php // echo $getlessorexpec->wet_points;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Price sq ft</b><br>
											   <span id="price_sq_ft"><?php // echo $getlessorexpec->interest_security;  ?></span>
											 </div>
										   </div>
										 </div>
									</div>
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Maintenance cost</b><br>
											   <span id="maintenance_cost"><?php // echo $getlessorexpec->interest_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Availability</b><br>
											   <span id="availability"><?php // echo $getlessorexpec->agreement;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Available from</b><br>
											   <span id="available_from"><?php // echo $getlessorexpec->agreement_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
									</div>
									
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Possesion by</b><br>
											   <span id="possesion_by"><?php // echo $getlessorexpec->lock_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Buildup area</b><br>
											   <span id="buildup_area"><?php // echo $getlessorexpec->escalation_value;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Carpet area</b><br>
											   <span id="carpet_area"><?php // echo $getlessorexpec->escalation_month;  ?></span>
											 </div>
										   </div>
										 </div>
									   </div>
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Furnished status</b><br>
											   <span id="furnished_status"><?php // echo $getlessorexpec->escalation_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
										 
										 
									</div>
									
									
									
								</div>
                                                        
                                                            
                                                            
                                                            
							</div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>

				  </div>
				</div>
    
    
    <div class="modal fade" id="draggable4" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content data_model">
                <div class="modal-header greenHeader">
                    <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Pay Online</h4>
                </div>

                <div class="modal-body">


                    <!--<form class="form-horizontal" id="registrationForm">-->   
                     <div class="row">
<!-- You can make it whatever width you want. I'm making it full width
on <= small devices and 4/12 page width on >= medium devices -->
<div class="col-xs-12 col-md-12">


<!-- CREDIT CARD FORM STARTS HERE -->
<div class="panel panel-default credit-card-box">
<div class="panel-heading display-table" >
<div class="row display-tr" >
<h3 class="panel-title display-td" style="margin-left: 10px;">Payment Details</h3>
<div class="display-td" >                            
<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
</div>
</div>                    
</div>
<div class="panel-body pader">
<form role="form" id="payment-form">
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label for="cardNumber">CARD NUMBER</label>
<div class="input-group">
<input 
type="tel"
class="form-control"
name="cardNumber"
placeholder="Valid Card Number"
autocomplete="cc-number"
required autofocus 
/>
<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
</div>
</div>                            
</div>
</div>
<div class="row">
<div class="col-xs-7 col-md-7">
<div class="form-group">
<label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
<input 
type="tel" 
class="form-control" 
name="cardExpiry"
placeholder="MM / YY"
autocomplete="cc-exp"
required 
/>
</div>
</div>
<div class="col-xs-5 col-md-5 pull-right">
<div class="form-group">
<label for="cardCVC">CV CODE</label>
<input 
type="tel" 
class="form-control"
name="cardCVC"
placeholder="CVC"
autocomplete="cc-csc"
required
/>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label for="couponCode">COUPON CODE</label>
<input type="text" class="form-control" name="couponCode" />
</div>
</div>                        
</div>
<div class="row">
<div class="col-xs-6">
<button onclick="proceedtobuy()" class="btn btn-success btn-lg btn-block" type="button">Proceed to Checkout</button>
</div>
<div class="col-xs-6">
<button class="btn btn-danger btn-lg btn-block" data-dismiss="modal" value="Cancel">Cancel</button>
</div>
</div>
<div class="row" style="display:none;">
<div class="col-xs-12">
<p class="payment-errors"></p>
</div>
</div>
</form>
</div>
</div>            
<!-- CREDIT CARD FORM ENDS HERE -->


</div>            



</div>    


                    <!--</form>-->
                </div>
                
            </div>
        </div>
    </div>
    

   <div id="emd_deposit" class="modal fade" role="dialog">
    <div class="modal-dialog modal_dialogue modal-lg">

        <!-- Modal content-->
        <div class="modal-content draw_map no_pad">
            <div class="">
                <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
            
            <?php $modeled = new \common\models\Emd_details(); ?>
            
            <?php $form = ActiveForm::begin(['id' => $modeled->formName(),'action'=>"emd_details/create"]); ?>
            
                <div class="container-fluid user_viewed">
                 <div class="row">
                    <p class="confrimation_txt">I have paid an amount of <span class="detail_s">INR 250000000</span> in favour of<span class="detail_s"> Mr. Amit Kumar</span> as per the details.
                 </div>
                 <?php echo $form->field($modeled, 'emd_id')->hiddenInput([])->label(false); ?>
								 <?php echo $form->field($modeled, 'favour_of')->hiddenInput(['value'=>'utr'])->label(false); ?>

                    <div class="row">
                    <ul class="add_property nav nav-pills text-center">
						<li class="active property_steps col-md-6 search_listing no_pad"><a data-toggle="pill" id="utrclick" href="#home" class="categ_selec">UTR Details</a></li>
						<li class="property_steps col-md-6 search_listing no_pad"><a data-toggle="pill" href="#menu1" id="ddclick" class="categ_selec">Demand Draft Details</a></li>
					</ul>
				<div class="tab-content">
				
				  <div id="home" class="tab-pane fade in active">
                             <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">UTR No.</p>
											<p class="label_name">

                      <?php echo $form->field($modeled, 'utr_no')->textInput(['maxlength' => true, 'placeholder' => "999999999999", 'class'=>'form-control input_desgn'])->label(false); ?>


										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">Bank</p>
											<p class="label_name">
                      <?php echo $form->field($modeled, 'utr_bank_name')->textInput(['maxlength' => true, 'placeholder' => "SBI", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                                      <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Branch Name</p>
											<p class="label_name">
                      <?php echo $form->field($modeled, 'utr_bank_branch_name')->textInput(['maxlength' => true, 'placeholder' => "999999999999", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">Date</p>
											<p class="label_name">

                      <?php echo $form->field($modeled, 'utr_date')->textInput(['maxlength' => true, 'placeholder' => "07/09/1992", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                                     
							  
                  </div>
                  <div id="menu1" class="tab-pane fade in">	
                  <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">DD No.</p>
											<p class="label_name">
                      <?php echo $form->field($modeled, 'dd_no')->textInput(['maxlength' => true, 'placeholder' => "999999999999", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">Bank</p>
											<p class="label_name">
                      <?php echo $form->field($modeled, 'dd_bank_name')->textInput(['maxlength' => true, 'placeholder' => "SBI", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                    <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Branch Name</p>
											<p class="label_name">
                      <?php echo $form->field($modeled, 'dd_bank_branch_name')->textInput(['maxlength' => true, 'placeholder' => "New Delhi", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">Date</p>
											<p class="label_name">
                      <?php echo $form->field($modeled, 'dd_date')->textInput(['maxlength' => true, 'placeholder' => "07/09/1992", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                                      
                                      <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Physically Sent <span class="person_name">(Person Name)</span></p>
											<p class="label_name">
                      <?php echo $form->field($modeled, 'person_name')->textInput(['maxlength' => true, 'placeholder' => "Dhanush", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">By Courier <span class="person_name">(Tracking ID)</span></p>
											<p class="label_name">
                      <?php echo $form->field($modeled, 'tracking_id')->textInput(['maxlength' => true, 'placeholder' => "ID12121212", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                                     

							  </div>
                  </div>

                </div>                                     
                <div class="col-md-12 save_profile text-right">
                   <?= Html::submitButton('Save', ['class' => 'save_button']) ?>
							 <!-- <a href="#" class="save_button">Save</a> -->
                                </div>




                    </div>
                   
                   
                </div>
                </div><!-- panel-group -->
                
                
                <?php ActiveForm::end(); ?>

            </div>
            
            
            
            
        </div>

    </div>
    </div>



 <div id="emd_depositprocess" class="modal fade" role="dialog">
    <div class="modal-dialog modal_dialogue modal-lg">

        <!-- Modal content-->
        <div class="modal-content draw_map no_pad">
            <div class="">
                <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
            
            <?php $modeles = new \common\models\Emd_details(); ?>
            
            <?php $form = ActiveForm::begin(['id' => 'updateform']); ?>
            
                <div class="container-fluid user_viewed">
                 <div class="row">
                    <p class="confrimation_txt">I have paid an amount of <span class="detail_s">INR 250000000</span> in favour of<span class="detail_s"> Mr. Amit Kumar</span> as per the details.
                 </div>
                 <?php echo $form->field($modeles, 'emd_id')->hiddenInput(['id'=>'updateid'])->label(false); ?>
								 <?php echo $form->field($modeles, 'favour_of')->hiddenInput(['id'=>'updatefavourof','value'=>'utr'])->label(false); ?>


                    <div class="row">
                    <ul class="add_property nav nav-pills text-center">
						<li class="active property_steps col-md-6 search_listing no_pad"><a data-toggle="pill" id="utrclicks" href="#homes" class="categ_selec">UTR Details</a></li>
						<li class="property_steps col-md-6 search_listing no_pad"><a data-toggle="pill" id="ddclicks" href="#menu1s" class="categ_selec">Demand Draft Details</a></li>
					</ul>
				<div class="tab-content">
				
				  <div id="homes" class="tab-pane fade in active">
                             <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">UTR No.</p>
											<p class="label_name">

                      <?php echo $form->field($modeles, 'utr_no')->textInput(['id'=>'update_utrno','maxlength' => true, 'placeholder' => "999999999999", 'class'=>'form-control input_desgn'])->label(false); ?>


										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">Bank</p>
											<p class="label_name">
                      <?php echo $form->field($modeles, 'utr_bank_name')->textInput(['id'=>'update_utrbank','maxlength' => true, 'placeholder' => "SBI", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                                      <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Branch Name</p>
											<p class="label_name">
                      <?php echo $form->field($modeles, 'utr_bank_branch_name')->textInput(['id'=>'update_utrbranch','maxlength' => true, 'placeholder' => "999999999999", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">Date</p>
											<p class="label_name">

                      <?php echo $form->field($modeles, 'utr_date')->textInput(['id'=>'update_utrdate','maxlength' => true, 'placeholder' => "07/09/1992", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                                     
							  
                  </div>
                  <div id="menu1s" class="tab-pane fade in">	
                  <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">DD No.</p>
											<p class="label_name">
                      <?php echo $form->field($modeles, 'dd_no')->textInput(['id'=>'update_ddno','maxlength' => true, 'placeholder' => "999999999999", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">Bank</p>
											<p class="label_name">
                      <?php echo $form->field($modeles, 'dd_bank_name')->textInput(['id'=>'update_ddbank','maxlength' => true, 'placeholder' => "SBI", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                    <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Branch Name</p>
											<p class="label_name">
                      <?php echo $form->field($modeles, 'dd_bank_branch_name')->textInput(['id'=>'update_ddbranchname','maxlength' => true, 'placeholder' => "New Delhi", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">Date</p>
											<p class="label_name">
                      <?php echo $form->field($modeles, 'dd_date')->textInput(['id'=>'update_dddate','maxlength' => true, 'placeholder' => "07/09/1992", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                                      
                                      <div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Physically Sent <span class="person_name">(Person Name)</span></p>
											<p class="label_name">
                      <?php echo $form->field($modeles, 'person_name')->textInput(['id'=>'update_personname','maxlength' => true, 'placeholder' => "Dhanush", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">By Courier <span class="person_name">(Tracking ID)</span></p>
											<p class="label_name">
                      <?php echo $form->field($modeles, 'tracking_id')->textInput(['id'=>'update_trackingid','maxlength' => true, 'placeholder' => "ID12121212", 'class'=>'form-control input_desgn'])->label(false); ?>

                      </p>
										</div>
									  </div>
                                     

							  </div>
                  </div>

                </div>                                     
                <div class="col-md-12 save_profile text-right">
                   <?= Html::submitButton('Save', ['class' => 'save_button']) ?>
							 <!-- <a href="#" class="save_button">Save</a> -->
                                </div>




                    </div>
                   
                   
                </div>
                </div><!-- panel-group -->
                
                
                <?php ActiveForm::end(); ?>

            </div>
            
            
            
            
        </div>

    </div>
    </div>
<script>
var updateemdid = '';

  function emd_process(id){
    
		updateemdid = id;

		
	$('#updateid').val(updateemdid);
	$("#emd_depositprocess").modal('show');

	$.ajax({
											   type: "POST",
											   url: 'emd_details/getdetails',
											   data: {emdid: updateemdid},
											   dataType: 'json',
											   success: function (data) {
												  
											  var details = JSON.stringify(data);
												var obj =   JSON.parse(details)

												var emddetailsid =  obj.id;
												var emddetailsemd_id =  obj.emd_id;
												var emddetailsutr_no =  obj.utr_no;
											
												var emddetailsutr_bank_name =  obj.utr_bank_name;
												var emddetailsutr_bank_branch_name =  obj.utr_bank_branch_name;
												var emddetailsutr_date =  obj.utr_date;
												var emddetailsdd_no =  obj.dd_no;
												var emddetailsdd_bank_name =  obj.d_bank_name;
												var emddetailsdd_bank_branch_name =  obj.dd_bank_branch_name;
												var emddetailsdd_date =  obj.dd_date;
												var emddetailsperson_name =  obj.person_name;
												var emddetailstracking_id =  obj.tracking_id;

                        
												if(emddetailsutr_no !== null && emddetailsutr_no !== ''){
													$('#update_utrno').val(emddetailsutr_no);
												}

												if(emddetailsutr_bank_name){
													$('#update_utrbank').val(emddetailsutr_bank_name);
												}
												if(emddetailsutr_bank_branch_name){
													$('#update_utrbranch').val(emddetailsutr_bank_branch_name);
												}
												if(emddetailsutr_date){
													$('#update_utrdate').val(emddetailsutr_date);
												}
												if(emddetailsdd_no){
													$('#update_ddno').val(emddetailsdd_no);
												}
												if(emddetailsdd_bank_name){
													$('#update_ddbank').val(emddetailsdd_bank_name);
												}
												if(emddetailsdd_bank_branch_name){
													$('#update_ddbranchname').val(emddetailsdd_bank_branch_name);
												}
												if(emddetailsdd_date){
													$('#update_dddate').val(emddetailsdd_date);
												}
												if(emddetailsperson_name){
													$('#update_personname').val(emddetailsperson_name);
												}
												if(emddetailstracking_id){
													$('#update_trackingid').val(emddetailstracking_id);
												}
																				
											                                                
												  

											   },
										   });


}

</script>


<?php 
$script = <<< JS

$('#utrclick').click(function(){
$('#emd_details-favour_of').val('utr');
});

$('#ddclick').click(function(){
$('#emd_details-favour_of').val('dd');
});

$('#utrclicks').click(function(){
$('#updatefavourof').val('utr');
});

$('#ddclicks').click(function(){
$('#updatefavourof').val('dd');
});



$('form#{$modeled->formName()}').on('beforeSubmit',function(e){
 
 e.preventDefault();
 e.stopImmediatePropagation();
var form = $(this);
$.post(
 form.attr("action"),
  form.serialize()

).done(function(result){
 
if(result == 1){


	 $('#emd_deposit').modal('hide');
	 $(form).trigger("reset");
   toastr.success('Your details have been successfully saved','success');


}else{

	 $('#message').html('Something Wrong');  
  }
	   
}).fail(function(){
   console.log("server Error"); 

});
return false;

}); 


$('form#updateform').on('beforeSubmit',function(en){

  
 
 en.preventDefault();
 en.stopImmediatePropagation();
var form = $(this);
$.post(
	"emd_details/update?id="+updateemdid+"",
  form.serialize()

).done(function(result){
 
if(result == 1){


	 $('#emd_depositprocess').modal('hide');
	 $(form).trigger("reset");
   toastr.success('Your details have been successfully saved','success');


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
    
    <script>

    function emd_pay(id){
    
      $('#emd_details-emd_id').val(id);
      $("#emd_deposit").modal('show');

    }



        function viewdocs(id) {

            $('#draggable6').modal('show');
            $('#showpropdoc').html('');
            $.ajax({
                url: 'documentshow/documentshow',
                data: {id: id},
                success: function (data) {
                    
                     
                  
                    var obj = $.parseJSON(data);
                    
                    
                     $.each(obj, function (index) {
                     $('#showpropdoc').append('<a class="col-md-3" target="_blank" href="<?= Yii::getAlias('@archiveUrl').'/uploadsthumbnails/';  ?>'+this.link+'">'+
                            '<div class="document_nam">'+ this.file_descr +'</div>'+
                        '</a>');    
                         
                     });
                 
                   
    //                                                 $.pjax({container: '#pjax-grid-view'})  
                },
            });
        }



                                           function showpropdet(id){
                                                              
                                                                $('#myModal').modal('show'); 
       
                                                                $.ajax({
                                                                 url: '<?= Yii::getAlias('@frontendUrl').'/addproperty/showpropdetails';  ?>',
                                                                data: {id: id},
                                                                success: function (data) {
                                                                   var obj = $.parseJSON(data);
                                                                    $.each(obj, function(element) {
                                                                        
                                                                   $('#property_for').html(this.property_for);
                                                                   $('#typename').html(this.typename);
                                                                   $('#locality').html(this.locality);
                                                                   $('#total_plot_area').html(this.total_plot_area);
                                                                   $('#asking_rental_price').html(this.asking_rental_price);
                                                                   $('#price_sq_ft').html(this.price_sq_ft);
                                                                   $('#maintenance_cost').html(this.maintenance_cost);
                                                                   $('#availability').html(this.availability);
                                                                   $('#available_from').html(this.available_from);
                                                                   $('#possesion_by').html(this.possesion_by);
                                                                   $('#buildup_area').html(this.buildup_area);
                                                                   $('#carpet_area').html(this.carpet_area);
                                                                   $('#furnished_status').html(this.furnished_status);
                                                                    });
                                                                    
                                                                 
                                                                  },
                                                                });

                                                        }


                                      var properid = '';var visitypeid = '';                          
                            function paynowfunc(visit_type,id) { 
                                 
                                        properid=id;
                                        visitypeid=visit_type;
                                        $('#draggable4').modal('show');                                       
                                    
                                }
                                
                                function proceedtobuy(){
                                    var propids = properid;
                                                   $.ajax({
                                                                url: 'addproperty/emdpay',
                                                                data: {propids: propids,visitypeid:visitypeid},
                                                                success: function (data) {
                                                                   
                                                                  $('#draggable4').modal('hide');
                                                                    $.pjax({container: '#pjax-grid-view'});
                                                                    if(data == '1'){  
                                                                       
                                                                       toastr.success('Payment Successfully Done', 'success');  
                                                                    }else if(data == '3'){
                                                                        
                                                                     toastr.warning('This Property has not been set for VR room yet', 'warning');    
                                                                        
                                                                    }else{
                                                                        
                                                                       toastr.success('Internal Error', 'success'); 
                                                                    }
                                                                     
                                                                 
                                                                  },
                                                                });
                                }
    </script>
