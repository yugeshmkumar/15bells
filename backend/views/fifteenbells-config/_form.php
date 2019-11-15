<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FifteenbellsConfig */
/* @var $form yii\bootstrap\ActiveForm */
?>
<?php
$connection = Yii::$app->db;//get connection
$dbSchema = $connection->schema;
$tables = $dbSchema->getTableNames();//returns tbl schema's
//$gettables = $dbSchema->getTables();//returns tbl schema's
$gettables = $dbSchema->getTableSchema($schema = '\common\models\FifteenbellsConfig', $refresh = false);
$fields=\common\models\FifteenbellsConfig::find()->column();
//$getSchemaNames = $dbSchema->insert("\common\models\FifteenbellsConfig", "bhagya");
print($gettables);

?>
<div class="fifteenbells-config-form">

    <?php $form = ActiveForm::begin(); ?>
	Table Name
    <?php echo Html::activeDropDownList($model, 'table_name',$tables ,['class'=>'form-control']) ?>
	
    <?php echo Html::activeDropDownList($model, 'column_name',$tables ,['class'=>'form-control']) ?>
  
   
    <?php echo $form->field($model, 'status_value')->textInput() ?>

    <?php echo $form->field($model, 'status_name')->textarea(['rows' => 6]) ?>

  

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
