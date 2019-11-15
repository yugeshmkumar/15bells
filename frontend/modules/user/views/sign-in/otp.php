<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\LoginForm */

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>



<div id="login">
  
 
  <!-- Begin page content -->
  <div class="center-container">
    <div class="center-row">
      <div class="col-xs-6 bg-one text-center"></div>
      <div class="col-xs-6 bg-two text-center">
        <!--<div class="col-md-2"></div>-->
          <?php $form = ActiveForm::begin(['id' => 'form-otp']); ?>
        <div class="col-md-8 col-md-offset-2">
           
          <div class="loginbox animated slideInUp">
                <p class="loginhead">Enter verification Code<br/><br/><br/></p>
<!--                <div class="social-buttons">
                  <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                  <a href="#" class="btn btn-gplus"><i class="fa fa-google"></i> Google +</a>
                </div>-->
               
                <p class="loginhead" style="display:none;">or</p>
                <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                   
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="form-group">
                       <!--<input type="email" class="form-control" id="exampleInputEmail2" placeholder="" required>-->
                           <?php echo $form->field($model, 'otp')->textInput(array('placeholder' => 'Please Enter Your OTP '))->label(false); ?>
                    </div>
                    </div>
                    
                   
                    <div class="col-sm-12">
                      <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                    </div>
                    </div>
                    <div class="col-md-12" style="color:#666666;">
                         Didn't get verification code?
                     </div>
                     <div class="col-md-12">
                         <a href="" class=""><span><i class="fa fa-repeat" style="color:#666666;"></i></span> Resend OTP</a>
                     </div>
                    
                 </form>
              </div>
        </div>
         <?php ActiveForm::end(); ?>
        <div class="col-md-2"></div>

      </div>
    </div>
  </div>
</div>
