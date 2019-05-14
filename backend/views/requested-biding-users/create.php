<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RequestedBidingUsers */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Requested Biding Users',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Requested Biding Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requested-biding-users-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
