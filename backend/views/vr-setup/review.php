<?php

use yii\widgets\DetailView;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DateTimePicker;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\Growl;
/* @var $this yii\web\View */
/* @var $model common\models\VrSetup */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $VrSetuptest = \common\models\VrSetuptest::find()->where(['id'=>$_GET['id']])->one(); ?>
<?php if(isset($_POST['publish'])) {
	
	if($VrSetuptest)
	{
		$VrSetuptest->status ="published";
		$VrSetuptest->approverID = Yii::$app->user->identity->id;
		$VrSetuptest->secret_code = rand(0100,9999);
		$VrSetuptest->save();
		$checkproperty = \common\models\Addpropertyforbid::find()->where(['id'=>$VrSetuptest->propertyID])->one();
	$ProductDetails = new \backend\modules\transaction\models\ProductDetails();
	if($checkproperty->property_for == "rent"){
		$ProductDetails->reserved_price=$checkproperty->asking_rental_price;
	
	} else {
		$ProductDetails->reserved_price=$checkproperty->expected_price;
	
	}
	$ProductDetails->product_id=$VrSetuptest->propertyID;
	$ProductDetails->save();

echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Well done!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'You successfully published this property  for Biding.',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);

 //return Yii::$app->controller->redirect(['/vr-setup/index']);
	}
}
 ?>
<div class="vr-setup-form">
 
                                    
 <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-speech"></i>
                                        <span class="caption-subject bold uppercase"> Setup VR Room</span>
                                        <span class="caption-helper">...</span>
                                    </div>
                                   <div class="actions">
								   <a href="<?php echo Yii::$app->urlManager->createUrl(['/vr-setup/index']) ?>" target="_blank" class="btn btn-primary">View Details</a>
								   </div>
                                </div>
                              
								<div class="mt-element-step">
                                       
<div class="row step-no-background-thin">
                                          
                                            <div class="col-md-4 mt-step-col done">
                                                <div class="mt-step-number font-grey-cascade">1</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Setup Moderator</div>
                                                <div class="mt-step-content font-grey-cascade">Time Settings [100%]</div>
                                            </div>
                                            <div class="col-md-4 mt-step-col done">
                                                <div class="mt-step-number bg-white font-grey">2</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Setup Buyers / Lesse</div>
                                                <div class="mt-step-content font-grey-cascade">Setup Buyers / Lesse [100%]</div>
                                            </div>
                                            <div class="col-md-4 mt-step-col active">
                                                <div class="mt-step-number bg-white font-grey">3</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Publish Auction</div>
                                                <div class="mt-step-content font-grey-cascade">Publish Auction</div>
                                            </div>
                                        </div> </div>
										  <div class="portlet-body">
										  <div class="vr-setup-view"><p>
  <a href="<?php echo Yii::$app->urlManager->createUrl(['/vr-setup/update?id='.$_GET['id'].'']) ?>"  class="btn btn-primary"><i class="fa fa-mail-reply"></i> Back to Details</a></p>
 				<div class="note note-info">Property Details</div>			   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
			'name',
            'auction_type',
            ['attribute'=>'propertyID',
			'value'=>function($data){
				return \common\models\Addproperty::findOne($data->propertyID)->project_name;
			}],
			 ['attribute'=>'moderatorID',
			'value'=>function($data){
				return \common\models\CompanyEmpb::findOne($data->moderatorID)->name;
			}],
           
            'fromdatetime',
            'todatetime',
            'status',
            
        ],
    ]) ?>

</div>
<div class="note note-info">Participants</div>
<div class="auction-participants-view">

  
<table id="w0" class="table table-striped table-bordered detail-view">
<?php $arrmodeltwo = \common\models\AuctionParticipants::find()->where(['vr_roomID'=>$_GET['id'],'isactive'=>1])->all(); ?>
<?php $temp = 0 ;foreach($arrmodeltwo as $modeltwo) { $temp++ ?>		
<tr><th>Participant No.<?php echo $temp ?></th><td><?php echo \common\models\User::findOne($modeltwo->partcipantID)->email; ?></td></tr>
<?php } ?>

</table>
</div><p>
<?php $form = ActiveForm::begin(); ?>
<button type="submit" name="pendingdraft" id="pendingdraft" class="btn btn-primary"> Draft </button>
<?php if(!$VrSetuptest->status="published") { ?>
<button type="submit" name="publish" id="publish" class="btn btn-primary"> Publish </button>
<button type="submit" name="forapproval" id="forapproval" class="btn btn-primary"> Request for Approval </button>
<?php } else { ?>
<button type="submit" name="publish" id="publish" class="btn btn-primary" > <i class="fa fa-check"></i> Publish </button>
<button type="button" name="forapprovalidd" id="forapprovalidd" class="btn btn-primary" disabled> Request for Approval </button>
<?php } ?>
</p>
<?php ActiveForm::end(); ?>
</div>
</div>


