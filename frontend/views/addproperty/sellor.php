<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\editable\Editable;
use yii\helpers\Url;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Property Management');
$this->params['breadcrumbs'][] = $this->title;


$datas =  $dataProvider->query->all();
?>

<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Seller Dashboard</h2>
					</div>
					<div class="col-md-6 text-right addprop_button">
						<a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" class="add_button">Add Property</a>
					</div>
				</div>

                <?php foreach ($datas as $data){

                    $viewid  =  $data->id;
                   
                    $imaged = $data['featured_image'];

                    $haritid = 273*179-$data['id'];
                    $propsid = 'PR'. $haritid;

                    $project_type_id = $data->project_type_id;
                    $property_type = \common\models\PropertyType::find()->where(['id' => $project_type_id])->one();
                    $userid = Yii::$app->user->identity->id;


                    $totalvisitors  = "SELECT count(*) as totalvisitor from user_view_properties where property_id= $viewid and active='1'";
                    $visitors = \Yii::$app->db->createCommand($totalvisitors)->queryAll();
                    $data0 =  $visitors[0]['totalvisitor'];

                    $totalshortlist  = "SELECT count(*) as totalshortlist from shortlistproperty where property_id= $viewid  and active='1'";
                    $shortlists = \Yii::$app->db->createCommand($totalshortlist)->queryAll();
                    $data1=  $shortlists[0]['totalshortlist'];

                    $totalsitevisit  = "SELECT count(*) as totalsitevisit from request_site_visit where property_id= $viewid";
                    $sitevisits = \Yii::$app->db->createCommand($totalsitevisit)->queryAll();
                    $data2=  $sitevisits[0]['totalsitevisit'];
                    
                    ?>

				<div class="col-md-12 property_detail">
					<p class="property_id">Property ID : <?php echo $propsid; ?></p>
                    <div class="dropdown drop_editprop" style="">
					<button class="btn btn-primary dropdown-toggle butn_short" type="button" data-toggle="dropdown"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/option.svg';  ?>" width="7"></button>    
					                  
					<ul class="dropdown-menu edit_drop"> 
                            <li><?= Html::a('Edit', ['views','id'=>base64_encode($viewid)]) ?></li>
                            <li><?=
                                Html::a('Delete', ['delete', 'id' => $viewid], [
                                'class' => 'btn btn-danger delete_prop',
                                'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                                ],
                                ])
                                ?>
                           </li>
						   <li><?=
                                Html::a('Un-publish', ['unpublish', 'id' => $viewid], [
                                'class' => 'btn btn-danger delete_prop',
                                'data' => [
                                'confirm' => 'Are you sure you want to unpublish this item?',
                                'method' => 'post',
                                ],
                                ])
                                ?>
                           </li> 
                           
                        </ul>
                        </div>
					
					<div class="row single_property">
						<div class="col-md-3 no_pad">
							<img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/' . (( $imaged == null) ? 'not.jpg' : $imaged ) ?>" class="img-responsive manage_image">
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6 col-xs-6 company_overview property_manage">
									<p class="details_label"><img src=""<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/building.svg';  ?>" width="16">Type of property</p>
									<p class="label_name"><?php echo $property_type->typename ?></p>
								</div>
								<div class="col-md-6 col-xs-6 company_overview property_manage">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/site-visit.svg';  ?>" width="16">Location</p>
									<p class="label_name"><?php echo $data->locality; ?></p>
								</div>
								<div class="col-md-12 unit_details">
									<ul class="details_unit col-md-12">
										<li class="col-md-3">
										<p class="details_label">Units</p>
										<p class="details_name"><?php echo $data->super_unit; ?></p>
										</li>
										<li class="col-md-3">
										<p class="details_label">Area</p>
										<p class="details_name"><?php echo $data->super_area; ?></p>
										</li>
										<li class="col-md-3">
										<p class="details_label">Price</p>
										<p class="details_name"><?php echo ($data->property_for == 'sale' ? $data->expected_price : $data->asking_rental_price) ?></p>
										</li>
										<li class="col-md-3">
										<p class="details_label">Status</p>
										<p class="details_name"><?php echo $data->request_for; ?></p>
										</li>
										
									</ul>
									<ul class="visitors_detail col-md-12">
										<li class="visitors col-md-3">
										<p class="details_label">Visitors</p>
										<p class="details_name"><?php echo $data0; ?></p>
										</li>
										<li class="site_visit col-md-3">
										<p class="details_label">Site Visit</p>
										<p class="details_name"><?php echo $data1; ?></p>
										</li>
										<li class="short_lists col-md-3">
										<p class="details_label">Shortlisted</p>
										<p class="details_name"><?php echo $data2; ?></p>
										</li>
										<li class="online col-md-3">
										<p class="details_label">Approval</p>
										<p class="details_name"><?php echo $data->status; ?></p>
										</li>
										
									</ul>
								</div>
								<div class="col-md-12 progress_bar">
									 <h4 class="text-right">70% Complete</h4>
										  <div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:70%">
											  <span class="sr-only">70% Complete</span>
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


