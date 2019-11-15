<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Usernew */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usernew-form">

    <?php $form = ActiveForm::begin(); ?>
             <?php if(isset($_GET['id'])){
			 $getfname = \common\models\CompanyUsers::find()->where(['subuser_id'=>$_GET['id']])->one();
			        if($getfname){
						$model->fname = $getfname->fname;
			 } } ?>
	 
	     <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>
	
	<?= $form->field($model, 'password_hash')->textInput(['type' => 'password','class'=>"password",'minlength'=> 6 ,'size'=>25 ])->label('Password'); ?>
                <button class="btn info" type="button">
                                <i class="fa fa-eye-slash" id="showHide"></i>
                            </button>
                      
                    </div>
   
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
 <script>
				 $(document).ready(function() {
  $("#showHide").click(function() {
    if ($(".password").attr("type") == "password") {
      $(".password").attr("type", "text");
	  $("#showHide").attr("class", "fa fa-eye");

    } else {
      $(".password").attr("type", "password");
	   $("#showHide").attr("class", "fa fa-eye-slash");
    }
  });
});
</script>