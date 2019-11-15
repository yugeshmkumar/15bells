<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bellsfaqs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bellsfaqs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'page')->dropDownList([ 'seller' => 'Seller', 'buyer' => 'Buyer', 'landlord' => 'Landlord', 'tenant' => 'Tenant', 'broker' => 'Broker', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'publishstatus')->dropDownList([ 'pending' => 'Pending', 'reviewed' => 'Reviewed', 'approved' => 'Approved', 'published' => 'Published', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
