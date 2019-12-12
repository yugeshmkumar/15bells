<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ActiveDataProvider;
use yii\db\Query ;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;

$datas =  $dataProvider->query->all();
print_r($dataProvider);die;

?>
<style>
.winner_bg{
    background:#0e0e0e;
    padding:0;
    height:100vh;
}
.winner_bg img{
    margin-top:50px;
}
.lose_bg{
    background:#0e0e0e;
    padding:0;
    height:100vh;
}
.lost_head{
   font-size:70px;
   padding:50px 0 10px;
   color:#c4984f;
   font-weight:bold;
}
</style>


 <div class="col-md-12 text-center winner_bg">
      <div class="">
        <img src="<?= Yii::getAlias('@frontendUrl') ?>/newimg/winner.jpg">
      </div>
  </div> 

 <div class="col-md-12 text-center lose_bg">
      <div class="">
        <h2 class="lost_head">YOU LOSE</h2>
        <img src="<?= Yii::getAlias('@frontendUrl') ?>/newimg/loser.jpg">
      </div>
  </div> 
<div class="transaction-index">

    <!--<h1><?//= Html::encode($this->title) ?></h1>-->

 


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
               'attribute' => 'status',
               'value'=>function($data){
                   return $data["bid_date"];
               }
           ],

           [
            'label' =>"Rank",
            'attribute' => 'end_rank',
            'value'=>function($data){
                return $data["end_rank"];
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
