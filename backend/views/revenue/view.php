<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Revenue */
?>
<div class="revenue-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'property_id',
            'sales_executive_id',
            'client_id',
            'client_total_amount',
            'client_pending_amount',
            'client_pending_amount_date',
            'owner_id',
            'owner_total_amount',
            'owner_pending_amount',
            'owner_pending_amount_date',
            'created_date',
        ],
    ]) ?>

</div>
