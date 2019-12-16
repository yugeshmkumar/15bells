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
					
			

				<div class="col-md-6 text-right addprop_button">
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
										  </ul>
                                         
									</div>
					</div>
					</div>
                <?php foreach ($datas as $data){ 

                $viewid  =  $data->property_id;                
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
					<p class="property_id">Property ID : <?php echo $propsid; ?></p>
					
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
											<p class="label_name">J<?php echo $addproperty->locality ?></p>
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
    
    
    <script>

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
