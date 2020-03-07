<?php

$this->registerLinkTag(['rel' => 'canonical', 'href' => 'https://www.15bells.com/office-spaces-gurugram']); 
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

<section class="container-fluid header_bg parallax-window section office_form" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/office/gurugram.jpg';  ?>">
			
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
						<h1 class="about_head">Need Commercial Retail space in Gurugram?</h1>
						<p class="about_det animated slideInDown">in this article we are going to tell you about some best areas of Gurgaon for commercial Properties investment, office spaces on the lease, Office space on rent, Industrial plot, Industrial land and more. The following areas are the best locations of Gurgaon for commercial project view. Investment in these locations will give your business a better and productive future. </p>
						<p class="find_mor"><a class="enquire_now" href="<?php echo yii::$app->urlManager->createUrl(['lesseeaction/viewpropertys','location'=>'Gurugram']) ?>">Search Office Spaces In Gurgaon <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/chevron.svg';  ?>"></a></p>
                    </div>
                    <div class="col-md-6 col-md-offset-1 text-left brand_desp about_bannr hidden-lg hidden-md">
					<div class="col-md-12 resource_form">
        
         <?php $form = ActiveForm::begin(['id' => 'mobileform','action'=>"officespaces/gurugram"]); ?>
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
					<h2 class="blog_titl">Commercial Retail Space in Gurgaon</h2>


					<p class="blog_txt">Are you looking for any cost-effective commercial space in Gurgaon? Then, 15bells can deliver you the best options for commercial retail space for rent in Gurgaon. Our team experts have experience in this real estate commercial business from the last few decades. </p>
				 <p class="blog_txt">New startup businesses demand the furnished and unfurnished both types of commercial spaces, retail shops in Gurgaon. The startup companies also want the new commercial offices for their startup business. According to the new survey, tenants have emerged a lot on the main locations as well as the emerging locations of Gurgaon. We provide all types of commercial spaces such as commercial office spaces, commercial retail shops, commercial retail stores, retail space, shopping complex, food courts, movie theaters and many more. </p>
                 <div class="col-md-12">
                <h2 class="blog_titl">Commercial Retail Space in Gurgaon Near Metro Station</h2>
                <p class="blog_txt">The demand for commercial spaces in Gurgaon near the metro station is very high and the preferred locations for the office spaces should be MG Road, Golf Course Road, Udyog Vihar or near sector 44 in Gurgaon. Each investor and Business companies want to invest, buy and rent the commercial property near the metro station due to convenience for easy communication with the visitors, customers, staffs and team members. </p>
                <p class="blog_txt">15bells have broad experience in this commercial real estate investment and have provided the desired business location and commercial properties to the many multinational companies as well as investors like IT and ITES, Banking and Finance, Consulting, Insurance, Advertising and Media, Trading, NGO’s, etc. if you are also someone like them who want to invest your money in any commercial space project in Gurgaon or start your own office spaces in Gurgaon, Retail Shop in Gurgoan, Retail Store in Gurgaon, Shopping Mall in Gurgaon and any other businesses which required commercial spaces, please contact with us. </p>
                <h2 class="blog_titl">Furnished Commercial Space on Lease in Gurgaon</h2>
                <p class="blog_txt">Nowadays most of the investors, companies or industries want furnished commercial office spaces, furnished retail shops, furnished retail store and other furnished commercial spaces for their startup and investment. </p>
                <p class="blog_txt"> And we, 15bells are here in Gurgaon to providing the people furnished commercial spaces on lease in Gurgaon. We have been working for corporate leasing, retail leasing, commercial leasing, warehouse leasing for many decades. We always try to deliver the best property to the customer in their budget. Our experts guide you with the best commercial space in the best location within your investment size. So, if you are hunting for the furnished commercial office spaces on rent or lease in Gurgaon, please contact with us. </p>
                <h2 class="blog_titl">Small Commercial retail Spaces For Rent in Gurgaon for Startup Companies or Small Business Owners</h2>
                <p class="blog_txt">We also provide small commercial retail spaces for a startup or small industries. we offer small unfurnished, semi-furnished and fully furnished commercial spaces in Gurgaon on Rent or lease for IT/Non-IT Companies, Freelancers and others. These office spaces are available on low maintenance costs and low rental costs. Small commercial spaces are a very good option for the independent worker and small companies because it saves your money which you can use in exploring your business. </p>
                <p class="blog_txt">We have some best and cost-effective small furnished commercial office spaces, retail shops and retail stores in the prime location of Gurgaon such as Udyog Vihar, Golf Course Extension Road, Sohna Road and others. </p>
                <p class="blog_txt">So, if you are looking for the retail space for rent or lease in Gurgaon, we are the one-stop destination for you. We welcome you to avail of the best commercial spaces in Gurgaon at best price, best location, best rentals with easy procedure. </p>
                <h2 class="blog_titl">Best Location in Gurgaon to lease Commercial Spaces</h2>
                <p class="blog_txt">If you are looking to lease any commercial spaces in Gurgaon, you’ve picked the best locations which are perfect for your investment and business purpose. The best commercial property location gives you high returns and more productivity, so choosing the best location for commercial space is very important. Here we are discussing some areas of Gurgaon, which is high in demand.</p>
                <h2 class="blog_titl">Golf Course Extension Road</h2>
                <p class="blog_txt">Golf Course Extension Road is an ideal location for commercial investment, the location accommodates various commercial spaces such as retail stores, retail shops, shopping complex, well-famed schools, supermarkets, hospitals and so on. Because of the civic amenities, it is a high-residential area also which gives rise to the fruitful ROI from the commercial real estate projects developing here.  </p>
              <h2 class="blog_titl">Dwarka Expressway</h2>
                <p class="blog_txt">Dwarka Expressway is also considered as the best location for start-up businesses and commercial real estate investment. Here, you will get many new luxurious commercial projects which offer the commercial spaces which can give you a high return on investment. Its good connectivity to Delhi and other major business destination of Gurgaon, most of the investors and businessmen want to invest in this area. So, Dwarka Expressway is seen as the great location of Gurgaon for long-term investment purposes. </p>
                
                <h2 class="blog_titl">Sohna Road</h2>
                <p class="blog_txt">Sohna Road is one of the finest locations of Gurgaon for commercial spaces. It is well-equipped with commercial and residential projects. There are many commercial properties provide commercial spaces in Sohna Road for supermarkets, office spaces, retail shops, retail stores and many more. That’s why Sohna Road is counted as the high-end location in Gurgaon for the Commercial spaces on lease or rent. </p>
                <h2 class="blog_titl">DLF City</h2>
                <p class="blog_txt">DLF City is also one of the unbeatable locations in Gurgaon for the commercial spaces investment. It is based on international infrastructure and design which is good for commercial purposes. Here you will get commercial offices, corporate buildings, multi-level parking, retail shops, retail spaces and other commercial spaces. </p>
                <p class="blog_txt"> If you are hunting for the best location in Gurgaon for commercial retail spaces, DLF City is the perfect location for you. </p>
                <h2 class="blog_titl">Mehrauli-Gurgaon (MG) Road</h2>
                <p class="blog_txt">MG Road, one of the best locations in the city that offers luxurious commercial spaces, office spaces, complex, malls, food courts, movie theatre, shopping malls and many more. From residential to commercial, MG Road provides the best facilities and amenities for both of them. There are many commercial projects of the reputed developers that exist, which offers high turnover commercial spaces for your startup businesses or industries. </p>
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
        <?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"officespaces/gurugram"]); ?>
           <h3 class="side_head">Contact Us</h3>
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
                            <div class="row padd_contact">
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