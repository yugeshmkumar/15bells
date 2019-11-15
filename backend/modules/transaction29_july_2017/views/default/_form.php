<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\transaction\models\ProductDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reserved_price')->textInput() ?>


    <?= $form->field($model, 'product_id')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
