<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DesignationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Designations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designations-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', '<i class="fa fa-plus"></i> Add {modelClass}', [
    'modelClass' => 'Designations',
]), ['create'], ['class' => 'btn btn-success']) ?>
   
        <?php echo Html::a(Yii::t('backend', '<i class="fa fa-mail-reply"></i> Back to Add Employees', [
    'modelClass' => 'Designations',
]), ['/company-empb/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            'description:ntext',
            'company:ntext',
            'created_at',
            // 'updated_at',
            // 'isactive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
