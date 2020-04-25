<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DateTimePicker;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\VrSetup */
/* @var $form yii\widgets\ActiveForm */

$auctiontype = $model->auction_type;
?>

<div class="vr-setup-form">
 
                                    
 <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-speech"></i>
                                        <span class="caption-subject bold uppercase"> Setup VR Room</span>
                                        <span class="caption-helper">...</span>
                                    </div>
                                   <div class="actions">
								   <a href="<?php echo Yii::$app->urlManager->createUrl(['/vr-setup/index']) ?>" target="_blank" class="btn btn-primary">View Details</a>
								   </div>
                                </div>
                              
								<div class="mt-element-step">
                                       
<div class="row step-no-background-thin">
                                          
                                            <div class="col-md-4 mt-step-col active">
                                                <div class="mt-step-number font-grey-cascade">1</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Setup Moderator</div>
                                                <div class="mt-step-content font-grey-cascade">Time Settings</div>
                                            </div>

                                            <?php 
                                            if($auctiontype == 'forward_auction'){
                                            ?>
                                            <div class="col-md-4 mt-step-col">
                                                <div class="mt-step-number bg-white font-grey">2</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Setup Buyers/Lesse</div>
                                                <div class="mt-step-content font-grey-cascade">Setup Buyers/Lesse</div>
                                            </div>

                                            <?php 
                                            } else {
                                            ?>

                                                <div class="col-md-4 mt-step-col">
                                                <div class="mt-step-number bg-white font-grey">2</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Setup Lessors/Lessee</div>
                                                <div class="mt-step-content font-grey-cascade">Setup Lessors/Lessee</div>
                                            </div>

                                            <?php 
                                            }
                                            ?>
                                            <div class="col-md-4 mt-step-col">
                                                <div class="mt-step-number bg-white font-grey">3</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Publish Auction</div>
                                                <div class="mt-step-content font-grey-cascade">Publish Auction</div>
                                             </div>
                                           </div> 
                                        </div>
										  <div class="portlet-body">
										  <div class="note note-info"> Setup VR Room </div>
    <?php $form = ActiveForm::begin(); ?>
<div class="row"><div class="col-md-5">
    <?= $form->field($model, 'auction_type')->dropDownList([ 'forward_auction' => 'Forward auction', 'reverse_auction' => 'Reverse auction','instant'=>'Instant' ], ['prompt' => 'Select..']) ?>
</div><div class="col-md-5">
<?= $form->field($model, 'name')->textInput() ?>
    
</div></div>
    <div class="row"><div class="col-md-5">
   
    <?= $form->field($model, 'fromdatetime')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter Start Date Time ...','id'=>'fromdatetime'],
	'pluginOptions' => [
		'autoclose' => true
	]
]); ?>

</div><div class="col-md-5">
    <?= $form->field($model, 'todatetime')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter End Date Time ...','id'=>'todatetime','onChange'=>'inputvaluetwo(this.value)'],
	
	'name'=>'todatetime',
	'pluginOptions' => [
		'autoclose' => true
	]
]);  ?>
<input type="hidden" id="fromandto" name="fromandto" >
	</div></div>
<div class="row">
    <div class="col-md-5">
<?= $form->field($model, 'Emd_amount')->textInput() ?>
    
</div>

<div class="col-md-5">
<?= $form->field($model, 'favour_of')->textInput(['value'=>'Stoneray technologies pvt ltd']) ?>
    
</div>
</div>


<div class="row">
    <div class="col-md-10">
<?= $form->field($model, 'reserved_price')->textInput() ?>
    
</div>

</div>



<div class="row"><div class="col-md-10">

         <?php
$location = 'Gurgaon';
$salestype = 'moderator';

$employecount = \Yii::$app->db->createCommand("SELECT count(*) from company_emp where name='$salestype' and location='$location'")->queryAll();
$findcsr = \Yii::$app->db->createCommand("SELECT * from company_emp where name='$salestype' and location='$location' order by alloted asc limit 1")->queryOne();
$findcsrst = \Yii::$app->db->createCommand("SELECT * from company_emp where name='$salestype' and location='$location' order by alloted desc limit 1")->queryOne(); 
           $count = $employecount['0']['count(*)'];

            $getallot = $findcsrst['alloted'];
            
            
            
           
            if($getallot == $count){
            
            
$givezero = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => '0'],'name = "'.$salestype.'" AND location="'.$location.'"')->execute();            
            
            $findcsrs = \Yii::$app->db->createCommand("SELECT * from company_emp where name='$salestype' and location='$location' order by alloted asc limit 1")->queryOne();  
$findcsrsd = \Yii::$app->db->createCommand("SELECT * from company_emp where name='$salestype' and location='$location' order by alloted desc limit 1")->queryOne();            
            $getallots = $findcsrsd['alloted'];
            $newid = $findcsrs['userid'];
            $counters = $getallots + 1;
            
           
$update = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => $counters],'id = "'.$newid.'"')->execute();
            
       

            }else{
            
            $counter = $getallot + 1;
            $newid = $findcsr['userid']; 

       $updates = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => $counter],'id = "'.$newid.'"')->execute();

          
            }
?>



	  <?php $arrgetemployee = \common\models\CompanyEmpb::find()->where(['isactive'=>1,'employee_typeID'=>1])->all();

	          $listemployee = ArrayHelper::map($arrgetemployee ,'id','name'); ?>


	  <?= $form->field($model, 'moderatorID')->widget(Select2::classname(), [
    'data' => [$newid => "Moderator($newid)"],
	// 'type'=>DepDrop::TYPE_SELECT2,
    'options' => ['placeholder' => 'Select...','id'=>'moderatorID'],
  
	  'pluginOptions' => [
	 'placeholder' => 'Select...',
      'allowClear' => true,
	 //'depends'=>['fromandto'],
     //  'url'=>Url::to(['/site/subcatparentxx']),
	   //'initialize'=>true
         ],
]); ?></div></div>





	<div class="row" id="auctionprop">
    <div class="col-md-10">
    <?php 

    $arrgetproperty = \common\models\Addpropertyforbid::find()->where(['is_active'=>"1",'status'=>"approved",'request_for'=>"bid"])->all();


    $listproperty = ArrayHelper::map($arrgetproperty ,'id','id'); 


    ?>

	  <?= $form->field($model, 'propertyID')->widget(Select2::classname(), [
    'data' => $listproperty,
	
    'options' => ['placeholder' => 'Select Property.','id' => 'vrpropselect'],
    'pluginOptions' => [
         'allowClear' => true
    ],
]); ?>





	</div>
    </div>



    <div class="row" id="auctionuser">
    <div class="col-md-10">
    <?php 


     $arrgetuser = \common\models\User::find()->where(['status'=>"1"])->all();

    $listuser = ArrayHelper::map($arrgetuser ,'id','fullname'); 


    ?>

	  <?= $form->field($model, 'brandID')->widget(Select2::classname(), [
    'data' => $listuser,
	
    'options' => ['placeholder' => 'Select Brand','id' => 'vruserselect'],
    'pluginOptions' => [
         'allowClear' => true
    ],
]); ?>



	</div>
    </div>
  

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<i class="fa fa-check"></i> Save') : Yii::t('app', '<i class="fa fa-check"></i> Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    </div></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
    var auctiontype = $('#vrsetup-auction_type').val();
if(auctiontype == 'forward_auction'){

    $('#auctionprop').show();
    $('#auctionuser').hide();

}else if(auctiontype == 'reverse_auction'){
    
    $('#auctionuser').show();
    $('#auctionprop').hide();

}else {

    $('#auctionprop').show();
     $('#auctionuser').show();
}
});



$('#vrsetup-auction_type').change(function(){
   if(this.value == 'forward_auction'){
       $('#auctionprop').show();
       $('#auctionuser').hide();
   }

  else if(this.value == 'reverse_auction'){
      $('#auctionprop').show();
      $('#auctionuser').show();
   }
else{

       $('#auctionprop').show();
       $('#auctionuser').show();

    }

});

function inputvaluetwo(str)

{                           
                           var str1 = $('#fromdatetime').val();
                           var str2 = "and";
                       var res =  str1.concat(str2).concat(str);
		$('#fromandto').val(res);
		if (jQuery('#moderatorID').data('depdrop')) { jQuery('#moderatorID').depdrop('destroy'); }
jQuery('#moderatorID').depdrop(depdrop_ed46033e);

if (jQuery('#moderatorID').data('select2')) { jQuery('#moderatorID').select2('destroy'); }
jQuery.when(jQuery('#moderatorID').select2(select2_66b20cc8)).done(initS2Loading('moderatorID','s2options_d6851687'));

initDepdropS2('moderatorID','Loading ...');
//if (jQuery('#vrsetup-propertyid').data('select2')) { jQuery('#vrsetup-propertyid').select2('destroy'); }
jQuery.when(jQuery('#moderatorID').select2(select2_4c291099)).done(initS2Loading('moderatorID','s2options_d6851687'));
}

</script>


