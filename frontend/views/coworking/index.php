<?php

$this->registerLinkTag(['rel' => 'canonical', 'href' => 'https://www.15bells.com/coworking/']); 
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
						<h1 class="about_head">Search a Coworking Space in Delhi/NCR</h1>
						<p class="about_det animated slideInDown">15bells is the one-stop solution for your search of an affordable coworking space in Delhi, Gurgaon,and Noida at the best location. You need to tell us the requirement and we will provide you the best coworking and shared office within your budget with the best of facilities.</p>
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
				<h2 class="trans_head">Workspace/Shared offices for Startups</h2>
				<p class="brand_txt" style="color:#ffffff;">Every startup needs an environment that helps them to grow, at coworking space will provide you the right environment to enhance your productivity, well-organised work culture and opportunity to grow your business with networking.</p>
			</div>
			<div class="col-md-6 text-left">
				
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="project_details details_office">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/1.jpg';  ?>" class="img_project"></p>
					<p class="location_txt">Private Offices</p>
					<p class="feature_txt">You will get a fully-furnished private office with stylish furniture and state of art technologies to help you. We provide solutions for modern-day professionals with a worry-free environment.</p>
					<p class="call_cowork"><a href="tel:6209151515">Call Us</a></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="project_details details_office">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/2.jpg';  ?>" class="img_project"></p>
					<p class="location_txt">Offices Suites</p>
					<p class="feature_txt">Just bring your laptop to start your work on ergonomically designed desks. We provide you open workstation with all the facilities and services managed by the Co-working team.</p>
					<p class="call_cowork"><a href="tel:6209151515">Call Us</a></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="project_details details_office">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/4.jpg';  ?>" class="img_project"></p>
					<p class="location_txt">Shared Spaces</p>
					<p class="feature_txt">Shared office and important client coming for a meeting, we provide the world-class meeting room available on demand. Important meeting, sales presentations or training program. We have space for meeting rooms, conference rooms and boardrooms.</p>
					<p class="call_cowork"><a href="tel:6209151515">Call Us</a></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="project_details details_office">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/2.jpg';  ?>" class="img_project"></p>
					<p class="location_txt">Virtual Office </p>
					<p class="feature_txt">Every Startup and entrepreneur required office space to grow. But the budget and having an expensive office is a bit difficult. But we offer you a virtual office solution by paying a small fraction of value and own a virtual office.</p>
					<p class="call_cowork"><a href="tel:6209151515">Call Us</a></p>
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
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="project_details">
					<p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/features/cafeteria.jpg';  ?>" class="img_project"></p>
					<p class="badge_image text-right"><span class="badge_feature orange_bg">Cafeteria</span></p>
				</div>
			</div>
		</div>
		
	</div>
</div>



<div class="container-fluid">
<div class="container">
		<div class="row">
			<div class="col-md-12 no_pad">
				<h3 class="trans_head_b">How Coworking Spaces are ideal for Entrepreneurs?</h3>
					<p class="brand_txt">If you are thinking about working in a coworking space then you should go for this. Coworking means
						the sharing of commercial office spaces by independent professionals, self-employed who want to
						work together in a common setting in the place of traditional employee-only office. The commercial
						coworking spaces have a lot of benefits that make it ideal for entrepreneurs.</p>
						<p class="brand_txt">Here we are going to include some important facts that will tell you how coworking spaces are
						beneficial to you.</p>
			</div>
			<div class="col-md-6 text-left">
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4 class="second_head">Ideal for Low-cost business or startups</h4>
					<p class="brand_txt">Leasing a traditional commercial office space is difficult and expensive for low-cost startups. In this,
							you have to sign the lease for at least 5 years. And the deposit is also required for it.</p>
						<p class="brand_txt">But for the coworking office spaces, you will not have to think so much. It is just like a club
membership, and you can take it only rented on the monthly, weekly hourly or according to your
chosen rent options.So, commercial coworking spaces are an ideal perspective for the startup entrepreneurs who are
looking for professional office spaces without paying high costs and long-term agreement.</p>
			
			</div>
			
			<div class="col-md-12">
				<h4 class="second_head">Coworking Spaces with all the amenities</h4>
					<p class="brand_txt">one of the very important benefits of coworking is you won’t have to spend any extra money on the
furniture, utilities, appliances (Fridge, Microwave, Coffee Machine) and additional leasing service charges. You won’t have to give extra time like private office spaces for setting up.</p>
						<p class="brand_txt">Commercial coworking projects investors sign a membership agreement in which all the necessary
information is available like amenities and other legal aspects.</p>
			
			</div>
			
			<div class="col-md-12">
				<h4 class="second_head">What is included in coworking space membership</h4>
					<ul class="">
						<li class="brand_txt">A desk and a chair (it depends on the membership level), a dedicated desk, or maybe a private office also.</li>
						<li class="brand_txt">Common shared Scanner/Printer/Copier</li>
						<li class="brand_txt">Wi-Fi and High-Speed Internet </li>
						<li class="brand_txt">Bookshelves</li>
						<li class="brand_txt">Free of cost coffee, tea and kitchen facilities with the  fridge and microwave</li>
						<li class="brand_txt">Conference room</li>
						<li class="brand_txt">No maintenance and cleaning charges</li>
					</ul>
			
			</div>
			<div class="col-md-12">
				<h4 class="second_head">Coworking offers Joint effort and teamwork</h4>
				<p class="brand_txt">Many self-employed freelancers work from home and they don’t get the joint effort and proper teamwork. Working in the home depends on the environment of your home and most of the time it is very distracting. So, these freelancers choose their working place in any coffee shops or malls. </p>
				<p class="">But if you are choosing coworking office spaces, it is very convenient for working purposes.</p>
					<h4 class="">Commercial co-working spaces provide: 	</h4>
					<ul class="">
						<li class="brand_txt">A convenient, professional and flexible work environment that grows productivity.</li>
						<li class="brand_txt">Positive social interaction with the coworking people</li>
						<li class="brand_txt">A balance between the work and life</li>
						
					</ul>
			
			</div>
			<div class="col-md-12">
				<h4 class="second_head">Coworking approaches the Valuable People and Contacts</h4>
				<p class="brand_txt">Coworking is also the ideal environment for connecting with other businessmen or entrepreneurs. For the startups, also need other working people like web designer, photographer, social media marketing campaign experts and many more. It may happen that which person you need who are just be a few desks away from you. </p>
				<p class="">Collaboration with new business people on a daily basis is good for you and your startup business. You will have to get a chance to learn new business ideas also. </p>
							
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

setTimeout(function() { $('.alert-success').fadeOut('fast'); }, 8000);

     $(".enquire_now").click(function () {
      $('html,body').animate({
        scrollTop: $(".contact_enquiry").offset().top - 100},
        'slow');   
		});
		

JS;
$this->registerJs($script);
?>  