<?php

$this->registerLinkTag(['rel' => 'canonical', 'href' => 'https://www.15bells.com/office-spaces-noida']); 
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
						<h1 class="about_head">Need Commercial Retail space in Delhi?</h1>
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
				
                <h2 class="blog_titl">Commercial Retail Space in Delhi</h2>
                <p class="blog_txt">Delhi has become the major destination for commercial spaces, especially the New Delhi area. We have delivered many commercial Projects in Delhi and NCR without any hurdle and litigations.  We have always delivered all our commercial space projects to the customer on time. We offer the best official space all over the city. Connaught Place in New Delhi is known as the best commercial space area. </p>
                <p class="blog_txt">15bells is an online platform where commercial real estate properties are offered to the investors, buyers, businessman and others in a much faster and advance manner. We and our whole team not only help you in finding the best commercial space in Delhi and NCR but also ensure that the all procedure of investing, buying, leasing and renting properties are as smooth as it can be. </p>
                <p class="blog_txt">We understand that only buying a commercial space in Delhi is not a big deal, there are a lot of factors to be taken into cogitation, like the location, area, budget, amenities and many more. 15bells are a one-stop destination where your searching related to the best commercial space on lease in Delhi is ended up. If you are looking for a leasing commercial property or renting commercial space and planning to start your business, retail shop, retail store anything else, you will get everything related to commercial spaces, commercial property and real estate at our portal. </p>
                <p class="blog_txt">We offer commercial real estate spaces or property for sale, lease, and rent across the Delhi and NCR. If you want to invest your money in the best commercial projects in the top areas of Delhi, we provide the detailed information of various types of industrial or commercial properties on sale, lease and rent of reputed builders or developers. You can contact us for any type of commercial shops, shopping malls, retail spaces and retail stores in all over Delhi, Gurgaon, Noida and many more. </p>
                <p class="blog_txt">In our portal, a wide variety of listings of commercial spaces are available which gives you an overview of all the property. So, if you are searching for a commercial property like commercial office space, commercial retail space, a commercial retail store for your business set up or investing, we will provide you the best commercial space property in the best locations of Delhi and NCR. </p>
          
                <h2 class="blog_titl">Best Commercial Spaces For Buy/Rent/Lease in Delhi</h2>
                <p class="blog_txt">As you know that Delhi is the prime city for the real estate sector since the last few decades. The city is well connected with the airport, metro station, bus stand, and the railway station. And the best areas of the Delhi are Rohini, Dwarka, Connaught Place, Uttam Nagar and many others for investing, buying, renting and leasing commercial spaces. In these areas, many commercial projects are available which offers the best commercial spaces, commercial office spaces, Commercial retail shop, commercial shopping complex and more. Here we are going to mention some most productive business Commercial projects of Delhi.</p>
                <h2 class="blog_titl">Aerocity</h2>
                <p class="blog_txt">Aerocity is one of the best business districts in India and located in proximity to many commercial and residential areas in New Delhi. If you are looking for leasing commercial spaces or property in New Delhi, you will get the best deals at affordable prices in Aerocity. </p>
                <p class="blog_txt">Aeocity is the destination of commercial spaces and retails properties. it is located in South Delhi and well connected to the Delhi Metro and IGI Airport. The commercial viability of the area offers an extensive range of opportunities for your business startup. </p>
                <p class="blog_txt">All types of commercial spaces like Retail shops, Retail space, shopping complex, food courts, gym are equipped with all the modern and basic amenities which make it a perfect choice for your business. </p>
               
                <h2 class="blog_titl">The Delhi Mall</h2>
                <p class="blog_txt">Delhi Mall, located in Central Delhi on Pusa Road, a commercial building offers commercial spaces like showrooms, movie theatres, food court, retail shops, retail stores, commercial office spaces for start-up businesses. Being located in the Business district will provide your business with rapid productivity and growth. Delhi Mall has equipped with all the advanced amenities like Escalators, Elevators, multi-level car parking, public address system, central air conditioning and 24*7 hours security. </p>
                <h2 class="blog_titl">DLF Prime Towers</h2>
                <p class="blog_txt">if you have a thought to starting your new business or investing in commercial spaces in South Delhi then DLF Prime Towers is one of the best business hubs here. DLF Prime Towers is a commercial landmark that is designed to accommodate all the investor’s and buyer’s needs. This great project is located in Okhla Phase 1 have a great infrastructure and flexible commercial office spaces for every business needs. It is equipped with a central air-conditioning system, 100% power back-up, and hi-tech CCTV security. Here the maintenance charges are low and spacious parking for visitors and vehicles both. </p>
                <h2 class="blog_titl">JMS Marine Square</h2>
                <p class="blog_txt">JMS Marine Square 102 is the best upcoming projects in Delhi NCR by the JSM Group. If you are looking for a commercial space for the world-class shopping complex then this is the best. It is located in 6 acres of area with 6 floors with all the convenience, features and amenities. </p>
                <p class="blog_txt">If you are considering to start any outdoor cafes, High street Food zone, Retail store, Retail Shops, and hypermarket, you can go with this commercial space project. It is well connected with the IGI Airport, Sun City Avenue 102, Heritage max and Gurgaon marines. </p>
                <h2 class="blog_titl">Signum 95A</h2>
                <p class="blog_txt">Signum 95A is one of the best upcoming commercial projects in Delhi. It is located in proximity to the airport, transport stand that makes it a satisfactory business commercial project opening. It’s a perfect blend of a sharp infrastructure, shops, and commercial office spaces. 24-hour video security makes it one of the best commercial space investment projects. </p>
                <h2 class="blog_titl">M3M Corner Walk</h2>
                <p class="blog_txt">M3M Corner Walk Sector 74 is considered as the best commercial project in all the upcoming projects in Delhi/NCR. It is located at the prime location, in 7.5 acres of land area, the whole complex is equipped with the Wi-fi facility. It’s a world-class multiplex in addition to a separate floor of the food court. M3M Corner Walk is easily connected to the major areas like BMW training center, DLF Corporate greens. This project is easily accessible to IGI Airport and Golf Course Extension Road. </p>
                
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