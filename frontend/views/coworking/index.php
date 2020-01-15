<?php

$this->registerLinkTag(['rel' => 'canonical', 'href' => 'https://www.15bells.com/coworking/']); 
use yii\widgets\ActiveForm;

use yii\helpers\HtmlPurifier;
use yii\helpers\Html;



?>



<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/cowork.jpg';  ?>">
			
			<div class="container-fluid no_pad div_header">
			
				<div class="container" id="banner_cont">

				<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>

					<div class="col-md-6 col-md-offset-1 text-left brand_desp about_bannr">
						<h1 class="about_head">Need Co-working space?</h1>
						<p class="about_det animated slideInDown">For the first time 15 Bells, a Commercial Real Estate company trades in real time. We proudly represent our self as the one-stop solution for all the commercial property needs – BUY, SELL or LEASE a commercial property in Delhi NCR Just within 15 Hours!!</p>
						<p class="find_mor"><a class="enquire_now" href="javascript:void(0)">Find out more <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/chevron.svg';  ?>"></a></p>
					</div>
					
					
				</div>
				
				
	<!-- end of navbar-->
			</div>
	
		</section>


	
			

<div class="container-fluid team_banner">
	<div class="">
		<div class="row">
			<div class="col-md-6 no_pad">
				<h1 class="trans_head">Workspace Solutions</h1>
				<p class="brand_txt" style="color:#ffffff;">Whether you're an established enterprise or a scaling startup, your office should drive your business forward. Find the space that's right for you.</p>
			</div>
			<div class="col-md-6 text-left">
				
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/1.jpg';  ?>" class="img_project"></p>
					<p class="location_txt">Private Offices</p>
					<p class="feature_txt">Proudly unveiling M3M Broadway! One stop destination for F&B, Retail & Entertainment. Sector 71, Golf Course Road Extn., Gurugram.</p>
					<p class="feature_txt"><a href="">Read More</a></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/2.jpg';  ?>" class="img_project"></p>
					<p class="location_txt">Offices Suites</p>
					<p class="feature_txt">Proudly unveiling M3M Broadway! One stop destination for F&B, Retail & Entertainment. Sector 71, Golf Course Road Extn., Gurugram.</p>
					<p class="feature_txt"><a href="">Read More</a></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/4.jpg';  ?>" class="img_project"></p>
					<p class="location_txt">Shared Spaces</p>
					<p class="feature_txt">Proudly unveiling M3M Broadway! One stop destination for F&B, Retail & Entertainment. Sector 71, Golf Course Road Extn., Gurugram.</p>
					<p class="feature_txt"><a href="">Read More</a></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/2.jpg';  ?>" class="img_project"></p>
					<p class="location_txt">Private Offices</p>
					<p class="feature_txt">Proudly unveiling M3M Broadway! One stop destination for F&B, Retail & Entertainment. Sector 71, Golf Course Road Extn., Gurugram.</p>
					<p class="feature_txt"><a href="">Read More</a></p>
				</div>
			</div>
		</div>
		
	</div>
</div>

<div class="container-fluid our_mission">
<div class="">
		<div class="row">
			<div class="col-md-6 no_pad">
				<h1 class="trans_head_b">Amenities</h1>
				<p class="brand_txt">Focus on the work and leave the rest to us.</p>
			</div>
			<div class="col-md-6 text-left">
				
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/features/1.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature">Office Space</span></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/features/2.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature grey_color">Coworking Space</span></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/features/3.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature orange_bg">Meeting Space</span></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/features/4.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature">Conference Room</span></p>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/features/5.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature grey_color">Private Space</span></p>
				</div>
			</div>
		</div>
		
	</div>
</div>

<?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"coworking"]); ?>
<div class="container-fluid pad_50 contact_enquiry">
<div class="container">
		<div class="row">
			<div class="col-md-12 no_pad">
				<h1 class="trans_head_b">Got a question or proposal?</h1>
				<p class="brand_txt">Cool! Let us know and we will get back to you in no time.</p>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="row padd_contact">
					<div class="col-md-6">
						<?php echo $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => "Full Name", 'class'=>'form-control input_desgn'])->label(false); ?>

					</div>
					<div class="col-md-6">
						<?php echo $form->field($model, 'phone')->textInput(['minlength' => 10,'maxlength' => 10,'maxlength' => true, 'placeholder' => "Phone No", 'class'=>'form-control input_desgn'])->label(false); ?>

					</div>
					
				</div>
				<div class="row padd_contact">
					<div class="col-md-6">
						<?php echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => "Email", 'class'=>'form-control input_desgn'])->label(false); ?>

					</div>
					<div class="col-md-6">
						<?php echo $form->field($model, 'seats')->textInput(['maxlength' => true, 'placeholder' => "No. Of Seats", 'class'=>'form-control input_desgn'])->label(false); ?>

					</div>
				</div>
				<div class="row padd_contact">
					<div class="col-md-12">
						<?php echo $form->field($model, 'message')->textArea(['maxlength' => true, 'placeholder' => "Message", 'class'=>'form-control input_desgn'])->label(false); ?>

					</div>
				</div>
				<div class="row padd_contact">
					<div class="col-md-12">
					 <?= Html::submitButton('Send Message', ['class' => 'send_messgae sign_up']) ?>

					</div>
				</div>
				
			</div>
		</div>
		
	</div>
</div>
<?php ActiveForm::end(); ?>

<?php 
$script = <<< JS
     $(".enquire_now").click(function () {
      $('html,body').animate({
        scrollTop: $(".contact_enquiry").offset().top - 100},
        'slow');   
		});
		

JS;
$this->registerJs($script);
?>  