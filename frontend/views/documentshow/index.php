<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\editable\EditableAsset;
use yii\db\Query;
use common\models\MediaFilesConfig;
use common\models\MediaFiles;

$urlsd =   Yii::getAlias('@frontendUrl');
//EditableAsset::register($this);

//use kartik\editable\EditablePjaxAsset;

//EditablePjaxAsset::register($this);

//use kartik\popover\PopoverXAsset;

//PopoverXAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Document Shows';
$this->params['breadcrumbs'][] = $this->title;
?>


<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}
.close{
		position:absolute !important;
		right:25px !important;
	}
	.modal-dialog{
		top:25%;
	}
	.anchr_tab {
		font-size:18px;
	}
	.document_nam{
		    text-align: center;
    padding: 4px 10px 8px 10px;
    background: #10101d;
    color: #fff;
    border-radius: 5px;
    margin: 8px;
    }
   .btn_docs{
	   color:#ffffff;
	background:#10101d !important;
	border-color:#10101d;
	margin:0 10px;
   }
   .veiw_property_description_div .col-md-4{margin:5px 0}
   @media screen and (max-height: 650px) {
	   .modal-dialog{
		top:10%;
	}
   }
</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div>
 <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > 
 <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>


<div class="col-md-9">

    <div class="portlet portlet-sortable sellr_proprty">
        <div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						 <h2 class="dashboard_head">Document Show</h2>
					</div>
					
                
            </div>
        </div>
        <div class="portlet-body padd_docs">

            <div class="addpropertybackend-index">

            <input type="hidden" id="urlget" value="<?php echo $urlsd; ?>">

                <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>   
                <?php
                if($this->beginCache('document-show',['variations'=>$searchModel->id])){
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
					'options' => ['class' => 'table_common'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        //'request_id',
                        //'user_id',
                        //'property_id',
                        ['attribute' => 'property_id',
                            'label' => 'Property ID',
                            'format' => 'raw',
                          //  'width' => '70px',
                            'filter' => false,
                            'value' => function($data) {

                                $propid = 273 * 179 - $data->property_id;
                                return Html::a('<button class="btn btn-default"   id="propertyidprop" data-html="true"  style="width:90px;border-color:#c4984f;border:1px solid #c4984f; "  onclick = "showpropdet(' . $data->property_id . ')">PR' . $propid . '</button>', $url = 'javascript:void(0)', [
                                            'title' => Yii::t('yii', 'Click to View Property details'),
                                ]);
                            }
                                ],
                                // 'payment_status',
                            //     [
                            //         'label' => 'Payment Status',
                            //         'attribute' => 'payment_status',
                            //         'filter' => false,
                            //         'options' => ['style' => 'width:150px;'],
                            //         'format' => 'raw',
                            //         'value' => function($model) {
                            //     if ($model->payment_status == 'pay_now') {


                            //         $request_id = "'$model->request_id'";
                            //         $documnt_id = "'$model->id'";
                            //         $property_id = "'$model->property_id'";

                            //         return Html::a('<button class="btn btn-warning"  id="paymentprop" style="width:90px;border-color:white;border:1px solid;"  onclick = "paynowfunc(' . $request_id . ',' . $documnt_id . ',' . $property_id . ')">Pay Now</button>', $url = 'javascript:void(0)', [
                            //                     'title' => Yii::t('yii', 'Click to Complete'),
                            //         ]);
                            //     } else if ($model->payment_status == 'pending') {
                            //         return Html::a('<button class="btn btn-info" id="paymentprop" style="width:90px;border-color:white;border:1px solid;"   value = "10" >Pending</button>', $url = 'javascript:void(0)', []);
                            //     } else if ($model->payment_status == 'paid') {
                            //         return Html::a('<button class="btn btn-success" id="paymentprop" style="width:90px;border-color:white;border:1px solid;"   value = "10" >Paid</button>', $url = 'javascript:void(0)', []);
                            //     } else {
                            //         return Html::a('<button class="btn btn-success" id="paymentprop" style="width:90px; border-color:white;border:1px solid; background-color: #FF0000;"   value = "10" >Rejected</button>', $url = 'javascript:void(0)', []);
                            //     }
                            // }
                            //     ],
//                        [
//                            'label' => 'Document Name',
//                            'attribute' => 'id',
//                            'filter' => false,
//                            'options' => ['style' => 'width:150px;'],
//                            'format' => 'raw',
//                            'value' => function($model) {
//                            
//                                   $request_id = "'$model->id'";
//
//                                        return 'Adhar Card';
//                    }
//                        ],
                                [
                                    'label' => 'Document Name',
                                    'attribute' => 'id',
                                    'filter' => false,
                                    'options' => ['style' => 'width:350px;'],
                                    'format' => 'raw',
                                    'value' => function($model, $data) {

                                $query = (new Query())->select('media_id')->from('media_files_config')->where(['property_id' => $model->property_id]);
                                $command = $query->createCommand();
                                $datas = $command->queryAll();

                                $ids = [];
                                for ($i = 0; $i <= count($datas) - 1; $i++) {
                                    $ids[] = $datas[$i]['media_id'];
                                }
//                                                        echo '<pre>';print_r($ids);die;
                                if (!empty($datas)) {
                                    $sum = array();
                                    $docnames = MediaFiles::find()->where(['id' => $ids])->andwhere(['<>','type','webp'])->all();


                                    foreach ($docnames as $request) {
                                        $type1 = $request->type;
                                        if ($type1 != 'jpeg' && $type1 != 'jpg' && $type1 != 'png') {
                                        $sum[] = $request->file_descr;
                                        }
                                    }
                                    $names = implode(',', $sum);
                                    return "<b>$names<b>";
                                } else {
                                    return '<b>No Documents<b>';
                                }
                            }
                                ],
                                //  'payable_amount',
                                // ['attribute' => 'payable_amount',
                                //     'label' => 'Payable Amount',
                                //     'format' => 'raw',
                                //     'width' => '130px',
                                //     'value' => function($data) {
                                //         return $data->payable_amount . ' <i class="fa fa-inr" aria-hidden="true"></i>';
                                //     }
                                // ],
                                [
                                    'label' => 'Link to View Doc',
                                    'attribute' => 'id',
                                    'filter' => false,
                                    'options' => ['style' => 'width:200px;'],
                                    'format' => 'raw',
                                    'value' => function($model) {
                                $request_id = $model->id;
                                $payment_status = $model->payment_status;
                                $property_id = $model->property_id;
                                $user_id = Yii::$app->user->identity->id;

                              //  if ($payment_status == 'paid') {
                                    return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid #c4984f;background:#c4984f !important;border-radius:0;" onclick="viewdocs(' . $property_id . ')" >Click to view Docs</button>', $url = 'javascript:void(0)', []);
                              
                            }
                                ],


                                [
                                    'label' => 'Arrange Meeting',
                                    'attribute' => 'id',
                                    'filter' => false,
                                    'options' => ['style' => 'width:200px;'],
                                    'format' => 'raw',
                                    'value' => function($model) {
                                $request_id = $model->id;                                
                                $property_id = $model->property_id;
                                $user_id = Yii::$app->user->identity->id;
                                $userid = $model->user_id;

                                $query = Yii::$app->db->createCommand("SELECT count('*') as counts from sales_f_2_f where buyer_id='$userid' and property_id='$property_id' ")->queryAll();

                                
                                if ($query[0]['counts'] > 0 ) {
                                    return Html::a('<button class="btn btn-default" style="width:135px; border-color:white;border:1px solid;" >Moved to F2F</button>', $url = 'javascript:void(0)', []);
                                } else {
                                    return Html::a('<button class="btn btn-info" style="width:135px; border-color:white;border:1px solid;" onclick="movetof2f(' . $property_id . ',' . $userid . ')" >Move to F2F</button>', $url = 'javascript:void(0)', []);
                                }



                                   // return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid #c4984f;background:#c4984f !important;border-radius:0;" onclick="arrangemeeting(' . $property_id . ')" >Arrange Meeting</button>', $url = 'javascript:void(0)', []);
                              
                            }
                                ],


                            //     [
                            //         'label' => 'Move to EMD',
                            //         'attribute' => 'id',
                            //         'filter' => false,
                            //         'options' => ['style' => 'width:200px;'],
                            //         'format' => 'raw',
                            //         'value' => function($model, $data) {
                            //     $request_id = $model->id;
                            //     $payment_status = $model->payment_status;
                            //     $property_id = $model->property_id;
                            //     $docshowid = $model->id;
                            //     $user_id = Yii::$app->user->identity->id;
                            //     if ($payment_status == 'paid') {

                            //         $query = (new Query())->select('*')->from('request_emd')->where(['user_id' => $user_id])->andwhere(['property_id' => $property_id])->andwhere(['status' => 1]);
                            //         $command = $query->createCommand();
                            //         $data = $command->queryAll();

                            //         if ($data) {
                            //             return Html::a('<button class="btn btn-default" id="movetoemddocs" style="border-color:#0fd8da !important;border:1px solid ;" >Moved to EMD</button>', $url = 'javascript:void(0)', []);
                            //         } else {
                            //             return Html::a('<button class="btn btn-info" id="movetoemddocs" style="border-color:#0fd8da !important;border:1px solid;" onclick="movetoemd(' . $property_id . ',' . $docshowid . ')" >Move to EMD</button>', $url = 'javascript:void(0)', []);
                            //         }
                            //     } else {
                            //         return "N/A";
                            //     }
                            // }
                            //     ],
                            // 'status',
                            // 'created_date',
                            //['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]);
                        Yii::trace('store document show table to log');
                        $this->endCache();
                        }
                        ?>
                        <?php Pjax::end(); ?>

                    </div></div> </div></div>
                

                <!-- Modal -->
<div class="modal fade" id="myModal1"  role="dialog">
  <div class="modal-dialog modal-lg" style="top:-3%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Document Show</h4> 
      </div>
      <div class="modal-body">
        <div style="text-align: center;">
<iframe id="exactiframe" src="#" 
style="width:100%; height:500px;" frameborder="0"></iframe>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
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
										<div class="row">
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Property for</b><br>
														<span id="property_for"><?php // echo $getlessorexpec->rent;   ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Property type</b><br>
														<span id="typename"><?php // echo $getlessorexpec->rent_negotiable;   ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Locality</b><br>
														<span id="locality"><?php // echo $getlessorexpec->auto_cad_drawing;   ?></span>
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                    <div class="col-md-12 veiw_property_description_div">
										<div class="row">
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Total plot area</b><br>
														<span id="total_plot_area"><?php // echo $getlessorexpec->site_approval;   ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Asking rental price</b><br>
														<span id="asking_rental_price">Rs. <?php // echo $getlessorexpec->wet_points;   ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Price sq ft</b><br>
														<span id="price_sq_ft"><?php // echo $getlessorexpec->interest_security;   ?></span>
													</div>
												</div>
											</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 veiw_property_description_div">
										<div class="row">
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Maintenance cost</b><br>
														<span id="maintenance_cost"><?php // echo $getlessorexpec->interest_negotiable;   ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Availability</b><br>
														<span id="availability"><?php // echo $getlessorexpec->agreement;   ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Available from</b><br>
														<span id="available_from"><?php // echo $getlessorexpec->agreement_negotiable;   ?></span>
													</div>
												</div>
											</div>
										</div>
                                    </div>

                                    <div class="col-md-12 veiw_property_description_div">
										<div class="row">
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Possesion by</b><br>
														<span id="possesion_by"><?php // echo $getlessorexpec->lock_negotiable;   ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Buildup area</b><br>
														<span id="buildup_area"><?php // echo $getlessorexpec->escalation_value;   ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-6">
												<div class="row">
													<div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
													<div class="col-sm-10 veiw_property_description_div_inner">
														<b>Carpet area</b><br>
														<span id="carpet_area"><?php // echo $getlessorexpec->escalation_month;   ?></span>
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                    <div class="col-md-12 veiw_property_description_div">
										<div class="row">
                                        <div class="col-md-4 col-6">
                                            <div class="row">
                                                <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                <div class="col-sm-10 veiw_property_description_div_inner">
                                                    <b>Furnished status</b><br>
                                                    <span id="furnished_status"><?php // echo $getlessorexpec->escalation_negotiable;   ?></span>
                                                </div>
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
                <div class="modal-dialog modal-lg">
                    <div class="modal-content data_model">
                        <div class="modal-header greenHeader">
                            <h4 class="modal-title textShadowHeading">View Documents</h4>
                        </div>

                        <div class="col-md-12 document_s mt-4" style="display: block;">
                           
                            <div id="showpropdoc" class="row m-0">

                            </div>





                        </div>
                        <div class="modal-footer" style="border-top:none !important;">
                            <!--<a href="javascript:;" data-dismiss="modal" class="btn continueBtn1">Save</a>-->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px;">

                                    <input type="button"  data-dismiss="modal"  value="Close" class="btn btn-danger">
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


                            <!--<form class="form-horizontal" id="registrationForm">-->   
                            <div class="row">
                                <!-- You can make it whatever width you want. I'm making it full width
                                on <= small devices and 4/12 page width on >= medium devices -->
                                <div class="col-xs-12 col-md-12">


                                    <!-- CREDIT CARD FORM STARTS HERE -->
                                    <div class="panel panel-default credit-card-box">
                                        <div class="panel-heading display-table" >
                                            <div class="row display-tr" >
                                                <h3 class="panel-title display-td" style="margin-left: 10px;">Payment Details</h3>
                                                <div class="display-td" >                            
                                                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class="panel-body pader">
                                            <form role="form" id="payment-form">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="cardNumber">CARD NUMBER</label>
                                                            <div class="input-group">
                                                                <input 
                                                                    type="tel"
                                                                    class="form-control"
                                                                    name="cardNumber"
                                                                    placeholder="Valid Card Number"
                                                                    autocomplete="cc-number"
                                                                    required autofocus 
                                                                    />
                                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                            </div>
                                                        </div>                            
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-7 col-md-7">
                                                        <div class="form-group">
                                                            <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                            <input 
                                                                type="tel" 
                                                                class="form-control" 
                                                                name="cardExpiry"
                                                                placeholder="MM / YY"
                                                                autocomplete="cc-exp"
                                                                required 
                                                                />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 col-md-5 pull-right">
                                                        <div class="form-group">
                                                            <label for="cardCVC">CV CODE</label>
                                                            <input 
                                                                type="tel" 
                                                                class="form-control"
                                                                name="cardCVC"
                                                                placeholder="CVC"
                                                                autocomplete="cc-csc"
                                                                required
                                                                />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="couponCode">COUPON CODE</label>
                                                            <input type="text" class="form-control" name="couponCode" />
                                                        </div>
                                                    </div>                        
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <button onclick="proceedtobuy()" class="btn btn-success btn-lg btn-block" type="button">Proceed to Checkout</button>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <button class="btn btn-danger btn-lg btn-block" data-dismiss="modal" value="Cancel">Cancel</button>
                                                    </div>
                                                </div>
                                                <div class="row" style="display:none;">
                                                    <div class="col-xs-12">
                                                        <p class="payment-errors"></p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>            
                                    <!-- CREDIT CARD FORM ENDS HERE -->


                                </div>            



                            </div>    


                            <!--</form>-->
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade" id="draggablenew" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content data_model modal_pay">
                    

                 <div class="modal-body">

                        <button type="button" class="close clos_bid" data-dismiss="modal">&times;</button>
                    <div class="container">
                        <div class="row">
                        <input type="hidden" id="acceptidnew" value="" class="form-control" name="licence">
                            <div class="col-md-12">
                                <div class="row prop_list">
                                    <div class="col-md-12 pt-4 pl-0 pb-0 pr-0">
                                        <h5 class="prpr_hed mb-3 text-center">Document Show</h5>
                                        <p class="pror_detl p-3"><span class="lite_clr">Description :</span> There is a very low level of trust with the Buyer�s / Lessee�s, when it comes</p>
                                        <p class="doc_pric text-center"><i class="fa fa-inr"></i> 500</p>
                                        <p class="pror_detl p-3" ><span class="lite_clr">Property ID : </span><span id="appendpropid"></span></p>
                                        <button class="btn btn-info full_wdth" onclick="proceedme()">Pay Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      </div>  
                    </div>
                
            </div>
        </div>
    </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            



            <script>

$(document).ready(function() {
   
//     $(document).bind("contextmenu",function(e){
//    return false;
//  });

//  document.onkeydown = function(e) {
//         if (e.ctrlKey && 
//             (e.keyCode === 67 || 
//              e.keyCode === 86 || 
//              e.keyCode === 85 || 
//              e.keyCode === 117)) {
           
//             return false;
//         } else {
//             return true;
//         }
// };

 
    });     



 
       function movetoemd(propid, docshow) {

                    $.ajax({
                        type: "POST",
                        url: 'documentshow/movetoemd',
                        data: {propid: propid, docshow: docshow},
                        success: function (data) {

                            if (data == '1') {
                                toastr.success('Successfully moved to EMD', 'success');
                                $.pjax({container: '#pjax-grid-view'});
                            } else {
                                toastr.error('Cannot Move, Some Internal Error', 'error');
                            }
                        },
                    });
                }

                

                function movetof2f(propid,userid) {

$.ajax({
    url: '/documentshow/movetof2f',
    data: {propid: propid ,userid:userid},
    success: function (data) {

        if (data == '1') {
            toastr.success('Successfully moved to F2F', 'success');
            $.pjax({container: '#pjax-grid-view'});
        } else {
            toastr.error('Cannot Move, Some Internal Error', 'error');
        }
    },
});
}

                function showpropdet(id) {

                    $('#myModal').modal('show');
                    $.ajax({
                        type: "POST",
                        url: '/addproperty/showpropdetails',
                        data: {id: id},
                        success: function (data) {
                            var obj = $.parseJSON(data);
                            $.each(obj, function (element) {

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

                function viewdocs(id) {

                    $('#draggable6').modal('show');
                    $('#showpropdoc').html('');
                    $.ajax({
                        type: "POST",
                        url: 'documentshow/documentshow',
                        data: {id: id},
                        success: function (data) {



                            var obj = $.parseJSON(data);


                            $.each(obj, function (index) {

                                // $('#showpropdoc').append('<a class="col-md-3" target="_blank" href="<?= Yii::getAlias('@frontendUrl') . '/encrypteddocuments/'; ?>' + this.file_name + '">' +
                                // '<div class="document_nam">' + this.file_descr + '</div>' +
                                // '</a>');
                                
                                var type1 = this.type;
                                        if (type1 != 'jpeg' && type1 != 'jpg' && type1 != 'png') {
                                       
                 var showtype = "'"+this.type+"'";
                 var showmore = "'"+this.file_name+"'";
                $('#showpropdoc').append('<button id="hidemodals" onclick="ajaraja('+showmore+','+showtype+')" class="btn btn-primary btn-lg btn_docs" data-toggle="modal" data-target="#myModal1" data-dismiss="modal">' + this.file_descr + '</button>');

                            }
                    });


                    //                                                 $.pjax({container: '#pjax-grid-view'})  
                },
            });
        }



        var properid = '';
        var visitypeid = '';

        function ajaraja(data,type){

            if(type != 'webp'){

            var urlget =  $('#urlget').val();
            var https =    urlget+'/encrypteddocuments/';
            var afterfilename = '#toolbar=0';
            var totalsrc = https + data + afterfilename;
            //alert(totalsrc);
            // https://staging.15bells.com/frontend/web/encrypteddocuments/aeb45c0116e7706661797533e023f097sec%2046%20registry.pdf#toolbar=0
            $('#exactiframe').attr('src', totalsrc)
           }
        }


        function paynowfunc(visit_type, id,propid) {

           // properid = id;
            //visitypeid = visit_type;

            propids = 273 * 179 - propid;
            var newprop = 'PR'+ propids;
            $('#appendpropid').html(newprop);
            $('#acceptidnew').val(id);

            $('#draggablenew').modal('show');

        }



        function proceedme() {
                                    
                                    var ids = $('#acceptidnew').val();
                                    var amount_payable = 500;
                                   

                                        $.ajax({
						                       type: "POST",
                                                url: 'documentshow/sessioncheckout',
                                                data: {id: ids,amount_payable:amount_payable},
                                                success: function (data) {
                                                 
                                                  alert(data);
                                                   

                                                },
                                            }); 

                                   

                                }



        function proceedtobuy() {

            var propids = properid;
            $.ajax({
                type: "POST",
                url: 'addproperty/docpay',
                data: {propids: propids, visitypeid: visitypeid},
                success: function (data) {

                    $('#draggable4').modal('hide');
                    $.pjax({container: '#pjax-grid-view'});
                    if (data == '1') {

                        toastr.success('Payment Successfully Done', 'success');
                    } else if (data == '2') {

                        toastr.warning('This Property has not been set for VR room yet', 'warning');

                    }
                    else if (data == '3') {

                        toastr.warning('User Lead Has Not Been Assigned Yet', 'warning');

                    }
                    else {

                        toastr.error('Internal Error', 'error');
                    }


                },
            });
        }


    </script>
