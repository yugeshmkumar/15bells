<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AgreementLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agreement Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agreement-log-index">

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'agreement_id',
            'user_id',
            'accept_date',
            'curr_validity',
             'role_id',
            // 'isactive',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn',
			'template'=>'{update}{view}',
			],
        ],
    ]); ?>

</div>
