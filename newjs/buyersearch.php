

    $('.dropdown-menu.aRange')
            .click(function (e) {
                e.stopPropagation();
            });

    function disableDropDownRangeOptions(max_values, minValue) {
        if (max_values) {
            max_values.each(function () {
                var maxValue = $(this).attr("value");

                if (parseInt(maxValue) < parseInt(minValue)) {
                    $(this).addClass('disabled');
                } else {
                    $(this).removeClass('disabled');
                }
            });
        }
    }

    function setuinvestRangeDropDownList(min_values, max_values, min_input, max_input, clearLink, dropDownControl) {
        var minValue = '';
        var maxValue = '';
        min_values.click(function () {
            minValue = $(this).attr('value');
            min_input.val(minValue);
            document.getElementById('area_range1').innerHTML = minValue;



            disableDropDownRangeOptions(max_values, minValue);

            validateDropDownInputs();
        });

        max_values.click(function () {
            maxValue = $(this).attr('value');
            max_input.val(maxValue);
            document.getElementById('area_range2').innerHTML = maxValue;

            toggleDropDown();
        });



        clearLink.click(function () {
            min_input.val('');
            max_input.val('');

            disableDropDownRangeOptions(max_values);

            validateDropDownInputs();
        });

        min_input.on('input',
                function () {
                    var minValue = min_input.val();

                    disableDropDownRangeOptions(max_values, minValue);
                    validateDropDownInputs();
                });

        max_input.on('input', validateDropDownInputs);
        var areas = $('#areaft').val();
        max_input.blur('input',
                function () {
                    toggleDropDown();
                    updatearea();
                });

        if (areas != '') {
            $('#areaft').blur(function () {

                updatearea();
            });
        }

        function validateDropDownInputs() {
            var minValue = parseInt(min_input.val());
            var maxValue = parseInt(max_input.val());

            if (maxValue > 0 && minValue > 0 && maxValue < minValue) {
                min_input.addClass('inputError');
                max_input.addClass('inputError');

                return false;
            } else {
                min_input.removeClass('inputError');
                max_input.removeClass('inputError');

                return true;
            }
        }
        function updatearea() {
            if (minValue != '' && maxValue != '' && areas != '') {
                var areas = $('#areaft').val();
                var totalarea = minValue + '-' + maxValue + ' ' + areas;
                $('#totalarea').html(totalarea);
            }

        }

        function toggleDropDown() {
            if (validateDropDownInputs() &&
                    parseInt(min_input.val()) > 0 &&
                    parseInt(max_input.val()) > 0) {

                // auto close if two values are valid
                dropDownControl.dropdown('toggle');
            }
        }
    }

    setuinvestRangeDropDownList(
            $('.areaRange .min_value'),
            $('.areaRange .max_value'),
            $('.areaRange .freeformPrice .min_input'),
            $('.areaRange .freeformPrice .max_input'),
            $('.areaRange .btnClear'),
            $('.areaRange .dropdown-toggle'));



    $('.dropdown-menu.ddRange')
            .click(function (e) {
                e.stopPropagation();
            });

    function disableDropDownRangeOptions(max_values, minValue) {
        if (max_values) {
            max_values.each(function () {
                var maxValue = $(this).attr("value");

                if (parseInt(maxValue) < parseInt(minValue)) {
                    $(this).addClass('disabled');
                } else {
                    $(this).removeClass('disabled');
                }
            });
        }
    }

    function setuinvestRangeDropDownList(min_values, max_values, min_input, max_input, clearLink, dropDownControl) {
        min_values.click(function () {
            var minValue = $(this).attr('value');
            min_input.val(minValue);
            document.getElementById('price_range1').innerHTML = minValue;

            disableDropDownRangeOptions(max_values, minValue);

            validateDropDownInputs();
        });

        max_values.click(function () {
            var maxValue = $(this).attr('value');
            max_input.val(maxValue);
            document.getElementById('price_range2').innerHTML = maxValue;

            toggleDropDown();
        });

        clearLink.click(function () {
            min_input.val('');
            max_input.val('');

            disableDropDownRangeOptions(max_values);

            validateDropDownInputs();
        });

        min_input.on('input',
                function () {
                    var minValue = min_input.val();

                    disableDropDownRangeOptions(max_values, minValue);
                    validateDropDownInputs();
                });

        max_input.on('input', validateDropDownInputs);

        max_input.blur('input',
                function () {
                    toggleDropDown();
                });

        function validateDropDownInputs() {
            var minValue = parseInt(min_input.val());
            var maxValue = parseInt(max_input.val());

            if (maxValue > 0 && minValue > 0 && maxValue < minValue) {
                min_input.addClass('inputError');
                max_input.addClass('inputError');

                return false;
            } else {
                min_input.removeClass('inputError');
                max_input.removeClass('inputError');

                return true;
            }
        }

        function toggleDropDown() {
            if (validateDropDownInputs() &&
                    parseInt(min_input.val()) > 0 &&
                    parseInt(max_input.val()) > 0) {

                // auto close if two values are valid
                dropDownControl.dropdown('toggle');
            }
        }
    }

    setuinvestRangeDropDownList(
            $('.investRange .min_value'),
            $('.investRange .max_value'),
            $('.investRange .freeformPrice .min_input'),
            $('.investRange .freeformPrice .max_input'),
            $('.investRange .btnClear'),
            $('.investRange .dropdown-toggle'));






    $('#min-max-area-range').click(function (event) {
        setTimeout(function () {
            $('.area-label').first().focus();
        }, 0);
    });
    var priceLabelObj;
    $('.area-label').focus(function (event) {
        priceLabelObj = $(this);
        $('.area-range').addClass('hide');
        $('#' + $(this).data('dropdownId')).removeClass('hide');
    });

    $(".area-range li").click(function () {
        priceLabelObj.attr('value', $(this).attr('data-value'));
        var curElmIndex = $(".area-label").index(priceLabelObj);
        var nextElm = $(".area-label").eq(curElmIndex + 1);

        if (nextElm.length) {
            $(".area-label").eq(curElmIndex + 1).focus();
        } else {
            $('#min-max-area-range').dropdown('toggle');
        }
    });

    $(document).ready(function () {

        $(".dropdown-toggle").dropdown();


        $(".serch_rslt").hide();
        $(".reslt_close").click(function () {
            $(".serch_rslt").hide();
        });
        $("#searches").click(function () {
            $('html, body').animate({
                // scrollTop: $(".row_another_search").offset().top
                //}, 2000);
                scrollTop: $(window).scrollTop() + 400
            }, 1000);
        });

        $("#color_main_div").click(function () {
            $(".drop_down_menu").slideToggle('fast');
        });
        $(".price_drop_detail").click(function () {
            $(".price_range_details").slideToggle('fast');
        });
        $(".area_drop_detail").click(function () {
            $(".area_range_details").slideToggle('fast');
        });
        $(".residental_dropdown").click(function () {
            $(".residental_dropdown_detail").slideToggle('fast');
        });
    });


<?php if(isset($getlocality)){  ?>

var geocoder = new google.maps.Geocoder();
var a = "<?php echo $getlocality; ?>";

var latitude;
var longitude;
geocoder.geocode({ 'address' : a}, function(results, status) {
  var c = results[0].geometry.location;
   latitude = c.lat();
   longitude = c.lng();  
	
});
<?php 
} ?>


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
      var infoWindow;
      var latt;
      var longg;
      var rectangle;
      



    function getpolymy() {



        var getexpectationID = $('#expectid').val();
        var showChar = 100;
        var ellipsestext = "...";
        var moretext = "Show more";
        var lesstext = "Show less";
        var newpath = pathstr;
        var getsearchlocation = $("#pac-input").val();
        var town = $("#town").val();
        var sector = $("#sector").val();
        var country = $("#country").val();
        var AreaSqmeter = '45';

        var areaft = $("#areaft").val();
        var areamin = $("#areamin").val();
        var areamax = $("#areamax").val();
        var pricemin = $("#pricemin").val();
        var pricemax = $("#pricemax").val();
        var proptype = $('#proptype').val();
        var propbid = $('#propbid').val();

        pageSize = 6;
        page = 1;

        showPage = function (page) {
            $(".chirag").hide();
            $(".chirag").each(function (n) {
                if (n >= pageSize * (page - 1) && n < pageSize * page)
                    $(this).show();
            });
        }


        var shapes = getpolyshapes;

        var ndata = '';


        var xcoordinates = arrayColumn(polyArray, 0);
        var ycoordinates = arrayColumn(polyArray, 1);



        var minZoomLevel = 8;
        var map = new google.maps.Map(document.getElementById('map-canvasd'), {
            center: {
                lat: 28.4595,
                lng: 77.0266
            },
            zoom: 12
                    // mapTypeId: 'satellite'
        });






        if (getexpectationID != '') {


            if (town == '' && sector == '') {

                toastr.warning('Please Fill Specific Locality', 'warning');
            } else {

                if (getsearchlocation != '' || shapes != '') {



                    $('#getprop').html('');
                    $('#getpropsim').html('');
                    $('#similiarrow').hide();

                    toastr.success('Your Search Criteria has Successfully Saved', 'success');


                    if (shapes == '') {



                        ndata = {location: getsearchlocation, area: getexpectationID, town: town, sector: sector, areamin: areamin, areamax: areamax, pricemin: pricemin, pricemax: pricemax, proptype: proptype, propbid: propbid};

                        $.ajax({
                            type: "POST",
                            url: 'withoutshape',
                            data: ndata,
                            success: function (data) {

                               
                                $('#search-pro').css("display", "block");
                                var obj = $.parseJSON(data);

                                $(".serch_rslt").show();
                                var countprop = Object.keys(obj).length;
                                $('#countprop').html(countprop);

                                bindButtonClick(obj);
                                

                                $.each(obj, function (index) {


                                    if (this.latitude != '')
                                    {
                                        var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                        var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                        new google.maps.Marker({
                                            position: pos,
                                            map: map,
                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                            animation: google.maps.Animation.DROP

                                        });
                                        google.maps.event.addListenerOnce(map, 'idle', function () {
                                            google.maps.event.trigger(map, 'resize');
                                        });
                                    }
                                    else
                                    {
                                        alert('Server Error');
                                    }
                                    google.maps.event.addListener(map, 'zoom_changed', function () {
                                        if (map.getZoom() > minZoomLevel)
                                            map.setZoom(minZoomLevel);
                                    });
                                    var content = 'A very good ' + this.typename + ' availabale for rent/lease in ' + this.city + ' with Plot area ' + this.total_plot_area + ' sqft, Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                    var imaged = $.trim(this.featured_image);
                                    var c = content.substr(0, showChar);
                                    var h = content.substr(showChar - 1, content.length - showChar);
                                    var html = '<span onclick="propdetails(' + this.id + ')">' + c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_' + this.id + '" class="morelinks ">' + moretext + '</a></span>';
                                    var haritid = 273 * 179 - this.id;
                                    var propsid = 'PR' + haritid;


                                    $('#getprop').append('<div class="col-md-6 serch_row chirag" style="">' +
                                            '<div class="col-md-12 property_main_div">' +
                                            '<div class="col-md-12 property_main_div_1" style="height:60px">' +
                                            <a onclick="viewproperty1(" + this.id + "); ga("send", "event", "Lesseaction search property Heading", "Lesseaction search property Heading", "Lesseaction search property Heading","Lesseaction search property Heading");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' + this.typename + ' availabale for sale in ' + this.city + '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ID - ' + propsid + ')</p></div></a>
                                            ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2">' +
                                            '<div class="row">' +
                                            '<div class="col-md-6 property_main_div_2_inner_1">' +
                                            '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/'; ?>' + ((this.featured_image == null) ? 'not.jpg' : imaged) + '" class="img-responsive"></div>' +
                                            '</div>' +
                                            '<div class="col-md-6 property_main_div_2_inner_2" onclick="ga("send", "event", "Buyeraction Search Property content", "Buyeraction Search Property content", "Buyeraction Search Property content","Buyeraction Search Property content");">' +
                                            '<p style="color: #ffeb3b;"><b>Locality :</b> ' + this.locality + '</p>' +
                                            '<p style="color: #ffba00;"><b>Highlights:</b>  On Rent / ' + this.age_of_property + ' Years Old' + ((this.furnished_status == '') ? '' : '/ ' + this.furnished_status) + ((this.property_on_floor == null) ? '' : ' / ' + this.property_on_floor + 'th Floor') + ((this.total_floors == null) ? '' : '(out of ' + this.total_floors + ')') + '</p>' +
                                            '<p><b>Description:</b> ' + html + '</p>' +
                                            '<a class="btn btn-default" onclick="viewproperty(' + this.id + '); ga("send", "event", "Lesseeaction Search Property More details", "Lesseeaction Search Property More details", "Lesseeaction Search Property More details","Lesseeaction Search Property More details");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2_inner_p">' +
                                            '<ul class="list_li">' +
                                            '<li><p>₹  ' + this.asking_rental_price + ' </p></li>' +
                                            '<li><i class="fa fa-building" aria-hidden="true"></i>  ' + ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) + ' sqft</li>' +
                                            // '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                            // '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                            '<li><i class="fa fa-users" aria-hidden="true"></i> ' + this.county1 + '</li>' +
                                            '</ul>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_3">' +
                                            '<div class="col-md-5 text-center property_main_div_3_inner1">' +
                                            ((this.request_for == 'Instant') ?
                                                    '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ');ga("send", "event", "Lesseeaction Search Property Instant Approach", "Lesseeaction Search Property Instant Approach", "Lesseeaction Search Property Instant Approach","Lesseeaction Search Property Instant Approach");" class="appr_cursr">' +
                                                    'Instant Approach</a>'
                                                    :
                                                    ((this.request_for == 'bid') ?
                                                            '<a href="javascript:void(0)" onclick="bititnow(' + this.id + '); ga("send", "event", "Lesseeaction Search Property Instant Approach", "Lesseeaction Search Property Instant Approach", "Lesseeaction Search Property Instant Approach","Lesseeaction Search Property Instant Approach");">' +
                                                            'Bid it Now</a>'
                                                            : ''
                                                            )) +
                                            '</div>' +
                                            '<div class="col-md-3 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id); ga("send", "event", "Lesseeaction Search Property Shortlist Button", "Lesseeaction Search Property Shortlist Button", "Lesseeaction Search Property Shortlist Button","Lesseeaction Search Property Shortlist Button");"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>' +
                                            '</div>' +
                                            '<div class="col-md-4 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id); ga("send", "event", "Lesseeaction Search Property Sitevisit", "Lesseeaction Search Property Sitevisit", "Lesseeaction Search Property Sitevisit","Lesseeaction Search Property Sitevisit");">' +
                                            (this.county > 0 ? 'Site Visited' : 'Book Site Visit') +
                                            '</a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>');

                                });

                                showPage(1);
                                var i;
                                var totals = Math.ceil(countprop / 6);

                                var dynamic = "";
                                for (i = 1; i <= totals; i++) {

                                    dynamic += '<li><a href="javascript:void(0)">' + i + '</a></li>';

                                }


                                $('#paginater').html('');
                                $('#paginater').html('<ol id="pagin" class="paginclass">' + dynamic + '</ol>');
                                $("#pagin li a").first().addClass("current");
                                $("#pagin li a").click(function () {

                                    $("#pagin li a").removeClass("current");
                                    $(this).addClass("current");

                                    showPage(parseInt($(this).text()))
                                });


                            },
                        });


                    }

                    if (shapes == 'polygon') {


                        var maxi = xcoordinates.reduce(function (a, b) {
                            return Math.max(a, b);
                        });
                        var mini = xcoordinates.reduce(function (a, b) {
                            return Math.min(a, b);
                        });
                        var maxiy = ycoordinates.reduce(function (a, b) {
                            return Math.max(a, b);
                        });
                        var miniy = ycoordinates.reduce(function (a, b) {
                            return Math.min(a, b);
                        });



                        ndata = {location: getsearchlocation,maxi: maxi, mini: mini, maxiy: maxiy, miniy: miniy, shapes: shapes, newpath: newpath, area: getexpectationID, town: town, sector: sector, areamin: areamin, areamax: areamax, pricemin: pricemin, pricemax: pricemax, proptype: proptype, propbid: propbid};

                        $.ajax({
                            type: "POST",
                            url: 'getpolymy',
                            data: ndata,
                            success: function (data) {

                                
                                $('#search-pro').css("display", "block");
                                var obj = $.parseJSON(data);
                                $(".serch_rslt").show();
                                var countprop = Object.keys(obj).length;
                                $('#countprop').html(countprop);

                                bindButtonClick(obj);
                                

                                $.each(obj, function (index) {


                                    if (this.latitude != '')
                                    {
                                        var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                        var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                        new google.maps.Marker({
                                            position: pos,
                                            map: map,
                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                            animation: google.maps.Animation.DROP

                                        });
                                        google.maps.event.addListenerOnce(map, 'idle', function () {
                                            google.maps.event.trigger(map, 'resize');
                                        });
                                    }
                                    else
                                    {
                                        alert('Server Error');
                                    }
                                    google.maps.event.addListener(map, 'zoom_changed', function () {
                                        if (map.getZoom() > minZoomLevel)
                                            map.setZoom(minZoomLevel);
                                    });
                                    var content = 'A very good ' + this.typename + ' availabale for rent/lease in ' + this.city + ' with Plot area ' + this.total_plot_area + ' sqft, Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                    var imaged = $.trim(this.featured_image);
                                    var c = content.substr(0, showChar);
                                    var h = content.substr(showChar - 1, content.length - showChar);
                                    var html = '<span onclick="propdetails(' + this.id + ')">' + c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_' + this.id + '" class="morelinks ">' + moretext + '</a></span>';
                                    var haritid = 273 * 179 - this.id;
                                    var propsid = 'PR' + haritid;


                                    $('#getprop').append('<div class="col-md-6 serch_row chirag" style="">' +
                                            '<div class="col-md-12 property_main_div">' +
                                            '<div class="col-md-12 property_main_div_1" style="height:60px">' +
                                            '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' + this.typename + ' availabale for sale in ' + this.city + '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ID - ' + propsid + ')</p></div></a>' +
                                            ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2" >' +
                                            '<div class="row">' +
                                            '<div class="col-md-6 property_main_div_2_inner_1">' +
                                            '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/'; ?>' + ((this.featured_image == null) ? 'not.jpg' : imaged) + '" class="img-responsive"></div>' +
                                            '</div>' +
                                            '<div class="col-md-6 property_main_div_2_inner_2">' +
                                            '<p style="color: #ffeb3b;"><b>Locality :</b> ' + this.locality + '</p>' +
                                            '<p style="color: #ffba00;"><b>Highlights:</b>  On Rent / ' + this.age_of_property + ' Years Old' + ((this.furnished_status == '') ? '' : '/ ' + this.furnished_status) + ((this.property_on_floor == null) ? '' : ' / ' + this.property_on_floor + 'th Floor') + ((this.total_floors == null) ? '' : '(out of ' + this.total_floors + ')') + '</p>' +
                                            '<p><b>Description:</b> ' + html + '</p>' +
                                            '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2_inner_p">' +
                                            '<ul class="list_li">' +
                                            '<li><p>₹  ' + this.asking_rental_price + ' </p></li>' +
                                            '<li><i class="fa fa-building" aria-hidden="true"></i>  ' + ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) + ' sqft</li>' +
                                            // '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                            // '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                            '<li><i class="fa fa-users" aria-hidden="true"></i> ' + this.county1 + '</li>' +
                                            '</ul>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_3">' +
                                            '<div class="col-md-5 text-center property_main_div_3_inner1">' +
                                            ((this.request_for == 'Instant') ?
                                                    '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr">' +
                                                    'Instant Approach</a>'
                                                    :
                                                    ((this.request_for == 'bid') ?
                                                            '<a href="javascript:void(0)" onclick="bititnow(' + this.id + ')">' +
                                                            'Bid it Now</a>'
                                                            : ''
                                                            )) +
                                            '</div>' +
                                            '<div class="col-md-3 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>' +
                                            '</div>' +
                                            '<div class="col-md-4 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id)">' +
                                            (this.county > 0 ? 'Site Visited' : 'Book Site Visit') +
                                            '</a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>');

                                });

                                showPage(1);
                                var i;
                                var totals = Math.ceil(countprop / 6);

                                var dynamic = "";
                                for (i = 1; i <= totals; i++) {

                                    dynamic += '<li><a href="javascript:void(0)">' + i + '</a></li>';

                                }


                                $('#paginater').html('');
                                $('#paginater').html('<ol id="pagin" class="paginclass">' + dynamic + '</ol>');
                                $("#pagin li a").first().addClass("current");
                                $("#pagin li a").click(function () {

                                    $("#pagin li a").removeClass("current");
                                    $(this).addClass("current");

                                    showPage(parseInt($(this).text()))
                                });

                            },
                        });
                    }
                    if (shapes == 'circle') {

                        var latcenter = centercoordinates.substr(0, centercoordinates.indexOf(','));
                        var longcenter = centercoordinates.substr(centercoordinates.indexOf(",") + 1);

                        $.ajax({
                            type: "POST",
                            url: 'mapproperty1',
                            data: {location: getsearchlocation,center: centercoordinates, northeast: northeast, southwest: southwest, latcenter: latcenter, longcenter: longcenter, totalradius: totalradius, shapes: shapes, town: town, sector: sector, area: getexpectationID, town:town, sector:sector, areamin: areamin, areamax: areamax, pricemin: pricemin, pricemax: pricemax, proptype: proptype, propbid: propbid},
                            success: function (data) {
                                // alert(data);

                                $('#search-pro').css("display", "block");
                                var obj = $.parseJSON(data);
                                $(".serch_rslt").show();
                                var countprop = Object.keys(obj).length;
                                $('#countprop').html(countprop);

                                bindButtonClick(obj);
                               

                                $.each(obj, function (index) {

                                    if (this.latitude != '')
                                    {
                                        var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                        var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                        new google.maps.Marker({
                                            position: pos,
                                            map: map,
                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                            animation: google.maps.Animation.DROP

                                        });
                                        google.maps.event.addListenerOnce(map, 'idle', function () {
                                            google.maps.event.trigger(map, 'resize');
                                        });
                                    }
                                    else
                                    {
                                        alert('Server Error');
                                    }
                                    google.maps.event.addListener(map, 'zoom_changed', function () {
                                        if (map.getZoom() > minZoomLevel)
                                            map.setZoom(minZoomLevel);
                                    });

                                    var content = 'A very good ' + this.typename + ' availabale for rent/lease in ' + this.city + ' with Plot area ' + this.total_plot_area + ' sqft, Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                    var imaged = $.trim(this.featured_image);
                                    var c = content.substr(0, showChar);
                                    var h = content.substr(showChar - 1, content.length - showChar);
                                    var html = '<span onclick="propdetails(' + this.id + ')">' + c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_' + this.id + '" class="morelinks ">' + moretext + '</a></span>';
                                    var haritid = 273 * 179 - this.id;
                                    var propsid = 'PR' + haritid;


                                    $('#getprop').append('<div class="col-md-6 serch_row chirag" style="">' +
                                            '<div class="col-md-12 property_main_div">' +
                                            '<div class="col-md-12 property_main_div_1" style="height:60px">' +
                                            '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' + this.typename + ' availabale for sale in ' + this.city + '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ID - ' + propsid + ')</p></div></a>' +
                                            ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2" >' +
                                            '<div class="row">' +
                                            '<div class="col-md-6 property_main_div_2_inner_1">' +
                                            '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/'; ?>' + ((this.featured_image == null) ? 'not.jpg' : imaged) + '" class="img-responsive"></div>' +
                                            '</div>' +
                                            '<div class="col-md-6 property_main_div_2_inner_2">' +
                                            '<p style="color: #ffeb3b;"><b>Locality :</b> ' + this.locality + '</p>' +
                                            '<p style="color: #ffba00;"><b>Highlights:</b>  On Rent / ' + this.age_of_property + ' Years Old' + ((this.furnished_status == '') ? '' : '/ ' + this.furnished_status) + ((this.property_on_floor == null) ? '' : ' / ' + this.property_on_floor + 'th Floor') + ((this.total_floors == null) ? '' : '(out of ' + this.total_floors + ')') + '</p>' +
                                            '<p><b>Description:</b> ' + html + '</p>' +
                                            '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2_inner_p">' +
                                            '<ul class="list_li">' +
                                            '<li><p>₹  ' + this.asking_rental_price + ' </p></li>' +
                                            '<li><i class="fa fa-building" aria-hidden="true"></i>  ' + ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) + ' sqft</li>' +
                                            // '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                            // '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                            '<li><i class="fa fa-users" aria-hidden="true"></i> ' + this.county1 + '</li>' +
                                            '</ul>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_3">' +
                                            '<div class="col-md-5 text-center property_main_div_3_inner1">' +
                                            ((this.request_for == 'Instant') ?
                                                    '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr">' +
                                                    'Instant Approach</a>'
                                                    :
                                                    ((this.request_for == 'bid') ?
                                                            '<a href="javascript:void(0)" onclick="bititnow(' + this.id + ')">' +
                                                            'Bid it Now</a>'
                                                            : ''
                                                            )) +
                                            '</div>' +
                                            '<div class="col-md-3 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>' +
                                            '</div>' +
                                            '<div class="col-md-4 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id)">' +
                                            (this.county > 0 ? 'Site Visited' : 'Book Site Visit') +
                                            '</a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>');

                                });

                                showPage(1);
                                var i;
                                var totals = Math.ceil(countprop / 6);

                                var dynamic = "";
                                for (i = 1; i <= totals; i++) {

                                    dynamic += '<li><a href="javascript:void(0)">' + i + '</a></li>';

                                }


                                $('#paginater').html('');
                                $('#paginater').html('<ol id="pagin" class="paginclass">' + dynamic + '</ol>');
                                $("#pagin li a").first().addClass("current");
                                $("#pagin li a").click(function () {

                                    $("#pagin li a").removeClass("current");
                                    $(this).addClass("current");

                                    showPage(parseInt($(this).text()))
                                });

                            },
                        });
                    }


                    if (shapes == 'rectangle') {


                        var xc = (northlat + southlat) / 2;
                        var yc = (northlng + southlng) / 2;    // Center point
                        var xd = (northlat - southlat) / 2;
                        var yd = (northlng - southlng) / 2;    // Half-diagonal

                        var x3 = xc - yd;
                        var y3 = yc + xd;    // Third corner
                        var x4 = xc + yd;
                        var y4 = yc - xd;    // Fourth corner

                        var xcoordinated = [northlat, southlat, x3, x4];
                        var ycoordinated = [northlng, southlng, y3, y4];

                       


                        var newkuma = "[" + northeast + " , " + southwest + "]";


                        var maxim = xcoordinated.reduce(function (a, b) {
                            return Math.max(a, b);
                        });
                        var minim = xcoordinated.reduce(function (a, b) {
                            return Math.min(a, b);
                        });
                        var maximy = ycoordinated.reduce(function (a, b) {
                            return Math.max(a, b);
                        });
                        var minimy = ycoordinated.reduce(function (a, b) {
                            return Math.min(a, b);
                        });
                        
                        $.ajax({
                            type: "POST",
                            url: 'mapproperty2',
                            data: {northlat:northlat,southlat:southlat,northlng:northlng,southlng:southlng,location: getsearchlocation,maxim: maxim, minim: minim, maximy: maximy, minimy: minimy, newkuma: newkuma, center: centercord, shapes: shapes, town: town, sector: sector, area: getexpectationID, x: JSON.stringify(xcoordinated), y: JSON.stringify(ycoordinated), town:town, sector:sector, areamin: areamin, areamax: areamax, pricemin: pricemin, pricemax: pricemax, proptype: proptype, propbid: propbid},
                            success: function (data) {

                               
                                $('#search-pro').css("display", "block");
                                var obj = $.parseJSON(data);
                                $(".serch_rslt").show();
                                var countprop = Object.keys(obj).length;
                                $('#countprop').html(countprop);

                                bindButtonClick(obj);
                               

                                $.each(obj, function (index) {

                                    if (this.latitude != '')
                                    {
                                        var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                        var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                        new google.maps.Marker({
                                            position: pos,
                                            map: map,
                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                            animation: google.maps.Animation.DROP

                                        });
                                        google.maps.event.addListenerOnce(map, 'idle', function () {
                                            google.maps.event.trigger(map, 'resize');
                                        });
                                    }
                                    else
                                    {
                                        alert('Server Error');
                                    }
                                    google.maps.event.addListener(map, 'zoom_changed', function () {
                                        if (map.getZoom() > minZoomLevel)
                                            map.setZoom(minZoomLevel);
                                    });

                                    var content = 'A very good ' + this.typename + ' availabale for rent/lease in ' + this.city + ' with Plot area ' + this.total_plot_area + ' sqft, Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                    var imaged = $.trim(this.featured_image);
                                    var c = content.substr(0, showChar);
                                    var h = content.substr(showChar - 1, content.length - showChar);
                                    var html = '<span onclick="propdetails(' + this.id + ')">' + c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_' + this.id + '" class="morelinks ">' + moretext + '</a></span>';
                                    var haritid = 273 * 179 - this.id;
                                    var propsid = 'PR' + haritid;


                                    $('#getprop').append('<div class="col-md-6 serch_row chirag" style="">' +
                                            '<div class="col-md-12 property_main_div">' +
                                            '<div class="col-md-12 property_main_div_1" style="height:60px">' +
                                            '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' + this.typename + ' availabale for sale in ' + this.city + '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ID - ' + propsid + ')</p></div></a>' +
                                            ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2" >' +
                                            '<div class="row">' +
                                            '<div class="col-md-6 property_main_div_2_inner_1">' +
                                            '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/'; ?>' + ((this.featured_image == null) ? 'not.jpg' : imaged) + '" class="img-responsive"></div>' +
                                            '</div>' +
                                            '<div class="col-md-6 property_main_div_2_inner_2">' +
                                            '<p style="color: #ffeb3b;"><b>Locality :</b> ' + this.locality + '</p>' +
                                            '<p style="color: #ffba00;"><b>Highlights:</b>  On Rent / ' + this.age_of_property + ' Years Old' + ((this.furnished_status == '') ? '' : '/ ' + this.furnished_status) + ((this.property_on_floor == null) ? '' : ' / ' + this.property_on_floor + 'th Floor') + ((this.total_floors == null) ? '' : '(out of ' + this.total_floors + ')') + '</p>' +
                                            '<p><b>Description:</b> ' + html + '</p>' +
                                            '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2_inner_p">' +
                                            '<ul class="list_li">' +
                                            '<li><p>₹  ' + this.asking_rental_price + ' </p></li>' +
                                            '<li><i class="fa fa-building" aria-hidden="true"></i>  ' + ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) + ' sqft</li>' +
                                            // '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                            // '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                            '<li><i class="fa fa-users" aria-hidden="true"></i> ' + this.county1 + '</li>' +
                                            '</ul>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_3">' +
                                            '<div class="col-md-5 text-center property_main_div_3_inner1">' +
                                            ((this.request_for == 'Instant') ?
                                                    '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr">' +
                                                    'Instant Approach</a>'
                                                    :
                                                    ((this.request_for == 'bid') ?
                                                            '<a href="javascript:void(0)" onclick="bititnow(' + this.id + ')">' +
                                                            'Bid it Now</a>'
                                                            : ''
                                                            )) +
                                            '</div>' +
                                            '<div class="col-md-3 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>' +
                                            '</div>' +
                                            '<div class="col-md-4 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id)">' +
                                            (this.county > 0 ? 'Site Visited' : 'Book Site Visit') +
                                            '</a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>');

                                });

                                showPage(1);
                                var i;
                                var totals = Math.ceil(countprop / 6);

                                var dynamic = "";
                                for (i = 1; i <= totals; i++) {

                                    dynamic += '<li><a href="javascript:void(0)">' + i + '</a></li>';

                                }


                                $('#paginater').html('');
                                $('#paginater').html('<ol id="pagin" class="paginclass">' + dynamic + '</ol>');
                                $("#pagin li a").first().addClass("current");
                                $("#pagin li a").click(function () {

                                    $("#pagin li a").removeClass("current");
                                    $(this).addClass("current");

                                    showPage(parseInt($(this).text()))
                                });

                            },
                        });


                    }

                    if (shapes == 'polyline') {


                        var maxi = xcoordinates.reduce(function (a, b) {
                            return Math.max(a, b);
                        });
                        var mini = xcoordinates.reduce(function (a, b) {
                            return Math.min(a, b);
                        });
                        var maxiy = ycoordinates.reduce(function (a, b) {
                            return Math.max(a, b);
                        });
                        var miniy = ycoordinates.reduce(function (a, b) {
                            return Math.min(a, b);
                        });



                        ndata = {location: getsearchlocation,maxi: maxi, mini: mini, maxiy: maxiy, miniy: miniy, shapes: shapes, town: town, sector: sector, newpath: newpath, area: getexpectationID, town:town, sector:sector, areamin: areamin, areamax: areamax, pricemin: pricemin, pricemax: pricemax, proptype: proptype, propbid: propbid};


                        $.ajax({
                            type: "POST",
                            url: 'getpolymy',
                            data: ndata,
                            success: function (data) {
                               
                                $('#search-pro').css("display", "block");
                                var obj = $.parseJSON(data);
                                $(".serch_rslt").show();
                                var countprop = Object.keys(obj).length;
                                $('#countprop').html(countprop);

                                bindButtonClick(obj);
                             

                                $.each(obj, function (index) {

                                    if (this.latitude != '')
                                    {
                                        var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                        var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                        new google.maps.Marker({
                                            position: pos,
                                            map: map,
                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                            animation: google.maps.Animation.DROP

                                        });
                                        google.maps.event.addListenerOnce(map, 'idle', function () {
                                            google.maps.event.trigger(map, 'resize');
                                        });
                                    }
                                    else
                                    {
                                        alert('Server Error');
                                    }
                                    google.maps.event.addListener(map, 'zoom_changed', function () {
                                        if (map.getZoom() > minZoomLevel)
                                            map.setZoom(minZoomLevel);
                                    });

                                    var content = 'A very good ' + this.typename + ' availabale for rent/lease in ' + this.city + ' with Plot area ' + this.total_plot_area + ' sqft, Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                    var imaged = $.trim(this.featured_image);
                                    var c = content.substr(0, showChar);
                                    var h = content.substr(showChar - 1, content.length - showChar);
                                    var html = '<span onclick="propdetails(' + this.id + ')">' + c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_' + this.id + '" class="morelinks ">' + moretext + '</a></span>';
                                    var haritid = 273 * 179 - this.id;
                                    var propsid = 'PR' + haritid;


                                    $('#getprop').append('<div class="col-md-6 serch_row chirag" style="">' +
                                            '<div class="col-md-12 property_main_div">' +
                                            '<div class="col-md-12 property_main_div_1" style="height:60px">' +
                                            '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' + this.typename + ' availabale for sale in ' + this.city + '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ID - ' + propsid + ')</p></div></a>' +
                                            ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2" >' +
                                            '<div class="row">' +
                                            '<div class="col-md-6 property_main_div_2_inner_1">' +
                                            '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/'; ?>' + ((this.featured_image == null) ? 'not.jpg' : imaged) + '" class="img-responsive"></div>' +
                                            '</div>' +
                                            '<div class="col-md-6 property_main_div_2_inner_2">' +
                                            '<p style="color: #ffeb3b;"><b>Locality :</b> ' + this.locality + '</p>' +
                                            '<p style="color: #ffba00;"><b>Highlights:</b>  On Rent / ' + this.age_of_property + ' Years Old' + ((this.furnished_status == '') ? '' : '/ ' + this.furnished_status) + ((this.property_on_floor == null) ? '' : ' / ' + this.property_on_floor + 'th Floor') + ((this.total_floors == null) ? '' : '(out of ' + this.total_floors + ')') + '</p>' +
                                            '<p><b>Description:</b> ' + html + '</p>' +
                                            '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2_inner_p">' +
                                            '<ul class="list_li">' +
                                            '<li><p>₹  ' + this.asking_rental_price + ' </p></li>' +
                                            '<li><i class="fa fa-building" aria-hidden="true"></i>  ' + ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) + ' sqft</li>' +
                                            // '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                            // '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                            '<li><i class="fa fa-users" aria-hidden="true"></i> ' + this.county1 + '</li>' +
                                            '</ul>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_3">' +
                                            '<div class="col-md-5 text-center property_main_div_3_inner1">' +
                                            ((this.request_for == 'Instant') ?
                                                    '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr">' +
                                                    'Instant Approach</a>'
                                                    :
                                                    ((this.request_for == 'bid') ?
                                                            '<a href="javascript:void(0)" onclick="bititnow(' + this.id + ')">' +
                                                            'Bid it Now</a>'
                                                            : ''
                                                            )) +
                                            '</div>' +
                                            '<div class="col-md-3 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>' +
                                            '</div>' +
                                            '<div class="col-md-4 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id)">' +
                                            (this.county > 0 ? 'Site Visited' : 'Book Site Visit') +
                                            '</a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>');

                                });

                                showPage(1);
                                var i;
                                var totals = Math.ceil(countprop / 6);

                                var dynamic = "";
                                for (i = 1; i <= totals; i++) {

                                    dynamic += '<li><a href="javascript:void(0)">' + i + '</a></li>';

                                }


                                $('#paginater').html('');
                                $('#paginater').html('<ol id="pagin" class="paginclass">' + dynamic + '</ol>');
                                $("#pagin li a").first().addClass("current");
                                $("#pagin li a").click(function () {

                                    $("#pagin li a").removeClass("current");
                                    $(this).addClass("current");

                                    showPage(parseInt($(this).text()))
                                });

                            },
                        });
                    }



                    if (shapes != '') {

                        var searchlat = $('#searchlat').val();
                        var searchlng = $('#searchlng').val();
                        pageSizes = 2;
                        pages = 1;

                        showPages = function (pages) {
                            $(".chirags").hide();
                            $(".chirags").each(function (n) {
                                if (n >= pageSizes * (pages - 1) && n < pageSizes * pages)
                                    $(this).show();
                            });
                        }

                        ndata = {location: getsearchlocation, town: town, sector: sector, areamin: areamin, areamax: areamax, pricemin: pricemin, pricemax: pricemax, proptype: proptype, propbid: propbid};

                        $.ajax({
                            type: "POST",
                            url: 'similiarprop',
                            data: ndata,
                            success: function (data) {

                                // alert(data);

                                var obj = $.parseJSON(data);

                                $(".serch_rslt").show();
                                var countprop = Object.keys(obj).length;
                                // $('#countprop1').html(countprop);
                                if (countprop > 0) {

                                    $('#getpropsim').html('');
                                    $('#similiarrow').show();

                                }

                                for (i = 0; i < obj.length; i++) {
                                    obj[i]["distance"] = calculateDistance(searchlat, searchlng, obj[i]["latitude"], obj[i]["longitude"]);
                                }

                                obj.sort(function (a, b) {
                                    return a.distance - b.distance;
                                });

                                $.each(obj, function (index) {


                                    var content = 'A very good ' + this.typename + ' availabale for rent/lease in ' + this.city + ' with Plot area ' + this.total_plot_area + ' sqft, Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                    var imaged = $.trim(this.featured_image);
                                    var c = content.substr(0, showChar);
                                    var h = content.substr(showChar - 1, content.length - showChar);
                                    var html = '<span onclick="propdetails(' + this.id + ')">' + c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_' + this.id + '" class="morelinks ">' + moretext + '</a></span>';
                                    var haritid = 273 * 179 - this.id;
                                    var propsid = 'PR' + haritid;


                                    $('#getpropsim').append('<div class="col-md-6 serch_row chirags" style="">' +
                                            '<div class="col-md-12 property_main_div">' +
                                            '<div class="col-md-12 property_main_div_1" style="height:60px">' +
                                            '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' + this.typename + ' availabale for sale in ' + this.city + '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ID - ' + propsid + ')</p></div></a>' +
                                            ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2" >' +
                                            '<div class="row">' +
                                            '<div class="col-md-6 property_main_div_2_inner_1">' +
                                            '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/'; ?>' + ((this.featured_image == null) ? 'not.jpg' : imaged) + '" class="img-responsive"></div>' +
                                            '</div>' +
                                            '<div class="col-md-6 property_main_div_2_inner_2">' +
                                            '<p style="color: #ffeb3b;"><b>Locality :</b> ' + this.locality + '</p>' +
                                            '<p style="color: #ffba00;"><b>Highlights:</b>  On Rent / ' + this.age_of_property + ' Years Old' + ((this.furnished_status == '') ? '' : '/ ' + this.furnished_status) + ((this.property_on_floor == null) ? '' : ' / ' + this.property_on_floor + 'th Floor') + ((this.total_floors == null) ? '' : '(out of ' + this.total_floors + ')') + '</p>' +
                                            '<p><b>Description:</b> ' + html + '</p>' +
                                            '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_2_inner_p">' +
                                            '<ul class="list_li">' +
                                            '<li><p>₹  ' + this.asking_rental_price + ' </p></li>' +
                                            '<li><i class="fa fa-building" aria-hidden="true"></i>  ' + ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) + ' sqft</li>' +
                                            // '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                            // '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                            '<li><i class="fa fa-users" aria-hidden="true"></i> ' + this.county1 + '</li>' +
                                            '</ul>' +
                                            '</div>' +
                                            '<div class="col-md-12 property_main_div_3">' +
                                            '<div class="col-md-5 text-center property_main_div_3_inner1">' +
                                            ((this.request_for == 'Instant') ?
                                                    '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr">' +
                                                    'Instant Approach</a>'
                                                    :
                                                    ((this.request_for == 'bid') ?
                                                            '<a href="javascript:void(0)" onclick="bititnow(' + this.id + ')">' +
                                                            'Bid it Now</a>'
                                                            : ''
                                                            )) +
                                            '</div>' +
                                            '<div class="col-md-3 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>' +
                                            '</div>' +
                                            '<div class="col-md-4 text-center property_main_div_3_inner1">' +
                                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id)">' +
                                            (this.county > 0 ? 'Site Visited' : 'Book Site Visit') +
                                            '</a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>');

                                });

                                showPages(1);
                                var i;
                                var display = 3;
                                var totals = Math.ceil(countprop / 2);
                                var pagesd = Math.ceil(totals / display);

                                var dynamic = "";
                                for (i = 1; i < totals; i++) {

                                    dynamic += '<li style="display:none;"><a  href="javascript:void(0)">' + i + '</a></li>';


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

                                    } else {

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

                } else {

                    toastr.warning('Please Enter Locality or Draw Precise Shape on Map', 'warning');

                }


            }
        } else {

            toastr.warning('Please Fill Your Expectation for this search', 'warning');

        }




    }


     var circle;
      var bermudaTriangle;

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

        getpolyshapes = selectedShape.type;
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
        curseldiv.innerHTML = "<b>cursel</b>: " + selectedShape.type + " " + selectedShape + "; <i>pos</i>: " + posstr + " ; <i>path</i>: " + pathstr + " ; <i>bounds</i>: " + bndstr + " ; <i>Cb</i>: " + cntstr + " ; <i>radius</i>: " + radstr + " ; <i>Cr</i>: " + cntrstr;


    }


    function setSelection(shape, isNotMarker) {

        $('#shapedel').text('');
        //$('#shapedel').text(shape.type);
        if (shape.type == 'circle') {

            $('#shapedel').text('Circle');
        } else if (shape.type == 'polygon') {

            $('#shapedel').text('Polygon');
        } else if (shape.type == 'polyline') {

            $('#shapedel').text('Polyline');
        } else {

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
        google.maps.event.addDomListener(button, 'click', function () {
            selectColor(color);
            setSelectedShapeColor(color);
        });

        return button;
    }

    function buildColorPalette() {
        counter = 0;

        var colorPalette = document.getElementById('color-palette');
        $("#color-palette").html('');
        if (counter <= 0) {
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

    function deletePlacesSearchResults() {
        for (var i = 0, marker; marker = placeMarkers[i]; i++) {
            marker.setMap(null);
        }
        placeMarkers = [];
        input.value = ''; // clear the box too
    }



    /////////////////////////////////////
    function initialize() {

        $('#delete-button').removeClass("inactiveLink");
       $('#delete-button').addClass("activeLink");

        //$('.gmnoprint').children().eq(0).addClass("hideme");
        map = new google.maps.Map(document.getElementById('map_canvas'), {//var
            zoom: 15, //10,
            center: new google.maps.LatLng(28.4595, 77.0266), //(22.344, 114.048),
            mapTypeId: google.maps.MapTypeId.ROADMAP

        });
        curposdiv = document.getElementById('curpos');
        curseldiv = document.getElementById('cursel');

        type  = $('#type').val();
       

       function newLocation(latitudes,longitudes)
       {
       //alert(latitude);
           map.setCenter({
               lat : latitudes,
               lng : longitudes
           });
       }





        <?php 
  if(isset($getlocality)){
      ?>  
   newLocation(latitude , longitude);   
 var geometry  = <?php echo $geometry; ?>;

if(type == 'polygon'){
    $('#shapedel').text('Polygon');
   // alert(typeof geometry);
   // alert(geometry);
        var triangleCoords = geometry;


          bermudaTriangle = new google.maps.Polygon({
      paths: triangleCoords,
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      editable: true
     // draggable: true,
          });

      bermudaTriangle.setMap(map);
      google.maps.event.addListener(bermudaTriangle.getPath(), "set_at", getPolygonCoords);

} if(type == 'circle'){
    $('#shapedel').text('Circle');
    var radiuss  = $('#radiuss').val();
    var radius =  parseInt(radiuss);
    var newcircleCoord = geometry.split(","); 
    var townCenter = new google.maps.LatLng(newcircleCoord[0],newcircleCoord[1]);

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

     circle = new google.maps.Circle(circleOptions);
     if (typeof circle.getCenter == 'function') {
         
          centercoordinates = circle.getCenter().toUrlValue();
           latt = circle.getCenter().lat();
           longg = circle.getCenter().lng();
        }
        if (typeof circle.getRadius == 'function') {
            totalradius = circle.getRadius();
        }

        google.maps.event.addListener(circle, 'radius_changed', function () {    
     // circle.setMap(null);
                 totalradius = circle.getRadius();
                 latt = circle.getCenter().lat();
                 longg = circle.getCenter().lng();
    });
}

if(type == 'rectangle'){
    $('#shapedel').text('Rectangle');
       rectangle = new google.maps.Rectangle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      editable: true,
      //draggable: true,
      map: map,
      bounds: geometry
    });

    rectangle.setMap(map);
    rectangle.addListener('bounds_changed', showNewRect);

    function showNewRect(event) {
      var ne = rectangle.getBounds().getNorthEast();
      var sw = rectangle.getBounds().getSouthWest();

          northlat = ne.lat();
         
          northlng = ne.lng();
          southlat = sw.lat();
          southlng = sw.lng();
    }

}

<?php 

}  ?>

function getPolygonCoords() {
      var len = bermudaTriangle.getPath().getLength();
      var htmlStr = "";
      
       // htmlStr += "new google.maps.LatLng(" + bermudaTriangle.getPath().getAt(i).toUrlValue(5) + "), ";
        //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
        //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
        if (typeof bermudaTriangle.getPath == 'function') {
          pathstr = "[ ";
          for (var i = 0; i < bermudaTriangle.getPath().getLength(); i++) {
              
              var newstring = bermudaTriangle.getPath().getAt(i).toUrlValue(6);
             
              // console.log(newstring);
              var newarray = newstring.split(',');
              polyArray.push(bermudaTriangle.getPath());
               
               // .toUrlValue(5) limits number of decimals, default is 6 but can do more
               pathstr += '{ "lat" : '+bermudaTriangle.getPath().getAt(i).lat() + ', "lng" : '+ bermudaTriangle.getPath().getAt(i).lng() + "}"+" , ";
          }
          pathstr += "]";
          pathstr.trim();           
            var commanum = pathstr.lastIndexOf(",");
           var  part1 = pathstr.substring(0, commanum);
            var part2 = pathstr.substring(commanum + 1, pathstr.length);
            
            pathstr = part1 + part2;
        }

      
      //document.getElementById('info').innerHTML = htmlStr;
    }


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
        
       // drawingManager.setMap(null);

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
        
      
        
      }
      
                         function init() {

                                 var minZoomLevel = 12;
                                 var mapf = new google.maps.Map(document.getElementById('map-canvasd'), {
                                     center: {
                                         lat: 28.4595,
                                         lng: 77.0266
                                     },
                                              zoom: 10,
                                              mapTypeId: 'satellite'
                                 });
                                 google.maps.event.addListener(mapf, 'zoom_changed', function () {
                                     if (mapf.getZoom() > minZoomLevel)
                                         mapf.setZoom(minZoomLevel);
                                 });
                             }
       google.maps.event.addDomListener(window, 'load', init);
      
      
      google.maps.event.addDomListener(window, 'load', initialize);






    var showChar = 100;
    var ellipsestext = "...";
    var moretext = "Show more";
    var lesstext = "Show less";


    pageSize = 6;
    page = 1;

    showPage = function (page) {
        $(".chirag").hide();
        $(".chirag").each(function (n) {
            if (n >= pageSize * (page - 1) && n < pageSize * page)
                $(this).show();
        });
    }

    $(document).ready(function () {


        var food = getParameterByName('id');


        if (food == null) {
            $('#search-pro').css("display", "none");
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
                                ((this.requestfor == 'Instant') ?
                                        '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                        '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
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

        var radlat1 = Math.PI * lat1 / 180
        var radlat2 = Math.PI * lat2 / 180
        var radlon1 = Math.PI * lon1 / 180
        var radlon2 = Math.PI * lon2 / 180
        var theta = lon1 - lon2
        var radtheta = Math.PI * theta / 180
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist)
        dist = dist * 180 / Math.PI
        dist = dist * 60 * 1.1515

        return dist
    }


    function bindButtonClick(obj) {



        $('#sortby').change(function () {
            var ferit = 0;
            var sortvar = $('#sortby').val();
            var searchlat = $('#searchlat').val();
            var searchlng = $('#searchlng').val();
            // alert(JSON.stringify(obj));

            if (sortvar != '') {

                if (sortvar == 'low') {

                    obj.sort(function (a, b) {
                        return a.asking_rental_price - b.asking_rental_price;
                    });

                } else if (sortvar == 'high') {

                    obj.sort(function (a, b) {
                        return b.asking_rental_price - a.asking_rental_price;
                    });

                }


                else if (sortvar == 'nearest') {
                    ferit = 1;

                    for (i = 0; i < obj.length; i++) {
                        obj[i]["distance"] = calculateDistance(searchlat, searchlng, obj[i]["latitude"], obj[i]["longitude"]);
                    }

                    obj.sort(function (a, b) {
                        return a.distance - b.distance;
                    });

                }

                var countprop = Object.keys(obj).length;

                $('#getprop').html('');

                $.each(obj, function () {

                    var content = 'A very good ' + this.typename + ' availabale for rent/lease in ' + this.city + ' with Plot area ' + this.total_plot_area + ' sqft, Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                    var imaged = $.trim(this.featured_image);
                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar - 1, content.length - showChar);
                    var html = '<span onclick="propdetails(' + this.id + ')">' + c + '<span class="moreellipses" style="display:inline">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_' + this.id + '" class="morelinks ">' + moretext + '</a></span>';
                    var haritid = 273 * 179 - this.id;
                    var propsid = 'PR' + haritid;
                    var mathceildist = Math.ceil(this.distance);

                    $('#getprop').append('<div class="col-md-6 serch_row chirag" style="">' +
                            '<div class="col-md-12 property_main_div">' +
                            '<div class="col-md-12 property_main_div_1" style="height:60px">' +
                            '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' + this.typename + ' availabale for sale in ' + this.city + '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ID - ' + propsid + ')</p></div></a>' +
                            ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                            '</div>' +
                            '<div class="col-md-12 property_main_div_2" >' +
                            '<div class="row">' +
                            '<div class="col-md-6 property_main_div_2_inner_1">' +
                            '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/'; ?>' + ((this.featured_image == null) ? 'not.jpg' : imaged) + '" class="img-responsive"></div>' +
                            '</div>' +
                            '<div class="col-md-6 property_main_div_2_inner_2">' +
                            '<p style="color: #ffeb3b;"><b>Locality :</b> ' + this.locality + '</p>' +
                            '<p style="color: #ffba00;"><b>Highlights:</b>  On Rent / ' + this.age_of_property + ' Years Old' + ((this.furnished_status == '') ? '' : '/ ' + this.furnished_status) + ((this.property_on_floor == null) ? '' : ' / ' + this.property_on_floor + 'th Floor') + ((this.total_floors == null) ? '' : '(out of ' + this.total_floors + ')') + '</p>' +
                            '<p><b>Description:</b> ' + html + '</p>' +
                            '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>' + this.id + '" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-12 property_main_div_2_inner_p">' +
                            '<ul class="list_li">' +
                            '<li><p>₹  ' + this.asking_rental_price + ' </p></li>' +
                            '<li><i class="fa fa-building" aria-hidden="true"></i>  ' + ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) + ' sqft</li>' +
                            ((ferit == 1 ? '<li><i class="fa fa-map-marker" aria-hidden="true"></i> ' + mathceildist + ' km </li>' : '')) +
                            // '<li><i class="fa fa-map-marker" aria-hidden="true"></i> '+ mathceildist +' km </li>'+
                            // '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                            '<li><i class="fa fa-users" aria-hidden="true"></i> ' + this.county1 + '</li>' +
                            '</ul>' +
                            '</div>' +
                            '<div class="col-md-12 property_main_div_3">' +
                            '<div class="col-md-5 text-center property_main_div_3_inner1">' +
                            ((this.request_for == 'Instant') ?
                                    '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr">' +
                                    'Instant Approach</a>'
                                    :
                                    ((this.request_for == 'bid') ?
                                            '<a href="javascript:void(0)" onclick="bititnow(' + this.id + ')">' +
                                            'Bid it Now</a>'
                                            : ''
                                            )) +
                            '</div>' +
                            '<div class="col-md-3 text-center property_main_div_3_inner1">' +
                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)"><i style="padding-right: 5px;"class="fa fa-thumbs-o-up" aria-hidden="true"></i>Shortlist</a>' +
                            '</div>' +
                            '<div class="col-md-4 text-center property_main_div_3_inner1">' +
                            '<a href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id)">' +
                            (this.county > 0 ? 'Site Visited' : 'Book Site Visit') +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>');


                });

                showPage(1);
                var i;
                var totals = Math.ceil(countprop / 6);

                var dynamic = "";
                for (i = 1; i <= totals; i++) {

                    dynamic += '<li><a href="javascript:void(0)">' + i + '</a></li>';

                }


                $('#paginater').html('');
                $('#paginater').html('<ol id="pagin" class="paginclass">' + dynamic + '</ol>');
                $("#pagin li a").first().addClass("current");
                $("#pagin li a").click(function () {

                    $("#pagin li a").removeClass("current");
                    $(this).addClass("current");

                    showPage(parseInt($(this).text()))
                });


            }

        });
    }







    function getsorting(val) {

        if (val != 'nosort') {
            $('#getprop').html('');

            $.ajax({
                url: 'getsorting',
                data: {val: val},
                success: function (data) {

                    // alert(data);
                    var obj = $.parseJSON(data);

                    $.each(obj, function () {

                        var imaged = $.trim(this.featured_image);

                        $('#getprop').append('<div class="row">' +
                                ' <div class="col-md-12 borderproperty">' +
                                ' <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/view?id=']) ?>' + this.id + '" target="_blank" ><div class="col-md-3">' +
                                ' <div class="proimage">' +
                                ' <img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/'; ?>' + imaged + '" alt="..."  title="....">' +
//                                                                    ' <img src="<?= $_SERVER['DOCUMENT_ROOT'] . '/newbells/archive/web/propertydefaultimg/' ?>'+imaged+'" alt="..."  title="....">' +
                                ' </div>' +
                                '</div></a>' +
                                ' <div class="col-md-7">' +
                                '<div class="deatil">' +
                                '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.asking_rental_price + ' </span>' + this.city + '</h1>' +
                                ' <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Locality : ' + this.locality + '</p>' +
                                ' <p class="highlight">Highlights: On Rent / ' + this.age_of_property + ' Years Old / ' + this.furnished_status + ' / ' + this.property_on_floor + ' Floor (out of ' + this.total_floors + ')</p>' +
                                '<p><b>Description:</b> ' + this.propertydescr + '......</p>' +
                                '<p class="aminities">' +
                                '<ul class="list_li">' +
                                '<li><i class="fa fa-building" aria-hidden="true"></i> ' + this.total_plot_area + ' sqft</li>' +
                                '<li><i class="fa fa-bed" aria-hidden="true"></i> ' + this.bedrooms + '</li>' +
                                ' <li><i class="fa fa-bath" aria-hidden="true"></i> ' + this.bathrooms + '</li>' +
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
                                        '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
                                        :
                                        ((this.request_for == 'bid') ?
                                                '<button class="btn btn-default  btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                : ''
                                                )) +
                                '<button class="btn btn-success btnsecond" id="' + this.id + '" onclick="getfreevisit(this.id)" type="button">Book Site Visit</button>' +
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
            url: 'getfreevisit',
            data: {hardam: id},
            success: function (data) {


                if (data == '1') {


                    toastr.success('Request for Site Visit has Successfully placed', 'success');
                } else if (data == '2') {

                    toastr.success('Request for Site Visit has Successfully placed', 'success');
                    toastr.warning('Your Free Site Visit Has Already Finished, Please Carry 100 Rs Along with you', 'warning');

                }
                else if (data == '5') {

                    toastr.warning('Already Visited For this Site', 'warning');

                } else {
                    toastr.error('Internal Error', 'error');
                }
            },
        });

    }


    function getchecki(id) {



        var expectation_id = $('#expectid').val();
        $.ajax({
            type: "POST",
            url: 'saveprop',
            data: {hardam: id, expectation_id: expectation_id},
            success: function (data) {

                if (data == '1') {

                    toastr.error('This Property is Already Shortlisted', 'error');
                } else {
                    toastr.success('Property Shortlisted Successfully', 'success');
                }
            },
        });

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
                //alert(data);
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
                            ((this.requestfor == 'Instant') ?
                                    '<button class="btn btn-default pull-right btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
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

    function viewproperty(id) {

        if (id != '') {

            $.ajax({
                type: "POST",
                url: 'viewproperty',
                data: {id: id},
                success: function (data) {
                     

                },
            });

        }

    }



    function viewproperty1(id) {

        if (id != '') {

            $.ajax({
                type: "POST",
                url: 'viewproperty',
                data: {id: id},
                success: function (data) {
                    

                },
            });

        }

    }


    function getexpecprop(id) {
        $('#getprop').html('');

        $.ajax({
            url: 'myexpectations',
            data: {id: id},
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
                            ((this.requestfor == 'Instant') ?
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


    function getmoredata(id) {


        if ($('#' + id).hasClass("less")) {


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

    function propdetails(id) {

        window.open('https://www.15bells.com/frontend/web/addproperty/viewsearch?id=' + id, '_blank');

    }


    function contactus(id) {

        $('#property_gy1').val('');
        $('#property_gy').val(id);
        $('#draggable2').modal('show');


    }

    function savemessage() {

        var propid = $('#property_gy').val();
        var textarew = $.trim($('#property_gy1').val());
        if (textarew != '') {
            $('#draggable2').modal('hide');
            $.ajax({
                
                url: 'savemessages',
                data: {propid: propid, textarew: textarew},
                success: function (data) {
                    //alert(data);   
                    if (data == '1') {
                        toastr.success('Your Message has Successfully sent', 'success');
                    } else {
                        toastr.error('Server Error', 'error');
                    }
                },
            });

        } else {
            toastr.error('Please Enter Something', 'error');

        }

    }




    $(document).ready(function () {

$("#modalButton").click(function(){
			$("#modal").modal('show');
			$("#modal").css({"opacity": "1","background": "rgba(0, 0, 0, 0.57)"});
		});


        var tour = new Tour({
            steps: window.steps,
            storage: false,
            backdrop: true,
            steps: [
                {
                    element: "#firststep",
                    title: "Step 1",
                    content: "Enter your area"
                },
                {
                    element: "#map_canvas",
                    title: "Step 2",
                    content: "Demarcate your locality",
                    placement: "top"
                },
                {
                    element: "#modalButton",
                    title: "Step 3",
                    content: "Fill your requirements",
                    placement: "left"

                },
                {
                    element: "#serch_stp",
                    title: "Step 4",
                    content: "Click here to view the listings",
                    placement: "left"
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

