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
    //     'class' => 'yii\grid\ActionColumn',
    //     'template' => '{complete}',
    //     'header'   =>'Approve', 
        
    //     'options' => ['style' => 'width:100px;'],
    //     'buttons' => [
    //         'complete' => function ($url) {

    //             return Html::a('<button class="btn btn-info recall_popup" style="border-color:#0fd8da !important;border:1px solid;"  >Approve</button>', $url,[
    //                 'title' => 'Complete',
    //                 'data-pjax' => '0',
    //             ]);

    //             // return Html::a(
    //             //     '<button  class="btn btn-success recall_popup" aria-hidden="true"></span>',
    //             //     $url, 
    //             //     [
    //             //         'title' => 'Complete',
    //             //         'data-pjax' => '0',
    //             //     ]
    //             // );
    //         },
    //     ],
    // ],

    [
        'label' => 'Percentage',
        'attribute' => 'completion_in_percentage',
        'filter' => false,
        'options' => ['style' => 'width:90px;'],
        'format' => 'raw',
        'value' => function($model) {

            return Html::a('<button class="btn btn-default" id="movetoemddocs" style="border-color:#0fd8da !important;border:1px solid ;" >'.$model->completion_in_percentage.' %</button>', $url = 'javascript:void(0)', []);

          }
    ],



    
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'company_employee_id',
    // ],

//     [
//         'label' => 'CSR Employee',
//         'attribute' => 'company_employee_id',
//         'filter' => false,
//         'options' => ['style' => 'width:100px;'],
//         'format' => 'raw',
//         'value' => function($model, $data) {
//          $request_id = $model->id;
//          $company_employee_id = $model->company_employee_id;

//     if ($company_employee_id != NULL) {

//         $query = (new Query())->select('employee_email')->from('company_emp')->where(['id' => $company_employee_id])->andwhere(['isactive' => 1]);
//         $command = $query->createCommand();
//         $data = $command->queryOne();

//         $datas = $data['employee_email'];

//         if ($data) {
//             return Html::a('<button class="btn btn-default" id="movetoemddocs" style="border-color:#0fd8da !important;border:1px solid ;" >'.$datas.'</button>', $url = 'javascript:void(0)', []);
//         } else {
//             return Html::a('<button class="btn btn-info" id="movetoemddocs" style="border-color:#0fd8da !important;border:1px solid;" onclick="movetoemd()" >'.$datas.'</button>', $url = 'javascript:void(0)', []);
//         }
//     } else {
//         return "Not Assigned";
//     }
// }
//     ],
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
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'building_name',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'project_name',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'property_type_id',
    // // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'Owner_name',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'primary_contact_no',
        'width' => '150px',
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
        'label' => 'Followup',
        'attribute' => 'followup_date_time',
        'filter' => false,
        'options' => ['style' => 'width:100px;'],
                        'format' => 'raw',
        'value' => function($model) {

            if ($model->followup_date_time == '') {
                $showtime = 'Not Set';
            } else {
                $showtime = $model->followup_date_time;
            }

            $date = date_create($model->followup_date_time);
                    $scheduled_times = date_format($date, "Y-m-d H:i:s");
                    $scheduled_timesnew = "'$scheduled_times'";                    
                    $request_id = "'$model->id'";
                    $followup_comment = "'$model->followup_comment'";
                    $shortfollowup_comment = $model->followup_comment;

                    if (strlen($shortfollowup_comment) >= 20) {
                       $newstring = substr($shortfollowup_comment, 0, 5). " ... " . substr($shortfollowup_comment, -5);
                    }
                    else if (strlen($shortfollowup_comment) == 0) {

                        $newstring =   'Add Followup';
                    }
                    else {
                        $newstring =   $shortfollowup_comment;
                    }
             
            return Html::a('<button class="btn btn-success recall_popup" style="border-color:#0fd8da !important;border:1px solid;" onclick="viewdocs('. $scheduled_timesnew . ',' . $request_id . ',' . $followup_comment . ')" >' . $newstring . '</button>', $url = 'javascript:void(0)', []);

          }
    ],



   





    [
        'label' => 'Wrong lead',
        'attribute' => 'id',
        'filter' => false,
        'options' => ['style' => 'width:100px;'],
        'format' => 'raw',
        'value' => function($model) {
            $wrongid = $model->id;
            

            return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid;" onclick="wrong_lead('.$wrongid.')" >Wrong lead</button>', $url = 'javascript:void(0)', []);

          }
    ],

    // [
    //     'label' => 'Site Visit',
    //     'attribute' => 'id',
    //     'filter' => false,
    //     'options' => ['style' => 'width:100px;'],
    //     'format' => 'raw',
    //     'value' => function($model) {

    //         if($model->site_visit == ''){

    //             $visittype = 'pending';
    //         }else{
    //             $visittype = $model->site_visit;
    //         }
    //         $visitid = $model->id;
    //         $site_visit = "'".$visittype."'";

    //         return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid;" onclick="site_visit('.$visitid.','.$site_visit.')" >'.$visittype .'</button>', $url = 'javascript:void(0)', []);

    //       }
    // ],

    [
        'label' => 'Remarks',
        'attribute' => 'id',
        'filter' => false,
        'options' => ['style' => 'width:100px;'],
        'format' => 'raw',
        'value' => function($model) {

            $visitid = $model->id;
            $shortwrongcomment = $model->remarks;

                    if (strlen($shortwrongcomment) >= 20) {
                       $newstring = substr($shortwrongcomment, 0, 5). " ... " . substr($shortwrongcomment, -5);
                    }
                    else if (strlen($shortwrongcomment) == 0) {

                        $newstring =   'Add remarks';
                    }

                    else {
                        
                        $newstring =   $shortwrongcomment;
                    }

            return Html::a('<button class="btn btn-success" style="border-color:#0fd8da !important;border:1px solid;" onclick="addremarks('.$visitid.')" >'.$newstring.'</button>', $url = 'javascript:void(0)', []);

          }
    ],

    [
        'label' => 'Send ',
        'attribute' => 'id',
        'filter' => false,
        'options' => ['style' => 'width:100px;'],
                        'format' => 'raw',
        'value' => function($data) {

             return '<div class="btn-group">
                                        <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-list"></i>
                                            <span class="fa fa-angle-down"> </span>
                                        </a><ul class="dropdown-menu pull-right">
                                        
                                                                                    
                                              <li>
                                              <a onclick="assigncsrhead(' . $data->id . ')">
                       
                                                    <span class="label label-sm label-default"> <i class="fa fa-exchange"></i></span> Send to CSR Head
                                                </a>
                                        </li>
                                        
                                            </ul></div>';
          }
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'options' => ['style' => 'width:100px;'],
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
    
];   

?>


