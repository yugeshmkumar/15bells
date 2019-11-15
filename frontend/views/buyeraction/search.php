
<?php


use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\Modal;
use yii\web\View;
use common\models\MyExpectationsajaxSearch;

$this->title = 'Buyer Search';
$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(isset($_SESSION['locations'])){   
       
        // get a session variable. The following usages are equivalent:
         $getlocality = $_SESSION['locations'];     
        $type = $_SESSION['shaped'];

         if($type == 'polygon'){

            $geometry = $_SESSION['newspaths'];
            $radius='';
         }
         if($type == 'circle'){

            $geometry = $_SESSION['centercoordinates'];
            $radius = $_SESSION['totalradius'];
         }
         if($type == 'rectangle'){

            $geometry = $_SESSION['newkuma'];
            $radius ='';
         }
         if($type == ''){

            $geometry = "0";
          
         }
        

        //session_unset();  
    }



// $getlocality = 'Sector 12, Gurugram, Haryana, India';
//     $newtown = 'Gurugram';
//     $newsector = 'Sector 12';
    
//      $type = 'polygon';
//      $geometry = '[ { "lat" : 28.476105313570507, "lng" : 77.02934829151002} , { "lat" : 28.47719928289678, "lng" : 77.03632203494874} , { "lat" : 28.47365327220024, "lng" : 77.03687993442384} , { "lat" : 28.47299309749132, "lng" : 77.0304426327881}  ]';
//      $radius = '';
?>

                                       
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&libraries=geometry,drawing,places"></script>
<style type="text/css" media="print">
    .gmnoprint { display:inline;left:270px !important;}
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
       color:#808080;
		 font-family: 'Roboto', sans-serif;
        font-size: 15px;
        font-weight: 300;
        border-radius:5px !important;
        text-overflow: ellipsis;
        height:45px;
		
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
   #delete-button {
    border: 0;
    background: #f44336;
    color: #fff;
    outline: 0px;
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
    left:135px !important;
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
        padding:3px 10px 4px 10px;
        
        color: white;
        outline: 0px;
      }
 /* satender */
    .search_map_row{
        margin-top: 10px;
        margin-bottom: 20px;
        border: 15px solid #ffffff;
        border-radius: 8px !important;
        }
    .row_upper_search{
        background-color: #145d86; 
        padding:4px 0 2px 0;
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
 .expectation_div_button {
    border: 0;
    margin-top: 2px;
    width: 100%;
    background:#0FD8DA!important;
    color: #ffffff!important;
	transition:.4s;
	position:relative;
	top:6px;
}
    .expectation_div_button:hover{
        border: 1px solid #0FD8DA;
        background-color: #ffffff !important;
		color:#0FD8DA !important;
		transition:.4s;
    }
    
    .search_prop_button_lessee{
        border: 0;
        background: #10101d;
        color: white;
        padding: 11px 0px 10px 0px;
    }
    .search_prop_button_lessee .search1{
        font-size: 23px;
    }
    .search_prop_button_lessee:hover{
        border: 0px;
        background-color: #10101d;
    }
    .search_prop_button_lessee:active{
        background-color: #10101d !important;
    }
    .search_prop_button_lessee:visited{
        background-color: #10101d !important;
    }
    .search_prop_button_lessee:focus{
        background-color: #10101d !important;
    }
    .drop_down_menu{
        margin-bottom:  -20px;
    }
    .search_delet_btn_div{
        position: absolute;
    left: 50%;
    z-index: 99;
    top: 6px;
    }
    .change_color_delet_btn_div{
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
    background-color: #ffffff; 
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
/*    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    padding: 10px 0;
    margin-top: 10px;*/
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
    cursor:pointer;
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
    font-size: 17px; 
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

.filter_s{
    border-right:1px solid #b2b2b2;
   
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
.serch_row{padding-top: 0px;height:410px;margin-top:15px;margin-bottom: 50px;}
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
.another_search_detail {
    padding-top: 4px;
    margin: 0;
    padding-bottom: 3px;
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
	font-size:24px;
	color:#10101d;
	font-family: 'Roboto', sans-serif;
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

.arrow{
color: #ccc;
    background-color: #ccc;
    display: inline-block;
    height: 1px;
    width: 12px;
    position: relative;
   
}     
.max_value{
    padding: 6px 6px 6px 30px;
}

            .area_Ranges {
                float: right;
                width: 50%;
            }
            .area_Ranges a {
                display: block;
                text-align: left;
                padding: 6px 0 6px 0;  
                color: #6f6e6e;
                font-weight: 500;
            }
            .area_Ranges a.max_value {
                padding-right: 12px;
                padding-left: 12px;
               margin-left: 30px;
            }
            .area_Ranges a.min_value {
                padding-right: 22px;
                    padding-left: 12px;
            }
            .area_Ranges a.disabled {
                pointer-events: none;
                cursor: default;
                color: #E5E4E2;
            }
            .area_Ranges a:hover {
               background: #0074e4;
               color: #fff;
               cursor: pointer; 
    text-decoration: none;
            }
            .price_Ranges {
                float: right;
                width: 50%;
            }
            .price_Ranges a {
                display: block;
                text-align: left;
                padding: 6px 0 6px 0;  
                color: #6f6e6e;
                font-weight: 500;
            }
            .price_Ranges a.max_value {
                padding-right: 12px;
                padding-left: 12px;
               margin-left: 30px;
            }
            .price_Ranges a.min_value {
                padding-right: 22px;
                    padding-left: 12px;
            }
            .price_Ranges a.disabled {
                pointer-events: none;
                cursor: default;
                color: #E5E4E2;
            }
            .price_Ranges a:hover {
               background: #0074e4;
               color: #fff;
               cursor: pointer; 
    text-decoration: none;
            }
            .btnClear {
                clear: both;
                border-top: 1px solid #dadada;
                padding: 5px 0 0 0;
                text-align: center;
            }
            input.inputError,
            input.inputError:focus {
                border-color: #e2231a;
                background-color: white;
                color: #e2231a;
                box-shadow: inset 0 0 5px #F7BDBB;
                border-radius: 0;
            }



// styling for pagination 

.content {
    margin: 1px;
    width: 100px;
    height: 100px;
    border: 1px solid black;
    float: left;
    background-color: gray;
}

.paginclass {
   clear: both;
    padding:0;
        float: right;
    list-style: none;
    margin:0 auto;
	width:100%;
}
.paginclass li {
    float:left;
    margin-right:10px;
}
.paginclass li a {
	text-decoration:none !important;
    display:block;
    color:#717171;
    font:bold 11px;
    text-shadow:0px 1px white;
    padding:5px 8px;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    border-radius:3px;
    -webkit-box-shadow:0px 1px 3px 0px rgba(0,0,0,0.35);
    -moz-box-shadow:0px 1px 3px 0px rgba(0,0,0,0.35);
    box-shadow:0px 1px 3px 0px rgba(0,0,0,0.35);
    background:#f9f9f9;
    background:-webkit-linear-gradient(top,#f9f9f9 0%,#e8e8e8 100%);
    background:-moz-linear-gradient(top,#f9f9f9 0%,#e8e8e8 100%);
    background:-o-linear-gradient(top,#f9f9f9 0%,#e8e8e8 100%);
    background:-ms-linear-gradient(top,#f9f9f9 0%,#e8e8e8 100%);
    background:linear-gradient(top,#f9f9f9 0%,#e8e8e8 100%);
    filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9f9f9',endColorstr='#e8e8e8',GradientType=0 );
}
.paginclass li a.current {
    color:white;
    text-shadow:0px 1px #3f789f;
    -webkit-box-shadow:0px 1px 2px 0px rgba(0,0,0,0.8);
    -moz-box-shadow:0px 1px 2px 0px rgba(0,0,0,0.8);
    box-shadow:0px 1px 2px 0px rgba(0,0,0,0.8);
    background:#7cb9e5;
    background:-webkit-linear-gradient(top,#7cb9e5 0%,#57a1d8 100%);
    background:-moz-linear-gradient(top,#7cb9e5 0%,#57a1d8 100%);
    background:-o-linear-gradient(top,#7cb9e5 0%,#57a1d8 100%);
    background:-ms-linear-gradient(top,#7cb9e5 0%,#57a1d8 100%);
    background:linear-gradient(top,#7cb9e5 0%,#57a1d8 100%);
    filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#7cb9e5',endColorstr='#57a1d8',GradientType=0 );
}
.paginclass li a:hover {
    -webkit-box-shadow:0px 1px 3px 0px rgba(0,0,0,0.55);
    -moz-box-shadow:0px 1px 3px 0px rgba(0,0,0,0.55);
    box-shadow:0px 1px 3px 0px rgba(0,0,0,0.55);
    background:#fff;
    background:-webkit-linear-gradient(top,#fff 0%,#e8e8e8 100%);
    background:-moz-linear-gradient(top,#fff 0%,#e8e8e8 100%);
    background:-o-linear-gradient(top,#fff 0%,#e8e8e8 100%);
    background:-ms-linear-gradient(top,#fff 0%,#e8e8e8 100%);
    background:linear-gradient(top,#fff 0%,#e8e8e8 100%);
    filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff',endColorstr='#e8e8e8',GradientType=0 );
}
.paginclass li a:active,#pagin li a.current:active {
    -webkit-box-shadow:inset 0px 1px 3px 0px rgba(0,0,0,0.5),0px 1px 1px 0px rgba(255,255,255,1) !important;
    -moz-box-shadow:inset 0px 1px 3px 0px rgba(0,0,0,0.5),0px 1px 1px 0px rgba(255,255,255,1) !important;
    box-shadow:inset 0px 1px 3px 0px rgba(0,0,0,0.5),0px 1px 1px 0px rgba(255,255,255,1) !important;
}
.paginclass li a.current:hover {
    -webkit-box-shadow:0px 1px 2px 0px rgba(0,0,0,0.9);
    -moz-box-shadow:0px 1px 2px 0px rgba(0,0,0,0.9);
    box-shadow:0px 1px 2px 0px rgba(0,0,0,0.9);
    background:#99cefc;
    background:-webkit-linear-gradient(top,#99cefc 0%,#57a1d8 100%);
    background:-moz-linear-gradient(top,#99cefc 0%,#57a1d8 100%);
    background:-o-linear-gradient(top,#99cefc 0%,#57a1d8 100%);
    background:-ms-linear-gradient(top,#99cefc 0%,#57a1d8 100%);
    background:linear-gradient(top,#99cefc 0%,#57a1d8 100%);
    filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#99cefc',endColorstr='#57a1d8',GradientType=0 );
}
#paginater{
	
	padding-bottom:20px;
}
.carousel-inner .active.left { left: -33%; }
.carousel-inner .next        { left:  33%; }
.carousel-inner .prev        { left: -33%; }
.carousel-control.left,.carousel-control.right {background-image:none;}
.item:not(.prev) {visibility: visible;}
.item.right:not(.prev) {visibility: hidden;}
.rightest{ visibility: visible;}
.exp_ect{
		padding: 8px 10px 12px 4px;
		
		border-radius: 5px !important;
}
#searches{
	    padding: 12px 5px 6px 5px;
    border-radius: 5px !important;
	width:60%;
	    color: #fff;
    background-color: #3E4444;
	position:relative;
	right:20px;
}
.simila_prop{
	    background:rgba(255,255,255,0.40);
    padding: 15px;
    letter-spacing: .5px;
	color:#ffffff;
}
.fa-map-marker:before {
    color: #fb2f2f;
}
.appr_cursr{
        cursor:default !important;
    }
	
	#pac-input::placeholder{
		color:#808080;
		 font-family: 'Roboto', sans-serif;
	}
	.ddRange{ transform:none !important;top:40px !important;}
	.modal-dialog{
		top:14%;
	}
	
</style>

     <section class="big_map col-md-12 col-sm-12">
       
    <div class="container-fluid">
						<div class="row">
							
							 <div id="firststep" class="p-0 col-md-6 col-sm-10 animated bounce">
                                    <!--<i class="fa fa-map-marker" aria-hidden="true"></i>-->
                                    <input type="text" id="pac-input" class="form-control" value="<?php if(isset($getlocality)){echo $getlocality;} ?>" placeholder="Enter Location or Society">
                                    <input type="hidden" id="town">
                                    <input type="hidden" id="sector">
                                    <input type="hidden" id="country" >
                                    <input type="hidden" id="geometry" value="<?php if(isset($geometry)){echo $geometry;} ?>">
                                    <input type="hidden" id="type" value="<?php if(isset($type)){echo $type;} ?>">
                                    <input type="hidden" id="radiuss" value="<?php if(isset($radius)){echo $radius;} ?>">
                                   
                                </div>
								<div class="col-md-2 p-0 search_search_btn_div animated bounce" id="serch_stp"> 
                                    <!--<button type="button" value="Geocode" onclick="getmapproperty();" class="btn btn-primary animated bounce">-->
                                    <button type="button" id="searches" value="Geocode" onclick="getpolymy(); ga('send', 'event', 'Buyeraction Search Button', 'Buyeraction Search Button', 'Buyeraction Search Button','Buyeraction Search Button');" class="btn btn-primary search_prop_button_lessee animated bounce">
                                        <span style="position:relative;bottom:3px;"><i class="fa fa-search search1"></i> Search</span>
                                    </button>
                                </div>
								<div class="col-md-4 text-center expectation_delet_btn_div">
                                   <span class="exp_ect"> <?= Html::button('Create Expectations',['value'=>Url::to('/sellor-expectations/creates'),'class'=>'btn btn-success expectation_div_button','id'=>'modalButton','onclick'=>"ga('send', 'event', 'BuyerSearch CreateExpectations', 'BuyerSearch CreateExpectations', 'BuyerSearch CreateExpectations','BuyerSearch CreateExpectations')"]) ?>
                                      <!--<button onclick = "changeAccept()" class="activeLink" id="addexpectations">Add Expectations</button>-->
                                <input type="hidden" id="expectid">  </span>
                                </div>
							
						</div>
						<div class="row">
						
							
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
						<div class="row">
        <div class="col-md-12 col-sm-12" style="padding:0px;margin-top:6px;">
            
          <div class="row another_search_detail">
<!--				<div class="col-md-3 ">
                        <input type="text" id="pac-input1" name="" class="input_lct" id="" placeholder="Location" style="padding:5px;">
                </div>-->
				
				<!--<div class="col-md-3 filter_s">
					 <div class="dropdown">
						<button id="totalarea" class="btn btn-primary dropdown-toggle area_dtl" type="button" data-toggle="dropdown">Area
						<span class="caret"></span>
						</button>
						
						<ul class="dropdown-menu area_drpdwn">
						  <div class="row">
						  <div class="col-md-6 areaRange">
								<div class="btn-group">

								  <button id="min-max-area-range" class="form-control selectpicker select-btn  dropdown-toggle searchParams" href="#" data-toggle="dropdown" tabindex="6">
									<div class="filter-option pull-left span_price">
									  <span id="area_range1"> </span> - <span id="area_range2">Area Range</span> </div>
									<span class="bs-caret" style="float: right;"><span class="caret"></span></span>
								  </button>

								  <div class="dropdown-menu aRange" role="menu" style="width: 295px;padding-top: 12px;">
									<div class="rangemenu">
									  <div class="freeformPrice">
										<div class="col-md-5">
										  <input name="min_price" id="areamin" type="text" class="min_input form-control" placeholder="Min Area">
										</div>
										<div class="col-md-2 "><span class="arrow"></span></div>
										<div class="col-md-5">
										  <input name="max_price" id="areamax"  type="text" class="max_input form-control" placeholder="Max Area">
										</div>
									  </div>

									 <div class="area_Ranges rangesMax col-md-5">
										<a class="max_value" value="" href="javascript:void(0)">Max</a>
										<a class="max_value" value="500" href="javascript:void(0)">500</a>
										<a class="max_value" value="1000" href="javascript:void(0)">1000</a>
										<a class="max_value" value="1500" href="javascript:void(0)">1500</a>
										<a class="max_value" value="2000" href="javascript:void(0)">2000</a>
										<a class="max_value" value="2500" href="javascript:void(0)">2500</a>
										<a class="max_value" value="3000" href="javascript:void(0)">3000</a>
										<a class="max_value" value="3500" href="javascript:void(0)">3500</a>
										<a class="max_value" value="4000" href="javascript:void(0)">4000</a>
										<a class="max_value" value="4500" href="javascript:void(0)">4500</a>
										<a class="max_value" value="5000" href="javascript:void(0)">5000</a>
										<a class="max_value" value="10000" href="javascript:void(0)">10000</a>
										<a class="max_value" value="25000" href="javascript:void(0)">25000</a>
										<a class="max_value" value="50000" href="javascript:void(0)">50000</a>
									  </div>
									  <div class="col-md-2"> </div>

									   <div class="area_Ranges rangesMin col-md-5">
										<a class="min_value" value="" href="javascript:void(0)">Min</a>
										<a class="min_value" value="500" href="javascript:void(0)">500</a>
										<a class="min_value" value="1000" href="javascript:void(0)">1000</a>
										<a class="min_value" value="1500" href="javascript:void(0)">1500</a>
										<a class="min_value" value="2000" href="javascript:void(0)">2000</a>
										<a class="min_value" value="2500" href="javascript:void(0)">2500</a>
										<a class="min_value" value="3000" href="javascript:void(0)">3000</a>
										<a class="min_value" value="3500" href="javascript:void(0)">3500</a>
										<a class="min_value" value="4000" href="javascript:void(0)">4000</a>
										<a class="min_value" value="4500" href="javascript:void(0)">4500</a>
										<a class="min_value" value="5000" href="javascript:void(0)">5000</a>
										<a class="min_value" value="10000" href="javascript:void(0)">10000</a>
										<a class="min_value" value="25000" href="javascript:void(0)">25000</a>
										<a class="min_value" value="50000" href="javascript:void(0)">50000</a>
									  </div>
									</div>

									<div class="btnClear">
									  <a href="javascript:void(0)" class="btn btn-link">Clear</a>
									</div>
								  </div>

								</div>
							  </div>
							<div class="col-md-6">
								<div class="form-group" style="margin-bottom: 2px;">
								  <select class="form-control input_lct" id="areaft">
									<option>Select</option>
									<option value="sq_feets">Sq Ft.</option>
									<option value="sq_meters">Sq Meter</option>
									<option value="sq_yards">Sq Yards</option>									
								  </select>
								</div>
							</div>
							   				
  
						  </div>
						</ul>
					  </div>
				</div>-->
<div class="col-md-3 filter_s">
    <div class="btn-group areaRange" style="width:100%;">

      <button id="min-max-area-range" class="form-control selectpicker select-btn  dropdown-toggle searchParams"  data-toggle="dropdown" tabindex="6" style="border-radius:5px !important;">
        <div class="filter-option pull-left span_price">
          <span id="area_range1"> </span> - <span id="area_range2">Area Range</span> </div>
        <span class="bs-caret" style="float: right;"><span class="caret"></span></span>
      </button>

      <div class="dropdown-menu ddRange" role="menu" style="width: 295px;padding-top: 12px;">
        <div class="rangemenu">
          <div class="freeformPrice pl-1 pr-1">
				<div class="row">
					<div class="col-md-5">
					  <input name="min_price" id="areamin" type="text" class="min_input form-control" placeholder="Min Area">
					</div>
					<div class="col-md-2 "><span class="arrow"></span></div>
					<div class="col-md-5">
					  <input name="max_price" id="areamax" type="text" class="max_input form-control" placeholder="Max Area">
					</div>
				</div>
          </div>

          <div class="area_Ranges rangesMax col-md-12">
										<a class="max_value" value="" href="javascript:void(0)">Max</a>
										<a class="max_value" value="500" href="javascript:void(0)">500</a>
										<a class="max_value" value="1000" href="javascript:void(0)">1000</a>
										<a class="max_value" value="1500" href="javascript:void(0)">1500</a>
										<a class="max_value" value="2000" href="javascript:void(0)">2000</a>
										<a class="max_value" value="2500" href="javascript:void(0)">2500</a>
										<a class="max_value" value="3000" href="javascript:void(0)">3000</a>
										<a class="max_value" value="3500" href="javascript:void(0)">3500</a>
										<a class="max_value" value="4000" href="javascript:void(0)">4000</a>
										<a class="max_value" value="4500" href="javascript:void(0)">4500</a>
										<a class="max_value" value="5000" href="javascript:void(0)">5000</a>
										<a class="max_value" value="10000" href="javascript:void(0)">10000</a>
										<a class="max_value" value="25000" href="javascript:void(0)">25000</a>
										<a class="max_value" value="50000" href="javascript:void(0)">50000</a>
									  </div>
									  <div class="col-md-2"> </div>

									   <div class="area_Ranges rangesMin col-md-12">
										<a class="min_value" value="" href="javascript:void(0)">Min</a>
										<a class="min_value" value="500" href="javascript:void(0)">500</a>
										<a class="min_value" value="1000" href="javascript:void(0)">1000</a>
										<a class="min_value" value="1500" href="javascript:void(0)">1500</a>
										<a class="min_value" value="2000" href="javascript:void(0)">2000</a>
										<a class="min_value" value="2500" href="javascript:void(0)">2500</a>
										<a class="min_value" value="3000" href="javascript:void(0)">3000</a>
										<a class="min_value" value="3500" href="javascript:void(0)">3500</a>
										<a class="min_value" value="4000" href="javascript:void(0)">4000</a>
										<a class="min_value" value="4500" href="javascript:void(0)">4500</a>
										<a class="min_value" value="5000" href="javascript:void(0)">5000</a>
										<a class="min_value" value="10000" href="javascript:void(0)">10000</a>
										<a class="min_value" value="25000" href="javascript:void(0)">25000</a>
										<a class="min_value" value="50000" href="javascript:void(0)">50000</a>
									  </div>
        </div>

        <div class="btnClear">
          <a href="javascript:void(0)" class="btn btn-link">Clear</a>
        </div>
      </div>

    </div>
  </div>
	<div class="col-md-2 filter_s">
					<div class="form-group" style="margin-bottom: 2px;">
                    <select class="form-control input_lct" id="areaft">
									<option>Select</option>
									<option value="sq_feets">Sq Ft.</option>
									<option value="sq_meters">Sq Meter</option>
									<option value="sq_yards">Sq Yards</option>									
								  </select>
						</div>
						</div>			
  <div class="col-md-3 investRange filter_s">
    <div class="btn-group" style="width:100%;">

      <button id="min-max-price-range" class="form-control selectpicker select-btn  dropdown-toggle searchParams"  data-toggle="dropdown" tabindex="6" style="border-radius:5px !important;">
        <div class="filter-option pull-left span_price">
          <span id="price_range1"> </span> - <span id="price_range2">Price Range</span> </div>
        <span class="bs-caret" style="float: right;"><span class="caret"></span></span>
      </button>

      <div class="dropdown-menu ddRange" role="menu" style="width: 295px;padding-top: 12px;">
        <div class="rangemenu">
          <div class="freeformPrice pl-1 pr-1">
				<div class="row">
					<div class="col-md-5">
					  <input name="min_price" id="pricemin" type="text" class="min_input form-control" placeholder="Min Price">
					</div>
					<div class="col-md-2 "><span class="arrow"></span></div>
					<div class="col-md-5">
					  <input name="max_price" id="pricemax" type="text" class="max_input form-control" placeholder="Max Price">
					</div>
				</div>
          </div>

          <div class="price_Ranges rangesMax col-md-12">
            <a class="max_value" value="" href="javascript:void(0)">Max</a>
            <a class="max_value" value="1000000" href="javascript:void(0)">10 lakhs</a>
            <a class="max_value" value="2500000" href="javascript:void(0)">25 lakhs</a>
            <a class="max_value" value="5000000" href="javascript:void(0)">50 lakhs</a>
            <a class="max_value" value="10000000" href="javascript:void(0)">1 cr</a>
            <a class="max_value" value="50000000" href="javascript:void(0)">5 cr</a>
            <a class="max_value" value="100000000" href="javascript:void(0)">10 cr</a>
            <a class="max_value" value="500000000" href="javascript:void(0)">50 cr</a>
            <a class="max_value" value="1000000000" href="javascript:void(0)">100 cr</a>
            <a class="max_value" value="2000000000" href="javascript:void(0)">200 cr</a>
            <a class="max_value" value="5000000000" href="javascript:void(0)">500 cr</a>
          </div>
          <div class="col-md-2"> </div>

          <div class="price_Ranges rangesMin col-md-12">
            <a class="min_value" value="" href="javascript:void(0)">Min</a>
            <a class="min_value" value="1000000" href="javascript:void(0)">10 lakhs</a>
            <a class="min_value" value="2500000" href="javascript:void(0)">25 lakhs</a>
            <a class="min_value" value="5000000" href="javascript:void(0)">50 lakhs</a>
            <a class="min_value" value="10000000" href="javascript:void(0)">1 cr</a>
            <a class="min_value" value="50000000" href="javascript:void(0)">5 cr</a>
            <a class="min_value" value="100000000" href="javascript:void(0)">10 cr</a>
            <a class="min_value" value="500000000" href="javascript:void(0)">50 cr</a>
            <a class="min_value" value="1000000000" href="javascript:void(0)">100 cr</a>
            <a class="min_value" value="2000000000" href="javascript:void(0)">200 cr</a>
            <a class="min_value" value="5000000000" href="javascript:void(0)">500 cr</a>
          </div>
        </div>

        <div class="btnClear">
          <a href="javascript:void(0)" class="btn btn-link">Clear</a>
        </div>
      </div>

    </div>
  </div>
			<div class="col-md-2 filter_s">
                        <div class="form-group" style="margin-bottom: 2px;">
						  <select class="form-control input_lct" id="proptype">
							
							<?php
                                    $query = new Query;
                                    $query->select(['typename','id'])
                                            ->from('property_type')
                                            ->where(['undercategory' => 'Commercial']);
                                    $command = $query->createCommand();
                                    $data = $command->queryAll();

                                    echo '<option>Property Type</option>';
                                    foreach ($data as $key => $datas) {



                                        echo "<option value=". $datas['id'] .">" . $datas['typename'] . "</option>";
                                    }
                                    ?>           
						  </select>
						</div>
                </div>	
				
				<div class="col-md-2">
					<div class="form-group" style="margin-bottom: 2px;">
						  <select class="form-control input_lct" id="propbid">
							<option>Select</option>
							<option value="Instant">Instant</option>
							<option value="bid">Forward Auction</option>							
						  </select>
						</div>
						</div>
				




<!--				<div class="col-md-1 col-sm-2 text-center another_search_detail_4_div">
                        <button type="button" id="filterme">Filter</button>
                    </div>-->
			</div>      
                
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
        
        <div class="row search_map_row" style="position:relative;">
			<div class="col-md-3 search_delet_btn_div">
                                      <button class="inactiveLink" id="delete-button">Delete <span id="shapedel">Shape </span></button>
                                      
									  
                                  </div>
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
    <div class="col-md-3 col-sm-3" style="padding:0;display:none;">
<!--<input id="pac-input" type="text" placeholder="Search Box">-->
                <div id="map-canvasd" ></div>
                <div id="info"></div>
            </div>
            
            <div class="col-md-12 col-sm-12">
                <div id="searchtab">
    <div class="container"  id="searchtab">
        <div class="row">




    
    
            
    <div class="col-md-12 expect_form" style="margin:0;">
		<div class="row serch_rslt">
			<div class="col-md-9">
				<i class="fa fa-close reslt_close"></i>
				<p class="reslt_descrp"><span id="countprop">0</span> properties found according to your search criteria.</p>
			</div>
			 <div class="buyit col-md-3">
         
            <div class="row m-0">
                <select id="sortby" class="form-control pull-right" onclick="ga('send', 'event', 'Buyeraction Search Select Sorting', 'Buyeraction Search Select Sorting', 'Buyeraction Search Select Sorting','Buyeraction Search Select Sorting')">
                  <option value="nosort" >Sort by</option>
                  <option value="low">Price: Low to High</option>
                  <option value="high" >Price: High to Low</option>
                  <option value="nearest" >Distance: Nearest</option>
                </select>
            </div>
        </div>
		</div>
	</div>          
        
    <div class="sortby clearfix col-md-12" style="padding:20px 0;">
      <div class="row">
          <div class="col-md-9"></div>
       
      </div>
    </div>
            
    <div class="row property_display_row">
        
         <div id="getprop" class="row">
        
        </div>
     
    </div>
    <div id="paginater" class="row">          

        </div>
<div class="col-md-12" style="margin:0;" id="similiarrow">
						<div class="col-md-12 sellr_proprty">

							<div class="caption font-green-sharp exp_titl p-0">
                                        
                                        <span class="caption-subject bold uppercase exp_name">Similar Properties</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>
                                 </div>
         <div id="getpropsim" class="row" style="padding-bottom: 0px;">
             
         
        </div>
       <div id="paginaters" class="row">          

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$('#myCarousel').carousel({
  interval: 40000
});

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  if (next.next().length>0) {
 
      next.next().children(':first-child').clone().appendTo($(this)).addClass('rightest');
      
  }
  else {
      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
     
  }
});
</script>





<script>

  $('.dropdown-menu.aRange')
        .click(function(e) {
          e.stopPropagation();
        });

      function disableDropDownRangeOptions(max_values, minValue) {
        if (max_values) {
          max_values.each(function() {
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
         var minValue=''; var maxValue=''; var areas='';
        min_values.click(function() {
           
          minValue = $(this).attr('value');
          min_input.val(minValue);
          document.getElementById('area_range1').innerHTML = minValue;

          disableDropDownRangeOptions(max_values, minValue);

          validateDropDownInputs();
        });

        max_values.click(function() {
          maxValue = $(this).attr('value');
          max_input.val(maxValue);
          document.getElementById('area_range2').innerHTML = maxValue;

          toggleDropDown();
        });

        clearLink.click(function() {
          min_input.val('');
          max_input.val('');

          disableDropDownRangeOptions(max_values);

          validateDropDownInputs();
        });

        min_input.on('input',
          function() {
            var minValue = min_input.val();

            disableDropDownRangeOptions(max_values, minValue);
            validateDropDownInputs();
          });

        max_input.on('input', validateDropDownInputs);
         areas = $('#areaft').val();
        max_input.blur('input',
          function() {
            toggleDropDown();
            updatearea();
          });

         if(areas !=''){
		  $('#areaft').blur(function() {
                
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

        function updatearea(){
            
			if(minValue !='' && maxValue!='' && areas !=''){
		  var areas = $('#areaft').val();
		  var totalarea = minValue + '-' + maxValue + ' '+ areas;
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

</script>

<script>

  $('.dropdown-menu.ddRange')
        .click(function(e) {
          e.stopPropagation();
        });

      function disableDropDownRangeOptions(max_values, minValue) {
        if (max_values) {
          max_values.each(function() {
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
        min_values.click(function() {
            
          var minValue = $(this).attr('value');
          min_input.val(minValue);
          document.getElementById('price_range1').innerHTML = minValue;

          disableDropDownRangeOptions(max_values, minValue);

          validateDropDownInputs();
        });

        max_values.click(function() {
          var maxValue = $(this).attr('value');
          max_input.val(maxValue);
          document.getElementById('price_range2').innerHTML = maxValue;

          toggleDropDown();
        });

        clearLink.click(function() {
          min_input.val('');
          max_input.val('');

          disableDropDownRangeOptions(max_values);

          validateDropDownInputs();
        });

        min_input.on('input',
          function() {
            var minValue = min_input.val();

            disableDropDownRangeOptions(max_values, minValue);
            validateDropDownInputs();
          });

        max_input.on('input', validateDropDownInputs);

        max_input.blur('input',
          function() {
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

</script>



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
      var count1='';
      var count2='';
      var count3='';
      
      
      
                              function getpolymy(){

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
                                           var getsearchlocation  = $("#pac-input").val(); 
                                           var town  = $("#town").val(); 
                                           var sector  = $("#sector").val();
                                           var country  = $("#country").val();
                                           var areaft = $("#areaft").val();                                            
                                        var areamin = $("#areamin").val();
                                        var areamax = $("#areamax").val();
                                        var pricemin = $("#pricemin").val();
                                        var pricemax = $("#pricemax").val();
                                        var proptype =  $('#proptype').val();  
                                        var propbid =  $('#propbid').val();
                                       
                                        
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
                                              $('#getpropsim').html('');
                                              $('#similiarrow').hide();

                                            
                                            
                                            if(shapes == ''){

                                 
                                               
                                          ndata = {location:getsearchlocation,area:getexpectationID,town:town,sector:sector,country:country,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid}; 
                                          
                                           $.ajax({
                                                    type: "POST",
                                                    url: 'withoutshape',
                                                    data: ndata,
                                                    success: function (data) {
                                                      
                                                   if(data != '1'){
                                                       toastr.success('Your Search Criteria has Successfully Saved', 'success');
                                                        $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html(countprop);
                                                        
                                                        bindButtonClick(obj);

                                                        $.each(obj, function (index) {
                                                         
                                                       
                                                           
                                                            var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.city + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';

                                                             var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;


                                                            
                                        $('#getprop').append('<div class="col-md-6 chirag">'+
				'<div class="row prop_list">'+
					'<p><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img"></p>'+
					'<div class="col-md-12">'+
					
					'<h5 class="prpr_hed mb-3">' +  this.typename +' availabale for sale in '+ this.city  + '</h5>'+
					'<p class="pror_detl"><span class="lite_clr">Locality :</span> '+ this.locality +'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Highlight :</span> On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Description: </span>'+ html +'</p>'+
					'<p class="mt-3 mb-4">'+
					'<a onclick="viewproperty(' + this.id + '),ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'&expecidl='+getexpectationID+'" target="_blank" class="more_detail">More Details</a>'+
					'</p>'+
					'</div>'+
					'<div class="col-md-12 text-center pt-1 pb-3">'+
						'<div class="row">'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-inr"></i> ' + this.expected_price + '</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-users"></i> '+ ((this.total_plot_area == '0') ? this.buildup_area : this.total_plot_area) +' sqft</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-building"></i> '+ this.county1 +'</span>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-12 text-center bordr_lw">'+
						'<div class="row">'+
						((this.request_for == 'Instant') ?
							'<a class="col-md-4 col-xs-4 app_rch appr_cursrb" href="javascript:void(0)" onclick="directitnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Instant Approach</span>'+
							'</div></a>'
							:
                     ((this.request_for == 'bid') ?
                     '<a class="col-md-4 col-xs-4 app_rch buysitevisit" href="javascript:void(0)" onclick="bititnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Bit it Now</span>'+
							'</div></a>'
							: ''
                   )) +						
							
							'<a class="col-md-4 col-xs-4 brdr_b app_rch buysitevisit" href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id);"><div>'+
								'<span class="app_rch">'+
								(this.county > 0 ? 'Site Visited': 'Book Site Visit') +
								'</span>'+
							'</div>'+
							'</a>'+
							'<a class="col-md-4 col-xs-4 app_rch buyshortlist" href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id);"><div>'+
								'<span class="app_rch">Shortlist</span>'+
							'</div></a>'+
						'</div>'+
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
                                            
                                            
                                            
                                            if(shapes == 'polygon'){
                                                
                                           toastr.success('Your Search Criteria has Successfully Saved', 'success');
                                          
                                                  
                                          ndata = {location:getsearchlocation,town:town,sector:sector,newpath:newpath,area:getexpectationID,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid}; 
                                          
                                           $.ajax({
                                                    type: "POST",
                                                    url: 'getpolymy',
                                                    data: ndata,
                                                    success: function (data) {
                                                      
                                                    
                                                $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html('');
                                                        
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
                                                            
                                                           
                                                             var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.city + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
						              var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;


                                                            
                                        $('#getprop').append('<div class="col-md-6 chirag">'+
				'<div class="row prop_list">'+
					'<p><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img"></p>'+
					'<div class="col-md-12">'+
					
					'<h5 class="prpr_hed mb-3">' +  this.typename +' availabale for sale in '+ this.city  + '</h5>'+
					'<p class="pror_detl"><span class="lite_clr">Locality :</span> '+ this.locality +'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Highlight :</span> On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Description: </span>'+ html +'</p>'+
					'<p class="mt-3 mb-4">'+
					'<a onclick="viewproperty(' + this.id + '),ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'&expecidl='+getexpectationID+'" target="_blank" class="more_detail">More Details</a>'+
					'</p>'+
					'</div>'+
					'<div class="col-md-12 text-center pt-1 pb-3">'+
						'<div class="row">'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-inr"></i> ' + this.expected_price + '</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-users"></i> '+ ((this.total_plot_area == '0') ? this.buildup_area : this.total_plot_area) +' sqft</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-building"></i> '+ this.county1 +'</span>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-12 text-center bordr_lw">'+
						'<div class="row">'+
						((this.request_for == 'Instant') ?
							'<a class="col-md-4 col-xs-4 app_rch appr_cursrb" href="javascript:void(0)" onclick="directitnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Instant Approach</span>'+
							'</div></a>'
							:
                     ((this.request_for == 'bid') ?
                     '<a class="col-md-4 col-xs-4 app_rch buysitevisit" href="javascript:void(0)" onclick="bititnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Bit it Now</span>'+
							'</div></a>'
							: ''
                   )) +						
							
							'<a class="col-md-4 col-xs-4 brdr_b app_rch buysitevisit" href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id);"><div>'+
								'<span class="app_rch">'+
								(this.county > 0 ? 'Site Visited': 'Book Site Visit') +
								'</span>'+
							'</div>'+
							'</a>'+
							'<a class="col-md-4 col-xs-4 app_rch buyshortlist" href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id);"><div>'+
								'<span class="app_rch">Shortlist</span>'+
							'</div></a>'+
						'</div>'+
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
                                          var totals = Math.ceil(count1/6);
                                          
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

                                                    },
                                                });
                                                }
                                           if(shapes == 'circle'){
                                           
                                         toastr.success('Your Search Criteria has Successfully Saved', 'success');

                                          
                                       
                                             $.ajax({
                                                    type: "POST",
                                                    url: 'mapproperty1',
                                                    data: {location:getsearchlocation,center:centercoordinates,totalradius:totalradius,shapes:shapes,town:town,sector:sector,area:getexpectationID,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid},
                                                    success: function (data) {
                                                    
                                                $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
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

                                                            circle = new google.maps.Circle(circleOptions);
                                                             if(circle.getBounds().contains(curPosition)){

                                                             count2 += 1; 
                                                             var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.city + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
								                            var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;


                                         

                                        $('#getprop').append('<div class="col-md-6 chirag">'+
				'<div class="row prop_list">'+
					'<p><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img"></p>'+
					'<div class="col-md-12">'+
					
					'<h5 class="prpr_hed mb-3">' +  this.typename +' availabale for sale in '+ this.city  + '</h5>'+
					'<p class="pror_detl"><span class="lite_clr">Locality :</span> '+ this.locality +'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Highlight :</span> On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Description: </span>'+ html +'</p>'+
					'<p class="mt-3 mb-4">'+
					'<a onclick="viewproperty(' + this.id + ');" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'&expecidl='+getexpectationID+'" target="_blank" class="more_detail">More Details</a>'+
					'</p>'+
					'</div>'+
					'<div class="col-md-12 text-center pt-1 pb-3">'+
						'<div class="row">'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-inr"></i> ' + this.expected_price + '</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-users"></i> '+ ((this.total_plot_area == '0') ? this.buildup_area : this.total_plot_area) +' sqft</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-building"></i> '+ this.county1 +'</span>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-12 text-center bordr_lw">'+
						'<div class="row">'+
						((this.request_for == 'Instant') ?
							'<a class="col-md-4 col-xs-4 app_rch appr_cursrb" href="javascript:void(0)" onclick="directitnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Instant Approach</span>'+
							'</div></a>'
							:
                     ((this.request_for == 'bid') ?
                     '<a class="col-md-4 col-xs-4 app_rch buysitevisit" href="javascript:void(0)" onclick="bititnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Bit it Now</span>'+
							'</div></a>'
							: ''
                   )) +						
							
							'<a class="col-md-4 col-xs-4 brdr_b app_rch buysitevisit" href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id);"><div>'+
								'<span class="app_rch">'+
								(this.county > 0 ? 'Site Visited': 'Book Site Visit') +
								'</span>'+
							'</div>'+
							'</a>'+
							'<a class="col-md-4 col-xs-4 app_rch buyshortlist" href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id);"><div>'+
								'<span class="app_rch">Shortlist</span>'+
							'</div></a>'+
						'</div>'+
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
                                          var totals = Math.ceil(count2/6);
                                          
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

                                                    },
                                                });
                                          }
                                                
                                                
                                  if(shapes == 'rectangle'){
                                  
                                                
                                  toastr.success('Your Search Criteria has Successfully Saved', 'success');  


                                               
                                              
                                             $.ajax({
                                                    type: "POST",
                                                    url: 'mapproperty2',
                                                    data: {northlat:northlat,southlat:southlat,northlng:northlng,southlng:southlng,location:getsearchlocation,center:centercord,shapes:shapes,town:town,sector:sector,area:getexpectationID,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid},
                                                    success: function (data) {
                                                 
                                                       $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        //$('#countprop').html(countprop);
                                                        
                                                        bindButtonClick(obj);
                                                           
                                                        $.each(obj, function (index) {
                                                            
                                        var lati = this.latitude;
                                        var long = this.longitude;
                                        var curPosition = new google.maps.LatLng(lati,long);  

                 var rectanglecoordinates = '{"north": '+northlat+',"south":'+ southlat+',"east": '+northlng+',"west": '+southlng+' }';
               

                                  var newkuma = JSON.parse(rectanglecoordinates);
                                  
                                  var   rectangle = new google.maps.Rectangle({
                                    strokeColor: '#FF0000',
                                    strokeOpacity: 0.8,
                                    strokeWeight: 2,
                                    fillColor: '#FF0000',
                                    fillOpacity: 0.35,
                                    editable: true,
                                    //draggable: true,
                                    map: map,
                                    bounds: newkuma
                                    });

                                                             
                                                             var content = 'A very good ' + this.typename + ' availabale for rent in ' + this.city + ((this.total_plot_area != '0') ? 'with Plot area ' + this.total_plot_area + ' sqft,' : '' ) + ' with Superbuiltup ' + this.buildup_area + ' sqft, It is a ' + this.furnished_status + ' property suitable for any kind of ' + this.typename + ', For more details or Site Visit , please Contact Us..';
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
							      var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;


                                       if(rectangle.getBounds().contains(curPosition)){
               
                                      count3 += 1;                      
                                        $('#getprop').append('<div class="col-md-6 chirag">'+
				'<div class="row prop_list">'+
					'<p><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img"></p>'+
					'<div class="col-md-12">'+
					
					'<h5 class="prpr_hed mb-3">' +  this.typename +' availabale for sale in '+ this.city  + '</h5>'+
					'<p class="pror_detl"><span class="lite_clr">Locality :</span> '+ this.locality +'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Highlight :</span> On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Description: </span>'+ html +'</p>'+
					'<p class="mt-3 mb-4">'+
					'<a onclick="viewproperty(' + this.id + ');" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'&expecidl='+getexpectationID+'" target="_blank" class="more_detail">More Details</a>'+
					'</p>'+
					'</div>'+
					'<div class="col-md-12 text-center pt-1 pb-3">'+
						'<div class="row">'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-inr"></i> ' + this.expected_price + '</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-users"></i> '+ ((this.total_plot_area == '0') ? this.buildup_area : this.total_plot_area) +' sqft</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-building"></i> '+ this.county1 +'</span>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-12 text-center bordr_lw">'+
						'<div class="row">'+
						((this.request_for == 'Instant') ?
							'<a class="col-md-4 col-xs-4 app_rch appr_cursrb" href="javascript:void(0)" onclick="directitnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Instant Approach</span>'+
							'</div></a>'
							:
                     ((this.request_for == 'bid') ?
                     '<a class="col-md-4 col-xs-4 app_rch buysitevisit" href="javascript:void(0)" onclick="bititnow(' + this.id + ');"><div>'+
								'<span class="app_rch">Bit it Now</span>'+
							'</div></a>'
							: ''
                   )) +						
							
							'<a class="col-md-4 col-xs-4 brdr_b app_rch buysitevisit" href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id);"><div>'+
								'<span class="app_rch">'+
								(this.county > 0 ? 'Site Visited': 'Book Site Visit') +
								'</span>'+
							'</div>'+
							'</a>'+
							'<a class="col-md-4 col-xs-4 app_rch buyshortlist" href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id);"><div>'+
								'<span class="app_rch">Shortlist</span>'+
							'</div></a>'+
						'</div>'+
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
                                          var totals = Math.ceil(count3/6);
                                          
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
//
                                                    },
                                                });
                                                
                                               
                                                } 
                                                
                                   if(shapes == 'polyline'){
                                   
                                                
                                   toastr.success('Your Search Criteria has Successfully Saved', 'success');             
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
                                            
                                                
                                                
                                               ndata = {location:getsearchlocation,maxi: maxi,mini : mini,maxiy :maxiy,miniy : miniy,shapes:shapes,town:town,sector:sector,newpath:newpath,area:getexpectationID,areamin:areamin,areamax:areamax,pricemin:pricemin,pricemax:pricemax,proptype:proptype,propbid:propbid}; 
                                            
                                            
                                             $.ajax({
                                                    type: "POST",
                                                    url: 'getpolymy',
                                                    data: ndata,
                                                    success: function (data) {
                                                   
                                                      $('#search-pro').css("display","block");
                                                        var obj = $.parseJSON(data);
                                                        $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                        $('#countprop').html(countprop);
                                                        
                                                        bindButtonClick(obj);

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

                                                            
                                                           var content =  'A very good '+ this.typename +' availabale for sale in '+ this.city + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ';
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '</span><span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';
                                                             var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;


                                                            
                                        $('#getprop').append('<div class="col-md-6 chirag">'+
				'<div class="row prop_list">'+
					'<p><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img"></p>'+
					'<div class="col-md-12">'+
					
					'<h5 class="prpr_hed mb-3">' +  this.typename +' availabale for sale in '+ this.city  + '</h5>'+
					'<p class="pror_detl"><span class="lite_clr">Locality :</span> '+ this.locality +'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Highlight :</span> On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
					'<p class="pror_detl"><span class="lite_clr">Description: </span>'+ html +'</p>'+
					'<p class="mt-3 mb-4">'+
					'<a onclick="viewproperty(' + this.id + '); " href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'&expecidl='+getexpectationID+'" target="_blank" class="more_detail">More Details</a>'+
					'</p>'+
					'</div>'+
					'<div class="col-md-12 text-center pt-1 pb-3">'+
						'<div class="row">'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-inr"></i> ' + this.expected_price + '</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-users"></i> '+ ((this.total_plot_area == '0') ? this.buildup_area : this.total_plot_area) +' sqft</span>'+
							'</div>'+
							'<div class="col-md-4 col-xs-4">'+
								'<span class="lite_clr"><i class="fa fa-building"></i> '+ this.county1 +'</span>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-12 text-center bordr_lw">'+
						'<div class="row">'+
						((this.request_for == 'Instant') ?
							'<a class="col-md-4 col-xs-4 app_rch" href="javascript:void(0)" onclick="directitnow(' + this.id + '); ga("send", "event", "Buyeraction Search Property InstantApproach", "Buyeraction Search Property InstantApproach", "Buyeraction Search Property InstantApproach","Buyeraction Search Property InstantApproach");"><div>'+
								'<span class="app_rch">Instant Approach</span>'+
							'</div></a>'
							:
                     ((this.request_for == 'bid') ?
                     '<a class="col-md-4 col-xs-4 app_rch" href="javascript:void(0)" onclick="bititnow(' + this.id + '); ga("send", "event", "Buyeraction Search Property InstantApproach", "Buyeraction Search Property InstantApproach", "Buyeraction Search Property InstantApproach","Buyeraction Search Property InstantApproach");"><div>'+
								'<span class="app_rch">Bit it Now</span>'+
							'</div></a>'
							: ''
                   )) +						
							
							'<a class="col-md-4 col-xs-4 brdr_b app_rch" href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id); ga("send", "event", "Buyeraction Search Book Site Visit", "Buyeraction Search Book Site Visit", "Buyeraction Search Book Site Visit","Buyeraction Search Book Site Visit");"><div>'+
								'<span class="app_rch">'+
								(this.county > 0 ? 'Site Visited': 'Book Site Visit') +
								'</span>'+
							'</div>'+
							'</a>'+
							'<a class="col-md-4 col-xs-4 app_rch" href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id); ga("send", "event", "Buyeraction Search property Shortlist", "Buyeraction Search property Shortlist", "Buyeraction Search property Shortlist","Buyeraction Search property Shortlist");"><div>'+
								'<span class="app_rch">Shortlist</span>'+
							'</div></a>'+
						'</div>'+
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
                                           $('#paginater').html('<ol id="pagin">'+ dynamic+  '</ol>'); 
                                            $("#pagin li a").first().addClass("current"); 
                                              $("#pagin li a").click(function() {
                                              
                                            $("#pagin li a").removeClass("current");
                                            $(this).addClass("current");
                                           
                                            showPage(parseInt($(this).text())) 
                                        });

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
                                                    url: 'similiarprop',
                                                    data: ndata,
                                                    success: function (data) {
                                                      
                                                   
                                                    
                                                        var obj = $.parseJSON(data);
                                                        
                                                         $(".serch_rslt").show();
                                                        var countprop = Object.keys(obj).length;                                                        
                                                      
                                                        if(countprop > 0){
                                                            
                                                            $('#getpropsim').html('');
                                                            $('#similiarrow').show();
                                                            
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

                                                           
                                        $('#getpropsim').append('<div class="col-md-6 chirags">'+
											'<div class="row prop_list">'+
												'<p><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/';  ?>'+((this.featured_image == null) ? 'not.jpg' : imaged)+'" class="img-responsive prop_img"></p>'+
												'<div class="col-md-12">'+
												
												'<h5 class="prpr_hed mb-3">' +  this.typename +' availabale for sale in '+ this.city  + '</h5>'+
												'<p class="pror_detl"><span class="lite_clr">Locality :</span> '+ this.locality +'</p>'+
												'<p class="pror_detl"><span class="lite_clr">Highlight :</span> On Sale / ' + this.age_of_property + ' Years Old'+ (( this.furnished_status == '') ? '' : '/ '+ this.furnished_status)+ (( this.property_on_floor == null) ? '' : ' / ' + this. property_on_floor + 'th Floor') + (( this.total_floors == null) ? '' : ' (out of ' + this.total_floors +')')+'</p>'+
												'<p class="pror_detl"><span class="lite_clr">Description: </span>'+ html +'</p>'+
												'<p class="mt-3 mb-4">'+
												'<a onclick="viewproperty(' + this.id + '),ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'&expecidl='+getexpectationID+'" target="_blank" class="more_detail">More Details</a>'+
												'</p>'+
												'</div>'+
												'<div class="col-md-12 text-center pt-1 pb-3">'+
													'<div class="row">'+
														'<div class="col-md-4 col-xs-4">'+
															'<span class="lite_clr"><i class="fa fa-inr"></i> ' + this.expected_price + '</span>'+
														'</div>'+
														'<div class="col-md-4 col-xs-4">'+
															'<span class="lite_clr"><i class="fa fa-users"></i> '+ ((this.total_plot_area == null) ? this.buildup_area : this.total_plot_area) +' sqft</span>'+
														'</div>'+
														'<div class="col-md-4 col-xs-4">'+
															'<span class="lite_clr"><i class="fa fa-building"></i> '+ this.county1 +'</span>'+
														'</div>'+
													'</div>'+
												'</div>'+
												'<div class="col-md-12 text-center bordr_lw">'+
													'<div class="row">'+
													((this.request_for == 'Instant') ?
														'<a class="col-md-4 col-xs-4 app_rch appr_cursrb" href="javascript:void(0)" onclick="directitnow(' + this.id + ');"><div>'+
															'<span class="app_rch">Instant Approach</span>'+
														'</div></a>'
														:
												 ((this.request_for == 'bid') ?
												 '<a class="col-md-4 col-xs-4 app_rch buysitevisit" href="javascript:void(0)" onclick="bititnow(' + this.id + ');"><div>'+
															'<span class="app_rch">Bit it Now</span>'+
														'</div></a>'
														: ''
											   )) +						
														
														'<a class="col-md-4 col-xs-4 brdr_b app_rch buysitevisit" href="javascript:void(0)" id="' + this.id + '" onclick="getfreevisit(this.id);"><div>'+
															'<span class="app_rch">'+
															(this.county > 0 ? 'Site Visited': 'Book Site Visit') +
															'</span>'+
														'</div>'+
														'</a>'+
														'<a class="col-md-4 col-xs-4 app_rch buyshortlist" href="javascript:void(0)" id="' + this.id + '" onclick="getchecki(this.id);"><div>'+
															'<span class="app_rch">Shortlist</span>'+
														'</div></a>'+
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
                                $('#paginaters').html('<ol  id="pagins" class="paginclass"><li><button class="btn btn-info" id="back">Back</button></li>' + dynamic + '<li><button class="btn btn-info" id="next">Next</button></li></ol>');
                                           
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
                                                
                                                toastr.warning('Please Enter Locality or Draw Precise Shape on Map', 'warning');
                                                
                                                } 
                                                
                                                }else{
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
    }else{

       $('#newsearches').css("display", "none");
       $('#searches').css("display", "block");
        if(circle){
            circle.setMap(null);
        }else if(bermudaTriangle){
            bermudaTriangle.setMap(null);
        }else if(rectangle){
            rectangle.setMap(null);
        }
   
    
    
    drawingManager.setMap(map);
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
      
      
      var type;
      /////////////////////////////////////
      function initialize() {
          
        $('#delete-button').removeClass("inactiveLink");
       $('#delete-button').addClass("activeLink");
       //$('.gmnoprint').children().eq(0).addClass("hideme");
        map = new google.maps.Map(document.getElementById('map_canvas'), { //var
          zoom: 16,//10,
          center: new google.maps.LatLng(28.4595,77.0266),//(22.344, 114.048),
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
        
        //drawingManager.setMap(null);

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
                                       var getexpectationID = $('#expectid').val();
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
                                                            content =  'A very good '+ this.typename +' availabale for rent in '+ this.city + ' with Plot area '+ this.total_plot_area +' sqft, Superbuiltup '+ this.buildup_area +' sqft, It is a '+ this.furnished_status +' property suitable for any kind of '+ this.typename +', For more details or Site Visit , please Contact Us.. ' )
                                                           
                                                            var imaged = $.trim(this.featured_image);
                                                            var c = content.substr(0, showChar);
			                                    var h = content.substr(showChar-1, content.length - showChar);
                                                            var html = '<span onclick="propdetails(' + this.id + ')">'+ c + '<span class="moreellipses" style="display:inline">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span onclick="propdetails(' + this.id + ')" class="ajamore" style="display:none">' + h + '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_'+ this.id +'" class="morelinks ">' + moretext + '</a></span>';

                                                             var haritid = 273*179-this.id;
                                                            var propsid = 'PR'+ haritid;
                                                            var mathceildist = Math.ceil(this.distance);


                                                            
                                        $('#getprop').append('<div class="col-md-6 serch_row chirag">'+
                                        '<div class="col-md-12 property_main_div">'+
                                        '<div class="col-md-12 property_main_div_1" style="height:60px">'+
                                        '<a onclick="viewproperty1(' + this.id + '),ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'&expecidl='+getexpectationID+'" target="_blank"><div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0;"><p> ' +  this.typename +' availabale for sale in '+ this.city  + '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ID - '+propsid+')</p></div></a>'+

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
                                        '<a class="btn btn-default" onclick="viewproperty(' + this.id + ')" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=']) ?>'+this.id+'&expecidl='+getexpectationID+'" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_2_inner_p">'+
                                        '<ul class="list_li">'+
                                        '<li><p>₹  ' + this.expected_price + ' </p></li>'+
                                        '<li><i class="fa fa-building" aria-hidden="true"></i>  '+ ((this.total_plot_area == '0') ? this.buildup_area : this.total_plot_area) +' sqft</li>'+
((ferit == 1 ? '<li><i class="fa fa-map-marker" aria-hidden="true"></i> '+ mathceildist +' km </li>' : '')) +
//                                        '<li><i class="fa fa-bed" aria-hidden="true"></i> '+ this.bedrooms +'</li>'+
//                                        '<li><i class="fa fa-bath" aria-hidden="true"></i> '+ this.bathrooms +'</li>'+
                                        '<li><i class="fa fa-users" aria-hidden="true"></i> '+ this.county1 +'</li>'+ 
                                        '</ul>'+
                                        '</div>'+
                                        '<div class="col-md-12 property_main_div_3">'+
                                        '<div class="col-md-5 text-center property_main_div_3_inner1">'+
                                         ((this.request_for == 'Instant') ?
                                        '<a href="javascript:void(0)" onclick="directitnow(' + this.id + ')" class="appr_cursr appr_cursrb">'+ 
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



                                            ga("send", "event", "Buyeraction Search Book Site Visit", "Buyeraction Search Book Site Visit", "Buyeraction Search Book Site Visit","Buyeraction Search Book Site Visit");
                                            var getexpectationID = $('#expectid').val();
                                            
                                            $.ajax({
                                                type: "POST",
                                                url: 'getfreevisit',
                                                data: {hardam: id,getexpectationID:getexpectationID},
                                                success: function (data) {
                                              
                                                
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
                                            

                                     ga("send", "event", "Buyeraction Search property Shortlist", "Buyeraction Search property Shortlist", "Buyeraction Search property Shortlist","Buyeraction Search property Shortlist");
                                          var expectation_id = $('#expectid').val();
                                            $.ajax({
         				                     	type: "POST",
                                                url: 'saveprop',
                                                data: {hardam: id,expectation_id: expectation_id},
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
                          
                                        ga("send", "event", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails", "Buyeraction Search Property Moredetails","Buyeraction Search Property Moredetails");
                               if(id != ''){  
                                   
                                    $.ajax({
                                            type: "POST",
                                            url: 'viewproperty',
                                            data: {id:id},
                                            success: function (data) {
                                          
                                              
                                            },
                                        });

                                        } 

                          }
                          
                          
                          
                          function viewproperty1(id){
                          
                               if(id != ''){  
                                   
                                    $.ajax({
                                            type: "POST",
                                            url: 'viewproperty',
                                            data: {id:id},
                                            success: function (data) {
                                           
                                              
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


                                        ga("send", "event", "Buyeraction Search Property InstantApproach", "Buyeraction Search Property InstantApproach", "Buyeraction Search Property InstantApproach","Buyeraction Search Property InstantApproach");


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
			$("#modal").css({"opacity": "1","background": "rgba(0, 0, 0, 0.57)"});
		});
      
      
    });
    
    
    
    function changeAccept() {
       
		
		$('#draggable2').modal('show');
}	
    
</script>    
