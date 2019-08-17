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
use common\models\CompanyEmp;
use yii\db\Expression;

$bundle = BackendAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/base.php'); ?>
<style>
.btn-group>.dropdown-menu:before, .dropdown-toggle>.dropdown-menu:before, .dropdown>.dropdown-menu:before{
	display:none !important;
}
.btn-group>.dropdown-menu:after, .dropdown-toggle>.dropdown-menu:after, .dropdown>.dropdown-menu:after{
	display:none !important;
}
.user_ftr{
	background-color:#605ca8 !important;
}
.notif_dropdown{
    width:310px !important;
}
.notif_dropdown li a{
    padding: 20px 10px !important;
    background: #e0d6d7 ;
}
</style>
    <div class="wrapper">
        <!-- header logo: style can be found in header.less -->
        <header class="main-header">
            <a href="<?php echo Yii::getAlias('@backendUrl') ?>/csr/supply_index" class="logo">
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
                            <a href="#" class="dropdown-toggle drp_dwn" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <?php 
                                     $user_id = Yii::$app->user->identity->id;
                                     $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
                                     $assigned_id = $querys->id;

                                     $startTime = date("Y-m-d H:i:s");
                                     $todaysDate = date("Y-m-d");

                                     
                                     //add 1 hour to time
                                     $convertedTime = date('Y-m-d H:i:s',strtotime('+5 minutes',strtotime($startTime)));

                                    $counter =  \backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm::find()
                                     ->where(['>=','followup_date_time',$convertedTime])
                                     ->andwhere(['=','DATE(followup_date_time)',$todaysDate])
                                     ->andwhere(['=','company_employee_id',$assigned_id])
                                     ->andwhere(['=','is_seen',0])
                                     ->count();
                                   // echo \backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm::find()->where('company_employee_id =:configs AND followup_date_time !=:followups AND is_seen=:seen',array(':configs'=>$assigned_id,':followups'=>DATE_SUB(NOW(), INTERVAL 5 MINUTE)))->count() 
                                   ?>

                                    <?php if ($counter > 0 ){
                                           
                                    ?>
                                <span class="label label-danger">
                                  <?php echo $counter;  ?>
                                </span>

                                <?php    } ?>
                            </a>
							  <ul class="dropdown-menu notif_dropdown">
                                <li class="header"><?php 
                                echo Yii::t('backend', 'You have {num} Followups', ['num'=>\backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm::find()
                                ->where(['>=','followup_date_time',$convertedTime])
                                ->andwhere(['=','DATE(followup_date_time)',$todaysDate])
                                ->andwhere(['=','company_employee_id',$assigned_id])
                                ->andwhere(['=','is_seen',0])->count()]) ?></li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php foreach(\backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm::find()
                                ->where(['>=','followup_date_time',$convertedTime])
                                ->andwhere(['=','DATE(followup_date_time)',$todaysDate])
                                ->andwhere(['=','company_employee_id',$assigned_id])
                                ->andwhere(['=','is_seen',0])->all() as $newEntry): ?>
                                            <li>
                                                <a href="<?php echo Yii::$app->urlManager->createUrl(['/addproperty-onepage-form/csrphoneindex', 'phone'=>$newEntry->primary_contact_no]) ?>" onclick="changecolour(<?php echo $newEntry->id; ?>)" target="_blank">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php

                                                     $comment =  $newEntry->followup_comment;
                                                    if (strlen($comment) >= 20) {
                                                        echo substr($comment, 0, 20). " ... " . substr($string, -5);
                                                    }
                                                    else {
                                                        echo $comment;
                                                    }
                                                    
                                                    
                                                    ?>
                                                    <span style="font-weight:600;"><?php echo  date("M j , Y", strtotime($newEntry->followup_date_time)); ?> <?php echo  date("h:i A", strtotime($newEntry->followup_date_time)); ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="footer">
								
                                    <?php echo Html::a(Yii::t('backend', 'View all'), ['/user-kycdocuments/index']) ?>
                                </li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <!-- <li id="log-dropdown" class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle drp_dwn" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                            <span class="label label-danger">
                                <?php //echo \backend\models\SystemLog::find()->count() ?>
                            </span>
                            </a> -->
                            <!-- <ul class="dropdown-menu">
                                <li class="header"><?php //echo Yii::t('backend', 'You have {num} log items', ['num'=>\backend\models\SystemLog::find()->count()]) ?></li>
                                <li>
                                    inner menu: contains the actual data
                                    <ul class="menu">
                                        <?php //foreach(\backend\models\SystemLog::find()->orderBy(['log_time'=>SORT_DESC])->limit(5)->all() as $logEntry): ?>
                                            <li>
                                                <a href="<?php// echo Yii::$app->urlManager->createUrl(['/log/view', 'id'=>$logEntry->id]) ?>">
                                                    <i class="fa fa-warning <?php //echo $logEntry->level == \yii\log\Logger::LEVEL_ERROR ? 'text-red' : 'text-yellow' ?>"></i>
                                                    <?php //echo $logEntry->category ?>
                                                </a>
                                            </li>
                                        <?php //endforeach; ?>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <?php //echo Html::a(Yii::t('backend', 'View all'), ['/log/index']) ?>
                                </li>
                            </ul>
                        </li> -->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu ">
                            <a href="#" class="dropdown-toggle drp_dwn" data-toggle="dropdown">
                                <img src="<?php echo URL::to('@web/img') ?>/anonymous.png"  class="user-image">
                                <span><?php echo Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu drop_befor">
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
                                <li class="user-footer user_ftr">
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
                <div class="user-panel" style="background:#605ca8;">
                    <div class="pull-left image">
                        <img src="<?php echo URL::to('@web/img') ?>/anonymous.png" class="img-circle" />
                    </div>
                    <div class="pull-left info">
					<?php $assigndash = \common\models\CompanyEmp::find()->where(['userid'=>yii::$app->user->identity->id])->one();
					$emp_role = $assigndash->name ?>
                        <p style="margin:4px 0 0 0;">
						<?php //echo Yii::t('backend', 'Hello CSR, {username}', ['username'=>Yii::$app->user->identity->username])

                      echo 'Hello '.$emp_role	?>
                       <br/> <a href="javascript:void(0)" style="font-size:10px;">
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
                            'url'=>['/csr/supply_index'],
                          //  'badge'=> TimelineEvent::find()->today()->count(),
                          //  'badgeBgClass'=>'label-primary',
                        ],
						[
                            'label'=>Yii::t('backend', 'New Leads'),
                            'icon'=>'<i class="fa fa-tasks"></i>',
                            'url'=>['/leadrequest/index?status=1'],
                          //  'badge'=> TimelineEvent::find()->today()->count(),
                          //  'badgeBgClass'=>'label-primary',
                        ],

                        ///[
                        //    'label'=>Yii::t('backend', 'Allocated Leads'),
                        //    'icon'=>'<i class="fa fa-shopping-basket"></i>',
                        //    'url'=>['/leadrequest/allotedindex?status=1'],
                          //  'badge'=> TimelineEvent::find()->today()->count(),
                          //  'badgeBgClass'=>'label-primary',
                      //  ],
                        [
                            'label'=>Yii::t('backend', 'Allocated Leads'),
                            'url' => '#',
                            'icon'=>'<i class="fa fa-file"></i>',
                            'options'=>['class'=>'treeview'],
                            'items'=>[
                                ['label'=>Yii::t('backend', 'Web'), 'url'=>['/leadrequest/allotedindex?status=1'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                                ['label'=>Yii::t('backend', 'Excel'), 'url'=>['/addproperty-onepage-form/csrindex'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                    
                             ]
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
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
    $(".drp_dwn").dropdown();
	
});
function changecolour(id){

$.ajax({
              type: "POST",
              url: "/addproperty-onepage-form/changecolour",
              data: {id: id},	                
              cache: false,
              success: function (data)
              {

               $('#notifcolor_'+id).removeClass('row repeat_notif').addClass('row notif_seen');
              

              },


              });

        }
</script>
<?php $this->endContent(); ?>
