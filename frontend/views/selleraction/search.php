 

<?php

use yii\helpers\Url;

$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
?>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora:400i" rel="stylesheet"> 
<!-- END PAGE BAR -->

<!--<section id="search-pro">-->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-sm-10">
            <div class="search-option">
                <ul class="nav nav-tabs">
                    <li class="active"><button data-toggle="tab" id="resid" onclick="getresidprop(this.id)" href="#residential" class="btn btn-default" type="button">RESIDENTIAL</button></li>
                    <li><button data-toggle="tab" id="commer" href="#commercial" onclick="getcommerprop(this.id)"  class="btn btn-default" type="button">COMMERCIAL</button></li>
                    <li><button data-toggle="tab" id="other" href="#other" onclick="getotherprop(this.id)" class="btn btn-default" type="button">OTHER</button></li>
                </ul>

                <div class="tab-content">
                    <div id="residential" class="tab-pane fade in active">

                        <div class="row">
                            <div class="col-md-5 col-sm-5 animated bounce">
                                <!--<i class="fa fa-map-marker" aria-hidden="true"></i>-->
                                <input type="text" class="form-control" placeholder="Enter Landmark, Location or Society">
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <select class="form-control">
                                    <option>Buy</option>
                                    <option>Rent</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2">

                                <select class="form-control">
                                    <option>Price</option>
                                    <option>$150,000 - $200,000</option>
                                    <option>$200,000 - $250,000</option>
                                    <option>$250,000 - $300,000</option>
                                    <option>$300,000 - above</option>
                                </select>

                            </div>
                            <div class="col-md-2 col-sm-2">
                                <select class="form-control">
                                    <option>Property Type</option>
                                    <option>Apartment</option>
                                    <option>Building</option>
                                    <option>Office Space</option>
                                </select>

                            </div>
                            <button class="btn btn-primary animated bounce"><i class="fa fa-search search1" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div id="commercial" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 animated bounce">
                                <!--<i class="fa fa-map-marker" aria-hidden="true"></i>-->
                                <input type="text" class="form-control" placeholder="Enter Landmark, Location or Society">
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <select class="form-control">
                                    <option>Buy</option>
                                    <option>Rent</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <select class="form-control">
                                    <option>Price</option>
                                    <option>$150,000 - $200,000</option>
                                    <option>$200,000 - $250,000</option>
                                    <option>$250,000 - $300,000</option>
                                    <option>$300,000 - above</option>
                                </select>
                            </div>
             <div class="col-md-2 col-sm-2">
                 
               <select class="form-control">
                <option>Property Type</option>
                <option>Apartment</option>
                <option>Building</option>
                <option>Office Space</option>
              </select>
      
                </div>
                            <button class="btn btn-primary animated bounce"><i class="fa fa-search search1" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div id="other" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 animated bounce">
                                <!--<i class="fa fa-map-marker" aria-hidden="true"></i>-->
                                <input type="text" class="form-control"  placeholder="Enter Landmark, Location or Society">
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <select class="form-control">
                                    <option>Buy</option>
                                    <option>Rent</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <select class="form-control">
                                    <option>Price</option>
                                    <option>$150,000 - $200,000</option>
                                    <option>$200,000 - $250,000</option>
                                    <option>$250,000 - $300,000</option>
                                    <option>$300,000 - above</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <select class="form-control">
                                    <option>Property Type</option>
                                    <option>Apartment</option>
                                    <option>Building</option>
                                    <option>Office Space</option>
                                </select>

                            </div>
                            <button class="btn btn-primary animated bounce"><i class="fa fa-search search1" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<section id="searchtab">
    <div class="container">


        <div class="row">

            <div class="col-md-9">
                <div class="sortby clearfix">

                    <div class="col-md-2"> 
                        <div class="selectall">
                            <input type="checkbox" id="checkbox" class="checkbox" name="checkbox"/><span>ALL</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="bid">
                            <i class="fa fa-gavel" aria-hidden="true"></i><span><a href="#">&nbsp; &nbsp;Bid Now</a></span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="buyit">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i><span><a href="#">Buy it Now</a></span>
                            <select class="form-control pull-right">
                                <option>Sort by</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                            </select>
                        </div>
                    </div>
                </div>

           <div id="getprop">
             
               
                </div>



            </div>
            



        </div>

    </div>
</div>

</section>
<!-- END CONTENT -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
           
           $(document).ready(function() {
           
            $.ajax({
                                url: 'petproperty',
                                data: {id: 'hello'},
                                success: function (data) {
                       
//                                  var obj =   JSON.stringify(data);
                                  var obj = $.parseJSON(data);
                                   
                                    $.each(obj, function () {

                                        $('#getprop').append('<div class="row">'+
                    ' <div class="col-md-12 borderproperty">'+

                       ' <div class="col-md-3">'+
                           ' <div class="proimage">'+
                               ' <img src="img/property1.jpg" alt="..."  title="....">'+
                           ' </div>'+
                        '</div>'+
                       ' <div class="col-md-7">'+
                            '<div class="deatil">'+
                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> '+ this.expected_price +' </span>'+ this.propertydescr +'</h1>'+
                               ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>'+
                               ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>'+
                                '<p><b>Description:</b> Offering a fantastic view and surrounding, This flat is very spacious and gets ample light and cross ventilation.......</p>'+
                                '<p class="aminities">'+ 
                                '<ul>'+
                                    '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>'+
                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>'+
                                   ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>'+
                                   ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>'+
                               ' </ul>'+
                               ' </p>'+
                           ' </div>'+
                       ' </div>'+
                       ' <div class="col-md-2">'+
                            '<div class="secure">'+
                               ' <img src="img/Sheild.jpg" alt="..." title=".....">'+
                           ' </div>'+
                        '</div>'+
                        '<div class="col-md-9">'+
                            '<div class="btncart">'+
                                '<button class="btn pull-right btnfirst" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button> '+
                               ' <button class="btn btn-default pull-right btnsecond" type="submit">View Details</button>'+
                                '<button class="btn btn-default pull-right btnlast" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy it Now</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+


                '</div>');

                                    });

                                },
                            });
           
           });

             
                   
              function getresidprop(id) {
                       
                       $('#getprop').html('');
                            $.ajax({
                                url: 'petproperty',
                                data: {id: id},
                                success: function (data) {
                        
//                                  var obj =   JSON.stringify(data);
                                  var obj = $.parseJSON(data);
                                   
                                    $.each(obj, function () {

                                        $('#getprop').append('<div class="row">'+
                    ' <div class="col-md-12 borderproperty">'+

                       ' <div class="col-md-3">'+
                           ' <div class="proimage">'+
                               ' <img src="img/property1.jpg" alt="..."  title="....">'+
                           ' </div>'+
                        '</div>'+
                       ' <div class="col-md-7">'+
                            '<div class="deatil">'+
                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> '+ this.expected_price +' </span>'+ this.propertydescr +'</h1>'+
                               ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>'+
                               ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>'+
                                '<p><b>Description:</b> Offering a fantastic view and surrounding, This flat is very spacious and gets ample light and cross ventilation.......</p>'+
                                '<p class="aminities">'+ 
                                '<ul>'+
                                    '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>'+
                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>'+
                                   ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>'+
                                   ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>'+
                               ' </ul>'+
                               ' </p>'+
                           ' </div>'+
                       ' </div>'+
                       ' <div class="col-md-2">'+
                            '<div class="secure">'+
                               ' <img src="img/Sheild.jpg" alt="..." title=".....">'+
                           ' </div>'+
                        '</div>'+
                        '<div class="col-md-9">'+
                            '<div class="btncart">'+
                                '<button class="btn pull-right btnfirst" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button> '+
                               ' <button class="btn btn-default pull-right btnsecond" type="submit">View Details</button>'+
                                '<button class="btn btn-default pull-right btnlast" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy it Now</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+


                '</div>');

                                    });

                                },
                            });


                        }    
                        
                        
                        function getcommerprop(id) {
                       
                       $('#getprop').html('');
                            $.ajax({
                                url: 'petproperty',
                                data: {id: id},
                                success: function (data) {
                        
//                                  var obj =   JSON.stringify(data);
                                  var obj = $.parseJSON(data);
                                   
                                    $.each(obj, function () {

                                        $('#getprop').append('<div class="row">'+
                    ' <div class="col-md-12 borderproperty">'+

                       ' <div class="col-md-3">'+
                           ' <div class="proimage">'+
                               ' <img src="img/property1.jpg" alt="..."  title="....">'+
                           ' </div>'+
                        '</div>'+
                       ' <div class="col-md-7">'+
                            '<div class="deatil">'+
                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> '+ this.expected_price +' </span>'+ this.propertydescr +'</h1>'+
                               ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>'+
                               ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>'+
                                '<p><b>Description:</b> Offering a fantastic view and surrounding, This flat is very spacious and gets ample light and cross ventilation.......</p>'+
                                '<p class="aminities">'+ 
                                '<ul>'+
                                    '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>'+
                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>'+
                                   ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>'+
                                   ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>'+
                               ' </ul>'+
                               ' </p>'+
                           ' </div>'+
                       ' </div>'+
                       ' <div class="col-md-2">'+
                            '<div class="secure">'+
                               ' <img src="img/Sheild.jpg" alt="..." title=".....">'+
                           ' </div>'+
                        '</div>'+
                        '<div class="col-md-9">'+
                            '<div class="btncart">'+
                                '<button class="btn pull-right btnfirst" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button> '+
                               ' <button class="btn btn-default pull-right btnsecond" type="submit">View Details</button>'+
                                '<button class="btn btn-default pull-right btnlast" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy it Now</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+


                '</div>');

                                    });

                                },
                            });


                        }
                        
                        function getotherprop(id) {
                       
                       $('#getprop').html('');
                            $.ajax({
                                url: 'petproperty',
                                data: {id: id},
                                success: function (data) {
                        
//                                  var obj =   JSON.stringify(data);
                                  var obj = $.parseJSON(data);
                                   
                                    $.each(obj, function () {

                                        $('#getprop').append('<div class="row">'+
                    ' <div class="col-md-12 borderproperty">'+

                       ' <div class="col-md-3">'+
                           ' <div class="proimage">'+
                               ' <img src="img/property1.jpg" alt="..."  title="....">'+
                           ' </div>'+
                        '</div>'+
                       ' <div class="col-md-7">'+
                            '<div class="deatil">'+
                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> '+ this.expected_price +' </span>'+ this.propertydescr +'</h1>'+
                               ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Society : DDA LIG Apartment Pitampura</p>'+
                               ' <p class="highlight">Highlights: On Rent / 10+year old / Furnished / 3rd Floor (out of 3)</p>'+
                                '<p><b>Description:</b> Offering a fantastic view and surrounding, This flat is very spacious and gets ample light and cross ventilation.......</p>'+
                                '<p class="aminities">'+ 
                                '<ul>'+
                                    '<li><i class="fa fa-building" aria-hidden="true"></i> 1,286 sqft</li>'+
                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> 2</li>'+
                                   ' <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>'+
                                   ' <li><i class="fa fa-home" aria-hidden="true"></i> 3</li>'+
                               ' </ul>'+
                               ' </p>'+
                           ' </div>'+
                       ' </div>'+
                       ' <div class="col-md-2">'+
                            '<div class="secure">'+
                               ' <img src="img/Sheild.jpg" alt="..." title=".....">'+
                           ' </div>'+
                        '</div>'+
                        '<div class="col-md-9">'+
                            '<div class="btncart">'+
                                '<button class="btn pull-right btnfirst" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button> '+
                               ' <button class="btn btn-default pull-right btnsecond" type="submit">View Details</button>'+
                                '<button class="btn btn-default pull-right btnlast" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy it Now</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+


                '</div>');

                                    });

                                },
                            });


                        }



</script>

