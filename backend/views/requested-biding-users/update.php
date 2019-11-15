<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RequestedBidingUsers */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Requested Biding Users',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Requested Biding Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="requested-biding-users-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
