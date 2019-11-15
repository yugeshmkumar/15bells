<?php

//use yii;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\modules\user\models\SignupForm;
use frontend\modules\user\models\LoginForm;
use frontend\modules\user\models\PasswordResetRequestForm;
use frontend\modules\user\models\ResetPasswordForm;
/* @var $this \yii\web\View */
/* @var $content string */
use frontend\modules\user\views\login;
\frontend\assets\FaqAsset::register($this);
$this->title = Yii::$app->name;
$model = new SignupForm();
$login = new LoginForm();  
?>
<!DOCTYPE html>

<html lang="<?php echo Yii::$app->language ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <?php echo Html::csrfMetaTags() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
		<?php
		
		if(isset($_POST['signup-button'])){

	$model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
				
            $user = $model->signup();
            if ($user && Yii::$app->getUser()->login($user)) {
				$checkrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id,'item_name'=>"administrator"])->one();
		if($checkrole){
			
	return Yii::$app->response->redirect(Yii::getAlias('@backendUrl'), 301)->send();
		}else{
			return Yii::$app->response->redirect(Yii::getAlias('@frontendUrl').'/site/postlogin', 301)->send();
		//return Yii::$app->controller->redirect(['site/postlogin']);
		}
				// return Yii::$app->controller->redirect(['/site/postlogin']);
              
            }
        } 
}
  $login = new LoginForm();        
       if(isset($_POST['login-button'])){ 
	  
	    if (Yii::$app->request->isAjax) {
            $login->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($login);
		}
	   if ($login->load(Yii::$app->request->post()) && $login->login()) {
		  $checkrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id,'item_name'=>"administrator"])->one();
		if($checkrole){
	    return Yii::$app->response->redirect(Yii::getAlias('@backendUrl'), 301)->send();
		}else{
		return Yii::$app->response->redirect(Yii::getAlias('@frontendUrl').'/site/postlogin', 301)->send();
		}
			
        }
		
	   }
?>
        <header>
		<?php
		$getagreement = \common\models\Aggrementmgmt::find()->where('roleid =:roleid and eventname =:eventname and ispublish =:publish and isactive =:active',array(':roleid'=>3,':eventname'=>"Signup",':publish'=>1,':active'=>1))->one();
		?>
		 <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title"> <?php if($getagreement) { echo $getagreement->subject ; } ?></h4>
                                                </div>
                                                <div class="modal-body"><?php if($getagreement) { echo $getagreement->content ; } else {  ?> Agreement Expired! <?php } ?></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
            <nav class="navbar navbar-inverse navbar-fixed-top opaque-navbar">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"> 
                            <img src="<?= Url::to('@web/img') ?>/logo.jpg" class="img-responsive" alt="">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?= Yii::$app->homeUrl ?>">HOME <b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">BUYERS <b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("seller") ?>">SELLERS <b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("lessor") ?>">LESSOR <b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("lessee") ?>">LESSEE <b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl("broker") ?>">BROKERS <b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
                      
          <?php if(isset(Yii::$app->user->identity->id)){ ?>
		 	 <?php $arrcheckrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();
	                             foreach($arrcheckrole as $checkrole){
			$findallrouting = \common\models\Bellsroutings::find()->where(['isactive'=>1,'rolename'=>$checkrole->item_name])->one();
			if($findallrouting){ ?>
				<?php if($findallrouting->login_to == "backend"){ ?>
				   <li> <a href="<?php echo Yii::getAlias('@backendUrl') ?><?php echo $findallrouting->login_url ?>"><strong> MY DASHBOARD </strong><b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
		   	      <?php } else{ ?>
		      <li> <a href="<?php echo Yii::$app->urlManager->createUrl($findallrouting->login_url); ?> "><strong> MY DASHBOARD </strong><b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
		    <?php } } } ?>
							<li> <?php echo Html::a(Yii::t('frontend', 'LOG OUT<b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b>'), ['/user/sign-in/logout'], ['data-method' => 'post']) ?></li>
<?php } else { ?>
                          <li><a href="<?= Yii::$app->urlManager->createUrl("user/sign-in/signup") ?>">REGISTER <b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
        <li><a href="<?= Yii::$app->urlManager->createUrl("user/sign-in/login") ?>">LOGIN <b class="middle hidden-xs">&nbsp; &nbsp;|&nbsp; &nbsp;</b></a></li>
						<?php } ?>
 <li class="last"><a href="#contact">CONTACT US</a>
                            </li>
       

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

        </header>
		
        <?php echo $content ?>
        <?php include 'aboutusFooter.php'; ?> 
        <?php $this->endBody() ?>
    </body>
</html>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src='https://www.google.com/recaptcha/api.js'></script>
  
    <script>
      $(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');
});

    </script>
<?php $this->endPage() ?>

