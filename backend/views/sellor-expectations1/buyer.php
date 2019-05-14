<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\editable\Editable;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Property Management');
$this->params['breadcrumbs'][] = $this->title;
?>
 
<!--  <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
 <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
						if($checkrole->item_name == "Company_user") {  ?> 
						 <a href="<?php echo Yii::$app->urlManager->createUrl(['site/couserdash']) ?>">Home</a><?php } else { ?>
    <a href="<?php echo Yii::$app->urlManager->createUrl(['site/userdash']) ?>">Home</a>
						<?php } ?>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>User</span>
								<i class="fa fa-circle"></i>
                            </li>
							 <li>
                                <span>EXPECTATIONS</span>
                            </li>
                        </ul>
                        
                    </div>  -->
<style>
.vvsambqwkstalkbubble { 
    width: 100%; 
    height: 150%;  
    background:#fefefe; 
    -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); 
    border:1px solid #dedede; 
    position: relative;
} 
.vvsambqwkstalkbubble:before { 
 }
</style> 
<style>
.vvsambqwksukvveekmuzqtsblevbbff{
    display: none;
    position: fixed; 
    top: 0%;
    left: 0%;
    width: 100%;
    height: 150%;
    z-index:1001; 
    background-color:#ffffff; 
    opacity:.30;
    filter: alpha(opacity=80);
}
.vvsambqwksukvveekmuzqtswhevbbff {
    display: none;
    position: fixed; 
    -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); 
    background-color:#fefefe;    
    right:25%;  
    left:35%; 
    top:30%; 
    bottom:30%; 
    z-index:1015; 
    overflow:hidden; 
    overflow-x:hidden
}
.add_managed_proper_div{
    padding: 0;
    border: 0px !important;
    border-left: 0px !important;
    background-color: transparent;
}
.caption{
    font-size: 26px !important;
    color: #fff !important;
    font-weight: 600;
    text-transform: uppercase;
    font-family: 'Roboto', sans-serif;
}
.portlet-title{
    border-bottom: 0px !important;
    margin-bottom: 0px !important;
}
.grid-view{
    border-top: 3px solid #e5ac31;
    background-color: rgba(255, 255, 255, 0.25);
    padding: 20px;
}
.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: transparent;
    color: #000;
    font-weight: 600;
    font-family: 'Roboto', sans-serif;
}
.filters input{
    border-radius: 10px !important;
}
.filters select{
    border-radius: 10px !important;
}
.kv-grid-table thead {
    background-color: #d4d4d4;
}
.kv-grid-table thead tr th{
    text-align: center;
    color:#000;
}
.kv-grid-table thead tr th a{
    color: #000;
    font-weight: 600;
    font-family: 'Roboto', sans-serif;
    text-decoration: none;
}
#w0-container table{
	color:#ffffff !important;
}
#w0-container .glyphicon{
	color:#ffffff !important;
	padding:0 4px;
}
.table-striped > tbody > tr:nth-of-type(odd){
	color:#ffffff !important;
}
.summary{
	color:#ffffff !important;
}
.table .table{
	background:transparent !important;
}
.box{

background:#000;
}
</style> 
<div class="col-md-9 col-sm-8" style="width:98%;">
    <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> 
<div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > 
<div class="vvsambqwkstalkbubble" id="vpcobh2"></div> 
</div>
 

                       <div class="portlet portlet-sortable add_managed_proper_div">
                                <div class="portlet-title">
                                    <div class="caption font-green-sharp">
                                        <!--<i class="fa fa-building font-green-sharp"></i>-->
                                        <span class="caption-subject bold uppercase">Buyer Expectations</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>
                               <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                     
                                    <div class="addpropertybackend-index">


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>false,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
[
'class' => 'kartik\grid\ExpandRowColumn',
'expandAllTitle' => 'Expand all',
'collapseTitle' => 'Collapse all',
'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
'value' => function ($model, $key, $index, $column) {
return GridView::ROW_COLLAPSED;
},
'detailUrl' => yii\helpers\Url::to(['sellor-expectations/viewmy']),
'detailRowCssClass' => GridView::TYPE_DEFAULT,
'pageSummary' => false,
],
           // 'id',
//            ['attribute'=>'user_id',
//            'label'=>'Lead Details',
//            'format'=>'raw',
//            'width'=>'250px',
//            'value'=>function($data){
//                return \common\models\User::findOne($data->user_id)->email;
//            }
//          
//          ],
//          ['attribute'=>'user_type',
//            'label'=>'Lead Role',
//            'format'=>'raw',
//            'width'=>'100px',
//            'value'=>function($data){
//                return $data->user_type;
//            }
//          
//          ],
            ['attribute'=>'save_search_as',
              'label'=>'Expectation Name',
              'format'=>'raw',
              'width'=>'300px',
              'value'=>function($data){
                  return $data->save_search_as;
              }
            
            ],
            
            
            ['attribute'=>'created_date',
              'label'=>'Created Date',
              'format'=>'raw',
              'width'=>'300px',
              'value'=>function($data){
                  return $data->created_date;
              }
            
            ],
            [
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Actions',
          'headerOptions' => ['style' => 'color:#000'],
          'template' => '{view}{update}{delete}',
          'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                ]);
            },

            'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                ]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete?'),
                ]);
            }

          ],
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url ='view?id='.$model->id;
                return $url;
            }

            if ($action === 'update') {
                $url ='updateb?id='.$model->id;
                return $url;
            }
            if ($action === 'delete') {
                $url ='delete?id='.$model->id;
                return $url;
            }

          }
          ],
       ],
    ]); ?>

</div></div> </div> 
                  

</div>
