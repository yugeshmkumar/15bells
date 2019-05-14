 <?php
 use yii\helpers\Url;
 use yii\db\Query;
 $userid = Yii::$app->user->identity->id;
 ?>



                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">General</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Shortlisted Properties</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> My Shortlisted Properties
                       
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="portfolio-content portfolio-1">
                        
                        <div id="js-grid-juicy-projects" class="cbp">
                          
                     <?php
         $query = new Query;

	$query  ->select(['expected_price','location']) 
	        ->from('property')
	        ->join(  'LEFT JOIN',
	                'shortlistProperty',
	                'shortlistProperty.property_id =property.id'
                        )                
               ->where(['user_id' => $userid]);
	$command = $query->createCommand();
	$data = $command->queryAll();   
       
        
             foreach($data as $key=>$datas){
         
         ?>         
                           
                            <div class="cbp-item graphic logos">
                                <div class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="<?= Url::to('@web/assets') ?>/global/img/portfolio/600x600/16.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <a href="" class="cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase" rel="nofollow">more info</a>
                                                <a href="http://vimeo.com/14912890" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="To-Doby Tiberiu Neamu">view video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cbp-l-grid-projects-title uppercase text-center">To-Do <i class="fa fa-rupee"></i> <?php echo $datas['expected_price']; ?></div>
                                <div class="cbp-l-grid-projects-desc uppercase text-center"><?php echo $datas['location']; ?></div>
                            </div>
                          
                    <?php  }  ?>        
                        </div>
                      
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        
      