<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use common\models\Bellsfaqs;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BellsfaqsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'faqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
    .ui-autocomplete {
	position: absolute;
	top: 0;
	left: 0;
    cursor: default;
    width:400px!important;
}
</style>    

<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/about.jpg';  ?>">
			
            <div class="container-fluid no_pad div_header">
            
            
                <div class="container" id="banner_cont">
                    <div class="col-md-6 col-md-offset-1 text-left faq_page">
                        <p class="about_det animated slideInDown faq_tetx hidden-xs">From a background in real estate, our team has formed a common goal to bring together the best and brghtest to do something truely remarkable. We are focused on building solutions where no one gets the short end to stick.</p>
                        <h1 class="faq_hed">Question? Look here</h1>
                        <div class="row">
                        <form class="example"  style="margin:auto;">
                        <div class="ui-widget">
                       
                        <input type="text" placeholder="Search.." class="serch_inpt" name="search2" id="country">
                        <input type="hidden" placeholder="Search.." class="serch_inpt" name="searchid" id="countryid">
                        <button type="submit" ><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/search.png';  ?>"></button>

                        </div>
                        </form>
                        </div>
                    </div>
                    
                    
                </div>
                
                
    <!-- end of navbar-->
            </div>
            
    
                <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
                
        </section>
    
    <!------------Transaction types Section----------->
    <div class="container-fluid no_pad">
    
        <div class="row">
            <div class="col-md-12 no_pad">
            <div class="col-md-3 no_pad">
                <div class="row bg_fq">
                    <ul class="faq_side">
                   <li class="active"> <?php $form = ActiveForm::begin(); ?></li>
                   <li> <?= Html::submitButton('# Buyer', ['class'=>'categ_selec','name' => 'role', 'value' => 'Buyer']) ?></li>
                   <li> <?= Html::submitButton('# Seller', ['class'=>'categ_selec','name' => 'role', 'value' => 'seller']) ?></li>
                   <li> <?= Html::submitButton('# Lessor', ['class'=>'categ_selec','name' => 'role', 'value' => 'lessor']) ?></li>
                   <li> <?= Html::submitButton('# Lessee', ['class'=>'categ_selec','name' => 'role', 'value' => 'tenant']) ?></li>
                        
                        <?php ActiveForm::end(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 no_pad">
                    <div class="panel-group faq_select" id="accordion" role="tablist" aria-multiselectable="true">


                        <!-- <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                 
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> How do I buy a property?</h4>
                            
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body contnt_fa">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</div>
                            </div>
                        </div> -->


                        <?php foreach ($countries as $country): ?>
   
                        <div class="panel panel-default faq_panel">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                
                            <h4 class="collapsed panel-title" data-toggle="collapse" data-parent="#accordion" href="#<?= Html::encode($country->id) ?>" aria-expanded="false" aria-controls="collapseTwo">
                            <?= Html::encode($country->subject) ?>
                            </h4>
                         
    
                            </div>
                            <div id="<?= Html::encode($country->id) ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body contnt_fa"><?= Html::encode($country->content) ?></div>
                            </div>
                        </div>

<?php endforeach; ?>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

                    
            </div>
        </div>
        </div>
    
    </div>
    
    <div class="container-fluid no_pad">
        <div class="container">
            
            <div class="row reach_det">
                <div class="col-md-6 no_pad">
                    <h1 class="trans_head_b">You still have any <br>Question?</h1>
                    <p class="brand_txt">If still can’t find your questions in our FAQ’s you can always contact us. We will answer to you shortly!</p>
                    
                </div>
                <div class="col-md-6 contact_s">
                    <div class="card_contct">
                        <p class="contct_hed"><i class="fa fa-phone call_btn"></i> +91 - 6209151515</p>
                        <p class="contct_txt">The best way to get answer faster</p>
                    </div>
                    <div class="faq_contct">
                        <p class="contct_hed"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/ques.png';  ?>" width="14" class="img_q"> info@15bells.com</p>
                        <p class="contct_txt">We are always happy to help.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    .
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script type="text/javascript">
        $("#country").autocomplete({
            source: "/faq/citylist",
            select: function (event, ui) {
            $("#country").val(ui.item.label); // display the selected text
            $("#countryid").val(ui.item.id); // save selected id to hidden input
            }
        });
 </script>

    <script>
   
   $(document).ready(function () {
   $('.prop_cat li a').click(function(e) {

       $('.prop_cat li.active').removeClass('active');

       var $parent = $(this).parent();
       $parent.addClass('active');
       e.preventDefault();
   });
});

</script>
<script>
  $(document).ready(function(){
  
   $(".trans_clck").click(function(){
   //alert();
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

</script>
 <script>

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
 </script>