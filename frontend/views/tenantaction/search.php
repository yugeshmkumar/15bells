 
 
 <?php
 $userid = Yii::$app->user->identity->id;
 $user = \common\models\User::find()->where(['id'=>$userid])->one();

 ?>
  <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Tenant</span>
								 <i class="fa fa-circle"></i>
                            </li>
							 <li>
                                <span>Search Property</span>
								
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
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn green-soft uppercase bold" type="button">Search</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4 extra-buttons">
                                    <button class="btn grey-steel uppercase bold" type="button">Reset Search</button>
                                    <button class="btn grey-cararra font-blue" type="button">Advanced Search</button>
                                </div>
                            </div>
                        </div>  </div> </div>
                                 
                                </div>
                                <div class="portlet-body">
                                    
            </div>
        </div>


