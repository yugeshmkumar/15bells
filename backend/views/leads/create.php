<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Leads */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Leads',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Leads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leads-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
