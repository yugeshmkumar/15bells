                                                  <?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */
/* @var $form yii\bootstrap\ActiveForm */

$leadid = $_GET['leadid'];
$status = $_GET['status'];
?>
<?php


$findleadrequest = \common\models\LeadsSales::find()->where(['id'=>$leadid])->one();


?>
  <?php $form = ActiveForm::begin([
								  'class'=>'form-horizontal'
								  ]); ?>
 <div class="portlet box blue">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-trash-o"></i>Reject Request</div>
                                                <div class="tools">
                                                   <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffareject').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffareject').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">x</a>
                                                    
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
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> <?php echo $findleadrequest->name ?> </div>
                                        
									
										
                                            <font color="blue"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></font> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                           
                                        
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
                                                    <span class="caption-subject font-blue-madison bold uppercase">Reject Request</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Reject Request</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form role="form" action="#">
                                                           
																
                                                            <div class="form-group">
                                                               <div class="note note-danger">
															   Are you sure ?
															   </div>
																</div>
                                                           
														   
                                                            <div class="margiv-top-10">
                                                                <a onclick="rejectleadaction('<?php echo $leadid ?>');window.location.reload();" href="javascript:;" class="btn red">Confirm</a>
																<a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffareject').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffareject').style.display='none'" style="cursor:pointer; font-weight:800;" class="btn default">
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

function sendproposalaction(str){
              var fileid=$('#file').val();

         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/sendproposalaction"]) ?>?leadid="+str+"&fileid="+fileid,
                
                success: function(msg){
				
                    $('#vpcobh203').html(msg);
				
                  
                }

            });

}

</script>

 <script>

function rejectleadaction(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/rejectleadaction"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhtop').html(msg);
				
                  
                }

            });

}

</script>