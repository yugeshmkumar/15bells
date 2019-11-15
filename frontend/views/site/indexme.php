
<?php
//$tittle = $this->title = Yii::t('app', '15Bells');
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<style>
.nav_bg{
	background:transparent !important;
} 
#containerr {
    position: relative;
}

/*
    covers the whole container
    the video itself will actually stretch
    the container to the desired size
*/
#videocover {
    position: absolute;
    z-index: 1;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
</style>

 
<div class="row text-center pad50 brand_desp">
				<p class="brand_name">15 Bells</p>
				<p class="tag_line">redefining transparency</p>
			</div>
			<div class="row pad50 text-center">
				<button class="btn btn-default start_lets" onclick="ga('send', 'event', 'LetsStart Link', 'LetsStart Link', 'LetsStart Link','LetsStart Link')">Let's Start</button>
			</div>
			

		</div>
	</div>
	</section>


	<section class="container-fluid pad50 s1 section" id="aboutus">
			<div class="container">
				<div class="row text-center section_common">
					<p class="top_tg_1">About</p>
					<h2 class="section_tg">Our Business Objective </h2>
					<p class="section_txt">Strive to create a transparent and safe place for swift real estate transactions with disruptive technology.</p>
				</div>
				<div class="row pad30">
					<div class="col-md-6">
						<p class="abt_txt">15 Bells is a revolution in the real estate sector. With stagnant growth and fraudulent activities prevailing in the industry, we at 15 Bells make sure that there is no hindrance when it comes to commercial leasing, selling or buying. With an amalgamation of technology, trust and transparency, we implement digital innovations to resolve the age-old problems of the real estate sector to deliver an astounding experience to the stakeholders.</p>
						<p class="abt_txt">With us, you can search for the right property, client or deal with just a few clicks. How? Register with 15 Bells, authenticate your profile, select your role on the portal (buyer, seller, lessor, lessee) and you are done. We deliver your customized dashboard within a few seconds. You can then access all the information about your property or the property you are interested in, at one place.</p>
						<p class="abt_txt">Scout for best properties, check the location, visit the site virtually, get hassle-free legal consultation and lease, buy or sell properties within 15 minutes. It is that simple, user-friendly and swift. </p>
						<p class="abt_txt">At 15 Bells, we redefine transparency and cultivate better processes for the ever-expansive real estate market. </p>
						<p class="abt_txt">Be growth ready with 15 Bells!</p>
					</div>
					<div class="col-md-6">
						<div id="containerr">
    					<div id="videocover">&nbsp;</div>
						<video id="main_vd" onclick="ga('send', 'event', 'Video Play', 'Video Play', 'Video Play','Video Play')" width="500" height="300" controls muted poster="<?= Yii::getAlias('@frontendUrl').'/newimg/video.png';  ?>">
						  <source src="https://www.dropbox.com/s/8gq8fqq0rtkz4iv/case3d_homepage_video_final.mp4?raw=1" type="video/mp4">
						  
						Your browser does not support the video tag.
						</video>
						</div>
					</div>
				</div>
			</div>
	</section>
 

<!--
	<div class="container-fluid our_motto pad50 parallax-window" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/3.jpg';  ?>">
		<div class="row text-center section_common">
					<p class="top_tg">About</p>
					<h2 class="section_tg white_clr">Our Main Motto is</h2>
					<p class="section_txt white_clr">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
		</div>
	  
	</div>

-->

	<section class="container-fluid  pad50 s2 section" id="herefor">
		<div class="container">
			<div class="row text-center section_common">
					<p class="top_tg">About</p>
					<h2 class="section_tg">I am here for</h2>
					<p class="section_txt">Hello and welcome to the online face of commercial real estate. 15 Bells is here to assist you with a one-stop commercial property solution. You are just a few clicks away from getting your work done. So let’s get started!</p>
			</div>
			<div class="row">
				<div class="col-md-offset-3 col-md-8">
					<div class="col-md-3 text-center">
						<div class="icon office_div" id="office_tag" onclick="openNav(),ga('send', 'event', 'Office Space Click', 'Office Space Click', 'Office Space Click','Office Space Click')">
							<div class="icon_type office_div">
								<i class="fa fa-building icn_cat"></i>
							</div>
							<p class="prop_field">Office Space</p>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="icon ret_div">
							<div class="icon_type ret_div" id="retail_tag" onclick="openNav(),ga('send', 'event', 'Retail Space Click', 'Retail Space Click', 'Retail Space Click','Retail Space Click')">
								<i class="fas fa-store icn_cat"></i>
							</div>
							<p class="prop_field">Retail Space</p>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="icon ware_div" id="warehouse_tag" onclick="openNav(),ga('send', 'event', 'Warehouse Click', 'Warehouse Click', 'Warehouse Click','Warehouse Click')">
							<div class="icon_type ware_div">
								<i class="fas fa-warehouse icn_cat"></i>
							</div>
							<p class="prop_field">Warehouse</p>
						</div>
					
					</div>
				<!--	<div class="col-md-3 text-center">
						<div class="icon">
							<div class="icon_type last_div" onclick="openNav()">
								<i class="fa fa-briefcase icn_cat"></i>
							</div>
							<p class="prop_field">Office space</p>
						</div>
					
					</div>-->
				</div>
			</div>
			<div class="row hidden-xs hidden-sm">
				<div class="col-md-12 text-center office common_space" id="office_det">
					<ul class="office_l">
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space On Lease', 'Space On Lease', 'Space On Lease','Space On Lease')"><span class="space_for office_lease">On Lease</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" onclick="ga('send', 'event', 'Space For Buying', 'Space For Buying', 'Space For Buying','Space For Buying')"><span class="space_for office_buy">For Buying</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" onclick="ga('send', 'event', 'Space to list your Property', 'Space to list your Property', 'Space to list your Property','Space to list your Property')"><span class="space_for office_list">List your Property</span></a>
						</li>
						
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" onclick="ga('send', 'event', 'Space For Distress Sale', 'Space For Distress Sale', 'Space For Distress Sale','Space For Distress Sale')"><span class="space_for office_sale">Distress Sale*</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space for Distress Lease', 'Space for Distress Lease', 'Space for Distress Lease','Space for Distress Lease')"><span class="space_for office_distress">Distress Lease*</span></a>
						</li>
						
					</ul>
					<div class="row">
						<div class="col-md-12 lease_contnt">Looking for office space on lease? 15 Bells has got your back!</div>
					</div>
				</div>
				<div class="col-md-12 text-center retail common_space" id="reatil_det">
				
					<ul class="office_l">
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space On Lease', 'Space On Lease', 'Space On Lease','Space On Lease')"><span class="space_for ret_lease">On Lease</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" onclick="ga('send', 'event', 'Space For Buying', 'Space For Buying', 'Space For Buying','Space For Buying')"><span class="space_for ret_buy">For Buying</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" onclick="ga('send', 'event', 'Space to list your Property', 'Space to list your Property', 'Space to list your Property','Space to list your Property')"><span class="space_for ret_list">List your Property</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" onclick="ga('send', 'event', 'Space For Distress Sale', 'Space For Distress Sale', 'Space For Distress Sale','Space For Distress Sale')"><span class="space_for ret_sale">Distress Sale*</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space for Distress Lease', 'Space for Distress Lease', 'Space for Distress Lease','Space for Distress Lease')"><span class="space_for ret_distrss">Distress Lease*</span></a>
						</li>
					</ul>
				</div>
				<div class="col-md-12 text-center warehouse common_space" id="ware_det">
					<ul class="office_l">
						<li>
						<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space On Lease', 'Space On Lease', 'Space On Lease','Space On Lease')"><span class="space_for ware_lease">On Lease</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" onclick="ga('send', 'event', 'Space For Buying', 'Space For Buying', 'Space For Buying','Space For Buying')"><span class="space_for ware_buy">For Buying</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" onclick="ga('send', 'event', 'Space to list your Property', 'Space to list your Property', 'Space to list your Property','Space to list your Property')"><span class="space_for ware_list">List your Property</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" onclick="ga('send', 'event', 'Space For Distress Sale', 'Space For Distress Sale', 'Space For Distress Sale','Space For Distress Sale')"><span class="space_for ware_sale">Distress Sale*</span></a>
						</li>
						<li>
							<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space for Distress Lease', 'Space for Distress Lease', 'Space for Distress Lease','Space for Distress Lease')"><span class="space_for ware_distres">Distress Lease*</span></a>
						</li>
					</ul>
				</div>
				<div class="col-md-12 text-center last common_space" id="last_det">
					
					<div class="col-md-3">
						<span class="space_for">For Buying last</span>
					</div>
					<div class="col-md-3">
						<a href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" onclick="ga('send', 'event', 'Space to list your Property', 'Space to list your Property', 'Space to list your Property','Space to list your Property')"><span class="space_for">List your Property</span></a>
					</div>
					<div class="col-md-3">
						<a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" onclick="ga('send', 'event', 'Space For Distress Sale', 'Space For Distress Sale', 'Space For Distress Sale','Space For Distress Sale')"><span class="space_for">Distress Sale*</span></a>
					</div>
					
				</div>
			</div>
			
	<!----------FOR MOBILE SCREEN------------>
			<div class="row hidden-lg hidden-md">
				<!-- The overlay -->
					<div id="myNav" class="overlay">

					  <!-- Button to close the overlay navigation -->
					  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

					  <!-- Overlay content -->
					  <div class="overlay-content">
						<div class="col-md-12 text-center office common_small" id="">
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space On Lease', 'Space On Lease', 'Space On Lease','Space On Lease')"><span class="space_for office_lease">On Lease</span></a>
							</div>
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" onclick="ga('send', 'event', 'Space For Buying', 'Space For Buying', 'Space For Buying','Space For Buying')"><span class="space_for office_buy">For Buying</span></a>
							</div>
							<div class="col-md-3 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" onclick="ga('send', 'event', 'Space to list your Property', 'Space to list your Property', 'Space to list your Property','Space to list your Property')"><span class="space_for office_list">List your Property</span></a>
							</div>
							<div class="col-md-3 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" onclick="ga('send', 'event', 'Space For Distress Sale', 'Space For Distress Sale', 'Space For Distress Sale','Space For Distress Sale')"><span class="space_for office_sale">Distress Sale*</span></a>
							</div>
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space for Distress Lease', 'Space for Distress Lease', 'Space for Distress Lease','Space for Distress Lease')"><span class="space_for office_distress">Distress Lease*</span></a>
							</div>
						</div>
						<div class="col-md-12 text-center retail common_small" id="">
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space On Lease', 'Space On Lease', 'Space On Lease','Space On Lease')"><span class="space_for ret_lease">On Lease</span></a>
							</div>
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" onclick="ga('send', 'event', 'Space For Buying', 'Space For Buying', 'Space For Buying','Space For Buying')"><span class="space_for ret_buy">For Buying</span></a>
							</div>
							<div class="col-md-3 col-xs-12 same_marg">
									<a href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" onclick="ga('send', 'event', 'Space to list your Property', 'Space to list your Property', 'Space to list your Property','Space to list your Property')"><span class="space_for ret_list">List your Property</span></a>
							</div>
							<div class="col-md-3 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" onclick="ga('send', 'event', 'Space For Distress Sale', 'Space For Distress Sale', 'Space For Distress Sale','Space For Distress Sale')"><span class="space_for ret_sale">Distress Sale*</span></a>
							</div>
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space for Distress Lease', 'Space for Distress Lease', 'Space for Distress Lease','Space for Distress Lease')"><span class="space_for ret_distrss">Distress Lease*</span></a>
							</div>
						</div>
						<div class="col-md-12 text-center warehouse common_small" id="">
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space On Lease', 'Space On Lease', 'Space On Lease','Space On Lease')"><span class="space_for ware_lease">On Lease</span></a>
							</div>
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" onclick="ga('send', 'event', 'Space For Buying', 'Space For Buying', 'Space For Buying','Space For Buying')"><span class="space_for ware_buy">For Buying</span></a>
							</div>
							<div class="col-md-3 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" onclick="ga('send', 'event', 'Space to list your Property', 'Space to list your Property', 'Space to list your Property','Space to list your Property')"><span class="space_for ware_list">List your Property</span></a>
							</div>
							<div class="col-md-3 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" onclick="ga('send', 'event', 'Space For Distress Sale', 'Space For Distress Sale', 'Space For Distress Sale','Space For Distress Sale')"><span class="space_for ware_sale">Distress Sale*</span></a>
							</div>
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space for Distress Lease', 'Space for Distress Lease', 'Space for Distress Lease','Space for Distress Lease')"><span class="space_for ware_distres">Distress Lease*</span></a>
							</div>
						</div>
						<div class="col-md-12 text-center last common_small" id="">
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space On Lease', 'Space On Lease', 'Space On Lease','Space On Lease')"><span class="space_for">On Lease</span></a>
							</div>
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" onclick="ga('send', 'event', 'Space For Buying', 'Space For Buying', 'Space For Buying','Space For Buying')"><span class="space_for">For Buying others</span></a>
							</div>
							<div class="col-md-3 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" onclick="ga('send', 'event', 'Space to list your Property', 'Space to list your Property', 'Space to list your Property','Space to list your Property')"><span class="space_for">List your Property</span></a>
							</div>
							<div class="col-md-3 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" onclick="ga('send', 'event', 'Space For Distress Sale', 'Space For Distress Sale', 'Space For Distress Sale','Space For Distress Sale')"><span class="space_for">Distress Sale*</span></a>
							</div>
							<div class="col-md-2 col-xs-12 same_marg">
								<a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" onclick="ga('send', 'event', 'Space for Distress Lease', 'Space for Distress Lease', 'Space for Distress Lease','Space for Distress Lease')"><span class="space_for">Distress Lease*</span></a>
							</div>
						</div>
					  </div>

					</div>

			</div>
		</div>
	</section>


		
	<section class="container-fluid  pad50 testimonial_bg s3 section">
		<div class="container">
			<div class="row text-center section_common">
					<p class="top_tg_2">Testimonials</p>
					<h2 class="section_tg white_clr">what our customer say?</h2>
					<p class="section_txt color_w">Hear from our costumers directly, read what they have to say and you could have the same experience.</p>
		</div>
			<div class='row test_row'>
					<div class='col-md-offset-1 col-md-10'>
					  <div class="carousel slide test_carosol" data-ride="carousel" id="quote-carousel">
						<!-- Bottom Carousel Indicators -->
						<ol class="carousel-indicators" style="bottom:-30px;">
						  <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
						  <li data-target="#quote-carousel" data-slide-to="1"></li>
						  <li data-target="#quote-carousel" data-slide-to="2"></li>
						</ol>
						
						<!-- Carousel Slides / Quotes -->
						<div class="carousel-inner">
						
						  <!-- Quote 1 -->
						  <div class="item active">
							<blockquote>
							  <div class="row">
							  <div class="col-sm-3 text-center">	
									<div class="clint_img">
										<img class="img-circle" src="<?= Yii::getAlias('@frontendUrl').'/newimg/c1.png';  ?>" style="width: 130px;height:130px;">
									</div>
								</div>
									<div class="col-sm-9">
										<div class="client_contnt">
										  <p class="clint_tst">I do not put up in India and hence it was a hassle to sell my property back in Delhi. While I was searching for agents to sell my property, I found 15 Bells. Trust me, selling a property has never been so easy. They take the least time to close a deal. It was fast and safe. 
Thanks to them, everything went as planned.</p>
										  <small>Mr. Rajnath Singh</small>
										 </div>
									</div>
								
							  </div>
							</blockquote>
						  </div>
						  <!-- Quote 2 -->
						  <div class="item">
							<blockquote>
							  <div class="row">
							  <div class="col-sm-3 text-center">	
									<div class="clint_img">
										<img class="img-circle" src="<?= Yii::getAlias('@frontendUrl').'/newimg/c2.png';  ?>" style="width: 130px;height:130px;">
									</div>
								</div>
									<div class="col-sm-9">
										<div class="client_contnt">
										 <p class="clint_tst">Great services and the account managers are really understanding. I told them my requirements and within a few hours they had a list of sites that matched my requirements. 
I would like to come back to them again and again. Thank you 15 Bells.</p>
										  <small>Mrs Reena Singh</small>
										 </div>
									</div>
								
							  </div>
							</blockquote>
						  </div>
						  <!-- Quote 3 -->
						  <div class="item">
							<blockquote>
							   <div class="row">
							   <div class="col-sm-3 text-center">	
									<div class="clint_img">
										<img class="img-circle" src="<?= Yii::getAlias('@frontendUrl').'/newimg/c1.png';  ?>" style="width: 130px;height:130px;">
									</div>
								</div>
									<div class="col-sm-9">
										<div class="client_contnt">
										  <p class="clint_tst">I never knew real estate business could come online. They have simplied the whole process from start to end. I listed my property and got genuine buyers for the same. 
They keep up to their promise of providing timely services.Good job Team 15 Bells. Thanks for saving my time and money.</p>
										  <small>Mr. Manveen Arora</small>
										 </div>
									</div>
								
							  </div>
							</blockquote>
						  </div>
						</div>
						
						<!-- Carousel Buttons Next/Prev -->
						<!-- <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
						<a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a> -->
					  </div>                          
					</div>
				  </div>
		</div>
	</section>

		



		<section class="container-fluid our_clients section s4" id="clients">
			
		</section>


<!--------Lead Capture Modal---------->

		<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog" style="background:#000000db;">
	  <div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Welcome</h4>
		  </div>
		  <div class="modal-body modal_contnt text-center">
			<p>Hey there! Are you looking for</p>
			<p class="appnd_txt"></p>
			<p>Please fill the form below!</p>
			
			<?php $modeled = new \common\models\ChatContactUs(); ?>
            <?php $form = ActiveForm::begin(['id' => $modeled->formName(),'action'=>"chatcontactus/create"]); ?>

            <?php echo $form->field($modeled, 'name')->textInput(['maxlength' => true, 'placeholder' => "Your Name", 'id' => 'chatname'])->label(false); ?>
           
					  <?php echo $form->field($modeled, 'email')->textInput(['maxlength' => true, 'placeholder' => "Your Email", 'id' => 'chatemail'])->label(false); ?>
					
						<?php echo $form->field($modeled, 'role')->hiddenInput(['maxlength' => true,  'id' => 'chatnamerole'])->label(false); ?>

            <?php echo $form->field($modeled, 'phone')->textInput(['placeholder' => "Phone Number", 'id' => 'phoneno'])->label(false); ?>
				
            <?= Html::submitButton('Lets get started', ['class' => 'btn btn-primary']) ?>
                    <?php ActiveForm::end(); ?>



		  </div>
		  
		</div>

	  </div>
	</div>
	
	<?php
$script = <<< JS
        $(".lease_contnt").hide();
		$(".office_lease").hover(function(){
			$(".lease_contnt").slideToggle(1000);
		});
 $('form#{$modeled->formName()}').on('beforeSubmit',function(e){
 
    e.preventDefault();
    e.stopImmediatePropagation();
   var form = $(this);
   $.post(
    form.attr("action"),
     form.serialize()
   
   ).done(function(result){
    
   if(result == 1){

       // $(document).find('#slider').css("right","-342px");
      //  var chatid = $(document).find("#slider").eq(0).children(1).attr("id");
       
        
        //var chatid = document.getElementById(chatid);
         //chatid.setAttribute("id", "sidebar");
         
         //chatid.setAttribute("onclick", "open_panel()");
        $('#myModal').modal('toggle');
        $(form).trigger("reset");
         toastr.success('Thanks for your time , Our Team will reach you Soon','success');
   
   }else{
 
        $('#message').html('Something Wrong');  
     }
          
   }).fail(function(){
      console.log("server Error"); 
   
   });
   return false;
   
 }); 
        

    		$("#videocover").click(function() { 
			var video = $("#main_vd").get(0);
			video.play();
	
			$(this).css("visibility", "hidden");
			return false;
	});
	$("#main_vd").bind("pause ended", function() {
			$("#videocover").css("visibility", "visible");
	});
    
JS;
$this->registerJs($script);
?>  
<?php
$this->registerJsFile('newjs/siteindex.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>







  
