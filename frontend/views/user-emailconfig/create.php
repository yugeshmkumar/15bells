<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserEmailconfig */

$this->title = 'Create User Emailconfig';
$this->params['breadcrumbs'][] = ['label' => 'User Emailconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-emailconfig-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
