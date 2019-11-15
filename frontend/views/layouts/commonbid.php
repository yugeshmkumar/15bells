<?php
/**
 * @var $this yii\web\View
 */
use frontend\assets\AfterloginAsset;
use frontend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$bundle = AfterloginAsset::register($this);
?>
<?php $this->beginContent('@frontend/views/layouts/base6.php'); ?>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="">
                        <img src="<?= Url::to('@web/img') ?>/logo.png" style="width:50%;margin-top:0px;margin-left:8px;" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN MEGA MENU -->
                <!-- DOC: Remove "hor-menu-light" class to have a horizontal menu with theme background instead of white background -->
                <!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) in the responsive menu below along with sidebar menu. So the horizontal menu has 2 seperate versions -->
                <div class="hor-menu   hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
                        <li class="classic-menu-dropdown">
                            <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true"> BUYERS
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-left">
<!--							<li>
                                    <a href="">
                                        <i class="fa fa-clock-o"></i> Coming Soon..</a>
                                </li>-->
							
							<!--
-->                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['buyeraction/search']) ?>">
                                        <i class="fa fa-bookmark-o"></i> Search Property </a>
                                </li>
                               <!-- <li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['buyeraction/myescrow']) ?>">
                                        <i class="fa fa-user"></i> My Escrow Account
										</a>
                                </li>-->
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">
                                        <i class="fa fa-puzzle-piece"></i> KYC Documents Uploads </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['buyeraction/index']) ?>">
                                        <i class="fa fa-gift"></i> Shortlist Property </a>
                                </li>
                                <!--<li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['buyeraction/bidpdetails']) ?>">
                                        <i class="fa fa-table"></i> bid Property Details </a>
                                </li>
								<li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['buyeraction/schedulevisit']) ?>">
                                        <i class="fa fa-table"></i> Schedule Site Visit </a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="javascript:;">
                                        <i class="fa fa-envelope-o"></i> Customer Support </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:;"> Support for Lawyer </a>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a href="javascript:;"> Support for homeloan </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="index.html"> Any Others </a>
                                        </li>
                                       
                                    </ul>
                                </li>-->
                            </ul>
                        </li>
                      <li class="classic-menu-dropdown">
                            <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true"> SELLERS
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-left">
<!--							<li>
                                    <a href="">
                                        <i class="fa fa-clock-o"></i> Coming Soon..</a>
                                </li>-->
							
							<!--
-->                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/creates']) ?>">
                                        <i class="fa fa-bookmark-o"></i> Add Property </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellor']) ?>">
                                        <i class="fa fa-user"></i> Manage Property </a>
                                </li>
                               <!-- <li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/sellor']) ?>">
                                        <i class="fa fa-puzzle-piece"></i> View Property </a>
                                </li>-->
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">
                                        <i class="fa fa-gift"></i> KYC Documents Upload </a>
                                </li>
                                <!--<li>
                                     <a href="<?//php echo Yii::$app->urlManager->createUrl(['selleraction/index']) ?>">
                                        <i class="fa fa-table"></i> My Escrow Account</a>
                                </li>
								 <li>
                                     <a href="<?//php echo Yii::$app->urlManager->createUrl(['selleraction/index']) ?>">
                                        <i class="fa fa-table"></i> Upload Property Document</a>
                                </li>
                               <!-- <li class="dropdown-submenu">
                                    <a href="javascript:;">
                                        <i class="fa fa-envelope-o"></i> Customer Support </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:;"> Support for Lawyer </a>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a href="javascript:;"> Any Other </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>-->
                            </ul>
                        </li>
                             <li class="classic-menu-dropdown">
                            <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true"> LESSOR
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li>
                                  <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/create']) ?>">
                                     <i class="fa fa-bookmark-o"></i> Add Property </a>
                                </li>
                                <li>
                                   <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lessor']) ?>">
                                     <i class="fa fa-user"></i> Manage Property</a>
                                </li>

                                <!--<li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/lessor']) ?>">
                                      <i class="fa fa-puzzle-piece"></i> View Property </a>
                                </li>-->
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">
                                      <i class="fa fa-gift"></i>KYC Documents Upload </a>
                                </li>
                               <!-- <li>
                                   <a href="<?//php echo Yii::$app->urlManager->createUrl(['lessoraction/myescrow']) ?>">
                                      <i class="fa fa-table"></i> My Escrow Account </a>
                                </li>
								 <li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['lessoraction/addrfp']) ?>">
                                        <i class="fa fa-table"></i>  Add RFP & Request to lessee </a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="javascript:;">
                                        <i class="fa fa-envelope-o"></i> Customer Support </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:;"> Support for Lawyer </a>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a href="javascript:;"> Any Others </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </li>-->
                            </ul>
                        </li> 
						<li class="classic-menu-dropdown">
                            <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true"> LESSEE
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/search']) ?>">
                                        <i class="fa fa-bookmark-o"></i> Search Property</a>
                                </li>
                                <!--<li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>">
                                        <i class="fa fa-user"></i> Push Your Requirement </a>
                                </li>-->

                                <li>
                                     <a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">
                                        <i class="fa fa-puzzle-piece"></i>KYC Documents Upload </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>">
                                        <i class="fa fa-gift"></i> Shortlist Property </a>
                                </li>
                                <!--<li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>">
                                        <i class="fa fa-table"></i> My Escrow Account </a>
                                </li>-->
								<!--<li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>">
                                        <i class="fa fa-table"></i> Bid Property Details </a>
                                </li>
								<li>
                                    <a href="<?//php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>">
                                        <i class="fa fa-table"></i> Schedule Site Visit </a>
                                </li>
								
                                <li class="dropdown-submenu">
                                    <a href="javascript:;">
                                        <i class="fa fa-envelope-o"></i> Customer Support </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:;"> Support for Lawyer </a>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a href="javascript:;"> Any Other </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                                <li>
                                                    <a href="index.html"> Third level link </a>
                                                </li>
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </li>-->
                            </ul>
                        </li>		
						<!--<li class="classic-menu-dropdown">
                            <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true"> BROKERS
                                <i class="fa fa-angle-down"></i>
                            </a>
                          
                        </li>
						                        <li class="classic-menu-dropdown">
                            <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true"> CONTACT US
                                <i class="fa fa-angle-down"></i>
                            </a>
                          
                        </li>-->
                    </ul>
                </div>
                <!-- END MEGA MENU -->
                <!-- BEGIN HEADER SEARCH BOX -->
                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
               
                <!-- END HEADER SEARCH BOX -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
				 <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
						<?php  $countuserprofileprogress = \common\models\MyProfileProgressStatus::find()
										->join('LEFT OUTER JOIN','bells_notifications',
										'bells_notifications.process_name = my_profile_progress_status.process_name')
										->where(['my_profile_progress_status.user_id'=>yii::$app->user->identity->id,'my_profile_progress_status.active'=>1,'my_profile_progress_status.process_status'=>"100"])->count();
											?>
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
								<?php if($countuserprofileprogress) { ?> <span class="badge badge-default"><?php echo $countuserprofileprogress ?></span> <?php } else { ?> <span class="badge badge-default"> 0 </span> <?php } ?>
                                
                            </a>
							
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
									<?php  $countuserprofileprogress = \common\models\MyProfileProgressStatus::find()
										->join('LEFT OUTER JOIN','bells_notifications',
										'bells_notifications.process_name = my_profile_progress_status.process_name')
										->where(['my_profile_progress_status.user_id'=>yii::$app->user->identity->id,'my_profile_progress_status.active'=>1,'my_profile_progress_status.process_status'=>"100"])->count();
											?>
									<span class="bold"><?php if($countuserprofileprogress) { ?><?php echo $countuserprofileprogress ?><?php } else { ?>0<?php } ?>pending</span> notifications</h3>
                             </li>
							       <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <?php 
										$arrfindall = \common\models\BellsNotifications::find()->where(['isactive'=>1])->orderBy('id desc')->all();
										foreach($arrfindall as $findalllist){
										$userprofileprogress = \common\models\MyProfileProgressStatus::find()->where(['user_id'=>yii::$app->user->identity->id,'active'=>1,'process_name'=>"$findalllist->process_name",'process_status'=>"100"])->one();
										if($userprofileprogress){
										?>

									   <li>
                                            <a href="">
                                               <i class="fa fa-check"></i> <?php echo  $findalllist->descr ?>
										</a>
                                        </li>
										<?php } ?><?php } ?>
                                     
                                    
                 </ul>
                        </li></ul>
                        </li>
                        <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default"> 0 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">0 New</span> Messages</h3>
                                    <a href="">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                              
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <span class="badge badge-default"> 0 </span>
                            </a>
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">0 pending</span> tasks</h3>
                                    <a href="">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                               
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?=Url::to('@web/img') ?>/anonymous.png" />
                                <span class="username username-hide-on-mobile"> <?php echo Yii::$app->user->identity->username ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                               <li>
								<?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
						if($checkrole->item_name == "Company_user"){
						?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/copostlogin']) ?>">
                       <?php } else { ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>"><?php } ?>
                                    
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
								<li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">
                                        <i class="fa fa-file"></i> My Documents </a>
                                </li>
                               <!-- <li>
                                    <a href="">
                                        <i class="fa fa-credit-card"></i> My Quick Request 
										</a>
                                </li>-->
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>">
                                        <i class="icon-envelope-open"></i> Change Password
                                        
                                    </a>
                                </li>
                               
                                <li class="divider"> </li>
                               
                                <li>
								 <?php echo Html::a(Yii::t('frontend', '<i class="icon-key"></i> Log Out'), ['/user/sign-in/logout'], ['data-method' => 'post']) ?>

                                  
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed hidden-sm hidden-xs" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item start">
						<?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
						if($checkrole->item_name == "Company_user"){
						?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/couserdash']) ?>" class="nav-link nav-toggle">
                       <?php } else { ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/userdash']) ?>" class="nav-link nav-toggle"><?php } ?>
							<i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
						 <li class="nav-item">
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['common/bankdetails']) ?>" class="nav-link nav-toggle">
                                <i class="fa fa-tasks"></i>
                                <span class="title">Bank Details</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
						 <li class="nav-item">
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>" class="nav-link nav-toggle">
                                <i class="fa fa-bar-chart"></i>
                                <span class="title">Documents</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>  <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
						if(($checkrole->item_name == "buyerplus") || ($checkrole->item_name == "sellerplus") || ($checkrole->item_name == "tenantplus") || ($checkrole->item_name == "lessorplus")) { ?>
						<li class="nav-item">
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['common/bid']) ?>" class="nav-link nav-toggle">
                                <i class="fa fa-legal"></i>
                                <span class="title">Bid</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
						<?php } ?>
                        
                        <!--<li class="nav-item">
                            <a href="<?//php echo Yii::$app->urlManager->createUrl(['common/addsubuser']) ?>" class="nav-link nav-toggle">
                                <i class="fa fa-legal"></i>
                                <span class="title">Add Subusers</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>-->
						 <li class="nav-item">
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>" class="nav-link nav-toggle">
                                <i class="fa fa-search"></i>
                                <span class="title">Shortlist</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
						<!--<li class="nav-item">
                            <a href="<?//php echo Yii::$app->urlManager->createUrl(['common/settings']) ?>" class="nav-link nav-toggle">
                                <i class="fa fa-cog"></i>
                                <span class="title">Settings</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>-->
						<li class="nav-item">
                            <?php echo Html::a(Yii::t('frontend', '<i class="icon-key"></i><span class="title">Log Out</span><span class="arrow"></span>'), ['/user/sign-in/logout'], ['data-method' => 'post']) ?>

                        </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                   
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <section class="content">
                <?php if (Yii::$app->session->hasFlash('alert')):?>
                    <?php echo \yii\bootstrap\Alert::widget([
                        'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                        'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                    ])?>
                <?php endif; ?>
                <?php echo $content ?>
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
</div></div>

<?php $this->endContent(); ?>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
         
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
               <!-- BEGIN FOOTER -->
 <?php include 'footerLayout.php'; ?>  