<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AgreementLog */

$this->title = 'Create Agreement Log';
$this->params['breadcrumbs'][] = ['label' => 'Agreement Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agreement-log-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
