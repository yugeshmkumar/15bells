<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RequestSiteVisitbin */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Request Site Visitbin',
]) . ' ' . $model->request_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Request Site Visitbins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->request_id, 'url' => ['view', 'id' => $model->request_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="request-site-visitbin-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
