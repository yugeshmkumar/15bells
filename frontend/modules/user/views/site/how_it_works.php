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
                <img src="<?= Url::to('@web/img') ?>/homebanner.jpg" class="img-responsive" style="visibility: hidden;">

                <!--<div class="carousel-caption">
                 <div class="container">
                     <div class="col-md-12" >              
                                   <p class="animated bounceInUp align-center">
                                             NEXT REVOLUTION IS HERE                              
                                   </p>         
                       
                                   
                     </div>
         
                     </div>
               </div>-->
            </div>


        </div>


    </div>

</section>
<section id="manycircle">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <img src="<?= Url::to('@web/img') ?>/aaa.jpg" class="img-responsive" style="visibility: hidden;">
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
