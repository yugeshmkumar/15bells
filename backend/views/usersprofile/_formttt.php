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

$userid = $_GET['id'];
//$emptypinfo = new Employeetype();

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>


                   
  <?php
  $arrfindmykyc = \common\models\UserKycdocuments::find()->where(['userid'=>$userid])->all();

						$getprofilestatus = \common\models\activemode::checkprofilestats($userid,"my_profile");
						if($getprofilestatus){$count = $getprofilestatus->process_status ;}
						else{$count = 0;}
						
						$getprofilestatus1 = \common\models\activemode::checkprofilestats($userid,"my_KYC_upload");
						if($getprofilestatus1){$count1 = $getprofilestatus1->process_status ;}
						else{$count1 = 0;}
						
  ?>
  
                    <!-- END PAGE BAR -->
					<br/>
				<div class="portlet light">
                             
									 <?php $form = ActiveForm::begin([
                'id'=>'ibforms',    
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
 
							<div class="portlet-title">
							<div style="padding-top:4px; padding-bottom:7px;">
<span><label>Total Number Of Documents Required :</label></span><span>
<input type="text" name="totnumber" readonly="true" id="reqtotnumber" class="form-control" value="<?php echo $totnumberofdocument ?>" onkeyup="removerequired()"  /></span>
<input type="hidden" name="dummytotnumber" id="reqdummytotnumber" class="form-control" value="<?php echo $totnumberofdocument ?>"  />

</div>
							<div class="caption"><i class="fa fa-check"></i>My Uploaded Documents
							</div>	</div>
							 <div class="portlet-body">
                                <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>My Document </th>
                                                    <th>Action </th>
                                                    <th> Approve Status </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php
											$temp=0;
											foreach($arrfindmykyc as $findmykyc){ $temp++; ?> 
                                                <tr>
                                                    <td> <?php echo $temp ?> </td>
                                                    <td><b><?php echo \common\models\Documenttype::findOne($findmykyc->document_name)->documentTypeName ?></b> </td>
                                                    <td><a onclick="downloadfileconfig('<?php echo $findmykyc->document_file_name_extenstn ?>')"><i class="fa fa-download"></i> Click to download</a> </td>
                                                 <?php if($findmykyc->approve_status !=1){ ?>
												 <td>
                                                        <span class="label label-sm label-warning"> Pending </span>
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
                                </div>

   <?php $form = ActiveForm::begin([
                'id'=>'ibforms',    
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
	
	
	 
	 <div class="col-md-12 upload_docm ">
	<p class="doc_tip"><font style="font-weight:600;"> <i class="fa fa-user user_ic"></i> Upload Documents</font></p>
	 </div>
	


<table class="table table-striped table-bordered"><thead>
<tr>
<th></th>
<th>Document Name</th>
<th>Documents</th>

</tr>
</thead>
<tbody>
    
    <?php $rk=0; foreach($busdocument as $busdocInfo){
		$rk++;
          $checkifdocsalreadyuploaded = \common\models\UserKycdocuments::find()->where(['userid'=>$userid,'document_name'=>$busdocInfo->documenttypeID,'isactive'=>1])->one();
		?>
    <?php if(!$checkifdocsalreadyuploaded) { ?>
<tr data-key="5">
    <td><input type="checkbox"  name="supportchkir[]" checked id="supportchkir"  value="<?php echo $rk ?>"   ></td>
<td><input type="hidden" name="documentDescription<?php echo $rk ?>" class="form-control reqme"  required value="<?php echo $busdocInfo->documenttypeID ?>"  />
    <input type="text" class="form-control reqme"   value="<?php echo $busdocInfo->documentTypeName ?>" readonly="true"  />
</td>
	<td>

<div style="max-width:400px;">
<?php
echo FileInput::widget([
    'name' => 'documentfiles'.$rk,
	'id' => 'documentfiles'.$rk, 
    //'value' => date('d-M-Y', strtotime('+2 days')),
     'options' => ['multiple' => false, 'accept' => 'image/*'  ,'class'=>'reqme'],
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
$checkifallareupload=\common\models\activemode::check_my_docs_upload_completion_status($userid);
				 if($checkifallareupload != 7){ ?>
   
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary btn_docs' : 'btn btn-primary btn_docs']) ?>
				 <?php } ?>
				
						
     
   <!--<a class="btn btn-info" data-toggle="modal" href="#static" ><i class="fa fa-share"></i> Next</a>-->
                                       
	</div>
	
<?php ActiveForm::end(); ?>

							
							<?php 
						$getprofilestatus = \common\models\activemode::checkprofilestats($userid,"my_profile");
						if($getprofilestatus){$count = $getprofilestatus->process_status ;}
						else{$count = 0;}
						?>
						                                          


<script>
function removerequired(){
var fst =$('#reqtotnumber').val();
var sec =$('#reqdummytotnumber').val();

if(fst!=sec){
var elementsd = document.getElementsByClassName("reqme");
for(var d=0; d<elementsd.length; d++) {
   elementsd[d].required = "";
}		
}

if(fst==sec){
var elementsd = document.getElementsByClassName("reqme");
for(var r=0; r<elementsd.length; r++) {
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
</script>

<?php  $form = ActiveForm::begin(array('id'=>'ibformnmsssocket')); ?>		
<input type="hidden" name="filenamemain" id="filenamemain" >
 <input type="submit" name="filedownload" id="filedownload"  value="pdfss" style="display:none;"  > 
 <?php $form = ActiveForm::end(); ?>
 
		

   


 </div> </div> </div>




   

    

   
