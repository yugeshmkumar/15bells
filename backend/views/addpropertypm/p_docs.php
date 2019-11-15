<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\Growl;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\UserKycdocuments */

$Addpropertypm = \common\models\Addpropertypm::find()->where(['id'=>$_GET['id']])->one();
$arrgetuserpropertydocs = \common\models\MediaFilesConfig::find()->where(['property_id'=>$_GET['id'],'isactive'=>1])->all(); 
$countgetuserpropertydocs = \common\models\MediaFilesConfig::find()->where(['property_id'=>$_GET['id'],'isactive'=>1])->count(); 
$countgetcurrentuserpropertydocs = \common\models\MediaFilesConfig::find()->where(['property_id'=>$_GET['id'],'isactive'=>1,'status'=>"approved"])->count(); 
if($Addpropertypm){
    $userid = $Addpropertypm->user_id;
?>
<?php if(isset($_POST['approverequest'])) { 
$countgetuserpropertydocsxx = \common\models\MediaFilesConfig::find()->where(['property_id'=>$_GET['id'],'isactive'=>1])->count(); 

 if($countgetuserpropertydocsxx == $countgetcurrentuserpropertydocs) { 
	
	echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Success!',
    'icon' => 'fa fa-check',
    'body' => 'Change a few things up and try submitting again.',
    'showSeparator' => true,
    'delay' => 300,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);

return Yii::$app->controller->redirect(['/addpropertypm/index']);

	//\common\models\activemode::update_my_profile_progress_status($Addpropertypm->user_id,"",100,"")
	?>
	
	
	
<?php } else { ?>
<?php echo Growl::widget([
    'type' => Growl::TYPE_DANGER,
    'title' => 'Oh snap!',
    'icon' => 'glyphicon glyphicon-remove-sign',
    'body' => 'You need to approve all documents.',
    'showSeparator' => true,
    'delay' => 300,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]); ?>

<?php } } ?>
<div class="user-kycdocuments-view">

<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccff" class="viewpsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbff" class="viewpsambqwksukvveekmuzqtswhevbbff"  > <div class="viewpsambqwkstalkbubble" id="vpcobh1"></div> </div>

   <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-user font-red"></i> Approve Property Documents
                                        <span class="caption-subject font-red sbold uppercase"></span>
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
                                                    
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
											 <?php 
											   $ds= 0;
											   foreach($arrgetuserpropertydocs as $userpropertydocs) {   $ds++;
                                    $actualdocs = \common\models\MediaFiles::find()->where(['id'=>$userpropertydocs->media_id])->one();
											   ?>
											   <tr>
                                                    <td> <?php echo $ds ?> </td>
                                                    <td> <?php echo \common\models\User::findOne($Addpropertypm->user_id)->email; ?>   </td>
                                                    <td> <?php echo $actualdocs->file_name ?> </td>
                                                    <td> <?php echo $actualdocs->type ?> </td>
													 <td> <?php echo $userpropertydocs->comments ?> </td>
                                                    <td>
													<?php if($userpropertydocs->status == "approved"){ ?>
                                                        <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,viewpcobh('<?php echo $userpropertydocs->id ?>','approved')"  class="label label-sm label-success"> Approved </a>
													
													<?php } else if($userpropertydocs->status == "onhold"){ ?>
													    <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,viewpcobh('<?php echo $userpropertydocs->id ?>','onhold')"  class="label label-sm label-warning"> On-hold </a>
													<?php } else { ?>
													    <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,viewpcobh('<?php echo $userpropertydocs->id ?>','pending')"  class="label label-sm label-danger"> Pending </a>
													
													<?php } ?>
                                                    </td>
                                                </tr>
											   <?php } ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
									  <?php $form = ActiveForm::begin(); ?>
									<p align="center"><button type="submit" name="approverequest" id="approverequest" class="btn btn-primary"><i class="fa fa-check"></i>  Done Approval</button></p>
                                   <?php ActiveForm::end(); ?>
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
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["addpropertypm/updatestatus"]) ?>?id="+str+"&ca="+ttr,
                
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
