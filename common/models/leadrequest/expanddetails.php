<?php

$findleadrequest = \common\models\Leads::find()->where(['id'=>$id])->one();
// $getcompanydetails = \common\models\Company::find()->where(['id'=>$findleadrequest->company])->one();
// $checkproducttype = \common\models\Producttype::find()->where(['id'=>$findleadrequest->appliedProductid])->one();
// $getproductdetails =\common\models\Leadsproduct::find()->where(['producttype'=>$checkproducttype->name])->one();
// $arrleadstatusconfig = \common\models\Leadstatusconfig::find()->where('id != :id1',array(':id1'=>7))->all();
// $statussum = \common\models\Leadstatusconfig::find()->where(['id'=>$findleadrequest->status])->one();

?>

<h3><?php echo $findleadrequest->name ?> <br/><small> Location - <?php echo $findleadrequest->location ?> </small> </h3>
    <div class="row">
        <div class="col-sm-2">
            <div class="img-thumbnail img-rounded text-center">
                <img src="<?php echo Yii::$app->urlManager->createUrl(['img/anonymous.png']) ?>" style="padding:3px;width:80%">
				<?php 
				$date = date_create($findleadrequest->created_at);
				$date = date_format($date,'M-d ,Y');
				?>
                <div class="small text-muted">Published Date: <?php echo $date ?></div>
				<div class="small text-muted"><?php echo $findleadrequest->email ?> </div>
				<div class="small text-muted">Contact No.: <?php echo $findleadrequest->countrycode ?> - <?php echo $findleadrequest->number ?> </div>
            </div>
        </div>
        <div class="col-sm-8">
            <table class="table table-bPropertyed table-condensed table-hover small kv-table">
                <tr class="danger">
                    <th colspan="5" class="text-center text-danger"> Process Flow</th>
                </tr>
                <tr class="active">
                    <th class="text-center">#</th>
                    <th>Assigned</th>
					  <th>Process</th>
                    <th>Status</th>
					<th>Actions</th>
                </tr>
				<?php $userpf = \common\models\activemode::checkprofilestats($findleadrequest->user_id,"my_profile"); ?>
                <tr>
                    <td >1</td>
					<td><?php echo \common\models\User::findOne(Yii::$app->user->identity->id)->email ?></td>
					<td >User Profile</td>
					
					<?php if($userpf) { ?>
					<td><?php echo $userpf->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					<td><a onclick="functionprofile(<?php echo $findleadrequest->user_id ?>)" class="btn btn-info"> View Details</a></td>
                </tr>
				<?php $userkyu = \common\models\activemode::checkprofilestats($findleadrequest->user_id,"my_KYC_upload"); ?>
               
				                <tr>
                    <td >2</td>
					<td><?php echo \common\models\User::findOne(Yii::$app->user->identity->id)->email ?></td>
					<td >User KYC Upload</td>
					
					<?php if($userkyu) { ?>
					<td><?php echo $userkyu->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					<td><a onclick="functionkyc(<?php echo $findleadrequest->user_id ?>)" class="btn btn-info"> View Details</a></td>
                </tr>
				<?php $userkya = \common\models\activemode::checkprofilestats($findleadrequest->user_id,"my_KYC_approval"); ?>
               
				                <tr>
                    <td >2</td>
					<td><?php echo \common\models\User::findOne(Yii::$app->user->identity->id)->email ?></td>
					<td >User KYC Approve</td>
					
					<?php if($userkya) { ?>
					<td><?php echo $userkya->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					<td><a onclick="functionkyc(<?php echo $findleadrequest->user_id ?>)" class="btn btn-info"> View Details</a></td>
                </tr>
				
				<?php $userbnk = \common\models\activemode::checkprofilestats($findleadrequest->user_id,"my_bank"); ?>
               
				<tr>
                    <td >3</td>
					<td><?php echo \common\models\User::findOne(Yii::$app->user->identity->id)->email ?></td>
					<td >Bank Details</td>
					<?php if($userbnk) { ?>
					<td><?php echo $userbnk->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					<td><a onclick="functionbank(<?php echo $findleadrequest->user_id ?>)"  class="btn btn-info"> View Details</a></td>
                </tr>
				
				<?php $userexp = \common\models\activemode::checkprofilestats($findleadrequest->user_id,"my_expectations"); ?>
               
				<tr>
                   <td >4</td>
					<td><?php echo \common\models\User::findOne(Yii::$app->user->identity->id)->email ?></td>
					
					<td >User Expectations</td>
					
					<?php if($userexp) { ?>
					
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					<?php 
					$selerexp = \common\models\SellorExpectationsbin::find()->where(['user_id'=>$findleadrequest->user_id,'is_active'=>"1"])->one();
					$lesserexp = \common\models\LessorExpectationsbin::find()->where(['user_id'=>$findleadrequest->user_id,'is_active'=>"1"])->one();
					?>
					<td><?php if($selerexp) { ?><a onclick ="functionlesseexp(<?php echo $findleadrequest->user_id ?>)"  class="btn btn-info"> View <?php echo $selerexp->user_type ?> Expectations</a><?php } ?>
					<?php if($lesserexp) { ?><a onclick ="functionsellerexp(<?php echo $findleadrequest->user_id ?>)"  class="btn btn-info"> View <?php echo $selerexp->user_type ?> Expectations</a><?php } ?></td>
                </tr>
				
				 <tr>
                    <td >5</td>
					<td><?php echo \common\models\User::findOne(Yii::$app->user->identity->id)->email ?></td>
					
					<td >Shortlist Property</td>
				 <td>0%</td>
					<td><a onclick ="functionshortlist(<?php echo $findleadrequest->user_id ?>)" class="btn btn-info"> View Details</a></td>
                </tr>
				<tr>
                    <td >6</td>
					<td><?php echo \common\models\User::findOne(Yii::$app->user->identity->id)->email ?></td>
					
					<td >Add Property</td>
					
					<td>0%</td>
					<td><a onclick ="functionaddproperty(<?php echo $findleadrequest->user_id ?>)"  class="btn btn-info"> View Details</a></td>
                </tr>
				
                <tr class="warning">
                    <th></th> <th></th><th></th><th></th><th></th> 
                </tr>
            </table>
        </div>
        
        <div class="col-sm-1">
            <div class="kv-button-stack">
           <button type="button" class="btn btn-default btn-lg" title="Call for details" data-toggle="tooltip"><span class="glyphicon glyphicon-earphone"></span></button>
            <button type="button" class="btn btn-default btn-lg" title="Email for details" data-toggle="tooltip"><span class="glyphicon glyphicon-envelope"></span></button>
            </div>
        </div>
		
		
    </div>
	
	<div class="status">
                                        
                                        <div class="status-number"><b>0% </b></div>
                                    </div>
	<div class="progress">
                                        <span style="width: 0%;" class="progress-bar progress-bar-success blue">
                                            <span class="sr-only">0% progress</span>
                                        </span>
                                    </div>

									<script>
function functionprofile(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['usersprofile/view']) ?>?userID='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionkyc(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['user-kycdocuments/view']) ?>?userid='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionbank(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['bank/index']) ?>?userid='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionlesseexp(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['lessor-expectationsbin/index']) ?>?userid='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionsellerexp(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['sellor-expectationsbin/index']) ?>?userid='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionaddproperty(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addpropertypm/index_p']) ?>?userid='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionshortlist(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addpropertypm/index_p']) ?>?userid='+str+'', '_blank');
  win.focus();
}
</script>
