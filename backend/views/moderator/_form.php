<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Addpropertycsrhead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="addpropertycsrhead-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'auction_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'propertyID')->dropDownList([ 'seller' => 'Seller', 'lessor' => 'Lessor', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'moderatorID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fromdatetime')->dropDownList([ 'both' => 'Both', 'sale' => 'Sale', 'rent' => 'Rent', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'todatetime')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'pending' => 'Pending', 'approved' => 'Approved','rejected'=>'Rejected' ,'published'=>'Published'], ['prompt' => '']) ?>

    <?= $form->field($model, 'approverID')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'secret_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'startbidtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_raise')->textarea(['rows' => 6]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
