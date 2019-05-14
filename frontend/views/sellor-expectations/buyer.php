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
.pagination li{
	padding:0 6px;
}
</style> 
<div class="col-md-12 col-sm-12">
    <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> 
<div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > 
<div class="vvsambqwkstalkbubble" id="vpcobh2"></div> 
</div>
 

                       <div class="portlet portlet-sortable add_managed_proper_div sellr_proprty">
                                <div class="portlet-title">
                                    <div class="caption font-green-sharp exp_titl">
                                        
                                        <span class="caption-subject bold uppercase exp_name">Buyer Expectations</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>
                               <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                     
                                    <div class="addpropertybackend-index">


    <?php 
    
    if($this->beginCache('buyer-expectations',['variations'=>$searchModel->id])){

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>false,
		'options' => ['class' => 'table_common'],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
[
'class' => 'kartik\grid\ExpandRowColumn',
'expandAllTitle' => 'Expand all',
'collapseTitle' => 'Collapse all',
'expandIcon'=>'<i class="fa fa-caret-right"></i>',
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
				 // $url = yii\helpers\Url::base() . '/maps.png';	
				  
				//  return $data->save_search_as .'<a onclick="showmap(' . $data->id . ');" href="javascript:void(0);"> <img src="' . $url . '" /> </a>';	
				  return $data->save_search_as .'<a class="map_mrkr" onclick="showmap(' . $data->id . ')" href="javascript:void(0);"> <i class="fa fa-map-marker"></i></a>';		  
				  

                                
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
                return Html::a('<i class="fa fa-eye update_icn"></i>', $url, [
                            'title' => Yii::t('app', 'lead-view'),'onclick'=>"ga('send', 'event', 'BuyerExpectations Viewproperty', 'BuyerExpectations Viewproperty', 'BuyerExpectations Viewproperty','BuyerExpectations Viewproperty')"]);
            },

            'update' => function ($url, $model) {
                return Html::a('<i class="fa fa-pencil update_icn"></i>', $url, [
                            'title' => Yii::t('app', 'lead-update'),'onclick'=>"ga('send', 'event', 'BuyerExpectations Editproperty', 'BuyerExpectations Editproperty', 'BuyerExpectations Editproperty','BuyerExpectations Editproperty')"]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<i class="fa fa-trash update_icn"></i>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete?'),'onclick'=>"ga('send', 'event', 'Buyer Expectations Delete property', 'Buyer Expectations Delete property', 'Buyer Expectations Delete property','Buyer Expectations Delete property')"]);
            }

          ],
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url ='view?id='.Html::encode($model->id);
                return $url;
            }

            if ($action === 'update') {
                $url ='updateb?id='.Html::encode($model->id);
                return $url;
            }
            if ($action === 'delete') {
                $url ='delete?id='.$model->id;
                return $url;
            }

          }
          ],
       ],
    ]);
    Yii::trace('store buyer expecattions table to log');
    $this->endCache();
     }
      ?>

</div></div> </div> 
                  

</div>

<script>
function showmap(id)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['buyeraction/searchaction']) ?>?id='+id+'', '_blank');
  win.focus();
}
 </script>