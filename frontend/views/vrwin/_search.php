<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VRWinSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vrwin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vr_id') ?>

    <?= $form->field($model, 'prop_id') ?>

    <?= $form->field($model, 'lesse_buyer_id') ?>

    <?= $form->field($model, 'lessor_seller_id') ?>

    <?php // echo $form->field($model, 'auction_type') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
