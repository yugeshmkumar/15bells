<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Invoice */


?>
<style>
@page{
    background-image:url("http://localhost/new15bells/newimg/img/invoice.jpg");
    background-image-resize:6;
}
</style>
<body style="width:100%;float:left;">
<div class="invoice_body" style="width:100%;float:left;">
	<div class="full_width">
		<div class="half_width" style="width:50%;float:left;font-family: 'Nunito Sans', sans-serif;">
			<p class="small_p" style="color:#c4984f;font-size:18px;font-family: 'Nunito Sans', sans-serif;">Invoice From</p>
			<h3 class="head_fnt" style="color:#221d36;font-size:24px;font-family: 'Nunito Sans', sans-serif;">15 Bells Limited</h3>
			<p class="detail_p" style="color:#221d36;font-size:18px;">Emaar Digital Greens<br>
						Tower A, Unit 909<br>
						Gurgaon 122018</p>
		</div>
		<div class="half_width" style="width:50%;float:left;text-align:right;font-family: 'Nunito Sans', sans-serif;">
			<p class="small_p" style="color:#c4984f;font-size:18px;">Invoice To</p>
			<h3 class="head_fnt" style="color:#221d36;font-size:24px;">Akhilesh Sharma</h3>
		</div>
	</div>
    <div style="width:100%;float:left;border-bottom:1px dashed #221d36;padding-top:50px;padding-bottom:10px;font-family: 'Nunito Sans', sans-serif;">
        <div style="width:40%;float:left;color:#221d36;">Description</div>
        <div style="width:20%;float:left;color:#221d36;">Amount</div>
        <div style="width:20%;float:left;color:#221d36;">Qty.</div>
        <div style="width:20%;float:left;color:#221d36;">Total</div>
    </div>
    
    <div style="width:100%;float:left;padding-top:30px;font-family: 'Nunito Sans', sans-serif;">
        <div style="width:40%;float:left;color:#221d36;">Scheduled for property visit</div>
        <div style="width:20%;float:left;color:#221d36;">Rs. 500</div>
        <div style="width:20%;float:left;color:#221d36;">1</div>
        <div style="width:20%;float:left;color:#221d36;">Rs. 500</div>
    </div>
    <div class="full_width">
    	<div class="half_width" style="width:60%;float:left;font-family: 'Nunito Sans', sans-serif;padding-top:70px;">
			<p class="small_p"><span style="color:#221d36;font-size:18px;font-family: 'Nunito Sans', sans-serif;">Invoice number: </span> <span class="color:#221d36;font-size:20px;font-family: 'Nunito Sans', sans-serif;font-weight:600;">#2019052345</span></p>
			<p class="small_p" style="padding-top:10px;"><span style="color:#221d36;font-size:18px;font-family: 'Nunito Sans', sans-serif;">Date:  </span> <span class="color:#221d36;font-size:20px;font-family: 'Nunito Sans', sans-serif;font-weight:600;">April 08, 2019</span></p>
		</div>
		<div class="half_width" style="width:40%;text-align:right;float:left;font-family: 'Nunito Sans', sans-serif;padding-top:70px;">
			<div style="width:100%;float:left;border-bottom:1px dashed #221d36;">
				<p class="small_p" style="width:50%;float:left;text-align:left;color:#221d36;font-size:18px;font-family: 'Nunito Sans', sans-serif;padding-right:50px">Subtotal:</p> <p class="width:50%;float:left;color:#221d36;font-size:20px;font-family: 'Nunito Sans', sans-serif;font-weight:600;">Rs. 500.00</p>
				<p class="small_p" style="width:50%;float:left;text-align:left;color:#221d36;font-size:18px;font-family: 'Nunito Sans', sans-serif;">Tax:  </p> <p class="width:50%;float:left;color:yellow;font-size:20px;font-family: 'Nunito Sans', sans-serif;font-weight:600;">Rs. 0.00</p>
			</div>
			<div style="width:100%;float:left;">
				<p class="small_p" style="width:50%;float:left;text-align:left;color:#221d36;font-size:18px;font-family: 'Nunito Sans', sans-serif;">Total Amount Paid  </p> <p class="width:50%;float:left;color:yellow;font-size:20px;font-family: 'Nunito Sans', sans-serif;font-weight:600;">Rs. 500.00</p>
			</div>
		</div>
	</div>
	<div style="width:100%;float:left;padding-top:50px;font-family: 'Nunito Sans', sans-serif;">
		<p class="detail_p" style="color:#221d36;font-size:18px;">Authorised Signatory</p>
    </div>
</div>
