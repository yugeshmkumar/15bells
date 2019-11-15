<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bellsfaqs */

$this->title = 'Create Bellsfaqs';
$this->params['breadcrumbs'][] = ['label' => 'Bellsfaqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bellsfaqs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
