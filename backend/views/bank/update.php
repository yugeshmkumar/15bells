<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bank */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Bank',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Banks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="bank-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
