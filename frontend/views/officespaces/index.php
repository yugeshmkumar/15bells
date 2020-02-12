<?php

$this->registerLinkTag(['rel' => 'canonical', 'href' => 'https://www.15bells.com/office-spaces']); 
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
						<p class="find_mor"><a class="enquire_now" href="<?php echo yii::$app->urlManager->createUrl(['lesseeaction/viewpropertys','type'=>'office-space']) ?>">Find out more <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/chevron.svg';  ?>"></a></p>
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
					<h2 class="blog_titl">How to Get an Office Space on lease</h2>


					<p class="blog_txt">15 bells provide right Real estate consultation. We help you make a smart choice with your investment. With a great experience of over decades in the commercial properties consultation in Gurgaon, we offer the best realty consultation services to our clients. We offer creative and modern office spaces in Gurgaon. Our whole team does it all from conception to design to implement office solutions.  We are the reliable real estate developers in the commercial project business which includes a surfeit of services like leasing, buying, Renting and selling of the commercial buildings, office spaces, Retail shops, Retail space and more. </p>
					<p class="blog_txt">We guide the real estate investors to take a good decision according to the scenario of real estate development, Investment size, and ROI. We and our whole team give you the right data of the real estate investment as well as we tell you about the future and the present of the property, we also tell you that the property in which you are going to invest in fruitful or not. If not, then what is the best possible solution for your investment.</p>
                    <p class="blog_txt">We never misguide our customers and always guide them for a lucrative and better investment option. we will tell you about some important factors that will help you with leasing a new office space. </p>
                <div class="col-md-12">
                <h2 class="blog_titl">•	Length of the Term</h2>
                <p class="blog_txt">Most of the office space on lease comes with a commitment of one year and goes up to 9 years. Landlords usually ask for the 5 to 9 year of lease terms but if you able to fulfill that commitment then the landlords provide you some flexible lease terms of a shorter period. </p>
                <h2 class="blog_titl">•	Considering Price</h2>
                <p class="blog_txt">Many startup businessmen invest a huge amount of money in getting huge office spaces. They don’t focus on the rent per square foot, they don’t determine the whole budget of the office rent as well as office amenities related costs like parking, utilities, relocation, maintenance, insurance, tenant improvements, furniture and others. So, always take care of the budget and choosing an office on rent which suits your budget. </p>
                <h2 class="blog_titl">•	Proper Paper Work</h2>
                <p class="blog_txt">The office on rent relates some paperwork also. If you are going to rent any office space, ensures properly that the seller has all the registration certificates or not. These certificates are ‘namely clearance to the Government’ Property tax receipts and transfer documents from the previous owner if any. If you don’t take proper care of the paperwork, maybe you have to face measures problems related to your office space leasing. </p>
                <h2 class="blog_titl">•	Accurate Size</h2>
                <p class="blog_txt">The size of the office space for rent should always be sufficient for the number of employees you are going to accommodate. If you rent any large area of office space then you will have to pay also for vacant and unused space. So you should have a very calculable data of the property size you need and then investing in the lease of office space. </p>
                <h2 class="blog_titl">•	Location</h2>
                <p class="blog_txt">Location is the most important factor whenever you take any office spaces on lease. Location affects your business productivity in a positive way or a negative way. If you choose the right location for your office space on rent then you will get the more. But choosing a renting office space depends on your budget and convenience also. 
                    Better communication and lodging is a very important factor to decide any location for your business. Are your business is related to customer-facing startup? Then the location of the office is very important. If Buyers are a huge part of your business then you should be leasing a front-facing, ground floor office space, retail space or retail shop in a busy residential locality. 
                    If your business is completely online and no need for client-facing then you should choose any peaceful and lower cost location for the office space rent. 
                </p>
                <h2 class="blog_titl">•	Amenities</h2>
                <p class="blog_txt">Do you want an office with all the luxury and comfortability of kitchens, breakout zones, fancy bathrooms, find dining and Parking? Or only a basic office space with some basic amenities. Always keep in mind the amenities that you, your employee and your business really needs.</p>
                <h2 class="blog_titl">•	Authorization of the Broker</h2>
                <p class="blog_txt">If you are going to take the commercial office spaces through a broker, then always try to ask multiple questions related to their authorization. The Broker’s authenticity, reliability, terms and conditions are as important as the landlord’s. His level of intervention and commission for the property should be worked out beforehand. </p>
                <h2 class="blog_titl">•	Design</h2>
                <p class="blog_txt">When people looking for a new office space on rent or lease they always prefer to choose trendy and stylish office spaces in the design. But before this you should always take a look at your business type, if your business really requires these types of trendy design and style, you can go ahead for this. 
If you want a business that can become a brand in the business then design and style are very important to exhibit the brand image from the initial days of the business. 
</p>
                <h2 class="blog_titl">•	Tech and Features of the Real Estate Portal</h2>
                <p class="blog_txt">Nowadays Searching and booking any commercial properties, office spaces, office spaces on the lease, office space on rent is very convenient and reliable. The advancement of technology and real estate websites can smoothen the process of comparing, shortlisting and booking a property. With the help of the related property website, you can know their terms, conditions and past details of the deals. 
Leasing an office space or any commercial property is not only an investment of time and money but also explores your business and their productivity. So, always make sure that you should have to start your entrepreneurial journey with the right decision, office space renting not only optimize your budget but it also represents your business, product and employees. 
</p>
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
		<div class="col-md-4 resource_form">
        
        <a href="tel:6209151515"><p class="call_no text-center"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/phone.svg';  ?>" width="17"> +91-6209-15-15-15</p></a>
           <?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"officespaces"]); ?>
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