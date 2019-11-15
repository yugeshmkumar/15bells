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
use yii\widgets\Breadcrumbs;

//NewdashboardAsset::register($this);
$bundle = NewdashboardAsset::register($this);
?>
<?php $this->beginContent('@frontend/views/layouts/base9.php'); ?>

<style>
    .btn-group>.dropdown-menu:before, .dropdown-toggle>.dropdown-menu:before, .dropdown>.dropdown-menu:before {
        position: absolute;
        top: -8px;
        right: ;
        /* right: auto; */
        display: inline-block!important;
        border-right: 8px solid transparent;
        border-bottom: 8px solid #ffffff;
        border-left: 8px solid transparent;
        content: '';
        left: 85%;
    }
    .btn-group>.dropdown-menu:after, .dropdown-toggle>.dropdown-menu:after, .dropdown>.dropdown-menu:after{
        display:none !important;
    }

    .notify-drop {
        min-width: 330px !important;
        background-color: #fff;
        min-height: 360px;
        max-height: 360px;
    }
    .notify-drop .notify-drop-title {
        border-bottom: 1px solid #e2e2e2;
        padding: 5px 15px 10px 15px;
    }
    .notify-drop .drop-content {
        min-height: 280px;
        max-height: 280px;
        overflow-y: scroll;
    }
    .notify-drop .drop-content::-webkit-scrollbar-track
    {
        background-color: #F5F5F5;
    }

    .notify-drop .drop-content::-webkit-scrollbar
    {
        width: 8px;
        background-color: #F5F5F5;
    }

    .notify-drop .drop-content::-webkit-scrollbar-thumb
    {
        background-color: #ccc;
    }
    .notify-drop .drop-content > li {
        border-bottom: 1px solid #e2e2e2;
        padding: 10px 0px 5px 0px;
    }
    .notify-drop .drop-content > li:nth-child(2n+0) {
        background-color: #fafafa;
    }
    .notify-drop .drop-content > li:after {
        content: "";
        clear: both;
        display: block;
    }
    .notify-drop .drop-content > li:hover {
        background-color: #fcfcfc;
    }
    .notify-drop .drop-content > li:last-child {
        border-bottom: none;
    }
    .notify-drop .drop-content > li .notify-img {
        float: left;
        display: inline-block;
        width: 45px;
        height: 45px;
        margin: 0px 0px 8px 0px;
    }
    .notify-drop .allRead {
        margin-right: 7px;
    }
    .notify-drop .rIcon {
        float: right;
        color: #999;
    }
    .notify-drop .rIcon:hover {
        color: #333;
    }
    .notify-drop .drop-content > li a {
        font-size: 12px;
        font-weight: normal;
    }
    .notify-drop .drop-content > li {
        font-weight: bold;
        font-size: 11px;
    }
    .notify-drop .drop-content > li hr {
        margin: 5px 0;
        width: 70%;
        border-color: #e2e2e2;
    }
    .notify-drop .drop-content .pd-l0 {
        padding-left: 0;
    }
    .notify-drop .drop-content > li p {
        font-size: 11px;
        color: #666;
        font-weight: normal;
        margin: 3px 0;
    }
    .notify-drop .drop-content > li p.time {
        font-size: 10px;
        font-weight: 600;
        top: -6px;
        margin: 8px 0px 0px 0px;
        padding: 0px 3px;
        border: 1px solid #e2e2e2;
        position: relative;
        background-image: linear-gradient(#fff,#f2f2f2);
        display: inline-block;
        border-radius: 2px;
        color: #B97745;
    }
    .notify-drop .drop-content > li p.time:hover {
        background-image: linear-gradient(#fff,#fff);
    }
    .notify-drop .notify-drop-footer {
        border-top: 1px solid #e2e2e2;
        bottom: 0;
        position: relative;
        padding: 8px 15px;
    }
    .notify-drop .notify-drop-footer a {
        color: #777;
        text-decoration: none;
    }
    .notify-drop .notify-drop-footer a:hover {
        color: #333;
    }

</style>
<body style="">
    <?php
    $countuserprofileprogress = \common\models\MyProfileProgressStatus::find()
                    ->join('LEFT OUTER JOIN', 'bells_notifications', 'bells_notifications.process_name = my_profile_progress_status.process_name')
                    ->where(['my_profile_progress_status.user_id' => yii::$app->user->identity->id, 'my_profile_progress_status.active' => 1, 'my_profile_progress_status.process_status' => "100"])->count();
    ?>
    <section class="navigation">
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="mobile_nav_icon Visible-xs hidden-sm hidden-md hidden-lg">

                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell bell_nav" aria-hidden="true"></i><span class="label label-primary">3</span></a>
                            <ul class="dropdown-menu icon_bar_menu nav_drpmnu">
                                <li><p>You have <?php if ($countuserprofileprogress) { ?> <?php echo $countuserprofileprogress ?> <?php } else { ?> 0 <?php } ?> pending notifications</p><a style="display:none;" href="#" class="view_all_menu">view all</a></li>
                                <?php
                                $arrfindall = \common\models\BellsNotifications::find()->where(['isactive' => 1])->orderBy('id desc')->all();
                                foreach ($arrfindall as $findalllist) {
                                    $userprofileprogress = \common\models\MyProfileProgressStatus::find()->where(['user_id' => yii::$app->user->identity->id, 'active' => 1, 'process_name' => "$findalllist->process_name", 'process_status' => "100"])->one();
                                    if ($userprofileprogress) {
                                        ?>

                                        <li>
                                            <a href="">
                                                <i class="fa fa-check"></i> <?php echo $findalllist->descr ?>
                                            </a>
                                        </li>
    <?php } ?><?php } ?>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-open envelop_nav" aria-hidden="true"></i><span class="label label-primary">0</span></a>
                            <ul class="dropdown-menu icon_bar_menu nav_drpmnu">
                                <li><p>You have 0 New Messages</p><a href="#" class="view_all_menu">view all</a></li>
                                <li><a href="#"></a></li>

                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar calender_nav" aria-hidden="true"></i><span class="label label-primary">0</span></a>
                            <ul class="dropdown-menu icon_bar_menu nav_drpmnu">
                                <li><p>You have 0 pending tasks</p> <a href="#" class="view_all_menu">view all</a></li>
                                <li><a href="#"></a></li>

                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user user_nav" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu nav_drpmnu">             
                                <li><a href="#"><i class="fa fa-user"></i> My Profile </a></li>
                                <li> <a href="#"><i class="fa fa-file"></i> My Documents </a></li>
                                <li> <a href="#"><i class="fa fa-envelope-open"></i> Change Password</a></li>
                                <li class="divider"> </li>              
                                <li><a href="#" data-method="post"><i class="fa fa-key"></i> Log Out</a></li>  
                            </ul>
                        </div>       
                    </div>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar icon_nav"></span>
                        <span class="icon-bar icon_nav"></span>
                        <span class="icon-bar icon_nav"></span> 
                    </button>

                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <div class="col-md-8 col-sm-8" style="z-index: 9;">
                        <ul class="nav navbar-nav navbar-right">  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BUYER <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['buyeraction/search']) ?>">Search Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">KYC Documents Upload</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index1']) ?>">Shortlist Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/buyer']) ?>">Buyer Expectations</a></li> 
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['banknew/create']) ?>">Bank Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SELLER <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/creates']) ?>">Add Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellorview']) ?>">View Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellor']) ?>">Manage Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">Documents Upload</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/sellor']) ?>">Seller Expectations</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['banknew/create']) ?>">Bank Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LESSOR <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/create']) ?>">Add Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lesview']) ?>">View Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lessor']) ?>">Manage Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">Documents Upload</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/lessor']) ?>">Lessor Expectations</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['banknew/create']) ?>">Bank Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LESSEE <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/search']) ?>">Search Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">KYC Documents Upload</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>">Shortlist Property</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/lessee']) ?>">Lessee Expectations</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['banknew/create']) ?>">Bank Details</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>

                    <div class="col-md-4 col-sm-8 hidden-xs icon_navbar_top">
                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell bell_nav" aria-hidden="true"></i><span class="label label-primary">3</span></a>
                                <ul class="dropdown-menu notify-drop">
                                    <div class="notify-drop-title">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">Bildirimler (<b>2</b>)</div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                                        </div>
                                    </div>
                                    <!-- end notify title -->
                                    <!-- notify content -->
                                    <div class="drop-content">
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>

                                                <hr>
                                                <p class="time">Şimdi</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                                                <p>Lorem ipsum sit dolor amet consilium.</p>
                                                <p class="time">1 Saat önce</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                                                <p>Lorem ipsum sit dolor amet consilium.</p>
                                                <p class="time">29 Dakika önce</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                                                <p>Lorem ipsum sit dolor amet consilium.</p>
                                                <p class="time">Dün 13:18</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                                                <p>Lorem ipsum sit dolor amet consilium.</p>
                                                <p class="time">2 Hafta önce</p>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="notify-drop-footer text-center">
                                        <a href=""><i class="fa fa-eye"></i> Tümünü Göster</a>
                                    </div>
                                </ul>
                            </li>




                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-open envelop_nav" aria-hidden="true"></i><span class="label label-primary">0</span></a>
                                <ul class="dropdown-menu icon_bar_menu">
                                    <li><p>You have 0 New Messages</p><a href="#" class="view_all_menu">view all</a></li>
                                    <li><a href="#"></a></li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar calender_nav" aria-hidden="true"></i><span class="label label-primary">0</span></a>
                                <ul class="dropdown-menu icon_bar_menu">
                                    <li><p>You have 0 pending tasks</p> <a href="#" class="view_all_menu">view all</a></li>
                                    <li><a href="#"></a></li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user user_nav" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">             
                                    <li><?php
                                        $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
                                        if ($checkrole->item_name == "Company_user") {
                                            ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/copostlogin']) ?>">
<?php } else { ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>"><?php } ?><i class="fa fa-user"></i> My Profile </a></li>

                                    <li> <a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>"><i class="fa fa-file"></i> My Documents </a></li>

                                    <li> <a href="<?php echo Yii::$app->urlManager->createUrl(['site/changepassword']) ?>"><i class="fa fa-envelope-open"></i> Change Password</a></li>
                                    <li class="divider"> </li>              
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['/user/sign-in/logout']) ?>" data-method="post"><i class="fa fa-key"></i> Log Out</a></li>  
                                </ul>
                            </li>       
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section id="">
        <div class="container-fluid">
            <div class="row">
                <ul class="cb-slideshow">
                    <li><span>Image 01</span></li>
                    <li><span>Image 02</span></li>
                    <li><span>Image 03</span></li>
                    <li><span>Image 04</span></li>
                    <li><span>Image 05</span></li>
                    <li><span>Image 06</span></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="main_content" >
        <div class="container-fluid" > 
            <div class="row">
                <div class="col-sm-3 col-sm-offset-0 text-center logo_div">
                    <a href="#">
                        <img src="<?= Yii::$app->request->baseUrl . '/frontimg/small.gif' ?>"  width="90" style="margin:0 auto;">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-3 sidebar">
                    <div class="mini-submenu col-sm-2 text-center">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>

                    <?php
                    $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
                    if ($checkrole->item_name == "Company_user") {
                        $dashboard = Yii::$app->urlManager->createUrl(['site/couserdash']);
                    } else {

                        $dashboard = Yii::$app->urlManager->createUrl(['site/userdash']);
                    }
                    ?>


                    <div class="col-sm-8 detail_cont" style="">
                        <div class="col-sm-2 col-xs-1 text-center" style="padding: 0;">
                            <ul>   
                                <li><a href="<?php echo $dashboard; ?>" class="list_n_hide">
                                        <img src="<?= Url::to('@web/dashimages') ?>/dashboard.png" data-toggle="tooltip" data-placement="right" title="DASHBOARD">
                                    </a></li>


                                <li class="short_listul"><a href="#" class="list_n_hide">
                                        <img src="<?= Url::to('@web/dashimages') ?>/shortlist.png" data-toggle="tooltip" data-placement="right" title="SHORTLIST"> 
                                    </a></li> 
                                <li class="short_list"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>" class="list_n_hide"><i class="fa fa-angle-right" style="font-size: 25px" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="As&nbsp;Lessee"></i></a></li>
                                <li class="short_list"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index1']) ?>" class="list_n_hide"><i class="fa fa-angle-right" style="font-size: 26px" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="As&nbsp;Buyer"></i></a></li>				
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit']) ?>" class="list_n_hide">
                                        <img src="<?= Url::to('@web/dashimages') ?>/site.png" data-toggle="tooltip" data-placement="right" title="SITE&nbsp;VISIT" style="width:27px !important;">
                                    </a></li> 			
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['documentshow']) ?>" class="list_n_hide">
                                        <img src="<?= Url::to('@web/dashimages') ?>/document.png" data-toggle="tooltip" data-placement="right" title="DOCUMENTS">
                                    </a></li> 			
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['request-emd']) ?>" class="list_n_hide">
                                        <img src="<?= Url::to('@web/dashimages') ?>/edm_ico.png" data-toggle="tooltip" data-placement="right" title="EMD">
                                    </a></li>			
                                <li><a href="#" class="list_n_hide">
                                        <img src="<?= Url::to('@web/dashimages') ?>/vr.png" data-toggle="tooltip" data-placement="right" title="VR&nbsp;Room" style="width:27px !important;">

                                    </a></li> 
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/bankdetails']) ?>" class="list_n_hide">
                                        <img src="<?= Url::to('@web/dashimages') ?>/bank.png" data-toggle="tooltip" data-placement="right" title="TRANSACTIONS">
                                    </a></li>


                                <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
                                if (($checkrole->item_name == "buyerplus") || ($checkrole->item_name == "sellerplus") || ($checkrole->item_name == "tenantplus") || ($checkrole->item_name == "lessorplus")) {
                                    ?>   
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/bid']) ?>" class="list_n_hide">
                                            <img src="<?= Url::to('@web/dashimages') ?>/bid.png" data-toggle="tooltip" data-placement="right" title="BID">
                                        </a></li>
<?php } ?> 



                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['/user/sign-in/logout']) ?>" class="list_n_hide">
                                        <i class="fa fa-sign-out" data-toggle="tooltip" data-placement="right" title="LOGOUT"></i>
                                    </a></li>
                            </ul> 
                        </div>


                        <div class="list-group col-sm-10 col-xs-11" style="padding: 0;">
                            <ul>    

                                <li><a href="<?php echo $dashboard; ?>" class="list-group-item">
                                        Dashboard
                                    </a></li>

                                <li class="short_listul"><a href="#" class="list-group-item">
                                        Shortlist
                                    </a></li>
                                <li class="short_list"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>" class="list-group-item">&nbsp; &nbsp; &nbsp; &nbsp;As Lessee</a></li>
                                <li class="short_list"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index1']) ?>" class="list-group-item">&nbsp; &nbsp; &nbsp; &nbsp;As Buyer</a></li>
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit']) ?>" class="list-group-item">
                                        Site Visit
                                    </a></li>
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['documentshow']) ?>" class="list-group-item">
                                        Documents
                                    </a></li>
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['request-emd']) ?>" class="list-group-item">
                                        EMD
                                    </a></li> 
                                <li><a href="#" class="list-group-item">
                                        VR Room
                                    </a></li>
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/transaction']) ?>" class="list-group-item">
                                        Transactions
                                    </a></li>

                                <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
                                if (($checkrole->item_name == "buyerplus") || ($checkrole->item_name == "sellerplus") || ($checkrole->item_name == "tenantplus") || ($checkrole->item_name == "lessorplus")) {
                                    ?>    
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/bid']) ?>" class="list-group-item">
                                            Bid <span class="badge">14</span>
                                        </a></li>                    
<?php } ?> 



                                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['/user/sign-in/logout']) ?>" class="list-group-item">
                                        LogOut
                                    </a></li>

                            </ul>
                        </div>  
                    </div>


                </div>
<?php echo $content ?>
            </div>
        </div>


    </section>
    <div class="row footer_link" id="footr_nav" style="background:#000;margin:0px !important;">		
        <div class="col-md-4" style="padding-top:5px;">
            <i class="fa fa-close clode_anim"></i>
            <p class="rights_resrv">© 2017 ALL RIGHTS RESERVED. POWERED BY <a href="#">Stoneray Technologies</a></p>
        </div>	
        <div class="col-md-5"> 
            <ul class="footer_mnu" style="padding-top:5px;padding-left:0 !important;">
                <li><a class="sliding-middle-out" href="<?= Yii::$app->homeUrl ?>">Home</a></li>
                <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">Buyer</a></li>
                <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a></li>
                <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a></li>
                <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a></li>
                <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("blogs") ?>">Blog</a></li>
                <li style="border-right:none !important;"><a class="sliding-middle-out" onclick="opencon()" style="cursor: pointer">Contact Us</a></li>
            </ul>
        </div>	
        <div class="col-md-3">
            <ul class="social_ic">
                <li><a href="https://www.facebook.com/15bells/" target="_blank"><i class="fa fa-facebook sc_icn"></i></a></li>
                <li><a href="https://twitter.com/15bells" target="_blank"><i class="fa fa-twitter sc_icn"></i></a></li>
                <li><a href="https://plus.google.com/u/0/101985235162687065074" target="_blank"><i class="fa fa-google-plus sc_icn"></i></a></li>
                <li><a href="https://nl.linkedin.com/company/15bells" target="_blank"><i class="fa fa-linkedin sc_icn"></i></a></li>
                <li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube sc_icn"></i></a></li>
            </ul>
        </div>

    </div> 
    <div class="social_btn text-center">
        <i class="fa fa-angle-left"></i>
    </div>
<?php $this->endContent(); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".clode_anim").click(function () {
                $(".footer_link").hide(100);
                $(".social_btn").show(1000);
            });
            $(".social_btn").click(function () {
                $(".footer_link").show(100);
                $(".social_btn").hide();
            });
        });
    </script>
    <script type="text/javascript">
        var $logo = $('.navbar-fixed-top');
        $(document).scroll(function () {
            $logo.css({background: $(this).scrollTop() > 50 ? "#525252" : "transparent"});
        });
        $(document).ready(function () {
            $(".short_listul").click(function () {
                $(".short_list").slideToggle("slow");
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(".dropdown").hover(
                    function () {
                        $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                        $(this).toggleClass('open');
                    },
                    function () {
                        $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                        $(this).toggleClass('open');
                    });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });


        jQuery(document).ready(function () {
            $(".mini-submenu").click(function () {

                $(".list-group").fadeToggle('fast');

            });
        });
    </script> 
</body>
</html>