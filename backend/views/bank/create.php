<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bank */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Bank',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Banks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
