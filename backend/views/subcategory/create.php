<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Subcategory */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Subcategory',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Subcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategory-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
