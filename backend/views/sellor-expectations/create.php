<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectations */

$this->title = 'Create Sellor Expectations';
$this->params['breadcrumbs'][] = ['label' => 'Sellor Expectations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sellor-expectations-create">

    

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
