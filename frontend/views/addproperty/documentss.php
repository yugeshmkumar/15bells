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

if (isset($_GET['id'])) {
    $modelid = $_GET['id'];

    
                        
                        $mainimage = \common\models\Addproperty::find()->where(['id'=>$modelid])->one();

                        $status = $mainimage->status;
}

$property = \common\models\SellorExpectations::find()->where(['property_id' => $modelid])->andwhere(['user_type' => 'sellor'])->one();

if ($property) {
    $lessorid = $property->id;
} else {
    $lessorid = '';
}
?>


<?php
//  $arrfindmykyc = \common\models\UserKycdocuments::find()->where(['userid'=>Yii::$app->user->identity->id])->all();
$arrfindmykyc = \common\models\MediaFilesConfig::find()->where(['property_id' => $modelid])->all();
// echo '<pre>'; print_r($arrfindmykyc);die;
?>
<?php
$form = ActiveForm::begin([
            'id' => 'ibforms',
            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>
<style>
.progress{
	display:none;
} 

</style>
<div class="col-md-12">

	<input id="propid" type="hidden" value="<?php echo $modelid; ?>">
<div class="mt-element-step">

    <div class="row step-thin m-0">
        <a class="col-md-3 othr_tab bordr_rds" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinsellor', 'id' => $modelid]) ?>">
            <div class="bg-grey mt-step-col active sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>BASIC DETAILS</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a>

<!--<a href="<? //php echo Yii::$app->urlManager->createUrl(['lessor-expectations/create'])  ?>">-->
        <a class="col-md-3 othr_tab" href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/updateinsellor', 'id' => $lessorid]) ?>" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>Expectations</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
        <!--<a href="<? //php echo Yii::$app->urlManager->createUrl(['addproperty/additional'])  ?>">-->
        <a class="col-md-3 othr_tab" href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/additionals', 'idm' => $modelid]) ?>" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>ADDITIONAL DETAILS</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
        <a class="col-md-3 active_tab no_bordr bordr_rds_rt" href="#" style="cursor:default !important;">
            <div class="bg-grey mt-step-col sell_add">
                <div class="mt-step-title uppercase font-grey-cascade add_det"><span>DOCUMENTS UPLOAD</span></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>


    </div>
    <br/>
    <br/>

</div>

	
<?php
if (!empty($arrfindmykyc)) {
    ?> 

        <div class="portlet docum_ents sellr_proprty mb-4">
            <div class="portlet-title">
                
				 <div class="caption add_prprt">
						<span class="exp_name"> My Documents</span></div>
            </div>
            <div class="portlet-body form">
                <div class="table-scrollable">
                    <table class="table table-hover">
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
        
        ?> 

                                <?php
                                $pictogramsID = \common\models\MediaFiles::findOne($findmykyc->media_id);
                                $type1 = $pictogramsID->type;
                                $filename = $pictogramsID->file_descr;
                                $filename1 = $pictogramsID->file_name;
                                
                                $id1 = $pictogramsID->id;
                                $file_actual_name = $pictogramsID->file_actual_name;
                                if ($type1 != 'jpeg' && $type1 != 'jpg' && $type1 != 'png') {
                                    $temp++;
                                ?>
                                <tr>
                                    <td> <?php echo $temp ?> </td>
                                    <td><?php echo $filename ?> </td>
                                <?php if ($type1 != '') { ?>

                                

                                        <td><a onclick="downloadfileconfig('<?php echo $filename1 ?>')"><i class="fa fa-download"></i> <?php echo $file_actual_name; ?></a> </td>

                                    
                                        <?php   } else { ?>

                                        <!-- <td><div class="browse-wrap">
                                                <div class="title">Upload</div>

                                                <input id="avatar_<?php //echo $id1 ?>" class="upload" title="upload" onchange="uploadme(<?php //echo $id1 ?>)" type="file" name="avatar" />
                                            </div>
                                        </td> -->

        <?php } ?>

                                    <td>
                                        <span class="label label-sm label-warning"><?php echo $findmykyc->status; ?> </span>
                                    </td>

                                </tr>
    <?php } } ?>
                        </tbody>
                    </table>


    <?php ActiveForm::end(); ?>
                </div> 


            </div> </div>

<?php } ?>

<?php
$form = ActiveForm::begin([
            'id' => 'ibforms',
            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>








    <div class="row sellr_proprty">
        <div class="portlet-title documnt_up">
					<div class="caption add_prprt">
						<span class="exp_name"> My Documents</span></div>				
            </div>








        <div>
            <div style="border-top:1px dashed #dedede;"></div>
        </div>

        <table width="100%" border="0" cellpadding="0" cellspacing="0"> 	 

        </table>






        <table class="table table-striped table-bordered"><thead>
                <tr>

                    <th>Document Name</th>
                    <th>Documents</th>

                </tr>
            </thead>
            <tbody>


                <tr data-key="5">

                    <td>
                        <div style="display:none;">
                            <input type="checkbox"  name="supportchkir[]" checked id="supportchkir"  value="1">
                        </div>
                        <input type="text" name="documentDescription1" id="documentDescription1" placeholder="Enter File Name.." class="form-control"  required />

                    </td>
                    <td>

                        <div style="max-width:400px;">
<?php
echo FileInput::widget([
    'name' => 'documentfiles1',
    'id' => 'documentfiles1',
    //'value' => date('d-M-Y', strtotime('+2 days')),
   // 'onclick' => 'ga("send", "event", "Add property sellor creates documentss image", "Add property sellor creates documentss image", "Add property sellor creates documentss image","Add property sellor creates documentss image")',

    'options' => ['multiple' => false, 'accept' => 'pdf/*','class'=>'documentsfiles','onclick' => 'ga("send", "event", "Add property sellor creates documentss image", "Add property sellor creates documentss image", "Add property sellor creates documentss image","Add property sellor creates documentss image")'],
    'pluginOptions' => [
        'previewFileType' => false,
        'showUpload' => true,
        'maxFileSize'=>4800
    ]
]);
?>

                        </div>
                    </td>

                </tr>


            </tbody></table>
        <a href="#" title="" class="add-author" onclick="myfunction(1)"><button class="btn icon btn-info"><i class="fa fa-plus"></i></button> </a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script>
            var counter = 1;
            jQuery('a.add-author').click(function (event) {
                event.preventDefault();
                counter++;
                var newRow = jQuery('<tr><td><div style="display:none;"><input type="checkbox"  name="supportchkir[]" checked id="supportchkir"  value="' + counter + '">\n\
              </div><input type="text" placeholder="Enter File Name.." required  name="documentDescription' +
                        counter + '" class="form-control"/></td><td><input type="file" id="documentfiles' +
                        counter + '" class="file-loading" name="documentfiles' +
                        counter + '" accept="pdf/*" data-krajee-fileinput="fileinput_21cd8055"></td><td><a href="javascript:void(0)" onclick="removed('+counter+')" id="'+ counter +'" class="remove"><i class="fa fa-close"></i></a></td></tr>');

                jQuery('table.table-bordered').append(newRow);
                jQuery('#documentfiles' + counter + '').fileinput(fileinput_dd00e528);

// Remove element




            });

            function removed(id){
   
    $('#'+id).parent().parent().remove();
}    

        </script>

        <script>
            function myfunction(str) {

            }
        </script>

        <div class="col-md-12">
            <br/>
            <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

<?php  if($status == 'pending'){
                         ?>
            <a id="publish" type="button" onclick="publishprop(),ga('send', 'event', 'Addproperty lessor creates documentss publish button', 'Addproperty lessor creates documentss publish button', 'Addproperty lessor creates documentss publish button','Addproperty lessor creates documentss publish button');" class="btn btn-info addi_butn pub_documentss"  href="#" >Publish Property</a>
            <?php }else { ?>

                <a class="btn btn-info addi_butn "  href="#" >Pending for review</a>

            <?php } ?>

            <a class="btn btn-info addi_butn pub_viewproperty" onclick="publishprop(),ga('send', 'event', 'Addproperty sellor creates documentss viewproperty', 'Addproperty sellor creates documentss viewproperty', 'Addproperty sellor creates documentss viewproperty','Addproperty sellor creates documentss viewproperty');"  href="<?php echo Yii::$app->urlManager->createUrl(['/addproperty/views', 'id' => $modelid]) ?>" > View Property</a>

        </div>
<?php ActiveForm::end(); ?>
    </div>
</div>





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

        $('#filenamemain').val(str);
        $('#filedownload').trigger('click');
    }


    function uploadme(id) {

        var file_data = $("#avatar_" + id).prop("files")[0];
        // Getting the properties of file from file field
        var form_data = new FormData();                  // Creating object of FormData class
        form_data.append("file", file_data)              // Appending parameter named file with properties of file_field to form_data
        form_data.append("media_id", id)


        // Adding extra parameters to form_data
        $.ajax({
            url: "/addproperty/upload_avatar",
            // dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data, // Setting the data attribute of ajax with file_data
            type: 'post',
            success: function (data) {
                //console.log(data);
                // alert(data);    
                toastr.success('Document Uploaded Successfully', 'success');
                parent.location.reload();
            },

        });



    }



    function publishprop(){

var propid = $('#propid').val();           


$.ajax({

    type: "POST",
    url:  'getpropstatus',
    data:{propid: propid},
    success: function(data){

       
        if(data == '1'){
            $('#publish').html('Pending for Review');
            toastr.success('Your property is going for reviewed', 'success');

        }else{
            toastr.error('Internal Error', 'error');
        }
     

    },

});
}


</script>

<?php $form = ActiveForm::begin(array('id' => 'ibformnmsssocket')); ?>		
<input type="hidden" name="filenamemain" id="filenamemain" >
<input type="submit" name="filedownload" id="filedownload"  value="pdfss" style="display:none;"  > 
<?php $form = ActiveForm::end(); ?>

