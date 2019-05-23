<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query ;

use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\CompanyEmp;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoices';
$this->params['breadcrumbs'][] = $this->title;


$datas =  $dataProvider->query->all();
?>
<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">My Invoices</h2>
					</div>
					
				</div>


                <?php foreach ($datas as $data){ 
                    
                $viewid  =  $data->propertyid; 
                $invoiceID  =  $data->invoiceID; 
                $payment_id  =  $data->payment_id;  
                
                              
                $haritid = 273*179-$viewid;
                $propsid = 'PR'. $haritid;
                
                

                $addproperty = \common\models\Addproperty::find()->where(['id' => $viewid])->one();
                $Payments = \common\models\Payments::find()->where(['id' => $payment_id])->one();
                $item_name =  $Payments->item_name;
                $item_number =  $Payments->item_number;
                    
                    ?>

				<div class="col-md-12 property_detail">
					<p class="property_id">Invoice : #<?php echo $invoiceID; ?>
                    <?php $form = ActiveForm::begin(['action'=>"invoice/createpdf"]); ?>
                    <?= Html::submitButton('Download Invoice', ['class'=>'view_docs invoice_down','name' => 'keyword', 'value' => $invoiceID]) ?>
                    <?php ActiveForm::end(); ?>
                   
					<!-- <a href="javascript:void(0)" class="view_docs invoice_down">Download Invoice</a> -->
					</p>
					<div class="row single_property">
						<h2 class="prop_id">Property ID : #<?php echo $propsid; ?><span class="invoice_amount"><?php echo $Payments->payment_amount ?></span></h2>
						<div class="col-md-9">
							<div class="row">
							
								<div class="col-md-6 company_overview">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/site-visit.svg';  ?>" width="16">Location</p>
									<p class="label_name"><?php echo $addproperty->locality ?></p>
								</div>
								<div class="col-md-6 company_overview">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/watch.svg';  ?>" width="20">Date & Time</p>
									<p class="label_name"><?php echo  date("d F, Y", strtotime($data->createdAt)); ?> at
                                    <?php echo  date("g:i A", strtotime($data->createdAt)); ?> </p>
								</div>
							</div>
							<div class="row">
                            <?php if($item_name == 'documentshow'){ ?>

                                <div class="col-md-6 company_overview">
                                <p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/invoice.svg';  ?>" width="16">Paid for Document</p>
                                <p class="label_name"><a href="" class="view_docs">View Documents</a></p>
                                </div>


                        <?php    }else{  

                                   $RequestSiteVisit = \common\models\RequestSiteVisit::find()->where(['request_id' => $item_number])->one();
                            
                                   ?>

                               <div class="col-md-6 company_overview">
                                <p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/invoice.svg';  ?>" width="16">Visit Type</p>
                                <p class="label_name"><a href="javascript:void(0)" class="view_docs"><?php echo $RequestSiteVisit->visit_type ?></a></p>
                                </div>

                               <?php } ?>

								
								<div class="col-md-6 company_overview">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/payment.svg';  ?>" width="20">Payment mode (VR / Auction) </p>
									<p class="label_name"><?php echo  date("d F, Y", strtotime($Payments->created_date)); ?> at
                                    <?php echo  date("g:i A", strtotime($Payments->created_date)); ?> 
                                    </p>
								</div>
								</div>
								
							</div>
						</div>
						<div class="col-md-3">
							
						</div>
					</div>



 <?php } ?>




				
				
				</div>
			</div>