<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::$app->name;
?>
<section id="slider">
    <div id="carousel-example-generic" class="carousel fadeIn" data-ride="carousel" data-interval="4000">


        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?= Url::to('@storageUrl/img/') . "homebanner.jpg" ?>" class="img-responsive" style="visibility: hidden;">

                <div class="carousel-caption" style="display:none;">
                    <div class="container">
                        <div class="col-md-12" >              
                            <p class="animated bounceInUp align-center" style="display:none;">
                                NEXT REVOLUTION IS HERE                              
                            </p>         


                        </div>

                    </div>
                </div>
            </div>


        </div>


    </div>

</section>


<section id="manycircle">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <img src="<?= Url::to('@storageUrl/img/') . "aaa.jpg" ?>" class="img-responsive">
            </div>

        </div>
    </div>

</section>

<section id="howitwork">
    <div class="container">
        <div class="row" style="margin:40px 0px 0px 0px">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>HOW IT WORKS</h2>
                </div>
            </div>
        </div>
        <div class="row" style="margin:40px 0px 40px 0px">


            <div class="col- lg-4 col-md-4 col-sm-12">
                <div class="inner1">
                    <div class="innercircle">
                        <i class="icon-featured fa fa-cog" id="icon"></i>
                        <h1>01 STEP</h1>
                        <P>Lorem ipsum dolor <br> sit amet,</P>
                    </div>

                    <div class="boxcontent">
                        <h3>Lorem ipsum dolor</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

            </div>
            <div class="col- lg-4 col-md-4 col-sm-12">
                <div class="inner2">
                    <div class="innercircle">
                        <i class="icon-featured fa fa-globe" id="icon"></i>
                        <h1>02 STEP</h1>
                        <P>Lorem ipsum dolor <br> sit amet,</P>
                    </div>
                    <div class="boxcontent">
                        <h3>Lorem ipsum dolor</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

            </div>

            <div class="col- lg-4 col-md-4 col-sm-12">
                <div class="inner3">
                    <div class="innercircle">
                        <i class="icon-featured fa fa-laptop" id="icon"></i>
                        <h1>03 STEP</h1>
                        <P>Lorem ipsum dolor <br> sit amet,</P>
                    </div>
                    <div class="boxcontent">
                        <h3>Lorem ipsum dolor</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin:40px 0px 0px 0px">
                <div class="text-center">
                    <h2>GET IN T<span>OUCH</span> WITH US</h2>
                    <p>Want to know more? Call us, mail us or drop by for a meeting.</p>
                    <p>We promise to provide detailed and quick responses to all your queries.</p>
                </div>
            </div>
            <div class="col-md-12" style="margin:0px 0px 40px 0px">
                <div class="col-md-4">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14031.815206920684!2d77.071989!3d28.450809!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e817517fa433ab9!2sENCRISS.com!5e0!3m2!1sen!2s!4v1488782967363" width="100%" height="400" frameborder="0" style="border:0; margin-top: 25px;" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="address">
                        <h3>OUR OFFICE</h3>
                        <p><span>Our team of consultants, to support clients facing firm business challenges.</span></p>
                        <p>We offer a seamless integration fo our global offices and personnel, and are committed to this worldwide network, as it forms the basis of our ability to identify, research, analyze, and present timely global growth opportunities in your market.</p>

                    </div>
                    <div class="address">
                        <h3>ADDRESS DETAILS</h3>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; &nbsp;15 Bells<br>&nbsp; &nbsp; &nbsp; f209, first floor, Lado Sarai,<br>
                            &nbsp; &nbsp; &nbsp; New Delhi - 110030.</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; &nbsp;Phone : +011 40536526</p>
                        <p><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; Email : info@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contactform">
                        <h3>SEND US A MESSAGE</h3>
        <?php $form = ActiveForm::begin(["class" => "form-horizontal", "method" => "post", "id" => "footer-form","action"=>Yii::$app->urlManager->createAbsoluteUrl("site/contact")]); ?>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="full_name" placeholder="First & Last Name" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="number" name="contact_number" min="10" max="12" placeholder="Number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="9" name="message" id="message" placeholder="Message" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <div class="g-recaptcha" data-sitekey="6Ld8VxQUAAAAAGrrJD7O7z1e5_MV6F783Z4Zop8j"></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-10">
                                <input id="submit" name="submit" type="submit"  value="SEND MESSAGE" class="btn btn-primary">
<!--onClick="get_value();"-->
                            </div>
                        </div>

<?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>