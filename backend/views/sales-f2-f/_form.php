<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model common\models\SalesF2F */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-f2-f-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'buyer_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'sellor_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'property_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'sales_executive_id')->hiddenInput()->label(false) ?>

    <?php
    
    echo $form->field($model, 'meeting_date_time')->widget(
        DateTimePicker::class, 
        [
            'model' => $model,
           'attribute' => 'meeting_date_time',
            'options' => ['placeholder' => 'Select meeting time ...'],
            'convertFormat' => true,
            'pluginOptions' => [
                'autoclose'=>true,
                    'format' => 'yyyy-MM-dd hh:i:00',
                'startDate' => '01-Mar-2020 12:00 AM',
                'todayHighlight' => true
            ]
        ]
        );
        
        ?>

    <?= $form->field($model, 'status')->dropDownList([ 'IN_PROGRESS' => 'IN PROGRESS', 'ON_HOLD' => 'ON HOLD', 'COMPLETED' => 'COMPLETED', 'REJECTED' => 'REJECTED', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->hiddenInput()->label(false) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
