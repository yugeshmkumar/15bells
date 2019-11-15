<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfilenewSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-profilenew-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'user_id') ?>

    <?php echo $form->field($model, 'firstname') ?>

    <?php echo $form->field($model, 'middlename') ?>

    <?php echo $form->field($model, 'lastname') ?>

    <?php echo $form->field($model, 'avatar_path') ?>

    <?php // echo $form->field($model, 'avatar_base_url') ?>

    <?php // echo $form->field($model, 'locale') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'facebook_id') ?>

    <?php // echo $form->field($model, 'linkedin_id') ?>

    <?php // echo $form->field($model, 'minor') ?>

    <?php // echo $form->field($model, 'relationship_with_minor') ?>

    <?php // echo $form->field($model, 'guardian_name') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
