

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
</style>


<!-- HTML -->
<div class="container-fluid">
    <div class="row">

        
        <div class="col-lg-3 col-md-6">
              <div class="card">
                     <div class="col-md-4">
                        <i class="fa fa-calendar icon_d icon_b"></i>
                     </div> 
                     <div class="col-md-8">
                     <?php
         $user_id = Yii::$app->user->identity->id;
         $querys = common\models\CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;            
         $totalCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where company_employee_id= "'.$assigned_id.'"')->queryScalar();      
         $totalCount1 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where property_status= "active"')->queryScalar();      
         $totalCount2 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where property_status= "inactive"')->queryScalar();      
         $totalCount3 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where site_visit= "done"')->queryScalar();      

                     ?>
                        <p class="no_cont"><?php echo $totalCount; ?></p>
                        <p class="card_hed">Total Leads</p>
                     </div>      
               </div>

      </div>
        <div class="col-lg-3 col-md-6">
              <div class="card">
                     <div class="col-md-4">
                        <i class="fa fa-gear icon_d icon_g"></i>
                     </div> 
                     <div class="col-md-8">
                        <p class="no_cont"><?php echo $totalCount1; ?></p>
                        <p class="card_hed">Active</p>
                     </div>      
               </div>

      </div>
        <div class="col-lg-3 col-md-6">
              <div class="card">
                     <div class="col-md-4">
                        <i class="fa fa-user icon_d"></i>
                     </div> 
                     <div class="col-md-8">
                        <p class="no_cont"><?php echo $totalCount2; ?></p>
                        <p class="card_hed">Inactive</p>
                     </div>      
               </div>

      </div>

      <div class="col-lg-3 col-md-6">
              <div class="card">
                     <div class="col-md-4">
                        <i class="fa fa-user icon_d"></i>
                     </div> 
                     <div class="col-md-8">
                        <p class="no_cont"><?php echo $totalCount3; ?></p>
                        <p class="card_hed">Site Visit</p>
                     </div>      
               </div>

      </div>
</div>
<div class="container-fluid pad50">
    <div class="col-md-5" style="padding-left:0;">
        <div id="chartdiv2"></div>
    </div>
    <div class="col-md-7" style="padding-right:0;">
        <div id="chartdiv1"></div>
    </div>
    
</div>
<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<!-- Chart code -->
<!-- Chart code -->
<script>
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
...
<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
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
</script>

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