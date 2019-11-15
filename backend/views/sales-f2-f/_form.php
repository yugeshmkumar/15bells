<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SalesF2F */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-f2-f-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'buyer_id')->textInput() ?>

    <?= $form->field($model, 'sellor_id')->textInput() ?>

    <?= $form->field($model, 'property_id')->textInput() ?>

    <?= $form->field($model, 'sales_executive_id')->textInput() ?>

    <?= $form->field($model, 'meeting_date_time')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'IN_PROGRESS' => 'IN PROGRESS', 'ON_HOLD' => 'ON HOLD', 'COMPLETED' => 'COMPLETED', 'REJECTED' => 'REJECTED', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
