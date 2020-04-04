<?php
use yii\helpers\Url;
use common\models\User;
use yii\helpers\Html;


return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    
    ['attribute' => 'property_id',
            'label' => 'Property ID',
            'format' => 'raw',
            'width' => '250px',
            'filter' => false,
            'value' => function($data) {

                $propid = 273 * 179 - $data->property_id;
                 return Html::a('<button class="btn btn-default"    data-html="true"  style="width:90px;border-color:white;border:1px solid;"  onclick = "showpropdet('.$data->property_id.')">PR'.$propid.'</button>', $url = 'javascript:void(0)', [
                                'title' => Yii::t('yii', 'Click to View Property details'),
                    ]);
            }
        ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'sales_executive_id',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'client_id',
    // ],
    ['attribute' => 'client_id',
                'label' => 'Client',
                'width' => '200px',
                'format' => 'raw',
                //  'contentOptions'=>['style'=>'width: 200px;'],
                'filter' => true,
                'value' => function($data) {
                    if (isset(\common\models\User::findOne($data->client_id)->fullname)) {
                        $fullname = \common\models\User::findOne($data->client_id)->fullname;
                        return Html::a('<button class="btn btn-default"    data-html="true"  style="border-color:white;border:1px solid;"  onclick = "showuser(' . $data->client_id . ')">'. $fullname . '</button>', $url = 'javascript:void(0)', [
                                'title' => Yii::t('yii', 'Click to View User details'),
                    ]);
                    } else {
                        return '';
                    }
                }
            ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'client_total_amount',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'client_pending_amount',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'client_pending_amount_date',
    // ],
    
    ['attribute' => 'owner_id',
                'label' => 'Owner',
                'width' => '200px',
                'format' => 'raw',
                //  'contentOptions'=>['style'=>'width: 200px;'],
                'filter' => true,
                'value' => function($data) {
                    if (isset(\common\models\User::findOne($data->owner_id)->fullname)) {
                        $fullname = \common\models\User::findOne($data->owner_id)->fullname;
                        return Html::a('<button class="btn btn-default"    data-html="true"  style="border-color:white;border:1px solid;"  onclick = "showuser(' . $data->owner_id . ')">'. $fullname . '</button>', $url = 'javascript:void(0)', [
                                'title' => Yii::t('yii', 'Click to View User details'),
                    ]);
                    } else {
                        return '';
                    }
                }
            ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'owner_total_amount',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'owner_pending_amount',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'owner_pending_amount_date',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_date',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   