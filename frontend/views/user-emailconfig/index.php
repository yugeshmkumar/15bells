<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserEmailconfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Emailconfigs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-emailconfig-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Emailconfig', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'roleid',
            'userid',
            'emailid:email',
            'isdefault',
            // 'created_at',
            // 'updated_at',
            // 'isactive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
