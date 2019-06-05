<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\helpers\Url;

$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
$myprofile = \common\models\Myprofile::find()->where(['userID' => $userid])->one();
$company = \common\models\Company::find()->where(['userid' => Yii::$app->user->identity->id])->one();

$this->title = 'Dashboard';

?>
 
 <div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head"><span id="userrole">Seller</span> Dashboard</h2>
					</div>
					
					
				</div>
				<div class="col-md-12">
						<ul class="add_property nav nav-pills">
						<li class="active property_steps no_pad"><a data-toggle="pill" href="#home" class="categ_selec">Profile Details</a></li>
						<?php 	if ($company) { ?>
						<li class="property_steps no_pad"><a data-toggle="pill" href="#company" class="categ_selec">Company Details</a></li>
						<?php } ?>
						<li class="property_steps no_pad"><a data-toggle="pill" href="#password" class="categ_selec">Password</a></li>
						
					</ul>
				<div class="tab-content personal_details">
					  <div id="home" class="tab-pane row fade in active">
						<div class="col-md-12">
							<div class="col-md-8 no_pad">
								<div class="row">
									<div class="col-md-4 col-xs-4 prof_image">
									<?php if ($myprofile) { ?>
									<?php if ($myprofile->logo) { ?>
								<p><img src="<?php echo Yii::getAlias('@archiveUrl'); ?>/mycompanylogo/<?php echo $myprofile->logo ?>" id="thumbnail" class="prof_img" width="140"></p>
								<?php }else{ ?>
									<p><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/team/t2.jpg';  ?>"  class="prof_img" width="140" ></p>
								<?php } ?>
								<?php }else{ ?>
									<p><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/team/t2.jpg';  ?>"  class="prof_img" width="140"></p>
								<?php } ?>
										
									</div>
									<div class="col-md-8 col-xs-8">
									<?php  if($user) {  ?>
										<h3 class="user_name"><?php echo  ucfirst($user->fullname).' '.ucfirst($user->lastname)  ?></h3>
										
									<?php	}else{ ?>

									   <h3 class="user_name">Full Name</h3>

										<?php } ?>
										<p class="user_id">
										<?php  $userids = yii::$app->user->identity->id;
                                        echo 'UID'.$userids * 23 * 391;?></p>
										<p class="user_detail"><i class="fa fa-phone"></i> <?php echo  ucfirst($user->username);  ?></p>
										<p class="user_detail"><i class="fa fa-envelope"></i> <?php echo  ucfirst($user->email);  ?></p>
									</div>
								</div>
								<div class="row">
								<p class="profile_edit">
								<?php
								$checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
								if ($checkrole->item_name == "Company_user") {    ?>

								<a href="#" class="edit_profile sub_users">Add Sub User</a>

								<?php } ?>
								
								<a href="<?php echo yii::$app->urlManager->createUrl(['site/postlogin']) ?>" class="edit_profile">Edit Profile</a></p>
								
								</div>
							</div>
							<div class="col-md-4 no_pad">
							<div class="row">
								<h3 class="current_role">Current Role</h3>
								<ul class="sub_categories role_list text-center">
										<li id="buyer" class=""><a href="javascript:void(0)" class="property_subtype col-md-10" id="buyer">Buyer</a></li>
										<li id="seller" class=""><a href="javascript:void(0)" class="property_subtype col-md-10" id="seller">Seller</a></li>
										<li id="lessor" class=""><a href="javascript:void(0)" class="property_subtype col-md-10" id="lessor">Lessor</a></li>
										<li id="lessee" class=""><a href="javascript:void(0)" class="property_subtype col-md-10" id="lessee">Lessee</a></li>
								</ul>
							</div>
							</div>
						</div>
							
					  </div>
					  <?php 	if ($company) {
                    $company_name = $company->name;
                   
                    $company_website = $company->company_website;
                    $description = $company->description;
					$company_type = $company->company_type;
					
					?>
					  <div id="company" class="tab-pane row fade">
							<div class="col-md-12 user_profile">
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6  col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Company name</p>
											<p class="label_name"><?php echo $company_name; ?></p>
										</div>
										<div class="col-md-6 col-xs-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/website.svg';  ?>">Website</p>
											<p class="label_name"><?php echo $company_website; ?></p>
										</div>
									  </div>
									  
								<div class="row">
										<div class="col-md-6 company_overview">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Type of Industry</p>
											<p class="label_name"><?php echo $company_type; ?></p>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<p class="profile_edit"><a href="<?php echo yii::$app->urlManager->createUrl(['site/postlogin']) ?>" class="edit_profile">Edit Profile</a></p>
								</div>
							</div>
							<div class="col-md-12 seperator_div"></div>
							<div class="col-md-12 user_profile">
								<h3 class="current_role">Brief about company</h3>
								<p class="role_name"><?php echo $description; ?>. </p>
								
							</div>
					  </div>

<?php } ?>


					  <div id="password" class="tab-pane row fade">
						  <div class="col-md-12 user_profile">
							<div class="col-md-9">
								<div class="row">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Current Password</p>
									<p class="label_name">You can always change your password</p>
									<p class="password_hide">*****************</p>
								</div>
							</div>
							<div class="col-md-3">
								<p class="profile_edit"><a href="<?php echo yii::$app->urlManager->createUrl(['site/postlogin']) ?>" class="edit_profile">Edit Profile</a></p>
							</div>
						</div>
					  </div>
				 </div>
				</div>
			</div>
  		</div>
		  <div id="add_user" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm modal_dialogue modal_user">

    <!-- Modal content-->
    <div class="modal-content draw_map no_pad">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body no_pad">
		
		<div class="container-fluid padding_rating">
			<div class="col-md-12 text-left" id="addusers">
				<h2 class="subuser_hed">Add Sub Users</h2>
				<p class="visit_txt">Please enter the details of your Sub User</p>

			<?php $modeled = new \frontend\modules\user\models\SignupForm(); ?>

				<?php $form = ActiveForm::begin(['id' => $modeled->formName(),
			      //'enableAjaxValidation'   => true,

				//'enableClientValidation' => false,
				'action'=>\Yii::$app->urlManager->createUrl(['user/sign-in/ajaxsignup'])]);

				 ?>

				 <?= $form->errorSummary($modeled); ?>

				<p class="user_Detail">
				<?=$form->field($modeled, 'fname')->textInput([ 'placeholder' => "User name" , 'class' => 'form-control input_desgn input_location'])->label(false)?>

				
				</p>
				<p class="user_Detail">
				<?=$form->field($modeled, 'email')->textInput([ 'placeholder' => "E-mail id" , 'class' => 'form-control input_desgn input_location'])->label(false)?>

				</p>
				<p class="user_Detail">
				<?=$form->field($modeled, 'username')->textInput([ 'placeholder' => "Phone Number" , 'class' => 'form-control input_desgn input_location'])->label(false)?>
				</p>
				<?=
                                
                                $form->field($modeled, 'user_login_as')->hiddenInput(['value' => 'lessee'])->label(false);
                                        

                                ?>

                                <?=
                                
                                $form->field($modeled, 'companytype')->hiddenInput(['value' => 'Individual'])->label(false);
                                        

                                ?>
				<p class="user_Detail">
				<?=$form->field($modeled, 'designation')->textInput([ 'placeholder' => "Designation" , 'class' => 'form-control input_desgn input_location'])->label(false)?>

				</p>
				<p class="text-center">
				<?php echo Html::submitButton(Yii::t('frontend', 'Add Sub User'), ['class' => 'btn btn-default btn_signin', 'name' => 'signup-button1']) ?>
				</p>
				<?php ActiveForm::end(); ?>
			</div>
			<div class="col-md-12 text-left" id="congratss">
				<h2 class="subuser_hed">Sub Users Successfully Added</h2>
				<p class="visit_txt">A sub user has been successfully added. An email with intructions to login to portal sent to sub user.</p>
				<p class="text-center"><button class="btn btn-default btn_signin" id="confirmcongrats">Confirm</button></p>
			</div>
		</div>
      </div>
      
    </div>

  </div>
</div>	
		  <?php 
$script = <<< JS

$(".sub_categories li a").click(function() {
   $(this).parent().addClass('active').siblings().removeClass('active');
});


$('form#{$modeled->formName()}').on('beforeSubmit', function(e) {
	
	var form = $(this);
	
	var formData = form.serialize();
	
	$.ajax({
	
		url: form.attr("action"),
	
		type: form.attr("method"),
	
		beforeSend: function(){
		
		 
	   },
	   complete: function(){
	   
		
	   },
	
		data: formData,
	
		success: function (data) {
	
			if( typeof(data["signupform-username"]) != "undefined"){

				  var username  =   data['signupform-username'];

				  alert(username);
				 
	
			}
	
	 if ( typeof(data["signupform-username"]) != "undefined" && data["signupform-username"] !== null && data["signupform-username"] !== 'exist' ) {
						 
						}
	
						 if(data == 'done'){
	
							$('#addusers').hide();
		
		                     $('#congratss').show();

								}else{

								alert('Some Internal Error');

								}
			
	
		   
	
		},
	
		error: function () {
	
			//alert("Something went wrong");
	
		}
	
	});
	
	}).on('submit', function(e){
	
		
	
	e.preventDefault();
	
	});



$('.property_subtype').click(function(){
  
  var pid = this.id;

  getuserloginas(pid);

});

$(".sub_users").click(function() {
	
	$('#addusers').show();
	$('#congratss').hide();
    $("#add_user").modal('show');

    });

	$("#confirmcongrats").click(function() {
	
		$("#add_user").modal('hide');

    });
	


 function getuserloginas(user) {
    
                                      
                                            
    $.ajax({
        type: "POST",
        url: '/site/getuserloginas',
        data: {user: user},
        success: function (data) {
      
       
        if(data == '1'){


        $("#buyer").removeClass('active');
		$("#seller").removeClass('active');  
		$("#lessor").removeClass('active');  
		$("#lessee").removeClass('active');    
		
		$("#"+user).addClass('active');  

        toastr.success('Successfully Saved ','success');
		location.reload();    
        }else{
           toastr.error('Internal Error','error');    
                }
        },
    });

}

JS;
$this->registerJs($script);
?>



