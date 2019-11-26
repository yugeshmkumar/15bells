<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


//$this->title = Yii::t('app', 'Contact-Us');
$this->registerLinkTag(['rel' => 'canonical', 'href' => 'https://www.15bells.com/contact-us/']); 



?>

<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/about.jpg';  ?>">
			
            <div class="container-fluid no_pad div_header">
            
                
                <div class="container" id="banner_cont">
                    <div class="col-md-7 col-md-offset-1 text-left brand_desp about_bannr">
                    <h1 class="about_head">Want us to contact you?</h1>
                        <p class="about_det animated slideInDown">Our team at the backend is all set you to guide you through your real estate buying cycle. Help us with your contact details and we will get back to you as soon as possible. </p>
                        
                        <p class="call_back"><a href="<?php echo yii::$app->urlManager->createUrl(['contact-us/enquiry']) ?>">Organise call back <i class="fa fa-angle-right"></i></a></p>
                    </div>
                    
                    
                </div>
                
                
    <!-- end of navbar-->
            </div>
            
    
                <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
                
        </section>
    
    <!------------Transaction types Section----------->
    
    
    <div class="container-fluid no_pad">
        <div class="container">
            <div class="row">
                <h1 class="trans_head_b">Find us on map</h1>
                <div class="col-md-12 no_pad">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3509.1547682827377!2d77.09338521440176!3d28.414586500663813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d231b240a0a51%3A0x4eea781e21be6883!2s15bells!5e0!3m2!1sen!2sin!4v1552386670646" height="450" frameborder="0" style="border:0;width:100%;margin-top:20px;" allowfullscreen></iframe>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="container-fluid no_pad">
        <div class="container">
            
            <div class="row reach_det">
                <div class="col-md-6 no_pad">
                    <h1 class="trans_head_b">You still have any <br>Question?</h1>
                    <p class="brand_txt">If still can’t find your questions in our FAQ’s you can always contact us. We will answer to you shortly!</p>
                    
                </div>
                <div class="col-md-6 contact_s">
                    <div class="card_contct">
                        <p class="contct_hed"><i class="fa fa-phone call_btn"></i> +91 - 6209151515</p>
                        <p class="contct_txt">The best way to get answer faster</p>
                    </div>
                    <div class="faq_contct">
                        <p class="contct_hed"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/ques.png';  ?>" width="14" class="img_q"> info@15bells.com</p>
                        <p class="contct_txt">We are always happy to help.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>