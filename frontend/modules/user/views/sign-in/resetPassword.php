<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\ResetPasswordForm */

$this->title = Yii::t('frontend', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container-fluid no_pad signin_cont">
	<div class="row">
		<div class="col-md-6 no_pad">
			<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/signup1.jpg';  ?>" class="signup_img">
		</div>
		<div class="col-md-6 no_pad">
			<div class="row pad_100">
				<div class="col-md-12 pad_40 signin_frm">
					<a href="" class="buttn_prev" type="button"><i class="fa fa-angle-left"></i> Back</a>	

   


					<h2 class="forgot_password">Create new password</h2></h2>
					
          <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>  
					<p class="signup_input">
          <?php echo $form->field($model, 'password')->passwordInput()->label(false)->textInput(['placeholder' => "New password",'class'=>"form-control input_desgn"]); ?>

					<!-- <input class="form-control input_desgn" placeholder="New password" name="email" /> -->
          </p>
					<p class="signup_input">
          <?php echo $form->field($model, 'password_repeat')->passwordInput()->label(false)->textInput(['placeholder' => "Re-enter new password",'class'=>"form-control input_desgn"]); ?>

					<!-- <input class="form-control input_desgn" placeholder="Re-enter new password" name="email" /> -->
          </p>
					<p class="text-center">
          <!-- <button class="btn btn-default btn_signin">Submit</button> -->
          <?php echo Html::submitButton('Submit', ['class' => 'btn btn-default btn_signin']) ?> </div>

          </p>
				</div>

         <?php ActiveForm::end(); ?>
				<div class="col-md-12 pad_40 signin_frm success_message">
					<p class="text-center"><img src="img/success.svg" width="88"></p>
					<p class="success_text">You have successfully created your new password.</p>
				</div>
			</div>
		</div>
	</div>
</div>


