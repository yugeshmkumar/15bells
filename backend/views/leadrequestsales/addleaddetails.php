<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */
/* @var $form yii\bootstrap\ActiveForm */
$leadid = $_GET['id'];
?>
<?php


$findleadrequest = \common\models\Leadrequest::find()->where(['leadRequestID'=>$leadid])->one();
$getcompanydetails = \common\models\Company::find()->where(['id'=>$findleadrequest->company])->one();
$checkproducttype = \common\models\Producttype::find()->where(['id'=>$findleadrequest->appliedProductid])->one();
$getproductdetails =\common\models\Leadsproduct::find()->where(['producttype'=>$checkproducttype->name])->one();
$arrleadstatusconfig = \common\models\Leadstatusconfig::find()->where('id != :id1',array(':id1'=>7))->all();
$statussum = \common\models\Leadstatusconfig::find()->where(['id'=>$findleadrequest->status])->one();

?>
  <?php $form = ActiveForm::begin([
								  'class'=>'form-horizontal'
								  ]); ?>
 <div class="portlet box blue">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Add Details</div>
                                                <div class="tools">
                                                      <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffd').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffd').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">x</a>
                            
                                                </div>
                                            </div>
											
                                            <div class="portlet-body form">
                                                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet bordered">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> Marcus Doe </div>
                                        <div class="profile-usertitle-job"> Developer  &nbsp;&nbsp;<font color="yellow"><i class="fa fa-trophy"></i> </font></div> 
                                   
									
										
                                            <font color="blue"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></font> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                           
                                        
										 </div>
                                        <div class="margin-top-20 profile-desc-link" style="padding-left:10px;">
                                            <i class="fa fa-globe"></i>
                                            <a href="http://www.xyz.com">www.xyz.com</a>
                                        </div>
                                        <div class="margin-top-20 profile-desc-link" style="padding-left:10px;">
                                            <i class="fa fa-linkedin"></i>
                                            <a href="http://www.linkedin.com/xyz/">@xyz</a>
                                        </div>
                                        <div class="margin-top-20 profile-desc-link" style="padding-left:10px;">
                                            <i class="fa fa-facebook"></i>
                                            <a href="http://www.facebook.com/xyz/">xyz</a>
                                        </div>
                                    <!-- END MENU -->
                                </div>
                                <!-- END PORTLET MAIN -->
                               
                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Lead Details</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Product Details</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">Other Info</a>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form role="form" action="#">
                                                            <div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input type="text" placeholder="John" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input type="text" placeholder="Doe" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Mobile Number</label>
                                                                <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Interests</label>
                                                                <input type="text" placeholder="Design, Web etc." class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Occupation</label>
                                                                <input type="text" placeholder="Web Developer" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">About</label>
                                                                <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Website Url</label>
                                                                <input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
                                                            <div class="margiv-top-10">
                                                                <a href="javascript:;" class="btn green"> Save Changes </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                          <form role="form" action="#">
                                                            <div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input type="text" placeholder="John" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input type="text" placeholder="Doe" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Mobile Number</label>
                                                                <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Interests</label>
                                                                <input type="text" placeholder="Design, Web etc." class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Occupation</label>
                                                                <input type="text" placeholder="Web Developer" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">About</label>
                                                                <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Website Url</label>
                                                                <input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
                                                            <div class="margiv-top-10">
                                                                <a href="javascript:;" class="btn green"> Save Changes </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
                                                        <form role="form" action="#">
                                                            <div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input type="text" placeholder="John" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input type="text" placeholder="Doe" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Mobile Number</label>
                                                                <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Interests</label>
                                                                <input type="text" placeholder="Design, Web etc." class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Occupation</label>
                                                                <input type="text" placeholder="Web Developer" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">About</label>
                                                                <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Website Url</label>
                                                                <input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
                                                            <div class="margiv-top-10">
                                                                <a href="javascript:;" class="btn green"> Save Changes </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
				 </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
				<?php ActiveForm::end(); ?>
 
 <script>

function assignlead(str){
              var employeeid=$('#employeeid').val();
		  
var message=$('#message').val();
		  

    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequest/assignleadaction"]) ?>?leadid="+str+"&employeeid="+employeeid+"&message="+message,
                
                success: function(msg){
				
                    $('#vpcobh202').html(msg);
				
                  
                }

            });

}

</script>