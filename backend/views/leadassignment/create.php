<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Leadassignment */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Leadassignment',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Leadassignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadassignment-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
