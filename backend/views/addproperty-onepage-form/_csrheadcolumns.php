<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;
use kartik\datetime\DateTimePicker;

// Register the JS file
$this->registerJsFile('@web/js/script.js', ['depends' => [\yii\web\JqueryAsset::class]]);


return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],

    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Owner_name',
        'width' => '150px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'primary_contact_no',
        'width' => '150px',
        'format' => 'raw',
        'value' => function ($model, $key, $index, $column) {
            return "<a href='#' onclick='dialHandler(event, \"{$model->primary_contact_no}\")'><i class='fa fa-phone'></i></a>";
        },
        'contentOptions' => ['style' => 'text-align:center;'],
    ],
    

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

    [
        'label' => 'Assign Date',
        'attribute' => 'reassign_date',
        'filter' => \yii\jui\DatePicker::widget([
            'language' => 'en',
            'dateFormat' => 'yyyy-MM-dd',
            'model' => $searchModel,
            'attribute' => 'reassign_date',
              ]),
          'format' => 'html',

            // 'options' => ['style' => 'width:90px;'],
        
             'value' => function($model) {
             
                return   date("d M Y", strtotime($model->reassign_date));

             }
    ],


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
        'class' => 'yii\grid\ActionColumn',
        'template' => '{complete}',
        'header'   =>'Approve', 
        
        'options' => ['style' => 'width:100px;'],
        'buttons' => [
            'complete' => function ($url) {

                return Html::a('<button class="btn btn-info recall_popup" style="border-color:#0fd8da !important;border:1px solid;"  >Approve</button>', $url,[
                    'title' => 'Complete',
                    'data-pjax' => '0',
                ]);


            },
        ],
    ],

    [
            'label' => 'Reassign',
            'attribute' => 'id',
            'filter' => false,
            'options' => ['style' => 'width:100px;'],
                            'format' => 'raw',
            'value' => function($data) {

                //echo '<pre>';
                //print_r($data);
                //die;
                if ($data->role_id == 23) {
                    return Html::a('<button class="btn btn-default" onclick="assigntl(' . $data->id . ')" style="border-color:#0fd8da !important;border:1px solid ;" >Reassign to TL</button>', $url = 'javascript:void(0)', []);
                } else if ($data->role_id == 24) {
                    $employeeOptions = \common\models\CompanyEmp::find()->where(['role_id' => 23])->all();

                    // Build dropdown options array
                    $dropdownOptions = yii\helpers\ArrayHelper::map($employeeOptions, 'id', 'name');
                    return Html::dropDownList('dropdown', null, $dropdownOptions, ['prompt' => 'Select employee', 'onchange' => 'assignagent(' . $data->id . ', this.value)']);
                } else {
                    return Html::a('<button class="btn btn-default" onclick="assigncsr(' . $data->id . ')" style="border-color:#0fd8da !important;border:1px solid ;" >Reassign to CSR</button>', $url = 'javascript:void(0)', []);
                }
            }
        ],


    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'options' => ['style' => 'width:100px;'],
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'button', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'button', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => [
            'role' => 'modal-remote',
            'title' => 'Delete',
            'data-confirm' => false,
            'data-method' => false,
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'
        ],
    ],
];

?>


