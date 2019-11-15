<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use kartik\file\FileInput;
use yii\helpers\Url;

use yii\widgets\ActiveForm;

?>


  <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['landlordaction/index']) ?>">LAND LORD</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li> <a href="<?php echo Yii::$app->urlManager->createUrl(['landlordaction/index']) ?>">ADD PROPERTY</a>
                               <i class="fa fa-circle"></i>
                            </li>
							 <li>
                                <span>VIEW ADD PROPERTY</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
  <div class="portlet light">
    <div class="portlet-title">
	  <div class="caption"> <a  class="btn btn-primary"href="<?php echo Yii::$app->urlManager->createUrl(['landlordaction/additional?id='.$_GET['id'].'']) ?>"><i class="fa fa-plus"></i> Add More Thumbnails</a></div>
	<div class="actions">
	<a data-toggle="modal" href="#basic" class="btn btn-primary"><i class="fa fa-plus"></i> Request for Bid </a>
	<a data-toggle="modal" href="#basic2" class="btn btn-primary"><i class="fa fa-plus"></i> Direct Approach  </a>
	
	</div>
	
	</div>
    <div class="portlet-body">
  <div class="row">
                        <div class="col-md-4">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
									Featured Image:
									<?php
									//get property
									$getproperty = \common\models\Property::find()->where(['id'=>$_GET['id'],'userid'=>Yii::$app->user->identity->id])->one();
									//get media file config
									$getmediafileconfig = \common\models\MediaFilesConfig::find()->where(['property_id'=>$_GET['id']])->one();
									$getarchieveurl = Yii::getAlias('@archiveUrl');  
									?>
                                        <img src="<?php echo $getarchieveurl ?>/propertydefaultimg/<?php echo $getproperty->featured_image ?>" class="img-responsive" alt=""> </div>
                                  
                                    <div class="profile-userbuttons">
                                        <button type="button" onclick="downloadfileconfigtwo('<?php echo $getproperty->featured_image ?>')" class="btn btn-circle green btn-sm"><i class="fa fa-download"></i></button>
                                      
                                    </div>
                                    <!-- END SIDEBAR BUTTONS -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
									  More Thumbnails :
									<?php 
									if($getmediafileconfig){
									//get media file for path
									$getmediafile = \common\models\MediaFiles::find()->where(['id'=>$getmediafileconfig->media_id])->one();
									
									$arrgetmediafileconfig = \common\models\MediaFilesConfig::find()->where(['property_id'=>$_GET['id']])->all();
									$ds=0;
									foreach($arrgetmediafileconfig as $getmediafileconfigone){$ds++;
										$getmediafileone = \common\models\MediaFiles::find()->where(['id'=>$getmediafileconfigone->media_id])->one();
									 ?>
                                       
                                    <div class="profile-userbuttons">
                                       <?php echo $ds ?> <button type="button" onclick="downloadfileconfig('<?php echo $getmediafileone->file_name ?>')" class="btn btn-circle green btn-sm"><i class="fa fa-download"></i></button>
                                      
                                    </div><?php } ?><?php } ?>
                                    </div>
                                    <!-- END MENU -->
                                </div> </div> </div>                        <div class="col-md-8">
<div class="property-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'propertydescr:ntext',
            'property_for',
            'location:ntext',
            'locality:ntext',
            'longitude',
            'latitude',
            'city:ntext',
            'state:ntext',
            'address:ntext',
            'country:ntext',
            'property_features:ntext',
            'building_no',
            'building_name:ntext',
            'totalrooms',
            'totalfloors',
            'floorno',
            'totalbalconies',
            'furnishedstatus',
            'on_road',
            'walls_made',
            'office_space_shared',
            'personal_washrooms',
            'pantry_available',
            'total_area:ntext',
            'built_up_area:ntext',
            'carpet_area:ntext',
            'expected_price',
            'price_per_sqft',
            'maintaince_cost',
            'maintaince_by',
            'include_stamp_reg_charges',
            'brokers_response',
            'available_from_month',
            'available_from_year',
            'last_updated',
            'visibility_flags',
            'marketing_flags',
            'ratings',
            'count_views:ntext',
            'property_status_flags',
           
            
        ],
    ]) ?>

</div></div></div></div></div>


 <div class="modal fade" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Modal Title</h4>
                                                </div>
                                                <div class="modal-body">
												<?php
												//check if myprofile pending
                                     $getprofilestatus = \common\models\activemode::checkprofilestatscomplete(Yii::$app->user->identity->id,"my_profile");
												if(!$getprofilestatus){
													?>
													<div class="note note-info">
													Kindly Complete your Profile First. <a class="btn circle btn-info" href="<?php echo Yii::$app->urlManager->createUrl(['myprofile/create']) ?>" > click here <i class="glyphicon glyphicon-share-alt"></i></a>
													</div>
													<?php
												}else{
																									//check if myprofile pending
                                     $getprofilestatus2 = \common\models\activemode::checkprofilestatscomplete(Yii::$app->user->identity->id,"my_KYC_upload");
												
													if(!$getprofilestatus2){
														?>
														<div class="note note-info">
													Kindly Upload your KYC Documents First.<a class="btn circle btn-info" href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>" > click here <i class="glyphicon glyphicon-share-alt"></i></a>
													</div>
														
														<?php
													}else{
												$getprofilestatus3 = \common\models\activemode::checkprofilestatscomplete(Yii::$app->user->identity->id,"my_KYC_approval");
											if(!$getprofilestatus3){
														?>
														<div class="note note-info">
													 KYC Documents Approvals is in progress.
													</div>
													
													<?php	
											}else{
												
												$getprofilestatus4 = \common\models\activemode::checkprofilestatscompletewidp(Yii::$app->user->identity->id,"escrow_transaction",$_GET['id']);
											if(!$getprofilestatus4){
														?>
														<div class="note note-info">
												Kindly Complete your Payment First.<a class="btn circle btn-info" href="<?php echo Yii::$app->urlManager->createUrl(['landlordaction/myescrow']) ?>" > click here <i class="glyphicon glyphicon-share-alt"></i></a>
													</div>
											<?php }
												
												else {
													$getprofilestatus5 = \common\models\activemode::checkprofilestatscompletewidp(Yii::$app->user->identity->id,"escrow_transaction_approval",$_GET['id']);
											if(!$getprofilestatus5){
														?>
														<div class="note note-info">
												 Payment Approval is in-progress.
													</div>
											<?php } else{ ?>Winner<?php }}}}} ?></div>
												
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                   
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
									 <div class="modal fade" id="basic2" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Modal Title2</h4>
                                                </div>
                                                <div class="modal-body"> <?php
												//check if myprofile pending
                                     $getprofilestatus = \common\models\activemode::checkprofilestatscomplete(Yii::$app->user->identity->id,"my_profile");
												if(!$getprofilestatus){
													?>
													<div class="note note-info">
													Kindly Complete your Profile First. <a class="btn circle btn-info" href="<?php echo Yii::$app->urlManager->createUrl(['myprofile/create']) ?>" > click here <i class="glyphicon glyphicon-share-alt"></i></a>
													</div>
													<?php
												}else{
																									//check if myprofile pending
                                     $getprofilestatus2 = \common\models\activemode::checkprofilestatscomplete(Yii::$app->user->identity->id,"my_KYC_upload");
												
													if(!$getprofilestatus2){
														?>
														<div class="note note-info">
													Kindly Upload your KYC Documents First.<a class="btn circle btn-info" href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>" > click here <i class="glyphicon glyphicon-share-alt"></i></a>
													</div>
														
														<?php
													}else{
												$getprofilestatus3 = \common\models\activemode::checkprofilestatscomplete(Yii::$app->user->identity->id,"my_KYC_approval");
											if(!$getprofilestatus3){
														?>
														<div class="note note-info">
													 KYC Documents Approvals is in progress.
													</div>
													
													<?php	
											}else{
												
											$getprofilestatus4 = \common\models\activemode::checkprofilestatscompletewidp(Yii::$app->user->identity->id,"escrow_transaction",$_GET['id']);
											if(!$getprofilestatus4){
														?>
														<div class="note note-info">
												Kindly Complete your Payment First.<a class="btn circle btn-info" href="<?php echo Yii::$app->urlManager->createUrl(['landlordaction/myescrow']) ?>" > click here <i class="glyphicon glyphicon-share-alt"></i></a>
													</div>
											<?php }
												
												else {
													$getprofilestatus5 = \common\models\activemode::checkprofilestatscompletewidp(Yii::$app->user->identity->id,"escrow_transaction_approval",$_GET['id']);
											if(!$getprofilestatus5){
														?>
														<div class="note note-info">
												 Payment Approval is in-progress.
													</div>
											<?php } else{ ?>Winner<?php }}}}} ?></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                 
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

									  <script>
function downloadfileconfig(str) {
	
$('#filenamemain').val(str);
$('#filedownload').trigger('click');
}
</script>


<?php  $form = ActiveForm::begin(array('id'=>'ibformnmsssocket')); ?>		
<input type="hidden" name="filenamemain" id="filenamemain" >
 <input type="submit" name="filedownload" id="filedownload"  value="pdfss" style="display:none;"  > 
 <?php $form = ActiveForm::end(); ?>
 									  <script>
function downloadfileconfigtwo(str) {
	
$('#filenamemaintwo').val(str);
$('#filedownloadtwo').trigger('click');
}
</script>


<?php  $form = ActiveForm::begin(array('id'=>'ibformnmsssocket')); ?>		
<input type="hidden" name="filenamemaintwo" id="filenamemaintwo" >
 <input type="submit" name="filedownloadtwo" id="filedownloadtwo"  value="pdfss" style="display:none;"  > 
 <?php $form = ActiveForm::end(); ?>
