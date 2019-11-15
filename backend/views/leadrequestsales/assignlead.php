                                          <?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */
/* @var $form yii\bootstrap\ActiveForm */

$leadid = $_GET['leadid'];
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
                                                    <i class="fa fa-send"></i> Re-assign Lead</div>
                                                <div class="tools">
                                                   <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffa').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffa').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">x</a>
                                                    
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
                                                    <span class="caption-subject font-blue-madison bold uppercase">Re-ssign Lead to CSR</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Re-assign Lead</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form role="form" action="#">
                                                            <div class="form-group">
															<?php 
															$arremployee = \common\models\CompanyEmp::find()->where(['employee_typeID'=>1])->all();
															?>
                                                                <label class="control-label">Employee</label>
																
																<select id="employeeid" name="employeeid" class="form-control" onChange='adddescriptn(this.value)'>
																<option value="">Select..</option>
																<?php foreach($arremployee as $employee) {  ?>
																<option value="<?php echo $employee->id ?>"><?php echo $employee->name ?></option>
																<?php } ?>
																
																
																</select>
                                                               
																</div>
																
	                                                       <div id="nek1"></div>
	
                                                            <div class="form-group">
                                                                <label class="control-label">Message</label>
                                                                <textArea  id="message" name="message" placeholder="" class="form-control" rows="3"/></textArea> </div>
                                                           
														   
                                                            <div class="margiv-top-10">
                                                                <a onclick="assignlead('<?php echo $leadid ?>');window.location.reload();" href="javascript:;" class="btn green">Assign</a>
                                                               <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffa').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffa').style.display='none'" style="cursor:pointer;  font-weight:800;" class="btn default">
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
	function adddescriptn(str){
	
	 $.ajax({
 type: "GET",
 url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/adddescr"]) ?>?accntID="+str,
success: function(msg){
$('#nek1').html(msg); }
});
}
</script>
 <script>

function assignlead(str){
              var employeeid=$('#employeeid').val();
		  
var message=$('#message').val();
		  

    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/assignleadaction"]) ?>?leadid="+str+"&employeeid="+employeeid+"&message="+message,
                
                success: function(msg){
				
                    $('#vpcobh202').html(msg);
				
                  
                }

            });

}

</script>