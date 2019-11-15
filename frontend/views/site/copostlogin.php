<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\bootstrap\Modal;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
//use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
$this->title = 'My Profile';
$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
$userprofile = \common\models\UserProfile::find()->where(['user_id' => $userid])->one();
$userprofileex = \common\models\UserProfileEx::find()->where(['user_id' => $userid])->one();
$myprofile = \common\models\Myprofile::find()->where(['userID' => $userid])->one();
//print_r($myprofile);die;
CrudAsset::register($this);
?>

<!-- start breadcrumb -->

<?php
Modal::begin([
"id" => "ajaxCrudModal",
"footer" => "", // always need it for jquery plugin
])
?>
<?php Modal::end(); ?>

<br/>
<?php
$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
if ($getprofilestatus) {
$count = $getprofilestatus->process_status;
} else {
$count = 0;
}

$getprofilestatus1 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_KYC_upload");
if ($getprofilestatus1) {
$count1 = $getprofilestatus1->process_status;
} else {
$count1 = 0;
}
?>
<style>
#thumbnail{
	width:100%;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit trans_prnt">
            <div class="portlet-body">
			  <div class="row">
                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div id="successMessage" class="alert alert-success alert-dismissable col-md-12">
                            <button aria-hidden="true" data-dismiss="alert" class="close" style="text-indent:initial !important;font-size:20px;opacity:1;"  type="button">×</button>
                            <h4><i class="icon fa fa-check"></i>Saved!</h4>
                            <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                
                <!-- end  upper section -->
                <!-- start MTPROFILE -->

                <div class="portlet light port_let" style="background: transparent !important;">
                    <div class="portlet-title tabbable-line tab_brdr">
                        
                        <ul class="nav nav-tabs pass_tb">
                            <li class="active bordr_a col-md-6 anchr_styl text-center">
                                <a class="nav_anchr" href="#tab_1_1" data-toggle="tab">Company Details</a>
                            </li>
                            <li class="col-md-6 bordr_b text-center anchr_styl">
                                <a class="nav_anchr" href="#tab_1_2" data-toggle="tab">Authorized User Details</a>
                            </li>




                        </ul>
                    </div>

                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- PERSONAL INFO TAB -->
                           
                            <!--start tab1 -->

                            <div class="tab-pane active user_particular" id="tab_1_1">
                                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'method' => 'post', 'id' => 'ibform']]); ?>


                                <?php

                              $Company_Subusers = \common\models\Company_Subusers_Record::find()->where(['subuser_id' => Yii::$app->user->identity->id])->one();

                              if($Company_Subusers){
                            $company = \common\models\Company::find()->where(['userid' => $Company_Subusers->master_id])->one();

                              }else{
                            $company = \common\models\Company::find()->where(['userid' => Yii::$app->user->identity->id])->one();
                              }    
                            ?>





                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 165px; height: 150px;">
                                                    <?php if ($company) { ?>
                                                    <?php if ($company->logo) { ?>
                                                    <img id="thumbnail" src="<?php echo Yii::getAlias('@archiveUrl'); ?>/mycompanylogo/<?php echo $company->logo ?>" style="width: 180px; height: 142px;" alt="" /> 

                                                    <?php } else { ?>
                                                    <img id="thumbnail" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+logo" alt="" /> 
                                                    <?php }
                                                    } else {
                                                    ?>
                                                    <img id="thumbnail" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+logo" alt="" /> 
                                                    <?php } ?></div>


                                                <div style="padding:0 0 20px 0;">
                                                    <span class="btn-file span_logo">
                                                        <span class="fileinput-new">  </span>

                                                        <label class="fileContainer"> 
                                                            <i class="fa fa-edit"></i> Edit logo
                                                            <input type="file" name="logo" id="logo" >
                                                        </label>
                                                    </span>
                                                </div></div></div></div><div class="col-md-6">




                                        <?php
                                        if ($company) {
                                        $modelco->name = $company->name;
                                        $modelco->person_name = $company->person_name;
                                        //  $modelco->description = $company->description;
                                        $modelco->PAN_card_no = $company->PAN_card_no;
                                        $modelco->COI_number = $company->COI_number;
                                        $modelco->main_email = $company->main_email;
                                        $modelco->main_mobile = $company->main_mobile;
                                        $modelco->country = $company->country;
                                        $modelco->location = $company->location;
                                        $modelco->state = $company->state;
                                        $modelco->city = $company->city;
                                        $modelco->main_address = $company->main_address;
                                        }
                                        ?>
                                        <div class="col-md-12 addres padding_cont">
                                            <?= $form->field($modelco, 'name')->textInput(['disabled' => true,'class' => 'one_inpt form-control','placeholder' => "Company name*"])->label(false) ?>
                                        </div>
                                        <div class="col-md-12 addres padding_cont">
                                            <?= $form->field($modelco, 'person_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "Contact person name*"])->label(false) ?>
                                        </div>

                                    </div></div>
                                <div class="row">
                                    <div class="col-md-6 addres padding_cont">

                                        <?php
                                        if ($company) {
                                        if ($company->PAN_card_no) {
                                        $modelco->PAN_card_no = $company->PAN_card_no;
                                        ?>
                                        <?= $form->field($modelco, 'PAN_card_no')->textInput(['disabled' => true,'class' => 'one_inpt form-control','placeholder' => "Pan card no.*"])->label(false) ?>
                                        <div style="display:none;"> <?= $form->field($modelco, 'PAN_card_no')->textInput(['class' => 'one_inpt form-control','placeholder' => "Pan card no.*"]) ?></div>
                                        <?php } else { ?>
                                        <?= $form->field($modelco, 'PAN_card_no')->textInput(['onkeyup' => "javascript:capitalize(this.id, this.value);",'placeholder' => "Pan card no.*"])->label(false) ?>
                                        <?php }
                                        } else {
                                        ?>
                                        <?= $form->field($modelco, 'PAN_card_no')->textInput(['onkeyup' => "javascript:capitalize(this.id, this.value);",'class' => 'one_inpt form-control','placeholder' => "Pan card no.*"])->label(false) ?>
                                        <?php } ?>
                                    </div><div class="col-md-6 addres padding_cont">
                                        <?php
                                        if ($company) {
                                        if ($company->COI_number) {
                                        $modelco->COI_number = $company->COI_number;
                                        ?>
                                        <?= $form->field($modelco, 'COI_number')->textInput(['disabled' => true,'class' => 'one_inpt form-control','placeholder' => "First name*"])->label(false) ?>
                                        <div style="display:none;"> <?= $form->field($modelco, 'COI_number')->textInput(['class' => 'one_inpt form-control','placeholder' => "Certificate Of Incorporation Number*"]) ?></div>
                                        <?php } else { ?>
                                        <?= $form->field($modelco, 'COI_number')->textInput(['class' => 'one_inpt form-control','placeholder' => "Certificate Of Incorporation Number*"])->label(false) ?>
                                        <?php }
                                        } else {
                                        ?>
                                        <?= $form->field($modelco, 'COI_number')->textInput(['class' => 'one_inpt form-control','placeholder' => "Certificate Of Incorporation Number*"])->label(false) ?>
                                        <?php } ?>

                                    </div></div>
                                <div class="row">
                                    <div class="col-md-6 addres padding_cont">
                                        <?= $form->field($modelco, 'main_email')->textInput(['type' => 'email','class' => 'one_inpt form-control','placeholder' => "Contact E-mail*"])->label(false) ?>
                                    </div> <div class="col-md-6 addres padding_cont">
                                        <?= $form->field($modelco, 'main_mobile')->textInput(['class' => 'one_inpt form-control','placeholder' => "Contact Number*"])->label(false) ?>
                                    </div></div>
                                <div class="row">
                                    <div class="col-md-6 addres padding_cont">
                                        <?php $modelco->country = "india"; ?>
                                        <div style="display:none"><?= $form->field($modelco, 'country')->dropDownList(['india' => 'India'], ['class' => "form-control countries"]); ?>
                                        </div>
                                        <?= $form->field($modelco, 'country')->dropDownList(['india' => 'India'], ['class' => "form-control one_inpt countries", 'disabled' => true])->label(false); ?>

                                    </div> <div class="col-md-6 addres padding_cont">

                                        <?php
                                        $getarrayallstates = \common\models\States::find()->where(['country_id' => 101])->all();
                                        $temp = 0;
                                        $catListpp = ArrayHelper::map($getarrayallstates, 'name', 'name');
                                        ?>	
                                        <?php
                                        echo

                                        $form->field($modelco, 'state')->widget(Select2::classname(), [
                                        'data' => $catListpp,
                                        'options' => ['placeholder' => 'Select State...', 'id' => 'state','class' => "form-control one_inpt"],
                                        'pluginOptions' => [
                                        'allowClear' => true
                                        ],
                                        ])->label(false);
                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                        ?>
                                    </div> </div>
                                <div class="row">
                                    <div class="col-md-6 addres padding_cont">
                                        <?php
                                        $arrgetmystate = \common\models\Cities::find()
                                        ->join('LEFT OUTER JOIN', 'states', 'states.id = cities.state_id')
                                        ->where('states.country_id =:cid', array(':cid' => 101))->all();
                                        //$getarrayallcity = \common\models\Cities::find()->where(['isactive'=>1])->all();$temp = 0;
                                        $subcatList = ArrayHelper::map($arrgetmystate, 'name', 'name');
                                        ?>
                                        <?php
                                        echo $form->field($modelco, 'city')->widget(DepDrop::classname(), [
                                        'type' => DepDrop::TYPE_SELECT2,
                                        'data' => $subcatList,
                                        'options' => ['placeholder' => 'Select City*','class' => "form-control one_inpt"],
                                        'pluginOptions' => [
                                        'tags' => true,
                                        //'allowClear'=>true,
                                        'tokenSeparators' => [',', ' '],
                                        'maximumInputLength' => 10,
                                        'depends' => ['state'],
                                        'url' => Url::to(['/site/subcatparentcomp']),
                                        ],
                                        ])->label(false);
                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                        ?>
                                    </div>
                                    <div class="col-md-6 addres padding_cont">	
                                        <?= $form->field($modelco, 'location')->textInput(['class' => "form-control one_inpt",'placeholder' => "Pin Code"])->label(false) ?>
                                    </div></div> 
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                       	
                                        <?= $form->field($modelco, 'main_address')->textarea(['rows' => 2,'class' => "form-control one_inpt",'placeholder' => "Registered Company Address*"])->label(false) ?>
                                    </div></div>






                                <?php if (!Yii::$app->request->isAjax) { ?>
                                <div class="form-group">
                                    <?= Html::submitButton($modelco->isNewRecord ? 'Save' : 'Update', ['class' => $modelco->isNewRecord ? 'btn btn-success create_butn m-0' : 'btn btn-primary create_butn m-0', 'name' => 'savecompanydata']) ?>
                                </div>
                                <?php } ?>


                                <?php ActiveForm::end(); ?></div>

                            <!--end tab1 -->
                            <!--start tab2 -->
                            <div class="tab-pane " id="tab_1_2">
                                <?php
                                $form = ActiveForm::begin(['method' => 'post',
                                //'enableClientValidation' => false
                                ]);
                                ?>

                                
                                <!-- PERSONAL INFO TAB -->
                                   
                                <div class="col-md-12 tab user_particular">	
								<div class="note note-info note_sam"> <span class="exp_name">User Particulars</span> </div>
                                    <div class="row">

                                        <div  style="display:none">
                                            <?php $model->title = "NIL"; ?><?= $form->field($model, 'title')->textInput()->label(false); ?>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php
                                                if ($myprofile) {
                                                if ($myprofile->first_name) {
                                                $model->first_name = $myprofile->first_name;
                                                ?>
                                                <div style="display:none;"> <?= $form->field($model, 'first_name')->textInput()->label(false); ?> </div>
                                                <?= $form->field($model, 'first_name')->textInput(['disabled' => true,'class' => 'one_inpt form-control','placeholder' => "First name*"])->label(false); ?>
                                                <?php } else { ?>
                                                <?= $form->field($model, 'first_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "First name*"])->label(false); ?>
                                                <?php } ?> 
                                                <?php } else { ?>
                                                <?= $form->field($model, 'first_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "First name*"])->label(false); ?>
                                                <?php }
                                                ?>

                                            </div></div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php
                                                if ($myprofile) {
                                                if ($myprofile->middlename) {
                                                $model->middlename = $myprofile->middlename;
                                                ?>
                                                <div style="display:none;"> <?= $form->field($model, 'middlename')->textInput()->label(false); ?> </div>
                                                <?= $form->field($model, 'middlename')->textInput(['disabled' => true,'class' => 'one_inpt form-control','placeholder' => "Middle name"])->label(false); ?>
                                                <?php } else { ?>
                                                <?= $form->field($model, 'middlename')->textInput(['class' => 'one_inpt form-control','placeholder' => "Middle name"])->label(false); ?>
                                                <?php } ?>
                                                <?php } else { ?>
                                                <?= $form->field($model, 'middlename')->textInput(['class' => 'one_inpt form-control','placeholder' => "Middle name"])->label(false); ?>
                                                <?php }
                                                ?>

                                            </div> </div> <div class="col-md-4">
                                            <div class="form-group">
                                                <?php
                                                if ($myprofile) {
                                                if ($myprofile->last_name) {
                                                $model->last_name = $myprofile->last_name;
                                                ?>
                                                <div style="display:none;"> <?= $form->field($model, 'last_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "Last name*"])->label(false); ?> </div>
                                                <?= $form->field($model, 'last_name')->textInput(['disabled' => true,'class' => 'one_inpt form-control','placeholder' => "Last name*"])->label(false); ?>
                                                <?php } else { ?>
                                                <?= $form->field($model, 'last_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "Last name*"])->label(false); ?>
                                                <?php } ?> 
                                                <?php } else { ?>
                                                <?= $form->field($model, 'last_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "Last name*"])->label(false); ?>
                                                <?php }
                                                ?>

                                            </div> </div>

                                    </div>

                                    <div class="row" style="background: rgba(255, 255, 255, 0.25) !important;">

                                       

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php
                                                if ($myprofile) {
                                                if ($myprofile->dob) {
                                                $model->dob = $myprofile->dob;
                                                ?>
                                                <div style="display:none;"> <?= $form->field($model, 'dob')->textInput()->label(false); ?> </div>
                                                <?= $form->field($model, 'dob')->textInput(['disabled' => true])->label(false); ?>
                                                <?php } else { ?>
                                                <?php
                                                echo $form->field($model, 'dob')->widget(DatePicker::classname(), [
                                                'options' => ['placeholder' => 'Enter DOB *',
                                                'id' => 'dob',
                                                'format' => 'y-m-d',
                                                'onChange' => 'checkvalidatn(this.value)',
                                                'class' => 'one_inpt form-control'],
                                                'pluginOptions' => [
                                                'autoclose' => true
                                                ]
                                                ])->label(false);
                                                ?>	<?php } ?> <?php } else { ?>
                                                <?php
                                                echo $form->field($model, 'dob')->widget(DatePicker::classname(), [
                                                'options' => ['placeholder' => 'Enter DOB*',
                                                //'name'=>'dob',
                                                'id' => 'dob',
                                                'format' => 'y-m-d',
                                                'onChange' => 'checkvalidatn(this.value)',
                                                'class' => 'one_inpt form-control'],
                                                'pluginOptions' => [
                                                'autoclose' => true
                                                ]
                                                ])->label(false);
                                                ?><?php } ?>


                                            </div> </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php
                                                if ($myprofile) {
                                                if ($myprofile->martial_status) {
                                                $model->martial_status = $myprofile->martial_status;
                                                }
                                                }
                                                ?>
                                                <?= $form->field($model, 'martial_status')->dropDownList(['Married' => 'Married', 'Un-Married' => 'Single'], ['prompt' => 'Select Marital Status*','class' => 'one_inpt form-control'])->label(false) ?> 
                                            </div> 
                                        </div>
															 <div class="col-md-4">
                                            <div class="form-group">
                                                <?php
                                                if ($myprofile) {
                                                if ($myprofile->nationality) {
                                                $model->nationality = $myprofile->nationality;
                                                }
                                                }
                                                ?>
                                                <?= $form->field($model, 'nationality')->dropDownList(['indiancitizen' => 'Indian', 'NRI' => 'NRI', 'OCI' => 'OCI', 'PIO' => 'PIO'], ['prompt' => 'Select Nationality*', 'onChange' => "focalnation()", 'id' => 'nationality','class' => 'one_inpt form-control'])->label(false) ?> 
                                            </div> 
                                        </div>





                                    </div>
                                    <div class="row" style="background: rgba(255, 255, 255, 0.25) !important;">

                                       
                                         <div class="col-md-4">
                                            <div class="form-group">
                                            <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->gender) {
                                                                $model->gender = $myprofile->gender;
                                                                ?>
                                                                <div style="display:none;"> <?= $form->field($model, 'gender')->textInput(['class' => 'one_inpt form-control'])->label(false); ?> </div>
                                                                                                
                                                                <?= $form->field($model, 'gender')->textInput(['prompt' => 'Select Gender*','disabled' => true,'class' => 'one_inpt form-control'])->label(false); ?>
                                                                <?php } else { ?>
                                                                 <div style="display:none;">
                                                                <?= $form->field($model, 'gender')->dropDownList(['Male' => 'Male', 'Female' => 'Female'], ['prompt' => 'Select Gender*','class' => 'one_inpt form-control'])->label(false); ?>
                                                               </div>
                                                                <?php } ?> <?php } else { ?>
                                                                 <div style="display:none;">
                                                                <?= $form->field($model, 'gender')->dropDownList(['Male' => 'Male', 'Female' => 'Female'], ['prompt' => 'Select Gender*','class' => 'one_inpt form-control'])->label(false); ?>
                                                                </div>
                                                                <?php } ?></div></div>
                                        <div  style="display:none;">

                                            <?php if ($myprofile) {
                                            if ($myprofile->isMinor) { ?> <?php } ?>	  <?php } ?>	  
                                            <select id="isMinor" class="form-control" value = "No" onChange="focaldiv()" name="isMinor">
                                                <option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>								


                                        </div>
                                        <?php
                                        if ($myprofile) {
                                        if ($myprofile->countryverificatn) {
                                        $model->countryverificatn = $myprofile->countryverificatn;
                                        }
                                        }
                                        ?>
                                       <div class="col-md-8" id="nationalityhide" <?php if ($myprofile) { if($myprofile->hide == '1'){ ?>style="display:none;<?php } } ?>">
										<div class="row">                                        
										<div class="col-md-6">
										      <?php
                                        if ($myprofile) {
                                        if ($myprofile->countryverificatn !='') { ?>
                                        <div id="divo6" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'countryverificatn')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Country Identification Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                       <?php }  }else{  ?>
                                        <div style="display:none;">
                                        <div id="divo6" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'countryverificatn')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Country Identification Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                            </div>
                                            <?php } ?>
                                      
                                            
                                            
                                            <?php
                                        if ($myprofile) {
                                        if ($myprofile->ocinumber !='') { ?>
                                        <div id="divo8" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'ocinumber')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'OCI Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                       <?php }  }else{  ?>
                                        <div style="display:none;">
                                        <div id="divo8" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'ocinumber')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'OCI Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                            </div>
                                            <?php } ?>
                                            
                                            
                                              <?php
                                        if ($myprofile) {
                                        if ($myprofile->pionumber !='') { ?>
                                        <div id="divo9" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'pionumber')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'PIO Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                       <?php }  }else{  ?>
                                        <div style="display:none;">
                                        <div id="divo9" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'pionumber')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'PIO Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                            </div>
                                            <?php } ?>   
                                            
                                            
                                            
                                            <?php
                                        if ($myprofile) {
                                        if ($myprofile->pan_card_no !='') { ?>
                                        <div id="divo7" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'pan_card_no')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'PAN Card*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                       <?php }  }else{  ?>
                                       
                                        <div style="display:none;">
                                        <div id="divo7" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'pan_card_no')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'PAN Card*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                            </div>
                                            <?php } ?>   
                                                
                                            
                                                
                                         
                                                
                                                
                                        </div>
                                        <?php
                                        if ($myprofile) {
                                        if ($myprofile->adhar_card_no) {
                                        $model->adhar_card_no = $myprofile->adhar_card_no;
                                        }
                                        }
                                        ?>
                                        <div class="col-md-6 col-xs-12">
											<div class="row">
											
											
											
                                            <?php
                                        if ($myprofile) {
                                        if ($myprofile->adhar_card_no !='') {  ?>
                                        <div id="divo4" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'adhar_card_no')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Aadhar Card*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                       <?php } else{ ?>
                                       
                                        <div style="display:none;">
                                        <div id="divo4" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'adhar_card_no')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Aadhar Card*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                            </div>                                   
                                       
                                       
                                       
                                       
                                       <?php  }  }else{   ?>
                                       
                                        <div style="display:none;">
                                        <div id="divo4" class="col-md-12" style="display:none;">
                                                <div class="form-group">


                                                    <?= $form->field($model, 'adhar_card_no')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Aadhar Card*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            </div>
                                            </div>
                                            <?php } ?>   
                                                
											
                                            
                                                
                                                
                                                
                                                
                                            <div id="divo5" class="col-md-12" style="display:none;">
                                                <?php
                                                if ($myprofile) {
                                                if ($myprofile->passportno) {
                                                $model->passportno = $myprofile->passportno;  ?>
                                                
                                                <div class="form-group">

                                                    <?= $form->field($model, 'passportno')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Passport Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                            
                                                
                                                <?php }  }else{  ?>
                                                
                                                <div style="display:none;" class="form-group">

                                                    <?= $form->field($model, 'passportno')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Passport Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                </div>
                                                
                                                <?php }  ?>
                                                
                                                
                                                </div>
											</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row tab user_particular">
                                     <div class="col-md-12"> 
                                          <div class="note note-info" style="">  <label class="control-label note_sam">
                                             <span class="exp_name"> Contact Number</span></label></div>
                                            <!-- -->
                                            <div class="input_fields_wrap1 row" style="background: rgba(255, 255, 255, 0.25) !important;padding-top:15px;">
                                                <?php
                                                $primarynotype = \common\models\UserPhoneconfig::find()->where(['userid' => Yii::$app->user->identity->id, 'isdefault' => 1])->one();
                                                if ($primarynotype) {

                                                $primarytype = \common\models\Phonenumbers::find()->where(['id' => $primarynotype->phoneid])->one();
                                                if ($primarytype) {

                                                // exit();
                                                $model->phonetypeprimary = $primarytype->phonetype;
                                                if ($primarytype->country_code) {
                                                $model->phonecodetypeprim = $primarytype->country_code;
                                                } else {
                                                $model->phonecodetypeprim = Yii::$app->user->identity->countrycode;
                                                }
                                                if ($primarytype->phone_no) {
                                                $model->phonenumbersprim = $primarytype->phone_no;
                                                } else {
                                                $model->phonenumbersprim = Yii::$app->user->identity->username;
                                                }
                                                }
                                                } else {
                                                if (!empty($model->phonecodetypeprim)) {
                                                $model->phonecodetypeprim = Yii::$app->user->identity->countrycode;
                                                } else {
                                                $model->phonecodetypeprim = '91';
                                                }
                                                $model->phonenumbersprim = Yii::$app->user->identity->username;
                                                }
                                                ?>

                                                <div class="col-md-4">
                                                    <?= $form->field($model, 'phonetypeprimary')->dropDownList(['Mobile' => 'Primary number', 'Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other'], ['prompt' => 'Select Primary number type*', 'class' => "form-control one_inpt"])->label(false); ?>


                                                </div>
                                                <div class="col-md-4 padding_cont">

                                                    <?php
                                                    $arrfindallcountriescode = \common\models\Countries::find()->all();
                                                    $findallcountriescode = ArrayHelper::map($arrfindallcountriescode, 'phonecode', 'phonecode');
                                                    ?>
                                                    <?php
                                                    echo $form->field($model, 'phonecodetypeprim')->widget(Select2::classname(), [
                                                    'data' => $findallcountriescode,
                                                    'options' => ['placeholder' => 'Select Country Code...','class' => "one_inpt form-control"],
                                                    'pluginOptions' => [
                                                    'placeholder' => 'Select Country Code...',
                                                    'allowClear' => true],
                                                    ])->label(false);
                                                    ?>

                                                    <!--<span class="help-block"> (999) 999-9999 </span>-->
                                                </div>
                                                <div class="col-md-4">

                                                    <?= $form->field($model, 'phonenumbersprim')->textInput(['class' => 'form-control one_inpt phone_no','placeholder' => "Primary Number"])->label(false); ?>


                                                    <!--<span class="help-block"> (999) 999-9999 </span>-->
                                                </div></div>
                                            <?php
                                            $secondnotype = \common\models\UserPhoneconfig::find()->where('userid =:userid and isdefault != :config', array(':userid' => Yii::$app->user->identity->id, 'config' => 1))->one();
                                            if ($secondnotype) {

                                            $secondtype = \common\models\Phonenumbers::find()->where(['id' => $secondnotype->phoneid])->one();
                                            if ($secondtype) {

                                            // exit();
                                            $model->phonetypesecondary = $secondtype->phonetype;
                                            $model->phonecodetypecorres = $secondtype->country_code;
                                            $model->phonenumbersecondary = $secondtype->phone_no;
                                            }
                                            } else {
                                            $model->phonecodetypecorres = '91';
                                            }
                                            ?>
                                           
										
                                    
                                
                                    <div class="col-md-12 p-0">
                                       
                                             <div class="note note-info note_sam tool_tip">  <label class="control-label lbl_pos note_sam">
                                                                  <span class="exp_name">Contact E-mail</span></label></div>
                                            <!-- -->
                                            <div class="input_fields_wrap1 row">
                                                <?php
                                                $primemailtype = \common\models\UserEmailconfig::find()->where('userid =:userid and isdefault = :config', array(':userid' => Yii::$app->user->identity->id, 'config' => 1))->one();
                                                if ($primemailtype) {

                                                $primmyemailtype = \common\models\Emailaddresses::find()->where(['id' => $primemailtype->emailid])->one();
                                                if ($primmyemailtype) {

                                                // exit();
                                                $model->emailtypeprimary = $primmyemailtype->emailtype;
                                                $model->emailnumbersprim = $primmyemailtype->emailaddress;
                                                }
                                                } else {
                                                $model->emailnumbersprim = Yii::$app->user->identity->email;
                                                }
                                                $secondemailtype = \common\models\UserEmailconfig::find()->where('userid =:userid and isdefault != :config', array(':userid' => Yii::$app->user->identity->id, 'config' => 1))->one();
                                                if ($secondemailtype) {

                                                $secondmyemailtype = \common\models\Emailaddresses::find()->where(['id' => $secondemailtype->emailid])->one();
                                                if ($secondmyemailtype) {

                                                // exit();
                                                $model->emailtypesecondary = $secondmyemailtype->emailtype;
                                                $model->emailnumbersecondary = $secondmyemailtype->emailaddress;
                                                }
                                                }
                                                ?>

                                                <div class="col-md-6 col-xs-12">
                                                    <?= $form->field($model, 'emailtypeprimary')->dropDownList(['Work' => 'Primary e-mail', 'Home' => 'Home', 'Other' => 'Other'], ['prompt' => 'Select Primary e-mail type*', 'class' => "form-control one_inpt"])->label(false); ?>


                                                </div>

                                                <div class="col-md-6 col-xs-12">
                                                    <?= $form->field($model, 'emailnumbersprim')->textInput(['type' => 'email', 'class' => 'form-control one_inpt','placeholder' => "Primary e-mail"])->label(false); ?>

                                                    <!--<span class="help-block"> (999) 999-9999 </span>-->
                                                </div></div>

                                            

                                        
                                    </div>
									</div>
                                </div>

                         <div class="row tab user_particular" style="position:relative">
							<div class="">
                                <div class="col-md-12">
                                    <div class="note note-info note_sam currnt_ad colr_bg"> <label class="control-label note_sam">
                                         <span class="exp_name"> Current Address</span></label></div>
                                </div>
                                <div class="input_fields_wrap2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                if ($myprofile) {
                                                if ($myprofile->current_address) {
                                                $model->current_address = $myprofile->current_address;
                                                }
                                                if ($myprofile->current_state) {
                                                $model->current_state = $myprofile->current_state;
                                                }
                                                if ($myprofile->current_country) {
                                                $model->current_country = $myprofile->current_country;
                                                }
                                                if ($myprofile->current_city) {
                                                $model->current_city = $myprofile->current_city;
                                                }
                                                if ($myprofile->current_pincode) {
                                                $model->current_pincode = $myprofile->current_pincode;
                                                }
                                                } else {
                                                $model->current_country = 'India';
                                                }
                                                ?>
                                                <div class="col-md-12">
                                                    
                                                                                                                                                               <div class="row">                             
                                                    <div class="col-sm-11 col-xs-12">

                                                        <?= $form->field($model, 'current_address')->textarea(['class' => 'form-control one_inpt', 'placeholder' => "Enter Address ,street address or landmark *", 'rows' => "3", 'id' => 'current_address'])->label(false); ?>

                                                    </div><br/>
                                                    <div class="col-sm-3 col-xs-12 addres padding_cont">
                                                        <?php
                                                        $arrfindallcountries = \common\models\activemode::findallcountries();
                                                        $arrcountrylist = ArrayHelper::map($arrfindallcountries, 'name', 'name');
                                                        ?>

                                                        <?php
                                                        echo $form->field($model, 'current_country')->widget(Select2::classname(), [
                                                        'data' => $arrcountrylist,
                                                        'options' => ['placeholder' => 'Select country *', 'id' => 'current_country','class' => "form-control one_inpt"],
                                                        'pluginOptions' => [
                                                        'allowClear' => true
                                                        ],
                                                        ])->label(false);
                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                        ?>

                                                    </div>
                                                    <div class="col-sm-3 col-xs-12 addres padding_cont">
                                                        <?php
                                                        if ($myprofile) {
                                                        $model->current_state = $myprofile->current_state;
                                                        $findcountry = \common\models\Countries::find()->where(['name' => $model->current_country])->one();
                                                        $arrfindstates = \common\models\States::find()->where(['country_id' => $findcountry->id])->all();
                                                        $liststate = ArrayHelper::map($arrfindstates, 'name', 'name');
                                                        echo $form->field($model, 'current_state')->widget(DepDrop::classname(), [
                                                        'data' => $liststate,
                                                        'type' => DepDrop::TYPE_SELECT2,
                                                        'options' => ['id' => 'current_state', 'placeholder' => 'Select State...','class' => "form-control one_inpt"],
                                                        'pluginOptions' => [
                                                        'placeholder' => 'Select State *',
                                                        'allowClear' => true,
                                                        'depends' => ['current_country'],
                                                        'url' => Url::to(['/site/subcatparent']),
                                                        ],
                                                        ])->label(false);
                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                        } else {
                                                        ?>
                                                        <?php $arrfindstatesp = \common\models\States::find()->where(['country_id' => 101])->all();
                                                        $liststatex = ArrayHelper::map($arrfindstatesp, 'name', 'name');
                                                        ?>
                                                        <?php
                                                        echo $form->field($model, 'current_state')->widget(DepDrop::classname(), [
                                                        'data' => $liststatex,
                                                        'type' => DepDrop::TYPE_SELECT2,
                                                        'options' => ['id' => 'current_state', 'placeholder' => 'Select State...','class' => "form-control one_inpt"],
                                                        'pluginOptions' => [
                                                        'placeholder' => 'Select State *',
                                                        'allowClear' => true,
                                                        'depends' => ['current_country'],
                                                        'url' => Url::to(['/site/subcatparent']),
                                                        ],
                                                        ])->label(false);
                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                        ?>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="col-sm-3 col-xs-12 addres padding_cont">
                                                        <?php
                                                        if ($myprofile) {
                                                        $model->current_state = $myprofile->current_state;
                                                        $findstates = \common\models\States::find()->where(['name' => $model->current_state])->one();
                                                        $arrfindcities = \common\models\Cities::find()->where(['state_id' => $findstates->id])->all();
                                                        $listcity = ArrayHelper::map($arrfindcities, 'name', 'name');
                                                        ?>
                                                        <?php
                                                        echo $form->field($model, 'current_city')->widget(DepDrop::classname(), [
                                                        'data' => $listcity,
                                                        'type' => DepDrop::TYPE_SELECT2,
                                                        //'data' => $catList,
                                                        'options' => ['id' => 'current_city','class' => "form-control one_inpt"],
                                                        'pluginOptions' => [
                                                        'placeholder' => 'Select City *',
                                                        'depends' => ['current_state'],
                                                        'url' => Url::to(['/site/subcat']),
                                                        'allowClear' => true
                                                        ],
                                                        ])->label(false);
                                                        ?>
                                                        <?php } else { ?>
                                                        <?php
                                                        echo $form->field($model, 'current_city')->widget(DepDrop::classname(), [

                                                        'type' => DepDrop::TYPE_SELECT2,
                                                        //'data' => $catList,
                                                        'options' => ['id' => 'current_city','class' => "form-control one_inpt"],
                                                        'pluginOptions' => [
                                                        'placeholder' => 'Select City *',
                                                        'depends' => ['current_state'],
                                                        'url' => Url::to(['/site/subcat']),
                                                        'allowClear' => true
                                                        ],
                                                        ])->label(false);
                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                        }
                                                        ?>


                                                    </div>
                                                    <div class="col-sm-2 col-xs-12 addres padding_cont">
                                                        <?= $form->field($model, 'current_pincode')->textInput(['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Pincode*', 'id' => 'current_pincode'])->label(false); ?>

                                                    </div>
                                                   </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                               
								</div>


                                <div class="col-md-12">
                                          <div class="note note-info note_sam permnent_ad"> <label class="control-label lbl_pos note_sam"><span class="exp_name">Permanent address&nbsp;&nbsp;&nbsp;</span><i><b style="font-size:14px;"><input type="checkbox" id="checkaddr" name="checkaddr" onclick="FillBilling(this.form)" > Same as above</b></i></label></div>
                                    
                                    <div class="input_fields_wrap2">
                                            <div class="row">
												<div class="col-md-12">
                                                <?php
                                                if ($myprofile) {

                                                if ($myprofile->permanent_state) {
                                                $model->permanent_state = $myprofile->permanent_state;
                                                }
                                                if ($myprofile->permanent_country) {
                                                $model->permanent_country = $myprofile->permanent_country;
                                                }
                                                if ($myprofile->permanent_city) {
                                                $model->permanent_city = $myprofile->permanent_city;
                                                }
                                                if ($myprofile->permanent_pincode) {
                                                $model->permanent_pincode = $myprofile->permanent_pincode;
                                                }
                                                } else {
                                                $model->permanent_country = 'India';
                                                }
                                                ?>
													<div class="row">
                                                    <div class="col-sm-11 col-xs-12 addres padding_cont">
                                                        <?php
                                                        if ($myprofile) {
                                                        if ($myprofile->permanent_address) {
                                                        $model->permanent_address = $myprofile->permanent_address;
                                                        ?>
                                                        <?= $form->field($model, 'permanent_address')->textarea(['class' => 'form-control', 'placeholder' => "Enter Address ,street address or landmark *", 'rows' => "3", 'id' => 'permanent_address'])->label(false); ?> 
                                                        <div style="display:none;"><?= $form->field($model, 'permanent_address')->textarea(['class' => 'form-control one_inpt', 'placeholder' => "Enter Address ,street address or landmark *", 'rows' => "3", 'id' => 'permanent_address', 'type' => 'hidden'])->label(false); ?>
                                                        </div><?php }
                                                        } else { ?>
                                                        <?= $form->field($model, 'permanent_address')->textarea(['class' => 'form-control', 'placeholder' => "Enter Address ,street address or landmark *", 'rows' => "3", 'id' => 'permanent_address'])->label(false); ?>
                                                        <?php } ?></div>


                                                    <br/>
                                                    <div class="col-sm-3 col-xs-12 addres padding_cont">


                                                        <?php
                                                        $arrfindallcountriestwo = \common\models\activemode::findallcountries();
                                                        $arrcountrylisttwo = ArrayHelper::map($arrfindallcountriestwo, 'name', 'name');
                                                        ?>
                                                        <?php
                                                        if ($myprofile) {
                                                        if ($myprofile->permanent_country) {
                                                        $model->permanent_country = $myprofile->permanent_country;
                                                        ?>
                                                        <?= $form->field($model, 'permanent_country')->textInput(['id' => 'permanent_country', 'disabled' => true,'class' => "form-control one_inpt"])->label(false); ?>
                                                        <div style="display:none;"><?= $form->field($model, 'permanent_country')->textInput(['id' => 'permanent_country','class' => "form-control one_inpt"])->label(false); ?>
                                                        </div><?php }
                                                        } else { ?>
                                                        <div id="permancountry" style="display:block">
                                                            <?php
                                                            echo $form->field($model, 'permanent_country')->widget(Select2::classname(), [
                                                            'data' => $arrcountrylisttwo,
                                                            'options' => ['placeholder' => 'Select country *', 'id' => 'permanent_country','class' => "form-control one_inpt"],
                                                            'pluginOptions' => [
                                                            'allowClear' => true
                                                            ],
                                                            ])->label(false);
                                                            //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                            ?></div> 
                                                        <div id="permancountrytwo" style="display:none"><?= $form->field($model, 'permanent_country')->textInput(['class' => 'form-control one_inpt', 'id' => 'permanent_countrytwo', 'disabled' => true])->label(false); ?></div>
                                                        <div style="display:none"><?= $form->field($model, 'permanent_country')->textInput(['id' => 'permanent_countrythree'])->label(false); ?></div>
                                                        <?php } ?>

                                                    </div>
                                                    <div class="col-sm-3 col-xs-12 addres padding_cont">
                                                        <?php
                                                        if ($myprofile) {
                                                        if ($myprofile->permanent_state) {
                                                        $model->permanent_state = $myprofile->permanent_state;
                                                        ?>
                                                        <?= $form->field($model, 'permanent_state')->textInput(['id' => 'permanent_state', 'disabled' => true,'class' => "form-control one_inpt"])->label(false); ?>
                                                        <div style="display:none;"><?= $form->field($model, 'permanent_state')->textInput(['id' => 'permanent_state'])->label(false); ?>
                                                        </div><?php }
                                                        } else { ?>
                                                        <?php $arrfindstatesp = \common\models\States::find()->where(['country_id' => 101])->all();
                                                        $liststatex = ArrayHelper::map($arrfindstatesp, 'name', 'name');
                                                        ?>
                                                        <div id="permantwo" style="display:block">
                                                            <?php
                                                            echo $form->field($model, 'permanent_state')->widget(DepDrop::classname(), [
                                                            'data' => $liststatex,
                                                            'type' => DepDrop::TYPE_SELECT2,
                                                            'options' => ['id' => 'permanent_state', 'placeholder' => 'Select State...'],
                                                            'pluginOptions' => [
                                                            'placeholder' => 'Select State *',
                                                            'allowClear' => true,
                                                            'depends' => ['permanent_country'],
                                                            'url' => Url::to(['/site/subcatparent']),
                                                            ],
                                                            ])->label(false);
                                                            //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                            ?></div>
                                                        <div id="perman" style="display:none"><?= $form->field($model, 'permanent_state')->textInput(['class' => 'form-control', 'id' => 'permanent_statetwo', 'disabled' => true])->label(false); ?></div>
                                                        <div style="display:none"><?= $form->field($model, 'permanent_state')->textInput(['id' => 'permanent_statethree'])->label(false); ?></div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="col-sm-3 col-xs-12 addres padding_cont">
                                                        <?php
                                                        if ($myprofile) {
                                                        if ($myprofile->permanent_city) {
                                                        $model->permanent_city = $myprofile->permanent_city;
                                                        ?>
                                                        <?= $form->field($model, 'permanent_city')->textInput(['id' => 'permanent_city', 'disabled' => true])->label(false); ?>
                                                        <div style="display:none;"><?= $form->field($model, 'permanent_city')->textInput(['id' => 'permanent_city'])->label(false); ?>
                                                        </div> <?php }
                                                        } else { ?>
                                                        <div id="permancity" style="display:block">
                                                            <?php
                                                            echo $form->field($model, 'permanent_city')->widget(DepDrop::classname(), [
                                                            'type' => DepDrop::TYPE_SELECT2,
                                                            'options' => ['id' => 'permanent_city','class' => "one_inpt form-control"],
                                                            'pluginOptions' => [
                                                            'placeholder' => 'Select City *',
                                                            'depends' => ['permanent_state'],
                                                            'url' => Url::to(['/site/subcat']),
                                                            'allowClear' => true
                                                            ],
                                                            ])->label(false);
                                                            //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                            ?></div>
                                                        <div id="permancitytwo" style="display:none"><?= $form->field($model, 'permanent_city')->textInput(['class' => 'form-control one_inpt', 'id' => 'permanent_citytwo', 'disabled' => true])->label(false); ?></div>
                                                        <div style="display:none"><?= $form->field($model, 'permanent_city')->textInput(['id' => 'permanent_citythree'])->label(false); ?></div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-sm-2 col-xs-12 addres padding_cont">
                                                        <?php if ($myprofile) {
                                                        if ($myprofile->permanent_pincode) {
                                                        $model->permanent_pincode = $myprofile->permanent_pincode;
                                                        ?>
                                                        <?= $form->field($model, 'permanent_pincode')->textInput(['id' => 'permanent_pincode', 'disabled' => true])->label(false); ?>
                                                        <div style="display:none;"><?= $form->field($model, 'permanent_pincode')->textInput(['id' => 'permanent_pincode','class' => "one_inpt form-control"])->label(false); ?>
                                                        </div><?php }
                                                        } else { ?>

                                                        <div id="permanent_pincode" style="display:block">
                                                            <?= $form->field($model, 'permanent_pincode')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Pincode', 'id' => 'permanent_pincode'])->label(false); ?>
                                                        </div>
                                                        <div id="permanent_pincodetwo" style="display:none">
                                                            <?= $form->field($model, 'permanent_pincode')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Pincode', 'id' => 'permanent_pincodetwo', 'disabled' => true])->label(false); ?>
                                                        </div> 
                                                        <div style="display:none;"><?= $form->field($model, 'permanent_pincode')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Pincode', 'id' => 'permanent_pincodethree'])->label(false); ?></div>

                                                        <?php } ?>
                                                    </div>
													</div>
                                               </div>
		
                                            </div>
                                       

                                    </div>
                                </div>
								
                                </div>



	<div style="overflow:auto;">
														<div style="">
														  <button class="left_butn butn_styl" type="button" id="prevBtn" onclick="nextPrev(-1)" style="float:left"><i class="fa fa-caret-left"></i> Previous</button>
														  <button class="right_butn butn_styl" type="button" id="nextBtn" onclick="nextPrev(1)" style="float:right;">Next <i class="fa fa-caret-right"></i></button>
														</div>
													  </div>

                                <div class="margiv-top-10">
                                   

                                    <?php echo Html::submitButton('Save & Upload Documents', ['class' => 'btn green btm_sbmt butn_styl', 'name' => 'savedatadocs', 'id' => 'savedatadocs']); ?>

                                    <a style="display:none;" href="<?php echo yii::$app->urlManager->createUrl(['common/documents']) ?>" class="btn btn-info"><i class="fa fa-share"></i> Next</a>

                                </div>

                                <?php ActiveForm::end(); ?>

                            </div> <!--end tab2 -->

                        </div><!-- end tab content -->
                    </div> <!--end portlet body -->
                </div> <!--end portlet light -->
            </div><!-- end portlet body parent -->
        </div><!-- end portlet light -->


    </div><!-- end col-md-9 -->
</div> <!-- end row -->
</div>




<!-- end MTPROFILE status section -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    $(document).ready(function () {
        $("#nationality").change(function () {
            if ($(this).val() == '') {
                //alert('blank');
                $("#divo4").hide();
                $("#divo5").hide();
                $("#divo6").hide();
                $("#divo7").hide();
                $("#divo8").hide();
                $("#divo9").hide();
            }

        });

    });


    function readURL(input) {
        $('#thumbnail').attr('');

        if (input.files && input.files[0]) {


            var reader = new FileReader();

            reader.onload = function (e) {

                $('#thumbnail').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#logo").change(function () {


        readURL(this);
    });
    function focaldiv() {
        var foc = $('#isMinor').val();

        if (foc == 'Yes') {

            $('a[href="<?php echo Yii::$app->urlManager->createUrl(['userguardiandetails / create']) ?>"]').click();
                    document.getElementById('divo1').style.display = 'block';
            document.getElementById('divo2').style.display = 'block';

            document.getElementById('minorrelation').style.display = 'block';
            document.getElementById('guardianname').style.display = 'block';


        }

    }
</script>
<script>
    $(document).ready(function () {
        focalnation();

        setTimeout(function () {
            $('#successMessage').fadeOut('fast');
        }, 10000);



    });
    function focalnation() {
        var foc = $('#nationality').val();
        
       
        if (foc == 'NRI') {


            document.getElementById('divo5').style.display = 'block';
            document.getElementById('divo6').style.display = 'block';
            document.getElementById('divo7').style.display = 'none';
            
            document.getElementById('divo4').style.display = 'none';
            
            
            document.getElementById('divo8').style.display = 'none';
            document.getElementById('divo9').style.display = 'none';
        }
        if (foc == 'indiancitizen') {
        	
       
            document.getElementById('divo4').style.display = 'block';
            document.getElementById('divo6').style.display = 'none';
            
            document.getElementById('divo7').style.display = 'block';
            
            document.getElementById('divo5').style.display = 'none';
            document.getElementById('divo8').style.display = 'none';
            document.getElementById('divo9').style.display = 'none';
        }
        if (foc == 'OCI') {


            document.getElementById('divo9').style.display = 'none';
            document.getElementById('divo6').style.display = 'none';
            document.getElementById('divo7').style.display = 'none';
            document.getElementById('divo4').style.display = 'none';
            document.getElementById('divo5').style.display = 'block';
            document.getElementById('divo8').style.display = 'block';
        }
        if (foc == 'PIO') {


            document.getElementById('divo8').style.display = 'none';
            document.getElementById('divo6').style.display = 'none';
            document.getElementById('divo9').style.display = 'block';
            document.getElementById('divo5').style.display = 'block';
            document.getElementById('divo7').style.display = 'none';
            document.getElementById('divo4').style.display = 'none';

        }

    }


</script>

</script>
<script type="text/javascript">
    function capitalize(textboxid, str) {
        // string with alteast one character
        if (str && str.length >= 1)
        {
            var firstChar = str.charAt(0);
            var remainingStr = str.slice(1);
            str = firstChar.toUpperCase() + remainingStr.toUpperCase();
        }
        document.getElementById(textboxid).value = str;
    }
</script>
<script>
    function checkvalidatn(birthdayp) {
        // birthday is a date
        var str = birthdayp.toString("y-m-d");
        var birthday = new Date(str);
        var ageDifMs = Date.now() - birthday.getTime();

        var ageDate = new Date(ageDifMs); // miliseconds from epoch
        var userage = Math.abs(ageDate.getUTCFullYear() - 1970);
        if (userage < 18) {
            alert('Age Should be greater than 18.');
            $('#dob').val("");
        }
    }
</script>
<script>
								var currentTab = 0; // Current tab is set to be the first tab (0)
								showTab(currentTab); // Display the crurrent tab

								function showTab(n) {
								  // This function will display the specified tab of the form...
								  var x = document.getElementsByClassName("tab");
								  x[n].style.display = "block";
								  //... and fix the Previous/Next buttons:
								  if (n == 0) {
									document.getElementById("prevBtn").style.display = "none";
									document.getElementById("savedatadocs").style.display = "none";
								  } else {
									document.getElementById("prevBtn").style.display = "inline";
									document.getElementById("savedatadocs").style.display = "none";
								  }
								  if (n == (x.length - 1)) {
									document.getElementById("savedatadocs").style.display = "block";
									document.getElementById("nextBtn").style.display = "none";
								  } else {
									document.getElementById("nextBtn").style.display = "block";
								  }
								  //... and run a function that will display the correct step indicator:
								  fixStepIndicator(n)
								}

								function nextPrev(n) {
								  // This function will figure out which tab to display
								  var x = document.getElementsByClassName("tab");
								  // Exit the function if any field in the current tab is invalid:
								  //if (n == 1 && !validateForm()) return false;
								  // Hide the current tab:
								  x[currentTab].style.display = "none";
								  // Increase or decrease the current tab by 1:
								  currentTab = currentTab + n;
								  // if you have reached the end of the form...
								  if (currentTab >= x.length) {
									// ... the form gets submitted:
									document.getElementById("regForm").submit();
									return false;
								  }
								  // Otherwise, display the correct tab:
								  showTab(currentTab);
								}

								function validateForm() {
								  // This function deals with validation of the form fields
								  var x, y, i, valid = true;
								  x = document.getElementsByClassName("tab");
								  y = x[currentTab].getElementsByTagName("input");
								  // A loop that checks every input field in the current tab:
								  for (i = 0; i < y.length; i++) {
									// If a field is empty...
									if (y[i].value == "") {
									  // add an "invalid" class to the field:
									  y[i].className += " invalid";
									  // and set the current valid status to false
									  valid = false;
									}
								  }
								  // If the valid status is true, mark the step as finished and valid:
								  if (valid) {
									document.getElementsByClassName("step")[currentTab].className += " finish";
								  }
								  return valid; // return the valid status
								}

								function fixStepIndicator(n) {
								  // This function removes the "active" class of all steps...
								  var i, x = document.getElementsByClassName("step");
								  for (i = 0; i < x.length; i++) {
									x[i].className = x[i].className.replace(" active", "");
								  }
								  //... and adds the "active" class on the current step:
								  x[n].className += " active";
								}
								</script>
<script>
    function FillBilling(f) {

        if (f.checkaddr.checked == true) {

            var curreaddrchi = $('#current_address').val();
            var currestatchi = $('#current_state').val();

            var currecitychi = $('#current_city').val();
            var currepincchi = $('#current_pincode').val();
            var currecountrchi = $('#current_country').val();

            $('#current_address').keyup(function () {


                if (f.checkaddr.checked == true) {
                    $('#permanent_address').val($('#current_address').val());
                }
            });
            $('#current_state').change(function () {
                if (f.checkaddr.checked == true) {


                    $('#permanent_state').val($('#current_state').val());
                    $('#permanent_statetwo').val($('#current_state').val());
                    $('#permanent_statethree').val($('#current_state').val());
                }
            });
            $('#current_city').change(function () {

                if (f.checkaddr.checked == true) {
                    $('#permanent_city').val($('#current_city').val());
                    $('#permanent_citytwo').val(currecitychi);
                    $('#permanent_citythree').val(currecitychi);
                }

            });
            $('#current_pincode').change(function () {

                if (f.checkaddr.checked == true) {

                    $('#permanent_pincode').val($('#current_pincode').val());
                    $('#permanent_pincodetwo').val(currepincchi);
                    $('#permanent_pincodethree').val(currepincchi);
                }

            });
            $('#current_country').change(function () {

                if (f.checkaddr.checked == true) {
                    $('#permanent_country').val(currecountrchi);
                    $('#permanent_countrytwo').val(currecountrchi);
                    $('#permanent_countrythree').val(currecountrchi);
                }
            });

            $('#permanent_address').val(curreaddrchi);
            $('#permanent_state').val(currestatchi);
            $('#permanent_statetwo').val(currestatchi);
            $('#permanent_statethree').val(currestatchi);
            $('#permanent_city').val(currecitychi);
            $('#permanent_citytwo').val(currecitychi);
            $('#permanent_citythree').val(currecitychi);
            $('#permanent_pincode').val(currepincchi);
            $('#permanent_pincodetwo').val(currepincchi);
            $('#permanent_pincodethree').val(currepincchi);
            $('#permanent_country').val(currecountrchi);
            $('#permanent_countrytwo').val(currecountrchi);
            $('#permanent_countrythree').val(currecountrchi);
            document.getElementById('perman').style.display = 'block';
            document.getElementById('permantwo').style.display = 'none';
            document.getElementById('permancitytwo').style.display = 'block';
            document.getElementById('permancity').style.display = 'none';
            document.getElementById('permancountrytwo').style.display = 'block';
            document.getElementById('permancountry').style.display = 'none';
            document.getElementById('permanent_pincodetwo').style.display = 'block';
            document.getElementById('permanent_pincode').style.display = 'none';





            //$('#permanent_address').prop('disabled', true);  
            $('#permanent_state').prop('disabled', true);
            $('#permanent_country').prop('disabled', true);
            $('#permanent_city').prop('disabled', true);
            $('#permanent_pincode').prop('disabled', true);

        } else {

            $('#permanent_state').prop('disabled', false);
            $('#permanent_country').prop('disabled', false);
            $('#permanent_city').prop('disabled', false);
            $('#permanent_pincode').prop('disabled', false);
            //$('#permanent_address').prop('disabled', false);  
            $('#permanent_statetwo').prop('disabled', true);
            $('#permanent_statethree').prop('disabled', true);
            $('#permanent_citytwo').prop('disabled', true);
            $('#permanent_citythree').prop('disabled', true);
            $('#permanent_pincodetwo').prop('disabled', true);
            $('#permanent_pincodethree').prop('disabled', true);
            $('#permanent_countrytwo').prop('disabled', true);
            $('#permanent_countrythree').prop('disabled', true);


            document.getElementById('permancountrytwo').style.display = 'none';
            document.getElementById('permancountry').style.display = 'block';
            document.getElementById('perman').style.display = 'none';
            document.getElementById('permantwo').style.display = 'block';
            document.getElementById('permancitytwo').style.display = 'none';
            document.getElementById('permancity').style.display = 'block';
            document.getElementById('permanent_pincodetwo').style.display = 'none';
            document.getElementById('permanent_pincode').style.display = 'block';


        }

    }
</script>
