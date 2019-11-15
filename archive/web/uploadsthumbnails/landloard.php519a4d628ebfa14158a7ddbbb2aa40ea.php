<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>15 BELLS | LANDLOARD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsiv.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400i" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>


<header>
<nav class="navbar navbar-inverse navbar-fixed-top opaque-navbar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"> 
            <img src="img/logo.png" class="img-responsive" alt="">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">HOME</a></li>
        <li><a href="#">LIST PROPERTY</a></li>
        <li class="dropdown">
          <a href="/register" class="dropdown-toggle" data-toggle="dropdown">REGISTER</a>
            <ul id="login-dp" class="dropdown-menu animated flipInX">
                <li>
                <div class="row">
              <div class="col-md-12" style="font-size: 17px; font-family: 'Roboto', sans-serif;">
                <span class="registerhead">!! WELCOME !!</span>
                 <form class="form" role="form" method="post" action="home.php" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                        <i class="fa fa-user-circle-o first" aria-hidden="true"></i>
                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-phone-square second" aria-hidden="true"></i>
                       <input type="number" class="form-control" id="exampleInputPassword2" placeholder="mobile number" required>
                                             
                    </div>
                    <div class="form-group">
                     <br>
                       <button type="submit" class="btn btn-primary btn-block">Register</button>
                       <br>
                    </div>
                 </form>
              </div>
           </div>
        </li>
        </ul>
        </li>
        <li class="dropdown">
          <a href="/login" class="dropdown-toggle" data-toggle="dropdown">LOGIN</a>
      <ul id="login-dp" class="dropdown-menu animated flipInX">
        <li>
           <div class="row">
              <div class="col-md-12" style="font-size: 17px; font-family: 'Roboto', sans-serif;">
                 <span class="registerhead1">Login via</span>
                <div class="social-buttons">
                  <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                 <a href="#" class="btn btn-gplus"><i class="fa fa-google"></i> Google +</a>
                </div>
                                 <span class="registerhead1">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;or</span>
                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                        <i class="fa fa-user-circle-o first" aria-hidden="true"></i>
                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-phone-square second" aria-hidden="true"></i>
                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href=""><h6>Forget the password ?</h6></a></div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                    </div>
                    <div class="checkbox">
                       <label>
                       <input type="checkbox"> keep me logged-in
                       </label>
                    </div>
                 </form>
              </div>
              
           </div>
        </li> 
        </ul>
        </li>
        <li class="last"><a href="#contact">CONTACT US</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      
</header>

<section id="slider3">
  <div id="carousel-example-generic" class="carousel fadeIn" data-ride="carousel" data-interval="4000">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
       <img src="img/landbanner.jpg" class="img-responsive" style="visibility: hidden;">
 
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
              <h2><span>Allow us to do</span>our best and get the right people for your property</h2> 
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
              <img src="img/steps.jpg" class="img-responsive">
            </div>
          </div>
          <div class="col-md-6">
            <div class="vedio">
                <a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="http://www.youtube.com/embed/sGbxmsDFVnE">
                
                <img src="img/vedio.jpg" class="img-responsive">
                  
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
          <h4><span>1</span><img src="img/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor </p>
          <h4><span>2</span><img src="img/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. </p>
          <h4><span>3</span><img src="img/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehend.</p>
          <h4><span>4</span><img src="img/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velum.</p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
        <div class="part">
          <h4><span>5</span><img src="img/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur.</p>
          <h4><span>6</span><img src="img/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
          <h4><span>7</span><img src="img/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <h4><span>8</span><img src="img/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
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
                                    <img src="img/property1.jpg" class="img-responsive" alt="..." />
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
                                    <img src="img/property2.jpg" class="img-responsive" alt="..." />
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
                                    <img src="img/property3.jpg" class="img-responsive" alt="..." />
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
                                    <img src="img/property4.jpg" class="img-responsive" alt="..." />
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
                                    <img src="img/property1.jpg" class="img-responsive" alt="..." />
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
                                    <img src="img/property2.jpg" class="img-responsive" alt="..." />
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
                                    <img src="img/property3.jpg" class="img-responsive" alt="..." />
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
                                    <img src="img/property4.jpg" class="img-responsive" alt="..." />
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
            <img src="img/xplore3.png" alt="...">
          </div>
          <p>Residential Property</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="start_img">
            <img src="img/xplore2.png" alt="...">
          </div>
          <p>Commercial Property</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="start_img">
            <img src="img/xplore1.png" alt="...">
          </div>
          <p>Other Property</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'footer.php';?>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/circle-progress.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
       $(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');
});




      autoPlayYouTubeModal();

  //FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
  function autoPlayYouTubeModal() {
      var trigger = $("body").find('[data-toggle="modal"]');
      trigger.click(function () {
          var theModal = $(this).data("target"),
              videoSRC = $(this).attr("data-theVideo"),
              videoSRCauto = videoSRC + "?autoplay=1";
          $(theModal + ' iframe').attr('src', videoSRCauto);
          $(theModal + ' button.close').click(function () {
              $(theModal + ' iframe').attr('src', videoSRC);
          });
          $('.modal').click(function () {
              $(theModal + ' iframe').attr('src', videoSRC);
          });
      });
  }
    </script>
    <script>
     
(function($) {
  var c4 = $('.innercircle');

  c4.circleProgress({
    startAngle: -Math.PI / 6 * 3,
    value: 0.5,
    lineCap: 'round',
    fill: {color: '#00c5d1'}

  });

  // Let's emulate dynamic value update
  setTimeout(function() { c4.circleProgress('value', 0.7); }, 1000);
  setTimeout(function() { c4.circleProgress('value', 1.0); }, 1100);
  setTimeout(function() { c4.circleProgress('value', 0.5); }, 2100);

  
})(jQuery);


</script>
  </body>
</html>