<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */
/* @var $form yii\bootstrap\ActiveForm */

$leadid = $_GET['leadid'];
?>
<?php
$findleadrequest = \common\models\Leads::find()->where(['id' => $leadid])->one();
?>
<?php
$form = ActiveForm::begin([
            'class' => 'form-horizontal'
        ]);
?>
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

$employecount = \Yii::$app->db->createCommand("SELECT count(*) from company_emp where name='CSR Supply'")->queryAll();
            $findcsr = \Yii::$app->db->createCommand("SELECT * from company_emp where name='CSR Supply' order by alloted asc limit 1")->queryOne();
$findcsrst = \Yii::$app->db->createCommand("SELECT * from company_emp where name='CSR Supply' order by alloted desc limit 1")->queryOne(); 
           $count = $employecount['0']['count(*)'];

            $getallot = $findcsrst['alloted'];
            
            
            
           
            if($getallot == $count){
            
            
$givezero = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => '0'],'name = "CSR Supply"')->execute();            
            
            $findcsrs = \Yii::$app->db->createCommand("SELECT * from company_emp where name='CSR Supply' order by alloted asc limit 1")->queryOne();  
$findcsrsd = \Yii::$app->db->createCommand("SELECT * from company_emp where name='CSR Supply' order by alloted desc limit 1")->queryOne();            
            $getallots = $findcsrsd['alloted'];
            $newid = $findcsrs['id'];
            $counters = $getallots + 1;
            
           
$update = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => $counters],'id = "'.$newid.'"')->execute();
            
       

            }else{
            
            $counter = $getallot + 1;
            $newid = $findcsr['id']; 

       $updates = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => $counter],'id = "'.$newid.'"')->execute();

          
            }
?>
                                                    <label class="control-label">Employee</label>

                                                    <select id="employeeid" name="employeeid" class="form-control" onChange='adddescriptn(this.value)'>
                                                       

                                                            <option value="<?php echo $newid ?>"><?php echo 'CSR Supply ('.$newid.')' ?></option>
                                                        


                                                    </select>

                                                </div>

                                                <div id="nek1"></div>

                                                <div class="form-group">
                                                    <label class="control-label">Message <font color="red">*</font></label>
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
url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequest/adddescr"]) ?>?accntID="+str,
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
				
				
				
                               url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequest/assignleadaction"]) ?>?leadid="+str+"&employeeid="+employeeid+"&message="+message,
                
               success: function(msg){
				
                   $('#vpcobh202').html(msg);
				
                  
               }

           });

}

</script>
