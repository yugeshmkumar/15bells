<?php

use yii\helpers\Html;
use yii\grid\GridView;
use  common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SubUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Company Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-user-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
          ['attribute'=>'subuser_id',
               'label' =>'Email-id',
              'value'=>function($data)
             {
        return User::findOne($data->subuser_id)->email;
             }
              ],
         ['attribute'=>'subuser_id',
             'label' =>'Username',
              'value'=>function($data)
             {
        return User::findOne($data->subuser_id)->username;
             }
              ],             
            //'auth_key',
           // 'access_token',
            //'password_hash',
            // 'password_reset_token',
            // 'oauth_client',
            // 'oauth_client_user_id',
             //'email:email',
           ///  'mobile',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'logged_at',

//            ['header'=>'Action','class' => 'yii\grid\ActionColumn','template' => '{view}'],
        ],
    ]); ?>
</div>
