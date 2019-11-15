<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Documenttypenew */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documenttypenew-form">

    <?php $form = ActiveForm::begin(); ?>
<?php
$arrdocumentconfig = \common\models\Documentsconfig::find()->all();
$documentdata = ArrayHelper::map($arrdocumentconfig ,'documentsconfigID','documentType');

?>
    <?= $form->field($model, 'documentConfigID')->dropDownList(
            $documentdata,           // Flat array ('id'=>'label')
            ['prompt'=>'Select..']    // options
        ); ?>

    <?= $form->field($model, 'documentTypeName')->textInput(['maxlength' => true]) ?>
<?php
$arrloginastconfig = \common\models\LoginAsConfig::find()->all();
$lloginasdata = ArrayHelper::map($arrloginastconfig ,'id','name');

?>
    <?= $form->field($model, 'user_login_as')->dropDownList(
            $lloginasdata,           // Flat array ('id'=>'label')
            ['prompt'=>'Select..']    // options
        ); ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
