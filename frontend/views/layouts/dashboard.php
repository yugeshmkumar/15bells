<?php
/**
 * @var $this yii\web\View
 */
use frontend\assets\NewdashboardAsset;
use frontend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\db\Query;
use yii\widgets\Breadcrumbs;

NewdashboardAsset::register($this);

$a =  Url::current();

$ab = explode('15bells.com/',$a);

$url = $ab[0];
//echo $url;die;

$checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);

$userrolesd = yii::$app->user->identity->user_login_as;

$urlsd =   Yii::getAlias('@frontendUrl');
$userid = Yii::$app->user->identity->id;
$myprofile = \common\models\Myprofile::find()->where(['userID' => $userid])->one();
?>
<?php $this->beginContent('@frontend/views/layouts/base9.php'); ?>


<body>  

<nav class="navbar navbar-default navbar-static-top dashboard_nav">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header col-md-4">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed menu_btn">
			<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/w_menu.svg';  ?>" width="25">
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand dashboard_logo" href="#">
				<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo1.png';  ?>" width="80">
			</a>
			<!-- <div class="form-group locality_grp">
								<select class="form-control location_drop" placeholer="Gurgaon">
									<option>Gurgaon</option>
									<option>Delhi</option>
									<option>Noida</option>
									<option>Faridabad</option>
									<option>Gaziabad</option>
								</select>
								<i class="fa fa-angle-down"></i>
								
							  </div>-->
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			<!--<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>-->
			<ul class="nav navbar-nav navbar-right nav_dash">
				<li><a href="<?php echo Yii::$app->urlManager->createUrl(['buyer']) ?>" class="link_dash">Buy</a></li>
				<li><a href="<?php echo Yii::$app->urlManager->createUrl(['seller']) ?>" class="link_dash">Sell</a></li>
				<li><a href="<?php echo Yii::$app->urlManager->createUrl(['lessee']) ?>" class="link_dash">Lease in</a></li>
				<li><a href="<?php echo Yii::$app->urlManager->createUrl(['lessor']) ?>" class="link_dash">Lease out</a></li>
				<li class="dropdown profile_dropdwn">
					<a href="#" class="dropdown-toggle user_detail" data-toggle="dropdown" role="button" aria-expanded="false">
					
						<?php if ($myprofile->logo) { ?>
							<img src="<?php echo Yii::getAlias('@archiveUrl'); ?>/mycompanylogo/<?php echo $myprofile->logo ?>" width="40" class="user_img">
							<?php }else{ ?>

						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/team/userdummyimage.png';  ?>" width="40" class="user_img">
						<?php } ?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu user_menu dash_menu" role="menu">
							<!--<li class="dropdown-header">SETTINGS</li>-->
							<li class="lessee"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/shortlist']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17">Shortlisted Properties</a></li>
							<li class="lessee"><a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit/lessee']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Site Visit.svg';  ?>" width="17"> Site Visits</a></li>

<li class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['buyeraction/shortlist']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17">Shortlisted Properties</a></li>
							<li class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit/buyer']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Site Visit.svg';  ?>" width="17"> Site Visits</a></li>


<li class="seller"><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellor']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17"> Manage Properties</a></li>
							<li class="seller"><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellorview']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Site Visit.svg';  ?>" width="17"> Site Visits</a></li>


<li class="lessor"><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lessor']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17"> Manage Properties</a></li>
							<li class="lessor"><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lesview']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Site Visit.svg';  ?>" width="17"> Site Visits</a></li>


							<li class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['invoice']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Invoice_Icon.svg';  ?>" width="17"> My Invoices</a></li>

							<!-- <li><a href="<?php echo Yii::$app->urlManager->createUrl(['banknew']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Bank Details.svg';  ?>" width="17"> Bank Details</a></li> -->
							<li><a href="<?php echo Yii::$app->urlManager->createUrl(['notifications']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Notifications.svg';  ?>" width="17"> Notifications</a></li>
							<li><a href="<?php echo Yii::$app->urlManager->createUrl(['/user/sign-in/logout']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Logout.svg';  ?>" width="17"> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>




    <div class="container-fluid main-container no_pad">
  		<div class="col-md-3 sidebar no_pad">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav side_navbar dash_menu">
					<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(['site/userdash']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Profile.svg';  ?>" width="18" class="profile_icon"> My Profile</a></li>


					<li class="lessee"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/shortlist']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17">Shortlisted Properties</a></li>
					<li  class="lessee"><a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit/lessee']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Site Visit.svg';  ?>" width="17"> Site Visits</a></li>
					<!-- <li class="lessee"><a href="<?php //echo Yii::$app->urlManager->createUrl(['common/bid']) ?>"><img src="<?//= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Logout.svg';  ?>" width="17" > Auction</a></li> -->
					<li class="lessee"><a href="<?php echo Yii::$app->urlManager->createUrl(['documentshow']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Invoice_Icon.svg';  ?>" width="17" > Document Show</a></li>
					<li class="lessee"><a href="<?php echo Yii::$app->urlManager->createUrl(['request-emd']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Invoice_Icon.svg';  ?>" width="17" >Auction</a></li>
					<li class="lessee"><a href="<?php echo Yii::$app->urlManager->createUrl(['save-searches/lessee','sort'=>'-id']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17">My activities</a></li>
					<?php 
         if($checkrole->item_name == "Company_user"){  ?>
					<li class="lessee"><a href="<?php echo Yii::$app->urlManager->createUrl(['useriphone']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17">Subusers</a></li>
		<?php } ?>

<li class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['buyeraction/shortlist']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17">Shortlisted Properties</a></li>
<li  class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit/buyer']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Site Visit.svg';  ?>" width="17"> Site Visits</a></li>
<!-- <li class="buyer"><a href="<?php// echo Yii::$app->urlManager->createUrl(['common/bid']) ?>"><img src="<?//= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Logout.svg';  ?>"  width="17"> Auction</a></li> -->
<li class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['documentshow']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Invoice_Icon.svg';  ?>"  width="17"> Document Show</a></li>
<li class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['request-emd']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Invoice_Icon.svg';  ?>" width="17" > Auction</a></li>
<li class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['save-searches/buyer','sort'=>'-id']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17">My activities</a></li>

<?php 
         if($checkrole->item_name == "Company_user"){  ?>
<li class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['useriphone']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17">Subusers</a></li>
<?php } ?>


<li class="seller"><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellor']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17"> Manage Properties</a></li>
<li  class="seller"><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellorview']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Site Visit.svg';  ?>" width="17"> Site Visits</a></li>



<li class="lessor"><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lessor']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Manage Properties.svg';  ?>" width="17"> Manage Properties</a></li>
					<li  class="lessor"><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lesview']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Site Visit.svg';  ?>" width="17"> Site Visits</a></li>


					<li class="buyer"><a href="<?php echo Yii::$app->urlManager->createUrl(['invoice']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Invoice_Icon.svg';  ?>" width="17"> My Invoices</a></li>

					<!-- <li><a href="<?php echo Yii::$app->urlManager->createUrl(['banknew']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Bank Details.svg';  ?>" width="17"> Bank Details</a></li> -->
					<?php 
                    $user_id = Yii::$app->user->identity->id;

					$querysd = new Query;
					$querysd->select('COUNT(*) as newcountd')
					->from('notifications')					
					->where(['item_id' => $user_id])
					->andwhere(['viewed' => '0']);
					
					$commandsd = $querysd->createCommand();
					$paymentsmd = $commandsd->queryOne();
					// print_r($paymentsmd);die;

					if($paymentsmd['newcountd'] > 0){

					 $counter = $paymentsmd['newcountd'];
					}

					?>					

					<li><a href="<?php echo Yii::$app->urlManager->createUrl(['notifications']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Notifications.svg';  ?>" width="17"> Notifications <?php if($paymentsmd['newcountd'] > 0){ ?><span class="notif_counter"><?php echo $counter; ?></span> <?php } ?></a></li>
					<li><a href="<?php echo Yii::$app->urlManager->createUrl(['/user/sign-in/logout']) ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dash/Logout.svg';  ?>" width="17"> Logout</a></li>

					

					

				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>



<?php echo $content ?>



</div>


<div class="container-fluid footer_banner">
	<div class="container">
		<div class="row">
			<p class="copy_rt">2019 © 15 Bells </p>
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Resources</h4>
				<ul class="fotter_lst">
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['blogs']) ?>" class="list_lnk">Blogs</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['faq']) ?>" class="list_lnk">FAQ's</a></li>
				</ul>
			</div>
			
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Privacy</h4>
				<ul class="fotter_lst">
					<li class=""><a href="#" class="list_lnk">Terms and Conditions</a></li>
					<li class=""><a href="#" class="list_lnk">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class="col-md-12 no_pad">
				<h4 class="footer_typ">Reach Out</h4>
				<ul class="fotter_lst">
					<li class=""><a href="#" class="list_lnk">+91 6209151515</a></li>
					<li class=""><a href="#" class="list_lnk">info@15bells.com</a></li>
				</ul>
				</div>
			</div>
			
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Follow us</h4>
				<p><span><a target="_blank" href="https://www.instagram.com/15bells/"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/instagram-logo.svg';  ?>" class="insta_logo" width="17"></a></span>
					<span><a href="https://www.linkedin.com/company/15bell/" target="_blank"><img class="linkedin_logo" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/linkedin.svg';  ?>" width="17"></a></span><span><a target="_blank" href="https://www.facebook.com/15bell/"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/facebook-logo.svg';  ?>" width="10"></a></span></p>
			</div>
		</div>
	</div>
</div>

 
 <?php $this->endContent(); ?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->



<script>

$(document).ready(function(){

		  setuserloginas();
		  $(function () {
  	$('.navbar-toggle-sidebar').click(function () {
  		$('.navbar-nav').toggleClass('slide-in');
  		$('.side-body').toggleClass('body-slide-in');
  		$('#search').removeClass('in').addClass('collapse').slideUp(200);
  	});

  	$('#search-trigger').click(function () {
  		$('.navbar-nav').removeClass('slide-in');
  		$('.side-body').removeClass('body-slide-in');
  		$('.search-input').focus();
  	});
  });
});


$(".dash_menu li a").click(function() {
    $(this).parent().addClass('active').siblings().removeClass('active');

    });


function setuserloginas(){
            
            $.ajax({
                                                       type: "POST",
                                                       url: '/site/setuserloginas',
                                                       data: {},
                                                       success: function (data) {
                              var datas = data.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                  });
                                                       $('#userrole').html(datas);
                                                       if(data == 'buyer'){
                                                         //alert(data);
      
      
                                                           
                                                          $(".seller").hide();
                                                          $(".lessor").hide();
                                                          $(".lessee").hide();
                                                          $(".buyer").show();
														  $("#buyer").addClass('active');

															$('#buyer_serch').css("display","block");
															$('#lessee_serch').css("display","none");
															$('#lesproperty').css("display","none");
															$('#selproperty').css("display","none");
                                                       }
                                                       if(data == 'seller'){
                                                           
                                                           $(".seller").show();
                                                           $(".lessor").hide();
                                                           $(".lessee").hide(); 
                                                           $(".buyer").hide(); 
														   $("#seller").addClass('active');
															$('#buyer_serch').css("display","none");
															$('#lessee_serch').css("display","none");
															$('#lesproperty').css("display","none");
															$('#selproperty').css("display","block");
                                                        }
                                                        if(data == 'lessor'){
                                                           
                                                           $(".seller").hide();
                                                           $(".lessor").show();
                                                           $(".lessee").hide(); 
                                                           $(".buyer").hide(); 
														   $("#lessor").addClass('active');
															$('#buyer_serch').css("display","none");
															$('#lessee_serch').css("display","none");
															$('#lesproperty').css("display","block");
															$('#selproperty').css("display","none");
                                                        }
                                                        if(data == 'lessee'){
                                                           
                                                           $(".seller").hide();
                                                           $(".lessor").hide();
                                                           $(".lessee").show();
                                                           $(".buyer").hide();  
														   $("#lessee").addClass('active');
															$('#buyer_serch').css("display","none");
															$('#lessee_serch').css("display","block");
															$('#lesproperty').css("display","none");
															$('#selproperty').css("display","none");
                                                        }
      
                                                       },
                                                   });
      
          }




</script>





 </body>

</html>


