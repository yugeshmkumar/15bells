<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Emd_details */
?>
<div class="emd-details-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'emd_id',
            'utr_no',
            'utr_bank_name',
            'utr_bank_branch_name',
            'utr_date',
            'dd_no',
            'dd_bank_name',
            'dd_bank_branch_name',
            'dd_date',
            'person_name',
            'tracking_id',
            'payment_status',
            'payable_amount',
            'favour_of',
            'created_date',
        ],
    ]) ?>

</div>
