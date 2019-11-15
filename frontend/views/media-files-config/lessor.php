<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use  common\models\MediaFiles;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MediaFilesConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Media Files Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
thead{
	background-color: #d4d4d4;
    color: #000!important;
}
thead a{
    color: #000!important;
}
.form-control{
	border-radius:10px !important;
}
table tr{
	background:transparent !important;
	color:#ffffff !important;
}
tbody{
	background:rgba(255,255,255,.25);
}
.table_docs{
	padding:20px ;
	background:rgba(255,255,255,0.25);
	border-top:3px solid #e5ac31;
	margin:0 !important;
}
.table_docs .summary{
	color:#fff !important;
}
.docs_hed{
	font-weight:600;
	color:#ffffff;
	font-size:21px !important;
}
</style>
<div class="media-files-config-index col-md-9">
<h3 class="docs_hed">LESSOR DOCUMENTS</h3>
<div class="row table_docs">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'property_id',
             ['attribute'=>'property_id',
			  'label'=>'Property ID',			 
                          'filter'=>false,
                          'contentOptions' => ['style' => 'width:150px;'],
			  'value'=>function($data){

                                  $propid = 273*179-$data->property_id;
				  return 'PR'.$propid;
			  }
			
			],
            //'media_id',

            
  [ 'label' => 'Document',
							'attribute' => 'media_id',							
							'filter' => false,
							'format' => 'raw',
							'options' => ['style' => 'width:230px;'],
							'value' => function($data) {

						
							$imgsrc = MediaFiles::findOne($data->media_id)->file_name;
							$img_name = $imgsrc;    
                                                        $url = Yii::getAlias('@archiveUrl/').'uploadsthumbnails/'.$img_name;                                           
							//$url = yii\helpers\Url::base() . '/img/' . $img_name;
							return Html::img($url, ['width' => 130]);
						
					}],


            ['attribute'=>'media_id',
               'label' =>'Click to Download',
                'contentOptions' => ['style' => 'width:100px;'],
               'format' => 'raw',
               'filter'=>false,
              'value'=>function($data)
             {
               $name = MediaFiles::findOne($data->media_id)->file_name;
               $newname = substr($name,0, 100);
                 //return Html::a($name, ['javascript:void(0)','id' => $data->media_id]);
               return \yii\helpers\Html::a($newname,\yii\helpers\Url::to('javascript:void(0)'),['id'=>$name,'onclick'=>"clickme('$name')"]);

             }
              ],
            //'created_at',
             
        ['attribute'=>'media_id',
               'label' =>'File Name',
                'contentOptions' => ['style' => 'width:150px;'],
               'filter'=>false,
              'value'=>function($data)
             {
        return MediaFiles::findOne($data->media_id)->file_descr;
             }
              ],
            //'created_at',
             ['attribute'=>'created_at',
			  'label'=>'Created Date',			 
                          'filter'=>false,
                          'contentOptions' => ['style' => 'width:200px;'],
			  'value'=>function($data){
                                 
				  return $data->created_at;
			  }
			
			],
            //'updated_at',
            //'isactive',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php Pjax::end(); ?>

<?php  $form = ActiveForm::begin(array('id'=>'ibformnmsssocket')); ?>		
<input type="hidden" name="filenamemain" id="filenamemain" >
 <input type="submit" name="filedownload" id="filedownload"  value="pdfss" style="display:none;"  > 
 <?php $form = ActiveForm::end(); ?>
</div>
</div>

</script>


									  <script>
function clickme(id) {
	
$('#filenamemain').val(id);
$('#filedownload').trigger('click');

}
</script>
