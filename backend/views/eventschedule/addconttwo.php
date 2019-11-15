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
use common\models\event_organizers;

use common\models\event_attendes;
use common\models\event_handels;
use common\models\event_calendar;

?>


<?php
/* @var $this yii\web\View */
$this->title = '15bells';
 
?>

	
		  
<?php
$evname= $_GET["evname"];
$evfromd= $_GET["evfromd"];
$evtomd= $_GET["evtomd"];
$evdes= $_GET["evdes"];
$evven= $_GET["evven"];
$evcap= $_GET["evcap"];
$evorg= $_GET["evorg"];
$refstr= $_GET["refstr"];
$requestid = $_GET['requestid'];

$string=$evfromd;
$first = current(explode("/", $string));
 $nsd1= date("Y-m-d", strtotime("$first"));
 
 $string2=$evtomd;
$first2 = current(explode("/", $string2));
 $nsd2= date("Y-m-d", strtotime("$first2"));




?>


<?php
$qqaucust = new event_config();
$qqaucust->myid = Yii::$app->user->identity->id;
$qqaucust->slot_name = $evname;
$qqaucust->request_doc_id=$requestid;
$qqaucust->slot_description = $evdes;
$qqaucust->from_datetime = $evfromd;
$qqaucust->todate_time = $evtomd;
$qqaucust->slot_capacity = $evcap;
$qqaucust->event_holder_id = $refstr;
$qqaucust->slot_used="docshow";
$qqaucust->venue = $evven;
$qqaucust->save();



$qms = event_config::find()
    ->orderBy('id desc')
    ->one();
	 $lastidmain=$qms->id;
	 
	 $vqqaucust = new event_organizers();
$vqqaucust->slot_id = $lastidmain;
$vqqaucust->teacher_id = $evorg;
$vqqaucust->status = 'active';
$vqqaucust->save();


 $nabevent = new event_handels();
$nabevent->event_name = $evname;
$nabevent->event_description = $evdes;
$nabevent->save();

$qmsqq = event_handels::find()
    ->orderBy('id desc')
    ->one();
	 $lastid=$qmsqq->id;
	 

$nabcal = new event_calendar();
$nabcal->event_start_date = $nsd1;
$nabcal->event_end_date = $nsd2;
$nabcal->event_create_id = Yii::$app->user->identity->id;
$nabcal->whoid = $evorg;
$nabcal->event_type_id = $lastid;
$nabcal->save();
	 
	 
?>







	


<?php
$getslot = event_config::find()
    ->where(['myid' => Yii::$app->user->identity->id , 'event_holder_id' => $refstr,'request_doc_id'=>$requestid])
    ->orderBy('id desc')
    ->all();
	?>
	<div style="display:none;">
	<input type="text" name="requestid" id="requestid" value="<?php echo $requestid ?>" >
	</div>
	
	
	
	
	
	<select aria-label="selectslot"   name="selectslot"  id="selectslot"  >
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
