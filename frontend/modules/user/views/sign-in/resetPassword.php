<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\ResetPasswordForm */

$this->title = Yii::t('frontend', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>


<style type="text/css">
 
</style>
<div id="login">
  
 
  <!-- Begin page content -->
  <div class="container-fluid no_pad">
    <div class="row">
      <div class="col-md-12 text-center no_pad"> 
        <!--<div class="col-md-2"></div>-->
          <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <div class="col-md-8 no_pad hidden-xs">
               <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/sign_up.jpg';  ?>" class="img_sign">
          </div>

        <div class="col-md-4 signup_form login_main_div">
           
          <div class="loginbox animated fadeInRight">
               
<!--                <div class="social-buttons">
                  <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                  <a href="#" class="btn btn-gplus"><i class="fa fa-google"></i> Google +</a>
                </div>-->
                
                  <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>   
                <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                <div class="row text-center">
                                                      <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/logo.png';  ?>" width="100">
                                                      <h3 class="contct_lin">RESET Password!</h3>
                                                      
                                                    </div>
                    <div class="col-sm-12 col-xs-12" style="z-index: 9;">
                      <div class="form-group">
                       <!--<input type="email" class="form-control" id="exampleInputEmail2" placeholder="" required>-->
                          
 <?php echo $form->field($model, 'password')->passwordInput()->label(false)->textInput(['placeholder' => "Password"]); ?>
                
                  </div>
                    </div>
   


                    <div class="col-sm-12 col-xs-12" style="z-index: 9;">
                      <div class="form-group">
                       <!--<input type="email" class="form-control" id="exampleInputEmail2" placeholder="" required>-->
                          
 <?php echo $form->field($model, 'password_repeat')->passwordInput()->label(false)->textInput(['placeholder' => "Confirm Password"]); ?>
                
                  </div>
                    </div>





                   <div class="col-sm-12">
                      <div class="form-group">
                          <?php echo Html::submitButton('Save', ['class' => 'btn btn-primary']) ?> </div>
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


