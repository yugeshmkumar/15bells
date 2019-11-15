<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserAddressconfig */

$this->title = 'Create User Addressconfig';
$this->params['breadcrumbs'][] = ['label' => 'User Addressconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-addressconfig-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
