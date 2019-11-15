<?php
use yii\helpers\Url;
?>

<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin:80px 0px 0px 0px">
        <div class="text-center post">
            <h2>GET IN T<span>OUCH</span> WITH US</h2>
            <p>Want to know more? Call us, mail us or drop by for a meeting.</p>
            <p>We promise to provide detailed and quick responses to all your queries.</p>
        </div>
      </div>

<div class="col-sm-12" style="margin:40px 0px 40px 0px">
                      <div class="col-sm-6 post">
            <div id="message_div" ></div>
             <div class="thumbnail">
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
                                        <div class="g-recaptcha" data-sitekey="6LfUOiUUAAAAAA9U0yC5Sf3GEYAGVMXdPmyy17H-"></div>
                                      </div>
                                    </div>

                                   
                                    <div class="form-group">
                                      <div class="col-sm-10">
                                        <input id="submit" name="submit" type="button"  onClick="get_value();"  value="SEND MESSAGE" class="btn btn-primary">
                                         <input id="submit1" name="submit" type="Reset" value="RESET" class="btn btn-primary">
                                      </div>
                                    </div>
                                    
                       </form>
                       </div>
                        </div>
                      
                      <div class="col-sm-6 post">
                        <div class="caption">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.988964630792!2d77.08458631467624!3d28.479878982478237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19243dbca3a1%3A0x18296625c08803fa!2s15bells.com!5e0!3m2!1sen!2sin!4v1497259620721" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                              <div class="caption__overlay">
                                  <p class="caption__overlay__content">Address :- 15 Bells - 130 DLF, City Court, Gurgaon</p>
                                  <h1 class="caption__overlay__title">
                                  <i class="fa fa-phone" aria-hidden="true" style=" position: absolute;top: 67px;left: 80px; color:#2f78b4;font-size: 40px;width: 25px;"></i>+011-40536526,<br>15bells.official@gmail.com</h1>
                              </div>
                  
                
                        </div>
                      </div>
                    </div>

    </div>
  </div>

</section>
<section id="fotter">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin: 40px 0px 40px 0px;">
                <div class="col-md-8 post">
                    <img src="<?= Url::to('@web/img') ?>/logo.png" class="img-responsive" alt="..."><br>
                  <P>15 Bells, a part of Stoneray Technologies Pvt. Ltd. aims to restructure the real estate industry in India without changing the basics. As a company, we want to empower our users to buy and sell commercial property on the go, irrespective of the location of the buyer, seller, lessor and lessee. Our leaders have a high success rate in the real estate industry and aim to bring technology and real estate together as one platform to bring innovation in the real estate industry. As a company, we are on a journey to transform the real estate experience for you.</P><br>

                   <!-- <button type="button" class="btn btn-default"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; &nbsp;READ MORE...</button> -->
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                            <li><a href="<?= Yii::$app->urlManager->createUrl("lessee") ?>">LESSEE</a></li>
                             <li><a href="<?= Yii::$app->urlManager->createUrl("lessor") ?>">LESSOR</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">BUYER</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("seller") ?>">SELLER</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("aboutus") ?>">ABOUT US</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("terms") ?>">TERMS & CONDITIONS</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("privacy") ?>">PRIVACY POLICY</a></li>                        
                      </ul>
                    </nav>


                </div>
                <div class="col-md-4 post4">
                    <h2>CONTACT US</h2><br>
                    <P><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp; &nbsp;130 DLF, City Court, Gurgaon</P>
                    <P><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp;+91 - 8130109696</P>
                    <h1>
                         <ul class="social-network social-circle">
                       <li><a href="https://www.facebook.com/15bells/"  class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/15bells" class="icoTwitter" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/u/0/101985235162687065074" class="icoGoogle" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/15bells" class="icoLinkedin"  target="_blank" title="Linkedin"><i class="fa fa-rss"></i></a></li>
                    </ul>
                    </h1>
                    <div class="clearfix"></div>
                    <p><a href="#contact"><button type="button" class="btn btn-default"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; &nbsp;CONTACT FORM</button></a></p>
                    
                    
                </div>
            </div>
            
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin: 20px 0px 10px 0px;">
                <p> © 2017 ALL RIGHTS RESERVED. POWERED BY <B class="creator"><a href="https://encriss.com/">encriss.com</a></B></p>
                <a id="back-to-top" href="#" class="btn btn-default btn-circle back-to-top" role="button" data-toggle="                                                                         tooltip" data-placement="top">
                 <i class="fa fa-arrow-up" aria-hidden="true"></i>
                  </a> 
            </div>
        </div>
    </div>
</footer>






















  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src='https://www.google.com/recaptcha/api.js'></script>
 


<script type="text/javascript">
  $('.cont_us').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 1000);
    return false;
});
 $('.S_pro').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 1000);
    return false;
}); 
</script>
<script>
jQuery(document).ready(function() {
    jQuery('.post').addClass("hide_me").viewportChecker({
        classToAdd: 'visible animated bounceInUp',
        offset: 100
       });
});
jQuery(document).ready(function() {
    jQuery('.post1').addClass("hide_me").viewportChecker({
        classToAdd: 'visible animated bounceInDown',
        offset: 100
       });
});
jQuery(document).ready(function() {
    jQuery('.post3').addClass("hide_me").viewportChecker({
        classToAdd: 'visible animated bounceInLeft',
        offset: 100
       });
});
jQuery(document).ready(function() {
    jQuery('.post4').addClass("hide_me").viewportChecker({
        classToAdd: 'visible animated bounceInRight',
        offset: 100

    });
});
</script>

<script>
$(document).ready(function () {
          $(document).on('mouseenter', '.inner1', function () {                   
            $(".hovercircle1").show();
            
          }).on('mouseleave', '.inner1', function () {
              $(".hovercircle1").hide();
          });
      });
      
      $(document).ready(function () {
          $(document).on('mouseenter', '.inner2', function () {                   
            $(".hovercircle2").show();
            
          }).on('mouseleave', '.inner2', function () {
              $(".hovercircle2").hide();
          });
      }); 
      $(document).ready(function () {
          $(document).on('mouseenter', '.inner3', function () {                   
            $(".hovercircle3").show();
            
          }).on('mouseleave', '.inner3', function () {
              $(".hovercircle3").hide();
          });
      });


</script>
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

    </script>
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
  setTimeout(function() { c4.circleProgress('value', 0.7); }, 2100);

  
})(jQuery);


</script>
  </body>
</html>