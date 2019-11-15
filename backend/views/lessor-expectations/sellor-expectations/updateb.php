<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectations */

$this->title = 'Update Sellor Expectations: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sellor Expectations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<style>
.control-label{
	color:#ffffff !important;
}
.portlt_bl{
	background:rgba(255,255,255,0.25);
	border-top:5px solid #e5ac31 !important;
}
.portlet-title{
	border-top:5px solid #e5ac31 !important;
}
</style>
<div class="sellor-expectations-update col-md-9">

    

    <?= $this->render('_formes', [
        'model' => $model,
    ]) ?>

</div>