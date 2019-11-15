<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Aggrementmgmt */

$this->title = 'Create Aggrementmgmt';
$this->params['breadcrumbs'][] = ['label' => 'Aggrementmgmts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aggrementmgmt-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
