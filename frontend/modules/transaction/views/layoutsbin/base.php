<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<header>
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@storageUrl/img/logo.png', ['alt' => Yii::$app->name, 'class' => 'img-responsive']),
        /* Yii::$app->name, */
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-inverse navbar-fixed-top opaque-navbar',
        ],
    ]);
    ?>
    <?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right', 'id' => 'bs-example-navbar-collapse-1'],
        'items' => !empty(Yii::$app->view->params['customMenu']) ? Yii::$app->view->params['customMenu'] :
                [
            ['label' => Yii::t('frontend', 'HOME'), 'url' => ['/site/index'], 'active' => false],
            ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible' => Yii::$app->user->isGuest, 'active' => false]
                ]
    ]);
    ?>
<?php NavBar::end(); ?>
</header>
<?php echo $content ?>

<section id="fotter">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin: 40px 0px 40px 0px;">
                <div class="col-md-8">
                    <?=Html::img("@storageUrl/img/footer.png",['class'=>"img-responsive", 'alt'=>"..."])?> <br>
                    <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. proident, sunt in culpa qui officia .</P><br>
                    <button type="button" class="btn btn-default"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; &nbsp;READ MORE...</button>
                </div>
                <div class="col-md-4">
                    <h2>CONTACT US</h2><br>
                    <P><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp; &nbsp;HOUSE NO. 40 100 FT ROAD, GHITORNI</P>
                    <P><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp;+91 - 9953300349</P>
                    <h1>
                        <ul class="social-network social-circle">

                            <li><a href="#" class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="icoTwitter" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </h1>
                    <div class="clearfix"></div>
                    <p><button type="button" class="btn btn-default"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; &nbsp;CONTACT FORM</button></p>


                </div>
            </div>

        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin: 20px 0px 10px 0px;">
                <p> © <?php echo date('Y') ?> ALL RIGHTS RESERVED. POWERED BY <B><a href="#">IPISTIS</a></B></p>
            </div>
        </div>
    </div>
</footer>
<?php $this->endContent() ?>