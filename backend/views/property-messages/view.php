<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PropertyMessages */
?>
<div class="property-messages-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'property_id',
            'user_id',
            'assigned_to_id',
            'lead_id',
            'message:ntext',
            'created_date',
        ],
    ]) ?>

</div>
