<?php
/* @var $this yii\web\View */
/* @var $model common\models\Article */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$currenturl =  Yii::getAlias('@frontendUrl').Yii::$app->request->url;
use common\models\Article_author;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;



?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src ='https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0&appId=301287037229795&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/about.jpg';  ?>">
			
            <div class="container-fluid no_pad div_header">
            
                
                <div class="container" id="banner_cont">
                    <div class="col-md-10 col-md-offset-1 text-left single_blogpage about_bannr">
                                    <h1 class="single_hed"><?php  echo $model->title; ?></h1>
                                    <?php  $users = Article_author::find()->where(['id'=>$model->author_id])->one(); ?>
                                    <p class="blog_by"><span class="writr_n"><?php  echo $users->author_name; ?></span>|<span class="date_r"><?= Html::encode(date("F jS, Y ", $model->published_at)); ?></span></p>
                    </div>
                    

                    
                </div>
                
                
    <!-- end of navbar-->
            </div>
            
    
                <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
                
        </section>
    
    <!------------Transaction types Section----------->
    <div class="container-fluid blog_bg">
        <div class="row">
            <div class="col-md-8">
                <div class="row blog_repeat">
                    <div class="col-md-12 contnt_blg">
                        <p class="blog_txt"><?php  echo $model->body; ?> </p>
                        <!-- <p class="blog_qoute">"Strud exerci tation ullamcorper suscipit lobortis amet consectetur adipiscing nisl aliquip ex commodo consequat duis autem."</p> -->
                        <!-- <p class="blog_txt">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. </p> -->
                        <!-- <div class="col-md-4 pad_lft">
                            <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/1.png';  ?>" class="img-responsive">
                        </div>
                        <div class="col-md-4 pad_cntr">
                            <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/2.png';  ?>" class="img-responsive">
                        </div>
                        <div class="col-md-4 pad_rt">
                            <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/3.png';  ?>" class="img-responsive">
                        </div>
                        <div class="col-md-12 no_pad">
                            <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/b1.jpg';  ?>" class="blog_imag">
                        </div> -->
                        <!-- <p class="blog_txt col-md-12 padding_lst no_pad">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. </p> -->
                </div>
                </div>
                <div class="row row_socal">
                    <div class="col-md-6 no_pad">
                        <!-- <p class="hash_tg"><span class="hastg_1"># Architecture</span><span class="hastg_2"># Design</span></p> -->
                    </div>
                    <div class="col-md-6 text-right">
                        <ul class="social_share">
                            <li class="shar_lnk">Share :</li>
                            <div class="fb-share-button" 
data-href= <?php echo $currenturl; ?> 
data-layout="button" 
data-size="small" 
data-mobile-iframe="true">
    <a target="_blank" 
    href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.codemeright.com%2Ffacebook-share-button.html&amp;src=sdkpreparse" 
    class="fb-xfbml-parse-ignore"><img src="<?php Yii::getAlias('@frontendUrl').'/newimg/img/fb.png';  ?>"></a>
</div>
                             <!-- <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small"  data-mobile-iframe="true"><a  target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" ><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/fb.png';  ?>" width="12"></a></div> -->
                           
                                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                
                            <!-- <li class="shar_lnk"><a href=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/twitter.png';  ?>" width="20"></a></li> -->
                        </ul>
                    </div>
                </div>
                
            </div>
        <!---Blog Side menu----->
            <div class="col-md-4 blog_filter">
                <!-- <div class="row">
                    <form class="example" action="/action_page.php" style="margin:auto;">
                      <input type="text" placeholder="Search.." class="serch_inpt" name="search2">
                      <button type="submit"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/search.png';  ?>"></button>
                    </form>
                </div> -->
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
                <!--<div class="row">
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
                </div>-->
            </div>
        </div>
        <div class="row author_div">
                    <h2 class="abt_writr brdr_bottm">About the Author</h2>
                    <div class="col-md-12 no_pad">
                        <div class="col-md-2 text-center authr_img">
                            <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/team/t2.jpg';  ?>" width="100" class="img-circle">
                        </div>
                        <div class="col-md-10">
                            <h2 class="writr_nam"><?php  echo $users->author_name; ?>, <?php  echo $users->author_position; ?></h3>
                            <p class="blog_txt col-md-12  no_pad">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. </p>
                        </div>
                    </div>
        </div>
        <div class="row author_div">
                    <div class="col-md-12 no_pad brdr_bottm">
                        <div class="col-md-8 col-xs-7 no_pad">
                    <?php 

                    $articlecommments = \common\models\Article_comments::find()->where(['article_id' => $model->id])->andwhere(['status' => 'approved'])->all();
                    $commentscount = \common\models\Article_comments::find()->where(['article_id' => $model->id])->andwhere(['status' => 'approved'])->count();

                    ?>
                            <h2 class="abt_writr">Comments <span class="">(<?php echo $commentscount; ?>)</span></h2>
                        </div>
                        <div class="col-md-4 col-xs-5 text-right comment_ad">
                            <a href="javascript:void(0)" class="add_commnt">Add a comment</a>
                        </div>
                    </div>

                    <?php 


                    foreach($articlecommments  as $articlecommment){


                    ?>
                    <div class="col-md-12 comment_section brdr_bottm">
                        
                            <h4 class="writr_nam col-md-8 no_pad col-xs-7"><?php echo $articlecommment->comment_name; ?></h4><p class="author_date text-right col-md-4 col-xs-5"><?php echo date("F j, Y ", strtotime($articlecommment->created_date)); ?> </p>
                            <p class="blog_txt col-md-12  no_pad"><?php echo $articlecommment->comment_description; ?> </p>
                        
                    </div>

                    <?php }  ?>
                    

                    
                    <?php
                    
                    $modeled = new \common\models\Article_comments();
                    $form = ActiveForm::begin(['action'=>"/article/savecomments"]); 

                    ?>
                    <div class="col-md-12 comment_section no_pad" style="margin-top:30px">
                    <div class="form-group">
                              <?php echo $form->field($modeled, 'comment_name')->textInput(['class'=>"form-control coment_spac",'placeholder'=>'Your Name'])->label(false); ?>

                            </div>
                    </div>
                    
                    <?php echo $form->field($modeled, 'article_id')->hiddenInput(['value'=>$model->id,'class'=>"form-control coment_spac",'placeholder'=>'Your Name'])->label(false); ?>

                    <div class="col-md-12 comment_section no_pad">
                    
                            <div class="form-group">
                              <?php echo $form->field($modeled, 'comment_description')->textarea(['class'=>"form-control coment_spac",'placeholder'=>'Your Comment','rows'=>'5'])->label(false); ?>

                            </div>
                            <p class="text-right post_cancel">
                                <a href="javascript:void(0)" class="cancel_btn">Cancel</a>
                                <?= Html::submitButton('Post a comment', ['class' => 'post_btn']) ?>
                                
                            </p>
                    </div>
                    <?php ActiveForm::end(); ?>

                    
        </div>
            <!-- <div class="row author_div">
                    <div class="col-md-12 no_pad brdr_bottm">
                        <div class="col-md-8 col-xs-8 no_pad">
                            <h2 class="abt_writr">You may also like</h2>
                        </div>
                        <div class="col-md-4 col-xs-4 text-right comment_ad">
                            <a href="javascript:void(0)" class="add_commnt">View all</a>
                        </div>
                    </div>
                    <div class="col-md-12 no_pad full_width">
                        <div class="col-md-4 reference_blog">
                            <div class="othr_blgs">
                                <h4 class="othr_blg">How to Rent a property in Gurgaon</h4>
                                <p class="blog_det"><span class="writr_b">Amit Kumar</span>|<span class="date_b">February 10, 2019</span></p>
                                <p class="blog_txt">Starting a real estate business can be a lucrative thing. Apart from enjoying the numerous tax benefits that come from investing in real estate, it’s also a solid hedge against inflation and it helps you create a business with a solid cash flow early on and achieve much, much more.</p>
                                <p class="read_m"><a href="javascript:void(0)" class="expnd_blog">Read more</a></p>
                                <p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/b1.jpg';  ?>" class="blog_imag"></p>
                            </div>
                        </div>
                        <div class="col-md-4 reference_blog">
                            <div class="othr_blgs">
                                <h4 class="othr_blg">How to Rent a property in Gurgaon</h4>
                                <p class="blog_det"><span class="writr_b">Amit Kumar</span>|<span class="date_b">February 10, 2019</span></p>
                                <p class="blog_txt">Starting a real estate business can be a lucrative thing. Apart from enjoying the numerous tax benefits that come from investing in real estate, it’s also a solid hedge against inflation and it helps you create a business with a solid cash flow early on and achieve much, much more.</p>
                                <p class="read_m"><a href="javascript:void(0)" class="expnd_blog">Read more</a></p>
                                <p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/b2.jpg';  ?>" class="blog_imag"></p>
                            </div>
                        </div>
                        <div class="col-md-4 reference_blog">
                            <div class="othr_blgs">
                                <h4 class="othr_blg">How to Rent a property in Gurgaon</h4>
                                <p class="blog_det"><span class="writr_b">Amit Kumar</span>|<span class="date_b">February 10, 2019</span></p>
                                <p class="blog_txt">Starting a real estate business can be a lucrative thing. Apart from enjoying the numerous tax benefits that come from investing in real estate, it’s also a solid hedge against inflation and it helps you create a business with a solid cash flow early on and achieve much, much more.</p>
                                <p class="read_m"><a href="javascript:void(0)" class="expnd_blog">Read more</a></p>
                                <p class=""><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/blog/b3.jpg';  ?>" class="blog_imag"></p>
                            </div>
                        </div>
                    </div>
            </div> -->
    </div>


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
  
   //$(".transp_contnt").hide();
   
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


