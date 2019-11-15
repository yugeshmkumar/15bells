<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CategorySubcategory */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Category Subcategory',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category Subcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-subcategory-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
