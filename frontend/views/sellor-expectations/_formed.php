<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectations */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
	#modal .modal-content{
		border-radius:10px !important;
		background:#fff;
	}
	#modal .modal-header{
		border-bottom:3px solid #0fd8da;
		padding:10px 20px !important;
	}
	
	.expect_frms .form-control{
		border-radius:10px !important;
		border:1px solid #dedede !important;
		color:#000000 !important;
		box-shadow: inset 0 1px 1px rgba(0,0,0,.075) !important;
	}
	#modal .btn_cret{
		color: #ffffff !important;
    background-color: #003663!important;
    padding: 8px 30px;
    border-radius: 4px !important;
    font-size: 15px;
	border:none !important;
	}
	#modal .close{
		position:absolute;
		right:20px;
	}
	.modal-dialog{
		top:16%;
	}
	.container{
		padding:0;
	}
</style>

<div class="portlet box portlt_bl sellr_proprty">
     <div class="caption font-green-sharp exp_titl">
                                        
                                        <span class="caption-subject bold uppercase exp_name"> Create Expectations For Your Property</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>
    <div class="portlet-body form text-center expect_frms">
        <div class="form-body">


            <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        <?= $form->field($model, 'save_search_as')->textInput(['maxlength' => true])->input('text', ['placeholder' => "Save Expectation As",'class' => "form-control one_inpt"])->label(false) ?>

                    </div>                                
                </div>         
                <div class="col-md-4 nego_pd">
                    <div class="form-group">
                        <label class="control-label" style="margin-bottom:10px !important;"></label>

						<?= $form->field($model, 'rate_negotiable')->checkbox(array('label'=>''))->label('Rate Negotiable'); ?>
                   
                    </div>                                
                </div>         
				
				
				<div class="col-md-4">
                    <div class="form-group">

                        <?= $form->field($model, 'loan_against_property')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select Loan To Be Applied','class' => "form-control one_inpt"])->label(false) ?>

                    </div>                                
                </div> 

       
            </div>         



            <div class="row">
                
				
				
                <div class="col-md-4">
                    <div class="form-group">
					<div class="row">
						<div class="col-md-12">
								 <?= $form->field($model, 'payment_time')->textInput(['class' => "form-control one_inpt", 'placeholder' => "Payment Time In days"])->label(false) ?>
								
							
						</div>
						
						
						</div>
                    </div>                                
                </div>         
                <div class="col-md-4 nego_pd">
                    <div class="form-group" style="">
                        <label class="control-label"> </label>
						<?= $form->field($model, 'payment_time_negotiable')->checkbox(array('label'=>''))->label('Payment Time Negotiable'); ?>
                    </div>                                
                </div>  
				
				<div class="col-md-4">
                    <div class="form-group">

                        <?= $form->field($model, 'vastu_facing')->dropDownList([ 'north' => 'North', 'west' => 'West', 'south' => 'South', 'east' => 'East', 'north_east' => 'North east', 'south_east' => 'South east', 'north_west' => 'North west', 'south_west' => 'South west',], ['prompt' => 'Select Vastu Facing','class' => "form-control one_inpt"])->label(false) ?>

                    </div>                                
                </div> 
				
				 
               
            </div> 


            <div class="form-group crt_btn">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn_cret submt_frm' : 'btn btn-primary btn_cret submt_frm']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<?php
$script = <<< JS
        
 $('form#{$model->formName()}').on('beforeSubmit',function(e){
 
 $(document).find('#expectid').val('');
   var form = $(this);
   $.post(
    form.attr("action"),
     form.serialize()
   
   )
      .done(function(result){

   if(result != 0){
 
        jQuery('#modal').modal('hide');
        $(document).find('#expectid').val(result);
  
        $(form).trigger("reset");
 toastr.success('Expectation Saved Successfully','success');
   
   }else{
 
        $('#message').html('Something Wrong');  
     }
          
   }).fail(function(){
      console.log("server Error"); 
   
   });
   return false;
   
 }); 
        
        
        
JS;
$this->registerJs($script);
?>  
