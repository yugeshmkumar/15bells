<?php

$this->registerLinkTag(['rel' => 'canonical', 'href' => 'https://www.15bells.com/officespace/']); 
use yii\widgets\ActiveForm;

use yii\helpers\HtmlPurifier;
use yii\helpers\Html;



?>

<style>
.alert-success{
	position: absolute;
    right: -7.5%;
    top: 20%;
    border-radius: 0;
}
</style>

<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/office.jpg';  ?>">
			
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
						<h1 class="about_head">Need Office space?</h1>
						<p class="about_det animated slideInDown">For the first time 15 Bells, a Commercial Real Estate company trades in real time. We proudly represent our self as the one-stop solution for all the commercial property needs – BUY, SELL or LEASE a commercial property in Delhi NCR Just within 15 Hours!!</p>
						<p class="find_mor"><a class="enquire_now" href="javascript:void(0)">Find out more <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/chevron.svg';  ?>"></a></p>
					</div>
					
					
				</div>
				
				
	<!-- end of navbar-->
			</div>
	
		</section>


	
			

<div class="container-fluid padd_100">
    <div class="row">
			<div class="col-md-5 no_pad">
                <div class="cabin_detail">
				    <h1 class="trans_head_b">Personal Cabin</h1>
				    <p class="brand_txt">The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy text using the starting sequence "Lorem ipsum". Fortunately</p>
	    		</div>
            </div>
			<div class="col-md-7 text-left">
				<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/cabin.jpg';  ?>" class="img-responsive">
			</div>
	</div>
    <div class="row second_sec">
            <div class="col-md-7 text-left">
				<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/work.jpg';  ?>" class="img-responsive">
			</div>
			<div class="col-md-5 no_pad">
                <div class="right_side">
				    <h1 class="trans_head_b">Work Stations</h1>
				    <p class="brand_txt">The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy text using the starting sequence "Lorem ipsum". Fortunately</p>
	    		</div>
            </div>
			
	</div>

	 <div class="row second_sec">
			<div class="col-md-5 no_pad">
                <div class="cabin_detail">
				    <h1 class="trans_head_b">Metting space</h1>
				    <p class="brand_txt">The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy text using the starting sequence "Lorem ipsum". Fortunately</p>
	    		</div>
            </div>
			<div class="col-md-7 text-left">
				<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/meeting.jpg';  ?>" class="img-responsive">
			</div>
	</div>

	<div class="row second_sec">
            <div class="col-md-7 text-left">
				<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/eventt.jpg';  ?>" class="img-responsive">
			</div>
			<div class="col-md-5 no_pad">
                <div class="right_side">
				    <h1 class="trans_head_b">Events space</h1>
				    <p class="brand_txt">The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy text using the starting sequence "Lorem ipsum". Fortunately</p>
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
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/pc.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature">Personal Cabin</span></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/conference.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature grey_color">Meeting Room</span></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/reception.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature orange_bg">Reception</span></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/cfr.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature">Work Stations</span></p>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/cafeteria.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature grey_color">Cafeteria</span></p>
				</div>
			</div>
		</div>
		
	</div>
</div>

<?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"officespace"]); ?>
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
						<?php echo $form->field($model, 'area')->textInput(['maxlength' => true, 'placeholder' => "Total Area", 'class'=>'form-control input_desgn'])->label(false); ?>

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

setTimeout(function() { $('.alert-success').fadeOut('fast'); }, 8000);

     $(".enquire_now").click(function () {
      $('html,body').animate({
        scrollTop: $(".contact_enquiry").offset().top - 100},
        'slow');   
		});
		

JS;
$this->registerJs($script);
?>  