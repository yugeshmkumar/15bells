<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\Applicationform;
use common\models\lunch_calendar;
use common\models\lunch_handels;
?>



<?php if($view==1){  ?>
<?php $evtit ?>

<?php $evsta ?>

<?php $evend ?>



<?php   $startnsd= date("Y-m-d", strtotime("$evsta"));
$endnsd= date("Y-m-d", strtotime("$evend"));
 ?>

<?php
$schoolcalendat = new \common\models\Schoolcalendar();
$schoolcalendat->entry_type=$evtid;
$schoolcalendat->schoolsub_catID=1;
$schoolcalendat->fromdatetime=$startnsd;
$schoolcalendat->todatetime=$endnsd;
$schoolcalendat->publish="parents";
$schoolcalendat->save();
?>

<?php } ?>







<?php
 $satay=date("Y");
  $nxsatay=date("Y")+1;
 ?>

<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-calendar"></i> School Calendar
								</div>
								 <div class="actions">
								
			<select aria-label="Month" name="birthday_month" onchange="nfak2(2)" id="birthday_month" title="Month" style="font-family:Arial, Helvetica, sans-serif; width:130px;" class="form-control input-inline input-sm input-small" ><option value="1" <?php if($evmon=='1') { ?> selected <?php } ?>>Jan</option><option value="2" <?php if($evmon=='2') { ?> selected <?php } ?>>Feb</option><option value="3" <?php if($evmon=='3') { ?> selected <?php } ?>>Mar</option><option value="4" <?php if($evmon=='4') { ?> selected <?php } ?>>Apr</option><option value="5" <?php if($evmon=='5') { ?> selected <?php } ?>>May</option><option value="6" <?php if($evmon=='6') { ?> selected <?php } ?>>Jun</option><option value="7" <?php if($evmon=='7') { ?> selected <?php } ?>>Jul</option><option value="8" <?php if($evmon=='8') { ?> selected <?php } ?>>Aug</option><option value="9" <?php if($evmon=='9') { ?> selected <?php } ?>>Sep</option><option value="10" <?php if($evmon=='10') { ?> selected <?php } ?>>Oct</option><option value="11" <?php if($evmon=='11') { ?> selected <?php } ?>>Nov</option><option value="12" <?php if($evmon=='12') { ?> selected <?php } ?>>Dec</option></select>
							 <select aria-label="Year" name="birthday_year" onchange="nfak2(2)" id="birthday_year" title="Year" style="font-family:Arial, Helvetica, sans-serif; width:130px;" class="form-control input-inline input-sm input-small" >
 
 <?php while($sd<100){ ?>	
 
 <?php $lsd=$nxsatay-$sd; ?>   
	   <option value="<?php echo $lsd ?>" <?php if($lsd==$evyer) { ?> selected <?php } ?>><?php echo $lsd ?></option>
	   
	   
	   <?php $sd++; } ?>
	   
	   </select>

<a onclick="document.getElementById(&#39;popupfive&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;popupsix&#39;).style.display=&#39;block&#39;,Cleardatafortheselectedmonth(1)"><button type="button" class="btn btn-primary" ><i class="fa fa-recycle"></i> Clear Data</button></a>
                          
	   
</div>
							</div>
							<div class="portlet-body">
 


<?php
include('libs/donatj/SimpleCalendar2.php');
$calendar = new SimpleCalendar();
$calendar->setStartOfWeek('Sunday');

$qmsite = \common\models\Schoolcalendar::find()
    ->where(['isactive' => 1])
    ->all();
	
	foreach($qmsite as $dsd){
	
	$typev=$dsd->entry_type;
	
	if($typev!=''){
	$pcus = \common\models\Entrytypconfig::find()
    ->where(['id' => $typev])
    ->one();
	}

if($typev!=''){
$calendar->addDailyHtml( $pcus->entryname, $dsd->fromdatetime,$dsd->todatetime);
}
else{
$calendar->addDailyHtml( "Not Set", $dsd->fromdatetime,$dsd->todatetime);
}

}
$calendar->show(true);
?>

</div></div>
