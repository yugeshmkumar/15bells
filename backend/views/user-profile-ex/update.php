<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfileEx */

$this->title = 'Update User Profile Ex: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'User Profile Exes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-profile-ex-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
