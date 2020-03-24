<?php
use yii\helpers\Url;
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
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'buyer_id',
    // ],

    ['attribute' => 'buyer_id',
                'label' => 'Buyer',
                'width' => '200px',
                'format' => 'raw',
                //  'contentOptions'=>['style'=>'width: 200px;'],
                'filter' => true,
                'value' => function($data) {
                    if (isset(\common\models\User::findOne($data->buyer_id)->fullname)) {
                        $fullname = \common\models\User::findOne($data->buyer_id)->fullname;
                        return Html::a('<button class="btn btn-default"    data-html="true"  style="border-color:white;border:1px solid;"  onclick = "showuser(' . $data->buyer_id . ')">'. $fullname . '</button>', $url = 'javascript:void(0)', [
                                'title' => Yii::t('yii', 'Click to View User details'),
                    ]);
                    } else {
                        return '';
                    }
                }
            ],


    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'sellor_id',
    // ],

    ['attribute' => 'sellor_id',
                'label' => 'Seller',
                'width' => '200px',
                'format' => 'raw',
                //  'contentOptions'=>['style'=>'width: 200px;'],
                'filter' => true,
                'value' => function($data) {
                    if (isset(\common\models\User::findOne($data->sellor_id)->fullname)) {
                        $fullname = \common\models\User::findOne($data->sellor_id)->fullname;
                        return Html::a('<button class="btn btn-default"    data-html="true"  style="border-color:white;border:1px solid;"  onclick = "showuser(' . $data->sellor_id . ')">'. $fullname . '</button>', $url = 'javascript:void(0)', [
                                'title' => Yii::t('yii', 'Click to View User details'),
                    ]);
                    } else {
                        return '';
                    }
                }
            ],
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
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'meeting_date_time',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'status',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'comment',
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