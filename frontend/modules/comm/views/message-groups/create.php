<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\comm\models\MessageGroups */

$this->title = 'Create Message Groups';
$this->params['breadcrumbs'][] = ['label' => 'Message Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
