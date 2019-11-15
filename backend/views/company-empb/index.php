<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanyEmpbSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Company Employees');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="company-empb-index">
    <div id="ajaxCrudDatatable" tabindex ="false">
        <?=GridView::widget([
            'id'=>'crud-datatable',
			'options'=>['tabindex' => false],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
				    Html::a('<i class="fa fa-check"></i> View Designation', ['/designations/index'],
                    ['target'=>'_blank','title'=> 'View Added Designations','class'=>'btn btn-primary']).
					 Html::a('<i class="glyphicon glyphicon-plus"></i> Add Designation', ['/designations/create'],
                    ['target'=>'_blank','title'=> 'Add New Designation','class'=>'btn btn-info']).
                    Html::a('<i class="glyphicon glyphicon-plus"></i> Add Employees', ['create'],
                    ['title'=> 'Add New Employee','class'=>'btn btn-primary']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Company Employees',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
