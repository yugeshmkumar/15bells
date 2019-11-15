
<?php


use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\Modal;

use common\models\MyExpectationsajaxSearch;


$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
//echo Yii::getAlias('@archive', realpath(dirname(__FILE__).'/../../'));die;
// http://jsfiddle.net/VAKrE/105/
?>
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
                                       
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&sensor=false&libraries=geometry,drawing,places"></script>
<style type="text/css" media="print">
    .gmnoprint { display:inline }
</style>
<style>

    .dash_background {
   
    background-attachment: fixed;

       }
   
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
     #map_canvas {
        height: 430px;
    }
    #map_canvasd {
        height: 600px;
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
    #map-canvas {
        height: 600px;
        margin: 0px;
        padding: 0px;
    }
     #map-canvasd {
        height: 340px;
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
        padding: 10px 8px 10px 0px !important;
    }

    .padMAP{
        padding: 0px 0px 0px 0px;
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
      .page-sidebar-closed .page-content-wrapper .page-content {
            margin-left: 45px!important;
            padding: 0px;
    }
    .inactiveLink {
   pointer-events: none;
   cursor: default;
}
/*    .gmnoprint > div:first-child{
        display:none;
    }*/
#nyadiv{
    left:105px !important;
    top: -44px !important;
    background:#000000 !important;
    color:#ffffff;
    font-size:14px;
    letter-spacing: 1px;
}
.btncart .btnfirst {
  
    margin-top: -18px !important;
}

#searchtab .btncart .btn {
   
     margin-left: 0px;
    // margin: -9px;
}
#searchtab .btncart .btnsecond {
    padding: 6px 10px 5px 10px;
}

.formpad{
    padding: 0 10px;
}
.modal {
    top: 8%;
}
.modal-body textarea{
    font-weight: 0px;
    height: 90px;    
    width: 158%;
   
}

#howit .vedio a:focus, a:hover, a:active, a:visited {
    color: #337ab7;
    
}

 #searchtab .deatil p .morecontent{
    
    color: #828282 !important;
    font-weight: 400 !important;
    font-size: 13px !important;
   
}

.ajamore{
    
   font-size: 13px !important;
    color: #fffff !important;
    font-weight: 400 !important;
    font-family: 'Roboto', sans-serif;
    
}
input[type=checkbox]{
       width: 30px !important;
    height: 16px !important;
	position:relative;
	top:3px;
}

#delete-button{
        border: 0;
        padding: 11px 0px;
        background: #145d86;
        color: white;
        outline: 0px;
      }
 /* satender */
    .search_map_row{
        margin-top: 10px;
        margin-bottom: 20px;
        border: 15px solid #c2c9ce;
        border-radius: 8px !important;
        }
    .row_upper_search{
        background-color: #145d86; 
        padding: 0px;
        margin-top: 11px !important;
        border-radius: 8px !important;
    }
    #color-palette{
        z-index: 9;
        padding: 10px 5px 10px 10px;
        background-color: #fff;
        width: 120px;
        position: absolute;
        top: 46px;
        right: 20px;
        border-radius: 5px !important;
    }
    #color_main_div{
        border: 0;
        padding: 11px 0px;
        background: #145d86;
        color: white;
    }
    .expectation_div_button{
        border: 0;
        padding: 11px 0px;
        background: #145d86;
        color: white;
    }
    .expectation_div_button:hover{
        border: 0px;
        background-color: #145d86;
    }
    .expectation_div_button:active{
        background-color: #145d86 !important;
    }
    .expectation_div_button:visited{
        background-color: #145d86 !important;
    }
    .expectation_div_button:focus{
        background-color: #145d86 !important;
    }
    .search_prop_button_lessee{
        border: 0;
        background: #145d86;
        color: white;
        padding: 11px 0px 10px 0px;
    }
    .search_prop_button_lessee .search1{
        font-size: 28px;
    }
    .search_prop_button_lessee:hover{
        border: 0px;
        background-color: #145d86;
    }
    .search_prop_button_lessee:active{
        background-color: #145d86 !important;
    }
    .search_prop_button_lessee:visited{
        background-color: #145d86 !important;
    }
    .search_prop_button_lessee:focus{
        background-color: #145d86 !important;
    }
    .drop_down_menu{
        margin-bottom:  -20px;
    }
    .search_delet_btn_div{
        border-right: 1px solid #fff;

    }
    .change_color_delet_btn_div{
        border-right: 1px solid #fff;
    }
    .expectation_delet_btn_div{
        border-right: 1px solid #fff;
    }
    .row_another_search{
}
.another_search_p p{
    font-size: 26px;
    padding: 3px 0 0 0;
    font-weight: 600;
    color: #fff;
    margin: 0px;
}
.another_search_detail{
    background-color: #f5f5f5; 
    border-radius: 5px !important;
}
.another_search_detail_fisrt_div{
    padding-top: 6px;
}
.another_search_detail_fisrt_div input{
    width: 100%; 
    padding: 4px;
}
.another_search_detail_2_div{
    border-left: 1px solid #ccc;
}
.another_search_detail_2_div button{
    border: 0px;
    background-color: #f5f5f5;
    color: #898989;
    font-size: 14px;
    padding: 12px 0px;
    font-weight: 600;
    outline: 0px;   
}

.another_search_detail_3_div button{
    border: 1px solid #dedede;
    background-color: #ffffff;
    color: #898989;
    font-size: 14px;
    padding: 7px 12px;
    /* font-weight: 600; */
    outline: 0px;
    box-shadow: none !important;
}
.another_search_detail_4_div{
    padding:0px;
}
.another_search_detail_4_div button{
    border: 0px;
    background-color: #00aeef;
    color: #fff;
    font-size: 14px;
    padding: 7px 15px 7px 15px;
}
.price_range_details{
    padding: 10px;
    width: 230px;
    position: absolute;
    background-color: #f5f5f5;
    z-index: 9;
    outline: 0px;
    left: 0;
}
.area_range_details{
    display: none;
    padding: 10px;
    width: 230px;
    position: absolute;
    background-color: #f5f5f5;
    z-index: 9;
    outline: 0px;
    left: 0;
}
.residental_dropdown_detail{
    display: none;
    padding: 10px;
    width: 198px;
    position: absolute;
    background-color: #f5f5f5;
    z-index: 9;
    outline: 0px;
    left: 0;
}
.sortby{
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    padding: 10px 0;
    margin-top: 10px;
}
.buyit .fa{
    font-size: 40px;
    border-right: 2px solid #fff;
    padding: 10px 10px 10px 0;
    color: #fff;
}
#sortby{
    background-color: #ffffff;
    color: #000000;
}
.property_display_row{
    padding-top: 20px;
    padding-bottom:40px;
}
.property_main_div{
    border: 0px solid #fff;
    padding: 0;
}
.property_main_div_1{
    border: 1px solid #fff;
    padding: 0; 
    background-color: #ac8e18;
}
.property_main_div_1 p{
    padding: 10px 0px 8px 10px;
    font-size: 14px;
    color: #fff;
    margin: 0;
    text-align: left;
}
.property_main_div_1 .fa{
    padding: 10px 20px 0 20px;  
    font-size: 30px; 
    color: #fff;
}
.property_main_div_2{
    padding: 0; 
    border: 1px solid #fff;
    width: 100%;
    float: left;
    background-color: rgba(255, 255, 255, 0.25);
}

.property_main_div_2_inner_1 img{
        padding: 10px 10px 10px 10px;
    height: 240px;
}
.property_main_div_2_inner_p p{
    color: #fff;
    margin: 0px;
}
.property_main_div_2_inner_p ul{
        text-align: center;
}
.property_main_div_2_inner_p ul li {
    float: left;
    list-style: none;
    font-weight: 600;
    font-size: 15px;
    font-family: 'Roboto', sans-serif;
    color: #fff;
    padding: 0 20px 0 0;
}
.property_main_div_2_inner_p {
    padding: 5px 0 5px 0;
    border: 1px solid #fff;
    width: 100%;
    float:left;
}
.property_main_div_2_inner_2{
    padding: 0;
}
.property_main_div_2_inner_2 p{
    margin:10px 0;
    text-align: justify;
    color: #fff;
    padding: 0px 30px 0 0;
    font-size: 12px;
}
.property_main_div_2_inner_2 p a{
    color: #fb2f2f;
    font-weight: 600;
}
.property_main_div_2_inner_2 .btn{
    border: 0px;
    color: #ffba00; 
    padding: 0px;
    background-color: transparent;
    float: left;
}
.property_main_div_3{
    border: 0px solid #fff;
    padding: 0;
    width: 100%;
    float: left;
}
.property_main_div_3_inner1{
    border: 1px solid #fff;
    padding: 0;
}
.property_main_div_3_inner1 a{
    font-size: 16px; 
    font-weight: 600; 
    text-decoration: none;
    color: #fff;
}
.property_main_div_3_inner1:hover{
    background-color: #ac8e18;
}
.property_main_div_3_inner1:hover .fa{
    color: #fff;
}
.img_prop{
    width: 220px;
    height: 240px;
}

.box {
    background: black !important;
}
















@media(max-width:1200px) {
    .another_search_detail_4_div button {
        margin-top: 6px;
        padding: 10px 9px 10px 8px;
    }
    .expectation_delet_btn_div {
        padding: 0 0px 0 5px;
    }
    .property_main_div_3_inner1 a {
        font-size: 14px;
    }
    .property_main_div_1 p{
        font-size: 14px;
    }    
}





@media(max-width:991px) {
    .property_main_div_1 {
        width: 100%;
        float: left; 
     }
     .property_main_div_2_inner_1 img {
        padding: 10px;
        width: 100%;
    }
      .property_main_div_2_inner_2 {
        padding: 0px 0px 0px 30px;
    }  
}
.serch_row{padding-top: 0px;height:410px;margin-top:63px;margin-bottom: 25px;}
.area_drpdwn{
	width:400px;
	padding:10px 15px;
	top:20px;
}
.area_dtl{
	color: #776464 !important;
    background-color: #ffffff !important;
    border-color: #dedede !important;
	width:100%;
	border-radius:5px !important;
}
.btn-group>.dropdown-menu:before, .dropdown-toggle>.dropdown-menu:before, .dropdown>.dropdown-menu:before{
	display:none !important;
}
.another_search_detail{
	padding-top:10px;
	margin:0;
}
.input_lct{
    border-radius: 5px !important;
    border: 1px solid #ccc !important;
}
#price-min li{
	    color: #7a7b7b;
}
#price-min li:hover{
	 background: #eaeaea;
	 cursor:pointer;
}
#price-min li span{
	    padding-right:4px;
}
#price-min{
	padding-top: 7px;
    height: 130px;
    overflow-y: scroll;
}
#area-min li{
	    color: #7a7b7b;
}
#area-min li:hover{
	 background: #eaeaea;
	 cursor:pointer;
}
#area-min li span{
	    padding-right:4px;
}
#area-min{
	padding-top: 7px;
    height: 130px;
    overflow-y: scroll;
}
#price-max li{
	    color: #7a7b7b;
}
#price-max li:hover{
	 background: #eaeaea;
	 cursor:pointer;
}
#price-max li span{
	    padding-right:4px;
}
#price-max{
	       padding-top: 7px;
    height: 130px;
    overflow-y: scroll;
}
#area-max li{
	    color: #7a7b7b;
}
#area-max li:hover{
	 background: #eaeaea;
	 cursor:pointer;
}
#area-max li span{
	    padding-right:4px;
}
#area-max{
	       padding-top: 7px;
    height: 130px;
    overflow-y: scroll;
}
.price_drpdwn{
	    background: transparent;
    box-shadow: none !important;
    border: none !important;
}
.reslt_descrp{
	font-size:26px;
	color:#ffffff;
}
.serch_rslt{
	background:rgba(255,255,255,0.20);
	position:relative;
}
		.reslt_close {
    font-size: 25px!important;
    position: absolute;
    right: 4px;
    top: 4px;
    color: rgba(255, 255, 255, 0.91);
}
</style>

     <section class="big_map col-md-9 col-sm-8" style="width:100% !important">
       
    <div class="container-fluid">
        
         
                         <div class="row row_upper_search">
                              <!--<div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
						if($checkrole->item_name == "Company_user") {  ?> 
						 <a href="<?php echo Yii::$app->urlManager->createUrl(['site/couserdash']) ?>">Home</a><?php } else { ?>
    <a href="<?php echo Yii::$app->urlManager->createUrl(['site/userdash']) ?>">Home</a>
						<?php } ?>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>User</span>
								<i class="fa fa-circle"></i>
                            </li>
							 <li>
                                <span>SEARCH</span>
                            </li>
                        </ul>
                        
                    </div>-->
                    <!-- END PAGE BAR -->
            <div id="firststep" class="col-md-4 col-sm-4 animated bounce" style="padding-top: 5px;">
                                    <!--<i class="fa fa-map-marker" aria-hidden="true"></i>-->
                                    <input type="text" id="pac-input" class="form-control" placeholder="Enter Location or Society">
                                    <input type="hidden" id="town">
                                    <input type="hidden" id="sector">
                                </div>
                                  <div class="col-md-2 col-sm-2 text-center search_delet_btn_div">
                                      <button class="inactiveLink" id="delete-button">Delete <span id="shapedel">Shape </span></button>
                                  </div>

                                <div  class="col-md-2 col-sm-2 text-center change_color_delet_btn_div">
                                      <button class="btn btn-default dropdown-toggle" type="button" id="color_main_div">Change Color &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                      <ul class="drop_down_menu" style="display: none;">
                                        <li>
                                            <div id="color-palette"></div>                                    
                                            <div id="curpos" style="display:none;"></div>
                                            <div id="cursel" style="display:none;"></div>
                                        </li>
                                      </ul>
                                                                    
                                </div>
                                <div class="col-md-2 text-cente expectation_delet_btn_div">
                                    <?= Html::button('Create Expectations',['value'=>Url::to('http://staging.15bells.com/backend/web/index.php/sellor-expectations/creates'),'class'=>'btn btn-success expectation_div_button','id'=>'modalButton']) ?>
                                      <!--<button onclick = "changeAccept()" class="activeLink" id="addexpectations">Add Expectations</button>-->
                                <input type="hidden" id="expectid">  
                                </div>

                                <div class="col-md-2 search_search_btn_div animated bounce" id="serch_stp"> 
                                    <!--<button type="button" value="Geocode" onclick="getmapproperty();" class="btn btn-primary animated bounce">-->
                                    <button type="button" id="searches" value="Geocode" onclick="getpolymy();" class="btn btn-primary search_prop_button_lessee animated bounce">
                                        <span>Search</span> &nbsp;&nbsp;<i class="fa fa-search search1" aria-hidden="true"></i>
                                    </button>
                                </div>
                                
                          
            </div>
        
        <?php   
                Modal::begin([
                    
                    'header'=>'<h3>Add Expectations</h3>',
                    'id'=>'modal',
                    'size'=>'modal-lg',          

                ]);

                echo '<div id="modalContent"></div>';

                Modal::end();
        
        ?>
        
        <div class="row search_map_row">
            <div class="col-md-12 col-sm-12" style="padding:0;">
                <div id="map_canvas" ></div>
                <div id="info"></div>
            </div>
        </div>
    </div>
</section>



<section id="search-pro" class="col-md-12 col-sm-12">
    <div class="container">
    <div class="row row_another_search">
    <div class="col-md-3 col-sm-3" style="padding:0;">
<!--<input id="pac-input" type="text" placeholder="Search Box">-->
                <div id="map-canvasd" ></div>
                <div id="info"></div>
            </div>
            <div class="col-md-9 col-sm-9">
            
          <div class="row another_search_detail">
<!--				<div class="col-md-3 ">
                        <input type="text" id="pac-input1" name="" class="input_lct" id="" placeholder="Location" style="padding:5px;">
                </div>-->
				<div class="col-md-3">
                        <div class="form-group">
						  <select class="form-control input_lct" id="proptype">
							
							<?php
                                    $query = new Query;
                                    $query->select(['typename','id'])
                                            ->from('property_type')
                                            ->where(['undercategory' => 'Commercial']);
                                    $command = $query->createCommand();
                                    $data = $command->queryAll();

                                    echo '<option>Commercial</option>';
                                    foreach ($data as $key => $datas) {



                                        echo "<option value=". $datas['id'] .">" . $datas['typename'] . "</option>";
                                    }
                                    ?>           
						  </select>
						</div>
                </div>
				<div class="col-md-3">
					 <div class="dropdown">
						<button class="btn btn-primary dropdown-toggle area_dtl" type="button" data-toggle="dropdown">Area
						<span class="caret"></span></button>
						<ul class="dropdown-menu area_drpdwn">
						  <div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  <select class="form-control input_lct" id="areaft">
									<option>Select</option>
									<option value="sq_feets">Sq Ft.</option>
									<option value="sq_meters">Sq Meter</option>
									<option value="sq_yards">Sq Yards</option>									
								  </select>
								</div>
							</div>
							   <div class="col-md-6 col-sm-3 text-center another_search_detail_3_div">
                            <button id="" class="area_drop_detail input_lct">Area Range <strong class="caret"></strong></button>
                            <div class="area_range_details col-sm-2">
                                <form class="row" style="margin:0;">
                                    <div class="col-xs-5">
                                        <input id="areamin" class="form-control area-label" placeholder="Min" data-dropdown-id="area-min" />
                                    </div>
                                    <div class="col-xs-2"> - </div>
                                    <div class="col-xs-5">
                                        <input id="areamax" class="form-control area-label" placeholder="Max" data-dropdown-id="area-max" />
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul id="area-min" class="col-sm-12 text-left area-range list-unstyled">
                                        <li data-value="0">0</li>
                                        <li data-value="10">10</li>
                                        <li data-value="20">20</li>
                                        <li data-value="30">30</li>
                                        <li data-value="40">40</li>
                                        <li data-value="50">50</li>
                                        <li data-value="60">60</li>
                                    </ul>
                                    <ul id="area-max" class="col-sm-12 area-range text-right list-unstyled hide">
                                        <li data-value="0">0</li>
                                        <li data-value="10">10</li>
                                        <li data-value="20">20</li>
                                        <li data-value="30">30</li>
                                        <li data-value="40">40</li>
                                        <li data-value="50">50</li>
                                        <li data-value="60">60</li>
                                    </ul>
                                </form>
                            </div>
                    </div>
						  </div>
						</ul>
					  </div>
				</div>
				 <div class="col-md-3 col-sm-3 text-center another_search_detail_3_div">
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle area_dtl" type="button" data-toggle="dropdown">Price
						<span class="caret"></span></button>
						<ul class="dropdown-menu price_drpdwn">
						  <div class="row">
								 <div class="price_range_details col-sm-2">
                                <form class="row" style="margin:0;">
                                    <div class="col-xs-5">
                                        <input class="form-control price-label" id="pricemin" placeholder="Min" data-dropdown-id="price-min" />
                                    </div>
                                    <div class="col-xs-2"> - </div>
                                    <div class="col-xs-5">
                                        <input class="form-control price-label" id="pricemax" placeholder="Max" data-dropdown-id="price-max" />
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul id="price-min" class="col-sm-12 text-left price-range list-unstyled">
                                        <li data-value="5"><i class="fa fa-inr"></i> <span>5</span> Lac</li>
                                        <li data-value="10"><i class="fa fa-inr"></i> <span>10 </span> Lac</li>
                                        <li data-value="20"><i class="fa fa-inr"></i> <span>20</span> Lac</li>
                                        <li data-value="30"><i class="fa fa-inr"></i> <span>30</span> Lac</li>
                                        <li data-value="40"><i class="fa fa-inr"></i> <span>40</span> Lac</li>
                                        <li data-value="50"><i class="fa fa-inr"></i> <span>50</span> Lac</li>
                                        <li data-value="60"><i class="fa fa-inr"></i> <span>60</span> Lac</li>
                                    </ul>
                                    <ul id="price-max" class="col-sm-12 price-range text-right list-unstyled hide">
                                        <li data-value="5"><i class="fa fa-inr"></i> <span>5</span> Lac</li>
                                        <li data-value="10"><i class="fa fa-inr"></i> <span>10</span> Lac</li>
                                        <li data-value="20"><i class="fa fa-inr"></i> <span>20</span> Lac</li>
                                        <li data-value="30"><i class="fa fa-inr"></i> <span>30</span> Lac</li>
                                        <li data-value="40"><i class="fa fa-inr"></i> <span>40</span> Lac</li>
                                        <li data-value="50"><i class="fa fa-inr"></i> <span>50</span> Lac</li>
                                        <li data-value="60"><i class="fa fa-inr"></i> <span>60</span> Lac</li>
                                    </ul>
                                </form>
                            </div>
						  </div>
						</ul>
					  </div>
                           
                           
                    </div>
				<div class="col-md-2">
					<div class="form-group">
						  <select class="form-control input_lct" id="propbid">
							<option>Select</option>
							<option value="Instant">Instant</option>
							<option value="bid">Transaction</option>							
						  </select>
						</div>
				</div>
				<div class="col-md-1 col-sm-2 text-center another_search_detail_4_div">
                        <button type="button" id="filterme">Filter</button>
                    </div>
			</div>      
                
            </div>
            <div class="col-md-9 col-sm-9">
                <div id="searchtab">
    <div class="container"  id="searchtab">
        <div class="row">




    
    <div class="sortby clearfix">
      <div class="col-md-12">
        <div class="buyit">
          <div class="col-md-9 text-left">
              <i class="fa fa-thumbs-o-up" aria-hidden="true" ></i> &nbsp; <span style="position: absolute;top: 7px;"><a href="javascript:void(0)" style="color: #fff;">Shortlist Property</a></span>
          </div>
            <div class="col-md-3">
                <select id="sortby" class="form-control pull-right">
                  <option value="nosort">Sort by</option>
                  <option value="low">Price: Low to High</option>
                  <option value="high">Price: High to Low</option>
                </select>
            </div>
        </div>
      </div>
    </div>
            
    <div class="row" style="margin:0;">
		<div class="col-md-12 serch_rslt">
		<i class="fa fa-close reslt_close"></i>
		<p class="reslt_descrp"><span id="countprop">10</span> properties found according to your search criteria.</p>
	  </div>
	</div>          
            
    <div class="row property_display_row">
        
         <div id="getprop">
             
        
             
        </div>
     
        
       
        
    </div>
    



<!--            <div id="removed" class="col-md-12">
                <div id="getprop">

                </div>
            </div>-->
           
        </div>

    </div>
</div>
            </div>
        </div>
        <div class="row">
            
       
            
            
            
            
            
            
        </div>
    </div>
</section>



<div class="modal fade" id="draggable2" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="margin-top: 0px;">
            <div class="modal-content">
                <div class="modal-header greenHeader">
                    <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Contact Us</h4>
                </div>

                <div class="modal-body" style="padding-left: 0px;">
                   
				  <form class="form-horizontal" role="form" name="contact-form" id="contact-form" method="post">   
                	<div class="form-body">   
                     <div class="container">
                     
                <div class="col-md-8">
                    <input type="hidden" id="property_gy" value="">
                    <div class="form-group formpad">
                        <label class="control-label">ENTER A MESSAGE*</label>

                                 
                                    <textarea id="property_gy1" class="form-control" ></textarea>

                    </div>                                
                </div> 
                 
                                                      
                                            
            </div>                                       
            </div>                                       
                	                  	
                  </form>
                </div>
                <div class="modal-footer" style="border-top:none !important;">
                    <!--<a href="javascript:;" data-dismiss="modal" class="btn continueBtn1">Save</a>-->
					<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="margin-left: -11.333333%">
                            <button type="button"  onclick="savemessage()" id="submessage" class="btn btn-success">Submit</button>
                		    <input type="button"  data-dismiss="modal"  value="Cancel" class="btn btn-danger"></input>
                        </div>
                    </div>
	
                </div>
            </div>
        </div>
    </div>




</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('#min-max-area-range').click(function(event) {
    setTimeout(function() {
        $('.area-label').first().focus();
    }, 0);
});
var priceLabelObj;
$('.area-label').focus(function(event) {
    priceLabelObj = $(this);
    $('.area-range').addClass('hide');
    $('#' + $(this).data('dropdownId')).removeClass('hide');
});

$(".area-range li").click(function() {
    priceLabelObj.attr('value', $(this).attr('data-value'));
    var curElmIndex = $(".area-label").index(priceLabelObj);
    var nextElm = $(".area-label").eq(curElmIndex + 1);

    if (nextElm.length) {
        $(".area-label").eq(curElmIndex + 1).focus();
    } else {
        $('#min-max-area-range').dropdown('toggle');
    }
});
</script>
<script type="text/javascript">
    $('#min-max-price-range').click(function(event) {
    setTimeout(function() {
        $('.price-label').first().focus();
    }, 0);
});
var priceLabelObj;
$('.price-label').focus(function(event) {
    priceLabelObj = $(this);
    $('.price-range').addClass('hide');
    $('#' + $(this).data('dropdownId')).removeClass('hide');
});

$(".price-range li").click(function() {
    priceLabelObj.attr('value', $(this).attr('data-value'));
    var curElmIndex = $(".price-label").index(priceLabelObj);
    var nextElm = $(".price-label").eq(curElmIndex + 1);

    if (nextElm.length) {
        $(".price-label").eq(curElmIndex + 1).focus();
    } else {
        $('#min-max-price-range').dropdown('toggle');
    }
});
</script>
<script type="text/javascript">
 $(document).ready(function(){
     $(".serch_rslt").hide();
      $(".reslt_close").click(function(){
		$(".serch_rslt").hide();
	});  
    $("#searches").click(function() {
    $('html, body').animate({
       // scrollTop: $(".row_another_search").offset().top
    //}, 2000);
	scrollTop: $(window).scrollTop() +400
}, 1000);
 });   
     
   $("#color_main_div").click(function(){
    $(".drop_down_menu").slideToggle('fast');
    });
   $(".price_drop_detail").click(function(){
    $(".price_range_details").slideToggle('fast');
    });
    $(".area_drop_detail").click(function(){
    $(".area_range_details").slideToggle('fast');
    });
   $(".residental_dropdown").click(function(){
    $(".residental_dropdown_detail").slideToggle('fast');
    });
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
      var centercord ='';
      
      
      
      
                              function getpolymy(){
                                  
                                
                                           
                                            var getexpectationID =  $('#expectid').val();
                                            
                                           var newpath = pathstr; 
                                           var getsearchlocation  = $("#pac-input").val(); 
                                           var town  = $("#town").val(); 
                                           var sector  = $("#sector").val(); 
                                           
                                           var shapes = getpolyshapes;   
                                            
                                           var ndata = '';
                                           
                                          
                                           var xcoordinates =   arrayColumn(polyArray, 0);
                                           var ycoordinates =   arrayColumn(polyArray, 1);
//                                         var maxXcoordinate =  Math.max(xcoordinates); 

                                           // console.log(xcoordinates);
                                           // console.log(ycoordinates);
                                           
                                           var minZoomLevel = 14;
                                 var map = new google.maps.Map(document.getElementById('map-canvasd'), {
                                     center: {
                                         lat: 28.4595,
                                         lng: 77.0266
                                     },
                                     zoom: 12
                                             // mapTypeId: 'satellite'
                                 });
                                            
                                         
        
                                           if(getexpectationID != ''){                                               
                                               
                                               if(getsearchlocation != '' || shapes != ''){  
                                               
                                            $('#getprop').html('');

                                            toastr.success('Your Search Criteria has Successfully Saved', 'success');
                                            
                                            if(shapes == ''){

                                       
                                               
                                          ndata = {location:getsearchlocation,area:getexpectationID,town:town,sector:sector,food:food}; 
                                          
                                           $.ajax({
                                                    url: 'withoutshape',
                                                    data: ndata,
                                                    success: function (data) {
                                                      
                                                   // alert(data);
                                                
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html(countprop);
                                                        
                                                        filterButtonClick(obj);

                                                        $.each(obj, function (index) {
                                                         
                                                        if(this.latitude != '')
                                                        {    
                                                            var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                                            var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                                            new google.maps.Marker({
                                                            position: pos,
                                                            map: map,
                                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                                            animation: google.maps.Animation.DROP

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
                                                            var content ='';
                                                            
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
                                        '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '</p></div></a>'+

                                     ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                         ((this.undercategory == 'Residential') ?
                                                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>' +
                                                                    ' <li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'  : '') +
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')">'+ 
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
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="contactus(this.id)">'+
                                          'Contact us' +
                                          '</a>'+
                                        '</div>'+
                                        '<div class="col-md-1 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)" style="padding: 5px; color: #fbb801;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>');
                                                            

                                                        });

                                                    },
                                                });
                                                  
                                                  
                                              }
                                            
                                            
                                            
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
                                           
                                                
                                                
                                          ndata = {maxi: maxi,mini : mini,maxiy :maxiy,miniy : miniy,shapes:shapes,town:town,sector:sector,newpath:newpath,area:getexpectationID,food:food}; 
                                          
                                           $.ajax({
                                                    url: 'getpolymy',
                                                    data: ndata,
                                                    success: function (data) {
                                                      
                                                    
                                                
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html(countprop);
                                                        
                                                        filterButtonClick(obj);

                                                        $.each(obj, function (index) {
                                                         
                                                        if(this.latitude != '')
                                                        {    
                                                            var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                                            var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                                            new google.maps.Marker({
                                                            position: pos,
                                                            map: map,
                                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                                            animation: google.maps.Animation.DROP

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
                                                            var content ='';
                                                            
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
                                        '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '</p></div></a>'+

                                     ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                         ((this.undercategory == 'Residential') ?
                                                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>' +
                                                                    ' <li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'  : '') +
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')">'+ 
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
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="contactus(this.id)">'+
                                          'Contact us' +
                                          '</a>'+
                                        '</div>'+
                                        '<div class="col-md-1 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)" style="padding: 5px; color: #fbb801;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
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
                                                    data: {center:centercoordinates,northeast: northeast,southwest : southwest,latcenter:latcenter,longcenter:longcenter,totalradius:totalradius,shapes:shapes,town:town,sector:sector,area:getexpectationID,food:food},
                                                    success: function (data) {
                                                
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html(countprop);
                                                        
                                                        filterButtonClick(obj);

                                                        $.each(obj, function (index) {
                                                            
                                                            if(this.latitude != '')
                                                        {    
                                                            var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                                            var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                                            new google.maps.Marker({
                                                            position: pos,
                                                            map: map,
                                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                                            animation: google.maps.Animation.DROP

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

                                                           var content ='';
                                                            
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
                                        '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '</p></div></a>'+

                                     ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                         ((this.undercategory == 'Residential') ?
                                                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>' +
                                                                    ' <li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'  : '') +
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')">'+ 
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
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="contactus(this.id)">'+
                                          'Contact us' +
                                          '</a>'+
                                        '</div>'+
                                        '<div class="col-md-1 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)" style="padding: 5px; color: #fbb801;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
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
                                              //alert(centercoordinates);
                                             $.ajax({
                                                    url: 'mapproperty2',
                                                    data: {maxim:maxim,minim:minim,maximy:maximy,minimy:minimy,newkuma:newkuma,center:centercord,shapes:shapes,town:town,sector:sector,area:getexpectationID,food:food},
                                                    success: function (data) {
                                                 
                                                        
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html(countprop);
                                                        
                                                        filterButtonClick(obj);
                                                           
                                                        $.each(obj, function (index) {
                                                            
                                                            if(this.latitude != '')
                                                        {    
                                                            var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                                            var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                                            new google.maps.Marker({
                                                            position: pos,
                                                            map: map,
                                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                                            animation: google.maps.Animation.DROP

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

                                                              var content ='';
                                                            
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
                                        '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '</p></div></a>'+

                                     ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                         ((this.undercategory == 'Residential') ?
                                                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>' +
                                                                    ' <li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'  : '') +
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')">'+ 
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
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="contactus(this.id)">'+
                                          'Contact us' +
                                          '</a>'+
                                        '</div>'+
                                        '<div class="col-md-1 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)" style="padding: 5px; color: #fbb801;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
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
                                            
                                                
                                                
                                               ndata = {maxi: maxi,mini : mini,maxiy :maxiy,miniy : miniy,shapes:shapes,town:town,sector:sector,newpath:newpath,area:getexpectationID,food:food}; 
                                            
                                            
                                             $.ajax({
                                                    url: 'getpolymy',
                                                    data: ndata,
                                                    success: function (data) {
                                                   
                                                      
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html(countprop);
                                                        
                                                        filterButtonClick(obj);

                                                        $.each(obj, function (index) {
                                                            if(this.latitude != '')
                                                        {    
                                                            var letter = String.fromCharCode("A".charCodeAt(0) + index);
                                                            var pos = new google.maps.LatLng(this.latitude, this.longitude);

                                                            new google.maps.Marker({
                                                            position: pos,
                                                            map: map,
                                                            icon: "http://maps.google.com/mapfiles/marker" + letter + ".png",
                                                            animation: google.maps.Animation.DROP

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

                                                             var content ='';
                                                            
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
                                        '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '</p></div></a>'+

                                     ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                         ((this.undercategory == 'Residential') ?
                                                                    '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>' +
                                                                    ' <li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'  : '') +
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')">'+ 
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
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="contactus(this.id)">'+
                                          'Contact us' +
                                          '</a>'+
                                        '</div>'+
                                        '<div class="col-md-1 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)" style="padding: 5px; color: #fbb801;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>');
                                                            

                                                        });

                                                    },
                                                });
                                                }
                                                
                                                
                                                
                                                }else{
                                                
                                                toastr.warning('Please Enter Locality or Draw Precise Shape on Map', 'warning');
                                                
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
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            
          $('#town').val('');   
          $('#sector').val('');  
          var places = searchBox.getPlaces();
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
      




//                                     var getsortby='';
//                                     $('#sortby').on('change',function(){
//                                              
//                                             getsortby = this.value;
//                                              //alert(getsortby);
//                                             
//                                           });
                                         
                                           
                                                        var showChar = 100;
                                                        var ellipsestext = "...";
                                                        var moretext = "Show more";
                                                        var lesstext = "Show less"; 
                                                        var food ='';

                                        $(document).ready(function () {
                                          

                                            food = getParameterByName('id');
                                         
                                           
                                            if (food == null) {
                                              

                                                $.ajax({
                                                    url: 'petproperty',
                                                    data: {id: 'hello'},
                                                    success: function (data) {

                                                       //alert(data);
                                                        var obj = $.parseJSON(data);
                                                        
                                                        bindButtonClick(obj);
                                                         filterButtonClick(obj);
                                                        
                                                        $.each(obj, function () {
                                                            
                                                            var content ='';
                                                            
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
                                        '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '</p></div></a>'+

                                     ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+

((this.undercategory == 'Residential') ?
                                                            '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>' +
                                                            ' <li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'  : '') +



                                       
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')">'+ 
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
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="contactus(this.id)">'+
                                          'Contact us' +
                                          '</a>'+
                                        '</div>'+
                                        '<div class="col-md-1 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)" style="padding: 5px; color: #fbb801;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>');
                                                            

                                                        });

                                                    },
                                                });

                                            } else {

                                               $.ajax({
                                                    url: 'petproperty',
                                                    data: {id: 'hello'},
                                                    success: function (data) {

                                                       //alert(data);
                                                        var obj = $.parseJSON(data);
                                                        
                                                        bindButtonClick(obj);
                                                         filterButtonClick(obj);
                                                        
                                                        $.each(obj, function () {
                                                            
                                                            var content ='';
                                                            
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
                                        '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '</p></div></a>'+

                                     ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+

((this.undercategory == 'Residential') ?
                                                            '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>' +
                                                            ' <li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'  : '') +



                                       
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')">'+ 
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
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="contactus(this.id)">'+
                                          'Contact us' +
                                          '</a>'+
                                        '</div>'+
                                        '<div class="col-md-1 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)" style="padding: 5px; color: #fbb801;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>');
                                                            

                                                        });

                                                    },
                                                });  
                                               
                                            }



                                        });
                                        
                                        
                                        
                                        
                               function bindButtonClick(obj){
                           
                                      $('#sortby').change(function(){
                                          
                                       var sortvar =  $('#sortby').val();  
                                       // alert(JSON.stringify(obj));
                                       
                                       if(sortvar != ''){
                                           
                                          if(sortvar == 'low'){
                                              
                                              obj.sort(function(a, b){
                                        return a.expected_price - b.expected_price;
                                        });
                                              
                                          }else if(sortvar == 'high'){
                                              
                                              obj.sort(function(a, b){
                                        return b.expected_price - a.expected_price;
                                        });
                                        
                                          } 
                                          
                                        
                                       
                                        $('#getprop').html('');  
                                        
                                         $.each(obj, function () {
                                                            
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
                                        '<a onclick="viewproperty1(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '</p></div></a>'+

                                     ((this.countyview > 0 ? '<div class="col-md-3 col-sm-3 col-xs-3"> <i class="fa fa-eye" aria-hidden="true"></i></div>' : '')) +
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2" style="height:310px;">'+
                                        '<div class="row">'+
                                        '<div class="col-md-6 property_main_div_2_inner_1">'+
                                        '<div class="img_prop"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive"></div>'+
                                        '</div>'+
                                        '<div class="col-md-6 property_main_div_2_inner_2">'+
                                        '<p style="color: #ffeb3b;"><b>Locality :</b> '+ this.locality +'</p>'+
                                        '<p style="color: #ffba00;"><b>Highlights:</b>  On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
                                        '<p><b>Description:</b> '+ html +'</p>'+
                                        '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                        '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                        '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')">'+ 
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
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="contactus(this.id)">'+
                                          'Contact us' +
                                          '</a>'+
                                        '</div>'+
                                        '<div class="col-md-1 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)" style="padding: 5px; color: #fbb801;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>');
                                                            

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
                                        result = result && a.expected_price > pricemin && a.expected_price < pricemax ;
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
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
                                        '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
                                        '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-4 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')">'+ 
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
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="contactus(this.id)">'+
                                          'Contact us' +
                                          '</a>'+
                                        '</div>'+
                                        '<div class="col-md-1 text-center property_main_div_3_inner1">'+
                                        '<a href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id)" style="padding: 5px; color: #fbb801;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>'+
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

                                                      // alert(data);
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
                                                                    '<h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> ' + this.expected_price + ' </span>' + this.address + '</h1>' +
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
                                                url: 'getfreevisit',
                                                data: {hardam: id},
                                                success: function (data) {
                                              //alert(data);
                                                
                                                if(data == '1'){
                                                    
                                                    
                                                toastr.success('Request for Site Visit has Successfully placed','success');    
                                                }else if(data == '2'){
                                                    
                                                   toastr.success('Request for Site Visit has Successfully placed','success'); 
                                                   toastr.warning('Your Free Site Visit Has Already Finished, Please Carry 100 Rs Along with you','warning');    
                                                   
                                                }else if(data == '5'){
                                                    
                                                   toastr.warning('Already Visited For this Site','warning');    
                                                   
                                                }else{
                                                   toastr.error('Internal Error','error');    
                                                        }
                                                },
                                            });

                                        }
                                        
                                        
                                        function getchecki(id) {
                                            

//                                            matches.push(id);
//
//                                            var getarray = matches.toString();
                                          
                                            $.ajax({
                                                url: 'saveprop',
                                                data: {hardam: id,food:food},
                                                success: function (data) {
                                              
                                                if(data == '1'){
                                                    
                                                toastr.error('This Property is Already Shortlisted','error');    
                                                }else{
                                                    toastr.success('Property Shortlisted Successfully','success');   
                                                }
                                                },
                                            });

                                        }

                                      function viewproperty(id){
                          
                               if(id != ''){  
                                   
                                    $.ajax({
                                            url: 'viewproperty',
                                            data: {id:id,food:food},
                                            success: function (data) {
                                             //alert(data);   
                                              
                                            },
                                        });

                                        } 

                          }
                          
                          
                          
                          function viewproperty1(id){
                          
                               if(id != ''){  
                                   
                                    $.ajax({
                                            url: 'viewproperty',
                                            data: {id:id},
                                            success: function (data) {
                                             //alert(data);   
                                              
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
                                                url: 'bititnow',
                                                data: {propertyid: id,food:food},
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
                                               
                                                url: 'directitnow',
                                                data: {propertyid: id,food:food},
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
                                                url: 'savemessages',
                                                data: {propid:propid,textarew:textarew,food:food},
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
        
      var tour = new Tour({
          
            steps: window.steps,
            storage: false,
            backdrop:true,
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
    element: "#serch_btn",
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
    
</script>    
