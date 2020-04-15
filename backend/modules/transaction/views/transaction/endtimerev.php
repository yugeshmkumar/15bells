<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VrSetupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'VR Setup');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>

<div class="vr-setup-index">
    <div id="ajaxCrudDatatable">
		
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/columns.php'),
            'toolbar'=> [
                ['content'=>
                    
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
					 Html::a('Add New', '',
            ['onclick' => "window.open ('".Url::toRoute(['/vr-setup/create'])."'); return false", 
             'class' => 'btn btn-default center-block']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Vr Setups listing',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>'.                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>


<script>

function mybidfunct(str){
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['transaction/transaction/']) ?>?id='+str+'&t_id=na', '_blank');
  win.focus();
}


function seeresultforward(str){
	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['transaction/transaction/endbid']) ?>?id='+str+'', '_blank');
  win.focus();
}




function seeresultreverse(str,brand){

	var win = window.open('<?php echo yii::$app->urlManager->createUrl(['transaction/transaction/endbidrev']) ?>?id='+str+'&brandid='+brand+'', '_blank');
  win.focus();
}



</script>
    <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="../assets/admin/pages/scripts/ui-general.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
<script>
$(document).ready(function(){
	//alert();
    //$(".drp_dwn").dropdown();
	    $("#w1").dropdown();
 //$('body').removeClass('sidebar-collapse');
});
</script>