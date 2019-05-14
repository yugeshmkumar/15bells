<?php

use yii\helpers\Url;
use yii\db\Query;

$userid = Yii::$app->user->identity->id;
?>
<style>
    .ajamore{
    
   font-size: 13px !important;
    color: #828282 !important;
    font-weight: 400 !important;
    font-family: 'Roboto', sans-serif;
    
}
.modal-lg{
	width:82%;
}
.apni{
    width:100%;
}
</style>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <?php
            $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
            if ($checkrole->item_name == "Company_user") {
                ?> 
                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/couserdash']) ?>">Home</a><?php } else { ?>
                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/userdash']) ?>">Home</a>
            <?php } ?>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>User</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>SHORTLIST</span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->
<br/>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-opencart"></i>My Shortlisted Properties </div>
        <div class="actions">

            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="panel-group accordion" id="accordion1">

            <?php
            $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$userid' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN shortlistproperty as st ON (st.property_id = a.id ) where st.user_id = $userid and a.property_for ='rent'  GROUP BY a.id";


            $data = \Yii::$app->db->createCommand($sqlstr)->queryAll();

            //echo '<pre>';print_r($data);die;
//            
//            
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

            $count = 0;
            foreach ($data as $key => $datas) {
                $count += 1;
                $imaged = $datas['featured_image'];

                $showChar = 100;
                $ellipsestext = "...";
                $moretext = "Show more";
                $lesstext = "Show less";

                $content = 'A very good ' . $datas['typename'] . ' availabale for rent/lease in ' . $datas['city'] . ' with Plot area ' . $datas['total_plot_area'] . ' sqft, Superbuilt up ' . $datas['buildup_area'] . ' sqft, It is a ' . $datas['furnished_status'] . ' property suitable for any kind of ' . $datas['typename'] . ', For more details or Site Visit , please Contact Us..';

                $c = substr($content, 0, $showChar);
                $h = substr($content, $showChar - 1, strlen($content) - $showChar);
                $html = $c . '<span class="moreellipses">' . $ellipsestext . '&nbsp;</span><span class="morecontent"><span class="ajamore">' . $h . '</span>&nbsp;&nbsp;<a onclick="getmoredata(this.id)" href="javascript:;" id="morelinks_' . $datas['id'] . '" class="morelinks">' . $moretext . '</a></span>';
                ?>                       

                <div class="panel panel-default">
                    <div class="panel-heading" onclick="changeclass(this.id)" id="getclassd_<?php echo $count; ?>" >
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?php echo $count; ?>" aria-expanded="false"> <?php echo $count . '&nbsp &nbsp' . $datas['undercategory'] . '&nbsp &nbsp' . $datas['typename']; ?> </a>
                        </h4>
                    </div>
                    <div id="collapse_<?php echo $count; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">

                            <section id="searchtab">
                                <div class="container"  id="searchtab">
                                    <div id="removed" class="col-md-9">
                                        <div class="row"> 
                                            <div class="col-md-12 borderproperty">
                                                <div class="col-md-3">
                                                    <div class="proimage">
                                                        <img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/' . (( $imaged == null) ? 'not.jpg' : $imaged ) ?>" alt="..."  title="....">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="deatil">
                                                        <h1><span><b><i class="fa fa-inr" aria-hidden="true"></i></b> <?php echo $datas['asking_rental_price']; ?> </span><a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/view?id=' . $datas['id'] . '']) ?>" target="_blank" ><?php echo $datas['typename'] . 'available for rent in ' . $datas['city']; ?></a></h1>
                                                        <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Locality : <?php echo $datas['locality'] ?></p>
                                                        <p class="highlight">Highlights: On Rent / <?php echo $datas['age_of_property']; ?>+year old <?php echo ($datas['furnished_status'] == null ? '' : '/' . $datas['furnished_status'] ); ?> / <?php echo $datas['property_on_floor'] ?>th Floor <?php echo ($datas['total_floors'] == null ? '' : '(out of ' . $datas['total_floors'] . ')'); ?></p>
                                                        <p><b>Description:</b> <?php echo $html; ?></p>
                                                        <p class="aminities">
                                                        <ul class="list_li">
                                                            <li><i class="fa fa-building" aria-hidden="true"></i> <?php echo ( $datas['total_plot_area'] == null ? $datas['buildup_area'] : $datas['total_plot_area']); ?> sqft</li>

                                                            <li><i class="fa fa-users" aria-hidden="true"></i> <?php echo $datas['county1'] ?></li>
                                                        </ul>
                                                        </p>
                                                    </div>
                                                    <div class="btncart col-md-12" style="padding-left: 60px;">

                                                    <?php echo (($datas['request_for'] == 'direct') ? 
                                                     '<button class="btn btn-default  btnlast" id="'.$datas['id'].'" type="button" onclick="bititnow(this.id)"> 
                                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Direct sale</button>'
                                                            
                                                           : '<button class="btn btn-default  btnlast" id="'.$datas['id'].'" type="button" onclick="bititnow(this.id)"> 
                                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Bid it Now</button>' ) ?>



                                                        <button class="btn btn-success btnsecond" id="<?php echo $datas['id']; ?>" onclick="getfreevisit(this.id)" type="button">
                                                        <?php echo  ($datas['county'] > 0 ? 'Site Visited' : 'Book Site Visit') ?>   
                                                            

                                                        </button>
                                                        <button style="background-color:#000;" class="btn btn-success btnsecond" id="<?php echo $datas['id']; ?>" onclick="contactus(this.id)" type="button"> Contact us

                                                        </button>
<!--                                                        <label style="padding-left:15px;padding-right:15px;position: relative;top: 8px;"><button class="btn btnfirst" id="<?php echo $datas['id']; ?>" onclick="getchecki(this.id)" type="button" alt="Shortlist property"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button></label>-->


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="secure">
                                                        <img src="<?= Yii::$app->request->baseUrl . '/img/Sheild.jpg' ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-7" style="padding:10px 0;"><div class="col-md-4 hidden-xs"></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
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

<?php } ?>      

        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

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
                                             
                                            
                                            $.ajax({
                                                url: 'getfreevisit',
                                                data: {hardam: id},
                                                success: function (data) {
                                              
                                                
                                                if(data == '1'){
                                                    
                                                    
                                                toastr.success('Request for Site Visit has Successfully placed','success');    
                                                }else if(data == '2'){
                                                    
                                                   toastr.success('Request for Site Visit has Successfully placed','success'); 
                                                   toastr.warning('Your Free Site Visit Has Already Finished, Please Carry 100 Rs Along with you','warning');    
                                                   
                                                }
                                                else if(data == '5'){
                                                    
                                                   toastr.warning('Already Visited For this Site','warning');    
                                                   
                                                }else{
                                                   toastr.error('Internal Error','error');    
                                                        }
                                                },
                                            });

                                        }
                                        
                                        
                                        function contactus(id){ 
    
        $('#property_gy1').val('');
        $('#property_gy').val(id);
        $('#draggable2').modal('show');
       
    
    }
    
    function savemessage(){
        
           var propid = $('#property_gy').val();
           var textarew = $.trim($('#property_gy1').val());
           if(textarew != ''){  
           $('#draggable2').modal('hide');
           $.ajax({
                                                url: 'savemessages',
                                                data: {propid:propid,textarew:textarew},
                                                success: function (data) {
                                                 //alert(data);   
                                                  if(data == '1'){
                                                   toastr.success('Your Message has Successfully sent', 'success');   
                                                  }else{
                                                   toastr.error('Server Error', 'error');   
                                                  }  
                                                },
                                            });
                  
        }else{
            toastr.error('Please Enter Something', 'error');
            
        }
     
    }
</script>
