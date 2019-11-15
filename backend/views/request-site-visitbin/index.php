<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RequestSiteVisitbinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Request Site Visit');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-site-visitbin-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Request Site Visit',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'request_id',
			 ['attribute'=>'user_id',
			  'label'=>'User',
			  'value'=>function($data)
			  {
				  if(isset(\common\models\User::findOne($data->user_id)->email)){
				  return \common\models\User::findOne($data->user_id)->email; }
				  else { return '' ;}
			  }
			],
            
			['attribute'=>'property_id',
			  'label'=>'Property',
			  'value'=>function($data)
			  {
				  if(isset(\common\models\Addproperty::findOne($data->property_id)->project_name)){
				  return \common\models\Addproperty::findOne($data->property_id)->project_name; }
				  else { return '' ;}
			  }
			],
           
            'company_id',
            'request_status',
            // 'reason:ntext',
            // 'scheduled_time',
            // 'confirm',
            // 'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
