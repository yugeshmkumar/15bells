<?php

use yii\helpers\Url;
use yii\db\Query;

$userid = Yii::$app->user->identity->id;
?>

<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Shortlisted Properties</h2>
					</div>
					<div class="col-md-6 text-right addprop_button">
						<div class="dropdown filter_drop">
											<button id="dLabel" class="dropdown-select" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Filter
											<span class="caret_filter"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/down.svg';  ?>" width="18" class="svg_drop"></span>
											</button>
                                            
    

										  <ul class="dropdown-menu User_role" aria-labelledby="dLabel">
                                          <form method="post">
											<input name="low" type="submit" class="sort_list" value="Low to high">
                                            <input name="high" type="submit" class="sort_list" value="High to low">
                                            </form>
											<!-- <li></li> -->
										  </ul>
                                         
									</div>
					</div>
				</div>



<?php

if(array_key_exists('low',$_POST)){

    $sqlstr = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$userid' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1  ,(select count(*) from shortlistproperty where property_id= a.id  and active='1') as totalshortlst  ,(select count(*) from request_site_visit where property_id= a.id  and status='1') as totalsitevisit  ,(select count(*) from  user_view_properties where property_id= a.id  and active='1') as totalvisitor FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN shortlistproperty as st ON (st.property_id = a.id ) where st.user_id = $userid and a.property_for ='rent' GROUP BY a.id   ORDER BY  a.asking_rental_price ASC ";

 }else if(array_key_exists('high',$_POST)){

    $sqlstr = "SELECT a.*,SUM(st.expectation_id) as expectation_id,p.typename as typename,SUM(p.undercategory) as undercategory,(select count(*) from request_site_visit where user_id='$userid' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1  ,(select count(*) from shortlistproperty where property_id= a.id  and active='1') as totalshortlst  ,(select count(*) from request_site_visit where property_id= a.id  and status='1') as totalsitevisit  ,(select count(*) from  user_view_properties where property_id= a.id  and active='1') as totalvisitor FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN shortlistproperty as st ON (st.property_id = a.id ) where st.user_id = $userid and a.property_for ='rent' GROUP BY a.id   ORDER BY  a.asking_rental_price DESC ";

 }else{

    $sqlstr = "SELECT a.*,SUM(st.expectation_id) as expectation_id,p.typename as typename,SUM(p.undercategory) as undercategory,(select count(*) from request_site_visit where user_id='$userid' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1  ,(select count(*) from shortlistproperty where property_id= a.id  and active='1') as totalshortlst  ,(select count(*) from request_site_visit where property_id= a.id  and status='1') as totalsitevisit  ,(select count(*) from  user_view_properties where property_id= a.id  and active='1') as totalvisitor FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN shortlistproperty as st ON (st.property_id = a.id ) where st.user_id = $userid and a.property_for ='rent' GROUP BY a.id ";
 
 }
 


            $data = \Yii::$app->db->createCommand($sqlstr)->queryAll();

            foreach ($data as $key => $datas) {

                $imaged = $datas['featured_image'];

                $haritid = 273*179-$datas['id'];
                $propsid = 'PR'.$haritid;

?>



				<div class="col-md-12 property_detail" id="parntcls_<?php echo $datas['id']; ?>">
					<p class="property_id">Property ID : <?php echo $propsid; ?>
					
					</p>
					<div class="row single_property">
						<div class="col-md-3 no_pad">
							<img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/' . (( $imaged == null) ? 'not.jpg' : $imaged ) ?>" class="img-responsive">
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6 company_overview property_manage">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/building.svg';  ?>" width="16">Type of property</p>
									<p class="label_name"><?php echo $datas['typename']; ?></p>
								</div>
								<div class="col-md-6 company_overview property_manage">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/site-visit.svg';  ?>" width="16">Location</p>
									<p class="label_name">J<?php echo $datas['locality'] ?></p>
								</div>
								<div class="col-md-12 unit_details">
									<ul class="details_unit col-md-12">
										<li class="col-md-3">
										<p class="details_label">Units</p>
										<p class="details_name"><?php echo $datas['super_unit'] ?></p>
										</li>
										<li class="col-md-3">
										<p class="details_label">Area</p>
										<p class="details_name"><?php echo $datas['super_area'] ?></p>
										</li>
										<li class="col-md-3">
										<p class="details_label">Price</p>
										<p class="details_name"><?php echo $datas['asking_rental_price'] ?></p>
										</li>
										<li class="col-md-3">
										<p class="details_label">Status</p>
										<p class="details_name instant_n"><?php echo $datas['request_for'] ?></p>
										</li>
										
									</ul>
									<ul class="visitors_detail col-md-12">
										<li class="visitors col-md-3">
										<p class="details_label">Visitors</p>
										<p class="details_name"><?php echo $datas['totalvisitor']; ?></p>
										</li>
										<li class="site_visit col-md-3">
										<p class="details_label">Site Visit</p>
										<p class="details_name"><?php echo $datas['totalsitevisit']; ?></p>
										</li>
										<li class="short_lists col-md-3">
										<p class="details_label">Shortlisted</p>
										<p class="details_name"><?php echo $datas['totalshortlst']; ?></p>
										</li>
										<li class="online col-md-3">
										<p class="details_label">Online</p>
										<p class="details_name instant_n">Published</p>
										</li>
										
									</ul>
								</div>
								<div class="col-md-12 progress_bar">
								<?php if ($datas['county'] > 0 ){ ?> 
									<p class="text-right process_continue"><a class="property_process" href="javascript:void(0)" >Already Scheduled </a>
                                  <?php  }else{ ?>
									<p class="text-right process_continue">
									<a class="property_process" href="javascript:void(0)" id="<?php echo $datas['id']; ?>" onclick="sitevisitproperties(this.id);">Schedule Visit </a>

								 <?php   }  ?>
								    <a class="property_back step_locality" href="javascript:void(0)" id="<?php echo $datas['id']; ?>" onclick="deleteprop(this.id)">Remove </a></p>
									
								</div>
										
							</div>
						</div>
					</div>
				</div>


<?php } ?> 
				
				
				
				
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

          <script>


		  <?php 
$script = <<< JS
                               

            $('.visitmode').click(function(){

var  dvisitmode = this.id;

  $('#visitmode').val(dvisitmode);
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

		  
JS;
$this->registerJs($script);
?>


function deleteprop(id){
                                   
                             
                                   $.ajax({
                                        type: "POST",
                                        url: 'deleteprop',
                                        data: {propertyid: id},
                                        success: function (data) {


                                            if (data == '1') {
                                                $('#parntcls_'+id).hide();
                                                toastr.warning('Property has removed from shortlist', 'warning');
                                            }
                                           
                                            else {
                                                toastr.error('Internal Error', 'error');
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
													//$('#sitevisitprice').html(obj.asking_rental_price);
											
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
												data: {hardam: id,rantime:rantime,visitmode:visitmode},
												success: function (data) {
											
													$('#'+id).html('Already Scheduled');
                                                    $('#'+id).removeAttr('onclick');
												if(data == '1'){
													
													
												toastr.success('Request for Site Visit has Successfully placed','success');    
												}else if(data == '2'){
													
												toastr.success('Request for Site Visit has Successfully placed','success'); 
												toastr.warning('Your Free Site Visit Has Already Finished, Please Carry 100 Rs Along with you','warning');    
												
												}else if(data == '5'){
													
												toastr.warning('Already Visited For this Site','warning');    
												
												}else{
												toastr.error('Internal Error','error');    
														}
												},
											});

											$("#myModalnew").modal('hide');

							}

          </script>