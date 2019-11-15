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
                                        
                                        <span class="caption-subject bold uppercase exp_name">Sub Users Shortlisted Properties</span>
                                        <!--<span class="caption-helper">details...</span>-->
                                    </div>
                                    </div>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'table_common'],
        'columns' => [
            //'id',
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'email:email',
            [
                'class' => \common\grid\EnumColumn::className(),
                'attribute' => 'status',
                'enum' => User::getStatuses(),
                'filter' => User::getStatuses()
            ],
            ['attribute' => 'id',
            'label' => 'View shortlist',
            'format' => 'raw',
            
            'filter' => false,
            'value' => function($data) {
                
                return Html::a('<button class="btn btn-default"   id="propertyidprop"  data-html="true"  style="border-color:#0fd8da;border:1px solid;" >View Shortlist</button>', $url = '/lesseeaction/index', [
                            'title' => Yii::t('yii', 'Click to View shortlist details'),'target'=>'_blank',
                ]);
            }
                ],
           // 'created_at:datetime',
           // 'logged_at:datetime',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
