<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectations */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sellor Expectations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sellor-expectations-view">

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
           // 'user_id',
           // 'user_type',
           // 'property_id',
            'save_search_as',
            'rate_negotiable',
            'payment_time:datetime',
            'payment_time_negotiable',
            'loan_against_property',
            'all_dues_cleared',
            'vastu_facing',
            'loan_to_be_applied',
           // 'is_active',
           // 'created_date',
        ],
    ]) ?>

</div>
