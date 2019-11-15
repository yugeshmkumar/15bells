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

}

//session_destroy();
?>

<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>
<style>
	.doc_pric{
		font-family: 'Open Sans', sans-serif;
		font-size:25px;
		padding:10px;
		background:#0fd8da;
		color:#ffffff;
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
	
	<div class="container">
		<div class="row">
			<div class="offset-md-1 col-md-10">
				<div class="row prop_list">
					<div class="col-md-12 pt-5 pb-5 pl-0 pr-0 pl-4 brdr_btm">
						<h5 class="prpr_hed m-3">Details</h5>
						<input type="hidden" id="kname" value="<?php echo $name; ?>">
						<input type="hidden" id="kemail" value="<?php echo $email; ?>">
						<input type="hidden" id="kphonenumber" value="<?php echo $phonenumber; ?>">
						<input type="hidden" id="kamount_payable" value="<?php echo $amount_payable; ?>">
						<input type="hidden" id="krequestids" value="<?php echo $requestids; ?>">

						<p class="pror_detl p-1 pl-3"><span class="lite_clr">Name :</span> <?php echo $name; ?></p>
						<p class="pror_detl p-1 pl-3"><span class="lite_clr">Email :</span><?php echo $email; ?></p>
						<p class="pror_detl p-1 pl-3"><span class="lite_clr">Phone Number :</span> <?php echo $phonenumber; ?></p>
					</div>
					<div class="col-md-12 p-0">
						<div class="row">
							<div class="col-md-8 pt-5 pb-5 pl-4 pr-4 brdr_rite">
								<div class="row">
									<div class="col-md-6">
										<p class="img_p"></p>
									</div>
									<div class="col-md-6">
										<p class="p_txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
									</div>
								</div>
							</div>
							<div class="col-md-4 pt-5 pb-5 pl-4 pr-4">
								<p class="pror_detl p-1 pl-3"><span class="lite_clr">Property ID : </span><?php echo $newproidname; ?></p>
								<p class="pror_detl p-1 pl-3"><span class="lite_clr">Pricing : <i class="fa fa-inr pl-2 pr-1"></i></span><?php echo $amount_payable; ?></p>
								<p class="pror_detl p-1 pl-3"><span class="lite_clr">Total : <i class="fa fa-inr pl-2 pr-1"></i></span><?php echo $amount_payable; ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-12 sbmt_div text-right">
						<button type="button" id="rzp-button1" class="btn btn-info place_bid">Confirm</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--CHECKOUT DESIGN ENDS-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>

	
                var kname = $('#kname').val();
                var kemail = $('#kemail').val();
                var kphonenumber = $('#kphonenumber').val();
                var kamount_payable = $('#kamount_payable').val();

                var  descriptions =  "Online Sitevisit";
				var amounts = kamount_payable * 100;

				var options = {
				"key": "rzp_test_9ckspVvYJ0k6GZ",
				"amount": amounts, // 2000 paise = INR 20
				"name": "Stoneray Technologies Private Limited",
				"description": descriptions,
				"image": "/newimg/logo.png",
				"handler": function (response){
				
				//alert(response.razorpay_payment_id);
				//alert(response.razorpay_order_id);
				paymentgateway(response.razorpay_payment_id);

				},
				"prefill": {
				"name": kname,
				"email": kemail
				
				},
				"notes": {
				"address": descriptions
				},
				"theme": {
				"color": "#F37254"
				}
				};

				var rzp1 = new Razorpay(options);

				document.getElementById('rzp-button1').onclick = function(e){
				rzp1.open();
				e.preventDefault();
				}


				function paymentgateway(orderid){
					var urlsd = "<?php echo $urlsd; ?>";
					var krequestids = $('#krequestids').val();

					$.ajax({
						                        type: "POST",
                                                url: 'paymentgateway',
                                                data: {orderid: orderid,krequestids:krequestids,kamount_payable:kamount_payable},
                                                //dataType: 'json',
                                                success: function (data) {                                                   
                                                
												  if(data == '1'){

													window.location.href = urlsd +'/request-sitevisit';  
													//location.href = "https://15bells.com/frontend/web/request-sitevisit";
												  }else{
													toastr.error('Some Internal Error', 'error'); 
												  }
                                                }
                                    });
				}
    
   

</script>    
