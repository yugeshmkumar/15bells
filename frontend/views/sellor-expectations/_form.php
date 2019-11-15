<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectations */
/* @var $form yii\widgets\ActiveForm */

if(isset($_GET['id'])){
    
    $propid = $_GET['id'];
}
?>

<div class="col-md-12">
    <?php 
    if($model->isNewRecord){  ?>
    
    
   
<div class="mt-element-step">

    <div class="row step-thin text-center m-0">
	
        <a class="col-md-3 othr_tab bordr_rds" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinsellor','id'=>$propid]) ?>">
            <div class="bg-grey mt-step-col active sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det">BASIC DETAILS</div>
            </div></a>
        
        <!--<a href="<?//php echo Yii::$app->urlManager->createUrl(['sellor-expectations/create']) ?>">-->
        <a class="col-md-3 active_tab" href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/create','id'=>$propid]) ?>" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det">Expectations</div>
            </div>
        </a>
        <!--<a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/additionals']) ?>">-->
        <a class="col-md-3 othr_tab" href="#" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det">ADDITIONAL DETAILS</div>
            </div>
        </a>
      <a class="col-md-3 othr_tab no_bordr bordr_rds_rt" href="#" style="cursor:default !important;">
            <div class="bg-grey mt-step-col  sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det">DOCUMENTS UPLOAD</div>
            </div>
        </a>
        

    </div>
    <br/>
    <br/>

</div>
    
    <?php }  else{ 
        
        $primarynotype = \common\models\SellorExpectations::find()->where(['id' => $propid])->one();
                  $nikalihuipropid =     $primarynotype->property_id;
        
        ?>
    
   
	  
<div class="mt-element-step">

    <div class="row step-thin text-center m-0">
	
        <a class="col-md-3 othr_tab bordr_rds" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinsellor','id'=>$nikalihuipropid]) ?>">
            <div class="bg-grey mt-step-col active sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det">BASIC DETAILS</div>
            </div></a>
        
        <!--<a href="<?//php echo Yii::$app->urlManager->createUrl(['sellor-expectations/create']) ?>">-->
        <a class="col-md-3 active_tab" href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/create','id'=>$propid]) ?>" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det">Expectations</div>
            </div>
        </a>
        <!--<a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/additionals']) ?>">-->
        <a class="col-md-3 othr_tab" href="#" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det">ADDITIONAL DETAILS</div>
            </div>
        </a>
      <a class="col-md-3 othr_tab no_bordr bordr_rds_rt" href="#" style="cursor:default !important;">
            <div class="bg-grey mt-step-col  sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det">DOCUMENTS UPLOAD</div>
            </div>
        </a>
        

    </div>
    <br/>
    <br/>

</div>



    
    <?php } ?>
<div class="portlet box">
    
    <div class="portlet-body form sellr_expct main_cont">
        <div class="form-body">
				<div class="portlet-title">
			<h4 class="caption" >
			   Create Expectations For Your Property</h4>
			<div class="tools">
				<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

			</div>
		</div>

            <?php $form = ActiveForm::begin(); ?>

            <div class="row pad_exp">
                <div class="col-md-6">
                        <?= $form->field($model, 'save_search_as')->textInput(['maxlength' => true])->input('text', [ 'placeholder' => "Save Expectation Name", 'class' => 'one_inpt form-control'])->label(false) ?>
                               
                </div>         
                <div class="col-md-6">

                        
                        <?= $form->field($model, 'rate_negotiable')->dropDownList([ '1' => 'Yes', '0' => 'No',], ['prompt' => 'Rate Negotiable','class' => 'one_inpt form-control'])->label(false) ?>      
                </div>         



                <div class="col-md-4" style="display:none;">
							<div class="row">
						<div class="col-md-10" style="padding-right:0px !important;">
							 <?= $form->field($model, 'payment_time')->textInput([ 'placeholder' => "Payment time in days", 'class' => 'one_inpt form-control'])->label(false) ?>
						</div>
						<!--<div class="col-md-4 pad_fild month_lbl text-center">Days</div>-->
						
						</div>                              
                </div>         
                <div class="col-md-2" style="display:none;">
						<?= $form->field($model, 'payment_time_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
                                                  
                </div>         
            </div>         



            <div class="row pad_exp" style="display:none;">
                <div class="col-md-4">
                        <?= $form->field($model, 'loan_against_property')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Loan Against Property','class' => 'one_inpt form-control'])->label(false) ?>
                         
                </div> 

                <div class="col-md-4">
                        <?= $form->field($model, 'all_dues_cleared')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'All Dues Cleared Reciept','class' => 'one_inpt form-control'])->label(false) ?>                            
                </div>
                
            
			
			
				<div class="col-md-4">
                       <?= $form->field($model, 'expected_rate')->textInput(['maxlength' => true])->input('text', ['placeholder' => "Price in Rs.",'class' => 'one_inpt form-control'])->label(false) ?>
                         
                </div> 
		 </div>	
			


            <div class="col-md-12 text-center sbmt_butn">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success submt_frm' : 'btn btn-primary submt_frm','onClick'=>'ga("send", "event", "Add property sellor expectations creates", "Add property sellor expectations creates", "Add property sellor expectations creates","Add property sellor expectations creates")']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
</div>
