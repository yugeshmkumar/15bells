<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\CompanyEmp;
use kartik\datetime\DateTimePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use common\models\User;



/* @var $this yii\web\View */
/* @var $model backend\models\Revenue */
/* @var $form yii\widgets\ActiveForm */
$user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;

         $arrCountries = \common\models\User::find()->all();
    $Countries = ArrayHelper::map($arrCountries ,'id','email');
    
    // echo '<pre>';print_r($Countries);die;



?>

<div class="revenue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'property_id')->textInput() ?>

    <?= $form->field($model, 'sales_executive_id')->hiddenInput(['value'=>$assigned_id])->label(false) ?>


    <div class="form-group">
	<?= $form->field($model, 'client_id')->widget(Select2::classname(), [
	'data' => $Countries,
	'options' => ['placeholder' => 'Please Select ...','class'=>'form-control'],
	'pluginOptions' => [
	'allowClear' => true
	],
	])->label(false); ?>
     </div>

    <?= $form->field($model, 'client_total_amount')->textInput() ?>

    <?= $form->field($model, 'client_pending_amount')->textInput() ?>


    <?php
    
    echo $form->field($model, 'client_pending_amount_date')->widget(
        DateTimePicker::class, 
        [
            'model' => $model,
           'attribute' => 'client_pending_amount_date',
            'options' => ['placeholder' => 'Select time ...'],
            'convertFormat' => true,
            'pluginOptions' => [
                'autoclose'=>true,
                    'format' => 'yyyy-MM-dd HH:i:00',
                'startDate' => '01-Mar-2020 12:00 AM',
                'todayHighlight' => true
            ]
        ]
        );
        
        ?>

    <?= $form->field($model, 'owner_id')->textInput() ?>

    <?= $form->field($model, 'owner_total_amount')->textInput() ?>

    <?= $form->field($model, 'owner_pending_amount')->textInput() ?>

    <?php
    
    echo $form->field($model, 'owner_pending_amount_date')->widget(
        DateTimePicker::class, 
        [
            'model' => $model,
           'attribute' => 'owner_pending_amount_date',
            'options' => ['placeholder' => 'Select time ...'],
            'convertFormat' => true,
            'pluginOptions' => [
                'autoclose'=>true,
                    'format' => 'yyyy-MM-dd HH:i:00',
                'startDate' => '01-Mar-2020 12:00 AM',
                'todayHighlight' => true
            ]
        ]
        );
        
        ?>

    <?= $form->field($model, 'created_date')->hiddenInput()->label(false) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
