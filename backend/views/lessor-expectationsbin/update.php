<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectationsbin */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Lessor Expectationsbin',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Lessor Expectationsbins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="lessor-expectationsbin-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
