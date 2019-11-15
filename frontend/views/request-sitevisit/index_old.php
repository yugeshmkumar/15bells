<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\db\Query ;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\editable\EditableAsset;


EditableAsset::register($this);

use kartik\editable\EditablePjaxAsset;

EditablePjaxAsset::register($this);

use kartik\popover\PopoverXAsset;

PopoverXAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Site Visits';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>

<div class="col-md-12">

    <div class="portlet portlet-sortable sellr_proprty">
        <div class="portlet-title">
          <div class="caption font-green-sharp exp_titl">
                                        
                                        <span class="caption-subject bold uppercase exp_name">Request Site Visit</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>

        </div>
        <div class="portlet-body">

            <div class="addpropertybackend-index">

                <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>   
                <?php
                if($this->beginCache('request-site-visit',['variations'=>$searchModel->request_id])){
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'pjax' => true,
                    'export' => false,
					'options' => ['class' => 'table_common'],
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'kartik\grid\SerialColumn'],
                        
                        //'request_id',
                        //  'user_id',
                        ['attribute' => 'property_id',
                            'label' => 'Property ID',
                            'format' => 'raw',
                            'width' => '120px',
                            'filter' => false,
                            'value' => function($data) {

                                $propid = 273 * 179 - $data->property_id;
                                 return Html::a('<button class="btn btn-default"    data-html="true"  style="width:90px;border-color:white;border:1px solid;"  onclick = "showpropdet('.$data->property_id.')">PR'.$propid.'</button>', $url = 'javascript:void(0)', [
                                                'title' => Yii::t('yii', 'Click to View Property details'),
                                    ]);
                            }
                        ],
                        [
                            'label' => 'Visit Id',
                            'attribute' => 'request_id',
                            'options' => ['style' => 'width:80px;'
                            ],
                        ], 
                        						
                        // 'company_id',
                        //  'visit_type',
                       


                     [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'visit_type',
         'options' => ['style' => 'width:150px;'],
       'pageSummary' => 'Page Total',
	   'label'=>'New Site Visit',
	   'filter'=>false,
        'vAlign'=>'middle',
        //'headerOptions'=>['class'=>'kv-sticky-column'],
        //'contentOptions'=>['class'=>'kv-sticky-column'],
'editableOptions'=> function ($model, $key, $index,$data) {
    return [
        'header'=>'visit_type', 
        'size'=>'ls',
      'value' => 'visit_type',
      'asPopover' => true,
     
    'inputType' => Editable::INPUT_DROPDOWN_LIST,
    'data' => ['online' => 'Online', 'offline' => 'Offline'],
    'header' => 'visit_type',
     'submitOnEnter' => true,
   // 'size'=>'lg',
    'options' => ['class'=>'form-control', 'rows'=>5, 'placeholder'=>'Enter Reason...'],
	'displayValueConfig'=> [
        'online' => '<i class="fa fa-mobile onlinecls"></i> Online',
        'offline' => '<i class="fa fa-handshake-o"></i> Offline',
       
    ],
    ]
	
	;
}    ],
//              [
//                'class'=>'kartik\grid\BooleanColumn',
//                'class' => 'kartik\grid\EditableColumn',
//                'pageSummary' => true,
//                
//
//                'attribute'=>'visit_type', 
//                'vAlign'=>'middle',
//                'editableOptions'=> [
//                        //'format' => Editable::FORMAT_BUTTON,
//                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
//
//                        'data' => ['online' => 'Online', 'offline' => 'Offline'],
//                        'options' => ['class'=>'form-control'], //, 'prompt'=>'status...'],
//                        'displayValueConfig'=> [
//                            '0' => '<i class="glyphicon glyphicon-remove"></i>',
//                            '1' => '<i class="glyphicon glyphicon-ok"></i>',                        
//                        ],
//
//                    ],
//                ],                   
                                //'request_status',
                                [
                                    'label' => 'Status',
                                    'attribute' => 'request_status',
                                    'filter' => false,
                                    'options' => ['style' => 'width:90px;'],
                                    'format' => 'raw',
                                    'value' => function($model) {
                                if ($model->request_status == 'pay_now') {

                                    $visit_type = "'$model->visit_type'";
                                    $request_id = "'$model->request_id'";
                                    return Html::a('<button class="btn btn-warning"  style="width:90px;border-color:white;border:1px solid;"  onclick = "paynowfunc(' . $visit_type . ','.$request_id.')">Pay Now</button>', $url = 'javascript:void(0)', [
                                                'title' => Yii::t('yii', 'Click to Complete'),
                                    ]);
                                } else if ($model->request_status == 'pending') {
                                    return Html::a('<button class="btn btn-info" style="width:90px;border-color:white;border:1px solid;"   value = "10" >Pending</button>', $url = 'javascript:void(0)', []);
                                } else if ($model->request_status == 'paid') {
                                    return Html::a('<button class="btn btn-success" style="width:90px;border-color:white;border:1px solid;"   value = "10" >Paid</button>', $url = 'javascript:void(0)', []);
                                } else {
                                    return Html::a('<button class="btn btn-success" style="width:90px; border-color:white;border:1px solid; background-color: #FF0000;"   value = "10" >Rejected</button>', $url = 'javascript:void(0)', []);
                                }
                            }
                                ],
                                // 'pickup_location:ntext',
                                // 'drop_location:ntext',
                                // 'landmark:ntext',
                                // 'terms_conditions_id',
                                // 'terms_conditions_files',
                                // 'amount_payable',
                                // 'feedback:ntext',
                               [
                                    'label' => 'Scheduled time',
                                    'attribute' => 'scheduled_time',
                                    'filter' => false,
                                    'options' => ['style' => 'width:150px;'],
                                    'format' => 'raw',
                                    'value' => function($model) {
                                      $times = $model->scheduled_time;
                                    if($times == 0){                                        
                                            return  'N/A';
                                    }else{
                                        return $times;
                                    }
                                       }
                                    ],
                                            
                               [
                                    'label' => 'Visit Status',
                                    'attribute' => 'visit_status_confirm',
                                    'filter' => false,
                                    'options' => ['style' => 'width:250px;'],
                                    'format' => 'raw',
                                    'value' => function($model) {
                                      $request_id = "'$model->request_id'";  
                                      $visit_status_confirm = $model->visit_status_confirm;
                                      $scheduled_time = $model->scheduled_time;
                                      date_default_timezone_set("Asia/Calcutta");
                                      $date = date('Y-m-d H:i:s');
                                      
                                    if($scheduled_time != 0 && $scheduled_time > $date){
                                        return 'Visit Scheduled';
                                    }  
                                    if($visit_status_confirm == 'no'){                                        
                                            return  'To be Visited';
                                    }else if($visit_status_confirm == 'userno'){                                        
                                            return  'Visit Scheduled';
                                    
                                    }else if($visit_status_confirm == 'reschedule'){                                        
                                            return  'Rescheduled';
                                    }
                                    else{
                                        return 'Seen  '.Html::a('<button class="btn btn-basic" id ="feedbackreq" onclick="feedback('.$request_id.')" style="margin-left: 27px;padding: 5px;width: 94px;border: 1px solid; !important;"   value = "10"><i class="fa fa-commenting-o" aria-hidden="true"></i> Feedback</button>', $url = 'javascript:void(0)', []);
                                    }
                                       }
                                    ], 
                                            
                                            
                               [
                                    'label' => 'Remove',
                                    'attribute' => 'request_id',
                                    'filter' => false,
                                    'options' => ['style' => 'width:50px;'],
                                    'format' => 'raw',
                                    'value' => function($model) {
                                      $request_id = "'$model->request_id'"; 
                                      
                                  
                                     return Html::a('<button class="btn btn-danger" id ="removereq" onclick="remove('.$request_id.')" style="padding: 5px;width: 94px;border: 1px solid; !important;"   value = "10"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</button>', $url = 'javascript:void(0)', []);
                                    
                                       }
                                    ],              
                                        
                               // 'scheduled_time',
                               // 'visit_status_confirm',
                            // 'created_date',
                            //['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]);
                        Yii::trace('store request site visit table to log');
                        $this->endCache();
                        }
                        ?>
                        <?php Pjax::end(); ?>

            </div></div> </div> 
    <div class="modal fade" id="draggable2" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content data_model">
                <div class="modal-header greenHeader">
                    <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Add Details</h4>
                </div>

                <div class="modal-body">


                    <form role="form">   

                        <div class="row row_pad">
                            <div class="col-sm-5">
                                <label class="control-label lab_form" style="width: 100%;text-align: center;">Pickup Location:</label>
                            </div>

                            <div class="col-sm-5">
                                <select class="form-control" id="sel1">
                                <option>Select City</option>
                                <option value="Gurgaon">Gurgaon</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Noida">Noida</option>
                                <option value="Greater Noida">Greater Noida</option>
                                <option value="Faridabad">Faridabad</option>
                                <option value="Ghaziabad">Ghaziabad</option>
                                </select>
                                <input type="hidden" id="acceptid" value="" class="form-control" name="licence">
                            </div>
                        </div>
                        <div class="row row_pad">
                            <div class="col-sm-5">
                                <label class="control-label lab_form"  style="width: 100%;text-align: center;">Drop Location:</label>
                            </div>

                            <div class="col-sm-5">
                                <select class="form-control" id="sel2">
                                <option>Select City</option>
                                <option value="Gurgaon">Gurgaon</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Noida">Noida</option>
                                <option value="Greater Noida">Greater Noida</option>
                                <option value="Faridabad">Faridabad</option>
                                <option value="Ghaziabad">Ghaziabad</option>
                                </select>
                                <!--<input type="text" id="accept"  class="form-control" name="licence">-->
                                <input type="hidden" id="acceptid1"  class="form-control" name="licence">
                            </div>
                        </div>
                        <div class="row row_pad">
                            <div class="col-sm-5">
                                <label class="control-label lab_form"  style="width: 100%;text-align: center;">Payable Amount:</label>
                            </div>

                            <div class="col-sm-5">
                                <input type="text" id="accepts1"  value="1000" class="form-control" name="licence" readonly>
                                <input type="hidden" id="acceptid2" value="" class="form-control" name="licence">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer" style="border-top:none !important;">
                    <!--<a href="javascript:;" data-dismiss="modal" class="btn continueBtn1">Save</a>-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px;">
                            <input type="button"  onclick="onlinesave()" id="sub" value="Proceed to pay" class="btn btn-success"></input>
                            <input type="button"  data-dismiss="modal"  value="Cancel" class="btn btn-danger"></input>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="draggable4" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content data_model">
                <div class="modal-header greenHeader">
                    <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Pay Online</h4>
                </div>

                <div class="modal-body">


                    <form class="form-horizontal" id="registrationForm">   


                        <div class="row row_pad">
                            <div class="col-sm-3">
                                <label class="control-label lab_form"  style="width: 100%;text-align: center;">Payable Amount:</label>
                            </div>

                            <div class="col-sm-9">
                                <input type="text" id="accepts2"  value="1000" class="form-control" name="licence" readonly>
                                <input type="hidden" id="acceptid" value="" class="form-control" name="licence">
                            </div>
                        </div>
                    <div class="row row_pad">
                        <div class="form-group">
                            <div class="col-sm-3 text-center">
                            <label class="control-label lab_form">Terms of use</label>
                            </div>
                            <div class="col-sm-9">
                                <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">
                                    <p>Lorem ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo mea, est ut graeci definitiones. His ne melius vituperata scriptorem, cum paulo copiosae conclusionemque at. Facer inermis ius in, ad brute nominati referrentur vis. Dicat erant sit ex. Phaedrum imperdiet scribentur vix no, ad latine similique forensibus vel.</p>
                                    <p>Dolore populo vivendum vis eu, mei quaestio liberavisse ex. Electram necessitatibus ut vel, quo at probatus oportere, molestie conclusionemque pri cu. Brute augue tincidunt vim id, ne munere fierent rationibus mei. Ut pro volutpat praesent qualisque, an iisque scripta intellegebat eam.</p>
                                    <p>Mea ea nonumy labores lobortis, duo quaestio antiopam inimicus et. Ea natum solet iisque quo, prodesset mnesarchum ne vim. Sonet detraxit temporibus no has. Omnium blandit in vim, mea at omnium oblique.</p>
                                    <p>Eum ea quidam oportere imperdiet, facer oportere vituperatoribus eu vix, mea ei iisque legendos hendrerit. Blandit comprehensam eu his, ad eros veniam ridens eum. Id odio lobortis elaboraret pro. Vix te fabulas partiendo.</p>
                                    <p>Natum oportere et qui, vis graeco tincidunt instructior an, autem elitr noster per et. Mea eu mundi qualisque. Quo nemore nusquam vituperata et, mea ut abhorreant deseruisse, cu nostrud postulant dissentias qui. Postea tincidunt vel eu.</p>
                                    <p>Ad eos alia inermis nominavi, eum nibh docendi definitionem no. Ius eu stet mucius nonumes, no mea facilis philosophia necessitatibus. Te eam vidit iisque legendos, vero meliore deserunt ius ea. An qui inimicus inciderint.</p>
                                </div>
                            </div>
                        </div>
                </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3 term_selct">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="agree" value="agree" style="position: relative;"/> Agree with the terms and conditions
                                    </label>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer" style="border-top:none !important;">
                    <!--<a href="javascript:;" data-dismiss="modal" class="btn continueBtn1">Save</a>-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px;">
                            <input type="button"  onclick="proceedme()" id="sub" value="Proceed to pay" class="btn btn-success">
                            <input type="button"  data-dismiss="modal"  value="Cancel" class="btn btn-danger">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog seller_exp modal-lg">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Property Details</h4>
					  </div>
					  <div class="modal-body">
							<div class="container-fluid">
                                               
                                                            
                                                            <div class="row">
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Property for</b><br>
											   <span id="property_for"><?php // echo $getlessorexpec->rent;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Property type</b><br>
											   <span id="typename"><?php // echo $getlessorexpec->rent_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Locality</b><br>
											   <span id="locality"><?php // echo $getlessorexpec->auto_cad_drawing;  ?></span>
											 </div>
										   </div>
										 </div>
									</div>
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Total plot area</b><br>
											   <span id="total_plot_area"><?php // echo $getlessorexpec->site_approval;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Asking rental price</b><br>
											   <span id="asking_rental_price">Rs. <?php // echo $getlessorexpec->wet_points;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Price sq ft</b><br>
											   <span id="price_sq_ft"><?php // echo $getlessorexpec->interest_security;  ?></span>
											 </div>
										   </div>
										 </div>
									</div>
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Maintenance cost</b><br>
											   <span id="maintenance_cost"><?php // echo $getlessorexpec->interest_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Availability</b><br>
											   <span id="availability"><?php // echo $getlessorexpec->agreement;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Available from</b><br>
											   <span id="available_from"><?php // echo $getlessorexpec->agreement_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
									</div>
									
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Possesion by</b><br>
											   <span id="possesion_by"><?php // echo $getlessorexpec->lock_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Buildup area</b><br>
											   <span id="buildup_area"><?php // echo $getlessorexpec->escalation_value;  ?></span>
											 </div>
										   </div>
										 </div>
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Carpet area</b><br>
											   <span id="carpet_area"><?php // echo $getlessorexpec->escalation_month;  ?></span>
											 </div>
										   </div>
										 </div>
									   </div>
									<div class="col-md-12 veiw_property_description_div">
										 <div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Furnished status</b><br>
											   <span id="furnished_status"><?php // echo $getlessorexpec->escalation_negotiable;  ?></span>
											 </div>
										   </div>
										 </div>
										 
										 
									</div>
									
									
									
								</div>
                                                        
                                                            
                                                            
                                                            
							</div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>

				  </div>
				</div>
    <div class="modal fade" id="draggable6" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content data_model">
                <div class="modal-header greenHeader">
                    <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Add Feedback</h4>
                </div>

                <div class="modal-body" style="padding:0 15px !important;">

                    <form class="form-horizontal" id="registrationForm"> 

                        <div class="row row_pad">
                           <div class="col-md-12">
                                <label class="lab_form feed_bck" for="comment">Your Valuable Feedback:</label>
                                <input type="hidden" id="feedhidden">
                                <textarea class="form-control" rows="5" id="comment" placeholder="Write your feedback....."></textarea>
                           </div>                                                                                      
                        </div>
                    

                       

                    </form>
                </div>
                <div class="modal-footer" style="border-top:none !important;">
                    <!--<a href="javascript:;" data-dismiss="modal" class="btn continueBtn1">Save</a>-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px;">
                            <input type="button"  onclick="addfeedback()" id="sub" value="Submit" class="btn btn-success">
                            <input type="button"  data-dismiss="modal"  value="Cancel" class="btn btn-danger">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- POPOVER Content  -->


<div id="popover-content" class="hide">
  <h4 class="visit_hed">Edit Visit Type</h4>
  <div class="col-md-12 visit_t">
  <p>
  <select class="form-control" id="sel1">
    <option>Select</option>
    <option>Online</option>
    <option>Offline</option>
    </select>
  </p>
  <p class="text-right">
  <button id="qwert" class="btn btn-warning">
  Save
  </button>
  </p>
  </div>
</div>


<!-- POPOVER Content Ends-------------->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

<script>
    
                                 $(document).ready(function(){
                                     
                                     checkuserconfirmstatus();
					
                                 });
                                 
    
                                function checkuserconfirmstatus(){
                                    
                                     $.ajax({
						                        type: "POST",
                                                url: 'request-sitevisit/checkuserconfirmstatus',
                                                data: {id: 'ready'},
                                                dataType: 'json',
                                                success: function (data) {
                                                   
                                               
                                                 var scheduledtime =  data[1];
                                                 var now = new Date();
                                                 var d = new Date( scheduledtime);
                                                 var nowTime = now.getHours()*60+now.getMinutes();
                                                 
                                                    d.setSeconds(d.getSeconds() + 10);
                                                 var dateTime = d.getHours()*60+d.getMinutes()+ d.getSeconds();
                                                  var returnid = data[0];
                                                  
                                                    if (returnid != '0') {

                                                       
                                                       if (nowTime > dateTime) {
                                                           
                                                        swal({
                                                        title: "Have you Visited your Site ?",
                                                        text: "",
                                                        icon: "success",
                                                        closeOnClickOutside: false,
                                                        //confirmButtonColor: "#DD6B55",
                                                         //buttons: ["Not Visited!", "Visited!"],
                                                        buttons: {
                                                        cancel: "Not Visited",
                                                        catch: {
                                                        text: "Reschedule",
                                                        value: "reschedule",
                                                        },
                                                        visited: true,
                                                        },
                                                        dangerMode: true,
                                                        })
                                                        .then((willDelete) => {
                                                           
                                                        if (willDelete == 'visited') {
                                                        swal("You have Successfully Confirmed your Site Visit!", {
                                                        icon: "success", 
                                                        });
                                                        confirm('yes',returnid);
                                                        }else if (willDelete == 'reschedule') {
                                                        swal("Your Site Visit Will be Reschedule!"); 
                                                        confirm('reschedule',returnid);
                                                        }
                                                        else {
                                                        swal("Please share your Feedback!"); 
                                                        confirm('userno',returnid);
                                                        }
                                                        });


                                                         

                                                    }


                                                    }                                                 
                                                   

                                                },
                                            }); 
                                 }
                                 
                                 function confirm(status,returnid){
                                    
                                      $.ajax({
						                       type: "POST",
                                                url: 'request-sitevisit/confirmstat',
                                                data: {id: returnid, status :status},
                                                success: function (data) {                                                 
                                                 $.pjax({container: '#pjax-grid-view'})  
                                                },
                                            });
                                 }
    
                                function paynowfunc(visit_type,id) {
                                   
                                    
                                     $('#acceptid1').val(id);
                                     $('#acceptid2').val(id);
                                    if (visit_type == 'online') {
                                        $('#draggable4').modal('show');
                                        
                                    } else if (visit_type == 'offline'){                                       
                                        $('#draggable2').modal('show');
                                    }else{
                                       toastr.error('Please Select Visit type', 'error'); 
                                    }
                                    //alert(visit_type);

                                }

                                function proceedme() {
                                    
                                    var ids = $('#acceptid2').val();
                                    var amount_payable = $('#accepts2').val();
                                    if ($('input[name="agree"]:checked').length > 0) {

                                        $.ajax({
						type: "POST",
                                                url: 'request-sitevisit/offlinepickdropsave',
                                                data: {id: ids,amount_payable:amount_payable},
                                                success: function (data) {
                                                 
                                                  
                                                    if (data == '1') {
                                                        toastr.success('Location Successfully Saved', 'success');
                                                        $('#draggable4').modal('hide');
                                                        $.pjax({container: '#pjax-grid-view'})
                                                    }                                                    
                                                    else {
                                                        toastr.error('Internal Error', 'error');
                                                    }

                                                },
                                            }); 

                                    } else {
                                        toastr.error('Please Accept the Terms & Conditions', 'error');
                                    }

                                }
                                
                                function onlinesave(){
                                  var pickup = $('#sel1').val(); 
                                  var drop = $('#sel2').val(); 
                                  var ids = $('#acceptid1').val();
                                  var amount_payable = $('#accepts1').val();
                                  
                                  
                                  if(pickup == 'Select City' ){                                      
                                     toastr.error('Please Enter pickup location', 'error'); 
                                  }
                                   if(drop == 'Select City' ){                                      
                                     toastr.error('Please Enter Drop location', 'error'); 
                                  }
                                   if(pickup != 'Select City' && drop != 'Select City' ){
                                       
                                       
                                     $.ajax({
						type: "POST",
                                                url: 'request-sitevisit/onlinepickdropsave',
                                                data: {id: ids,pickup : pickup,drop:drop,amount_payable:amount_payable},
                                                success: function (data) {
                                                 
                                                  
                                                    if (data == '1') {
                                                        toastr.success('Location Successfully Saved', 'success');
                                                        $('#draggable2').modal('hide');
                                                         $.pjax({container: '#pjax-grid-view'})
                                                    }                                                    
                                                    else {
                                                        toastr.error('Internal Error', 'error');
                                                    }

                                                },
                                            });  
                                    
                                  }
                                    
                                }
                                
                                
                                function feedback(id){
                                   $('#draggable6').modal('show');                                   
                                   $('#feedhidden').val(id);
                                   $.ajax({
						type: "POST",
                                                url: 'request-sitevisit/showfeedback',
                                                data: {id: id},
                                                success: function (data) { 
                                                    
                                                   $('#comment').val(data); 
                                                },
                                            });
                                   
                                }
                                
                                function addfeedback(){                                    
                                   var hiddenfeed = $('#feedhidden').val();
                                   var comment = $('#comment').val();
                                   if(comment !=''){
                                   
                                   $.ajax({
						type: "POST",
                                                url: 'request-sitevisit/addfeedback',
                                                data: {id: hiddenfeed,comment : comment},
                                                success: function (data) {
                                                 
                                                  
                                                    if (data == '1') {
                                                        toastr.success('Location Successfully Saved', 'success');
                                                        $('#draggable6').modal('hide');
                                                         $.pjax({container: '#pjax-grid-view'})
                                                    }                                                    
                                                    else {
                                                        toastr.error('Internal Error', 'error');
                                                    }

                                                },
                                            }); 
                                            
                                }else{
                                    
                                   toastr.error('Please Enter Feedback', 'error'); 
                                }
                                  
                                    
                                }
                                
                                
                                function remove(id){
                                    $.ajax({
						type: "POST",
                                                url: 'request-sitevisit/removesite',
                                                data: {id: id},
                                                success: function (data) {
                                                 
                                                  
                                                    if (data == '1') {
                                                        toastr.success('Successfully Removed from site visit', 'success');
                                                        
                                                         $.pjax({container: '#pjax-grid-view'})
                                                    }else if (data == '2'){
                                                      toastr.error('You Cannot Remove this site Visit', 'error');  
                                                    }                                                    
                                                    else {
                                                        toastr.error('Internal Error', 'error');
                                                    }

                                                },
                                            }); 
                                }
								
								function changeonline(id){
									
									$("[data-toggle=popover]").popover({
											html: true, 
											content: function() {
												  return $('#popover-content').html();
												}
										});
								}



                                        function showpropdet(id){
                                                              
                                                                $('#myModal').modal('show'); 
                                                                $.ajax({
                                                                type: "POST",
                                                                url: 'addproperty/showpropdetails',
                                                                data: {id: id},
                                                                success: function (data) {
                                                                   var obj = $.parseJSON(data);
                                                                    $.each(obj, function(element) {
                                                                        
                                                                   $('#property_for').html(this.property_for);
                                                                   $('#typename').html(this.typename);
                                                                   $('#locality').html(this.locality);
                                                                   $('#total_plot_area').html(this.total_plot_area);
                                                                   $('#asking_rental_price').html(this.asking_rental_price);
                                                                   $('#price_sq_ft').html(this.price_sq_ft);
                                                                   $('#maintenance_cost').html(this.maintenance_cost);
                                                                   $('#availability').html(this.availability);
                                                                   $('#available_from').html(this.available_from);
                                                                   $('#possesion_by').html(this.possesion_by);
                                                                   $('#buildup_area').html(this.buildup_area);
                                                                   $('#carpet_area').html(this.carpet_area);
                                                                   $('#furnished_status').html(this.furnished_status);
                                                                    });
                                                                    
                                                                 
                                                                  },
                                                                });

                                                        }
								
								



</script>    
