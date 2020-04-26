<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>

   


<?php



 Pjax::begin(['id'=>'m1']); ?>   
 
 
  <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'layout'=>"{sorter}\n{pager}\n{summary}\n{items}",
        'columns' => [

            'buyer_id',
         
           [

            'attribute' => 'buyer_id',
              // 'label' =>"Username",
             //  'type' => 'html',
            
             // 'format'=>'text',

              'value'=>function($model){
                return  $model->buyer_id;
            }

                // $getuserid="select username from user where id='$userid'";
                // $connection = Yii::$app->getDb();
                // $command = $connection->createCommand($getuserid);
                // $result = $command->queryOne();
                  
               
           ],

           ['attribute' => 'buyer_id',
           'label' => 'Username',
           'format' => 'raw',          
           'filter' => false,
           'value' => function($data) {

               $propid = $data->buyer_id;
              return $propid;
           }
       ],
           'bid_amount',
    //    [
    //            'label' =>"Bid Amount",
    //            'attribute' => 'bid_amount',
    //            'value'=>function($data){
    //                return $data["bidder"];
    //            }
    //        ],
      

[
               'label' =>"Bid Date",
               'attribute' => 'bid_date',
               'value'=>function($data){
                   return $data["bid_date"];
               }
           ],

           'end_rank',
          
   	'status',
        
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

<?php
$script = <<< JS
// $(document).ready(function() {
//     setInterval(function() {     
//      $.pjax.reload({container:'#m1'});
//     }, 2000); 
// });
JS;
$this->registerJs($script);
?>
