<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FifteenbellsConfig */

$this->title = 'Update Fifteenbells Config: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fifteenbells Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fifteenbells-config-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
