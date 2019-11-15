<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeadassignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leadassignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadassignment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Leadassignment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lead_current_status_ID',
            'assigned_toID',
            'currentstar',
            'isactive',
            // 'created_at',
            // 'updated_at',
            // 'assigned_at',
            // 'unassigned_at',
            // 'comments:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
