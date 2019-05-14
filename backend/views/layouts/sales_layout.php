<?php
/**
 * @var $this yii\web\View
 */
use backend\assets\BackendAsset;
use backend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$bundle = BackendAsset::register($this);
?>
<style>
.btn-group>.dropdown-menu:before, .dropdown-toggle>.dropdown-menu:before, .dropdown>.dropdown-menu:before{
	left:85% !important;
}
.btn-group>.dropdown-menu:after, .dropdown-toggle>.dropdown-menu:after, .dropdown>.dropdown-menu:after{
	left:85% !important;
}
.user_ftr{
	background-color:#605ca8 !important;
}
</style>
<?php $this->beginContent('@backend/views/layouts/base2.php'); ?>
    <div class="wrapper">
        <!-- header logo: style can be found in header.less -->
        <header class="main-header">
            <a href="<?php echo Yii::getAlias('@backendUrl') ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?php echo Yii::$app->name ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only"><?php echo Yii::t('backend', 'Toggle navigation') ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li id="timeline-notifications" class="notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="label label-primary">
                                   0
                                </span>
                            </a>
							  <ul class="dropdown-menu">
                                <li class="header">
								
                                <li class="footer">
								
                                </li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li id="log-dropdown" class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle drp_dwn" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                            <span class="label label-danger">
                               
                            </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">0</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                         <li>
                                                <a href="">
                                                    <i class="fa fa-warning text-yellow"></i>
                                                   
                                                </a>
                                            </li>
                                       
                                    </ul>
                                </li>
                                <li class="footer">
                                    
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo URL::to('@web/img') ?>/anonymous.png"  class="user-image">
                                <span><?php echo Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header light-blue">
                                    <img src="<?php echo URL::to('@web/img') ?>/anonymous.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo Yii::$app->user->identity->username ?>
                                        <small>
                                            <?php echo Yii::t('backend', 'Member since {0, date, short}', Yii::$app->user->identity->created_at) ?>
                                        </small>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?php echo Html::a(Yii::t('backend', 'Profile'), ['/sign-in/profile'], ['class'=>'btn btn-default btn-flat']) ?>
                                    </div>
                                    <div class="pull-left">
                                        <?php echo Html::a(Yii::t('backend', 'Account'), ['/sign-in/account'], ['class'=>'btn btn-default btn-flat']) ?>
                                    </div>
                                    <div class="pull-right">
                                        <?php echo Html::a(Yii::t('backend', 'Logout'), ['/sign-in/logout'], ['class'=>'btn btn-default btn-flat', 'data-method' => 'post']) ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php echo Html::a('<i class="fa fa-cogs"></i>', ['/site/settings'])?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                 <div class="user-panel" style="background:#605ca8 !important;">
                    <div class="pull-left image">
                        <img src="<?php echo URL::to('@web/img') ?>/anonymous.png" class="img-circle" />
                    </div>
                    <div class="pull-left info">
					<?php $assigndash = \common\models\CompanyEmp::find()->where(['userid'=>yii::$app->user->identity->id])->one();
					$emp_role = $assigndash->name ?>
                        <p style="margin:4px 0 0 0;">
						<?php //echo Yii::t('backend', 'Hello CSR, {username}', ['username'=>Yii::$app->user->identity->username])

                      echo 'Hello '.$emp_role	?>
                       <br/> <a href="<?php echo Url::to(['/sign-in/profile']) ?>" style="font-size:10px;">
                            <i class="fa fa-circle text-success"></i>
                            <?php echo Yii::$app->formatter->asDatetime(time()) ?>
                        </a>
						</p>
                    </div>
					<br/>
                </div>
				<br/>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <?php echo Menu::widget([
                    'options'=>['class'=>'sidebar-menu'],
                    'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                    'submenuTemplate'=>"\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                    'activateParents'=>true,
                    'items'=>[
                        
						[
                            'label'=>Yii::t('backend', 'MY DASHBOARD'),
                            'icon'=>'<i class="fa fa-home"></i>',
                            'url'=>['/sales/head'],
                          //  'badge'=> TimelineEvent::find()->today()->count(),
                          //  'badgeBgClass'=>'label-primary',
                        ],
						[
                            'label'=>Yii::t('backend', 'Setup VR Room'),
                            'icon'=>'<i class="fa fa-cogs"></i>',
                            'url'=>['/vr-setup/create'],
                          //  'badge'=> TimelineEvent::find()->today()->count(),
                          //  'badgeBgClass'=>'label-primary',
                        ],
						// [
                            // 'label'=>Yii::t('backend', 'Moderator Calendar'),
                            // 'icon'=>'<i class="fa fa-user"></i>',
                            // 'url'=>['/leadrequestsales/index?status=1'],
                          // 'badge'=> TimelineEvent::find()->today()->count(),
                          //  'badgeBgClass'=>'label-primary',
                        //],
						[
                            'label'=>Yii::t('backend', 'Re-assign Moderator'),
                            'icon'=>'<i class="fa fa-exchange"></i>',
                            'url'=>['/vr-setup/index'],
                          //  'badge'=> TimelineEvent::find()->today()->count(),
                          //  'badgeBgClass'=>'label-primary',
                        ],
						[
                            'label'=>Yii::t('backend', 'Lead Management'),
                            'icon'=>'<i class="fa fa-question"></i>',
                            'url'=>['/leadrequestsales/index?status=1'],
                          //  'badge'=> TimelineEvent::find()->today()->count(),
                          //  'badgeBgClass'=>'label-primary',
                        ],
						[
                            'label'=>Yii::t('backend', 'Reports'),
                            'icon'=>'<i class="fa fa-pie-chart"></i>',
                            'url'=>['/vr-setup/reports'],
                          //  'badge'=> TimelineEvent::find()->today()->count(),
                          //  'badgeBgClass'=>'label-primary',
                        ],
						
                    ]
                ]) ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo $this->title ?>
                    <?php if (isset($this->params['subtitle'])): ?>
                        <small><?php echo $this->params['subtitle'] ?></small>
                    <?php endif; ?>
                </h1>

                <?php echo Breadcrumbs::widget([
                    'tag'=>'ol',
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php if (Yii::$app->session->hasFlash('alert')):?>
                    <?php echo \yii\bootstrap\Alert::widget([
                        'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                        'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                    ])?>
                <?php endif; ?>
                <?php echo $content ?>
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	//alert();
    $(".drp_dwn").dropdown();
	$("#w2").dropdown();
	 $('body').removeClass('sidebar-collapse');
});
</script> 
<?php $this->endContent(); ?>
