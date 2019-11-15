<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Websiteconfig */
?>
<div class="websiteconfig-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            'page',
            'content:ntext',
           
        ],
    ]) ?>

</div>
