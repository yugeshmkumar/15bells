<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\db\Query ;

use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\CompanyEmp;
use common\models\User;




$this->title = 'Request Site Visits';
$this->params['breadcrumbs'][] = $this->title;

$datas =  $dataProvider->query->all();
$counts = $dataProvider->getCount();


if($counts > 0 ){
?>


<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>


<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Lessee Site Visit</h2>
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
								$request_status  =  $data->request_status;  
								$scheduled_time  =  $data->scheduled_time; 
								$visit_types        =  $data->visit_type;        
                $haritid = 273*179-$viewid;
                $propsid = 'PR'. $haritid;

                $addproperty = \common\models\Addproperty::find()->where(['id' => $viewid])->one();
                $project_type_id = $addproperty->project_type_id;
                $role_id = $addproperty->role_id;

                if($role_id == 'lessor'){
                $property_type = \common\models\PropertyType::find()->where(['id' => $project_type_id])->one();
                $querys = CompanyEmp::find()->where(['id'=>$data->sales_id])->one();
                 $assigned_id = $querys->userid;

								$users = User::find()->where(['id'=>$assigned_id])->one();
								$myprofile = \common\models\Myprofile::find()->where(['userID' => $assigned_id])->one();

								$visit_type = "'$data->visit_type'";
                $request_id = "'$data->request_id'";

                                    
                    ?>
				<div class="col-md-12 property_detail">
					<p class="property_id">Property ID : <?php echo $propsid; ?>
<?php if(($visit_types == 'online' )  && ($request_status == 'paid' || $request_status == 'complimentry' )){ ?>
					<a href="https://live.15bells.com/" target="_blank"><span class="building_name">Online Visit</span></a>
<?php } ?>
					</p>
					
							<div class="col-md-12 visit_buyer">
							<div class="row">
									<div class="col-md-4 agent_sep">
                                        <div class="row mt_dash">
												<div class="col-md-5">
                                                <?php if ($myprofile->logo) { ?>
                                                    <img src="<?php echo Yii::getAlias('@archiveUrl'); ?>/mycompanylogo/<?php echo $myprofile->logo ?>" width="60">
                                                <?php } else { ?>
													<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/team/t2.jpg';  ?>" width="60">
                                                <?php } ?>
                                            	</div>
												
												<div class="col-md-7 no_pad">
												<h3 class="user_name"><?php echo $users->fullname; ?></h3>
												<p class="user_id" style="margin:0;">UID<?php echo $assigned_id * 23 * 391; ?></p>
												</div>
                                            </div>
                                        <div class="row agent_detail" style="margin-top:30px;">
                                        <p class="user_detail"><i class="fa fa-phone"></i> +91-<?php echo $users->username; ?></p>
										<p class="user_detail"><i class="fa fa-envelope"></i> <?php echo $users->email; ?></p>
											<div class="col-md-5">
                                            <p class="site_txt"><?php echo  date("g:i A", strtotime($scheduled_time)); ?></p>
                                            
											</div>
											<div class="col-md-7 no_pad">
                                            <p class="site_txt"><?php echo  date("F d,Y", strtotime($scheduled_time)); ?></p>
												</div>	
										</div>
                                    
                                    </div>
                                   
									<div class="col-md-8">
										
										<div class="row">
											<div class="col-md-6 col-xs-6 company_overview property_manage">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/building.svg';  ?>" width="16">Type of property</p>
											<p class="label_name"><?php echo $property_type->typename ?></p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview property_manage">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/site-visit.svg';  ?>" width="16">Location</p>
											<p class="label_name"><?php echo $addproperty->locality ?></p>
										</div>
										<div class="col-md-6">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/watch.svg';  ?>" width="20">Visit Type</p>
											<div class="col-md-12">
												<div class="col-md-5 no_pad"><button class="button_select <?php echo ($data->visit_type == 'online' ? 'active_butn':'') ?>">Online</button></div>
												<div class="col-md-5 no_pad"><button class="button_select <?php echo ($data->visit_type == 'offline' ? 'active_butn':'') ?>">Offline</button></div>
											</div>
										</div>
										<div class="col-md-6">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/watch.svg';  ?>" width="20">Payment Status</p>
											<div class="col-md-12">
											<?php if($request_status == 'pay_now'){ ?>
												<div class="col-md-4 no_pad"><button  onclick="paynowfunc(<?php echo $visit_type . ','.$request_id ?>)" class="cash_butn active_butn">Paynow</button></div>
											<?php } else if($request_status == 'paid' || $request_status == 'complimentry' || $request_status == 'rejected' || $request_status == 'pending'){ ?>
												<div class="col-md-4 no_pad"><button class="cash_butn"><?php echo $request_status; ?></button></div>
											<?php }else { ?>
													<div class="col-md-4 no_pad"><button  onclick="paynowfunc(<?php echo $visit_type . ','.$request_id ?>)" class="cash_butn active_butn">Paynow</button></div>

											<?php } ?>
											</div>
										</div>
										</div>
									</div>
								</div>
								
							</div>

						
				</div>
                <?php   } } ?>
			</div>
  		</div>


<div class="modal fade" id="draggable4" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content data_model">
                <div class="modal-header greenHeader">
                    <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Pay Online</h4>
                </div>

                <div class="modal-body">


                    <form class="form-horizontal" id="registrationForm">   


                        <div class="row row_pad">
                            <div class="col-sm-3">
                                <label class="control-label lab_form"  style="width: 100%;text-align: center;">Payable Amount:</label>
                            </div>

                            <div class="col-sm-9">
                                <input type="text" id="accepts2"  value="500" class="form-control" name="licence" readonly>
                                <input type="hidden" id="acceptid" value="" class="form-control" name="licence">
                            </div>
                        </div>
                    <div class="row row_pad" style="margin-top:20px">
                        <div class="form-group">
                            <div class="col-sm-3 text-center">
                            <label class="control-label lab_form">Terms of use</label>
                            </div>
                            <div class="col-sm-9" style="padding: 0 30px 0 20px;">
                                <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;border-radius:5px;">
                                    <p>Lorem ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo mea, est ut graeci definitiones. His ne melius vituperata scriptorem, cum paulo copiosae conclusionemque at. Facer inermis ius in, ad brute nominati referrentur vis. Dicat erant sit ex. Phaedrum imperdiet scribentur vix no, ad latine similique forensibus vel.</p>
                                    <p>Dolore populo vivendum vis eu, mei quaestio liberavisse ex. Electram necessitatibus ut vel, quo at probatus oportere, molestie conclusionemque pri cu. Brute augue tincidunt vim id, ne munere fierent rationibus mei. Ut pro volutpat praesent qualisque, an iisque scripta intellegebat eam.</p>
                                    <p>Mea ea nonumy labores lobortis, duo quaestio antiopam inimicus et. Ea natum solet iisque quo, prodesset mnesarchum ne vim. Sonet detraxit temporibus no has. Omnium blandit in vim, mea at omnium oblique.</p>
                                    <p>Eum ea quidam oportere imperdiet, facer oportere vituperatoribus eu vix, mea ei iisque legendos hendrerit. Blandit comprehensam eu his, ad eros veniam ridens eum. Id odio lobortis elaboraret pro. Vix te fabulas partiendo.</p>
                                    <p>Natum oportere et qui, vis graeco tincidunt instructior an, autem elitr noster per et. Mea eu mundi qualisque. Quo nemore nusquam vituperata et, mea ut abhorreant deseruisse, cu nostrud postulant dissentias qui. Postea tincidunt vel eu.</p>
                                    <p>Ad eos alia inermis nominavi, eum nibh docendi definitionem no. Ius eu stet mucius nonumes, no mea facilis philosophia necessitatibus. Te eam vidit iisque legendos, vero meliore deserunt ius ea. An qui inimicus inciderint.</p>
                                </div>
                            </div>
                        </div>
                </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3 term_selct">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="agree" value="agree" style="position: relative;"/> Agree with the terms and conditions
                                    </label>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer" style="border-top:none !important;">
                    <!--<a href="javascript:;" data-dismiss="modal" class="btn continueBtn1">Save</a>-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px;">
                            <input type="button"  onclick="proceedme()" id="sub" value="Proceed to pay" class="btn btn-success">
                            <input type="button"  data-dismiss="modal"  value="Cancel" class="btn btn-danger">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




		<div id="visit_rating" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content draw_map no_pad">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
		<div class="container-fluid padding_rating">
			<div class="col-md-12 text-center">
				<h2 class="visit_h">Visit Completed!</h2>
				<p class="visit_txt">On <span id="appenddate"> </span> at <span id="appendtime">  </span></p>
				<p class="visit_txt">Please help us by sharing to experience around you recent visit of Property <span class="color_yell">ID : <span id="appendid"></span></span> with our account manager <span class="color_yell">Mr. <span id="appendsale"></span></span> </p>
			</div>
			<div class="row text-center rating_section rateproperty">
				<div class="col-md-12 text-center">
					<h2 class="star_rating">Rate your experience with our account manager</h2>
					<!-- <div id="stars" class="starrr"></div> -->
					<div class='rating-stars text-center'>
							<ul id='stars'>
							  <li class='star' title='Poor' data-value='1'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							  <li class='star' title='Fair' data-value='2'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							  <li class='star' title='Good' data-value='3'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							  <li class='star' title='Excellent' data-value='4'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							  <li class='star' title='WOW!!!' data-value='5'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							</ul>
							<div class="form-group" style="margin-top:10px;" id="managertextarea">
						<textarea class="form-control feedback_input" rows="5" id="managertextareas" placeholder="Your Valuable Feedback"></textarea>
							</div>
						  </div>
					
				</div>
				<div class="col-md-12 text-center">
					<h2 class="star_rating">Rate your visit of property location JMD Megapolis</h2>
					 <!-- Rating Stars Box -->
						  <div class='rating-stars text-center'>
							<ul id='stars1'>
							  <li class='star' title='Poor' data-value='1'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							  <li class='star' title='Fair' data-value='2'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							  <li class='star' title='Good' data-value='3'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							  <li class='star' title='Excellent' data-value='4'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							  <li class='star' title='WOW!!!' data-value='5'>
								<i class='fa fa-star fa-fw'></i>
							  </li>
							</ul>
							<div class="form-group" style="margin-top:10px;" id="propertytextarea">
								<textarea class="form-control feedback_input" rows="5" id="propertytextareas" placeholder="Your Valuable Feedback"></textarea>
							</div>
						  </div>
						  
						<!--<p class="visit_txt">You gave a rating of <span id="count-existing">4</span> star(s)</p>-->
				</div>

              <div class="col-md-12 text-center">
							<ul class="sub_categories">
							<li class="active"><a href="javascript:void(0)" id="submitfeedback" class="property_subtype">Submit</a></li>
							<li><a href="javascript:void(0)" data-dismiss="modal" class="property_subtype">Skip</a></li>

             </ul>
			    	</div> 

			

				
			</div>
			<div class="row text-center pay_section pay_later">
				
				<div class="col-md-12 text-center">
					<h2 class="star_rating">Would you like to buy this property? ?</h2>
					<ul class="sub_categories buy_prop">
								<li class="active"><a href="javascript:void(0)" id="yes" class="property_subtype buyproperty">Yes</a></li>
								<li class=""><a href="javascript:void(0)" id="may_be" class="property_subtype buyproperty">May be</a></li>
								<li class=""><a href="javascript:void(0)"  id="later" class="property_subtype buyproperty">Later</a></li>
							</ul>
				</div>
			</div>


		</div>
		
      </div>
      
    </div>

  </div>
</div>

<div id="visit_rating_done" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content draw_map no_pad">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
		
		<div class="container-fluid padding_rating">
			<div class="col-md-12 text-center">
				<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/success.svg';  ?>" width="100"></p>
				<h2 class="visit_h">Feedback Submit Successful</h2>
				<p class="visit_txt">Our Manager will contact you soon </p>
				
			</div>
			<div class="col-md-12 text-center">
							<ul class="sub_categories">
							<li><a href="javascript:void(0)" data-dismiss="modal" class="property_subtype">Close</a></li>

             </ul>
			    	</div> 
		</div>
      </div>      
    </div>
  </div>
  
</div>

<?php  } else {  ?>

<div class="col-md-9">
<h2 class="dashboard_head search_head text-center">No Site Visit </h2>

<img class="blankimage-width" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/site_visit.svg';  ?>">
</div>

<?php } ?>


<?php 
$script = <<< JS

var returnid;

$(document).ready(function(){

$('.pay_later').hide();
$('#managertextarea').hide();
$('#propertytextarea').hide();
$('.pay_later').hide();
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){

	 
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);

		if(ratingValue < 4 ){
			$('#managertextarea').show();
		}else{
			$('#managertextarea').hide();
		}

	$.ajax({
											   type: "POST",
											   url: 'offlinepickdropsave',
											   data: {id: returnid,ratings:ratingValue},
											   dataType: 'json',
											   success: function (data) {
												  
											 
											                                                
												  

											   },
										   });
	
    
  });


	

  $('#stars1 li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars1 li.selected').last().data('value'), 10);
		if(ratingValue < 4 ){
			$('#propertytextarea').show();
		}else{
			$('#propertytextarea').hide();
		}
	
	$.ajax({
											   type: "POST",
											   url: 'onlinepickdropsave',
											   data: {id: returnid,ratings:ratingValue},
											   dataType: 'json',
											   success: function (data) {
												  
											  
											                                                
												  

											   },
										   });
    
  });


	$('#submitfeedback').click(function(){

		var managerfeedback  = $('#managertextareas').val();
    var propertyfeedback = $('#propertytextareas').val();
		
		$.ajax({
											   type: "POST",
											   url: 'submitfeedback',
											   data: {id: returnid,managerfeedback:managerfeedback ,propertyfeedback: propertyfeedback},
											  // dataType: 'json',
											   success: function (data) {

													 

												  if(data == '1'){

												$('.rateproperty').hide();
												$('.pay_later').show();
												

												//window.location.replace("documentshow");
												//$('.pay_later').show();
												 }
											                                                
												  

											   },
										   });

	});
  
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
checkuserconfirmstatus();


 $('.buyproperty').click(function(){
var buttonid =  $(this).attr('id');

if(buttonid == 'yes' || buttonid == 'may_be' || buttonid == 'no'){

          $.ajax({
											   type: "POST",
											   url: 'makeuseryes',
											   data: {id: returnid,buttonid: buttonid},
											  // dataType: 'json',
											   success: function (data) {

													// alert(data);

												  if(data == 'done'){

												$("#visit_rating").modal('hide');

                        $("#visit_rating_done").modal('show');
												//$('.pay_later').show();
												 }
											                                                
												  

											   },
										   });
	

}


 });





//  $('.pay_now').click(function(){
// var buttonid =  $(this).attr('id');

// if(buttonid == 'pay_now'){
  
//                                     var amount_payable = 500;
                                   

//                                         $.ajax({
// 						                       type: "POST",
//                                                 url: 'documentshow/sessioncheckout',
//                                                 data: {id: returnid,amount_payable:amount_payable},
//                                                 success: function (data) {
                                                 
//                                                  // alert(data);
                                                   

//                                                 },
//                                             }); 

// }else{

// 	$("#visit_rating").modal('hide');

// }


//  });


 

         function checkuserconfirmstatus(){
                                    
									$.ajax({
											   type: "POST",
											   url: 'checkuserconfirmstatus',
											   data: {id: 'ready'},
											   dataType: 'json',
											   success: function (data) {
												 
											
												var scheduledtime =  data[1];
												var now = new Date();
												var d = new Date( scheduledtime);

												

												var nowTime = now.getHours()*60+now.getMinutes();
												
											               	d.setSeconds(d.getSeconds() + 10);
                        var dateTime = d.getHours()*60+d.getMinutes()+ d.getSeconds();

											//	alert(dateTime);
											//	alert(nowTime);
												  returnid = data[0];
												 var sale_name = data[2];
												 var propid = data[5];
												 var dates = data[3];
												 var times = data[4];

												

												 var haritid = 273*179-propid;
											     var propsid = 'PR'+ haritid;
												 
												   if (returnid != '0') {

													  
													  if (now > d) {
															

														$('#appenddate').html(dates);
														$('#appendtime').html(times);
														$('#appendid').html(propsid);
														$('#appendsale').html(sale_name);  
														$("#visit_rating").modal('show');


														

												   }


												   }                                                 
												  

											   },
										   }); 
								}





								




JS;
$this->registerJs($script);
?>

<script>
 function paynowfunc(visit_type,id) {
                                   
                                    
																	 $('#acceptid').val(id);
																	
																//	if (visit_type == 'online') {
																			$('#draggable4').modal('show');
																			
																	// } else if (visit_type == 'offline'){                                       
																	// 		$('#draggable2').modal('show');
																	// }else{
																	// 	 toastr.error('Please Select Visit type', 'error'); 
																	// }
																	//alert(visit_type);

															}


															function proceedme() {
                                    
                                    var ids = $('#acceptid').val();
                                    var amount_payable = $('#accepts2').val();
                                    if ($('input[name="agree"]:checked').length > 0) {

                                        $.ajax({
						type: "POST",
                                                url: '/request-sitevisit/sessioncheckout',
                                                data: {id: ids,amount_payable:amount_payable},
                                                success: function (data) {
                                                 
                                                  
                                                    // if (data == '1') {
                                                    //     toastr.success('Location Successfully Saved', 'success');
                                                    //     $('#draggable4').modal('hide');
                                                    //     $.pjax({container: '#pjax-grid-view'})
                                                    // }                                                    
                                                    // else {
                                                    //     toastr.error('Internal Error', 'error');
                                                    // }

                                                },
                                            }); 

                                    } else {
                                        toastr.error('Please Accept the Terms & Conditions', 'error');
                                    }

                                }
</script>