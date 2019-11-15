<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
?>
<?php $pid = $_GET['pid'];
      $rsiteid = $_GET['r_siteid'];
	   $RequestSiteVisitbin = \common\models\RequestSiteVisitbin::find()->where(['request_id'=>$rsiteid])->one();
	     
	   ?>

<div class="portlet box green">
							<div class="portlet-title">
							<div class="caption"><?php if($RequestSiteVisitbin){ ?><?php echo \common\models\User::findOne($RequestSiteVisitbin->user_id)->email ?><?php } ?></div>
							<div class="tools">
			
                                                                             <div style="padding-right:11px;">
	 
 <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkklpp').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjklpp').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;"> X</a>
                                                                           </div></div>
                                                        
                                                        </div><div class="portlet-body">
														
												 <?php $form = ActiveForm::begin([
                'id'=>'ibform',    
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
			    <div class="form-group form-md-line-input form-md-floating-label">
                                                <textarea class="form-control" name="writecomment" id="writecomment" value="Nil" rows="3"></textarea>
                                                <label for="form_control_1">Add a feedback / description..</label>
                                                <span class="help-block">feedback goes here...</span>
                                            </div>
											<?php $form = ActiveForm::end([
               
            ]); ?>
			 <div style="position:absolute;  right:0%;"> <div style="padding-bottom:6px; padding-right:4px;"> <table width="100%" border="0" cellpadding="0" cellspacing="0"> <tr> 
		
			 <td align="left" valign="middle">
                   <div id="approve1" style="display:block;"> <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkklpp').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjklpp').style.display='none';updatesitecommentaction('<?php echo $rsiteid ?>')"><div class="btn btn-info">  <i class="fa fa-plus"> Add </i></div>
                    </a></div></td>&nbsp;
					<td align="left" valign="middle"> <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkklpp').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjklpp').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">
              <div class="btn btn-danger"><i class="glyphicon glyphicon-remove">Cancel</i></div></a>
         </td> </tr> </table>

			
			</div></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
			</div></div>
			<div id="csolo1uu"></div>

<script>


function updatesitecommentaction(str){	
var mestamj1=$('#mestamj1');  

 mestamj1.html('<div id="rhamshapvveekmuzqtsimaccff" class="rhamshapvveekmuzqtsblevbbff" ><div align="center" style="position:relative; top:300px;"> <img src="<?php echo Yii::$app->request->baseUrl ?>/img/Preloader_1.gif" /></div></div>');
    
          var writecomment=$('#writecomment').val();
	



$.ajax({

                type: "GET",
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["addpropertypm/updatesitecommentaction"]) ?>?writecomment="+writecomment+"&r_sid="+str,
				
			
                
                success: function(msg){
					//alert(msg);
					location.reload();
				$('#csolo1uu').html(msg);
                  mestamj1.html('');
                }

            });
			
			

}

</script>