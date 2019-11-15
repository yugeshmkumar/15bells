<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Bellsroutings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bellsroutings-form">

    <?php $form = ActiveForm::begin(); ?>
<?php
     $arritems = \common\models\UserRoles::find()->where(['isactive'=>1])->all();
	 $items = ArrayHelper::map($arritems, 'id', 'rolename');
	 ?>
  
    <?= $form->field($model, 'user_role')->dropDownList([$items], ['prompt' => '']) ?>

    <?= $form->field($model, 'login_to')->dropDownList([ 'frontend' => 'Frontend', 'backend' => 'Backend', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'login_url')->textarea(['rows' => 6]) ?>

   

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
