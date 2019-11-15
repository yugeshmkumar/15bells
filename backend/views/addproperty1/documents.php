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
        } else {
            $modelid = '';
        }

?>

                   
  <?php
//  $arrfindmykyc = \common\models\UserKycdocuments::find()->where(['userid'=>Yii::$app->user->identity->id])->all();
  $arrfindmykyc = \common\models\MediaFilesConfig::find()->where(['property_id'=>$modelid])->all();

					?>
									 <?php $form = ActiveForm::begin([
                'id'=>'ibforms',    
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
 <div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption"><i class="fa fa-check"></i>My Uploaded Documents
							</div>	</div>
							 <div class="portlet-body form">
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
                                                
                                                <?php $filename =  \common\models\MediaFiles::findOne($findmykyc->media_id)->file_descr; 
                                                $filename1 =  \common\models\MediaFiles::findOne($findmykyc->media_id)->file_name; 
                                                        
                                                 ?>
                                                <tr>
                                                    <td> <?php echo $temp ?> </td>
                                                    <td><?php echo $filename ?> </td>
                                                    <td><a onclick="downloadfileconfig('<?php echo $filename1 ?>')"><i class="fa fa-download"></i> Click to download</a> </td>
                                                
												 <td>
                                                        <span class="label label-sm label-warning"><?php echo $findmykyc->status; ?> </span>
                                                    </td>
												
                                                </tr>
                                               <?php } ?>
                                            </tbody>
                                        </table>
                                       
                                        
                                      <?php ActiveForm::end(); ?>
                                </div> </div> </div>

   <?php $form = ActiveForm::begin([
                'id'=>'ibforms',    
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
	
	
	
	
	
	 
	
	 
	 
	<font style="font-weight:800;">Upload Documents</font>
	
	<div style="padding-top:6px; padding-bottom:6px;"></div>
	
	
	
	  
	  
	
	
	   <div style="padding-top:10px; padding-bottom:10px;">
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
   
<td><div style="display:none;"><input type="checkbox"  name="supportchkir[]" checked id="supportchkir"  value="1"></div><input type="text" name="documentDescription1" id="documentDescription1" placeholder="Enter File Name.." class="form-control"  required />
 
</td>
	<td>

<div style="max-width:400px;">
<?php
echo FileInput::widget([
    'name' => 'documentfiles1',
	'id' => 'documentfiles1', 
    //'value' => date('d-M-Y', strtotime('+2 days')),
     'options' => ['multiple' => false, 'accept' => 'image/*'  ],
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
jQuery('a.add-author').click(function(event){
    event.preventDefault();
    counter++;
    var newRow = jQuery('<tr><td><div style="display:none;"><input type="checkbox"  name="supportchkir[]" checked id="supportchkir"  value="'+counter+'"></div><input type="text" placeholder="Enter File Name.."  name="documentDescription' +
        counter + '" class="form-control"/></td><td><input type="file" id="documentfiles' +
        counter + '" class="file-loading" name="documentfiles' +
        counter + '" accept="image/*" data-krajee-fileinput="fileinput_21cd8055"></td></tr>');
		
       jQuery('table.table-bordered').append(newRow);
	   jQuery('#documentfiles' + counter + '').fileinput(fileinput_21cd8055);
        
	
});
</script>

<script>
function myfunction(str){
	
}
</script>

<div class="form-group">
 <br/>
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
			

   <a class="btn btn-info"  href="<?php echo Yii::$app->urlManager->createUrl(['/site/userdash']) ?>" ><i class="fa fa-share"></i> Go To Dashboard</a>


 <a class="btn btn-info"  href="<?php echo Yii::$app->urlManager->createUrl(['/addproperty/view', 'id' => $modelid]) ?>" ><i class="fa fa-share"></i> View Property</a>
                                       
	</div>
<?php ActiveForm::end(); ?>
</div>

       </div> 
							
							
						                                          


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
 
		




 
    

    

   

   

    

    

   

   

   


 




   

    

   
