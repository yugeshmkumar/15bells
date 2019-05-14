<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MyprofileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Myprofiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myprofile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Myprofile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'first_name',
            'last_name',
            'emailid:email',
            // 'mobileid',
            // 'dob',
            // 'gender',
            // 'martial_status',
            // 'minor',
            // 'relatnshp_with_minor:ntext',
            // 'guardian_name:ntext',
            // 'pan_card_no',
            // 'adhar_card_no',
            // 'current_country:ntext',
            // 'current_state:ntext',
            // 'current_city:ntext',
            // 'current_pincode',
            // 'permanent_country:ntext',
            // 'permanent_state:ntext',
            // 'permanent_city:ntext',
            // 'permanent_pincode',
            // 'isactive',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
