<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FifteenbellsConfig */

$this->title = 'Create Fifteenbells Config';
$this->params['breadcrumbs'][] = ['label' => 'Fifteenbells Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fifteenbells-config-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
