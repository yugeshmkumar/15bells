<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\db\Query;
$urlsd =   Yii::getAlias('@backendUrl');

?>
<style>
.files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 50px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: " or drag it here. ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
}
</style>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>


<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>


            <div class="row">
                     <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
                <div class="col-md-12">
                
                  <div class="form-group files">
                    <?= $form->field($model,'file')->fileInput() ?>
                  </div>

                </div>
                
                <div class="form-group col-md-12">
                    <?= Html::submitButton('Save',['class'=>'btn btn-primary']) ?>
                </div>
            
            
                <?php ActiveForm::end(); ?>
            </div>
    </div>
           
        </div>
    </div>



<?php $form = ActiveForm::begin(); ?>

<?php 
$totalCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where primary_contact_no != "" and company_employee_id is NULL ')->queryScalar();      

?>
 <button type="button" class="btn btn-primary">Total Number of Properties Unassigned <span class="badge"> <?php echo $totalCount; ?></span></button>           
 <?= $form->field($model, 'getpropertycount')->textInput(['class' => 'form-control','id' => 'getcount'])?>



<input type="hidden" value="<?php echo $urlsd; ?>" id="backurl">
<?= $form->field($model1, 'lead_source')->checkboxList(['email' => 'Email', 'data' => 'Data', 'hoardings' => 'Hoardings','phone'=>'Phone','socialmedia'=>'Social Media']); ?>

<?php
$query1 = "select id,employee_email from company_emp where name='CSR Supply'";
$sql2 = \Yii::$app->db->createCommand($query1)->queryAll();
$last_names = array_column($sql2, 'employee_email', 'id');


?>



<?= $form->field($model1,'company_employee_id')->checkboxList($last_names) ?>

  <?= Html::Button('Assign CSR',['class'=>'btn btn-primary','id'=>'assign']) ?>

<?php ActiveForm::end(); ?>



    </div>
    </div>

<?php
$script = <<< JS
//var urlsd = "<?php echo $urlsd; ?>";
var urlsd = $('#backurl').val();

$('#assign').on('click',function(){
    var getcounts  = $('#getcount').val();
   
             var favorite = [];
            
             $.each($("input[name='AddpropertyOnepageForm[company_employee_id][]']:checked"), function(){            
                favorite.push($(this).val());              
                
              }); 
             // alert($.type(favorite));
              //console.log(favorite);

             var lead = $("input[name='AddpropertyOnepageForm[lead_source][]']:checked").val();
             var employee =  $.makeArray(favorite.join(", ")); 

             //console.log(JSON.stringify(favorite));

            // alert(typeof favorite );                    
              
   $.ajax({
        
        type: "POST",
        url: 'assigncsr',
        data: {lead: lead,employee:employee,getcounts:getcounts},
        success: function (data) {
            alert(data);
        // console.log(data);
         // console.log(data);
            if (data == 'done') {
                toastr.success('Assign Successfully', 'success');
               

                 window.setTimeout(function(){
                
                    window.location.href = urlsd +'/timeline-event/dashboard';

                }, 2000);

            }            
           
            else {
                toastr.error('Internal Error', 'error');
            }

        },
    });


});
JS;
$this->registerJs($script);
?>