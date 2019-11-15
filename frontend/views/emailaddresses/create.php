<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Emailaddresses */

$this->title = 'Create Emailaddresses';
$this->params['breadcrumbs'][] = ['label' => 'Emailaddresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emailaddresses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
