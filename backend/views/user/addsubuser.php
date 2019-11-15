<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\SignupForm */
?>
<style>

    #showHide {
        width: 15px;
        height: 15px;
        float: left;
    }
    #showHideLabel {
        float: left;
        padding-left: 5px;
    }
    .icon-btn {
        height: 68px;
    min-width: 162px;
    }

</style>	

<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>
<div class="col-md-10">
    <div class="registerbox animated slideInUp">
       <h2> <span class="caption-subject font-green-sharp bold uppercase">Add New CSR </span></h2><br/><br/>

        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>


        <form class="form-horizontal margin-bottom-40"  role="form" method="post" action="home.php" accept-charset="UTF-8" id="login-nav">
            <div class="row" style="padding: 0 16px 0 10px;">
               <!--- <div class="col-sm-4">
                    <div class="form-group">
                        <label>Name</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <?=
                        $form->field($model, 'fname', [
                            'options' => [
                            //'tag' => 'div',
                            //'class' => '',
                            ],
                                //'template' => '<span class="col-md-2 col-lg-2"><label class="control-label">Final item price</label>{input}{error}</span>'
                        ])->textInput([
                            'type' => 'text'
                        ])->label(false)
                        ?> 

                    </div>
                </div>
            </div> --->


            <div class="col-sm-4">
                <div class="form-group">
                    <label>Mobile</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <?=
                    $form->field($model, 'username', [
                        'options' => [
                        //'tag' => 'div',
                        //'class' => '',
                        ],
                            //'template' => '<span class="col-md-2 col-lg-2"><label class="control-label">Final item price</label>{input}{error}</span>'
                    ])->textInput([
                        'type' => 'number'
                    ])->label(false)
                    ?>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>E-mail</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">

                    <?=
                    $form->field($model, 'email', [
                        'options' => [
                        //'tag' => 'div',
                        //'class' => '',
                        ],
                            //'template' => '<span class="col-md-2 col-lg-2"><label class="control-label">Final item price</label>{input}{error}</span>'
                    ])->textInput([
                        'type' => 'email'
                    ])->label(false)
                    ?> </div>
            </div>
            <!--                   <div class="col-sm-4">
                                  <div class="input-group">
                                   <label>Password</label>
                                </div>
                                </div>
                                <div class="col-sm-8 input-group">
                                 
                                                      <input type="password" name="SignupForm[password]" id="SignupForm[password]" class="password form-control" size="25"> 
                                                      <span class="input-group-btn">
                                                                        <button class="btn info" type="button">
                                                                            <i class="fa fa-eye-slash" id="showHide"></i>
                                                                        </button>
                                                                    </span>
                              
                                </div>-->


            <div class="col-sm-4">
                <div class="form-group">
                    <label>Password</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">

                    <?=
                    $form->field($model, 'password', [
                        'options' => [
                        //'tag' => 'div',
                        //'class' => '',
                        ],
                            //'template' => '<span class="col-md-2 col-lg-2"><label class="control-label">Final item price</label>{input}{error}</span>'
                    ])->textInput([
                        'type' => 'password'
                    ])->label(false)
                    ?> </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">

                </div>
            </div>


            <div class="col-sm-8">
                <div class="form-group">
<?php echo Html::submitButton(Yii::t('frontend', 'ADD USER'), ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>

                </div>
            </div>
        </form>

    </div>



<?php ActiveForm::end(); ?>

</div>
   





