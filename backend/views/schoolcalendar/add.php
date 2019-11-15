<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FeesforclassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendar';
$this->params['breadcrumbs'][] = $this->title;

use common\models\lunch_calendar;
use common\models\lunch_handels;
use kartik\widgets\Select2;
$this->registerCssFile('@web/libs/css/SimpleCalendar.css');
?>
<style>.rhamshapvveekmuzqtsblevbbff{ display:block; position:fixed; top:0; left:0; background-color: black; width:100%; height:100%; z-index:1800; -moz-opacity: 0.8; opacity:.80; filter: alpha(opacity=80); }</style> <span id="mestamj1"> </span>


<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffsp{display: none; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffsp {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="popupsix" class="viewpsambqwksukvveekmuzqtsblevbbffsp" onClick="" ></div> <div id="popupfive" class="viewpsambqwksukvveekmuzqtswhevbbffsp"  > <div class="viewpsambqwkstalkbubble" id="vpcobh180"></div> </div>


 <div id="kkcobh1">
	
	
	<?php
  $satad=date("m");
  $satay=date("Y");
  
  $nxsatay=date("Y")+1;
 
 ?>
	
	<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-calendar"></i> Moderator Calendar
								</div>
								 <div class="actions">
						
<select aria-label="Month" name="birthday_month" onChange="nfak2(2)" id="birthday_month" title="Month" style="font-family:Arial, Helvetica, sans-serif; width:100px;" class="form-control input-inline input-sm input-small">
    <option  value="0" >Select month..</option>  
	<option  value="1" <?php if($satad=='1') { ?> selected <?php } ?>>Jan</option>
     <option value="2" <?php if($satad=='2') { ?> selected <?php } ?>>Feb</option>
     <option value="3" <?php if($satad=='3') { ?> selected <?php } ?>>Mar</option>
     <option value="4" <?php if($satad=='4') { ?> selected <?php } ?>>Apr</option>
     <option value="5" <?php if($satad=='5') { ?> selected <?php } ?>>May</option>
     <option value="6" <?php if($satad=='6') { ?> selected <?php } ?>>Jun</option>
     <option value="7" <?php if($satad=='7') { ?> selected <?php } ?>>Jul</option>
     <option value="8" <?php if($satad=='8') { ?> selected <?php } ?>>Aug</option>
     <option value="9" <?php if($satad=='9') { ?> selected <?php } ?>>Sep</option>
     <option value="10" <?php if($satad=='10') { ?> selected <?php } ?>>Oct</option>
     <option value="11" <?php if($satad=='11') { ?> selected <?php } ?>>Nov</option>
     <option value="12" <?php if($satad=='12') { ?> selected <?php } ?>>Dec</option></select>
							<select aria-label="Year" name="birthday_year" onChange="nfak2(2)" id="birthday_year" title="Year" style="font-family:Arial, Helvetica, sans-serif; width:100px;" class="form-control input-inline input-sm input-small" >
 
 <?php while($sd<100){ ?>	
 
 <?php $lsd=$nxsatay-$sd; ?>   
	   <option value="<?php echo $lsd ?>" <?php if($lsd==$satay) { ?> selected <?php } ?>><?php echo $lsd ?></option>
	   
	   
	   <?php $sd++; } ?>
	   
	   </select>
<a onclick="document.getElementById(&#39;popupfive&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;popupsix&#39;).style.display=&#39;block&#39;,Cleardatafortheselectedmonth(1)"><button type="button" class="btn btn-primary" ><i class="fa fa-recycle"></i> Clear Data</button></a>
                          
	   
								</div>
							</div>
							<div class="portlet-body">
								
			
		
		
		<?php
/*
print_r(getdate());
*/
include('libs/donatj/SimpleCalendar.php');

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



</div>


</div></div>


   
<script>
function sad(str){

 document.getElementById('sambqwksukvveekmuzqtsimabbff').style.display='block';document.getElementById('sambqwksukvveekmuzqtsimaccff').style.display='block';
 cobha(str)
	  
}
</script>


<style>.sambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.sambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.60;filter: alpha(opacity=80);}.sambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:12%; bottom:10%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="sambqwksukvveekmuzqtsimaccff" class="sambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="sambqwksukvveekmuzqtsimabbff" class="sambqwksukvveekmuzqtswhevbbff"  > <div class="sambqwkstalkbubble" id="cobh1"></div> </div>







<script>
function cobha(str){
var mestamj1=$('#mestamj1');  
 mestamj1.html('<div id="rhamshapvveekmuzqtsimaccff" class="rhamshapvveekmuzqtsblevbbff" ><div align="center" style="position:relative; top:300px;"> <img src="<?php echo Yii::$app->request->baseUrl ?>/img/Preloader_1.gif" /></div></div>');
$.ajax({
type: "GET",
url: "<?php echo Yii::$app->urlManager->createUrl(["schoolcalendar/addevent"]) ?>?set="+str,
success: function(msg){
mestamj1.html('');
$('#cobh1').html(msg);
}});}
</script>



<script>
function nfak(str){
var sadmon=$('#birthday_month').val();
var sadyer=$('#birthday_year').val();
var evtit=$('#maineventtitle').val();
var evsta=$('#maineventstartdate').val();
var evend=$('#maineventenddate').val();
alert($('#maineventenddate').val());
var mestamj1=$('#mestamj1');  
 mestamj1.html('<div id="rhamshapvveekmuzqtsimaccff" class="rhamshapvveekmuzqtsblevbbff" ><div align="center" style="position:relative; top:300px;"> <img src="<?php echo Yii::$app->request->baseUrl ?>/img/Preloader_1.gif" /></div></div>');
$.ajax({
 type: "GET",
 url: "<?php echo Yii::$app->urlManager->createUrl(["schoolcalendar/eventad"]) ?>?evtit="+evtit+"&evsta="+evsta+"&evend="+evend+"&evmon="+sadmon+"&evyer="+sadyer+"&view="+str+"&calendarDataConfigID="+<?php echo $calendarDataConfigID ?>,
success: function(msg){
mestamj1.html('');
$('#kkcobh1').html(msg);
 }});}
</script>

<script>

function Cleardatafortheselectedmonth(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["schoolcalendar/cleardata"]) ?>?ref="+str,
                
                success: function(msg){
				
                    $('#vpcobh180').html(msg);
				
                  
                }

            });

}

</script>


<script>
function nfak2(str){
var sadmon=$('#birthday_month').val();
var sadyer=$('#birthday_year').val();
var mestamj1=$('#mestamj1');  
 mestamj1.html('<div id="rhamshapvveekmuzqtsimaccff" class="rhamshapvveekmuzqtsblevbbff" ><div align="center" style="position:relative; top:300px;"> <img src="<?php echo Yii::$app->request->baseUrl ?>/img/Preloader_1.gif" /></div></div>');
 $.ajax({
type: "GET",
url: "<?php echo Yii::$app->urlManager->createUrl(["schoolcalendar/eventdisp"]) ?>?evmon="+sadmon+"&evyer="+sadyer+"&view="+str+"&calendarDataConfigID="+<?php echo $calendarDataConfigID ?>,
 success: function(msg){
 mestamj1.html('');
$('#kkcobh1').html(msg);
 }});}
</script>