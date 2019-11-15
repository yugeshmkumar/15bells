<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectationsbin */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Sellor Expectationsbin',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Sellor Expectationsbins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="sellor-expectationsbin-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
