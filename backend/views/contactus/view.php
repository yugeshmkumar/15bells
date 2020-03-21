<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ContactUs */
?>
<div class="contact-us-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mail_id',
            'role_name',
            'day_noon',
            'builder_name',
            'designation',
            'full_name',
            'email:email',
            'contact_number',
            'message:ntext',
            'is_active',
            'created_at',
        ],
    ]) ?>

</div>
