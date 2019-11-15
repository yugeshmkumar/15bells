<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\SignupForm */

$this->title = Yii::t('frontend', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
  
<div class="site-signup">
  

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
			
			
                
				   <div class="form-group">
                        <i class="fa fa-phone-square first" aria-hidden="true"></i>
				  <?php echo $form->field($model, 'username')->label(false); ?>
				   </div>
				     <div class="form-group">
                        <i class="fa fa-user-circle-o second" aria-hidden="true"></i>
                <?php echo $form->field($model, 'email')->label(false); ?>
				</div>
				 <div class="form-group">
                        <i class="fa fa-lock second" aria-hidden="true"></i>
                <?php echo $form->field($model, 'password')->passwordInput()->label(false); ?>
				</div>
				 <div class="form-group form-md-checkboxes">
                                                <div class="col-md-9">
                                                    <div class="md-checkbox-list">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox1_1" name="checkbox1_1" class="md-check" required >
                                                            <label for="checkbox1_1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> I agree to  <a  data-toggle="modal" href="#large">terms& conditions </a></label>
                                                        </div>
                                                       
                                                       
                                                    </div>
                                                </div> </div>
                    <div class="form-group">
                     <br>
					   
                    <?php echo Html::submitButton(Yii::t('frontend', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                
                       <br>
                    </div>
					
					
               
              
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
