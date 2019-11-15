
<?php


use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\MyExpectationsajaxSearch;

$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
//echo Yii::getAlias('@archive', realpath(dirname(__FILE__).'/../../'));die;
// http://jsfiddle.net/VAKrE/105/
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&sensor=false&libraries=geometry,drawing,places"></script>
<style type="text/css" media="print">
    .gmnoprint { display:inline }
</style>
<style>
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
    html, body, #map-canvas {
        height: 600px;
        margin: 0px;
        padding: 0px;
    }
    html, body, #map-canvasd {
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
    left:275px !important;
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
   
     margin-left: 11px;
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


</style>

     <section class="big_map">
    <div class="container-fluid">
        
         
                        <div class="row" style="    background-color: #e7e7e7; padding: 25px;margin-top: 15px;">
            <div id="firststep" class="col-md-3 col-sm-5 animated bounce">
                                    <!--<i class="fa fa-map-marker" aria-hidden="true"></i>-->
                                    <input type="text" id="pac-input" class="form-control" placeholder="Enter Location or Society">
                                </div>
                                  <div class="col-md-2 text-center">
                                      <button class="inactiveLink" id="delete-button">Delete <span id="shapedel">Shape </span></button>
                                  </div>

                                <div  class="col-md-2" style="padding-top:6px;">
                                  <div id="color-palette"></div>
                                    
                                <div id="curpos" style="display:none;"></div>
                                <div id="cursel" style="display:none;"></div>
                                </div>
                                <div class="col-md-2 text-center">
                                      <button onclick = "changeAccept()" class="activeLink" id="addexpectations">Add Expectations</button>
                                  </div>

                                <div class="col-md-2 col-sm-2 animated bounce"> 
                                    <!--<button type="button" value="Geocode" onclick="getmapproperty();" class="btn btn-primary animated bounce">-->
                                    <button type="button" id="searches" value="Geocode" onclick="getpolymy();" class="btn btn-primary animated bounce">
                                        <span>Search</span> <i class="fa fa-search search1" aria-hidden="true"></i>
                                    </button>
                                </div>
                                
                          
            </div>
        <div class="row">
            <div class="col-md-12 col-sm-12" style="padding:0;border: 1px solid;">
                <div id="map_canvas" ></div>
                <div id="info"></div>
            </div>
        </div>
    </div>
</section>



<section id="search-pro" style="padding:30px;">
    <div class="container">
        <div class="row">
            
            <div class="col-md-4 col-sm-4" style="padding:0;">
<!--<input id="pac-input" type="text" placeholder="Search Box">-->
                <div id="map-canvasd" ></div>
                <div id="info"></div>
            </div>
           
            
            
<!--            <div class="col-md-8 col-sm-8 no_pad">
                <div class="search-option no_serch">
                   

                    <div class="tab-content">

                        <div id="commercial">
                            <div class="row">
                                <div class="col-md-3 col-sm-5 animated bounce">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <input type="text" id="commlocation" class="form-control" placeholder="Enter Location">
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
                                        <option value="2 lakhs"> $150,000 - $200,000 </option>
                                        <option value="2.5 lakhs"> $200,000 - $250,000 </option>
                                        <option value="3 lakhs"> $250,000 - $300,000 </option>
                                        <option value="4 lakhs"> $300,000 - above </option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3">

                                    <select id="commtypename" class="form-control">
                                        <?php
//                                        $query1 = new Query;
//                                        $query1->select(['typename'])
//                                                ->from('property_type')
//                                                ->where(['undercategory' => 'Commercial']);
//                                        $command1 = $query1->createCommand();
//                                        $data1 = $command1->queryAll();
//
//                                        echo '<option>Property Type</option>';
//                                        foreach ($data1 as $key1 => $datas1) {
//
//                                            echo "<option>" . $datas1['typename'] . "</option>";
//                                        }
                                        ?>                        
                                    </select>

                                </div>
                                <div class="col-md-2 col-sm-1">
                               <?//=   Html::a('<i class="glyphicon glyphicon-plus"></i>', ['my-expectationsajax/create'],
                    ['role'=>'modal-remote','title'=> 'Create new Expectations','class'=>'btn btn-default']) ?>   
                                </div>
                                 <div class="col-md-1 col-sm-1">
                                <button type="button" onclick="residfilter1()" class="btn btn-primary animated bounce"><i class="fa fa-search search1" aria-hidden="true"></i></button>
                            </div>
                            </div>
                        </div>
                        

                    </div>
                    <input type="hidden" value="<?php //echo $userid; ?>" id="username">

                </div>
            </div>-->
            <div class="col-md-8 col-sm-8">
                <div id="searchtab">
    <div class="container"  id="searchtab">
        <div class="row">

<!--             <div class="col-md-12" style="margin-top: 5px;">
                 
                        
                                    <?php//  $searchModel = new MyExpectationsajaxSearch();
                                      //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                    ?>
                                    <?//= Yii::$app->controller->renderPartial('/my-expectationsajax/index',[
                                       'searchModel' => $searchModel,
                                    'dataProvider' => $dataProvider,
                                    ]);
                                    ?>


                                 
             </div>    -->


    
    <div class="sortby clearfix">

  
 
  <div class="col-md-12">
    <div class="buyit">
      <i class="fa fa-thumbs-up" aria-hidden="true"></i><span><a href="#">Shortlist Property</a></span>
    <select id="sortby" onchange="getsorting(this.value)"class="form-control pull-right">
      <option value="nosort">Sort by</option>
      <option value="low">Price: Low to High</option>
      <option value="high">Price: High to Low</option>
      </select>
    </div>
  </div>
</div>





            <div id="removed" class="col-md-12">
                <div id="getprop">

                </div>
            </div>
           
        </div>

    </div>
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


<div class="modal fade" id="draggable2" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="margin-top: 0px;">
            <div class="modal-content">
                <div class="modal-header greenHeader">
                    <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Add Your Expectations</h4>
                </div>

                <div class="modal-body">
                   
				  <form class="form-horizontal" role="form" name="contact-form" id="contact-form" method="post">   
                	<div class="form-body">   
                     <div class="container">
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Save Expectation As *</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Select Auto Cad drawing</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Is the Site Approved for Commercial</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Wet point inside the premises</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Interest free security deposit</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Interest Negotiable</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Agreement</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Agreement Negotiable</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Lease Tenure</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Lease Tenure Negotiable</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Lock in period</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Lock in period Negotiable</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Rent</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Rent Unit</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Rent Negotiable</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Escalation</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Escalation Month</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Escalation Negotiable</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Maintenance</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Maintenance Unit</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Maintenance Hours</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Subject to Change</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Last date for paying rent</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Negotiable</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Fit out period</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Fit out period Negotiable</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Present electricity load</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Can be increased</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Power backup</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Can be discussed</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Carity on meter/submeter</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Separate space for genset/ac outdoor/water tank</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Dedicated car parkings</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Motor for water supply</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Part of Maintenance</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Stamp duty/ Registration Lessor</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
                     <div class="row">
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Stamp duty/ Registration Lessee</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Working hours restriction if any</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Washroom provision inside the premises</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
                <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Usable area Length</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
             <div class="row">
                 <div class="col-md-3">
                    <div class="form-group formpad">
                        <label class="control-label">Usable area Breadth</label>

                                    <input type="text" id="accept"  class="form-control" name="licence">

                    </div>                                
                </div> 
            </div>                                       
            </div>                                       
            </div>                                       
            </div>                                       
                	                  	
                  </form>
                </div>
                <div class="modal-footer" style="border-top:none !important;">
                    <!--<a href="javascript:;" data-dismiss="modal" class="btn continueBtn1">Save</a>-->
					<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px;">
                            <input type="button"  id="sub" value="Submit" class="btn btn-success"></input>
                		    <input type="button"  data-dismiss="modal"  value="Cancel" class="btn btn-danger"></input>
                        </div>
                    </div>
	
                </div>
            </div>
        </div>
    </div>




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
                                           var AreaSqmeter = '45';
                                           
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
                                            var minZoomLevel = 14;
                                 var map = new google.maps.Map(document.getElementById('map-canvasd'), {
                                     center: {
                                         lat: 28.4595,
                                         lng: 77.0266
                                     },
                                     zoom: 12
                                             // mapTypeId: 'satellite'
                                 });
                                                
                                                
                                          ndata = {maxi: maxi,mini : mini,maxiy :maxiy,miniy : miniy,shapes:shapes,location:getsearchlocation,newpath:newpath,area:AreaSqmeter}; 
                                          
                                           $.ajax({
                                                    url: 'getpolymy',
                                                    data: ndata,
                                                    success: function (data) {
                                                      
                                                     //alert(data);
                                                        var obj = $.parseJSON(data);
                                                        

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
                                                                     ((this.request_for == 'direct') ?
                                                                            '<button class="btn btn-default col-md- btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
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

                                                    },
                                                });
                                                }
                                           if(shapes == 'circle'){
                                         
                                          var latcenter = centercoordinates.substr(0, centercoordinates.indexOf(','));
                                          var longcenter =  centercoordinates.substr(centercoordinates.indexOf(",") + 1);
                                       
                                             $.ajax({
                                                    url: 'mapproperty1',
                                                    data: {center:centercoordinates,northeast: northeast,southwest : southwest,latcenter:latcenter,longcenter:longcenter,totalradius:totalradius,shapes:shapes,location:getsearchlocation,area:AreaSqmeter},
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
                                                                     ((this.request_for == 'direct') ?
                                                                            '<button class="btn btn-default col-md- btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
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
                                                    data: {maxim:maxim,minim:minim,maximy:maximy,minimy:minimy,newkuma:newkuma,center:centercord,shapes:shapes,location:getsearchlocation,area:AreaSqmeter},
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
                                                                     ((this.request_for == 'direct') ?
                                                                            '<button class="btn btn-default col-md- btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
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
                                            
                                                
                                                
                                               ndata = {maxi: maxi,mini : mini,maxiy :maxiy,miniy : miniy,shapes:shapes,location:getsearchlocation,newpath:newpath,area:AreaSqmeter}; 
                                            
                                            
                                             $.ajax({
                                                    url: 'getpolymy',
                                                    data: ndata,
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
                                                                     ((this.request_for == 'direct') ?
                                                                            '<button class="btn btn-default col-md- btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
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
                                         
                                           
                                           
                                        $(document).ready(function () {
                                          

                                            var food = getParameterByName('id');
                                         
                                           
                                            if (food == null) {
                                              

                                                $.ajax({
                                                    url: 'petproperty',
                                                    data: {id: 'hello'},
                                                    success: function (data) {

                                                       //alert(data);
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
                                                                     ((this.request_for == 'direct') ?
                                                                            '<button class="btn btn-default col-md- btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
                                                                            :
                                                                            ((this.request_for == 'bid') ?
                                                                                    '<button class="btn btn-default  btnlast" type="button" onclick="bititnow(' + this.id + ')">' +
                                                                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>'
                                                                                    : ''
                                                                                    )) +
                                                                                    
                                                                 '<button class="btn btn-success btnsecond" id="' + this.id + '" onclick="getfreevisit(this.id)" type="button">'+
                                                                 (this.county > 0 ? 'Site Visited': 'Book Site Visit') +
                                                                 
                                                                 '</button>'+
                                                                '<label style="padding-left:15px;padding-right:15px;position: relative;top: 8px;"><button class="btn btnfirst" id="' + this.id + '" onclick="getchecki(this.id)" type="button" alt="Shortlist property"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button></label>' +

               
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
                                                   // alert(data);

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
                                                                     ((this.request_for == 'direct') ?
                                                                            '<button class="btn btn-default col-md- btnsecond" type="submit" onclick="directitnow(' + this.id + ')">' +
                                                                            '<i class="fa fa-shopping-cart" aria-hidden="true"></i>Direct sale</button>'
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
                                              
                                                
                                                if(data == '1'){
                                                    
                                                    
                                                toastr.success('Request for Site Visit has Successfully placed','success');    
                                                }else if(data == '2'){
                                                    
                                                   toastr.success('Request for Site Visit has Successfully placed','success'); 
                                                   toastr.error('Your Free Site Visit Has Already Finished, Please Carry 100 Rs Along with you','error');    
                                                   
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
                                                data: {hardam: id},
                                                success: function (data) {
                                              
                                                if(data == '1'){
                                                    
                                                toastr.error('This Property is Already Shortlisted','error');    
                                                }else{
                                                    toastr.success('Property Shortlisted Successfully','success');   
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
                                                                ((this.requestfor == 'direct') ?
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
                                                url: 'bititnow',
                                                data: {propertyid: id},
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
                                                data: {propertyid: id},
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
 
    


</script>

<script>
    
    $(document).ready(function(){
        
      var tour = new Tour({
          
            steps: window.steps,
            storage: false,
            backdrop:true,
  steps: [
  {
    element: "#pac-input",
    title: "Title of my step",
    content: "Content of my step"
  },
  {
    element: "#map_canvas",
    title: "Title of my step",
    content: "Content of my step",
    placement: "top"
  },
  {
    element: "#addexpectations",
    title: "Title of my step",
    content: "Content of my step"
    
  },
  {
    element: "#searches",
    title: "Title of my step",
    content: "Content of my step"
    
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