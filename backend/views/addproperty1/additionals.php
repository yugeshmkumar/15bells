<?php

use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

if (isset($_GET['idm'])) {
            $modelid = $_GET['idm'];
        } else {
            $modelid = '';
        }
$property = \common\models\SellorExpectations::find()->where(['property_id'=>$modelid])->andwhere(['user_type'=>'sellor'])->one();
$lessorid = $property->id;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<style>

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
	.locat_hed{
		background:#ffffff !important;
		margin:0 !important;
		padding:3px;
	}
	.locat_hed h3{
		margin-top:5px !important;
		color:#000000 !important;
	}
	.for_sal{
		padding-top:10px !important;
	}
	.contnt_detl{
		width:100%;
		float:left;
	}
	.control-label{
		color:#ffffff !important;
	}
	.btn-info {
    color: #fff !important;
    background-color: #e5ac31 !important;
    border-color: #e5ac31 !important;
}
</style>
<!-- BEGIN PAGE BAR 
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Seller</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Upload Documents</span>
        </li>
    </ul>

</div>-->
<!-- END PAGE BAR -->
<!-- BEGIN : STEPS -->
<div class="col-md-9">
<div class="row">
    <div class="col-md-12">
        <div class="portlet portlet-fit ">
        

            <div class="portlet-body">
                <div class="mt-element-step">

    <div class="row step-thin">
       <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/update','id'=>$modelid]) ?>">

            <div class="col-md-4 bg-grey mt-step-col sell_add">
                <div class="bg-white font-grey add_no">1</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="4dp">BASIC DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
            </div></a>
        
        <a href="<?php echo Yii::$app->urlManager->createUrl(['sellor-expectations/updates','id'=>$lessorid]) ?>">
 
            <div class="col-md-4 bg-grey mt-step-col sell_add">
               <div class="bg-white font-grey add_no">2</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">Expectations</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
        <a href="<?php echo Yii::$app->urlManager->createUrl(['addproperty/additionals']) ?>">
            <div class="col-md-4 bg-grey mt-step-col active sell_add">
                <div class="bg-white font-grey add_no">3</div>
                <div class="mt-step-title uppercase font-grey-cascade add_det"><font size="3dp">ADDITIONAL DETAILS</font></div>
                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
            </div>
        </a>
        

    </div>
    <br/>
    <br/>

</div>


<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>
               <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-plus font-blue"></i>
                    <span class="caption-subject font-green bold uppercase" style="color:#ffffff !important;font-size:20px !important;">UPLOAD DOCUMENTS</span>
                </div>
				</div> 
			
		<div class="row" style="background:rgba(255,255,255,0.25);border-top:3px solid #e5ac31;padding:20px;margin:0 !important;">
                <div class="form-group form-md-checkboxes has-success">

                    <label class="col-md-3 control-label" for="form_control_1">UPLOAD IMAGE</label>
                    <div class="col-md-9">

                        <?php
                        
                        echo $form->field($model, 'featured_image')->widget(FileInput::classname(), [
                            'options' => ['accept' => 'image/*'],
                        ])->label(false);
                        ?>
                        
                    </div>
                   
                </div>
                 
               <div class="form-group form-md-checkboxes has-success">

                    <label class="col-md-3 control-label" for="form_control_1">UPLOAD VIDEO</label>
                    <div class="col-md-9">

                        <?php
                        
                        echo $form->field($model, 'featured_video')->widget(FileInput::classname(), [
                            'options' => ['accept' => 'video/*'],
                        ])->label(false);
                        ?>
                        
                    </div>
                   
                </div>
                <div class="form-group form-md-checkboxes has-success">

                    <label class="col-md-3 control-label" for="form_control_1"> UPLOAD THUMBNAILS</label>
                    <div class="col-md-9">

                        <?php
                        
                            if(isset($_GET['idm'])){
                            $idl = $_GET['idm'];
                            }else{
                             $idl = '';   
                            }
                        echo FileInput::widget([
                            //'model' => $model,
                            'name' => 'featured_thumbnails_id',
                            'id' => 'featured_thumbnails_id',
                            'options' => ['multiple' => true],
                            'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => Url::to(['/addproperty/fileuploads?ids=' . $idl . '']),]
                        ]);
                        ?>

                    </div>
                </div>
				<div class="col-md-12 text-center" style="padding:20px 0 5px 0;">
					<a class="btn btn-info"  href="<?php echo Yii::$app->urlManager->createUrl(['/site/userdash']) ?>" ><i class="fa fa-share"></i> Go To Dashboard</a>


					 <a class="btn btn-info"  href="<?php echo Yii::$app->urlManager->createUrl(['/addproperty/views', 'id' => $modelid]) ?>" ><i class="fa fa-share"></i> View Property</a>

					</div>
			</div>
            </div>
        </div>





        <!-- END FORM-->
        <!-- END FORM-->

        <!-- end form -->

    </div>

    <?php
    $getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
    if ($getprofilestatus) {
        $count = $getprofilestatus->process_status;
    } else {
        $count = 0;
    }
    ?>

</div>
<!-- END : STEPS -->
</div>

</div>
<!-- END CONTENT BODY -->
<?php ActiveForm::end(); ?>
