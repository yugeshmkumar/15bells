<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Addpropertybackend */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Addpropertybackend',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Addpropertybackends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="addpropertybackend-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
