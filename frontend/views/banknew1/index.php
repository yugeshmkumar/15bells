<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BanknewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banknews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banknew-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banknew', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bank_name:ntext',
            'user_id',
            'account_no',
            'isfc_code',
            // 'zip_code',
            // 'account_type',
            // 'branch_name:ntext',
            // 'bank_accnt_name:ntext',
            // 'created_at',
            // 'updated_at',
            // 'isactive',
            // 'user_auth:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
