<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\modules\user\models\SignupForm;
$this->title = Yii::$app->name;
$model = new SignupForm();
?>

<section id="slider">
  <div id="carousel-example-generic" class="carousel fadeIn" data-ride="carousel" data-interval="4000">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
       <img src="<?= Url::to('@web/img') ?>/homebanner.jpg" class="img-responsive" style="visibility: hidden;">
 
       <div class="carousel-caption">
        <div class="container">
            <div class="col-md-12 middle visible-md visible-sm visible-xs">
                          <p class="animated bounceInUp align-center">
                                    <span>BUYERS : </span>Quality listings, transparent and swift process to buy the property you need <button class="btn btn-default" type="submit">Get Started</button>                             
                          </p> 
            </div>
            <div class="col-md-12 middle hidden-md hidden-sm hidden-xs">
            <div class="col-md-4">
            <h2 class="animated bounceInUp">Initate Your Transaction</h2>
              <img src="<?= Url::to('@web/img') ?>/slider/timerbox.png" class="animated bounceInLeft" alt="..." title="..">
              <div class="clock"></div>
              <div class="clock1"></div>
              <div class="clock2"></div>
            </div>
            <div class="col-md-8">
            <div class="col-md-6">
             <div class="animated fadeInRight centertext"> <h2>Transaction Completed</h2></div>
            </div>
            
            <div class="col-md-6">
              <div class="animated bounceInRight lasttext">
              <h2>BUYERS</h2><br>
            <p>Quality listings, transparent and swift process to buy the property you need</p><br>
            <a href="<?= Yii::$app->urlManager->createUrl("buyer") ?>"><button class="btn btn-default" type="submit">Get Started</button></a>
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

<section id="manycircle">
  <div class="container">
    <div class="row">
      
       <div class="col-md-12 text-center maincir middle hidden-xs" >
        <div class="col-md-3 col-sm-3">
          <h2 class="outerheading1 post3">One to one transaction with property owner</h2>
          <a href="buyers.php">
          <div class="circle1 post">
          <p>BUYER</p>
          </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-3">
          <h2 class="outerheading2 post1">Real time engine to accelerate your selling process</h2>
          <a href="seller.php">
            <div class="circle2 post1">
            <p>SELLER</p>
          </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-3">
        <h2 class="outerheading3 post">Single umbrella for all your expansion requirements pan India</h2>
          <a href="tenant.php">
            <div class="circle3 post">
            <p>TENANT</p>
          </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-3">
          <h2 class="outerheading4 post4">Numerous tenants with a single click</h2>
          <a href="landloard.php">
            <div class="circle4 post1">
            <p>LANDLORD</p>
          </div>
          </a>
        </div>
        
       </div>


       <div class="col-md-12 text-center maincir1 middle visible-xs" >
       <div class="col-md-3 col-sm-3">
          <h2 class="outerheading11">Right Property at right Price</h2>
          <a href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">
          <div class="circle11 post">
          <p>BUYER</p>
          </div>
          </a>
        </div><br>
        <div class="col-md-3 col-sm-3">
          <h2 class="outerheading22">Right Property at right Price</h2>
          <a href="<?= Yii::$app->urlManager->createUrl("seller") ?>">
            <div class="circle22 post1">
            <p>SELLER</p>
          </div>
          </a>
        </div><br>
        <div class="col-md-3 col-sm-3">
        <h2 class="outerheading33">Right Property at right Price</h2>
          <a href="<?= Yii::$app->urlManager->createUrl("tenant") ?>">
            <div class="circle33 post">
            <p>TANANT</p>
          </div>
          </a>
        </div><br>
        <div class="col-md-3 col-sm-3">
          <h2 class="outerheading44">Right Property at right Price</h2>
          <a href="<?= Yii::$app->urlManager->createUrl("land-lord") ?>">
            <div class="circle44 post1">
            <p>LANDLORD</p>
          </div>
          </a>
        </div>
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
                
                
                                <div class="col- lg-4 col-md-4 col-sm-12 post">
                                  <div class="hovercircle1">
                                    <p class="animate bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</p>
                                  </div>
                                  <div class="inner1">
                                      <div class="incircle">
                                      <i class="icon-featured fa fa-cog" id="icon"></i>
                                      <h1>01 STEP</h1>
                                      <P>Open an account</P>
                                    </div>
                                    
                                    <div class="boxcontent">
                                      <h3>Open an account</h3><br>
                                      <p>Open an account with 15 Bells and register yourself, along with your requirement. List or select the property and get your documentation done.</p>
                                    </div>
                                  </div>

                                  </div>
                                  <div class="col- lg-4 col-md-4 col-sm-12 post">
                                    <div class="hovercircle2">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</p>
                                  </div>
                                    <div class="inner2">
                                      <div class="incircle">
                                        <i class="icon-featured fa fa-globe" id="icon"></i>
                                        <h1>02 STEP</h1>
                                        <P>Strike a deal</P>
                                      </div>
                                      <div class="boxcontent">
                                        <h3>Strike a deal</h3><br>
                                        <p>Once you have selected/listed the property you will be in directly in contact with the end user. There is no massive time delay in the process.</p>
                                      </div>
                                    </div>

                                    </div>

                                    <div class="col- lg-4 col-md-4 col-sm-12 post">
                                    <div class="hovercircle3">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</p>
                                  </div>
                                    <div class="inner3">
                                      <div class="incircle">
                                        <i class="icon-featured fa fa-laptop" id="icon"></i>
                                        <h1>03 STEP</h1>
                                        <P>Escrow amount <br>released</P>
                                      </div>
                                      <div class="boxcontent">
                                        <h3>Escrow amount released</h3><br>
                                        <p>Since there is real time transaction, real time money exchange takes place. The escrow amount is released as soon as the deal is done. The entire process takes 15 minutes from end to end.</p>
                                      </div>
                                    </div>
                                    </div>
                </div>
            </div>
</section>
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin:80px 0px 0px 0px">
        <div class="text-center">
            <h2>GET IN T<span>OUCH</span> WITH US</h2>
            <p>Want to know more? Call us, mail us or drop by for a meeting.</p>
            <p>We promise to provide detailed and quick responses to all your queries.</p>
        </div>
      </div>
      <div class="col-md-12" style="margin:0px 0px 40px 0px">
        <div class="col-md-4">
          <div class="map post3">
             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14031.815206920684!2d77.071989!3d28.450809!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e817517fa433ab9!2sENCRISS.com!5e0!3m2!1sen!2s!4v1488782967363" width="100%" height="400" frameborder="0" style="border:0; margin-top: 25px;" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-4">
          <div class="address post">
            <h3>OUR OFFICE</h3>
            <p><span>Our team of consultants, to support clients facing firm business challenges.</span></p>
            <p>We offer a seamless integration for our global offices and personnel, and are committed to this worldwide network, as it forms the basis of our ability to identify, research, analyze, and present timely global growth opportunities in your market.</p>
            
          </div>
          <div class="address post">
            <h3>ADDRESS DETAILS</h3>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; &nbsp;15 Bells<br>&nbsp; &nbsp; &nbsp; f209, first floor, Lado Sarai,<br>
            &nbsp; &nbsp; &nbsp; New Delhi - 110030.</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; &nbsp;Phone : +011 40536526</p>
            <p><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; Email : info@gmail.com</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contactform post4">
            <h3>SEND US A MESSAGE</h3>
            <div id="message_div" ></div>
              <form class="form-horizontal" method="post" id="footer-form">
                                    <div class="form-group">
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" required >
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" required>
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
                                        <input id="submit" name="submit" type="button"  onClick="get_value();"  value="SEND MESSAGE" class="btn btn-primary">
                                      
                                      </div>
                                    </div>
                                    
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>




<script>
  function get_value(){

var name=$("#name").val();
var email=$("#email").val();
var num=$("#number").val();

var msg=$("#message").val();
var mssg=document.getElementById("message_div");
//alert (name+email+num+msg);

var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var regex_numbers=/^[0-9]+$/;
        var regex_letters=/^([a-zA-Z]+\s)*[a-zA-Z]+$/;

if (name==''){


document.getElementById("name").focus();
mssg.innerHTML = "<p style='color:red;'>*User Name Required</p>";
}
else if ( email ==''){
  

document.getElementById("email").focus();
mssg.innerHTML = "<p style='color:red;'>* User Email ID Required</p>";
  
}
 else if(!filter.test(email) && isNaN(email) && email !="")
         {
        document.getElementById("email").focus();
mssg.innerHTML="<p style='color:red;'>* Enter vaild Email Id </p>";
               return false;
         } 
else if (num==''){
  

document.getElementById("number").focus();
mssg.innerHTML = "<p style='color:red;'>* User Mobile Number Required</p>";
  
}


else if (msg==''){
  

document.getElementById("message").focus();
mssg.innerHTML = "<p style='color:red;'>* Enter Your Query</p>";
  
}

else {
var value='name='+name+'&email='+email+'&tel='+num+'&description='+msg;
//alert (value);
$("#message_div").hide();
 $.ajax ({
   type:"POST",
        url:"contact.php" ,
        data: value,
        success: function(result) 
    {
      //alert (result);
      if(result==1){
        $("#message_div").show().fadeOut(10000);
        mssg.innerHTML = "<p style='color:green;'>Query Submitted</p>";
        //alert ("send");
    $("#footer-form")[0].reset();;
    
      }
else{
  $("#message_div").show().fadeOut(10000);
  mssg.innerHTML = "<p style='color:red;'>*error try again!</p>";
  //alert("not send");
  }
        }
      
});
}
}
$("#number").keypress(function (e) {
 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
       $("#message_div").html("<p style='color:red;'>Enter Digits Only</p>").show().fadeOut(5000);
     $("#number").focus();
       return false;
    }
   });

function send_mail(){

var name=$("#quick_name").val();
var email=$("#quick_email").val();
var num=$("#quick_number").val();

var msg=$("#quick_message").val();
var mssg=document.getElementById("message_div_one");
//alert (name+email+num+msg);

var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var regex_numbers=/^[0-9]+$/;
        var regex_letters=/^([a-zA-Z]+\s)*[a-zA-Z]+$/;

if (name==''){


document.getElementById("quick_name").focus();
mssg.innerHTML = "<p style='color:red;'>*User Name Required</p>";
}
else if ( email ==''){
  

document.getElementById("quick_email").focus();
mssg.innerHTML = "<p style='color:red;'>* User Email ID Required</p>";
  
}
 else if(!filter.test(email) && isNaN(email) && email !="")
         {
        document.getElementById("quick_email").focus();
mssg.innerHTML="<p style='color:red;'>* Enter vaild Email Id </p>";
               return false;
         } 
else if (num==''){
  

document.getElementById("quick_number").focus();
mssg.innerHTML = "<p style='color:red;'>* User Mobile Number Required</p>";
  
}


else if (msg==''){
  

document.getElementById("quick_message").focus();
mssg.innerHTML = "<p style='color:red;'>* Enter Your Query</p>";
  
}

else {
var value='name='+name+'&email='+email+'&tel='+num+'&description='+msg;
//alert (value);
$("#message_div_one").hide();
 $.ajax ({
   type:"POST",
        url:"contact.php" ,
        data: value,
        success: function(result) 
    {
      //alert (result);
      if(result==1){
        $("#message_div_one").show().fadeOut(10000);
        mssg.innerHTML = "<p style='color:green;'>Query Submitted</p>";
        //alert ("send");
    $("#contact_form")[0].reset();;
    
      }
else{
  $("#message_div_one").show().fadeOut(10000);
  mssg.innerHTML = "<p style='color:red;'>*error try again!</p>";
  //alert("not send");
  }
        }
      
});
}
}
$("#quick_number").keypress(function (e) {
 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
       $("#message_div_one").html("<p style='color:red;'>Enter Digits Only</p>").show().fadeOut(5000);
     $("#quick_number").focus();
       return false;
    }
   });
  
</script>

