<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectationsbin */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Lessor Expectationsbin',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Lessor Expectationsbins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessor-expectationsbin-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
