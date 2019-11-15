<?php


use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\Modal;

use common\models\MyExpectationsajaxSearch;

//$this->title = 'Lessee Search';
// $userid = Yii::$app->user->identity->id;
// $user = \common\models\User::find()->where(['id' => $userid])->one();

?>
<style>
#map_canvas {
        height: 430px;
    }

	 .inactiveLink {
   pointer-events: none;
   cursor: default;
}

.search_delet_btn_div{
        position: absolute;
    left: 55%;
    z-index: 99;
    top: 6px;
	padding-left:10px;
    }

	 
		#delete-button{
           border: 0;
    padding: 7px 10px 7px 10px;
    color: white;
    outline: 0px;
    background: #F44336;
      }

	
</style>
                                       

<div class="row text-center pad50 search_div">
						<div class="row">
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/logo1.png';  ?>" class="img-responsive search_logo">
						</div>
						<p class="addprop_txt">LOOKING FOR THE PERFECT LOCATION?</p>
					    <div class="form-inline holi-row-form row">
								<ul class="top_search">
									

									<li class="form-group brdr_rite">

									  <select class="form-control serch_select"  onchange = "getcity(this.value)">

										<option value="" disabled="" selected>Enter City</option>
										<option value="Gurgaon">Gurgaon</option>
										<option value="Delhi">Delhi</option>
										<option value="Faridabad">Faridabad</option>
										<option value="Noida">Noida</option>
										<option value="Gaziabad">Gaziabad</option>

									  </select>

									</li>
									<li class="form-group search_b" style="position:relative;">
										<i class="fa fa-map-marker icon_markr"></i>
										<input class="form-control search_inpt" id="pac-input" type="text" placeholder="Enter Location" class="trav-input inp-round">
										
										<input type="hidden" id="town">
										<input type="hidden" id="sector">
										<input type="hidden" id="country">
										<input type="hidden" id="searchlat">
										<input type="hidden" id="searchlng">
										<input type="hidden" id="expectid" value="1">

									</li>
									

									</li>
									<li class="form-group">
										<a href="#" id="searches"  onclick="getpolymy();ga('send', 'event', 'Lessee Search Button', 'Lessee Search Buttons', 'Lessee Search Button','Lessee Search Button');" class="btn search_button lessee_srch" role="button"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/search.png';  ?>" width="22" class=""></a>

									</li>
								</ul>	
								<div  class="col-md-2 col-sm-2 text-center change_color_delet_btn_div" style="display:none;">
                                      <button class="btn btn-default dropdown-toggle" type="button" id="color_main_div">Change Color &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                      <ul class="drop_down_menu" style="display: none;">
                                        <li>
                                            <div id="color-palette"></div>                                    
                                            <div id="curpos" style="display:none;"></div>
                                            <div id="cursel" style="display:none;"></div>
                                        </li>
                                      </ul>
                                                                    
                                </div>						
						  </div>
              
			</div>
			

		</div>
	</section>
	<div class="row search_map_row" style="position:relative;">
			<div class="col-md-4 search_delet_btn_div">
                                      <button class="inactiveLink" id="delete-button">Delete <span id="shapedel">Shape </span></button>
                                      <button id="lessee_serch" class="btn btn-info out_srch" onclick="getpolymymap();ga('send', 'event', 'Lessee Map Search Button', 'Lessee Map Search Button', 'Lessee Map Search Button','Lessee Map Search Button');" type="button">Search</button>
                                  </div>



	<div class="container-fluid no_pad" >
	<div id="map_canvas" ></div>
	<div id="info"></div>
		</div>
	<div class="container-fluid search_reslt pad50" id="search-pro">
			<div class="container">
				<div class="row top_line">
					<div class="col-sm-7">
						<p class="proprty_reslt"><span id="countprop">0</span>number of properties found matching your requirement in <span id="getsearchlocation"></span></p>
					</div>
					<div class="col-sm-5 text-right">
						<ul class="listing_itme">
							<li class="">
								<!--<span class="sort_by">sort by</span>-->
								 
									  
		<select id="sortby" class="form-control sort_select" onclick="ga('send', 'event', 'Buyeraction Search Select Sorting', 'Buyeraction Search Select Sorting', 'Buyeraction Search Select Sorting','Buyeraction Search Select Sorting')">
                  <option value="nosort" >Sort by</option>
                  <option value="low">Price: Low to High</option>
                  <option value="high" >Price: High to Low</option>
                  <option value="nearest" >Distance: Nearest</option>
                </select>							  
							</li>
							
							
						</ul>
					</div>
				</div>
				
		
		<div class="row">
				<div class="col-md-5">
				</div>
				<div class="col-md-7">
		<div id="getprop">
			
				</div>
        <div id="paginater" class="row">          

        </div>
				</div>

<div class="row" style="margin:0;" id="similiarrow">

<h2 class="simila_prop">Similar Properties </h1>
  <div id="getpropsim" class="row" style="padding-bottom: 0px;">
      
  
 </div>
<div id="paginaters" class="row">          

</div>

</div>



				</div>
				
				
			</div>
	</div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&libraries=geometry,drawing,places"></script>
                       
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>
 $("#searches").click(function() {
    $('html, body').animate({
       // scrollTop: $(".row_another_search").offset().top
    //}, 2000);
	scrollTop: $(window).scrollTop() +800
}, 1000);
 });   


  $(window).scroll(function() {
    if($(this).scrollTop()>5) {
        $( ".navbar-me" ).addClass("fixed-me");
        $( ".navbar-me" ).addClass("neela_bg");
    } else {
        $( ".navbar-me" ).removeClass("fixed-me");
		 $( ".navbar-me" ).removeClass("neela_bg");
    }
});
  </script>
<script type="text/javascript">

      var counter = '';                                
      var drawingManager;
      var selectedShape;
      var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
      var selectedColor;
      var colorButtons = {};
      const arrayColumn = (arr, n) => arr.map(x => x[n]);
      var polyArray = [];
      var getpolyshapes ='';
      var northeast ='';
      var southwest ='';
      var centercoordinates ='';
      var totalradius ='';
      var pathstr ='';
      var northlat ='';
      var northlng;
      var southlat;
      var southlng;
      var centercord ='';
      var getsearchlocation;
      var infoWindow;
      var latt;
      var longg;
      var rectangle;
      var count1='';
      var count2='';
      var count3='';
      var newShape;
      
      
      
                              function getpolymy(){

                                  
                              
                                        var getexpectationID =  $('#expectid').val();

                                        var newpath = pathstr; 
                                        getsearchlocation  = $("#pac-input").val(); 
                                        var town  = $("#town").val(); 
                                        var sector  = $("#sector").val();
                                        var country  = $("#country").val();
                                        var areaft = $("#areaft").val();                                            
                                        var areamin = "";
                                        var areamax = "";
                                        var pricemin = "";
                                        var pricemax = "";
                                        var proptype = "Property Type";
                                        var propbid = "Select";
                                        
                                         pageSize = 6;
                                        page = 1;
                                        
                                        showPage = function(page) {
                                        $(".chirag").hide();
                                        $(".chirag").each(function(n) {
                                        if (n >= pageSize * (page - 1) && n < pageSize * page)
                                        $(this).show();
                                        });        
                                        }
                                           
                                           var shapes = getpolyshapes;   
                                            
                                           var ndata = '';
                                           
                                          
                                           var xcoordinates =   arrayColumn(polyArray, 0);
                                           var ycoordinates =   arrayColumn(polyArray, 1);
//                                         var maxXcoordinate =  Math.max(xcoordinates); 

                                           // console.log(xcoordinates);
                                           // console.log(ycoordinates);
                                           
                                           var minZoomLevel = 14;
                                 
                                     
        
                                           if(getexpectationID != ''){                                               
                                               
                                               if(getsearchlocation != '' || shapes != ''){ 
                                                  
                                               
                                             $('#getprop').html('');
                                              $('#getpropsim').html('');
                                              $('#similiarrow').hide();

                                            
                                            
                                            if(shapes == ''){

                                  
                                               
                                          ndata = {location:getsearchlocation,area:getexpectationID,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid}; 
                                          
                                           $.ajax({
                                                    type: "POST",
                                                    url: 'lesseeaction/withoutshape',
                                                    data: ndata,
                                                    success: function (data) {
                                                      
                                                   if(data != '1'){
                                                       toastr.success('Your Search Criteria has Successfully Saved', 'success');
                                                        $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html(countprop);
                                                        $('#getsearchlocation').html(sector);
                                                        
                                                        bindButtonClick(obj);

                                                        $.each(obj, function (index) {
                                                         
                                                       
                                                           
                                                           var content =  'A very good '+ this.typename +' availabale for sale in '+ this.city + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ';
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';

                                                             var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;
                                                            
                                                            
                                                            $('#getprop').append('<div class="row property_detail chirag">'+
					'<div class="col-md-4">'+
						'<img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img">'+
					'</div>'+
					'<div class="col-md-8 prop_centr">'+
						'<div class="row">'+
							'<p class="heading_prop">'+
								'<b>' +  this.typename +'</b> For sale in '+ this.city  + '</p>'+
							
							
						'</div>'+
						'<div class="row">'+
							'<ul class="prop_contnt">'+
								'<li class="first_li">'+
									'<p class="des_hed">Price</p>'+
									'<p class="des_txt"> ' + this.asking_rental_price + '</p>'+
								'</li>'+
								'<li class="padd_li">'+
									'<p class="des_hed">Area</p>'+
									'<p class="des_txt">'+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +'  Sq ft.</p>'+
								'</li>'+
								'<li class="padd_li">'+
									'<p class="des_hed">Property type</p>'+
									'<p class="des_txt">' +  this.typename +'</p>'+
								'</li>'+
								'<li class="padd_li">'+
									'<p class="des_hed">Locality</p>'+
									'<p class="des_txt">'+ this.locality +'</p>'+
								'</li>'+
							'</ul>'+
						'</div>'+
						'<div class="row">'+
							 '<h4 class="abt_head new_serch">About the property</h4>'+
							 '<p class="abt_prop">'+ html +' . .</p>'+
							 '<p class="">'+
							// '<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getchecki(this.id)">Shortlist</a>'+
							// '<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getfreevisit(this.id)">'+
							// (this.county > 0 ? 'Site Visited': 'Book Site Visit') +
							// '</a>'+
							// '<a onclick="viewproperty(' + this.id + '); ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
             // '<a onclick="viewpropertys( '+newnewpath+' ,' +centercoordinates + ',' +totalradius + ',' +northlat + ',' +southlat + ',' +northlng + ',' +southlng + ',' +shapes + ',' +getsearchlocation+ ')"  href="javascript:void(0)" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
             '<a class="place_bid lessee_det" onclick="viewpropertys();"  href="javascript:void(0)" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+



               '</p>'+
						'</div>'+
					'</div>'+
				'</div>');
                                                            

                                                        });
                                                        
                                          showPage(1);    
                                          var i;
                                          var totals = Math.ceil(countprop/6);
                                          
                                           var dynamic = "";   
                                           for(i=1;i<=totals;i++){
                                             
                                            dynamic += '<li><a href="javascript:void(0)">'+i+'</a></li>';                                           
                                            
                                           }
     
                                            
                                           
                                           $('#paginater').html(''); 
                                           $('#paginater').html('<ol id="pagin" class="paginclass">'+ dynamic+  '</ol>'); 
                                            $("#pagin li a").first().addClass("current"); 
                                              $("#pagin li a").click(function() {
                                              
                                            $("#pagin li a").removeClass("current");
                                            $(this).addClass("current");
                                           
                                            showPage(parseInt($(this).text())) 
                                        });

                                                     }else{
                                                     toastr.warning('Please Enter Specific Locality', 'warning');
                                                     }  },
                                                });
                                                  
                                                  
                                              
                                           }
                                        
                                                
                                                }else{
                                                
                                                toastr.warning('Please Enter Locality', 'warning');
                                                
                                                } 
                                                
                                                }else{
                                                toastr.warning('Please Fill Your Expectation for this search', 'warning');
                                                } 
                                                
                                                 
                                            
                                            
                                        }





                                         function getpolymymap(){

                                          
                                          count1 =0;
                                          count2 =0;
                                          count3 =0;

                                          $('html, body').animate({
                                            // scrollTop: $(".row_another_search").offset().top
                                            //}, 2000);
                                            scrollTop: $(window).scrollTop() +400
                                            }, 1000);
                                  
                              
var getexpectationID =  $('#expectid').val();

var newpath = pathstr; 
getsearchlocation  = $("#pac-input").val(); 
var town  = $("#town").val(); 
var sector  = $("#sector").val();
var country  = $("#country").val();
var areaft = $("#areaft").val();                                            
var areamin = "";
var areamax = "";
var pricemin = "";
var pricemax = "";
var proptype = "Property Type";
var propbid = "Select";

 pageSize = 6;
page = 1;

showPage = function(page) {
$(".chirag").hide();
$(".chirag").each(function(n) {
if (n >= pageSize * (page - 1) && n < pageSize * page)
$(this).show();
});        
}
   
   var shapes = getpolyshapes;   
    
   var ndata = '';
   
  
   var xcoordinates =   arrayColumn(polyArray, 0);
   var ycoordinates =   arrayColumn(polyArray, 1);
//                                         var maxXcoordinate =  Math.max(xcoordinates); 

   // console.log(xcoordinates);
   // console.log(ycoordinates);
   
   var minZoomLevel = 14;



   if(getexpectationID != ''){                                               
       
       if(getsearchlocation != '' || shapes != ''){ 
          
       
     $('#getprop').html('');
      $('#getpropsim').html('');
      $('#similiarrow').hide();

    
    
    if(shapes == ''){


         }


                            if(shapes == 'polygon'){
                                                
                                                toastr.success('Your Search Criteria has Successfully Saved', 'success');
                                              
                                                     
                                               ndata = {location:getsearchlocation,town:town,sector:sector,newpath:newpath,area:getexpectationID,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid}; 
                                               
                                                $.ajax({
                                                         type: "POST",
                                                         url: 'lesseeaction/getpolymy',
                                                         data: ndata,
                                                         success: function (data) {
                                                           
                                                         
                                                     $('#search-pro').css("display","block");
                                                             var obj = $.parseJSON(data);
                                                             $(".serch_rslt").show();
                                                             var countprop = Object.keys(obj).length;                                                        
                                                            // $('#countprop').html(countprop);
                                                            $('#getsearchlocation').html(sector);
                                                             
                                                             bindButtonClick(obj);
     
                                                             $.each(obj, function (index) {
                                                              
                                                        var lati = this.latitude;
                                                        var long = this.longitude;
                                                        var curPosition = new google.maps.LatLng(lati,long);
                                                        var triangleCoords = JSON.parse(pathstr);
                               
                                                        bermudaTriangle = new google.maps.Polygon({
                                                        paths: triangleCoords,
                                                        strokeOpacity: 0.8,
                                                        strokeWeight: 2,
                                                        fillColor: '#FF0000',
                                                        fillOpacity: 0.35,
                                                        editable: true,
                                                        draggable: true,
                                                        });                           
                                                       
                                                        if(google.maps.geometry.poly.containsLocation(curPosition, bermudaTriangle)){ 

                                                             count1 += 1; 
                                                                
                                                                var  content =  'A very good '+ this.typename +' availabale for sale in '+ this.city + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ';
                                                                
                                                                 var imaged = $.trim(this.featured_image);
                                                                 var c = content.substr(0, showChar);
                                               var h = content.substr(showChar-1, content.length - showChar);
                                                                 var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
                               var haritid = 273*179-this.id;
                                                                 var propsid = 'PR'+ haritid;
     
     
                                                                 
                                             $('#getprop').append('<div class="row property_detail chirag">'+
               '<div class="col-md-4">'+
                 '<img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img">'+
               '</div>'+
               '<div class="col-md-8 prop_centr">'+
                 '<div class="row">'+
                   '<p class="heading_prop">'+
                     '<b>' +  this.typename +'</b> For sale in '+ this.city  + '</p>'+
                   
                   
                 '</div>'+
                 '<div class="row">'+
                   '<ul class="prop_contnt">'+
                     '<li class="first_li">'+
                       '<p class="des_hed">Price</p>'+
                       '<p class="des_txt"> ' + this.asking_rental_price + '</p>'+
                     '</li>'+
                     '<li class="padd_li">'+
                       '<p class="des_hed">Area</p>'+
                       '<p class="des_txt">'+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +'  Sq ft.</p>'+
                     '</li>'+
                     '<li class="padd_li">'+
                       '<p class="des_hed">Property type</p>'+
                       '<p class="des_txt">' +  this.typename +'</p>'+
                     '</li>'+
                     '<li class="padd_li">'+
                       '<p class="des_hed">Locality</p>'+
                       '<p class="des_txt">'+ this.locality +'</p>'+
                     '</li>'+
                   '</ul>'+
                 '</div>'+
                 '<div class="row">'+
                    '<h4 class="abt_head new_serch">About the property</h4>'+
                    '<p class="abt_prop">'+ html +' . .</p>'+
                    '<p class="">'+
                   // '<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getchecki(this.id)">Shortlist</a>'+
                   // '<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getfreevisit(this.id)">'+
                   // (this.county > 0 ? 'Site Visited': 'Book Site Visit') +
                   // '</a>'+
                   // '<a onclick="viewproperty(' + this.id + '); ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                  // '<a onclick="viewpropertys( '+newnewpath+' ,' +centercoordinates + ',' +totalradius + ',' +northlat + ',' +southlat + ',' +northlng + ',' +southlng + ',' +shapes + ',' +getsearchlocation+ ')"  href="javascript:void(0)" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                  '<a onclick="viewpropertys();" class="place_bid lessee_det" href="javascript:void(0)"  role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
     
     
     
                    '</p>'+
                 '</div>'+
               '</div>'+
             '</div>');
                                                        }
                                                                 
     
                                                             });
                                                             if(count1 ==0){
                                                            $('#countprop').html(0);
                                                        }else{
                                                        $('#countprop').html(count1);
                                                        }
                                                             
                                               showPage(1);    
                                               var i;
                                               var totals = Math.ceil(countprop/6);
                                               
                                                var dynamic = "";   
                                                for(i=1;i<=totals;i++){
                                                  
                                                 dynamic += '<li><a href="javascript:void(0)">'+i+'</a></li>';                                           
                                                 
                                                }
          
                                                 
                                                
                                                $('#paginater').html(''); 
                                                if(count1 != 0){
                                                $('#paginater').html('<ol id="pagin" class="paginclass">'+ dynamic+  '</ol>'); 
                                                
                                                          }
                                                 $("#pagin li a").first().addClass("current"); 
                                                   $("#pagin li a").click(function() {
                                                   
                                                 $("#pagin li a").removeClass("current");
                                                 $(this).addClass("current");
                                                
                                                 showPage(parseInt($(this).text())) 
                                             });
     
                                                         },
                                                     });
                                                     }
                                                if(shapes == 'circle'){
                                                
                                              toastr.success('Your Search Criteria has Successfully Saved', 'success');
                                              
                                                  $.ajax({
                                                         type: "POST",
                                                         url: 'lesseeaction/mapproperty1',
                                                         data: {location:getsearchlocation,center:centercoordinates,totalradius:totalradius,shapes:shapes,town:town,sector:sector,area:getexpectationID,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid},
                                                         success: function (data) {
                                                         
                                                     $('#search-pro').css("display","block");
                                                             var obj = $.parseJSON(data);
                                                             $(".serch_rslt").show();
                                                             var countprop = Object.keys(obj).length;  
                                                             $('#getsearchlocation').html(sector);                                                      
                                                            // $('#countprop').html(countprop);
                                                             
                                                             bindButtonClick(obj);
     
                                                             $.each(obj, function (index) {
                                                                 
                                                              var lati = this.latitude;
                                                            var long = this.longitude;
                                                            
                                                            var curPosition = new google.maps.LatLng(lati,long);
                                                           

                
                                                            var radius =  parseInt(totalradius);              
                                                            var townCenter = new google.maps.LatLng(latt,longg);

                                                            var circleOptions = {
                                                            strokeColor: '#FF0000',
                                                            strokeOpacity: 0.8,
                                                            strokeWeight: 2,
                                                            fillColor: '#FF0000',
                                                            fillOpacity: 0.25,
                                                            map: map,
                                                            center: townCenter,
                                                            editable: true,
                                                            // draggable: true,
                                                            radius: radius
                                                            };

                                                           // circle = new google.maps.Circle(circleOptions);
                                                             if(newShape.getBounds().contains(curPosition)){

                                                             count2 += 1; 
     
                                                                var  content =  'A very good '+ this.typename +' availabale for sale in '+ this.city + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ';
                                                                
                                                                 var imaged = $.trim(this.featured_image);
                                                                 var c = content.substr(0, showChar);
                                               var h = content.substr(showChar-1, content.length - showChar);
                                                                 var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
                      var haritid = 273*179-this.id;
                                                                 var propsid = 'PR'+ haritid;
     
     
                                                                 
                                                                 $('#getprop').append('<div class="row property_detail chirag">'+
               '<div class="col-md-4">'+
                 '<img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img">'+
               '</div>'+
               '<div class="col-md-8 prop_centr">'+
                 '<div class="row">'+
                   '<p class="heading_prop">'+
                     '<b>' +  this.typename +'</b> For sale in '+ this.city  + '</p>'+
                   
                   
                 '</div>'+
                 '<div class="row">'+
                   '<ul class="prop_contnt">'+
                     '<li class="first_li">'+
                       '<p class="des_hed">Price</p>'+
                       '<p class="des_txt"> ' + this.asking_rental_price + '</p>'+
                     '</li>'+
                     '<li class="padd_li">'+
                       '<p class="des_hed">Area</p>'+
                       '<p class="des_txt">'+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +'  Sq ft.</p>'+
                     '</li>'+
                     '<li class="padd_li">'+
                       '<p class="des_hed">Property type</p>'+
                       '<p class="des_txt">' +  this.typename +'</p>'+
                     '</li>'+
                     '<li class="padd_li">'+
                       '<p class="des_hed">Locality</p>'+
                       '<p class="des_txt">'+ this.locality +'</p>'+
                     '</li>'+
                   '</ul>'+
                 '</div>'+
                 '<div class="row">'+
                    '<h4 class="abt_head new_serch">About the property</h4>'+
                    '<p class="abt_prop">'+ html +' . .</p>'+
                    '<p class="">'+
                    //'<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getchecki(this.id)">Shortlist</a>'+
                   // '<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getfreevisit(this.id)">'+
                   // (this.county > 0 ? 'Site Visited': 'Book Site Visit') +
                   // '</a>'+
                   // '<a onclick="viewproperty(' + this.id + '); ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                  // '<a onclick="viewpropertys( '+newnewpath+' ,' +centercoordinates + ',' +totalradius + ',' +northlat + ',' +southlat + ',' +northlng + ',' +southlng + ',' +shapes + ',' +getsearchlocation+ ')"  href="javascript:void(0)" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                  '<a onclick="viewpropertys();" class="place_bid lessee_det" href="javascript:void(0)"  role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
     
     
     
                    '</p>'+
                 '</div>'+
               '</div>'+
             '</div>');
                                                             }

                                                                 
     
                                                             });
                                              if(count2 ==0){
                                              $('#countprop').html(0);
                                              }else{
                                              $('#countprop').html(count2);
                                              }
                                                             
                                               showPage(1);    
                                               var i;
                                               var totals = Math.ceil(countprop/6);
                                               
                                                var dynamic = "";   
                                                for(i=1;i<=totals;i++){
                                                  
                                                 dynamic += '<li><a href="javascript:void(0)">'+i+'</a></li>';                                           
                                                 
                                                }
          
                                                 
                                                
                                                $('#paginater').html(''); 
                                                if(count2 != 0){
                                                $('#paginater').html('<ol id="pagin" class="paginclass">'+ dynamic+  '</ol>'); 
                                                
                                                          }
                                                 $("#pagin li a").first().addClass("current"); 
                                                   $("#pagin li a").click(function() {
                                                   
                                                 $("#pagin li a").removeClass("current");
                                                 $(this).addClass("current");
                                                
                                                 showPage(parseInt($(this).text())) 
                                             });
     
                                                         },
                                                     });
                                               }
                                                     
                                                     
                                       if(shapes == 'rectangle'){
                                       
                                                     
                                       toastr.success('Your Search Criteria has Successfully Saved', 'success');           
                                                   
                                                   
                                                  $.ajax({
                                                         type: "POST",
                                                         url: 'lesseeaction/mapproperty2',
                                                         data: {northlat:northlat,southlat:southlat,northlng:northlng,southlng:southlng,location:getsearchlocation,center:centercord,shapes:shapes,town:town,sector:sector,area:getexpectationID,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid},
                                                         success: function (data) {
                                                      
                                                            $('#search-pro').css("display","block");
                                                             var obj = $.parseJSON(data);
                                                             $(".serch_rslt").show();
                                                             var countprop = Object.keys(obj).length;                                                        
                                                             //$('#countprop').html(countprop);
                                                             $('#getsearchlocation').html(sector);
                                                             
                                                             bindButtonClick(obj);
                                                                
                                                             $.each(obj, function (index) {
                                                              
                                        var lati = this.latitude;
                                        var long = this.longitude;
                                        var curPosition = new google.maps.LatLng(lati,long);  

                 var rectanglecoordinates = '{"north": '+northlat+',"south":'+ southlat+',"east": '+northlng+',"west": '+southlng+' }';
               

                                  var newkuma = JSON.parse(rectanglecoordinates);
                                  
                                  // var   rectangle = new google.maps.Rectangle({
                                  //   strokeColor: '#FF0000',
                                  //   strokeOpacity: 0.8,
                                  //   strokeWeight: 2,
                                  //   fillColor: '#FF0000',
                                  //   fillOpacity: 0.35,
                                  //   editable: true,
                                  //   //draggable: true,
                                  //   map: map,
                                  //   bounds: newkuma
                                  //   });
                                                                  
                                                                var content =  'A very good '+ this.typename +' availabale for sale in '+ this.city + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ';
                                                                
                                                                 var imaged = $.trim(this.featured_image);
                                                                 var c = content.substr(0, showChar);
                                               var h = content.substr(showChar-1, content.length - showChar);
                                                                 var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
                                                                 var haritid = 273*179-this.id;
                                                                 var propsid = 'PR'+ haritid;
     
                                                                 if(newShape.getBounds().contains(curPosition)){
               
                                  count3 += 1;  
                                                                 
                                                                 $('#getprop').append('<div class="row property_detail chirag">'+
               '<div class="col-md-4">'+
                 '<img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img">'+
               '</div>'+
               '<div class="col-md-8 prop_centr">'+
                 '<div class="row">'+
                   '<p class="heading_prop">'+
                     '<b>' +  this.typename +'</b> For sale in '+ this.city  + '</p>'+
                   
                   
                 '</div>'+
                 '<div class="row">'+
                   '<ul class="prop_contnt">'+
                     '<li class="first_li">'+
                       '<p class="des_hed">Price</p>'+
                       '<p class="des_txt"> ' + this.asking_rental_price + '</p>'+
                     '</li>'+
                     '<li class="padd_li">'+
                       '<p class="des_hed">Area</p>'+
                       '<p class="des_txt">'+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +'  Sq ft.</p>'+
                     '</li>'+
                     '<li class="padd_li">'+
                       '<p class="des_hed">Property type</p>'+
                       '<p class="des_txt">' +  this.typename +'</p>'+
                     '</li>'+
                     '<li class="padd_li">'+
                       '<p class="des_hed">Locality</p>'+
                       '<p class="des_txt">'+ this.locality +'</p>'+
                     '</li>'+
                   '</ul>'+
                 '</div>'+
                 '<div class="row">'+
                    '<h4 class="abt_head new_serch">About the property</h4>'+
                    '<p class="abt_prop">'+ html +' . .</p>'+
                    '<p class="">'+
                   // '<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getchecki(this.id)">Shortlist</a>'+
                   // '<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getfreevisit(this.id)">'+
                   // (this.county > 0 ? 'Site Visited': 'Book Site Visit') +
                   // '</a>'+
                   // '<a onclick="viewproperty(' + this.id + '); ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                  // '<a onclick="viewpropertys( '+newnewpath+' ,' +centercoordinates + ',' +totalradius + ',' +northlat + ',' +southlat + ',' +northlng + ',' +southlng + ',' +shapes + ',' +getsearchlocation+ ')"  href="javascript:void(0)" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                  '<a onclick="viewpropertys();" class="place_bid lessee_det" href="javascript:void(0)"  role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
     
     
     
                    '</p>'+
                 '</div>'+
               '</div>'+
             '</div>');
                                                                 }
                                                                 
     
                                                             });
                                                             if(count3 ==0){
                                                            $('#countprop').html(0);
                                                        }else{
                                                        $('#countprop').html(count3);
                                                        }
                                                             
                                               showPage(1);    
                                               var i;
                                               var totals = Math.ceil(countprop/6);
                                               
                                                var dynamic = "";   
                                                for(i=1;i<=totals;i++){
                                                  
                                                 dynamic += '<li><a href="javascript:void(0)">'+i+'</a></li>';                                           
                                                 
                                                }
          
                                                 
                                                
                                                $('#paginater').html(''); 
                                                if(count3 != 0){
                                                $('#paginater').html('<ol id="pagin" class="paginclass">'+ dynamic+  '</ol>'); 
                                                
                                                          }
                                                 $("#pagin li a").first().addClass("current"); 
                                                   $("#pagin li a").click(function() {
                                                   
                                                 $("#pagin li a").removeClass("current");
                                                 $(this).addClass("current");
                                                
                                                 showPage(parseInt($(this).text())) 
                                             });
     //
                                                         },
                                                     });
                                                     
                                                    
                                                     }
     
     
     
     
                                                        if(shapes != ''){
                                                     
                                                      var searchlat = $('#searchlat').val();
                                                      var searchlng = $('#searchlng').val();
                                                      pageSizes = 2;
                                                      pages = 1;
                                                      
                                                      showPages = function(pages) {
                                             $(".chirags").hide();
                                             $(".chirags").each(function(n) {
                                             if (n >= pageSizes * (pages - 1) && n < pageSizes * pages)
                                             $(this).show();
                                             });        
                                             }
                                                      
                                                     ndata = {location:getsearchlocation,town:town,sector:sector,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid}; 
                                               
                                                $.ajax({
                                                         type: "POST",
                                                         url: 'lesseeaction/similiarprop',
                                                         data: ndata,
                                                         success: function (data) {
                                                           
                                                        
                                                         
                                                             var obj = $.parseJSON(data);
                                                             
                                                              $(".serch_rslt").show();
                                                             var countprop = Object.keys(obj).length;                                                        
                                                           
                                                             if(countprop > 0){
                                                                 
                                                                 $('#getpropsim').html('');
                                                                // $('#similiarrow').show();
                                                                 
                                                             }
                                                             
                                                              for ( i = 0; i < obj.length; i++) {
                                     obj[i]["distance"] = calculateDistance(searchlat,searchlng,obj[i]["latitude"],obj[i]["longitude"]);
                                             }
     
                                             obj.sort(function(a, b) { 
                                                 return a.distance - b.distance;
                                                 });
     
                                                             $.each(obj, function (index) {
                                                                 
                                                            
                                                                 var content = 'A very good '+ this.typename +' availabale for rent/lease in '+ this.city + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us..';
                                                                 var imaged = $.trim(this.featured_image);
                                                                 var c = content.substr(0, showChar);
                                               var h = content.substr(showChar-1, content.length - showChar);
                                                                 var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
                                                                 var haritid = 273*179-this.id;
                                                                 var propsid = 'PR'+ haritid;
     
                                                                
                                             $('#getpropsim').append('<div class="col-md-6 serch_row chirags" style="">'+
                                             '<div class="col-md-12 property_main_div">'+
                                             '<div class="col-md-12 property_main_div_1" style="height:60px">'+
                                             '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ID - '+propsid+')</p></div></a>'+
     
                                          ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                             '</div>'+
                                             '<div class="col-md-12 property_main_div_2" >'+
                                             '<div class="row">'+
                                             '<div class="col-md-6 property_main_div_2_inner_1">'+
                                             '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                             '</div>'+
                                             '<div class="col-md-6 property_main_div_2_inner_2">'+
                                             '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                             '<p style="color: #ffba00;"><b>Highlights:</b>  On Rent / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : '(out of ' + this.total_floors +')')+'</p>'+
                                             '<p><b>Description:</b> '+ html +'</p>'+
                                             '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                             '</div>'+
                                             '</div>'+
                                             '</div>'+
                                             '<div class="col-md-12 property_main_div_2_inner_p">'+
                                             '<ul class="list_li">'+
                                             '<li><p>₹  ' + this.asking_rental_price + ' </p></li>'+
                                             '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                            // '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                            // '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                             '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                             '</ul>'+
                                             '</div>'+
                                             '<div class="col-md-12 property_main_div_3">'+
                                             '<div class="col-md-5 text-center property_main_div_3_inner1">'+
                                              ((this.request_for == 'Instant') ?
                                             '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr">'+ 
                                               'Instant Approach</a>'
                                               :
                                             ((this.request_for == 'bid') ?
                                             '<a href="javascript:void(0)" onclick="bititnow(' + this.id + ')">'+ 
                                               'Bid it Now</a>'
                                               : ''
                                              )) +
                                             '</div>'+
                                             
                                              '<div class="col-md-3 text-center property_main_div_3_inner1">'+
                                             '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>'+
                                             '</div>'+
                                             '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                             '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id)">'+
                                              (this.county > 0 ? 'Site Visited': 'Book Site Visit') +
                                              '</a>'+
                                             '</div>'+
                                             
                                             '</div>'+
                                             '</div>'+
                                             '</div>');
     
                                                             });
                                                             
                                               showPages(1);    
                                               var i;
                                               var totals = Math.ceil(countprop/2);
                                               
                                                var dynamic = "";   
                                                for(i=1;i<totals;i++){
                                                  
                                                 dynamic += '<li style="display:none;><a href="javascript:void(0)">'+i+'</a></li>';                                           
                                                 
                                                }
          
                                                 
                                                $('#paginaters').html(''); 
                                     $('#paginaters').html('<ol  id="pagins" class="paginclass"><li style="pull: left;position: absolute;left: 0;"><button class="btn btn-info" id="back">Back</button></li>' + dynamic + '<li><button class="btn btn-info" id="next">Next</button></li></ol>');
                                                
                                                  $("#pagins li a").first().addClass("current");
                                                  $("#back").hide();
                                                    var getcurrpage = '';
                                                   $("#pagins li a").click(function () {
     
                                         getcurrpage = $(this).text();
     
                                         if (getcurrpage == totals) {
                                             $("#next").hide();
                                         }
                                         else {
                                             $("#next").show();
                                         }
                                         if (getcurrpage == '1') {
                                             $("#back").hide();
                                         } else {
                                             $("#back").show();
                                         }
                                         $("#pagins li a").removeClass("current");
                                         $(this).addClass("current");
     
                                         showPages(parseInt($(this).text()))
                                     });
                                     
                                     $("#back").click(function () {
     
     
                                         if (getcurrpage == '1') {
     
                                             $("#back").hide();
                                             $("#next").show();
                                             
                                         } else{
     
                                             $("#back").show();
                                             $("#next").show();
                                             
                                                 getcurrpage--;
                                                 showPages(parseInt(getcurrpage));
                                             
                                         }
                                         
     
                                     });
                                     
                                     $("#next").click(function () {
     
                                         
                                       
                                         if (getcurrpage == totals) {
     
                                            $("#next").hide();
                                            $("#back").show();
                                            
                                         } else {
     
                                             $("#next").show();
                                             $("#back").show();
     
                                             if (getcurrpage <= totals) {
                                                 getcurrpage++;
     
     
                                                 showPages(parseInt(getcurrpage));
                                             }
                                         }
                                         
     
                                     });
                                                             
     
                                                         },
                                                     });
                                                     
                                                     
                                                     
                                                     }

        
        }else{
        
        toastr.warning('Please Draw Precise Shape on Map', 'warning');
        
        } 
        
        }else{
        toastr.warning('Please Fill Your Expectation for this search', 'warning');
        } 
        
         
    
    
}

      function clearSelection() {
        if (selectedShape) {
          if (typeof selectedShape.setEditable == 'function') {
            selectedShape.setEditable(false);
          }
          selectedShape = null;
        }
        curseldiv.innerHTML = "<b>cursel</b>:";
      }

      function updateCurSelText(shape) {
          
           drawingManager.setMap(null);
          
        posstr = "" + selectedShape.position;
        if (typeof selectedShape.position == 'object') {
          
          posstr = selectedShape.position.toUrlValue();
        }
       
        pathstr = "" + selectedShape.getPath;
        if (typeof selectedShape.getPath == 'function') {
          pathstr = "[ ";
          for (var i = 0; i < selectedShape.getPath().getLength(); i++) {
              
              var newstring = selectedShape.getPath().getAt(i).toUrlValue(6);
             
              // console.log(newstring);
              var newarray = newstring.split(',');
              polyArray.push(selectedShape.getPath());
               
               // .toUrlValue(5) limits number of decimals, default is 6 but can do more
               pathstr += '{ "lat" : '+selectedShape.getPath().getAt(i).lat() + ', "lng" : '+ selectedShape.getPath().getAt(i).lng() + "}"+" , ";
          }
          pathstr += "]";
          pathstr.trim();           
            var commanum = pathstr.lastIndexOf(",");
           var  part1 = pathstr.substring(0, commanum);
            var part2 = pathstr.substring(commanum + 1, pathstr.length);
            
            pathstr = part1 + part2;
        }
        
        getpolyshapes  =  selectedShape.type;
        bndstr = "" + selectedShape.getBounds;
        cntstr = "" + selectedShape.getBounds;
        if (typeof selectedShape.getBounds == 'function') {
          var tmpbounds = selectedShape.getBounds();
          cntstr = "" + tmpbounds.getCenter().toUrlValue();
          
          centercord = tmpbounds.getCenter().toUrlValue();
          northeast = tmpbounds.getNorthEast().toUrlValue();
          southwest = tmpbounds.getSouthWest().toUrlValue();
          northlat = tmpbounds.getNorthEast().lat();
          northlng = tmpbounds.getNorthEast().lng();
          southlat = tmpbounds.getSouthWest().lat();
          southlng = tmpbounds.getSouthWest().lng();
         
          bndstr = "[NE: " + tmpbounds.getNorthEast().toUrlValue() + " SW: " + tmpbounds.getSouthWest().toUrlValue() + "]";
        }
         
        cntrstr = "" + selectedShape.getCenter;
        if (typeof selectedShape.getCenter == 'function') {
          cntrstr = "" + selectedShape.getCenter().toUrlValue();
          centercoordinates = selectedShape.getCenter().toUrlValue();
          latt = selectedShape.getCenter().lat();
                 longg = selectedShape.getCenter().lng();
        }
        
//        
       
        
        radstr = "" + selectedShape.getRadius;
        if (typeof selectedShape.getRadius == 'function') {
          radstr = "" + selectedShape.getRadius();
        }
        
        totalradius = selectedShape.getRadius();
        curseldiv.innerHTML = "<b>cursel</b>: " + selectedShape.type + " " + selectedShape + "; <i>pos</i>: " + posstr + " ; <i>path</i>: " + pathstr + " ; <i>bounds</i>: " + bndstr + " ; <i>Cb</i>: " + cntstr + " ; <i>radius</i>: " + radstr + " ; <i>Cr</i>: " + cntrstr ;
      
         
      }


      function setSelection(shape, isNotMarker) {
        
        $('#shapedel').text('');
         //$('#shapedel').text(shape.type);
         if(shape.type == 'circle'){
            
          $('#shapedel').text('Circle');  
        }else if(shape.type == 'polygon'){
            
          $('#shapedel').text('Polygon');  
        }else if(shape.type == 'polyline'){
            
          $('#shapedel').text('Polyline');  
        }else{
            
          $('#shapedel').text('Rectangle');  
        }
         $('#delete-button').removeClass("inactiveLink");
         
       
        clearSelection();
        selectedShape = shape;
        if (isNotMarker)
          shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
        updateCurSelText(shape);
         
       
      }

      function deleteSelectedShape() {
           $('#delete-button').addClass("inactiveLink");
          $('#shapedel').text('Shape');
          getpolyshapes = '';
        if (selectedShape) {
            drawingManager.setMap(map);
          selectedShape.setMap(null);
        }
      }

      function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
          var currColor = colors[i];
          colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.
        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);

        var rectangleOptions = drawingManager.get('rectangleOptions');
        rectangleOptions.fillColor = color;
        drawingManager.set('rectangleOptions', rectangleOptions);

        var circleOptions = drawingManager.get('circleOptions');
        circleOptions.fillColor = color;
        drawingManager.set('circleOptions', circleOptions);

        var polygonOptions = drawingManager.get('polygonOptions');
        polygonOptions.fillColor = color;
        drawingManager.set('polygonOptions', polygonOptions);
      }

      function setSelectedShapeColor(color) {
        if (selectedShape) {
          if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
            selectedShape.set('strokeColor', color);
          } else {
            selectedShape.set('fillColor', color);
          }
        }
      }

      function makeColorButton(color) {
        var button = document.createElement('span');
        button.className = 'color-button abcd';
        button.style.backgroundColor = color;
        google.maps.event.addDomListener(button, 'click', function() {
          selectColor(color);
          setSelectedShapeColor(color);
        });

        return button;
      }

       function buildColorPalette() {
         counter=0;
         
         var colorPalette = document.getElementById('color-palette');
         $("#color-palette").html('');
         if(counter<=0){
         for (var i = 0; i < colors.length; ++i) {
           var currColor = colors[i];
           var colorButton = makeColorButton(currColor);
           colorPalette.appendChild(colorButton);
           colorButtons[currColor] = colorButton;
         }
 }
         selectColor(colors[0]);
       }

      /////////////////////////////////////
      var map; //= new google.maps.Map(document.getElementById('map'), {
      var mapf; //= new google.maps.Map(document.getElementById('map'), {
      // these must have global refs too!:
      var placeMarkers = [];
      var input;
      var searchBox;
      var curposdiv;
      var curseldiv;

		var globalvar = '';

		function getcity(val) {
			
		$('#pac-input').val('');
		globalvar = val;

		}

		

      function deletePlacesSearchResults() {
        for (var i = 0, marker; marker = placeMarkers[i]; i++) {
          marker.setMap(null);
        }
        placeMarkers = [];
        input.value = ''; // clear the box too
      }
      
      

      /////////////////////////////////////
      function initialize() {
		
          
       //$('.gmnoprint').children().eq(0).addClass("hideme");
        map = new google.maps.Map(document.getElementById('map_canvas'), { //var
          zoom: 15,//10,
          center: new google.maps.LatLng(28.4595,77.0266),//(22.344, 114.048),
          mapTypeId: google.maps.MapTypeId.ROADMAP
         
        });
        curposdiv = document.getElementById('curpos');
        curseldiv = document.getElementById('cursel');

        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
        drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.POLYGON,
          
          drawingControlOptions: {
              
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['circle', 'polygon', 'rectangle']
          },
          markerOptions: {
            draggable: true,
            editable: true,
          },
          polylineOptions: {
            editable: true
          },
          rectangleOptions: polyOptions,
          circleOptions: polyOptions,
          polygonOptions: polyOptions,
          map: map
        });
        
        

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
			
          //~ if (e.type != google.maps.drawing.OverlayType.MARKER) {
            var isNotMarker = (e.type != google.maps.drawing.OverlayType.MARKER);
            // Switch back to non-drawing mode after drawing a shape.
            drawingManager.setDrawingMode(null);

            // Add an event listener that selects the newly-drawn shape when the user
            // mouses down on it.
             newShape = e.overlay;
            newShape.type = e.type;
            google.maps.event.addListener(newShape, 'click', function() {
              setSelection(newShape, isNotMarker);
            });
            google.maps.event.addListener(newShape, 'drag', function() {
              updateCurSelText(newShape);
            });
            google.maps.event.addListener(newShape, 'dragend', function() {
              updateCurSelText(newShape);
            });
            setSelection(newShape, isNotMarker);
          //~ }// end if
        });
		

        // Clear the current selection when the drawing mode is changed, or when the
        // map is clicked.
        google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
        google.maps.event.addListener(map, 'click', clearSelection);
        google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

        buildColorPalette();
		
        //~ initSearch();
        // Create the search box and link it to the UI element.
        
		 input = /** @type {HTMLInputElement} */( //var
             document.getElementById('pac-input'));
		
       // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        //
        var DelPlcButDiv = document.createElement('div');
        var controlWrapper = document.createElement('div'); 
        controlWrapper.setAttribute("id", "nyadiv");
        controlWrapper.innerHTML = "Select Shape";
        //~ DelPlcButDiv.style.color = 'rgb(25,25,25)'; // no effect?
        DelPlcButDiv.style.backgroundColor = '#fff';
        DelPlcButDiv.style.cursor = 'pointer';
       // DelPlcButDiv.innerHTML = 'DEL';
        controlWrapper.index = 1;   
       map.controls[google.maps.ControlPosition.TOP_CENTER].push(controlWrapper);
        
  controlWrapper.style.backgroundColor = 'white';
  controlWrapper.style.margin = '50px';
  controlWrapper.style.cursor = 'pointer';
  controlWrapper.style.textAlign = 'center';
  controlWrapper.style.width = '120px'; 
  controlWrapper.style.height = 'auto'; 
  controlWrapper.style.left = '266px'; 
  controlWrapper.style.top = '-44px'; 
  controlWrapper.style.padding = '5px 6px 5px 3px'; 
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(DelPlcButDiv);
        google.maps.event.addDomListener(DelPlcButDiv, 'click', deletePlacesSearchResults);

          searchBox = new google.maps.places.SearchBox( (input));
		  

        // Listen for the event fired when the user selects an item from the
        // pick list. Retrieve the matching places for that item.
        var searchlat = ""; var searchlng = "";
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            
          $('#town').val('');   
          $('#sector').val('');  
          var places = searchBox.getPlaces();
          
          searchlat = places[0].geometry.location.lat();
          searchlng = places[0].geometry.location.lng();
          $('#searchlat').val(searchlat);
          $('#searchlng').val(searchlng);
          
          var arrAddress = places[0].address_components;
                                      // console.log(places[0].address_components);

            $.each(arrAddress, function (i, address_component) {
           // console.log('address_component:'+i);

            if (address_component.types[0] == "route"){
             //console.log(i+": route:"+address_component.long_name);
            itemRoute = address_component.long_name;
            }

            if (address_component.types[0] == "locality"){
            // console.log("town:"+address_component.long_name);       
            itemLocality = address_component.long_name;       
            $('#town').val(itemLocality);
            }
            if (address_component.types[0] == "sublocality_level_1"){
            // console.log("province:"+address_component.long_name);
            itemSectorf = address_component.long_name;
            $('#sector').val(itemSectorf);

            }

            if (address_component.types[0] == "country"){ 
             //console.log("country:"+address_component.long_name); 
            itemCountry = address_component.long_name;
            $('#country').val(itemCountry);
            }

            if (address_component.types[0] == "postal_code_prefix"){ 
           //  console.log("pc:"+address_component.long_name);  
            itemPc = address_component.long_name;
            }

            if (address_component.types[0] == "street_number"){ 
            // console.log("street_number:"+address_component.long_name);  
            itemSnumber = address_component.long_name;
            }
            //return false; // break the loop   
            });

          if (places.length == 0) {
            return;
          }
          for (var i = 0, marker; marker = placeMarkers[i]; i++) {
            marker.setMap(null);
          }

          // For each place, get the icon, place name, and location.
          placeMarkers = [];
          var bounds = new google.maps.LatLngBounds();
          for (var i = 0, place; place = places[i]; i++) {
            var image = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
              
            };

            // Create a marker for each place.
            var marker = new google.maps.Marker({
              map: map,
              icon: image,
              title: place.name,
              position: place.geometry.location
            });

            placeMarkers.push(marker);

            bounds.extend(place.geometry.location);
          }

          map.fitBounds(bounds);
          map.setZoom(16); 
          map.setOptions({ minZoom: 5, maxZoom: 22 });
        });

        // Bias the SearchBox results towards places that are within the bounds of the
        // current map's viewport.
        google.maps.event.addListener(map, 'bounds_changed', function() {
          var bounds = map.getBounds();
          searchBox.setBounds(bounds);
          curposdiv.innerHTML = "<b>curpos</b> Z: " + map.getZoom() + " C: " + map.getCenter().toUrlValue();
        }); //////////////////////
        
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
      
      
      google.maps.event.addDomListener(window, 'load', initialize);
      





                                         
                                           
                                                        var showChar = 100;
                                                        var ellipsestext = "...";
                                                        var moretext = "Show more";
                                                        var lesstext = "Show less"; 

                                        pageSize = 6;
                                        page = 1;
                                        
                                        showPage = function(page) {
                                        $(".chirag").hide();
                                        $(".chirag").each(function(n) {
                                        if (n >= pageSize * (page - 1) && n < pageSize * page)
                                        $(this).show();
                                        });        
                                        }


                                        $(document).ready(function () {
                                          

                                            var food = getParameterByName('id');
                                         
                                           
                                            if (food == null) {
                                              
                                                $('#search-pro').css("display","none");
                                                $('#similiarrow').hide();

                                            } else {

                                                 
                                                $.ajax({
                                                    url: 'petpropertyst',
                                                    data: {id: food},
                                                    success: function (data) {
                                                  

                                                        var obj = $.parseJSON(data);

                                                        $.each(obj, function () {

                                                            $('#getprop').append('<div class="row">' +
                                                                    ' <div class="col-md-12 borderproperty">' +
                                                                    ' <div class="col-md-3">' +
                                                                    ' <div class="proimage">' +
                                                                    ' <img src="<?= Yii::$app->request->baseUrl . '/img/property1.jpg' ?>" alt="..."  title="....">' +
                                                                    ' </div>' +
                                                                    '</div>' +
                                                                    ' <div class="col-md-7">' +
                                                                    '<div class="deatil">' +
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.asking_rental_price + ' </span>' + this.address + '</h1>' +
                                                                    ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                    ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                    '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                    '<p class="aminities">' +
                                                                    '<ul>' +
                                                                    '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>' +
                                                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>' +
                                                                    ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>' +
                                                                    ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>' +
                                                                    ' </ul>' +
                                                                    ' </p>' +
                                                                    ' </div>' +
                                                                    ' </div>' +
                                                                    ' <div class="col-md-2">' +
                                                                    '<div class="secure">' +
                                                                    ' <img src="<?= Yii::$app->request->baseUrl . '/img/Sheild.jpg' ?>" >' +
                                                                    ' </div>' +
                                                                    '</div>' +
                                                                    '<div class="col-md-7" style="padding:10px 0;">' +
                                                                    '<div class="btncart">' +
                                                                    ((this.requestfor == 'Instant') ?
                                                                            '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true" style="padding-right: 3px;"></i>Instant Approach</button>'
                                                                            :
                                                                            ((this.requestfor == 'bid') ?
                                                                                    '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
//                                                                    '<label style="padding-left:115px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                    '<label style="padding-left:80px;"><button class="btn pull-right btnfirst" id="' + this.id + '" onclick="getchecki(this.id)" type="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button><span class="short_list">Shortlist</span></label>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>');

                                                        });

                                                    },
                                                });
                                            }



                                        });
                                        
                                 function calculateDistance(lat1, lon1, lat2, lon2) {
                                  
                                            var radlat1 = Math.PI * lat1/180
                                            var radlat2 = Math.PI * lat2/180
                                            var radlon1 = Math.PI * lon1/180
                                            var radlon2 = Math.PI * lon2/180
                                            var theta = lon1-lon2
                                            var radtheta = Math.PI * theta/180
                                            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                                            dist = Math.acos(dist)
                                            dist = dist * 180/Math.PI
                                            dist = dist * 60 * 1.1515
                                           
                                            return dist
                                            }        
                                        
                                        
                               function bindButtonClick(obj){
                           
                                      $('#sortby').change(function(){
                                        
                                       var ferit = 0;  
                                       var sortvar =  $('#sortby').val(); 
                                       var searchlat = $('#searchlat').val();
                                       var searchlng = $('#searchlng').val();
                                       // alert(JSON.stringify(obj));
                                       
                                       if(sortvar != ''){
                                           
                                          if(sortvar == 'low'){
                                              
                                              obj.sort(function(a, b){
                                        return a.asking_rental_price - b.asking_rental_price;
                                        });
                                              
                                          }else if(sortvar == 'high'){
                                              
                                              obj.sort(function(a, b){
                                        return b.asking_rental_price - a.asking_rental_price;
                                        });
                                        
                                          } 
                                          else if(sortvar == 'nearest'){
                                           
                                            ferit = 1;  
                                             for ( i = 0; i < obj.length; i++) {
        obj[i]["distance"] = calculateDistance(searchlat,searchlng,obj[i]["latitude"],obj[i]["longitude"]);
                }

                                        obj.sort(function(a, b) { 
                                            return a.distance - b.distance;
                                            });
                                        
                                          } 
                                          
                                        var countprop = Object.keys(obj).length; 
                                       
                                        $('#getprop').html('');  
                                        
                                         $.each(obj, function () {
                                                            
                                                            ((this.undercategory == 'Residential') ? 
                                                            content = this.furnished_status +' '+ this.typename +' on '+ this.property_for +' in '+ this.locality + ((this.buildup_area == null) ? ' - plot area : '+ this.total_plot_area +' sqft' : ' - super area : '+ this.buildup_area +' sqft ') + ' - furnishing specification :* bedrooms : '+ this.bedrooms+' * bathrooms : '+ this.bathrooms+' * balconies : '+ this.balconies+' * pooja room : '+ this.pooja_room +' * study_room * servant_room , For more details or Site Visit , please Contact Us..;'
                                                           :
                                                            content =  'A very good '+ this.typename +' availabale for rent/lease in '+ this.city + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ' )
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '<span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';

                                                             var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;
                                                            var mathceildist = Math.ceil(this.distance);


                                                            
                                                            $('#getprop').append('<div class="row property_detail chirag">'+
					'<div class="col-md-4">'+
						'<img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img">'+
					'</div>'+
					'<div class="col-md-8 prop_centr">'+
						'<div class="row">'+
							'<p class="heading_prop">'+
								'<b>' +  this.typename +'</b> For sale in '+ this.city  + '</p>'+
							
							
						'</div>'+
						'<div class="row">'+
							'<ul class="prop_contnt">'+
								'<li class="first_li">'+
									'<p class="des_hed">Price</p>'+
									'<p class="des_txt"> ' + this.asking_rental_price + '</p>'+
								'</li>'+
								'<li class="padd_li">'+
									'<p class="des_hed">Area</p>'+
									'<p class="des_txt">'+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +'  Sq ft.</p>'+
								'</li>'+
								'<li class="padd_li">'+
									'<p class="des_hed">Property type</p>'+
									'<p class="des_txt">' +  this.typename +'</p>'+
								'</li>'+
								'<li class="padd_li">'+
									'<p class="des_hed">Locality</p>'+
									'<p class="des_txt">'+ this.locality +'</p>'+
								'</li>'+
							'</ul>'+
						'</div>'+
						'<div class="row">'+
							 '<h4 class="abt_head new_serch">About the property</h4>'+
							 '<p class="abt_prop">'+ html +' . .</p>'+
							 '<p class="">'+
						//	 '<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getchecki(this.id)">Shortlist</a>'+
							// '<a href="javascript:void(0)" id="' + this.id + '" class="place_bid" onclick="getfreevisit(this.id)">'+
							// (this.county > 0 ? 'Site Visited': 'Book Site Visit') +
							// '</a>'+
							// '<a onclick="viewproperty(' + this.id + '); ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
             // '<a onclick="viewpropertys( '+newnewpath+' ,' +centercoordinates + ',' +totalradius + ',' +northlat + ',' +southlat + ',' +northlng + ',' +southlng + ',' +shapes + ',' +getsearchlocation+ ')"  href="javascript:void(0)" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
             '<a onclick="viewpropertys();"  class="place_bid lessee_det" href="javascript:void(0)"  role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+



               '</p>'+
						'</div>'+
					'</div>'+
				'</div>');
                                                            

                                                        });
                                                        
                                          showPage(1);    
                                          var i;
                                          var totals = Math.ceil(countprop/6);
                                          
                                           var dynamic = "";   
                                           for(i=1;i<=totals;i++){
                                             
                                            dynamic += '<li><a href="javascript:void(0)">'+i+'</a></li>';                                           
                                            
                                           }
     
                                            
                                           $('#paginater').html('');
                                           $('#paginater').html('<ol id="pagin" class="paginclass">'+ dynamic+  '</ol>'); 
                                            $("#pagin li a").first().addClass("current"); 
                                              $("#pagin li a").click(function() {
                                              
                                            $("#pagin li a").removeClass("current");
                                            $(this).addClass("current");
                                           
                                            showPage(parseInt($(this).text())) 
                                        });
                                                        
                                                        }
                                    
                                              });
                                    }      
                                    
                                    
                                 function filterButtonClick(obj){
                           
                                      $('#filterme').click(function(){
                                       
                                        var areaft = $("#areaft").val();                                            
                                        var areamin = $("#areamin").val();
                                        var areamax = $("#areamax").val();

                                        var pricemin = $("#pricemin").val();
                                        var pricemax = $("#pricemax").val();
                                        var proptype =  $('#proptype').val();  
                                        var propbid =  $('#propbid').val(); 
                                       
                                       // alert(JSON.stringify(obj));
                                           
                                         var narcos = obj.filter(function (a) {                                          
                                          
                                          result = true;  
                                          
                                        if (proptype && (proptype != 'Commercial')) {
                                        result = result && a.project_type_id == proptype;
                                           }
                                           
                                        if (propbid && (propbid != 'Select')) {
                                        result = result && a.request_for == propbid;
                                           }
                                           
                                       if (areamin && (areamin != '')) {
                                        result = result && a.total_plot_area > areamin && a.total_plot_area < areamax ;
                                           }  
                                           
                                       if (pricemin && (pricemin != '')) {
                                        result = result && a.asking_rental_price > pricemin && a.asking_rental_price < pricemax ;
                                           }    

                                        return result;
                                        });  
//                                          
                                        //console.log(find_in_object(obj, query)); //returns none
                                       $(".serch_rslt").show();
                                                        var countprop = Object.keys(narcos).length;                                                        
                                                        $('#countprop').html(countprop);
                                       
                                        $('#getprop').html('');  
                                        
                                         $.each(narcos, function () {
                                                            
                                                            ((this.undercategory == 'Residential') ? 
                                                            content = this.furnished_status +' '+ this.typename +' on '+ this.property_for +' in '+ this.locality + ((this.buildup_area == null) ? ' - plot area : '+ this.total_plot_area +' sqft' : ' - super area : '+ this.buildup_area +' sqft ') + ' - furnishing specification :* bedrooms : '+ this.bedrooms+' * bathrooms : '+ this.bathrooms+' * balconies : '+ this.balconies+' * pooja room : '+ this.pooja_room +' * study_room * servant_room , For more details or Site Visit , please Contact Us..;'
                                                           :
                                                            content =  'A very good '+ this.typename +' availabale for rent/lease in '+ this.city + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ' )
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = c + '<span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';

                                                            
                                        $('#getprop').append('<div class="col-md-6 serch_row">'+
                                        '<div class="col-md-12 property_main_div">'+
                                        '<div class="col-md-12 property_main_div_1" style="height:60px">'+
                                        '<div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '</p></div>'+

                                        '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+' / ' + this. property_on_floor + 'th Floor '+ (( this.total_floors == null) ? '' : '(out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/view?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.asking_rental_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                        '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                        '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-5 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr">'+ 
                                          'Instant Approach</a>'
                                          :
                                        ((this.request_for == 'bid') ?
                                        '<a href="javascript:void(0)" onclick="bititnow(' + this.id + ')">'+ 
                                          'Bid it Now</a>'
                                          : ''
                                         )) +
                                        '</div>'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id)">'+
                                         (this.county > 0 ? 'Site Visited': 'Book Site Visit') +
                                         '</a>'+
                                        '</div>'+
                                        
                                        '<div class="col-md-3 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>');
                                                            

                                                        });
                                                        
                                                        
                                    
                                              });
                                    } 
                                        
                                        
                                        
                               function getsorting(val){
                                               
                                             if(val != 'nosort'){ 
                                              $('#getprop').html('');     
                                                 
                                             $.ajax({
                                                    url: 'getsorting',
                                                    data: {val: val},
                                                    success: function (data) {

                                                    
                                                        var obj = $.parseJSON(data);

                                                        $.each(obj, function () {

                                                          var imaged = $.trim(this.featured_image);
                                                           
                                                            $('#getprop').append('<div class="row">' +
                                                                    ' <div class="col-md-12 borderproperty">' +
                                                                    ' <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/view?id=']) ?>'+this.id+'" target="_blank" ><div class="col-md-3">' +
                                                                    ' <div class="proimage">' +
                                                                    ' <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+imaged+'" alt="..."  title="....">' +
//                                                                    ' <img src="<?= $_SERVER['DOCUMENT_ROOT'].'/newbells/archive/web/propertydefaultimg/'  ?>'+imaged+'" alt="..."  title="....">' +
                                                                    ' </div>' +
                                                                    '</div></a>' +
                                                                    ' <div class="col-md-7">' +
                                                                    '<div class="deatil">' +
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.asking_rental_price + ' </span>' + this.address + '</h1>' +
                                                                    ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Locality : '+ this.locality +'</p>' +
                                                                    ' <p class="highlight">Highlights: On Rent / ' + this.age_of_property + ' Years Old / '+ this.furnished_status +' / ' + this. property_on_floor + ' Floor (out of '+ this.total_floors +')</p>' +
                                                                    '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                    '<p class="aminities">' +
                                                                    '<ul class="list_li">' +
                                                                    '<li><i class="fa fa-building" aria-hidden="true"></i> '+ this.total_plot_area +' sqft</li>' +
                                                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>' +
                                                                    ' <li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>' +
                                                                    ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>' +
                                                                    ' </ul>' +
                                                                    ' </p>' +
                                                                    ' </div>' +
                                                                    ' </div>' +
                                                                    ' <div class="col-md-2">' +
                                                                    '<div class="secure">' +
                                                                    ' <img src="<?= Yii::$app->request->baseUrl . '/img/Sheild.jpg' ?>" >' +
                                                                    ' </div>' +
                                                                    '</div>' +
                                                                    '<div class="col-md-7" style="padding:10px 0;">' +
                                                                    '<div class="btncart text-center">' +
                                                                     ((this.request_for == 'Instant') ?
                                                                            '<button class="btn btn-default col-md- btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true" style="padding-right: 3px;"></i>Instant Approach</button>'
                                                                            :
                                                                            ((this.request_for == 'bid') ?
                                                                                    '<button class="btn btn-default  btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
                                                                                    
                                                                 '<button class="btn btn-success btnsecond" id="' + this.id + '" onclick="getfreevisit(this.id)" type="button">Book Site Visit</button>'+
                                                                '<label style="padding-left:15px;padding-right:15px;position: relative;top: 8px;"><button class="btn btnfirst" id="' + this.id + '" onclick="getchecki(this.id)" type="button" alt="Shortlist property"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button></label>' +

               
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>');

                                                        });

                                                    }
                                                });
                                                }
                                              
                                               
                                               
                                           }

                                        function getParameterByName(name, url) {
                                            if (!url) {
                                                url = window.location.href;
                                            }
                                            name = name.replace(/[\[\]]/g, "\\$&");
                                            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                                                    results = regex.exec(url);
                                            if (!results)
                                                return null;
                                            if (!results[2])
                                                return '';
                                            return decodeURIComponent(results[2].replace(/\+/g, " "));
                                        }


                                       
                                        var user_id = $("#username").val();
                                        

                                        function getfreevisit(id) {
                                             
                                            
                                            $.ajax({
                                                type: "POST",
                                                url: 'buyeraction/getfreevisit',
                                                data: {hardam: id},
                                                success: function (data) {
                                              
                                                
                                                if(data == '1'){
                                                    
                                                    
                                                toastr.success('Request for Site Visit has Successfully placed','success');    
                                                }else if(data == '2'){
                                                    
                                                   toastr.success('Request for Site Visit has Successfully placed','success'); 
                                                   toastr.warning('Your Free Site Visit Has Already Finished, Please Carry 100 Rs Along with you','warning');    
                                                   
                                                }else if(data == '5'){
                                                    
                                                   toastr.warning('Already Visited For this Site','warning');    
                                                   
                                                }else if(data == 'nouseractive'){

                                                  toastr.warning('Please login first to Siteviist','warning'); 
                                                  var open = '<?php echo  Yii::getAlias('@frontendUrl') ?>/user/sign-in/login';
                                                  window.open(open,'_blank');
                                                }
                                                else{
                                                   toastr.error('Internal Error','error');    
                                                        }
                                                },
                                            });

                                        }
                                        
                                        
                                        function getchecki(id) {
                                            

                                     
                                          var expectation_id = $('#expectid').val();
                                            $.ajax({
         				                              	type: "POST",
                                                url: 'buyeraction/saveprop',
                                                data: {hardam: id,expectation_id: expectation_id},
                                                success: function (data) {
                                              
                                                if(data == '1'){
                                                    
                                                toastr.error('This Property is Already Shortlisted','error');    
                                                }else if(data == 'nouseractive'){

                                                  toastr.warning('Please login first to Siteviist','warning'); 
                                                  var open = '<?php echo  Yii::getAlias('@frontendUrl') ?>/user/sign-in/login';
                                                  window.open(open,'_blank');
                                                  }else{
                                                    toastr.success('Property Shortlisted Successfully','success');   
                                                }
                                                },
                                            });

                                        }

                                      //function viewpropertys(newpath,centercoordinates,totalradius,northlat,southlat,northlng,southlng,shapes,getsearchlocation){
                       function viewpropertys(){

                         ga("send", "event", "Lessee More Details Button", "Lessee More Details Button", "Lessee More Details Button","Lessee More Details Button");

                               var shaped =  getpolyshapes;
                               var newspaths = pathstr;
                               var locations = getsearchlocation;
                               var locations = getsearchlocation;
                               var locations = getsearchlocation;
                               var locations = getsearchlocation;
                               var locations = getsearchlocation;
                               var locations = getsearchlocation;
                               var locations = getsearchlocation;

                              if(shaped == 'polygon'){
                                ndata = {shaped:shaped,newspaths : newspaths,locations: locations}; 
                              }
                              if(shaped == 'circle'){
                                ndata = {shaped:shaped,centercoordinates : centercoordinates,totalradius: totalradius,locations: locations}; 
                              }
                              if(shaped == 'rectangle'){
                                ndata = {shaped:shaped,northlat : northlat,southlat: southlat,northlng: northlng,southlng : southlng,locations: locations}; 
                              }
                              if(shaped == ''){
                                ndata = {shaped:shaped,locations: locations}; 
                              }
    
                                    $.ajax({
                                            type: "POST",
                                            url:  'lesseeaction/viewpropertys',
                                            data: ndata,
                                            success: function (data) {

                                              if(data == '1'){

                                                window.location.replace("lesseeaction/search");

                                              }else if(data == '2'){

                                                window.location.replace("user/sign-in/login");

                                              }else{
                                                toastr.error('Some Internal Error', 'warning');
                                              }
                                             
                                              
                                            },
                                        });

                                         

                          }
                          
                          
                          
                          function viewproperty1(id){
                          
                               if(id != ''){  
                                   
                                    $.ajax({
                                            type: "POST",
                                            url: 'viewproperty',
                                            data: {id:id},
                                            success: function (data) {
                                              window.location.replace("user/sign-in/login");
                                              
                                            },
                                        });

                                        } 

                          }
                          
                                 

                                       
                                        function residfilter1() {

                                            $('#getprop').html('');
                                            var commlocation = $("#commlocation").val();
                                            var commtype = $("#commtype").val();
                                            var commprice = $("#commprice").val();
                                            var commtypename = $("#commtypename").val();



                                            $.ajax({
                                                url: 'residfilter1',
                                                data: {commlocation: commlocation, commtype: commtype, commprice: commprice, commtypename: commtypename},
                                                success: function (data) {
                                                   
                                                    var obj = $.parseJSON(data);

                                                    $.each(obj, function () {

                                                        $('#getprop').append('<div class="row">' +
                                                                ' <div class="col-md-12 borderproperty">' +
                                                                ' <div class="col-md-3">' +
                                                                ' <div class="proimage">' +
                                                                ' <img src="<?= Yii::$app->request->baseUrl . '/img/property1.jpg' ?>" alt="..."  title="....">' +
                                                                ' </div>' +
                                                                '</div>' +
                                                                ' <div class="col-md-7">' +
                                                                '<div class="deatil">' +
                                                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.asking_rental_price + ' </span>' + this.address + '</h1>' +
                                                                ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                '<p class="aminities">' +
                                                                '<ul>' +
                                                                '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>' +
                                                                '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>' +
                                                                ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>' +
                                                                ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>' +
                                                                ' </ul>' +
                                                                ' </p>' +
                                                                ' </div>' +
                                                                ' </div>' +
                                                                ' <div class="col-md-2">' +
                                                                '<div class="secure">' +
                                                                ' <img src="<?= Yii::$app->request->baseUrl . '/img/Sheild.jpg' ?>" >' +
                                                                ' </div>' +
                                                                '</div>' +
                                                                '<div class="col-md-7" style="padding:10px 0;">' +
                                                                '<div class="btncart">' +
                                                                ((this.requestfor == 'Instant') ?
                                                                        '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                        '<i class="fa fa-shopping-cart" aria-hidden="true" style="padding-right: 3px;"></i>Instant Approach</button>'
                                                                        :
                                                                        ((this.requestfor == 'bid') ?
                                                                                '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow1(' + this.id + ')">' +
                                                                                '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                : ''
                                                                                )) +
//                                                                '<label style="padding-left:115px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki5(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                    '<label style="padding-left:80px;"><button class="btn pull-right btnfirst" id="' + this.id + '" onclick="getchecki5(this.id)" type="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button><span class="short_list">Shortlist</span></label>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>');

                                                    });

                                                },
                                            });
                                        }


                                        function bititnow(id) {

                                            $.ajax({
                                                type: "POST",
                                                url: 'bititnow',
                                                data: {propertyid: id},
                                                success: function (data) {
                                                 

                                                    if (data == '1') {
                                                        toastr.warning('Profile status is Pending', 'warning');
                                                    }
                                                    else if (data == '2') {
                                                       toastr.warning('Please upload your KYC documents', 'warning');
                                                    }
                                                    else if (data == '3') {
                                                        toastr.warning('Your KYC documents not approved yet', 'warning');
                                                    }
                                                    else if (data == '4') {
                                                         toastr.success('Your Request for this Bid has Successfully send', 'success');
                                                    }
                                                    else if (data == '5') {
                                                        toastr.error('Already Send Request For Bid', 'error');
                                                    }
                                                   
                                                    else {
                                                        toastr.error('Internal Error', 'error');
                                                    }

                                                },
                                            });

                                        }

                                        function directitnow(id) {

                                           $.ajax({
                                               
                                                type: "POST",
                                                url: 'directitnow',
                                                data: {propertyid: id},
                                                success: function (data) {
                                                 

                                                    if (data == '1') {
                                                        toastr.warning('Profile status is Pending', 'warning');
                                                    }
                                                    else if (data == '2') {
                                                        toastr.warning('Please upload your KYC documents', 'warning');
                                                    }
                                                    else if (data == '3') {
                                                        toastr.warning('Your KYC documents not approved yet', 'warning');
                                                    }
                                                    else if (data == '4') {
                                                         toastr.success('Your Request for this Direct Approach has Successfully send', 'success');
                                                    }
                                                    else if (data == '5') {
                                                        toastr.error('Already Send Request For Direct Approach', 'error');
                                                    }
                                                   
                                                    else {
                                                        toastr.error('Internal Error', 'error');
                                                    }

                                                },
                                            });

                                        }



                    function getexpecprop(id){
                                         $('#getprop').html('');
                                           
                                            $.ajax({
                                                url: 'myexpectations',
                                                data: {id:id},
                                                success: function (data) {
//                                                    alert(data);
                                                    var obj = $.parseJSON(data);

                                                    $.each(obj, function () {

                                                        $('#getprop').append('<div class="row">' +
                                                                ' <div class="col-md-12 borderproperty">' +
                                                                ' <div class="col-md-3">' +
                                                                ' <div class="proimage">' +
                                                                ' <img src="<?= Yii::$app->request->baseUrl . '/img/property1.jpg' ?>" alt="..."  title="....">' +
                                                                ' </div>' +
                                                                '</div>' +
                                                                ' <div class="col-md-7">' +
                                                                '<div class="deatil">' +
                                                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.asking_rental_price + ' </span>' + this.address + '</h1>' +
                                                                ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                '<p class="aminities">' +
                                                                '<ul>' +
                                                                '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>' +
                                                                '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>' +
                                                                ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>' +
                                                                ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>' +
                                                                ' </ul>' +
                                                                ' </p>' +
                                                                ' </div>' +
                                                                ' </div>' +
                                                                ' <div class="col-md-2">' +
                                                                '<div class="secure">' +
                                                                ' <img src="<?= Yii::$app->request->baseUrl . '/img/Sheild.jpg' ?>" >' +
                                                                ' </div>' +
                                                                '</div>' +
                                                                '<div class="col-md-7" style="padding:10px 0;">' +
                                                                '<div class="btncart">' +
                                                                ((this.requestfor == 'Instant') ?
                                                                        '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                        '<i class="fa fa-shopping-cart" aria-hidden="true" style="padding-right: 3px;"></i>Instant Approach</button>'
                                                                        :
                                                                        ((this.requestfor == 'bid') ?
                                                                                '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow1(' + this.id + ')">' +
                                                                                '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                : ''
                                                                                )) +
                                                                '<label style="padding-left:115px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki5(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>');

                                                    });

                                                },
                                            });
                                        
       
    }
    
    
    function getmoredata(id){
   
  
   if($('#' + id).hasClass( "less" )){
       
			$('#' + id).removeClass("less");
			$('#' + id).html(moretext);
		} else {
                    
                    
			$('#' + id).addClass("less");
			$('#' + id).html(lesstext);
		}
                
                $('#' + id).parent().prev().toggle();
		$('#' + id).prev().toggle();
		return false;
		
   
   }

    function propdetails(id){
           
       window.open('https://www.15bells.com/frontend/web/addproperty/viewsearch?id='+id,'_blank');

         }
 
    function contactus(id){ 
    
        $('#property_gy1').val('');
        $('#property_gy').val(id);
        $('#draggable2').modal('show');
       
    
    }
    
    function savemessage(){
        
           var propid = $('#property_gy').val();
           var textarew = $.trim($('#property_gy1').val());
           if(textarew != ''){  
           $('#draggable2').modal('hide');
           $.ajax({                             
                                                type: "POST",
                                                url: 'savemessages',
                                                data: {propid:propid,textarew:textarew},
                                                success: function (data) {
                                                 //alert(data);   
                                                  if(data == '1'){
                                                   toastr.success('Your Message has Successfully sent', 'success');   
                                                  }else{
                                                   toastr.error('Server Error', 'error');   
                                                  }  
                                                },
                                            });
                  
        }else{
            toastr.error('Please Enter Something', 'error');
            
        }
     
    }


</script>

<script>
    
    $(document).ready(function(){
        $("#modalButton").click(function(){
			$("#modal").modal('show');
		});
      var tour = new Tour({
          
            steps: window.steps,
            storage: false,
            backdrop:false,
  steps: [
   {
    element: ".serch_select",
    title: "Step 1",
    content: "Select Your City"
  },
  {
    element: ".search_b",
    title: "Step 2",
    content: "Enter Your locality",
    placement: "top"
  },
  {
    element: "#searches",
    title: "Step 3",
    content: "Enter Search",
    placement: "left"
    
  },
  {
    element: "#map_canvas",
    title: "Step 4",
    content: "Draw your shape on the map to see the details of properties available for Sale/Lease",
    placement: "top"
  },
  {
    element: ".out_srch",
    title: "Step 5",
    content: "Search to see the listing",
    placement: "top"
  }
]});

// Initialize the tour
tour.init();

// Start the tour
tour.start();
      
    });
    
    
    
    function changeAccept() {
       
		
		$('#draggable2').modal('show');
}	
    
</script>   

</body>

</html>
