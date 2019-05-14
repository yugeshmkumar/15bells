<?php

use yii\helpers\Html;
use \kartik\grid\GridView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeadrequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leadrequests';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

<!-- END THEME LAYOUT STYLES -->
<style>

.kv-editable-reset{
	display:none;
}

</style>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        //['class' => 'kartik\grid\CheckboxColumn', 'name'=>'sarf'],
       /*  [

            'class' => '\kartik\grid\ExpandRowColumn',
            'value' => function($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function($data) {

                $searchModel = new \common\models\LeadsSearch();
                //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                $dataProvider = $searchModel->searchbylead(Yii::$app->request->queryParams, $data->id);

                return Yii::$app->controller->renderPartial('expanddetails', [

                            'id' => $data->id
                ]);
            },
                ], */
                [
                    'attribute' => 'id',
                    'label' => 'Actions',
                    'filter' => false,
                    'vAlign' => 'middle',
                    'format' => 'raw',
                    'width' => '80px',
                    'value' => function($data) {
    
     if($data->role_id != 3){
    
                        if ($_GET['status'] == 3) {

                            return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											<li>
                                                  <a onclick="functionprofileplus(' . $data->user_id . ')" >
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-plus"></i></span> Add Details
                                                    </a>
											</li>
											
											
												</ul></div>';
                        } else if ($_GET['status'] == 4) {

                            return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											<li>
                                                  <a onclick="functionprofilepl(' . $data->id . ')" >
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-back-arrow"></i></span> Reverse
                                                    </a>
											</li>
											
											
												</ul></div>';
                        } else {

$findcsrs = \Yii::$app->db->createCommand("SELECT assigned_toID from leadassignment where leadid=$data->id ")->queryOne();
$cpeployeid = $findcsrs['assigned_toID'];
$findcs = \Yii::$app->db->createCommand("SELECT name from company_emp where id=$cpeployeid ")->queryOne();

if($findcs['name']=='CSR Supply'){
    
     if($data->role_id == 4 || $data->role_id == 7){
    
                            return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffa&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffa&#39;).style.display=&#39;block&#39;,assignlead(' . $data->id . ')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-exchange"></i></span> Re-Assign CSR
                                                    </a>
											</li>
											
											
												</ul></div>';
             }else{
                 
                 return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
											
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffaaccept&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffaaccept&#39;).style.display=&#39;block&#39;,assignleadaccept(' . $data->id . ',' . $_GET['status'] . ')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-check"></i></span>  Accept Lead
                                                    </a>
											</li>
											
												</ul></div>';
                 
                 
             }
                        }else{
                            
                     if($data->role_id == 5 || $data->role_id == 6){       
                            return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffa&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffa&#39;).style.display=&#39;block&#39;,assignleaddemand(' . $data->id . ')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-exchange"></i></span> Re-Assign CSR
                                                    </a>
											</li>
                                                                                        
                                           
											
												</ul></div>';
                     }else{
                         
                         return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
                                           
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffaaccept&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffaaccept&#39;).style.display=&#39;block&#39;,assignleadaccept(' . $data->id . ',' . $_GET['status'] . ')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-check"></i></span>  Accept Lead
                                                    </a>
											</li>
											
												</ul></div>';
                     }
                        }
                        
                      }
                    }else{
                        return '<div class="btn-group"><a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
                                                                                        
                                                  <li>
                                                  Please Change User Role
											</li>
											
												</ul></div>';
                    }
                    
                    }
                ],
                [

                    'attribute' => 'name',
                    //'pageSummary' => 'Page Total',
                    'vAlign' => 'middle',
                    'format' => 'raw',
                    'width' => '150px',
                    //'headerOptions'=>['class'=>'kv-sticky-column'],
                    //'contentOptions'=>['class'=>'kv-sticky-column'],
//                    'value' => function($data) {
//
//                        return '
//	   <div class="btn-group">
//    <a  href="#basic" type="button"  data-toggle="dropdown" data-hover="dropdown" data-close-others="true">' . $data->name . '
//    </a>
//    <ul class="dropdown-menu pull-right" role="menu">
//        <div class="portlet light profile-sidebar-portlet bordered">
//
//    <div class="profile-userpic">
//    <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
//
//    <div class="profile-usertitle">
//    <div class="profile-usertitle-name"> ' . $data->name . ' </div>
//    <div class="profile-usertitle-job"> Developer </div>
//    </div>
//
//    <div class="profile-userbuttons">
//    <button type="button" class="btn btn-circle green btn-sm">Follow</button>
//    <button type="button" class="btn btn-circle red btn-sm">Message</button>
//    </div></div>
//    </ul>
//    </div>' . '<br/><br/>
//        <a class="btn btn-circle btn-icon-only btn-default toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="View Timeline">
//    <i class="fa fa-safari"></i>
//    </a>' . '<a class="btn btn-circle btn-icon-only btn-info toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="facebook">
//    <i class="fa fa-facebook-official"></i>
//    </a>' . '<a class="btn btn-circle btn-icon-only btn-info toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="linkedin">
//    <i class="fa fa-linkedin"></i>
//    </a>';
//                    }],
                    ],
                [

                    'attribute' => 'user_id',
                    'label' => 'Email-Id',
                    'vAlign' => 'middle',
                    'filter' => true,
                    'format' => 'raw',
                    'width' => '250px',
                    'value' => function($data) {
                        $docsmain[] = '';
                        $docsmain[] = '<strong>&nbsp;<a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,getuser_iddetails(' . $data->id . ')"></a>&nbsp;</strong>';
                       $getuser = \common\models\user::findOne($data->user_id);
                       if($getuser){
                           $user = $getuser->email;
                       }else{$user = 'User deleted';} 
                         
                        return '<a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,getuser_iddetails(' . $data->id . ')">' . $user . '</a>' . implode($docsmain) . '
						   ';
                    },
                ],
                [


                    'attribute' => 'number',
                    'label' => 'Phone No.',
                    'vAlign' => 'middle',
                    'width' => '200px',
                ],
                [


                    'attribute' => 'location',
                    'label' => 'Location',
                    'vAlign' => 'middle',
                    'width' => '200px',
                ],


                 [
                    'class' => 'kartik\grid\EditableColumn',
                    'format' => 'raw',
                    'width' => '200px',
                    'attribute' => 'role_id',
                    'label' => 'Role Assign',
                    'value' => function ($data) {
                        return '<code>' . \common\models\UserRoles::findOne($data->role_id)->rolename . '</code>';
                    },       
                    'editableOptions' => [
                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
    'data' => ['4' => 'Tenant', '5' => 'Landlord', '6' => 'Seller', '7' => 'Buyer'],
    'header' => 'Role type',
                        'formOptions' => ['action' => ['index']],
                        'submitButton' => [
                            'icon' => '<i class="glyphicon glyphicon-floppy-disk"></i>',
                            'label' => 'Save',
                            'class' => 'btn btn-sm btn-primary'
                        ],
                       
                    ],
                ],

                [


                    'attribute' => 'user_id',
                    'label' => 'Login As',
                    'vAlign' => 'middle',
                    'width' => '200px',
                    'value' => function ($data) {

                     $searchModel = new \common\models\UserLoginAs();                
                     $dataProvider = $searchModel->searchbystatus($data->user_id);
                 
                           return $dataProvider;
                         
                        
                    },  
                ],
                [
                    'attribute' => 'created_at',
                    'label' => 'Apply Date',
                    'format' => 'date',
                    'vAlign' => 'middle',
                    'width' => '200px',
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'name' => 'created_at',
                        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                        // 'value' => '23-Feb-1982',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy'
                ]]),
                    'value' => 'created_at'
                ],
                          
//                [
//                    'class' => 'kartik\grid\EditableColumn',
//                    'format' => 'raw',
//                    'width' => '200px',
//                    'attribute' => 'tags',
//                    'label' => 'Tags',
//                    'editableOptions' => [
//                        'header' => 'Tag',
//                        
//                        'inputType' => Editable::INPUT_TEXT,
//                        'formOptions' => ['action' => ['index']],
//                        'submitButton' => [
//                            'icon' => '<i class="glyphicon glyphicon-floppy-disk"></i>',
//                            'label' => 'Save',
//                            'class' => 'btn btn-sm btn-primary'
//                        ],
//                        'resetButton' => [
//                            'icon' => '<i class="glyphicon glyphicon-remove-sign"></i>',
//                            'label' => 'Reset',
//                            'class' => 'btn btn-sm btn-primary'
//                        ],
//                    ],
//                ],
                            
//                [
//
//
//                    'attribute' => 'role_id',
//                    'label' => 'Role Assign',
//                    'vAlign' => 'middle',
//                    'format' => 'raw',
//                    'width' => '200px',
//                    'noWrap' => true,
//                    'value' => function ($data) {
//                        return '<span class="badge" style="background-color: black"> </span><code>' . \common\models\UserRoles::findOne($data->role_id)->rolename . '</code>';
//                    },
//                ],
//    [
//        'attribute'=>'id',
//		'label'=>'Status',
//        'value'=>function ($data) {
//			$getleadstatus = \common\models\Leadcurrentstatus::find()->where(['leadid'=>$data->id,'isactive'=>1])->one();
//			if($getleadstatus){
//            return "<span class='badge' style='background-color: {$data->id}'> </span>  <code>" . 
//                \common\models\Leadsbuckets::findOne($getleadstatus->statusid)->bucketname . '</code>';
//			}else{
//				return "<span class='badge' style='background-color: black'> </span>  <code></code>";
//			}
//        },
//		'filter'=>true,
//        'filterType'=>GridView::FILTER_COLOR,
//        'vAlign'=>'middle',
//        'format'=>'raw',
//        'width'=>'300px',
//        'noWrap'=>true
//    ],
//    [
//        'class'=>'kartik\grid\BooleanColumn',
//		'label'=>'Active',
//        'attribute'=>'id', 
//		
//        'vAlign'=>'middle',
//    ],
            ],
            'containerOptions' => false, // only set when $responsive = false
            'headerRowOptions' => ['class' => 'kartik-sheet-style'],
            'filterRowOptions' => ['class' => 'kartik-sheet-style'],
            'pjax' => true, // pjax is set to always true for this demo
            // set your toolbar
            'toolbar' => [
                ['content' =>
                    Html::a('<i class="fa fa-plus"></i>', ['leads/create'], ['class' => 'btn btn-circle btn-icon-only btn-default toggler tooltips', 'data-container' => "body", 'data-placement' => "left", 'data-html' => "true", 'data-original-title' => "Add new Lead"]) . '' .
                    '<a class="btn btn-circle btn-icon-only btn-default toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="Send Email">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="Send SMS">
                                            <i class="fa fa-phone"></i>
                                        </a>'
                ],
                '{export}',
            //'{toggleData}',
            ],
            // set export properties
            'export' => [
                'fontAwesome' => true
            ],
            // parameters from the demo form
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => false,
            'hover' => true,
            //'showPageSummary'=>true,
            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => false,
            ],
            'persistResize' => true,
            'exportConfig' => true,
        ]);
        ?>


        <script>
            function functionprofileplus(str)
            {
                var win = window.open('<?php echo yii::$app->urlManager->createUrl(['usersprofile/postlogin']) ?>?id=' + str + '', '_blank');
        win.focus();
    }
	
</script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $("#w3").dropdown();
    $(".dropdown-toggle").dropdown();
	//alert();

	
});

</script>

