<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use common\models\User;
use common\models\CompanyEmp;


/* @var $this yii\web\View */
/* @var $model common\models\Leads */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="leads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    

	<?php
	$arrCountries = \common\models\User::find()->all();
	// echo '<pre>';print_r($arrCountries);die;
	$Countries = ArrayHelper::map($arrCountries ,'id','email');

	?>
   
                  
    <div class="form-group">
	<?= $form->field($model, 'user_id')->widget(Select2::classname(), [
	'data' => $Countries,
	'options' => ['placeholder' => 'Please Select ...','class'=>'form-control'],
	'pluginOptions' => [
	'allowClear' => true
	],
	])->label(false); ?>
     </div>
                       

    <?php echo $form->field($model, 'email')->textInput(['rows' => 3]); ?>

    <?php
    echo $form->field($model, 'location')->dropDownList(['Gurugram' => 'Gurugram', 'Delhi' => 'Delhi', 'Faridabad' => 'Faridabad', 'Noida' => 'Noida', 'Gaziabad' => 'Gaziabad'],['prompt'=>'Select location']);
    ?>

    <?php 

      echo $form->field($model, 'role_id')->dropDownList(
            ['4' => 'Tenant', '5' => 'Landlord', '7' => 'Buyer', '6' => 'Seller']
        );

       ?>

    <?php echo $form->field($model, 'name')->textarea(['rows' => 3]) ?>

    <?php echo $form->field($model, 'countrycode')->textarea(['rows' => 3]) ?>

    <?php echo $form->field($model, 'number')->textarea(['rows' => 3]) ?>

    <?php echo $form->field($model, 'facebook_id')->textarea(['rows' => 3]) ?>

    <?php echo $form->field($model, 'linkedin_id')->textarea(['rows' => 3]) ?>


  <?php   $countries=CompanyEmp::find()->where(['name'=>'sales demand lessee'])->all();

//use yii\helpers\ArrayHelper;
$listData=ArrayHelper::map($countries,'id','employee_email');

echo $form->field($model, 'sales_id')->dropDownList(
        $listData,
        ['prompt'=>'Select Sales Executive']
        );

        ?>

   

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(function(){    
    $("select[name='Leads[user_id]']").change(function(){
     // alert($(this).find("option:selected").text());  
     $('#leads-email').val($(this).find("option:selected").text());      
   
});
})
</script>
