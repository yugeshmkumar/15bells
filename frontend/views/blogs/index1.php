<?php

use yii\helpers\Url;

use kartik\widgets\TypeaheadBasic;
?>
<style>
    .title{width:100%;background:transparent;}
    .portfolio-wrap{padding-top:200px;}
</style>
<!-- PORTFOLIO -->

<?php
//$start = 1;
$limit = 9;
if (isset($_GET['id'])) {
    $ids = $_GET['id'];
    $start = ($ids - 1) * $limit;
}else{
$start = 0;
}
//echo $limit;die;
$arrgetall = \common\models\Article::find()->where(['status' => 1])->orderBy('id desc')->limit($limit)->offset($start)->all();
//  print_r($arrgetall);die;
?>

<div class="container-fluid portfolio-wrap portfolio-with-gaps">
    <div class="container">
        <div class="portfolio">

            <?php
            foreach ($arrgetall as $getoneblog) {
                $published_at = date("d-M-Y", $getoneblog->published_at);
                ?>
                <div class="portfolio-item">
                    <a href="http://www.futureof.design" target="_blank">
                        <?php $arrarticle_attachment = \common\models\ArticleAttachment::find()->where(['article_id' => $getoneblog->id])->all();
                        ?>

                        <?php foreach ($arrarticle_attachment as $article_attachment) { ?>
                            <img src="<?= Yii::getAlias('@archiveUrl') . '/blogimages/' . $article_attachment->name; ?>" alt="..." title="..." class="img-responsive">&nbsp;

                        <?php } ?>
                        <!--<img alt="" src="<?php Yii::$app->homeUrl ?>/frontend/web/img/blogs/blog/4.png">-->
                    </a>
                    <div class="cover">
                        <p class="title"> <?php echo $getoneblog->title ?> </p>
                        
                        <a href="<?= Url::to(['article/view', 'slug' => $getoneblog->slug]); ?>" target="_blank" class="to-portfolio-item">
                           Click here
                        </a>
                    </div>
                </div>

            <?php } ?>

        </div>
        <!-- <p class="text-center view-more append-button">VIEW MORE</p> -->
    </div>
</div>

<?php
$counts = Yii::$app->db->createCommand("select count(*) from article");
$countrow = $counts->queryScalar();
$total = ceil($countrow / $limit);
//echo $total;die;
echo "<div class='container text-center'><ul class='pagination'>";
?>

<li><a style="background-color: #32c5d2;color: white;" href="<?php echo Url::toRoute(['/blogs', 'id' => 1]); ?>" >First</a></li>




<?php
for ($i = 1; $i <= $total; $i++) {
    ?>
    <li><a id='p<?php echo $i; ?>' style="display:none" class=' chiu chinchpokli<?php echo ceil($i / 10); ?>' href="<?php echo Url::toRoute(['/blogs', 'id' => $i]); ?>"  data-total=<?php echo $total; ?>><?php echo $i; ?></a></li>

    <?php
}
?>


<?php
?>
<li><a style="background-color: #32c5d2;color: white;" href="<?php echo Url::toRoute(['/blogs', 'id' => $total]); ?>" >Last</a></li>
    <?php
    echo "</ul></div>";
    ?>

<!-- CONTACT FORM -->



        <!-- <div class="loader-cover"><img alt="" src="img/.gif" ></div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script src="js/index_page.js"></script> -->
<script>
    function openNav() {
        document.getElementById("mySidenav1").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav1").style.width = "0";
    }



    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    
    var id = 0, total = 0;
    
    $(document).ready(function () {
      
        $('.chiu').css('display', 'none');
        id = getParameterByName('id');
        total = $('#p1').data('total');

        if (id % 10 == 0)
        {
            if (Math.ceil(id / 10) < Math.ceil(total / 10))
            {
                $('.chinchpokli' + (Math.ceil(id / 10) + 1)).css('display', 'block');
            }
            else
            {
                $('.chinchpokli' + (Math.ceil(id / 10))).css('display', 'block');
            }
        }
        else
        if (id % 10 == 1)
        {
            if (Math.ceil(id / 10) > 1)
            {
                $('.chinchpokli' + (Math.ceil(id / 10) - 1)).css('display', 'block');
            }
            else {
                $('.chinchpokli' + (Math.ceil(id / 10))).css('display', 'block');
            }
        }

        else
        {

            $('.chinchpokli' + (Math.ceil(id / 10))).css('display', 'block');

        }

    });




</script>

<script>
    $(function () {
        $('a[href="#search"]').on('click', function (event) {
            event.preventDefault();
            $('#search').addClass('open');
            $('#search > form > input[type="search"]').focus();
        });

        $('#search, #search button.close').on('click keyup', function (event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open');
            }
        });
        $('#search button.close i').click(function () {
            $('#search').removeClass('open');
        });


        //Do not include! This prevents the form from submitting for DEMO purposes only!
        $('form').submit(function (event) {
            event.preventDefault();
            return false;
        })
    });

</script>


