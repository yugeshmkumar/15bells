
<?php
use yii\helpers\Url;
use yii\helpers\Html;

use kartik\grid\GridView;
$arrlist = ['forward_auction','reverse_auction','instant']; 

return [

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'buyer_id',
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'end_rank',
    ],


   

    
 
//    [

//     'attribute' => 'buyer_id',
//       // 'label' =>"Username",
//      //  'type' => 'html',
    
//      // 'format'=>'text',

//       'value'=>function($model){
//         return  $model->buyer_id;
//     }

//         // $getuserid="select username from user where id='$userid'";
//         // $connection = Yii::$app->getDb();
//         // $command = $connection->createCommand($getuserid);
//         // $result = $command->queryOne();
          
       
//    ],

//        ['attribute' => 'buyer_id',
//        'label' => 'Username',
//        'format' => 'raw',          
//        'filter' => false,
//        'value' => function($data) {

//            $propid = $data->buyer_id;
//           return $propid;
//        }
//    ],
  

   [
    'class'=>'\kartik\grid\DataColumn',
    'attribute'=>'username',
],


[
    'class'=>'\kartik\grid\DataColumn',
    'attribute'=>'bidder',
],
//    [
//            'label' =>"Bid Amount",
//            'attribute' => 'bid_amount',
//            'value'=>function($data){
//                return $data["bidder"];
//            }
//        ],


[   
     'class'=>'\kartik\grid\DataColumn',
       'label' =>"Bid Date",
       'attribute' => 'bid_date',
       'value'=>function($data){
           return $data["bid_date"];
       }
   ],

  // 'end_rank',
  
     [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'status',
     ],

     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id',
		'format'=>'raw',
		'filter'=>false,
		'label'=>'Close deal',
		'value'=>function($model){
			$prodid = $model['product_id'];
			$transid = $model['id'];
			return '<a id="pulsate-regular" onclick=mybidfunct('.$prodid.','.$transid.');> <button class="btn btn-info">Close Deal</button></a>';

		}
    ]

    // [
    //         'label' => 'Remarks',
    //         'attribute' => 'id',
    //         'filter' => false,
    //         'options' => ['style' => 'width:100px;'],
    //         'format' => 'raw',
    //         'value' => function($model) {
    
    //             return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid;" onclick="viewdocs('.$model->id.')" >Remarks</button>', $url = 'javascript:void(0)', []);
    
    //           }
    //     ]

];
// return [
//     [
//         'class' => 'kartik\grid\CheckboxColumn',
//         'width' => '20px',
//     ],
//     [
//         'class' => 'kartik\grid\SerialColumn',
//         'width' => '30px',
//     ],
// 	[
// 'class' => 'kartik\grid\ExpandRowColumn',
// 'expandAllTitle' => 'Expand all',
// 'collapseTitle' => 'Collapse all',
// 'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
// 'value' => function ($model, $key, $index, $column) {
// return GridView::ROW_COLLAPSED;
// },
// 'detailUrl' => yii\helpers\Url::to(['/vr-setup/viewp']),
// 'detailRowCssClass' => GridView::TYPE_DEFAULT,
// 'pageSummary' => false,
// ],
//         [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'id',
// 		'format'=>'raw',
// 		'filter'=>false,
// 		'label'=>'Actions',
// 		'value'=>function($data,$model){
// 			if($data->isactive == 1){
// 			return '<a id="pulsate-regular" onclick=mybidfunct('.$data->id.');> <button class="btn btn-info">Enter VR Room</button></a>';
// 			}else {
// 				return '<button class="btn btn-default">Run Report</button>';
// 			}
// 		}
//     ],
//     [
//          'class' => \common\grid\EnumColumn::className(),
//         'attribute'=>'auction_type',
// 		 'enum' =>\common\models\VrSetup::getAuctiontype(),
// 		'filter'=>\common\models\VrSetup::getAuctiontype(),
		
//     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'propertyID',
// 		'value'=>function($data){
// 			return \common\models\Addpropertybackend::findOne($data->propertyID)->id;
// 		}
//     ],
//      [
//          'class'=>'\kartik\grid\DataColumn',
//          'attribute'=>'moderatorID',
// 		 'value'=>function($data){
// 			 $name = \common\models\CompanyEmpb::find()->where(['id'=>$data->moderatorID])->one();
//                         if($name){
//                              return $name->name;
//                           }else{return 'No Name';}
                        

// 		}
//      ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'fromdatetime',
//     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'todatetime',
//     ],

//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'id',
// 		'format'=>'raw',
// 		'filter'=>false,
// 		'label'=>'Result',
// 		'value'=>function($data,$model){
            
// 			if($data->auction_type == 'forward_auction'){

// 			return '<button onclick="seeresultforward('.$data->id.')"   class="btn btn-success">Result VR Room</button>';
// 			}else {
//                 return '<button onclick="seeresultreverse('.$data->id.','.$data->brandID.')"  class="btn btn-success">Result VR Room</button>';
// 			}
// 		}
//     ],

    

// ];   

