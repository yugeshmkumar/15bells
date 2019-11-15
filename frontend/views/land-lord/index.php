<?php

use yii\helpers\Url;
use yii\web\View;

$this->title = 'LAND LORD';
?>
<section id="slider3">
  <div id="carousel-example-generic" class="carousel fadeIn" data-ride="carousel" data-interval="4000">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
       <img src="<?= Url::to('@web/img')?>/landbanner.jpg" class="img-responsive" style="visibility: hidden;">
 
      <div class="carousel-caption">
        <div class="container">
            <div class="col-md-12 middle visible-md visible-sm visible-xs">
                <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location"><i class="fa fa-search animated rotateInDownRight"   role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"  aria-hidden="true"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <strong><button class="btn btn-default" type="submit">LIST PROPERTY</button></strong>
                        
            </div>
            <div class="col-md-12 middle hidden-md hidden-sm hidden-xs">
            <div class="col-md-6">
            <div class="searchback animated bounceInLeft">
              <h2>Search Requirement</h2><br>
            <input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location"><button class="btn btn-default animated rollIn"  role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" type="submit"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
           <p> <button class="btn btn-default" type="submit">LIST PROPERTY</button></p>
            </div>
            </div>
            <div class="col-md-6">
            <div class="sliderheading animated bounceInRight">
              <h2><span>numerous tenants </span>with a single click</h2>
            </div>
                         <div class="collapse" id="collapseExample">
                          <div class="well">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.9538023110617!2d77.0698003146755!3d28.450808982489907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d18ecedcb986d%3A0x9e817517fa433ab9!2sENCRISS.com!5e0!3m2!1sen!2sin!4v1490011480119" width="480" height="280" frameborder="0" style="border:0" allowfullscreen></iframe>
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
</section>



<section id="howit">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin: 40px 0px 40px 0px;">
        <div class="text-center">
          <h2>HO<span>W IT WO</span>RKS</h2>
        </div>
        </div>
        <div class="col-md-12" style="margin: 0px 0px 40px 0px;">
          <div class="col-md-6">
            <div class="steps">
              <img src="<?= Url::to('@web/img')?>/steps.jpg" class="img-responsive">
            </div>
          </div>
          <div class="col-md-6">
            <div class="vedio">
                <a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="http://www.youtube.com/embed/sGbxmsDFVnE">
                
                <img src="<?= Url::to('@web/img')?>/vedio.jpg" class="img-responsive">
                  
                </a>
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
            </div>
            </div>
          </div>              
        </div>
      
    </div>
  </div>
</section>

<section id="whyus">
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
</section>
<section id="faq">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin: 40px 0px 40px 0px;">
       <div class="text-center">
          <h2>FAQ'S</h2>
          <p>frequently asked questions</p>
        </div>
      </div>
      <div class="col-md-12" style="margin: 0px 0px 40px 0px;">
        <div class="col-md-6 col-sm-6">
        <div class="part">
          <h4><span>1</span><img src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor </p>
          <h4><span>2</span><img src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. </p>
          <h4><span>3</span><img src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehend.</p>
          <h4><span>4</span><img src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velum.</p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
        <div class="part">
          <h4><span>5</span><img src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur.</p>
          <h4><span>6</span><img src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
          <h4><span>7</span><img src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <h4><span>8</span><img src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p>
          </div>
          <a href="#"><button class="btn btn-default" type="submit">read more....</button></a>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="strip">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin: 0px 0px 10px 0px;">
        <div class="text-center">
          <h1>LET US KNOW YOUR LOCATION TO SEARCH PROPERTY.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><button class="btn" type="submit">CLICK HERE</button></span></h1>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="latestpro">
 
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin: 40px 0px 40px 0px;">
       <div class="text-center">
              <h2>LAT<SPAN>EST PROPE</SPAN>RTY</h2>
      </div>
      </div>
            <div id="carousel-example" class="carousel slide middle hidden-xs" data-ride="carousel" style="margin: 0px 0px 40px 0px;">
            <!-- Wrapper for slides -->
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
                                    <button class="btn" type="submit">READ MORE</button>
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
                                    <button class="btn" type="submit">READ MORE</button>
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
                                    <button class="btn" type="submit">READ MORE</button>
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
                                    <button class="btn" type="submit">READ MORE</button>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
<div class="row">
<div class="col-lg-6 col-lg-offset-3">



    <div id="myCarousel" class="carousel slide middle visible-xs" data-ride="carousel">
 
      <!-- Indicators -->
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
                                    <button class="btn" type="submit">READ MORE</button>
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
                                    <button class="btn" type="submit">READ MORE</button>
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
                                    <button class="btn" type="submit">READ MORE</button>
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
                                    <button class="btn" type="submit">READ MORE</button>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="margin-top: 219px;margin-bottom: 322px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next" style="margin-top: 219px;margin-bottom: 322px;"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div><!-- /.carousel -->
</div>
</div>
</div>
</section>
<section id="explore">
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
</section>
