<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\UrlRule;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectations */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sellor Expectations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sellor-expectations-view col-md-9">

    <h3 class="expt_hed">View Buyer Expectations</h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
           // 'user_id',
           // 'user_type',
           // 'property_id',
           // 'save_search_as',
            ['attribute'=>'save_search_as',
              'label'=>'Expectation Name',
              'format'=>'raw',
              'width'=>'300px',
              'value'=>function($data){
                  return $data->save_search_as;
              }
            
            ],
            //'rate_negotiable',

             ['attribute'=>'rate_negotiable',
              'label'=>'Rate negotiable',
              //'format'=>'raw',
              'width'=>'300px',
              'value'=>function($data){
                
                  return ($data->rate_negotiable == NULL ? 'Not Defined' : $data->rate_negotiable);
                   //return $data->payment_time;
              }
            
            ],
             ['attribute'=>'payment_time',
              'label'=>'Payment Time',
              //'format'=>'raw',
              'width'=>'300px',
              'value'=>function($data){
                
                  return ($data->payment_time == NULL ? 'Not Defined' : $data->payment_time);
                   //return $data->payment_time;
              }
            
            ],
            //'payment_time:datetime',
            'payment_time_negotiable',
            //'loan_against_property',
                    
              ['attribute'=>'loan_against_property',
              'label'=>'loan Against Property',
              //'format'=>'raw',
              'width'=>'300px',
              'value'=>function($data){
                
                  return ($data->loan_against_property == NULL ? 'Not Defined' : $data->loan_against_property);
                   //return $data->payment_time;
              }
            
            ],  
              ['attribute'=>'all_dues_cleared',
              'label'=>'All Dues Cleared',
              //'format'=>'raw',
              'width'=>'300px',
              'value'=>function($data){
                
                  return ($data->all_dues_cleared == NULL ? 'Not Defined' : $data->all_dues_cleared);
                   //return $data->payment_time;
              }
            
            ],  
                    
            ['attribute'=>'vastu_facing',
              'label'=>'Vastu Facing',
              //'format'=>'raw',
              'width'=>'300px',
              'value'=>function($data){
                
                  return ($data->vastu_facing == NULL ? 'Not Defined' : $data->vastu_facing);
                   //return $data->payment_time;
              }
            
            ],  
                    
           ['attribute'=>'loan_to_be_applied',
              'label'=>'Loan to be Applied',
              //'format'=>'raw',
              'width'=>'300px',
              'value'=>function($data){
                
                  return ($data->loan_to_be_applied == NULL ? 'Not Defined' : $data->loan_to_be_applied);
                   //return $data->payment_time;
              }
            
            ],           
                    
           // 'all_dues_cleared',
          //  'vastu_facing',
           // 'loan_to_be_applied',
           // 'is_active',
           // 'created_date',
        ],
    ]) ?>

</div>
