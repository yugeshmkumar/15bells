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
        'attribute' => 'userid',
       'pageSummary' => 'Page Total',
	   'label'=>'approve status',
	   'filter'=>false,
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
'editableOptions'=> function ($model, $key, $index,$data) {
    return [
        'header'=>'approve_status', 
        'size'=>'md',
      'value' => function($data){
		  $approvedetails = \common\models\UserKycdocuments::find()->where(['userid'=>$data->userid])->one();
		  if($approvedetails){
			  return $approvedetails->approve_status;
		  }
	  },
    'asPopover' => true,
    'header' => 'approve_status',
   // 'inputType' => Editable::INPUT_DROPDOWN_LIST,
    'data' => [1 => 'Yes', 0 => 'No'],
    'options' => ['class'=>'form-control', 'prompt'=>'Select status...'],
    'displayValueConfig'=> [
        '1' => '<i class="glyphicon glyphicon-thumbs-up"></i> Yes',
        '0' => '<i class="glyphicon glyphicon-thumbs-down"></i> No',
       
    ],
    ];
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
                                        <a href="#">
                                            <i class="glyphicon glyphicon-ban-circle"></i> Block User</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
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
function downloadkycdoc(str) {
	
$('#filenamemaintwo').val(str);
$('#filedownloadtwo').trigger('click');
}
</script>


<?php  $form = ActiveForm::begin(array('id'=>'ibformnmsssocket')); ?>		
<input type="hidden" name="filenamemaintwo" id="filenamemaintwo" >
 <input type="submit" name="filedownloadtwo" id="filedownloadtwo"  value="pdfss" style="display:none;"  > 
 <?php $form = ActiveForm::end(); ?>
