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
    #register{
        background-image: url(<?= Yii::getAlias('@frontendUrl') . '/frontimg/screen_1.jpg'; ?>);
        position: fixed;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -100;
        transform: translateX(-50%) translateY(-50%);
        background-size: cover;
        transition: 1s opacity;
    }
    .logg_in {
        color: #fff;
        padding: 6px 25px;
        background: #2da5c8;
        cursor:pointer;
    }

</style>

<div id="register">


    <!-- Begin page content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="row">
<?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div id="successMessage" class="alert alert-success alert-dismissable" style="top: 140px;width: 65%;margin: 0px auto;    position: relative;box-shadow: 0px 3px 17px 0px #a79595;z-index:99;">
                            <div class="row">
                                <div class="col-md-12">
                                    <a style="z-index:9;" aria-hidden="true" data-dismiss="alert" class="close" href="https://15bells.com/frontend/web/user/sign-in/login">×</a>
                                    <h4><i class="icon fa fa-check"></i>Saved!</h4>
    <?= Yii::$app->session->getFlash('success') ?>
                                </div>
                                <div class="col-md-12 text-center" style="padding-top:10px;">
                                    <a href="https://15bells.com/frontend/web/user/sign-in/login" class="logg_in">Log In</a>
                                </div>
                            </div>
                        </div>

<?php endif; ?>
                </div>
                <div class="col-md-2"></div>
               
            </div>
        </div>
       

    </div>
</div>



 
