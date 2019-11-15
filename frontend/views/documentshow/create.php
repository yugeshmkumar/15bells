<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RequestDocumentShow */

$this->title = 'Create Request Document Show';
$this->params['breadcrumbs'][] = ['label' => 'Request Document Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-document-show-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
