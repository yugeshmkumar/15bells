<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Aggrementmgmt */

$this->title = 'Update Aggrementmgmt: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aggrementmgmts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aggrementmgmt-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
