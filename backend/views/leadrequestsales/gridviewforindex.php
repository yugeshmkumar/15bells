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
<?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
	 ['class' => 'kartik\grid\CheckboxColumn', 'name'=>'sarf'],
 [
			
			'class' => '\kartik\grid\ExpandRowColumn',
			'value' => function($model,$key,$index,$column){
			return GridView::ROW_COLLAPSED;
			},
			'detail' => function($data){
			 
			 $searchModel = new \common\models\LeadsSalesSearch();
			 //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
             $dataProvider = $searchModel->searchbylead(Yii::$app->request->queryParams,$data->id);
		
		 return Yii::$app->controller->renderPartial('expanddetails', [
		
           'id'=>$data->id
        ]);
			
			},
			
			
			],
           [
        'attribute'=>'id',
		'label'=>'Actions',
		'filter'=>false,
		 'vAlign'=>'middle',
		'format'=>'raw',
		'width'=>'80px',
		'value'=>function($data){
			if($_GET['status'] == 3){
				
				return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											<li>
                                                  <a onclick="functionprofileplus('.$data->user_id.')" >
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-plus"></i></span> Add Details
                                                    </a>
											</li>
											
											
												</ul></div>';
				
			}
			else if($_GET['status'] == 4){
				
				return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											<li>
                                                  <a onclick="functionprofilepl('.$data->id.')" >
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-back-arrow"></i></span> Reverse
                                                    </a>
											</li>
											
											
												</ul></div>';
				
			}
			else {
				
			
			return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffa&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffa&#39;).style.display=&#39;block&#39;,assignlead('.$data->id.')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-exchange"></i></span> Re-Assign Sales
                                                    </a>
											</li>
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffaaccept&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffaaccept&#39;).style.display=&#39;block&#39;,assignleadaccept('.$data->id.','.$_GET['status'].')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-check"></i></span>  Accept Lead
                                                    </a>
											</li>
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffareject&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffareject&#39;).style.display=&#39;block&#39;,assignleadreject('.$data->id.','.$_GET['status'].')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-trash"></i></span>  Reject Lead
                                                    </a>
											</li>
												</ul></div>';
												}
		}
    ],
    [
       
        'attribute' => 'name',
        //'pageSummary' => 'Page Total',
        'vAlign'=>'middle',
		'format'=>'raw',
		
        'width'=>'250px',
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
       
        'attribute' => 'product_id',
        //'pageSummary' => 'Page Total',
        'vAlign'=>'middle',
	'format'=>'raw',
	'label' => 'Expectation Name',	
        'width'=>'250px',
         'value' => function($data) {
                       
                       $getuser = \common\models\SaveSearch::findOne($data->product_id);
                       if($getuser){
                           $user = $getuser->expectation_id;
						   if($data->role_id =='7'){
                   $getuser1 = \common\models\SellorExpectations::findOne($user);
				   if($getuser1){
						   $name = $getuser1->save_search_as;
						   return Html::a('<button class="btn btn-default"    data-html="true"  style="width:140px;border-color:white;border:1px solid;"  onclick = "showpropdet('.$data->role_id.','.$data->user_id.','.$data->product_id.','.$data->id.')">'.$name.'</button>', $url = 'javascript:void(0)', [
                                               'title' => Yii::t('yii', 'Click to View Saved Expectation'),
                                   ]); }

                   }else if($data->role_id =='4'){
                   $getuser1 = \common\models\LessorExpectations::findOne($user);
				   if($getuser1){
					
				   $name = $getuser1->save_search_as;
				   return Html::a('<button class="btn btn-default"    data-html="true"  style="width:140px;border-color:white;border:1px solid;"  onclick = "showpropdet('.$data->role_id.','.$data->user_id.','.$data->product_id.','.$data->id.')">'.$name.'</button>', $url = 'javascript:void(0)', [
                                               'title' => Yii::t('yii', 'Click to View Saved Expectation'),
                                   ]); }
                        }else{$name = 'No Expectation';
						return Html::a('<button class="btn btn-default"    data-html="true"  style="width:140px;border-color:white;border:1px solid;"  onclick = "showpropdet('.$data->role_id.','.$data->user_id.','.$data->product_id.')">'.$name.'</button>', $url = 'javascript:void(0)', [
                                               'title' => Yii::t('yii', 'Click to View Saved Expectation'),
                                   ]); }

                      
						   
						   
						   
                       }else{$user = 'No Expectation';} 
                      
                   }
     ], 

       [
       
        'attribute' => 'product_id',
        //'pageSummary' => 'Page Total',
        'vAlign'=>'middle',
	'format'=>'raw',
	'label' => 'Shortlist',	
        'width'=>'250px',
         'value' => function($data) {
                       
                       $getuser = \common\models\SaveSearch::findOne($data->product_id);
                       if($getuser){
                   $user = $getuser->expectation_id;
                 $getuser1 = \common\models\Shortlistproperty::find()->where("user_id = '$data->user_id' and expectation_id='$user'")->count();

                   
                       }else{$getuser1 = 'No Shortlist';} 

                      return '<a href="javascript:void(0):" onclick = "getshortlist('.$data->role_id.','.$data->user_id.','.$data->product_id.')" >'.$getuser1.'</a>'; }
     ], 
	
   
   
   
],
     'containerOptions'=>false, // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax'=>true, // pjax is set to always true for this demo
    // set your toolbar
    'toolbar'=> [
        ['content'=>
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
    'export'=>[
        'fontAwesome'=>true
    ],
    // parameters from the demo form
    'bordered'=>true,
    'striped'=>true,
    'condensed'=>true,
    'responsive'=>false,
    'hover'=>true,
    //'showPageSummary'=>true,
    'panel'=>[
        'type'=>GridView::TYPE_DEFAULT,
        'heading'=>false,
    ],
   'persistResize'=>true,
    'exportConfig'=>true,

]);
?>
           
		   
 <script>
function functionprofileplus(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['usersprofile/postlogin']) ?>?id='+str+'', '_blank');
  win.focus();
}

function showpropdet(role_id,user_id,expec_id,lead_id){
if(role_id == '7'){
   window.open('<?php echo yii::$app->urlManager->createUrl(['buyeraction/searchaction']) ?>?id='+user_id+'&e_id='+expec_id+'&l_id='+lead_id, '_blank');
}else if(role_id = '4'){
   window.open('<?php echo yii::$app->urlManager->createUrl(['lesseeaction/searchaction']) ?>?id='+user_id+'&e_id='+expec_id+'&l_id='+lead_id, '_blank');
}


}


function getshortlist(role_id,user_id,expec_id){
if(role_id == '7'){
   window.open('<?php echo yii::$app->urlManager->createUrl(['lesseeaction/index1']) ?>?userid='+user_id+'&e_id='+expec_id, '_blank');
}else if(role_id = '4'){
   window.open('<?php echo yii::$app->urlManager->createUrl(['lesseeaction/index']) ?>?userid='+user_id+'&e_id='+expec_id, '_blank');
}


}
</script>
             <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
       
        <script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
       
