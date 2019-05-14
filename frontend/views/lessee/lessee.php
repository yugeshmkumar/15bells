<?php

use yii\helpers\Url;
use yii\web\View;

$this->title = 'Lessee';

$username = '';

if (isset(\Yii::$app->user->identity->id)) {

    $username = \Yii::$app->user->identity->id;
}
?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&libraries=places,geometry"></script>

<style>

    #map {
        height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
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
        width: 400px;
        border-radius: 0px;
        height: 40px;
        border: 1px solid #2196F3;
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
    .no_pad{
        padding:0px !important;
    }
    #map-canvas {
        height: 400px;
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
    .pleasehide{
        display:none;
    }  

    .newr{
        width:30%;
        margin-bottom: 1px;
    }
    .slide{
        padding: 0;
        width: 100%;
        box-shadow:none !important;
    }
    #abcd{
        padding:0px !important;
    }
    #slider_lessee .searchback{
        padding:10px 50px 15px 50px!important;
    }
    .number_prop{
        position:relative;
        top:10px;
    }
    .city_cntrl{
        color: #555 !important;
        background-color: #fff !important;
        background-image: none !important;
        border: 1px solid #ccc !important;
        width:100%;
        margin:0 auto;
    }
    .no_pad{
        padding:0 !important;
    }
</style>


<!--===========Third Section Starts--------->
<div class="container-fluid" id="abcd">


    <section id="slider_lessee">
        <div class="container bur_cont" style="margin-top:160px;">
            <div class="row">
                <div class="col-md-12">
                    <p class="section_p text-center">Hello lessee! It’s time to stay safe with your expansions. Get the best space according to your needs and requirements. </p>

                </div>
                <div class="col-md-12">
                    <div class="col-md-6" style="padding-top:33px;padding-right:33px;">
                        <div class="row">
                            <div class="searchback animated bounceInLeft">
                                <h2>Search Requirement</h2><br>
                                <div class="col-md-12">
                                    <div class="col-md-5 no_pad">
                                        <div class="form-group">
                                            <select class="form-control input_lct city_cntrl" onchange="getcity(this.value)" id="search">
                                                <option>Enter Location (City)</option>
                                                <option value="Gurgaon">Gurgaon</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Noida">Noida</option>
                                                <option value="Greater Noida">Greater Noida</option>
                                                <option value="Faridabad">Faridabad</option>
                                                <option value="Ghaziabad">Ghaziabad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-7 no_pad">
                                        <input type="text" name="search" class="search animated rotateInDownLeft" id="search1" placeholder="Enter Location">
                                    </div>
                                </div>
                                <input type="hidden" id="town">
                                <input type="hidden" id="sector">

                                <p class="search_lessee_btn"> <a class="btn btn-default" href="#S_pro" id="onebutton" role="button">SEARCH PROPERTY</a></p>
                            </div>
                        </div>
                        <div class="row">
                            <div id="numbersearch" style="position:relative;top:6px;"> 
                                <section id="S_pro">
                                    <div class="container-fluid your_serch">
                                        <div class="row" style="margin:0px !important;">
                                            <div class="col-md-12 proced_further post">
                                                <div class="col-md-12">
                                                    <p class="text_p"><span class="number_prop" style="border-bottom: 0px;">0</span>properties match your search criteria</p>

                                                </div>
                                                <div class="col-md-12 butn_pad">
                                                    <div class="col-md-8 text-left">
                                                        <p class="text_p">To proceed further click on Register.</p>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 text-center">
                                                        <a href="<?= Yii::$app->urlManager->createUrl("user/sign-in/signup") ?>" class="butn_serch">
                                                            REGISTER
                                                        </a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-12 no_pad">

                                <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="4000">


                                    <div class="carousel-inner">

                                        <div class="active item">
                                            <div class="sliderheading animated bounceInRight">
                                                <p>No more hurdles for finding a property.</p>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="sliderheading animated bounceInRight">

                                                <p><span class="heading2">Numerous options to choose from</span></p>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="sliderheading animated bounceInRight">

                                                <p><span class="heading3">Huge umbrella for all your requirements – PAN India</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>              
                        </div> 
                        <div class="row text-right link_sec">
                            <ul class="slider_sec">
                                <li><a href="javascript:void(0)" onclick="openNav1()">How It Works</a></li>
                                <!--<li><a href="javascript:void(0)" onclick="openNav2()">FAQ'S</a></li>-->
                            </ul>
                        </div>	

                        <!---- HOW IT WORKS------>
                        <div id="myNav" class="overlay_how">

                            <!-- Button to close the overlay navigation -->
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>

                            <!-- Overlay content -->
                            <div class="overlay-content-how">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-8">
                                        <div class="col-md-4 text-center">
                                            <div class="how_work">
                                                <p><div class="icon_count">
                                                    1
                                                </div></p>
                                          <!--<p><img class="icon_img" src="<?= Yii::$app->request->baseUrl . '/frontimg/icon/manage_property.png' ?>"></p>-->
                                                <p>Draw your shape to search.</p>

                                            </div>
                                        </div> 
                                        <div class="col-md-4 text-center">
                                            <div class="how_work">
                                                <p><div class="icon_count">
                                                    2
                                                </div></p>
                                                <p>Real time site visit.</p>

                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="how_work">
                                                <p><div class="icon_count">
                                                    3
                                                </div></p>
                                                <p>Multiple ways to close the deal.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--HOW IT WORKS ENDS----->


                        <!----- FAQ'S SECTION STARTS---------->
                        <div id="myNav1" class="overlay1">

                            <!-- Button to close the overlay navigation -->
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>

                            <!-- Overlay content -->
                            <div class="overlay-content1">
                                <div class="row" id="faq">
                                    <div class="col-md-12 post" style="margin: 0px 0px 40px 0px;">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="part">
                                                <h4><span>1</span><img src="<?= Url::to('@web/img') ?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor </p>
                                                <h4><span>2</span><img src="<?= Url::to('@web/img') ?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. </p>
                                                <h4><span>3</span><img src="<?= Url::to('@web/img') ?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehend.</p>
                                                <h4><span>4</span><img src="<?= Url::to('@web/img') ?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velum.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="part">
                                                <h4><span>5</span><img src="<?= Url::to('@web/img') ?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur.</p>
                                                <h4><span>6</span><img src="<?= Url::to('@web/img') ?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
                                                <h4><span>7</span><img src="<?= Url::to('@web/img') ?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                <h4><span>8</span><img src="<?= Url::to('@web/img') ?>/bullet.png">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p>
                                            </div>
                                            <!--<a href="#"><button class="btn btn-default" type="submit">read more....</button></a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!------FAQ'S section ends----->

                    </div>
                </div>    
            </div>
        </div>

        <!----- FOOTER SECTION STARTS------>

        <div class="row footer_link" id="footr_nav" style="background:#000;">		
            <div class="col-md-4" style="padding-top:5px;">
                <i class="fa fa-close clode_anim"></i>
                <p class="rights_resrv">© 2017 ALL RIGHTS RESERVED. POWERED BY <a href="#">Stoneray Technologies</a></p>
            </div>	
            <div class="col-md-5">
                <ul class="footer_mnu" style="padding-top:5px;">
                    <li><a class="sliding-middle-out" href="<?= Yii::$app->homeUrl ?>">Home</a></li>
                    <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">Buyer</a></li>
                    <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a></li>
                    <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a></li>
                    <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a></li>
                    <li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("aboutus") ?>">About Us</a></li>
                    <li style="border-right:none !important;"><a class="sliding-middle-out" onclick="opencon()" style="cursor: pointer">Contact Us</a></li>
                </ul>
            </div>	
            <div class="col-md-3">
                <ul class="social_ic">
                    <li><a href="https://www.facebook.com/15bells/" target="_blank"><i class="fa fa-facebook sc_icn"></i></a></li>
                    <li><a href="https://twitter.com/15bells" target="_blank"><i class="fa fa-twitter sc_icn"></i></a></li>
                    <li><a href="https://plus.google.com/u/0/101985235162687065074" target="_blank"><i class="fa fa-google-plus sc_icn"></i></a></li>
                    <li><a href="https://nl.linkedin.com/company/15bells" target="_blank"><i class="fa fa-linkedin sc_icn"></i></a></li>
                    <li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube sc_icn"></i></a></li>
                </ul>
            </div>

        </div>
        <div class="social_btn text-center">
            <i class="fa fa-angle-left"></i>
        </div>
    </section>



</div>
<!---==== Section three ends========-->

</div


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
                                                                                                    var globalvar = '';

                                                                                                    function getcity(val) {
                                                                                                        $('#search1').val('');
                                                                                                        globalvar = val;

                                                                                                    }

                                                                                                    $(".social_btn").click(function () {
                                                                                                        $(".footer_link").animate({
                                                                                                            width: "100%"
                                                                                                        });
                                                                                                        $(".social_btn").hide();
                                                                                                    });
                                                                                                    $(".clode_anim").click(function () {
                                                                                                        $(".footer_link").animate({
                                                                                                            width: "0%"
                                                                                                        });
                                                                                                        $(".social_btn").show(1000);
                                                                                                    });
                                                                                                    function openNav1() {
                                                                                                        document.getElementById("myNav").style.width = "100%";
                                                                                                    }

                                                                                                    /* Close when someone clicks on the "x" symbol inside the overlay */
                                                                                                    function closeNav1() {
                                                                                                        document.getElementById("myNav").style.width = "0%";
                                                                                                    }

                                                                                                    function openNav2() {
                                                                                                        document.getElementById("myNav1").style.width = "100%";
                                                                                                    }

                                                                                                    /* Close when someone clicks on the "x" symbol inside the overlay */
                                                                                                    function closeNav2() {
                                                                                                        document.getElementById("myNav1").style.width = "0%";
                                                                                                    }

</script>

<script>


    var input = document.getElementById('search1');
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
</script>



<script>
    $(document).ready(function () {
        ///Video Mute and Unmute Button////
        $("#abcd").show();
        $(".vol_up").click(function () {

            $("#bgvid").prop('muted', !$("#bgvid").prop('muted'));
            $(".vol_control").find('i').toggleClass('fa-volume-off fa-volume-up')
        });
        $(".skip_v").click(function () {
            //$("#bgvid").prop('muted', !$("#bgvid").prop('muted'));
            $("video").prop('muted', true);
        });

    });

</script>  


<script>
    $(document).ready(function () {
        $('.menu_drop').addClass('fnt_wht');
        $('.link_clr').addClass('white_clr');
    });
</script>
<script>
    $(document).ready(function () {
        $(".img_icon").hover(function () {
            $(this).addClass('animated zoomIn' + $(this).data('action'));
        });
        $(".img_icon").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function () {
            $(this).removeClass('animated zoomIn' + $(this).data('action'));
        });
    });
</script>

<script type="text/javascript">



    $(document).ready(function () {
        // Configure/customize these variables.
        var showChar = 100;  // How many characters are shown by default
        var ellipsestext = "...";
        var moretext = "Show more >>";
        var lesstext = "Show less <<";


        $('.more').each(function () {
            var content = $(this).html();

            if (content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);

                var html = c + '<span class="moreellipses">' +
                        ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h +
                        '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext +
                        '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function () {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });
</script>




<script>

    $(document).ready(function () {
        var menu = $('.menu')
        var timeout = 0;
        var hovering = false;
        menu.hide();

        $('.mainbutton')
                .on("mouseenter", function () {
                    hovering = true;
                    // Open the menu
                    $('.menu')
                            .stop(true, true)
                            .slideDown(400);

                    if (timeout > 0) {
                        clearTimeout(timeout);
                    }
                })
                .on("mouseleave", function () {
                    resetHover();
                });

        $(".menu")
                .on("mouseenter", function () {
                    // reset flag
                    hovering = true;
                    // reset timeout
                    startTimeout();
                })
                .on("mouseleave", function () {
                    // The timeout is needed incase you go back to the main menu
                    resetHover();
                });

        function startTimeout() {
            // This method gives you 1 second to get your mouse to the sub-menu
            timeout = setTimeout(function () {
                closeMenu();
            }, 1000);
        }
        ;

        function closeMenu() {
            // Only close if not hovering
            if (!hovering) {
                $('.menu').stop(true, true).slideUp(400);
            }
        }
        ;

        function resetHover() {
            // Allow the menu to close if the flag isn't set by another event
            hovering = false;
            // Set the timeout
            startTimeout();
        }
        ;
    });

</script>



<script>
    $(document).ready(function () {

        $(".skip_v").click(function () {
            $("#lessor_sec").hide();
            $("#abcd").show();
        });

    });

</script>

<script type="text/javascript">

    var user = $("#getuser").val();
    $(document).ready(function () {


        $("#numbersearch").hide();

    });

    //	  
    function doSomething() {


        //                                 var searchinput = $(this).parent().parent().children().eq(2).prop('id');
        //
        //                                 var searchval = $(this).parent().parent().children().eq(2).val();
        var searchval = $('#search1').val();
        var town = $('#town').val();
        var sector = $('#sector').val();

        $("#numbersearch").hide();
        $("#googlesearch").show();

        if (searchval != '' && town != '') {

            //                                     if (user != '') {

            $("#googlesearch").hide();

            $.ajax({
                type: "POST",
                url: 'getnumber',
                data: {searchval: searchval, town: town, sector: sector},
                success: function (data) {
                    // alert(data);   
                    if (data != 0) {
                        $('.number_prop').html(data);
                        $('#search1').val('');
                        $('#town').val('');
                        $('#sector').val('');
                    } else {
                        $('#search1').val('');
                        $('#town').val('');
                        $('#sector').val('');
                        $('.number_prop').html('0');
                        toastr.error('Not found any property in this location', 'error');
                    }


                },
            });
            $("#numbersearch").show();

            //                                     } else {
            //
            //                                         window.location.replace("/15bells/frontend/web/index.php/user/sign-in/login");
            //
            //                                     }



        } else {

            toastr.error('Please Enter Location', 'error');
        }

    }

    $("#onebutton").click(doSomething);
    $("#twobutton").click(doSomething);
    $("#threebutton").click(doSomething);



    



    function init() {

        var minZoomLevel = 10;
       

        // var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
        var searchBox1 = new google.maps.places.SearchBox(document.getElementById('search1'));
        // map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));


        google.maps.event.addListener(searchBox1, 'places_changed', function () {
            searchBox1.set('map', null);


            var places = searchBox1.getPlaces();
            var arrAddress = places[0].address_components;
            // console.log(places[0].address_components);

            $.each(arrAddress, function (i, address_component) {
                console.log('address_component:' + i);

                if (address_component.types[0] == "route") {
                    console.log(i + ": route:" + address_component.long_name);
                    itemRoute = address_component.long_name;
                }

                if (address_component.types[0] == "locality") {
                    console.log("town:" + address_component.long_name);

                    itemLocality = address_component.long_name;

                    $('#town').val(itemLocality);
                }

                if (address_component.types[0] == "sublocality_level_1") {
                    // console.log("province:"+address_component.long_name);
                    itemSectorf = address_component.long_name;
                    $('#sector').val(itemSectorf);

                }

                if (address_component.types[0] == "country") {
                    console.log("country:" + address_component.long_name);
                    itemCountry = address_component.long_name;
                }

                if (address_component.types[0] == "postal_code_prefix") {
                    console.log("pc:" + address_component.long_name);
                    itemPc = address_component.long_name;
                }

                if (address_component.types[0] == "street_number") {
                    console.log("street_number:" + address_component.long_name);
                    itemSnumber = address_component.long_name;
                }
                //return false; // break the loop   
            });

            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                (function (place) {
                    var marker = new google.maps.Marker({
                        position: place.geometry.location
                    });
                    marker.bindTo('map', searchBox1, 'map');
                    google.maps.event.addListener(marker, 'map_changed', function () {
                        if (!this.getMap()) {
                            this.unbindAll();
                        }
                    });
                    bounds.extend(place.geometry.location);


                }(place));

            }
           

        });

        
    }
    google.maps.event.addDomListener(window, 'load', init);



</script>

</body>

</html>
