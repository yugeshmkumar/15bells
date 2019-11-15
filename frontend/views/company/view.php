<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
?>
<div class="company-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'logo',
            'name:ntext',
            'description:ntext',
            'main_email:ntext',
            'main_mobile',
            'userid',
            'main_address:ntext',
            'company_type',
            'state:ntext',
            'city:ntext',
            'location:ntext',
            'lat:ntext',
            'lng:ntext',
            'country:ntext',
            'created_at',
            'updated_at',
            'isactive',
        ],
    ]) ?>

</div>
