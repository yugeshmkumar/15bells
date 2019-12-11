<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Addpropertycsrhead */
?>
<div class="addpropertycsrhead-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'auction_type',
            'propertyID',
            'moderatorID',
            'fromdatetime',
            'todatetime',
            'status',
            'approverID',
            'secret_code',
            'startbidtime',
            'min_raise',
            
        ],
    ]) ?>

</div>
