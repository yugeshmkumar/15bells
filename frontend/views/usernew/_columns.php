<?php
use yii\helpers\Url;

return [
    // [
        // 'class' => 'kartik\grid\CheckboxColumn',
        // 'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
   ['attribute'=>'fname',
               'label' =>'Sub-User Name',
              'value'=>function($data)
             {
        return $data->fname;
             }
              ],
			  ['attribute'=>'subuser_id',
             'label' =>'Contact Number',
              'value'=>function($data)
             {
				 if(isset(\common\models\User::findOne($data->subuser_id)->username)) {
				 return \common\models\User::findOne($data->subuser_id)->username; } else { return '' ;}
             }
              ],
   ['attribute'=>'subuser_id',
               'label' =>'E-mail',
              'value'=>function($data)
             {
				  if(isset(\common\models\User::findOne($data->subuser_id)->email)) {
        return \common\models\User::findOne($data->subuser_id)->email; } else { return '' ;}
             }
              ],
          
         
     [
         'class' => 'kartik\grid\ActionColumn',
         'dropdown' => true,
		 
         'vAlign'=>'middle',
		 'template'=>'{update},{delete}',
         'urlCreator' => function($action, $model, $key, $index) { 
                 return Url::to(['/usernew/'.$action,'id'=>$model->subuser_id]);
         },
         //'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
         'updateOptions'=>['role'=>'modal-remote','title'=>'Edit', 'data-toggle'=>'tooltip'],
         'deleteOptions'=>['role'=>'modal-remote','title'=>'Disable', 'label'=>'<i class="fa fa-trash"></i> Disable',
                           'data-confirm'=>false, 'data-method'=>true,// for overide yii data api
                           'data-request-method'=>'post',
                           'data-toggle'=>'tooltip',
                           'data-confirm-title'=>'Are you sure?',
                           'data-confirm-message'=>'Are you sure want to disable this item'], 
     ],

];   