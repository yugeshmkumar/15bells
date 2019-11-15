<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserRoles */

$this->title = 'Update User Roles: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-roles-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
