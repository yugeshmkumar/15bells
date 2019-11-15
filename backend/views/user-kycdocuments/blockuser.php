
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserKycdocuments */
/* @var $form yii\bootstrap\ActiveForm */
?>
    <?php $form = ActiveForm::begin(); ?>
<div class="note note-default">

Block User :  <i><b><?php echo \common\models\User::findOne($_GET['id'])->email; ?></b></i>

</div>


<div class="note note-danger">
Are you sure ? 


</div>

<button type="submit" name="blockuser" id="blockuser" onclick="myfunction('<?php echo $_GET['id'] ?>')"class="btn btn-primary"><i class="fa fa-check"></i> Confirm</button>
<a class="btn btn-default" href="<?php echo Yii::$app->urlManager->createUrl(['user-kycdocuments/index']) ?>"><i class="fa fa-wrong"></i> Cancel</a>

 <?php ActiveForm::end(); ?>
<script>
function myfunction(str){
alert('hii');
}
</script>