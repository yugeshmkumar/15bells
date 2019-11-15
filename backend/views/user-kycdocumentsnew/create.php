<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserKycdocuments */

$this->title = 'Create User Kycdocuments';
$this->params['breadcrumbs'][] = ['label' => 'User Kycdocuments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-kycdocuments-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
