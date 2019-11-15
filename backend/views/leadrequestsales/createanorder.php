
                                                                                             <?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */
/* @var $form yii\bootstrap\ActiveForm */

$leadid = $_GET['leadid'];
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
                                                    <i class="fa fa-send"></i> Create an Order</div>
                                                <div class="tools">
												 <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbfffc').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccfffc').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">x</a>
                                              
                                                    
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
                                        <img src="<?php echo Yii::$app->urlManager->createUrl(['img/anonymous.png']) ?>" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> <?php echo $findleadrequest->requestName ?> </div>
                                        <div class="profile-usertitle-job"><?php echo $getcompanydetails->name ?>  &nbsp;&nbsp;<font color="yellow"><i class="fa fa-trophy"></i> </font></div> 
                                   
									
										
                                            <font color="blue"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></font> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                           
                                        
										 </div>
                                        <div class="margin-top-20 profile-desc-link" style="padding-left:10px;">
                                            <i class="fa fa-globe"></i>
                                            <a href="http://www.xyz.com"><?php echo $getcompanydetails->website ?></a>
                                        </div>
                                        <div class="margin-top-20 profile-desc-link" style="padding-left:10px;">
                                            <i class="fa fa-linkedin"></i>
                                            <a href="http://www.linkedin.com/xyz/"><?php echo $findleadrequest->requestEmail ?></a>
                                        </div>
                                        <div class="margin-top-20 profile-desc-link" style="padding-left:10px;">
                                            <i class="fa fa-facebook"></i>
                                            <a href="http://www.facebook.com/xyz/"><?php echo $findleadrequest->requestEmail ?></a>
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
                                                    <span class="caption-subject font-blue-madison bold uppercase">Create An Order</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Create An Order</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form role="form" action="#">
                                                           
																<div class="row">
																<div class="col-md-5">
                                                               <div class="form-group">
                                                                <label class="control-label">From Date</label>
                                                                <input type="date"  id="fromdate" name="fromdate" placeholder="Doe" class="form-control"/>

																</div></div>
																<div class="col-md-5">
																<div class="form-group">
																<label class="control-label">To Date</label>
                                                                <input type="date"  id="todate" name="todate" placeholder="Doe" class="form-control"/>
                                                               </div></div></div>
															   <div class="form-group">
                                                                <label class="control-label">Message</label>
                                                                <textArea  id="message" name="message" placeholder="" class="form-control" rows="3"/>
                                                                    </textArea>

																</div>
                                                           
														   
                                                            <div class="margiv-top-10">
                                                                <a onclick="createanorderaction('<?php echo $leadid ?>');window.location.reload();" href="javascript:;" class="btn green"> Create</a>
																 <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbfffc').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccfffc').style.display='none'" style="cursor:pointer;font-weight:800;"  class="btn default">
                                              
                                                                Cancel </a>
                                                            </div>
															
                                                        </form>
                                                    </div>
                                                   
                                                   
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
 <?php ActiveForm::end(); ?>
 
 <script>

function createanorderaction(str){
              var fromdate=$('#fromdate').val();
			  var todate=$('#todate').val();
              var message=$('#message').val();
				 
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequest/createanorderaction"]) ?>?leadid="+str+"&todate="+todate+"&fromdate="+fromdate+"&message="+message,
                
                success: function(msg){
				
                    $('#vpcobh208').html(msg);
				
                  
                }

            });

}

</script>