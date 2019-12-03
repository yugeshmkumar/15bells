
<?php 


use yii\helpers\Html;
use yii\widgets\Pjax;
use backend\modules\transaction\models\Transaction;
if (Yii::$app->session->hasFlash('success')):
 endif; 

$connection = Yii::$app->getDb();

 $model =new Transaction();
 $vr_setup = \common\models\VrSetup::find()->where(['secret_code'=>$_GET['id'],'status'=>"published",'isactive'=>1])->one();
if($vr_setup){
 $time=$model->gettime($vr_setup->propertyID);
   $bid = $model->getBidtime($vr_setup->propertyID);
 
           $currenttime = $model->getCurrenttime();

        if ($currenttime > $bid && $currenttime < $time) {
            
            
        }
 else {

            echo" <h1>Bid Ended</h1>";
        die;
        }

		$pid = $vr_setup->propertyID;
?>
<h2 style="color:green;" id="notif"></h2>



<style>

body{
    margin: 0px;
    padding: 0px;
	font-family: 'Nunito Sans', sans-serif;
}
.revers_bg{
	background-image: url(<?= Yii::getAlias('@frontendUrl') ?>/newimg/6b.jpg);
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    background-size: cover;
    transition: 1s opacity;
	background-position:center;
	background-attachment:fixed;
}
.row{
	margin:0;
}
.ham_menu{
	    cursor: pointer;
    position: fixed;
   
    z-index: 99;
    color: #fff;
    font-size: 20px;
    right: 4%;
    top: 4%;
}
.usr_id{
	    padding: 16px 75px 16px 75px;
    text-decoration: none !important;
    color: #fff !important;
    background: #009dbe;
}
.actv_usr{
	    padding: 16px 40px 16px 40px;
    text-decoration: none !important;
    color: #fff !important;
    background: #009dbe;
}
.current_bids{
	background:#000;
}
.currnt_hed{
	    padding: 5px;
    background: #009dbe;
    margin: 14px 0 0;
	color:#fff;
}
.no_margn{
	margin:0 !important;
}
.side_br{
   background: #000000;
    height: 100%;
    position: absolute;
    right: 16px;
}
.resrvd_pric{
	padding: 18px 20px;
    background: yellow;
    border-radius: 5px;
    font-size: 19px;
    width: 70%;
    margin: 0 auto;
}
.input_row{
	  position: fixed;
    width: 50%;
    bottom: 0%;
    padding: 20px 20px 0;
    background: rgba(0, 0, 0, 0.71);
    left: 25%;
}
.bid_amnt{
	background-color:#000 !important;
	color:#fff !important;
	border-color:#fff !important;
	width:80%;
	border-radius:0;
}
.min_raise{
	background-color:#000 !important;
	color:#fff !important;
	border-color:#fff !important;
	width:100%;
	border-radius:0;
}
.btn_submit{
	padding:7px 20px;
	background:#c4984f;
	border-radius:0;
	border:1px solid #c4984f;
	color:#ffffff !important;
	margin: 5px 0 0 -10px;
}
.btn_raise{
	padding:7px 20px;
	background:#c4984f;
	border-radius:0;
	border:1px solid #c4984f;
	color:#ffffff !important;
	margin-top:24px;
}
label{color:#ffffff;}
.current_bids{
	border:1px solid #fff;
}
.amount_word{
	color: #fff;
    font-size: 14px;
    padding-left: 15px;
    padding-top: 15px;
}

 .sidenav {
  height: 60%;
  width: 0;
  position: fixed;
  z-index: 99999;
  top: 0;
  right: 0;
  background: #000000;
}

.sidenav a {
  padding: 0px 8px 8px 32px;
  text-decoration: none !important;
  font-size: 30px;
  color: #ffffff;
  display: block;
  transition: 0.5s;
  font-family: tryst;
}

.sidenav a:hover {
  color: #868686;
}

.sidenav .closebtn {
  top: 5px;
    left: 25px;
    font-size: 36px;
    margin-left: 0px;
	z-index:999;
}
.logo_white {
  position: absolute;
  top: 30px;
  right: 100px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.reserved_price{
	position:absolute;
	top:45%;
	width:40%;
	left:30%;
}
.reserve_hed{
	    font-size: 35px;
    font-weight: bold;
    font-family: inherit;
    color: #ffffff;
}
.reserv_price{
	    color: #ffffff;
    font-weight: bold;
    font-size: 27px;
    letter-spacing: 1px;
}
.message1{
	position:fixed;
	right:0;
	background:#ffffff;
	width:300px;
	bottom:0;
}
.message{
	height:0px;
	background:#ffffff;
	width:300px;
}
.message_height{
	height:350px;
}
.message1 p{
	    text-align: center;
    background: #b3b3b3;
    padding: 10px;
    font-size: 20px;
    color: #ffffff;
	cursor:pointer;
	margin:0;
}
.active_user{
	font-size: 20px;
    font-weight: bold;
    color: #ae924d;
    margin: 0;
}
.bidr_name{
	font-size: 17px;
    color: #ae924d;
    margin: 0;
}
.bid_status{
	font-size: 17px;
    margin: 0;
}
.count_active{
	font-size: 20px;
    font-weight: bold;
    color: #ae924d;
    margin: 0;
}
.white_clr{
	color:#ffffff !important;
}
.no_pad{
	padding:0;
}
.mt-2{
	margin-top:20px;
}
/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
.user_div{
	width:100%;
	float:left;
}
.bid_history{
	width: 94%;
    float: left;
    margin: 15px;
    padding: 10px;
    border: 1px solid;
    border-radius: 5px;
    overflow-y: scroll;
    height: 170px;
}
.plus_i{
	    border: 1px solid #c4984f;
    padding: 5px 0px;
    background: #c4984f;
    border-radius: 1px;
}
.plus_i img{
	    margin:0 10px;
		width:20px;
}
.right_bell{
	    position: absolute;
    right: 7%;
    top: 40%;
	width:130px;
}
.left_bell{
	    position: absolute;
    left: 7%;
    top: 40%;
	width:130px;
}
.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}



.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 250px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
.chat_section{
	position: fixed;
    right: 0;
    width: 250px;
    bottom: 0;
	margin:0;
}
</style>




<body class="revers_bg" id="asssssssssssssssssssssssssbcd">

	<div class="container-fluid">
		<div class="row">
	<!--------Left Side Section------------------>
			<div class="col-md-12">
				<div class="row no_margn">
					<div class="col-md-4">
						
					</div>
					<div class="col-md-8">
						<div id="future_date" style="margin:2em;">00:00:00</div>
					</div>
				</div>
				<div class="row">
				<div class="reserved_price text-center" id="bidstatus"></div>
				</div>
				<div class="row no_margn input_row">
					<div class="col-md-12">
						<div class="col-md-6">
							 <label for="usr">Place Bid:</label>
							<input id="bid" onkeyup="word.innerHTML=convertNumberToWords(this.value)" type="text" class="form-control bid_amnt">
							<!--<span class="plus_i"><img src="plus.svg" width="30"></span><span class="plus_i"><img src="minus.svg" width="30"></span>-->
						</div>
						<div class="col-md-4">
							<label for="usr">Minimum Raise:</label>
							<input id="min" type="text" class="form-control min_raise">
						</div>
						<div class="col-md-2">
							<button id="raise" type="button" class="btn btn_raise">Raise</button>
						</div>
						
					</div>
					<div class="col-md-12" style="padding:10px 0;">
						<div class="col-md-10">
							<p id="word" class="amount_word"></p>
						</div>
						<div class="col-md-2">
							<button id="submit" type="button" class="btn btn_submit">Submit</button>
						</div>
						
					</div>
				</div>
			</div>
			
				<div class="row no_margn">
					<div class="reserved_price text-center">
						<p class="reserve_hed">Reserved Price</p>
						<p id="current_price" class="reserv_price"><?php $model->getMaxprice($pid);?></p>
					</div>
				</div>		
	 <div id="mySidenav" class="sidenav">
 <!--<img src="logo_w.png" width="130" class="logo_stock logo_white">-->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="menu_burger">
	<!-----------Right Side Section------------->
	
			<div class="col-md-12">
			<!------------Upper section------>
				<div class="row">
					<div class="col-md-12">
						<div class="active_user col-md-6 no_pad">Propert Id: </div>
						<div class="active_user col-md-6"><span class="white_clr"><?php 
						$haritid = 273*179-$vr_setup->propertyID;
						$propsid = 'PR'.$haritid;
		
						echo $propsid ?></span></div>
					</div>
					<div class="col-md-12">
					  <div class="active_user col-md-6 no_pad">Active Users: </div>
						<div id="active_users" class="active_user col-md-6"><span class="white_clr">0</span></div>
					</div>
				</div>
				
					<h2 class="active_user col-md-12 mt-2">Bid History</h2>
			<div id="bidgrid" class="bid_history">
					
					
				</div>
				
				
			<!------------Upper section Ends------>
			</div>
	</div>

			
			</div>
			<span class="ham_menu"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/menu.png';  ?>" onclick="openNav()" width="25" class="img_menu hide_sections"></span>
			<!------------Chat Window-------->
			
				<div class="row">
					
				</div>
				
			<!------------Chat Window Ends-------->
		</div>
	</div>

	
            <div class="panel panel-primary chat_section">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> Chat To Moderator
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse collapse" id="collapseOne">
                <div class="panel-body">
                    <ul class="chat" id="comment">
                        
                       
                       
                        
                    </ul>
                    
                </div>
                <div class="panel-footer">
               
                    <div class="input-group">
                    
                        <input id="msg_sent" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                      
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="b1">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
            </div>
        
		

<?php


        $script = <<< JS
$.noConflict();
$(document).ready(function(){

    
setInterval(userleft, 1000);
setInterval(ajaxtimer, 1000);
setInterval(notification, 1000);
 setInterval(ajaxcall, 5000);   
setInterval(biduser, 5000);
setInterval(checkstatus, 5000);
 setInterval(startbid, 1000);
setInterval(chatdisplay, 1000);
setInterval(activeusers, 5000);
setInterval(triggerLoc, 1000); 
setInterval(Checksecond, 1000);
 });



    function userleft(){
   $.ajax({		 
         url: 'leavebrowser?id=$pid',
         success: function(data) {	
         }
     });
}
 
 



function playsound(){
document.getElementById('sound1').play();
}

function perminute(){
  // playsound();
}

function Checksecond(){
     $.ajax({
		 
         url: 'notificationtime?id=$pid',
         success: function(data) {
       var a=data/60;
if(a % 1 === 0)
{
 // playsound();
}
         }
     });
}



var appliedData;

function triggerLoc() {

    $.ajax({
    
      url : "customsound?id=$pid",                
      success : function(data) {

           // Check applied data on DOM with new data is same

           if ( appliedData != data ) {

               appliedData = data;
         // playsound();

           } else {

           

           }

         

      }

})}
 function ajaxcall(){
     $.ajax({
		 
         url: 'bid?id=$pid',
         success: function(data) {
          var obj = JSON.parse(data);
		var text = obj.text;
		var price = obj.price;
		$('.reserve_hed').html(text);
		$('.reserv_price').html(price);

 //$('#current_price').html(data);
         }
     });
 }

    function activeusers()
{
   $.ajax({
		 
         url: 'getactiveuser?id=$pid',
         success: function(data) {
			
            // console.log(data);
            
            $('#active_users').html(data);
         }
     });
}
 
 
         function ajaxtimer()
{
   $.ajax({
		 
         url: 'test1?id=$pid',
         success: function(data) {
           
           $('#future_date').html(data);

         }
     });
}
               
                
                
 function notification(){
     $.ajax({
		 
         url: 'notificationtime?id=$pid',
         success: function(data) {
        if( (data=='5') || (data=='10')){
var txt=data +" Seconds Left";
 $('#notif').html(txt);
}
 

else if((data<5) &&(data>-5) ){ 

	window.location.href='endbid?id=$pid';
   } 



       else{
           }
         }
     });
 }
function biduser()
{
	$('#bidgrid').html('');
   $.ajax({
		 
         url: 'maxbidders?id=$pid',
         success: function(data) {

			  var obj = $.parseJSON(data);
            
            // $('#bidgrid').html(data);
			// $('#bidgrid1').html(data);
			$.each(obj, function (index) {
				$('#bidgrid').append('<div class="user_div">'+
						'<div class="col-md-6 bidr_name no_pad">'+this.aliasname+'</div>'+
						'<div class="col-md-6 bid_status"><span class="white_clr">Rs '+this.bidder+'</span></div>'+
					'</div>');


			});
         }
     });
}
        
         function priceconversion(){
     $.ajax({
		 
         url: 'showamount?id=$pid',
         success: function(data) {
             console.log(data);
           // $('#words').html(data);
         }
     });
 }

        
        
				function checkstatus(){
				$.ajax({		 
				url: 'checkstatus?id=$pid',
				success: function(data) {
				$('#bidstatus').html(data);      
				}
				});
				}

					function startbid(){
					$.ajax({		 
					url: 'starttime?id=$pid',
					success: function(data) {
					if(data=="false")
					{
					$("#future_date").hide();
					$("#submit").hide();
					$("#raise").hide();
					}  

					else
					{
					$("#future_date").show();
					$("#submit").show();
					$("#raise").show();
					}        
					}
					});
					}


	  
$(document).ready(function(){
$("#submit").click(function(){

var bid = $("#bid").val();
var dataString = 'bid='+ bid;
if(bid=='' )
{
alert("Please Add Bid");
}

else
{

if(!$.isNumeric(bid)) {
   alert("Please Enter Valid Amount");
}else{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "insertajax?id=$pid",
data: dataString,
cache: false,
success: function(result){
alert(result);
}
});
}
}


});
});
	  
	

$(document).ready(function(){
$('#msg_sent').val('');


$("#raise").click(function(){

$.ajax({
type: "POST",
url: "minraise?id=$pid",
cache: false,
success: function(result){

var res = result.split("+");

$("#min").val(res[1]);
$("#bid").val(res[0]);

}
});

});
});
	  
	  
   function chatdisplay(){

     var  sum='';
     
     $.ajax({
         
         url: 'dynamic?id=$pid',
	ifModified: true,
         success: function(data,status,xhr) {
var length = Object.keys(data).length;


     // $('#comment').html(data);
      var obj = $.parseJSON(data);
            
            
			$.each(obj, function (index) {

                  sum += '<li class="left clearfix">'+
                            '<div class="chat-body clearfix">'+
                                '<div class="header">'+
                                    '<strong class="primary-font">'+this.user+'</strong>'+ 
                                '</div>'+
                                '<p>'+this.message+'</p>'+
                            '</div>'+
                        '</li>';
                       
			
                       
                        $('#comment').html(sum);

			});
           
            $('.panel-body').scrollTop($('.panel-body li:last-child').position().top);
            

       
   
         }
     });
 }


   function chatdisplay1(){
var options={};
options.url='dynamic?id=$pid';
options.method="get";
options.cache=true;
options.ifModified=true;

$.ajax(options).then(
 function(data){

$('#comment').html(data);
});


 }



                
//  $("#msg_sent").keyup(function(event){
//      alert('aya');
//     if(event.keyCode == 13){
//         alert('aya2');
//         sendmessage();
//     }
// });    

$('#msg_sent').keyup(function(e) { 

   
                if(e.keyCode == 13) { 
                    $(this).trigger("enterKey"); 
                } 
            });          
            $('#msg_sent').on("enterKey", function(e){ 

                 sendmessage();
               
            });   
                
                
   
   $("#b1").click(function(){

      sendmessage();
});	  
	  
function  sendmessage(){
    
   //playsound();
var chat = $("#msg_sent").val();

$('#msg_sent').val('');

if(chat==''){
	alert("Please enter message");
	return false;
}else{
var userid = $("#user option:selected").val();

var dataString = 'chat='+ chat + '&id='+userid ;
$.ajax({
type: "POST",
url: 'chat?pid=$pid',
data: dataString,
cache: false,
success: function(result){

}
});
}
   
   }	  
	  
	  
JS;
        $this->registerJs($script);
        ?>








		 


        <?php
        /* @var $this yii\web\View */
        /* @var $model backend\modules\transaction\models\Transaction */

        $this->title = 'Create Transaction';
        $this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
        $this->params['breadcrumbs'][] = $this->title;
        ?>

        <div class="transaction-create">



<?=
$this->render('_form', [
    'model' => $model,
])
?>

<?php } ?>