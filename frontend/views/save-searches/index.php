<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SaveSearchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Save Searches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-9">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'role_type',
           // 'search_for',
           // 'type',
            //'geometry:ntext',
            //'radius',
            //'user_id',
            'location_name',
            //'town',
            ['attribute'=>'id',
			  'label'=>'Expectation Name',
			  'format'=>'raw',
			  //'width'=>'300px',
			  'value'=>function($data){
				 // $url = yii\helpers\Url::base() . '/maps.png';	
				  
				//  return $data->save_search_as .'<a onclick="showmap(' . $data->id . ');" href="javascript:void(0);"> <img src="' . $url . '" /> </a>';	
				  return '<a class="map_mrkr" onclick="showmap(' . $data->id . ')" href="javascript:void(0);"> <i class="fa fa-map-marker"></i></a>';		  
				  

                                
			  }
			
			],
            //'sector',
            //'country',
            //'lat',
            //'lng',
            //'property_type',
            //'area',
            //'area_unit',
            //'min_prices',
            //'max_prices',
            //'property_auction_type',
            //'status',
            //'created_date',
            //'updated_date',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<script>
function showmap(id)
{
    
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['lesseeaction/searchaction']) ?>?id='+id+'', '_blank');
  win.focus();
}
 </script>