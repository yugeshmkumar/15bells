<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>

   


<?php



 Pjax::begin(['id'=>'m1']); ?>    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'columns' => [
         
           [
               'label' =>"Username ",
               'attribute' => 'username',
               'value'=>function($data){
                   return $data["username"];
               }
           ],
       [
               'label' =>"Bid Amount",
               'attribute' => 'bid_amount',
               'value'=>function($data){
                   return $data["bidder"];
               }
           ],
      

[
               'label' =>"Bid Date",
               'attribute' => 'bid_date',
               'value'=>function($data){
                   return $data["bid_date"];
               }
           ],
          
   	[
               'label' =>"Status",
               'attribute' => 'status',
               'value'=>function($data){
                   return $data["status"];
               }
           ],
        
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function() {     
     $.pjax.reload({container:'#m1'});
    }, 2000); 
});
JS;
$this->registerJs($script);
?>
