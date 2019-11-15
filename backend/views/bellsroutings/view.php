<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bellsroutings */
?>
<div class="bellsroutings-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'user_role',
            'login_to',
            'login_url:ntext',
           // 'created_at',
            //'updated_at',
            //'isactive',
        ],
    ]) ?>

</div>
