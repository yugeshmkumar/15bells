<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Addproperty */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Addproperties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>
<style>
.fa-rupee:before, .fa-inr:before{
	padding-right:7px;
}
</style>

<div class="addproperty-view">


    <?= DetailView::widget([
        'model' => $model,
         'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'attributes' => [
            //'id',
            //'user_id',
           // 'role_id',
           // 'project_name',
          //  'project_type_id',
           ['attribute'=>'id',
			  'label'=>'No. of Interested User for bidding',
			  'format'=>'raw',
			  'width'=>'250px',
                          //'options' => ['style' => 'line-height: 3.42857;font-weight:bold;'],
                          'contentOptions' => ['style' => 'line-height: 3.42857;font-weight:bold;color:red;'],
			  'value'=>function($model,$data){
				  return \common\models\RequestedBidingUsers::find()->where('propertyID = "'.$model->id.'"')->count();
			  }
			
			],


           ['attribute'=>'project_type_id',
			  'label'=>'Property Type',
			  'format'=>'raw',
			  'width'=>'250px',
			  'value'=>function($data){
				  return \common\models\PropertyType::findOne($data->project_type_id)->typename;
			  }
			
			],
            'request_for',
           [ 'label' => 'Property Image',
							'attribute' => 'featured_image',
							'contentOptions' => ['class' => 'pull-left','data-action'=>'zoom'],
							'filter' => true,
							'format' => 'raw',
							//'options' => ['style' => 'width:200px;'],
							'value' => function($model) {

						if (!empty($model->featured_image)) {
							$img = $model::findOne($model->featured_image);
							$img_name = $img;                                               
							$url = Yii::getAlias('@archiveUrl').'/propertydefaultimg/' . $model->featured_image;
							return Html::img($url, ['width' => 100]);
						}else{
                                                  
                                                       $url = Yii::getAlias('@archiveUrl').'/propertydefaultimg/not.jpg';
							return Html::img($url, ['width' => 100]);
               					      }
					}],


           [
               'label' => 'Upload Images',
               'attribute' => 'id',
               'filter' => false,
               'options' => ['style' => 'width:90px;'],
               'format' => 'raw',
               'value' => function($model) {
        
               $newurl = Yii::$app->getUrlManager()->getBaseUrl() ."/index.php/addproperty/additional?idm=$model->id";
               return Html::a('<button class="btn btn-primary">Upload Images</button>', $url = $newurl,[
                                       'title' => Yii::t('yii', 'Click to Search'),
               ]);


        }
        ],

[
               'label' => 'Upload Documents',
               'attribute' => 'id',
               'filter' => false,
               'options' => ['style' => 'width:90px;'],
               'format' => 'raw',
               'value' => function($model) {
        
               $newurl = Yii::$app->getUrlManager()->getBaseUrl() ."/index.php/addproperty/documentss?id=$model->id";
               return Html::a('<button class="btn btn-primary">Upload Documents</button>', $url = $newurl,[
                                       'title' => Yii::t('yii', 'Click to Upload'),
               ]);


        }
        ],




            [ 'label' => 'Property Thumbnails',
							'attribute' => 'id',
							'format' => 'raw', 
                       
    'value' => function ($data) {

        $images = '';
        // append all images
        foreach($data->getPictogramUrl() as $url){
            $images = $images.Html::img($url, ['alt'=>'','width'=>'100','height'=>'100']);
        } 
        return $images;
    
    }],  
            
            //'featured_image',
            ['label'=>'Image name','attribute'=>'featured_image'], 
           // 'featured_video',
            'city',
            'locality:ntext',
            //'address:ntext',
           // 'longitude',
          //  'latitude',
           // 'total_plot_area',
           // 'plot_unit',

   [
'label'=>'Plot Area',
 'value'=>function($data) {
    return $data->total_plot_area .'  '. $data->plot_unit;
}                      
  ],
  
  
  [
'label'=>'Expected Price',
 'value'=>function($data) {
   return $data->expected_price;
},
   'contentOptions' => [ 'class' => 'fa fa-inr']
  ],
  [
'label'=>'Price Sq Ft',
 'value'=>function($data) {
   return $data->price_sq_ft;
},
   'contentOptions' => [ 'class' => 'fa fa-inr']
  ],
  [
'label'=>'Price Acres',
 'value'=>function($data) {
   return $data->price_acres;
},
   'contentOptions' => [ 'class' => 'fa fa-inr']
  ],

  [
'label'=>'Maintanance Cost',
 'value'=>function($data) {
   return $data->maintenance_cost;
},
   'contentOptions' => [ 'class' => 'fa fa-inr']
  ],

  [
'label'=>'Annual Dues Payable',
 'value'=>function($data) {
   return $data->annual_dues_payable;
},
   'contentOptions' => [ 'class' => 'fa fa-inr']
  ],


  [
'label'=>'Expected Rental',
 'value'=>function($data) {
   return $data->expected_rental;
},
   'contentOptions' => [ 'class' => 'fa fa-inr']
  ],


           // 'expected_price',
           // 'price_sq_ft',
          //  'price_acres',
            //'all_inclusive_price',
            'price_negotiable',
            'revenue_lauout',
            'present_status',
            'jurisdiction_development',
            'shed_RCC',
          //  'maintenance_cost',
            'maintenance_by',
           // 'annual_dues_payable',
            //'expected_rental',
            'availability',
            'age_of_property',
            'possesion_by',
           // 'transaction_type',
            'ownership',
            'facing',
            'FAR_approval',
            'LOAN_taken',
             [
'label'=>'Built up Area',
 'value'=>function($data) {
    return $data->buildup_area .'  '. $data->build_unit;
}                      
  ],

[
'label'=>'Carpet Area',
 'value'=>function($data) {
    return $data->carpet_area .'  '. $data->carpet_unit;
}                      
  ],
            
           // 'carpet_area',
           // 'carpet_unit',
            'total_floors',
            'property_on_floor',
            'configuration',
            'floors_allowed_construction',
            'bedrooms',
            'bathrooms',
            'balconies',
            'pooja_room',
            'study_room',
            'servant_room',
            'other_room',
            'furnished_status',
            'parking',
            //'is_active',
           // 'created_date',
        ],
    ]) ?>

</div>
