<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\academic_year;
use common\models\application_status;
use common\models\User;
use common\models\application_scheduling;
use common\models\statusconfig;

?>



<?php
$refstr=$_GET["refstr"];
$requestid=$_GET["requestid"];

?>


<style>

.fcd{
outline:0px solid #FFFFFF;


}
</style>



 <div style="height:100%; background-color:#77798E; height:30px;">
<div style="padding-top:8px; padding-left:9px;">
<font style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFFF; font-size:14px; font-weight:700;">Slot Setup</strong></font>
</div>
</div>

<?php
$sitecvb = \common\models\CompanyEmp::find()
    ->where(['isactive' => 1,'employee_typeID'=>1])
    ->orderBy('id desc')
    ->all();
	?>
	
	
<div style="padding:12px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
	
	<input type="hidden"  name="ev1" id="ev1" spellcheck="false" class="form-control" value="sitevisit" style="resize:none;" />
    
	
	<td>
	<label class="lable_popup">Venue / Place</label> 
	<input type="text"  name="ev5" id="ev5" spellcheck="false" class="form-control" style="resize:none;" />
	
	
	</td>
</tr>
</table>

<div style="padding-top:8px;"></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    	<td>
	
	<label class="lable_popup">From Date and time</label> 
	<a onclick="document.getElementById('cobcreateslotsambqwksukvveekmuzqtsimabbff').style.display='block';document.getElementById('cobcretaeslotsambqwksukvveekmuzqtsimaccff').style.display='block',faula()"><input type="datetime-local"  name="ev2" id="ev2" spellcheck="false" class="form-control" style="resize:none;" /></a></td>
	
    <td>
	<label class="lable_popup">To Date and time</label> 
	<a onclick="document.getElementById('cobcreateslotsambqwksukvveekmuzqtsimabbff').style.display='block';document.getElementById('cobcretaeslotsambqwksukvveekmuzqtsimaccff').style.display='block',faula()"><input type="datetime-local"  name="ev3" id="ev3" spellcheck="false" class="form-control" style="resize:none;" /></a></td>
  
   
  </tr>
</table>

<div style="padding-top:8px;"></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
	
	<input type="hidden"  name="ev6" id="ev6" spellcheck="false" class="form-control" style="resize:none;" />
	
    <td>
	<label class="lable_popup">Select Organiser</label> 
	<select  class="selectmow" aria-label="Month" name="ev7" onchange="nfak2(2)" id="ev7"  >
	<option value="">Select Organiser</option>
	<?php foreach($sitecvb as $das){  ?>
	<option value="<?php echo $das->id ?>"><?php echo $das->name ?>&nbsp;</option>
	<?php  } ?>
	</select>
	
	
	
	
	</td>
	<td><label class="lable_popup">Event Description</label> 
	
	<input name="ev4" id="ev4" spellcheck="false" class="form-control" style="resize:none;"/>
	</td>
  </tr>
</table>


</div>

	
<div style="position:absolute; bottom:0%; right:0%;"> <div style="padding-bottom:4px; padding-right:4px;"> <table width="100%" border="0" cellpadding="0" cellspacing="0"> <tr> <td align="left" valign="middle">
<a onclick="document.getElementById('createslotsambqwksukvveekmuzqtsimabbff').style.display='none';document.getElementById('createslotsambqwksukvveekmuzqtsimaccff').style.display='none',slotcont(<?php echo $refstr ?>,<?php echo $requestid ?>)">
<img src="<?php echo Yii::$app->request->baseUrl ?>/grs/mf1d.png" /></a></td> <td align="left" valign="middle"><a onClick="document.getElementById('createslotsambqwksukvveekmuzqtsimabbff').style.display='none';document.getElementById('createslotsambqwksukvveekmuzqtsimaccff').style.display='none'" style="cursor:pointer;"><img src="<?php echo Yii::$app->request->baseUrl ?>/grs/lad1.png" /></a></td> </tr> </table> </div></div>

