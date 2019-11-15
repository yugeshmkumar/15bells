<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Designations */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Designations',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Designations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designations-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
