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
                                                    <i class="fa fa-send"></i>Send Email</div>
                                                <div class="tools">
                                                   <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbfffe').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccfffe').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">x</a>
                                                    
                                                </div>
                                            </div>
                           

                                            <div class="portlet-body form">
                                                   
                            <div class="profile-content">
                             
                                        <div class="portlet light bordered">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Send Email</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Send Email</a>
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
                                                                <label class="control-label">From</label>
                                                                <input type="email" name="fromemail" id="fromemail" placeholder="xyz@gmail.com" class="form-control" /> </div>
																</div>
														<div class="col-md-5">
																<div class="form-group">
                                                                <label class="control-label">To</label>
                                                                <input type="email" name="toemail" id="toemail" placeholder="xyz@gmail.com" class="form-control" value="<?php echo $findleadrequest->requestEmail ?>" /> </div>
																</div>
																<div class="col-md-5">
																<div class="form-group">
                                                                <label class="control-label">CC</label><font color="red">*</font>
                                                                <input type="email" name="ccemail" id="ccemail" placeholder="xyz@gmail.com" class="form-control" /> </div>
																</div>
														
																</div>
																<div class="row">
														<div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="control-label">Subject</label>
                                                                <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control" /> </div></div>
														
														    </div>
                                                           <div class="row">
														<div class="col-md-10">
														     <div class="form-group">
                                                                <label class="control-label">Message</label>
                                                                <textArea type="text" name="message" id="message" placeholder="Message" class="form-control" ></textArea> 
																</div></div></div>
                                                           
														   
                                                            <div class="margiv-top-10">
                                                                <a onclick="sendcompletemail(<?php echo $leadid ?>);window.location.reload();" href="javascript:;" class="btn green">Send</a>
                                                               <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbfffe').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccfffe').style.display='none'" style="cursor:pointer;  font-weight:800;" class="btn default">
                                                                Cancel </a>
                                                           <div align="right" style="padding-right:10px;" ><i><font color="red">*</font> Optional</div></i>
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
                  <?php ActiveForm::end(); ?>
 
 <script>

function sendcompletemail(str){
	
var toemail=$('#toemail').val();
var ccemail=$('#ccemail').val();

var subject=$('#subject').val();
var fromemail=$('#fromemail').val();
var message=$('#message').val();


    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequest/sendcompletemail"]) ?>?leadid="+str+"&ccemail="+ccemail+"&toemail="+toemail+"&subject="+subject+"&fromemail="+fromemail+"&message="+message,
                
                success: function(msg){
				
                    $('#vpcobh203').html(msg);
				
                  
                }

            });

}

</script>