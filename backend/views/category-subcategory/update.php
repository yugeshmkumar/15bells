<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CategorySubcategory */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Category Subcategory',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category Subcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="category-subcategory-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
