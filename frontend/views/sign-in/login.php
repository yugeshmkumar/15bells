<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\LoginForm */

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
			
			
                                                <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                                    <div class="form-group">
                                                        <i class="fa fa-user-circle-o first" aria-hidden="true"></i>
                                                    <?php echo $form->field($model, 'identity')->label(false); ?>
                
													</div>
                                                    <div class="form-group">
                                                        <i class="fa fa-phone-square second" aria-hidden="true"></i>
                                                        <?php echo $form->field($model, 'password')->passwordInput()->label(false); ?>
														<div class="help-block text-right"><?php echo Yii::t('frontend', '<a href="{link}"><h6>Forgot password ?</h6></a>', [
                        'link'=>yii\helpers\Url::to(['sign-in/request-password-reset'])
                    ]) ?>
													</div>
                                                    </div>
                                                    <div class="form-group">
                                                        <?php echo Html::submitButton(Yii::t('frontend', 'Sign in'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <?php echo $form->field($model, 'rememberMe')->checkbox()->label(false) ?> 
                                                        </label>
                                                    </div>
                                                
              
              
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
