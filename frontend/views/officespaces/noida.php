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
						<h1 class="about_head">Need Office space in Noida?</h1>
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
					<h2 class="blog_titl">Commercial Office Spaces in Noida </h2>


					<p class="blog_txt">Noida is the prime industrial hub of the NCT (National Capital Territory), Uttar Pradesh State. There are many multinational, IT/ITeS companies such as HCL, TCS, Tech Mahindra, Adobe and many others exist. You can get many small to big properties in low to high budget. Even MNCs are also planning to set up offices here, commercial properties in Noida is continuously growing.  </p>
					<p class="blog_txt">Noida is well connected with Delhi and Ghaziabad. There are many expressways, underpasses, and flyovers which make good connectivity with the other parts of Uttar Pradesh, Delhi and NCR. And the upcoming plan of an airport in jewar makes it the perfect commercial real estate destination in the view of commercial property investors. The most recommendable locations of Noida for investing in office spaces for start-up or office spaces for businesses are sector 74-78,  sector 119, sector 120, sector 121, sector 150 and sector 152.</p>
                    <p class="blog_txt">You can also invest in other localities like Noida Extension, Noida Expressway, and Greater Noida West. All types of commercial buildings in Noida are available for investment and for your own use. We are going to recommend some best locations for commercial properties or office spaces investment in Noida.</p>
                
                <h2 class="blog_titl">Coworking Space on Lease in Noida/ Shared office Spaces for rent in Noida</h2>
                <p class="blog_txt">Nowadays Coworking Spaces or shared office spaces have become the first option of the start-up business as well as multinational companies, big industries, and enterprises. It offers professional networking, a supportive community, state-of-the-art facilities and infrastructure and a creative working environment with a unique entrepreneurial zest, booming shared office spaces are really expediting the co-working game. </p>
                <p class="blog_txt">The main aim of providing coworking office space on lease in Noida is to collaborate with professionals for growing ideas, stories, work and play. The Shared Office Space in Noida on rent gives you the large networking, affordable and a full hassle-free workspace/office for teams of all sizes.  </p>
                <p class="blog_txt">In our coworking spaces in Noida is adaptable to all professional needs. The Shared office space on lease is the best workspace solution for freelancers, home professionals, independent contractors, and other independent working people. We provide all the amenities from basic to advance. We have varieties of co-working solutions, you can choose any as per your need at the co-working space. </p>
                <p class="blog_txt">In brief, the coworking office spaces for lease is the best option for any types of startups and investment, here you will get creative and collaborative office suits such as private cabins, comfortable workstations, conference rooms, recreational zones including unlimited tea and coffee. </p>
                <h2 class="blog_titl">Office For Startup in Noida</h2>
                <p class="blog_txt">The office spaces in Noida is like a hot cake for your business startup. And we offer trendy office spaces from ergonomically planned workspaces to intricately planned specifications that break away from traditional office norms. If you invest in the workspaces or office for a startup in Noida, a densely populated area, you will get a chance to make your startup business more productive. Our office spaces on rent in Noida have all the amenities, luxurious facilities as well as flexible sizes in office spaces, spacious parking, multiple, 24x7 security, high-speed internet facilities, and wi-fi settings. </p>
                <h2 class="blog_titl">Some office space for a startup in Noida in your budget and ready to move</h2>
                <p class="blog_txt">Here are some low-cost and pocket-friendly offices for startup on rent in Noida which are in budget and you are able to ready to move at any time, we are suggesting some commercial projects here, they are following</p>
                <div class="col-md-12">
                <h2 class="blog_titl">•	Spring House </h2>
                <p class="blog_txt">Spring House Noida provides the shared office space for a startup, possessing a capacity of 150 seats. It also offers to you the option of working space like sunny-quaint spots as well. The interiors of this startup office space are unique and perfect to give a working environment.</p>
                <h2 class="blog_titl">•	Advanced Navis, Sector 142 Noida </h2>
                <p class="blog_txt">The Greater Noida Expressway is the hub of an IT-BPO company. That’s the reason the demand for good commercial office spaces for the startup is very high here. Here office spaces are limited because if you choose this area for your business startup then you will get huge returns in the future. </p>
                <h2 class="blog_titl">•	Logix City Center, Sector 32 Noida</h2>
                <p class="blog_txt">This Commercial project in Noida is located in the prime location. It is well connected to all types of public transport. The nearest metro station from this project is The Noida City Center Metro Station. It is surrounded by crowded residential areas. So, for a startup, it will be the best location.</p>
                <h2 class="blog_titl">•	World Trade Tower, Sector 16 Noida </h2>
                <p class="blog_txt">The world Trade Tower is the perfect location for investment and a new startup for those who are looking for ROI in the future. It is well connected to transport and civic amenities. This property is in front of sector 16 Metro station Noida. It is only one commercial building in Noida which is the closest to Delhi, it is only a 5-minute drive distance from New Delhi. If you choose this location for your office space for a startup in Noida, It will be proved an ultra-premium project location. </p>
                <h2 class="blog_titl">•	iThum Sector 62 Noida </h2>
                <p class="blog_txt">It is also a project which is very close to the metro station and well connected to other public transport too. So for the office space startup, it is a very impressive area. It is an IT-BPO company’s destination. This is also a perfect location for your office startup in the budget.</p>
                <h2 class="blog_titl">•	The Corenthum, Sector 62 Noida </h2>
                <p class="blog_txt">If you want an office space for a startup in Noida on the lease, you can choose The Corenthum, sector 62 Noida. After the metro facility starts here, the demand for this location is very high. This project is like a hot cake on sale, it is very high in demand because the possibilities of returns are huge in the future. So, if you are looking for any office space for a startup in Noida on Rent then you should choose this project. </p>
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