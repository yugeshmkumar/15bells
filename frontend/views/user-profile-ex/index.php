<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserProfileExSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Profile Exes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-ex-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Profile Ex', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'title',
            'emailid:email',
            'mobileid',
            // 'cur_addressid1',
            // 'per_addressid1',
            // 'gender',
            // 'pan_card_number',
            // 'adhar_number',
            // 'dob',
            // 'created_at',
            // 'updated_at',
            // 'isActive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
