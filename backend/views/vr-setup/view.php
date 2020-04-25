<?php

use yii\widgets\DetailView;

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
                                          
                                            <div class="col-md-4 mt-step-col done">
                                                <div class="mt-step-number font-grey-cascade">1</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Setup Moderator</div>
                                                <div class="mt-step-content font-grey-cascade">Time Settings [100%]</div>
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
                                        </div> </div>
										  <div class="portlet-body">
										  <div class="vr-setup-view"><p>
  <a href="<?php echo Yii::$app->urlManager->createUrl(['/vr-setup/update?id='.$_GET['id'].'']) ?>"  class="btn btn-primary"><i class="fa fa-mail-reply"></i> Back to Details</a></p>
 							   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			'name',
            'auction_type',
            'propertyID',
            ['attribute'=>'propertyID',
			'value'=>function($data){
				return \common\models\Addproperty::findOne($data->propertyID)->project_name;
            }],
            
            ['attribute'=>'propertyID',
            'label'=>'Owner email id',
			'value'=>function($data){
                if($data->auction_type == 'forward_auction'){
                $user_id =   \common\models\Addproperty::findOne(['id'=>$data->propertyID])->user_id;
                 return  \common\models\User::findOne($user_id)->email;
              }else{
                return  \common\models\User::findOne($data->brandID)->email;
              }
            }],
            
			 ['attribute'=>'moderatorID',
			'value'=>function($data){
				return \common\models\CompanyEmpb::findOne($data->moderatorID)->name;
			}],
           
            'fromdatetime',
            'todatetime',
            'status',
            
        ],
    ]) ?>

</div> <?php $form = ActiveForm::begin(); ?>
    <div class="note note-info"> Interested Buyers </div>
    <div class="table-scrollable">
    <table class="table table-hover">
    <thead>
    <tr>
    <th> # </th>
    <th> First Name </th>
    <th> Last Name </th>
    <th> E-mail </th>
    <th> Action </th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $vrsetup = \common\models\VrSetup::find()->where(['id'=>$_GET['id']])->one();
    
     if($auctiontype == 'forward_auction'){        
    $arrgetbuyers = \common\models\RequestedBidingUsers::find()->where(['propertyID'=>$vrsetup->propertyID,'isactive'=>1])->all();
    }else{
    $arrgetbuyers = \common\models\RequestedBidingUsers::find()->where(['propertyID'=>$vrsetup->brandID,'town_name'=>$vrsetup->town_name,'sector_name'=>$vrsetup->sector_name,'isactive'=>1,'request_for'=>'reverse'])->all(); 
    }
    
    ?>
    
    <?php foreach($arrgetbuyers as $getbuyers) {
    $findmyprofile = \common\models\Myprofile::find()->where(['userID'=>$getbuyers->userid])->one();
    ?>
    <tr>
    <td> <input type="checkbox" id="selectedbyr<?php echo $getbuyers->id ?>" name="selectedbyr<?php echo $getbuyers->id ?>" value="<?php echo $getbuyers->userid ?>" checked> </td>
    <td><?php if($findmyprofile) { ?><?php echo $findmyprofile->first_name ?><?php } ?> </td>
    <td><?php if($findmyprofile) { ?><?php echo $findmyprofile->last_name ?><?php } ?> </td>
    <td><?php echo \common\models\User::findOne($getbuyers->userid)->email ?></td>
    <td>
    <span class="label label-sm label-success"><i class="fa fa-mail-forward"></i> View Details</span>
    </td>
    </tr>
    <?php } ?>
    </tbody></table></div>
    <div class="note note-info"> Setup More Buyers </div>

    <?php 
    //   $arrfindusers = \common\models\User::find()
    //  ->join('LEFT JOIN','myprofile','myprofile.userID = user.id')
    //  ->where('myprofile.isactive =:active',array(':active'=>1))
    //  ->all();
    $arrfindusers = \common\models\User::find()
    // ->join('LEFT JOIN','myprofile','myprofile.userID = user.id')
    ->where('status =:active',array(':active'=>1))
    ->andwhere('email <> :actives',array(':actives'=>''))
    ->all();
    $data = yii\helpers\ArrayHelper::map($arrfindusers,'id','email');
    ?>
    <?php echo '<label class="control-label">Select E-mail Addresses </label>';
echo Select2::widget([
    'name' => 'usersbuyers',
	'id'=>'usersbuyers',
    'data' => $data,
    'options' => [
        'placeholder' => 'Select E-mail ...',
        'multiple' => true
    ],
]);?>
	<br/>											 
   <div class="form-group"><button type="submit" name="savebuyers" id="savebuyers" class="btn btn-primary"> <i class="fa fa-check"></i> Submit</button>
   </div>
    </div></div> <?php ActiveForm::end(); ?>
</div>
<script>
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


