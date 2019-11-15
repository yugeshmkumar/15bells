<?php

$findleadrequest = \common\models\LeadsSales::find()->where(['id'=>$id])->one();
$leadassigned = \common\models\LeadassignmentSales::find()->where(['leadid'=>$id])->one();
if($leadassigned){
	$assgnidx = $leadassigned->assigned_toID;
	$assgnid  =\common\models\CompanyEmpb::findOne($assgnidx)->userid;
	
} else {
	$assgnid = Yii::$app->user->identity->id;
}
// $getcompanydetails = \common\models\Company::find()->where(['id'=>$findleadrequest->company])->one();
// $checkproducttype = \common\models\Producttype::find()->where(['id'=>$findleadrequest->appliedProductid])->one();
// $getproductdetails =\common\models\Leadsproduct::find()->where(['producttype'=>$checkproducttype->name])->one();
// $arrleadstatusconfig = \common\models\Leadstatusconfig::find()->where('id != :id1',array(':id1'=>7))->all();
// $statussum = \common\models\Leadstatusconfig::find()->where(['id'=>$findleadrequest->status])->one();
$rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
	
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
               
				<?php $userkyu = \common\models\activemode::checkprofilestats($findleadrequest->user_id,"my_KYC_upload"); ?>
               
				              
				<?php $userexp = \common\models\activemode::checkprofilestats($findleadrequest->user_id,"my_expectations"); ?>
				 <?php $propertyID = \common\models\Addproperty::find()->where(['user_id'=>$findleadrequest->user_id])->one();
				 
                   
				 ?>
               <?php if($rbac->item_name == "sales_demand"){ ?>
			  
				<tr>
                   <td >1</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Schedule Site Visit</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
                                        <td><a onclick ="functionschedule_site(<?php if($propertyID){ echo $propertyID->id; } ?>)"  class="btn btn-icon-only blue"> <i class="fa fa-user"></i>  </a></td>
                </tr>
				<tr>
                   <td >2</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Payment for Site Visit</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick =""  class="btn btn-primary"> <i class="fa fa-plus"></i> Add Payment  </a></td>
                </tr>
				<tr>
                   <td >3</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Document Show</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionschedule_docshow(<?php if($propertyID){ echo $propertyID->id; } ?>)"  class="btn btn-icon-only blue"> <i class="fa fa-file-word-o"></i>  </a></td>
                </tr>
				<tr>
                   <td >4</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Payment for Document Show</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick =""  class="btn btn-primary">  <i class="fa fa-plus"></i> Add Payment </a></td>
                </tr>
				<tr>
                   <td >5</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Upgrading for Transaction Engine</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionupfortransactmengine(<?php if($propertyID){ echo $propertyID->id; } ?>)" class="btn btn-icon-only blue"> <i class="fa fa-exchange"></i>  </a></td>
                </tr>
				<tr>
                   <td >6</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Collect EMD and Book Slot</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
						<td><a onclick =""  class="btn btn-primary">  <i class="fa fa-plus"></i> Collect EMD </a></td>
                
                </tr>
				<tr>
                   <td >7</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Send To Sales Head</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionsendtosales(<?php echo $findleadrequest->user_id ?>)" class="btn btn-icon-only blue"> <i class="fa fa-send"></i></a>
					</td>
                </tr>
				<tr>
                   <td >8</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Payment Status</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionpaymentstatus(<?php echo $findleadrequest->user_id ?>)" class="btn btn-icon-only blue"> <i class="fa fa-money"></i></a>
					</td>
                </tr>
			   <?php } ?>
			   <?php if($rbac->item_name == "sales_supply"){ ?>
				<tr>
                   <td >1</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Schedule Site Visit</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionschedule_site(1)  class="btn btn-icon-only blue"> <i class="fa fa-user"></i>  </a></td>
                </tr>
				
				<tr>
                   <td >2</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Document Show</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionschedule_docshow(1)"  class="btn btn-icon-only blue"> <i class="fa fa-file-word-o"></i></a></td>
                </tr>
				
				<tr>
                   <td >3</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Collect EMD and Book Slot</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick =""  class="btn btn-primary">  <i class="fa fa-plus"></i> Add Payment </a></td>
                
                </tr>
				<tr>
                   <td >4</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Send To Sales Head</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionsellerexp(<?php echo $findleadrequest->user_id ?>)"  class="btn btn-icon-only blue"> <i class="fa fa-send"></i></a></td>
                </tr>
				<tr>
                   <td >5</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Upload Documents</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionuploaddocs(<?php echo $findleadrequest->user_id ?>)"  class="btn btn-icon-only blue"> <i class="fa fa-cloud-upload"></i> </a></td>
                </tr>
				 <?php } ?>
				<?php if($rbac->item_name == "sales_head"){ ?>
				<tr>
                   <td >1</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Payment Status</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functioncheckpaymentstatus(<?php echo $findleadrequest->user_id ?>)"  class="btn btn-icon-only blue"> <i class="fa fa-money"></i></a>
					</td>
                </tr>
				<tr>
                   <td >2</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Conduct F2F Meeting</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionconductf2f(<?php echo $findleadrequest->user_id ?>)" class="btn btn-icon-only blue"> <i class="fa fa-users"></i></a>
					</td>
                </tr>
				<tr>
                   <td >3</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >Upsell Services</td>
					
					<?php if($userexp) { ?>
					<td><?php echo $userexp->process_status ?> % <i class="fa fa-check"></i></td> <?php } else { ?> <td>0%</td><?php } ?>
					
					<td><a onclick ="functionupsellservices(<?php echo $findleadrequest->user_id ?>)" class="btn btn-icon-only blue"> <i class="fa fa-check"></i></a>
					</td>
                </tr>
			   <?php } ?>
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
function functionschedule_site(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['/addpropertypm/p_visits']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionschedule_docshow(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['/addpropertypm/p_sitedocs']) ?>?id='+str+'', '_blank');
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
function functionkycupld(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['usersprofile/documents']) ?>?id='+str+'', '_blank');
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
function functionbankadd(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['bankact/bankdetails']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>

<script>
function functionlesseexp(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['lesseeaction/search']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionsellerexp(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['buyeraction/search']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionaddproperty(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addproperty/create']) ?>?id='+str+'', '_blank');
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
