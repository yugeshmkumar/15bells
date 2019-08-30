<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;

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
    //     'attribute'=>'company_employee_id',
    // ],

    
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'property_for',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'city',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'locality',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'town_name',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'sector_name',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'address',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'longitude',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'latitude',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'builder_name',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'project_name',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'property_type_id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Owner_name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'primary_contact_no',
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'building_name',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'secondary_contact_no',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'landline_no',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'email_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'property_on_floor',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'unit_block',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'unit_number',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'buildup_area',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'buildup_unit',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'carpet_area',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'carpet_unit',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'owner_address',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'total_no_of_floors',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'passenger_lift',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'service_lift',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ceiling_height',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'backup_power',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'building_security',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'maintenance_agency',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'floor_plate_area',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'type_of_space',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'visitor_parking',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'covered_parking',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'asking_lease_rate',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'rate_negotiable',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'maintenance_charge',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'security_deposit',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'security_negotiable',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'lock_in_period',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'lock_in_negotiable',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'lease_period_restriction',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'max_period_lease',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'open_rentfree_period',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'max_rentfree_period',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'Asking_property_price',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'price_negotiable',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'property_with_saledeed',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'property_power_attorney',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'pan_card',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'adhar_card',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'property_tax_id',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'completion_in_percentage',
    // ],

    [
        'label' => 'No of properties',
        'attribute' => 'id',
        'filter' => false,
        'options' => ['style' => 'width:100px;'],
        'format' => 'raw',
        'value' => function($model, $data) {
         $request_id = $model->id;
         $primary_contact_no = $model->primary_contact_no;

   
         $totalCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM addproperty_onepage_form  where primary_contact_no= "'.$model->primary_contact_no.'"')->queryScalar();      
        
         if ($totalCount > 0) {
            return Html::a($totalCount.' Properties','',['onclick' => "window.open ('".Url::toRoute(['csrphoneindex', 
            'phone' => $model->primary_contact_no])."'); return false", 
                'class' => 'btn btn-success center-block']);
        } else {
            return Html::a('<button class="btn btn-info" id="movetoemddocs" style="border-color:#0fd8da !important;border:1px solid;" onclick="movetoemd()" >'.$totalCount.' Properties</button>', $url = 'javascript:void(0)', []);
        }
     
}
    ],

    // [
    //     'label' => 'Followup',
    //     'attribute' => 'id',
    //     'filter' => false,
    //     'options' => ['style' => 'width:100px;'],
    //     'format' => 'raw',
    //     'value' => function($model) {

    //         return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid;" onclick="viewdocs()" >Recall</button>', $url = 'javascript:void(0)', []);

    //       }
    // ],

    // [
    //     'label' => 'Wrong lead',
    //     'attribute' => 'id',
    //     'filter' => false,
    //     'options' => ['style' => 'width:100px;'],
    //     'format' => 'raw',
    //     'value' => function($model) {

    //         return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid;" onclick="viewdocs()" >Wrong lead</button>', $url = 'javascript:void(0)', []);

    //       }
    // ],

    // [
    //     'label' => 'Site Visit',
    //     'attribute' => 'id',
    //     'filter' => false,
    //     'options' => ['style' => 'width:100px;'],
    //     'format' => 'raw',
    //     'value' => function($model) {

    //         return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid;" onclick="viewdocs()" >Site Visit</button>', $url = 'javascript:void(0)', []);

    //       }
    // ],

    // [
    //     'label' => 'Remarks',
    //     'attribute' => 'id',
    //     'filter' => false,
    //     'options' => ['style' => 'width:100px;'],
    //     'format' => 'raw',
    //     'value' => function($model) {

    //         return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid;" onclick="viewdocs()" >Remarks</button>', $url = 'javascript:void(0)', []);

    //       }
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'property_status',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'followup_date_time',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'followup_comment',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'isactive',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_date',
    // ],
    // [
    //     'class' => 'yii\grid\ActionColumn',
    //     'template' => '{complete}',
    //     'buttons' => [
    //         'complete' => function ($url) {
    //             return Html::a(
    //                 '<span class="glyphicon glyphicon-arrow-right"></span>',
    //                 $url, 
    //                 [
    //                     'title' => 'Complete',
    //                     'data-pjax' => '0',
    //                 ]
    //             );
    //         },
    //     ],
    // ],
    // [
    //     'class' => 'kartik\grid\ActionColumn',
    //     'dropdown' => false,
    //     'vAlign'=>'middle',
    //     'urlCreator' => function($action, $model, $key, $index) { 
    //             return Url::to([$action,'id'=>$key]);
    //     },
    //     'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
    //     'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
    //     'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
    //                       'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
    //                       'data-request-method'=>'post',
    //                       'data-toggle'=>'tooltip',
    //                       'data-confirm-title'=>'Are you sure?',
    //                       'data-confirm-message'=>'Are you sure want to delete this item'], 
    // ],

];   