<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VRWin */

$this->title = 'Create Vrwin';
$this->params['breadcrumbs'][] = ['label' => 'Vrwins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vrwin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
