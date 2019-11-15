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


$findleadrequest = \common\models\Leads::find()->where(['id'=>$leadid])->one();


?>
  <?php $form = ActiveForm::begin([
								  'class'=>'form-horizontal'
								  ]); ?>
 <div class="portlet box blue">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-send"></i> Accept Lead</div>
                                                <div class="tools">
                                                   <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffaaccept').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffaaccept').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">x</a>
                                                    
                                                </div>
                                            </div>

                                            <div class="portlet-body form">
                                                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Accept Lead</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Accept Lead</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form role="form" action="#">
                                                            
	
                                                            <div class="form-group">
                                                                <label class="control-label">Comments <font color="red">*</font></label>
                                                                <textArea  id="message" name="message" placeholder="" class="form-control" rows="3"/></textArea> </div>
                                                           
														   
                                                            <div class="margiv-top-10">
                                                                <a onclick="assignleadacceptactn('<?php echo $leadid ?>','<?php echo $status ?>');window.location.reload();" href="javascript:;" class="btn green">Assign</a>
                                                               <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffaaccept').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffaaccept').style.display='none'" style="cursor:pointer;  font-weight:800;" class="btn default">
                                                                Cancel </a>
                                                            </div>
															<br/>
															 <div class="margiv-top-10" align="right">
															<font color="red">*</font>&nbsp;Optional
															 </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    
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
 <?php ActiveForm::end(); ?>
 
 <script>

function assignleadacceptactn(str,ttr){
             
var message=$('#message').val();
		  

    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequest/assignleadacceptactn"]) ?>?leadid="+str+"&message="+message+"&status="+ttr,
                
                success: function(msg){
				
                    $('#vpcobh202').html(msg);
				
                  
                }

            });

}

</script>