
<?php
//$tittle = $this->title = Yii::t('app', '15Bells');
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$urlsd =   Yii::getAlias('@frontendUrl');
?>
<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/banner.jpg';  ?>">
			
			<div class="container-fluid no_pad div_header">
			
						<div class="container top_section" id="banner_cont">
				<div class="col-md-12 text-center brand_desp">
					
					<div class="fadein">
						<h1 class="brand_name">We have a patented product that helps you in getting the whole experience of your property transaction on demand minus hassles like market research, trust issues, middlemen cost,  
						site visit & negotiations beating everyone on trust, transparency & time.<br>
						15bells is innovating every step of your property journey. </h1>
						<h1 class="brand_name">15bells. Let the bell ring for 15 times and you are all set to get your property for buying, selling, or leasing.<br>
						Set it once and then the technology will help you all the way.<br>
						How much time did you spend doing your property transactions? Compare it with using 15bells anytime and you will be surprised with our patented technology behind it.
						</h1>
						<h1 class="brand_name">Have you experienced pain in doing any property trading?<br>
						If yes, we already have your pain cured through our patented technology, easing out your complete journey.<br>
						15bells is the name…We make buying, selling, leasing seamless & faceless & that too within 15 minutes.
						</h1>
						<h1 class="brand_name">We have eased the real estate trading - making it more transparent, flexible, trustworthy - thanks to our patented technology.<br>
						Property Stakeholders can now have a calm, relaxed & virtual experience of property trading real-time. You can experience it for yourself at 15bells.com
						</h1>
						<h1 class="brand_name">Our patented technology marketplace gives real estate stakeholders a transparent & seamless experience in property transactions.<br>
						Starting from 15 seconds to 15 minutes. Hence the name 15bells.
						</h1>
						<h1 class="brand_name">Buy, rent, lease your property with a virtual experience making it more transparent, flexible, trustworthy. With the patented technology, forget the hassles you deal with real estate trading, and experience the real-time property trading just in 15 minutes.<br>
						Get the best property deal with 15 Bells.
						</h1>
						<h1 class="brand_name">We are making real estate transactions seamless, faceless & hassle less.<br>
						Our patented technology questions the status quo & within 15 hours, you will be able to buy, sell or lease with ease. Check us out at 15bells.com
						
						</h1>
						<h1 class="brand_name">15bells is the next generation real estate platform where within 15 hours, you are sorted with your property needs.<br>
						We focus on 3T's-  time, trust & transparency. You will be amazed by looking at the time & cost saving with unbeatable security.
						</h1>
						<h1 class="brand_name">15bells is a proptech helping you do more in less. Think of the complete transactions within 15 minutes.
						<br>
						Our patented technology helps you real-time to make an informed decision, a decision which can never go wrong.
						</h1>
						<h1 class="brand_name">15bells is a revolutionary next-generation way for your commercial property needs. 
						<br>
						Our patented technology makes the information & process completely real-time, which is trustworthy, transparent utilizing technology.

						</h1>
						
						
						</div>
					
				</div>
					<div class="col-md-5 col-md-offset-3 text-center select_catg">
						<div class="row">
						<div class="col-md-6 col-xs-6 txt_am">I'm here to </div>
							<div class="col-md-6 col-xs-6 no_pad">
								<div class="mm-dropdown">
								<input type="hidden" id="urlget" value="<?php echo $urlsd; ?>">
									  <div class="textfirst" id="dropi"> 
									  <div class="textfirst1" id="dropi1"> 
									  <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/buy.png';  ?>"/> <span class="span_sl">Buy</span>
									  </div>
									  </div>
									  
									  <ul class="role_select" id="rolee">
										<li class="input-option li_abc buy_l" data-value="1">
										<a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" class="anchr_rol">  <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/buy.png';  ?>" class="white_bg"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/buy_w.png';  ?>" class="yellow_bg"><span class="span_sl"> Buy</span></a>
										</li>
										<li class="input-option li_abc sell_l buy_l" data-value="2">
										  <a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" class="anchr_rol"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/sell.png';  ?>" class="white_bg sell_icon" alt=""/> <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/sell_w.png';  ?>" class="yellow_bg sell_icon" alt=""/><span class="span_sl"> Sell </span></a>
										</li>
										<li class="input-option li_abc lessee_l buy_l" data-value="3">
										  <a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="anchr_rol"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lease.png';  ?>" class="white_bg" alt="" /> <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lease_w.png';  ?>" class="yellow_bg" alt="" /><span class="span_sl">Lease In</span></a>
										</li>
										<li class="input-option li_abc lessor_l buy_l" data-value="4">
										  <a href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" class="anchr_rol"><img class="white_bg" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lease-out.png';  ?>" alt=""/><img class="yellow_bg" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/lease-out_w.png';  ?>" alt=""/><span class="span_sl"> Lease Out</span></a>
										</li>
									  </ul>
									  <input type="hidden" class="option" name="namesubmit" value="" />
									</div>
							</div>
							
						</div>
					</div>
				
			</div>
			
			
<!-- end of navbar-->
		</div>
	

	</section>

<!--Transaction types Section-->
<div class="container-fluid no_pad transac_banner">
	<div class="container">
		<h2 class="trans_head">Real Estate made Easy with <br>Commercial Property Auction</h2>

		<div class="row text-center">
			<div class="col-md-4 col-xs-4 pad_trans">
				<p class="img_s"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/instant.svg';  ?>" class="img_trans intant_auc" width="125"></p>
				<p class="transac_typ">Instant Auction</p>
				<p class="transaction_text hidden-xs hidden-sm">Interested in a commercial Property and want it right away? Get your property deal with a real-time & secured platform for property buyers & sellers. 
				<br> <a href="#" class="read_more">Read more..</a></p>
			</div>
			<div class="col-md-4 col-xs-4 pad_trans">
				<p class="img_s"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/forward.svg';  ?>" width="182" class="img_trans forward_auc"></p>
				<p class="transac_typ">Forward Auction</p>
				<p class="transaction_text hidden-xs hidden-sm">Intrested in a property where there are multiple Buyers? 15 Bells offers a forward auction where a single seller offers his property for sale.
				<br> <a href="#" class="read_more">Read more..</a>				</p>
			</div>
			<div class="col-md-4 col-xs-4 pad_trans">
				<p class="img_s"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/reverse.svg';  ?>" width="150" class="img_trans reverse_auc"></p>
				<p class="transac_typ">Reverse Auction</p>
				<p class="transaction_text hidden-xs hidden-sm">With 15 bells state of art technology, Reverse Auction is the best option for leasing a commercial property between a single buyer or organization and suppliers.
				<br> <a href="#" class="read_more">Read more..</a></p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid no_pad step_banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6 no_pad">
				<h3 class="trans_head_b">Buy or Sell Properties,<br>In just simple steps</h3>
			</div>
			<div class="col-md-6 text-center buy_sell">
				
				<ul class="nav nav-tabs steps_tab">
				  <li class="active"><a data-toggle="tab" class="step_link border_right" href="#buy_t">Buy</a></li>
				  <li><a data-toggle="tab" class="step_link border_left border_right" href="#sell_l">Sell</a></li>
				  <li><a data-toggle="tab" class="step_link border_left border_right" href="#lease_in">Lease in</a></li>
				  <li><a data-toggle="tab" class="step_link border_left" href="#lease_out">Lease Out</a></li>
				</ul>
			</div>
		</div>
		

			<div class="tab-content property_sell">
			  <div id="buy_t" class="tab-pane fade in active">
				<div class="row text-center pad_step">
					<div class="col-md-5">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/buy.jpg';  ?>" class="img-responsive">
					</div>
					<div class="col-md-7">
					<div id="carousel-buy" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">01</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Look for a Perfect Location  </h4>
								<p class="step_txt">The most important criteria is to consider where the property is located. With 15 bells you get to choose your own location and get the available properties listed.    </p>
								
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">02</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Set up your Expectation</h4>
								<p class="step_txt">Retail shops, Office space, warehouses or lease space - Try setting up your Budget and get the Best Matched properties. </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">03</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Discover a commercial  property you would love to Buy</h4>
								<p class="step_txt">Search more than 1000 commercial property in Delhi NCR for sale or lease.  </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">04</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Schedule your site visit online or offline</h4>
								<p class="step_txt">You can get a virtual tour of the shortlisted properties and save your time or get a physical site visit to the experience. 15 Bells do it both! </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">05</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Get your Property Documentations verified:</h4>
								<p class="step_txt">Property Document can never be an issue with 15 bells, Be it Buyer, Seller, Lessor or Lessee all the parties get verified before registering.   </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">06</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Get your Property ready for the transaction:</h4>
								<p class="step_txt">With 15 Bells you can now deal with your property in real time. Get your property auction ready where you Bid and Win for the desired properties. </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">07</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Enter to our Real-Time Virtual Bidding Room: </h4>
								<p class="step_txt">We come with a combination of technology & human intervention where you can bid online with trusted Banking partner. </p>
							</div>
						</div>
					</div>
				</div>
				 <div class="controls pull-left">
							<a class="left left_icn" href="#carousel-buy"
								data-slide="prev"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/left_b.svg';  ?>">Previous</a>
								<a class="right right_icn" href="#carousel-buy"
									data-slide="next">Next<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/right_b.svg';  ?>"></a>
						</div>
					</div>
				</div>
					
			  </div>
			  <div id="sell_l" class="tab-pane fade">
				<div class="row text-center pad_step">
					<div class="col-md-5">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/sell.jpg';  ?>" class="img-responsive">
					</div>
					<div class="col-md-7">
					<div id="carousel-sell" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">01</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Know your Location</h4>
								<p class="step_txt">When you are posting your property, let your buyers know the location of your property. We offer you a faster and easier way to mark the exact property location.     </p>
								
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">02</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Post your Property</h4>
								<p class="step_txt">15 Bells offers the best commercial property to rent, sell and lease. It’s simple, select your property type from office space, warehouse or retail shops for the right match. </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">03</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Get your Property Details out here along with documentation</h4>
								<p class="step_txt">Verifying a property has never been so easier - we help you authenticate your documents with complete transparency.  </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">04</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Wait and watch for the right customer</h4>
								<p class="step_txt">Once your property is out with 15 Bells, Get in connect with the potential buyers seeking for your property.  </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">05</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Manage your Properties and clients</h4>
								<p class="step_txt">You get a customized dashboard to schedule a visit, put up your expectations, negotiate on the budget or verifying any documents - with 15 Bells Dedicated Account Manager by your side. </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">06</span><span class="step_line"></span><span class="step_count">07</span>
								<h4 class="step_hed">Prepare your Property for the auction</h4>
								<p class="step_txt">When selling your property 15 bells offers their “Auction Model” where you can Bid and WIn for the property just within 15 Hours.  </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">07</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Enter to our Real-Time Virtual Bidding Room: </h4>
								<p class="step_txt">We come with a combination of technology & human intervention where you can bid online with trusted Banking partner. </p>
							</div>
						</div>
					</div>
				</div>
				 <div class="controls pull-left">
							<a class="left left_icn" href="#carousel-sell"
								data-slide="prev"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/left_b.svg';  ?>">Previous</a>
								<a class="right right_icn" href="#carousel-sell"
									data-slide="next">Next<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/right_b.svg';  ?>"></a>
						</div>
					</div>
				</div>
			  </div>
			  <div id="lease_in" class="tab-pane fade">
				<div class="row text-center pad_step">
					<div class="col-md-5">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/lessee.jpg';  ?>" class="img-responsive">
					</div>
					<div class="col-md-7">
					<div id="carousel-lessee" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">01</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Look for a Perfect Location  </h4>
								<p class="step_txt">The most important criteria is to consider where the property is located. With 15 bells you get to choose your own location and get the available properties listed.    </p>
								
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">02</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Set up your Expectation</h4>
								<p class="step_txt">Retail shops, Office space, warehouses or lease space - Try setting up your Budget and get the Best Matched properties. </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">03</span><span class="step_line"></span><span class="step_count">07</span>
								<h4 class="step_hed">Discover a commercial  property you would love to Buy</h4>
								<p class="step_txt">Search more than 1000 commercial property in Delhi NCR for sale or lease.  </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">04</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Schedule your site visit online or offline</h4>
								<p class="step_txt">You can get a virtual tour of the shortlisted properties and save your time or get a physical site visit to the experience. 15 Bells do it both! </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">05</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Get your Property Documentations verified:</h4>
								<p class="step_txt">Property Document can never be an issue with 15 bells, Be it Buyer, Seller, Lessor or Lessee all the parties get verified before registering.   </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">06</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Get your Property ready for the transaction:</h4>
								<p class="step_txt">With 15 Bells you can now deal with your property in real time. Get your property auction ready where you Bid and Win for the desired properties. </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">07</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Enter to our Real-Time Virtual Bidding Room: </h4>
								<p class="step_txt">We come with a combination of technology & human intervention where you can bid online with trusted Banking partner. </p>
							</div>
						</div>
					</div>
				</div>
				 <div class="controls pull-left">
							<a class="left left_icn" href="#carousel-lessee"
								data-slide="prev"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/left_b.svg';  ?>">Previous</a>
								<a class="right right_icn" href="#carousel-lessee"
									data-slide="next">Next<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/right_b.svg';  ?>"></a>
						</div>
					</div>
				</div>
			  </div>
				
			  <div id="lease_out" class="tab-pane fade">
			  <div class="row text-center pad_step">
					<div class="col-md-5">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/lessor.jpg';  ?>" class="img-responsive">
					</div>
					<div class="col-md-7">
					<div id="carousel-lessor" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">01</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Know your Location</h4>
								<p class="step_txt">When you are posting your property, let your buyers know the location of your property. We offer you a faster and easier way to mark the exact property location.     </p>
								
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">02</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Post your Property</h4>
								<p class="step_txt">15 Bells offers the best commercial property to rent, sell and lease. It’s simple, select your property type from office space, warehouse or retail shops for the right match. </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">03</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Get your Property Details out here along with documentation</h4>
								<p class="step_txt">Verifying a property has never been so easier - we help you authenticate your documents with complete transparency.  </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">04</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Wait and watch for the right customer</h4>
								<p class="step_txt">Once your property is out with 15 Bells, Get in connect with the potential buyers seeking for your property.  </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">05</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Manage your Properties and clients</h4>
								<p class="step_txt">You get a customized dashboard to schedule a visit, put up your expectations, negotiate on the budget or verifying any documents - with 15 Bells Dedicated Account Manager by your side. </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">06</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Prepare your Property for the auction</h4>
								<p class="step_txt">When selling your property 15 bells offers their “Auction Model” where you can Bid and WIn for the property just within 15 Hours.  </p>
							</div>
						</div>
						<div class="item">
							<div class="row text-left">
								<h4 class="steps_process"><span class="step_count step_no">07</span><span class="step_line"></span><span class="step_count">07</span></h4>
								<h4 class="step_hed">Enter to our Real-Time Virtual Bidding Room: </h4>
								<p class="step_txt">We come with a combination of technology & human intervention where you can bid online with trusted Banking partner. </p>
							</div>
						</div>
					</div>
				</div>
				 <div class="controls pull-left">
							<a class="left left_icn" href="#carousel-lessor"
								data-slide="prev"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/left_b.svg';  ?>">Previous</a>
								<a class="right right_icn" href="#carousel-lessor"
									data-slide="next">Next<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/right_b.svg';  ?>"></a>
						</div>
					</div>
				</div>
			  </div>
			</div>
	</div>
</div>

<div class="container-fluid no_pad categ_sec hidden-xs hidden-sm">
	<div class="container">
		<h1 class="trans_head">Browse Properties by <br>Categories</h1>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4">
				</div>
				<div class="col-md-8 no_pad">
					<ul class="prop_cat nav nav-pills">
						<li class="active"><a data-toggle="pill" href="#home" class="categ_selec">Commercial Office</a></li>
						<li><a data-toggle="pill" href="#menu1" class="categ_selec">Commercial Retail</a></li>
						<li><a data-toggle="pill" href="#menu2" class="categ_selec">Land & Plot</a></li>
						<li><a data-toggle="pill" href="#menu3" class="categ_selec">Hotels</a></li>
					</ul>
				</div>
			</div>
		

				<div class="tab-content">
				
				  <div id="home" class="tab-pane fade in active">
						  <div class="col-md-4 pad_off">
							<h3 class="office_hed">Commercial <br> Office</h3>
							<div class="row cat_name">
								<div class="col-md-6">
									<p class="offic_hed offic_c">Office Space</p>
								</div>
								<div class="col-md-6">
									<p class="offic_hed">Co-Working</p>
								</div>
								<div class="col-md-6">
									<p class="offic_hed">IT/ITES/SEZ Park</p>
								</div>
								<div class="col-md-6">
									<p class="offic_hed">Business Center</p>
								</div>
							</div>
						</div>
						<div class="col-md-8">
						<div id="myCarousel" class="carousel fdi-Carousel slide">
						 <!-- Carousel items -->
							<div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
								<div class="carousel-inner onebyone-carosel">
									<div class="item active">
										<div class="col-md-4">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c_office.jpg';  ?>" class="img-responsive">
										   
										</div>
									</div>
									<div class="item">
										<div class="col-md-4">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c_business.jpg';  ?>" class="img-responsive">
											
										</div>
									</div>
									<div class="item">
										<div class="col-md-4">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c_work.jpg';  ?>" class="img-responsive">
											
										</div>
									</div>
									<div class="item">
										<div class="col-md-4">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c_comp.jpg';  ?>" class="img-responsive">
										  
										</div>
									</div>
									
								</div>
								
							</div>
							<!--/carousel-inner-->
						</div><!--/myCarousel-->
					<div class="controls pull-left hidden-xs">
						<a class="left left_icn_wt" href="#eventCarousel"
							data-slide="prev"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/left_w.svg';  ?>" >Previous</a>
							<a class="right right_icn_wt" href="#eventCarousel"
								data-slide="next">Next<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/right_w.svg';  ?>"></a>
					</div>
				</div>
				  </div>
				  <div id="menu1" class="tab-pane fade">
						<div class="col-md-4 pad_off">
							<h3 class="office_hed">Commercial <br> Retail</h3>
							<div class="row cat_name">
								<div class="col-md-6">
									<p class="offic_hed offic_c">Building Showroom</p>
								</div>
								<div class="col-md-6">
									<p class="offic_hed">Retail Shop </p>
								</div>
								<div class="col-md-6">
									<p class="offic_hed">Retail Malls </p>
								</div>
								
							</div>
						</div>
						<div class="col-md-8">
							<div id="myCarousel1" class="carousel fdi-Carousel slide">
							 <!-- Carousel items -->
								<div class="carousel fdi-Carousel slide" id="eventCarousel1" data-interval="0">
									<div class="carousel-inner onebyone-carosel">
										<div class="item active">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/r_mall.jpg';  ?>" class="img-responsive">
											   
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/r_shop.jpg';  ?>" class="img-responsive">
												
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/r_showroom.jpg';  ?>" class="img-responsive">
												
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/retail_m.jpg';  ?>" class="img-responsive">
											  
											</div>
										</div>
										
									</div>
									
								</div>
								<!--/carousel-inner-->
							</div><!--/myCarousel-->
					<div class="controls pull-left hidden-xs">
						<a class="left left_icn_wt" href="#eventCarousel1"
							data-slide="prev"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/left_w.svg';  ?>">Previous</a>
							<a class="right right_icn_wt" href="#eventCarousel1"
								data-slide="next">Next<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/right_w.svg';  ?>"></a>
					</div>

				  </div>
				  
				</div>
				<div id="menu2" class="tab-pane fade">
					<div class="col-md-4 pad_off">
							<h3 class="office_hed">Land & <br> Plots</h3>
							<div class="row cat_name">
								<div class="col-md-6">
									<p class="offic_hed offic_c">Warehouses</p>
								</div>
								<div class="col-md-6">
									<p class="offic_hed">Factory</p>
								</div>
								<div class="col-md-6">
									<p class="offic_hed">Agriculture Land</p>
								</div>
								<div class="col-md-6">
									<p class="offic_hed">Institutional Lands</p>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div id="myCarousel2" class="carousel fdi-Carousel slide">
							 <!-- Carousel items -->
								<div class="carousel fdi-Carousel slide" id="eventCarousel2" data-interval="0">
									<div class="carousel-inner onebyone-carosel">
										<div class="item active">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/agriculture.jpg';  ?>" class="img-responsive">
											   
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/factory.jpg';  ?>" class="img-responsive">
												
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/warehouse.jpg';  ?>" class="img-responsive">
												
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/farmland.jpg';  ?>" class="img-responsive">
											  
											</div>
										</div>
										
									</div>
									
								</div>
								<!--/carousel-inner-->
							</div><!--/myCarousel-->
					<div class="controls pull-left hidden-xs">
						<a class="left left_icn_wt" href="#eventCarousel2"
							data-slide="prev"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/left_w.svg';  ?>">Previous</a>
							<a class="right right_icn_wt" href="#eventCarousel2"
								data-slide="next">Next<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/right_w.svg';  ?>"></a>
					</div>

				  </div>
				</div>
				<div id="menu3" class="tab-pane fade">
					<div class="col-md-4 pad_off">
							<h3 class="office_hed">Hotel <br> </h3>
							<div class="row cat_name">
								<div class="col-md-6">
									<p class="offic_hed offic_c">Hotels & Resorts</p>
								</div>
								<div class="col-md-6">
									<p class="offic_hed">Banquets & Guest Houses</p>
								</div>
								
							</div>
						</div>
						<div class="col-md-8">
							<div id="myCarousel3" class="carousel fdi-Carousel slide">
							 <!-- Carousel items -->
								<div class="carousel fdi-Carousel slide" id="eventCarousel3" data-interval="0">
									<div class="carousel-inner onebyone-carosel">
										<div class="item active">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c1.jpg';  ?>" class="img-responsive">
											   
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c1.jpg';  ?>" class="img-responsive">
												
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c1.jpg';  ?>" class="img-responsive">
												
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c1.jpg';  ?>" class="img-responsive">
											  
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c1.jpg';  ?>" class="img-responsive">
											  
											</div>
										</div>
										<div class="item">
											<div class="col-md-4">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c2.jpg';  ?>" class="img-responsive">
											   
											</div>
										</div>
									</div>
									
								</div>
								<!--/carousel-inner-->
							</div><!--/myCarousel-->
					<div class="controls pull-left hidden-xs">
						<a class="left left_icn_wt" href="#eventCarousel3"
							data-slide="prev"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/left_w.svg';  ?>">Previous</a>
							<a class="right right_icn_wt" href="#eventCarousel3"
								data-slide="next">Next<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/right_w.svg';  ?>"></a>
					</div>

				  </div>
				</div>
			
		</div>
	</div>
</div>
</div>
<div class="container-fluid no_pad hidden-xs hidden-sm">
	
		<div class="row difference_steps">
			<div class="col-md-6 no_pad">
				<div class="row difrnt_clr padd_h">
					<h6 class="trans_head_b">What makes us<br>Different</h6>
					<div class="col-md-10 differnt_nam">
						<ul class="diffrnt_hed">
							<li class="trst_act active"><a class="trst_trns trust_clck" href="javascript:void(0)">Trust</a></li>
							<li class="trans_act"><a class="trst_trns trans_clck" href="javascript:void(0)">Transparency</a></li>
						</ul>
					</div>
					<div class="col-md-2 text-right no_pad">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/dot.png';  ?>">
					</div>
				</div>
				<div class="row padd_h">
					<div class="col-md-10">
						<ul class="diffrnt_hed time_hed">
							<li class="time_act"><a class="trst_trns tim_clck" href="javascript:void(0)">Time</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6 no_pad steps_aa">
				<div class="row">
					<div class="col-md-12 greeen_bg trust_contnt div_time animated slideInUp">
						<ul class="steps_list">
							<li class="trans_steps">Creating the largest marketplace with a trusted platform for commercial property in Gurgaon.</li>
							<li class="trans_steps">At 15 bells all the property owners are trusted and 100% verified with authorized users.</li>
							<li class="trans_steps">The properties listed on our commercial property site, undergo "in-person verification" by the team.</li>
						</ul>
					</div>
					<div class="col-md-12 greeen_bg div_trnsp animated slideInUp" style="display:none;">
						<ul class="steps_list">
							<li class="trans_steps">At 15 Bells it takes only 15 Hours to close your Commercial Real Estate Transaction through it's online and real-time trading technology.</li>
							<li class="trans_steps">Be it a commercial building, commercial rentals, or any commercial real estate project - 15 Bells helps you locate properties of interest which are world-class properties and a Right Match for you.  </li>
							<li class="trans_steps">15 Bells is in charge of the Digital revolution in bringing the real-time conventional real estate space. Assuring the most-trusted & convenient Digital Platform where the Real Estate property trading is taken to a next revolution </li>
						</ul>
					</div>
					<div class="col-md-12 greeen_bg contn_time animated slideInUp" style="display:none;">
						<ul class="steps_list">
							<li class="trans_steps">We are not just a property listing portal, but a real-time virtual platform where buyers meet sellers.     </li>
							<li class="trans_steps">Creating the largest marketplace where you can get the Best commercial properties for sale in Gurgaon.  </li>
							<li class="trans_steps">15 Bells with it’s patented technology bring innovation at every getting Buyers, Sellers, lessor, and Lessee on one portal with the most transparent proptech company ever.  </li>
						</ul>
					</div>
				</div>
			</div>
			
		</div>
	
	
</div>

<div class="container-fluid no_pad hidden-lg hidden-md">
	<div class="row difference_steps">
		<div class="col-md-12">
			<div class="row">
				<h5 class="trans_head_b">What makes us<br>Different</h5>
			</div>
			<div class="row different_steps">
				<div class="panel-group our_plus" id="accordion" role="tablist" aria-multiselectable="true">

					<div class="panel panel-default plus_points">
						<div class="panel-heading color_change" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<i class="more-less glyphicon glyphicon-plus"></i>
									Trust
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								  <ul class="steps_list">
									<li class="trans_steps">Creating the largest marketplace with a trusted platform for commercial property in Gurgaon.</li>
									<li class="trans_steps">At 15 bells all the property owners are trusted and 100% verified with authorized users.</li>
									<li class="trans_steps">The properties listed on our commercial property site, undergo "in-person verification" by the team.</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default plus_points">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<i class="more-less glyphicon glyphicon-plus"></i>
									Transparency
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<ul class="steps_list">
									<li class="trans_steps">At 15 Bells it takes only 15 Hours to close your Commercial Real Estate Transaction through it's online and real-time trading technology.</li>
									<li class="trans_steps">Be it a commercial building, commercial rentals, or any commercial real estate project - 15 Bells helps you locate properties of interest which are world-class properties and a Right Match for you.  </li>
									<li class="trans_steps">15 Bells is in charge of the Digital revolution in bringing the real-time conventional real estate space. Assuring the most-trusted & convenient Digital Platform where the Real Estate property trading is taken to a next revolution </li>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default plus_points">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<i class="more-less glyphicon glyphicon-plus"></i>
									Time
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<ul class="steps_list">
									<li class="trans_steps">We are not just a property listing portal, but a real-time virtual platform where buyers meet sellers.     </li>
									<li class="trans_steps">Creating the largest marketplace where you can get the Best commercial properties for sale in Gurgaon.  </li>
									<li class="trans_steps">15 Bells with it’s patented technology bring innovation at every getting Buyers, Sellers, lessor, and Lessee on one portal with the most transparent proptech company ever.  </li>
								</ul>
							</div>
						</div>
					</div>

				</div><!-- panel-group -->
			</div>
		</div>
	</div>
</div>
<div class="container-fluid no_pad step_banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6 no_pad">
				<h6 class="trans_head_b">Brands that<br>trust us</h6>
				<p class="brand_txt">At 15-Bells we are providing you the genuine clients with real-time assistance from our customes service representatives</p>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/dlf.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/emaar.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/gaur.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/dlf.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/emaar.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/gaur.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/dlf.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/gaur.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/dlf.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/gaur.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/dlf.png';  ?>" width="80">
				</div>
			</div>
			<div class="col-md-2 col-xs-4 pad_client text-center">
				<div class="clients_det">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/clients/gaur.png';  ?>" width="80">
				</div>
			</div>
			
		</div>
		
	</div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<?php 
$script = <<< JS

   $(document).ready(function(){
   
    $('.fadein .brand_name:gt(0)').hide();

    setInterval(function(){
		$('.fadein > :first-child').fadeOut().next('.brand_name').fadeIn().end().appendTo('.fadein');
		}, 6000);
	//$(".transp_contnt").hide();
	
	$(".trans_clck").click(function(){
	
		$(".trust_contnt").hide();
		$(".div_trnsp").show();
		$(".contn_time").hide();
		$(".trans_act").addClass("active");
		$(".trst_act").removeClass("active");
		$(".time_act").removeClass("active");
    });
	$(".trust_clck").click(function(){
		$(".trust_contnt").show();
		$(".div_trnsp").hide();
		$(".contn_time").hide();
		$(".trans_act").removeClass("active");
		$(".trst_act").addClass("active");
		$(".time_act").removeClass("active");
    });
	$(".tim_clck").click(function(){
		$(".trust_contnt").hide();
		$(".div_trnsp").hide();
		$(".contn_time").show();
		$(".trans_act").removeClass("active");
		$(".trst_act").removeClass("active");
		$(".time_act").addClass("active");
    });
		// $(".transp_contnt").animate({bottom: '250px'});
	
	$(".buy").click(function(){
		 $(".buy").addClass("active");
		  $(".sell").removeClass("active");
	});
	$(".sell").click(function(){
		 $(".sell").addClass("active");
		  $(".buy").removeClass("active");
	});
	
	$('#myCarousel').carousel({
        interval: 10000
    })
	$('#myCarousel1').carousel({
        interval: 10000
    })
	$('#myCarousel2').carousel({
        interval: 10000
    })
	$('#myCarousel3').carousel({
        interval: 10000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
	
  });

 function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
      
}

$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);

	 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('blue');
  });
	$('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('blue');
  });
JS;
$this->registerJs($script);
?>

<?php

$this->registerJsFile('/newjs/siteindex.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>















  
