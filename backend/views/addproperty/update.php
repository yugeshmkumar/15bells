<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Addproperty */

$this->title = 'Update Addproperty: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Addproperties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<style>
.portlet.box>.portlet-title{
	color:#34495e !important;
}
</style>
<div class="addproperty-update col-md-12">

   

    <?= $this->render('_formes', [
        'model' => $model,
    ]) ?>

</div>
