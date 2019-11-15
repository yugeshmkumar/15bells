<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BanknewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Banks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'bank_name:ntext',
           ['attribute'=>'user_id',
		   'label'=>'User',
		   'value'=>function($data){
			   return \common\models\User::findOne($data->user_id)->email;
		   }
		   ],
            'account_no',
            'isfc_code',
             'zip_code',
             'account_type',
             'branch_name:ntext',
             'bank_accnt_name:ntext',
             'created_at',
            // 'updated_at',
            // 'isactive',
            // 'user_auth:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
