<?php

$this->registerLinkTag(['rel' => 'canonical', 'href' => 'https://www.15bells.com/office-spaces-delhi']); 
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

<section class="container-fluid header_bg parallax-window section office_form" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/delhi.jpg';  ?>">
			
			<div class="container-fluid no_pad div_header">
			
				<div class="container" id="banner_cont">

				<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>

					<div class="col-md-6 col-md-offset-1 text-left brand_desp about_bannr hidden-sm hidden-xs">
						<h1 class="about_head">Need Office space in Delhi?</h1>
						<p class="about_det animated slideInDown">For the first time 15 Bells, a Commercial Real Estate company trades in real time. We proudly represent our self as the one-stop solution for all the commercial property needs – BUY, SELL or LEASE a commercial property in Delhi NCR Just within 15 Hours!!</p>
						<p class="find_mor"><a class="enquire_now" href="<?php echo yii::$app->urlManager->createUrl(['lesseeaction/viewpropertys','location'=>'Delhi']) ?>">Find out more <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/chevron.svg';  ?>"></a></p>
					</div>
					<div class="col-md-6 col-md-offset-1 text-left brand_desp about_bannr hidden-lg hidden-md">

                    <div class="col-md-12 resource_form">
                   <?php $form = ActiveForm::begin(['id' => 'mobileform','action'=>"officespaces/delhi"]); ?>
                        <h3 class="side_head">Contact Us</h3>
                                    <div class="row">
                                        <div class="col-md-12 no_pad border_form">
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
                                    
                                
                            <?php ActiveForm::end(); ?>
                        </div>

                    </div>
					
				</div>
				
				
	<!-- end of navbar-->
			</div>
	
		</section>


<div class="container-fluid blog_bg">
	<div class="row">
		<div class="col-md-8">
        <div class="row blog_repeat">
              
				<div class="col-md-12 contnt_blg">
					


					<p class="blog_txt">15 bells is among the leading commercial real estate service providers in the Delhi and NCR. Our motto is to offer end-to-end commercial projects like office spaces on rent in Delhi, Office Space on Lease in Delhi, Industrial buildings, industrial plots and more to the real estate investors in Delhi so that they can bring a professional approach in the real estate industry. Quality, Transparency, Trust, and Integrity are our identification.  </p>
					<p class="blog_txt">Nowadays, commercial investors not only looking for a shop or commercial building to invest in. They also want convenience, advanced technology and exclusivity which make the project value for money and we avail all of these. Our Experienced teams of professionals provide the best guidance with respect to commercial real estate investment. </p>
                    <p class="blog_txt">15 bells always put client’s satisfaction at the core of its approach. Hard work of our whole team has given us the zenith position on the list of NCR’s leading real estate consultancy services. We have gotten a good reputation in the commercial real estate market of Delhi NCR owing to our partnership with some of the leading builders. </p>
                <div class="col-md-12">
                <h2 class="blog_titl">Commercial Office Spaces on Lease in Delhi</h2>
                <p class="blog_txt">Delhi is not only known for the political capital and a historical city in India. It has become the biggest real estate hotspots of the country. The commercial properties' investment daily is growing at a fast pace and gives huge returns to the people. In a recent review by the world's known corporative magazine, Delhi has been the destination of the big reputated companies or industries. And it is also said that in a few years it will become the leading commercial real estate industrial city not only in India but in the whole world. </p>
                
                <p class="blog_txt">Connaught Place, Netaji Subhash Palace, Nehru Palace, Saket District Center, Jasola District Center and Chandni Chowk in old Delhi is always the center of the commercial real estate market. Even small businesses in these areas have enormous growth potential, investors always invest in the office spaces on rent or lease in these areas from India and abroad. 
In Delhi, these commercial properties come in the form of office spaces, retail spaces, food stores, and beverage stores, shopping malls, multiplex and other commercial plots where you can invest. These commercial spaces especially office spaces in Delhi gives you huge returns. So, Delhi’s Commercial real estate projects have a lot of potentials and if you are thinking to invest in real estate, Delhi should be definitely be considered.
</p>
                <h2 class="blog_titl">Office Space for Rent in Connaught Place</h2>
                <p class="blog_txt">Connaught Place is a premium business center in the heart of New Delhi.</p>
                <p class="blog_txt">It is well connected to the metro station, and the nearest metro station is Rajiv Chowk. We provide office spaces on rent in Connaught Place. Our office spaces offer the best experience of a productive workday with a perfect balance of work and fun. In Connaught place, you will get a vibrant co-working community where big businesses, Individual freelancers, Startup companies work alongside each other in a shared environment. </p>
                <p class="blog_txt">Office for rent, office space for rent, furnished office on the lease, office space on rent for a startup, Private cabins, workstations, virtual offices, meetings room and any other, whatever you need for the commercial property investment in Connaught place, we provide. All the amenities from basic to modern, we provide like Wi-fi, Open Pantry, Parking, IT/Admin Support and more. At our office spaces in Connaught Place, New Delhi, we are always a step ahead of what you want. Private cabins or workspace from 2 to 20 people with high-speed internet service, storage area with tea and coffee are available. If you are in search of meeting rooms then we also provide the fully-furnished meeting rooms with audio conferencing facilities, high-speed internet and unlimited tea and coffee. </p>
               
                <h2 class="blog_titl">Flexi Desk Option for the Freelancer in Connaught Place</h2>
                <p class="blog_txt">If you are a freelancer, bloggers, and other independent professionals, who don’t need a permanent office space in Connaught Place. So, For them, we have a Flexi desk option which acts as your office space, which is economical as well as a perfect fit for your needs.</p>
                <p class="blog_txt">So whenever you need any type of office space for rent in Connaught Place, you can contact with us. </p>
                <h2 class="blog_titl">Office Space on Lease in Chandni Chowk</h2>
                <p class="blog_txt">Are you looking for office space on lease in Chandni Chowk? Then your search for any type of office space for lease or co-working office space on lease ends here. We provide new age coworking office spaces that refresh, engage and connect with the transport and residents.</p>
                
                <p class="blog_txt">Chandni Chowk, situated in old Delhi is the perfect destination for any business type. That’s the reason we provide the office space for lease in Chandni Chowk, Office Space on rent in Chandni Chowk, office space for a startup in Chandni Chowk at the prime business locations. So, choose us for amazing workspaces to customizable shared office space solutions, complete with everything you need to make your business run. </p>
                
                <h2 class="blog_titl">Office Space for Startup in Delhi</h2>
                <p class="blog_txt">Are you starting any new business? Are you going to launch your innovative startup in Delhi But you don’t have the perfect office space solution for your startup? </p>
                <p class="blog_txt">A start-up is an innovative constantly evolving company. And every start-up requires an adaptable office space or commercial buildings for the rapid growth and good reputation. We provide a flexible and comfortable workspace or office space for a startup in Delhi. Flexibility is very important for start-ups. We only suggest you start-up office spaces which is the most suitable for your business. </p>
                
                <p class="blog_txt">You can also invest in shared office spaces on rent start-ups in Delhi. This will give you easy and fast access to business premises while allowing to move quickly if your company runs out of space. So, contact the best Real estate agent in Delhi that is 15 bells escape you from taking any wrong step in choosing the best office space in Delhi for the startup</p>
                </div>
                </div>
								
			</div>
           <!-- <div class="row blog_repeat">
                 <div class="col-md-12 no_pad">
                       <iframe width="100%" height="315"
                    src="https://www.youtube.com/embed/keQPc37-1QA">
                    </iframe>
                 </div>
				<div class="col-md-12 contnt_blg">
					<h2 class="blog_titl">How RERA helps a buyer</h2>

				
					<p class="blog_det"><span class="writr_b">Ankur  Gupta</span>|<span class="date_b">January 1st, 2014 </span></p>
					

					<p class="blog_txt">Finally, after 10 years of long wait, RERA has finally swung into action. The government implemented RERA Act from May 1st onwards, whose main objective is to look into the grievances of the consumers.  When it comes to the real estate sector it is a known fact that customers have faced a number of issues when it comes to delivery of the under-construction properties, execution of the said plans and the legitimacy of the property.What RERA does is that it promotes accountability, transparency,</p>
					<p class="read_m"><a href="/blogs/How-RERA-helps-a-buyer" target="_blank" class="expnd_blog">Read more</a></p>
				</div>
								
			</div>-->
		</div>
	<!---Blog Side menu----->
		<div class="col-md-4 resource_form hidden-xs hidden-sm">
        
        <a href="tel:6209151515"><p class="call_no text-center"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/phone.svg';  ?>" width="17"> +91-6209-15-15-15</p></a>
        <?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"officespaces/delhi"]); ?>
           <h3 class="side_head">Contact Us</h3>
                    <div class="row">
                        <div class="col-md-12 no_pad border_form">
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
                    
                
            <?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
	
			





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