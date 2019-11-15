<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Banknew */

$this->title = 'Create Banknew';
$this->params['breadcrumbs'][] = ['label' => 'Banknews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
<div class="banknew-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
