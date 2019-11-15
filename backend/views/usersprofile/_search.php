<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MyprofilebackSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="myprofile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'guardianprofileid') ?>

    <?php echo $form->field($model, 'userID') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'middlename') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'nationality') ?>

    <?php // echo $form->field($model, 'emailid') ?>

    <?php // echo $form->field($model, 'mobileid') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'martial_status') ?>

    <?php // echo $form->field($model, 'isMinor') ?>

    <?php // echo $form->field($model, 'relatnshp_with_minor') ?>

    <?php // echo $form->field($model, 'guardian_name') ?>

    <?php // echo $form->field($model, 'pan_card_no') ?>

    <?php // echo $form->field($model, 'adhar_card_no') ?>

    <?php // echo $form->field($model, 'countryverificatn') ?>

    <?php // echo $form->field($model, 'passportno') ?>

    <?php // echo $form->field($model, 'pionumber') ?>

    <?php // echo $form->field($model, 'ocinumber') ?>

    <?php // echo $form->field($model, 'current_country') ?>

    <?php // echo $form->field($model, 'current_state') ?>

    <?php // echo $form->field($model, 'current_city') ?>

    <?php // echo $form->field($model, 'current_pincode') ?>

    <?php // echo $form->field($model, 'current_address') ?>

    <?php // echo $form->field($model, 'permanent_country') ?>

    <?php // echo $form->field($model, 'permanent_state') ?>

    <?php // echo $form->field($model, 'permanent_city') ?>

    <?php // echo $form->field($model, 'permanent_pincode') ?>

    <?php // echo $form->field($model, 'permanent_address') ?>

    <?php // echo $form->field($model, 'isactive') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
