<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\editable\EditableAsset;
use yii\db\Query;


EditableAsset::register($this);

use kartik\editable\EditablePjaxAsset;

EditablePjaxAsset::register($this);

use kartik\popover\PopoverXAsset;

PopoverXAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Emds';
$this->params['breadcrumbs'][] = $this->title;
?>



<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>
<style>
     
  body .table{
	  background:#fff;
  }
   
    .form-control{
        border-radius:10px !important;
    }
    .portlet>.portlet-title>.caption{
        padding:15px 0 0 0 !important;

    }
    .portlet-title{
        border-bottom:3px solid #e5ac31 !important;
        margin-bottom:0px !important;
    }
    .kv-editable-link {
        color: #e9b73a;
    }
    .data_model{
        border-radius:10px !important;
    }
    .lab_form{
        color: #f36a5a;
        top: 4px;
        position: relative;
        text-align: center !important;
    }
    .row_pad{
        padding:10px 0;
        margin: 0 !important;
    }
    .term_selct{
        padding-left: 30px;
    }
    .feed_bck{
        padding:4px 2px;
    }
    .document_s{
        padding:3px 0 20px 0;
        background:rgba(255,255,255,0.20);
        margin-top:30px;
        display:none;
    }
    .document_s .col-md-3{
        margin-top:20px;
        text-decoration: none;
    }
    .document_nam {
        width: 80%;
        margin: 0 auto;
        text-align: center;
        padding: 30px 0;
        color: #000;
        background-image: url(http://staging.15bells.com/frontend/web/dashimages/xdocuments.JPG.pagespeed.ic.zDs7bvACaM.webp);
        /* background-attachment: fixed; */
        background-position: center;
        background-repeat: no-repeat;
        background-size: 80px 80px;
        font-weight: 600;
        font-size: 22px;
        border-radius: 5px !important;
        box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.3);
        background-color: #fff;
    }
    .prop_hed{
        color: #000000;
        text-transform: uppercase;
        font-weight: 600;
        border-bottom: 3px solid #e5ac31;
        padding-bottom: 2px;
    }
    .close_doc{
        position:absolute;
        font-size:22px;
        color:#ffffff;
        top:10px;
        right:20px;
        cursor:pointer;
    }
    .nodoc{
        font-size: 24px;
        color: rgb(255, 186, 0);
        padding: 20px;
    }



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


   .pader{
        padding: 28px;
    }



    //End of property details CSS
</style>

<div class="col-md-12">

    <div class="portlet portlet-sortable">
        <div class="portlet-title">
            <div class="caption font-green-sharp">

                <span class="caption-subject bold uppercase">Requested EMD</span>
                <!--<span class="caption-helper">details...</span>-->
            </div>

        </div>
        <div class="portlet-body">

            <div class="addpropertybackend-index sellr_proprty">

                <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>   
               <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
           // 'user_id',
           ['attribute' => 'property_id',
                            'label' => 'Property ID',
                            'format' => 'raw',
                            'width' => '200px',
                            'filter' => false,
                            'value' => function($data) {

                                $propid = 273 * 179 - $data->property_id;
                               return Html::a('<button class="btn btn-default"    data-html="true"  style="width:90px;border-color:white;border:1px solid;"  onclick = "showpropdet('.$data->property_id.')">PR'.$propid.'</button>', $url = 'javascript:void(0)', [
                                                'title' => Yii::t('yii', 'Click to View Property details'),
                                    ]);
                            }
                        ],
           // 'payable_amount',
            ['attribute' => 'payable_amount',
                            'label' => 'Payable Amount',
                            'format' => 'raw',
                            'width' => '230px',
                            'value' => function($data) {
                                return $data->payable_amount . ' <i class="fa fa-inr" aria-hidden="true"></i>';
                            }
                        ],
             ['attribute' => 'escrow_account_id',
                            'label' => 'Escrow account',
                            'format' => 'raw',
                            'width' => '230px',
                            'value' => function($data) {
                                return $data->escrow_account_id;
                            }
                        ],                   
          //  'escrow_account_id',
            
                           [ 'label' => 'Payment Status',
                            'attribute' => 'payment_status',
                            'filter' => false,
                            'options' => ['style' => 'width:200px;'],
                            'format' => 'raw',
                            'value' => function($model) {
                        if ($model->payment_status == 'pay_now') {


                            $emd = "'$model->id'";
                            $property_id = "'$model->property_id'";
                            $documentshow_id = "'$model->documentshow_id'";
                            return Html::a('<button class="btn btn-warning"  style="width:90px;border-color:white;border:1px solid;"  onclick = "paynowfunc(' . $emd . ','.$property_id.','.$documentshow_id.')">Pay Now</button>', $url = 'javascript:void(0)', [
                                        'title' => Yii::t('yii', 'Click to Complete'),
                            ]);
                        } else if ($model->payment_status == 'pending') {
                            return Html::a('<button class="btn btn-info" style="width:90px;border-color:white;border:1px solid;"   value = "10" >Pending</button>', $url = 'javascript:void(0)', []);
                        } else if ($model->payment_status == 'paid') {
                            return Html::a('<button class="btn btn-success" style="width:90px;border-color:white;border:1px solid;"   value = "10" >Paid</button>', $url = 'javascript:void(0)', []);
                        } else {
                            return Html::a('<button class="btn btn-success" style="width:90px; border-color:white;border:1px solid; background-color: #FF0000;"   value = "10" >Rejected</button>', $url = 'javascript:void(0)', []);
                        }
                    }
                        ],
            // 'payment_status',
            // 'created_date',
            // 'updated_date',
            // 'status',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
                <?php Pjax::end(); ?>

            </div></div> </div>
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
	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
		$(document).ready(function(){
			$(".treeview").addClass('active');
			$( "ul.treeview-menu li:nth-child(3)").addClass("active");
		});
	</script>
    
    <script>

        function viewdocs(id) {

            $('#draggable6').modal('show');
            $('#showpropdoc').html('');
            $.ajax({
                url: 'documentshow/documentshow',
                data: {id: id},
                success: function (data) {
                    
                     
                  
                    var obj = $.parseJSON(data);
                    
                    
                     $.each(obj, function (index) {
                     $('#showpropdoc').append('<a class="col-md-3" target="_blank" href="<?= Yii::getAlias('@archiveUrl').'/uploadsthumbnails/';  ?>'+this.link+'">'+
                            '<div class="document_nam">'+ this.file_descr +'</div>'+
                        '</a>');    
                         
                     });
                 
                   
    //                                                 $.pjax({container: '#pjax-grid-view'})  
                },
            });
        }



                                           function showpropdet(id){
                                                              
                                                                $('#myModal').modal('show'); 
       
                                                                $.ajax({
                                                                 url: '<?= Yii::getAlias('@frontendUrl').'/addproperty/showpropdetails';  ?>',
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


                                      var properid = '';var visitypeid = ''; var emd_id ='';                         
                            function paynowfunc(emd,id,documentshow_id) { 
                                 
                                        properid=id;
                                        visitypeid=documentshow_id;
                                        emd_id = emd;
                                        $('#draggable4').modal('show');                                       
                                    
                                }
                                
                                function proceedtobuy(){
                                    var propids = properid;
                                                   $.ajax({
                                                                url: 'addproperty/emdpay',
                                                                data: {propids: propids,visitypeid:visitypeid,emd_id: emd_id},
                                                                success: function (data) {
                                                                   
                                                                  $('#draggable4').modal('hide');
                                                                    $.pjax({container: '#pjax-grid-view'});
                                                                    if(data == '1'){  
                                                                       
                                                                       toastr.success('Payment Successfully Done', 'success');  
                                                                    }else if(data == '3'){
                                                                        
                                                                     toastr.warning('This Property has not been set for VR room yet', 'warning');    
                                                                        
                                                                    }else{
                                                                        
                                                                       toastr.success('Internal Error', 'success'); 
                                                                    }
                                                                     
                                                                 
                                                                  },
                                                                });
                                }
    </script>
