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
<!--<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Seller</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Expectations</span>
        </li>
    </ul>

</div>-->
<style>
.sell_add{ 
		padding:0px !important;
		border-radius:10px !important; 
	}
	.sell_add .add_no{
		    font-size: 26px;
    border-radius: 10px 0 0 10px!important;
    float: left;
    margin: auto;
    padding: 3px 14px;
	border:1px solid !important;
	}
	.add_det{
		padding-top:5px !important;
	}
	.sellr_expct .control-label{
		color:#ffffff !important;
	}
	.sellr_expct .form-control{
			border-radius:10px !important;
	}
	.month_lbl{
		    color: #000;
    padding: 6px 5px 6px 6px;
    border: 1px solid #ffffff;
    border-radius: 10px !important;
    background: #ffffff;
	}
</style>
<div class="col-md-9">
    <?php 
    if($model->isNewRecord){  ?>
    
    
   
    
<div class="mt-element-step">

    <div class="row step-thin">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinsellor','id'=>$propid]) ?>">
 
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                  <div class="bg-white font-grey add_no">1</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="4dp">BASIC DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a>

        <a href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/create','id'=>$propid]) ?>">
            <div class="col-md-3 bg-grey mt-step-col active sell_add">
                  <div class="bg-white font-grey add_no">2</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">Expectations</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
      <!--  <a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/additionals']) ?>">-->
 <a href="#" style="cursor:default !important;">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                   <div class="bg-white font-grey add_no">3</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">ADDITIONAL DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
<a href="#" style="cursor:default !important;">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                   <div class="bg-white font-grey add_no">4</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">DOCUMENTS UPLOAD</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
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

    <div class="row step-thin">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinsellor','id'=>$nikalihuipropid]) ?>">
 
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                  <div class="bg-white font-grey add_no">1</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="4dp">BASIC DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a>

        <a href="#">
            <div class="col-md-3 bg-grey mt-step-col active sell_add">
                  <div class="bg-white font-grey add_no">2</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">Expectations</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
      <!--  <a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/additionals']) ?>">-->
 <a href="#" style="cursor:default !important;">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                   <div class="bg-white font-grey add_no">3</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">ADDITIONAL DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
<a href="#" style="cursor:default !important;">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                   <div class="bg-white font-grey add_no">4</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">DOCUMENTS UPLOAD</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>


    </div>
    <br/>
    <br/>

</div>
    
    <?php } ?>
<div class="portlet box">
    <div class="portlet-title">
        <div class="caption" >
           Create Expectations For Your Property</div>
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

        </div>
    </div>
    <div class="portlet-body form sellr_expct" style="background:rgba(255,255,255,0.25);border-top:5px solid #e9b739;">
        <div class="form-body">


            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Save Expectation As *</label>

                        <?= $form->field($model, 'save_search_as')->textInput(['maxlength' => true])->input('text', ['placeholder' => "Give your own name"])->label(false) ?>

                    </div>                                
                </div>         
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Rate Negotiable</label>

                        <?= $form->field($model, 'rate_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div>         



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Payment Time</label>
							<div class="row">
						<div class="col-md-8" style="padding-right:0px !important;">
							 <?= $form->field($model, 'payment_time')->textInput()->label(false) ?>
						</div>
						<div class="col-md-4 pad_fild month_lbl text-center">Days</div>
						
						</div>
                    </div>                                
                </div>         
                <div class="col-md-2">
                    <div class="form-group" style="padding-top:10px;">
                        <label class="control-label"> </label>
						<?= $form->field($model, 'payment_time_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
                    </div>                                
                </div>         
            </div>         



            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Loan Against Property</label>

                        <?= $form->field($model, 'loan_against_property')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">All Dues Cleared Reciept</label>

                        <?= $form->field($model, 'all_dues_cleared')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div>
                
            
			
			
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Price</label>

                       <?= $form->field($model, 'expected_rate')->textInput(['maxlength' => true])->input('text', ['placeholder' => "In Rs."])->label(false) ?>

                    </div>                                
                </div> 
		 </div>	
			


            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
</div>
