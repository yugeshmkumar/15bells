<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Addproperty */

$this->title = 'TRANSACTION';
$this->params['breadcrumbs'][] = ['label' => 'Addproperties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.online_icon{
	width: 150px;
    height: 150px;
    margin: 0 auto;
    border: 2px solid #fff;
    background: transparent;
    border-radius: 50% !important;
    color: #fff !important;
    font-size: 30px;
       padding-top: 10px;
    letter-spacing: 1px;
    transition: .4s;
    padding-right: 20px;
	}
.online_src:hover .online_icon{
	background:rgba(255,255,255,0.25);
	transition:.4s;
	border:2px solid #e5ac31 !important
	}
	
.offline_icon{
	width: 150px;
    height: 150px;
    margin: 0 auto;
       border: 2px solid #ffffff;
    background: transparent;
    border-radius: 50% !important;
    color: #fff !important;
    font-size: 30px;
    letter-spacing: 1px;
    transition: .4s;
	padding-top:5px;
	}
.offline_src:hover .offline_icon{
      background:rgba(255,255,255,0.25);
	transition:.4s;
	border-color:#e5ac31 !important;
	}
.hover_it{
	 background:rgba(255,255,255,0.25);
	transition:.4s;
	border-color:#e5ac31 !important;
}
.hover_text{
	color: #fff!important;
		border-color:#e5ac31 !important;
		background:#e5ac31 !important;
		transition:.4s;
}
	.visit_site{
		border-bottom:3px solid #e9b739 !important;
		color:#ffffff;
		padding-bottom:10px;
	}
	.text_site{
		    color: #fff!important;
    font-size: 20px;
    letter-spacing: 1px;
    width: 70%;
    border: 1px solid #fff;
    margin: 20px auto;
    border-radius: 5px !important;
	padding:3px;
	transition:.4s;
	}
	.online_src:hover .text_site{
		color: #fff!important;
		border-color:#e5ac31 !important;
		background:#e5ac31 !important;
		transition:.4s;
	}
	.offline_src:hover .text_site{
		color: #fff!important;
		border-color:#e5ac31 !important;
		background:#e5ac31 !important;
		transition:.4s;
	}
	
	a{
		text-decoration:none !important;
	}
	.table_online thead{
		    background-color: #d4d4d4;
			color: #000!important;
	}
	.table_online tbody{
		background:rgba(255,255,255,0.30);
		color:#ffffff !important;
	}
	.btn{
		border-radius:5px !important;
	}
</style>
<div class="col-md-9">

	<div class="row">
	<h3 class="visit_site caption-subject bold uppercase">TRANSACTION</h3>
		<div class="col-md-12" style="padding-top:40px;">
		<!--<div class="col-md-6">	
			<img src="<?= Yii::$app->request->baseUrl . '/dashimages/online.png' ?>" width="150">
		</div>
		<div class="col-md-6">	
			<img src="<?= Yii::$app->request->baseUrl . '/dashimages/offline.png' ?>" width="150">
		</div>-->
			
			<div class="col-md-4 text-center online_src">
				<a href="javascript:void(0)" class="on_line">
					<div class="online_icon">
					<p><img src="<?= Yii::$app->request->baseUrl . '/dashimages/smartphone.png' ?>" width="80"></p>
				</div>
				<p class="text_site on_text">Documents Show</p>
				</a>
			</div>
			<div class="col-md-4 text-center offline_src">
				<a href="javascript:void(0)" class="off_line"><div class="offline_icon">
					<p><img src="<?= Yii::$app->request->baseUrl . '/dashimages/parking.png' ?>" width="80"></p> 
				</div>
				<p class="text_site off_text">Site Visit</p>
				</a>
			</div>
			<div class="col-md-4 text-center offline_src">
				<a href="javascript:void(0)" class="emd_line">
				<div class="offline_icon">
					<p><img src="<?= Yii::$app->request->baseUrl . '/dashimages/parking.png' ?>" width="80"></p> 
				</div>
				<p class="text_site off_text">EMD</p>
				</a>
			</div>
		</div>
	</div>
	<div class="row online_row" style="padding-top:60px;"> 
	
		<div class="col-md-12">
			<table class="table table-bordered table_online">
				<thead>
				  <tr>
					<th>Property ID</th>
					<th>Created Date</th>
					<th>Scheduled Date</th>
					<th>Pay Now</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>ABH11234</td>
					<td>12/08/2017</td>
					<td>12/08/2017</td>
					<td><button type="button" class="btn btn-warning">Pay Now</button></td>
				  </tr>
				  <tr>
					<td>ABH11234</td>
					<td>12/08/2017</td>
					<td>12/08/2017</td>
					<td><button type="button" class="btn btn-warning">Pay Now</button></td>
				  </tr>
				  <tr>
					<td>ABH11234</td>
					<td>12/08/2017</td>
					<td>12/08/2017</td>
					<td><button type="button" class="btn btn-warning">Pay Now</button></td>
				  </tr>
				</tbody>
			</table>
		</div>
	
	</div>
	<div class="row offline_row" style="padding-top:60px;">
	
		<div class="col-md-12">
			<table class="table table-bordered table_online">
				<thead>
				  <tr>
					<th>Property ID</th>
					<th>Created Date</th>
					<th>Scheduled Date</th>
					<th>Pay Now</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>123311312</td>
					<td>12/08/2017</td>
					<td>12/08/2017</td>
					<td><button type="button" class="btn btn-warning">Pay Now</button></td>
				  </tr>
				  <tr>
					<td>ABH11234</td>
					<td>12/08/2017</td>
					<td>12/08/2017</td>
					<td><button type="button" class="btn btn-warning">Pay Now</button></td>
				  </tr>
				  <tr>
					<td>ABH11234</td>
					<td>12/08/2017</td>
					<td>12/08/2017</td>
					<td><button type="button" class="btn btn-warning">Pay Now</button></td>
				  </tr>
				</tbody>
			</table>
		</div>
	
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
		$(".offline_row").hide();
		$(".online_row").hide();
	$(".on_line").click(function(){
		$(".online_icon").addClass("hover_it");
		$(".on_text").addClass("hover_text");
		$(".offline_icon").removeClass("hover_it");
		$(".off_text").removeClass("hover_text");
		$(".offline_row").hide();
		$(".online_row").show();
		
	});
	$(".off_line").click(function(){
		$(".offline_row").show();
		$(".online_row").hide();
		$(".offline_icon").addClass("hover_it");
		$(".off_text").addClass("hover_text");
		$(".online_icon").removeClass("hover_it");
		$(".on_text").removeClass("hover_text");
	});
	});
</script>