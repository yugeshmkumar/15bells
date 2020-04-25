
<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
$this->title = 'Enter VR Room';
?>
<?php
$AuctionParticipants = \common\models\AuctionParticipants::find()->where(['partcipantID' => Yii::$app->user->identity->id, 'isactive' => 1])->one();
if ($AuctionParticipants) {
    ?>
    <style>.vvsambqwkstalkbubble { width: 100%; height: 250%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative;padding:20px; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 250%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}

        // property details CSS

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

        .text_warn{
            color:#c4984f;
            font-size:18px;
            padding-left:15px;
        }
    .vr_button{
        padding: 4px 15px;
    font-size: 16px !important;
    color: #ffffff !important;
    border-radius: 0;
    background: #c4984f;
    border-color: #c4984f !important;
    }
    .vr_button:hover{
        font-size: 16px !important;
    color: #ffffff !important;
    border-radius: 0;
    background: #c4984f;
    border-color: #c4984f !important;
    }

    </style> 
    
    <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>

    <div class="portlet light col-md-9">
    <div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Enter VR Room</h2>
					</div>
                    </div>
        <div class="portlet-body col-md-12">
            <div class="note note-info text_warn">
                <font color="">*</font> Do not Refresh or back the Transaction Window after Entered
                <b><i class="fa fa-thumbs-up"></i></b>
            </div>
            <div class="auction-participants-index">

    <?php Pjax::begin(); ?> 

    <?php 
   if($this->beginCache('bid',['variations'=>$searchModel->id])){
   echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
           
            ['attribute' => 'vr_roomID',
                'label' => 'Property Id',
                'format' => 'raw',
                'filter' => false,
                'value' => function($data) {

                    $auction_type =  \common\models\VrSetup::findOne($data->vr_roomID)->auction_type;

                    if($auction_type == 'forward_auction'){
                    $property = \common\models\VrSetup::findOne($data->vr_roomID)->propertyID;
                    
                    $propid = 273 * 179 - $property;
                    return Html::a('<button class="btn btn-default"    data-html="true"  style="width:90px;border-color:white;border:1px solid;"  onclick = "showpropdet(' . $property . ')">PR' . $propid . '</button>', $url = 'javascript:void(0)', [
                                'title' => Yii::t('yii', 'Click to View Property details'),
                    ]);
                   }
                }
            ],


            ['attribute' => 'vr_roomID',
                'label' => 'Brand Name',
                'format' => 'raw',
                'filter' => false,
                'value' => function($data) {

                    $auction_type =  \common\models\VrSetup::findOne($data->vr_roomID)->auction_type;
                    $brandID =  \common\models\VrSetup::findOne($data->vr_roomID)->brandID;

                    if($auction_type == 'reverse_auction'){

                    $property = \common\models\User::findOne($brandID)->fullname;
                    
                    return Html::a('<button class="btn btn-default"    data-html="true"  style="width:90px;border-color:white;border:1px solid;" >'.$property . '</button>', $url = 'javascript:void(0)', [
                                'title' => Yii::t('yii', 'Click to View Property details'),
                    ]);
                   }
                }
            ],


            ['attribute' => 'vr_roomID',
                'label' => 'Actions',
                'format' => 'raw',
                'filter' => false,
                'value' => function($data) {
                    return '<a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffmjkkl&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffmjkl&#39;).style.display=&#39;block&#39;,myfunction(' . $data->vr_roomID . ',' . $data->partcipantID . ')" class="btn btn-primary vr_button">Enter VR Room</a>';
                }
            ],
            ['attribute' => 'vr_roomID',
                'label' => 'Auction Type',
                'filter' => false,
                'value' => function($data) {
                    return
                            \common\models\VrSetup::findOne($data->vr_roomID)->auction_type;
                }
            ],
            ['attribute' => 'vr_roomID',
                'label' => 'Auction Start Time',
                'filter' => false,
                'value' => function($data) {
                    return
                            date_format(date_create(\common\models\VrSetup::findOne($data->vr_roomID)->fromdatetime), 'Y,d-M h:i a');
                }
            ],
            ['attribute' => 'vr_roomID',
                'label' => 'Auction End Time',
                'filter' => false,
                'value' => function($data) {
                    return
                            date_format(date_create(\common\models\VrSetup::findOne($data->vr_roomID)->todatetime), 'Y,d-M h:m a');
                }
            ],
        ],
    ]);
    Yii::trace('store bid table to log');
                        $this->endCache();
                        }
    ?>
                <?php Pjax::end(); ?></div></div></div>
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
    <script>

        function myfunction(str, ttr) {


            $.ajax({

                type: "GET",
                url: "<?php echo Yii::$app->urlManager->createUrl(["common/checkotp"]) ?>?id=" + str + "&uid=" + ttr,
                success: function (msg) {

                    $('#vpcobh2').html(msg);


                }

            });

        }


        function showpropdet(id) {

            $('#myModal').modal('show');
            $.ajax({
                type: "POST",
                url: '/frontend/web/addproperty/showpropdetails',
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

    </script>
<?php } ?>
