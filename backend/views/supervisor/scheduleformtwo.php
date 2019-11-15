<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\academic_year;
use common\models\application_status;
use common\models\User;
use common\models\application_scheduling;
use common\models\statusconfig;
use common\models\event_config;
use common\models\event_attendes;
use common\models\website_title;
?>






<?php
 $totalchk=$_GET["requestid"];
 $refstr=$_GET["refstr"];
?>



<style>

   
  select {
  
    border: 1px solid #111;
   background: transparent;
   width:100%;
   padding: 5px 35px 5px 5px;
   font-size: 16px;
   border: 1px solid #ccc;
   height: 34px;
   -webkit-appearance: none;
   -moz-appearance: none;
   font-family:Arial, Helvetica, sans-serif;
   font-size:12px;
   appearance: none;
    background: url(grs/dpick.png) 96% / 3% no-repeat #fefefe;
} 
/*target Internet Explorer 9 and Internet Explorer 10:*/
@media screen and (min-width:0\0) { 
    select {
        background:none;
        padding: 5px;
    }
}


    

</style>

 <div style="height:100%; background-color:#FDC93E; height:30px; border-bottom:1px solid #dedede;">
<div style="padding-top:6px; padding-left:9px;">
<font style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFFF; font-size:14px; font-weight:700;">Schedule Applicants</strong></font>
</div>
</div>

<div align="center" style="width:100%;">
<div style="padding:10px; background-color:#FFD2D2; border-bottom:1px solid #FF884F;">
You Have Selected <strong>1</strong> Applicant
</div>
</div>


<div style="padding-top:6%;"></div>


<input type="hidden" name="holder" id="holder" value="<?php echo $refstr ?>"  />

<?php
$sitecvb = User::find()
    //->where(['type' => 'teacher'])
    ->orderBy('id desc')
    ->all();
	?>
	
	<div style="padding-left:14%; padding-right:14%;">
	
<div align="center"><a onclick="cslotwo(<?php echo $refstr ?>,<?php echo $totalchk ?>),document.getElementById('createslotsambqwksukvveekmuzqtsimabbff').style.display='block';document.getElementById('cretaeslotsambqwksukvveekmuzqtsimaccff').style.display='block'" style="cursor:pointer; text-decoration:none; color:#3b5998;">Create a new Slot</a></div>

<div id="csolo1uu">
<?php
$getslot = event_config::find()
    ->where(['myid' => Yii::$app->user->identity->id , 'event_holder_id' => $refstr,'request_doc_id'=>$totalchk])
    ->orderBy('id desc')
    ->all();
	?>
	<div style="display:none;">
	<input type="text" name="requestid" id="requestid" value="<?php echo $totalchk ?>" >
	</div>
	
	<select   name="selectslot"  id="selectslot" class="form-control"  >
	<option value="" >Select Slot</option>
	<?php foreach($getslot as $rds){ ?>
	<?php
	$ebbcoud1 = event_attendes::find()
	->where(['slot_id' => $rds->id , 'addnew' => '1' ])
    ->count();
	
	$totleft=$rds->slot_capacity-$ebbcoud1;
	if($totleft<0){
	$settot=abs($totleft);
	}
	else{
	$settot=$totleft;
	
	}
	$datone = date_create($rds->from_datetime);
	$finaldateone = date_format($datone,'d-M-Y h:i a');
	$dattwo = date_create($rds->todate_time);
	$finaldatetwo = date_format($dattwo,'d-M-Y h:i a');
	?>
	<option value="<?php echo $rds->id ?>"><?php echo $rds->venue ?> &nbsp;&nbsp;(start: <?php echo $finaldateone ?> , end : <?php echo $finaldatetwo ?>)</option>
	<?php } ?>
	</select>
	
	</div>
	
	
	
	<div style="padding-top:3%;">&nbsp;</div>
	
	  
	  </div>
	
<div style="position:absolute; bottom:0%; right:0%;"> <div style="padding-bottom:4px; padding-right:4px;"> <table width="100%" border="0" cellpadding="0" cellspacing="0"> <tr> <td align="left" valign="middle">
<?php echo Html::Button('Send',['class'=>'acceptbut','name'=>'createslot','onClick'=>"return jamsslot('createslottwo')",'class'=>'btn btn-success']);?>
</td> <td align="left" valign="middle">

<div style="padding-left:3px;">
<?php echo Html::Button('Close',['class'=>'acceptbut','onClick'=>"document.getElementById('slotsambqwksukvveekmuzqtsimabbff').style.display='none';document.getElementById('slotsambqwksukvveekmuzqtsimaccff').style.display='none'",'class'=>'btn btn-success']);?>
</div>
</td> </tr> </table> </div></div>