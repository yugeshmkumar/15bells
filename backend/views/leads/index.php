<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeadsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Leads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leads-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Leads',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'product_id',
            'email:ntext',
            'location:ntext',
            // 'role_id',
            // 'name:ntext',
            // 'countrycode:ntext',
            // 'number:ntext',
            // 'created_at',
            // 'updated_at',
            // 'isactive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
