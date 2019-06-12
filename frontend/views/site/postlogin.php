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
//use johnitvn\ajaxcrud\CrudAsset;
// use johnitvn\ajaxcrud\BulkButtonWidget;
$this->title = 'My Profile';
$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
$userprofile = \common\models\UserProfile::find()->where(['user_id' => $userid])->one();
$userprofileex = \common\models\UserProfileEx::find()->where(['user_id' => $userid])->one();
$myprofile = \common\models\Myprofile::find()->where(['userID' => $userid])->one();
//print_r($myprofile);die;


$Company_Subusers = \common\models\Company_Subusers_Record::find()->where(['subuser_id' => Yii::$app->user->identity->id])->one();

if($Company_Subusers){
$company = \common\models\Company::find()->where(['userid' => $Company_Subusers->master_id])->one();

}else{
$company = \common\models\Company::find()->where(['userid' => Yii::$app->user->identity->id])->one();
}    


//CrudAsset::register($this);

?>


<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head"><span id="userrole">Seller</span> Dashboard</h2>
					</div>
					<!--<div class="col-md-6 text-right addprop_button">
						<a href="#" class="add_button">Add Property</a>
					</div>-->
				</div>

               
				<div class="col-md-12">
               
						<ul class="add_property nav nav-pills">
						<li class="active property_steps no_pad"><a data-toggle="pill" href="#home" class="categ_selec">Personal Details</a></li>
            <?php 	if ($company) { ?>
          	<li class="property_steps no_pad"><a data-toggle="pill" href="#company" class="categ_selec">Company Details</a></li>
						<?php } ?>
            <li class="property_steps no_pad"><a data-toggle="pill" href="#password_change" class="categ_selec">Password</a></li>
						
					</ul>
                   
				<div class="tab-content personal_details">
					  <div id="home" class="tab-pane row fade in active">
						<div class="col-md-12 user_profile">


<?php $form = ActiveForm::begin([
        'id' => 'personaldetails',
        'enableClientScript' => false,
        'options'=>['enctype'=>'multipart/form-data'],
        
    ]); ?>

  
					 			  <div class="form-group files">
									
                                    <input type="file" name="logo" id="logo" >
								  </div>
								  <div class="col-md-6 date_select">
                                  <?php
                                if ($myprofile) {
                                if ($myprofile->first_name) {
                                $model->first_name = $myprofile->first_name;
                                ?>
                                <?= $form->field($model, 'first_name')->textInput(['class' => 'form-control input_desgn','placeholder'=>"Enter Full Name"])->label(false); ?>
                                <?php }  ?>
                               
                                <?php } else { ?>
                                <?= $form->field($model, 'first_name')->textInput(['placeholder'=>"Enter Full Name",'class' => 'form-control input_desgn'])->label(false); ?>
                                <?php }
                                ?>
                                  
                                  </div>
								  <div class="col-md-6 date_select">

                                   <?php
                                $primarynotype = \common\models\UserPhoneconfig::find()->where(['userid' => Yii::$app->user->identity->id, 'isdefault' => 1])->one();
                                if ($primarynotype) {

                                $primarytype = \common\models\Phonenumbers::find()->where(['id' => $primarynotype->phoneid])->one();
                                if ($primarytype) {

                            
                                if ($primarytype->phone_no) {
                                $model->phonenumbersprim = $primarytype->phone_no;
                                } else {
                                $model->phonenumbersprim = Yii::$app->user->identity->username;
                                }
                                }
                                } else {
                               
                                $model->phonenumbersprim = Yii::$app->user->identity->username;
                                }
                                ?>
     <?= $form->field($model, 'phonenumbersprim')->textInput(['class' => 'form-control input_desgn','placeholder' => "Enter you phone number"])->label(false); ?>
   
                                  <!-- <input type="text" class="form-control input_desgn" placeholder="Enter you phone number"> -->
                                  </div>
								  <div class="col-md-6 date_select">
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
                
                ?>
                     <?= $form->field($model, 'emailnumbersprim')->textInput(['class' => 'form-control input_desgn','placeholder' => "Enter you email address"])->label(false); ?>

                                  </div>
									
							 
							  <div class="col-md-12 save_profile">
								<!-- <a href="#" class="save_button">Save</a><a href="#" class="edit_profile">Cancel</a> -->
                     <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $modelco->isNewRecord ? 'save_button' : 'save_button', 'name' => 'savedatadocs']) ?>

							  </div>

<?php ActiveForm::end(); ?>

						</div>
						
					  </div>
					   <div id="company" class="tab-pane row fade">
						<div class="col-md-12 user_profile">

<?php $form = ActiveForm::begin([
        'id' => 'companydetails',
        'enableClientScript' => false,
    ]); ?>
                          <?php
                    if ($company) {
                    $modelco->name = $company->name;
                   
                    $modelco->company_website = $company->company_website;
                    $modelco->description = $company->description;
                    $modelco->company_type = $company->company_type;
                    }
                    ?>
							
								  <div class="col-md-6 date_select">
                                  <?= $form->field($modelco, 'name')->textInput(['class' => 'form-control input_desgn','placeholder' => "Enter your company name"])->label(false) ?>

                                  </div>

                                   <div class="col-md-6 date_select">
                                  <?= $form->field($modelco, 'company_website')->textInput(['class' => 'form-control input_desgn','placeholder' => "Enter your website URL"])->label(false) ?>

                                  </div>

                                   <div class="col-md-6 date_select">
                                  <?= $form->field($modelco, 'company_type')->textInput(['class' => 'form-control input_desgn','placeholder' => "Type of industry"])->label(false) ?>

                                  </div>

                                   <div class="col-md-12 date_select">
                                  <?= $form->field($modelco, 'description')->textarea(['class' => 'form-control input_desgn','placeholder' => "Brief about company",'rows' => '6'])->label(false) ?>

                                  </div>
		
							  <div class="col-md-12 save_profile">
                              <?= Html::submitButton($modelco->isNewRecord ? 'Save' : 'Update', ['class' => $modelco->isNewRecord ? 'save_button' : 'save_button', 'name' => 'savecompanydata']) ?>

                                <a href="#" class="edit_profile">Cancel</a>
							  </div>
                              <?php ActiveForm::end(); ?>
						</div>
					   </div>
					   <div id="password_change" class="tab-pane row fade">
						<div class="col-md-12 user_profile">
                        <?php $form = ActiveForm::begin([
        'id' => 'passworddetails',
        //'enableClientScript' => false,
    ]); ?>
                                     <div class="row">
									<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/company/company.svg';  ?>">Current Password</p>
									<p class="label_name">You can always change your password</p>
									
								</div>
								<div class="row">
									<div class="date_select col-md-6">
                                    <?php echo $form->field($model2->getModel('account'), 'password')->passwordInput(['class' => 'form-control input_desgn','placeholder' => "Enter password"])->label(false)  ?>

                                    </div>
								  </div>
								  <div class="row">
									<div class="date_select col-md-6">
                                    <?php echo $form->field($model2->getModel('account'), 'password_confirm')->passwordInput(['class' => 'form-control input_desgn','placeholder' => "Re-enter password"])->label(false)  ?>

                                    </div>
								  </div>
								 
									
							  <div class="col-md-12 save_profile">
                    <?php echo Html::submitButton(Yii::t('frontend', 'Save'), ['class' => 'save_button','name'=>'savecreddata']) ?>

                       <a href="#" class="edit_profile">Cancel</a>
							  </div>
                              <?php ActiveForm::end(); ?>
						</div>
					   </div>
				 </div>
				</div>




			</div>
  		</div>




