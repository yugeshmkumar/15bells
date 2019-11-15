<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Usernew */
?>
<div class="usernew-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
		
          [ 
		  'label' => 'Sub-User Name',
		  'attribute'=>'companyUsers.fname', ],
            'username',
            //'auth_key',
            //'access_token',
            //'password_hash',
            //'password_reset_token',
            //'oauth_client',
            //'oauth_client_user_id',
            'email:email',
           // 'mobile',
            //'status',
            // 'created_at',
            // 'updated_at',
            // 'logged_at',
        ],
    ]) ?>

</div>
