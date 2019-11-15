<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Leadassignment */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Leadassignment',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Leadassignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="leadassignment-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
