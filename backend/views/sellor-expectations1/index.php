<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SellorExpectationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sellor Expectations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sellor-expectations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sellor Expectations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'user_type',
            'property_id',
            'save_search_as',
            // 'rate_negotiable',
            // 'payment_time:datetime',
            // 'payment_time_negotiable',
            // 'loan_against_property',
            // 'all_dues_cleared',
            // 'vastu_facing',
            // 'loan_to_be_applied',
            // 'is_active',
            // 'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
