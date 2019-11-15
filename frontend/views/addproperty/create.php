<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Addproperty */

$this->title = 'Lessor Addproperty';
$this->params['breadcrumbs'][] = ['label' => 'Addproperties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addproperty-create col-md-12">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }

</script>
