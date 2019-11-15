<?php

use yii\helpers\Url;
use yii\db\Query;

$userid = Yii::$app->user->identity->id;
?>

<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Auction</h2>
					</div>
					
				</div>



<?php



    $sqlstr = "SELECT a.*,p.typename as typename,SUM(p.undercategory) as undercategory,(select count(*) from request_site_visit where user_id='$userid' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1  ,(select count(*) from shortlistproperty where property_id= a.id  and active='1') as totalshortlst  ,(select count(*) from request_site_visit where property_id= a.id  and status='1') as totalsitevisit  ,(select count(*) from  user_view_properties where property_id= a.id  and active='1') as totalvisitor FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN request_emd as r1 ON (r1.property_id = a.id) LEFT JOIN shortlistproperty as st ON (st.property_id = a.id ) where r1.user_id = $userid  GROUP BY a.id ";
 
 
 


            $data = \Yii::$app->db->createCommand($sqlstr)->queryAll();

            foreach ($data as $key => $datas) {

                $imaged = $datas['featured_image'];

                $haritid = 273*179-$datas['id'];
				$propsid = 'PR'+ $haritid;
				
				$property_for  = $datas['property_for'];

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
										<p class="details_name"><?php echo ($property_for == 'sale' ? $datas['expected_price'] : $datas['asking_rental_price']) ?></p>
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
									<p class="text-right process_continue"><a class="property_process">Pay Token Money</a></p>
									
								</div>
										
							</div>
						</div>
					</div>
				</div>


<?php } ?> 
				
				
				
				
			</div>
  		</div>

          