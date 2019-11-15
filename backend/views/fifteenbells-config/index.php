<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FifteenbellsConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fifteenbells Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fifteenbells-config-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Fifteenbells Config', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'table_name:ntext',
            'column_name:ntext',
            'status_value',
            'status_name:ntext',
            // 'isactive',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
