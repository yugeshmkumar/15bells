<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Survey */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Survey',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="survey-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
