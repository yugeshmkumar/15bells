
<?php
//$tittle = $this->title = Yii::t('app', '15Bells');
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$urlsd =   Yii::getAlias('@frontendUrl');
?>
<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/banner.jpg';  ?>">
			
			<div class="container-fluid header_bg no_pad div_header"  id="banner_cont">
			
						<div class="container top_section">
				<div class="col-md-12 text-center brand_desp">
					
					<div class="fadein">
						<h1 class="brand_name">Explore On-Demand experience of commercial properties transaction minus hassles like market research, trust issues, middlemen cost,  site visit & negotiations.
 </h1>
						<h1 class="brand_name">The revolutionary proptech platform is making commercial real estate market in India transparent, trustworthy & timely.</h1>
						<h1 class="brand_name">It's as easy as ringing the bell 15 times to sell, buy, or lease a commercial property in India. Experience the next level of market intelligence from the platform.</h1>
						<h1 class="brand_name">Set your commercial property requirements once and then the platform will help you achieve the goal without any hassle — leverage Technology to get the best.</h1>
						<h1 class="brand_name">Ever calculated the time you spent doing your last property transactions? Compare it with using this commercial real estate platform anytime and be surprised by the results.</h1>
						<h1 class="brand_name">This real estate platform removes unnecessary pain & cost in fulfilling your commercial property requirements. Sell, Buy & Lease with Ease. </h1>
						<h1 class="brand_name">We have eased the commercial real estate trading - making it more transparent, flexible, trustworthy - Give it a Try & see how it makes you fly.</h1>
						<h1 class="brand_name">Get the best deal - A Calm, innovative & virtual experience of commercial property trading real-time.</h1>
						<h1 class="brand_name">15bells is a proptech helping you do more in less. Think of the complete transactions within 15 minutes. Make a real-time informed decision, a decision which can never go wrong.</h1>
						<h1 class="brand_name">We are making commercial real estate transactions seamless, faceless & hassle less. Our patented technology questions the status quo & in the shortest time, you will be able to buy, sell, or lease with ease.	</h1>
						<hi class="brand_name">Next-generation revolutionary way to address commercial property needs. Our patented technology makes the information & process completely real-time, which is reliable, transparent, utilizing technology.</h1>
						
						</div>
					
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
										<i class="fa fa-angle-down role_drop"></i>
									 	 <input type="hidden" class="option" name="namesubmit" value="" />
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
				<p class="img_s text-center"><a href="javascript:void()" class="auction_link"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/instant.svg';  ?>" class="img_trans intant_auc" width="75"></a></p>
				<p class="transac_typ text-center">Instant Mode</p>
				<p class="transaction_text auction_text hidden-xs hidden-sm">Buy, Sell or Lease by utilizing our commercial property Instant Auction technology. Win-Win for everyone</p>
				<p class="transaction_text hidden-xs hidden-sm"><a href="javascript:void()" class="auction_link">Experience Instant Real Estate Auction Now</a> </p>
				
			</div>
			<div class="col-md-4 col-xs-4 pad_trans">
				<p class="img_s text-center"><a href="javascript:void()" class="auction_link"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/forward.svg';  ?>" width="110" class="img_trans forward_auc"></a></p>
				<p class="transac_typ text-center">Forward Auction</p>
				<p class="transaction_text auction_text hidden-xs hidden-sm">Our technology helps both Suppliers & Seekers in maintaining the market equilibrium based on supply & demand real-time.</p>
				<p class="transaction_text hidden-xs hidden-sm"><a href="javascript:void()" class="auction_link">See how Forward Auction is beneficial for everyone.</a> </p>
			</div>
			<div class="col-md-4 col-xs-4 pad_trans">
				<p class="img_s text-center"><a href="javascript:void()" class="auction_link"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/reverse.svg';  ?>" width="130" class="img_trans reverse_auc"></a></p>
				<p class="transac_typ text-center">Reverse Auction</p>
				<p class="transaction_text auction_text hidden-xs hidden-sm">Our Technology helps the brands in getting the best deals and at the same time ensuring benefits for sellers & lessors.</p>
				<p class="transaction_text hidden-xs hidden-sm"><a href="javascript:void()" class="auction_link">See the benefits of Reverse Auction</a></p> 
			</div>
		</div>
	</div>
</div>

<div class="container-fluid no_pad step_banner">
	<div class="container">
		<div class="row">
			<div class="col-md-12 no_pad">
				<h3 class="trans_head_b">Buy or Sell Properties,In just simple steps</h3>
			</div>
			<div class="col-md-12 text-center buy_sell">
				
				<ul class="nav nav-tabs steps_tab">
				  <li class="active col-md-3 col-xs-3 no_pad"><a data-toggle="tab" class="step_link border_right" href="#buy_t">Buy</a></li>
				  <li class="col-md-3 col-xs-3 no_pad"><a data-toggle="tab" class="step_link border_left border_right" href="#sell_l">Sell</a></li>
				  <li class="col-md-3 col-xs-3 no_pad"><a data-toggle="tab" class="step_link border_left border_right" href="#lease_in">Lease in</a></li>
				  <li class="col-md-3 col-xs-3 no_pad"><a data-toggle="tab" class="step_link border_left" href="#lease_out">Lease Out</a></li>
				</ul>
			</div>
		</div>
		

			<div class="tab-content property_sell">
			  <div id="buy_t" class="tab-pane fade in active">
				<div class="row pad_step">
					<div class="col-md-5 text-center">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/buy.jpg';  ?>" class="img-responsive">
					</div>
					<div class="col-md-7 text-left">
					<div class="accordion_container text-left">
						<div class="accordion_head step_bells"><span class="step_mark">1</span>Look for a Perfect Location <span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">One of the most important criteria is considering the location of the property. With 15 bells you get to make your custom advanced search area in any particular location by using different shapes and get the available properties listed.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" class="read_more">Search Commercial Properties</a></p>
														</div>
							</div>
						</div>
						<div class="accordion_head step_bells"><span class="step_mark">2</span>Set up your Expectation<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Retail shops, Office space, warehouses or lease space - Try setting up your Budget and get the Best Matched properties.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" class="read_more">Discover the best-matched properties</a>
							</p>
							</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">3</span>Discover a commercial  property you would love to Buy<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Search more than 1000 commercial properties in Delhi NCR for sale or lease.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" class="read_more">Start your Property Search in Delhi NCR</a>
							 </p>
							</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">4</span>Schedule your site visit online or offline<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">You can get a virtual tour of the shortlisted properties and save your time or get a physical site visit. 15 Bells do it both!</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" class="read_more">Find Properties you want to see.</a>
							</p>
							</div>
						</div>
						<div class="accordion_head step_bells"><span class="step_mark">5</span>Get your Property Documentations verified:<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Property Document can never be an issue with 15 bells, Be it Buyer, Seller, Lessor or Lessee all the parties get verified before registering.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" class="read_more">Select a Property to buy & validate documents.</a>
							  </p>
							</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">6</span>Buy your Favorite Property<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">With 15 Bells you can now deal with finalizing the deal on your favorite property in real time via Instant Trading or Forward Auction
							
							</p>
							</div>
						</div>
						
					
						
					</div>
				</div>
		</div>
				
			  <div id="sell_l" class="tab-pane fade">
				<div class="row text-center pad_step">
					<div class="col-md-5">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/sell.jpg';  ?>" class="img-responsive">
					</div>
					<div class="col-md-7 text-left">
					<div class="accordion_container text-left">
						<div class="accordion_head step_bells"><span class="step_mark">1</span>Know your Location <span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">When you are posting your property, let your buyers know the location of your property. We offer you a faster and easier way to mark the exact property location.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" class="read_more">See the demand in your area.</a></p>							</div>
							</div>
						</div>
						<div class="accordion_head step_bells"><span class="step_mark">2</span>Post your Property<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">It’s simple, Select your property type from office space, warehouse or retail shops for the right match.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" class="read_more">Post your commercial property</a> </p>
							</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">3</span>Beautify your Property: <span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Beautify & enrich your property listing by providing relevant information only.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" class="read_more">Show how good your property is.</a>	</p>
							</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">4</span>Wait and watch for the right customer: <span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Once your property is on 15 Bells, potential buyers seeking for your property type in your area will start receiving a notification.</p>

							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" class="read_more">Start Receiving interested buyers requests.</a></p>
							</div>
						</div>
						<div class="accordion_head step_bells"><span class="step_mark">5</span>Manage your Properties and clients: <span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">You get a customized dashboard to schedule a visit, put up your expectations, negotiate on the budget or verifying any documents - with 15 Bells Dedicated Account Manager by your side.
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" class="read_more">Create your Seller Account now.</a></p>
							</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">6</span>Prepare your Property for the auction:<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">When selling your property 15 bells offers their “Auction Model” where you can Bid and WIn for the property just within 15 Hours.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" class="read_more">Request for putting your Property on Auction.</a></p>
							</div>
						</div>
			
						
					</div>
				</div>
			  </div>
			  <div id="lease_in" class="tab-pane fade">
				<div class="row text-center pad_step">
					<div class="col-md-5">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/lessee.jpg';  ?>" class="img-responsive">
					</div>
					<div class="col-md-7 text-left">
					<div class="accordion_container text-left">
						<div class="accordion_head step_bells"><span class="step_mark">1</span>Look for a Perfect Location  <span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">There are several parameters to consider while leasing or renting a commercial property. Location is one of the most important factors. Safe environment, public transport, healthy environment, easy accessibility to necessary things, convenience for clients, etc.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="read_more">Start finding a property to lease or rent in your preferred location</a></p>
							</div>
						</div>
						<div class="accordion_head step_bells"><span class="step_mark">2</span>Set up your Expectation<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Retail shops, Office space, warehouses or lease space? Try setting up your Budget and get the Best Matched properties. </p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="read_more">Start finding the properties through 15Bells Engine.</a></p>

						</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">3</span>Discover a commercial  property you would love to Lease In.<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Discover all the commercial properties that are best matched to suit your requirements.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="read_more">Start your Property Search in Delhi NCR</a></p>

							</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">4</span>Schedule your site visit online or offline<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Want to see the properties in person? We will help you with all that along with a coffee.<br>But if you want to save time & see the properties online, you can get a virtual tour of the shortlisted properties 
								<br>15 Bells do it both!</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="read_more">Find Properties you want to see.</a></p>
	
						</div>
						</div>
						<div class="accordion_head step_bells"><span class="step_mark">5</span>Make a smart decision.<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">With our advanced algorithm, you will know your best-matched properties. Our platform & your dedicated account manager will help you make a data-informed decision which will always go right.  </p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="read_more">Start your Smart Search </a></p>

						</div>
						</div>
						
						
						
					</div>
				</div>
			  </div>
			  </div>
				
			  <div id="lease_out" class="tab-pane fade">
			  <div class="row text-center pad_step">
					<div class="col-md-5">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/lessor.jpg';  ?>" class="img-responsive">
					</div>
					<div class="col-md-7 text-left">
					<div class="accordion_container text-left">
						<div class="accordion_head step_bells"><span class="step_mark">1</span>Add your Location: <span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">When you are posting your property, let your prospective lessee know the location of your property. We offer you a faster and easier way to mark the exact property location.</p>							</div>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="read_more">See how many are looking to rent a property.</a></p>
						</div>
						</div>
						<div class="accordion_head step_bells"><span class="step_mark">2</span> Post your Property: It’s simple.<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Select your property type from office space, warehouse or retail shops for the right match. </p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="read_more">Post your commercial property for lease</a></p>
							</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">3</span>Beautify your Property:<span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Beautify & enrich your property listing by providing information on the amenities & facilities.</p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="read_more">Show how good your property is.</a></p>
						</div>
						</div>
						
						<div class="accordion_head step_bells"><span class="step_mark">4</span>Wait and watch for the right customer: <span class="plusminus">+</span></div>
						<div class="accordion_body" style="display: none;">
							<div class="col-md-12 no_pad text-left">
							<p class="step_txt">Once your property is on 15 Bells, potential buyers seeking for your property type in your area will start receiving a notification. </p>
							<p class="step_txt text-center"><a href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" class="read_more">Start Receiving interested buyers requests.</a></p>
						</div>
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
				
				<div class="col-md-8 no_pad">
					<ul class="prop_cat nav nav-pills">
						<li class="active"><a data-toggle="pill" href="#home" class="categ_selec">Commercial Office</a></li>
						<li><a data-toggle="pill" href="#menu1" class="categ_selec">Commercial Retail</a></li>
						<li><a data-toggle="pill" href="#menu2" class="categ_selec">Land & Plot</a></li>
						<li><a data-toggle="pill" href="#menu3" class="categ_selec">Hotels</a></li>
					</ul>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		

				<div class="tab-content">
				
				  <div id="home" class="tab-pane fade in active">
						
						<div class="col-md-8">
						<div id="myCarousel" class="carousel fdi-Carousel slide">
						 <!-- Carousel items -->
							<div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
								<div class="carousel-inner onebyone-carosel">
									<div class="item active">
										<div class="col-md-4 ribbon">
											<div class="ribbon-top-left">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c_office.jpg';  ?>" class="img-responsive">
	
											<span>Office Space</span></div>
										</div>
									</div>
									<div class="item">
										<div class="col-md-4 ribbon">
											<div class="ribbon-top-left">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c_business.jpg';  ?>" class="img-responsive">
											<span>Co-working</span>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="col-md-4 ribbon">
											<div class="ribbon-top-left">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c_work.jpg';  ?>" class="img-responsive">
	
											<span>IT/ITES/SEZ Park</span></div>
										</div>
									</div>
									<div class="item">
										<div class="col-md-4 ribbon">
											<div class="ribbon-top-left">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/c_comp.jpg';  ?>" class="img-responsive">
	
											<span>Business Center</span></div>
										</div>
									</div>
									
								</div>
								
							</div>
							<!--/carousel-inner-->
						</div><!--/myCarousel-->
					
				</div>
				<div class="col-md-4 pad_off">
							<h3 class="office_hed">Commercial Office</h3>
							<div class="row cat_name text-center">
								<div class="col-md-12">
									<a class="btn btn-default comm_cta" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>">Find Commercial Offices for Sale</a>
								</div>
								<div class="col-md-12">
								<a class="btn btn-default comm_cta" href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>">Find Commercial Offices for Lease</a>

								</div>
								
							</div>
						</div>
				  </div>
				  <div id="menu1" class="tab-pane fade">
						
						<div class="col-md-8">
							<div id="myCarousel1" class="carousel fdi-Carousel slide">
							 <!-- Carousel items -->
								<div class="carousel fdi-Carousel slide" id="eventCarousel1" data-interval="0">
									<div class="carousel-inner onebyone-carosel">
										<div class="item active">
											<div class="col-md-4 ribbon">
												<div class="ribbon-top-left">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/r_mall.jpg';  ?>" class="img-responsive">
												<span>Building Showroom</span>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="col-md-4 ribbon">
												<div class="ribbon-top-left">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/r_shop.jpg';  ?>" class="img-responsive">
												<span>Retail Shop</span>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="col-md-4 ribbon">
												<div class="ribbon-top-left">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/r_showroom.jpg';  ?>" class="img-responsive">
												<span>Retail Mall</span>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="col-md-4 ribbon">
												<div class="ribbon-top-left">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/retail_m.jpg';  ?>" class="img-responsive">
												<span>Retail Mall</span>
												</div>
											</div>
										</div>
										
									</div>
									
								</div>
								<!--/carousel-inner-->
							</div><!--/myCarousel-->
					

				  </div>
				  <div class="col-md-4 pad_off">
							<h3 class="office_hed">Commercial Retail</h3>
							<div class="row cat_name text-center">
								<div class="col-md-12">
									<a class="btn btn-default comm_cta" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>">Find Retail Shops for Sale</a>
								</div>
								<div class="col-md-12">
								<a class="btn btn-default comm_cta" href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>">Find Retail Shops for Lease</a>

								</div>
								
							</div>
						</div>
				</div>
				<div id="menu2" class="tab-pane fade">
					
						<div class="col-md-8">
							<div id="myCarousel2" class="carousel fdi-Carousel slide">
							 <!-- Carousel items -->
								<div class="carousel fdi-Carousel slide" id="eventCarousel2" data-interval="0">
									<div class="carousel-inner onebyone-carosel">
									<div class="item active">
											<div class="col-md-4 ribbon">
												<div class="ribbon-top-left">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/agriculture.jpg';  ?>" class="img-responsive">
												<span>Agriculture</span>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="col-md-4 ribbon">
												<div class="ribbon-top-left">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/factory.jpg';  ?>" class="img-responsive">
												<span>Factory</span>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="col-md-4 ribbon">
												<div class="ribbon-top-left">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/warehouse.jpg';  ?>" class="img-responsive">
												<span>Warehouse</span>
												</div>
											</div>
										</div>
										<div class="item">
											
											<div class="col-md-4 ribbon">
												<div class="ribbon-top-left">
												<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/categories/farmland.jpg';  ?>" class="img-responsive">
												<span>Farmland</span>
												</div>
											</div>
										</div>
										
									</div>
									
								</div>
								<!--/carousel-inner-->
							</div><!--/myCarousel-->
					
				  </div>
				  <div class="col-md-4 pad_off">
							<h3 class="office_hed">Land & Plots</h3>
							<div class="row cat_name">
							<div class="row cat_name text-center">
								<div class="col-md-12">
									<a class="btn btn-default comm_cta" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>">Find Land & Plots for Sale</a>
								</div>
								<div class="col-md-12">
								<a class="btn btn-default comm_cta" href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>">Find Lands & Plots for Lease</a>

								</div>
								
							</div>
							</div>
						</div>
				</div>
				<div id="menu3" class="tab-pane fade">
					
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
					
				  </div>
				  <div class="col-md-4 pad_off">
							<h3 class="office_hed">Hotel </h3>
							<div class="row cat_name text-center">
								<div class="col-md-12">
									<a class="btn btn-default comm_cta" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>">Find Hotels for Sale</a>
								</div>
								<div class="col-md-12">
								<a class="btn btn-default comm_cta" href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>">Find Hotels for Lease</a>

								</div>
								
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
							<li class="trans_steps">Creating the largest marketplace with a trusted platform for commercial properties in India.</li>
							<li class="trans_steps">At 15 bells all the property owners and buyers are trusted and 100% verified.</li>
							<li class="trans_steps">The listings on our commercial real estate platform , undergoes "in-person verification" by the team.</li>
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
							<li class="trans_steps">We are not just a property listing portal, but a real-time commercial properties platform where buyers meet sellers.     </li>
							<li class="trans_steps">Creating the largest marketplace where you can find the Best commercial properties in India.  </li>
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
</div>




<!---- Lead Modal-------->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal_dialogue">

    <!-- Modal content-->
    <div class="modal-content draw_map lead_auction">
        <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
      
      <div class="modal-body">
		<div class="container-fluid">
			<h1 class="modal_transac">We have built a revolutionary product that makes the commercial real estate deals easy.</h1>
			<p class="auction_function">The Auction Technology is currently an invite-only functionality. </p>
			<div class="row details_u">
					<h3 class="details_user">Please provide your details to ask for early access.</h3>

					<?php $modeled = new \common\models\ChatContactUs(); ?>
				
            <?php $form = ActiveForm::begin(['id' => $modeled->formName(),'action'=>"chatcontactus/create"]); ?>

<div class="col-md-4">
            <?php echo $form->field($modeled, 'name')->textInput(['maxlength' => true, 'placeholder' => "Name", 'class'=>'form-control input_desgn','id' => 'chatname'])->label(false); ?>
            </div>
			<div class="col-md-4">
			<?php echo $form->field($modeled, 'email')->textInput(['maxlength' => true, 'placeholder' => "Email",'class'=>'form-control input_desgn', 'id' => 'chatemail'])->label(false); ?>
			</div>	

<div class="col-md-4">
            <?php echo $form->field($modeled, 'phone')->textInput(['placeholder' => "Phone Number", 'class'=>'form-control input_desgn','id' => 'Phone'])->label(false); ?>
			</div>	

          <p class="col-md-12 no_pad">  <?= Html::submitButton('Submit', ['class' => 'property_process submit_det']) ?></p>
                    <?php ActiveForm::end(); ?>

					<!-- <div class="col-md-4">
                    <input type="text" class="form-control input_desgn" placeholder="Name">
				 </div>
				 <div class="col-md-4">
                    <input type="text" class="form-control input_desgn" placeholder="Phone">
				 </div>
				 <div class="col-md-4">
                    <input type="text" class="form-control input_desgn" placeholder="Email">
				 </div>
				 <p class="col-md-12 no_pad"><a class="property_process submit_det" href="#">Submit</a></p> -->
			</div>
		</div>
      </div>
      
    </div>

  </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<?php 
$script = <<< JS
$('form#{$modeled->formName()}').on('beforeSubmit',function(e){
 
 e.preventDefault();
 e.stopImmediatePropagation();
var form = $(this);
$.post(
 form.attr("action"),
  form.serialize()

).done(function(result){
 
if(result == 1){

	// $(document).find('#slider').css("right","-342px");
   //  var chatid = $(document).find("#slider").eq(0).children(1).attr("id");
	
	 
	 //var chatid = document.getElementById(chatid);
	  //chatid.setAttribute("id", "sidebar");
	  
	  //chatid.setAttribute("onclick", "open_panel()");
	 $('#myModal').modal('toggle');
	 $(form).trigger("reset");
	  toastr.success('Thanks for your time , Our Team will reach you Soon','success');

}else{

	 $('#message').html('Something Wrong');  
  }
	   
}).fail(function(){
   console.log("server Error"); 

});
return false;

}); 


$(".auction_link").click(function(){
	$("#myModal").modal('show');
});

		var elems = $(".brand_name");
if (elems.length) {
  var keep = Math.floor(Math.random() * elems.length);
  for (var i = 0; i < elems.length; ++i) {
    if (i !== keep) {
      $(elems[i]).hide();
    }
  }
}			

   $(document).ready(function(){
	$(".accordion_head").click(function() {
    if ($('.accordion_body').is(':visible')) {
      $(".accordion_body").slideUp(300);
      $(".plusminus").text('+');
    }
    if ($(this).next(".accordion_body").is(':visible')) {
      $(this).next(".accordion_body").slideUp(300);
      $(this).children(".plusminus").text('+');
    } else {
      $(this).next(".accordion_body").slideDown(300);
      $(this).children(".plusminus").text('-');
    }
  });
   // $('.fadein .brand_name:gt(0)').hide();

    // setInterval(function(){
	// 	$('.fadein > :first-child').fadeOut().next('.brand_name').fadeIn().end().appendTo('.fadein');
	// 	}, 6000);
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















  
