<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\MediaFilesConfig;
use common\models\MediaFiles;

/* @var $this yii\web\View */
/* @var $model common\models\Addproperty */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Addproperties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$viewid = $_GET['id'];
$expecidl = $_GET['expecidl'];
?>

<style type="text/css">
    body{
        background-color: #000000;
    }

    .details h2{
        font-size: 20px;
        color: #10101d;
        font-weight: 600;
        font-family: 'Roboto', sans-serif;
    }
    .details span{
        font-size: 17px;
        font-weight: 600;
        font-family: 'Roboto', sans-serif;
    }
    .details p{
        font-size: 15px;
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
		position:relative;
		right:6px;
    }
    .veiw_property_description_div_inner{
        border-left: 2px solid #0fd8da;
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
        padding: 8px 10px;
        color: #ffffff !important;
        letter-spacing: 1px;
        border-radius: 5px !important;
        text-decoration:none !important;
        transition:.4s;
		background:#10101d;
    }
    .list_anchr:hover{
        background:#fff;
        color:#10101d !important;
        transition:.4s;
        border: 1px solid #10101d !important;
    }
    .list_viw{
        list-style:none;
        display:inline-flex !important;
        padding:0 !important;
    }
    .list_viw li{
        padding: 0px 10px 0px 2px;
    }

    .seller_exp{
        top:15%;
    }
    .seller_exp .modal-content{
        border-radius:5px !important;
    }
    .seller_exp .modal-content{
        background:#ffffff;
    }
    .seller_exp .modal-header{
        border-bottom: 3px solid #0fd8da;
    }
    .seller_exp .close{
        position:absolute;
		right:25px;
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

    .document_s{
        padding:20px 0 20px 0;
        background:rgba(255,255,255,0.40);
        margin-top:30px;
        display:none;
		border-radius:10px;
    }
    .document_s .col-md-3{
        margin-top:20px;
    }
    .document_nam {
        width: 80%;
        margin: 0 auto;
        text-align: center;
        padding: 25px 0;
        color: #000;
        background-image: url(https://staging.15bells.com/frontend/web/dashimages/xdocuments.JPG.pagespeed.ic.zDs7bvACaM.webp);
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
        color: #10101d;
        text-transform: uppercase;
        font-weight: 600;
        border-bottom: 3px solid #10101d;
        padding-bottom: 2px;
    }
    .close_doc{
        position:absolute;
        font-size:22px;
        color:#10101d;
        top:10px;
        right:20px;
        cursor:pointer;
    }
    .nodoc{
        font-size: 24px;
        color: #0fd8da;
        padding: 20px;
    }
    
</style>


<div class="col-md-12 col-sm-12" style="padding: 0 20px 0 0; margin-top: -20px;">
    <div class="row" style=" margin: 0px;">
        <div class="col-md-12 btn_div_img_ved">
            <button class="btn btn-default" id="image_btn" type="submit">Photos</button>
            <button class="btn btn-default" id="vedio_btn" type="submit">Videos</button>
        </div>


       <div class="col-md-12 image_slider" style="padding: 0px;"> 
               <!-- main slider carousel -->
                <div class="row m-0">
                   
                     <input id="propid" type="hidden" value="<?php echo $viewid; ?>">
                     <input id="expectid" type="hidden" value="<?php echo $expecidl; ?>">
					<div id="demo" class="carousel slide" data-ride="carousel">
                        <?php 
                        
                        $mainimage = \common\models\Addproperty::find()->where(['id'=>$viewid])->one();
                        $status = $mainimage->status;
                        
                        if($mainimage->featured_image !=''){
                           $featured_image = $mainimage->featured_image;
                          }else{
                            $featured_image = 'gallery9.jpg';  
                          }
                        ?> 
                         <div class="carousel-inner">
                        <div class="carousel-item active">
									  <img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/'.$featured_image;  ?>" alt="Los Angeles" width="1100" height="500">
									</div>
                        <?php 
                      
                        $ids = [];
                        $pic = [];
                        $url = [];
                        $pictogramsID = MediaFilesConfig::find()->where(['property_id' => $viewid])->all();
                        foreach ($pictogramsID as $picID) {
                        $ids[] = $picID->media_id;
                        }
                        
                        $pictogramsID = MediaFiles::find()->where(['id' => $ids])->andWhere(['or',['type'=>'png'],['type'=>'jpeg'],['type'=>'jpg']])->all();
                        foreach ($pictogramsID as $picID) {
                        $pic[] = $picID->file_name;
                        }
                        
                        
                        if (empty($pic)) { ?>     
								  <!-- Indicators -->
								 
								  
									<div class="carousel-item">
									  <img class="view_img" src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/gallery9.jpg';  ?>" alt="Los Angeles" height="500">
									</div>
									
								 
								  
								   <?php } else{ 
                                
                               foreach($pic as $pics){ ?>
								  
								  <!-- The slideshow -->
								 
								  
									<div class="carousel-item"> 
									  <img class="view_img" src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/'.$pics;  ?>" alt="Los Angeles" height="500">
									</div>
									
								  
								  <?php  }   }  ?>
                                  </div>
								  
								  <!-- Left and right controls -->
								  <a class="carousel-control-prev" href="#demo" data-slide="prev">
									<span class="carousel-control-prev-icon"></span>
								  </a>
								  <a class="carousel-control-next" href="#demo" data-slide="next">
									<span class="carousel-control-next-icon"></span>
								  </a>
								</div>
								
                  </div>
                </div>
				<div class="col-md-12 vedio_slider" style="display: none; padding: 0px;"> 
               
               <!-- main slider carousel -->
                <div class="row">
                    <div class="col-md-12" id="slider">
                      <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            
                       <?php 
                        
                        $mainvideo = \common\models\Addproperty::find()->where(['id'=>$viewid])->one();
                        
                        if($mainvideo->featured_video !=''){
                           $featured_video = $mainvideo->featured_video;
                           ?>
                            
                       <div class="active item" data-slide-number="0">
                            <div class="center-block">
                              <span><video style="width:100%;height:500px;" controls loop  src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/'.$featured_video;  ?>"></video></span>
                            </div>
                          </div>     
                           
                        <?php    
                            
                          }else{  ?>
                            
                          <div class="active item" data-slide-number="0">
                            <div class="center-block">
                              <span><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/gallery10.jpg';  ?>" class="center-block img-responsive"></span>
                            </div>
                         </div>
                            
                              
                        <?php  }  ?>            
                            
                          
                          
                        </div>
                        <!-- main slider carousel nav controls -->
                        <!--  -->
                      </div>

                  </div>
                </div>
<!--                <div class="row hidden-xs hidden-sm" id="slider-thumbs">  
                  <div class="col-md-12">
                  <ul class="list-inline">
                      <li>  
                        <a id="carousel-selector-0" class="selected">
                          <img src="images/gallery1.jpg" width="100" height="100" class="img-responsive">
                        </a>
                      </li>
                      <li> 
                        <a id="carousel-selector-1">
                          <img src="images/gallery2.jpg" width="100" height="100" class="img-responsive">
                        </a>
                      </li>
                      
                  </ul>
                  </div>
                </div>-->


               </div>
				


       






    </div>
    <div class="row">


        <div class="col-md-12 text-center" style="padding-top:30px;">
            <ul class="list_viw">
                <li><a href="javascript:void(0)" onclick="directitnow(<?php echo $viewid ?>)" class="list_anchr">Instant Approach</a></li>
                <li><a href="javascript:void(0)" onclick="getchecki(<?php echo $viewid ?>)" class="list_anchr">Shortlist</a></li>
                <li><a href="javascript:void(0)" onclick="getfreevisit(<?php echo $viewid ?>)" class="list_anchr">Book Site Visit</a></li>
                <li><a  href="javascript:void(0)" class="list_anchr documents_show">Property Documents</a></li>

                <li><a href="#" class="list_anchr sellr_btnn">Seller Expectations</a></li>
              

            </ul>
        </div>

        <div class="col-md-12 document_s text-center mb-4">
            <h3 class=""><span class="prop_hed">Property Documents</span></h3>
            <i class="close_doc fa fa-close"></i>

            <?php
            $idsad = [];
            $media_ids = MediaFilesConfig::find()->select('media_id')->where(['property_id' => $viewid])->all();
            if (!empty($media_ids)) {
                foreach ($media_ids as $media_id) {
                    $idsad[] = $media_id->media_id;
                }

                $docnames = MediaFiles::find()->select('file_descr')->where(['id' => $idsad])->all();


                foreach ($docnames as $docname) {
                    ?>



                    <div class="col-md-3">
                        <div class="document_nam">
        <?php echo $docname->file_descr; ?>
                        </div>
                    </div>

                    <?php
                }
            } else {

                echo '<div class="nodoc">No Documents Uploaded</div>';
            }
            ?>



        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog seller_exp modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Seller Expectations</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <?php
                            $getseller = \common\models\Addproperty::find()->where(['id' => $viewid])->one();

                            $role_id = $getseller->role_id;

                            if ($role_id == 'seller') {
                                $getsellerexpec = \common\models\SellorExpectations::find()->where(['user_type' => 'sellor'])->andwhere(['property_id' => $viewid])->one();
                                ?>



                                
                                    <div class="col-md-12 veiw_property_description_div">
									<div class="row">
    <?php if ($getsellerexpec->expected_rate != '' && $getsellerexpec->expected_rate != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Expected rate</b><br>
                                                        <span>Rs. <?php echo $getsellerexpec->expected_rate; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getsellerexpec->rate_negotiable != '' && $getsellerexpec->rate_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Rate negotiable</b><br>
                                                        <span><?php echo $getsellerexpec->rate_negotiable; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getsellerexpec->payment_time != '' && $getsellerexpec->payment_time != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Payment time</b><br>
                                                        <span><?php echo $getsellerexpec->payment_time; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getsellerexpec->payment_time_negotiable != '' && $getsellerexpec->payment_time_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Payment time negotiable</b><br>
                                                        <span><?php echo $getsellerexpec->payment_time_negotiable; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getsellerexpec->loan_against_property != '' && $getsellerexpec->loan_against_property != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Loan against property</b><br>
                                                        <span><?php echo $getsellerexpec->loan_against_property; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getsellerexpec->all_dues_cleared != '' && $getsellerexpec->all_dues_cleared != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>All dues cleared</b><br>
                                                        <span><?php echo $getsellerexpec->all_dues_cleared; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getsellerexpec->vastu_facing != '' && $getsellerexpec->vastu_facing != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Vastu facing</b><br>
                                                        <span><?php echo $getsellerexpec->vastu_facing; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getsellerexpec->loan_to_be_applied != '' && $getsellerexpec->loan_to_be_applied != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>loan_to_be_applied</b><br>
                                                        <span><?php echo $getsellerexpec->loan_to_be_applied; ?></span>
                                                    </div>
                                                </div>
                                            </div>
    <?php } ?>
	</div>
                                    </div>


                              

                                <?php
                            } if ($role_id == 'lessor') {

                                $getlessorexpec = \common\models\LessorExpectations::find()->where(['user_type' => 'lessor'])->andwhere(['property_id' => $viewid])->one();
								//echo '<pre>';print_r($getlessorexpec);die;
                               if($getlessorexpec){
                                ?>    

                              
                                    <div class="col-md-12 veiw_property_description_div">
									  <div class="row">
    <?php if ($getlessorexpec->rent != '' && $getlessorexpec->rent != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Rent</b><br>
                                                        <span>Rs. <?php echo $getlessorexpec->rent; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->rent_negotiable != '' && $getlessorexpec->rent_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Rent negotiable</b><br>
                                                        <span>
                                                            <?php
                                                            $rent_negotiable = $getlessorexpec->rent_negotiable == 0 ? 'No' : "Yes";
                                                            echo $rent_negotiable;
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->auto_cad_drawing != '' && $getlessorexpec->auto_cad_drawing != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Auto cad_drawing</b><br>
                                                        <span><?php echo $getlessorexpec->auto_cad_drawing; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->site_approval != '' && $getlessorexpec->site_approval != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Site approval</b><br>
                                                        <span><?php echo $getlessorexpec->site_approval; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->wet_points != '' && $getlessorexpec->wet_points != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Wet points</b><br>
                                                        <span><?php echo $getlessorexpec->wet_points; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->interest_security != '' && $getlessorexpec->interest_security != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Interest security</b><br>
                                                        <span><?php echo $getlessorexpec->interest_security; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->interest_negotiable != '' && $getlessorexpec->interest_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Interest negotiable</b><br>
                                                        <span><?php
                                                            $interest_negotiable = $getlessorexpec->interest_negotiable == 0 ? 'No' : "Yes";
                                                            echo $interest_negotiable;
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->agreement != '' && $getlessorexpec->agreement != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Agreement</b><br>
                                                        <span><?php echo $getlessorexpec->agreement; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->agreement_negotiable != '' && $getlessorexpec->agreement_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Agreement Negotiable</b><br>
                                                        <span><?php
                                                            $agreement_negotiable = $getlessorexpec->agreement_negotiable == 0 ? 'No' : "Yes";
                                                            echo $agreement_negotiable;
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->lease_tenure != '' && $getlessorexpec->lease_tenure != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Lease tenure</b><br>
                                                        <span><?php
                                                            $lease_tenure = $getlessorexpec->lease_tenure == 0 ? 'No' : "Yes";
                                                            echo $lease_tenure;
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->tenure_negotiable != '' && $getlessorexpec->tenure_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Tenure negotiable</b><br>
                                                        <span><?php
                                                            $tenure_negotiable = $getlessorexpec->tenure_negotiable == 0 ? 'No' : "Yes";
                                                            echo $tenure_negotiable;
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->lock_in_period != '' && $getlessorexpec->lock_in_period != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Lock in period</b><br>
                                                        <span><?php echo $getlessorexpec->lock_in_period; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->lock_negotiable != '' && $getlessorexpec->lock_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Lock negotiable</b><br>
                                                        <span><?php
                                                            $lock_negotiable = $getlessorexpec->lock_negotiable == 0 ? 'No' : "Yes";
                                                            echo $lock_negotiable;
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->escalation_value != '' && $getlessorexpec->escalation_value != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Escalation value</b><br>
                                                        <span><?php echo $getlessorexpec->escalation_value; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->escalation_month != '' && $getlessorexpec->escalation_month != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Escalation month</b><br>
                                                        <span><?php echo $getlessorexpec->escalation_month; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->escalation_negotiable != '' && $getlessorexpec->escalation_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Escalation negotiable</b><br>
                                                        <span><?php
                                                            $escalation_negotiable = $getlessorexpec->escalation_negotiable == 0 ? 'No' : "Yes";
                                                            echo $escalation_negotiable;
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->maintenance_value != '' && $getlessorexpec->maintenance_value != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Maintenance value</b><br>
                                                        <span><?php echo $getlessorexpec->maintenance_value; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->maintenance_hours != '' && $getlessorexpec->maintenance_hours != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Maintenance hours</b><br>
                                                        <span><?php echo $getlessorexpec->maintenance_hours; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->maintenance_subject_change != '' && $getlessorexpec->maintenance_subject_change != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Maintenance subject change</b><br>
                                                        <span><?php echo $getlessorexpec->maintenance_subject_change; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->last_date_rent != '' && $getlessorexpec->last_date_rent != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Last date rent</b><br>
                                                        <span><?php echo $getlessorexpec->last_date_rent; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->last_date_negotiable != '' && $getlessorexpec->last_date_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Last date negotiable</b><br>
                                                        <span><?php
                                                            $last_date_negotiable = $getlessorexpec->last_date_negotiable == 0 ? 'No' : "Yes";
                                                            echo $last_date_negotiable;
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->fit_out_period != '' && $getlessorexpec->fit_out_period != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Fit out period</b><br>
                                                        <span><?php echo $getlessorexpec->fit_out_period; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->fit_out_negotiable != '' && $getlessorexpec->fit_out_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Fit out negotiable</b><br>
                                                        <span><?php
                                                            $fit_out_negotiable = $getlessorexpec->fit_out_negotiable == 0 ? 'No' : "Yes";
                                                            echo $fit_out_negotiable;
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->present_electricity_load != '' && $getlessorexpec->present_electricity_load != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Present electricity load</b><br>
                                                        <span><?php echo $getlessorexpec->present_electricity_load; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->clarity_on_meter != '' && $getlessorexpec->clarity_on_meter != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Clarity on meter</b><br>
                                                        <span><?php echo $getlessorexpec->clarity_on_meter; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->power_backup != '' && $getlessorexpec->power_backup != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Power backup</b><br>
                                                        <span><?php echo $getlessorexpec->power_backup; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->power_can_be_discussed != '' && $getlessorexpec->power_can_be_discussed != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Power can be discussed</b><br>
                                                        <span><?php
                                                            $power_can_be_discussed = $getlessorexpec->power_can_be_discussed == 0 ? 'No' : "Yes";
                                                            echo $power_can_be_discussed;
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->seperate_space != '' && $getlessorexpec->seperate_space != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Seperate space</b><br>
                                                        <span><?php echo $getlessorexpec->seperate_space; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->car_parking != '' && $getlessorexpec->car_parking != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Car parking</b><br>
                                                        <span><?php echo $getlessorexpec->car_parking; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->motor_water_supply != '' && $getlessorexpec->motor_water_supply != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Motor water supply</b><br>
                                                        <span><?php echo $getlessorexpec->motor_water_supply; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->water_supply_part_maintenance != '' && $getlessorexpec->water_supply_part_maintenance != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Water supply part maintenance</b><br>
                                                        <span><?php echo $getlessorexpec->water_supply_part_maintenance; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->working_restriction != '' && $getlessorexpec->working_restriction != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Working restriction</b><br>
                                                        <span><?php echo $getlessorexpec->working_restriction; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->washroom_provision != '' && $getlessorexpec->washroom_provision != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Washroom provision</b><br>
                                                        <span><?php echo $getlessorexpec->washroom_provision; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->usuable_area != '' && $getlessorexpec->usuable_area != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Usuable_area</b><br>
                                                        <span><?php echo $getlessorexpec->usuable_area; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->usuable_area_length != '' && $getlessorexpec->usuable_area_length != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Usuable area length</b><br>
                                                        <span><?php echo $getlessorexpec->usuable_area_length; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
    <?php if ($getlessorexpec->usuable_area_breadth != '' && $getlessorexpec->usuable_area_breadth != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Usuable area breadth</b><br>
                                                        <span><?php echo $getlessorexpec->usuable_area_breadth; ?></span>
                                                    </div>
                                                </div>
                                            </div>
    <?php } ?>
                                    </div>



                                </div>

<?php }  } ?>

<input type="hidden" id="role_name" value="<?php echo $role_id; ?>">



                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-12 details sellr_proprty">



            <?php
            $property = \common\models\Addproperty::find()->where(['id' => $viewid])->one();
            $project_type_id = $property->project_type_id;
            $property_type = \common\models\PropertyType::find()->where(['id' => $project_type_id])->one();


            $property_for = $property->property_for != '' ? $property->property_for : "";
            $locality = $property->locality != '' ? $property->locality : "";
            $price_acres = $property->price_acres != '' ? $property->price_acres : "";
            $request_for = $property->request_for != '' ? $property->request_for : "";
            $total_plot_area = $property->total_plot_area != '' ? $property->total_plot_area : "";
            $maintenance_cost = $property->maintenance_cost != '' ? $property->maintenance_cost : "";
            $featured_imaged = $property->featured_image != '' ? $property->featured_image : "";
            $expected_price = $property->expected_price != '' ? $property->expected_price : "";
            $annual_dues_payable = $property->annual_dues_payable != '' ? $property->annual_dues_payable : "";
            $city = $property->city != '' ? $property->city : "";
            $price_sq_ft = $property->price_sq_ft != '' ? $property->price_sq_ft : "";
            $expected_rental = $property->asking_rental_price != '' ? $property->asking_rental_price : "";
            $price_negotiable = $property->price_negotiable != '' ? $property->price_negotiable : "";
            $shed_RCC = $property->shed_RCC != '' ? $property->shed_RCC : "";
            $possesion_by = $property->possesion_by != '' ? $property->possesion_by : "";
            $revenue_lauout = $property->revenue_lauout != '' ? $property->revenue_lauout : "";
            $maintenance_by = $property->maintenance_by != '' ? $property->maintenance_by : "";
            $ownership = $property->ownership != '' ? $property->ownership : "";
            $present_status = $property->present_status != '' ? $property->present_status : "";
            $availability = $property->availability != '' ? $property->availability : "";
            $facing = $property->facing != '' ? $property->facing : "";
            $jurisdiction_development = $property->jurisdiction_development != '' ? $property->jurisdiction_development : "";
            $age_of_property = $property->age_of_property != '' ? $property->age_of_property : "";
            $FAR_approval = $property->FAR_approval != '' ? $property->FAR_approval : "";
            $LOAN_taken = $property->LOAN_taken != '' ? $property->LOAN_taken : "";
            $property_on_floor = $property->property_on_floor != '' ? $property->property_on_floor : "";
            $parking = $property->parking != '' ? $property->parking : "";
            $buildup_area = $property->buildup_area != '' ? $property->buildup_area : "";
            $configuration = $property->configuration != '' ? $property->configuration : "";
            $carpet_area = $property->carpet_area != '' ? $property->carpet_area : "";
            $floors_allowed_construction = $property->floors_allowed_construction != '' ? $property->floors_allowed_construction : "";
            $total_floors = $property->total_floors != '' ? $property->total_floors : "";
            $furnished_status = $property->furnished_status != '' ? $property->furnished_status : "";
            $bedrooms = $property->bedrooms != '' ? $property->bedrooms : "";
            $bathrooms = $property->bathrooms != '' ? $property->bathrooms : "";
            $balconies = $property->balconies != '' ? $property->balconies : "";
            $pooja_room = $property->pooja_room != '' ? $property->pooja_room : "";
            $property_types = $property_type->typename != '' ? $property_type->typename : "";
            $undercategory = $property_type->undercategory;


            if ($undercategory == 'Residential') {
                $content = $furnished_status . ' ' . $property_types . ' on ' . $property_for . ' in ' . $locality . (( $buildup_area == null) ? ' - plot area : ' . $total_plot_area . ' sqft' : ' - super area : ' . $buildup_area . ' sqft ') . ' - furnishing specification :* bedrooms : ' . $bedrooms . ' * bathrooms : ' . $bathrooms . ' * balconies : ' . $balconies . ' * pooja room : ' . $pooja_room . ' * study_room * servant_room , For more details or Site Visit , please Contact Us..';
            } else {
                $content = 'A very good ' . $property_types . ' availabale for rent/lease in ' . $city . ' with Plot area ' . $total_plot_area . ' sqft, Superbuiltup ' . $buildup_area . ' sqft, It is a ' . $furnished_status . ' property suitable for any kind of ' . $property_types . ', For more details or Site Visit , please Contact Us..';
            }
            ?>


            <h2 class="exp_titl"> <?php echo $property_types . ' for ' . $property_for . ' in ' . $city; ?></h2>
            <span> <?php echo $property->expected_price != '' ? $expected_price : $expected_rental ?> Rs @  <?php echo $price_sq_ft; ?> per sqft</span>
            <p> <?php echo $content; ?>.</p>

        </div>
    </div>
    <div class="row veiw_property_description_row sellr_proprty">
        <div class="caption font-green-sharp exp_titl">
                                        
                                        <span class="caption-subject bold uppercase exp_name">Property Details</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>

        <div class="col-md-12 veiw_property_description_div">
			<div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                    <div class="col-sm-10 veiw_property_description_div_inner">
                        <b>Property Type</b><br>
                        <span><?php echo $property_types; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                    <div class="col-sm-10 veiw_property_description_div_inner">
                        <b>Locality</b><br>
                        <span><?php echo $locality; ?></span>
                    </div>
                </div>
            </div>

<?php if ($price_acres != '' && $price_acres != null) { ?>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                        <div class="col-sm-10 veiw_property_description_div_inner">
                            <b>Price Acres</b><br>
                            <span>Rs. <?php echo $price_acres; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
<?php if ($request_for != '' && $request_for != null) { ?>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                        <div class="col-sm-10 veiw_property_description_div_inner">
                            <b>Request For</b><br>
                            <span><?php echo $request_for; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>

<?php if ($total_plot_area != '' && $total_plot_area != null) { ?>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                        <div class="col-sm-10 veiw_property_description_div_inner">
                            <b>Plot Area</b><br>
                            <span><?php echo $total_plot_area; ?> sq_yards</span>
                        </div>
                    </div>
                </div>
            <?php } ?>
<?php if ($maintenance_cost != '' && $maintenance_cost != null) { ?>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                        <div class="col-sm-10 veiw_property_description_div_inner">
                            <b>Maintanance Cost</b><br>
                            <span>Rs. <?php echo $maintenance_cost; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
<?php if ($featured_imaged != '' && $featured_imaged != null) { ?>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                        <div class="col-sm-10 veiw_property_description_div_inner">
                            <b>Image name</b><br>
                            <span><?php echo $featured_imaged; ?><span>
                                    </div>
                                    </div>
                                    </div>
                                <?php } ?>
<?php if ($expected_price != '' && $expected_price != null) { ?>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Expected Price</b><br>
                                                <span>Rs. <?php echo $expected_price; ?></span>
                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>

<?php if ($annual_dues_payable != '' && $annual_dues_payable != null) { ?>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Annual Dues Payable</b><br>
                                                <span>Rs. <?php echo $annual_dues_payable; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
<?php if ($city != '' && $city != null) { ?>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>City</b><br>
                                                <span><?php echo $city; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

<?php if ($price_sq_ft != '' && $price_sq_ft != null) { ?>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Price Sq Ft</b><br>
                                                <span>Rs. <?php echo $price_sq_ft; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

<?php if ($expected_rental != '' && $expected_rental != null) { ?>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                            <div class="col-sm-10 veiw_property_description_div_inner">
                                                <b>Expected Rental</b><br>
                                                <span>Rs. <?php echo $expected_rental; ?></span>
                                            </div>
                                        </div>
                                    </div>
<?php } ?>

                                </div>
                                </div>
                                </div>
                                <div class="row veiw_property_description_row sellr_proprty">
                                    <div class="col-md-12 veiw_property_description_div">
									<div class="row">
<?php if ($price_negotiable != '' && $price_negotiable != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Price Negotiable</b><br>
                                                        <span><?php echo $price_negotiable; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

<?php if ($shed_RCC != '' && $shed_RCC != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Shed Rcc</b><br>
                                                        <span><?php echo $shed_RCC; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

<?php if ($possesion_by != '' && $possesion_by != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Possession By</b><br>
                                                        <span><?php echo $possesion_by; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($revenue_lauout != '' && $revenue_lauout != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Revenue Lauout</b><br>
                                                        <span><?php echo $revenue_lauout; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($maintenance_by != '' && $maintenance_by != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Maintenance By</b><br>
                                                        <span><?php echo $maintenance_by; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($ownership != '' && $ownership != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Ownership</b><br>
                                                        <span><?php echo $ownership; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($present_status != '' && $present_status != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Present Status</b><br>
                                                        <span><?php echo $present_status; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

<?php if ($availability != '' && $availability != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Availability</b><br>
                                                        <span><?php echo $availability; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($facing != '' && $facing != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Facing</b><br>
                                                        <span><?php echo $facing; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($jurisdiction_development != '' && $jurisdiction_development != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Jurisdiction Development</b><br>
                                                        <span><?php echo $jurisdiction_development; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($age_of_property != '' && $age_of_property != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Age Of Property</b><br>
                                                        <span><?php echo $age_of_property; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($FAR_approval != '' && $FAR_approval != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Far Approval</b><br>
                                                        <span><?php echo $FAR_approval; ?></span>
                                                    </div>
                                                </div>
                                            </div>
<?php } ?>
                                    </div>
                                </div>
                                </div>
                                <div class="row veiw_property_description_row sellr_proprty">
                                    <div class="col-md-12 veiw_property_description_div">
									<div class="row">
<?php if ($LOAN_taken != '' && $LOAN_taken != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Loan Taken</b><br>
                                                        <span><?php echo $LOAN_taken; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

<?php if ($property_on_floor != '' && $property_on_floor != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Property On Floor</b><br>
                                                        <span><?php echo $property_on_floor; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($parking != '' && $parking != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Reserved Parking</b><br>
                                                        <span><?php echo $parking; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($buildup_area != '' && $buildup_area != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Built up Area</b><br>
                                                        <span><?php echo $buildup_area; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($configuration != '' && $configuration != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Configuration</b><br>
                                                        <span><?php echo $configuration; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($carpet_area != '' && $carpet_area != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Carpet Area</b><br>
                                                        <span><?php echo $carpet_area; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

<?php if ($floors_allowed_construction != '' && $floors_allowed_construction != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Floors Allowed Construction</b><br>
                                                        <span><?php echo $floors_allowed_construction; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($total_floors != '' && $total_floors != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Total Floors</b><br>
                                                        <span><?php echo $total_floors; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
<?php if ($furnished_status != '' && $furnished_status != null) { ?>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl') . '/propertydefaultimg/bullet_tick.png'; ?>"> </div>
                                                    <div class="col-sm-10 veiw_property_description_div_inner">
                                                        <b>Furnishing Status</b><br>
                                                        <span><?php echo $furnished_status; ?></span>
                                                    </div>
                                                </div>
                                            </div>
<?php } ?>
                                    </div>
                                    </div>
                                </div>


                                </div>


                                <div class="modal fade" id="draggable2" data-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" style="margin-top: 0px;width: 40%;top: 20%;">
                                        <div class="modal-content">
                                            <div class="modal-header greenHeader">
                                                <h4 class="modal-title textShadowHeading" style="color:#ea5460;">Contact Us</h4>
                                            </div>

                                            <div class="modal-body" style="padding-left: 0px;">

                                                <form class="form-horizontal" role="form" name="contact-form" id="contact-form" method="post">   
                                                    <div class="form-body">   
                                                        <div class="row" style="margin:0;padding:4px 15px;">

                                                            <div class="col-md-12">
                                                                <input type="hidden" id="property_gy" value="">
                                                                <div class="form-group formpad">
                                                                    <label class="control-label">ENTER A MESSAGE*</label>


                                                                    <textarea id="property_gy1" class="form-control" ></textarea>

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

                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                                <script type="text/javascript">

								var expectid =$('#expectid').val();
								var role_name =$('#role_name').val();
                                                            $(document).ready(function () {

                                                                $(".documents_show").click(function () {
                                                                    $(".document_s").slideDown('1000');
                                                                });

                                                                $(".close_doc").click(function () {
                                                                    $(".document_s").slideUp('1000');
                                                                });

                                                                $(".sellr_btnn").click(function () {
                                                                    $("#myModal").modal('show');
                                                                });
                                                                $("#image_btn").click(function () {
                                                                    $(".image_slider").show();
                                                                    $(".vedio_slider").hide();
                                                                });
                                                                $("#vedio_btn").click(function () {
                                                                    $(".image_slider").hide();
                                                                    $(".vedio_slider").show();
                                                                });
                                                            });
                                </script>  
                                <script type="text/javascript">
                                    $('#myCarousel').carousel({
                                        pause: true,
                                        interval: false
                                    });

                                    // handles the carousel thumbnails
                                    $('[id^=carousel-selector-]').click(function () {
                                        var id_selector = $(this).attr("id");
                                        var id = id_selector.substr(id_selector.length - 1);
                                        id = parseInt(id);
                                        $('#myCarousel').carousel(id);
                                        $('[id^=carousel-selector-]').removeClass('selected');
                                        $(this).addClass('selected');
                                    });

                                    $('#myCarousel').bind('slide.bs.carousel', function (e) {
                                        var slideFrom = $(this).find('.active').index();
                                        var videoContent = $('.item[data-slide-number=' + slideFrom + '] .embed-responsive');
                                        videoContent.html(videoContent.html());
                                    });

                                    // when the carousel slides, auto update
                                    $('#myCarousel').on('slid.bs.carousel', function (e) {
                                        var id = $('.item.active').data('slide-number');
                                        id = parseInt(id);
                                        $('[id^=carousel-selector-]').removeClass('selected');
                                        $('[id=carousel-selector-' + id + ']').addClass('selected');
                                    });
                                </script>

                                <script>

                                    function directitnow(id) {

                                        $.ajax({
											
											type:"POST",
                                            url: 'https://staging.15bells.com<?= Yii::$app->urlManager->createUrl("lesseeaction/directitnow") ?>',
                                            data: {propertyid: id},
                                            success: function (data) {


                                                if (data == '1') {
                                                    toastr.warning('Profile status is Pending', 'warning');
                                                } else if (data == '2') {
                                                    toastr.warning('Please upload your KYC documents', 'warning');
                                                } else if (data == '3') {
                                                    toastr.warning('Your KYC documents not approved yet', 'warning');
                                                } else if (data == '4') {
                                                    toastr.success('Your Request for this Direct Approach has Successfully send', 'success');
                                                } else if (data == '5') {
                                                    toastr.error('Already Send Request For Direct Approach', 'error');
                                                } else {
                                                    toastr.error('Internal Error', 'error');
                                                }

                                            },
                                        });

                                    }


                                    function getfreevisit(id) {

                                        if(role_name == 'lessor'){
                                           var url =  '/lesseeaction/getfreevisit';
                                        }else{
                                            var url =  '/buyeraction/getfreevisit';
                                        }
                                        $.ajax({
											type:"POST",
                                            url: url,
                                            data: {hardam: id,getexpectationID:expectid},
                                            success: function (data) {


                                                if (data == '1') {


                                                    toastr.success('Request for Site Visit has Successfully placed', 'success');
                                                } else if (data == '2') {

                                                    toastr.success('Request for Site Visit has Successfully placed', 'success');
                                                    toastr.warning('Your Free Site Visit Has Already Finished, Please Carry 100 Rs Along with you', 'warning');

                                                } else if (data == '5') {

                                                    toastr.warning('Already Visited For this Site', 'warning');

                                                } else {
                                                    toastr.error('Internal Error', 'error');
                                                }
                                            },
                                        });

                                    }


                                    function getchecki(id) {

                                         if(role_name == 'lessor'){
                                           var url =  '/lesseeaction/saveprop';
                                        }else{
                                            var url =  '/buyeraction/saveprop';
                                        }

                                        $.ajax({
											type:"POST",
                                            url: url,
                                            data: {hardam: id,expectation_id:expectid},
                                            success: function (data) {

                                                if (data == '1') {

                                                    toastr.error('This Property is Already Shortlisted', 'error');
                                                } else {
                                                    toastr.success('Property Shortlisted Successfully', 'success');
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

                                                type: "POST",
                                                url: "/lesseeaction/savemessages",
                                                data: {propid: propid, textarew: textarew},
                                                success: function (data) {
                                                    
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

