<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeadassignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Leadassignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadassignment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Leadassignment',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'leadid',
            'lead_current_status_ID',
            'assigned_toID',
            'currentstar',
            // 'isactive',
            // 'created_at',
            // 'updated_at',
            // 'assigned_at',
            // 'unassigned_at',
            // 'old_assigned_to',
            // 'reassigned_at',
            // 'comments:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
