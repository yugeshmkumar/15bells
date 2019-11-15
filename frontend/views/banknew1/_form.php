<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Banknew */
/* @var $form yii\widgets\ActiveForm */
$userid = Yii::$app->user->identity->id;
?>

<div class="col-md-12 bnk_frm">
    <div class="row portlet-body form bank_deatils_body_div main_cont">
                  <div class="portlet-title col-md-12">
					<div class="caption add_prprt"><span>My Saved Banks</span></div>
					<div class="tools">
						<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

					</div>
				</div>
        <div class="form-body col-md-12">
            <div class="panel-group accordion scrollable" id="accordion2">
                <?php
                $arrgetbank = \common\models\activemode::findmybank($userid);
                $temp = 0;
                foreach ($arrgetbank as $getbank) {
                    $fourfirstdigits = mb_substr($getbank->account_no, 0, 4);
                    $fourlasttdigits = mb_substr($getbank->account_no, -4);
                    ?>
                    <div class="col-md-12 panel panel-default bank_detl">
                        <div class="panel-heading bank_panl">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_<?php echo $getbank->id ?>"> <?php echo $getbank->bank_name ?>- <?php echo $fourfirstdigits ?>-XXXX-XXXX-<?php echo $fourlasttdigits ?> </a>
                            </h4>
                        </div>
                        <div id="collapse_2_<?php echo $getbank->id ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p align="right" > <a href="javascript:void(0)" onclick="myremovefunction('<?php echo $getbank->id ?>')"><font color="black"><b>Click to Remove</b></font></a></p>
                                <p><div class="table-scrollable">
                                    <table class="table table-hover table_common">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Bank Name </th>
                                                <th> Branch </th>
                                                <th> Account Type </th>
                                                <th> Account No. </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 1 </td>
                                                <td> <?php echo $getbank->bank_name ?> </td>
                                                <td> <?php echo $getbank->branch_name ?> </td>
                                                <td> <?php echo $getbank->account_type ?> </td>
                                                <td>
    <?php echo $fourfirstdigits ?>-XXXX-XXXX-<?php echo $fourlasttdigits ?>
                                                </td>
                                            </tr> </tbody></table>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> 
<?php } ?>
            </div> 
        </div>

        </form>
    </div>

    <div class="banknew-form main_cont col-md-12">
        <div class="caption second_caption add_prprt mb-3">
                                        <!-- <i class="icon-plus font-blue"></i> -->
            <span class="caption-subject bold uppercase"> Add Bank Details</span>
        </div>
<?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
<?= $form->field($model, 'bank_name')->textInput(['placeholder' => "Bank Name", 'class' => "form-control one_inpt"])->label(false) ?>
            </div>
            <div class="col-md-4">
<?= $form->field($model, 'bank_accnt_name')->textInput(['placeholder' => "Account Name", 'class' => "form-control one_inpt"])->label(false) ?>
            </div>
            <div class="col-md-4">
<?= $form->field($model, 'account_no')->textInput(['maxlength' => true,'placeholder' => "Account Number", 'class' => "form-control one_inpt"])->label(false) ?>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
<?= $form->field($model, 'branch_name')->textInput(['placeholder' => "Branch Name", 'class' => "form-control one_inpt"])->label(false) ?>
            </div>
            <div class="col-md-4">
<?= $form->field($model, 'isfc_code')->textInput(['maxlength' => true,'placeholder' => "IFSC Code", 'class' => "form-control one_inpt"])->label(false) ?>
            </div>
            <div class="col-md-4">
<?= $form->field($model, 'account_type')->dropDownList(['Savings' => 'Savings', 'Current' => 'Current', 'salary' => 'Salary',], ['prompt' => 'Account Type','class' => "form-control one_inpt"])->label(false) ?>
            </div>

        </div>
        <div class="row">



        </div>

        <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success addi_butn' : 'btn btn-primary addi_butn']) ?>
        </div>

<?php ActiveForm::end(); ?>

    </div>
</div>

<script>
    function myremovefunction(id) {
        $.ajax({
            url: 'bankdelete',
            data: {id: id},
            success: function (data) {
                window.location.reload();
            },
        });
    }

</script>
