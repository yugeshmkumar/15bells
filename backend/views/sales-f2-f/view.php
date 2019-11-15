<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SalesF2F */
?>
<div class="sales-f2-f-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'buyer_id',
            'sellor_id',
            'property_id',
            'sales_executive_id',
            'meeting_date_time',
            'status',
            'comment:ntext',
            'created_date',
        ],
    ]) ?>

</div>
