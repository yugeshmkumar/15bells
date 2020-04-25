<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ActiveDataProvider;
use yii\db\Query ;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;

$datas =  $dataProvider->getModels();
// echo '<pre>';print_r($datas);die;

?>
<style>
.winner_bg{
    background:#0e0e0e;
    padding:0;
    height:100vh;
}
.winner_bg img{
    margin-top:50px;
}
.lose_bg{
    background:#0e0e0e;
    padding:0;
    height:100vh;
}
.lost_head{
   font-size:70px;
   padding:50px 0 10px;
   color:#c4984f;
   font-weight:bold;
}



.thanks_bg{
		background-image:url("https://anayarealm.com/thanks.jpg");
		/* Full height */
  height: 100vh;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  overflow-x: hidden;
	}
	.succes_img{
	width:90px !important;
	}
	h1{
	    color: #fff;
    line-height: 37px;
    margin: 11px 0 23px 0;
    font-weight: 700;
    padding-left: 0px;
	font-size:50px;
	}
	.submision_p{
	    color: #fff;
    line-height: 37px;
    margin: 11px 0 23px 0;
    font-weight: 600;
    padding-left: 0px;
	font-size:30px;
	}
	.success_msg{
		position:absolute;
		left:0;
		top:20%;
	}
	.orange_clr{
	color:#c4984f;
	font-size:20px;
	}
	.white_clr{
	color:#ffffff;
	font-size:18px;
	}
	.contact_us{
	width:60%;
	margin:0 auto;}
	.link_new{
	color:#c4984f !important;
	font-size:20px;
	}
	.more_properties{
	margin-top:25px;}
	.mt-2{
	margin-top:25px;}
	@media screen and (max-width: 767px) {
	
	.success_msg{
		top:8%!important;
	}
	}
</style>

<?php 


foreach ($datas as $data){

    $loggedin=Yii::$app->user->identity->id;

if($data['buyer_id'] == $loggedin){

    ?>

<div class="container-fluid thanks_bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center success_msg">
						<p><img src="https://anayarealm.com/success.svg" class="succes_img"></p>
						<h1 class="mt-2">Thank you!</h1>
						<p class="submision_p mt-2">Your submission is received and we will contact you soon</p>
						<div class="contact_us mt-2">
							<div class="col-md-4 orange_clr text-right">You can reach us-</div>
							<div class="col-md-4 white_clr"><span class=""><img src="https://anayarealm.com/phone.svg" width="20"></span> 6209-151515</div>
							<div class="col-md-4 white_clr text-left"><span class=""><img src="https://anayarealm.com/email.svg" width="20"></span> enquiry@15bells.com</div>
							<div class="white_clr more_properties col-md-12 mt-3">
								Search more properties at <a href="https://www.15bells.com/" class="link_new">15bells</a>
							</div>
						</div>
					</div>
				</div>
			</div>
	  </div>



  

   <?php  } if($data['product_id'] == $loggedin){  ?>


	<div class="container-fluid thanks_bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center success_msg">
						<p><img src="https://anayarealm.com/success.svg" class="succes_img"></p>
						<h1 class="mt-2">Thank you!</h1>
						<p class="submision_p mt-2">Your Quotation is received and Your Account manager will contact you soon</p>
						<div class="contact_us mt-2">
							<div class="col-md-4 orange_clr text-right">You can reach us-</div>
							<div class="col-md-4 white_clr"><span class=""><img src="https://anayarealm.com/phone.svg" width="20"></span> 6209-151515</div>
							<div class="col-md-4 white_clr text-left"><span class=""><img src="https://anayarealm.com/email.svg" width="20"></span> enquiry@15bells.com</div>
							<div class="white_clr more_properties col-md-12 mt-3">
								Search more properties at <a href="https://www.15bells.com/" class="link_new">15bells</a>
							</div>
						</div>
					</div>
				</div>
			</div>
	  </div>



<?php  } }?>


 

 
<div class="transaction-index">

    <!--<h1><?//= Html::encode($this->title) ?></h1>-->

 


<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function() {     
     $.pjax.reload({container:'#m1'});
    }, 2000); 
});
JS;
$this->registerJs($script);
?>
