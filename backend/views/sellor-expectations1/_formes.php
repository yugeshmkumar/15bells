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
		background:#e6e1e1;
	}
	#modal .modal-header{
		border-bottom:3px solid #e5ac31;
		padding:0 20px !important;
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
	.portlt_bl{
		border:none !important;
		margin-bottom:0px !important;
	}
	.portlt_bl .portlet-title{
		box-shadow:0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
		margin-bottom:4px;
		background:#ffffff;
	}
	.contnt_h{
		color:#000000 !important;
	}
	.expect_frms{
		background:transparent !important;
	}
	.crt_btn{
			margin-bottom:0 !important;
			padding-top:10px;
	}
	.month_lbl{
		padding-top:10px;
	}
	.span_fx {
    display: block;
	float:left;
	}
	.addon-lg{
		float:left;
	}
	.icon-addon{
		float:left;
	}
	.icon-addon .form-group{
		    float: left;
    width: 83%;
	}
	.appnd_text{
	 float: left;
    right: 10px;
    border-radius: 0px 10px 10px 0px !important;
    background: white;
	}
	.nego_pd{
		padding-top:15px;
	}
	#modal .close{
			   text-indent: 0px!important;
    font-size: 28px!important;
    opacity: .8!important;
    margin-top: 10px !important;
	}
</style>

<div class="portlet box portlt_bl">
    <div class="portlet-title">
        <div class="caption contnt_h">
            Create Expectations For Your Property</div>
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

        </div>
    </div>
    <div class="portlet-body form text-center expect_frms">
        <div class="form-body">


            <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Save Expectation As *</label>

                        <?= $form->field($model, 'save_search_as')->textInput(['maxlength' => true])->input('text', ['placeholder' => "Give your own name"])->label(false) ?>

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
                        <label class="control-label" style="margin-bottom:10px !important;">Loan To Be Applied</label>

                        <?= $form->field($model, 'loan_against_property')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => 'Select'])->label(false) ?>

                    </div>                                
                </div> 

       
            </div>         



            <div class="row">
                
				
				
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Payment Time</label>
					<div class="row">
						<div class="col-md-12">
								 <div class="input-group">
							<div class="icon-addon addon-lg">
								 <?= $form->field($model, 'payment_time')->textInput()->label(false) ?>
								<span class="input-group-btn span_fx">
								<button class="btn btn-default appnd_text" type="button">Days</button>
								</span>
							</div>
							</div>
						</div>
						
						
						</div>
                    </div>                                
                </div>         
                <div class="col-md-4 nego_pd">
                    <div class="form-group" style="">
                        <label class="control-label"> </label>
						<?= $form->field($model, 'payment_time_negotiable')->checkbox(array('label'=>''))->label('Negotiable'); ?>
                    </div>                                
                </div>  
				
				
				
				 <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Price</label>

                       <?= $form->field($model, 'expected_rate')->textInput(['maxlength' => true])->input('text', ['placeholder' => "In Rs."])->label(false) ?>

                    </div>                                
                </div> 
               
            </div> 


            <div class="form-group crt_btn">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn_cret' : 'btn btn-primary btn_cret']) ?>
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
 
        $(document).find('#modal').modal('hide');
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
