<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\transaction\models\ProductDetails */

$this->title = 'Update Product Details: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
