<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\FileInput;
use common\models\Employeetype;
use common\models\Subdepartment;
use common\models\School;
use yii\helpers\Url;

//$emptypinfo = new Employeetype();

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>


<?php
$arrfindmykyc = \common\models\UserKycdocuments::find()->where(['userid' => Yii::$app->user->identity->id])->all();

$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
if ($getprofilestatus) {
    $count = $getprofilestatus->process_status;
} else {
    $count = 0;
}

$getprofilestatus1 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_KYC_upload");
if ($getprofilestatus1) {
    $count1 = $getprofilestatus1->process_status;
} else {
    $count1 = 0;
}
?>

<!-- END PAGE BAR -->
<style>
.progress{display:none;}
</style>
<div class="col-md-12">
    <div class="portlet light portlet-fit trans_prnt">

        <div class="portlet-body">
            
            <?php
            $form = ActiveForm::begin([
                        'id' => 'ibforms',
                        'options' => ['enctype' => 'multipart/form-data']
            ]);
            ?>
            <div class="portlet light nof_docs sellr_proprty">
                <div class="portlet-title">
                    <div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
                        <span><label class="totl_docs">Total Number Of Documents Required :</label></span><span>
						</div>
						<div class="col-md-6">
                            <input type="text" name="totnumber" readonly="true" id="reqtotnumber" disabled="disabled" class="form-control" value="<?php echo $totnumberofdocument ?>" onkeyup="removerequired()"  /></span>
                        <input type="hidden" name="dummytotnumber" id="reqdummytotnumber" class="form-control" value="<?php echo $totnumberofdocument ?>"  />
						</div>
						</div>

                    </div>
                    <div class="caption font-green-sharp exp_titl" style="margin-top:15px;">
                                        
                                        <span class="caption-subject bold uppercase exp_name">My Documents</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>
				</div>
                <div class="portlet-body form">
                    <div class="table-scrollable">
                        <table class="table table-hover tabl_docs">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>Document name </th>
                                    <th>Action </th>
                                    <th>Status </th>

                                </tr>
                            </thead>
                            <tbody>
<?php
$temp = 0;
foreach ($arrfindmykyc as $findmykyc) {
    $temp++;
    ?> 
                                    <tr>
                                        <td> <?php echo $temp ?> </td>
                                        <td><b><?php echo \common\models\Documenttype::findOne($findmykyc->document_name)->documentTypeName ?></b> </td>
                                        <td><a onclick="downloadfileconfig('<?php echo $findmykyc->document_file_name_extenstn ?>')"><i class="fa fa-download"></i> Click to download</a> </td>
    <?php if ($findmykyc->approve_status != 1) { ?>
                                            <td>
                                                <span class="label label-sm label-warning"> Pending For Approval </span>
                                            </td>
                                    <?php } else { ?>
                                            <td>
                                                <span class="label label-sm label-success"> Approved </span>
                                            </td>
                            <?php } ?>
                                    </tr>
<?php } ?>
                            </tbody>
                        </table>


            <?php ActiveForm::end(); ?>
                    </div> </div> </div>

<?php
$form = ActiveForm::begin([
            'id' => 'ibforms',
            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>








           
            

	
            <div class="col-md-12 sellr_proprty" style="margin-top:20px;">


								<div class="caption font-green-sharp exp_titl">
                                        
                                        <span class="caption-subject bold uppercase exp_name">Upload Documents</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>


                <table width="100%" border="0" cellpadding="0" cellspacing="0"> 	 

                </table>






                <table class="table table-striped table-bordered tabl_docs"><thead>
                        <tr>
                            <th></th>
                            <th>Document Name</th>
                            <th>Documents</th>

                        </tr>
                    </thead>
                    <tbody>

<?php
// echo '<pre>';print_r($busdocument);die;
$rk = 0;
foreach ($busdocument as $busdocInfo) {
    $rk++;
    $checkifdocsalreadyuploaded = \common\models\UserKycdocuments::find()->where(['userid' => Yii::$app->user->identity->id, 'document_name' => $busdocInfo->documenttypeID, 'isactive' => 1])->one();
    ?>
                                        <?php if (!$checkifdocsalreadyuploaded) { ?>
                                <tr data-key="5">
                                    <td><input type="checkbox"  name="supportchkir[]"  checked id="supportchkir"  value="<?php echo $rk ?>"   ></td>
                                    <td><input type="hidden" name="documentDescription<?php echo $rk ?>" class="form-control reqme"  required value="<?php echo $busdocInfo->documenttypeID ?>"  />
                                        <input type="text" class="form-control reqme"   value="<?php echo $busdocInfo->documentTypeName ?>" readonly="true"  />
                                    </td>
                                    <td>

                                        <div style="max-width:400px;">
                                            <?php
                                            echo FileInput::widget([
                                                'name' => 'documentfiles' . $rk,
                                                'id' => 'documentfiles' . $rk,
                                                //'value' => date('d-M-Y', strtotime('+2 days')),
                                                'options' => ['multiple' => false, 'accept' => 'image/*', 'class' => 'reqme'],
                                                'pluginOptions' => [
                                                    'previewFileType' => false,
                                                    'showUpload' => true,
                                                ]
                                            ]);
                                            ?>
                                        </div>
                                    </td>

                                </tr>
                        <?php } ?> <?php } ?>

                    </tbody></table>
                <div class="form-group text-center">
                    <?php
                    $checkifallareupload = \common\models\activemode::check_my_docs_upload_completion_status(Yii::$app->user->identity->id);
                    if ($checkifallareupload != 7) {
                        ?>

    <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary btn_docs butn_styl' : 'btn btn-primary btn_docs','onclick' => "ga('send', 'event', 'Common Documents Submit All', 'Documents Submit All', 'Documents Submit All','Documents Submit All')"]) ?>
<?php } ?>
<?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
if ($checkrole->item_name == "Company_user") {
    ?> 
                        <a class="btn btn-info btn_docs butn_styl" href="<?php echo Yii::$app->urlManager->createUrl(['/site/couserdash']) ?>" >Go to Dashboard</a>
<?php } else { ?>
                        <a class="btn btn-info btn_docs butn_styl" href="<?php echo Yii::$app->urlManager->createUrl(['/site/userdash']) ?>" > Go to Dashboard</a>
<?php } ?>


<!--<a class="btn btn-info" data-toggle="modal" href="#static" ><i class="fa fa-share"></i> Next</a>-->

                </div>
            </div>
<?php ActiveForm::end(); ?>
        </div>

    </div> 

<?php
$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
if ($getprofilestatus) {
    $count = $getprofilestatus->process_status;
} else {
    $count = 0;
}
?>



    <script>
        function removerequired() {
            var fst = $('#reqtotnumber').val();
            var sec = $('#reqdummytotnumber').val();

            if (fst != sec) {
                var elementsd = document.getElementsByClassName("reqme");
                for (var d = 0; d < elementsd.length; d++) {
                    elementsd[d].required = "";
                }
            }

            if (fst == sec) {
                var elementsd = document.getElementsByClassName("reqme");
                for (var r = 0; r < elementsd.length; r++) {
                    elementsd[r].required = true;
                }
            }

        }
    </script>


    <script>
        function downloadfileconfig(str) {
            $('#filenamemain').val('');
            $('#filenamemain').val(str);
            $('#filedownload').trigger('click');
        }
    </script>

<?php $form = ActiveForm::begin(array('id' => 'ibformnmsssocket')); ?>		
    <input type="hidden" name="filenamemain" id="filenamemain" >
    <input type="submit" name="filedownload" id="filedownload"  value="pdfss" style="display:none;"  > 
<?php $form = ActiveForm::end(); ?>

    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Choose an Action</h4>
                </div>
                <div class="modal-body">
                    <p> <a href="<?php echo Yii::$app->urlManager->createUrl(['landlordaction/index']) ?>" class="btn green"><i class="fa fa-plus"></i> Add Property <i class="fa fa-share"></i></a>
                        <a href="<?php echo Yii::$app->urlManager->createUrl(['tenantaction/search']) ?>" class="btn green"><i class="fa fa-search"></i> Search Property <i class="fa fa-share"></i></a>
                        <a href="<?php echo Yii::$app->urlManager->createUrl(['landlordaction/addrfp']) ?>" class="btn green"><i class="fa fa-check"></i> My Quick Request <i class="fa fa-share"></i></a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>

                </div>
            </div>
        </div>
    </div>
</div>



