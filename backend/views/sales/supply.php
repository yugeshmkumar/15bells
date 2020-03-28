<?php 

use yii\db\Query;
use common\models\CompanyEmp;

?>


<style>
#chartdiv1 {
  width: 100%;
  height: 350px;
  background:#ffffff;
}
#chartdiv2 {
  width: 100%;
  height: 350px;
  background:#ffffff;
}
.card{
    background:#ffffff;
    width:100%;
    float:left;
    padding:14px 10px;
}
.icon_d{
    width: 50px;
    height: 50px;
    background: #00c292;
    text-align: center;
    font-size: 23px;
    color: #fff;
    padding-top: 17px;
    border-radius: 50%;
    margin-top:5px;
}
.no_cont{
    margin:0;
    font-size:24px;
    color:inherit;
    font-family: 'Poppins', sans-serif;
}
.card_hed{
    margin:0;
    color:#6c757d;
    font-size:16px;
    font-family: 'Poppins', sans-serif;
}
.icon_b{
    background:#01c0c8 !important;
}
.icon_g{
    background:#e46a76 !important;
}
.pad50{
    padding:50px 0;
}
.p-0{
padding:0;
}


#chartdiv {
  width: 100%;
  height: 500px;
}
</style>


<!-- HTML -->
<div class="container-fluid">
    <!-- <div class="row">

        <div class="col-lg-3 col-md-6">
              <div class="card">
                     <div class="col-md-4">
                        <i class="fa fa-user icon_d"></i>
                     </div> 
                     <div class="col-md-8">
                        <p class="no_cont">3500</p>
                        <p class="card_hed">New Customer</p>
                     </div>      
               </div>

      </div>
        <div class="col-lg-3 col-md-6">
              <div class="card">
                     <div class="col-md-4">
                        <i class="fa fa-calendar icon_d icon_b"></i>
                     </div> 
                     <div class="col-md-8">
                        <p class="no_cont">3500</p>
                        <p class="card_hed">New Products</p>
                     </div>      
               </div>

      </div>
        <div class="col-lg-3 col-md-6">
              <div class="card">
                     <div class="col-md-4">
                        <i class="fa fa-gear icon_d icon_g"></i>
                     </div> 
                     <div class="col-md-8">
                        <p class="no_cont">3500</p>
                        <p class="card_hed">New Customer</p>
                     </div>      
               </div>

      </div>
        <div class="col-lg-3 col-md-6">
              <div class="card">
                     <div class="col-md-4">
                        <i class="fa fa-user icon_d"></i>
                     </div> 
                     <div class="col-md-8">
                        <p class="no_cont">3500</p>
                        <p class="card_hed">New Customer</p>
                     </div>      
               </div>

      </div>
</div> -->
    <!-- <div class="col-md-5" style="padding-left:0;">
        <div id="chartdiv2"></div>
    </div> -->
    <div class="col-md-12" style="padding-right:0;">
        <div id="chartdiv"></div>
    </div>
    

<div class="container-fluid p-0">
<div class="col-sm-12 p-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">order List</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Total Amount</th>
                                                <th>Payment recieved</th>
                                                <th>Property ID</th>
                                                <th>Client</th>
                                                <th>Owner</th>
                                            </tr>
                                        </thead>

                                        <?php 

                                        $user_id = Yii::$app->user->identity->id;
                                        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
                                        $assigned_id = $querys->id;
                                         $getclient12 = new Query;
                                         $getclient12->select('*')
                                                     ->from('revenue')                    
                                                     ->where(['sales_executive_id' => $assigned_id]);
                                         $commandf2frevenue = $getclient12->createCommand();
                                         $paymentf2frevenue = $commandf2frevenue->queryAll();                           
                                 
                                 
                                        
                                        
                                        ?>


                                        <tbody>

                                        <?php 
                                        $count = 0;
                                         foreach($paymentf2frevenue  as $paymentf2frevenues){

                                          $clientname = common\models\User::findOne($paymentf2frevenues['client_id'])->fullname;
                                          $ownername = common\models\User::findOne($paymentf2frevenues['owner_id'])->fullname;

                                        $count += 1;
                                        ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $paymentf2frevenues['client_total_amount'] + $paymentf2frevenues['owner_total_amount']; ?></td>
                                                <td><span class="text-danger text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> <?php echo ($paymentf2frevenues['client_total_amount'] - $paymentf2frevenues['client_pending_amount']) + ($paymentf2frevenues['owner_total_amount'] - $paymentf2frevenues['owner_pending_amount']); ?></span> </td>
                                                <td><span class="text-danger text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> <?php echo $paymentf2frevenues['property_id']; ?></span> </td>
                                                <td><span class="text-danger text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> <?php echo $clientname; ?></span> </td>
                                                <td><span class="text-danger text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> <?php echo $ownername; ?></span> </td>
                                            </tr>
                                           
                                           <?php 
                                           }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<!-- Chart code -->
<!-- Chart code -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




<!-- Chart code -->
<script>





var backenddata = "";
var getunitglobal = "";

getsalesdata();




  am4core.ready(function(){

   


// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);


// Add data
chart.data = backenddata;


// chart.data = [
// {
//   "year": "Suspect",
//   "shortlist": 60,
//   "client": 10,
// }, {
//   "year": "Prospect",
//   "sitevisit": 40,
//   "client": 8,
  
// },{
//   "year": "Analyse",
//   "EMD": 2,
//   "F2F": 4,
//   "client": 6
// },{
//   "year": "Closure",
//   "EMD": 1,
//   "F2F": 3,
//   "client": 4,
//    "revenue": 50.9
// }
// ];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.grid.template.location = 0;


var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = true;
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;

// Create series
function createSeries(field, name) {
  
  // Set up series
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.name = name;
  series.dataFields.valueY = field;
  series.dataFields.categoryX = "year";
  series.sequencedInterpolation = true;
  
  // Make it stacked
  series.stacked = true;
  
  // Configure columns
  series.columns.template.width = am4core.percent(60);
  series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";
  
  // Add label
  var labelBullet = series.bullets.push(new am4charts.LabelBullet());
  labelBullet.label.text = "{valueY}";
  labelBullet.locationY = 0.5;
  labelBullet.label.hideOversized = true;
  chart.scrollbarX = new am4core.Scrollbar();

  return series;
}
createSeries("client", "Client");

createSeries("shortlist", "Shortlist");
createSeries("sitevisit", "Site visit");
createSeries("EMD", "EMD");
createSeries("F2F", "F2F");

if(getunitglobal  == 'K'){
createSeries("revenue", "Revenue( In Thousands)");
  }
  if(getunitglobal  == 'Lacs'){
createSeries("revenue", "Revenue( In Lacs)");
  }
  if(getunitglobal  == 'Cr'){
createSeries("revenue", "Revenue( In Cr)");
  }

// Legend
chart.legend = new am4charts.Legend();

}); // end am4core.ready()


function getsalesdata(){

$.ajax({
          type: "GET",
          url: 'getsalesdata',
          data: {yes:'yes'},
          //dataType: 'json',
          success: function (data) { 

          var  removeditems =  $.parseJSON(data).splice(0,1);

          var  removeditemss =  $.parseJSON(data).splice(1,4);
          var myJSONs = JSON.stringify(removeditemss);

          var getunit =  removeditems[0].amounttowords;

          backenddata = removeditemss; 
          getunitglobal =  getunit;
          // alert(backenddata); 

            
          }
});



}


</script>





<!-- <script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv1", am4charts.PieChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.data = [
  {
    country: "Lithuania",
    value: 401
  },
  {
    country: "Czech Republic",
    value: 300
  },
  {
    country: "Ireland",
    value: 200
  },
  {
    country: "Germany",
    value: 165
  },
  {
    country: "Australia",
    value: 139
  },
  {
    country: "Austria",
    value: 128
  }
];
chart.radius = am4core.percent(70);
chart.innerRadius = am4core.percent(40);
chart.startAngle = 180;
chart.endAngle = 360;  

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "value";
series.dataFields.category = "country";

series.slices.template.cornerRadius = 10;
series.slices.template.innerCornerRadius = 7;
series.slices.template.draggable = true;
series.slices.template.inert = true;
series.alignLabels = false;

series.hiddenState.properties.startAngle = 90;
series.hiddenState.properties.endAngle = 90;

chart.legend = new am4charts.Legend();
</script>


Dataviz
Material
Kelly's
Dark
Frozen
Moonrise Kingdom
Spirited Away
+
Open in:
3D Column Chart
Demo source
JavaScript
TypeScript / ES6
... -->
<!-- Styles -->
<!-- <style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style> -->
<!-- 

<script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.XYChart3D);

// Add data
chart.data = [{
  "country": "Online",
  "visits": 4025
}, {
  "country": "Adv",
  "visits": 1882
}, {
  "country": "Website",
  "visits": 1809
},  {
  "country": "Tedwork",
  "visits": 338
}];

// Create axes
let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.renderer.labels.template.hideOversized = false;
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.tooltip.label.rotation = 270;
categoryAxis.tooltip.label.horizontalCenter = "right";
categoryAxis.tooltip.label.verticalCenter = "middle";

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Lead Source";
valueAxis.title.fontWeight = "bold";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries3D());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
columnTemplate.stroke = am4core.color("#FFFFFF");

columnTemplate.adapter.add("fill", (fill, target) => {
  return chart.colors.getIndex(target.dataItem.index);
})

columnTemplate.adapter.add("stroke", (stroke, target) => {
  return chart.colors.getIndex(target.dataItem.index);
})

chart.cursor = new am4charts.XYCursor();
chart.cursor.lineX.strokeOpacity = 0;
chart.cursor.lineY.strokeOpacity = 0;
</script> -->

<!-- HTML -->

<script>
history.pushState(null, null, location.href);
   window.onpopstate = function () {
       history.go(1);
   };
</script>











<script>
history.pushState(null, null, location.href);
   window.onpopstate = function () {
       history.go(1);
   };
</script>