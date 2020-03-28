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
						<h2 class="dashboard_head">Subusers</h2>
					</div>
					<!-- <div class="col-md-6 text-right addprop_button">
                    <p class="text-right">
                            <?php //echo Html::a(Yii::t('backend', 'Create {modelClass}', [
                       // 'modelClass' => 'User',
                  //  ]), ['create'], ['class' => 'btn btn-success edit_butn add_button']) ?>
                        </p>
					</div> -->
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


            ['attribute'=>'id',
			  'label'=>'Activity',
			  'format'=>'raw',
			  //'width'=>'300px',
			  'value'=>function($data){

				  if($data->user_login_as == 'lessee'){
				  return '<a class="map_mrkr" onclick="showmaples(' . $data->id . ')" href="javascript:void(0);"> <i class="fa fa-universal-access"></i></a>';		  
				  
                  }else{
                    return '<a class="map_mrkr" onclick="showmapbuy(' . $data->id . ')" href="javascript:void(0);"> <i class="fa fa-universal-access"></i></a>';		  


                  }
                                
			  }
			
            ],

            ['attribute'=>'id',
			  'label'=>'Shortlist',
			  'format'=>'raw',
			  //'width'=>'300px',
			  'value'=>function($data){

				  if($data->user_login_as == 'lessee'){
				  return '<a class="map_mrkr" onclick="showmaplessh(' . $data->id . ')" href="javascript:void(0);"> <i class="fa fa-bookmark"></i></a>';		  
				  
                  }else{
                    return '<a class="map_mrkr" onclick="showmapbuysh(' . $data->id . ')" href="javascript:void(0);"> <i class="fa fa-bookmark"></i></a>';		  


                  }
                                
			  }
			
            ],


            ['attribute'=>'id',
			  'label'=>'Sitevisit',
			  'format'=>'raw',
			  //'width'=>'300px',
			  'value'=>function($data){

				  if($data->user_login_as == 'lessee'){
				  return '<a class="map_mrkr" onclick="showmaplessi(' . $data->id . ')" href="javascript:void(0);"> <i class="fa fa-home"></i></a>';		  
				  
                  }else{
                    return '<a class="map_mrkr" onclick="showmapbuysi(' . $data->id . ')" href="javascript:void(0);"> <i class="fa fa-home"></i></a>';		  


                  }
                                
			  }
			
            ],
            

            // [
            //     'class' => \common\grid\EnumColumn::className(),
            //     'attribute' => 'status',
            //     'enum' => User::getStatuses(),
            //     'filter' => User::getStatuses()
            // ],
           // 'created_at:datetime',
           // 'logged_at:datetime',
            // 'updated_at',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
</div>


<script>
function showmaples(id)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['save-searches/lessee']) ?>?idfms='+id+'&sort=-id', '_blank');
  win.focus();
}

function showmapbuy(id)
{
    
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['save-searches/buyer']) ?>?idfms='+id+'&sort=-id', '_blank');
  win.focus();
}


function showmaplessh(id)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['lesseeaction/shortlist']) ?>?idfms='+id+'', '_blank');
  win.focus();
}

function showmapbuysh(id)
{
    
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['buyeraction/shortlist']) ?>?idfms='+id+'', '_blank');
  win.focus();
}


function showmaplessi(id)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['request-sitevisit/lessee']) ?>?idfms='+id+'', '_blank');
  win.focus();
}

function showmapbuysi(id)
{
    
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['request-sitevisit/buyer']) ?>?idfms='+id+'', '_blank');
  win.focus();
}

 </script>