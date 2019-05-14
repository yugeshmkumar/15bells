<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use kartik\widgets\TypeaheadBasic;
?>



<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="">
			
		<div class="container-fluid no_pad div_header">
		
			
			</div>
			<div class="container-fluid no_pad">
				<div id="myCarousel" class="carousel slide carousel_blog" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
						  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						  <li data-target="#myCarousel" data-slide-to="1"></li>
						  <li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner blog_c">
						  <div class="item active">
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/background.jpg';  ?>" alt="Los Angeles" style="width:100%;">
							 <div class="carousel-caption col-md-5 pad_slid" id="banner_cont">
								<p class="about_det animated slideInDown hidden-xs">From a background in real eastate, our team has formed a common goal to bring together the best and brightest to do something truely remarkable. </p>
								<h1 class="about_head">The changing culture of architecture in modern India</h1>
								<p class="blog_by"><span class="writr_n">Amit Kumar</span>|<span class="date_r">February 10, 2019</span></p>
								<p class="find_mor"><a href="#">Read more <i class="fa fa-angle-right"></i></a></p>
							  </div>
						  </div>

						  <div class="item">
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/about.jpg';  ?>" alt="Chicago" style="width:100%;">
							 <div class="carousel-caption col-md-5 pad_slid">
								<p class="about_det animated slideInDown hidden-xs">From a background in real eastate, our team has formed a common goal to bring together the best and brightest to do something truely remarkable. </p>
								<h1 class="about_head">The changing culture of architecture in modern India</h1>
								<p class="blog_by"><span class="writr_n">Amit Kumar</span>|<span class="date_r">February 10, 2019</span></p>
								<p class="find_mor"><a href="#">Read more <i class="fa fa-angle-right"></i></a></p>
							  </div>
						  </div>
						
						  <div class="item">
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/banner.jpg';  ?>" alt="New york" style="width:100%;">
							 <div class="carousel-caption col-md-5 pad_slid">
								<p class="about_det animated slideInDown hidden-xs">From a background in real eastate, our team has formed a common goal to bring together the best and brightest to do something truely remarkable. </p>
								<h1 class="about_head">The changing culture of architecture in modern India</h1>
								<p class="blog_by"><span class="writr_n">Amit Kumar</span>|<span class="date_r">February 10, 2019</span></p>
								<p class="find_mor"><a href="#">Read more <i class="fa fa-angle-right"></i></a></p>
							  </div>
						  </div>
						</div>

						<!-- Left and right controls -->
						
					  </div>
				
				
			</div>
			
			<div class="pull-right next_back">
						<a class="left left_icn" href="#myCarousel"
								data-slide="prev"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/left_b.svg';  ?>">Previous</a>
								<a class="right right_icn" href="#myCarousel"
									data-slide="next">Next<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/right_b.svg';  ?>"></a>
					</div>
<!-- end of navbar-->
		
		
			<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
			
	</section>

<!------------Transaction types Section----------->
<div class="container-fluid no_pad blog_bg">
	<div class="row">
		<div class="col-md-8">


 <?php foreach ($countries as $country): ?>
			<div class="row blog_repeat">
				<div class="col-md-12 contnt_blg">
					<h2 class="blog_titl"><?= Html::encode($country->title) ?></h2>
					<p class="blog_det"><span class="writr_b">Amit Kumar</span>|<span class="date_b"><?= Html::encode(date("F jS, Y ", $country->published_at)); ?></span></p>
					<?php
					
						$string = strip_tags($country->body);
						if (strlen($string) > 500) {

						// truncate string
						$stringCut = substr($string, 0, 500);
						$endPoint = strrpos($stringCut, ' ');

						//if the string doesn't contain any space then it will cut without word basis.
						$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
						
						}
					?>


					<p class="blog_txt"><?= Html::encode($string) ?></p>
					<p class="read_m"><a href="<?= Url::to(['article/view', 'slug' => Html::encode($country->slug)]); ?>" target="_blank" class="expnd_blog">Read more</a></p>
				</div>
				<?php $arrarticle_attachment = \common\models\ArticleAttachment::find()->where(['article_id' => $country->id])->all();  ?>
				<div class="col-md-12 no_pad">
				<?php foreach ($arrarticle_attachment as $article_attachment) { ?>				
					
					<img src="<?= Yii::getAlias('@archiveUrl') . '/blogimages/' . $article_attachment->name; ?>" alt="..." title="..." class="img-responsive blog_fullimage">				
				<?php } ?>
				</div>
			</div>

<?php endforeach; ?>
		

			
			<div class="row text-center">
				<button class="btn btn-default load_mor">Load More</button>
			</div>
		
		</div>
	<!---Blog Side menu----->
		<div class="col-md-4 blog_filter">
			<div class="row">
			<?php $form = ActiveForm::begin(['options' => [
                'class' => 'example'
             ]]); ?>
				<form class="example" action="/action_page.php" style="margin:auto;">
				  <input type="text" placeholder="Search.." class="serch_inpt" name="search2">
				  <button type="submit"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/search.png';  ?>"></button>
				</form>
				<?php ActiveForm::end(); ?>
			</div>
			<div class="row">
				<h3 class="side_head">Keywords / Tags</h3>
				<ul class="blog_side">
				<?php $form = ActiveForm::begin(); ?>
                    <li class="active"><?= Html::submitButton('#Architecture', ['class'=>'categ_selec','name' => 'keyword', 'value' => 'Architecture']) ?></li>
                    <li class=""><?= Html::submitButton('#Investment', ['class'=>'categ_selec','name' => 'keyword', 'value' => 'Investment']) ?></li>
                    <li><?= Html::submitButton('#RERA', ['class'=>'categ_selec','name' => 'role', 'keyword' => 'RERA']) ?></li>
                    <li><?= Html::submitButton('#Promoters', ['class'=>'categ_selec','name' => 'keyword', 'value' => 'promoters']) ?></li>
					<?php ActiveForm::end(); ?>
					
				</ul>
			</div>
			<div class="row">
				<h3 class="side_head">Popular Post</h3>
				<div class="col-md-12 no_pad">
					<div class="row row_rep brdr_btm">
						<div class="col-md-4 col-xs-4">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/bs_1.png';  ?>" class="img-responsive">
					</div>
					<div class="col-md-8 col-xs-8">
						<h3 class="blog_hed">How to make a good Real Estate Business Plan</h3>
						<p class="blog_dat">February 10, 2019</p>
					</div>
					</div>
					<div class="row row_rep brdr_btm">
						<div class="col-md-4 col-xs-4">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/bs_2.png';  ?>" class="img-responsive">
					</div>
					<div class="col-md-8 col-xs-8">
						<h3 class="blog_hed">How to Rent a Property in Gurugram</h3>
						<p class="blog_dat">February 10, 2019</p>
					</div>
					</div>
					<div class="row row_rep">
						<div class="col-md-4 col-xs-4">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/bs_3.png';  ?>" class="img-responsive">
					</div>
					<div class="col-md-8 col-xs-8">
						<h3 class="blog_hed">How to Get a 50% Buyer Agent Commission Refund</h3>
						<p class="blog_dat">February 10, 2019</p>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





<!--Footer Section------>


<?php 
$script = <<< JS
   
	$(document).ready(function () {
        alert('1');
    $('.blog_side li a').click(function(e) {

        $('.blog_side li.active').removeClass('active');

        var $parent = $(this).parent();
        $parent.addClass('active');
        e.preventDefault();
    });

   
	//$(".transp_contnt").hide();
	
	$(".trans_clck").click(function(){

	alert();
		$(".trust_contnt").hide();
		
    });
		// $(".transp_contnt").animate({bottom: '250px'});
	
	$(".buy").click(function(){
		 $(".buy").addClass("active");
		  $(".sell").removeClass("active");
	});
	$(".sell").click(function(){
		 $(".sell").addClass("active");
		  $(".buy").removeClass("active");
	});
	
	$('#myCarousel').carousel({
        interval: 10000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
	
  });
 

  $(window).scroll(function() {
    if($(this).scrollTop()>5) {
        $( ".navbar-me" ).addClass("fixed-me");
    } else {
        $( ".navbar-me" ).removeClass("fixed-me");
    }
});
/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
  


JS;
$this->registerJs($script);
?>  
 