<?php

$this->registerLinkTag(['rel' => 'canonical', 'href' => 'https://www.15bells.com/commercial-retail-spaces']); 
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

<section class="container-fluid header_bg parallax-window section office_form" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/office.jpg';  ?>">
			
			<div class="container-fluid no_pad div_header">
			
				<div class="container" id="banner_cont">

				<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>

					<div class="col-md-6 col-md-offset-1 text-left brand_desp about_bannr hidden-xs hidden-sm">
						<h1 class="about_head">Need Commercial Retail Space?</h1>
						<p class="about_det animated slideInDown">For the first time 15 Bells, a Commercial Real Estate company trades in real time. We proudly represent our self as the one-stop solution for all the commercial property needs – BUY, SELL or LEASE a commercial property in Delhi NCR Just within 15 Hours!!</p>
						<p class="find_mor"><a class="enquire_now" href="<?php echo yii::$app->urlManager->createUrl(['lesseeaction/viewpropertys','type'=>'office-space']) ?>">Search More Office Spaces <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/chevron.svg';  ?>"></a></p>
					</div>
					<div class="col-md-6 col-md-offset-1 text-left brand_desp about_bannr hidden-lg hidden-md">
                    <div class="col-md-12 resource_form hidden-lg hidden-md">
        
                        <?php $form = ActiveForm::begin(['id' => 'mobileform','action'=>"officespaces"]); ?>
                        <h2 class="side_head">Reach Us For Best Offers</h2>
                                <div class="row">
                                    <div class="col-md-12 no_pad border_form">
                                        <div class="row">
                                            <div class="col-md-6 mobile_pad_form">
                                                <?php echo $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => "Full Name", 'class'=>'form-control input_desgn'])->label(false); ?>

                                            </div>
                                            <div class="col-md-6 mobile_pad_form">
                                                <?php echo $form->field($model, 'phone')->textInput(['minlength' => 10,'maxlength' => 10,'maxlength' => true, 'placeholder' => "Phone No", 'class'=>'form-control input_desgn'])->label(false); ?>

                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mobile_pad_form">
                                                <?php echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => "Email", 'class'=>'form-control input_desgn'])->label(false); ?>

                                            </div>
                                            <div class="col-md-6 mobile_pad_form">
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
					<h2 class="blog_titl">Commercial Retail Space on Lease  </h2>


					<p class="blog_txt">Delhi NCR is one of the most important corporate and industrial hubs of India. You will get all types of commercial space on lease, not only for all big corporate companies but also for many small and medium companies. Delhi NCR is strategically developed and having varieties of options in commercial office space for rent. </p>
					<p class="blog_txt">Commercial space is available for commercial office, fully furnished office, commercial shop, retail shop, shopping complex, warehouse and many more. 15bells have more than 10,000 properties in its database to fulfill your needs of commercial office space on lease in Delhi NCR. Also, 15bells can help you in searching the commercial space for rent in Delhi NCR as per your desired requirements. You can trust on our 15bells team expertise for availing the right commercial office for lease in Delhi NCR. </p>
                    <p class="blog_txt">Leasing a good commercial property in Delhi has always been a tough task for businesses. But 15 bells provide you an appropriate commercial retail space on rent here. We have varieties of offices available on leasing term in South Delhi East Delhi, West Delhi, North Delhi, Central Delhi like Connaught Place, Khan Market, Gurgaon in Haryana and Noida in Uttar Pradesh. With decades of experience in the field of leasing and renting commercial space in Delhi and NCR, we have provided many commercial office spaces for corporate companies and small scale businesses. </p>
                    <h2 class="blog_titl">How to Find The Best Commercial Space For Your Startup Business</h2>
                <p class="blog_txt">There are varieties of commercial spaces that you can lease or rent but you will have to consider some important things before signing any lease. The lease is depended on the type of commercial space. Choosing the wrong location and the cost of space per square foot can hurt your new business. But if you choose the right type of space and location, it will help you in the growth and productivity of your business.  </p>
                <div class="col-md-12">
                
                <h2 class="blog_titl">•	What kinds of Commercial properties on the lease, your business needs </h2>
                <p class="blog_txt">First of all, you will have to confirm the property type that is needed for your business, should it be a commercial business park, industrial park or retail shop, retail location? Because commercial property does not just refer to stand-alone office buildings but also includes commercial parks, business parks, retail malls, shopping complex and outlets.  </p>
                <h2 class="blog_titl">Business Parks</h2>
                <p class="blog_txt">A business park is a group of buildings which is designed for general industrial use business purposes. The cost of leasing is often less than retail properties and industrial parks. It is the best commercial space property for the Doctors and other service professionals. </p>
                <h2 class="blog_titl">Industrial Parks</h2>
                <p class="blog_txt">This type of commercial spaces are best for the warehouses, godown or other large, unfurnished space needs. It is used for heavy industrial purposes. </p>
                <h2 class="blog_titl">Commercial Real Property</h2>
                <p class="blog_txt">This type of property includes malls, strip malls, and other facilities suitable for store-front types of businesses. </p>
                <h2 class="blog_titl">•	Things to Consider when Leasing Commercial Industrial Spaces on Lease</h2>
                <p class="blog_txt">Leasing conditions are a very important consideration when you are looking for any commercial or industrial space for your new startup business. When you lease any industrial properties, you will have to take care of the monthly rent cost. Because in Commercial Leases, can have other additional fees with rent like Base rent, free rent, security deposits, special taxes, property fees, loan fees, CAM, the future cost and others. </p>
                <h2 class="blog_titl">•	Signing the Lease agreement when the leasing Industrial Space is suitable for your Business</h2>
                <p class="blog_txt">When you are going to sign the lease agreement, be sure to ask questions about any restrictions or not that could impact on your business. You should ask about the service limitations, advertising and appearance limitations, space is telephone and cable ready or not, utilities, parking and traffic limitations, Business Hours, Nature of Business Protection and restrictions and other restrictions.  </p>
                </div>
                <h2 class="blog_titl">Where I Can Find Commercial Spaces For Lease? </h2>
                <p class="blog_txt">There are many ways to find a commercial office and retail space for lease or rent. Simply you can drive and see many signs are posted “for Lease” and the other way is to check the website of a real estate agent who provides the many commercial or industrial spaces for lease. </p>
                <p class="blog_txt">When you contact the commercial real estate agent or lessor, you may be able to negotiate a better deal, or even get a month of free rent because the lessor saves money if they do not have to pay commission fees. </p>
                <p class="blog_txt">Other ways to find the commercial space in the best location are searching the commercial office space on lease on different websites like Craigslist, LoopNet and others. You can also search In Local Newspaper. </p>
                <h2 class="blog_titl">How to Find Commercial Spaces on Craigslist?</h2>
                <p class="blog_txt">First click on your state, then country, then type of the name of the commercial property which you are looking for. Finding industrial spaces on Craigslist is more beneficial because most of the listings of properties are posted by individuals. These properties do not include other people like a broker or any other agent. </p>
                <h2 class="blog_titl">LoopNet</h2>
                <p class="blog_txt">LoopNet is a nationwide online commercial real estate service. Here you can find the many commercial properties for sale, rent or lease. For searching here mention your state, city or zip code. </p>
                <h2 class="blog_titl">Local Newspaper</h2>
                <p class="blog_txt">Local Newspaper is also one of the best ways to find commercial office space on rent. There are many listings are available by the realtors and the individuals. But If you want the best deal on affordable rent cost or lease cost, try to go with the individual’s listings. </p>
                <h2 class="blog_titl">Internet </h2>
                <p class="blog_txt">Nowadays Internet is the most convenient and the best way to find an office space for lease, use the search engines to find your desired property, type the city and state name where you are searching for the commercial space, retail shop, shopping complex, industrial space or any other keywords. </p>
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