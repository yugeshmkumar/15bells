 <?php
$fromdate= $_GET["fromdate"];
$todate= $_GET["todate"];

?>

<?php $arrdata = \common\models\Schoolcalendar::find()
->where('(DATE(fromdatetime) >=:var1 and Date(todatetime) <=:var2)',array(':var1'=>$fromdate ,':var2'=>$todate))
->all(); 

?>
    
  
<?php 
foreach($arrdata as $onedata){
	$onedata->delete();
	?>

<?php	

}?>
 <li class="list-group-item bg-red bg-font-yellow"> <strong><font size="4dp"><i class="fa fa-thumbs-o-up"></i> Successfully Deleted! </strong> </li>
 