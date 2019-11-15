<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RequestSiteVisit */

$this->title = 'Create Request Site Visit';
$this->params['breadcrumbs'][] = ['label' => 'Request Site Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-site-visit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
