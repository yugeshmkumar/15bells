<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PhonenumbersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phonenumbers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonenumbers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Phonenumbers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'country_code:ntext',
            'phone_no',
            'phonetype',
            'isdefault',
            // 'created_at',
            // 'updated_at',
            // 'isActive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
