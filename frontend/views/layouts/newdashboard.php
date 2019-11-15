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

NewdashboardAsset::register($this);

$a =  Url::current();

$ab = explode('15bells.com/',$a);

$url = $ab[0];
//echo $url;die;


$userrolesd = yii::$app->user->identity->user_login_as;

$urlsd =   Yii::getAlias('@frontendUrl');
?>
<?php $this->beginContent('@frontend/views/layouts/base9.php'); ?>
   

<body class="fixed-nav sticky-footer body_bg" id="page-top">

<?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
                                                if($checkrole->item_name == "Company_user"){
                                                    $dashboard = Yii::$app->urlManager->createUrl(['site/couserdash']);
                                                    $profilelink = yii::$app->urlManager->createUrl(['site/copostlogin']);                                                      
                                                }else{
                                                    
                                                   $dashboard = Yii::$app->urlManager->createUrl(['site/userdash']); 
                                                   $profilelink = yii::$app->urlManager->createUrl(['site/postlogin']);  
                                                }  ?>



  <!-- Navigation-->
  <input type="hidden" id="user_role" value="<?php echo $checkrole->item_name; ?>">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark neela_bg fixed-top" id="mainNav">
    <a class="navbar-brand logo_nav" href="<?php echo $dashboard ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/logo1.png';  ?>" width="55" class=""></a>
    <button class="navbar-toggler navbar-toggler-right margin_toggl" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav sidenav-toggler">
        
      </ul>
      <ul class="navbar-nav navbar-sidenav dash_sidenav" id="exampleAccordion">
		<li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
        <li class="nav-item <?php  if($url == '/site/couserdash' || $url == '/site/userdash') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" onclick="ga('send', 'event', 'Left menu Userdash Dashboard', 'Userdash Dashboard', 'Userdash Dashboard','Userdash Dashboard')" href="<?php echo $dashboard; ?>">
            <i class="fa fa-tachometer"></i>
            <span class="nav-link-text">Dashboard <b>( <?php  $userids = yii::$app->user->identity->id;
                echo 'UID'.$userids * 23 * 391;?> )</b></span>
          </a>
        </li>
                                                
      <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
         
            <i class="fa fa-fw fa-area-chart"></i>
            <span id="userrole" class="nav-link-text"><b>Search</b></span>
          
        </li>-->
        
        <?php 
         if($checkrole->item_name == "Company_user"){  ?> 
        <li class="nav-item buyer <?php  if($url == '/useriphone/index') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link"  href="<?php echo Yii::$app->urlManager->createUrl(['useriphone']) ?>">
            <i class="fa fa-tachometer"></i>
            <span class="nav-link-text">Sub User </span>
          </a>
        </li>
         <?php } ?>
        <li class="nav-item buyer <?php  if($url == '/buyeraction/search') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Buyer Search', 'Buyer Search', 'Buyer Search','Buyer Search')" href="<?php echo Yii::$app->urlManager->createUrl(['buyeraction/search']) ?>">
            <i class="fa fa-fw fa-search"></i>
            <span class="nav-link-text">Search</span>
          </a>
        </li>
        
        <?php 
         if($checkrole->item_name != "Company_user"){  ?>     
     
        <li class="nav-item buyer <?php  if($url == '/sellor-expectations/buyer') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Buyer Expectations', 'Buyer Expectations', 'Buyer Expectations','Buyer Expectations')" href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/buyer']) ?>">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
        </li>
         <?php } ?>

            <?php 
         if($checkrole->item_name == "Company_user"){  ?>  
        <li class="nav-item buyer" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse <?php if($url == '/sellor-expectations/buyer' || $url == '/sellor-expectations/expectationsindexbuyer'){ echo ''; } else {echo 'collapsed'; }?>" data-toggle="collapse" href="#collapseComponentsb" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
          <ul class="sidenav-second-level sub_menuu collapse <?php if($url == '/sellor-expectations/buyer' || $url == '/sellor-expectations/expectationsindexbuyer' ){ echo 'show'; } else {echo ''; }?>" id="collapseComponentsb">
            <li class="<?php  if($url == '/sellor-expectations/buyer') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/buyer']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">My Expectation</span></a>
            </li>
            <li class="<?php  if($url == '/sellor-expectations/expectationsindexbuyer') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/expectationsindexbuyer']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Sub Users Expectations</span></a>
            </li>
          </ul>
        </li>

         <?php } ?>

          <?php 
         if($checkrole->item_name != "Company_user"){  ?>  
        <li class="nav-item buyer <?php  if($url == '/lesseeaction/index1') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Buyer Shortlist', 'Buyer Shortlist', 'Buyer Shortlist','Buyer Shortlist')" href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index1']) ?>">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Shortlist</span>
          </a>
        </li>
         <?php } ?>
        <?php if($checkrole->item_name == "Company_user"){  ?>  

        <li class="nav-item buyer" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse <?php if($url == '/lesseeaction/index1' || $url == '/lesseeaction/shortlistindexbuyer'){ echo ''; } else {echo 'collapsed'; }?>" data-toggle="collapse" href="#short_lst" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Shortlist</span>
          </a>
          <ul class="sidenav-second-level sub_menuu collapse  <?php if($url == '/lesseeaction/index1' || $url == '/lesseeaction/shortlistindexbuyer' ){ echo 'show'; } else {echo ''; }?>" id="short_lst">
            <li class="<?php  if($url == '/lesseeaction/index1') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index1']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">My Shortlist</span></a>
            </li>
            <li class="<?php  if($url == '/lesseeaction/shortlistindexbuyer') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/shortlistindexbuyer']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Sub Users Shortlist</span></a>
            </li>
          </ul>
        </li>
        <?php } ?>
        
     <!-----Lessee menu---->
     <?php 
         if($checkrole->item_name == "Company_user"){  ?> 
        <li class="nav-item lessee <?php  if($url == '/useriphone') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link"  href="<?php echo Yii::$app->urlManager->createUrl(['useriphone']) ?>">
            <i class="fa fa-tachometer"></i>
            <span class="nav-link-text">Sub User </span>
          </a>
        </li>
         <?php } ?>
	  <li class="nav-item lessee <?php  if($url == '/lesseeaction/search') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Lessee search', 'Lessee search', 'Lessee search','Lessee search')" href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/search']) ?>">
            <i class="fa fa-fw fa-search"></i>
            <span class="nav-link-text">Search</span>
          </a>
        </li>
        <?php 
         if($checkrole->item_name != "Company_user"){  ?>   
        <li class="nav-item lessee <?php  if($url == '/lessor-expectations/lessee') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Lessee Expectations', 'Lessee Expectations', 'Lessee Expectations','Lessee Expectations')" href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/lessee']) ?>">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
        </li>
         <?php } ?>

          <?php 
         if($checkrole->item_name == "Company_user"){  ?>  
        <li class="nav-item lessee" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse <?php if($url == '/lessor-expectations/lessee' || $url == '/lessor-expectations/expectationsindexlessee'){ echo ''; } else {echo 'collapsed'; }?>" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
          <ul class="sidenav-second-level sub_menuu collapse <?php if($url == '/lessor-expectations/lessee' || $url == '/lessor-expectations/expectationsindexlessee' ){ echo 'show'; } else {echo ''; }?>" id="collapseComponents">
            <li class="<?php  if($url == '/lessor-expectations/lessee') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/lessee']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">My Expectation</span></a>
            </li>
            <li class="<?php  if($url == '/lessor-expectations/expectationsindexlessee') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/expectationsindexlessee']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Sub Users Expectations</span></a>
            </li>
          </ul>
        </li>

         <?php } ?>

            
        <?php 
         if($checkrole->item_name != "Company_user"){  ?>  
        <li class="nav-item lessee  <?php  if($url == '/lesseeaction/index') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Lessee Shortlistproperty', 'Lessee Shortlistproperty', 'Lessee Shortlistproperty','Lessee Shortlistproperty')" href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Shortlist</span>
          </a>
        </li>
         <?php } ?>
        <?php 
         if($checkrole->item_name == "Company_user"){  ?>  
        
        <li class="nav-item lessee" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse <?php if($url == '/lesseeaction/index' || $url == '/lesseeaction/shortlistindexlessee'){ echo ''; } else {echo 'collapsed'; }?>" data-toggle="collapse" href="#shortlst_lessee" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Shortlist</span>
          </a>
          <ul class="sidenav-second-level sub_menuu collapse <?php if($url == '/lesseeaction/index' || $url == '/lesseeaction/shortlistindexlessee' ){ echo 'show'; } else {echo ''; }?>" id="shortlst_lessee">
            <li class="<?php  if($url == '/lesseeaction/index') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">My Shortlist</span></a>
            </li>
            <li class="<?php  if($url == '/lesseeaction/shortlistindexlessee') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['lesseeaction/shortlistindexlessee']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Sub Users Shortlist</span></a>
            </li>
          </ul>
        </li>
         <?php } ?>
       
    <!------lessee menu end----->
    <!-------Seller------------>
        <li class="nav-item seller <?php  if($url == '/addproperty/creates') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Seller Addproperty', 'Seller Addproperty', 'Seller Addproperty','Seller Addproperty')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/creates']) ?>">
            <i class="fa fa-plus"></i>
            <span class="nav-link-text">Add Property</span>
          </a>
        </li>
        
        <li class="nav-item seller <?php  if($url == '/addproperty/sellorview') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Seller Viewproperty', 'Seller Viewproperty', 'Seller Viewproperty','Seller Viewproperty')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellorview']) ?>">
            <i class="fa fa-street-view"></i>
            <span class="nav-link-text">View Property</span>
          </a>
        </li>
       
        <li class="nav-item seller <?php  if($url == '/addproperty/sellor') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Seller Manageproperty', 'Seller Manageproperty', 'Seller Manageproperty','Seller Manageproperty')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/sellor']) ?>">
            <i class="fa fa-map-marker"></i>
            <span class="nav-link-text">Manage Property</span>
          </a>
        </li>
        <li class="nav-item seller <?php  if($url == '/sellor-expectations/sellor') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Seller Expectations', 'Seller Expectations', 'Seller Expectations','Seller Expectations')" href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/sellor']) ?>">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
        </li>
    
    
        <li class="nav-item lessor <?php  if($url == '/addproperty/create') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Lessor Addproperty', 'Lessor Addproperty', 'Lessor Addproperty','Lessor Addproperty')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/create']) ?>">
            <i class="fa fa-plus"></i>
            <span class="nav-link-text">Add Property</span>
          </a>
        </li>
    
        <li class="nav-item lessor <?php  if($url == '/addproperty/lesview') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Lessor Viewproperty', 'Lessor Viewproperty', 'Lessor Viewproperty','Lessor Viewproperty')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lesview']) ?>">
            <i class="fa fa-street-view"></i>
            <span class="nav-link-text">View Property</span>
          </a>
        </li>
    
        <li class="nav-item lessor <?php  if($url == '/addproperty/lessor') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Lessor Manageproperty', 'Lessor Manageproperty', 'Lessor Manageproperty','Lessor Manageproperty')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/lessor']) ?>">
            <i class="fa fa-map-marker"></i>
            <span class="nav-link-text">Manage Property</span>
          </a>
        </li>
        <li class="nav-item lessor <?php  if($url == '/lessor-expectations/lessor') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Lessor Expectations', 'Lessor Expectations', 'Lessor Expectations','Lessor Expectations')" href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/lessor']) ?>">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
        </li>
        <?php 
         if($checkrole->item_name != "Company_user"){  ?> 
        <li class="nav-item buyer <?php  if($url == '/request-sitevisit/index') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Buyer Sitevisit', 'Buyer Sitevisit', 'Buyer Sitevisit','Buyer Sitevisit')" href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit']) ?>">
            <i class="fa fa-headphones"></i>
            <span class="nav-link-text">Site Visit</span>
          </a>
        </li>
         <?php } ?>
        <?php 
         if($checkrole->item_name == "Company_user"){  ?>  
        
        <li class="nav-item buyer" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse <?php if($url == '/request-sitevisit/index' || $url == '/request-sitevisit/requestsitevisitindex'){ echo ''; } else {echo 'collapsed'; }?>" data-toggle="collapse" href="#site_vist" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Site Visit</span>
          </a>
        
          <ul class="sidenav-second-level sub_menuu collapse <?php if($url == '/request-sitevisit/index' || $url == '/request-sitevisit/requestsitevisitindex' ){ echo 'show'; } else {echo ''; }?>" id="site_vist">
            <li class="<?php  if($url == '/request-sitevisit/index') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">My Site Visit</span></a>
            </li>
            <li class="<?php  if($url == '/request-sitevisit/requestsitevisitindex') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit/requestsitevisitindex']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Sub Users Site Visit</span></a>
            </li>
          </ul>
        </li>
         <?php } ?>

        <li class="nav-item buyer" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Online Site Visit', 'Online Site Visit', 'Online Site Visit','Online Site Visit')" href="https://live.15bells.com/" target="_blank">
            <i class="fa fa-headphones"></i>
            <span class="nav-link-text">Online Site Visit</span>
          </a>
        </li>
        <?php 
         if($checkrole->item_name != "Company_user"){  ?> 
        <li class="nav-item lessee <?php  if($url == '/request-sitevisit/index') echo 'active'; ?>" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" onclick="ga('send', 'event', 'Lessee Sitevisit', 'Lessee Sitevisit', 'Lessee Sitevisit','Lessee Sitevisit')" href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit']) ?>">
            <i class="fa fa-headphones"></i>
            <span class="nav-link-text">Site Visit</span>
          </a>
        </li>
         <?php } ?>
        <?php 
         if($checkrole->item_name == "Company_user"){  ?>  
      
        <li class="nav-item lessee" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse <?php if($url == '/request-sitevisit/index' || $url == '/request-sitevisit/requestsitevisitindex'){ echo ''; } else {echo 'collapsed'; }?>" data-toggle="collapse" href="#lessee_sitevst" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Site Visit</span>
          </a>
          <ul class="sidenav-second-level sub_menuu collapse <?php if($url == '/request-sitevisit/index' || $url == '/request-sitevisit/requestsitevisitindex' ){ echo 'show'; } else {echo ''; }?>" id="lessee_sitevst">
            <li class="<?php  if($url == '/request-sitevisit/index') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">My Site Visit</span></a>
            </li>
            <li class="<?php  if($url == '/request-sitevisit/requestsitevisitindex') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['request-sitevisit/requestsitevisitindex']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Sub Users Site Visit</span></a>
            </li>
          </ul>
        </li>
         <?php } ?>
        <li class="nav-item lessee" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Online Site Visit', 'Online Site Visit', 'Online Site Visit','Online Site Visit')" href="https://live.15bells.com/" target="_blank">
            <i class="fa fa-headphones"></i>
            <span class="nav-link-text">Online Site Visit</span>
          </a>
        </li>
        <?php 
         if($checkrole->item_name != "Company_user"){  ?>  
        <li class="nav-item buyer <?php  if($url == '/documentshow/index') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Document Show', 'Document Show', 'Document Show','Document Show')" href="<?php echo Yii::$app->urlManager->createUrl(['documentshow']) ?>">
            <i class="fa fa-file-text"></i>
            <span class="nav-link-text">Documents Show</span>
          </a>
        </li>
         <?php } ?>
        <?php 
         if($checkrole->item_name == "Company_user"){  ?>  
        
        <li class="nav-item buyer" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse <?php if($url == '/documentshow/index' || $url == '/documentshow/documentshowindex'){ echo ''; } else {echo 'collapsed'; }?>" data-toggle="collapse" href="#documnt_shw" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Documents Show</span>
          </a>
          <ul class="sidenav-second-level sub_menuu collapse <?php if($url == '/documentshow/index' || $url == '/documentshow/documentshowindex' ){ echo 'show'; } else {echo ''; }?>" id="documnt_shw">
            <li class="<?php  if($url == '/documentshow/index') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['documentshow']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">My Documents Show</span></a>
            </li>
            <li class="<?php  if($url == '/documentshow/documentshowindex') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['documentshow/documentshowindex']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Sub Users Documents Show</span></a>
            </li>
          </ul>
        </li>
         <?php } ?>
         <?php 
         if($checkrole->item_name != "Company_user"){  ?>  
        <li class="nav-item lessee <?php  if($url == '/documentshow/index') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" onclick="ga('send', 'event', 'Document Show', 'Document Show', 'Document Show','Document Show')" href="<?php echo Yii::$app->urlManager->createUrl(['documentshow']) ?>">
            <i class="fa fa-file-text"></i>
            <span class="nav-link-text">Documents Show</span>
          </a>
        </li>
        
      
         <?php } ?>
         <?php 
         if($checkrole->item_name == "Company_user"){  ?>  
          <li class="nav-item lessee" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse <?php if($url == '/documentshow/index' || $url == '/documentshow/documentshowindex'){ echo ''; } else {echo 'collapsed'; }?>" data-toggle="collapse" href="#lessee_dcmtshw" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Documents Show</span>
          </a>
          <ul class="sidenav-second-level collapse sub_menuu <?php if($url == '/documentshow/index' || $url == '/documentshow/documentshowindex' ){ echo 'show'; } else {echo ''; }?>" id="lessee_dcmtshw">
            <li class="<?php  if($url == '/documentshow/index') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['documentshow']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">My Documents Show</span></a>
            </li>
            <li class="<?php  if($url == '/documentshow/documentshowindex') echo 'active' ?>">
              <a href="<?php echo Yii::$app->urlManager->createUrl(['documentshow/documentshowindex']) ?>"><i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Sub Users Documents Show</span></a>
            </li>
          </ul>
        </li>
         <?php } ?>
        <li class="nav-item <?php  if($url == '/banknew/create') echo 'active' ?>" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" onclick="ga('send', 'event', 'Userdash Bank Details', 'My Bank Details', 'My Bank Details','My Bank Details')" href="<?php echo Yii::$app->urlManager->createUrl(['banknew/create']) ?>">
            <i class="fa fa-bank"></i>
            <span class="nav-link-text">Bank details</span>
          </a>
        </li>
        
        
       </ul> 
     
      <ul class="navbar-nav ml-auto nav_pd">
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu left_noti" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li> -->





       <li class="nav-item dropdown">
          <a onclick="updateNotify(0)" class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <span id="notif" style="display:none;"></span>
            </span>
          </a>
          <div class="dropdown-menu left_noti" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>

           <?php
            $userid = Yii::$app->user->identity->id;
            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s');   
            $baseurl =  Yii::getAlias('@frontendUrl');

            //  Get notifications of profile done

            $sqlstr1 = "select count(*) as countr from notifications where item_id=$userid and item_name='Profile'";
            $data1 = \Yii::$app->db->createCommand($sqlstr1)->queryAll();

    if($data1[0]['countr'] == '0'){
            $getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
            //echo '<pre>';print_r($getprofilestatus);die;
            if(!$getprofilestatus){
              Yii::$app->db->createCommand()->insert('notifications', [
                'item_name' => 'Profile',
                'item_id' => Yii::$app->user->identity->id,
                'link' => $profilelink,
                'description'=>'Please update your profile  details Lorem Ipsum Dimsums ejects urecka. ',
                'date' => $date,
            ])->execute();
           
          }
        }
           //  Get notifications of profile done End



           //  Get notifications of Documents done

           $sqlstr1 = "select count(*) as countr from notifications where item_id=$userid and item_name='KYC_Documents'";
           $data1 = \Yii::$app->db->createCommand($sqlstr1)->queryAll();

   if($data1[0]['countr'] == '0'){
           $getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_KYC_upload");
           //echo '<pre>';print_r($getprofilestatus);die;
           if(!$getprofilestatus){
             Yii::$app->db->createCommand()->insert('notifications', [
               'item_name' => 'KYC_Documents',
               'item_id' => Yii::$app->user->identity->id,
               'link' => $baseurl.'/common/documents',
               'description'=>'Please upload your KYC documents Lorem Ipsum Dimsums ejects urecka.',
               'date' => $date,
           ])->execute();
          
         }
       }
          //  Get notifications of documents done End



           //  Get notifications of Bank details done

           $sqlstr1 = "select count(*) as countr from notifications where item_id=$userid and item_name='Bankdetails'";
           $data1 = \Yii::$app->db->createCommand($sqlstr1)->queryAll();

   if($data1[0]['countr'] == '0'){
           $getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_bank");
           //echo '<pre>';print_r($getprofilestatus);die;
           if(!$getprofilestatus){
             Yii::$app->db->createCommand()->insert('notifications', [
               'item_name' => 'Bankdetails',
               'item_id' => Yii::$app->user->identity->id,
               'link' => $baseurl.'/banknew/create',
               'description'=>'Please update your bank details Lorem Ipsum Dimsums ejects urecka.',
               'date' => $date,
           ])->execute();
          
         }
       }
          //  Get notifications of documents Bank details  End

?>
            <div id="appendnotifications">

            </div>



           
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="<?php echo $baseurl.'/notifications'; ?>">View all alerts</a>
          </div>
        </li>





        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            <span class="d-lg-none">Working as
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="">
          
            
            <?php

             $getstatusbuyer = \common\models\Dashboardroleaggrement::getStatusbuyer(Yii::$app->user->identity->id);
             $getstatusseller = \common\models\Dashboardroleaggrement::getStatusseller(Yii::$app->user->identity->id);

                            if ($getstatusbuyer != 1) {
                              $firstName = '"buyer"';
                              $lastName = '"seller"';
                            	
                   echo "<a class='dropdown-item dash_red'  onclick='getaggrementbuyer($firstName)' href='#'><span class='text-success'><strong>Buyer</strong></span></a>";         	
                   echo "<a class='dropdown-item dash_red'  onclick='getaggrementbuyer($lastName)' href='#'><span class='text-success'><strong>Seller</strong></span></a>";         	

                            } else {
                            	
                   echo "<a class='dropdown-item dash_red' id='drop_buyer'  href='#'><span class='text-success'><strong>Buyer</strong></span></a>";         	
                   echo "<a class='dropdown-item dash_red' id='drop_seller'  href='#'><span class='text-success'><strong>Seller</strong></span></a>";         	                   
                            }
                            
                            
                            if ($getstatusseller != 1) {
                              $firstsName = '"lessee"';
                              $lastsName = '"lessor"';
                            	
                   echo "<a class='dropdown-item dash_red'  onclick='getaggrementseller($firstsName)' href='#'><span class='text-success'><strong>Lessee</strong></span></a>";         	
                   echo "<a class='dropdown-item dash_red'  onclick='getaggrementseller($lastsName)' href='#'><span class='text-success'><strong>Lessor</strong></span></a>";         	

                            } else {
                            	
                   echo "<a class='dropdown-item dash_red' id='drop_lessee'  href='#'><span class='text-success'><strong>Lessee</strong></span></a>";         	
                   echo "<a class='dropdown-item dash_red' id='drop_lessor'  href='#'><span class='text-success'><strong>Lessor</strong></span></a>";         	                   
                            }
            ?>
            
            <input type="hidden" id="getrolesed" style="display:none;" value="<?php  echo $userrolesd; ?>">
           <input type"hidden" id="buyeraggrementstatus"  style="display:none;" value="<?php  echo $getstatusbuyer; ?>">
           <input type"hidden" id="selleraggrementstatus"  style="display:none;" value="<?php echo  $getstatusseller; ?>">
            
          </div>
        </li>
        <!--<li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" id="userrole" href="">
            <i class="fa fa-fw fa-user"></i>Your role is </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo Yii::$app->urlManager->createUrl(['/user/sign-in/logout']) ?>">
            <i class="fa fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper body_bg">
<?php echo $content ?>
 	</div>
	<?php $this->endContent(); ?>
	

	<?php
$getagreementb = \common\models\Aggrementmgmt::find()->where('roleid =:roleid and eventname =:eventname and ispublish =:publish and isactive =:active', array(':roleid' => 7, ':eventname' => "Buyer_Lessee", ':publish' => 1, ':active' => 1))->one();
//print_r($getagreementb);die;
?>
<style>
.modal-backdrop
{
    opacity:0.5 !important;
}

.agreeclass{
  top:10%;

}
.close{position:absolute;right:25px;}
</style>
<div class="modal  bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog agreeclass modal-lg" >
        <div class="modal-content modal_scroll">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <input type="hidden" id="usersrole">
                <h4 class="modal-title"> <?php
                    if ($getagreementb) {
                        echo $getagreementb->subject;
                    }
                    ?></h4>
            </div>
            <div class="modal-body"><?php
                if ($getagreementb) {
                    echo $getagreementb->content;
                } else {
                    ?> Agreement Expired! <?php } ?></div>
            <div class="modal-footer">
                <button type="button" onclick="agreeebuyer()" class="btn btn-success">I Agree</button>
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div> </div>
    
           
    
    
    <?php
$getagreements = \common\models\Aggrementmgmt::find()->where('roleid =:roleid and eventname =:eventname and ispublish =:publish and isactive =:active', array(':roleid' => 6, ':eventname' => "Seller_Lessor", ':publish' => 1, ':active' => 1))->one();
?>
<div class="modal bs-modal-lg" id="large1" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog agreeclass modal-lg">
        <div class="modal-content modal_scroll">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"> <?php
                    if ($getagreements) {
                        echo $getagreements->subject;
                    }
                    ?></h4>
            </div>
            <div class="modal-body"><?php
                if ($getagreements) {
                    echo $getagreements->content;
                } else {
                    ?> Agreement Expired! <?php } ?></div>
            <div class="modal-footer">
                <button type="button" onclick="agreeeseller()" class="btn btn-success">I Agree</button>
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div> </div>
	
	

  <!-- Modal popup after registration  -->

<div class="modal  bs-modal-lg" id="large2" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog agreeclass modal-lg" >
        <div class="modal-content modal_scroll">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <input type="hidden" id="usersrole">
                <h4 class="modal-title"> <?php
                    if ($getagreementb) {
                        echo $getagreementb->subject;
                    }
                    ?></h4>
            </div>
            <div class="modal-body"><?php
                if ($getagreementb) {
                    echo htmlspecialchars_decode($getagreementb->content);
                } else {
                    ?> Agreement Expired! <?php } ?></div>
            <div class="modal-footer">
                <button type="button" onclick="agreeebuyer()" class="btn btn-success">I Agree</button>
                

            </div>
        </div>
        <!-- /.modal-content -->
    </div> </div>




    <div class="modal bs-modal-lg" id="large3" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog agreeclass modal-lg">
        <div class="modal-content modal_scroll">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"> <?php
                    if ($getagreements) {
                        echo $getagreements->subject;
                    }
                    ?></h4>
            </div>
            <div class="modal-body"><?php
                if ($getagreements) {
                    echo htmlspecialchars_decode($getagreements->content);
                } else {
                    ?> Agreement Expired! <?php } ?></div>
            <div class="modal-footer">
                <button type="button" onclick="agreeeseller()" class="btn btn-success">I Agree</button>
                

            </div>
        </div>
        <!-- /.modal-content -->
    </div> </div>

             <!-- Modal popup after registration End -->

 
<script>
$(document).ready(function(){
   $(document).click(function(){
      $(".nav-link").addClass('collapsed'); 
      $(".sub_menuu").removeClass('show'); 
    });
});
</script>
<script>

var urlsd = "<?php echo $urlsd; ?>";




function getaggrementbuyer(user) {
   
   $('#usersrole').val(user);
   $('#large').modal('show');


}
function getaggrementseller(user) {

  $('#usersrole').val(user);
   $('#large1').modal('show');

}

function agreeebuyer() {

var usersroles = $('#usersrole').val();
 var user_role = $('#user_role').val();
  $.ajax({
      url: '/site/acceptbuyer',
      data: {accept : '1' },
      success: function (data) {
         if(data == '1'){
              $('#large').modal('hide');

              if(usersroles =='buyer' ){
$(".seller").hide();
$(".lessor").hide();
$(".lessee").hide();
$(".buyer").show();

var buyer = 'buyer';    
getuserloginas(buyer);
              }


              if(usersroles =='seller' ){
$(".seller").show();
$(".lessor").hide();
$(".lessee").hide();
$(".buyer").hide();

var seller = 'seller';   
getuserloginas(seller);
              }

               
              
              window.setTimeout(function(){
                if(user_role != 'Company_user'){

window.location.href = urlsd +'/site/userdash';
}else{
window.location.href = urlsd +'/site/couserdash';
}

                }, 2000);

             // window.location.reload();
         }
      },
  });
}

function agreeeseller() {

var usersroles = $('#usersrole').val();
var user_role = $('#user_role').val();
  $.ajax({
      url: '/site/acceptseller',
      data: {accept : '1' },
      success: function (data) {
         if(data == '1'){
              $('#large1').modal('hide');

              
              if(usersroles =='lessee' ){
$(".seller").hide();
$(".lessor").hide();
$(".lessee").show();
$(".buyer").hide();

var lessee = 'lessee';   
getuserloginas(lessee);
              }




               if(usersroles =='lessor' ){
$(".seller").hide();
$(".lessor").show();
$(".lessee").hide();
$(".buyer").hide();

var lessor = 'lessor';   
getuserloginas(lessor);
              }
              
              window.setTimeout(function(){
                if(user_role != 'Company_user'){

window.location.href = urlsd +'/site/userdash';
}else{
window.location.href = urlsd +'/site/couserdash';
}

                }, 2000);
              

              //window.location.reload();
         }
      },
  });
}

function setuserloginas(){
            
            $.ajax({
                                                       type: "POST",
                                                       url: '/site/setuserloginas',
                                                       data: {},
                                                       success: function (data) {
                              var datas = data.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                  });
                                                        $('#userrole').html('<i class="fa fa-user user_i"></i>Your Role : '+  datas);
                                                       if(data == 'buyer'){
                                                         //alert(data);
      
      
                                                           
                                                          $(".seller").hide();
                                                          $(".lessor").hide();
                                                          $(".lessee").hide();
                                                          $(".buyer").show(); 
                                                       }
                                                       if(data == 'seller'){
                                                           
                                                           $(".seller").show();
                                                           $(".lessor").hide();
                                                           $(".lessee").hide(); 
                                                           $(".buyer").hide(); 
                                                        }
                                                        if(data == 'lessor'){
                                                           
                                                           $(".seller").hide();
                                                           $(".lessor").show();
                                                           $(".lessee").hide(); 
                                                           $(".buyer").hide(); 
                                                        }
                                                        if(data == 'lessee'){
                                                           
                                                           $(".seller").hide();
                                                           $(".lessor").hide();
                                                           $(".lessee").show();
                                                           $(".buyer").hide();  
                                                        }
      
                                                       },
                                                   });
      
          }



         
           




 function getuserloginas(user) {
    
                                      
                                            
    $.ajax({
        type: "POST",
        url: '/site/getuserloginas',
        data: {user: user},
        success: function (data) {
      
       
        if(data == '1'){
            var datas = user.toLowerCase().replace(/\b[a-z]/g, function(letter) {
return letter.toUpperCase();
});
           $('#userrole').html('<i class="fa fa-user user_i"></i>Your Role : '+  datas);
        toastr.success('Successfully Saved '+ user +' role ','success');    
        }else{
           toastr.error('Internal Error','error');    
                }
        },
    });

}





 var user_role = $('#user_role').val();
		$("#drop_buyer").click(function(){
      
			$(".seller").hide();
		$(".lessor").hide();
		$(".lessee").hide();
		$(".buyer").show();

    var buyer = 'buyer';    
    getuserloginas(buyer);
   

                window.setTimeout(function(){
                  if(user_role != 'Company_user'){

window.location.href = urlsd +'/site/userdash';
}else{
window.location.href = urlsd +'/site/couserdash';
}

                }, 2000);

 
    

		});
    




		$("#drop_lessee").click(function(){
			$(".seller").hide();
		$(".lessor").hide();
		$(".lessee").show();
		$(".buyer").hide();

    var lessee = 'lessee';   
    getuserloginas(lessee);
    window.setTimeout(function(){
      if(user_role != 'Company_user'){

window.location.href = urlsd +'/site/userdash';
}else{
window.location.href = urlsd +'/site/couserdash';
}

                }, 2000);
		});






		$("#drop_seller").click(function(){
			$(".seller").show();
		$(".lessor").hide();
		$(".lessee").hide();
		$(".buyer").hide();

    var seller = 'seller';   
    getuserloginas(seller);
    window.setTimeout(function(){
      if(user_role != 'Company_user'){

window.location.href = urlsd +'/site/userdash';
}else{
window.location.href = urlsd +'/site/couserdash';
}

                }, 2000);
		});






		$("#drop_lessor").click(function(){
     
			$(".seller").hide();
		$(".lessor").show();
		$(".lessee").hide();
		$(".buyer").hide();

    var lessor = 'lessor';   
    getuserloginas(lessor);
    window.setTimeout(function(){
      if(user_role != 'Company_user'){

window.location.href = urlsd +'/site/userdash';
}else{
window.location.href = urlsd +'/site/couserdash';
}

                }, 2000);
		});


	$(document).ready(function(){


        var getrolesed =   $('#getrolesed').val();
         var buyeraggrementstatus =   $('#buyeraggrementstatus').val();
          var selleraggrementstatus =  $('#selleraggrementstatus').val();
// alert(getrolesed);
// alert(buyeraggrementstatus);
// alert(selleraggrementstatus);
           
    if(getrolesed == 'buyer' || getrolesed == 'seller'){

      if(buyeraggrementstatus != '1'){
        

         $('#large2').modal('show');
         $('#large2').modal('hide'); 
         $('#large2').data('bs.modal',null);

		$('#large2').modal({backdrop:'static', keyboard:false});
      }


    }

    if(getrolesed == 'lessee' || getrolesed == 'lessor'){

if(selleraggrementstatus != '1'){
 
   $('#large3').modal('show');
   $('#large3').modal('hide'); 
   $('#large3').data('bs.modal',null);
$('#large3').modal({backdrop:'static', keyboard:false});
}


}


	//	$("#myModal").modal('show');
	//	$('#myModal').modal('hide'); 
//$('#myModal').data('bs.modal',null);
		//$('#myModal').modal({backdrop:'static', keyboard:false});

 


//  $(".dash_red").click(function(){

//    if(user_role != 'Company_user'){
//   window.location.href = "https://staging.15bells.com/frontend/web/site/userdash";
//                     }else{
//                      window.location.href = "https://staging.15bells.com/frontend/web/site/couserdash";
//                     }
//  });

    

    setuserloginas();

		

   setInterval(function(){notification();}, 2000);

  });


                              function DisplayCurrentTime (time) {
                                // Check correct time format and split into components
                                time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

                                if (time.length > 1) { // If time format correct
                                  time = time.slice (1);  // Remove full string match value
                                  time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
                                  time[0] = +time[0] % 12 || 12; // Adjust hours
                                }
                                return time.join (''); // return adjusted time or original string
                              }





                                function updateNotify(id) {
                                        var url      = window.location.href;   
                                        var pathname = window.location.pathname;

                                        //alert(url);alert(pathname);

                                        $(".dropdown-menu left_noti show").load(url);

                                        $.ajax({
                                        type: "POST",
                                        url: '/site/setnotifications',
                                        data: {notify: id},
                                        success: function (datas) {
                                          //alert(datas);
                                        $('#notif').html('');
                                        $('#appendnotifications').html('');
                                        $("#notif").css("display","none");
                                        var obj = $.parseJSON(datas);

                                          $.each(obj, function () {


                                        // var dates = date("h:i A", strtotime(this.date));
                                       var dates =  this.date;

                                          $('#appendnotifications').append(
                                            '<div class="dropdown-divider divider_cs"></div>'+
                                        '<a onclick="changecolour('+this.id+')" target="_blank" class="dropdown-item'+ ((this.viewed != '1') ? ' notif_drp' : ' notif_drpseen')+'" id="notiflink_'+this.id+'" href="' + this.link + '">'+
                                          '<span class="text-success">'+
                                            '<strong id="notifitemname">' + this.item_name + ' Update</strong>'+
                                          '</span>'+
                                          '<span class="small float-right text-muted" id="notifdate">'+ dates +'</span>'+
                                          '<div class="dropdown-message small" id="notifdescription">'+this.description+'</div>'+
                                        '</a>');


                                          });

                                        },
                                        });
                                        

                                }






                                          function notification()
                                          {

                                                  $.ajax({
                                                  type: "POST",
                                                  url: "/site/getnotifications",	                
                                                  cache: false,
                                                  success: function (data)
                                                  {


                                                  var json = $.parseJSON(data);

                                                  if(json >0)
                                                  {	                  	 
                                                  $("#notif").html(json);
                                                  $("#notif").css("display","block");

                                                  }
                                                  else 
                                                  {
                                                  $('#notif').html('');
                                                  $("#notif").css("display","none");

                                                  }

                                                  },


                                                  });
                                          }


                                        function changecolour(id){

                                              $.ajax({
                                              type: "POST",
                                              url: "/site/changecolour",
                                              data: {id: id},	                
                                              cache: false,
                                              success: function (data)
                                              {

                                              $('#notiflink_'+id).removeClass('row repeat_notif').addClass('row notif_seen');


                                              },


                                              });

                                        }


 
		
	
</script>




     
</body>
</html>
