<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MyprofilebackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Myprofiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myprofile-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Myprofile',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'guardianprofileid',
            'userID',
            'title',
            'first_name',
            // 'middlename:ntext',
            // 'last_name',
            // 'nationality:ntext',
            // 'emailid:email',
            // 'mobileid',
            // 'dob',
            // 'gender',
            // 'martial_status',
            // 'isMinor:ntext',
            // 'relatnshp_with_minor:ntext',
            // 'guardian_name:ntext',
            // 'pan_card_no',
            // 'adhar_card_no',
            // 'countryverificatn:ntext',
            // 'passportno:ntext',
            // 'pionumber:ntext',
            // 'ocinumber:ntext',
            // 'current_country:ntext',
            // 'current_state:ntext',
            // 'current_city:ntext',
            // 'current_pincode',
            // 'current_address:ntext',
            // 'permanent_country:ntext',
            // 'permanent_state:ntext',
            // 'permanent_city:ntext',
            // 'permanent_pincode',
            // 'permanent_address:ntext',
            // 'isactive',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
