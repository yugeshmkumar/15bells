<?php

use yii\helpers\Url;
use yii\web\View;
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&libraries=places,geometry"></script>

<style>

    #map {
        height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        margin: 0;
        padding: 0;
    }
    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
        border-radius: 0px;
        height: 40px;
        border: 1px solid #2196F3;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }
    #target {
        width: 345px;
    }
    .short_list{font-size: 15px;
                position: relative;
                bottom: 3px;
                left: 5px;
    }
    .no_serch{
        margin:0px !important;
    }
    .commrcl_tb{

        padding:0 !important;
    }
    .no_pad{
        padding:0px !important;
    }
    #map-canvas {
        height: 400px;
        margin: 0px;
        padding: 0px;
    }

    #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
    }
    .pleasehide{
        display:none;
    }  

    .newr{
        width:30%;
        margin-bottom: 1px;
    }
	.slide{
		padding: 0;
		width: 100%;
		box-shadow:none !important;
	}
	#abcd{
		padding:0px !important;
	}
	#slider_lessor .searchback{
		padding:10px 50px 15px 50px!important;
	}
	#faq .part h4{
		padding-left:6px !important;
	}
</style>
	<!--==========First Section=========-->
	
	<!--======First Section Ends========-->
	
	<!--======Second Section Starts========-->
	
			<div class="container-fluid" id="lessor_sec">
				
				<div class="row" style="height:250px;"></div>
					<video class="video_p" poster="" id="bgvid" playsinline autoplay muted loop>
					<source src="<?= Yii::$app->request->baseUrl . '/frontvideo/CASE3D-WEBSITE.mp4' ?>" type="video/mp4">
					</video>
				<!--<div class="row explor_d text-center" id="leermat2">
					<p><a class="sliding-middle-out skip_v">Skip Video</a></p>
				</div>-->
				<div class="row vol_control">
					<p style="padding-left:25px;"><span><i class="fa fa-volume-off vol_up"></i></span><span style="padding-left:20px;"><a class="sliding-middle-out skip_v menu_clr">Skip Video</a></span></p>
				</div>
			</div>
			
	<!--===========Second section Ends--------->
	
	<!--===========Third Section Starts--------->
			<div class="container-fluid" id="abcd">
				
					<section id="slider_lessor">
  <div class="container" style="margin-top:180px;">
    <div class="row">
				<div class="col-md-12">
					<p class="section_p text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
               <div class="col-md-12">
                    <div class="col-md-6" style="padding-top:33px;">
                    <div class="searchback animated bounceInLeft">
                      <h2>Add Property</h2><br>
                    <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location (City)">
                    <input type="text" name="search" class="search animated rotateInDownLeft" id="search1" placeholder="Enter Area (locality)">
                   <p> <a class="btn btn-default" href="#" id="saveproperty" role="button">ADD PROPERTY</a></p>
                    </div>
                    </div>
                    <div class="col-md-6">

                      <div class="row">
                          <div class="col-md-12">
                                    
                            <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="4000">
                              
                            
                              <div class="carousel-inner">
                                
                                <div class="active item">
                                            <div class="sliderheading animated bounceInRight">
                                                <p><span class="heading1"> Numerous tenants</span> <br>with a single <br>click</p> 
                                              </div>
                                </div>
                                        <div class="item">
                                            <div class="sliderheading animated bounceInRight">
                      
                                                <p><span class="heading2">Get the best brands</span> signed up for your <span class="heading2">hard earned investment</span></p> 
                                              </div>
                                </div>
                                        
                                        <div class="item">
                                            <div class="sliderheading animated bounceInRight">
                      
                                            <p><span class="heading3">Real-time transaction with the end user, no</span> more wasting of time</p> 
                                          </div>
                                </div>
                              </div>
                            </div>
                          </div>              
                        </div> 
						<div class="row text-right link_sec">
							<ul class="slider_sec">
								<li><a href="javascript:void(0)" onclick="openNav1()">How It Works</a></li>
								<li><a href="javascript:void(0)" onclick="openNav2()">FAQ'S</a></li>
							</ul>
						</div>	

<!---- HOW IT WORKS------>
						<div id="myNav" class="overlay_how">

							  <!-- Button to close the overlay navigation -->
							  <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>

							  <!-- Overlay content -->
							  <div class="overlay-content-how">
								<div class="row">
									<div class="col-md-offset-2 col-md-8">
										<div class="col-md-4 text-center">
											<div class="how_work">
											 <p><div class="icon_count">
													1
												</div></p>
											  <p>Locate Property</p>
											  <p class="">As a buyer, your first step will be to search and locate property on Google maps, which suit your needs.</p>
											</div>
										</div> 
										<div class="col-md-4 text-center">
											<div class="how_work">
											  <p><div class="icon_count">
													2
												</div></p>
											  <p>Locate Property</p>
											  <p class="">As a buyer, your first step will be to search and locate property on Google maps, which suit your needs.</p>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="how_work">
											  <p><div class="icon_count">
													3
												</div></p>
											  <p>Locate Property</p>
											  <p class="">As a buyer, your first step will be to search and locate property on Google maps, which suit your needs.</p>
											</div>
										</div>
									</div>
								</div>
							  </div>

						</div>
		<!--HOW IT WORKS ENDS----->
		

		<!----- FAQ'S SECTION STARTS---------->
				<div id="myNav1" class="overlay1">

							  <!-- Button to close the overlay navigation -->
							  <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>

							  <!-- Overlay content -->
							  <div class="overlay-content1">
								
<section id="faq">
  <div class="container">
    <div class="row">
      <div class="col-md-12 post">
       <div class="text-center">
          
		   <?php
	  $arrgetfaqs = common\models\activemode::getpublishedfaqs("landlord");
	  ?>
          
        </div>
      </div>
      <div class="col-md-12 post" style="margin: 0px 0px 40px 0px;">
        <div class="col-md-12 col-sm-12">
        <div class="part">
		 <?php 
	  $temp = 0;
	  foreach($arrgetfaqs as $getfaqs){ $temp++; ?>
          <div class="col-md-6">
            <h4><span><?php echo $temp ?></span><img 
src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;<?php echo $getfaqs->subject ?></h4>
          <p class="more"><?php echo $getfaqs->content ?></p>
          </div>
	  <?php } ?>
          

          </div>
          </div>
          <a href="<?php echo Yii::$app->urlManager->createUrl(['common\faqs']) ?>" target="_blank"><button class="btn btn-default" 
type="submit">read more....</button></a>
        </div>
      </div>
    </div>
  </div>
</section>
							  </div>

						</div>
		<!------FAQ'S section ends----->
						
						
                    </div>
                    </div>    
    </div>
  </div>
  
   <!----- FOOTER SECTION STARTS------>
  
   <div class="row footer_link abcd" id="footr_nav" style="background:#000;">		
								<div class="col-md-4" style="padding-top:5px;">
								<i class="fa fa-close close_btn" ></i>
									<p class="rights_resrv">© 2017 ALL RIGHTS RESERVED. POWERED BY <a href="https://encriss.com/">encriss.com</a></p>
								</div>	
								<div class="col-md-5">
									<ul class="footer_mnu" style="padding-top:5px;">
												<li><a class="sliding-middle-out" href="<?= Yii::$app->homeUrl ?>">Home</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">Buyer</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("blogs") ?>">Blog</a></li>
												<li style="border-right:none !important;"><a class="sliding-middle-out" onclick="opencon()" style="cursor:pointer;" >Contact Us</a></li>
									</ul>
								</div>	
								<div class="col-md-3">
									<ul class="social_ic">
												<li><i class="fa fa-facebook sc_icn"></i></li>
												<li><i class="fa fa-twitter sc_icn"></i></li>
												<li><i class="fa fa-google-plus sc_icn"></i></li>
												<li><i class="fa fa-linkedin sc_icn"></i></li>
									</ul>
								</div>
								
							</div>
							<div class="social_btn text-center">
									<i class="fa fa-angle-left"></i>
							</div>
  
  
</section>

 <!-- <section id="slider3">

  <div id="carousel-example-generic" class="carousel fadeIn" data-ride="carousel">
   <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <img src="<?= Url::to('@web/img')?>/slider/land_lord/img-01.jpg" class="img-responsive" alt="..." title="...">
 
      <div class="carousel-caption">
        <div class="container">
            <div class="col-md-12 middle visible-md visible-sm visible-xs">
                <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location"><i class="fa fa-search animated rotateInDownRight"   role="button" aria-hidden="true" type="button" data-toggle="modal" data-target="#myModal"></i>
                         <strong><a class="btn btn-default" href="#" role="button">ADD PROPERTY</a></strong>
            </div>
            <div class="col-md-12 middle hidden-md hidden-sm hidden-xs">
            <div class="col-md-6">
            <div class="searchback animated bounceInLeft">
              <h2>Add Property</h2><br>
            <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location">
            <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Area">
           <p> <a class="btn btn-default" href="#" role="button">ADD PROPERTY</a></p>
            </div>
            </div>
            <div class="col-md-6">

              <div class="row">
                  <div class="col-md-12">
                            
                    <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
                      
                    
                      <div class="carousel-inner">
                        
                        <div class="active item">
                                    <div class="sliderheading animated bounceInRight">
                                        <p><span class="heading1"> Numerous tenants</span> <br>with a single <br>click.</p> 
                                      </div>
                        </div>
                                <div class="item">
                                    <div class="sliderheading animated bounceInRight">
              
                                        <p><span class="heading2">Get the best brands</span> signed up for your <span class="heading2">hard earned investment</span></p> 
                                      </div>
                        </div>
                                
                                <div class="item">
                                    <div class="sliderheading animated bounceInRight">
              
                                    <p><span class="heading3">Real time transaction with the end user, no</span> more wasting of time</p> 
                                  </div>
                        </div>
                      </div>
                    </div>
                  </div>              
                </div>          
            </div>
            </div>        
            </div>

             </div>
      </div>
     <div class="item">
        <img src="<?= Url::to('@web/img')?>/slider/land_lord/img-02.jpg" class="img-responsive" alt="..." title="...">
 
      <div class="carousel-caption">
        <div class="container">
            <div class="col-md-12 middle visible-md visible-sm visible-xs">
                <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location"><i class="fa fa-search animated rotateInDownRight" type="button" data-toggle="modal" data-target="#myModal"  role="button" aria-hidden="true"></i>
                         <strong><a class="btn btn-default" href="#" role="button">ADD PROPERTY</a></strong>
                        
            </div>
            <div class="col-md-12 middle hidden-md hidden-sm hidden-xs">
            <div class="col-md-6">
            <div class="searchback animated bounceInLeft">
              <h2>Add Property</h2><br>
            <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location">
            <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Area">
           <p><a class="btn btn-default" href="#" role="button">ADD PROPERTY</a></p>
            </div>
            </div>
            <div class="col-md-6">
            <div class="sliderheading animated bounceInRight">
              
              <p><span class="heading2">Get the best brands</span> signed up for your <span class="heading2">hard earned investment</span></p> 
            </div>
                        
            </div>
            </div>        
            </div>

             </div>
      </div>
      <div class="item">
        <img src="<?= Url::to('@web/img')?>/slider/land_lord/img-03.jpg" class="img-responsive" alt="..." title="...">
 
      <div class="carousel-caption">
        <div class="container">
            <div class="col-md-12 middle visible-md visible-sm visible-xs">
                <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location"><i class="fa fa-search animated rotateInDownRight"   role="button" aria-hidden="true" type="button" data-toggle="modal" data-target="#myModal"></i>
                       <strong><a class="btn btn-default" href="#" role="button">ADD PROPERTY</a></strong>
                        
            </div>
            <div class="col-md-12 middle hidden-md hidden-sm hidden-xs">
            <div class="col-md-6">
            <div class="searchback animated bounceInLeft">
              <h2>Add Property</h2><br>
            <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location">
            <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Area">
           <p><a class="btn btn-default" href="#" role="button">ADD PROPERTY</a></p>
            </div>
            </div>
            <div class="col-md-6">
            <div class="sliderheading animated bounceInRight">
              
              <p><span class="heading3">Real time transaction with the end user, no</span> more wasting of time</p> 
            </div>
                        
            </div>
            </div>        
            </div>
             </div>
      </div>  
    </div>
  </div>
</section>  -->
<!--
<section id="howit">
  <div class="container">
    <div class="row">
      <div class="col-md-12 post" style="margin: 40px 0px 40px 0px;">
        <div class="text-center">
          <h2>HO<span>W IT WO</span>RKS</h2>
        </div>
        </div>
        <div class="col-md-12 post" style="margin: 0px 0px 40px 0px;">
          <div class="col-md-6">
                    <div class="lessee_steps">
                      <img src="<?= Url::to('@web/img') ?>/steps.jpg" class="img-responsive"> 
                        <div class="col-md-4 col-sm-4 text-center lessor_main_div">
                            <div class="lessor_step1">
                                <img src="<?= Url::to('@web/img') ?>/step1.png" alt="..." title="..." class="lessor_step_img1">
                                <div class="overlay_img">
                                <p><img src="<?= Url::to('@web/img') ?>/step1_in.png"></p>
                                <b style="text-align: center; font-size: 11px;"><span style="color: #45aeae; border-bottom: 0px;">Tag your</span> Property</b><br>
                               <span style="text-align: center; padding-left: 50px;">STEP 2</span><br>
                                   <p class="overley_text">As a lessor, the first step which you will be required to do is to tag your property on Google Map. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center lessor_main_div">
                            <div class="lessor_step2">
                                <img src="<?= Url::to('@web/img') ?>/step2.png" alt="..." title="..." class="lessor_step_img2">
                                <div class="overlay_img">
                                <span style="text-align: center; padding-left: 50px;">STEP 2</span><br>-
                                <p><img src="<?= Url::to('@web/img') ?>/step2_in.png"></p>
                                <b style="text-align: center; font-size: 11px;"><span style="color: #fcc82b; border-bottom: 0px;">Discover/ </span>Be Discovered</b><br>
                                   <p class="overley_text">Once you have tagged the property, you will then search for brands/lessee or vice-versa. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center lessor_main_div">
                            <div class="lessor_step3">
                                <img src="<?= Url::to('@web/img') ?>/step3.png" alt="..." title="..." class="lessor_step_img3">
                                <div class="overlay_img">
                                -<span style="text-align: center; padding-left: 50px;">STEP 2</span><br>
                                <p><img src="<?= Url::to('@web/img') ?>/step3_in.png"></p>
                                <b style="text-align: center; font-size: 11px;"><span style="color: #e23a59; border-bottom: 0px;">Close the deal in</span> the Virtual Room</b><br>
                                   <p class="overley_text">Once the lessee has finalized the property, you will be taken to a virtual room where the deal will be finalized between the two parties. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          <br>
          <div class="col-md-6 col-md-6">
            <div class="vedio">
                <a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="https://www.youtube.com/embed/NhkffW9x140">
                
                <img src="<?= Url::to('@web/img')?>/vedio_lessor.jpg" class="img-responsive">
                  
                </a>
            
            </div>
          </div>              
        </div>
      
    </div>
  </div>
</section>
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div>
                                <iframe width="100%" height="350" src="" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
<!-- <section id="latestpro">
  <div class="container">
    <div class="row">
      <div class="col-md-12 post" style="margin: 40px 0px 40px 0px;">
       <div class="text-center">
              <h2>LAT<SPAN>EST PROPE</SPAN>RTY</h2>
      </div>
      </div>
            <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel" style="margin: 0px 0px 40px 0px;">
            
            <div class="carousel-inner post">
                <div class="item active">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="inneritem">
                            <h1>Residential Apartment</h1>
                                <div class="photo">
                                    <img src="<?= Url::to('@web/img')?>/property1.jpg" class="img-responsive" alt="..." />
                                </div>
                                <div class="info">
                                    <h2>Lorem Ipsum is simply dummy text.</h2>
                                    <p><span>Jan 18, 2017 at 12.55pm </span> &nbsp;&nbsp;&nbsp;&nbsp;by admin/0</p>
                                    <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.Lorem Ipsum is simply dummy text.</p>
                                    <button class="btn" type="submit">read more....</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="inneritem">
                            <h1>Studio Apartment</h1>
                                <div class="photo">
                                    <img src="<?= Url::to('@web/img')?>/property2.jpg" class="img-responsive" alt="..." />
                                </div>
                                <div class="info">
                                    <h2>Lorem Ipsum is simply dummy text.</h2>
                                    <p><span>Jan 18, 2017 at 12.55pm </span> &nbsp;&nbsp;&nbsp;&nbsp;by admin/0</p>
                                    <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.Lorem Ipsum is simply dummy text.</p>
                                    <button class="btn" type="submit">read more....</button>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="inneritem">
                            <h1>Residential Apartment</h1>
                                <div class="photo">
                                    <img src="<?= Url::to('@web/img')?>/property3.jpg" class="img-responsive" alt="..." />
                                </div>
                                <div class="info">
                                    <h2>Lorem Ipsum is simply dummy text.</h2>
                                    <p><span>Jan 18, 2017 at 12.55pm </span> &nbsp;&nbsp;&nbsp;&nbsp;by admin/0</p>
                                    <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.Lorem Ipsum is simply dummy text.</p>
                                    <button class="btn" type="submit">read more....</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="inneritem">
                            <h1>Studio Apartment</h1>
                                <div class="photo">
                                    <img src="<?= Url::to('@web/img')?>/property4.jpg" class="img-responsive" alt="..." />
                                </div>
                                <div class="info">
                                    <h2>Lorem Ipsum is simply dummy text.</h2>
                                    <p><span>Jan 18, 2017 at 12.55pm </span> &nbsp;&nbsp;&nbsp;&nbsp;by admin/0</p>
                                    <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.Lorem Ipsum is simply dummy text.</p>
                                    <button class="btn" type="submit">read more....</button>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
<div class="row">
<div class="col-lg-6 col-lg-offset-3 post">



    <div id="myCarousel" class="carousel slide visible-xs" data-ride="carousel">
 
      
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="inneritem">
                            <h1>Residential Apartment</h1>
                                <div class="photo">
                                    <img src="<?= Url::to('@web/img')?>/property1.jpg" class="img-responsive" alt="..." />
                                </div>
                                <div class="info">
                                    <h2>Lorem Ipsum is simply dummy text.</h2>
                                    <p><span>Jan 18, 2017 at 12.55pm </span> &nbsp;&nbsp;&nbsp;&nbsp;by admin/0</p>
                                    <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.Lorem Ipsum is simply dummy text.</p>
                                    <button class="btn" type="submit">read more....</button>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="item">
                    <div class="row">                        
                        <div class="col-md-6 col-sm-6">
                            <div class="inneritem">
                            <h1>Studio Apartment</h1>
                                <div class="photo">
                                    <img src="<?= Url::to('@web/img')?>/property2.jpg" class="img-responsive" alt="..." />
                                </div>
                                <div class="info">
                                    <h2>Lorem Ipsum is simply dummy text.</h2>
                                    <p><span>Jan 18, 2017 at 12.55pm </span> &nbsp;&nbsp;&nbsp;&nbsp;by admin/0</p>
                                    <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.Lorem Ipsum is simply dummy text.</p>
                                    <button class="btn" type="submit">read more....</button>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
         <div class="item">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="inneritem">
                            <h1>Residential Apartment</h1>
                                <div class="photo">
                                    <img src="<?= Url::to('@web/img')?>/property3.jpg" class="img-responsive" alt="..." />
                                </div>
                                <div class="info">
                                    <h2>Lorem Ipsum is simply dummy text.</h2>
                                    <p><span>Jan 18, 2017 at 12.55pm </span> &nbsp;&nbsp;&nbsp;&nbsp;by admin/0</p>
                                    <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.Lorem Ipsum is simply dummy text.</p>
                                    <button class="btn" type="submit">read more....</button>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                 <div class="item">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="inneritem">
                            <h1>Studio Apartment</h1>
                                <div class="photo">
                                    <img src="<?= Url::to('@web/img')?>/property4.jpg" class="img-responsive" alt="..." />
                                </div>
                                <div class="info">
                                    <h2>Lorem Ipsum is simply dummy text.</h2>
                                    <p><span>Jan 18, 2017 at 12.55pm </span> &nbsp;&nbsp;&nbsp;&nbsp;by admin/0</p>
                                    <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.Lorem Ipsum is simply dummy text.</p>
                                    <button class="btn" type="submit">read more....</button>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="margin-top: 219px;margin-bottom: 322px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next" style="margin-top: 219px;margin-bottom: 322px;"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div>
</div>
</div>
</div>
</section>-->
<!-- <section id="whyus">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin: 40px 0px 40px 0px;">
       <div class="text-center">
          <h2><span>WHY US</span></h2>
        </div>
      </div>
      <div class="col-md-12" style="margin: 0px 0px 40px 0px;">
        <div class="col-md-3 col-sm-6">
            <h1>
            <div class="innercircle">
                <strong>80%</strong>
            </div>
            </h1>
        </div>
        <div class="col-md-3 col-sm-6">
            <h1>
            <div class="innercircle">
                <strong>60%</strong>
            </div>
            </h1>
        </div>
        <div class="col-md-3 col-sm-6">
            <h1>
            <div class="innercircle">
                <strong>90%</strong>
            </div>
            </h1>
        </div>
        <div class="col-md-3 col-sm-6">
           <h1>
            <div class="innercircle">
                <strong>40%</strong>
            </div>
            </h1>
        </div>
        
      </div>
    </div>
  </div>
</section> -->
<style>
.morecontent span {
    display: none;
}
.morelink {
    display: block;
}


</style>
 <!--
<section id="faq">
  <div class="container">
    <div class="row">
      <div class="col-md-12 post" style="margin: 40px 0px 40px 0px;">
       <div class="text-center">
          <h2>FAQ'S</h2>
		   <?php
	  $arrgetfaqs = common\models\activemode::getpublishedfaqs("landlord");
	  ?>
          <p>Frequently Asked Questions</p>
        </div>
      </div>
      <div class="col-md-12 post" style="margin: 0px 0px 40px 0px;">
        <div class="col-md-12 col-sm-12">
        <div class="part">
		 <?php 
	  $temp = 0;
	  foreach($arrgetfaqs as $getfaqs){ $temp++; ?>
          <div class="col-md-6">
            <h4><span><?php echo $temp ?></span><img 
src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;<?php echo $getfaqs->subject ?></h4>
          <p class="more"><?php echo $getfaqs->content ?></p>
          </div>
	  <?php } ?>
          

          </div>
          </div>
          <a href="<?php echo Yii::$app->urlManager->createUrl(['common\faqs']) ?>" target="_blank"><button class="btn btn-default" 
type="submit">read more....</button></a>
        </div>
      </div>
    </div>
  </div>
</section>

-->




<!-- <section id="explore">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin: 40px 0px 40px 0px;">
       <div class="text-center">
              <h2>E<SPAN>XPLOR</SPAN>E</h2>
      </div>
      </div>
      <div class="col-md-12" style="margin: 0px 0px 40px 0px;">
        <div class="col-md-4 col-sm-4">
          <div class="start_img">
            <img src="<?= Url::to('@web/img')?>/xplore3.png" alt="...">
          </div>
          <p>Residential Property</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="start_img">
            <img src="<?= Url::to('@web/img')?>/xplore2.png" alt="...">
          </div>
          <p>Commercial Property</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="start_img">
            <img src="<?= Url::to('@web/img')?>/xplore1.png" alt="...">
          </div>
          <p>Other Property</p>
        </div>
      </div>
    </div>
  </div>
</section> -->

				
			</div>
	<!---==== Section three ends========-->
	
</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
 $(".close_btn").click(function(){
            $(".footer_link").animate({
                width: "0%"
            });
			$(".social_btn").show(1000);
 });
 $(".social_btn").click(function(){
            $(".footer_link").animate({
                width: "100%"
            });
		$(".social_btn").hide();
        });
function openNav1() {
    document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav1() {
    document.getElementById("myNav").style.width = "0%";
}

function openNav2() {
    document.getElementById("myNav1").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav2() {
    document.getElementById("myNav1").style.width = "0%";
}
</script>
  <script>
var video = document.getElementById('bgvid');
video.addEventListener('ended', function() {
	$("#abcd").show(1000);
	$("#secnd_sec").hide(1000);
		
 
}, false);
</script> 
<script>
  $(document).ready(function() {
	  ///Video Mute and Unmute Button////
	  
	$(".vol_up").click( function (){

    $("#bgvid").prop('muted', !$("#bgvid").prop('muted'));
	 $(".vol_control").find('i').toggleClass('fa-volume-off fa-volume-up')
});  
$(".skip_v").click( function (){
    //$("#bgvid").prop('muted', !$("#bgvid").prop('muted'));
	$("video").prop('muted', true);
}); 
   
});

</script>  


<script>
$(document).ready(function(){  
    $('.menu_drop').addClass('fnt_wht');
    $('.link_clr').addClass('white_clr');
});
</script> 
<script>
$(document).ready(function(){    
$(".img_icon").hover(function(){
    $(this).addClass('animated zoomIn' + $(this).data('action'));
});
$(".img_icon").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd",function(){
    $(this).removeClass('animated zoomIn' + $(this).data('action'));
});
});
</script>

<script>

	$(document).ready(function () {
    var menu = $('.menu')
    var timeout = 0;
    var hovering = false;
    menu.hide();

    $('.mainbutton')
        .on("mouseenter", function () {
        hovering = true;
        // Open the menu
        $('.menu')
            .stop(true, true)
            .slideDown(400);

        if (timeout > 0) {
            clearTimeout(timeout);
        }
    })
        .on("mouseleave", function () {
        resetHover();
    });

    $(".menu")
        .on("mouseenter", function () {
        // reset flag
        hovering = true;
        // reset timeout
        startTimeout();
    })
        .on("mouseleave", function () {
        // The timeout is needed incase you go back to the main menu
        resetHover();
    });

    function startTimeout() {
        // This method gives you 1 second to get your mouse to the sub-menu
        timeout = setTimeout(function () {
            closeMenu();
        }, 1000);
    };

    function closeMenu() {
        // Only close if not hovering
        if (!hovering) {
            $('.menu').stop(true, true).slideUp(400);
        }
    };

    function resetHover() {
        // Allow the menu to close if the flag isn't set by another event
        hovering = false;
        // Set the timeout
        startTimeout();
    };
});
	
</script>

<script type="text/javascript">



     $(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 100;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >>";
    var lesstext = "Show less <<";


    $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + 
ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + 
'</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + 
'</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
             $("#saveproperty").click(doSomething);
             function doSomething() {


                              var searchval = $('#search').val();
                              var searchval1 = $('#search1').val();
                               
                                 if (searchval != '' && searchval != '') {
                                        
                                         $.ajax({
                                             url: 'lessee/saveproperty',
                                             data: {searchval: searchval,searchval1:searchval1},
                                             success: function (data) {
                                                 //alert(data);   
                                                 if (data != 0) {

                                                     $('#search').val('');
                                                     $('#search1').val('');
                                                     toastr.success('Your Property has been Successfully Saved', 'success');
                                                     window.location.replace("http://dev.15bells.com/frontend/web/index.php/user/sign-in/signup");
                                                 } else {
                                                     $('#' + searchinput).val('');
                                                     toastr.error('Not found any property in this location', 'error');
                                                 }


                                             },
                                         });
                                         $("#numbersearch").show();


                                 } else {

                                     toastr.error('Something is Missing', 'error');
                                 }

                             }

             var searchBox1 = new google.maps.places.SearchBox(document.getElementById('search1'));
                                // map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
                                 google.maps.event.addListener(searchBox, 'places_changed', function () {
                                     searchBox.set('map', null);


                                     var places = searchBox.getPlaces();

                                     var bounds = new google.maps.LatLngBounds();
                                     var i, place;
                                     for (i = 0; place = places[i]; i++) {
                                         (function (place) {
                                             var marker = new google.maps.Marker({
                                                 position: place.geometry.location
                                             });
                                             marker.bindTo('map', searchBox, 'map');
                                             google.maps.event.addListener(marker, 'map_changed', function () {
                                                 if (!this.getMap()) {
                                                     this.unbindAll();
                                                 }
                                             });
                                             bounds.extend(place.geometry.location);


                                         }(place));

                                     }
                                     map.fitBounds(bounds);
                                     searchBox.set('map', map);
                                     map.setZoom(Math.min(map.getZoom(), 12));

                                 });


   </script>

<script>
$(document).ready(function(){
	
	$(".skip_v").click(function(){
		$("#lessor_sec").hide(2000);
		$("#abcd").show(2000);
	});
	
});

</script>
</body>

</html>