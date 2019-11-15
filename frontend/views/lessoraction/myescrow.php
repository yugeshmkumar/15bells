<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

   $arruserproperties = \common\models\activemode::finduserproperty(Yii::$app->user->identity->id);
   ?>
     <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>LAND LORD</span>
								<i class="fa fa-circle"></i>
                            </li>
							 <li>
                                <span>MY ESCROW ACCOUNT</span>
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
                                        <i class="fa fa-user"></i> MY ESCROW ACCOUNT </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
								<?php
								$temp=0;
								foreach($arruserproperties as $userproperties) { $temp++; 
								$receivables = \common\models\Receivables::find()->where(['propertyid'=>$userproperties->id])->one();
								
								?>
								
                                    <div class="panel-group accordion" id="accordion<?php echo $temp ?>">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion<?php echo $temp ?>" href="#collapse_<?php echo $temp ?>_1"> <?php echo $temp ?>.&nbsp;&nbsp;<?php echo \common\models\PropertyType::findOne($userproperties->projectypeid)->typename ?> &nbsp; - &nbsp;<?php echo $userproperties->property_features ?> </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_<?php echo $temp ?>_1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
													 <div class="invoice-content-2 ">
                        <div class="row invoice-head">
                            <div class="col-md-2 col-xs-2">
                                <div class="invoice-logo">
                                    <img src="<?= Url::to('@web/img') ?>/logoin.jpg" class="img-responsive" alt="" />
                                    <h1 class="uppercase">Invoice</h1>
                                </div>
                            </div>  <div class="col-md-2 col-xs-2"></div>
                            <div class="col-md-7 col-xs-7" align="right">
                                <div class="company-address">
                                    <span class="bold uppercase">15BELLS Inc.</span>
                                    <br/> 25, Lorem Lis Street, Orange C
                                    <br/> California, US
                                    <br/>
                                    <span class="bold">T</span> 1800 123 456
                                    <br/>
                                    <span class="bold">E</span> support@15bells.com
                                    <br/>
                                    <span class="bold">W</span> www.15bells.com </div>
                            </div>
                        </div>
						<?php if($receivables) { ?>
                        <div class="row invoice-cust-add">
                            <div class="col-xs-3">
                                <h2 class="invoice-title uppercase">Inv No.</h2>
                                <p class="invoice-desc"><?php echo $receivables->invoiceNumber ?></p>
                            </div>
                            <div class="col-xs-3">
                                <h2 class="invoice-title uppercase">Date</h2>
                                <p class="invoice-desc"><?php echo $receivables->invoiceDate ?></p>
                            </div>
                            <div class="col-xs-6">
                                <h2 class="invoice-title uppercase">Address</h2>
                                <p class="invoice-desc inv-address"><?php echo $userproperties->address ?></p>
                            </div>
                        </div>
                        <div class="row invoice-body">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="invoice-title uppercase">Description</th>
                                            <th class="invoice-title uppercase text-center">No</th>
                                            <th class="invoice-title uppercase text-center">Rate</th>
                                            <th class="invoice-title uppercase text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h3><?php echo \common\models\PropertyType::findOne($userproperties->projectypeid)->typename ?></h3>
                                                <p><?php echo $userproperties->property_features ?>. </p>
                                            </td>
                                            <td class="text-center sbold">1</td>
                                            <td class="text-center sbold"><i class="fa fa-rupee"></i> <?php echo $receivables->invoiceAmount ?></td>
                                            <td class="text-center sbold"><i class="fa fa-rupee"></i> <?php echo $receivables->invoiceAmount ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3>Branding</h3>
                                                <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. </p>
                                            </td>
                                            <td class="text-center sbold">130</td>
                                            <td class="text-center sbold">60$</td>
                                            <td class="text-center sbold">7,800$</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row invoice-subtotal">
                            <div class="col-xs-3">
                                <h2 class="invoice-title uppercase">Subtotal</h2>
                                <p class="invoice-desc"><i class="fa fa-rupee"></i> <?php echo $receivables->invoiceAmount ?></p>
                            </div>
                            <div class="col-xs-3">
                                <h2 class="invoice-title uppercase">Tax (0%)</h2>
                                <p class="invoice-desc"><i class="fa fa-rupee"></i>  0</p>
                            </div>
                            <div class="col-xs-6">
                                <h2 class="invoice-title uppercase">Total</h2>
                                <p class="invoice-desc grand-total"><i class="fa fa-rupee"></i> <?php echo $receivables->invoiceAmount ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
                               <a class="btn btn-lg green-haze hidden-print uppercase print-btn" data-toggle="modal" href="#basic<?php echo $userproperties->id ?>">Add Payment</a>
                            
							
							</div>
                        </div>
						<!-- models-->
						 <div class="modal fade" id="basic<?php echo $userproperties->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title"><?php echo $userproperties->id ?></h4>
                                                </div>
												<?php $form = ActiveForm::begin(); ?>
                                                <div class="modal-body"> 

                                     <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Property Type </th>
                                                    <th> Property Features </th>
                                                    <th> Invoice Number </th>
                                                    <th> Invoice Amount </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> 1 </td>
                                                    <td> <?php echo \common\models\PropertyType::findOne($userproperties->projectypeid)->typename ?> </td>
                                                     <td>
                                                       <?php echo $userproperties->property_features ?>.
                                                    </td>
													<td><?php echo $receivables->invoiceNumber ?>  </td>
                                                    <td>  <?php echo $receivables->invoiceAmount ?> </td>
                                                   
                                                </tr> </tbody></table></div>

												</div>

												<div class="modal-footer">
																								<div class="row"><div class="col-md-3"> Net Amount </div><div class="col-md-6">
												 <input type="text" name="actualPayment" id="actualPayment" value="Rs <?php echo $receivables->invoiceAmount ?>" class="form-control">
                                                </div></div>
												<br/>
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="actualpaysubmit" class="btn green">Submit Amount</button>
                                                </div>
												<?php $form = ActiveForm::end(); ?>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
								<?php } ?>
                    </div>
													
													
													</p>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
								<?php } ?>
                                </div>
                            </div>
                            <!-- END ACCORDION PORTLET-->
  
                </div>