<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;


?>

<?php if($act=="createslottwo") { ?>

<?php
$sanee=$checkedapp;
$appID= $_POST["requestid"];
$slot=$_POST["selectslot"];

$holder=$_POST["holder"];


$addate=date("Y-m-d");



if($appID){

$cus=\common\models\Showdocuments::findOne($appID);

/* Update All Status of application To Null */
//$schoolinfo->updateallapplicationsstatustonull($sanee);
/* End */
	
/* set new status of application */	
//$schoolinfo->addapplicationNewStatus($sanee,$holder,Yii::$app->user->identity->id);
/* end */


	$bbcoud1 = \common\models\event_attendes::find()
	->where(['application_id' => $appID])
    ->count();
        
        $mailwho = common\models\Showdocuments::find()
	->where(['id' => $appID])
    ->one();
	
        $paymen = \common\models\User::find()
->where(['id' => $mailwho->userid])
    ->one();
        
        
        
        $krqt = new \common\models\event_attendes();

$krqt->parents = 'documentshow';
$krqt->slot_id = $slot;
$krqt->application_id = $appID;
$krqt->status = 'active';
$krqt->addnew = 1;
$krqt->save();

}

?>


<?php } ?>

<?php if($act=="createslot") { ?>

<?php
$sanee=$checkedapp;
$appID= $_POST["requestid"];
$slot=$_POST["selectslot"];

$holder=$_POST["holder"];


$addate=date("Y-m-d");



if($appID){

$cus=\common\models\RequestSiteVisitbin::findOne($appID);

/* Update All Status of application To Null */
//$schoolinfo->updateallapplicationsstatustonull($sanee);
/* End */
	
/* set new status of application */	
//$schoolinfo->addapplicationNewStatus($sanee,$holder,Yii::$app->user->identity->id);
/* end */


	$bbcoud1 = \common\models\event_attendes::find()
	->where(['application_id' => $appID])
    ->count();
        
        $mailwho = common\models\RequestSiteVisitbin::find()
	->where(['request_id' => $appID])
    ->one();
	
        $paymen = \common\models\User::find()
->where(['id' => $mailwho->user_id])
    ->one();
        
        
        
        $krqt = new \common\models\event_attendes();

$krqt->parents = 'sitevisits';
$krqt->slot_id = $slot;
$krqt->application_id = $appID;
$krqt->status = 'active';
$krqt->addnew = 1;
$krqt->save();

}

?>


<?php } ?>