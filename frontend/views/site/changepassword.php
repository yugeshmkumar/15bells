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
 .col-md-12{
	 width:100%;
	 float:left;
 }
 .row{
	 margin:0 !important;
 }
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
.pass_wrdn label{
	display:none !important;
	
}
.pass_wrdn {
    width: 200px;
    height: 200px;
    overflow: hidden;
}
.upload-kit-input{
	border-color:#ffffff;
}
.pass_wrdn input {
    display: block !important;
    width: 200px !important;
    height: 200px !important;
    opacity: 0 !important;
    overflow: hidden !important;
}
.upload-kit .upload-kit-input .add{
	top:57% !important;
right:7px;
color:#ffffff;
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



.bhem{

   float: right;
    margin-top: -7px;
}

.tab-content .tab-pane {
    padding: 20px 0;
}
 .my_docs:after {
	 background:transparent !important;
 }
 .page-content{
	 background:transparent;
 }
 #w0{
	 position:relative;
 }
 .btn_chngpas{
	     padding: 8px 30px 8px 30px;
    background: #003663 !important;
    border: none;
    border-radius: 5px !important;
	color:#ffffff !important;
	margin-right:40px;
 }
 .tabbable-line>.nav-tabs>li:hover{
	 border-color:#e9b739 !important;
 }
 .upload-kit .upload-kit-input, .upload-kit .upload-kit-item{
	 width:200px !important;
	 height:200px !important;
	 border-color: #ffffff !important;
 }
 .user_ic{
	border: 1px solid #cecece;
    padding: 2px 5px 3px 5px;
    border-radius: 50%;
    margin: 0 7px 0 0;
    background: white;
    color: #676666;
 }
 .colr_bg{
 background:#60a8c2 !important;
 }
 .colr_bg:before{
 border-left: 28px solid #60a8c2 !important;
 }
 .lbl_pos{
	 position:relative;
	 top:2px;
 }
 .change_pass:before{
	     border-left: 22px solid #e9b739 !important;
    top: 20px !important;
    right: 58.3% !important;
 }
 .control-label{
	 color:#fff !important;
 }
 </style>
 <!-- start breadcrumb -->

<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
 <!-- <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?//php echo Yii::$app->urlManager->createUrl(['site/couserdash']) ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>User</span>
								 <i class="fa fa-circle"></i>
                            </li>
							<li>
                                <span>MY PROFILE</span>
							 </li>
                        </ul>
                        
                    </div>-->
                <!-- end breadcrumb -->
				 <!-- start Upper section -->
		<div class="col-md-9">
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
													  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','method' =>'post','id'=>'ibform']]); ?>

                                                        <form action="#" role="form">
												<div class="row">
													<div class="col-md-12 passwrd_ch">
														<p class="change_pass"><font style="font-weight:600;color:#ffffff;">Change Password</font></p>
													</div>
												</div>

<div class="row">
<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" style="text-indent:initial !important;font-size:20px;opacity:1;"  type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>
                </div>



												<div class="row" style="background:rgba(255,255,255,0.25);padding:15px 0;">
														<div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new pass_wrdn" data-provides="fileinput">
                                                                    <?php echo $form->field($model2->getModel('profile'), 'picture')->widget(
        Upload::classname(),
        [
            'url' => ['avatar-upload']
        ]
    )?>
                                                                </div>
                                                              
                                                            </div>
                                                           </div>
														   <div class="col-md-8">
														    <div class="row">
															<div class="col-md-12">
																 <div class="form-group col-md-6">
																	<label class="control-label">Username</label>
																	
																  <?php echo $form->field($model2->getModel('account'), 'username')->textInput(['readonly'=>true])->label(false) ?>
																	</div>
																	 <div class="form-group col-md-6">
																	<label class="control-label">E-mail</label>
																	
																	 <?php echo $form->field($model2->getModel('account'), 'email')->textInput(['readonly'=>true])->label(false)  ?>
																	 </div>
															</div>
															<div class="col-md-12">
																<div class="form-group col-md-6">
																	<label class="control-label">New Password</label>
																	<?php echo $form->field($model2->getModel('account'), 'password')->passwordInput()->label(false)  ?>
																  </div>
																<div class="form-group col-md-6">
																	<label class="control-label">Re-type New Password</label>
																	<?php echo $form->field($model2->getModel('account'), 'password_confirm')->passwordInput()->label(false)  ?>
																</div>
															</div>
														 </div>
                                                            <div class="margin-top-10 text-center">
															  <?php echo Html::submitButton(Yii::t('frontend', 'Change Password'), ['class' => 'btn btn-primary btn_chngpas','name'=>'savecreddata']) ?>
                                                             

                                                            </div>
															
                                                        </form>
														 <?php ActiveForm::end(); ?>
                                                    </div>
												
													</div> 
												<div class="row" style="margin-top: 1px !important;padding: 2px 0 10px 0;background:rgba(255,255,255,0.25);">
													  <div class="clearfix margin-top-10 text-center">
                                                                    <span class="label label-danger">NOTE! </span>
                                                                    <span style="color:#ffffff;">Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                      </div>
												</div>
													</div>
					</div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                    <!-- PRIVACY SETTINGS TAB -->
													
													   
        					   
                                                                                                  
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
                                                    
                                                 
                   	 <!-- end MTPROFILE status section -->
          
						   
	
