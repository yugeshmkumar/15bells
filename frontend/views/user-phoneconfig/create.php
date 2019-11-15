<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserPhoneconfig */

$this->title = 'Create User Phoneconfig';
$this->params['breadcrumbs'][] = ['label' => 'User Phoneconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-phoneconfig-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
