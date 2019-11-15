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

 $userid = Yii::$app->user->identity->id;
 $user = \common\models\User::find()->where(['id'=>$userid])->one();
 $userprofile =\common\models\UserProfile::find()->where(['user_id'=>$userid])->one();
 $userprofileex=\common\models\UserProfileEx::find()->where(['user_id'=>$userid])->one();
$myprofile=\common\models\Myprofile::find()->where(['userID'=>$userid])->one();

CrudAsset::register($this);


 ?>
 <style>
 .fileContainer {
    overflow: hidden;
    position: relative;
}

.fileContainer [type=file] {
    cursor: inherit;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: right;
    top: 0;
}

/* Example stylistic flourishes */

.fileContainer {
       background: #3fc9d5;
    border-radius: .5em;
    float: left;
    padding: 9px 30px 9px 30px;
    margin-left: 10px;
    color: white;
}

.fileContainer [type=file] {
    cursor: pointer;
}

.cahnge_btn{
	    padding: 7px 10px 7px 10px;
    background: #3fc9d5;
    color: #ffffff;
    margin: 0px 0px 0px 6px;
    position: relative;
    top: 7px;
}
.adress_rw{
	 padding:5px;
 }

.thumbnail a>img, .thumbnail>img {

        height: 140px !important;

    }

.row{
    margin-bottom: 17px !important;
}

.bhem{

   float: right;
    margin-top: -7px;
}

.tab-content .tab-pane {
    padding: 20px 0;
}

 </style>
 <!-- start breadcrumb -->

<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
  <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/couserdash']) ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>User</span>
								 <i class="fa fa-circle"></i>
                            </li>
							<li>
                                <span>COMPANY PROFILE</span>
							 </li>
                        </ul>
                        
                    </div>
                <!-- end breadcrumb -->
				 <!-- start Upper section -->
					<br/>
		 <?php 
						$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id,"my_profile");
						if($getprofilestatus){$count = $getprofilestatus->process_status ;}
						else{$count = 0;}
						
						$getprofilestatus1 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id,"my_KYC_upload");
						if($getprofilestatus1){$count1 = $getprofilestatus1->process_status ;}
						else{$count1 = 0;}
						?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">
                               
                                <div class="portlet-body">
                                    <div class="mt-element-step">
                                        <div class="row step-line">
                                             <a href="<?php echo Yii::$app->urlManager->createUrl(['site/copostlogin']) ?>">
                                            <div class="col-md-4 mt-step-col first done">
                                                <div class="mt-step-number bg-white" style="padding:12px 18px; margin-top: -8px;">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                               <div class="mt-step-title uppercase font-grey-cascade">COMPANY Profile</div>
                                                <div class="mt-step-content font-grey-cascade">Fill Your Profile <br/><?php echo $count ?>%</div>
                                            </div></a>
												 <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/documents']) ?>">
                                            <div class="col-md-4 mt-step-col">
                                                <div class="mt-step-number bg-white" style="padding:12px 18px; margin-top: -8px;">
                                                    <i class="fa fa-file"></i>
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade">My Documents</div>
                                                <div class="mt-step-content font-grey-cascade">Add Your Documents <br/><?php echo $count1 ?>%</div>
                                            </div></a>
											 <a href="<?php echo Yii::$app->urlManager->createUrl(['/my-expectationsnew']) ?>">
                                            <div class="col-md-4 mt-step-col last">
                                                <div class="mt-step-number bg-white" style="padding:12px 18px; margin-top: -8px;">
                                                    <i class="icon-rocket"></i>
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade">MY EXPECTATIONS</div>
                                                <div class="mt-step-content font-grey-cascade">My Request  <br/>0</div>
                                            </div></a>
                                        </div>
                                        <br/>
                                        <br/>
                                        
                                    </div>
										 <!-- end  upper section -->
										 	 <!-- start MTPROFILE -->
									 <div class="row">
                              <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Company Details</a>
                                                    </li>
													<li>
                                                        <a href="#tab_1_2" data-toggle="tab">Authorized Signatory info</a>
                                                    </li>
													
                                                   
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
											  
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
													  <div class="tab-pane active" id="tab_1_1">
													  
<div class="company-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','method' =>'post','id'=>'ibform']]); ?>
 <div class="row" style="margin-bottom: 17px !important;">
 <div class="col-md-6">
 <?php 
 $company = \common\models\Company::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
					
 ?>
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 165px; height: 150px;">
																	<?php if($company) { ?>
																	<?php if($company->logo) { ?>
																	 <img id="thumbnail" src="<?php echo Yii::getAlias('@archiveUrl'); ?>/mycompanylogo/<?php echo $company->logo ?>" style="width: 200px; height: 142px;" alt="" /> 
                                                                    </div>
																	 <?php } else { ?>
																	 <img id="thumbnail" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+logo" alt="" /> </div>
																	 <?php } } else { ?>
                                                                        <img id="thumbnail" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+logo" alt="" /> </div>
																	<?php } ?>
																   
<!--                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select logo </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="logo" id="logo" > </span>
                                                                        </div>-->
                                                               <div style="padding:0 0 20px 0;">
                                                        <span class="btn-file span_logo">
                                                            <span class="fileinput-new">  </span>

                                                            <label class="fileContainer"> 
                                                                <i class="fa fa-edit"></i> Edit logo
                                                                <input type="file" name="logo" id="logo" >
                                                            </label>
                                                        </span>
                                                    </div>
     
      
                                                                </div>
                                                                
                                                            </div> </div><div class="col-md-6"><br/>
															
                                                            
                     <?php 
					  if($company){
					 $modelco->name = $company->name;
					 $modelco->person_name = $company->person_name;
					//  $modelco->description = $company->description;
					  $modelco->PAN_card_no =$company->PAN_card_no;
					  $modelco->COI_number =$company->COI_number;
					  $modelco->main_email= $company->main_email;
					  $modelco->main_mobile= $company->main_mobile;
					  $modelco->country= $company->country;
					  $modelco->location= $company->location;
					  $modelco->state= $company->state;
					  $modelco->city= $company->city;
					  $modelco->main_address= $company->main_address;
					 }
					 ?>                                
    <?= $form->field($modelco, 'name')->textInput(['disabled'=>true]) ?>
    <?= $form->field($modelco, 'person_name')->textInput() ?>
	
	
     </div> </div>
	<div class="row">
   <div class="col-md-6">
   <?php 
					  if($company){
						  if($company->PAN_card_no){
						   $modelco->PAN_card_no =$company->PAN_card_no; ?>
						    <?= $form->field($modelco, 'PAN_card_no')->textInput(['disabled'=>true]) ?>
							<div style="display:none;"> <?= $form->field($modelco, 'PAN_card_no')->textInput() ?></div>
						  <?php } else { ?>
						    <?= $form->field($modelco, 'PAN_card_no')->textInput() ?>
						  <?php  }  } else { ?>
    <?= $form->field($modelco, 'PAN_card_no')->textInput() ?>
					<?php   } ?>
    </div> <div class="col-md-6">
    <?php 
					  if($company){
						  if($company->COI_number){
						   $modelco->COI_number =$company->COI_number; ?>
						    <?= $form->field($modelco, 'COI_number')->textInput(['disabled'=>true]) ?>
							<div style="display:none;"> <?= $form->field($modelco, 'COI_number')->textInput() ?></div>
						  <?php } else  { ?>
						    <?= $form->field($modelco, 'COI_number')->textInput() ?>
						  <?php  } } else { ?>
    <?= $form->field($modelco, 'COI_number')->textInput() ?>
					<?php   } ?>
  
 </div> </div>
   <div class="row">
   <div class="col-md-6">
    <?= $form->field($modelco, 'main_email')->textInput(['type' => 'email']) ?>
    </div> <div class="col-md-6">
   
    <?= $form->field($modelco, 'main_mobile')->textInput() ?>
 </div> </div><div class="row">
   <div class="col-md-6">
   <?php $modelco->country ="india" ; ?>
    <div style="display:none"><?= $form->field($modelco, 'country')->dropDownList(['india' => 'India'],['class'=>"form-control countries"]); ?>
</div>
 <?= $form->field($modelco, 'country')->dropDownList(['india' => 'India'],['class'=>"form-control countries",'disabled'=>true]); ?>
	
  </div> <div class="col-md-6">
 
   <?php $getarrayallstates = \common\models\States::find()->where(['country_id'=>101])->all();$temp = 0;
		                                                                      $catListpp = ArrayHelper::map($getarrayallstates,'name','name');
																			 ?> <?php echo $form->field($modelco, 'state')->widget(Select2::classname(), [
                                                                                 'data' => $catListpp,
                                                                             'options' => ['placeholder' => 'Select State...','id'=>'state'],
                                                                                   'pluginOptions' => [
                                                                                       'allowClear' => true
                                                                                                 ],
                                                                                               ]);
																			 //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
																			 ?>
   </div> </div><div class="row">
   <div class="col-md-6">
    <?php //$getarrayallcity = \common\models\Cities::find()->where(['isactive'=>1])->all();$temp = 0;
		                                                                      //$catList = ArrayHelper::map($getarrayallcity,'city','city');
																			 ?>
																			 <?php echo $form->field($modelco, 'city')->widget(DepDrop::classname(), [
																			 'type'=>DepDrop::TYPE_SELECT2,
                                                                               //  'data' => $catList,
                                                                            'options' => ['placeholder' => 'Select ...'],
    'pluginOptions' => [
        'tags' => true,
		//'allowClear'=>true,
        'tokenSeparators' => [',', ' '],
        'maximumInputLength' => 10,
		 'depends'=>['state'],
    'url'=>Url::to(['/site/subcatparentcomp']),
    ],
                                                                                               ]);
																			 //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
																			 ?>
 </div> 
  <div class="col-md-6">
    
  <?= $form->field($modelco, 'location')->textInput() ?>
 </div>
 </div><div class="row">
   <div class="col-md-12">
    <?= $form->field($modelco, 'main_address')->textarea(['rows' => 2]) ?>
</div> </div>
   
   

    

 
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($modelco->isNewRecord ? '<i class="fa fa-check"></i> Save' : 'Update', ['class' => $modelco->isNewRecord ? 'btn btn-success' : 'btn btn-primary','name'=>'savecompanydata']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
</div>   


													  </div>
                                                    <div class="tab-pane" id="tab_1_2">


                           <div class="form-group">
                                        <div class="note note-info note_sam">  
                                               <i class="fa fa-user"></i> Company Sub-Users  </div>
                                       
                               <div class="employee-create">
							   <div id="ajaxCrudDatatable">
  
                                    <?php  $searchModel = new \common\models\SubUserSearch();
                                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                    ?>
                                    <?= Yii::$app->controller->renderPartial('/usernew/index',[
                                       'searchModel' => $searchModel,
                                    'dataProvider' => $dataProvider,
                                    ]);
                                    ?>


                                </div> </div>
                                       <?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
                                       
                                   </div>


                                                        <?php $form = ActiveForm::begin(['method'=>'post',
                                                        //'enableClientValidation' => false
							                                           ]); ?>
													<div class="note note-info note_sam"> <i class="fa fa-user"></i> Authorized  User details </div>

                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
													<div class="note note-info note_sam"> <i class="fa fa-user"></i> User Particulars</div>
                                                        <form role="form" action="#">
														<div class="row">
														 
														<div class="col-md-3" style="display:none">
														 <div class="form-group">
                                                                <label class="control-label">Title<font color="red">*</font></label>
																<?php  $model->title="NIL"; ?>
                                                                <!--$form->field($model, 'title')->dropDownList(['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', ],['prompt'=>'Select..'])->label(false); ?>
                                                                   -->    <?= $form->field($model, 'title')->textInput()->label(false); ?>
																	  </div></div>
                                                                                                                    
                                                                                                                    
                                                   <div class="col-md-3">
                                                    <div class="form-group">
                                                    <label class="control-label">First Name<font color="red">*</font></label>
                                                    <?php
                                                    if($myprofile){
                                                     if($myprofile->first_name){
                                                    $model->first_name=$myprofile->first_name; ?>
													<div style="display:none;"> <?= $form->field($model, 'first_name')->textInput()->label(false); ?> </div>
														  <?= $form->field($model, 'first_name')->textInput(['disabled'=>true])->label(false); ?>
                                                    <?php  } else { ?>
														<?= $form->field($model, 'first_name')->textInput()->label(false); ?>
                                                   <?php  } ?> 
													<?php } else { ?>
													 <?= $form->field($model, 'first_name')->textInput()->label(false); ?>
                                                   <?php }
                                                    ?>
                                                    
                                                    </div></div>
                                                                                                                    
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="control-label">Middle Name</label>
													<?php
                                                    if($myprofile){
                                                     if($myprofile->middlename){
                                                    $model->middlename=$myprofile->middlename;  ?>
													<div style="display:none;"> <?= $form->field($model, 'middlename')->textInput()->label(false); ?> </div>
														  <?= $form->field($model, 'middlename')->textInput(['disabled'=>true])->label(false); ?>
                                                    <?php } else { ?>
														 <?= $form->field($model, 'middlename')->textInput()->label(false); ?>
                                                   <?php  } ?>
													<?php } else { ?>
													 <?= $form->field($model, 'middlename')->textInput()->label(false); ?>
                                                   <?php }
                                                    ?>
                                                   
                                                    </div> </div> <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="control-label">Last Name<font color="red">*</font></label>
													<?php
                                                    if($myprofile){
                                                     if($myprofile->last_name){
                                                    $model->last_name=$myprofile->last_name; ?>
													<div style="display:none;"> <?= $form->field($model, 'last_name')->textInput()->label(false); ?> </div>
														  <?= $form->field($model, 'last_name')->textInput(['disabled'=>true])->label(false); ?>
                                                   <?php } else { ?>
														<?= $form->field($model, 'last_name')->textInput()->label(false); ?>
                                                   <?php  } ?> 
													<?php } else { ?>
													 <?= $form->field($model, 'last_name')->textInput()->label(false); ?>
                                                   <?php }
                                                    ?>
                                                   
                                                    </div> </div>
                                                                                                                    
                                                                                                             </div>
																
																<div class="row">
                                                                                                                                    
                                                                                                                                     <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Gender<font color="red">*</font></label>
																<?php
                                                    if($myprofile){
                                                     if($myprofile->gender){
                                                    $model->gender=$myprofile->gender; ?>
													<div style="display:none;"> <?= $form->field($model, 'gender')->textInput()->label(false); ?> </div>
														  <?= $form->field($model, 'gender')->textInput(['disabled'=>true])->label(false); ?>
                                                  <?php   } else { ?>
														<?= $form->field($model, 'gender')->dropDownList(['Male' => 'Male', 'Female' => 'Female' ],['prompt'=>'Select..'])->label(false); ?>
													<?php  } ?> <?php } else { ?>
													    <?= $form->field($model, 'gender')->dropDownList(['Male' => 'Male', 'Female' => 'Female' ],['prompt'=>'Select..'])->label(false); ?>
																
                                                   <?php } ?></div></div>
														
																<div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">DOB<font color="red">*</font></label>
																	<?php
                                                    if($myprofile){
                                                     if($myprofile->dob){
                                                    $model->dob=$myprofile->dob; ?>
													<div style="display:none;"> <?= $form->field($model, 'dob')->textInput()->label(false); ?> </div>
														  <?= $form->field($model, 'dob')->textInput(['disabled'=>true])->label(false); ?>
                                                  <?php   } else { ?>
																															<?php 
																	echo $form->field($model, 'dob')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter DOB ...',
	'id'=>'dob',
	
	'format'=>'y-m-d',
	'onChange'=>'checkvalidatn(this.value)'
	],
    'pluginOptions' => [
        'autoclose'=>true
    ]
])->label(false); ?>	<?php  } ?> <?php } else { ?>
													    																	<?php 
																	echo $form->field($model, 'dob')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter DOB ...',
	//'name'=>'dob',
	'id'=>'dob',
	'format'=>'y-m-d',
	'onChange'=>'checkvalidatn(this.value)'
	],
    'pluginOptions' => [
        'autoclose'=>true
    ]
])->label(false); ?><?php } ?>
																 
																
                                                                 </div> </div>
                                                                                <div class="col-md-4">
                                                <div class="form-group">
                                                <?php
                                                if($myprofile){
                                                 if($myprofile->martial_status){
                                                $model->martial_status=$myprofile->martial_status;
                                                }}
                                                ?>
                                                <label class="control-label">Marital Status<font color="red">*</font></label>
                                                <?= $form->field($model, 'martial_status')->dropDownList(['Married' => 'Married', 'Un-Married' => 'Single' ],['prompt'=>'Select..'])->label(false) ?> 
                                                </div> 
                                                </div>
                                                                                                           
                                                
                                                                                                                                    
                                                                                                                                    
                                               
																
																</div>
                                                            <div class="row">
                                                                                                                                             
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                <?php
                                                if($myprofile){
                                                 if($myprofile->nationality){
                                                $model->nationality=$myprofile->nationality;
                                                }}
                                                ?>
                                                <label class="control-label">Nationality<font color="red">*</font></label>
                                                <?= $form->field($model, 'nationality')->dropDownList(['indiancitizen' => 'Indian', 'NRI' => 'NRI','OCI'=> 'OCI','PIO'=> 'PIO'],['prompt'=>'Select..','onChange'=>"focalnation()",'id'=>'nationality'])->label(false) ?> 
                                                </div> 
                                                </div><div class="col-md-4" style="display:none;">
												  <div class="form-group" style="display:none;">
															<label class="control-label">Minor<font color="red">*</font></label>
                                                                
															<?php
																if($myprofile){
                                                                                                                                    
																 if($myprofile->isMinor){ ?>
																
																 <?php } ?>	  <?php } ?>	  
                                                                 <select id="isMinor" class="form-control" value = "No" onChange="focaldiv()" name="isMinor">
                                                                                     <option value="No">No</option>
                                                                     <option value="Yes">Yes</option>
                                                                             </select>								
				
																</div>
                                                            </div>
														<?php
                                               
                                                    if($myprofile){
                                                     if($myprofile->countryverificatn){
                                                    $model->countryverificatn=$myprofile->countryverificatn;
                                                    }}
                                                   
                                                    ?>
																<div class="col-md-4">
																<div id="divo6" style="display:none;">
                                                            <div class="form-group">
                                                                <label class="control-label">Country Identification Number<font color="red">*</font></label>
																
																
															 <?= $form->field($model, 'countryverificatn')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Country Identification Number','onkeyup'=>"javascript:capitalize(this.id, this.value);"])->label(false); ?>
                                                  
                                                               </div></div>
															   <div id="divo8" style="display:none;">
                                                            <div class="form-group">
                                                                <label class="control-label">OCI Number<font color="red">*</font></label>
																
																
															 <?= $form->field($model, 'ocinumber')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'OCI Number','onkeyup'=>"javascript:capitalize(this.id, this.value);"])->label(false); ?>
                                                  
                                                               </div></div>
															   <div id="divo9" style="display:none;">
                                                            <div class="form-group">
                                                                <label class="control-label">PIO Number<font color="red">*</font></label>
																
																
															 <?= $form->field($model, 'pionumber')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'PIO Number','onkeyup'=>"javascript:capitalize(this.id, this.value);"])->label(false); ?>
                                                  
                                                               </div></div>
															   <div id="divo7" style="display:none;">
															   <div class="form-group">
                                                                <label class="control-label">PAN Card<font color="red">*</font></label>
																<?php
                                               
                                                    if($myprofile){
                                                     if($myprofile->pan_card_no){
                                                    $model->pan_card_no=$myprofile->pan_card_no;
                                                    }}
                                                   
                                                    ?>
																
															 <?= $form->field($model, 'pan_card_no')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'PAN Card','onkeyup'=>"javascript:capitalize(this.id, this.value);"])->label(false); ?>
                                                   
                                                               </div></div>
															   </div>
																<?php
                                                   if($myprofile){
                                                     if($myprofile->adhar_card_no){
                                                    $model->adhar_card_no=$myprofile->adhar_card_no;
                                                    }}
                                                   
                                                    ?>
																<div class="col-md-4 col-xs-6">
																<div id="divo4" style="display:none;">
                                                            <div class="form-group">
                                                                <label class="control-label">Aadhar Card<font color="red">*</font></label>
																
													<?= $form->field($model, 'adhar_card_no')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Aadhar Card'])->label(false); ?>
                                                   
                                                               </div></div>
															   <div id="divo5" style="display:none;">
															   <?php
                                                   if($myprofile){
                                                     if($myprofile->passportno){
                                                    $model->passportno=$myprofile->passportno;
                                                    }}
                                                   
                                                    ?>
                                                            <div class="form-group">
                                                                <label class="control-label">Passport Number<font color="red">*</font></label>
																
													<?= $form->field($model, 'passportno')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Passport Number','onkeyup'=>"javascript:capitalize(this.id, this.value);"])->label(false); ?>
                                                   
                                                               </div></div>
															   
															   </div>
																</div>
														
																 <div class="row">
                                                            <div class="form-group">
                                                                <div class="note note-info note_sam">  <label class="control-label">
                                                        <!--<button class="add_field_button1"><i class="fa fa-plus"></i></button>-->Contact Number<font color="red">*</font>&nbsp;&nbsp;&nbsp;<i><b></b></i></label></div>
                                                      <!-- -->
													  <div class="input_fields_wrap1 row">
													 <?php 
													 
													 $primarynotype = \common\models\UserPhoneconfig::find()->where(['userid'=>Yii::$app->user->identity->id ,'isdefault'=>1])->one();
													 if($primarynotype){
														
														$primarytype = \common\models\Phonenumbers::find()->where(['id'=>$primarynotype->phoneid])->one();
													  if($primarytype){
														 
														 // exit();
														  $model->phonetypeprimary=$primarytype->phonetype;
														   if($primarytype->country_code){
														   $model->phonecodetypeprim=$primarytype->country_code; } else { 
														   $model->phonecodetypeprim = Yii::$app->user->identity->countrycode;  }
														  if($primarytype->phone_no){
														  $model->phonenumbersprim=$primarytype->phone_no;
														  } else {
															   $model->phonenumbersprim = Yii::$app->user->identity->username; 
														  }
													  }
													 } else {
														  $model->phonecodetypeprim = Yii::$app->user->identity->countrycode; 
														  $model->phonenumbersprim = Yii::$app->user->identity->username; 
													 }
													
													 ?>
															
															<div class="col-md-4">
															 <label class="control-label">Primary Number Type<font color="red">*</font></label>
															<?= $form->field($model, 'phonetypeprimary')->dropDownList(['Mobile' => 'Mobile', 'Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other' ],['prompt'=>'Select type..','class'=>"form-control"])->label(false); ?>
																
															  
															</div>
															<div class="col-md-3">
															
															 <label class="control-label">Country Code<font color="red">*</font></label>
															 <?php $arrfindallcountriescode = \common\models\Countries::find()->all(); 
                                                                   $findallcountriescode = ArrayHelper::map($arrfindallcountriescode,'phonecode','phonecode');
															 ?>
															 <?php echo $form->field($model, 'phonecodetypeprim')->widget(Select2::classname(), [
																			 'data'=>$findallcountriescode,
                                                                             'options' => ['placeholder' => 'Select Country Code...'],
                                                                                   'pluginOptions' => [
																				   'placeholder' => 'Select Country Code...',
                                                                                       'allowClear' => true],
                                                                                               ])->label(false); ?>
                                                   
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div>
															<div class="col-md-4">
															 <label class="control-label">Primary Number<font color="red">*</font></label>
                                                                                                                          
															 <?= $form->field($model, 'phonenumbersprim')->textInput(['class'=>'form-control phone_no'])->label(false); ?>
                                                   
                                                                                                                        
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div></div>
															<?php 
													 
													 $secondnotype = \common\models\UserPhoneconfig::find()->where('userid =:userid and isdefault != :config',array(':userid'=>Yii::$app->user->identity->id ,'config'=>1))->one();
													 if($secondnotype){
														
														$secondtype = \common\models\Phonenumbers::find()->where(['id'=>$secondnotype->phoneid])->one();
													  if($secondtype){
														 
														 // exit();
														  $model->phonetypesecondary=$secondtype->phonetype;
														  $model->phonecodetypecorres=$secondtype->country_code;
														  $model->phonenumbersecondary=$secondtype->phone_no;
														  
													  }
													 }
													
													 ?>
															 <div class="row">
															<div class="col-md-4">
															 <label class="control-label">Secondary Number Type</label>
															<?= $form->field($model, 'phonetypesecondary')->dropDownList(['Mobile' => 'Mobile', 'Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other' ],['prompt'=>'Select type..','class'=>"form-control"])->label(false); ?>
																
															  
															</div>
															<div class="col-md-3">
															 <label class="control-label">Country Code</label>
															
                                                   	 <?php echo $form->field($model, 'phonecodetypecorres')->widget(Select2::classname(), [
																			 'data'=>$findallcountriescode,
                                                                             'options' => ['placeholder' => 'Select Country Code...'],
                                                                                   'pluginOptions' => [
																				   'placeholder' => 'Select Country Code...',
                                                                                       'allowClear' => true],
                                                                                               ])->label(false); ?>
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div>
															<div class="col-md-4">
															 <label class="control-label">Secondary Number </label>
															 <?= $form->field($model, 'phonenumbersecondary')->textInput(['class'=>'form-control phone_no'])->label(false); ?>
                                                   
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div>
															
															</div></div></div><div class="row">
															 <div class="form-group">
                                                                <div class="note note-info note_sam">  <label class="control-label">
                                                        <!--<button class="add_field_button1"><i class="fa fa-plus"></i></button>--> Contact E-mail<font color="red">*</font>&nbsp;&nbsp;&nbsp;<i><b></b></i></label></div>
                                                      <!-- -->
													  <div class="input_fields_wrap1 row">
													   <?php 
													 
													 $primemailtype = \common\models\UserEmailconfig::find()->where('userid =:userid and isdefault = :config',array(':userid'=>Yii::$app->user->identity->id ,'config'=>1))->one();
													 if($primemailtype){
														
														$primmyemailtype = \common\models\Emailaddresses::find()->where(['id'=>$primemailtype->emailid])->one();
													  if($primmyemailtype){
														 
														 // exit();
														  $model->emailtypeprimary=$primmyemailtype->emailtype;
														  $model->emailnumbersprim=$primmyemailtype->emailaddress;
														 
														  
													  }    
													 } else {
														 $model->emailnumbersprim= Yii::$app->user->identity->email ;
														 
													 }
													 $secondemailtype = \common\models\UserEmailconfig::find()->where('userid =:userid and isdefault != :config',array(':userid'=>Yii::$app->user->identity->id ,'config'=>1))->one();
													 if($secondemailtype){
														
														$secondmyemailtype = \common\models\Emailaddresses::find()->where(['id'=>$secondemailtype->emailid])->one();
													  if($secondmyemailtype){
														 
														 // exit();
														  $model->emailtypesecondary =$secondmyemailtype->emailtype;
														  $model->emailnumbersecondary=$secondmyemailtype->emailaddress;
														 
														  
													  }
													 }
													
													 ?>
															 
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Primary E-mail Type<font color="red">*</font></label>
															<?= $form->field($model, 'emailtypeprimary')->dropDownList(['Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other' ],['prompt'=>'Select type..','class'=>"form-control"])->label(false); ?>
																
															  
															</div>
															
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Primary E-mail<font color="red">*</font></label>
                                                            <?= $form->field($model, 'emailnumbersprim')->textInput(['type' => 'email','class'=>'form-control'])->label(false); ?>
                                                   
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div></div>
															
															 <div class="row">
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Secondary E-mail Type</label>
															<?= $form->field($model, 'emailtypesecondary')->dropDownList(['Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other' ],['prompt'=>'Select type..','class'=>"form-control"])->label(false); ?>
																
															  
															</div>
															
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Secondary E-mail </label>
															 <?= $form->field($model, 'emailnumbersecondary')->textInput(['type' => 'email','class'=>'form-control'])->label(false); ?>
                                                   
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div>
															
															</div>
															
															</div></div>
                                                       
														 <div class="form-group">
                                                                <div class="note note-info note_sam"> <label class="control-label">Current  address<font color="red">*</font>&nbsp;&nbsp;&nbsp;<i><b></b></i></label></div>
                                                               <div class="input_fields_wrap2">
                                                            <div class="row">
																<div class="col-md-12" style="padding:8px 0 20px 0;">
																	<?php
                                                   if($myprofile){
                                                     if($myprofile->current_address){
                                                    $model->current_address=$myprofile->current_address;
                                                    }
                                                     if($myprofile->current_state){
                                                    $model->current_state=$myprofile->current_state;
                                                    }
													if($myprofile->current_country){
                                                    $model->current_country=$myprofile->current_country;
                                                    }
													if($myprofile->current_city){
                                                    $model->current_city=$myprofile->current_city;
                                                    }
													if($myprofile->current_pincode){
                                                    $model->current_pincode=$myprofile->current_pincode;
                                                    }
													}
                                                   
                                                    ?>
																<div class="col-md-12">
<!--																	<div class="col-md-1 butn_ad col-xs-1">
																	<button class="add_field_button2"><i class="fa fa-plus"></i></button> 
																	</div>-->
																	<div class="col-sm-11 col-xs-5">

																		<?= $form->field($model, 'current_address')->textarea(['class'=>'form-control','placeholder'=>"Enter Address ,street address or landmark.." ,'rows'=>"3",'id'=>'current_address'])->label(false); ?>
                                                   
															</div><br/>
																	<div class="col-sm-3 col-xs-5">
																	<?php $arrfindallcountries = \common\models\activemode::findallcountries();
																	       $arrcountrylist = ArrayHelper::map($arrfindallcountries,'name','name');
																	?>
																	
															        <?php echo $form->field($model, 'current_country')->widget(Select2::classname(), [
                                                                                 'data' => $arrcountrylist,
                                                                             'options' => ['placeholder' => 'Select country...','id'=>'current_country'],
                                                                                   'pluginOptions' => [
                                                                                       'allowClear' => true
                                                                                                 ],
                                                                                               ])->label(false);
																			 //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
																			 ?>
																			
																	</div>
																	 <div class="col-sm-3 col-xs-5">
																	 <?php 
																	 if($myprofile){
                                                     $model->current_state=$myprofile->current_state;
													  $findcountry = \common\models\Countries::find()->where(['name'=>$model->current_country])->one();
													  $arrfindstates = \common\models\States::find()->where(['country_id'=>$findcountry->id])->all();
													   $liststate = ArrayHelper::map($arrfindstates,'name','name');
													    echo $form->field($model, 'current_state')->widget(DepDrop::classname(), [
																		           'data'=>$liststate,
                                                                                 'type'=>DepDrop::TYPE_SELECT2,
                                                                             'options' => ['id'=>'current_state','placeholder' => 'Select State...'],
                                                                                   'pluginOptions' => [
																				   'placeholder' => 'Select State...',
                                                                                       'allowClear' => true,
																					    'depends'=>['current_country'],
                                                                                      'url'=>Url::to(['/site/subcatparent']),
                                                                                                 ],
                                                                                               ])->label(false);
																			 //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
																			 
                                                    } else { ?>
																	     <?php echo $form->field($model, 'current_state')->widget(DepDrop::classname(), [
																		           
                                                                                 'type'=>DepDrop::TYPE_SELECT2,
                                                                             'options' => ['id'=>'current_state','placeholder' => 'Select State...'],
                                                                                   'pluginOptions' => [
																				   'placeholder' => 'Select State...',
                                                                                       'allowClear' => true,
																					    'depends'=>['current_country'],
                                                                                      'url'=>Url::to(['/site/subcatparent']),
                                                                                                 ],
                                                                                               ])->label(false);
																			 //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
																			 ?>
													<?php } ?>
																	  </div>
																	 
																	 <div class="col-sm-3 col-xs-5">
																	 <?php  if($myprofile){
                                                     $model->current_state=$myprofile->current_state;
													  $findstates = \common\models\States::find()->where(['name'=>$model->current_state])->one();
													  $arrfindcities = \common\models\Cities::find()->where(['state_id'=>$findstates->id])->all();
													   $listcity = ArrayHelper::map($arrfindcities,'name','name'); ?>
													   <?php echo $form->field($model, 'current_city')->widget(DepDrop::classname(), [
																			'data'=>$listcity,
																			  'type'=>DepDrop::TYPE_SELECT2,
                                                                                 //'data' => $catList,
                                                                             'options' => ['id'=>'current_city'],
                                                                                   'pluginOptions' => [
																				   'placeholder' => 'Select City...',
																				   'depends'=>['current_state'],
                                                                                      'url'=>Url::to(['/site/subcat']),
                                                                                       'allowClear' => true
                                                                                                 ],
                                                                                               ])->label(false);
																	 ?>
																	<?php  } else { ?>
																	 	<?php echo $form->field($model, 'current_city')->widget(DepDrop::classname(), [
																			
																			  'type'=>DepDrop::TYPE_SELECT2,
                                                                                 //'data' => $catList,
                                                                             'options' => ['id'=>'current_city'],
                                                                                   'pluginOptions' => [
																				   'placeholder' => 'Select City...',
																				   'depends'=>['current_state'],
                                                                                      'url'=>Url::to(['/site/subcat']),
                                                                                       'allowClear' => true
                                                                                                 ],
                                                                                               ])->label(false);
																			 //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
																	 } ?>
																			
																			
																		</div>
																		<div class="col-sm-2 col-xs-5">
																			<?= $form->field($model, 'current_pincode')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Pincode','id'=>'current_pincode'])->label(false); ?>
                                                   
																		</div>
																		
																	</div>
																</form>
																</div>
															</div>
															
                                                                </div>
															   </div>
																	 

                                                                <div class="form-group">
                                                                <div class="note note-info note_sam"> <label class="control-label">Permanent address<font color="red">*</font>&nbsp;&nbsp;&nbsp;<i><b><input type="checkbox" id="checkaddr" name="checkaddr" <?php  if(!$myprofile){ ?> onclick="FillBilling(this.form)" <?php } ?> > Same as above</b></i></label></div>
                                                              <div class="input_fields_wrap2">
                                                            <div class="row">
																<div class="col-md-12" style="padding:8px 0 20px 0;">
																	<?php
                                                   if($myprofile){
                                                    
                                                     if($myprofile->permanent_state){
                                                    $model->permanent_state=$myprofile->permanent_state;
                                                    }
													if($myprofile->permanent_country){
                                                    $model->permanent_country=$myprofile->permanent_country;
                                                    }
													if($myprofile->permanent_city){
                                                    $model->permanent_city=$myprofile->permanent_city;
                                                    }
													if($myprofile->permanent_pincode){
                                                    $model->permanent_pincode=$myprofile->permanent_pincode	;
                                                    }
													}
                                                      
                                                    ?>
																<div class="col-md-12">

																	<div class="col-sm-11 col-xs-5">
																	<?php 
																	if($myprofile){
																	if($myprofile->permanent_address){
                                                    $model->permanent_address=$myprofile->permanent_address; ?>
													 <?= $form->field($model, 'permanent_address')->textarea(['class'=>'form-control','placeholder'=>"Enter Address ,street address or landmark.." ,'rows'=>"3",'id'=>'permanent_address','disabled'=>true])->label(false); ?> </div>
													 <div style="display:none;"><?= $form->field($model, 'permanent_address')->textarea(['class'=>'form-control','placeholder'=>"Enter Address ,street address or landmark.." ,'rows'=>"3",'id'=>'permanent_address','type'=>'hidden'])->label(false); ?>
																	</div><?php } }  else { ?>
													 <?= $form->field($model, 'permanent_address')->textarea(['class'=>'form-control','placeholder'=>"Enter Address ,street address or landmark.." ,'rows'=>"3",'id'=>'permanent_address'])->label(false); ?> </div>
													<?php } ?>
															 
														
															<br/>
																	<div class="col-sm-3 col-xs-5">
																
																	
																	<?php $arrfindallcountriestwo = \common\models\activemode::findallcountries();
																	       $arrcountrylisttwo = ArrayHelper::map($arrfindallcountriestwo,'name','name');
																	?>
																	<?php if($myprofile){
																	if($myprofile->permanent_country){
                                                    $model->permanent_country=$myprofile->permanent_country; ?>
													<?= $form->field($model, 'permanent_country')->textInput(['id'=>'permanent_country' ,'disabled'=>true])->label(false); ?>
													<div style="display:none;"><?= $form->field($model, 'permanent_country')->textInput(['id'=>'permanent_country'])->label(false); ?>
																	</div><?php } } else { ?>
																	<div id="permancountry" style="display:block">
															        <?php echo $form->field($model, 'permanent_country')->widget(Select2::classname(), [
                                                                                 'data' => $arrcountrylisttwo,
                                                                             'options' => ['placeholder' => 'Select country...','id'=>'permanent_country'],
                                                                                   'pluginOptions' => [
                                                                                       'allowClear' => true
                                                                                                 ],
                                                                                               ])->label(false);
																			 //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
																			 ?></div> 
															<div id="permancountrytwo" style="display:none"><?= $form->field($model, 'permanent_country')->textInput(['class'=>'form-control','id'=>'permanent_countrytwo','disabled'=>true])->label(false); ?></div>
                                                                               <div style="display:none"><?= $form->field($model, 'permanent_country')->textInput(['id'=>'permanent_countrythree'])->label(false); ?></div>
													<?php } ?>
																			
																	</div>
																	 <div class="col-sm-3 col-xs-5">
																	 <?php if($myprofile){
																	 if($myprofile->permanent_state){
                                                    $model->permanent_state=$myprofile->permanent_state; ?>
													<?= $form->field($model, 'permanent_state')->textInput(['id'=>'permanent_state' ,'disabled'=>true])->label(false); ?>
													<div style="display:none;"><?= $form->field($model, 'permanent_state')->textInput(['id'=>'permanent_state'])->label(false); ?>
																	 </div><?php } } else { ?>
																	        <div id="permantwo" style="display:block">
																			 <?php echo $form->field($model, 'permanent_state')->widget(DepDrop::classname(), [
																			
                                                                                 'type'=>DepDrop::TYPE_SELECT2,
                                                                             'options' => ['id'=>'permanent_state','placeholder' => 'Select State...'],
                                                                                   'pluginOptions' => [
																				   'placeholder' => 'Select State...',
                                                                                       'allowClear' => true,
																					    'depends'=>['permanent_country'],
                                                                                      'url'=>Url::to(['/site/subcatparent']),
                                                                                                 ],
                                                                                               ])->label(false);
																			 //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
																			 ?></div>
																			   <div id="perman" style="display:none"><?= $form->field($model, 'permanent_state')->textInput(['class'=>'form-control','id'=>'permanent_statetwo','disabled'=>true])->label(false); ?></div>
                                                                               <div style="display:none"><?= $form->field($model, 'permanent_state')->textInput(['id'=>'permanent_statethree'])->label(false); ?></div>
													<?php } ?>
																	  </div>
																	 
																	 <div class="col-sm-3 col-xs-5">
																	  <?php if($myprofile){
																	  if($myprofile->permanent_city){
                                                    $model->permanent_city=$myprofile->permanent_city; ?>
													<?= $form->field($model, 'permanent_city')->textInput(['id'=>'permanent_city' ,'disabled'=>true])->label(false); ?>
													<div style="display:none;"><?= $form->field($model, 'permanent_city')->textInput(['id'=>'permanent_city'])->label(false); ?>
																	 </div> <?php } } else { ?>
																			  <div id="permancity" style="display:block">
																			<?php echo $form->field($model, 'permanent_city')->widget(DepDrop::classname(), [
																			  'type'=>DepDrop::TYPE_SELECT2,
                                                                                 
                                                                             'options' => ['id'=>'permanent_city'],
                                                                                   'pluginOptions' => [
																				   'placeholder' => 'Select City...',
																				   'depends'=>['permanent_state'],
                                                                                      'url'=>Url::to(['/site/subcat']),
                                                                                       'allowClear' => true
                                                                                                 ],
                                                                                               ])->label(false);
																			 //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
																			 ?></div>
																			<div id="permancitytwo" style="display:none"><?= $form->field($model, 'permanent_city')->textInput(['class'=>'form-control','id'=>'permanent_citytwo','disabled'=>true])->label(false); ?></div>
                                                                               <div style="display:none"><?= $form->field($model, 'permanent_city')->textInput(['id'=>'permanent_citythree'])->label(false); ?></div>
													<?php } ?>
																		</div>
																		<div class="col-sm-2 col-xs-5">
																		<?php if($myprofile){ if($myprofile->permanent_pincode){
                                                    $model->permanent_pincode=$myprofile->permanent_pincode; ?>
													<?= $form->field($model, 'permanent_pincode')->textInput(['id'=>'permanent_pincode' ,'disabled'=>true])->label(false); ?>
													<div style="display:none;"><?= $form->field($model, 'permanent_pincode')->textInput(['id'=>'permanent_pincode'])->label(false); ?>
																		</div><?php } } else { ?>
													
																<div id="permanent_pincode" style="display:block">
													<?= $form->field($model, 'permanent_pincode')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Pincode','id'=>'permanent_pincode'])->label(false); ?>
                                                      </div>
													  <div id="permanent_pincodetwo" style="display:none">
													<?= $form->field($model, 'permanent_pincode')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Pincode','id'=>'permanent_pincodetwo','disabled'=>true])->label(false); ?>
                                                      </div> 
													  <div style="display:none;"><?= $form->field($model, 'permanent_pincode')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Pincode','id'=>'permanent_pincodethree'])->label(false); ?></div>
                                                    
													<?php  } ?>
																	</div>
																		
																	</div>
																</form>
																</div>
															</div>
															
                                                                </div>
															   </div>
                                                      <script>
														   function FillBilling(f) { 
														  
																	 if(f.checkaddr.checked == true) {
																		  //$('#permanent_country').val($('#current_country').val());
																	      // $('#permanent_countrytwo').val($('#current_country').val());
																	      // $('#permanent_countrythree').val($('#current_country').val());
																	      
                                                                         //jQuery.when(jQuery('#permanent_country').select2(select2_194d66c6)).done(initS2Loading('permanent_country','s2options_d6851687'));
                                                                        
																		 document.getElementById('perman').style.display='block';
													                     document.getElementById('permantwo').style.display='none';
																		 document.getElementById('permancitytwo').style.display='block';
													                     document.getElementById('permancity').style.display='none';
																		 document.getElementById('permancountrytwo').style.display='block';
													                     document.getElementById('permancountry').style.display='none';
																		 document.getElementById('permanent_pincodetwo').style.display='block';
													                     document.getElementById('permanent_pincode').style.display='none';
																			  

																		
																	      f.permanent_statetwo.value = f.current_state.value;
																		  f.permanent_statethree.value = f.current_state.value;
																		  f.permanent_citytwo.value = f.current_city.value;
																		  f.permanent_citythree.value = f.current_city.value;
																	      f.permanent_pincodetwo.value = f.current_pincode.value;
																	      f.permanent_pincodethree.value = f.current_pincode.value;
																	      f.permanent_address.value = f.current_address.value;
																		  f.permanent_countrytwo.value = f.current_country.value;
																	      f.permanent_countrythree.value = f.current_country.value;
																		   
																		  //$('#permanent_address').prop('disabled', true);  
																		  $('#permanent_state').prop('disabled', true);
																			  $('#permanent_country').prop('disabled', true);
																			  $('#permanent_city').prop('disabled', true);
																			  $('#permanent_pincode').prop('disabled', true);
																	   
														   } else {
															                 
																		
															              // f.permanent_statetwo.value = 'NIL';
																		  // f.permanent_statethree.value = 'NIL';
																		  // f.permanent_citytwo.value = 'NIL';
																		  // f.permanent_citythree.value = 'NIL';
																	     // f.permanent_pincodetwo.value = '100000';
																	     // f.permanent_pincodethree.value = '100000';
																	      // f.permanent_address.value = 'NIL';
																	      // f.permanent_countrytwo.value = 'NIL';
																	      // f.permanent_countrythree.value = 'NIL';
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
																	     
																			  
															             document.getElementById('permancountrytwo').style.display='none';
													                     document.getElementById('permancountry').style.display='block';
																		 document.getElementById('perman').style.display='none';
													                     document.getElementById('permantwo').style.display='block';
																		 document.getElementById('permancitytwo').style.display='none';
													                     document.getElementById('permancity').style.display='block';
																		 document.getElementById('permanent_pincodetwo').style.display='none';
													                     document.getElementById('permanent_pincode').style.display='block';
																			
															   
														   }
														   
														   }
																						   </script>
																						   </script>
                                                       
																<div class="margiv-top-10">
															<?php echo Html::submitButton('<i class="fa fa-plus-square"></i> Save',['class'=>'btn green','name'=>'savedata','id'=>'savedata']);?>
															
															<?php echo Html::submitButton('<i class="fa fa-check"></i> Save & Upload Documents',['class'=>'btn green','name'=>'savedatadocs','id'=>'savedatadocs']);?>
															
															  <a style="display:none;" href="<?php echo yii::$app->urlManager->createUrl(['common/documents']) ?>" class="btn btn-info"><i class="fa fa-share"></i> Next</a>
                                                            
                                                                <div align="right"><font color="red"><i>* Mandatory Fields</i></font></div>
                                                            </div>
                                                          
                                                        </form>
														  
                                                    </div><?php ActiveForm::end(); ?></div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
													  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','method' =>'post','id'=>'ibform']]); ?>

                                                        <form action="#" role="form">
														<div class="row"><div class="col-md-5">
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <?php echo $form->field($model2->getModel('profile'), 'picture')->widget(
        Upload::classname(),
        [
            'url' => ['avatar-upload']
        ]
    )?>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger">NOTE! </span>
                                                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                                </div>
                                                            </div>
                                                           </div><div class="col-md-6">
														    
   
                                                             <div class="form-group">
                                                                <label class="control-label">Username</label>
																
                                                              <?php echo $form->field($model2->getModel('account'), 'username')->label(false) ?>
                                                                </div>
																 <div class="form-group">
                                                                <label class="control-label">E-mail</label>
																
                                                                 <?php echo $form->field($model2->getModel('account'), 'email')->label(false)  ?>
                                                                 </div>
   
                                                            <div class="form-group">
                                                                <label class="control-label">New Password</label>
                                                                <?php echo $form->field($model2->getModel('account'), 'password')->passwordInput()->label(false)  ?>
                                                              </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Re-type New Password</label>
                                                                <?php echo $form->field($model2->getModel('account'), 'password_confirm')->passwordInput()->label(false)  ?>
                                                         </div>
                                                            <div class="margin-top-10">
															  <?php echo Html::submitButton(Yii::t('frontend', 'Change Password'), ['class' => 'btn btn-primary','name'=>'savecreddata']) ?>
                                                             
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
														 <?php ActiveForm::end(); ?>
                                                    </div> </div> </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                    <!-- PRIVACY SETTINGS TAB -->
													
													   
                                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>					   
                                                                                           <script>

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
													  function focaldiv(){
													  var foc=$('#isMinor').val();
													  
													  if(foc=='Yes'){
														 
														  $('a[href="<?php echo Yii::$app->urlManager->createUrl(['userguardiandetails/create']) ?>"]').click();
													 document.getElementById('divo1').style.display='block';
													  document.getElementById('divo2').style.display='block';
													  
													 document.getElementById('minorrelation').style.display='block';
													  document.getElementById('guardianname').style.display='block';
													   
													   
													  }
													  // else {
													  // document.getElementById('divo1').style.display='none';
													  // document.getElementById('divo2').style.display='none';
													   
													 // document.getElementById('minorrelation').style.display='none';
													  // document.getElementById('guardianname').style.display='none';
														 
													 
													  // }
														  
														
														  
														  
													  } </script>
	                                            <script>
													$(document).ready(function(){
														focalnation();
													});
	                                          function focalnation(){
												    var foc=$('#nationality').val();
													  if(foc =='NRI'){
														
													  
													  document.getElementById('divo5').style.display='block';
													  document.getElementById('divo6').style.display='block';
													  document.getElementById('divo7').style.display='none';
													  document.getElementById('divo4').style.display='none';
													  document.getElementById('divo8').style.display='none';
													    document.getElementById('divo9').style.display='none';
													  }
													   if(foc == 'indiancitizen'){
														   document.getElementById('divo4').style.display='block';
													  document.getElementById('divo6').style.display='none';
													  document.getElementById('divo7').style.display='block';
													  document.getElementById('divo5').style.display='none';
													  document.getElementById('divo8').style.display='none';
													    document.getElementById('divo9').style.display='none';
													  }
													   if(foc =='OCI'){
														
													  
													  document.getElementById('divo9').style.display='none';
													  document.getElementById('divo6').style.display='none';
													  document.getElementById('divo7').style.display='none';
													  document.getElementById('divo4').style.display='none';
													    document.getElementById('divo5').style.display='block';
													   document.getElementById('divo8').style.display='block';
													  } if(foc =='PIO'){
														
													  
													  document.getElementById('divo8').style.display='none';
													  document.getElementById('divo6').style.display='none';
													  document.getElementById('divo9').style.display='block';
													    document.getElementById('divo5').style.display='block';
													  document.getElementById('divo7').style.display='none';
													  document.getElementById('divo4').style.display='none';
													  
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
  function checkvalidatn(birthdayp){
 // birthday is a date
 var str = birthdayp.toString("y-m-d");
 var birthday = new Date(str);
    var ageDifMs = Date.now() - birthday.getTime();
	
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    var userage =  Math.abs(ageDate.getUTCFullYear() - 1970);
	if(userage < 18){
         alert('Age Should be greater than 18.');
		 $('#dob').val("");
	}
  }
  </script>
                                                    
                                                    <!-- END PRIVACY SETTINGS TAB -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
               
									
                                </div>
                            </div>
                        </div>
						        	 <!-- end MTPROFILE -->
									 	 <!-- start MTPROFILE status section -->
						
								 
								
                              
									</div></div>
                   	 <!-- end MTPROFILE status section -->
          
						   
	
