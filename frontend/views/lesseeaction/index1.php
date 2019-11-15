<?php

use yii\helpers\Url;
use yii\db\Query;

$userid = Yii::$app->user->identity->id;
?>
<style>
    .ajamore{
        display: none;
        font-size: 13px !important;
        color: #fffff !important;
        font-weight: 400 !important;
        font-family: 'Roboto', sans-serif;

    }
    .modal-lg{
        width:82%;
    }
    .apni{
        width:100%;
    }

    #delete-button{
        border: 0;
        padding: 20px 0px;
        background: #145d86;
        color: white;
        outline: 0px;
    }
    /* satender */
    .search_map_row{
        margin-top: 10px;
        margin-bottom: 20px;
        border: 15px solid #c2c9ce;
        border-radius: 8px !important;
    }
    .row_upper_search{
        background-color: #145d86; 
        padding: 0px;
        margin-top: 11px !important;
        border-radius: 8px !important;
    }
    #color-palette{
        padding: 10px 5px 10px 10px;
        background-color: #fff;
        width: 120px;
        position: absolute;
        top: 46px;
        right: 20px;
        border-radius: 5px !important;
    }
    #color_main_div{
        border: 0;
        padding: 20px 0px;
        background: #145d86;
        color: white;
    }
    .expectation_div_button{
        border: 0;
        padding: 20px 0px;
        background: #145d86;
        color: white;
    }
    .expectation_div_button:hover{
        border: 0px;
        background-color: #145d86;
    }
    .expectation_div_button:active{
        background-color: #145d86 !important;
    }
    .expectation_div_button:visited{
        background-color: #145d86 !important;
    }
    .expectation_div_button:focus{
        background-color: #145d86 !important;
    }
    .search_prop_button_lessee{
        border: 0;
        background: #145d86;
        color: white;
        padding: 18px 0px 15px 0px;
    }
    .search_prop_button_lessee .search1{
        font-size: 28px;
    }
    .search_prop_button_lessee:hover{
        border: 0px;
        background-color: #145d86;
    }
    .search_prop_button_lessee:active{
        background-color: #145d86 !important;
    }
    .search_prop_button_lessee:visited{
        background-color: #145d86 !important;
    }
    .search_prop_button_lessee:focus{
        background-color: #145d86 !important;
    }
    .drop_down_menu{
        margin-bottom:  -20px;
    }
    .search_delet_btn_div{
        border-right: 1px solid #fff;

    }
    .change_color_delet_btn_div{
        border-right: 1px solid #fff;
    }
    .expectation_delet_btn_div{
        border-right: 1px solid #fff;
    }
    .row_another_search{
    }
    .another_search_p p{
        font-size: 26px;
        padding: 10px 0 0 0;
        font-weight: 600;
        color: #fff;
        margin: 0px;
    }
    .another_search_detail{
        background-color: #f5f5f5; 
        border-radius: 5px !important;
    }
    .another_search_detail_fisrt_div{
        padding-top: 6px;
    }
    .another_search_detail_fisrt_div input{
        width: 100%; 
        padding: 10px;
    }
    .another_search_detail_2_div{
        border-left: 1px solid #ccc;
    }
    .another_search_detail_2_div button{
        border: 0px;
        background-color: #f5f5f5;
        color: #898989;
        font-size: 14px;
        padding: 18px 0px;
        font-weight: 600;
        outline: 0px;   
    }
    .another_search_detail_3_div{
        border-left: 1px solid #ccc;
    }
    .another_search_detail_3_div button{
        border: 0px;
        background-color: #f5f5f5;
        color: #898989;
        font-size: 14px;
        padding: 18px 0px;
        font-weight: 600;
        outline: 0px;
    }
    .another_search_detail_4_div{
        padding:0px;
    }
    .another_search_detail_4_div button{
        border: 0px;
        background-color: #00aeef;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        margin-top: 3px;
        padding: 15px 25px 15px 25px;
    }
    .price_range_details{
        display: none;
        padding: 10px;
        width: 200px;
        position: absolute;
        background-color: #f5f5f5;
        z-index: 9;
        outline: 0px;
        left: 0;
    }
    .residental_dropdown_detail{
        display: none;
        padding: 10px;
        width: 198px;
        position: absolute;
        background-color: #f5f5f5;
        z-index: 9;
        outline: 0px;
        left: 0;
    }
    .sortby{
        border-top: 1px solid #fff;
        border-bottom: 1px solid #fff;
        padding: 10px 0;
        margin-top: 10px;
    }
    .buyit .fa{
        font-size: 40px;
        border-right: 2px solid #fff;
        padding: 10px 10px 10px 0;
        color: #fff;
    }
    #sortby{
        background-color: transparent;
        color: #fff;
    }
    
    .property_main_div{
        border: 0px solid #fff;
        padding: 0;
        padding-bottom:20px;
    }
    .property_main_div_1{
        border: 1px solid #fff;
        padding: 0; 
        background-color: #ac8e18;
    }
    .property_main_div_1 p{
        padding: 8px 0 7px 10px;
        font-size: 17px;
        color: #fff;
        margin: 0;
    }
    .property_main_div_1 .fa{
        padding: 10px 20px 0 20px;  
        font-size: 30px; 
        color: #fff;
    }
    .property_main_div_2{
        padding: 0; 
        border: 1px solid #fff;
        width: 100%;
        float: left;
        background-color: rgba(255, 255, 255, 0.25);
        height:300px;
    }

    .property_main_div_2_inner_1 img{
        padding: 10px 0px 10px 10px;
    }
    .property_main_div_2_inner_p p{
        color: #fff;
        margin: 0px;
    }
    .property_main_div_2_inner_p ul{
        text-align: center;
    }
    .property_main_div_2_inner_p ul li {
        float: left;
        list-style: none;
        font-weight: 600;
        font-size: 15px;
        font-family: 'Roboto', sans-serif;
        color: #fff;
        padding: 0 20px 0 0;
    }
    .property_main_div_2_inner_p {
        padding: 5px 0 5px 0;
        border: 1px solid #fff;
        width: 100%;
        float:left;
    }
    .property_main_div_2_inner_2{
        padding: 0;
    }
    .property_main_div_2_inner_2 p{
        margin:10px 0;
        text-align: justify;
        color: #fff;
        padding: 0px 30px 0 0;
        font-size: 12px;
    }
    .property_main_div_2_inner_2 p a{
        color: #fb2f2f;
        font-weight: 600;
    }
    .property_main_div_2_inner_2 .btn{
        border: 0px;
        color: #ffba00; 
        padding: 0px;
        background-color: transparent;
        float: left;
    }
    .property_main_div_3{
        border: 0px solid #fff;
        padding: 0;
        width: 100%;
        float: left;
    }
    .property_main_div_3_inner1{
        border: 1px solid #fff;
        padding: 0;
    }
    .property_main_div_3_inner1 a{
        font-size: 17px; 
        font-weight: 600; 
        text-decoration: none;
        color: #fff;
    }
    .property_main_div_3_inner1:hover{
        background-color: #ac8e18;
    }
    .property_main_div_3_inner1:hover .fa{
        color: #fff;
    }
    .img_prop{
        width: 220px;
        height: 240px;
    }
    .upper_detail_veiw_property{
        margin-bottom: 4px;
        padding: 0px;
    }
    .upper_detail_veiw_property_heading p{
        color:#000;
        padding: 0px;
        margin: 0px 0px 0px;
        font-size: 17px;
    }
    .upper_detail_veiw_property_heading{
        background-color:#fff;
        padding: 10px;
    }
    .upper_detail_veiw_property_number{
        background-color: #ac8e18;
        padding: 10px;
    }
    .upper_detail_veiw_property_number span{
        color:#000;
        padding: 0px;
        margin: 0px 0px 0px;
        font-size: 17px;
    }
</style>

<!-- END PAGE BAR -->
<br/>

<div class="col-md-12 col-sm-12">
    <div class="row property_display_row">    
		 <div class="portlet-title col-md-12 sellr_proprty">
                                     <div class="caption font-green-sharp exp_titl p-0">
                                        
                                        <span class="caption-subject bold uppercase exp_name">Shortlisted Properties</span>
                                       
                                    </div>
                               
                                </div>
        <?php
        $sqlstr = "SELECT a.*,SUM(st.expectation_id) as expectation_id,SUM(p.typename) as typename,SUM(p.undercategory) as undercategory,(select count(*) from request_site_visit where user_id='$userid' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN shortlistproperty as st ON (st.property_id = a.id ) where st.user_id = $userid and a.property_for ='sale'  GROUP BY a.id";


        $data = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        //echo '<pre>';print_r($data);die;
//            $query = new Query;
//
//            $query->select(['*'])
//                    ->from('addproperty')
//                    ->join('LEFT JOIN', 'shortlistproperty', 'shortlistproperty.property_id =addproperty.id'
//                    )
//                    ->join('LEFT JOIN', 'property_type', 'property_type.id =addproperty.project_type_id'
//                    )
//                    ->where(['shortlistproperty.user_id' => $userid])
//                    ->andwhere(['property_for' => 'rent']);
//            $command = $query->createCommand();
//            $data = $command->queryAll();
//            
//           echo '<pre>';print_r($data);die;
//echo '<pre>';print_r($data);die;
        $count = 0;
        foreach ($data as $key => $datas) {
            $count += 1;
            $imaged = $datas['featured_image'];

            $showChar = 100;
            $ellipsestext = "...";
            $moretext = "Show more";
            $lesstext = "Show less";

            (($datas['undercategory'] == 'Residential') ?
                            $content = $datas['furnished_status'] . ' ' . $datas['typename'] . ' on ' . $datas['property_for'] . ' in ' . $datas['locality'] . (( $datas['buildup_area'] == null) ? ' - plot area : ' . $datas['total_plot_area'] . ' sqft' : ' - super area : ' . $datas['buildup_area'] . ' sqft ') . ' - furnishing specification :* bedrooms : ' . $datas['bedrooms'] . ' * bathrooms : ' . $datas['bathrooms'] . ' * balconies : ' . $datas['balconies'] . ' * pooja room : ' . $datas['pooja_room'] . ' * study_room * servant_room , For more details or Site Visit , please Contact Us..;' :
                            $content = 'A very good ' . $datas['typename'] . ' availabale for rent/lease in ' . $datas['city'] . ' with Plot area ' . $datas['total_plot_area'] . ' sqft, Superbuilt up ' . $datas['buildup_area'] . ' sqft, It is a ' . $datas['furnished_status'] . ' property suitable for any kind of ' . $datas['typename'] . ', For more details or Site Visit , please Contact Us..');

            $c = substr($content, 0, $showChar);
            $h = substr($content, $showChar - 1, strlen($content) - $showChar);
            $html = $c . '<span class="moreellipses">' . $ellipsestext . '&nbsp;</span><span class="morecontent"><span class="ajamore">' . $h . '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_' . $datas['id'] . '" class="morelinks">' . $moretext . '</a></span>';
            ?>  


			<div class="col-md-6" id="parntcls_<?php echo $datas['id']; ?>">
				<div class="row prop_list">
					<p><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/' . (( $imaged == null) ? 'not.jpg' : $imaged ) ?>" class="img-responsive prop_img"></p>
					<div class="col-md-12">
					
					<h5 class="prpr_hed mb-3">Warehouse available for rent in Gurgaon</h5>
					<p class="pror_detl"><span class="lite_clr">Locality :</span> <?php echo $datas['locality'] ?></p>
					<p class="pror_detl"><span class="lite_clr">Highlight :</span> On Rent / <?php echo $datas['age_of_property']; ?>+year old <?php echo ($datas['furnished_status'] == null ? '' : '/' . $datas['furnished_status'] ); ?> / <?php echo $datas['property_on_floor'] ?>th Floor <?php echo ($datas['total_floors'] == null ? '' : '(out of ' . $datas['total_floors'] . ')'); ?></p>
					<p class="pror_detl"><span class="lite_clr">Description: </span> <?php echo $html; ?> </p>
					<p class="mt-3 mb-4"><a class="more_detail" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/viewsearch?id=' . $datas['id'] . '&expecidl='.$datas['expectation_id'].'']) ?>" target="_blank" role="button">More Details <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
					</div>
					<div class="col-md-12 text-center pt-1 pb-3">
						<div class="row">
							<div class="col-md-4 col-xs-4">
								<span class="lite_clr"><i class="fa fa-inr"></i> <?php echo $datas['expected_price']; ?></span>
							</div>
							<div class="col-md-4 col-xs-4">
								<span class="lite_clr"><i class="fa fa-users"></i> <?php echo $datas['county1'] ?></span>
                                <input type="hidden" value="<?php echo $datas['expectation_id'] ?>" id="expectid">  </span>
							</div>
							<div class="col-md-4 col-xs-4">
								<span class="lite_clr"><i class="fa fa-building-o"></i> <?php echo ( $datas['total_plot_area'] == null ? $datas['buildup_area'] : $datas['total_plot_area']); ?> sqft</span>
							</div>
						</div>
					</div>
					<div class="col-md-12 text-center bordr_lw">
						<div class="row">
							<div class="col-md-4 col-xs-4 app_rch"><div>
								<span class="app_rch">Instant Approach</span>
							</div></div>
							<a class="col-md-4 col-xs-4 brdr_b app_rch" href="javascript:void(0)" id="<?php echo $datas['id']; ?>" onclick="getfreevisit(this.id)"><div>
								<span class="app_rch"><?php echo ($datas['county'] > 0 ? 'Site Visited' : 'Book Site Visit') ?> </span>
							</div></a>
							<a class="col-md-4 col-xs-4 app_rch"  href="javascript:void(0)" id="<?php echo $datas['id']; ?>" onclick="deleteprop(this.id)"><div>
								<span class="app_rch">Delist</span>
							</div></a>
						</div>
					</div>
				</div>
			</div>


            



<?php } ?>   

    </div>

</div>

<div class="modal fade" id="draggable2" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="margin-top: 60px;">
        <div class="modal-content">
            <div class="modal-header greenHeader">
                <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Contact Us</h4>
            </div>

            <div class="modal-body" style="padding-left: 0px;">

                <form class="form-horizontal" role="form" name="contact-form" id="contact-form" method="post">   
                    <div class="form-body">   
                        <div class="container apni">

                            <div class="col-md-12">
                                <input type="hidden" id="property_gy" value="">
                                <div class="form-group formpad">
                                    <label class="control-label">ENTER A MESSAGE*</label>


                                    <textarea id="property_gy1" rows="9" class="form-control" ></textarea>

                                </div>                                
                            </div> 



                        </div>                                       
                    </div>                                       

                </form>
            </div>
            <div class="modal-footer" style="border-top:none !important;">
                <!--<a href="javascript:;" data-dismiss="modal" class="btn continueBtn1">Save</a>-->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10" style="margin-left: -11.333333%">
                        <button type="button"  onclick="savemessage()" id="submessage" class="btn btn-success">Submit</button>
                        <input type="button"  data-dismiss="modal"  value="Cancel" class="btn btn-danger"></input>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

                               function deleteprop(id){
                                   
                                  
                                   $.ajax({
                                        type: "POST",
                                        url: 'deleteprop',
                                        data: {propertyid: id},
                                        success: function (data) {


                                            if (data == '1') {
                                                $('#parntcls_'+id).hide();
                                                toastr.warning('Property has removed from shortlist', 'warning');
                                            }
                                           
                                            else {
                                                toastr.error('Internal Error', 'error');
                                            }

                                        },
                                    });
                                   
                               }

                     
                                function changeclass(id) {

//   alert($("#" +id).children().children().prop('class'));
                                    $("#" + id).children().children().removeClass("accordion-toggle");
                                    $("#" + id).children().children().attr("aria-expanded", "true");

                                    $("#" + id).children().children().addClass("accordion-toggle collapsed");

                                }


                                function getmoredata(id) {

                                    var moretext = "Show more";
                                    var lesstext = "Show less";
                                    if ($('#' + id).hasClass("less")) {

                                        $('#' + id).removeClass("less");
                                        $('#' + id).html(moretext);
                                    } else {


                                        $('#' + id).addClass("less");
                                        $('#' + id).html(lesstext);
                                    }

                                    $('#' + id).parent().prev().toggle();
                                    $('#' + id).prev().toggle();
                                    return false;


                                }


                                function bititnow(id) {

                                    $.ajax({
                                        type: "POST",
                                        url: 'bititnow',
                                        data: {propertyid: id},
                                        success: function (data) {


                                            if (data == '1') {
                                                toastr.warning('Profile status is Pending', 'warning');
                                            }
                                            else if (data == '2') {
                                                toastr.warning('Please upload your KYC documents', 'warning');
                                            }
                                            else if (data == '3') {
                                                toastr.warning('Your KYC documents not approved yet', 'warning');
                                            }
                                            else if (data == '4') {
                                                toastr.success('Your Request for this Bid has Successfully send', 'success');
                                            }
                                            else if (data == '5') {
                                                toastr.error('Already Send Request For Bid', 'error');
                                            }

                                            else {
                                                toastr.error('Internal Error', 'error');
                                            }

                                        },
                                    });

                                }

                                function directitnow(id) {

                                    $.ajax({
                                        type: "POST",
                                        url: 'directitnow',
                                        data: {propertyid: id},
                                        success: function (data) {


                                            if (data == '1') {
                                                toastr.warning('Profile status is Pending', 'warning');
                                            }
                                            else if (data == '2') {
                                                toastr.warning('Please upload your KYC documents', 'warning');
                                            }
                                            else if (data == '3') {
                                                toastr.warning('Your KYC documents not approved yet', 'warning');
                                            }
                                            else if (data == '4') {
                                                toastr.success('Your Request for this Direct Approach has Successfully send', 'success');
                                            }
                                            else if (data == '5') {
                                                toastr.error('Already Send Request For Direct Approach', 'error');
                                            }

                                            else {
                                                toastr.error('Internal Error', 'error');
                                            }

                                        },
                                    });

                                }


                                function getfreevisit(id) {

                                    var getexpectationID = $('#expectid').val();
                                    $.ajax({
                                        type: "POST",
                                        url: 'getfreevisit',
                                        data: {hardam: id,getexpectationID:getexpectationID},
                                        success: function (data) {


                                            if (data == '1') {


                                                toastr.success('Request for Site Visit has Successfully placed', 'success');
                                            } else if (data == '2') {

                                                toastr.success('Request for Site Visit has Successfully placed', 'success');
                                                toastr.warning('Your Free Site Visit Has Already Finished, Please Carry 100 Rs Along with you', 'warning');

                                            }
                                            else if (data == '5') {

                                                toastr.warning('Already Visited For this Site', 'warning');

                                            } else {
                                                toastr.error('Internal Error', 'error');
                                            }
                                        },
                                    });

                                }


                                function contactus(id) {

                                    $('#property_gy1').val('');
                                    $('#property_gy').val(id);
                                    $('#draggable2').modal('show');


                                }

                                function savemessage() {

                                    var propid = $('#property_gy').val();
                                    var textarew = $.trim($('#property_gy1').val());
                                    if (textarew != '') {
                                        $('#draggable2').modal('hide');
                                        $.ajax({
                                            url: 'savemessages',
                                            data: {propid: propid, textarew: textarew},
                                            success: function (data) {
                                                //alert(data);   
                                                if (data == '1') {
                                                    toastr.success('Your Message has Successfully sent', 'success');
                                                } else {
                                                    toastr.error('Server Error', 'error');
                                                }
                                            },
                                        });

                                    } else {
                                        toastr.error('Please Enter Something', 'error');

                                    }

                                }
</script>
