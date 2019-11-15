<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;


use yii\helpers\ArrayHelper;
use backend\modules\finance\models\Chartaccountsconfig;


?>




 <?php $form = ActiveForm::begin(); ?><?php $form = ActiveForm::end(); ?>


<?php
$accntID = $_GET['accntID'];
$ack=\common\models\CompanyEmp::find()->where(['id'=>$accntID])->one(); 
$designation = \common\models\Designations::findOne($ack->designation)->name;
$location = $ack->location;
?>
  <div class="row"><div class="col-md-6"><div class="form-group">
   <label class="control-label">Designation</label>
  <input type="text"  id="designation" value="<?php echo $designation ?>" disabled name="designation" placeholder="" class="form-control"></div></div><div class="col-md-6">
    <div class="form-group">
   <label class="control-label">Location</label>
   <input type="text"  id="location" name="location" value="<?php echo $location ?>" disabled placeholder="" class="form-control"> </div>
                                          </div></div>                





	  
	  
 

