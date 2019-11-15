<?php

use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet portlet-sortable sellr_proprty">
        <div class="portlet-title">
                                    <div class="caption font-green-sharp exp_titl">
                                        
                                        <span class="caption-subject bold uppercase exp_name">Add Sub Users</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>
                                    </div>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-right">
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'User',
]), ['create'], ['class' => 'btn btn-success edit_butn']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           // 'id',
           
           
            ['attribute' => 'fullname',
                            'label' => 'Name',
                            'format' => 'raw',                           
                            'filter' => true,
                            'value' => function($data) {

                                return $data->fullname.' '.$data->lastname;
                            }
                                ],
                                'username',
            'email:email',
            [
                'class' => \common\grid\EnumColumn::className(),
                'attribute' => 'status',
                'enum' => User::getStatuses(),
                'filter' => User::getStatuses()
            ],
            'created_at:datetime',
           // 'logged_at:datetime',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
