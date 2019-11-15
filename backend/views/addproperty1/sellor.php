<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\editable\Editable;
use yii\helpers\Url;
use yii\db\Query;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AddpropertybackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Property Management');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div id="successMessage" class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>
<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}
/* satender */
.add_property_btn_p{
        text-align: right;
        margin: 10px 0;
}
.add_property_btn_p a{
    border-radius: 5px !important;
    border: 2px solid #e8e8e8;
    color: #000;
    background-color: #e5ac31;
    font-size: 15px;
}
.add_managed_proper_div{
    padding: 0;
    border: 0px !important;
    border-left: 0px !important;
    background-color: transparent;
}
.caption{
    color: #fff !important;
    font-weight: 600;
    text-transform: uppercase;
    font-family: 'Roboto', sans-serif;
}
.portlet-title{
    border-bottom: 0px !important;
    margin-bottom: 0px !important;
}
.grid-view{
    border-top: 3px solid #e5ac31;
    background-color: rgba(255, 255, 255, 0.25);
    padding: 20px;
}
.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: transparent;
    color: #000;
    font-weight: 600;
    font-family: 'Roboto', sans-serif;
}
.filters input{
    border-radius: 10px !important;
}
.filters select{
    border-radius: 10px !important;
}
.kv-grid-table thead {
    background-color: #d4d4d4;
}
.kv-grid-table thead tr th{
    text-align: center;
    color:#000;
}
.kv-grid-table thead tr th a{
    color: #000;
    font-weight: 600;
    font-family: 'Roboto', sans-serif;
    text-decoration: none;
}
.table-striped > tbody > tr:nth-of-type(odd){
	color:#ffffff !important;
}
.summary{
	color:#ffffff !important;
}
.table-striped > tbody{
	color:#ffffff !important;
}
.table .table {
    background-color: rgba(255, 255, 255, 0.16) !important;
    color: #ffffff !important;
}

.box{
background:#000 !important;
}
</style> 
<div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>
  <div class="col-md-9 col-sm-8" style="width:98%;">
       <!-- <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
                        if($checkrole->item_name == "Company_user") {  ?> 
                         <a href="<?php echo Yii::$app->urlManager->createUrl(['site/couserdash']) ?>">Home</a><?php } else { ?>
    <a href="<?php echo Yii::$app->urlManager->createUrl(['site/userdash']) ?>">Home</a>
                        <?php } ?>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>User</span>
                                <i class="fa fa-circle"></i>
                            </li>
                             <li>
                                <span>MANAGE PROPERTY</span>
                            </li>
                        </ul>
                        
                    </div>
                    <br/>-->
     <p class="add_property_btn_p">
        <?= Html::a('Add new property', ['creates'], ['class' => 'btn btn-success']) ?>
    </p>
                            <div class="portlet portlet-sortable add_managed_proper_div">
                                <div class="portlet-title">
                                    <div class="caption font-green-sharp">
                                        <!-- <i class="fa fa-building font-green-sharp"></i>-->
                                        <span class="caption-subject bold uppercase"> My Properties</span>
                                        <!-- <span class="caption-helper">details...</span> -->
                                    </div>
                               <!--<div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                    </div>-->
                                </div>
                                <div class="portlet-body">
                                     
                                    <div class="addpropertybackend-index">


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>false,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
[
'class' => 'kartik\grid\ExpandRowColumn',
'expandAllTitle' => 'Expand all',
'collapseTitle' => 'Collapse all',
'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
'value' => function ($model, $key, $index, $column) {
return GridView::ROW_COLLAPSED;
},
'detailUrl' => yii\helpers\Url::to(['addproperty/viewmy']),
'detailRowCssClass' => GridView::TYPE_DEFAULT,
'pageSummary' => false,
],
           // 'id',
//            ['attribute'=>'user_id',
//            'label'=>'Lead Details',
//            'format'=>'raw',
//            'width'=>'250px',
//            'value'=>function($data){
//                return \common\models\User::findOne($data->user_id)->email;
//            }
//          
//          ],
//          ['attribute'=>'role_id',
//            'label'=>'Lead Role',
//            'format'=>'raw',
//            'width'=>'100px',
//            'value'=>function($data){
//                return $data->role_id;
//            }
//          
//          ],
            //['attribute'=>'project_name',
            //  'label'=>'Project Name',
            //  'format'=>'raw',
             /// 'width'=>'200px',
             // 'value'=>function($data){
            //    return $data->project_name;
             // }
            
            //],
                        'locality:ntext',
                         'address:ntext',        
            ['attribute'=> 'property_for',
              'label'=>'Request Type',
              'format'=>'raw',
              'width'=>'110px',
              'value'=>function($data){
                  return $data->property_for;
              }
            
            ],
            
            ['attribute'=>'project_type_id',
              'label'=>'Property Type',
               'filter' => Html::activeDropDownList($searchModel, 'project_type_id', \yii\Helpers\ArrayHelper::map(\common\models\PropertyType::find()->asArray()->all(), 'id', 'typename'),['class'=>'form-control','prompt' => 'Select..']),
                
                   
              'format'=>'raw',
              'width'=>'250px',
              'value'=>function($data){
                  return \common\models\PropertyType::findOne($data->project_type_id)->typename;
              }
            
            ],
            
            ['attribute'=>'request_for',
              'label'=>'Request For',
              'format'=>'raw',
              'width'=>'100px',
              'value'=>function($data){
                  return $data->request_for;
              }
            
            ],
                                [

         'class' => 'kartik\grid\ActionColumn',

         'dropdown' => true,

                               

         'vAlign'=>'middle',

                                'template'=>'{update},{delete},{importdetail}',

         'urlCreator' => function($action, $model, $key, $index) {

                 return Url::to(['/addproperty/'.$action,'id'=>$model->id]);

         },

        'buttons'=>[
                 
                 
             
         'updateOptions'=>['role'=>'modal-remote','title'=>'Edit', 'data-toggle'=>'tooltip'],
                 

         'deleteOptions'=>['role'=>'modal-remote','title'=>'Disable', 'label'=>'<i class="fa fa-trash"></i> Disable',

                           'data-confirm'=>false, 'data-method'=>true,// for overide yii data api

                           'data-request-method'=>'post',

                           'data-toggle'=>'tooltip',

                           'data-confirm-title'=>'Are you sure?',

                           'data-confirm-message'=>'Are you sure want to disable this item'],
       
        'importdetail' => function ($url, $model) {
    $title = Yii::t('app', 'Show');
    $options = []; // you forgot to initialize this
    $icon = '<span class="glyphicon glyphicon-eye-open"></span>';
    $label = $icon . ' ' . $title;
    $url = Url::toRoute(['showdocuments','id'=>$model->id]);
    $options['tabindex'] = '-1';
    $querys = new Query;
    $user_id = Yii::$app->user->identity->id;
        $querys->select('COUNT(*) as newcount')
                ->from('my_profile_progress_status')
                ->where(['property_id' => $model->id])
                ->andwhere(['user_id' => $user_id])
                ->andwhere(['process_name' => 'site_visit_completed'])
                ->andwhere(['process_status' => '100']);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();

        if ($paymentsm['newcount'] > 0) {
    
    return '<li>' . Html::a($label, $url, $options) . '</li>' . PHP_EOL;
    
        }
},
           
            
             ],],
       
    ],]); ?>

</div></div> </div> 


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

 $(document).ready(function() {
      
         
         setTimeout(function() {
            $('#successMessage').fadeOut('fast');
            }, 2000);


      });
</script>
  </div>
				  
