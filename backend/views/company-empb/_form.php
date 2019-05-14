<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\CompanyEmpb */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-empb-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'name')->textInput() ?>
    
      <?php $model->employee_typeID = 1; ?>
     <div style="display:none;"><?= $form->field($model, 'employee_typeID')->textInput() ?></div>

 
    <?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>

    <?= $form->field($model, 'employee_number')->textInput(['type' => 'number']) ?>
	
	<?php $findallroles = \common\models\Cities::find()
	->join('LEFT OUTER JOIN','states','states.id=cities.state_id')
	->where('states.country_id =:countid',array(':countid'=>101))->all();
	      $listroles = ArrayHelper::map($findallroles ,'name','name');
	?>
    <?= $form->field($model, 'location')->widget(Select2::classname(), [
    'data' => $listroles,
    'options' => ['placeholder' => 'Select...', 'multiple' => false],
    'pluginOptions' => [
        'allowClear' => true,
        
    ],
]);?>
	
	<?php $findallroles = \common\models\Designations::find()->all();
	      $listroles = ArrayHelper::map($findallroles ,'id','name');
	?>
    <?= $form->field($model, 'designation')->widget(Select2::classname(), [
    'data' => $listroles,
    'options' => ['placeholder' => 'Select...', 'multiple' => false],
    'pluginOptions' => [
        'allowClear' => true,
        
    ],
]);?>
<?php $arrfindallroles = \common\models\CompanyEmpb::find()->where(['employee_typeID'=>1])->all();
	      $listemployee = ArrayHelper::map($arrfindallroles ,'id','name');
	?>
    <?= $form->field($model, 'managerID')->widget(Select2::classname(), [
    'data' => $listemployee,
    'options' => ['placeholder' => 'Select...', 'multiple' => false],
    'pluginOptions' => [
        'allowClear' => true,
        
    ],
]);?>

<?php echo $form->field($model, 'role_id')->radioList($roles) ?>
    
  

	  	<div class="form-group">
		<p>
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    
		
 <?php echo Html::a(Yii::t('backend', '<i class="fa fa-mail-reply"></i> Back to Add Employees', [
    'modelClass' => 'Designations',
]), ['/company-empb/index'], ['class' => 'btn btn-primary']) ?> </p>
		</div>
	

    <?php ActiveForm::end(); ?>
    
</div>
