<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\Applicationform;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

?>
<?php $data = \common\models\LunchCalendar::find()->select('event_title')->distinct()->where(['calendarDataConfigID'=>1])->all(); ?>
    
  


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="ajNXYkMtdFIZfBFRMhhNBVJYOgsafisVEGAvKAAZFTUbYwRVEmwZKA==">
    <title>Saarthee- The School ERP System</title>
    <link href="/backend/web/assets/e688a00c/css/bootstrap.css" rel="stylesheet">
<link href="/backend/web/assets/9196acac/css/kv-widgets.min.css" rel="stylesheet">
<link href="/backend/web/assets/b893ab2b/css/select2.min.css" rel="stylesheet">
<link href="/backend/web/assets/b893ab2b/css/select2-addl.min.css" rel="stylesheet">
<link href="/backend/web/assets/b893ab2b/css/select2-krajee.min.css" rel="stylesheet">
<link href="/backend/web/assets/d13a7b93/themes/smoothness/jquery-ui.css" rel="stylesheet">
<link href="/backend/web/assets/f7b7a0e8/css/font-awesome.min.css" rel="stylesheet">
<link href="/backend/web/assets/d0873bd3/css/AdminLTE.min.css" rel="stylesheet">
<link href="/backend/web/assets/d0873bd3/css/skins/_all-skins.min.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/morris/morris.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet">
<link href="/backend/web/assets/global/css/components.css" rel="stylesheet">
<link href="/backend/web/assets/global/css/plugins.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet">
<link href="/backend/web/assets/global/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet">
<link href="/backend/web/assets/admin/layout2/css/layout.css" rel="stylesheet">
<link href="/backend/web/assets/admin/layout2/css/themes/dark.css" rel="stylesheet">
<link href="/backend/web/assets/admin/layout2/css/custom.css" rel="stylesheet">
<link href="/backend/web/assets/admin/pages/css/export.css" rel="stylesheet">
<link href="/backend/web/assets/admin/pages/css/profile.css" rel="stylesheet">
<script src="/backend/web/assets/6dea33b7/jquery.js"></script>
<script src="/backend/web/assets/25641ffb/yii.js"></script>
<script src="/backend/web/assets/d13a7b93/jquery-ui.js"></script>
<script src="/backend/web/assets/e688a00c/js/bootstrap.js"></script>
<script src="/backend/web/assets/67bcc551/jquery.slimscroll.min.js"></script>
<script src="/backend/web/assets/d0873bd3/js/app.min.js"></script>

<script type="text/javascript">var s2options_ae5051fd = {"themeCss":".select2-container--krajee","sizeCss":"","doReset":true,"doToggle":true,"doOrder":true};
var select2_e1d96cde = {"tags":true,"maximumInputLength":100,"theme":"krajee","width":"100%","placeholder":"Select a menu ...","language":"en-US"};
</script>
</head>

	  
	 



		
		
<?php
 $adermaindate= $aderdate;

 $ngendate= date("d F Y ", strtotime("$adermaindate"));
 
 $nsd= date("m/d/Y", strtotime("$adermaindate"));

?>




<div style="height:100%; background-color:#FDC93E; height:30px;">

<div style="padding-top:5px; padding-left:9px;">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div style="padding-left:6px;"><font style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#535353; font-size:14px; font-weight:700;"><?php echo $ngendate ?></strong></font></font></td>
      <td><a onclick="document.getElementById('sambqwksukvveekmuzqtsimabbff').style.display='none';document.getElementById('sambqwksukvveekmuzqtsimaccff').style.display='none'" style="cursor:pointer;"><font style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#A3A3A3; font-size:14px; ">x</font></a></td>
    </tr>
  </table>
</div>

</div>




<div style="padding:20px;">
<div style=" border:1px solid #E1E1E1; border-radius:7px;">

<div style="padding-left:10%;padding-right:20px;padding-top:22px;padding-bottom:22px;">



<table width="100%" height="125" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17%" height="46" valign="middle" align="left"><font style="font-weight:700;">Menu Item</font></td>
    <td width="83%" valign="middle" align="left">
	
		<div style="padding-left:6px;">
		
           				
<?php 
	
echo Select2::widget([
    'name' => 'maineventtitle',
	'id'=>"maineventtitle",
    //'value' => $nsd, // initial value
   'data' =>[ArrayHelper::map($data ,'event_title','event_title')],	 
	 
	
    'maintainOrder' => true,
    'toggleAllSettings' => [
        'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Select All',
        'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Unselect All',
        'selectOptions' => ['class' => 'text-success'],
        'unselectOptions' => ['class' => 'text-danger'],
    ],
    'options' => ['placeholder' => 'Select a menu ...', 'multiple' => true,'format'=>'text',],
    'pluginOptions' => [
        'tags' => true,
        'maximumInputLength' => 100
    ],
]);?>         
    
        
											<!--<span class="help-block">
											Lunch Menu Item. </span>-->
</div>

	</td>
  </tr>
  <tr>
    <td height="42" valign="middle" align="left"><font style="font-weight:700;">Calendar Date</font></td>
    <td valign="middle" align="left">
	
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		 
        <a onmouseover="mab(1)"> <input type="text" id="maineventstartdate" name="maineventstartdate"  value="<?php echo $nsd ?>"  data-field="date" placeholder="Start Date" data-format="dd-MMM-yyyy"  readonly class="form-control" style="text-decoration:none;"  > </a>
	
		  </td>
          <td>
		  
	
            <input type="text" name="maineventendtime"  id="maineventendtime"  data-field="date" placeholder="Start Time" data-format="dd-MMM-yyyy"  readonly data-prompt-position="topLeft:-1,0"  style=" display:none;" class="form-control" > 
			
    
		  
		  </td>
        </tr>
      </table>
	  
	  	</td>
  </tr>
  <tr>
   <!-- <td valign="middle" align="left"><font style="font-weight:700;">End</font></td>
    <td valign="middle" align="left">
	
	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		 
	
           <a onmouseover="mab(2)"> <input type="text" id="maineventenddate" name="maineventenddate"  value="<?php echo $nsd ?>"  data-field="date" placeholder="Start Date" data-format="dd-MMM-yyyy"  readonly data-prompt-position="topLeft:-1,0" class="form-control"> </a>
			
    
		  </td>
          <td>
		  -->
	
            <input type="text" name="maineventendtime" id="maineventendtime" onChange="raft()"  data-field="date" placeholder="End Time"  data-format="dd-MMM-yyyy"  readonly data-prompt-position="topLeft:-1,0"  style=" display:none;" class="form-control"  > 
			
     
		  
		  </td>
        </tr>
      </table>
	  
	</td>
  </tr>
</table>


</div>
</div>

</div>






<div style="position:absolute; bottom:0%; right:0%;">

<div style="padding-bottom:4px; padding-right:4px;">

  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
     
	 <td align="left" valign="middle">
	 
	  <div class="btn btn-success"> 
	  <a onclick="document.getElementById('sambqwksukvveekmuzqtsimabbff').style.display='none';document.getElementById('sambqwksukvveekmuzqtsimaccff').style.display='none',nfak(1)" style="color:#FFFFFF; text-decoration:none;">Create</a>
	  </div>
	 </td>
	 
      <td align="left" valign="middle">
	  <div style="padding-left:3px;">
	   <div class="btn btn-success"> 
	  <a onclick="document.getElementById('sambqwksukvveekmuzqtsimabbff').style.display='none';document.getElementById('sambqwksukvveekmuzqtsimaccff').style.display='none'" style="color:#FFFFFF; text-decoration:none;">Close</a></div>
	  </div>
	 </td>
    </tr>
  </table>
    
</div>

</div>
 <div class="page-footer" style="display:none;">
        <div class="page-footer-inner"> 2015 &copy; Encriss
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
    <script src="/backend/web/assets/b893ab2b/js/select2.full.min.js"></script>
<script src="/backend/web/assets/b893ab2b/js/select2-krajee.min.js"></script>
<script type="text/javascript">jQuery(document).ready(function () {
if (jQuery('#maineventtitle').data('select2')) { jQuery('#maineventtitle').select2('destroy'); }
jQuery.when(jQuery('#maineventtitle').select2(select2_e1d96cde)).done(initS2Loading('maineventtitle','s2options_ae5051fd'));

});</script></body></html>
    </body>


