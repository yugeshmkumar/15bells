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
<style>
a{
	text-decoration:none !important;
}
.more{
	text-decoration:none;
	color:#FF9800 !important;
	font-size:11px;
}
.messg_contnt{
	background-color:#5cb85c;
	color:#ffffff;
	box-shadow:0 5px 15px rgba(92, 184, 92, 0.21);
	border:1px solid rgb(92, 184, 92) !important;
}
.kv-editable-reset{
	display:none;
}
</style>
<!-- END THEME LAYOUT STYLES -->
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        //['class' => 'kartik\grid\CheckboxColumn', 'name'=>'sarf'],
        [

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
                ],
                [
                    'attribute' => 'id',
                    'label' => 'Actions',
                    'filter' => false,
                    'vAlign' => 'middle',
                    'format' => 'raw',
                    'width' => '80px',
                    'value' => function($data) {
             $userpf = \common\models\activemode::checkprofilestats($data->user_id,"my_profile");
             $userprop = \common\models\activemode::checkprofilestats($data->user_id,"add_property");
             $my_search = \common\models\activemode::checkprofilestats($data->user_id,"my_search");
             
            
                if($data->role_id != 3){
                
                        if ($_GET['status'] == 3) {

                            return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
											
											
												</ul></div>';
                        } else if ($_GET['status'] == 4) {

                            return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
											
											
												</ul></div>';
                        } else {

$findcsrs = \Yii::$app->db->createCommand("SELECT assigned_toID from leadassignment where leadid=$data->id ")->queryOne();
$cpeployeid = $findcsrs['assigned_toID'];
$findcs = \Yii::$app->db->createCommand("SELECT name from company_emp where id=$cpeployeid ")->queryOne();

if($findcs['name']=='CSR Supply'){
     if($userpf && $userprop){
                            return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
						 <li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffa&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffa&#39;).style.display=&#39;block&#39;,assignleadsalessupply(' . $data->id . ')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-exchange"></i></span> Send to Sales
                                                    </a>
											</li>					
										
											
												</ul></div>';
     }else{
         return '<div class="btn-group"><a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
                                                                                        
                                                  <li>
                                                  Profile Not Completed
											</li>
											
												</ul></div>';
         
           }
     }else{
         
         if($userpf && $my_search){
         
                            return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
                                                                                        
                                                  <li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffa&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffa&#39;).style.display=&#39;block&#39;,assignleadsales(' . $data->id . ')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-exchange"></i></span> Send to Sales
                                                    </a>
											</li>
											
												</ul></div>';
         }else{
             
             return '<div class="btn-group"><a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
                                                                                        
                                                  <li>
                                                  Profile Not Completed
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
                    'headerOptions'=>['class'=>'kv-sticky-column'],
                    'contentOptions'=>['class'=>'kv-sticky-column'],
                    'value' => function($data) {

                        return '
	   <div class="btn-group">
    <a  href="#basic" type="button"  data-toggle="dropdown" data-hover="dropdown" data-close-others="true">' . $data->name . '
    </a>
    <ul class="dropdown-menu pull-right" role="menu">
        <div class="portlet light profile-sidebar-portlet bordered">

    <div class="profile-userpic">
    <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>

    <div class="profile-usertitle">
    <div class="profile-usertitle-name"> ' . $data->name . ' </div>
    <div class="profile-usertitle-job">  </div>
    </div>

    <div class="profile-userbuttons">
    <button type="button" class="btn btn-circle green btn-sm">Follow</button>
    <button type="button" class="btn btn-circle red btn-sm">Message</button>
    </div></div>
    </ul>
    </div>' . '<br/><br/>
        <a class="btn btn-circle btn-icon-only btn-default toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="View Timeline">
    <i class="fa fa-safari"></i>
    </a>' . '<a class="btn btn-circle btn-icon-only btn-info toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="facebook">
    <i class="fa fa-facebook-official"></i>
    </a>' . '<a class="btn btn-circle btn-icon-only btn-info toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="linkedin">
    <i class="fa fa-linkedin"></i>
    </a>';
                    }],
                   
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
                            if($getuser->status == 1){
                        return '<a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,getuser_iddetails(' . $data->id . ')">' . $user . '<i class="fa fa-check" style="color:#FF9800;padding-left:4px;"></i></a>' . implode($docsmain) . '   ';
                    }else{
                       return '<a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,getuser_iddetails(' . $data->id . ')">' . $user . '<i class="fa fa-close" style="color:#F44336;padding-left:4px;"></i></a>' . implode($docsmain) . '   ';
  
                    }
                       }
                        
                    },
                ],
                [


                    'attribute' => 'number',
                    'label' => 'Phone No.',
                    'vAlign' => 'middle',
                    'width' => '200px',
					'format' => 'raw',
					'value' => function($data) {
						
						$number = $data->number;
						return '<a href="#">' . $number . '<i class="fa fa-close" style="color:#F44336;padding-left:4px;"></i></a>';
						
						
					},
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
                    'width' => '100px',
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
                    'headerOptions' => ['style' => 'width:100px'],
                    'value' => function ($data) {

                     $searchModel = new \common\models\UserLoginAs();                
                     $dataProvider = $searchModel->searchbystatus($data->user_id);
                 
                           return $dataProvider;
						   
                         
                        
                    },  
                ],

                   [


                    'attribute' => 'user_id',
                    'label' => 'Agreement Date',
                    'vAlign' => 'middle',
                    'headerOptions' => ['style' => 'width:150px'],
                    'value' => function ($data) {

                     $searchModel = common\models\Dashboardroleaggrement::find()->where(['user_id'=>$data->user_id,'role_id'=>'buyer_lessee'])->one();                
                     if($searchModel){

                      $originalDate = $searchModel->created_date;
                      $newDate = date("d-M-Y", strtotime($originalDate));
                      return $newDate;
                     }else{

                           return 'Not Accepted';
                         }
                        
                    },  
                ],

                 [


                    'attribute' => 'id',
                    'label' => 'Message',
                    'vAlign' => 'middle',
                    //'width' => '200px',
					'format' => 'raw',
                     'headerOptions' => ['style' => 'width:250px'],
                    'value' => function ($data) {

                     $searchModel = common\models\Leadassignment::find()->where(['leadid'=>$data->id])->one();                
                     if($searchModel){

                      $originalDate = $searchModel->comments;
                      $originalDates = "'.$originalDate.'"; 
                      
                      
                      return '<a href="javascript:void(0)" class="message_read" onclick="myFunction('.$originalDates.')">' . $originalDate . '</a>';
                     }else{

                           return 'No Messages';
						  
                         }
                        
                    },  
					
                ],
                
                          

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

	
	<!------==========MESSAGE POPUP===========-->
		<div id="message_modal" class="modal" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content messg_contnt">

			  <div class="modal-body" style="padding:30px;">
				<p id="messagedisplay">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
		
		
		

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
});
	function myFunction(msg) {
            //alert(msg);
		$("#message_modal").modal('show');
                $('#messagedisplay').html(msg)
}
</script>
<script>
jQuery(function(){

    var minimized_elements = $('.message_read');
    
    minimized_elements.each(function(){    
        var t = $(this).text();        
        if(t.length < 10) return;
        
        $(this).html(
            t.slice(0,10)+'<span>..... </span><a href="javascript:void(0)" class="more" onclick=>Read More</a>'
        );
        
    }); 
    
   /*  $('a.more', minimized_elements).click(function(event){
        event.preventDefault();
        $(this).hide().prev().hide();
        $(this).next().show();        
    }); */
    
   /*  $('a.less', minimized_elements).click(function(event){
        event.preventDefault();
        $(this).parent().hide().prev().show().prev().show();    
    }); */

});
</script>

