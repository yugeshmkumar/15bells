<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$userid = Yii::$app->user->identity->id;
?>
<style type="text/css">
    .add_managed_proper_div{
        padding: 0;
        border: 0px !important;
        border-left: 0px !important;
        background-color: transparent;
    }
    .caption{
        font-size: 26px !important;
        color: #fff !important;
        font-weight: 600;
        text-transform: uppercase;
        font-family: 'Roboto', sans-serif;
        padding: 20px 0 0 0 !important;
    }
    .portlet>.portlet-title {
        border-bottom: 0px solid #e5ac31;
    }
    .bank_deatils_body_div{
        background-color: rgba(255, 255, 255, 0.25);
        border-top: 3px solid #e5ac31;
    }
    .bank_deatils_body_div h4{
        background-color: #fff;
        margin: 10px 10px;
        padding: 10px;
        color: #000;
    }
    .portlet.light.bordered {
        background-color: rgba(255, 255, 255, 0.25);
        padding: 0px;
        border: 0px !important;
    }
    .portlet-title{
        padding: 10px !important;
        border: 0px !important;
    }
    .portlet-title .second_caption{
        background-color: #fff;
        width: 100%;
        color: #000 !important;
        float: left;
        padding: 10px !important;
    }
    .form-body .form-group label{
        color: #fff !important;
        font-size: 15px;
        font-weight: 600;
    }
    .form-group .field-bank-account_type select{
        padding: 0px 10px !important;
    }
    .form-body .form-control{
        border: 1px solid #fff !important;
        border-radius: 10px !important;
        background-color: #fff !important;
        box-shadow: 0px 0px 3px #fff !important;
        padding: 10px !important;
        border-bottom:0px !important;
    }
    .submit_btn_div_bank_detail{
        padding-top: 40px;
    }
    .submit_btn_div_bank_detail .btn-block{
        background-color: #002157;
        border: 0px;
        padding: 10px;
        width: 100px;
        border-radius: 7px !important;
    }
    .text_bottom_bank_detail{
        color: #fff;
        padding: 20px !important; 
    }
    .text_bottom_bank_detail a{
        color:#fff;
        text-decoration: none;
    }
</style>
<div class="col-md-9 col-md-8">


    <div class="portlet add_managed_proper_div">
        <div class="portlet-title">
            <div class="caption" style="margin-left: -10px;">
                <!-- <i class="fa fa-bank font-blue"></i> -->
                <span class="caption-subject bold uppercase"> Bank Details</span>
            </div> </div>
        <div class="portlet-body form bank_deatils_body_div">
               <h4> <!-- <i class="fa fa-check"></i>  -->My Saved Banks.. </h4>
            <div class="form-body">
                <div class="panel-group accordion scrollable" id="accordion2">
                    <?php
                    $arrgetbank = \common\models\activemode::findmybank($userid);
                    $temp = 0;
                    foreach ($arrgetbank as $getbank) {
                        $fourfirstdigits = mb_substr($getbank->account_no, 0, 4);
                        $fourlasttdigits = mb_substr($getbank->account_no, -4);
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_<?php echo $getbank->id ?>"> <?php echo $getbank->bank_name ?>- <?php echo $fourfirstdigits ?>-XXXX-XXXX-<?php echo $fourlasttdigits ?> </a>
                                </h4>
                            </div>
                            <div id="collapse_2_<?php echo $getbank->id ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p align="right" > <a href="" onclick="myremovefunction('<?php echo $getbank->id ?>')"><font color="black"><b>Click to Remove</b></font></a></p>
                                    <p><div class="table-scrollable">
                                        <table class="table table-hover">
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
                        <?php } ?>
                    </div>  </div> 
            </div>

            </form>
        </div> 
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption second_caption">
                    <!-- <i class="icon-plus font-blue"></i> -->
                    <span class="caption-subject bold uppercase"> Add Bank Details</span>
                </div>
                <div class="actions">
                    <div class="btn-group">



                    </div>
                </div>
                <div class="portlet-body form">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="form-body">
                        <h3></h3>
                        <div class="form-group form-md-line-input">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="form-group form-md-line-input has-success">
                                        <label for="form_control_1">BANK NAME</label>
                                        <?= $form->field($model, 'bank_name')->textInput(['class' => 'form-control'])->label(false); ?>
                                        <span class="help-block">Bank Name goes here...</span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="form-group form-md-line-input has-success">
                                        <label for="form_control_1">BANK ACCOUNT NO.</label>
                                        <?= $form->field($model, 'account_no')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false); ?>
                                        <span class="help-block">Bank Account No. goes here...</span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="form-group form-md-line-input has-success">                                              
                                        <label for="form_control_1">IFSC CODE</label>                                                
                                        <?= $form->field($model, 'isfc_code')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false); ?> 
                                        <span class="help-block">Isfc Code goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <h3></h3>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="form-group form-md-line-input has-success">                                           
                                        <label for="form_control_1">ZIP CODE</label>
                                        <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false); ?>
                                        <span class="help-block">Zip Code goes here...</span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="form-group form-md-line-input  has-success">                                               
                                        <label for="form_control_1">ACCOUNT TYPE.</label>
                                        <?= $form->field($model, 'account_type')->dropDownList(['Savings' => 'Savings', 'Current' => 'Current', 'salary' => 'Salary', 'escrow' => 'Escrow', 'business' => 'Business'], ['prompt' => '', 'class' => 'form-control'])->label(false); ?>
                                        <span class="help-block">Account type. goes here...</span>
                                    </div>   
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="form-group form-md-line-input  has-success">                                             
                                        <label for="form_control_1">BRANCH NAME</label>
                                        <?= $form->field($model, 'branch_name')->textInput(['class' => 'form-control'])->label(false) ?>
                                        <span class="help-block">Branch Name goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <h3></h3>

                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="form-group form-md-line-input has-success">                                                  
                                    <label for="form_control_1">BANK ACCOUNT NAME</label>
                                    <?= $form->field($model, 'bank_accnt_name')->textInput(['class' => 'form-control'])->label(false) ?>
                                    <span class="help-block">Bank Account Name goes here...</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-1 text-center">                                                
                                <div class="form-group submit_btn_div_bank_detail">
                                    <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn-block btn-success' : 'btn btn-primary']) ?>
                                </div> 
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>


                </div>

            </div> 
        </div>

        <div class="portlet light bordered">
            <div class="portlet-body form">

                <div class="form-body text_bottom_bank_detail">
                    <h4> We'll save this card for faster transactions in future.</h4>
                    <h5> At any point of time , if you want to remove the card ,please go to <a>Home</a> > <a>Settings</a><h5>

                            </div>


                            </div> 
                            </div>



                            </div><?php
                            $getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
                            if ($getprofilestatus) {
                                $count = $getprofilestatus->process_status;
                            } else {
                                $count = 0;
                            }
                            ?>



                            </div>
