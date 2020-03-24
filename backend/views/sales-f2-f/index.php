<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SalesF2FSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales F2 Fs';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>

<style>
   
  body .table{
	  background:#fff;
  }
   
   
    .form-control{
        border-radius:10px !important;
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






//End of property details CSS 
</style>
<div class="sales-f2-f-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Sales F2 Fs','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Sales F2 Fs listing',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
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
											   <b>Owner Email id</b><br>
											   <span id="email"><?php // echo $getlessorexpec->rent;  ?></span>
											 </div>
										   </div>
										 </div>

<div class="col-md-4">
										   <div class="row">
											 <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
											 <div class="col-sm-10 veiw_property_description_div_inner">
											   <b>Owner Phone no.</b><br>
											   <span id="phone"><?php // echo $getlessorexpec->rent;  ?></span>
											 </div>
										   </div>
										 </div>
</div>

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
                    <h4 class="modal-title textShadowHeading" style="color:#ea5460;">View Documents</h4>
                </div>

                <div class="col-md-12 document_s text-center" style="display: block;">
                    <h3 class=""><span class="prop_hed">Property Documents</span></h3>
                    <i class="close_doc fa fa-close"></i>
                    <div id="showpropdoc">

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
		$(document).ready(function(){
			$(".treeview").addClass('active');
			$( "ul.treeview-menu li:nth-child(5)").addClass("active");
		});
	</script>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>


<script>
function showuser(id){
     $('#myModaluser').modal('show');   
     $.ajax({
            type: "POST",
            url: 'addpropertypm/showuserdetails',
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


    function showpropdet(id){
                                                              
                                                              $('#myModal').modal('show'); 
                                                              $.ajax({
                                                              type: "POST",
                                                              url: 'addpropertypm/showpropdetails',
                                                              data: {id: id},
                                                              success: function (data) {
                                                                 var obj = $.parseJSON(data);
                                                                  $.each(obj, function(element) {
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
</script>