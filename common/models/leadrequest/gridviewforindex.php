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
			 
			 $searchModel = new \common\models\LeadsSearch();
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
			return '<div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                                <span class="fa fa-angle-down"> </span>
                                            </a><ul class="dropdown-menu pull-right">
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffa&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffa&#39;).style.display=&#39;block&#39;,assignlead('.$data->id.')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-plus"></i></span> Add Details
                                                    </a>
											</li>
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffa&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffa&#39;).style.display=&#39;block&#39;,assignlead('.$data->id.')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-exchange"></i></span> Re-Assign CSR
                                                    </a>
											</li>
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffa&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffa&#39;).style.display=&#39;block&#39;,assignlead('.$data->id.')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-check"></i></span>  Accept Lead
                                                    </a>
											</li>
											<li>
                                                  <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffa&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffa&#39;).style.display=&#39;block&#39;,assignlead('.$data->id.')">
						   
                                                        <span class="label label-sm label-default"> <i class="fa fa-trash"></i></span>  Reject Lead
                                                    </a>
											</li>
												</ul></div>';
			
			
		}
    ],
    [
       
        'attribute' => 'name',
        //'pageSummary' => 'Page Total',
        'vAlign'=>'middle',
		'format'=>'raw',
		
        'width'=>'250px',
        //'headerOptions'=>['class'=>'kv-sticky-column'],
        //'contentOptions'=>['class'=>'kv-sticky-column'],
       'value'=>function($data){
		  
	   return '
	   <div class="btn-group">
                                                                        <a  href="#basic" type="button"  data-toggle="dropdown" data-hover="dropdown" data-close-others="true">'.$data->name.'
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                                            <div class="portlet light profile-sidebar-portlet bordered">
                                   
                                    <div class="profile-userpic">
                                        <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                                    
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> '.$data->name.' </div>
                                        <div class="profile-usertitle-job"> Developer </div>
                                    </div>
                                   
                                    <div class="profile-userbuttons">
                                        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                        <button type="button" class="btn btn-circle red btn-sm">Message</button>
                                    </div></div>
                                                                        </ul>
                                                                    </div>'.'<br/><br/>
																	<a class="btn btn-circle btn-icon-only btn-default toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="View Timeline">
                                            <i class="fa fa-safari"></i>
                                        </a>'.'<a class="btn btn-circle btn-icon-only btn-info toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="facebook">
                                            <i class="fa fa-facebook-official"></i>
                                        </a>'.'<a class="btn btn-circle btn-icon-only btn-info toggler tooltips" href="javascript:;" data-container="body" data-placement="left" data-html="true" data-original-title="linkedin">
                                            <i class="fa fa-linkedin"></i>
                                        </a>';
	   }],
	   
	   [
       
        'attribute'=>'user_id', 
		'label'=>'user_id',
		'vAlign'=>'middle',
		'filter'=>true,
        'format'=>'raw',
        'width'=>'250px',
        
		  'value'=>function($data) {
			    $docsmain[]='';
                          $docsmain[]='<strong>&nbsp;<a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,getuser_iddetails('.$data->id.')"></a>&nbsp;</strong>';
                          
                           return '<a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbff&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccff&#39;).style.display=&#39;block&#39;,getuser_iddetails('.$data->id.')">'.\common\models\user::findOne($data->user_id)->email.'</a>'.implode($docsmain).'
						   ';
                          
        },
    ],
	 [
        'attribute'=>'created_at',
		'label'=>'Apply Date',
		'format'=>'date',
		 'vAlign'=>'middle',
		  'width'=>'200px',
		    'filter' => DatePicker::widget([
                                'model' => $searchModel,
								 'name' => 'created_at',
								'type' => DatePicker::TYPE_COMPONENT_PREPEND,
   // 'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-M-yyyy'
    ] ]),
        'value'=>'created_at'
		],
		 [
                    'class'=>'kartik\grid\EditableColumn',
                    'format'=>'raw',
					 'width'=>'200px',
                    'attribute'=>'tags',
					 'label'=>'Tags',
                    'editableOptions'=> [
                        'header' => 'Tag',
                        'inputType'=> Editable::INPUT_TEXT,
                        'formOptions' => ['action' => ['index']],
                        'submitButton' => [
                            'icon' => '<i class="glyphicon glyphicon-floppy-disk"></i>',
                            'label' => 'Save',
                            'class' => 'btn btn-sm btn-primary'
                        ],
                        'resetButton' => [
                            'icon' => '<i class="glyphicon glyphicon-remove-sign"></i>',
                            'label' => 'Reset',
                            'class' => 'btn btn-sm btn-primary'
                        ],
                    ],
                ],

		
	[
       
		
        'attribute'=>'role_id', 
		'label'=>'Role',
		'vAlign'=>'middle',
        'format'=>'raw',
        'width'=>'200px',
        'noWrap'=>true,
		  'value'=>function ($data) {
			 return '<span class="badge" style="background-color: black"> </span><code>'.\common\models\UserRoles::findOne($data->role_id)->rolename.'</code>';
			
			
        },
    ],
	
    [
        'attribute'=>'id',
		'label'=>'Status',
        'value'=>function ($data) {
			$getleadstatus = \common\models\Leadcurrentstatus::find()->where(['leadid'=>$data->id,'isactive'=>1])->one();
			if($getleadstatus){
            return "<span class='badge' style='background-color: {$data->id}'> </span>  <code>" . 
                \common\models\Leadsbuckets::findOne($getleadstatus->statusid)->bucketname . '</code>';
			}else{
				return "<span class='badge' style='background-color: black'> </span>  <code></code>";
			}
        },
		'filter'=>true,
        'filterType'=>GridView::FILTER_COLOR,
        'vAlign'=>'middle',
        'format'=>'raw',
        'width'=>'300px',
        'noWrap'=>true
    ],
	 
	
    [
        'class'=>'kartik\grid\BooleanColumn',
		'label'=>'Active',
        'attribute'=>'id', 
		
        'vAlign'=>'middle',
    ],
   
   
],
     'containerOptions'=>false, // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax'=>true, // pjax is set to always true for this demo
    // set your toolbar
    'toolbar'=> [
        ['content'=>
		Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-circle btn-icon-only btn-default toggler tooltips' , 'data-container'=>"body", 'data-placement'=>"left" ,'data-html'=>"true" , 'data-original-title' =>"Add new Lead"]).''.
   
											
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
           
 
             <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
       
        <script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
       