<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\editable\Editable;
use yii\widgets\Pjax;
use kartik\datetime\DateTimePicker;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\RequestSiteVisitbinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Requested Users For Site Visit');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjklpp" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkklpp" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobhp"></div> </div>

<style>.slotsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .slotsambqwkstalkbubble:before {  }</style> <style>.slotsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.slotsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:22%;  left:32%; top:17%; bottom:7%; z-index:1015; overflow:hidden; overflow-x:hidden}</style>

<style>.createslotsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .cretaeslotsambqwkstalkbubble:before {  }</style> <style>.createslotsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.createslotsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:30%; top:26%; bottom:26%; z-index:1015; overflow:hidden; overflow-x:hidden}

    .datetimepicker{
        z-index:9999 !important;
    }
</style>
<style>
	body .table{
		background:#ffffff;
	}
    .input-group {
        margin-bottom: 15px;
        .input-group-addon {
            background: #f8f8f8;
            &:last-child {
                border-radius: 0 3px 3px 0;
            }
        }
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 3px;
        box-shadow: none;
        &:hover, &:focus, &:active {
            box-shadow: none;
        }
        &:focus {
            border: 1px solid #34495e;
        }
    }


   

    /*! property details CSS */

    .seller_exp{
        top:15%;
    }
    .seller_exp .modal-content{
        border-radius:5px !important;
    }
    .seller_exp .modal-content{
        background:#e6e1e1;
    }
    .seller_exp .modal-header{
        border-bottom: 3px solid #e5ac31;
    }
    .seller_exp .table{
        width:85%;
        margin:0 auto; 
    }
    .seller_exp .table_pd{
        padding:3px 20px;
    }
    .seller_exp .brdr_rit{
        border-right:1px solid #c7c7c7;
    }


    .details h2{
        font-size: 20px;
        color: #ffba00;
        font-weight: 600;
        font-family: 'Roboto', sans-serif;
    }
    .details span{
        font-size: 17px;
        color: #fff;
        font-weight: 600;
        font-family: 'Roboto', sans-serif;
    }
    .details p{
        font-size: 15px;
        color: #fff;
        font-family: 'Roboto', sans-serif;
        text-align: justify;
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
    .selected img {
        opacity:0.5;
    }

    .boxtitle{
        padding:10px;
        border:0;
        margin:10px 0 5px;
        font-size:17px;
        background:#ddd;
        width: 100%;
        min-height: 40px;
    }
    #slider-thumbs{
        background-color: rgba(0, 0, 0, 0.87);
        margin: 0;
        padding: 10px 0 0 0;
    }
    .btn_div_img_ved{
        position: relative;
        top: 32px;
        z-index: 9;
        right: 15px;
    }
    .btn_div_img_ved .btn{
        border: 0px;
        border-radius: 0px;
        color:#fff;
        background-color: #000;
        font-family: 'Roboto', sans-serif;
    }
    .btn_div_img_ved .btn:hover, .btn_div_img_ved .btn:active, .btn_div_img_ved .btn:visited, .btn_div_img_ved .btn:focus {
        background-color: #ffba00;
    }
    .btn-bs-file{
        position:relative;
        padding: 6px 10px;
        border: 0px;
        border-radius: 0px;
        background-color: rgba(255, 255, 255, 0.25);
        font-size: 13px;
        color: #fff;
    }
    .btn-bs-file:hover{
        color:#fff;
    }
    .btn-bs-file input[type="file"]{
        position: absolute;
        top: -9999999;
        filter: alpha(opacity=0);
        opacity: 0;
        width:0;
        height:0;
        outline: none;
        cursor: inherit;
    }
    .div_upload_document_image{
        background-color: rgba(0, 0, 0, 0.45);
        padding: 10px 0px;
    }

    .list_anchr{
        padding: 8px 23px;
        border: 1px solid #fff !important;
        color: #ffffff !important;
        letter-spacing: 1px;
        border-radius: 5px !important;
        text-decoration:none !important;
        transition:.4s;
    }
    .list_anchr:hover{
        background:#e5ac31;
        color:#ffffff !important;
        transition:.4s;
        border-color:#e5ac31;
    }
    .list_viw{
        list-style:none;
        display:inline-flex !important;
        padding:0 !important;
    }
    .list_viw li{
        padding: 0px 10px 0px 2px;
    }


    .kv-editable-reset{
        display:none;
    }

    .datetimepicker{
        z-index:999999 !important;
    }

    /*! End of property details CSS */ 
</style>


<div id="slotsambqwksukvveekmuzqtsimaccff" class="slotsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="slotsambqwksukvveekmuzqtsimabbff" class="slotsambqwksukvveekmuzqtswhevbbff"  > <div id="sch1" class="slotsambqwkstalkbubble">

    </div> </div>
<div id="slotsambq" class="slotsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="slotsamb" class="slotsambqwksukvveekmuzqtswhevbbff"  > <div id="vie1" class="slotsambqwkstalkbubble">

    </div> </div>

<div id="createslotsambqwksukvveekmuzqtsimaccff" class="createslotsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="createslotsambqwksukvveekmuzqtsimabbff" class="createslotsambqwksukvveekmuzqtswhevbbff"  > <div id="csolo1" class="createslotsambqwkstalkbubble">
    </div> </div>

<div class="request-site-visitbin-index">


    <?php Pjax::begin(['id' => 'pjax-grid-view']); ?> 
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           
            [
                'label' => 'Shortlist Id',
                'attribute' => 'id',
                'options' => ['style' => 'width:80px;'
                ],
            ],
            ['attribute' => 'user_id',
                'label' => 'Name',
               'width' => '200px',
                'format' => 'raw',
                //  'contentOptions'=>['style'=>'width: 200px;'],
                'filter' => true,
                'value' => function($data) {
                    if (isset(\common\models\User::findOne($data->user_id)->fullname)) {
                        $fullname = \common\models\User::findOne($data->user_id)->fullname;
                        return Html::a('<button class="btn btn-default"    data-html="true"  style="width:200px;border-color:white;border:1px solid;"  onclick = "showuser(' . $data->user_id . ')">'. $fullname . '</button>', $url = 'javascript:void(0)', [
                                'title' => Yii::t('yii', 'Click to View User details'),
                    ]);
                    } else {
                        return '';
                    }
                }
            ],
                    
            // ['attribute' => 'sales_id',
            //     'label' => 'Supply Name.',
            //     'width' => '250px',               
            //     'value' => function($data) {
            //     if(!empty($data->sales_id)){
                
            //     $employee = \common\models\CompanyEmp::findOne($data->sales_id)->userid;
            //         if (isset($employee)) {
            //             return \common\models\User::findOne($employee)->fullname;
            //         } else {
            //             return '';
            //         }
            //     }else{
            //         return '';
            //     }
            //     }
            // ],

            ['attribute' => 'property_id',
                'label' => 'Property ID',
                'format' => 'raw',
               'width' => '50px',
                'filter' => false,
                
                    'value' => function($data) {

        
                    $propid = 273 * 179 - $data->property_id;
                    return Html::a('<button class="btn btn-default"    data-html="true"  style="width:90px;border-color:white;border:1px solid;"  onclick = "showpropdet(' . $data->property_id . ')">PR' . $propid . '</button>', $url = 'javascript:void(0)', [
                                'title' => Yii::t('yii', 'Click to View Property details'),
                    ]);
                }
                    ],
                    
            
                    

                //     [
                //         'class' => 'kartik\grid\EditableColumn',
                //         'format' => 'raw',
                //         'width' => '200px',
                //         'filter' => array("online" => "Online", "offline" => "Offline"),
                //         'attribute' => 'visit_type',
                //         'label' => 'Visit Type',
                //         'value' => function ($data) {
                //     $statusd = $data->visit_type;                    
                //         return $statusd;
                    
                // },
                //         'editableOptions' => [
                //             'inputType' => Editable::INPUT_DROPDOWN_LIST,
                //             'data' => ['online' => 'Online', 'offline' => 'Offline'],
                //             'header' => 'Visit Type',
                //             'formOptions' => ['action' => ['p_visitsed']],
                //             'submitButton' => [
                //                 'icon' => '<i class="glyphicon glyphicon-floppy-disk"></i>',
                //                 'label' => 'Save',
                //                 'class' => 'btn btn-sm btn-primary'
                //             ],
                //         ],
                //     ],



                //     [
                //         'class' => 'kartik\grid\EditableColumn',
                //         'format' => 'raw',
                //         'width' => '200px',
                //         'filter' => array("pay_now" => "Pending", "paid" => "Paid", "complimentry" => "Complimentry"),
                //         'attribute' => 'request_status',
                //         'label' => 'Request Status',
                //         'value' => function ($data) {
                //     $statusd = $data->request_status;
                //     if ($statusd == 'pay_now') {
                //         return 'Pending';
                //     } else {
                //         return $statusd;
                //     }
                // },
                //         'editableOptions' => [
                //             'inputType' => Editable::INPUT_DROPDOWN_LIST,
                //             'data' => ['complimentry' => 'Complimentry', 'paid' => 'Paid'],
                //             'header' => 'Request Status',
                //             'formOptions' => ['action' => ['p_visits']],
                //             'submitButton' => [
                //                 'icon' => '<i class="glyphicon glyphicon-floppy-disk"></i>',
                //                 'label' => 'Save',
                //                 'class' => 'btn btn-sm btn-primary'
                //             ],
                //         ],
                //     ],
//                     [
//                         'label' => 'Scheduled time',
//                         'attribute' => 'scheduled_time',
//                         'filterType' => \kartik\grid\GridView::FILTER_DATE,
//                         'filterWidgetOptions' => [
//                             'options' => ['placeholder' => 'Select date'],
//                             'pluginOptions' => [
//                                 'format' => 'yyyy-mm-dd',
//                                 'todayHighlight' => true
//                             ]
//                         ],
//                         'options' => ['style' => 'width:200px;'],
//                         'format' => 'raw',
//                         'value' => function($model) {
// //                                      $times = $model->scheduled_time;
// //                                    if($times == 0){                                        
// //                                            return  'N/A';
// //                                    }else{
// //                                        return $times;
// //                                    }


//                     if ($model->scheduled_time == '0000-00-00 00:00:00') {
//                         $showtime = 'Not Set';
//                     } else {
//                         $showtime = $model->scheduled_time;
//                     }
//                     $date = date_create($model->scheduled_time);
//                     $scheduled_times = date_format($date, "Y-m-d H:i:s");
//                     $scheduled_timesnew = "'$scheduled_times'";
//                     $scheduled_time = "'$model->scheduled_time'";
//                     $request_id = "'$model->request_id'";
//                     return Html::a('<button class="btn btn-success"  style="width:185px;border-color:white;border:1px solid;"  onclick = "paynowfunc(' . $scheduled_timesnew . ',' . $request_id . ')">' . $showtime . '</button>', $url = 'javascript:void(0)', [
//                                 'title' => Yii::t('yii', 'Click to Complete'),
//                     ]);
//                 }
//                     ],
                //     [
                //         'label' => 'Visit Status',
                //         'attribute' => 'visit_status_confirm',
                //         'filter' => array("schedule" => "schedule", "no" => "To be Visited", "userno" => "Visit Not Confirmed", "reschedule" => "Rescheduled", "yes" => "Seen"),
                //         'options' => ['style' => 'width:250px;'],
                //         'format' => 'raw',
                //         'value' => function($model) {
                //     $request_id = "'$model->request_id'";
                //     $visit_status_confirm = $model->visit_status_confirm;
                //     $scheduled_time = $model->scheduled_time;
                //     date_default_timezone_set("Asia/Calcutta");
                //     $date = date('Y-m-d H:i:s');

                //     if ($visit_status_confirm == 'schedule') {
                //         return 'Visit Scheduled';
                //     }
                //     if ($visit_status_confirm == 'no') {
                //         return 'To be Visited';
                //     } else if ($visit_status_confirm == 'userno') {
                //         return 'Visit Not Confirmed';
                //     } else if ($visit_status_confirm == 'reschedule') {
                //         return 'Rescheduled';
                //     } else {
                //         return 'Seen  ';
                //     }
                // }
                //     ],
                //     [
                //         'label' => 'Remove',
                //         'attribute' => 'request_id',
                //         'filter' => false,
                //         'options' => ['style' => 'width:50px;'],
                //         'format' => 'raw',
                //         'value' => function($model) {
                //     $request_id = "'$model->request_id'";


                //     return Html::a('<button class="btn btn-danger" onclick="remove(' . $request_id . ')" style="padding: 5px;width: 94px;border: 1px solid; !important;"   value = "10"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</button>', $url = 'javascript:void(0)', []);
                // }
                //     ],
                ],
            ]);
            ?>
            <?php Pjax::end(); ?>
            <div class="modal fade" id="draggable2" data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content data_model">
                        <div class="modal-header greenHeader">
                            <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Add Scheduled Time</h4>
                        </div>

                        <div class="modal-body">


                            <form role="form">   
            
            <input id="scheduleid" type="hidden">
                                <div class="container-fluid">
            <?php
            echo '<label>Start Date/Time</label>';
            echo DateTimePicker::widget([
                'name' => 'datetime_10',
                //'value' => '2018-02-12 08:17:19',
                'options' => ['placeholder' => 'Select operating time ...'],
                'convertFormat' => true,
                'pluginOptions' => [
                     'autoclose'=>true,
                    'format' => 'yyyy-MM-dd hh:i:00',
                    'startDate' => '01-Mar-2014 12:00 AM',
                    'todayHighlight' => true
                ]
            ]);
            ?>
                                </div>    
                            </form>
                        </div>
                        <div class="modal-footer" style="border-top:none !important;">
                            <!--<a href="javascript:;" data-dismiss="modal" class="btn continueBtn1">Save</a>-->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px;">
                                    <input type="button"  onclick="onlinesave()" id="sub" value="Save" class="btn btn-success"></input>
                                    <input type="button"  data-dismiss="modal"  value="Cancel" class="btn btn-danger"></input>
                                </div>
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
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Owner Email id</b><br>
                                                <span id="email"><?php // echo $getlessorexpec->rent;   ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Owner Phone no.</b><br>
                                                <span id="phone"><?php // echo $getlessorexpec->rent;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 veiw_property_description_div">






                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Property for</b><br>
                                                <span id="property_for"><?php // echo $getlessorexpec->rent;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Property type</b><br>
                                                <span id="typename"><?php // echo $getlessorexpec->rent_negotiable;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Locality</b><br>
                                                <span id="locality"><?php // echo $getlessorexpec->auto_cad_drawing;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 veiw_property_description_div">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Total plot area</b><br>
                                                <span id="total_plot_area"><?php // echo $getlessorexpec->site_approval;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Asking rental price</b><br>
                                                <span id="asking_rental_price">Rs. <?php // echo $getlessorexpec->wet_points;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Price sq ft</b><br>
                                                <span id="price_sq_ft"><?php // echo $getlessorexpec->interest_security;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 veiw_property_description_div">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Maintenance cost</b><br>
                                                <span id="maintenance_cost"><?php // echo $getlessorexpec->interest_negotiable;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Availability</b><br>
                                                <span id="availability"><?php // echo $getlessorexpec->agreement;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Available from</b><br>
                                                <span id="available_from"><?php // echo $getlessorexpec->agreement_negotiable;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 veiw_property_description_div">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Possesion by</b><br>
                                                <span id="possesion_by"><?php // echo $getlessorexpec->lock_negotiable;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Buildup area</b><br>
                                                <span id="buildup_area"><?php // echo $getlessorexpec->escalation_value;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Carpet area</b><br>
                                                <span id="carpet_area"><?php // echo $getlessorexpec->escalation_month;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 veiw_property_description_div">
                                    <div class="col-md-4">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

<div id="myModaluser" class="modal fade" role="dialog">
            <div class="modal-dialog seller_exp modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">User Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">


                            <div class="row">

                                <div class="col-md-12 veiw_property_description_div">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Name</b><br>
                                                <span id="username"><?php // echo $getlessorexpec->rent;   ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Phone no.</b><br>
                                                <span id="userphone"><?php // echo $getlessorexpec->rent;   ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Email Id.</b><br>
                                                <span id="useremail"><?php // echo $getlessorexpec->rent;   ?></span>
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


        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>



        
        <script>


            function schedule(str, ttr) {

        //var fields = $("input[name='chkd[]']").serializeArray(); 
                var sak = ttr;
                $.ajax({
                    type: "GET",
                    url: "<?php echo Yii::$app->urlManager->createUrl(["supervisor/scheduleform"]) ?>?requestid=" + sak + "&refstr=" + str,
                    success: function (msg) {
                        $('#sch1').html(msg);
                    }});
            }
        </script>
        <script>

            function cslo(str, ttr) {
                $.ajax({
                    type: "GET",
                    url: "<?php echo Yii::$app->urlManager->createUrl(["eventschedule/createevent"]) ?>?refstr=" + str + "&requestid=" + ttr,
                    success: function (msg) {
                        $('#csolo1').html(msg);

                    }

                });

            }

        </script>


        <script>


            function slotcont(str, ttr) {
                var evname = $('#ev1').val();
                var evfromd = $('#ev2').val();
                var evtomd = $('#ev3').val();

                var evdes = $('#ev4').val();
                var evven = $('#ev5').val();
                var evcap = $('#ev6').val();
                var evorg = $('#ev7').val();



                $.ajax({
                    type: "GET",
                    url: "<?php echo Yii::$app->urlManager->createUrl(["eventschedule/addcont"]) ?>?evname=" + evname + "&evfromd=" + evfromd + "&evtomd=" + evtomd + "&evdes=" + evdes + "&evven=" + evven + "&evcap=" + evcap + "&evorg=" + evorg + "&refstr=" + str + "&requestid=" + ttr,
                    success: function (msg) {
                        $('#csolo1uu').html(msg);

                    }

                });



            }

        </script>
        <script type='text/javascript'>

            function jamsslot(act)
            {



                var selectslot = document.getElementById("selectslot").value;
                var holder = document.getElementById("holder").value;
                var requestid = document.getElementById("requestid").value;
                var checkValues = 1;

                data = {ids: checkValues, requestid: requestid, act: act, selectslot: selectslot, holder: holder}

                actionsocket(data);

            }

        </script>

        <script type='text/javascript'>
            function actionsocket(data) {

                var url = '<?php echo Yii::$app->urlManager->createUrl(["supervisor/mainactions"]) ?>';

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function (msg) {
                        location.reload();
                    }
                });

            }
        </script>

        <script>

            function markasdone(str, ttr) {


                $.ajax({
                    type: "GET",
                    url: "<?php echo Yii::$app->urlManager->createUrl(["addpropertypm/writecommentforsitevisit"]) ?>?pid=" + str + "&r_siteid=" + ttr,
            success: function (msg) {

                $('#vpcobhp').html(msg);


            }

        });

    }


    
    var dates = '';
    function paynowfunc(visit_type, id) {

        dates = visit_type;
        siteid = id;
        $('#w6').val(dates);
        $('#scheduleid').val(id);
        //$('#datetimepicker1').datetimepicker();                                  
        $('#draggable2').modal('show');


    }


    function onlinesave() {

      // alert( $( "input[name$='datetime_10']" ).val());
        var newdates = $( "input[name$='datetime_10']" ).val();
        var newsiteid = $('#scheduleid').val();


        $.ajax({
            type: "POST",
            url: 'savescheduledtime',
            data: {newdates: newdates, newsiteid: newsiteid},
            success: function (data) {


                if (data == '1') {
                    toastr.success('Location Successfully Saved', 'success');
                    $.pjax({container: '#pjax-grid-view'});
                    $('#draggable2').modal('hide');
                    
                }
                else {
                    toastr.error('Internal Error', 'error');
                }

            },
        });



    }

    function showuser(id){
     $('#myModaluser').modal('show');   
     $.ajax({
            type: "POST",
            url: 'showuserdetails',
            data: {id: id},
            success: function (data) {
                var obj = $.parseJSON(data);
                $.each(obj, function (element) {

                    $('#useremail').html(this.email);
                    $('#userphone').html(this.username);
                    $('#username').html(this.fullname);
                    
                });


            },
        });   
    }


    function showpropdet(id) {

        $('#myModal').modal('show');
        $.ajax({
            type: "POST",
            url: 'showpropdetails',
            data: {id: id},
            success: function (data) {
                var obj = $.parseJSON(data);
                $.each(obj, function (element) {

                    $('#email').html(this.email);
                    $('#phone').html(this.username);
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

    function remove(id) {
        $.ajax({
            type: "POST",
            url: 'removesite',
            data: {id: id},
            success: function (data) {


                if (data == '1') {
                    toastr.success('Successfully Removed from site visit', 'success');

                    $.pjax({container: '#pjax-grid-view'})
                } else if (data == '2') {
                    toastr.error('You Cannot Remove this site Visit', 'error');
                }
                else {
                    toastr.error('Internal Error', 'error');
                }

            },
        });
    }


</script>	
