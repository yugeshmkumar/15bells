<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectationsbin */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Sellor Expectationsbin',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Sellor Expectationsbins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sellor-expectationsbin-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
