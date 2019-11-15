 
 
 <?php
 $userid = Yii::$app->user->identity->id;
 $user = \common\models\User::find()->where(['id'=>$userid])->one();

 ?>
  <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>User</span>
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
					<br/>
					<div class="row"><div class="col-md-9">
					 <div class="portlet light">
                                <div class="portlet-title">
								
                                    <div class="caption">
                                       <h3 class="page-title"> Search Property
                        <small>search results</small>
						
                    </h3>
					
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="search-page search-content-4">
                        <div class="search-bar bordered">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn green-soft uppercase bold" type="button">Search</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-2 extra-buttons">
                                    <button class="btn grey-steel uppercase bold" type="button">Reset Search</button></div><div class="col-lg-2 extra-buttons">
                                    <button class="btn grey-cararra font-blue" type="button">Advanced Search</button>
                                </div>
                            </div>
                        </div>  </div> </div>
                                 
                                </div>
                                <div class="portlet-body">
                                    <div class="tabbable-custom nav-justified">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class="active">
                                                <a href="#tab_1_1_1" data-toggle="tab"> <i class="fa fa-home"></i> My Property </a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_1_2" data-toggle="tab"> <i class="fa fa-search"></i> My Search vizard </a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_1_3" data-toggle="tab"> <i class="fa fa-user"></i> My Account</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1_1">
                                                <p> I'm in My Property Section . </p>
                                                <p>  <button type="button" class="btn blue" data-toggle="modal" data-target="#myModaltenant">
                                  <i class="fa fa-money"></i> Rent a House</button>
								 <button type="button" class="btn blue" data-toggle="modal" data-target="#myModaltenant">
                                  <i class="fa fa-money"></i> Rent an Office
                                </button>
								<button type="button" class="btn blue" data-toggle="modal" data-target="#myModalbuyer">
                                  <i class="fa fa-money"></i> Buy Office /Home
                                </button>
								<button type="button" class="btn blue" data-toggle="modal" data-target="#myModallandlord">
                                  <i class="fa fa-list"></i> List property for Rent
                                </button>
								<button type="button" class="btn blue" data-toggle="modal" data-target="#myModalseller">
                                  <i class="fa fa-list"></i> List property for Sale
                                </button>
                                             </p>
                                            </div>
                                            <div class="tab-pane" id="tab_1_1_2">
                                                <p> I'm in My Search vizard Section . </p>
                                                <p> 
												 
												</p>
                                                
                                            </div>
                                            <div class="tab-pane" id="tab_1_1_3">
                                                <p> I'm in My Account Section . </p>
                                                <p> </p>
                                              
                                            </div>
                                        </div>
                                    </div></div>
                                    </div></div>
                                     <div class="col-md-3">
									<div class="dashboard-stat2" style="background-color:#fafafa">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span data-counter="counterup" data-value="100">6</span>
                                            <small class="font-green-sharp">%</small>
                                        </h3>
                                        <small>PROFIT COMPLETE</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
								  <div class="progress-info">
								  <div class="status">
								  <a href="<?php echo Yii::$app->urlManager->createUrl(['myprofile/create']) ?>" style="width:100%;height:2%"class="btn default">Add details</a>
								  </div> </div>
								  <br/>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 6%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">6% progress</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-title"> progress </div>
                                        <div class="status-number"> 6% </div>
                                    </div>
                                </div>
									</div></div>
 <div class="user-dashboard">
                   
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 gutter">
                           
                                <!-- Modal -->
                                <div class="modal fade" id="myModaltenant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Agreement</h4>
                                      </div>
									  <?php
		$getagreementone = \common\models\Aggrementmgmt::find()->where('roleid =:roleid and ispublish =:publish and isactive =:active',array(':roleid'=>4,':publish'=>1,':active'=>1))->one();
		?>
                                      <div class="modal-body">
                                       <?php if($getagreementone) { echo $getagreementone->content ; } else {  ?> Agreement Expired! <?php } ?>
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                            
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 gutter">
                          

                                <!-- Modal -->
                                <div class="modal fade" id="myModallandlord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Agreement</h4>
                                      </div>
                                      <?php
		$getagreementone = \common\models\Aggrementmgmt::find()->where('roleid =:roleid and ispublish =:publish and isactive =:active',array(':roleid'=>5,':publish'=>1,':active'=>1))->one();
		?>
                                      <div class="modal-body">
                                       <?php if($getagreementone) { echo $getagreementone->content ; } else {  ?> Agreement Expired! <?php } ?>
                                      </div>
                                      
                                     
                                    </div>
                                  </div>
                                </div>
                           
                        </div>
						 <div class="col-md-6 col-sm-6 col-xs-12 gutter">
                          

                                <!-- Modal -->
                                <div class="modal fade" id="myModalbuyer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Agreement</h4>
                                      </div>
                                      <?php
		$getagreementone = \common\models\Aggrementmgmt::find()->where('roleid =:roleid and ispublish =:publish and isactive =:active',array(':roleid'=>7,':publish'=>1,':active'=>1))->one();
		?>
                                      <div class="modal-body">
                                       <?php if($getagreementone) { echo $getagreementone->content ; } else {  ?> Agreement Expired! <?php } ?>
                                      </div>
                                      
                                     
                                    </div>
                                  </div>
                                </div>
                           
                        </div>
						 <div class="col-md-6 col-sm-6 col-xs-12 gutter">
                          

                                <!-- Modal -->
                                <div class="modal fade" id="myModalseller" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Agreement</h4>
                                      </div>
                                     <?php
		$getagreementone = \common\models\Aggrementmgmt::find()->where('roleid =:roleid and ispublish =:publish and isactive =:active',array(':roleid'=>6,':publish'=>1,':active'=>1))->one();
		?>
                                      <div class="modal-body">
                                       <?php if($getagreementone) { echo $getagreementone->content ; } else {  ?> Agreement Expired! <?php } ?>
                                      </div>
                                      
                                     
                                    </div>
                                  </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                            <input type="text" placeholder="Project Title" name="name">
                            <input type="text" placeholder="Post of Post" name="mail">
                            <input type="text" placeholder="Author" name="passsword">
                            <textarea placeholder="Desicrption"></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>