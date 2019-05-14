<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserKycdocuments */

$this->title = 'Update User Kycdocuments: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Kycdocuments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-kycdocuments-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
