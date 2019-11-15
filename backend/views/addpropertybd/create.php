<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Addpropertybackend */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Addpropertybackend',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Addpropertybackends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addpropertybackend-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
