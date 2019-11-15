<?php if(isset($_GET['a'])) { ?>

<?php $getarticlecat=  \common\models\ArticleCategory::find()->where(['status'=>1,'id'=>$_GET['a']])->one(); ?>
<?php  $arrgetoneblog =  \common\models\Article::find()->where(['status'=>1,'category_id'=>$getarticlecat->id])->orderBy('id desc')->all(); ?>
    <section class="blog_post">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><span>OUR</span><br>BLOG - <?php echo $getarticlecat->title ?></h1> 
          </div>
          <div class="col-md-9">
		  <?php foreach($arrgetoneblog as $getoneblog) {
          $published_at = date("d-M-Y", $getoneblog->published_at);
		  ?>
                    <div class="row inner_row">
                      <div class="col-md-12 blog_inner_img">
                        <img src="<?php echo $getoneblog->thumbnail_base_url ?>/<?php echo $getoneblog->thumbnail_path ?>" alt="..." title="..." class="img-responsive">
                        <div class="blog_heading">
                           <b><?php echo $published_at ?></b><br>
                           <h2><?php echo $getoneblog->title ?></h2>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <p >
						<?php echo $getoneblog->body ?>
						</p>
						<p>
						<?php $arrarticle_attachment = \common\models\ArticleAttachment::find()->where(['article_id'=>$getoneblog->id])->all(); ?>
						<?php foreach($arrarticle_attachment as $article_attachment) { ?>
						 <img src="<?php echo $article_attachment->base_url ?>/<?php echo $article_attachment->path ?>" alt="..." title="..." class="img-responsive">&nbsp;
                        
						<?php } ?>
						</p>
                        <div class="col-sm-12 col-xs-12 text-right shar_btn_div">
                            <div class="inner_shar_btn">
                              <button id="fb_blog" type="button" class="btn btn-default btn-circle"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                              <button id="tw_blog" type="button" class="btn btn-default btn-circle"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                              <button id="gp_blog" type="button" class="btn btn-default btn-circle"><i class="fa fa-google-plus" aria-hidden="true"></i></button>
                              <button id="share_blog"  type="button" class="btn btn-success btn-circle" title="share"><i class="fa fa-share-alt" aria-hidden="true"></i></button>
                            </div>    
                        </div>

                      </div>
                    </div>
		  <?php } ?>

          </div>
         
        </div>
      </div>
    </section>
<?php } ?>




<?php if(isset($_GET['t'])) { ?>

<?php $getoneblog =  \common\models\Article::find()->where(['status'=>1,'id'=>$_GET['t']])->one(); ?>
    <section class="blog_post">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><span>OUR</span><br>BLOG </h1>
          </div>
          <div class="col-md-9">
		  <?php if($getoneblog) {
          $published_at = date("d-M-Y", $getoneblog->published_at);
		  ?>
                    <div class="row inner_row">
                      <div class="col-md-12 blog_inner_img">
                        <img src="<?php echo $getoneblog->thumbnail_base_url ?>/<?php echo $getoneblog->thumbnail_path ?>" alt="..." title="..." class="img-responsive">
                        <div class="blog_heading">
                           <b><?php echo $published_at ?></b><br>
                           <h2><?php echo $getoneblog->title ?></h2>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <p >
						<?php echo $getoneblog->body ?>
						</p>
						<p>
						<?php $arrarticle_attachment = \common\models\ArticleAttachment::find()->where(['article_id'=>$getoneblog->id])->all(); ?>
						<?php foreach($arrarticle_attachment as $article_attachment) { ?>
						 <img src="<?php echo $article_attachment->base_url ?>/<?php echo $article_attachment->path ?>" alt="..." title="..." class="img-responsive">&nbsp;
                        
						<?php } ?>
						</p>
                        <div class="col-sm-12 col-xs-12 text-right shar_btn_div">
                            <div class="inner_shar_btn">
                              <button id="fb_blog" type="button" class="btn btn-default btn-circle"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                              <button id="tw_blog" type="button" class="btn btn-default btn-circle"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                              <button id="gp_blog" type="button" class="btn btn-default btn-circle"><i class="fa fa-google-plus" aria-hidden="true"></i></button>
                              <button id="share_blog"  type="button" class="btn btn-success btn-circle" title="share"><i class="fa fa-share-alt" aria-hidden="true"></i></button>
                            </div>    
                        </div>

                      </div>
                    </div>
		  <?php } ?>

          </div>
         
        </div>
      </div>
    </section>
<?php } ?>