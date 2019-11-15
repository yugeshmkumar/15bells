<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bellscountryconfig */
?>
<div class="bellscountryconfig-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'state:ntext',
            'city:ntext',
            'country:ntext',
            'created_at',
            'updated_at',
            'isactive',
        ],
    ]) ?>

</div>
