<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bellsfaqs */

$this->title = 'ADD FAQ';
$this->params['breadcrumbs'][] = ['label' => 'Bellsfaqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bellsfaqs-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
