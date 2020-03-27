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
<div class="col-md-9">
            <div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Add Subuser</h2>
					</div>
					<div class="col-md-6 text-right addprop_button">
                    <p class="text-right">
                            <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
                        'modelClass' => 'User',
                    ]), ['create'], ['class' => 'btn btn-success edit_butn add_button']) ?>
                        </p>
					</div>
				</div>
                </div>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


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
</div>
