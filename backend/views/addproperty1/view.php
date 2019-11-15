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

?>

<style type="text/css">
    body{
        background-color: #000000;
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
  </style>

  
  <div class="col-md-9 col-sm-8" style="padding: 0 20px 0 0; margin-top: -20px;">
             <div class="row" style=" margin: 0px;">
              <div class="col-md-12 btn_div_img_ved">
                <button class="btn btn-default" id="image_btn" type="submit">Photos</button>
              <button class="btn btn-default" id="vedio_btn" type="submit">Videos</button>
              </div>


               <div class="col-md-12 image_slider" style="padding: 0px;"> 
               <!-- main slider carousel -->
                <div class="row">
                    <div class="col-md-12" id="slider">
                      <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                       <?php 
                        
                        $mainimage = \common\models\Addproperty::find()->where(['id'=>$viewid])->one();
                        
                        if($mainimage->featured_image !=''){
                           $featured_image = $mainimage->featured_image;
                          }else{
                            $featured_image = 'gallery9.jpg';  
                          }
                        ?>        
                            
                          <div class="active item" data-slide-number="0">
                            <div class="center-block">
                              <span><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/'.$featured_image;  ?>" class="center-block img-responsive"></span>
                            </div>
                          </div>
                            
                            
                          <?php 
                      
                        $ids = [];
                        $pic = [];
                        $url = [];
                        $pictogramsID = MediaFilesConfig::find()->where(['property_id' => $viewid])->all();
                        foreach ($pictogramsID as $picID) {
                        $ids[] = $picID->media_id;
                        }
                        
                        $pictogramsID = MediaFiles::find()->where(['id' => $ids])->all();
                        foreach ($pictogramsID as $picID) {
                        $pic[] = $picID->file_name;
                        }
                        
                        if (empty($pic)) { ?>    
                            
                            
                          <div class="item" data-slide-number="1">
                            <div class="center-block">
                              <span><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/gallery10.jpg';  ?>" class="center-block img-responsive"></span>
                            </div>
                          </div>
                            
                            <?php } else{ 
                                
                               foreach($pic as $pics){ ?>
                            
                            
                           <div class="item" data-slide-number="1">
                            <div class="center-block">
                              <span><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/'.$pics;  ?>" class="center-block img-responsive"></span>
                            </div>
                          </div>        
                                   
                                   
                                  <?php  }   }  ?>
                          
                        </div>
                        <!-- main slider carousel nav controls -->
                        <!--  -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                          </a>
                      </div>

                  </div>
                </div>
<!--                <div class="row hidden-xs hidden-sm" id="slider-thumbs">  
                  <div class="col-md-12">
                  <ul class="list-inline" style="width: 100%;display: inline-flex;">
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
                      <li> 
                        <a id="carousel-selector-2">
                          <img src="images/gallery3.jpg" width="100" height="100" class="img-responsive">
                        </a>
                      </li>
                      <li> 
                        <a id="carousel-selector-3">
                          <img src="images/gallery4.jpg" width="100" height="100" class="img-responsive">
                        </a>
                      </li>
                      <li> 
                        <a id="carousel-selector-4">
                          <img src="images/gallery5.jpg" width="100" height="100" class="img-responsive">
                        </a>
                      </li>
                      <li> 
                        <a id="carousel-selector-5">
                          <img src="images/gallery6.jpg" width="100" height="100" class="img-responsive">
                        </a>
                      </li>
                      <li> 
                        <a id="carousel-selector-6">
                          <img src="images/gallery7.jpg" width="100" height="100" class="img-responsive">
                        </a>
                      </li>
                      <li> 
                        <a id="carousel-selector-7">
                          <img src="images/gallery8.jpg" width="100" height="100" class="img-responsive">
                        </a>
                      </li>
                      
                  </ul>
                  </div>
                </div>-->



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
                              <span><video controls loop  src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/'.$featured_video;  ?>"></video></span>
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





               <div class="col-md-12 div_upload_document_image text-right">
                   <a href="<?= Yii::$app->getUrlManager()->getBaseUrl() ."/index.php/addproperty/additional?idm=$viewid";  ?>">
                 <label class="btn-bs-file btn btn-lg ">
                      <i class="fa fa-upload" aria-hidden="true"></i> Upload Image
                      
                  </label></a>&nbsp;
                  <a href="<?= Yii::$app->getUrlManager()->getBaseUrl() ."/index.php/addproperty/additional?idm=$viewid";  ?>">
                  <label class="btn-bs-file btn btn-lg ">
                      <i class="fa fa-upload" aria-hidden="true"></i> Upload Video
                      
                  </label></a>&nbsp;
                   <a href="<?= Yii::$app->getUrlManager()->getBaseUrl() ."/index.php/addproperty/documents?id=$viewid";  ?>">
                  <label class="btn-bs-file btn btn-lg ">
                      <i class="fa fa-upload" aria-hidden="true"></i> Upload Documents
                     
                  </label></a>&nbsp;
               </div>
             </div>
             <div class="row">
               <div class="col-md-12 details">
                 
              
             
            <?php 
                        
               $property = \common\models\Addproperty::find()->where(['id'=>$viewid])->one();
               $project_type_id = $property->project_type_id;
               $property_type = \common\models\PropertyType::find()->where(['id'=>$project_type_id])->one();
               
                          
               $property_for = $property->property_for !='' ? $property->property_for : "_________";
               $locality = $property->locality !='' ? $property->locality : "_________";
               $price_acres = $property->price_acres !='' ? $property->price_acres : "_________";
               $request_for = $property->request_for !='' ? $property->request_for : "_________";
               $total_plot_area = $property->total_plot_area !='' ? $property->total_plot_area : "_________";
               $maintenance_cost = $property->maintenance_cost !='' ? $property->maintenance_cost : "_________";
               $featured_imaged = $property->featured_image !='' ? $property->featured_image : "_________";
               $expected_price = $property->expected_price !='' ? $property->expected_price : "_________";
               $annual_dues_payable = $property->annual_dues_payable !='' ? $property->annual_dues_payable : "_________";
               $city = $property->city !='' ? $property->city : "_________";
               $price_sq_ft = $property->price_sq_ft !='' ? $property->price_sq_ft : "_________";
               $expected_rental = $property->asking_rental_price !='' ? $property->asking_rental_price : "_________";
               $price_negotiable = $property->price_negotiable !='' ? $property->price_negotiable : "_________";
               $shed_RCC = $property->shed_RCC !='' ? $property->shed_RCC : "_________";
               $possesion_by = $property->possesion_by !='' ? $property->possesion_by : "_________";
               $revenue_lauout = $property->revenue_lauout !='' ? $property->revenue_lauout : "_________";
               $maintenance_by = $property->maintenance_by !='' ? $property->maintenance_by : "_________";
               $ownership = $property->ownership !='' ? $property->ownership : "_________";
               $present_status = $property->present_status !='' ? $property->present_status : "_________";
               $availability = $property->availability !='' ? $property->availability : "_________";
               $facing = $property->facing !='' ? $property->facing : "_________";
               $jurisdiction_development = $property->jurisdiction_development !='' ? $property->jurisdiction_development : "_________";
               $age_of_property = $property->age_of_property !='' ? $property->age_of_property : "_________";
               $FAR_approval = $property->FAR_approval !='' ? $property->FAR_approval : "_________";
               $LOAN_taken = $property->LOAN_taken !='' ? $property->LOAN_taken : "_________";
               $property_on_floor = $property->property_on_floor !='' ? $property->property_on_floor : "_________";
               $parking = $property->parking !='' ? $property->parking : "_________";
               $buildup_area = $property->buildup_area !='' ? $property->buildup_area : "_________";
               $configuration = $property->configuration !='' ? $property->configuration : "_________";
               $carpet_area = $property->carpet_area !='' ? $property->carpet_area : "_________";
               $floors_allowed_construction = $property->floors_allowed_construction !='' ? $property->floors_allowed_construction : "_________";
               $total_floors = $property->total_floors !='' ? $property->total_floors : "_________";
               $furnished_status = $property->furnished_status !='' ? $property->furnished_status : "_________";
               $bedrooms = $property->bedrooms !='' ? $property->bedrooms : "";
               $bathrooms = $property->bathrooms !='' ? $property->bathrooms : "";
               $balconies = $property->balconies !='' ? $property->balconies : "";
               $pooja_room = $property->pooja_room !='' ? $property->pooja_room : "";
               $property_types = $property_type->typename !='' ? $property_type->typename : "_________";
               $undercategory = $property_type->undercategory;
               
               
               if($undercategory == 'Residential'){
               $content = $furnished_status .' '.$property_types .' on '. $property_for .' in '. $locality . (( $buildup_area == null) ? ' - plot area : '. $total_plot_area .' sqft' : ' - super area : '. $buildup_area .' sqft ') . ' - furnishing specification :* bedrooms : '. $bedrooms.' * bathrooms : '. $bathrooms.' * balconies : '. $balconies.' * pooja room : '. $pooja_room .' * study_room * servant_room , For more details or Site Visit , please Contact Us..';
               }else{
               $content =  'A very good '.$property_types .' availabale for rent/lease in '.$city . ' with Plot area '.$total_plot_area .' sqft, Superbuiltup '.$buildup_area .' sqft, It is a '.$furnished_status .' property suitable for any kind of '.$property_types .', For more details or Site Visit , please Contact Us..';
               }
            ?>
                   
                   
            <h2> <?php echo $property_types. ' for ' .$property_for.' in '.$city ; ?></h2>
                       <span> <?php echo  $property->expected_price != '' ? $expected_price  : $expected_rental ?> Rs @  <?php echo $price_sq_ft; ?> per sqft</span>
             <p> <?php echo $content; ?>.</p>
             
               </div>
             </div>
             <div class="row veiw_property_description_row">
              <div class="col-md-12" style="padding: 0px;"><p>Property Detail</p></div>
               
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Property Type</b><br>
                       <span><?php echo $property_types; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Locality</b><br>
                       <span><?php echo $locality; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Price Acres</b><br>
                       <span>Rs. <?php echo $price_acres; ?></span>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Request For</b><br>
                       <span><?php echo $request_for; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Plot Area</b><br>
                       <span><?php echo $total_plot_area; ?> sq_yards</span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Maintanance Cost</b><br>
                       <span>Rs. <?php echo $maintenance_cost; ?></span>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Image name</b><br>
                       <span><?php echo $featured_imaged; ?><span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Expected Price</b><br>
                       <span>Rs. <?php echo $expected_price; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Annual Dues Payable</b><br>
                       <span>Rs. <?php echo $annual_dues_payable; ?></span>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>City</b><br>
                       <span><?php echo $city; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Price Sq Ft</b><br>
                       <span>Rs. <?php echo $price_sq_ft; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Expected Rental</b><br>
                       <span>Rs. <?php echo $expected_rental; ?></span>
                     </div>
                   </div>
                 </div>
               </div>
          </div>
           <div class="row veiw_property_description_row">
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Price Negotiable</b><br>
                       <span><?php echo $price_negotiable; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Shed Rcc</b><br>
                       <span><?php echo $shed_RCC; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Possession By</b><br>
                       <span><?php echo $possesion_by; ?></span>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Revenue Lauout</b><br>
                       <span><?php echo $revenue_lauout; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Maintenance By</b><br>
                       <span><?php echo $maintenance_by; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Ownership</b><br>
                       <span><?php echo $ownership; ?></span>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Present Status</b><br>
                       <span><?php echo $present_status; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Availability</b><br>
                       <span><?php echo $availability; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Facing</b><br>
                       <span><?php echo $facing; ?></span>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Jurisdiction Development</b><br>
                       <span><?php echo $jurisdiction_development; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Age Of Property</b><br>
                       <span><?php echo $age_of_property; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Far Approval</b><br>
                       <span><?php echo $FAR_approval; ?></span>
                     </div>
                   </div>
                 </div>
               </div>
          </div>
           <div class="row veiw_property_description_row">
              <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Loan Taken</b><br>
                       <span><?php echo $LOAN_taken; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Property On Floor</b><br>
                       <span><?php echo $property_on_floor; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Reserved Parking</b><br>
                       <span><?php echo $parking; ?></span>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Built up Area</b><br>
                       <span><?php echo $buildup_area; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Configuration</b><br>
                       <span><?php echo $configuration; ?></span>
                     </div>
                   </div>
                 </div>
                 
               </div>
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Carpet Area</b><br>
                       <span><?php echo $carpet_area; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Floors Allowed Construction</b><br>
                       <span><?php echo $floors_allowed_construction; ?></span>
                     </div>
                   </div>
                 </div>
                 
               </div>
               <div class="col-md-12 veiw_property_description_div">
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Total Floors</b><br>
                       <span><?php echo $total_floors; ?></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="col-sm-2"><img src="<?= Yii::getAlias('@archiveUrl').'/propertydefaultimg/bullet_tick.png';  ?>"> </div>
                     <div class="col-sm-10 veiw_property_description_div_inner">
                       <b>Furnishing Status</b><br>
                       <span><?php echo $furnished_status; ?></span>
                     </div>
                   </div>
                 </div>
                 
               </div>
          </div>


          </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
   <script type="text/javascript">
      $(document).ready(function(){
        $("#image_btn").click(function(){
          $(".image_slider").show();
          $(".vedio_slider").hide();
        });
        $("#vedio_btn").click(function(){
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
        $('[id^=carousel-selector-]').click( function(){
          var id_selector = $(this).attr("id");
          var id = id_selector.substr(id_selector.length -1);
          id = parseInt(id);
          $('#myCarousel').carousel(id);
          $('[id^=carousel-selector-]').removeClass('selected');
          $(this).addClass('selected');
        });

        $('#myCarousel').bind('slide.bs.carousel', function (e) {
          var slideFrom = $(this).find('.active').index();
          var videoContent = $('.item[data-slide-number='+slideFrom+'] .embed-responsive');
          videoContent.html( videoContent.html() );
        });

        // when the carousel slides, auto update
        $('#myCarousel').on('slid.bs.carousel', function (e) {
          var id = $('.item.active').data('slide-number');
          id = parseInt(id);
          $('[id^=carousel-selector-]').removeClass('selected');
          $('[id=carousel-selector-'+id+']').addClass('selected');
        });
    </script>
