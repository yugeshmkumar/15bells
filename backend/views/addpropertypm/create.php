<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Addpropertypm */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Addpropertypm',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Addpropertypms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addpropertypm-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
