<?php

use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

if (isset($_GET['idm'])) {
    $modelid = $_GET['idm'];
} else {
    $modelid = '';
}
$property = \common\models\LessorExpectations::find()->where(['property_id' => $modelid])->andwhere(['user_type' => 'lessor'])->one();

if (!empty($property)) {
    $lessorid = $property->id;
} else {
    $lessorid = '';
}
?>
<style>
    .navbar-me{
        background:#221d36 !important;
    }
	</style>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<!-- BEGIN : STEPS -->
<div class="col-md-12" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-fit contnt_detl">

                <div class="portlet-body">
                    

				<div class="mt-element-step">

				<div class="row step-thin m-0">
					<a class="col-md-3 othr_tab bordr_rds" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinlessor', 'id' => $modelid]) ?>">
						<div class="bg-grey mt-step-col active sell_add">
							<div class="mt-step-title uppercase font-grey-cascade add_det"><span>BASIC DETAILS</span></div>
							<div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
						</div></a>

			<!--<a href="<? //php echo Yii::$app->urlManager->createUrl(['lessor-expectations/create'])  ?>">-->
					<a class="col-md-3 othr_tab" href="<?php echo Yii::$app->urlManager->createUrl(['lessor-expectations/updateinlessor', 'id' => $lessorid]) ?>" style="cursor:default !important;">
						<div class="bg-grey mt-step-col sell_add">
							<div class="mt-step-title uppercase font-grey-cascade add_det"><span>Expectations</span></div>
							<div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
						</div>
					</a>
					<!--<a href="<? //php echo Yii::$app->urlManager->createUrl(['addproperty/additional'])  ?>">-->
					<a class="col-md-3 active_tab" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/additional','idm'=>$modelid]) ?>" style="cursor:default !important;">
						<div class="bg-grey mt-step-col sell_add">
							<div class="mt-step-title uppercase font-grey-cascade add_det"><span>ADDITIONAL DETAILS</span></div>
							<div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
						</div>
					</a>
					<a class="col-md-3 othr_tab no_bordr bordr_rds_rt" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/documents','id'=>$modelid]) ?>" style="cursor:default !important;">
						<div class="bg-grey mt-step-col sell_add">
							<div class="mt-step-title uppercase font-grey-cascade add_det"><span>DOCUMENTS UPLOAD</span></div>
							<div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
						</div>
					</a>


				</div>
				<br/>
				<br/>

			</div>
<?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="icon fa fa-check"></i>Saved!</h4>
    <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                        <?php endif; ?>

                    <div class="portlet-title">
                       
                    </div>
                    <div class="row sellr_proprty">

					 <div class="caption add_prprt">
												<i class=" icon-plus font-blue"></i>
												<span class="caption-subject font-green bold uppercase exp_name">UPLOAD DOCUMENTS</span>
											</div>
                        <div class="col-md-12 form-md-checkboxes has-success mrgin_top">
							<div class="row">
								<label class="col-md-3 control-label" for="form_control_1">UPLOAD IMAGE</label>
								<div class="col-md-9 upload_bar">

	<?php
	echo $form->field($model, 'featured_image')->widget(FileInput::classname(), [
		'options' => ['accept' => 'image/*','class'=>'imageclass','onClick'=>'ga("send", "event", "Addproperty create additional image upload", "Addproperty create additional image upload", "Addproperty create additional image upload","Addproperty create additional image upload")'],
		])->label(false);
	?>

								</div>
                            </div>

                        </div>

                        <div class="col-md-12 form-md-checkboxes has-success mrgin_top">
							<div class="row">
								<label class="col-md-3 control-label" for="form_control_1">UPLOAD VIDEO</label>
								<div class="col-md-9 upload_bar">

	<?php
	echo $form->field($model, 'featured_video')->widget(FileInput::classname(), [
		'options' => ['accept' => 'video/*','class'=>'videoclass','onClick'=>'ga("send", "event", "Addproperty create additional video upload", "Addproperty create additional video upload", "Addproperty create additional video upload","Addproperty create additional video upload")'],
		])->label(false);
	?>

								</div>
							</div>

                        </div>

                        <div class="col-md-12 form-md-checkboxes has-success mrgin_top">
							<div class="row">
								<label class="col-md-3 control-label" for="form_control_1"> UPLOAD THUMBNAILS</label>
								<div class="col-md-9 upload_bar">

<?php
if (isset($_GET['idm'])) {
    $idl = $_GET['idm'];
} else {
    $idl = '';
}
echo FileInput::widget([
    //'model' => $model,
    'name' => 'featured_thumbnails_id[]',
    'id' => 'featured_thumbnails_id',
    'options' => ['multiple' => true],
    'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => Url::to(['/addproperty/fileupload?ids=' . $idl . '']),]
]);
?>

                            </div>
							</div>
                        </div>
                        <div class="col-md-12 text-center" style="padding:20px 0 5px 0;">
                            <a class="btn btn-info addi_butn"  onclick="ga('send', 'event', 'Add property create additional gotodashboard', 'Add property create additional gotodashboard', 'Add property create additional gotodashboard','Add property create additional gotodashboard');" href="<?php echo Yii::$app->urlManager->createUrl(['/site/userdash']) ?>" > Go To Dashboard</a>


                            <a class="btn btn-info addi_butn" onclick="ga('send', 'event', 'Add property lessor creates additionals viewproperty', 'Add property lessor creates additionals viewproperty', 'Add property lessor creates additionals viewproperty','Add property lessor creates additionals viewproperty');"  href="<?php echo Yii::$app->urlManager->createUrl(['/addproperty/view', 'id' => $modelid]) ?>" > View Property</a>

                        </div>
                    </div>



                </div>
            </div>




            <!-- END FORM-->
            <!-- END FORM-->

            <!-- end form -->

        </div>

<?php
$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
if ($getprofilestatus) {
    $count = $getprofilestatus->process_status;
} else {
    $count = 0;
}
?>

    </div>
    <!-- END : STEPS -->
</div>

</div>
<!-- END CONTENT BODY -->
<?php ActiveForm::end(); ?>
