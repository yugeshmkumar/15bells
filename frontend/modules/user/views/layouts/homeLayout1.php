<?php
/**
 * @var $this yii\web\View
 */
use frontend\assets\NewDesignAsset;
use frontend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

NewDesignAsset::register($this);
?>
 <?php $this->beginContent('@frontend/views/layouts/base10.php'); ?>


    <body>
<style>
.white_clr{
	color:#ffffff !important;
	border-right:1px solid #ffffff !important;
}
.fnt_wht{
	color:#ffffff !important;
}
</style>
        
 <div class="container-fluid no_pad">
	
	<div class="fixed_top hidden-xs hidden-sm">
		<div class="row">
			<div class="logo_div">
				<span><img class="img_logo" src="<?= Yii::$app->request->baseUrl . '/frontimg/logo.png' ?>" width="90" style="margin:0 auto;"></span><br>
				<span class="menu_m menu_drop mainbutton" id="">MENU</span>
			</div>
		</div>
		<div class="row menu_row menu">		
				<ul class="dropdown_menu">
    						<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->homeUrl ?>">Home</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">Buyer</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a></li>
							 <li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a></li>
    						<!--<li><a class="sliding-middle-out" href="#">Blog</a></li>-->
                            <li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("user/sign-in/login") ?>">Register/Login</a></li>
                            <li><a class="sliding-middle-out link_clr" href="#" style="border-right:none !important;">Contact Us</a></li>
				</ul>	
	</div>
	</div>
		<div class="row hidden-lg hidden-md">
		 <div id="nav-container" class="nav_bars col-xs-4 col-sm-4 text-center" style="padding-top:15px;">
		  <i class="fa fa-bars fa-2x" onclick="openNav()"></i>
         </div>
		 <div class="col-sm-4 col-xs-4 text-center">
			<img class="img_logo" src="<?= Yii::$app->request->baseUrl . '/frontimg/logo.png' ?>" width="90" style="margin:0 auto;">
		 </div>
		 <div class="col-sm-4 hidden-xs">
		 </div>
		 <div id="mySidenav1" class="sidenav1">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-close close_sml"></i></a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->homeUrl ?>">Home</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("buyer/buyer") ?>">Buyer</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a>
		   <a class="sliding-middle-out" href="#">Blog</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("user/sign-in/login") ?>">Register/Login</a>
		   <a class="sliding-middle-out" href="#">Contact Us</a>
		</div>
	</div>
	 <?php echo $content ?>
	
	<!--==========First Section=========-->
	 </body>
</html>

<?php $this->endBody() ?> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script>
	  function openNav() {
    document.getElementById("mySidenav1").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav1").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
	  </script>
<script>
$(document).ready(function(){  
$(".menu_clr").click( function (){
    $('.menu_drop').addClass('fnt_wht');
    $('.link_clr').addClass('white_clr');
});  
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



<script>
$(document).ready(function(){
	$(".img_logo").click(function(){
		$("#first_sec").show(2000);
		$("#secnd_sec").hide(2000);
		$("#abcd").hide(2000);
		$("#section_e").hide(2000);
	});
	$(".anchr_ex").click(function(){
		$("#first_sec").hide(2000);
		$("#section_e").hide(2000);
		$("#secnd_sec").show(2000);
	});
	$(".skip_v").click(function(){
		$("#first_sec").hide(2000);
		$("#abcd").show(2000);
		$("#secnd_sec").hide(2000);
		$("#section_e").hide(2000);
	});
	//$(".finish_custm").click(function(){
		//$("#first_sec").hide(2000);
		//$("#abcd").hide(2000);
		//$("#section_e").show();
		//$("#secnd_sec").hide(2000);
	//});
	
});

</script>


<?php $this->endContent(); ?>

		