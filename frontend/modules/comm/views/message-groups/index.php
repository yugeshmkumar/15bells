<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\comm\models\MessageGroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Message Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-groups-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Message Groups', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'listname:ntext',
           ['attribute'=> 'userID',
		     'label'=>'Users',
			 'value'=>function($data){
				 return \common\models\User::findOne($data->userID)->email;
			 }
		   
		   ],
           
            // 'isactive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
