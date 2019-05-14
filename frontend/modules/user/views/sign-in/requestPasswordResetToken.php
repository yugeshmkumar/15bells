<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Growl;
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\PasswordResetRequestForm */

$this->title =  Yii::t('frontend', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="login">
  <?php if(isset($sd)){
	if($sd == 1){
	
	echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Successful!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Please check your email and set password from reset password link.',
    //'showSeparator' => true,
   // 'delay' => 1000,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);

	
	
} }
?> 
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
                                                  <div class="row text-center">
                                                      <img src="<?= Yii::getAlias('@frontendUrl').'/newimg/logo.png';  ?>" width="100">
                                                      <h3 class="contct_lin">Forgot Password!</h3>
                                                      
                                                    </div>
                                                <div class="loginbox animated fadeInRight">
                                                       

                                                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                                      <!--                <div class="social-buttons">
                                                        <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                                        <a href="#" class="btn btn-gplus"><i class="fa fa-google"></i> Google +</a>
                                                      </div>-->
                                                      
                                                    
                                                      <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                                         
                                                          </div>
                                                          <div class="col-sm-12 col-xs-12" style="z-index: 9;">
                                                            <div class="form-group">
                                                            <!--<input type="email" class="form-control" id="exampleInputEmail2" placeholder="" required>-->
                                                                  <?php echo $form->field($model, 'email')->label(false)->textInput([
                                        'placeholder' => "E-mail"]); ?>
                                                    
                                                          </div>
                                                          </div>
                                                        
                                                          
                                                          
                                                          
                                                          
                                                          <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <?php echo Html::submitButton('<i class="fa fa-check"></i> Send', ['class' => 'btn btn-primary']) ?>  </div>
                                                        
                                                          </div>
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



<script>
function myfunction(str){
	alert("Check Your E-mail for further Instructions.");
}
</script>