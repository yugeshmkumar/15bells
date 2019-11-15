<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
?>
<?php $userid = $_GET['id'];
      
	   $user = \common\models\User::find()->where(['id'=>$userid])->one();
	     
	   ?>

<div class="portlet box green">
							<div class="portlet-title">
							<div class="caption"><?php echo $user->email ?></div>
							<div class="tools">
			
                                                                             <div style="padding-right:11px;">
	 
 <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkkl').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjkl').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;"> X</a>
                                                                           </div></div>
                                                        
                                                        </div><div class="portlet-body">
														
												 <?php $form = ActiveForm::begin([
                'id'=>'ibform',    
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
			    <div class="form-group form-md-line-input form-md-floating-label">
                                                <textarea class="form-control" name="writecomment" id="writecomment" value="Nil" rows="3"></textarea>
                                                <label for="form_control_1">Write a comment..</label>
                                                <span class="help-block">comment goes here...</span>
                                            </div>
											<?php $form = ActiveForm::end([
               
            ]); ?>
			 <div style="position:absolute;  right:0%;"> <div style="padding-bottom:6px; padding-right:4px;"> <table width="100%" border="0" cellpadding="0" cellspacing="0"> <tr> 
		
			 <td align="left" valign="middle">
                   <div id="approve1" style="display:block;"> <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkkl').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjkl').style.display='none';updatecommentaction('<?php echo $user->id ?>')"><div class="btn btn-info">  <i class="fa fa-plus"> Add </i></div>
                    </a></div></td>&nbsp;
					<td align="left" valign="middle"> <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkkl').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjkl').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">
              <div class="btn btn-danger"><i class="glyphicon glyphicon-remove">Cancel</i></div></a>
         </td> </tr> </table>

			
			</div></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
			</div></div>
			<div id="csolo1uu"></div>

<script>


function updatecommentaction(str){	
var mestamj1=$('#mestamj1');  

 mestamj1.html('<div id="rhamshapvveekmuzqtsimaccff" class="rhamshapvveekmuzqtsblevbbff" ><div align="center" style="position:relative; top:300px;"> <img src="<?php echo Yii::$app->request->baseUrl ?>/img/Preloader_1.gif" /></div></div>');
    
          var writecomment=$('#writecomment').val();
	



$.ajax({

                type: "GET",
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["userset/updatecommentaction"]) ?>?writecomment="+writecomment+"&id="+str,
				
			
                
                success: function(msg){
					//alert(msg);
					location.reload();
				$('#csolo1uu').html(msg);
                  mestamj1.html('');
                }

            });
			
			

}

</script>