<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use \kartik\widgets\TimePicker;
?>
<div class="portlet box green">
							<div class="portlet-title">
							<div class="tools">
			
                                                                             <div style="padding-right:11px;">
	  <a onclick="document.getElementById('popupfive').style.display='none';document.getElementById('popupsix').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">x</a>
                                                                             </div></div>
                                                        
                                                        </div><div class="portlet-body">
			
							
<div style="padding:3px;">


<div style="padding-top:3px;"></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   
  <font size="3dp"><strong> <i class="fa fa-calendar"></i> Delete Calendar </strong></font>
  </tr>
</table>
-----------------------------------------------------------------------




<br>
	  
	  
	  <?php $form = ActiveForm::begin([
                'id'=>'ibform',    
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
			
</div>
                                                            <br>
											

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr></tr>
    <tr>
  <tr><td>
          
		  
   <div class="row"><div class="col-md-5">
                                                  <span class="label"><font color="#000000"><strong><i class="fa fa-pencil-square-o"></i>  From Date &nbsp;</strong></font>
</span>
	

<input type="date" id="fromdate" name ="fromdate" class="form-control" required>                                                       
     </div>

<div class="col-md-5">
<span class="label"><font color="#000000"><strong><i class="fa fa-pencil-square-o"></i> Todate &nbsp;</strong></font>
     </span>
        
<input type="date" id="todate" name ="todate" class="form-control" required>                                                        
   </div>


        </div>
</div>
</table>
         


<div style="position:absolute;  right:0%;"> <div style="padding-bottom:6px; padding-right:4px;"> <table width="100%" border="0" cellpadding="0" cellspacing="0"> <tr> <td align="left" valign="middle">
                    <a onclick="actiondeletedata(1)"><div class="btn btn-primary">  <i class="fa fa-recycle"> Delete </i></div>
                    </a></td> <td align="left" valign="middle"> <a onclick="document.getElementById('popupfive').style.display='none';document.getElementById('popupsix').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">
              <div class="btn btn-danger"><i class="glyphicon glyphicon-remove">Cancel</i></div></a>
         </td> </tr> </table>

			
			</div></div></div></div>




		<?php $form = ActiveForm::end([
               
            ]); ?>
			
			

 <br>
     

<div id="csolo1urs"></div>

<script>


function actiondeletedata(str){	
          var fromdate=$('#fromdate').val();
		  var todate=$('#todate').val();
		 


$.ajax({

                type: "GET",
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["schoolcalendar/actiondeletedata"]) ?>?fromdate="+fromdate+"&todate="+todate+"&refstr="+str,
				
			
                
                success: function(msg){
				$('#csolo1urs').html(msg);
                  
                }

            });
			
			

}

</script>                        