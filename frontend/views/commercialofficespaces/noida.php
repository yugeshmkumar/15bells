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

<section class="container-fluid header_bg parallax-window section office_form" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'//newimg/office/noida.jpg';  ?>">
			
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
						<h1 class="about_head">Need Commercial Retail space in Noida?</h1>
						<p class="about_det animated slideInDown">For the first time 15 Bells, a Commercial Real Estate company trades in real time. We proudly represent our self as the one-stop solution for all the commercial property needs – BUY, SELL or LEASE a commercial property in Delhi NCR Just within 15 Hours!!</p>
						<p class="find_mor"><a class="enquire_now" href="<?php echo yii::$app->urlManager->createUrl(['lesseeaction/viewpropertys','location'=>'Noida']) ?>">Find out more <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/chevron.svg';  ?>"></a></p>
					</div>
					<div class="col-md-6 col-md-offset-1  hidden-lg hidden-md text-left brand_desp about_bannr hidden-lg hidden-md">
                    <div class="col-md-12 resource_form">
                        <?php $form = ActiveForm::begin(['id' => 'mobileform','action'=>"officespaces/noida"]); ?>
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
					<h2 class="blog_titl">Commercial Retail Space in Noida</h2>


					<p class="blog_txt">If you are an investor, businessman, end-user or planning to start a new industry, office, company, retail store, retail shop, a shopping complex on lease or rent, then you are at the right place. 15bells share updated information related to Noida’s New launch commercial projects, Retail Shops, Retail Store, Retail Space, Assured Return Projects, Office Spaces, Service Apartments, Pre Leased Commercial Properties, Commercial space on lease and Resale Commercial Properties etc. </p>
					<p class="blog_txt">We help you to get proper knowledge of commercial space in Noida as per your desired location. The Whole team of 15 bells has years of experience in the commercial market in Noida, Greater Noida, Noida Expressway, Central Noida, Noida Extension, Greater Noida West and others. We have the proper data of the leasing and renting commercial spaces all over Noida. </p>
                    <p class="blog_txt">15bells is a web platform that offers investment opportunities and business startup offices to the end-user or investor in Noida and Greater Noida. We also help you to find and compare commercial properties such as retail shops, investment in shopping malls, food court space, preleased properties, office spaces, leasing and reselling the commercial space in Noida. </p>
                
                <h2 class="blog_titl">Looking For Buying/Renting/Leasing a Commercial Space In Noida?</h2>
                <p class="blog_txt">Are you looking for a commercial space in Noida to buy, lease, rent or resell but you have no idea where and how to start from, Don’t worry, you are at the right place, we will help you with all your queries related to Industrial Space in Noida. 15bells always offer the best properties for investment and startups because we know the value of your hard-earned money. </p> 
                <p class="blog_txt">We avail you the best Commercial leasing spaces in Noida, Noida Extension, Greater Noida and Yamuna Expressway. So, ready to move in commercial properties, preleased commercial properties in Noida, retail shops in Noida, Office space in Noida, Co-working office space in Noida. With us, you have the option to compare varieties of properties at one platform and choose the best one for you and your startups. </p> 
                <h2 class="blog_titl">Some Best Commercial Space & Retail Space In Noida for leasing</h2>
                <p class="blog_txt">15 bells deals in different types of commercial office spaces all over Noida which will give you the huge return and productivity in the present and future both. Here are some best commercial projects lists:-</p> 
                <ul class="noida_list">
                	<li>Gaur World Street Mall</li>
                    <li>Bhutani Grantham</li>
                    <li>Galaxy Diamond Plaza</li>
                    <li>NX One Mall</li>
                    <li>WTC CBD Noida</li>
                    <li>Cyberthum</li>
                    <li>Anthurium</li>
                    <li>Paramount City Square</li>
                    <li>Paramount Golf Mart Commercial</li>

                </ul>
                
                <h2 class="blog_titl">Gaur World Street Mall</h2>
                <p class="blog_txt">The Developer of Gaur World Street Mall is one of the most promising and trusted real estate players in the commercial real estate business known for its best development. This mall offers Kiosks, food courts, Spacious retail shops, retail stores, commercial shops for investors and buyers on leasing or rent. It is well connected with the road and the metro. </p> 
                <p class="blog_txt">Gaur World street offers trendy commercial spaces, retail shops as well as 1.5 acres space for parking purpose, you will also get designated rooms for storage, four sides entry, 24x7 security, high-speed elevators, and centralized air-conditioned shops. This commercial project is loaded with world-class amenities. </p> 
                <h2 class="blog_titl">Bhutani Grandthum Noida Extension</h2>
                <p class="blog_txt">This grand commercial project is just 2 minutes away from the metro station, located at plot No. 7, Sector Techzone 4, Greater Noida West. This project is designed keeping in mind all the needs of the investors, buyers, visitors, customers and owners. It offers retail & commercial spaces such as Pubs, Retail shops, 4-screen multiplex/cinema hall, food courts, shopping malls and others. You will get all amenities like 24 hours security, High-speed lifts, 24X7 power supply, fire suppression technologies and continuous water supply, ample parking space, rainwater harvesting and digitally monitored complex. </p> 
                <h2 class="blog_titl">Galaxy Diamond Plaza commercial space</h2>
                <p class="blog_txt">Galaxy Diamond Plaza has close connectivity with NH 91, NH 24, DND Flyway and Yamuna Expressway. It is also easily approachable to Delhi, Noida and Ghaziabad. You can find Hypermarket and 5 screen multiplex with a food court at Galaxy Grand Plaza Gaur City. It is one of the best commercial space options in the area. And the best thing is that the office spaces, retail shops, retail store and others are available at an affordable rate here</p> 
                <h2 class="blog_titl">NX One Mall</h2>
                <p class="blog_txt">It is located closer to the Gaur City and just 400 meters away from the proposed metro station. NX one office is the best option for established businesses or companies. You will get all types of amenities like 24*7 power backup, frequent power supply, jogging track, gymnasium, Yoga, Swimming Pool, Community hall, rainwater harvesting, earthquake resistance, children’s play area, Elevator, lift, utility store, restaurant and others. </p> 
                <h2 class="blog_titl">Cyberthum in Sector 140A Noida</h2>
                <p class="blog_txt">It is located in 25 acres of area with world-class amenities to attract the investors, buyers, visitors and customers. This is towering commercial development that offers commercial spaces such as retail shops, retail spaces and office space for your business needs. For further information, you can contact us.</p> 
                <h2 class="blog_titl">Anthurium (sector-73, Noida)</h2>
                <p class="blog_txt">If you want to enhance your business come to Anthurium Noida Commercial Spaces. It is located at sector 73, Noida with all the modern and basic amenities to enhance your business. If you are searching for a productive business destination this the best commercial space project to explore. </p> 
                <h2 class="blog_titl">Paramount City Square commercial office Space and Shop at Noida Extension</h2>
                <p class="blog_txt">Paramount city square is developed by the reputed developer of Paramount Group. This complex is spread over an area of 20,000 sqft. Which is a very good range of commercial office space and retail shops. This complex has open shopping areas, kiosks, restaurants, anchor stores and coffee shops. </p> 
                <h2 class="blog_titl">Paramount Golf Mart Commercial Office Space and Shop at Greater Noida</h2>
                <p class="blog_txt">It is also a great project of paramount Group developers, located at ZETA I, Greater Noida. It offers business shops and office spaces. It is fully furnished with every single and advanced amenities. Here you will get all commercial features like high-speed internet, Wi-Fi, Conference rooms, food courts, ATMs and banking facilities. </p>  
               
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
        <?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"officespaces/noida"]); ?>
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