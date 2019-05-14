<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bellsfaqs */

$this->title = 'Update Bellsfaqs: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bellsfaqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bellsfaqs-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
