<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AgreementLog */

$this->title = 'Update Agreement Log: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Agreement Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agreement-log-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
