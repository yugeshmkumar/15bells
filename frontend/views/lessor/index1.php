<?php

use yii\helpers\Url;
use yii\web\View;
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&libraries=places,geometry"></script>

<div class="container text-center pad50">
						<div class="row">
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/logo1.png';  ?>" class="img-responsive search_logo">
						</div>
					    <div class="row">
							<p class="addprop_txt">Tag and Add your property with supporting documents to get the best vertified buyer in the market for your space.</p>
							<p class="add_buttn"><a href="#" class="button_add add_prop lessr_addprop" onclick="ga('send', 'event', 'Lessor Add Property', 'Lessor Add Property', 'Lessor Add Property','Lessor Add Property')">Add your property</a><a href="#" class="button_add how_wrk lessr_wrks"  onclick="ga('send', 'event', 'Lessor How It Works', 'Lessor How It Works', 'Lessor How It Works','Lessor How It Works')">How it works?</a></p>
						</div><!-- Form inline close -->
			</div>
			
<!-- end of navbar-->
		</div>
	</section>
<!---------First Section Ends------->

<!------------Add Property Page starts-------------->
	<div class="container-fluid pad50 property_form add1">
		<div class="container">
			<div class="row">
				<div class="addprop_form row">
					<h3 class="property_head"><span>Add your property</span></h3>
						
						<div class="form-group">

									  <select class="form-control add_input	" id="getproptype">

										<option value="" disabled="" selected>Property Type</option>
										
										<option value="11">Commercial Office Space</option>
										<option value="12">Office in IT Park</option>
										<option value="13">Commercial Shop</option>
										<option value="15">Commercial Land/Inst. Land</option>
										<option value="16">Warehouse</option>
										<option value="17">Industrial Land/Plots</option>
										<option value="18">Commercial Buildings/showroom</option>
										<option value="22">Agricultural / Farm land</option>
										<option value="23">Factory</option>
										<option value="24">Hotel/Resorts</option>
										<option value="25">Guest-House/Banquet-Hall</option>
										<option value="26">Space in Retails mall</option>
										<option value="27">Office in Business Park</option>
										<option value="28">Business Center</option>
										<option value="29">Other</option>

									  </select>

								</div>
						<div class="form-group one_add" >
						  <input type="text" id="name" class="form-control add_input" placeholder="Name">
						</div>
						<div class="col-md-12 no_pad one_add" >
							<div class="col-md-6 input_select">
								<div class="form-group">

									  <select class="form-control add_input	" id="getcity" onchange="getcity(this.value)">

										<option value="" disabled="" selected>City</option>
										
										<option value="Gurgaon">Gurgaon</option>
										<option value="Delhi">Delhi</option>
										<option value="Noida">Noida</option>
										<option value="Greater Noida">Greater Noida</option>
										<option value="Faridabad">Faridabad</option>
										<option value="Ghaziabad">Ghaziabad</option>

									  </select>

								</div>
							</div>
							<div class="col-md-6 input_loc" >
								<input type="text" id="searchTextField" class="form-control add_input" placeholder="Location">
							</div>
							
						</div>
						<div class="col-md-12 text-center pading_top">
						<button id="onebutton" class="button_add lessr_sbmt" onclick="ga('send', 'event', 'Lessor Add Property Submit Button', 'Lessor Add Property Submit Button', 'Lessor Add Property Submit Button','Lessor Add Property Submit Button')">Submit</button>
					        </div>
				</div>
				
			</div>
			
		</div>
		
	</div>
		<div class="container-fluid how1 bg_sellr">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<span class="button_add">How it works?</span>
					</div>
					<div class="col-md-12 pad50">
							<div class="row">
								<div class="col-md-8">
									
								</div>
								<div class="col-md-4">
									<div class="row text-center">
										<p class="number">1</p>
										<p class="txt">Open an Account</p>
									</div>
									<div class="row text-center step_p">
										<p class="number">2</p>
										<p class="txt">Tag Your Property</p>
									</div>
									<div class="row text-center">
										<p class="number">3</p>
										<p class="txt">Strike a Deal</p>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
$(document).ready(function(){
	$(".add_prop").click(function() {
				$('html, body').animate({
					scrollTop: $(".add1").offset().top
				}, 1000);
			});
	$(".how_wrk").click(function() {
				$('html, body').animate({
					scrollTop: $(".how1").offset().top
				}, 1000);
			});
		});
</script>
<script>
 $(window).scroll(function() {
    if($(this).scrollTop()>5) {
		$( ".navbar-me" ).addClass("fixed-me");
		$( ".navbar-me" ).addClass("neela_bg");
    } else {
        $( ".navbar-me" ).removeClass("fixed-me");
        $( ".navbar-me" ).removeClass("neela_bg");
    }
});
var globalvar = '';

function getcity(val) {
	$('#searchTextField').val('');
	globalvar = val;

}

  function initialize() {

var defaultBounds = new google.maps.LatLngBounds(
		new google.maps.LatLng(-33.8902, 151.1759),
		new google.maps.LatLng(-33.8474, 151.2631));
var input = document.getElementById('searchTextField');



var options = {
	bounds: defaultBounds,
	//types: ['(cities)'],
	componentRestrictions: {country: 'IN'}
};

autocomplete = new google.maps.places.Autocomplete(input, options);

autocomplete.addListener('place_changed', function () {


	var place = autocomplete.getPlace();

	// If the place has a geometry, then present it on a map.
	if (place.geometry.viewport) {
		//  console.log(place.address_components);
		var arrAddress = place.address_components;
		$.each(arrAddress, function (i, address_component) {
			// console.log('address_component:'+i);

			if (address_component.types[0] == "route") {
				// console.log(i+": route:"+address_component.long_name);
				itemRoute = address_component.long_name;
			}

			if (address_component.types[0] == "locality") {
				//console.log("town:"+address_component.long_name);

				itemLocality = address_component.long_name;
				$('#town').val(itemLocality);
			}

			if (address_component.types[0] == "sublocality_level_1") {
				// console.log("province:"+address_component.long_name);
				itemSectorf = address_component.long_name;
				$('#sector').val(itemSectorf);

			}

			if (address_component.types[0] == "country") {
				//console.log("country:"+address_component.long_name); 
				itemCountry = address_component.long_name;
			}

			if (address_component.types[0] == "postal_code_prefix") {
				// console.log("pc:"+address_component.long_name);  
				itemPc = address_component.long_name;
			}

			if (address_component.types[0] == "street_number") {
				// console.log("street_number:"+address_component.long_name);  
				itemSnumber = address_component.long_name;
			}
			//return false; // break the loop   
		});

		
	}



});

$(input).on('input', function () {


	var str = input.value;
	prefix = globalvar + ', ';
	if (str.indexOf(prefix) == 0) {
		//console.log(input.value);
	} else {
		if (prefix.indexOf(str) >= 0) {
			input.value = prefix;
		} else {
			input.value = prefix + str;
		}
	}

});


}

$("#onebutton").click(doSomething);

function doSomething() {


var getproptype = $('#getproptype').val();
var name = $('#name').val();
var getcity = $('#getcity').val();
var getlocation = $('#searchTextField').val();


if (getproptype != '' && name != '' && getcity != '' && getlocation != '') {

	

	$.ajax({
		type: "POST",
		url: 'lessor/getnumber',
		data: {getproptype: getproptype, name: name, getcity: getcity ,getlocation: getlocation},
		success: function (data) {
			 
			 if (data == 1) {
				
	          window.location.replace("addproperty/create");

			 }else{

		        window.location.replace("user/sign-in/login");

			 } 


		},
	});

		} else {

		     toastr.error('Something is Missing', 'error');
		}

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
   
