<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\Growl;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\UserKycdocuments */

$user = \common\models\User::find()->where(['id'=>$_GET['userid']])->one();
$getuserkyc = \common\models\UserKycdocuments::find()->where(['userid'=>$_GET['userid'],'isactive'=>1])->one(); 
if($getuserkyc){
    $userid = $_GET['userid'];
?>
<?php if(isset($_POST['approvedfinal'])){
	
	$checkstatus = \common\models\MyProfileProgressStatus::find()->where(['user_id'=> Yii::$app->user->identity->id,'process_name'=>"my_KYC_approval",'process_status'=>"100",'active'=>1])->one();
	if(!$checkstatus){
		$newcheckstatus = new \common\models\MyProfileProgressStatus();
		$newcheckstatus->process_name="my_KYC_approval";
		$newcheckstatus->process_status="100";
		 $newcheckstatus->user_id= Yii::$app->user->identity->id;
		              $newcheckstatus->role_id=3;
		              $newcheckstatus->save();
					  
					  
		
	}
	
	echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Successful!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'You successfully approved KYC documents.',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);
} ?>
<div class="user-kycdocuments-view">

<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccff" class="viewpsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbff" class="viewpsambqwksukvveekmuzqtswhevbbff"  > <div class="viewpsambqwkstalkbubble" id="vpcobh1"></div> </div>

   <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-user font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase"><?php echo $user->email ?></span>
                                    </div>
                                    <div class="actions">
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover table-light">
                                            <thead>
                                                <tr class="uppercase">
                                                    <th> # </th>
													<th> User </th>
                                                    <th> Document File Name </th>
                                                    <th> File Type </th>
													 <th>Comments </th>
                                                    
                                                    <th> Status </th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php $arruserkyc = \common\models\UserKycdocuments::find()->where(['userid'=>$userid,'isactive'=>1])->all(); ?>
                                               <?php 
											   $ds= 0;
											   foreach($arruserkyc as $userkyc) {   $ds++; ?>
											   <tr>
                                                    <td> <?php echo $ds ?> </td>
                                                    <td> <?php echo  $user->email ?> </td>
                                                    <td> <?php echo \common\models\Documenttype::findOne($userkyc->document_name)->documentTypeName ?> </td>
                                                    <td><a href="<?php echo Yii::getAlias('@archiveUrl') ?>\kycdocuments\<?php echo $userkyc->docment_file_name ?>" target="_blank" style="color:#000000;"><?php echo $userkyc->docment_file_name ?> <i class="fa fa-share"></i></a>  </td>
													 <td> <?php echo $userkyc->approve_reason ?> </td>
                                                    <td>
													<?php if($userkyc->approve_status == 1){ ?>
                                                        <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,viewpcobh('<?php echo $userkyc->id ?>','approved')"  class="label label-sm label-success"> Approved </a>
													
													<?php } else if($userkyc->approve_status == 2){ ?>
													    <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,viewpcobh('<?php echo $userkyc->id ?>','onhold')"  class="label label-sm label-warning"> On-hold </a>
													<?php } else { ?>
													    <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,viewpcobh('<?php echo $userkyc->id ?>','pending')"  class="label label-sm label-danger"> Pending </a>
													
													<?php } ?>
                                                    </td>
                                                </tr>
											   <?php } ?>
                                               
                                            </tbody>
                                        </table>
										 <?php $form = ActiveForm::begin(); ?>
	
										<div align="center">
										<button type="submit" class="btn btn-primary" name="approvedfinal"><i class="fa fa-check"></i> Click to Complete approval</button>
										</div><?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
<?php } else { ?>
<div class="note note-danger">
    Empty Documents.
</div>
<?php } ?>

<script>

function viewpcobh(str,ttr){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["user-kycdocuments/updatestatus"]) ?>?id="+str+"&ca="+ttr,
                
                success: function(msg){
				
                    $('#vpcobh1').html(msg);
				
                  
                }

            });

}

</script>
<style>.rhamshapvveekmuzqtsblevbbff{

display:block;
    position:fixed;
    top:0;
    left:0;
    background-color: black;
   
    width:100%;
    height:100%;
   z-index:1800;
  -moz-opacity: 0.8;
  opacity:.80;
  filter: alpha(opacity=80);



}</style>


<span id="mestamj1"> </span>
