<?php
/* @var $this yii\web\View */
/* @var $model common\models\Article */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid portfolio-wrap portfolio-with-gaps">
		<div class="container single_blog">
			<div class="row pad_b">
				<div class="blog_img">
<?php foreach ($model->articleAttachments as $attachment): ?>
                    
                        <?php  \yii\helpers\Html::a(
                            $attachment->name,
                            ['attachment-download', 'id' => $attachment->id])
                        ?>
                         <img src="<?= Yii::getAlias('@archiveUrl') . '/blogimages/' . $attachment->name; ?>" width="100%">
                        <?php  Yii::$app->formatter->asSize($attachment->size) ?>
                   
                <?php endforeach; ?>
					
						<div class="titl_div">
						<h3 class="blog_hed"><?php echo $model->title ?></h3>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
							<span class="span_abc"><a href=""><i class="fa fa-camera-retro"></i></a></span>
							<span class="span_abc"><a href=""><?php  echo $model->category['title']; ?></a></span>
							
							<span class="span_abc"><?php 
                                                          $nice_date = date('M d,Y', strtotime( $model->created_at ));
                                                               echo $nice_date;
                                                                       ?></span>
							</div>
						</div>
						<div class="row pad_p">
							<p class="blog_p">
							<?php echo $model->body ?>
                                                      </p>
						</div>
					</div>
				</div>
			</div>
			<!-- <p class="text-center view-more append-button">VIEW MORE</p> -->
		</div>
	</div>

<script>
		function openNav() {
			document.getElementById("mySidenav1").style.width = "250px";
		}

		function closeNav() {
			document.getElementById("mySidenav1").style.width = "0";
		}
</script>
<script>
$(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
    $('#search button.close i').click(function(){
		$('#search').removeClass('open');
	});
    
    //Do not include! This prevents the form from submitting for DEMO purposes only!
    $('form').submit(function(event) {
        event.preventDefault();
        return false;
    })
});

</script>
