<?php

use yii\helpers\Url;
use yii\web\View;

$this->title = 'LAND LORD';
?>
<section id="slider5">
  <div id="carousel-example-generic" class="carousel fadeIn" data-ride="carousel" data-interval="4000">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
       <img src="<?= Url::to('@web/img')?>/search_propertybanner.jpg" class="img-responsive" style="visibility: hidden;">
 
      <div class="carousel-caption">
        <div class="container">
            <div class="col-md-12" >              
                          <p class="animated bounceInUp align-center">
                                    Let Us Know Your Location To Search Property                            
                          </p>         
            </div>
        </div >
      </div>
    </div>
  </div>
  </div>
</section>
<section id="search-pro">
<div class="container">
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="search-option">
      <ul class="nav nav-tabs">
    <li class="active"><button data-toggle="tab" href="#commercial" class="btn btn-default" type="submit">COMMERCIAL</button></li>
  </ul>

  <div class="tab-content">
    
    <div id="commercial" class="tab-pane fade in active">
      <div class="row">
      <div class="col-md-5 col-sm-5 animated bounce">
      <i class="fa fa-map-marker" aria-hidden="true"></i>
        <input type="text" class="form-control" placeholder="Enter Landmark, Location or Society">
      </div>
      <div class="col-md-2 col-sm-2">
        <select class="form-control">
               
                <option>Rent</option>
              </select>
      </div>
      <div class="col-md-2 col-sm-2">
        <select class="form-control">
                <option>Price</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - above</option>
              </select>
      </div>
      <div class="col-md-2 col-sm-2">
        <li class="dropdown">
          <a href="/register" class="dropdown-toggle" data-toggle="dropdown">REGISTER</a>
            <ul id="login-dp" class="dropdown-menu animated flipInX">
                <li>
                <div class="row">
              <div class="col-md-12" style="font-size: 17px; font-family: 'Roboto', sans-serif;">
                <label><input type="checkbox">flat me</label>
                <label><input type="checkbox"> Remember me</label>
                <label><input type="checkbox"> Remember me</label>
                <label><input type="checkbox"> Remember me</label>

                 
              </div>
           </div>
        </li>
        </ul>
        </li>
      
      </div>
        <button class="btn btn-primary animated bounce"><i class="fa fa-search search1" aria-hidden="true"></i></button>
    </div>
    </div>
   
  </div>
    </div>
  </div>
</div>
</div>
</section>
<section id="searchtab">
<div class="container">


<div class="row">

<div class="col-md-9">
<div class="sortby clearfix">

  <div class="col-md-2"> 
    <div class="selectall">
       <input type="checkbox" id="checkbox" class="checkbox" name="checkbox"/><span>ALL</span>
    </div>
  </div>
  <div class="col-md-2">
    <div class="bid">
      <i class="fa fa-gavel" aria-hidden="true"></i><span><a href="#">&nbsp; &nbsp;Bid Now</a></span>
    </div>
  </div>
  <div class="col-md-8">
    <div class="buyit">
      <i class="fa fa-shopping-cart" aria-hidden="true"></i><span><a href="#">Buy it Now</a></span>
    <select class="form-control pull-right">
      <option>Sort by</option>
      <option>Price: Low to High</option>
      <option>Price: High to Low</option>
      </select>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-12 borderproperty">
    
      <div class="col-md-3">
      <div class="proimage">
        <img src="<?= Url::to('@web/img')?>/property1.jpg" alt="..."  title="....">
      </div>
    </div>
    <div class="col-md-7">
    <div class="deatil">
    <h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> 15,000</span> 2BHK, Residential Apartment in Pitampura</h1>
    <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>
    <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>
    <p><b>Description:</b> Offering a fantastic view and surrounding, This flat is very spacious and gets ample light and cross ventilation.......</p>
    <p class="aminities">
    <ul>
      <li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>
      <li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>
      <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>
      <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>
    </ul>
    </p>
    </div>
    </div>
    <div class="col-md-2">
     <div class="secure">
        <img src="<?= Url::to('@web/img')?>/Sheild.jpg" alt="..." title=".....">
     </div>
    </div>
    <div class="col-md-9">
    <div class="btncart">
    <button class="btn pull-right btnfirst" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button> 
    <button class="btn btn-default pull-right btnsecond" type="submit">View Details</button>
    <button class="btn btn-default pull-right btnlast" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy it Now</button>
    </div>
    </div>
    </div>
    
   



    <div class="col-md-12 borderproperty">
      <div class="col-md-3">
      <div class="proimage">
        <img src="<?= Url::to('@web/img')?>/property2.jpg" alt="..."  title="....">
      </div>
    </div>
    <div class="col-md-7">
    <div class="deatil">
      <h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> 15,000</span> 2BHK, Residential Apartment in Pitampura</h1>
    <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>
    <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>
    <p><b>Description:</b> Offering a fantastic view and surrounding, This flat is very spacious and gets ample light and cross ventilation.......</p>
    <p class="aminities">
    <ul>
      <li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>
      <li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>
      <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>
      <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>
    </ul>
    </p>
    </div>
    </div>
    <div class="col-md-2">
     <div class="secure">
        <img src="<?= Url::to('@web/img')?>/Sheild.jpg" alt="..." title=".....">
     </div>
    </div>
    <div class="col-md-9">
    <div class="btncart">
    <button class="btn pull-right btnfirst" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button> 
    <button class="btn btn-default pull-right btnsecond" type="submit">View Details</button>
    <button class="btn btn-default pull-right btnlast" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy it Now</button>
    </div>
    </div>
    
    </div>



    <div class="col-md-12 borderproperty">
          <div class="col-md-3">
      <div class="proimage">
        <img src="<?= Url::to('@web/img')?>/property3.jpg" alt="..."  title="....">
      </div>
    </div>
    <div class="col-md-7">
    <div class="deatil">
      <h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> 15,000</span> 2BHK, Residential Apartment in Pitampura</h1>
    <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>
    <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>
    <p><b>Description:</b> Offering a fantastic view and surrounding, This flat is very spacious and gets ample light and cross ventilation.......</p>
    <p class="aminities">
    <ul>
      <li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>
      <li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>
      <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>
      <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>
    </ul>
    </p>
    </div>
    </div>
    <div class="col-md-2">
    <div class="secure">
        <img src="<?= Url::to('@web/img')?>/Sheild.jpg" alt="..." title=".....">
     </div>
    </div>
    <div class="col-md-9">
    <div class="btncart">
    <button class="btn pull-right btnfirst" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button> 
    <button class="btn btn-default pull-right btnsecond" type="submit">View Details</button>
    <button class="btn btn-default pull-right btnlast" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy it Now</button>
    </div>
    </div>
       
    </div>


   



     


</div>
</div>
<div class="col-md-3">
    <div class="col-md-12">
     <div class="filterhead"><p>FILTER</p></div>
    </div>
    <div class="col-md-12">
    <div class="filterbudget">
      <p class="fliterheading">Budget</p>
              <div class="col-md-6">

                <select class="form-control">
                            <option>Min</option>
                            <option>$150,000</option>
                            <option>$200,000</option>
                            <option>$250,000</option>
                            <option>$300,000</option>
                            <option>Above</option>
                          </select>
              </div>
              <div class="col-md-6">
                <select class="form-control">
                            <option>Max</option>
                            <option>$200,000</option>
                            <option>$250,000</option>
                            <option>$300,000</option>
                            <option>$300,000</option>
                            <option>Above</option>
                          </select>
              </div>
    </div>
    </div>
    <div class="col-md-12">
      <div class="filterbed">
        <p class="fliterheading">Bedroom</p>
      <div class="innerbed">
        <input type="checkbox"> <span>1 BHK</span>
      <input type="checkbox"> <span>2 BHK</span>
      <input type="checkbox"> <span>3 BHK</span><br>
      <input type="checkbox"> <span>4 BHK</span>
      <input type="checkbox"> <span>5 BHK</span>
      <input type="checkbox"> <span>6 BHK</span>
      </div>
      </div>

    </div>

    <div class="col-md-12">
    <div class="filterlocal">
      <p class="fliterheading">Locality</p>
      <input type="search" name="search" placeholder="Min"> <i class="fa fa-search" aria-hidden="true"></i>
      </div>
    </div>
     <div class="col-md-12">
      <div class="filteramen">
        <p class="fliterheading">Amenities</p>
        <div class="inneramen">
        <input type="checkbox"> <span>LIFT</span>
        <input type="checkbox"> <span>PARK</span>
        <input type="checkbox"> <span>3 BHK</span><br>
        <input type="checkbox"> <span>GYM</span>
        <input type="checkbox"> <span>5 BHK</span>
        <input type="checkbox"> <span>6 BHK</span>
        </div>
      </div>

    </div>
    <div class="col-md-12">
              <div class="filterarea">
                <div class="col-md-6">
                  <p>Min(Sq Ft.)</p>
                <select class="form-control">
                            <option>Min</option>
                            <option>$150,000</option>
                            <option>$200,000</option>
                            <option>$250,000</option>
                            <option>$300,000</option>
                            <option>Above</option>
                          </select>
              </div>
              <div class="col-md-6">
                <p>Max(Sq Ft.)</p>
                <select class="form-control">
                           <option>Max</option>
                            <option>$200,000</option>
                            <option>$250,000</option>
                            <option>$300,000</option>
                            <option>$300,000</option>
                            <option>Above</option>
                          </select>
              </div>
              </div>
    </div>

    <div class="col-md-12">
      <div class="filterfooter">
        <input class="btn btn-default" type="submit" value="SUBMIT">
      </div>
    </div>
  </div>



</div>

</div>
</div>
 
</section>
<section id="latestpro">
 
  <div class="container">
    <div class="row">
      <div class="col-md-12 post" style="margin: 40px 0px 40px 0px;">
       <div class="text-center">
              <h2>LAT<SPAN>EST PROPE</SPAN>RTY</h2>
      </div>
      </div>
            <div id="carousel-example" class="carousel slide middle hidden-xs" data-ride="carousel" style="margin: 0px 0px 40px 0px;">
            <!-- Wrapper for slides -->
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
<div class="col-lg-6 col-lg-offset-3 post">



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
<!--
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
</section>   -->
