



var urlget =  $('#urlget').val();

	$(function() {
		// Set
		var main = $('div.mm-dropdown .textfirst')
		var li = $('div.mm-dropdown > ul > li.input-option')
		var inputoption = $("div.mm-dropdown .option")
		var default_text = '<img src="'+urlget+'"/newimg/img/icons/buy.png> Buy';
	
		// Animation
		main.click(function() {
		 clearTimeout(exe);
		 $('.textfirst').css("display","none");
		 
			main.html(default_text);
			li.toggle('fast');
		});
		
		
		
	 
	
		// Insert Data
		li.click(function() {
			// hide
			li.toggle('fast');
			var livalue = $(this).data('value');
			var lihtml = $(this).html();
			main.html(lihtml);
			inputoption.val(livalue);
		});
	});
	
	$(function () {
		 
		

		
		  
		 var messages = [],
				 index = 0;
	
		 messages.push('<li class="input-option animated slideInUp" data-value="1" style="display: list-item;"><a href="javascript:void(0)"><img src="'+urlget+'/newimg/img/icons/buy.png"> Buy</a></li>');
			messages.push('<li class="input-option animated slideInUp sell_png" data-value="1" style="display: list-item;"><a href="javascript:void(0)">  <img src="'+urlget+'/newimg/img/icons/sell.png">  Sell </span></a></li>');
			messages.push('<li class="input-option animated slideInUp" data-value="1" style="display: list-item;"><a href="javascript:void(0)">  <img src="'+urlget+'/newimg/img/icons/lease.png"> Lease In</a></li>');
			messages.push('<li class="input-option animated slideInUp" data-value="1" style="display: list-item;"><a href="javascript:void(0)">  <img src="'+urlget+'/newimg/img/icons/lease-out.png"> Lease Out</a></li>');
	
		 function cycle() {
				 $('.textfirst').html(messages[index]);
				 index++;
	
				 if (index === messages.length) {
						 index = 0;
				 }
	
				 exe = setTimeout(cycle, 3000);
		 }
	
		 cycle ();
		 
		 
		 
		 
	});
