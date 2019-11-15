

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

         $totalCSR = Yii::$app->db->createCommand('SELECT id,employee_email FROM company_emp  where name= "CSR Supply"')->queryAll();
         $arrayleads = array();
         

         $arrayl['country'] = 'Data';
         $arrayl['visits'] = Yii::$app->db->createCommand('SELECT count(*) FROM addproperty_onepage_form  where lead_source= "data"')->queryScalar();
         
         $arrayls['country'] = 'Advertisements';
         $arrayls['visits'] = Yii::$app->db->createCommand('SELECT count(*) FROM addproperty_onepage_form  where lead_source= "adv"')->queryScalar();
         
         $arrayle['country'] = 'Social';
         $arrayle['visits'] = Yii::$app->db->createCommand('SELECT count(*) FROM addproperty_onepage_form  where lead_source= "social"')->queryScalar();
         
         $arraylr['country'] = 'Phone Calls';
         $arraylr['visits'] = Yii::$app->db->createCommand('SELECT count(*) FROM addproperty_onepage_form  where lead_source= "phone"')->queryScalar();

         $arrayleads[] = $arrayl;
         $arrayleads[] = $arrayls;
         $arrayleads[] = $arrayle;
         $arrayleads[] = $arraylr;
         



        // echo '<pre>';print_r($arrayleads);die;
       $lead_source_json  =  $json_datas =   json_encode($arrayleads);

         global $totalCount;
         global $totalCount1;
         global $totalCount2;
         global $totalCount3;

         $array3 = array();
        
         foreach($totalCSR as $totalCSRs){
             
        //  $user_id = $totalCSRs;
        //  $querys = common\models\CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $totalCSRs['id'];            
         $array2['country'] = $totalCSRs['employee_email'];            
         $array2['value'] = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where company_employee_id= "'.$assigned_id.'"')->queryScalar();      
         $totalCount += Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where company_employee_id= "'.$assigned_id.'"')->queryScalar();      
         $totalCount1 += Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where property_status= "active" and company_employee_id= "'.$assigned_id.'"')->queryScalar();      
         $totalCount2 += Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where property_status= "inactive" and company_employee_id= "'.$assigned_id.'"')->queryScalar();      
         $totalCount3 += Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where site_visit= "done" and company_employee_id= "'.$assigned_id.'"')->queryScalar();      
         $array3[] = $array2;
         }         


                 $json_data =   json_encode($array3);
         
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
<div class="container-fluid p-0">
<div class="col-sm-12 p-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0"></h5>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>CSR Names</th>
                                                <th>Total Leads</th>
                                                <th>Inactive Leads</th>
                                                <th>Site Visit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
          <?php
          $totalCSRt = Yii::$app->db->createCommand('SELECT id,employee_email FROM company_emp  where name= "CSR Supply"')->queryAll();
          global $count;
          foreach($totalCSRt as $totalCSRse){

          $assigned_id = $totalCSRse['id'];            
          $employee_emails = $totalCSRse['employee_email'];   
          $count += 1;                   
          $totalCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where company_employee_id= "'.$assigned_id.'"')->queryScalar();      
          $totalCount1 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where property_status= "active" and company_employee_id= "'.$assigned_id.'"')->queryScalar();      
          $totalCount2 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where property_status= "inactive" and company_employee_id= "'.$assigned_id.'"')->queryScalar();      
          $totalCount3 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where site_visit= "done" and company_employee_id= "'.$assigned_id.'"')->queryScalar();      
          
            

          ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $employee_emails; ?></td>
                                                <td><span class="text-danger text-semibold"> <?php echo $totalCount; ?></span> </td>
                                                <td><span class="text-danger text-semibold"> <?php echo $totalCount2; ?></span> </td>
                                                <td><span class="text-danger text-semibold"> <?php echo $totalCount3; ?></span> </td>
                                            </tr>
                                            

                                            <?php } ?>
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
<script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv1", am4charts.PieChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in


chart.data = <?php echo $json_data;  ?>
// chart.data = [
//   {
//     country: "Lithuania",
//     value: 20
//   },
//   {
//     country: "Czech Republic",
//     value: 20
//   },
//   {
//     country: "Ireland",
//     value: 20
//   },
//   {
//     country: "Germany",
//     value: 20
//   },
// //   {
// //     country: "Australia",
// //     value: 20
// //   },
// //   {
// //     country: "Austria",
// //     value: 20
// //   }
// ];
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

chart.data =  <?php  echo $lead_source_json; ?>
// chart.data = [{
//   "country": "data",
//   "visits": 4025
// }, {
//   "country": "Adv",
//   "visits": 1882
// }, {
//   "country": "Social",
//   "visits": 1809
// },  {
//   "country": "Tedwork",
//   "visits": 338
// }];

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