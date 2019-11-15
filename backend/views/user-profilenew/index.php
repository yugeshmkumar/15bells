<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserProfilenewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Profilenews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profilenew-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create User Profilenew', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'firstname',
            'middlename',
            'lastname',
            'avatar_path',
            // 'avatar_base_url:url',
            // 'locale',
            // 'gender',
            // 'phone',
            // 'address:ntext',
            // 'facebook_id',
            // 'linkedin_id',
            // 'minor:ntext',
            // 'relationship_with_minor:ntext',
            // 'guardian_name:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
