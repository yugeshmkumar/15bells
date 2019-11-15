
<?php

use yii\helpers\Url;
use yii\db\Query;

$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
?>
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map_canvas {
        height: 400px;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }
    #target {
        width: 345px;
    }
    .short_list{font-size: 15px;
                position: relative;
                bottom: 3px;
                left: 5px;
    }
    .no_serch{
        margin:0px !important;
    }
    .commrcl_tb{

        padding:0 !important;
    }
    .container{
        width:100%;
    }
    .no_pad{
        padding:0px !important;
    }
    html, body, #map-canvas {
        height: 600px;
        margin: 0px;
        padding: 0px;
    }

    #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
    }
    .list_li li{
        padding: 10px 15px 10px 0px !important;
    }

    .padMAP{
        padding: 20px 0;
    }
    #color-palette {
        clear: both;
      }
     #delete-button{
              border: 0;
                padding: 6px 10px 6px 10px;
                background: #01adef;
                color: white;
      }
      .abcd{
          width:20px;
          float:left;
          height:20px;
      }
</style> 
<section id="search-pro">
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-sm-10 no_pad">
                <div class="search-option no_serch">
                    <ul class="nav nav-tabs">
                        <!--<li class="active"><button data-toggle="tab" id="Residential" onclick="getresidprop(this.id)" href="#residential" class="btn btn-default" type="button">RESIDENTIAL</button></li>-->
                        <li><button data-toggle="tab" id="Commercial" href="#commercial" onclick="getcommerprop(this.id)"  class="btn btn-default" type="button">COMMERCIAL</button></li>
                        <li><button data-toggle="tab" id="Others" href="#otherd" onclick="getotherprop(this.id)" class="btn btn-default" type="button">Maps</button></li>
                    </ul>

                    <div class="tab-content">

                        <div id="commercial" class="tab-pane fade commrcl_tb">
                            <div class="row">
                                <div class="col-md-4 col-sm-5 animated bounce">
                                    <!--<i class="fa fa-map-marker" aria-hidden="true"></i>-->
                                    <input type="text" id="commlocation" class="form-control" placeholder="Enter Landmark, Location or Society">
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <select id="commtype" class="form-control">
                                        <option>Select</option>                                   
                                        <option value="Rent">Rent</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <select id="commprice" class="form-control">
                                        <option>Price</option>
                                        <option value="2 lakhs">$150,000 - $200,000</option>
                                        <option value="2.5 lakhs">$200,000 - $250,000</option>
                                        <option value="3 lakhs">$250,000 - $300,000</option>
                                        <option value="4 lakhs">$300,000 - above</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3">

                                    <select id="commtypename" class="form-control">
                                        <?php
                                        $query1 = new Query;
                                        $query1->select(['typename'])
                                                ->from('property_type')
                                                ->where(['undercategory' => 'Commercial']);
                                        $command1 = $query1->createCommand();
                                        $data1 = $command1->queryAll();

                                        echo '<option>Property Type</option>';
                                        foreach ($data1 as $key1 => $datas1) {

                                            echo "<option>" . $datas1['typename'] . "</option>";
                                        }
                                        ?>                        
                                    </select>

                                </div>
                                <button type="button" onclick="residfilter1()" class="btn btn-primary animated bounce"><i class="fa fa-search search1" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div id="otherd" class="tab-pane fade commrcl_tb">
                            <div class="row">
                                <div class="col-md-4 col-sm-5 animated bounce">
                                    <!--<i class="fa fa-map-marker" aria-hidden="true"></i>-->
                                    <input type="text" id="pac-input" class="form-control" placeholder="Enter Location or Society">
                                </div>
                                  <div class="col-md-3 text-center">
                                    <button id="delete-button">Delete Selected Shape</button>
                                  </div>

                                <div  class="col-md-2" style="padding-top:6px;">
                                  <div id="color-palette"></div>
                                    
                                <div id="curpos" style="display:none;"></div>
                                <div id="cursel" style="display:none;"></div>
                                </div>

                                <div class="col-md-2 col-sm-2 animated bounce"> 
                                    <!--<button type="button" value="Geocode" onclick="getmapproperty();" class="btn btn-primary animated bounce">-->
                                    <button type="button" value="Geocode" onclick="getpolymy();" class="btn btn-primary animated bounce">
                                        <i class="fa fa-search search1" aria-hidden="true"></i>
                                    </button>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                    <input type="hidden" value="<?php echo $userid; ?>" id="username">

                </div>
            </div>
        </div>
    </div>
</section>
<!--<section id="searchtab">
    <div class="container">
        <div class="row">

            <div id="removed" class="col-md-11">
                <div id="getprop">

                </div>
            </div>

            <div class="col-md-5 padMAP">
               <div id="map_canvas" style=" border: 2px solid #3872ac;"></div>
                <div id="info"></div>
            </div>
        </div>

    </div>


</section>-->
<section id="searchtab">
    <div class="container"  id="searchtab">
        <div class="row">

             <div class="col-md-11 padMAP">
<!--<input id="pac-input" type="text" placeholder="Search Box">-->
                <div id="map_canvas" style=" border: 2px solid #3872ac;"></div>
                <div id="info"></div>
            </div>
            
            <div id="removed" class="col-md-11">
                <div id="getprop">

                </div>
            </div>
           
        </div>

    </div>
</section>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&sensor=false&libraries=geometry,drawing,places"></script>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

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
      var centercord ='';
      
      
      
      
                              function getpolymy(){
                                  
                                
                                            $('#getprop').html('');
                                            
                                           var newpath = pathstr; 
                                           var getsearchlocation  = $("#pac-input").val(); 
                                           
                                           var shapes = getpolyshapes;   
                                            
                                           var ndata = '';
                                           
                                          
                                           var xcoordinates =   arrayColumn(polyArray, 0);
                                           var ycoordinates =   arrayColumn(polyArray, 1);
//                                         var maxXcoordinate =  Math.max(xcoordinates); 

                                           // console.log(xcoordinates);
                                           // console.log(ycoordinates);
                                            
                                            
                                            if(shapes == 'polygon'){
                                                
                                                
                                           var maxi = xcoordinates.reduce(function(a, b) {
                                            return Math.max(a, b);
                                            });
                                            var mini = xcoordinates.reduce(function(a, b) {
                                            return Math.min(a, b);
                                            });
                                            var maxiy = ycoordinates.reduce(function(a, b) {
                                            return Math.max(a, b);
                                            });
                                            var miniy = ycoordinates.reduce(function(a, b) {
                                            return Math.min(a, b);
                                            }); 
                                            
                                                
                                                
                                               ndata = {maxi: maxi,mini : mini,maxiy :maxiy,miniy : miniy,shapes:shapes,user_id:user_id,location:getsearchlocation,newpath:newpath}; 
                                            
                                            
                                             $.ajax({
                                                    url: 'getpolymy',
                                                    data: ndata,
                                                    success: function (data) {
                                                       alert(data);
                                                      
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
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
                                                                    ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                    ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                    '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                    '<p class="aminities">' +
                                                                    '<ul class="list_li">' +
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
                                                                    ((this.requestfor == 'direct') ?
                                                                            '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
                                                                            :
                                                                            ((this.requestfor == 'bid') ?
                                                                                    '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
                                                                    '<label style="padding-left:80px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>');

                                                        });

                                                    },
                                                });
                                                }
                                           if(shapes == 'circle'){
                                         
                                          var latcenter = centercoordinates.substr(0, centercoordinates.indexOf(','));
                                          var longcenter =  centercoordinates.substr(centercoordinates.indexOf(",") + 1);
                                        
                                             $.ajax({
                                                    url: 'mapproperty1',
                                                    data: {center:centercoordinates,northeast: northeast,southwest : southwest,user_id:user_id,latcenter:latcenter,longcenter:longcenter,totalradius:totalradius,shapes:shapes,location:getsearchlocation},
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
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
                                                                    ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                    ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                    '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                    '<p class="aminities">' +
                                                                    '<ul class="list_li">' +
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
                                                                    ((this.requestfor == 'direct') ?
                                                                            '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
                                                                            :
                                                                            ((this.requestfor == 'bid') ?
                                                                                    '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
                                                                    '<label style="padding-left:80px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>');

                                                        });

                                                    },
                                                });
                                          }
                                                
                                                
                                  if(shapes == 'rectangle'){
                                                
                                             
                                          var   xc = (northlat + southlat)/2  ;  var yc = (northlng + southlng)/2  ;    // Center point
                                          var   xd = (northlat - southlat)/2  ; var  yd = (northlng - southlng)/2  ;    // Half-diagonal

                                           var  x3 = xc - yd  ;  var y3 = yc + xd;    // Third corner
                                           var   x4 = xc + yd  ; var  y4 = yc - xd;    // Fourth corner
                                          
                                          var xcoordinated = [northlat,southlat,x3,x4];
                                          var ycoordinated = [northlng,southlng,y3,y4];
                                          
                                         
                                              
                                              var newkuma = "[" + northeast + " , " + southwest +"]"; 
                                              
                                              
                                          var maxim = xcoordinated.reduce(function(a, b) {
                                            return Math.max(a, b);
                                            });
                                            var minim = xcoordinated.reduce(function(a, b) {
                                            return Math.min(a, b);
                                            });
                                            var maximy = ycoordinated.reduce(function(a, b) {
                                            return Math.max(a, b);
                                            });
                                            var minimy = ycoordinated.reduce(function(a, b) {
                                            return Math.min(a, b);
                                            });         
                                              alert(centercoordinates);
                                             $.ajax({
                                                    url: 'mapproperty2',
                                                    data: {maxim:maxim,minim:minim,maximy:maximy,minimy:minimy,newkuma:newkuma,center:centercord,user_id:user_id,shapes:shapes,location:getsearchlocation},
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
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
                                                                    ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                    ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                    '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                    '<p class="aminities">' +
                                                                    '<ul class="list_li">' +
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
                                                                    ((this.requestfor == 'direct') ?
                                                                            '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
                                                                            :
                                                                            ((this.requestfor == 'bid') ?
                                                                                    '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
                                                                    '<label style="padding-left:80px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>');

                                                        });
//
                                                    },
                                                });
                                                
                                               
                                                } 
                                                
                                   if(shapes == 'polyline'){
                                                
                                                
                                           var maxi = xcoordinates.reduce(function(a, b) {
                                            return Math.max(a, b);
                                            });
                                            var mini = xcoordinates.reduce(function(a, b) {
                                            return Math.min(a, b);
                                            });
                                            var maxiy = ycoordinates.reduce(function(a, b) {
                                            return Math.max(a, b);
                                            });
                                            var miniy = ycoordinates.reduce(function(a, b) {
                                            return Math.min(a, b);
                                            }); 
                                            
                                                
                                                
                                               ndata = {maxi: maxi,mini : mini,maxiy :maxiy,miniy : miniy,shapes:shapes,user_id:user_id,location:getsearchlocation,newpath:newpath}; 
                                            
                                            
                                             $.ajax({
                                                    url: 'getpolymy',
                                                    data: ndata,
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
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
                                                                    ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                    ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                    '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                    '<p class="aminities">' +
                                                                    '<ul class="list_li">' +
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
                                                                    ((this.requestfor == 'direct') ?
                                                                            '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
                                                                            :
                                                                            ((this.requestfor == 'bid') ?
                                                                                    '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
                                                                    '<label style="padding-left:80px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>');

                                                        });

                                                    },
                                                });
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
              polyArray.push(newarray);
            // .toUrlValue(5) limits number of decimals, default is 6 but can do more
            pathstr += selectedShape.getPath().getAt(i).toUrlValue() + " , ";
          }
          pathstr += "]";
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
        clearSelection();
        selectedShape = shape;
        if (isNotMarker)
          shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
        updateCurSelText(shape);
      }

      function deleteSelectedShape() {
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
      // these must have global refs too!:
      var placeMarkers = [];
      var input;
      var searchBox;
      var curposdiv;
      var curseldiv;

      function deletePlacesSearchResults() {
        for (var i = 0, marker; marker = placeMarkers[i]; i++) {
          marker.setMap(null);
        }
        placeMarkers = [];
        input.value = ''; // clear the box too
      }

      /////////////////////////////////////
      function initialize() {
        map = new google.maps.Map(document.getElementById('map_canvas'), { //var
          zoom: 12,//10,
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
            drawingModes: ['circle', 'polygon', 'polyline', 'rectangle']
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
            var newShape = e.overlay;
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
        //~ DelPlcButDiv.style.color = 'rgb(25,25,25)'; // no effect?
        DelPlcButDiv.style.backgroundColor = '#fff';
        DelPlcButDiv.style.cursor = 'pointer';
        DelPlcButDiv.innerHTML = 'DEL';
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(DelPlcButDiv);
        google.maps.event.addDomListener(DelPlcButDiv, 'click', deletePlacesSearchResults);

          searchBox = new google.maps.places.SearchBox( (input));

        // Listen for the event fired when the user selects an item from the
        // pick list. Retrieve the matching places for that item.
        google.maps.event.addListener(searchBox, 'places_changed', function() {
          var places = searchBox.getPlaces();

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
          map.setOptions({ minZoom: 5, maxZoom: 16 });
        });

        // Bias the SearchBox results towards places that are within the bounds of the
        // current map's viewport.
        google.maps.event.addListener(map, 'bounds_changed', function() {
          var bounds = map.getBounds();
          searchBox.setBounds(bounds);
          curposdiv.innerHTML = "<b>curpos</b> Z: " + map.getZoom() + " C: " + map.getCenter().toUrlValue();
        }); //////////////////////
        
      
        
      }
//      google.maps.event.addDomListener(window, 'load', initialize);

                                        $(document).ready(function () {

                                            $('.padMAP').hide();

                                            var food = getParameterByName('val');

                                            if (food == null) {

                                                $.ajax({
                                                    url: 'petproperty',
                                                    data: {id: 'hello'},
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
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
                                                                    ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                    ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                    '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                    '<p class="aminities">' +
                                                                    '<ul class="list_li">' +
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
                                                                    ((this.requestfor == 'direct') ?
                                                                            '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
                                                                            :
                                                                            ((this.requestfor == 'bid') ?
                                                                                    '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
                                                                    '<label style="padding-left:80px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>');

                                                        });

                                                    },
                                                });

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
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
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
                                                                    ((this.requestfor == 'direct') ?
                                                                            '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
                                                                            :
                                                                            ((this.requestfor == 'bid') ?
                                                                                    '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
                                                                    '<label style="padding-left:115px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>');

                                                        });

                                                    },
                                                });
                                            }



                                        });

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


                                        var matches = [];
                                        var matches1 = [];
                                        var matches2 = [];
                                        var matches3 = [];
                                        var matches4 = [];
                                        var matches5 = [];
                                        var matches6 = [];
                                        var user_id = $("#username").val();

                                        function getchecki(id) {

                                            matches.push(id);

                                            var getarray = matches.toString();

                                            $.ajax({
                                                url: 'saveprop',
                                                data: {hardam: getarray, userid: user_id},
                                                success: function (data) {

//                               alert(data);
                                                },
                                            });

                                        }


                                        function getchecki2(id) {

                                            matches2.push(id);

                                            var getarray = matches2.toString();

                                            $.ajax({
                                                url: 'saveprop2',
                                                data: {hardam: getarray, userid: user_id},
                                                success: function (data) {

//                               alert(data);
                                                },
                                            });

                                        }

                                        function getchecki4(id) {

                                            matches4.push(id);
                                            // alert(matches);
                                            var getarray = matches4.toString();

                                            $.ajax({
                                                url: 'saveprop4',
                                                data: {hardam: getarray, userid: user_id},
                                                success: function (data) {


                                                },
                                            });

                                        }

                                        function getchecki5(id) {

                                            matches5.push(id);
                                            // alert(matches);
                                            var getarray = matches5.toString();

                                            $.ajax({
                                                url: 'saveprop5',
                                                data: {hardam: getarray, userid: user_id},
                                                success: function (data) {

//                               alert(data);
                                                },
                                            });

                                        }

                                        function getchecki6(id) {

                                            matches6.push(id);
                                            // alert(matches);
                                            var getarray = matches6.toString();

                                            $.ajax({
                                                url: 'saveprop6',
                                                data: {hardam: getarray, userid: user_id},
                                                success: function (data) {

//                               alert(data);
                                                },
                                            });

                                        }


                                        function getcommerprop(id) {
                                            
                                            counter = 3;
                                             
                                            $("#removed").removeClass("col-md-7").addClass("col-md-11");

                                            $('.padMAP').hide();
                                            $('#getprop').html('');
                                            $.ajax({
                                                url: 'petproperty',
                                                data: {id: id},
                                                success: function (data) {


//                                  var obj =   JSON.stringify(data);
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
                                                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
                                                                ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
                                                                ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
                                                                '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                                                '<p class="aminities">' +
                                                                '<ul class="list_li">' +
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
                                                                ((this.requestfor == 'direct') ?
                                                                        '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                        '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
                                                                        :
                                                                        ((this.requestfor == 'bid') ?
                                                                                '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow1(' + this.id + ')">' +
                                                                                '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                : ''
                                                                                )) +
                                                                '<label style="padding-left:115px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki2(this.id)"><span class="short_list">Shortlist</span></label>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>');

                                                    });

                                                },
                                            });


                                        }


                                        function getotherprop(id) {

//                                            $("#removed").removeClass("col-md-11").addClass("col-md-7");
                                            $('.padMAP').show();
                                            initialize();


                                        }


//                                        function getmapproperty() {
//
//                                       
//                                            var newlocation = $("#pac-input").val();                                        
//                                        
//                                          
//                                            if (newlocation != '') {
//                                                $.ajax({
//                                                    url: 'mapproperty',
//                                                    data: {newlocation: newlocation},
//                                                    success: function (data) {                                                        
//                                                        alert(data);
//
//                                                        $('#getprop').html('');
//                                                        var obj = $.parseJSON(data);
//
//                                                        $.each(obj, function (index) {
//
//                                                            var letter = String.fromCharCode("A".charCodeAt(0) + index);
//                                                            var pos = new google.maps.LatLng(this.latitude, this.longitude);
//                                                                alert(pos);
//                                                            new google.maps.Marker({
//                                                                position: pos,
//                                                                map: map,
//                                                                icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
//                                                                animation: google.maps.Animation.DROP
//
//                                                            });
//
//                                                            $('#getprop').append('<div class="row">' +
//                                                                    ' <div class="col-md-12 borderproperty">' +
//                                                                    ' <div class="col-md-3">' +
//                                                                    ' <div class="proimage">' +
//                                                                    ' <img src="<?= Yii::$app->request->baseUrl . '/img/property1.jpg' ?>" alt="..."  title="....">' +
//                                                                    ' </div>' +
//                                                                    '</div>' +
//                                                                    ' <div class="col-md-7">' +
//                                                                    '<div class="deatil">' +
//                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
//                                                                    ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>' +
//                                                                    ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>' +
//                                                                    '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
//                                                                    '<p class="aminities">' +
//                                                                    '<ul class="list_li">' +
//                                                                    '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>' +
//                                                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>' +
//                                                                    ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>' +
//                                                                    ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>' +
//                                                                    ' </ul>' +
//                                                                    ' </p>' +
//                                                                    ' </div>' +
//                                                                    ' </div>' +
//                                                                    ' <div class="col-md-2">' +
//                                                                    '<div class="secure">' +
//                                                                    ' <img src="<?= Yii::$app->request->baseUrl . '/img/Sheild.jpg' ?>" >' +
//                                                                    ' </div>' +
//                                                                    '</div>' +
//                                                                    '<div class="col-md-7" style="padding:10px 0;">' +
//                                                                    '<div class="btncart">' +
//                                                                    ((this.requestfor == 'direct') ?
//                                                                            '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
//                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
//                                                                            :
//                                                                            ((this.requestfor == 'bid') ?
//                                                                                    '<button class="btn btn-default pull-right btnlast" type="button" onclick="bititnow1(' + this.id + ')">' +
//                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
//                                                                                    : ''
//                                                                                    )) +
//                                                                    '<label style="padding-left:115px;"><input  class="className" type="checkbox" id="' + this.id + '" onclick="getchecki5(this.id)"><span class="short_list">Shortlist</span></label>' +
//                                                                    '</div>' +
//                                                                    '</div>' +
//                                                                    '</div>' +
//                                                                    '</div>');
////
//                                                        });
//
//                                                    },
//                                                });
//
//
//                                            } else {
//                                                toastr.error('Something is Missing', 'error');
//                                            }
//
//
//                                        }



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
                                                    alert(data);
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
                                                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
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
                                                                ((this.requestfor == 'direct') ?
                                                                        '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                        '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
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


                                        function bititnow(id) {

                                            $.ajax({
                                                url: 'bititnow',
                                                data: {propertyid: id, userid: user_id},
                                                success: function (data) {

                                                    if (data == '1') {
                                                        toastr.error('Profile status is Pending', 'error');
                                                    }
                                                    else if (data == '2') {
                                                        toastr.error('Please upload your KYC documents', 'error');
                                                    }
                                                    else if (data == '3') {
                                                        toastr.error('Your KYC documents not approved yet', 'error');
                                                    }
                                                    else if (data == '4') {
                                                        toastr.error('Your Escrow account is Pending', 'error');
                                                    }
                                                    else if (data == '5') {
                                                        toastr.error('Your Escrow account is not Approved yet', 'error');
                                                    }
                                                    else {
                                                        toastr.success('Your Request for this property has been send', 'success');
                                                    }

                                                },
                                            });

                                        }

                                        function directitnow(id) {

                                            alert(id);

                                        }





</script>