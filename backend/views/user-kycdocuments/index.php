<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserKycdocumentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Kycdocuments';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>.vvsambqwkstalkbubble { width: 100%; height: 150%;  background:#fefefe; -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); border:1px solid #dedede; position: relative; } .vvsambqwkstalkbubble:before {  }</style> <style>.vvsambqwksukvveekmuzqtsblevbbff{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 150%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.vvsambqwksukvveekmuzqtswhevbbff {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:25%;  left:35%; top:30%; bottom:30%; z-index:1015; overflow:hidden; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffmjkl" class="vvsambqwksukvveekmuzqtsblevbbff" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffmjkkl" class="vvsambqwksukvveekmuzqtswhevbbff"  > <div class="vvsambqwkstalkbubble" id="vpcobh2"></div> </div>
 
<div class="user-kycdocuments-index">

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

           
            ['attribute'=>'userid',
			'label'=>'User',
			'format'=>'raw',
			'value'=>function($data){
				return'<a href="mailto:'.\common\models\User::findOne($data->userid)->email.'">'.\common\models\User::findOne($data->userid)->email.'</a>';
				
			}
			],
			 ['attribute'=>'document_name',
			'label'=>'Documents',
			'filter'=>false,
			'format'=>'raw',
			'value'=>function($data){
				$arrgetalldetails = \common\models\UserKycdocuments::find()->where(['userid'=>$data->userid])->all();
				foreach($arrgetalldetails as $getalldetails)
				{
				 $alldocs[] = '<font color="black">'.$getalldetails->docment_file_name.'</font>&nbsp;&nbsp;<a onclick="downloadkycdoc(&#39;'.$getalldetails->document_name.'&#39;)"><i class="fa fa-cloud-download"></i><a>'.'<br/>';
				
			}
			return implode($alldocs);
			}
			],
			  [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'approve_reason',
       'pageSummary' => 'Page Total',
	   'label'=>'Approve Status',
	   'filter'=>false,
        'vAlign'=>'middle',
        //'headerOptions'=>['class'=>'kv-sticky-column'],
        //'contentOptions'=>['class'=>'kv-sticky-column'],
'editableOptions'=> function ($model, $key, $index,$data) {
    return [
        'header'=>'approve_reason', 
        'size'=>'ls',
      'value' => 'approve_reason',
    'asPopover' => true,
  'inputType' => Editable::INPUT_TEXTAREA,
    'header' => 'Reason',
'submitOnEnter' => true,
   // 'size'=>'lg',
    'options' => ['class'=>'form-control', 'rows'=>5, 'placeholder'=>'Enter Reason...'],
	'displayValueConfig'=> [
        '1' => '<i class="glyphicon glyphicon-thumbs-up"></i> Approved',
        '' => '<i class="glyphicon glyphicon-thumbs-down"></i> Pending',
       
    ],
    ]
	
	;
}    ],
			
			
			['attribute'=>'userid',
			'label'=>'Actions',
			'filter'=>false,
			'format'=>'raw',
			'value'=>function($data){
				
			return '
			<div class="page-toolbar">
                            <div class="btn-group">
                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> <i class="fa fa-list"></i>
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a onclick="function1('.$data->userid.')" >
                                            <i class="icon-eye"></i> View</a>
                                    </li>
                                    
                                    <li>
                                        <a onclick="function2('.$data->userid.')" >
                                            <i class="glyphicon glyphicon-ban-circle"></i> Block User</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a onclick="function3('.$data->userid.')" >
                                            <i class="fa fa-file-code-o"></i> Write Comment</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
			
			';
			}
			],
		
			
           

           
        ],
		  'responsive' => false,
    ]); ?>

</div>
<script>
function function1(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['user-kycdocuments/view']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function function2(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['user-kycdocuments/blockuser']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
<script>
function function3(str)
{
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['user-kycdocuments/writecomment']) ?>?id='+str+'', '_blank');
  win.focus();
}
</script>
									  <script>
function downloadkycdoc(str) {
	
$('#filenamemaintwo').val(str);
$('#filedownloadtwo').trigger('click');
}
</script>


<?php  $form = ActiveForm::begin(array('id'=>'ibformnmsssocket')); ?>		
<input type="hidden" name="filenamemaintwo" id="filenamemaintwo" >
 <input type="submit" name="filedownloadtwo" id="filedownloadtwo"  value="pdfss" style="display:none;"  > 
 <?php $form = ActiveForm::end(); ?>
