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
<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>
 
<div class="user-index">


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          
            'username',
            'email:email',
            [
                'class' => \common\grid\EnumColumn::className(),
                'attribute' => 'status',
                'enum' => User::getStatuses(),
                'filter' => User::getStatuses()
            ],
            'created_at:datetime',
            'logged_at:datetime',
			[
                
                'attribute' => 'id',
               'label'=>'Comments',
			   'filter'=>false,
                'value' =>function($data){
					$getvalue  =  \common\models\UserComments::find()->where(['added_for'=>$data->id])->one();
					if($getvalue){
						return $getvalue->comment;
					}else {
						return '';
					}
				}
            ],
            // 'updated_at',
              ['attribute'=>'id',
			    'label'=>'Actions',
				  'filter'=>false,
				'format'=>'raw',
				'value'=> function($data){
					return '<div class="btn-group">
                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a onclick="functionprofile('.$data->id.')">
                                            <i class="icon-user"></i>View Profile</a>
                                    </li>
                                    <li>
                                       <a onclick="functionkyc('.$data->id.')">
                                            <i class="icon-book-open"></i> Approve KYC</a>
                                    </li>
                                    <li>
                                       <a onclick="functionroles('.$data->id.')">
                                            <i class="icon-star"></i> Assign Roles</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a onclick="document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimabbffmjkkl&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;viewpsambqwksukvveekmuzqtsimaccffmjkl&#39;).style.display=&#39;block&#39;,writecommentforuser('.$data->id.')">
                                            <i class="icon-plus"></i> Add Comment</a>
                                    </li>
									<li>
                                        <a href="#">
                                            <i class="icon-envelope"></i> Send E-mail</a>
                                    </li>
									<li>
                                        <a href="#">
                                            <i class="icon-bubbles"></i>Send SMS</a>
                                    </li>
                                </ul>
                            </div>';
				},
			  ],

        ],
    ]); ?>

</div>
  
<script>

function writecommentforuser(str){
              
    
         $.ajax({

                type: "GET",
				url: "<?php echo Yii::$app->urlManager->createUrl(["userset/writecommentforuser"]) ?>?id="+str,
                 success: function(msg){
				
                    $('#vpcobh2').html(msg);
				
                  
                }

            });

}

</script>

<script>
function functionprofile(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['usersprofile/view']) ?>?userID='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionkyc(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['user-kycdocuments/view']) ?>?userid='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function functionroles(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['userset/update']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>