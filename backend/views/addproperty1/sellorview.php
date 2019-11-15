<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\editable\Editable;
use yii\db\Query;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Property Management');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>
 <!--<div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
 <?//php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
						//if($checkrole->item_name == "Company_user") {  ?> 
						 <a href="<?//php echo Yii::$app->urlManager->createUrl(['site/couserdash']) ?>">Home</a><?php/// } else { ?>
    <a href="<?//php echo Yii::$app->urlManager->createUrl(['site/userdash']) ?>">Home</a>
						<?//php } ?>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>User</span>
								<i class="fa fa-circle"></i>
                            </li>
							 <li>
                                <span>SELLER VIEW</span>
                            </li>
                        </ul>
                        
                    </div>-->
<style>
.table-striped > tbody > tr{
	color:#ffffff !important;
	background:rgba(255,255,255,0.25) !important;
}
.sellr_proprty .kv-grid-table thead{
	    background-color: #d4d4d4;
		color:#000000 !important;
}
.sellr_proprty .kv-grid-table thead a{
		color:#000000 !important;
}
.summary {
	color:#ffffff !important;
}
.table-striped > tbody > {
	color:#ffffff !important;
}
.form-control{
	border-radius:10px !important;
}
.portlet>.portlet-title>.caption{
	padding:15px 0 0 0 !important;
	color:#ffffff !important;
}
.portlet-title{
	border-bottom:3px solid #e5ac31 !important;
}
.panel-group .panel {
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #212121;
        background-color: #FAFAFA;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #EEEEEE;
    }
	.prop_shortlst{
				top:15%;
			}
			.prop_shortlst .modal-content{
				border-radius:5px !important;
			}
			.prop_shortlst .modal-content{
				background:#e6e1e1;
			}
			.prop_shortlst .modal-header{
				    border-bottom: 3px solid #e5ac31;
			}
			.anchr_tab{
				color:#ffffff !important;
				    background: #2196F3;
			}
			.veiw_property_description_row{
          margin: 20px 0px;
    }
    .veiw_property_description_row p{
      font-size: 17px;
      border-bottom: 2px solid #ffba00;
      font-weight: 600;
      font-family: 'Roboto', sans-serif;
      color: #fff;
      display: table;
    }
    .veiw_property_description_div{
      background-color:#ccd6da;
      padding: 10px 0px;
    }
    .veiw_property_description_div b{
      font-size: 14px;
      font-family: 'Roboto', sans-serif;
      color: #000;
    }
    .veiw_property_description_div span{
      font-size: 13px;
      font-family: 'Roboto', sans-serif;
      color: #000;
    }
    .veiw_property_description_div img{
      padding-top: 13px;
    }
    .veiw_property_description_div_inner{
      border-left: 2px solid #ffba00;
      margin: 5px 0px;
      overflow: hidden;
    }
	.table .table{
		background:transparent !important;
	}
	.table .btn{
		border-radius:5px !important;
	}
</style>
                    <!-- END PAGE BAR -->
					<div class="col-md-9">
    
                            <div class="portlet portlet-sortable">
                                <div class="portlet-title">
                                    <div class="caption font-green-sharp">
                                       
                                        <span class="caption-subject bold uppercase"> My Properties</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>
                               <!--<div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                    </div>-->
                                </div>
                                <div class="portlet-body">
                                     
									<div class="addpropertybackend-index sellr_proprty">


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'responsive'=>false,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
[
'class' => 'kartik\grid\ExpandRowColumn',
'expandAllTitle' => 'Expand all',
'collapseTitle' => 'Collapse all',
'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
'value' => function ($model, $key, $index, $column) {
return GridView::ROW_COLLAPSED;
},
'detailUrl' => yii\helpers\Url::to(['addproperty/viewmy']),
'detailRowCssClass' => GridView::TYPE_DEFAULT,
'pageSummary' => false,
],
           // 'id',
//            ['attribute'=>'user_id',
//			  'label'=>'Lead Details',
//			  'format'=>'raw',
//			  'width'=>'250px',
//			  'value'=>function($data){
//				  return \common\models\User::findOne($data->user_id)->email;
//			  }
//			
//			],
//			['attribute'=>'role_id',
//			  'label'=>'Lead Role',
//			  'format'=>'raw',
//			  'width'=>'100px',
//			  'value'=>function($data){
//				  return $data->role_id;
//			  }
//			
//			],
			//['attribute'=>'project_name',
			 // 'label'=>'Project Name',
			 // 'format'=>'raw',
			 // 'width'=>'200px',
			 // 'value'=>function($data){
				//  return $data->project_name;
			 // }
			
			//],
                        //'locality:ntext',
                        // 'address:ntext',        
			['attribute'=> 'address',
			  'label'=>'Address',
			  'format'=>'raw',
			  'width'=>'110px',
			  'value'=>function($data){
				  return $data->address;
			  }
			
			],
			
//			['attribute'=>'project_type_id',
//			  'label'=>'Property Type',
//			   'filter' => Html::activeDropDownList($searchModel, 'project_type_id', \yii\Helpers\ArrayHelper::map(\common\models\PropertyType::find()->asArray()->all(), 'id', 'typename'),['class'=>'form-control','prompt' => 'Select..']),
//                
//			   	   
//			  'format'=>'raw',
//			  'width'=>'250px',
//			  'value'=>function($data){
//				  return \common\models\PropertyType::findOne($data->project_type_id)->typename;
//			  }
//			
//			],
			
			['attribute'=>'request_for',
			  'label'=>'Request For',
			  'format'=>'raw',
			  'width'=>'100px',
			  'value'=>function($data){
				  return $data->request_for;
			  }
			
			],
                                
                       [
                            'label' => 'Visitors',
                            'attribute' => 'id',
                            'filter' => false,
                            'options' => ['style' => 'width:90px;'],
                            'format' => 'raw',
                             'value' => function($model,$data) {
                            $user_id = Yii::$app->user->identity->id;
                            $query = (new Query())->select('COUNT(*) as newcount')->from('user_view_properties')->where(['property_id' => $model->id]);
                            $command = $query->createCommand();
                            $data= $command->queryOne();											

                            if ($data){
                            return Html::a('<button class="btn btn-success" value = "" style="width:97px;" onclick = ""><b>'.$data['newcount'].' </b>Visitors</button>', $url = 'javascript:void(0)',[
                                                    'title' => Yii::t('yii', 'Total Visitors'),
                            ]);
                            }

                            }
		      ],
                              
                      [
                            'label' => 'Shortlist',
                            'attribute' => 'id',
                            'filter' => false,
                            'options' => ['style' => 'width:90px;'],
                            'format' => 'raw',
                             'value' => function($model,$data) {
                            $user_id = Yii::$app->user->identity->id;
                            $query = (new Query())->select('COUNT(*) as newcount')->from('shortlistproperty')->where(['property_id' => $model->id]);
                            $command = $query->createCommand();
                            $data= $command->queryOne();											

                            if ($data){
                            return Html::a('<button class="btn btn-primary" value = "" style="width:97px;" onclick = "togleShort('.$model->id.')"><b>'.$data['newcount'].'</b> Shortlist</button>', $url = 'javascript:void(0)',[
                                                    'title' => Yii::t('yii', 'Total Shortlist'),
                            ]);
                            }

                            }
		      ],
                     [
                            'label' => 'Site Visit',
                            'attribute' => 'id',
                            'filter' => false,
                            'options' => ['style' => 'width:90px;'],
                            'format' => 'raw',
                             'value' => function($model,$data) {
                            $user_id = Yii::$app->user->identity->id;
                            $query = (new Query())->select('COUNT(*) as newcount')->from('request_site_visit')->where(['property_id' => $model->id]);
                            $command = $query->createCommand();
                            $data= $command->queryOne();											

                            if ($data){
                            return Html::a('<button class="btn btn-danger" value = "" style="width:97px;" onclick = "togleBid('.$model->id.')"><b>'.$data['newcount'].' </b>SiteVisit</button>', $url = 'javascript:void(0)',[
                                                    'title' => Yii::t('yii', 'Total Site Visit'),
                            ]);
                            }

                            }
		      ],
                              
                     [
                            'label' => 'Transactions',
                            'attribute' => 'id',
                            'filter' => false,
                            'options' => ['style' => 'width:150px;'],
                            'format' => 'raw',
                             'value' => function($model,$data) {
                            $user_id = Yii::$app->user->identity->id;
                             $query = (new Query())->select('COUNT(*) as newcount')->from('requested_biding_users')->where(['propertyID' => $model->id])->andwhere(['userid'=>$user_id]);
                            $command = $query->createCommand();
                            $data= $command->queryOne();											

                            if ($data){
                            return Html::a('<button class="btn btn-warning" value = "" style="width:110px;" onclick = "togleTransact('.$model->id.')"><b>'.$data['newcount'].'</b> Transactions</button>', $url = 'javascript:void(0)',[
                                                    'title' => Yii::t('yii', 'Total Transactions'),
                            ]);
                            }

                            }
		      ],          
			//['class' => 'yii\grid\ActionColumn'],
       ],
    ]); ?>

</div></div> </div> 
				  
</div>
                    
                    
<div id="shortlist" class="modal fade" role="dialog">
  <div class="modal-dialog prop_shortlst modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        
<div id="appenddata">
        
        </div>

        

<!--        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed anchr_tab" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Collapsible Group Item #3
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>-->

    </div><!-- panel-group -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>

function togleShort(id) { 
    
	$("#shortlist").modal('show');
        $('#appenddata').html(''); 
        
      $.ajax({
          
         url:'getuserids',
         data:{id:id},
         success: function(data){
          //alert(data); 
          var obj = $.parseJSON(data);
          var countprop = Object.keys(obj).length;
          if(countprop == 0){
           $('#appenddata').html('No User has Shortlisted this Property Yet');    
          }
                                                        
          
          $.each(obj,function(){
              
              
           var usercustomid = this.user_id * 23 * 17 +'A';   
           $('#appenddata').append(
                   
               '<div class="panel panel-default">'+
            '<div class="panel-heading" role="tab" id="headingOne">'+
                '<h4 class="panel-title">'+
                    '<a class="anchr_tab" onclick="expectationdata('+this.user_id+')" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne'+this.id+'" aria-expanded="true" aria-controls="collapseOne">'+
                        '<i class="more-less glyphicon glyphicon-plus"></i> User Id #'+ usercustomid +                       
                    '</a>'+ 
                '</h4>'+ 
            '</div>'+ 
            '<div id="collapseOne'+this.id+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">'+
                '<div class="panel-body" id="expecdata_'+this.user_id+'">'+ 
                   
                 +expectationdata('+this.user_id+')+

            '</div>'+
        '</div>');   
          });
             
         },
      });  
        
}
function togleTransact(id) { 
    
	$("#shortlist").modal('show');
        $('#appenddata').html(''); 
        
      $.ajax({
          
         url:'getbiduserids',
         data:{id:id},
         success: function(data){
          //alert(data); 
          var obj = $.parseJSON(data);
          var countprop = Object.keys(obj).length;
          if(countprop == 0){
           $('#appenddata').html('No User has made transactions for  this Property');    
          }
                                                        
          
          $.each(obj,function(){
              
              
           var usercustomid = this.user_id * 23 * 17 +'A';   
           $('#appenddata').append(
                   
               '<div class="panel panel-default">'+
            '<div class="panel-heading" role="tab" id="headingOne">'+
                '<h4 class="panel-title">'+
                    '<a class="anchr_tab" onclick="expectationdata('+this.user_id+')" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne'+this.id+'" aria-expanded="true" aria-controls="collapseOne">'+
                        '<i class="more-less glyphicon glyphicon-plus"></i> User Id #'+ usercustomid +                       
                    '</a>'+ 
                '</h4>'+ 
            '</div>'+ 
            '<div id="collapseOne'+this.id+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">'+
                '<div class="panel-body" id="expecdata_'+this.user_id+'">'+ 
                   
                 +expectationdata('+this.user_id+')+

            '</div>'+
        '</div>');   
          });
             
         },
      });  
        
}


function togleBid(id) { 
    
	$("#shortlist").modal('show');
        $('#appenddata').html(''); 
        //alert(id);
      $.ajax({
          
         url:'getsiteuserids',
         data:{id:id},
         success: function(data){
          //alert(data); 
          var obj = $.parseJSON(data);
          var countprop = Object.keys(obj).length;
          if(countprop == 0){
           $('#appenddata').html('No User has Placed a Bidfor this Property');    
          }
                                                        
          
          $.each(obj,function(){
              
              
           var usercustomid = this.user_id * 23 * 17 +'A';   
           $('#appenddata').append(
                   
               '<div class="panel panel-default">'+
            '<div class="panel-heading" role="tab" id="headingOne">'+
                '<h4 class="panel-title">'+
                    '<a class="anchr_tab" onclick="expectationdata('+this.user_id+')" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne'+this.request_id+'" aria-expanded="true" aria-controls="collapseOne">'+
                        '<i class="more-less glyphicon glyphicon-plus"></i> User Id #'+ usercustomid +                       
                    '</a>'+ 
                '</h4>'+ 
            '</div>'+ 
            '<div id="collapseOne'+this.request_id+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">'+
                '<div class="panel-body" id="expecdata_'+this.user_id+'">'+ 
                   
                 +expectationdata('+this.user_id+')+

            '</div>'+
        '</div>');   
          });
             
         },
      });  
        
}

function expectationdata(id){

 $.ajax({
          
         url:'getexpectationdata',
         data:{id:id},
         success: function(data){
         
        var obj = jQuery.parseJSON(data);
        //alert( obj.expected_rate);
         
          
         $("#expecdata_"+id).html('');    
         $("#expecdata_"+id).append('<div class="col-md-12 veiw_property_description_div">'+ 
                '<div class="col-md-4">'+ 
                  '<div class="row">'+ 
                        '<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>'+
                        '<div class="col-sm-10 veiw_property_description_div_inner">'+ 
                          '<b>Expected Rate</b><br>'+ 
                          '<span> Rs '+obj.expected_rate+'</span>'+ 
                        '</div>'+ 
                  '</div>'+ 
                '</div>'+ 
                '<div class="col-md-4">'+
                  '<div class="row">'+
                        '<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>'+
                        '<div class="col-sm-10 veiw_property_description_div_inner">'+
                          '<b>Rate negotiable</b><br>'+
                          '<span>'+obj.rate_negotiable+'</span>'+
                        '</div>'+
                  '</div>'+
                '</div>'+
                '<div class="col-md-4">'+
                  '<div class="row">'+
                        '<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>'+
                        '<div class="col-sm-10 veiw_property_description_div_inner">'+
                          '<b>Payment time</b><br>'+
                          '<span>'+obj.payment_time+'</span>'+
                        '</div>'+
                  '</div>'+
                '</div>'+
       '</div>'+
       '<div class="col-md-12 veiw_property_description_div">'+
                '<div class="col-md-4">'+
                  '<div class="row">'+
                        '<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>'+
                        '<div class="col-sm-10 veiw_property_description_div_inner">'+
                          '<b>Payment time negotiable</b><br>'+
                          '<span>'+obj.payment_time_negotiable+'</span>'+
                        '</div>'+
                  '</div>'+
                '</div>'+
       
                '<div class="col-md-4">'+
                  '<div class="row">'+
                        '<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>'+
                        '<div class="col-sm-10 veiw_property_description_div_inner">'+
                          '<b>Loan against property</b><br>'+
                          '<span>'+obj.loan_against_property+'</span>'+
                        '</div>'+
                  '</div>'+
                '</div>'+
       
                '<div class="col-md-4">'+
                  '<div class="row">'+
                        '<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>'+
                        '<div class="col-sm-10 veiw_property_description_div_inner">'+
                          '<b>All dues cleared</b><br>'+
                          '<span>'+obj.all_dues_cleared+'</span>'+
                        '</div>'+
                  '</div>'+
                '</div>'+
       '</div>'+
        '<div class="col-md-12 veiw_property_description_div">'+
                '<div class="col-md-4">'+
                  '<div class="row">'+
                        '<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>'+
                        '<div class="col-sm-10 veiw_property_description_div_inner">'+
                          '<b>Vastu facing</b><br>'+
                          '<span>'+obj.vastu_facing+'</span>'+
                        '</div>'+
                  '</div>'+
                '</div>'+
      
                '<div class="col-md-4">'+
                  '<div class="row">'+
                        '<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>'+
                        '<div class="col-sm-10 veiw_property_description_div_inner">'+
                          '<b>Loan to be applied</b><br>'+
                          '<span>'+obj.loan_to_be_applied+'</span>'+
                        '</div>'+
                  '</div>'+
                '</div>'+
      
                '</div>');

   
             
         }
         
        });



}

function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>                    
