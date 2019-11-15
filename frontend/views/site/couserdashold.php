<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;

$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
$userprofile = \common\models\UserProfile::find()->where(['user_id' => $userid])->one();
$userprofileex = \common\models\UserProfileEx::find()->where(['user_id' => $userid])->one();
$myprofile = \common\models\Myprofile::find()->where(['userID' => $userid])->one();
?>
<?php
$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
if ($getprofilestatus) {
    $count = $getprofilestatus->process_status;
} else {
    $count = 0;
}

$getprofilestatus1 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_KYC_approval");
if ($getprofilestatus1) {
    $count1 = $getprofilestatus1->process_status;
} else {
    $count1 = 0;
}
$getprofilestatus2 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_expectations");
if ($getprofilestatus2) {
    $count2 = $getprofilestatus2->process_status;
} else {
    $count2 = 0;
}
$getprofilestatus3 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_bank");
if ($getprofilestatus3) {
    $count3 = $getprofilestatus3->process_status;
} else {
    $count3 = 0;
}
?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="">Home</a>
                    <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>User</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>My Dashboard</span>
        </li>
    </ul>

</div>
<!-- end breadcrumb -->
<!-- start Upper section -->
<br/>
<!-- END PAGE HEADER-->
<?php
$getstatus = \common\models\MyProfileProgressStatus::getStatus(Yii::$app->user->identity->id);
 if ($getstatus != 1) {
    ?>


<div class="row">
   <div class="alert alert-block alert-warning fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                         <h4 class="alert-heading">Attention!</h4>
                                        <p> You Need to fill your Profile First. </p>
                                        <p>
                                            <a class="btn red" <?php
$checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
if ($checkrole->item_name == "Company_user") {
    ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/copostlogin']) ?>">
<?php } else { ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>"><?php } ?> My Profile </a>
                                           
                                        </p>
                                    </div> 
    
</div> 

 <?php } else{ ?>
    
<div class="row">

    <div class="col-md-6">
        <div class="form-group form-md-radios form-md-floating-label">
            <label>I am a</label>
            <div class="md-radio-inline">
                
                <div class="md-radio">
                    <input type="radio" id="radio6" name="radio2" value="radio6" class="md-radiobtn" >
                    <label for="radio6">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Buyer</label>
                </div>
                
                <div class="md-radio">
                    <input type="radio" id="radio7" name="radio2" value="radio7" class="md-radiobtn">
                    <label for="radio7">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Seller</label>
                </div>

                

                <div class="md-radio">
                    <input type="radio" id="radio8" name="radio2"  value="radio8" class="md-radiobtn">
                    <label for="radio8">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Lessor </label>
                </div>
                <div class="md-radio">
                    <input type="radio" id="radio9" name="radio2" value="radio9" class="md-radiobtn">
                    <label for="radio9">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Lessee </label>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php } ?>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<?php
$checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
if ($checkrole->item_name == "Company_user") {
    ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/copostlogin']) ?>">
<?php } else { ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>"><?php } ?>
                <div class="dashboard-stat2 " style="background:rgba(235, 248, 249, 0.59);">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="7800"></span>
                                <small class="font-green-sharp"></small>
                            </h3>
                            <small>MY PROFILE</small>
                        </div>
                        <div class="icon">
                            <i class="icon-user" style="color:#78a1d8"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress" style="background:rgba(235, 248, 249, 0.59);">
                            <span style="width: <?php echo $count ?>%;" class="progress-bar progress-bar-success green-sharp">
                                <span class="sr-only">100 % progress</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> progress </div>
                            <div class="status-number"> <?php echo $count ?>% </div>
                        </div>
                    </div>
                </div></a>
    </div>
    
    
    <?php
 $getstatus11 = \common\models\MyProfileProgressStatus::getStatus(Yii::$app->user->identity->id);
 if ($getstatus11 == 1) {
    ?>

    <div id="norole">
    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="documnt" style="pointer-events: none;">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/documents']) ?>"> <div class="dashboard-stat2 "style="background:rgba(249, 226, 226, 0.62);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349"></span>
                        </h3>
                        <small>MY DOCUMENTS</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file" style="color:#e63a48"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: <?php echo $count1 ?>%;" class="progress-bar progress-bar-success red-haze">

                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="expectations" style="pointer-events: none;">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/lessoraction/addrfp']) ?>"> <div class="dashboard-stat2 "style="background:rgba(219, 226, 253, 0.61);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="567"></span>
                        </h3>
                        <small>MY EXPECTATIONS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-basket"style="color:#372ae4"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width:;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"></div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="banks" style="pointer-events: none;">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/bankdetails']) ?>"><div class="dashboard-stat2 " style="background:rgba(227, 211, 255, 0.68);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="276"></span>
                        </h3>
                        <small>	MY BANK DETAILS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-user"style="color:#b023c7"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
    </div>
    <div id="sellerrole">
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="documnt">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/documents']) ?>"> <div class="dashboard-stat2 "style="background:rgba(249, 226, 226, 0.62);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349"></span>
                        </h3>
                        <small>SELLER DOCUMENTS</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file" style="color:#e63a48"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: <?php echo $count1 ?>%;" class="progress-bar progress-bar-success red-haze">

                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="expectations">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/lessoraction/addrfp']) ?>"> <div class="dashboard-stat2 "style="background:rgba(219, 226, 253, 0.61);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="567"></span>
                        </h3>
                        <small>SELLER EXPECTATIONS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-basket"style="color:#372ae4"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width:;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"></div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="banks">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/bankdetails']) ?>"><div class="dashboard-stat2 " style="background:rgba(227, 211, 255, 0.68);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="276"></span>
                        </h3>
                        <small>	SELLER BANK DETAILS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-user"style="color:#b023c7"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="banks">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/selleraction/schedulevisit']) ?>"><div class="dashboard-stat2 " style="background:rgba(227, 211, 255, 0.68);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="276"></span>
                        </h3>
                        <small>ADD PROPERTY</small>
                    </div>
                    <div class="icon">
                        <i class="icon-user"style="color:#b023c7"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
        
        
    </div>
    <div id="buyerrole">
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="documnt">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/documents']) ?>"> <div class="dashboard-stat2 "style="background:rgba(249, 226, 226, 0.62);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349"></span>
                        </h3>
                        <small>BUYER DOCUMENTS</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file" style="color:#e63a48"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: <?php echo $count1 ?>%;" class="progress-bar progress-bar-success red-haze">

                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="expectations">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/buyeraction/search']) ?>"> <div class="dashboard-stat2 "style="background:rgba(219, 226, 253, 0.61);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="567"></span>
                        </h3>
                        <small>SEARCH PROPERTY</small>
                    </div>
                    <div class="icon">
                        <i class="icon-basket"style="color:#372ae4"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width:;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"></div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="banks">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/bankdetails']) ?>"><div class="dashboard-stat2 " style="background:rgba(227, 211, 255, 0.68);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="276"></span>
                        </h3>
                        <small>	BUYER BANK DETAILS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-user"style="color:#b023c7"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
        
        
    </div>
    
    <div id="lessorrrole">
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="documnt">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/documents']) ?>"> <div class="dashboard-stat2 "style="background:rgba(249, 226, 226, 0.62);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349"></span>
                        </h3>
                        <small>LESSOR DOCUMENTS</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file" style="color:#e63a48"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: <?php echo $count1 ?>%;" class="progress-bar progress-bar-success red-haze">

                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="expectations">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/lessoraction/addrfp']) ?>"> <div class="dashboard-stat2 "style="background:rgba(219, 226, 253, 0.61);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="567"></span>
                        </h3>
                        <small>LESSOR EXPECTATIONS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-basket"style="color:#372ae4"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width:;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"></div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="banks">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/bankdetails']) ?>"><div class="dashboard-stat2 " style="background:rgba(227, 211, 255, 0.68);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="276"></span>
                        </h3>
                        <small>	LESSOR BANK DETAILS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-user"style="color:#b023c7"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="banks">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/lessoraction/index']) ?>"><div class="dashboard-stat2 " style="background:rgba(227, 211, 255, 0.68);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="276"></span>
                        </h3>
                        <small>ADD PROPERTY</small>
                    </div>
                    <div class="icon">
                        <i class="icon-user"style="color:#b023c7"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
        
        
    </div>
    
    <div id="lesseerole">
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="documnt">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/documents']) ?>"> <div class="dashboard-stat2 "style="background:rgba(249, 226, 226, 0.62);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349"></span>
                        </h3>
                        <small>LESSEE DOCUMENTS</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file" style="color:#e63a48"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: <?php echo $count1 ?>%;" class="progress-bar progress-bar-success red-haze">

                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="expectations">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/lesseeaction/search']) ?>"> <div class="dashboard-stat2 "style="background:rgba(219, 226, 253, 0.61);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="567"></span>
                        </h3>
                        <small>SEARCH PROPERTY</small>
                    </div>
                    <div class="icon">
                        <i class="icon-basket"style="color:#372ae4"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width:;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"></div>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="banks">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/bankdetails']) ?>"><div class="dashboard-stat2 " style="background:rgba(227, 211, 255, 0.68);">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="276"></span>
                        </h3>
                        <small>	LESSEE BANK DETAILS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-user"style="color:#b023c7"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title">  </div>
                        <div class="status-number"> </div>
                    </div>
                </div>
            </div></a>
    </div>
        
        
    </div>
    
     
    
    
    
 <?php } ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
   
    $(document).ready(function () {        

       $('#sellerrole').hide();
       $('#buyerrole').hide();
       $('#lessorrrole').hide();
       $('#lesseerole').hide();
       var onpageradio = $("input[name='radio2']:checked"). val();
       if (onpageradio == 'radio6') {
                
                    $('#sellerrole').hide();
                    $('#buyerrole').show();
                    $('#lessorrrole').hide();
                    $('#lesseerole').hide(); 
                    $('#norole').hide(); 
                    
                 
                    }
            if (onpageradio == 'radio9') {

                    $('#sellerrole').hide();
                    $('#buyerrole').hide();
                    $('#lessorrrole').hide();
                    $('#lesseerole').show(); 
                    $('#norole').hide();
                    
                   
//                    window.location =<?php echo Yii::$app->urlManager->createUrl(['/lesseeaction/search']) ?>;
                    
                   
            }
            if (onpageradio == 'radio7') {

                    $('#sellerrole').show();
                    $('#buyerrole').hide();
                    $('#lessorrrole').hide();
                    $('#lesseerole').hide(); 
                    $('#norole').hide(); 
            }
            if (onpageradio == 'radio8') {
                
                    $('#sellerrole').hide();
                    $('#buyerrole').hide();
                    $('#lessorrrole').show();
                    $('#lesseerole').hide(); 
                    $('#norole').hide(); 
            }
       
               
        $('input[type=radio][name=radio2]').change(function () {
            if (this.value == 'radio6') {
                
                    $('#sellerrole').hide();
                    $('#buyerrole').show();
                    $('#lessorrrole').hide();
                    $('#lesseerole').hide(); 
                    $('#norole').hide(); 
//                  window.location="http://localhost/newbells/frontend/web/index.php/buyeraction/search";
                    }
            if (this.value == 'radio9') {

                    $('#sellerrole').hide();
                    $('#buyerrole').hide();
                    $('#lessorrrole').hide();
                    $('#lesseerole').show(); 
                    $('#norole').hide();
                   
                    
//                    window.location="http://localhost/newbells/frontend/web/index.php/lesseeaction/search";
            }
            if (this.value == 'radio7') {

                    $('#sellerrole').show();
                    $('#buyerrole').hide();
                    $('#lessorrrole').hide();
                    $('#lesseerole').hide(); 
                    $('#norole').hide(); 
//             window.location="http://localhost/newbells/frontend/web/index.php/selleraction/schedulevisit";

            }
            if (this.value == 'radio8') {
                
                    $('#sellerrole').hide();
                    $('#buyerrole').hide();
                    $('#lessorrrole').show();
                    $('#lesseerole').hide(); 
                    $('#norole').hide();
//           window.location="http://localhost/newbells/frontend/web/index.php/lessoraction/index";

            }

        });
    });
</script>    
