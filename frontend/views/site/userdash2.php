<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\helpers\Url;

$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
$myprofile = \common\models\Myprofile::find()->where(['userID' => $userid])->one();
$this->title = 'Dashboard';

?>
 
	  <div class="container prof_card">
                <div class="row">
					<div class="col-md-9 prof_info">
						<div class="profile_div">
							<div class="row">
								<div class="col-md-9">
								
									<div class="user_img text-center">

										<?php if ($myprofile) { ?>
                                                                <?php if ($myprofile->logo) { ?>
															<p><img src="<?php echo Yii::getAlias('@archiveUrl'); ?>/mycompanylogo/<?php echo $myprofile->logo ?>" id="thumbnail" class="image_u"></p>
                                                            <?php }else{ ?>
                                                                <p><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+picture" id="thumbnail" class="image_u"></p>
                                                            <?php } ?>
                                                            <?php }else{ ?>
                                                                <p><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+picture" id="thumbnail" class="image_u"></p>
                                                            <?php } ?>
									</div>

									<?php  if($user) {  ?>
									
									<div class="user_info">
										<p class="user_det"><?php echo  ucfirst($user->fullname).' '.ucfirst($user->lastname)  ?></p>
									<?php
									$company = \common\models\Company::find()->where(['userid' => Yii::$app->user->identity->id])->one();
									
									if($company){ ?>

										<p class="user_det"><?php echo  ucfirst($company->company_type).' '.ucfirst($company->name)  ?></p>

									<?php 	

									} ?>

										
										
										<p class="user_det"><?php echo  ucfirst($user->username)  ?></p>
										<p class="user_det"><?php echo  ucfirst($user->email)  ?></p>

										<?php if($myprofile){ ?>

											<p class="user_det"><?php echo  ucfirst($myprofile->current_city).' , '.ucfirst($myprofile->current_state)  ?></p>
									<?php	} else{  ?>
										<p class="user_det"> City , State</p>
									<?php } ?>
									</div>
								             <?php 	 }   ?>


								<?php
								$checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
								if ($checkrole->item_name == "Company_user") {    ?>
									<p class="edit_proof"><a href="<?php echo yii::$app->urlManager->createUrl(['site/copostlogin']) ?>" class="edit_butn">Edit Profile</a></p>
								<?php }else{ ?>
								<p class="edit_proof"><a href="<?php echo yii::$app->urlManager->createUrl(['site/postlogin']) ?>" class="edit_butn">Edit Profile</a></p>

								<?php } ?>
								</div>

								<?php
$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
if ($getprofilestatus) {
	
    $count = $getprofilestatus->process_status;
} else {
    $count = 0;
}

$getprofilestatus1 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_KYC_upload");
if ($getprofilestatus1) {
    $count1 = $getprofilestatus1->process_status;
} else {
    $count1 = 0;
}

?>
								<div class="col-md-3 text-center progress_chrt">
									<ul class="user_progrss">
									<?php if ($checkrole->item_name == "Company_user") {  ?>
										<li class="">
											<a href="<?php echo Yii::$app->urlManager->createUrl(['site/copostlogin']) ?>" style="color:#000000 !important;"><p class="percent_prof"><?php echo $count ?>%</p><br>
										<span class="span_prof"><b>Profile</b></span></a>
										</li>
									<?php } else { ?>
										<li class="">
											<a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>" style="color:#000000 !important;"><p class="percent_prof"><?php echo $count ?>%</p><br>
										<span class="span_prof"><b>Profile</b></span></a>
										</li>
									<?php } ?>
										<li class="">
										<a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>" style="color:#000000 !important;">	<p class="percent_prof"><?php echo $count1 ?>%</p><br>
											<span class="span_prof"><b>Documents</b></span></a>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
    <!-- Logout Modal-->
  		<script>
$(document).ready(function(){
	$(".edit_butn").click(function(){
		$("#myModal").modal('hide');
	});
});
</script>
