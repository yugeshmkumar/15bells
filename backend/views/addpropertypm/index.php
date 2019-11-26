<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\editable\Editable;
//use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Property Management');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>
 <style>.slotsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .slotsambqwkstalkbubble:before {  }</style> <style>.slotsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.slotsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:22%;  left:32%; top:17%; bottom:7%; z-index:1015; overflow:hidden; overflow-x:hidden}</style>
 
  <style>.createslotsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .cretaeslotsambqwkstalkbubble:before {  }</style> <style>.createslotsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.createslotsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:30%; top:26%; bottom:26%; z-index:1015; overflow:hidden; overflow-x:hidden}</style>
  
 
<div id="slotsambqwksukvveekmuzqtsimaccffxx" class="slotsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="slotsambqwksukvveekmuzqtsimabbffxx" class="slotsambqwksukvveekmuzqtswhevbbff"  > <div id="sch2" class="slotsambqwkstalkbubble">
 
 </div> </div>
 <div id="slotsambq" class="slotsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="slotsamb" class="slotsambqwksukvveekmuzqtswhevbbff"  > <div id="vie1" class="slotsambqwkstalkbubble">
 
 </div> </div>
 
 <div id="createslotsambqwksukvveekmuzqtsimaccffxx" class="createslotsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="createslotsambqwksukvveekmuzqtsimabbffxx" class="createslotsambqwksukvveekmuzqtswhevbbff"  > <div id="csolo2" class="createslotsambqwkstalkbubble">
 </div> </div>

                            <div class="portlet portlet-sortable light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-green-sharp">
                                        <i class="fa fa-building font-green-sharp"></i>
                                        <span class="caption-subject bold uppercase"> Property Management</span>
                                        <span class="caption-helper">details...</span>
                                    </div>
                               <div class="actions">
							  
                                        
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                     
									<div class="addpropertybackend-index">
                                    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
        $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
             ['class' => 'kartik\grid\CheckboxColumn',
             'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
			
[
'class' => 'kartik\grid\ExpandRowColumn',
'expandAllTitle' => 'Expand all',
'collapseTitle' => 'Collapse all',
'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
'value' => function ($model, $key, $index, $column) {
return GridView::ROW_COLLAPSED;
},
'detailUrl' => yii\helpers\Url::to(['addpropertypm/views']),
'detailRowCssClass' => GridView::TYPE_DEFAULT,
'pageSummary' => false,
],


           // 'id',
            // ['attribute'=>'user_id',
			//   'label'=>'Lead Details',
			//   'format'=>'raw',
			//   'width'=>'250px',
			//   'value'=>function($data){
			// 	  return \common\models\User::findOne($data->user_id)->username;
			//   }
			
            // ],
            
            [
                'label'=> 'Mobile No.',
                'attribute' => 'user_id',
                'width'=>'150px',
                'value' => 'username.username'

            ],

            [
                'label'=> 'Owner Name',
                'attribute' => 'role_id',
                'width'=>'150px',
                'value' => 'username.fullname'

            ],


			// ['attribute'=>'role_id',
			//   'label'=>'Lead Role',
			//   'format'=>'raw',
			//   'width'=>'100px',
			//   'value'=>function($data){
			// 	  return $data->role_id;
			//   }
			
			// ],
			['attribute'=>'locality',
			  'label'=>'Locality',
			  'format'=>'raw',
			  'width'=>'280px',
			  'value'=>function($data){
				  return $data->locality;
			  }
			
            ],
            
            ['attribute'=>'super_area',
			  'label'=>'Super Area',
			  'format'=>'raw',
			  'width'=>'100px',
			  'value'=>function($data){
				  return $data->super_area;
			  }
			
			],
			['attribute'=> 'property_for',
			  'label'=>'Request Type',
			  'format'=>'raw',
              'width'=>'110px',
              'filter'=>array("both"=>"Both","rent"=>"Rent","sale"=>"Sale"),
			  'value'=>function($data){
				  return $data->property_for;
			  }
			
			],
			
			['attribute'=>'project_type_id',
			  'label'=>'Property Type',
			   'filter' => Html::activeDropDownList($searchModel, 'project_type_id', \yii\Helpers\ArrayHelper::map(\common\models\PropertyType::find()->asArray()->all(), 'id', 'typename'),['class'=>'form-control','prompt' => 'Select..']),
                
			   	   
			  'format'=>'raw',
			  'width'=>'180px',
			  'value'=>function($data){
				  return \common\models\PropertyType::findOne($data->project_type_id)->typename;
			  }
			
            ],
            

            [
                'label'=> 'Building name',
                'attribute' => 'project_name',
                'width'=>'150px',
                'value' => 'buildingname.building_name'

            ],
			
			// ['attribute'=>'request_for',
			//   'label'=>'Request For',
			//   'format'=>'raw',
			//   'width'=>'100px',
			//   'value'=>function($data){
			// 	  return $data->request_for;
			//   }
			
            // ],

            // ['attribute'=>'status',
			//   'label'=>'Property_status',
			//   'format'=>'raw',
			//   'width'=>'100px',
			//   'value'=>function($data){
			// 	  return $data->status;
			//   }
			
            // ],
            

			// ['attribute'=>'id',
			//   'label'=>'Actions',
			//   'format'=>'raw',
			//   'width'=>'100px',
			//   'value'=>function($data){
			// 	  return ' <div class="page-toolbar">
            //                 <div class="btn-group pull-right">
            //                     <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
            //                         <i class="fa fa-angle-down"></i>
            //                     </button>
            //                     <ul class="dropdown-menu pull-right" role="menu">
                                   
            //                         <li>
            //                             <a onclick = "myfunctionapprove('.$data->id.')" >
            //                                 <i class="fa fa-file-text"></i> Approve Property Docs</a>
            //                         </li>
			// 						<li>
            //                             <a onclick = "myfunctionreview('.$data->id.')" >
            //                                 <i class="fa fa-archive"></i> Review User Expectations</a>
            //                         </li>
            //                         <li>
            //                             <a onclick = "myfunctionsite('.$data->id.')" >
            //                                 <i class="fa fa-user"></i>  Review Site Visits</a>
            //                         </li>
			// 						 <li>
            //                             <a onclick = "myfunctiondocs('.$data->id.')" >
            //                                 <i class="fa fa-file-word-o"></i>  Schedule Document View</a>
            //                         </li>
									
            //                         <li class="divider"> </li>
            //                         <li>
			// 						  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffmjkkl&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffmjkl&#39;).style.display=&#39;block&#39;,myfunctioncomment('.$data->user_id.')">
            //                            <i class="fa fa-plus"></i>  Add Comment</a>
            //                         </li>
			// 						<li>
            //                             <a onclick = "myfunctionemail('.$data->id.')" >
            //                                 <i class="fa fa-envelope"></i>  Send E-mail</a>
            //                         </li>
			// 						<li>
            //                             <a onclick = "myfunctionsms('.$data->id.')" >
            //                                 <i class="fa fa-tty"></i>  Send SMS</a>
            //                         </li>
            //                     </ul>
            //                 </div>
            //             </div>
            //         </div>';
			//   }
			
            // ],
            ['class' => 'yii\grid\ActionColumn'],
      ];

    //   echo  ExportMenu::widget([
    //     'dataProvider' => $dataProvider,
        
    //     'columns' => $gridColumns,
    //     'columnSelectorOptions'=>[
    //         'label' => 'Columns',
    //         'class' => 'btn btn-danger'
    //     ],
    //     'fontAwesome' => true,
    //     'dropdownOptions' => [
    //         'label' => 'Export All',
    //         'class' => 'btn btn-primary'
    //     ],
    //     'exportConfig' => [
    // ExportMenu::FORMAT_HTML => false,
    // ExportMenu::FORMAT_TEXT => false,
    // ],
    // ]);

echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns
]); ?>

</div></div> </div> 
<script>
		function myfunctionapprove(str){
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addpropertypm/p_docs/']) ?>?id='+str, '_blank');
  win.focus();
}
</script>	
<script>
		function myfunctionreview(str){
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addpropertypm/p_expect/']) ?>?id='+str, '_blank');
  win.focus();
}
</script>
<script>
		function myfunctionsite(str){
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addpropertypm/p_visits/']) ?>?id='+str, '_blank');
  win.focus();
}
</script>
<script>
		function myfunctiondocs(str){
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['addpropertypm/p_sitedocs/']) ?>?id='+str, '_blank');
  win.focus();
}
</script>	


<script>

function myfunctioncomment(str){
              
    
         $.ajax({

                type: "GET",
				url: "<?php echo Yii::$app->urlManager->createUrl(["addpropertypm/writecommentforuser"]) ?>?id="+str,
                 success: function(msg){
				
                    $('#vpcobh2').html(msg);
				
                  
                }

            });

}

</script>		

<script>
function scheduledocshow(str){	

var fields = $("input[name='chkd[]']").serializeArray(); 
var sak=fields.length;
$.ajax({
type: "GET",
url: "<?php echo Yii::$app->urlManager->createUrl(["supervisor/scheduleformtwo"]) ?>?totalchk="+sak+"&refstr="+str,
success: function(msg){
$('#sch2').html(msg);}});}
</script>
<script>

function cslotwo(str){	
            $.ajax({

                type: "GET",
			
			url: "<?php echo Yii::$app->urlManager->createUrl(["eventschedule/createeventtwo"]) ?>?refstr="+str,
			
                
                success: function(msg){
				$('#csolo2').html(msg);
                  
                }

            });

}

</script>


<script>


function slotconttwo(str){	
          var evname=$('#ev1').val();
		  var evfromd=$('#ev2').val();
		  var evtomd=$('#ev3').val();
		  
		  var evdes=$('#ev4').val();
		  var evven=$('#ev5').val();
		  var evcap=$('#ev6').val();
		  var evorg=$('#ev7').val();



$.ajax({

                type: "GET",
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["eventschedule/addconttwo"]) ?>?evname="+evname+"&evfromd="+evfromd+"&evtomd="+evtomd+"&evdes="+evdes+"&evven="+evven+"&evcap="+evcap+"&evorg="+evorg+"&refstr="+str,
				
			
                
                success: function(msg){
				$('#csolo1uu').html(msg);
                  
                }

            });
			
			

}

</script>
<script type='text/javascript'>

function jamsslot(act) 
{ 
var fields = $("input[name='chkd[]']").serializeArray(); 
  if (fields.length == 0) 
  { 
    alert('Select atleast one checkbox'); 
    // cancel submit
    return false;
  } 
  else 
  { 
  
  
  var selectslot= document.getElementById("selectslot").value;
  var holder= document.getElementById("holder").value;
  
   var checkValues = $("input[name='chkd[]']:checked").map(function()
            {
                return $(this).val();
            }).get();

data= { ids:checkValues , act: act , selectslot: selectslot , holder: holder   }

  actionsocket(data);    
  }
}

</script>

<script type='text/javascript'>
   function actionsocket(data){    
   
var url= '<?php echo Yii::$app->urlManager->createUrl(["supervisor/mainactions"]) ?>';

	$.ajax({
     type: "POST",
     url: url,
     data: data,
     success: function(msg) {	
     location.reload();
     }
});
  
   }
	</script>		  