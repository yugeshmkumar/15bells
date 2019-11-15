<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\modules\comm\models\MessageGroups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'listname')->textInput([]) ?>

  
<?php 
												$arrusers = \common\models\User::find()->all();
												$listuser = ArrayHelper::map($arrusers ,'id','email');
												// Tagging support Multiple (maintain the order of selection)
echo $form->field($model, 'userID')->widget(Select2::classname(), [
     // initial value
    'data' => $listuser,
    'maintainOrder' => true,
    'options' => ['placeholder' => 'Select Users...', 'multiple' => true],
    'pluginOptions' => [
        'tags' => true,
        //'maximumInputLength' => 10
    ],
]);


?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
