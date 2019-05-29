
	<section class="container-fluid header_bg parallax-window section" data-parallax="scroll" data-image-src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/about.jpg';  ?>">
			
		<div class="container-fluid no_pad div_header">
		
			
			<div class="container" id="banner_cont">
				<div class="col-md-8 col-md-offset-1 text-left brand_desp about_bannr">
					<p class="about_det animated slideInDown">With 15 Bells you can now deal with your property in real time. Get your property auction ready where you Bid and Win for the desired properties. </p>
					<h1 class="about_head">Types of real estate <br>Transaction </h1>
				</div>
				
				
			</div>
			
			
<!-- end of navbar-->
		</div>
		
	</section>

<!--Transaction types Section-->

<div class="container-fluid no_pad">
	<div class="">
		<div class="row">
			<div class="col-md-12 auction_head">
				<h1 class="trans_head_b">15 Bells introduce three methods <br>of the transaction</h1>
			</div>
			<div class="col-md-12 instant_auc">
				<div class="col-md-3 text-center">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/instant.svg';  ?>" class="img-responsive mode_image">
				</div>
				<div class="col-md-9">
					<div class="row">
						<h2 class="auction_type">Instant Auction</h2>
						<p class="auction_content">In Instant method of auction, it would be a one on one transaction, both the clients would be interested in transacting. For the same, we would be arranging an escrow deal where both the clients have to deposit some amount in the escrow account as a confirmation to sit for the transaction.</p>
					</div>
					<div class="row">
						<h2 class="auction_type">Process</h2>
						<p class="auction_content">Buying/Selling- In case the deal is successful, the amount will be parked/locked in the account and the remaining amount has to deposit in the said account within the decided timelines. The buyer may validate all the documents meanwhile to check the validity of the documents. If some discrepancy is found in the document trail, the seller has to rectify the same. In case the seller is not able to address the same, the money deposited in the account will be returned back to the buyer saving his hard earned money. In case everything is perfect, the entire money will be deposited in the bank account of the seller on the registration day in the courts.</p>
						<p class="auction_content">15bells would charge their consultancy fees from the amount deposited by the seller in the starting and also from buyer while he is uploading his part of payment into the escrow account.</p>
					</div>
				</div>
			</div>
			<div class="col-md-12 no_pad forward_auction">
				
				<div class="col-md-9">
					<div class="row">
						<h2 class="auction_type">Forward Auction</h2>
						<p class="auction_content">15 Bells offers Forward Auctions where a single seller offers his / her property for sale with multiple buyers competing to buy the same property by bidding their best price forward. You can use the Forward Auction for buying any commercial property type including land, office space, retail space, or a warehouse.</p>
					</div>
					<div class="row">
						<h2 class="auction_type">Process</h2>
						<p class="auction_content">Buying/Selling- In case the deal is successful, the amount will be parked/locked in the account and the remaining amount has to deposit in the said account within the decided timelines. The buyer may validate all the documents meanwhile to check the validity of the documents. If some discrepancy is found in the document trail, the seller has to rectify the same. In case the seller is not able to address the same, the money deposited in the account will be returned back to the buyer saving his hard earned money. In case everything is perfect, the entire money will be deposited in the bank account of the seller on the registration day in the courts.</p>
						<p class="auction_content">15bells would charge their consultancy fees from the amount deposited by the seller in the starting and also from buyer while he is uploading his part of payment into the escrow account.</p>
					</div>
				</div>
				<div class="col-md-3 text-center">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/forward.svg';  ?>" class="img-responsive mode_image">
				</div>
			</div>
			<div class="col-md-12 instant_auc">
				<div class="col-md-3 text-center">
					<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/reverse.svg';  ?>" class="img-responsive mode_image">
				</div>
				<div class="col-md-9">
					<div class="row">
						<h2 class="auction_type">Reverse Auction</h2>
						<p class="auction_content">Reverse Auction is the best option for leasing commercial property. With this state of art technology, it becomes easy to automate the negotiation process with suppliers. 15 Bells conducts real-time, reverse auction between a single buyer or organization and suppliers.</p>
					</div>
					<div class="row">
						<h2 class="auction_type">Process</h2>
						<p class="auction_content">In this method, a corporate may be interested in a specific area and multiple owners might be interested in dealing with the said client. All of them will be allowed to sit for the auction on the D day after depositing EMD in the said escrow account.</p>
						<p class="auction_content">All the owners will give their lowest bid and the client may choose his best property basis his requirement. In the end, there would be one winner. All the EMD’s of other owners will be returned back. The EMD in leasing services would be an amount of a month rental as asked by the owner as the reserve price.</p>
						<p class="auction_content">On successful registration of the lease agreement in courts, the SD amount will be transferred into the bank account of the owner.</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>


<!--Scripts-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <script src="js/parallax.js"></script>
  <script>
   
	$(document).ready(function () {
    $('.prop_cat li a').click(function(e) {

        $('.prop_cat li.active').removeClass('active');

        var $parent = $(this).parent();
        $parent.addClass('active');
        e.preventDefault();
    });
});

</script>
 <script>
   $(document).ready(function(){
   
	//$(".transp_contnt").hide();
	
	$(".trans_clck").click(function(){
	//alert();
		$(".trust_contnt").hide();
		
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
 
 </script>
  <script>

  $(window).scroll(function() {
    if($(this).scrollTop()>5) {
        $( ".navbar-me" ).addClass("fixed-me");
    } else {
        $( ".navbar-me" ).removeClass("fixed-me");
    }
});
/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
  </script>

