<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\db\Query ;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\editable\EditableAsset;
use common\models\User;

$urlsd =   Yii::getAlias('@frontendUrl');


$this->title = 'Request Site Visits';
$this->params['breadcrumbs'][] = $this->title;

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(isset($_SESSION['requestids'])){
           
  $requestids =  $_SESSION['requestids'];
    $amount_payable =  $_SESSION['amount_payable'];

}else{

	return Yii::$app->response->redirect(['']);
}


?>

<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#ffffff; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>
<style>
	.doc_pric{
		font-family: 'Open Sans', sans-serif;
		font-size:25px;
		padding:10px;
		background:#0fd8da;
		color:#ffffff;
	}
	.details_label{
		text-align:left !important;
		margin-top:20px;
		margin:20px 0 0 !important;
	}
	.full_wdth{
		width:100%;
	}
	.img_p{
		width: 120px;
    height: 110px;
    background: #0fd8da;
    margin: 0 auto;
    border-radius: 10px;
	}
	.brdr_btm{
		border-bottom:2px solid #0fd8da;
	}
	.brdr_rite{
		border-right:2px solid #0fd8da;
	}
	.p_txt{
		font-size:13px;
		font-family: 'Open Sans', sans-serif;
	}
	.sbmt_div{
		    background: #0fd8da;
    padding: 5px 10px;
    border-radius: 1px 0px 10px 10px;
	}
</style>

<!-- POPOVER Content Ends-------------->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<!--CHECKOUT DESIGN-->
<?php 


 $arrcheckrole = \common\models\RequestSiteVisit::find()->where(['request_id'=>$requestids])->one();
 $user_ids = $arrcheckrole->user_id;
 $property_id = $arrcheckrole->property_id;
 $propidss = 273 * 179 - $property_id;
 $newproidname = 'PR'.$propidss;

 $arrcheckrole1 = \common\models\User::find()->where(['id'=>$user_ids])->one();
 $name = $arrcheckrole1->fullname.''.$arrcheckrole1->lastname;
 $email = $arrcheckrole1->email;
 $phonenumber = $arrcheckrole1->username;
 
 


?>

<!--CHECKOUT DESIGN ENDS-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>15bells Site visit payment</title>
</head>
<script>

function autoPop(){
	document.getElementById("orderId").value= "ZPLive" + String(new Date().getTime());	//	Autopopulating orderId
	var today = new Date();
	var dateString = String(today.getFullYear()).concat("-").concat(String(today.getMonth()+1)).concat("-").concat(String(today.getDate()));
	document.getElementById("txnDate").value= dateString;
};

function submitForm(){
			var form = document.forms[0];
			form.action = "posttozaakpay";
			form.submit();
			}
</script>
<style type="text/css">
.center{ width:800px; margin:0 auto;}
.ecssing{width:790px;float:left;padding:15px 0 30px 10px;margin:10px 0 30px 0;filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7fbfc', endColorstr='#e9f0f2'); /* for IE */ /* for webkit browsers */ /* for firefox 3.6+ */	-webkit-border-radius:5px;-moz-border-radius:5px;-o-border-radius:5px;border-radius:5px;}
.ecssing h2 {padding:0px;margin:0px 0 10px 0;font:bold 30px Calibri, Arial, Helvetica, sans-serif;text-align:Center;color:#000000;}
.ecssing p {padding:0px;margin:0px 0 20px 0;font:bold 14px  Arial, Helvetica, sans-serif;text-align:Center;	color:#000000;}
label {padding:15px 0px 5px 0; margin:0px;width:225px; float:left;font:normal 14px Arial, Helvetica, sans-serif !important;text-align:left;color:#000000;}
input {border:1px solid #848484; border-top:2px solid #848484;	background-color:#FFFFFF;padding:2px 2px; margin:0px 0 3px 0;width:200px;color:#000000;font:normal 12px Arial, Helvetica, sans-serif;text-align:left;	height:18px;}
 select {border:1px solid #848484; border-top:2px solid #848484;	background-color:#FFFFFF;padding:2px 1px 2px 2px; margin:0px 0 3px 0;width:204px;color:#000000;font:normal 12px Arial, Helvetica, sans-serif;text-align:left;	}
 .boxes {width:auto;margin:0;padding:5px 15px;text-align:center;	-webkit-border-radius: 7px;-moz-border-radius: 7px;-o-border-radius: 7px;-border-radius: 7px;text-decoration:none !important;font:bold 20px/22px Arial, Helvetica, sans-serif;color:#ffffff !important;background-color:#558a04; /* for non-css3 browsers */filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#83d801', endColorstr='#558a04'); /* for IE */background: -webkit-gradient(linear, left top, left bottom, from(#83d801), to(#558a04)); /* for webkit browsers */background: -moz-linear-gradient(top, #83d801, #558a04); /* for firefox 3.6+ */
	behavior: url(border-radius.htc);}
.boxes a {font:bold 20px/22px Arial, Helvetica, sans-serif;	text-align:center;color:#ffffff !important;	text-decoration:none !important;}
.boxes a:hover {text-decoration:none !important;}
</style>



<body onload="autoPop();">
<div class="col-md-9">

<div class="center">
<div class="ecssing">

<?php $form = ActiveForm::begin(['method' => "POST",'action'=>"posttozaakpay"]); ?>


<div class="row">

	
	
	<input type="hidden" name="merchantIdentifier" value="30dfb06e9d39473190a5cc4197f7e2e6" />

<div class="col-md-6">	
<p class="details_label text-left">Order Id</p>
	<input type="text" class="input_desgn form-control" id="orderId" name="orderId" />
</div>
<!-- <tr>
	<td width="50%" align="right" valign="middle">return url(Optional)</td>
	<td width="50%" align="center" valign="middle"><input type="text" name="returnUrl" value=""/></td>
</tr> -->

	 <input type="hidden" name="returnUrl" value="https://www.15bells.com/request-sitevisit/response"/>

<div class="col-md-6">	
<p class="details_label text-left">Buyer Email</p>
	<input type="text" class="input_desgn form-control" name="buyerEmail" value="<?php echo $email; ?>"  />
</div>
<div class="col-md-6">	
<p class="details_label text-left">Buyer First Name</p>
<input type="text" class="input_desgn form-control" name="buyerFirstName" value="<?php echo $name; ?>" /> 
</div>

	<input type="hidden" name="buyerLastName" value="" />

	<input type="hidden" name="buyerAddress" value="" />

	<input type="hidden" name="buyerCity" value="" />


	<input type="hidden" name="buyerState" value="" />


	<input type="hidden" name="buyerCountry" value="" />


	<input type="hidden" name="buyerPincode" value="" />

<div class="col-md-6">
<p class="details_label text-left">Buyer Phone No</p>
<input type="text" class="input_desgn form-control" name="buyerPhoneNumber" value="<?php echo $phonenumber; ?>" />
</div>
	
	
	<input type="hidden" name="txnType" value="1" />


	
	<input type="hidden" name="zpPayOption" value="1" />


	
	<input type="hidden" name="mode" value="1" />


	<input type="hidden" name="currency" value="INR" />

<div class="col-md-6">	
<p class="details_label text-left">Amount In Paisa</p>
<input type="text" class="input_desgn form-control" name="amount" value="<?php echo $amount_payable; ?>" /> 
</div>

	<input type="hidden" name="merchantIpAddress" value="127.0.0.1" />


	<input type="hidden" name="purpose" value="1" />


<div class="col-md-6">	
<p class="details_label text-left">Property ID</p>
	<input type="text" class="input_desgn form-control" name="productDescription" value="<?php echo $newproidname; ?>" /> 
</div>

<!-- <tr>	
	<td width="50%" align="right" valign="middle">Product1 Description</td>
	<td width="50%" align="center" valign="middle"> </td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="product1Description" /> -->

<!-- <tr>	
	<td width="50%" align="right" valign="middle">Product2 Description</td>
	<td width="50%" align="center" valign="middle"> </td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="product2Description" /> -->

<!-- <tr>	
	<td width="50%" align="right" valign="middle">Product3 Description</td>
	<td width="50%" align="center" valign="middle"> </td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="product3Description" /> -->

<!-- <tr>	
	<td width="50%" align="right" valign="middle">Product4 Description</td>
	<td width="50%" align="center" valign="middle"> </td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="product4Description" /> -->

<!-- <tr>
	<td width="50%" align="right" valign="middle">Ship To Address</td>
	<td width="50%" align="center" valign="middle"> </td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="shipToAddress" /> -->

<!-- <tr>
	<td width="50%" align="right" valign="middle">Ship To City</td>
	<td width="50%" align="center" valign="middle"> </td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="shipToCity" /> -->

<!-- <tr>
	<td width="50%" align="right" valign="middle">Ship To State</td>
	<td width="50%" align="center" valign="middle"></td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="shipToState" /> -->

<!-- <tr>	
	<td width="50%" align="right" valign="middle">Ship To Country</td>
	<td width="50%" align="center" valign="middle"> </td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="shipToCountry" /> -->

<!-- <tr>
	<td width="50%" align="right" valign="middle">Ship To Pincode</td>
	<td width="50%" align="center" valign="middle"> </td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="shipToPincode" /> -->

<!-- <tr>
	<td width="50%" align="right" valign="middle">Ship To Phone Number</td>
	<td width="50%" align="center" valign="middle"> </td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="shipToPhoneNumber" /> -->

<!-- <tr>
	<td width="50%" align="right" valign="middle">Ship To Firstname</td>
	<td width="50%" align="center" valign="middle"></td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="shipToFirstname" /> -->

<!-- <tr>
	<td width="50%" align="right" valign="middle">Ship To Lastname</td>
	<td width="50%" align="center" valign="middle"></td>
</tr> -->
<!-- Not mandatory <input type="hidden" name="shipToLastname" /> -->


	<input type="hidden" name="txnDate" id="txnDate" />

</div>
		<p class="" style="cursor:pointer; padding-top: 25px; ">	
			<a class="boxes" onclick="javascript:submitForm()">Pay Now
			</a>
		</p>



</div>

                <?php ActiveForm::end(); ?>

</div>
</div>

		
</div>		
</body>

</html>
