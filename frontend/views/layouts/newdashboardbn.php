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

</style>
   <body class="dash_background">

 <section class="navigation">
     <nav class="navbar navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
    <div class="mobile_nav_icon Visible-xs hidden-sm hidden-md hidden-lg">
        <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell bell_nav" aria-hidden="true"></i><span class="label label-primary">3</span></a>
          <ul class="dropdown-menu icon_bar_menu nav_drpmnu">
          <li><p>0pending notifications</p></li>
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-open envelop_nav" aria-hidden="true"></i><span class="label label-primary">7</span></a>
          <ul class="dropdown-menu icon_bar_menu nav_drpmnu">
          <li><p>You have 0 New Messages</p><a href="#" class="view_all_menu">view all</a></li>
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar calender_nav" aria-hidden="true"></i><span class="label label-primary">5</span></a>
          <ul class="dropdown-menu icon_bar_menu nav_drpmnu">
          <li><p>You have 0 pending tasks</p> <a href="#" class="view_all_menu">view all</a></li>
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
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
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SELLER <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/creates']) ?>">Add Property</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellor']) ?>">Manage Property</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">KYC Documents Upload</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LESSOR <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/create']) ?>">Add Property</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lessor']) ?>">Manage Property</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">KYC Documents Upload</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LESSEE <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/search']) ?>">Search Property</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>">KYC Documents Upload</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>">Shortlist Property</a></li>
          </ul>
        </li>

<!--        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BROKER <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
          </ul>
        </li>
        <li><a href="#">CONTACT US</a></li> -->
      </ul>
     </div>
      <div class="col-md-4 col-sm-8 hidden-xs icon_navbar_top">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell bell_nav" aria-hidden="true"></i><span class="label label-primary">3</span></a>
          <ul class="dropdown-menu icon_bar_menu">
          <li><p>0pending notifications</p></li>
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-open envelop_nav" aria-hidden="true"></i><span class="label label-primary">7</span></a>
          <ul class="dropdown-menu icon_bar_menu">
          <li><p>You have 0 New Messages</p><a href="#" class="view_all_menu">view all</a></li>
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar calender_nav" aria-hidden="true"></i><span class="label label-primary">5</span></a>
          <ul class="dropdown-menu icon_bar_menu">
          <li><p>You have 0 pending tasks</p> <a href="#" class="view_all_menu">view all</a></li>
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user user_nav" aria-hidden="true"></i></a>
          <ul class="dropdown-menu">             
                <li><?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
						if($checkrole->item_name == "Company_user"){
						?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/copostlogin']) ?>">
                       <?php } else { ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>"><?php } ?><i class="fa fa-user"></i> My Profile </a></li>
                
                <li> <a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>"><i class="fa fa-file"></i> My Documents </a></li>
                
                <li> <a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>"><i class="fa fa-envelope-open"></i> Change Password</a></li>
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
 <div class="container-fluid">
    <section id="">
        <div class="container-fluid">
          <div class="row">
            
          </div>
        </div>
    </section>
    <section class="main_content">
      <div class="container-fluid"> 
          <div class="row">
          <div class="col-sm-3 col-sm-offset-0 text-center logo_div">
            <a href="#">
              <img src="<?= Url::to('@web/dashimages') ?>/logo.png" alt=".." title="...">
            </a>
          </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-md-3 sidebar">
            <div class="mini-submenu col-sm-4">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
                
                <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
                                                if($checkrole->item_name == "Company_user"){
                                                    $dashboard = Yii::$app->urlManager->createUrl(['site/couserdash']);                                                    
                                                }else{
                                                    
                                                   $dashboard = Yii::$app->urlManager->createUrl(['site/userdash']); 
                                                }  ?>
                
                
             <div class="col-sm-8 detail_cont" style="">
              <div class="col-sm-2 col-xs-1" style="padding: 0;">
               <ul>   
                <li><a href="<?php echo $dashboard; ?>" class="list_n_hide">
                    <img src="<?= Url::to('@web/dashimages') ?>/dashboard.png" data-toggle="tooltip" data-placement="right" title="DASHBOARD">
                </a></li>
                  
                  
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/bankdetails']) ?>" class="list_n_hide">
                    <img src="<?= Url::to('@web/dashimages') ?>/bank.png" data-toggle="tooltip" data-placement="right" title="BANK&nbsp;DETAILS">
                </a></li>
                  
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>" class="list_n_hide">
                    <img src="<?= Url::to('@web/dashimages') ?>/document.png" data-toggle="tooltip" data-placement="right" title="DOCUMENTS">
                </a></li>
                
                <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
       if(($checkrole->item_name == "buyerplus") || ($checkrole->item_name == "sellerplus") || ($checkrole->item_name == "tenantplus") || ($checkrole->item_name == "lessorplus")) { ?>   
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/bid']) ?>" class="list_n_hide">
                    <img src="<?= Url::to('@web/dashimages') ?>/bid.png" data-toggle="tooltip" data-placement="right" title="BID">
                </a></li>
                 <?php } ?> 
                  
<!--                <a href="#" class="list_n_hide">
                    <img src="<?= Url::to('@web/dashimages') ?>/add_user.png" data-toggle="tooltip" data-placement="right" title="ADD&nbsp;SUBUSER">
                </a>-->
                  
                  
                <li class="short_listul"><a href="#" class="list_n_hide">
                    <img src="<?= Url::to('@web/dashimages') ?>/shortlist.png" data-toggle="tooltip" data-placement="right" title="SHORTLIST"> 
                </a></li>
                <li class="short_list"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>" class="list_n_hide"><i class="fa fa-angle-right" style="font-size: 25px" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="As&nbsp;Lessee"></i></a></li>
                  <li class="short_list"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index1']) ?>" class="list_n_hide"><i class="fa fa-angle-right" style="font-size: 26px" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="As&nbsp;Buyer"></i></a></li>
                  
                  
<!--                 <a href="#" class="list_n_hide">
                    <i class="fa fa-cog" data-toggle="tooltip" data-placement="right" title="SETTING"></i> 
                </a> -->
                  
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
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/bankdetails']) ?>" class="list-group-item">
                Bank Details
                </a></li>
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>" class="list-group-item">
                Documents
                </a></li>
                    
                <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
       if(($checkrole->item_name == "buyerplus") || ($checkrole->item_name == "sellerplus") || ($checkrole->item_name == "tenantplus") || ($checkrole->item_name == "lessorplus")) { ?>    
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(['common/bid']) ?>" class="list-group-item">
                Bid <span class="badge">14</span>
                </a></li>                    
                <?php } ?> 
                    
                    
<!--                <a href="#" class="list-group-item">
                Add Subuser <span class="badge">14</span>
                </a>-->


                <li class="short_listul"><a href="#" class="list-group-item">
                Shortlist
                </a></li>
                <li class="short_list"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>" class="list-group-item">&nbsp; &nbsp; &nbsp; &nbsp;As Lessee</a></li>
                  <li class="short_list"><a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index1']) ?>" class="list-group-item">&nbsp; &nbsp; &nbsp; &nbsp;As Buyer</a></li>
<!--                 <a href="#" class="list-group-item">
                 Setting <span class="badge">14</span>
                </a>-->
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
</div>
<?php $this->endContent(); ?>
       
 <script type="text/javascript">
    var $logo = $('.navbar-fixed-top');
          $(document).scroll(function() {
              $logo.css({background: $(this).scrollTop()>50 ? "#525252":"transparent"});
          });
      $(document).ready(function(){
          $(".short_listul").click(function(){
              $(".short_list").slideToggle("slow");
          });
      });
    </script>
    <script type="text/javascript">
          $(function(){
            $(".dropdown").hover(            
                    function() {
                        $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                        $(this).toggleClass('open');            
                    },
                    function() {
                        $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                        $(this).toggleClass('open');               
                    });
            });
    </script>
    <script type="text/javascript">
      $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

         
      jQuery(document).ready(function() {
          $(".mini-submenu").click(function(){
            //$("#slider").slideToggle('slow');
             $(".list-group").fadeToggle('fast');
             //({
                    //    width: "toggle"
                   // });
          });
        });
    </script> 
</body>
</html>