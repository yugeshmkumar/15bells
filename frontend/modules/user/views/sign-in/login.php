<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	/* @var $this yii\web\View */
	/* @var $form yii\widgets\ActiveForm */
	/* @var $model \frontend\modules\user\models\LoginForm */

	//$this->title = Yii::t('frontend', 'Login');
	$this->params['breadcrumbs'][] = $this->title;
	?>
		<div class="row">

						<div class="col-md-8 no_pad hidden-xs">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/login.jpg';  ?>" class="img_sign">
						</div>
						<div class="col-md-4 signup_form">
							<div class="row text-center">
								<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/logo.png';  ?>" width="80">
								<h3 class="sign_line text-left">Welcome Back!</h3>
							</div>

							<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
							<div class="row form_signup">
							
								
								<div class="col-md-12 login_pad">
									<div class="email_icon">@</div><?php echo $form->field($model, 'identity')->textInput(['class' => 'form-control login_field','placeholder'=>'Email'])->label(false) ?>
								</div>
								<div class="col-md-12 login_pad">
									 <div class="email_icon"><i class="fa fa-asterisk"></i></div> <?php echo $form->field($model, 'password')->passwordInput(['class' => 'form-control login_field','placeholder'=>'Password'])->label(false) ?>
									 <p class="text-right p_forgt"><?php echo Yii::t('frontend', '<a href="{link}" class="forgt_passwrd">Forgot password ?</a>', [
	                             'link'=>yii\helpers\Url::to(['sign-in/request-password-reset'])
	                              ]) ?></p>
								</div>
								<div class="col-md-12 login_pad">		
									<button type="submit" class="btn btn-primary submt_butn" name="signup" value="Sign up">Login</button>
									<p class="creat_accnt text-center">Don't have an account?<?php echo Html::a(Yii::t('frontend', '  Create.'), ['signup'],['onclick'=>"ga('send', 'event', 'Create User Button', 'Create User Button', 'Create User Button','Create User Button')", 'class' => "signup_link"]) ?></p>
								</div>
							</div>
							<?php ActiveForm::end(); ?>

						</div>

	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>