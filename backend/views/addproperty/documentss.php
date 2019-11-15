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


if (isset($_GET['id'])) {
    $modelid = $_GET['id'];
} 

$property = \common\models\SellorExpectations::find()->where(['property_id'=>$modelid])->andwhere(['user_type'=>'sellor'])->one();

if($property){
   $lessorid = $property->id;
}else{
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
.table-hover > tbody > tr:hover{
	background:transparent !important;
}
    .docum_ents{
        background: rgba(255, 255, 255, 0.24);
        padding: 20px;
        border-top: 5px solid #e9b739;
    }
    .docum_ents .portlet-title{
        
    }
    table{
       
        background: rgba(255, 255, 255, 0.25) !important;
    }
    thead{
       
        background: rgba(255, 255, 255, 0.25) !important;
    }
    .documnt_up{
        padding: 10px;
        background: rgba(255, 255, 255, 0.99);
       
        margin:0 !important;
    }
    .table-striped > tbody > tr{
        background:transparent !important;
		text-align:center !important;
    }
    .form-control{
        border-radius:5px !important;
    }
    .btn-info{
        background:#e9b739 !important;
        border-color:#e9b739 !important;
    }
	div.browse-wrap {
        top:0;
        left:0;
        cursor:pointer;
        overflow:hidden;
        padding:3px;
        text-align:center;
        position:relative;
        background-color:#f6f7f8;
        border:solid 1px #d2d2d7;
		width:100px;
		}
    div.title {
        color:#3b5998;
        font-size:14px;
        font-weight:bold;
        font-family:tahoma, arial, sans-serif;}
    input.upload {
        right:0;
        margin:0;
        bottom:0;
        padding:0;
        opacity:0;
        height:300px;
        outline:none;
        cursor:inherit;
        position:absolute;
        font-size:1000px !important;}
    span.upload-path {
        text-align: center;
        margin:20px;
        display:block;
        font-size: 80%;
        color:#3b5998;
        font-weight:bold;
        font-family:tahoma, arial, sans-serif;
}
.label.label-sm {
    font-size: 13px;
    padding: 5px 25px 7px 25px !important;
    top: 4px;
    position: relative;
}
.sell_add{ 
		padding:0px !important;
		border-radius:10px !important; 
	}
	.sell_add .add_no{
		    font-size: 26px;
    border-radius: 10px 0 0 10px!important;
    float: left;
    margin: auto;
    padding: 3px 14px;
	border:1px solid !important;
	}
	.add_det{
		padding-top:5px !important;
	}
	.add_proprt{
		font-size:30px !important;
	}
</style>
<div class="col-md-12">
 	
<div class="mt-element-step">

    <div class="row step-thin text-center">
	
        <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/updateinsellor','id'=>$modelid]) ?>">
            <div class="col-md-3 bg-grey mt-step-col  sell_add">
                <div class="bg-white font-grey add_no">1</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="4dp">BASIC DETAILS</font></div>
            </div></a>
        
        <!--<a href="<?//php echo Yii::$app->urlManager->createUrl(['sellor-expectations/create']) ?>">-->
        <a href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/updateinsellor','id'=>$lessorid]) ?>">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                <div class="bg-white font-grey add_no">2</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">Expectations</font></div>
            </div>
        </a>
        <!--<a href="<?//php echo Yii::$app->urlManager->createUrl(['addproperty/additionals']) ?>">-->
        <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/additionals','idm'=>$modelid]) ?>">
            <div class="col-md-3 bg-grey mt-step-col sell_add">
                <div class="bg-white font-grey add_no">3</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">ADDITIONAL DETAILS</font></div>
            </div>
        </a>
      <a href="#" style="cursor:default !important;">
            <div class="col-md-3 bg-grey mt-step-col active sell_add">
                <div class="bg-white font-grey add_no">4</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">DOCUMENTS UPLOAD</font></div>
            </div>
        </a>
        

    </div>
    <br/>
    <br/>

</div>   
    <?php 
    if(!empty($arrfindmykyc)){
   
    ?> 

    <div class="portlet docum_ents">
        <div class="portlet-title">
            <div class="caption"><i class="fa fa-check" style="color:#fff !important;"></i>My Documents
            </div>	
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
    $temp++;
    ?> 

                            <?php
                            $filename = \common\models\MediaFiles::findOne($findmykyc->media_id)->file_descr;
                            $filename1 = \common\models\MediaFiles::findOne($findmykyc->media_id)->file_name;
                            $type1 = \common\models\MediaFiles::findOne($findmykyc->media_id)->type;
                            $id1 = \common\models\MediaFiles::findOne($findmykyc->media_id)->id;
                            $file_actual_name = \common\models\MediaFiles::findOne($findmykyc->media_id)->file_actual_name;
                            ?>
                            <tr>
                                <td> <?php echo $temp ?> </td>
                                <td><?php echo $filename ?> </td>
                                <?php if($type1 !=''){ ?>
                                
                            <td><a onclick="downloadfileconfig('<?php echo $filename1 ?>')"><i class="fa fa-download"></i> <?php echo $file_actual_name;  ?></a> </td>
    
                             <?php   } else{ ?>
                            
                                   <td><div class="browse-wrap">
										<div class="title">Upload</div>
										
										<input id="avatar_<?php echo $id1 ?>" class="upload" title="upload" onchange="uploadme(<?php echo $id1 ?>)" type="file" name="avatar" />
									</div>
									</td>
  
                              <?php } ?>

                                <td>
                                    <span class="label label-sm label-warning"><?php echo $findmykyc->status; ?> </span>
                                </td>

                            </tr>
<?php } ?>
                    </tbody>
                </table>


<?php ActiveForm::end(); ?>
            </div> 
        
        
        </div> </div>
    
    <?php  } ?>

<?php
$form = ActiveForm::begin([
            'id' => 'ibforms',
            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>








    <div class="row documnt_up">
        <font style="font-weight: 600;text-transform: uppercase;">Upload Documents</font>








        <div style="padding-top:4px; padding-bottom:10px;">
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
                                'options' => ['multiple' => false, 'accept' => 'image/*'],
                                'pluginOptions' => [
                                    'previewFileType' => false,
                                    'showUpload' => true,
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
              </div><input type="text" placeholder="Enter File Name.." required  name="documentDescription'  +
                        counter + '" class="form-control"/></td><td><input type="file" id="documentfiles' +
                        counter + '" class="file-loading" name="documentfiles' +
                        counter + '" accept="image/*" data-krajee-fileinput="fileinput_21cd8055"></td></tr>');

                jQuery('table.table-bordered').append(newRow);
                jQuery('#documentfiles' + counter + '').fileinput(fileinput_21cd8055);


            });
        </script>

        <script>
            function myfunction(str) {

            }
        </script>

        <div class="form-group">
            <br/>
            <!--<?//= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>-->


            <a class="btn btn-info"  href="<?php echo Yii::$app->urlManager->createUrl(['/site/userdash']) ?>" ><i class="fa fa-share"></i> Go To Dashboard</a>


            <a class="btn btn-info"  href="<?php echo Yii::$app->urlManager->createUrl(['/addproperty/views', 'id' => $modelid]) ?>" ><i class="fa fa-share"></i> View Property</a>

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
    
    
    function uploadme(id){
        
        var file_data = $("#avatar_"+id).prop("files")[0];        
                                                  // Getting the properties of file from file field
	var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("file", file_data)              // Appending parameter named file with properties of file_field to form_data
	form_data.append("media_id", id) 
         

                // Adding extra parameters to form_data
	$.ajax({
                url: "/frontend/web/index.php/addproperty/upload_avatar",
               // dataType: 'script',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
                success: function (data) {
                                         //console.log(data);
                                         // alert(data);    
                                                 toastr.success('Document Uploaded Successfully', 'success');
                                                  parent.location.reload();
                                                },

       });
     
        
        
    }
    
    
</script>

<?php $form = ActiveForm::begin(array('id' => 'ibformnmsssocket')); ?>		
<input type="hidden" name="filenamemain" id="filenamemain" >
<input type="submit" name="filedownload" id="filedownload"  value="pdfss" style="display:none;"  > 
<?php $form = ActiveForm::end(); ?>

