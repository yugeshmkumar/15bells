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

$datas =  $dataProvider->getModels();
// echo '<pre>';print_r($datas);die;

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

<?php 
foreach ($datas as $data){
    $loggedin=Yii::$app->user->identity->id;

if($data['buyer_id'] == $loggedin){

    if($data['end_rank'] == 1){  ?>

    <div class="col-md-12 text-center winner_bg">
      <div class="">
        <img src="<?= Yii::getAlias('@frontendUrl') ?>/newimg/winner.jpg">
      </div>
  </div> 

  <?php   }else{  ?>


  <div class="col-md-12 text-center lose_bg">
      <div class="">
        <h2 class="lost_head">YOU LOSE</h2>
        <img src="<?= Yii::getAlias('@frontendUrl') ?>/newimg/loser.jpg">your rank is <?php echo $data['end_rank']; ?>
      </div>
  </div> 


   <?php } }  } ?>


 

 
<div class="transaction-index">

    <!--<h1><?//= Html::encode($this->title) ?></h1>-->

 


<?php
$script = <<< JS
$(document).ready(function() {
    // setInterval(function() {     
    //  $.pjax.reload({container:'#m1'});
    // }, 2000); 
});
JS;
$this->registerJs($script);
?>
