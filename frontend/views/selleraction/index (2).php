<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Property', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'roleid',
            'projectypeid',
            'propertydescr:ntext',
            // 'property_for',
            // 'location:ntext',
            // 'locality:ntext',
            // 'longitude',
            // 'latitude',
            // 'city:ntext',
            // 'state:ntext',
            // 'address:ntext',
            // 'country:ntext',
            // 'property_features:ntext',
            // 'building_no',
            // 'building_name:ntext',
            // 'totalrooms',
            // 'totalfloors',
            // 'floorno',
            // 'totalbalconies',
            // 'furnishedstatus',
            // 'on_road',
            // 'walls_made',
            // 'office_space_shared',
            // 'personal_washrooms',
            // 'pantry_available',
            // 'total_area:ntext',
            // 'built-up_area:ntext',
            // 'carpet_area:ntext',
            // 'expected_price',
            // 'price_per_sqft',
            // 'maintaince_cost',
            // 'maintaince_by',
            // 'include_stamp_reg_charges',
            // 'brokers_response',
            // 'available_from_month',
            // 'available_from_year',
            // 'last_updated',
            // 'visibility_flags',
            // 'marketing_flags',
            // 'ratings',
            // 'count_views:ntext',
            // 'property_status_flags',
            // 'featured_image:ntext',
            // 'featured_thumbnails_id:ntext',
            // 'marketing_cost:ntext',
            // 'registry_cost:ntext',
            // 'electricity_charges:ntext',
            // 'maintainces_charges:ntext',
            // 'deposite_amount:ntext',
            // 'rules_regulations:ntext',
            // 'notice_period',
            // 'created_at',
            // 'updated_at',
            // 'isactive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
