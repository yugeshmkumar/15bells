<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BellsfaqsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bellsfaqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bellsfaqs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bellsfaqs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'subject:ntext',
            'content:ntext',
            'content_description:ntext',
            'role',
            //'page',
            //'publishstatus',
            //'created_at',
            //'updated_at',
            //'isactive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
