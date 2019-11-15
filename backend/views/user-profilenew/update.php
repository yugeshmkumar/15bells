<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfilenew */

$this->title = 'Update User Profilenew: ' . ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'User Profilenews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-profilenew-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
