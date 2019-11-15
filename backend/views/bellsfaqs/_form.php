<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bellsfaqs */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="bellsfaqs-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php echo $form->field($model, 'subject')->textarea(['rows' => 2]) ?>

    <?php echo $form->field($model, 'content')->textarea(['rows' => 3]) ?>
	
	<?php echo $form->field($model, 'content_description')->textarea(['rows' => 5]) ?>

   <div class="row"><div class="col-md-5">

    <?php echo $form->field($model, 'page')->dropDownList([ 'seller' => 'Seller', 'buyer' => 'Buyer', 'landlord' => 'Landlord', 'tenant' => 'Tenant', 'broker' => 'Broker', ], ['prompt' => 'Select..']) ?>
</div><div class="col-md-5">
    <?php echo $form->field($model, 'publishstatus')->dropDownList([ 'pending' => 'Pending', 'reviewed' => 'Reviewed', 'approved' => 'Approved', 'published' => 'Published', ], ['prompt' => 'Select..']) ?>
</div></div>
  

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
