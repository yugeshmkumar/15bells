<?php

$findleadrequest = \common\models\LeadsSales::find()->where(['id'=>$id])->one();
$leadassigned = \common\models\LeadassignmentSales::find()->where(['id'=>$id])->one();
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
$rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>$assgnid])->one();
	
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
				<tr>
                    <td >1</td>
					<td><?php echo \common\models\User::findOne($assgnid)->email ?></td>
					
					<td >View and Manage Property</td>
					
					<td>0%</td>

					<td>


<a onclick ="functionviewprop(<?php echo $findleadrequest->user_id ?>)"  class="btn btn-icon-only blue"> <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="As&nbsp;Lessor"></i></a>
 

					<a onclick ="functionviewprop1(<?php echo $findleadrequest->user_id ?>)"  class="btn btn-icon-only blue"> <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="As&nbsp;Seller"></i></a>


					</td>
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
function functionviewprop(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addproperty/lessor']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionviewprop1(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addproperty/sellor']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionprofileplus(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['usersprofile/postlogin']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
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
function functionlesseexp(str,leadid)
{
	//alert(leadid);
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['lesseeaction/search']) ?>?id='+str+'&l_id='+leadid+'', '_blank');
  win.focus();
}
</script>
<script>
function functionsellerexp(str,leadid)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['buyeraction/search']) ?>?id='+str+'&l_id='+leadid+'', '_blank');
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
function functionaddproperty1(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addproperty/creates']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionshortlist(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>?userid='+str+'', '_blank');
  win.focus();
}
function functionshortlist1(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['lesseeaction/index1']) ?>?userid='+str+'', '_blank');
  win.focus();
}
</script>
