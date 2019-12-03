<style>

body{
    margin: 0px;
    padding: 0px;
	font-family: 'Nunito Sans', sans-serif;
}
.revers_bg{
	background-image: url(http://localhost/15Bells/new15bells/newimg/6b.jpg);
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

</style>




<body class="revers_bg" id="asssssssssssssssssssssssssbcd">
<img alt="" src="<?= Yii::getAlias('@frontendUrl').'/newimg/small.png';  ?>" class="right_bell"/>
<img alt="" src="<?= Yii::getAlias('@frontendUrl').'/newimg/small.png';  ?>" class="left_bell"/>
	<div class="container-fluid">
		<div class="row">
	<!--------Left Side Section------------------>
			<div class="col-md-12">
				<div class="row no_margn">
					<div class="col-md-4">
						
					</div>
					<div class="col-md-8">
						<div class="clock" style="margin:2em;"></div>
					</div>
				</div>
				
				<div class="row no_margn input_row">
					<div class="col-md-12">
						<div class="col-md-6">
							 <label for="usr">Place Bid:</label>
							<input type="text" class="form-control bid_amnt">
							<!--<span class="plus_i"><img src="plus.svg" width="30"></span><span class="plus_i"><img src="minus.svg" width="30"></span>-->
						</div>
						<div class="col-md-4">
							<label for="usr">Minimum Raise:</label>
							<input type="text" class="form-control min_raise">
						</div>
						<div class="col-md-2">
							<button type="button" class="btn btn_raise">Raise</button>
						</div>
						
					</div>
					<div class="col-md-12" style="padding:10px 0;">
						<div class="col-md-10">
							<p class="amount_word">Ten Lakh Ninety Two Thousand Five Hundres Sixty Seven Only</p>
						</div>
						<div class="col-md-2">
							<button type="button" class="btn btn_submit">Submit</button>
						</div>
						
					</div>
				</div>
			</div>
			
				<div class="row no_margn">
					<div class="reserved_price text-center">
						<p class="reserve_hed">Reserved Price</p>
						<p class="reserv_price">2785544523434</p>
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
						<div class="active_user col-md-6"><span class="white_clr">ABD12334</span></div>
					</div>
					<div class="col-md-12">
					  <div class="active_user col-md-6 no_pad">Active Users: </div>
						<div class="active_user col-md-6"><span class="white_clr">ABD12334</span></div>
					</div>
				</div>
				
					<h2 class="active_user col-md-12 mt-2">Bid History</h2>
			<div class="bid_history">
					<div class="user_div">
						<div class="col-md-6 bidr_name no_pad">Chirag </div>
						<div class="col-md-6 bid_status"><span class="white_clr">Rs 10000000</span></div>
					</div>
					<div class="user_div">
						<div class="col-md-6 bidr_name no_pad">Jitu </div>
						<div class="col-md-6 bid_status"><span class="white_clr">Rs 12000000</span></div>
					</div>
					<div class="user_div">
						<div class="col-md-6 bidr_name no_pad">Dev </div>
						<div class="col-md-6 bid_status"><span class="white_clr">Rs 10000000</span></div>
					</div>
					<div class="user_div">
						<div class="col-md-6 bidr_name no_pad">Chirag </div>
						<div class="col-md-6 bid_status"><span class="white_clr">Rs 10000000</span></div>
					</div>
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
<div class="message1">
	<p class="message_hed">Message</p>
	<div class="message">
	</div>
</div>	
